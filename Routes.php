<?php


Route::get('/', function() {
    $logo = base64Image('images/logo.png');
    $code = Str::startsWith('Code', 'C') ? "Code" : "";
    $markup = <<<DOC
    <div style="text-align:center">
    <h1>Welcome In {$code} Framework</h1>
    <span style="font-size:2em;display:block;">This Framework Made By <span style="color: red">&#9829;</span> and </span>
    <img width="200px" src='$logo'>
    </div>
DOC;

    return $markup;
});

Route::get('greeting', function() {
    return "<h1>Welcome Back!</h1>";
});