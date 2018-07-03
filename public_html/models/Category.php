<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Category extends BaseModel
{
    private $model_name = 'category';

    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得（全部）
    */
    public function getCategories()
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
    public function getCategory($category_id)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf('select * from %s where category_id = %s', $this->model_name, $category_id);
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
        $sql = sprintf("update %s set name = '%s' where category_id = %s", $this->model_name, $params['name'], $params['category_id']);
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
        $sql = sprintf('delete from %s where category_id = %s', $this->model_name, $params['category_id']);
        $res = $this->db->query($sql);
    }
}
