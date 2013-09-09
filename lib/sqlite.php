<?php
  class SqliteDriver {
    private $pdo;

    public function __construct($file){
      try {
        $this->pdo = new PDO("sqlite:".$file);
      } catch(PDOException $e){
        print $e->getMessage();
      }
    }    

    public function query($query){
      return $this->pdo->query($query);
    }

    public function prepare($query){
      return $this->pdo->prepare($query);
    }
  }
?>
