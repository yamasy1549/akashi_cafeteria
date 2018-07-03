<?php

require_once './Request.php';
require_once './models/Evaluation.php';
require_once './views/smarty/Smarty.class.php';

class EvaluationController
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

        $this->model = new Evaluation();
    }

    /**
     * index
     */
    public function indexAction()
    {
        $evaluations = $this->model->getEvaluations();

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
        // テンプレートへ変数割り当て
        $this->view->assign('button_action', 'controller=evaluation&action=new');
        $this->view->assign('button_name', 'カテゴリ追加');

        // テンプレート表示
        $this->view->display('./views/evaluation/new.tpl');
    }

    /**
     * create
     */
    public function createAction()
    {
        $params = $this->request->getPost();

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

        // テンプレートへ変数割り当て
        $this->view->assign('evaluation', $evaluation);
        $this->view->assign('button_action', 'controller=evaluation&action=new');
        $this->view->assign('button_name', 'カテゴリ追加');

        // テンプレート表示
        $this->view->display('./views/evaluation/edit.tpl');
    }

    /**
     * update
     */
    public function updateAction()
    {
        $params = $this->request->getPost();

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
