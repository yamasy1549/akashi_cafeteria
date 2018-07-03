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
        $sql = sprintf('select * from %s', $this->model_name);
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
        $sql = sprintf('select * from %s where evaluation_id = %s', $this->model_name, $evaluation_id);
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch();

        return $result;
    }

    /**
    * データ更新
    */
    public function update($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf("update %s set name = '%s' where evaluation_id = %s", $this->model_name, $params['name'], $params['evaluation_id']);
        $res = $this->db->query($sql);
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf("insert into %s (name) values ('%s')", $this->model_name, $params['name']);
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
