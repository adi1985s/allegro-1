<?php

  class AccountModel {
    private $database;    

    public function __construct(){ 
      $this->database = new SqliteDriver('database/db.sqlite');
    }

    public function register($login, $password, $email, $nick){
      $password = md5($password);
      $check = "SELECT * FROM users WHERE login='$login'";
      $database->query($check);
      if($database->count() == 1) return FALSE;
      $code = rand(1000000000);
      $query = "INSERT INTO users(login,password,email,nick,activate) 
        VALUES('$login','$password','$email','$nick','$code')";
      $database->query($query);
      return TRUE;
    }

    public function login($login, $password){
      $password = md5($password);
      $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
      $database->query($query);
      $result = $database->fetch();
      
    }

    public function activate($username){

    }
 
    public function sendActivation($username){
      
    }
  }

?>
