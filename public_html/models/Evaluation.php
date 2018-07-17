<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Evaluation extends BaseModel
{
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
        $sql = 'select '.
          'evaluation.evaluation_id, evaluation.data, menu.menu_id, menu.name as menu_name '.
          'from evaluation inner join menu using (menu_id) '.
          'order by menu_id asc';
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * DBから取得（一部）
    */
    public function getEvaluation($evaluation_id)
    {
        // TODO: エラーハンドリング
        $sql = 'select '.
          'evaluation.evaluation_id, evaluation.data, menu.menu_id, menu.name as menu_name '.
          'from evaluation inner join menu using (menu_id) '.
          'where evaluation_id = :evaluation_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':evaluation_id', (int)$evaluation_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();

        return $result;
    }

    /**
    * データ更新
    */
    public function update($params)
    {
        // TODO: エラーハンドリング
        $sql = 'update evaluation '.
          'set data = :data, menu_id = :menu_id '.
          'where evaluation_id = :evaluation_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':data', (int)$params['data'], PDO::PARAM_INT);
        $stmt->bindValue(':menu_id', (int)$params['menu_id'], PDO::PARAM_INT);
        $stmt->bindValue(':evaluation_id', (int)$params['evaluation_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // TODO: エラーハンドリング
        $sql = 'insert into evaluation '.
          '(data, menu_id) values (:data, :menu_id)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':data', (int)$params['data'], PDO::PARAM_INT);
        $stmt->bindValue(':menu_id', (int)$params['menu_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
    * データ削除
    */
    public function destroy($params)
    {
        // TODO: エラーハンドリング
        $sql = 'delete from evaluation where evaluation_id = :evaluation_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':evaluation_id', (int)$params['evaluation_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
