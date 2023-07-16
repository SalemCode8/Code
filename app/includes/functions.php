<?php
function __autoload($className){
    global $container;

    if(file_exists(__DIR__.'/../classes/' . $className . '.php')){
        $container->bind($className, require __DIR__.'/../classes/' . $className . '.php');
        $container->get($className);
    }else if (file_exists(__DIR__.'/../controllers/' . $className . '.php')){
        $container->bind($className, require __DIR__.'/../controllers/' . $className . '.php');
        $container->get($className);
    }
}

function base64Image($path){
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $file = file_get_contents($path);

    return 'data:image/' . $type . ';base64,' . base64_encode($file);
}
