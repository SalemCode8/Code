<?php

class Route{
    public static $validRoutes = [];

    public static function get($route,$function){
        $uri = $_SERVER['REQUEST_URI'];
        $route = rtrim(ltrim($route,"/"),"/");
        $uri = rtrim(ltrim($uri,"/"),"/");
        self::$validRoutes[] = $route;
        if($route == $uri) {
            echo $function->__invoke();
        }

    }
    public static function error($view = null){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = rtrim(ltrim($uri,"/"),"/");
        if(!in_array($uri,self::$validRoutes)){
            header('HTTP/1.0 404 Not Found');
            if($view == null){
                echo "404 Page You Are Looking For Isn't exist";
            }else{
                return view($view);
            }
        }
    }
}