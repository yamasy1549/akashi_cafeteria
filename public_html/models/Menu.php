<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Menu extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得（全部）
    */
    public function getMenus()
    {
        // TODO: エラーハンドリング
        $sql = 'select '.
          'menu_id, menu.name as name, menu.price as price, menu.image as image, category.category_id, category.name as category_name '.
          'from category inner join menu using (category_id) '.
          'order by menu_id asc';
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * DBから取得（一部）
    */
    public function getMenu($menu_id)
    {
        // TODO: エラーハンドリング
        $sql = 'select '.
          'menu_id, menu.name as name, menu.price as price, menu.image as image, category.category_id, category.name as category_name '.
          'from category inner join menu using (category_id)'.
          'where menu_id = :menu_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':menu_id', (int)$menu_id, PDO::PARAM_INT);
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
        $sql = 'update menu '.
          'set name = :name, price = :price, image = :image, category_id = :category_id '.
          'where menu_id = :menu_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $params['name'], PDO::PARAM_STR);
        $stmt->bindValue(':price', (int)$params['price'], PDO::PARAM_INT);
        $stmt->bindValue(':image', $params['image'], PDO::PARAM_STR);
        $stmt->bindValue(':category_id', (int)$params['category_id'], PDO::PARAM_INT);
        $stmt->bindValue(':menu_id', (int)$params['menu_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // TODO: エラーハンドリング
        $sql = 'insert into menu (name, price, image, category_id) '.
          'values (:name, :price, :image, :category_id)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $params['name'], PDO::PARAM_STR);
        $stmt->bindValue(':price', (int)$params['price'], PDO::PARAM_INT);
        $stmt->bindValue(':image', $params['image'], PDO::PARAM_STR);
        $stmt->bindValue(':category_id', (int)$params['category_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
    * データ削除
    */
    public function destroy($params)
    {
        // TODO: エラーハンドリング
        $sql = 'delete from menu where menu_id = :menu_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':menu_id', (int)$params['menu_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
