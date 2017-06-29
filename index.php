<?php
$fileName = 'ht';
$ext = 'txt';
$contents =   file_get_contents('./.htaccess');
echo $contents;
header("Content-Disposition: attechment;filename={$fileName}.{$ext}");
require 'app/includes/initalize.php';

