<?php

require_once('class.allegrowebapi.php');

class AllegroFacade {
    private $allegro;
   
    public function __construct($nick = ''){
        define('ALLEGRO_PASSWORD', '');
        define('ALLEGRO_KEY','f8d9ba9e');
        define('ALLEGRO_COUNTRY',1);
        define('ALLEGRO_ID', '0000');
        define('ALLEGRO_LOGIN', $nick);
        $this->allegro = new AllegroWebAPI();
        if(!empty($nick)) $this->setUser($nick);
    }      

    

    public function setUser($nick){
        $id = $this->allegro->GetUserID($nick);
        $this->allegro->setId($id);
        return $id;
    }

    public function getItems($offset = 0, $limit = 16){
        $options['offset'] = $offset;
        $options['limit'] = $limit;
        return $this->allegro->GetUserItems($options);
    }  
}
