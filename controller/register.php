<?php

class RegisterController {
    public $template = 'register';
    
    public function execute(array $args){
        $userModel = new UserModel(); 
        $viewModel = new ViewModel($this->template);

        // handle first run before submit
        if(!$_POST){
            $viewModel->display();
            return;
        }

        $fields = array('login','password','password2','email','nick');   
        $good = TRUE;
        foreach($fields as $field)
            if(empty($_POST["$field"])){
            $good = FALSE;
            break;
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $viewModel->assign('error', 'Adres e-mail jest nieprawidłowy');
        } else if($good && $_POST['password'] == $_POST['password2']){
            $newuser = $userModel->register($_POST['login'], $_POST['password'], 
                $_POST['email'], $_POST['nick']);
    
            if($newuser)
                 $viewModel->assign('registered', 1);
            else
                $viewModel->assign('error', $userModel->getError());
        } else 
            $viewModel->assign('error', 'Podane hasła są różne.');  
      

        if(!$good) $viewModel->assign('error', 'Nie wszystkie pola są wypełnione.');

        $viewModel->display();
    }
}


