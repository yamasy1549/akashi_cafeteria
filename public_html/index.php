<?php

// エラーを表示
ini_set('display_errors', 1);

// JavaScriptからクッキーを読み込まれないようにする
ini_set('session.cookie_httponly', true);

// Dispatcherの設定
require_once './Dispatcher.php';

$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot('./');
$dispatcher->dispatch();
