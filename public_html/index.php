<?php

// Dispatcherの設定
require_once './Dispatcher.php';

$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot('./');
$dispatcher->dispatch();

// DBの設定
$dsn = 'pgsql:dbname='.$_ENV['DB_NAME'].';host='.$_ENV['DB_HOST'].';port='.$_ENV['DB_PORT'].';';
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

try {
    $dbh = new PDO($dsn, $user, $password);

    $sql = 'select * from public.user';
    foreach ($dbh->query($sql) as $row) {
        print($row['id'] . ': '. $row['email'] . '<br>');
    }
} catch (PDOException $e) {
    print('Connection failed:'.$e->getMessage());
    die();
}
