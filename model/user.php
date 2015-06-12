<?php

class UserModel {
    private $database, $error;    

    private $insert = "INSERT INTO users(login,password,email,nick,activate) VALUES(?,?,?,?,?)";
    private $exists = "SELECT * FROM users WHERE ";
    private $login = "SELECT id,login,email,nick FROM users WHERE login=? AND password=?";
    private $active = "SELECT id FROM users WHERE id=? AND activate=1";
    private $activate = "UPDATE users SET activate=1 WHERE activate=?";

    public function __construct(){ 
        $this->database = new MysqlDriver();
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

        $allegro = new AllegroFacade();
        if($allegro->setUser($nick)){
            $this->setError("Podane konto allegro nie istnieje!");
        }

        $code = md5(uniqid(time()));
        $query = $this->database->prepare($this->insert);
        $query->execute(array($login, $password, $email, $nick, $code));
        return $this->sendActivation($email, $code);
    }

    public function login($login, $password){
        $password = md5($password);
        $query = $this->database->prepare($this->login);
        $query->execute(array($login, $password));
        if($user = $query->fetch()){
            $query = $this->database->prepare($this->active);
            $query->execute(array($user['id']));
            if($query->fetchAll()){
                $_SESSION['user'] = $user;
                return $user;
            } else 
                $this->setError('Twoje konto jest nieaktywne. Sprawdź swój e-mail.');
        } else 
            $this->setError('Błędne dane.');
        
        return FALSE;
    }

    public function logout(){
        session_destroy();
    }

    public function logged(){
        return isset($_SESSION['user']) ? $_SESSION['user'] : FALSE;
    }

    public function activate($code){
        $query = $this->database->prepare($this->activate);
        $query->execute(array($code));
        return $query->rowCount();
    }
 
    public function sendActivation($email, $code){
        $mail = new MailFacade();
        $mail->addAddress($email);

        $body = file_get_contents('database/active.html');
        $body = str_replace("URL", $_SERVER['HTTP_HOST'] . '/' 
            . basename(dirname($_SERVER['PHP_SELF'])) . '/', $body);
        $body = str_replace("CODE", $code, $body);

        $mail->setSubject("Aktywacja konta");
        $mail->setMessage($body);

        return $mail->send();
    }

    public function setError($error){
        $this->error = $error;
    }

    public function getError(){
        return $this->error;
    }
}


