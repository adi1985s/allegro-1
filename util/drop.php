<?php
  require_once('../lib/sqlite.php');
  $pdo = new PDO('sqlite:../database/db.sqlite');
  $pdo->query("DELETE FROM users");
?>
