<?php
  $dsn = 'pgsql:dbname='.$_ENV['DBNAME'].';host='.$_ENV['DBHOST'].';port='.$_ENV['DBPORT'].';';
  $user = $_ENV['DBUSER'];
  $password = $_ENV['DBPASS'];

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
