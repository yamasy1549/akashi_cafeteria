<?php

require_once './controllers/BaseController.php';
require_once './models/Daymenu.php';
require_once './models/Menu.php';

class DaymenuController extends BaseController
{
    private $model;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();

        $this->model = new Daymenu();
    }

    /**
     * index
     */
    public function indexAction()
    {
        $_daymenus = $this->model->getDaymenus();

        // 日付ごとに連想配列に入れる
        foreach ($_daymenus as $daymenu) {
            $daymenus[$daymenu['date']][] = $daymenu;
        }

        // テンプレートへ変数割り当て
        $this->view->assign('daymenus', $daymenus);
        $this->view->assign('button_action', 'controller=daymenu&action=new');

        // テンプレート表示
        $this->view->display('./views/daymenu/index.tpl');
    }

    /**
     * new
     */
    public function newAction()
    {
        $params = $this->request->getQuery();

        $menu_model = new Menu();
        $menus = $menu_model->getMenus();

        // テンプレートへ変数割り当て
        $this->view->assign('menus', $menus);
        $this->view->assign('error', $params['error']);
        $this->view->assign('button_action', 'controller=daymenu&action=new');

        // テンプレート表示
        $this->view->display('./views/daymenu/new.tpl');
    }

    /**
     * create
     */
    public function createAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate($params, './?controller=daymenu&action=new',
          array('date'=>'無効な日付の形式', 'menu_id'=>'無効な値', 'sale'=>'無効な選択'));

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

        $menu_model = new Menu();
        $menus = $menu_model->getMenus();

        // テンプレートへ変数割り当て
        $this->view->assign('daymenu', $daymenu);
        $this->view->assign('menus', $menus);
        $this->view->assign('error', $params['error']);
        $this->view->assign('button_action', 'controller=daymenu&action=new');

        // テンプレート表示
        $this->view->display('./views/daymenu/edit.tpl');
    }

    /**
     * update
     */
    public function updateAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate($params, './?controller=daymenu&action=edit&daymenu_id='.$params['daymenu_id'],
          array('date'=>'無効な日付の形式', 'menu_id'=>'無効な値', 'sale'=>'無効な選択', 'daymenu_id'=>'無効な値'));

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
