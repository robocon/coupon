<?php 
require_once 'config.php';

$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$id = (int) $_REQUEST['id'];
if(empty($id)){ 
    echo "Invalid ID";
    exit;
}

$sql = sprintf("UPDATE `users` SET `status_coupon` = 'y' WHERE `id` = '%d'", $id);
$q = $dbi->query($sql);
if($q!==false){
    echo "ID: $id Confirm Successful";
}else{
    echo $dbi->error;
}