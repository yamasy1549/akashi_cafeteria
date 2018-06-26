<?php

require_once './Request.php';
require_once './models/Menu.php';
require_once './views/smarty/Smarty.class.php';

class MenuController
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

        $menu_model = new Menu();
        $menus = $menu_model->getMenus();

        // テンプレートへ変数割り当て
        $this->view->assign('menus', $menus);

        // テンプレート表示
        $this->view->display('./views/menu/index.tpl');
    }
}
