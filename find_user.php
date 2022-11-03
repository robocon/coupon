<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

dump($_REQUEST);

$search = $_REQUEST['search'];
$sql = sprintf("SELECT * FROM `users` WHERE `idcard` = '%s' OR `name` LIKE '%%%s%%' ", $_REQUEST['search'], $_REQUEST['search']);

dump($sql);