<?php
//Route::get('/',function (){
//    return view('welcomeController@showWelcome');
//});
//
//Route::get('about',function (){
//    return view('about@showAbout');
//});
//
//Route::get('about/Hi',function (){
//    return "Say Hi";
//});

Route::get("form",function (){
    $_POST['url'] = 'Hi';
   return view('form');
});

Route::post('/',function(){
    return "index";
});