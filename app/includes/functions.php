<?php
function __autoload($className){
    if(file_exists(__DIR__.'/../classes/' . $className . '.php')){
        require __DIR__.'/../classes/' . $className . '.php';
    }else if (file_exists(__DIR__.'/../controllers/' . $className . '.php')){
        require __DIR__.'/../controllers/' . $className . '.php';
    }
}

function base64Image($path){
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $file = file_get_contents($path);

    return 'data:image/' . $type . ';base64,' . base64_encode($file);
}

