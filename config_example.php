<?php 
session_start();

define('HOST', 'localhost');
define('PORT', '3306');
define('DB', 'test');
define('USER', 'test');
define('PASS', '1234');

function dump($txt){
    echo "<pre>";
    var_dump($txt);
    echo "</pre>";
}
