<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Evaluation extends BaseModel
{
    private $model_name = 'evaluation';

    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得（全部）
    */
    public function getEvaluations()
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'select '.
          'evaluation.evaluation_id, evaluation.data, menu.menu_id, menu.name as menu_name, "user".user_id, "user".email '.
          'from (%s inner join "user" using (user_id)) '.
          'inner join menu using (menu_id) '.
          'order by menu_id asc',
          $this->model_name);
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * DBから取得（一部）
    */
    public function getEvaluation($evaluation_id)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'select '.
          'evaluation.evaluation_id, evaluation.data, menu.menu_id, menu.name as menu_name, "user".user_id, "user".email '.
          'from (%s inner join "user" using (user_id)) '.
          'inner join menu using (menu_id) '.
          'where evaluation_id = %d',
          $this->model_name,
          $evaluation_id);
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch();

        return $result;
    }

    /**
    * データ更新
    */
    public function update($params)
    {
        // バリデーション
        validate(isnumber_data($params['data']), isid($params['menu_id']), isid($params['evaluation_id']));

        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'update %s '.
          'set data = %d, menu_id = %d '.
          'where evaluation_id = %d',
          $this->model_name,
          $params['data'], $params['menu_id'],
          $params['evaluation_id']);
        $res = $this->db->query($sql);
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // バリデーション
        validate(isnumber_data($params['data']), isid($params['menu_id']), isid($params['user_id']));

        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'insert into %s '.
          '(data, menu_id, user_id) values (%d, %d, %d)',
          $this->model_name,
          $params['data'], $params['menu_id'], $params['user_id']);
        $res = $this->db->query($sql);
    }

    /**
    * データ削除
    */
    public function destroy($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf('delete from %s where evaluation_id = %s', $this->model_name, $params['evaluation_id']);
        $res = $this->db->query($sql);
    }
}
