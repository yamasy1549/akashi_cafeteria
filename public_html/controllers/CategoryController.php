<?php

require_once './controllers/BaseController.php';
require_once './models/Category.php';

class CategoryController extends BaseController
{
    private $model;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();

        $this->model = new Category();
    }

    /**
     * index
     */
    public function indexAction()
    {
        $categories = $this->model->getCategories();

        // テンプレートへ変数割り当て
        $this->view->assign('categories', $categories);
        $this->view->assign('button_action', 'controller=category&action=new');
        $this->view->assign('button_name', 'カテゴリ追加');

        // テンプレート表示
        $this->view->display('./views/category/index.tpl');
    }

    /**
     * new
     */
    public function newAction()
    {
        // テンプレートへ変数割り当て
        $this->view->assign('button_action', 'controller=category&action=new');
        $this->view->assign('button_name', 'カテゴリ追加');

        // テンプレート表示
        $this->view->display('./views/category/new.tpl');
    }

    /**
     * create
     */
    public function createAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate(ispresent($params['name']));

        $this->model->create($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=category&action=index');
        exit();
    }

    /**
     * edit
     */
    public function editAction()
    {
        $params = $this->request->getQuery();
        $category = $this->model->getCategory($params['category_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('category', $category);
        $this->view->assign('button_action', 'controller=category&action=new');
        $this->view->assign('button_name', 'カテゴリ追加');

        // テンプレート表示
        $this->view->display('./views/category/edit.tpl');
    }

    /**
     * update
     */
    public function updateAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate(ispresent($params['name']), isid($params['category_id']));

        $this->model->update($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=category&action=index');
        exit();
    }

    /**
     * delete
     */
    public function deleteAction()
    {
        $params = $this->request->getQuery();
        $category = $this->model->getCategory($params['category_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('category', $category);
        $this->view->assign('button_action', 'controller=category&action=new');
        $this->view->assign('button_name', 'カテゴリ追加');

        // テンプレート表示
        $this->view->display('./views/category/delete.tpl');
    }

    /**
     * destroy
     */
    public function destroyAction()
    {
        $params = $this->request->getPost();

        $this->model->destroy($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=category&action=index');
        exit();
    }
}
