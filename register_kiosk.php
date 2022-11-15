<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$id = $data['id'];

$time = date("H:i:s");
if($time >= "06:00:00" && $time <= "12:15:00"){
    $update = $dbi->query(sprintf("UPDATE `users` SET `morning`=NOW() WHERE (`id`='%s');", $id));

}elseif($time > "12:15:00" && $time <= "15:30:00"){
    $update = $dbi->query(sprintf("UPDATE `users` SET `afternoon`=NOW() WHERE (`id`='%s');", $id));

}

$res = array('data'=>'success');

header('Content-Type: application/json');
echo json_encode($res);