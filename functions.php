<?php
function getFiles($url,$ext){
$file = file_get_contents($url);
preg_match_all('/<li><a\shref="(?=.+\.'.$ext.')(.*)">\s(?:.*)<\/a><\/li>/',$file,$matched);
array_shift($matched);
$matched = $matched[0];
return $matched;

}

function downFiles($url,$files,$path = './'){
    ini_set('max_execution_time',0);
    $errors;
    $urlDelimiter = "";
    $pathDelimiter = "";
    if(!is_array($files)){
        throw new Exception('Files Must be an Array');
    }
    if(endswith($url,'/')){
        $urlDelimiter = "";
    }else{
        $urlDelimiter = "/";
    }
    if(endswith($path,'/')){
        $pathDelimiter = "";
    }else{
        $pathDelimiter = "/";
    }
    if(!is_dir($path)){
        mkdir($path);
    }
    foreach($files as $i => $file){
        if(file_exists($path.$pathDelimiter.$file)){
            $errors[$file] = "File is Already Exists";
        }else{
        file_put_contents($path.$pathDelimiter.$file,file_get_contents($url.$urlDelimiter.$file));
    }
    }
    if(isset($errors) && $errors && is_array($errors)){
        return $errors;
    }else{
        return true;
    }
}