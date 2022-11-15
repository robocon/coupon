<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$search = $_REQUEST['search'];
$sql = sprintf("SELECT * FROM `users` WHERE `phone` LIKE '%s%%' OR `fullname` LIKE '%%%s%%' ", $_REQUEST['search'], $_REQUEST['search']);
$q = $dbi->query($sql);
if ($q->num_rows > 0) {
    while ($user = $q->fetch_assoc()) {
        $regis = '';
        if($user['morning']){
            $regis = '<i class="fas fa-user-check me-2 text-success"></i>';
        }

        $coupon = '';
        if($user['afternoon']){
            $coupon = '<i class="fas fa-utensils me-2 text-success"></i>';
        }
        ?>
        <li class="list-group-item">
            <span class="me-2 fs-2"><?=$user['fullname'];?></span>
            <span><?=$regis.$coupon;?></span>
            <div class="float-end">
            <span class="spinner-border spinner-border-sm" id="spinner<?=$user['id'];?>" role="status" aria-hidden="true" style="display:none"></span>
                <a class="btn btn-success btn-sm print-sticker fs-4" data-id="<?=$user['id'];?>" href="javascript:void(0);" onclick="testRegister('<?=$user['id'];?>')" role="button">ลงทะเบียน</a>
            </div>
        </li>
        <?php
    }
}