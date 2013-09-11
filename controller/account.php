<?php

class AccountController {
    private $template = 'login';

    public function execute(array $args){
        $userModel = new UserModel(); 
        $viewModel = new ViewModel($this->template);

        if($user = $userModel->logged()){
            $this->template = 'account';
            $viewModel->assign('user', $user);
        } else if(!$_POST){
            $viewModel->display();
            return;
        } else if(isset($_POST['login']) && isset($_POST['password'])){
            if($user = $userModel->login($_POST['login'], $_POST['password'])){
                $this->template = 'account';
                $viewModel->assign('user', $user);
            } else
                $viewModel->assign('error', $userModel->getError());
        } else $viewModel->assign('error', 'Pola nie mogą być puste.');

        $viewModel->setTemplate($this->template);
        $viewModel->display();
    }
}
