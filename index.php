<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$q = $dbi->query("SELECT * FROM `users` WHERE `status_regis` IS NULL");
$users1 = $q->fetch_all(MYSQLI_ASSOC);

$q2 = $dbi->query("SELECT * FROM `users` WHERE `status_regis` IS NOT NULL");
$users2 = $q2->fetch_all(MYSQLI_ASSOC);

$users = array_merge($users1, $users2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนและรับคูปองอาหาร - ประชุมวิชาการโรงพยาบาลค่ายสุรศักดิ์มนตรี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>
</head>
<body>
    
<nav class="navbar fixed-top bg-light">
    <div class="container-fluid">
        <form class="d-flex w-100" role="search" id="formSearch" action="javascript:void(0);">
            <div class="input-group">
                <input type="text" class="form-control" name="search" id="search" autocomplete="off" placeholder="ค้นหาจากเลขบัตรประชาชน หรือ ชื่อ-นามสกุล">
                <button type="button" class="btn bg-transparent" id="btnClose" style="margin-left: -40px; z-index: 100;">
                <i class="fa fa-times"></i>
                </button>
            </div>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-2">
            <div class="sticky-top pt-5">
                <p><img src="images/qrcode-regis.png" alt="qr code for register" class="align-self-center w-100"></p>
                <p class="text-center"><a href="<?='http://'.$_SERVER['HTTP_HOST'].(!empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '' ).'register.php';?>" target="_blank">ลงทะเบียนเพิ่มเติม</a></p>
            </div>
        </div>
        <div class="col-8">
            
            <ul class="list-group">
                <?php 
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
                        
                        <span class="me-2"><?=$user['fullname'];?></span>
                        <span><?=$regis.$coupon;?></span>

                        <div class="float-end">
                            <span><i class="fas fa-sync fa-spin me-2"></i></span>
                            <a class="btn btn-success btn-sm print-sticker" data-id="<?=$user['id'];?>" href="javascript:void(0);" role="button">ลงทะเบียนและรับคูปอง</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </div>
        <div class="col-2">
            <div class="sticky-top pt-5">
                <!-- <p><img src="images/qrcode-regis.png" alt="qr code for register" class="align-self-center w-100"></p>
                <p class="text-center">...</p> -->
            </div>
        </div>
    </div>
</div>

<script>

    // enter เลขบัตรประชาชน+ชื่อสกุล
    document.getElementById('formSearch').addEventListener('submit',()=>{ 
        document.getElementById('searchTxt').value="";
    });

    var elements = document.getElementsByClassName('print-sticker');

    var myFunction = function() {
        var id = this.getAttribute("data-id");
        var w = window.open('print_coupon.php?id='+id,'Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=300,left = 312,top = 234');
        // this.target = 'Popup_Window';
        // w.print();
        // w.close();

    };

    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', myFunction, false);
    }


    document.getElementById("btnClose").onclick = function(){
        document.getElementById("search").value = '';
    }

    document.getElementById("formSearch").onsubmit = function(){
        
        var s = document.getElementById("search");
        // เอา value

        alert(s.value);

        // search เสร็จแล้วเคลียร์ค่าออกไป
        s.value = '';

    }

    // var myFormXray = document.getElementById('formIDXray');
    // myFormXray.onsubmit = function() {
    //     var w = window.open('about:blank','Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=300,left = 312,top = 234');
    //     this.target = 'Popup_Window';
    // };
    

</script>
</body>
</html>