<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");
$q = $dbi->query("SELECT * FROM `users` WHERE `status_regis` IS NULL");
$users1 = $q->fetch_all(MYSQLI_ASSOC);

$q2 = $dbi->query("SELECT * FROM `users` WHERE `status_regis` IS NOT NULL");
$users2 = $q2->fetch_all(MYSQLI_ASSOC);

$users = array_merge($users1, $users2);

foreach($users AS $user){
    $regis = '';
    if($user['status_regis']){
        $regis = '<i class="fas fa-user-check me-2 text-success"></i>';
    }

    $coupon = '';
    if($user['status_coupon']){
        $coupon = '<i class="fas fa-utensils me-2 text-success"></i>';
    }
    ?>
    <li class="list-group-item">
        
        <span class="me-2 fs-2"><?=$user['fullname'];?></span>
        <span><?=$regis.$coupon;?></span>

        <div class="float-end">
            <a class="btn btn-success btn-sm print-sticker fs-4" data-id="<?=$user['id'];?>" href="javascript:void(0);" role="button">ลงทะเบียนและรับคูปอง</a>
        </div>
    </li>
    <?php
}