<?php

class LogoutController {
    public function execute($args){
        $userModel = new UserModel();
        $userModel->logout();
        header('Location: index.php');
    }
}
