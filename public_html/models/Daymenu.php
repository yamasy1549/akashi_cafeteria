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
        $sql = sprintf(
          'select '.
          'daymenu_id, menu_id, date, sale, menu.name as menu_name, price, image, category.name as category_name, avg(data) as data '.
          'from (%s inner join menu using (menu_id)) inner join category using (category_id) '.
          'left join evaluation using (menu_id) '.
          'group by daymenu_id, menu_id, date, sale, menu.name, price, image, category.name '.
          'order by date, menu_id asc',
          $this->model_name);
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
        $sql = sprintf(
          'select '.
          'daymenu_id, menu_id, date, sale, menu.name as menu_name, price, image, category.name as category_name '.
          'from (%s inner join menu using (menu_id)) inner join category using (category_id) '.
          'where daymenu_id = %d',
          $this->model_name,
          $daymenu_id);
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch();

        return $result;
    }

    /**
    * データ更新
    */
    public function update($params)
    {
        // バリデーション
        validate(isdate($params['date']), isid($params['menu_id']), isbool($params['sale']), isid($params['daymenu_id']));

        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'update %s '.
          "set date = '%s', menu_id = %d, sale = '%s' ".
          'where daymenu_id = %d',
          $this->model_name,
          $params['date'], $params['menu_id'], $params['sale'] ? 'true' : 'false', $params['daymenu_id']);
        $res = $this->db->query($sql);
    }

    /**
    * データ追加
    */
    public function create($params)
    {
        // バリデーション
        validate(isdate($params['date']), isid($params['menu_id']), isbool($params['sale']));

        // TODO: セキュリティ対策
        // TODO: エラーハンドリング
        $sql = sprintf(
          'insert into %s '.
          "(date, menu_id, sale) values ('%s', %d, '%s')",
          $this->model_name,
          $params['date'], $params['menu_id'], $params['sale'] ? 'true' : 'false');
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
