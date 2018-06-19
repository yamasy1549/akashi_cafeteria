<?php

require_once './Request.php';

class HogeController
{
    private $request;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->request = new Request();
    }

    public function helloAction()
    {
        $get = $this->request->getQuery();
        echo $get['hoge'];
    }
}
