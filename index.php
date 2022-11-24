<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$time = date("H:i:s");

if($time <= "12:00:00"){

    $q = $dbi->query("SELECT `id`,`phone`,`fullname`,`job`,`part`,`morning` FROM `users` WHERE `type`='onsite' AND `morning` IS NULL ORDER BY `fullname` ASC");
    // $q2 = $dbi->query("SELECT `id`,`phone`,`fullname`,`job`,`part`,`morning` FROM `users` WHERE `morning` IS NOT NULL");
    
    $title = "ลงทะเบียนประชุมวิชาการช่วงเช้า";

}elseif($time > "12:00:00"){

    $q = $dbi->query("SELECT `id`,`phone`,`fullname`,`job`,`part`,`afternoon` 
    FROM `users` 
    WHERE `type`='onsite' 
    AND `afternoon` IS NULL 
    GROUP BY `fullname` 
    ORDER BY `fullname` ASC");
    // $q2 = $dbi->query("SELECT `id`,`phone`,`fullname`,`job`,`part`,`afternoon` FROM `users` WHERE `afternoon` IS NOT NULL");

    $title = "ลงทะเบียนประชุมวิชาการช่วงบ่าย";

}

$users = $q->fetch_all(MYSQLI_ASSOC);
// $users2 = $q2->fetch_all(MYSQLI_ASSOC);

// $users = array_merge($users1, $users2);

//  แยกการทำงานระหว่างตู้ kiosk กับ ลงทะเบียนผ่านมือถือ ออกจากกันไปเลยดีกว่า จะได้ไม่สับสนการทำงาน !!!
// - ตู้ มันจะฝัง id ตามปุ่มที่กดไว้อยู่แล้ว ก็กดๆ ไปได้เลยแค่เช็กตามเวลาเฉยๆ

// การลงทะเบียนจะแบ่งออกเป็น2ช่วงคือ
// ช่วงเช้า
// กับช่วงบ่าย

// ทีนี้ในฐานข้อมูลก็ต้องปรับให้เก็บเวลาเป็น2ช่วงเหมือนกัน
// morning
// afternoon
/*
background-image: url(images/bg-a4-01.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 800px;
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เซ็นชื่อเข้างาน - ประชุมวิชาการโรงพยาบาลค่ายสุรศักดิ์มนตรี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>
</head>
<body>
<style>
    body{
        background-image: url(images/bg-a4-01.jpg);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 800px;
    }
</style>
<nav class="navbar fixed-top bg-success justify-content-center" style="--bs-bg-opacity: 1;">
    <div class="row justify-content-center">
        <h1 class="text-white"><?=$title;?></h1>
    </div>
    <div class="container-fluid">
        <form class="d-flex w-100" role="search" method="post" name="formSearch" id="formSearch" action="javascript:void(0);">
            <div class="input-group">
                <input type="text" class="form-control form-control-lg" name="search" id="search" autocomplete="off" placeholder="ค้นหาจากเบอร์โทร" onclick="popNumber()">

                <button type="button" class="btn btn-light" id="btnClose" >
                    <i class="fa fa-times"></i>
                </button>
                <button class="btn btn-secondary" type="button" id="button-addon2" onclick="findNumber()"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</nav>
<div class="container" style="margin-top: 8em;">
    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-1" style="min-height: 800px;">
            <div class="position-sticky top-50 start-0 translate-middle">
                <!-- <img src="images/LogoFSH.jpg" class="img-fluid"> -->
            </div>
        </div>
        <div class="col-10">
            <div id="main-content">
                <ul class="list-group" id="show-all-user">
                    <?php 
                    
                    foreach($users AS $user){
                        $regis = '';
                        if($user['morning']){
                            $regis = '<i class="fas fa-user-check me-2 text-success"></i>';
                        }

                        $coupon = '';
                        if($user['afternoon']){
                            $regis = '<i class="fas fa-user-check me-2 text-success"></i>';
                        }
                        ?>
                        <li class="list-group-item bg-transparent">
                            
                            <span class="me-2 fs-1"><?=$user['fullname'];?></span>
                            <span><?=$regis.$coupon;?></span>

                            <div class="float-end">
                                <span class="spinner-border spinner-border-sm" id="spinner<?=$user['id'];?>" role="status" aria-hidden="true" style="display:none"></span>
                                <a class="btn btn-success btn-lg fs-1 print-sticker fs-4" data-id="<?=$user['id'];?>" href="javascript:void(0);" role="button" onclick="testRegister('<?=$user['id'];?>')" >ลงทะเบียน</a>
                            </div>
                        </li>
                        <?php
                    }
                    
                    ?>
                </ul>
            </div>
            <div id="sub-content">
                <ul class="list-group" id="show-sub-content">
                <ul>
            </div>
        </div>
        <div class="col-1">
            <div class="sticky-top pt-5">
                <!-- <p><img src="images/qrcode-regis.png" alt="qr code for register" class="align-self-center w-100"></p>
                <p class="text-center">...</p> -->
            </div>
        </div>
    </div>
</div>
<!-- กดเลข -->
<div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ค้นหาจากเบอร์โทร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row gap-2" style="margin-top:1em;">
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(1)">1</button>
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(2)">2</button>
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(3)">3</button>
                    </div>
                    <div class="row gap-2" style="margin-top:1em;">
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(4)">4</button>
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(5)">5</button>
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(6)">6</button>
                    </div>
                    <div class="row gap-2" style="margin-top:1em;">
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(7)">7</button>
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(8)">8</button>
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(9)">9</button>
                    </div>
                    <div class="row gap-2" style="margin-top:1em;">
                        <div class="col"></div>
                        <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(0)">0</button>
                        <button type="button" class="col btn btn-light btn-lg text-danger" onclick="removeValue()">ลบ</button>
                    </div>
                    <div class="row gap-2" style="margin-top:1em;">
                        <button type="button" class="col btn btn-success btn-lg" id="testSearchNum" onclick="searchNum()">ค้นหา</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- แจ้งเตือนลงทะเบียนสำเร็จ -->
<div id="notify-register-success" style="display:none; position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: #0000006e;z-index: 99;">
    <div style="position: absolute;padding: 2em;background-color: #ffffff;border-radius: 14px;top: 50%;left: 50%;text-align: center;transform: translate(-50%, -50%);">
        <div>
            <h1>ดำเนินการลงทะเบียนเรียบร้อย</h1>
        </div>
    </div>
</div>
<script>

    const myModal = new bootstrap.Modal(document.getElementById('exampleModal'),{
        keyboard: true, 
        backdrop: false
    });

    function setValue(id){ 
        var s = document.getElementById("search");
        s.value+=id;
    }

    function removeValue(){
        // var num = opener.document.formSearch.search.value;
        var s = document.getElementById("search");
        var num = s.value.slice(0, -1);
        s.value=num;
    }

    function searchNum(){
        var num = document.getElementById("search").value;
        find_user(num);
        myModal.hide();
    }

    /**
     * 
     * เรื่องการให้ js อ่าน qr code
     * https://minhazav.medium.com/qr-code-scanner-using-html-and-javascript-3895a0c110cd
     * 
     */

    // loadPage();
    
    // คลิกที่ปุ่มลงทะเบียน
    function testRegister(id){
        
        document.getElementById("spinner"+id).style.display = '';
        console.log('before sendData '+id);

        setTimeout(() => { 

            sendData(id).then(()=>{
                setTimeout(() => {
                    location.reload();
                }, 1500);
            });

            
        
        }, 500);


    }

    async function sendData(id){ 

        const response = await fetch('register_kiosk.php', {
            method: 'POST',
            headers: { 
                'Content-type': 'application/x-www-form-urlencoded' 
            },
            body: JSON.stringify({'id': id})
        });
        var body = await response.text();

        var res = JSON.parse(body);
        console.log(res);
        if(res.data == "success"){
            document.getElementById("notify-register-success").style.display = '';

            setTimeout(() => {
                document.getElementById("notify-register-success").style.display = 'none';
            }, 1500);


            document.getElementById("spinner"+id).style.display = 'none';
            console.log('after update  register_kiosk.php get ID='+id);

        }

    }

    async function loadPage(){ 
        let response = await fetch('show_all_user.php');
        document.querySelector('#show-all-user').innerHTML = await response.text();

        var elements = document.getElementsByClassName('print-sticker');
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', myFunction, false);
        }

        document.getElementById("sub-content").style.display = 'none';
        document.getElementById("main-content").style.display = '';
        document.getElementById("search").value = '';
    }

    async function testAlert(){
        var elements = document.getElementsByClassName('print-sticker');

        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', myFunction, false);
        }
    }

    
    var myFunction = async function() { 

        // แจ้งว่าลงทะเบียนเรียบร้อย
        var id = this.getAttribute("data-id");
        console.log(id);
        document.getElementById("spinner"+id).style.display = '';

        // var Popup_Window = window.open('print_coupon.php?id='+id,'Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=500,left = 312,top = 234');
        // this.target = 'Popup_Window';
        // Popup_Window.addEventListener('load', function(){
            // Popup_Window.print();
            // Popup_Window.close();

            // loadPage().then(testAlert);
            // loadPage();

        // }, false);

        // const response = await fetch('register_kiosk.php', {
        //     method: 'POST',
        //     headers: { 
        //         'Content-type': 'application/x-www-form-urlencoded' 
        //     },
        //     body: JSON.stringify({'id': id})
        // });
        // var body = await response.text();
        // var res = JSON.parse(body);

        // if(res.data=='success'){ 
        //     document.getElementById("spinner"+id).style.display = 'none';
        //     // loadPage();
        // }
    };

    // ฟอร์มค้นหา
    document.getElementById("btnClose").onclick = function(){
        document.getElementById("search").value = '';
        
        document.getElementById("sub-content").style.display = 'none';
        document.getElementById("main-content").style.display = '';
    }
    
    async function find_user(val){
        if(val.length >= 3){ 
            document.getElementById("main-content").style.display = 'none';

            var response = await fetch('find_user.php?search='+val);

            var body = await response.text();
            document.getElementById("show-sub-content").innerHTML = body;
            document.getElementById("sub-content").style.display = '';
        }else{

            document.getElementById("sub-content").style.display = 'none';
            document.getElementById("main-content").style.display = '';

        }
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    }

    document.getElementById("search").addEventListener("input", (e)=>{
        find_user(e.target.value);
    });

    document.getElementById("formSearch").addEventListener("submit", (e)=>{
        var num = document.getElementById("search").value;
        find_user(num);
    });

    function submitForm(){
        // alert(1234);
        // document.getElementById("formSearch").submit();
    }
    

    function findNumber(){
        var num = document.getElementById("search").value;
        find_user(num);
    }

    function popNumber(){ 
        
        myModal.show();
        
        // var myWindow = window.open("number.php", "myWindow", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,top=600,left=0,width=300,height=300");
    }

    // var sec = 1000;
    // var min = 60 * sec;
    // setInterval(() => {
    //     // loadPage();
    // }, (min * 3));

</script>
</body>
</html>