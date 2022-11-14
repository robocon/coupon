<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");


$q = $dbi->query("SELECT * FROM `users` WHERE `morning` IS NULL");
$users1 = $q->fetch_all(MYSQLI_ASSOC);

$q2 = $dbi->query("SELECT * FROM `users` WHERE `morning` IS NOT NULL");
$users2 = $q2->fetch_all(MYSQLI_ASSOC);

$users = array_merge($users1, $users2);

foreach($users AS $user){
    $regis = '';
    if($user['morning']){
        $regis = '<i class="fas fa-user-check me-2 text-success"></i>';
    }

    $coupon = '';
    if($user['afternoon']){
        $coupon = '<i class="fas fa-utensils me-2 text-success"></i>';
    }
    ?>
    <li class="list-group-item align-middle">
        
        <span class="me-2 fs-2"><?=$user['fullname'];?></span>
        <span><?=$regis.$coupon;?></span>

        <div class="float-end">
            <span class="spinner-border spinner-border-sm" id="spinner<?=$user['id'];?>" role="status" aria-hidden="true" style="display:none"></span>
            <a class="btn btn-success btn-sm print-sticker fs-4" data-id="<?=$user['id'];?>" href="javascript:void(0);" role="button">ลงทะเบียน</a>
        </div>
    </li>
    <?php
}