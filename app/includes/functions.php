<?php
function __autoload($className){
    if(file_exists('app/' . $className . '.php')){
        require 'app/' . $className . '.php';
    }else if (file_exists('controllers/' . $className . '.php')){
        require 'controllers/' . $className . '.php';
    }
}
function view($view){
    if(preg_match('/\w@\w/i',$view)){
        $contollerNameEnd = strpos($view,'@');
        $contollerName = substr($view,0,$contollerNameEnd);
        $viewName = substr($view,$contollerNameEnd +1,strlen($view));
        return new $contollerName->$viewName();
    }else{
        $dir = new RecursiveDirectoryIterator('./views/',FilesystemIterator::SKIP_DOTS);
        foreach ($dir as $file){
            $fileName = $file->getBasename('.'.$file->getExtension());
            if($fileName == $view){
                require './views/'.$file->getBasename();
                return true;
            }

        }
        $error = <<<EOT
<style>
    div{
        text-align: center;
        margin-top: 70px;
    }
    h1{
        background: #888;
        display: inline;
        padding: 20px;
        color: #fff;


    }
    span{
        color: #900;
    }
</style>
<div>
    <h1><span>Fetal Error:</span> View $view You are looking for isn't exist Please make sure it's Exist then call it</h1>
</div>
EOT;
echo $error;
        return false;
    }
}
function splitUrl(){
    if(isset($_GET['url']) && strpos($_GET['url'],'/') != false){

        $urls = explode('/',$_GET['url']);
        unset($_GET['url']);
        $urlNum = 0;
        foreach ($urls as $url) {
            $param = '';
            if($urlNum == 0){$param = 'view';}
            elseif (count($urls) == 2 && $urlNum == 1) {$param = 'action';}
            else{$param = "action{$urlNum}";}
            $_GET["$param"] = $url;
            $urlNum++;
        }
    }
}

