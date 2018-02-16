<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'weListen';

  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
