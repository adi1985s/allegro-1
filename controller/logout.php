<?php

class LogoutController {
    public function execute($params){
        $userModel = new UserModel();
        $viewModel = new ViewModel("login");

        $userModel->logout();

        $viewModel->display();
    }
}
