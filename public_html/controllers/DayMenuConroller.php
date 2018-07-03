<?php

require_once './Request.php';
require_once './models/DayMenu.php';
require_once './views/smarty/Smarty.class.php';

class DayMenuController
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

    public function indexAction()
    {
        // $request = new Request();
        // $params = $request->getQuery();

        $daymenu_model = new Daymenu();
        $daymenus = $daymenu_model->getDayMenus();

        // テンプレートへ変数割り当て
        $this->view->assign('daymenu', $daymenus);

        // テンプレート表示
        $this->view->display('./views/daymenu/index.tpl');
    }
}
