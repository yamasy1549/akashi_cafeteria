<?php

require_once './Request.php';
require_once './views/smarty/Smarty.class.php';

class BaseController
{
    public $view;
    public $request;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->view = new Smarty();
        $this->view->template_dir = '../view/templates';

        $this->request = new Request();
    }
}
