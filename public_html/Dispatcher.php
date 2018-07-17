<?php

/**
 * リクエストを受け取ったらこのクラスで処理を振り分ける。
 * リクエストからControllerとActionを特定して該当Actionに飛ばす。
 */
class Dispatcher
{
    private $sysRoot;

    /**
     *  Controllerファイルなどを読み込むための起点パスを設定する。
     */
    public function setSystemRoot($path)
    {
        $this->sysRoot = rtrim($path, '/');
    }

    /**
     * パラメータからControllerとActionを特定して該当Actionを呼ぶ
     *
     * @see Dispatcher::getClassName
     * @see Dispatcher::getActionMethod
     * @see Dispatcher::generateControllerInstance
     */
    public function dispatch()
    {
        // パラメータ取得、整形
        // `http://172.16.16.7/team2/?controller=category&action=index`
        // みたいな形でリクエストされる
        $param = preg_replace('/\/team2\/\?/', '', $_SERVER['REQUEST_URI']);

        $params = array();
        if ($param != '') {
            // パラメータを=と&で分割
            $params = preg_split('/[=&]/', $param);
        }

        // Controller特定
        $className = $this->getClassName($params);
        $controllerInstance = $this->generateControllerInstance($className);

        // ControllerのActionを呼ぶ
        $actionMethod = $this->getActionMethod($params);
        $controllerInstance->$actionMethod();
    }

    /**
     * Controller（クラス）のインスタンスを生成
     *
     * @param string $className Controller（クラス）名
     * @return className $classname() クラスのインスタンス
     */
    private function generateControllerInstance($className)
    {
        require_once $this->sysRoot . '/controllers/' . $className . '.php';

        return new $className();
    }

    /**
     * ディレクトリトラバーサル対策
     *
     * @param string $str ディレクトリトラバーサルする可能性のある入力文字列
     * @return string $safe_str ヌル文字を除いた文字列
     */
    private function checkDirTraversal($str)
    {
        if (strpos($str, '..') !== false) {
          die('相対パスは指定できません');
        }
        $safe_str = str_replace('\0', '', $str);

        return $safe_str;
    }

    /**
     * パラメータからControllerを特定
     *
     * @param string $params リクエストのパラメータ
     * @return string $className Controllerのクラス名
     */
    private function getClassName($params)
    {
        // デフォルトではDaymenuController
        $controller = "daymenu";

        // パラメータの1番目がController
        if (0 < count($params) && $params[0] == "controller") {
            $controller = $params[1];
        }

        $controller = $this->checkDirTraversal($controller);

        // 先頭大文字でコントローラ名指定
        $className = ucfirst(strtolower($controller)) . 'Controller';

        return $className;
    }

    /**
     * パラメータからActionを特定
     *
     * @param string $params リクエストのパラメータ
     * @return string $actionMethod Actionのメソッド名
     */
    private function getActionMethod($params)
    {
        // デフォルトではindexAction
        $action = "index";

        // パラメータの3番目がAction
        if (0 < count($params) && $params[2] == "action") {
            $action = $params[3];
        }

        $action = $this->checkDirTraversal($action);

        // アクション名指定
        $actionMethod = strtolower($action) . 'Action';

        return $actionMethod;
    }
}
