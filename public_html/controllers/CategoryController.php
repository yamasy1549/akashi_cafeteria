<?php

require_once './Request.php';
require_once './models/Category.php';
require_once './views/smarty/Smarty.class.php';

class CategoryController
{
    private $view;
    private $model;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->view = new Smarty();
        $this->view->template_dir = '../view/templates';

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

        // テンプレート表示
        $this->view->display('./views/category/index.tpl');
    }

    /**
     * edit
     */
    public function editAction()
    {
        $request = new Request();
        $params = $request->getQuery();
        $category = $this->model->getCategory($params['category_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('category', $category);

        // テンプレート表示
        $this->view->display('./views/category/edit.tpl');
    }
}
