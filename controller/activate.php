<?php

class ActivateController {
    public function execute($params){
        $userModel = new UserModel();
        $viewModel = new ViewModel("activate");
        if(!$userModel->activate($params['id']))
            $viewModel->assign('error', 'Nieprawidłowy identyfikator!');

        $viewModel->display();
    }
}
