<?php

require_once './Request.php';
require_once './models/Category.php';
require_once './views/smarty/Smarty.class.php';

class CategoryController
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

        $category_model = new Category();
        $categories = $category_model->getCategories();

        // テンプレートへ変数割り当て
        $this->view->assign('categories', $categories);

        // テンプレート表示
        $this->view->display('./views/category/index.tpl');
    }
}
