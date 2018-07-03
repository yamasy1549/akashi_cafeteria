<?php

require_once './models/BaseModel.php';

/**
 * 日毎メニューモデル
 */
class DayMenu extends BaseModel
{
    private $model_name = 'daymenu';

    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得
    */
    public function getDayMenus()
    {
        // TODO: セキュリティ対策
        $sql = sprintf('select * from %s', $this->model_name);
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * データ追加
    */
    public function create($userId)
    {
        // TODO: セキュリティ対策
        $sql = sprintf('insert into %s (name) values %s', $this->model_name, $name);
        $res = $this->db->query($sql);

        return $res;
    }

    /**
    * データ削除
    */
    public function destroy($userId)
    {
        // TODO: セキュリティ対策
        $sql = sprintf('delete from %s where %s', $this->model_name, $name);
        $res = $this->db->query($sql);

        return $res;
    }
}
