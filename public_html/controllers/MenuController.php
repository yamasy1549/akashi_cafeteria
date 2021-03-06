<?php

require_once './controllers/BaseController.php';
require_once './models/Menu.php';
require_once './models/Category.php';

class MenuController extends BaseController
{
    private $model;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();

        $this->model = new menu();
    }

    /**
     * index
     */
    public function indexAction()
    {
        $_menus = $this->model->getmenus();

        // カテゴリごとに連想配列に入れる
        foreach ($_menus as $menu) {
            $menus[$menu['category_id']][] = $menu;
        }

        // テンプレートへ変数割り当て
        $this->view->assign('menus', $menus);
        $this->view->assign('button_action', 'controller=menu&action=new');

        // テンプレート表示
        $this->view->display('./views/menu/index.tpl');
    }

    /**
     * new
     */
    public function newAction()
    {
        $params = $this->request->getQuery();

        $category_model = new Category();
        $categories = $category_model->getCategories();

        // テンプレートへ変数割り当て
        $this->view->assign('categories', $categories);
        $this->view->assign('error', $params['error']);
        $this->view->assign('button_action', 'controller=menu&action=new');

        // テンプレート表示
        $this->view->display('./views/menu/new.tpl');
    }

    /**
     * create
     */
    public function createAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate($params, './?controller=menu&action=new',
          array('name'=>'必須', 'price'=>'無効な数字', 'category_id'=>'無効な値'));

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

        $category_model = new Category();
        $categories = $category_model->getCategories();

        // テンプレートへ変数割り当て
        $this->view->assign('menu', $menu);
        $this->view->assign('categories', $categories);
        $this->view->assign('error', $params['error']);
        $this->view->assign('button_action', 'controller=menu&action=new');

        // テンプレート表示
        $this->view->display('./views/menu/edit.tpl');
    }

    /**
     * update
     */
    public function updateAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate($params, './?controller=menu&action=edit&menu_id='.$params['menu_id'],
          array('name'=>'必須', 'price'=>'無効な数字', 'category_id'=>'無効な値', 'menu_id'=>'無効な値'));

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
