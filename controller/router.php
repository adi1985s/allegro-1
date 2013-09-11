<?php
    spl_autoload_register('autoloader');

    function autoloader($class){
        list($filename, $suffix) = 
        preg_split('/(?=[A-Z])/', $class, -1, PREG_SPLIT_NO_EMPTY);

        switch(strtolower($suffix)){
            case 'model': 
                $directory = 'model/'; break;
            case 'driver':
            default:
                $directory = 'lib/';
        }

        $file = $directory . strtolower($filename) . '.php';

        if(file_exists($file))
            include_once($file);
        else
            die("File '$file' containing class '$class' not found!");
    }

    $request = $_SERVER['QUERY_STRING'];
  
    $parsed = explode('&', $request);
    $page = array_shift($parsed);

    $page = $page == '' ? 'login' : $page;

    $args = array();
    foreach($parsed as $argument){
        list($varible, $value) = preg_split('/=/', $argument);
        $args[$varible] = $value;
    }  
  
    $target = 'controller/' . $page . '.php';
    if(file_exists($target)){
        include_once($target);
        $class = ucfirst($page) . 'Controller';
    
        if(class_exists($class))
            $controller = new $class;
        else
            die('class does not exist!');

    } else
        die('page does not exist');

    $controller->execute($args);
?>
