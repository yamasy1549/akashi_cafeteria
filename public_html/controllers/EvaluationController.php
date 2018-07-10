<?php

require_once './controllers/BaseController.php';
require_once './models/Evaluation.php';
require_once './models/Menu.php';

class EvaluationController extends BaseController
{
    private $model;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();

        $this->model = new Evaluation();
    }

    /**
     * index
     */
    public function indexAction()
    {
        $_evaluations = $this->model->getEvaluations();

        // メニューごとに連想配列に入れる
        foreach ($_evaluations as $evaluation) {
            $evaluations[$evaluation['menu_id']][] = $evaluation;
        }

        // テンプレートへ変数割り当て
        $this->view->assign('evaluations', $evaluations);
        $this->view->assign('button_action', 'controller=evaluation&action=new');
        $this->view->assign('button_name', '評価追加');

        // テンプレート表示
        $this->view->display('./views/evaluation/index.tpl');
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
        $this->view->assign('menu_id', $params['menu_id']);
        $this->view->assign('button_action', 'controller=evaluation&action=new');
        $this->view->assign('button_name', '評価追加');

        // テンプレート表示
        $this->view->display('./views/evaluation/new.tpl');
    }

    /**
     * create
     */
    public function createAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate(isnumber_data($params['data']), isid($params['menu_id']));

        $this->model->create($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=evaluation&action=index');
        exit();
    }

    /**
     * edit
     */
    public function editAction()
    {
        $params = $this->request->getQuery();
        $evaluation = $this->model->getEvaluation($params['evaluation_id']);

        $menu_model = new Menu();
        $menus = $menu_model->getMenus();

        // テンプレートへ変数割り当て
        $this->view->assign('evaluation', $evaluation);
        $this->view->assign('menus', $menus);
        $this->view->assign('button_action', 'controller=evaluation&action=new');
        $this->view->assign('button_name', '評価追加');

        // テンプレート表示
        $this->view->display('./views/evaluation/edit.tpl');
    }

    /**
     * update
     */
    public function updateAction()
    {
        $params = $this->request->getPost();

        // バリデーション
        validate(isnumber_data($params['data']), isid($params['menu_id']), isid($params['evaluation_id']));

        $this->model->update($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=evaluation&action=index');
        exit();
    }

    /**
     * delete
     */
    public function deleteAction()
    {
        $params = $this->request->getQuery();
        $evaluation = $this->model->getEvaluation($params['evaluation_id']);

        // テンプレートへ変数割り当て
        $this->view->assign('evaluation', $evaluation);
        $this->view->assign('button_action', 'controller=evaluation&action=new');
        $this->view->assign('button_name', '評価追加');

        // テンプレート表示
        $this->view->display('./views/evaluation/delete.tpl');
    }

    /**
     * destroy
     */
    public function destroyAction()
    {
        $params = $this->request->getPost();

        $this->model->destroy($params);

        // カテゴリ一覧へリダイレクト
        header('Location: ./?controller=evaluation&action=index');
        exit();
    }
}
