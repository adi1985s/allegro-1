<?php
  class SqliteDriver {
    private $pdo, $query, $result;

    public function __construct($file){
      try {
        $pdo = new PDO("sqlite:".$file);
      } catch(PDOException $e){
        print $e->getMessage();
      }
    }    

    public function query($query){
      $this->result = $pdo->query($query);
      return $result::affected_rows;
    }

    public function fetch(){
      return $result->fetchAssoc();
    } 

    public function count(){
      return $this->$result->rowCount();
    }

 
  }
?>
