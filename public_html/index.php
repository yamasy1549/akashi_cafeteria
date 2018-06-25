<?php

// Dispatcherの設定
require_once './Dispatcher.php';

$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot('./');
$dispatcher->dispatch();
