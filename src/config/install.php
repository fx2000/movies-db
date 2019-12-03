<?php

include_once './database.php';

try {
  $database = new Database();
  $connection = $database.getConnection();
  $sql = file_get_contents('data/database.sql');
  $connection->exec($sql);
  echo 'Database and table created successfully';
} catch (PDOException $exception) {
  echo 'Connection error: ' . $exception->getMessage();
}
