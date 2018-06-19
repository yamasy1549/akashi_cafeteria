<?php

require_once './RequestVariables.php';

/**
 * POST変数クラス
 */
class Post extends RequestVariables
{
    /**
     * パラメータ値設定
     */
    protected function setValues()
    {
        foreach ($_POST as $key => $value) {
            $this->_values[$key] = $value;
        }
    }
}
