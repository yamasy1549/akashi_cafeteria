<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Category extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得（全部）
    */
    public function getCategories()
    {
        // TODO: エラーハンドリング
        $sql = 'select * from category order by category_id asc';
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * DBから取得（一部）
    */
    public function getCategory($category_id)
    {
        // TODO: エラーハンドリング
        $sql = 'select * from category where category_id = :category_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':category_id', (int)$category_id, PDO::PARAM_INT);
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
        $sql = 'update category set name = :name where category_id = :category_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $params['name'], PDO::PARAM_STR);
        $stmt->bindValue(':category_id', (int)$params['category_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // TODO: エラーハンドリング
        $sql = 'insert into category (name) values (:name)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $params['name'], PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
    * データ削除
    */
    public function destroy($params)
    {
        // TODO: エラーハンドリング
        $sql = 'delete from category where category_id = :category_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':category_id', (int)$params['category_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
