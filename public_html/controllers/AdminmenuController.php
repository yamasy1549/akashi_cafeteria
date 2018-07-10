<?php

require_once './controllers/BaseController.php';

class AdminmenuController extends BaseController
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * howtouse
     */
    public function howtouseAction()
    {
        // テンプレートへ変数割り当て
        $this->view->assign('button_action', 'controller=daymenu&action=index');

        // テンプレート表示
        $this->view->display('./views/adminmenu/howtouse.tpl');
    }
}
