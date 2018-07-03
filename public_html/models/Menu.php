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
    * DBから取得
    */
    public function getMenus()
    {
        // TODO: セキュリティ対策
        $sql = sprintf('select * from %s where menu_id = %s', $this->model_name, $params['category_id'], $params['name'], $params['price'], $params['image']);
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * データ更新
    */
    public function update($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf("update %s set name = '%s' where menu_id = %s", $this->model_name, $params['name'], $params['menu_id']);
        $res = $this->db->query($sql);
    }

    /**
    * データ追加
    */
    public function create($userId)
    {
        // TODO: セキュリティ対策
        $sql = sprintf("insert into %s （category_id, name, price, image） values ('%s', '%s','%s', '%s')", $this->model_name, $params['category_id'], $params['name'], $params['price'], $params['image']);
        $res = $this->db->query($sql);

        return $res;
    }

    /**
    * データ削除
    */
    public function destroy($userId)
    {
        // TODO: セキュリティ対策
        $sql = sprintf('delete from %s where menu_id = %s', $this->model_name, $params['category_id'], $params['name'], $params['price'], $params['image']);
        $res = $this->db->query($sql);

        return $res;
    }
}
