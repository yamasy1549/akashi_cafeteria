<?php

require_once './Request.php';
require_once './models/Daymenu.php';
require_once './views/smarty/Smarty.class.php';

class DaymenuController
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

        $this->model = new Daymenu();
    }

    /**
     * index
     */
    public function indexAction()
    {
        $daymenus = $this->model->getDaymenus();

        // テンプレートへ変数割り当て
        $this->view->assign('daymenus', $daymenus);
        $this->view->assign('button_action', 'controller=daymenu&action=new');
        $this->view->assign('button_name', '日毎メニュー追加');

        // テンプレート表示
        $this->view->display('./views/daymenu/index.tpl');
    }

    /**
     * new
     */
    public function newAction()
    {
        // テンプレートへ変数割り当て
        $this->view->assign('button_action', 'controller=daymenu&action=new');
        $this->view->assign('button_name', '日毎メニュー追加');

        // テンプレート表示
        $this->view->display('./views/daymenu/new.tpl');
    }

    /**
     * create
     */
    public function createAction()
    {
        $params = $this->request->getPost();

        $this->model->create($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=daymenu&action=index');
        exit();
    }

    /**
     * edit
     */
    public function editAction()
    {
        $params = $this->request->getQuery();
        $daymenu = $this->model->getDaymenu($params['daymenu_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('daymenu', $daymenu);
        $this->view->assign('button_action', 'controller=daymenu&action=new');
        $this->view->assign('button_name', '日毎メニュー追加');

        // テンプレート表示
        $this->view->display('./views/daymenu/edit.tpl');
    }

    /**
     * update
     */
    public function updateAction()
    {
        $params = $this->request->getPost();

        $this->model->update($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=daymenu&action=index');
        exit();
    }

    /**
     * delete
     */
    public function deleteAction()
    {
        $params = $this->request->getQuery();
        $daymenu = $this->model->getDaymenu($params['daymenu_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('daymenu', $daymenu);
        $this->view->assign('button_action', 'controller=daymenu&action=new');
        $this->view->assign('button_name', '日毎メニュー追加');

        // テンプレート表示
        $this->view->display('./views/daymenu/delete.tpl');
    }

    /**
     * destroy
     */
    public function destroyAction()
    {
        $params = $this->request->getPost();

        $this->model->destroy($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=daymenu&action=index');
        exit();
    }
}
