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

        // テンプレート表示
        $this->view->display('./views/category/index.tpl');
    }

    /**
     * new
     */
    public function newAction()
    {
        $params = $this->request->getQuery();

        // テンプレートへ変数割り当て
        $this->view->assign('error', $params['error']);
        $this->view->assign('button_action', 'controller=category&action=new');

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
        validate($params, './?controller=category&action=new', array('name'=>'必須'));

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
        $this->view->assign('error', $params['error']);
        $this->view->assign('button_action', 'controller=category&action=new');

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
        validate($params, './?controller=category&action=edit&category_id='.$params['category_id'],
          array('name'=>'必須', 'category_id'=>'無効な値'));

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
