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
     * @see Dispatcher::generatecontrollerInstance
     */
    public function dispatch()
    {
        // パラメータ取得、末尾の/を削除
        $param = preg_replace('/\/?$/', '', $_SERVER['REQUEST_URI']);

        $params = array();
        if ($param != '') {
            // パラメータを/, ?で分割
            $params = preg_split('/[\/\?]/', $param);
        }

        // Controller特定
        $className = $this->getClassName($params);
        $controllerInstance = $this->generatecontrollerInstance($className);

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
     * パラメータからControllerを特定
     *
     * @param string $params リクエストのパラメータ
     * @return string $className Controllerのクラス名
     */
    private function getClassName($params)
    {
        // デフォルトではIndexController
        $controller = "index";

        // パラメータの1番目がController
        if (0 < count($params)) {
            $controller = $params[1];
        }

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

        // パラメータの2番目がAction
        if (0 < count($params)) {
            $action = $params[2];
        }

        $actionMethod = $action . 'Action';

        return $actionMethod;
    }
}
