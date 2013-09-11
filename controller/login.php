<?php

class LoginController {
    public $template = 'login';
    
    public function execute(array $args){
        $userModel = new UserModel(); 
        $viewModel = new viewModel($this->template);
	
        if($userModel->logged()) $viewModel->setTemplate('account');
      
        if(!$_POST){
            $viewModel->display();
            return;
        }

        else if(isset($_POST['login']) && isset($_POST['password'])){
            if($userModel->login($_POST['login'], $_POST['password']))   
                $viewModel->setTemplate('account');           
            else
                $viewModel->assign('error', $userModel->getError());
        } else $viewModel->assign('error', 'Pola nie mogą być puste.');

        $viewModel->display();
    }
}
