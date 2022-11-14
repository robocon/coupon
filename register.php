<?php 
require_once 'config.php';
$action = $_POST['action'];

/**
 * REQUIREMENT ใหม่
 * [] ให้ยืนยันการลงทะเบียนจาก เบอร์โทรก่อน
 * ถ้ามีข้อมูลอยู่แล้วก็ถือว่าลงทะเบียนเสร็จเรียบร้อย
 * [] ถ้ายังไม่มีข้อมูลในระบบให้ใส่ ชื่อสกุล อาชีพ หน่วยงาน อะไรประมาณนี้
 */

// ไอเดียคือ
// อยากให้มันเด้งไปหน้าหน้าหนึ่งที่มีการตั้ง cookie เอาไว้แล้วว่าคนคนนี้เนี่ยลงทะเบียนเรียบร้อยแล้วนะ

// ที่หน้าจอมือถืออยากให้มีแค่ปุ่ม ปุ่มเดียวว่า ยืนยันการลงทะเบียนช่วงเช้า กับ ยืนยันการลงทะเบียนช่วงบ่าย



if($_COOKIE['SHS_ID']){
    // $check_phone = $_COOKIE['SHS_PHONE'];
    // $sql = sprintf("SELECT `id`,`phone`,`fullname`, `status_regis` WHERE `phone` = '%s';", $check_phone);
    $id = $_COOKIE['SHS_ID'];
    header("Location: register_confirm.php?id=$id");
    exit;
}

if($_COOKIE['SHS_COUPON']){
    // $id = $_COOKIE['SHS_COUPON'];
    // unset($_SESSION['resMsg']);
    // header("Location: print_coupon.php?id=$id");
    // exit;
}

if($action=='regis'){ 
    $dbi = new mysqli(HOST,USER,PASS,DB);
    $dbi->query("SET NAMES UTF8");

    $phone = sprintf("%s", $_POST['phone']);
    $q = $dbi->query("SELECT `id` FROM `users` WHERE `phone` = '$phone' ");
    if($q->num_rows > 0){
        // มี user 

        $sql_update = "UPDATE `users` SET `number`=NULL, 
        `phone`='2508544928', 
        `fullname`='นรุตมา วัชรกิจ', 
        `job`=NULL, 
        `part`=NULL, 
        `morning`=NULL, 
        `afternoon`=NULL, 
        `status_regis`='y', 
        `status_coupon`= NULL 

        WHERE (`id`='1');";

    }else{
        header("Location: register_form2.php?phone=$phone");
        exit;
    }
    // $sql = sprintf("INSERT INTO `users` (`phone`, `fullname`, `status_regis`) VALUES ('$phone', '%s', 'y');", $_POST['fullname']);
    // dump($sql);
    
    // $q = $dbi->query($sql);
    // if($q===false){
    //     dump($dbi->error);
    //     exit;
    // }
    // $id = $dbi->insert_id;

    // setcookie('SHS_COUPON', $id, time() + (86400 * 30), "/");
    // setcookie('SHS_PHONE', $phone, time() + (86400 * 30), "/");

    // $_SESSION['resMsg'] = 'บันทึกข้อมูลเรียบร้อย';
    // header("Location: print_coupon.php?id=$id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>
</head>
<body>
    <style>
    /* #phone:invalid {
        border: 2px dashed red;
    } */
    </style>
    <div class="container">
        <h1 class="text-center">ฟอร์มลงทะเบียน</h1>
        <?php 
        if(!empty($_SESSION['resMsg'])){
            ?>
            <div class="alert alert-success" role="alert"><?=$_SESSION['resMsg'];?></div>
            <?php
            unset($_SESSION['resMsg']);
        }
        ?>
        <form action="register.php" method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="phone" class="fs-4">เบอร์โทร</label>
                <input type="number" class="form-control form-control-lg" name="phone" id="phone" placeholder="ใส่เบอร์โทรไม่ต้องมีขีด" required>
                <div class="invalid-feedback fs-5">
                    กรุณาใส่เบอร์โทร
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-2 form-control-lg">ลงทะเบียน</button>
            </div>
            
            <input type="hidden" name="action" value="regis">
        </form>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>


<!-- 
<div class="form-group">
                <label for="fullname" class="fs-4">ชื่อ-สกุล</label>
                <input type="text" class="form-control form-control-lg" name="fullname" id="fullname" placeholder="กรอกชื่อ-นามสกุล" required>
                <div class="invalid-feedback fs-5">
                    กรุณาใส่ชื่อ-นามสกุล
                </div>
            </div>
            <div class="form-group">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Symposium 1</label>

                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">Symposium 2</label>
            </div> -->


</body>
</html>