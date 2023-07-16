<?php

function loadView($viewName) {
    $logo = base64Image('images/logo.png');
    $code = Str::startsWith('Code', 'C') ? "Code" : "";
    require "app/views/{$viewName}.php";
}

Route::get('/', function() {
    return loadView('home');
});

Route::get('greeting', function() {
    return "<h1>Welcome Back!</h1>";
});