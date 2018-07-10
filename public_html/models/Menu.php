<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Menu extends BaseModel
{
    private $model_name = 'menu';

    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得（全部）
    */
    public function getMenus()
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'select '.
          'menu_id, menu.name as name, menu.price as price, menu.image as image, category.category_id, category.name as category_name '.
          'from category inner join %s using (category_id) '.
          'order by menu_id asc',
          $this->model_name
        );
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * DBから取得（一部）
    */
    public function getMenu($menu_id)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'select '.
          'menu_id, menu.name as name, menu.price as price, menu.image as image, category.category_id, category.name as category_name '.
          'from category inner join %s using (category_id)'.
          'where menu_id = %s',
          $this->model_name,
            $menu_id
        );
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
        $sql = sprintf(
          'update %s '.
          "set name = '%s', price = %d, image = '%s', category_id = %d ".
          'where menu_id = %s',
          $this->model_name,
          $params['name'],
            $params['price'],
            $params['image'],
            $params['category_id'],
          $params['menu_id']
        );
        $res = $this->db->query($sql);
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'insert into %s (name, price, image, category_id) '.
          "values ('%s', %d, '%s', %d)",
          $this->model_name,
            $params['name'],
            $params['price'],
            $params['imege'],
            $params['category_id']
        );
        $res = $this->db->query($sql);
    }

    /**
    * データ削除
    */
    public function destroy($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf('delete from %s where menu_id = %s', $this->model_name, $params['menu_id']);
        $res = $this->db->query($sql);
    }
}
