<?php

/**
 * リクエスト変数抽象クラス
 */
abstract class RequestVariables
{
    protected $_values;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->setValues();
    }

    /**
     * パラメータ値設定
     */
    abstract protected function setValues();

    /**
     * 指定キーのパラメータを取得
     */
    public function get($key = null)
    {
        $param = null;

        if ($key == null) {
            $param = $this->_values;
        } else {
            if ($this->has($key) == true) {
                $param = $this->_values[$key];
            }
        }

        return $param;
    }

    /**
     * 指定キーが存在するか確認
     *
     * @return boolean 存在するかどうか
     */
    public function has($key)
    {
        if (array_key_exists($key, $this->_values) == false) {
            return false;
        }

        return true;
    }
}
