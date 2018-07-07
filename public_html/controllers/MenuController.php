<?php

require_once './Request.php';
require_once './models/Menu.php';
require_once './views/smarty/Smarty.class.php';

class MenuController
{
    private $view;
    private $request;
    private $model;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->view = new Smarty();
        $this->view->template_dir = '../view/templates';

        $this->request = new Request();

        $this->model = new menu();
    }

    /**
     * index
     */
    public function indexAction()
    {
        $menus = $this->model->getmenus();

        // テンプレートへ変数割り当て
        $this->view->assign('menus', $menus);
        $this->view->assign('button_action', 'controller=menu&action=new');
        $this->view->assign('button_name', 'メニュー追加');

        // テンプレート表示
        $this->view->display('./views/menu/index.tpl');
    }

    /**
     * new
     */
    public function newAction()
    {
        // テンプレートへ変数割り当て
        $this->view->assign('button_action', 'controller=menu&action=new');
        $this->view->assign('button_name', 'メニュー追加');

        // テンプレート表示
        $this->view->display('./views/menu/new.tpl');
    }

    /**
     * create
     */
    public function createAction()
    {
        $params = $this->request->getPost();

        $this->model->create($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=menu&action=index');
        exit();
    }

    /**
     * edit
     */
    public function editAction()
    {
        $params = $this->request->getQuery();
        $menu = $this->model->getmenu($params['menu_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('menu', $menu);
        $this->view->assign('button_action', 'controller=menu&action=new');
        $this->view->assign('button_name', 'メニュー追加');

        // テンプレート表示
        $this->view->display('./views/menu/edit.tpl');
    }

    /**
     * update
     */
    public function updateAction()
    {
        $params = $this->request->getPost();

        $this->model->update($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=menu&action=index');
        exit();
    }

    /**
     * delete
     */
    public function deleteAction()
    {
        $params = $this->request->getQuery();
        $menu = $this->model->getmenu($params['menu_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('menu', $menu);
        $this->view->assign('button_action', 'controller=menu&action=new');
        $this->view->assign('button_name', 'カテゴリ追加');

        // テンプレート表示
        $this->view->display('./views/menu/delete.tpl');
    }

    /**
     * destroy
     */
    public function destroyAction()
    {
        $params = $this->request->getPost();

        $this->model->destroy($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=menu&action=index');
        exit();
    }
}
