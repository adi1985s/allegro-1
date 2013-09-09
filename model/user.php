<?php

  class UserModel {
    private $database, $error;    

    private $insert = "INSERT INTO users(login,password,email,nick,activate) VALUES(?,?,?,?,?)";
    private $exists = "SELECT * FROM users WHERE ";

    public function __construct(){ 
      $this->database = new SqliteDriver('database/db.sqlite');
    }

    public function register($login, $password, $email, $nick){
      $password = md5($password);

      $properties = compact('login', 'email', 'nick');

      foreach($properties as $property => $value){ 
        $query = $this->database->prepare($this->exists . $property . '=?');
        $query->execute(array($value));
        if($query->fetchAll()){
          $this->setError("Podany $property jest zajęty.");
          return FALSE;
        }
      }

      $code = md5(uniqid(time()));
      $query = $this->database->prepare($this->insert);
      return $query->execute(array($login, $password, $email, $nick, $code));
    }

    public function login($login, $password){
      $password = md5($password);
      $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
      return $this->database->query($query);
    }

    public function activate($username){

    }
 
    public function sendActivation($username){
      
    }

    public function setError($error){
      $this->error = $error;
    }

    public function getError(){
      return $this->error;
    }
  }

?>
