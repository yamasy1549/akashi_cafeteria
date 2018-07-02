<?php

// エラーを表示
ini_set('display_errors', 1);

// Dispatcherの設定
require_once './Dispatcher.php';

$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot('./');
$dispatcher->dispatch();
