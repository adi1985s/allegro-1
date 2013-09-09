<?php

  class LoginController {
    public $template = 'login';
    
    public function execute(array $args){
      $userModel = new UserModel(); 
      $viewModel = new ViewModel($this->template);

      if(isset($_POST['login']) && isset($_POST['password'])){
        if($userModel->login($_POST['login'], $_POST['password']))
          $viewModel->assign('logged', 1);
        else
          $viewModel->assign('error', 'Błędne dane. Spróbuj ponownie.');
      }

      $viewModel->display();
    }
  }

?>
