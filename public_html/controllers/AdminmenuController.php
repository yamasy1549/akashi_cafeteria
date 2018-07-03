<?php

require_once './Request.php';
require_once './views/smarty/Smarty.class.php';

class AdminmenuController
{
    private $view;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->view = new Smarty();
        $this->view->template_dir = '../view/templates';
    }

    /**
     * index
     */
    public function indexAction()
    {
        // テンプレートへ変数割り当て
        $this->view->assign('button_action', 'controller=daymenu&action=index');
        $this->view->assign('button_name', '日毎メニュー管理');

        // テンプレート表示
        $this->view->display('./views/adminmenu/index.tpl');
    }
}
