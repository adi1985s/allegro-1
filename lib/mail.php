<?php
  require_once('class.phpmailer.php');

  class MailFacade {
    private $mail;
    public function __construct(){
      $this->mail = new PHPMailer();
      $this->mail->IsHTML(true);
      $this->mail->Host = 'smtp.gmail.com';
      $this->mail->Port = 587;
      $this->mail->SMTPAuth = true;
      $this->mail->Username = "davemajster";
      $this->mail->Password = "o8wqdave";
      $this->mail->SetFrom('no@exists.com', 'Admin', FALSE);
      $this->mail->Sender = 'niedobryhacker@gmail.com';
    }

    public function setSubject($subject){
      $this->mail->Subject = $subject;
    }

    public function setMessage($message){
      $this->mail->MsgHTML($message);
    }

    public function addAddress($email){
      $this->mail->AddAddress($email);
    }

    public function send(){
      $ret = $this->mail->Send();
      print_r($this->mail->ErrorInfo);
      return $ret;
    }
  }
