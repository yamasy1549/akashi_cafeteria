<?php

require_once './RequestVariables.php';

/**
 * GET変数クラス
 */
class QueryString extends RequestVariables
{
    /**
     * パラメータ値設定
     */
    protected function setValues()
    {
        foreach ($_GET as $key => $value) {
            $this->_values[$key] = $value;
        }
    }
}
