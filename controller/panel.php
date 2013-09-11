<?php

class PanelController {
    public function execute($args){
        $userModel = new UserModel();
        $viewModel = new ViewModel('panel');
        $user = $userModel->logged();
        $allegro = new AllegroFacade($user['nick']);
        
        $viewModel->assign('items', $allegro->getItems());

        $viewModel->display();
    }
}
