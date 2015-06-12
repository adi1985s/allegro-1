<?php

class MysqlDriver {
    private $pdo;

    public function __construct(){
       try {
            require_once('config/mysql.php');
            $this->pdo=new PDO("mysql:host=$host;dbname=$db", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($query){
      return $this->pdo->query($query);
    }

    public function prepare($query){
      return $this->pdo->prepare($query);
    }
}