<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$id = $_COOKIE['SHS_ID'];
if(empty($id)){
    header("Location: register.php");
    exit;
}
$time = date("H:i:s");
$time = "13:00:00";
if($time >= "06:00:00" && $time <= "12:15:00"){
    // $update = $dbi->query(sprintf("UPDATE `users` SET `morning`=NOW() WHERE (`id`='%s');", $id));
    ?>
    <p>หน้าขอบคุณในการลงทะเบียนช่วงเช้า</p>
    <?php

}elseif($time > "12:15:00" && $time <= "15:30:00"){
    $update = $dbi->query(sprintf("UPDATE `users` SET `afternoon`=NOW() WHERE (`id`='%s');", $id));
    ?>
    <p>หน้าขอบคุณในการลงทะเบียนช่วงบ่าย</p>
    <?php
}

// หัวตื้ออยู่ แต่แพลนไว้คร่าวๆ เอาไว้ว่าในหน้านี้
// รับไอดีเข้ามา
// เช็กเวลาก่อน ถ้ายังเป็นช่วงเช้าก็แจ้งไปว่าขอบคุณที่ลงทะเบียน อย่าลืมลงทะเบียนในช่วงบ่ายเด้อเจ้า

// พอถึงช่วงบ่ายก็เช็กก่อนว่าลงทะเบียนช่วงบ่ายรึยัง ถ้ายังก็ให้กดปุ่ม confirm มีไอคอนโหลด ติ้วๆ 
// เสร็จก็แจ้งว่าอย่าพึ่งกลับเด้อจ้า เดี๋ยวตอนจบงานมีลุ้นของรางวัล

// unset($_COOKIE['SHS_PHONE']); 
// setcookie('SHS_PHONE', null, -1, '/'); 

// unset($_COOKIE['SHS_ID']); 
// setcookie('SHS_ID', null, -1, '/'); 