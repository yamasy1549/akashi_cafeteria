<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Daymenu extends BaseModel
{
    private $model_name = 'daymenu';

    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得（全部）
    */
    public function getDaymenus()
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
    public function getDaymenu($daymenu_id)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf('select * from %s where daymenu_id = %s', $this->model_name, $daymenu_id);
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
        $sql = sprintf("update %s set name = '%s' where daymenu_id = %s", $this->model_name, $params['name'], $params['daymenu_id']);
        $res = $this->db->query($sql);
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf("insert into %s (daymenu_id, name, price, image) values ('%s', '%s', '%s', '%s')", $this->model_name, $params['daymenu_id'], $params['name'], $params['price'], $params['image']);
        $res = $this->db->query($sql);
    }

    /**
    * データ削除
    */
    public function destroy($params)
    {
        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf('delete from %s where daymenu_id = %s', $this->model_name, $params['daymenu_id']);
        $res = $this->db->query($sql);
    }
}
