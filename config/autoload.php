<?php
    spl_autoload_register(function($className){
        $path = strtolower("classes/".$className). ".php";
        if(!file_exists($path)){
            require_once($path);
        }else{
            echo "File $path is not available.";
        }
    })

?>