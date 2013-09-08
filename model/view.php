<?php

  class ViewModel {
    private $data;
    private $render = FALSE;
    
    public function __construct($template){
      $file = 'view/'.strtolower($template).'.php';
      if(file_exists($file))
        $this->render = $file;
    }
    
    public function assign($varible, $value){
      $this->data[$varible] = $value;
    }

    public function display($direct_output = TRUE){
      if($direct_output !== TRUE) ob_start();
      $data = $this->data;
      
      include('view/header.php');      
      include($this->render);
      include('view/footer.php');
      
      if($direct_output !== TRUE) return ob_get_clean();
    }
    
    public function __destruct(){
    }
  }

?>
