<?php

/**
 * 抽象モデル
 */
abstract class BaseModel
{
    public $db;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        try {
            // DBの設定
            $dsn = 'pgsql:dbname='.$_ENV['DB_NAME'].';host='.$_ENV['DB_HOST'].';port='.$_ENV['DB_PORT'].';';
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];
            $this->db = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            print('Connection failed:'.$e->getMessage());
            die();
        }
    }
}
