<?php
  $dsn = 'pgsql:dbname='.$_ENV['DB_NAME'].';host='.$_ENV['DB_HOST'].';port='.$_ENV['DB_PORT'].';';
  $user = $_ENV['DB_USER'];
  $password = $_ENV['DB_PASS'];

  try {
      $dbh = new PDO($dsn, $user, $password);

      $sql = 'select * from item';
      foreach ($dbh->query($sql) as $row) {
          print($row['id']);
          print($row['name'].'<br>');
      }
  } catch (PDOException $e) {
      print('Connection failed:'.$e->getMessage());
      die();
  }
