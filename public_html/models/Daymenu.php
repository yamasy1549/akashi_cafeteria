<?php

require_once './models/BaseModel.php';

/**
 * カテゴリモデル
 */
class Daymenu extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * DBから取得（全部）
    */
    public function getDaymenus()
    {
        // TODO: エラーハンドリング
        $sql = 'select '.
          'daymenu_id, menu_id, date, sale, menu.name as menu_name, price, image, category.name as category_name, avg(data) as data '.
          'from (daymenu inner join menu using (menu_id)) inner join category using (category_id) '.
          'left join evaluation using (menu_id) '.
          'group by daymenu_id, menu_id, date, sale, menu.name, price, image, category.name '.
          'order by date, menu_id asc';
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
    * DBから取得（一部）
    */
    public function getDaymenu($daymenu_id)
    {
        // TODO: エラーハンドリング
        $sql = 'select '.
          'daymenu_id, menu_id, date, sale, menu.name as menu_name, price, image, category.name as category_name '.
          'from (daymenu inner join menu using (menu_id)) inner join category using (category_id) '.
          'where daymenu_id = :daymenu_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':daymenu_id', (int)$daymenu_id, PDO::PARAM_INT);
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
        $sql = 'update daymenu '.
          'set date = :date, menu_id = :menu_id, sale = :sale '.
          'where daymenu_id = :daymenu_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':date', $params['date'], PDO::PARAM_STR);
        $stmt->bindValue(':menu_id', (int)$params['menu_id'], PDO::PARAM_INT);
        $stmt->bindValue(':sale', $params['sale'] ? 'true' : 'false', PDO::PARAM_STR);
        $stmt->bindValue(':daymenu_id', (int)$params['daymenu_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // TODO: エラーハンドリング
        $sql = 'insert into daymenu '.
          '(date, menu_id, sale) values (:date, :menu_id, :sale)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':date', $params['date'], PDO::PARAM_STR);
        $stmt->bindValue(':menu_id', (int)$params['menu_id'], PDO::PARAM_INT);
        $stmt->bindValue(':sale', $params['sale'] ? 'true' : 'false', PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
    * データ削除
    */
    public function destroy($params)
    {
        // TODO: エラーハンドリング
        $sql = 'delete from daymenu where daymenu_id = :daymenu_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':daymenu_id', (int)$params['daymenu_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
