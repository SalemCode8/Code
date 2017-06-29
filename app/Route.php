<?php

class Route{
    public static $vaildRoutes = [];
    public static function get($route,$function){
        $url ='';
//        if(strlen($route) > 2 && strpos($route,'/',0) == 1){ $route = str_replace('/','',$route);}
        self::$vaildRoutes[] = $route;
        if(!isset($_GET['url'])){
            $_GET['url'] = '/';
        }
        if($_GET['url'] == $route){
            echo $function->__invoke();
        }
    }
    public static function post($route,$function){
        self::$vaildRoutes[] = $route;
        if(!isset($_GET['url'])){
            $_GET['url'] = '/';
        }
        if($_GET['url'] == $route){
            $_SERVER['REQUEST_METHOD'] = 'POST';
            echo $function->__invoke();
        }
    }
    public static function error($error,$function = null){
        if($error == 404){
            if(!isset($_GET['url'])){$_GET['url'] = 'index.php';}

            if(!in_array($_GET['url'],self::$vaildRoutes)){
                if($function==null){return view($_GET['url']);}
                $function->__invoke();
            }
        }
    }
}