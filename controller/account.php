<?php

  class AccountController {
    public $template = 'register';
    
    public function execute(array $args){
      switch($args['action']){
        case 'login':
          $this->login();
          break;
        case 'register':
          $this->register();
      }

      $accountModel = new AccountModel(); 
      $viewModel = new ViewModel($this->template);
      $viewModel->display();
    }

    public function login(){
      
    }
  }

?>
