<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$search = $_REQUEST['search'];

$time = date("H:i:s");
$sql = sprintf("SELECT * FROM `users` WHERE `phone` LIKE '%s%%' AND `type`='onsite' ", $_REQUEST['search']);

$q = $dbi->query($sql);
if ($q->num_rows > 0) {
    while ($user = $q->fetch_assoc()) {
        $regis = '';

        if($time >= "06:00:00" && $time <= "12:15:00"){

            if($user['morning']){
                $regis = '<i class="fas fa-user-check me-2 text-success"></i>';
            }

        }elseif($time > "12:15:00" && $time <= "15:30:00"){
            if($user['afternoon']){
                $regis = '<i class="fas fa-user-check me-2 text-success"></i>';
            }
        }
        
        ?>
        <li class="list-group-item bg-transparent">
            <span class="me-2 fs-1"><?=$user['fullname'];?></span>
            <span><?=$regis;?></span>
            <div class="float-end">
            <span class="spinner-border spinner-border-sm" id="spinner<?=$user['id'];?>" role="status" aria-hidden="true" style="display:none"></span>
                <a class="btn btn-success btn-lg print-sticker fs-4" data-id="<?=$user['id'];?>" href="javascript:void(0);" onclick="testRegister('<?=$user['id'];?>')" role="button">ลงทะเบียน</a>
            </div>
        </li>
        <?php
    }
}