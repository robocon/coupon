<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$action = sprintf("%s", $_POST['action']);
if($action=='regis'){ 

    $sql_insert = sprintf("INSERT INTO `users` (`phone`, `fullname`, `job`, `part`, `morning`) VALUES ('%s', '%s', '%s', '%s', NOW());", 
        $_POST['phone'], 
        $_POST['fullname'], 
        $_POST['job'], 
        $_POST['part'] 
    );
    $save = $dbi->query($sql_insert);
    $id = $dbi->insert_id;

    // dump($save);

    // ตั้ง cookie เอาไว้ แล้ว redirect ไปหน้า register_confirm.php
    // register_confirm.php จะแบ่งหน้าตามเวลา หลัง 12.30 จะเป็นการ confirm สำหรับช่วงบ่าย 
    // เสร็จก็จะเด้งไปหน้าแจ้งให้อยู่รอจับรางวัล

    setcookie('SHS_ID', $id, time() + (86400 * 30), "/");
    setcookie('SHS_PHONE', $phone, time() + (86400 * 30), "/");

    header("Location: register_confirm.php?id=$id");

    exit;
}

$phone = sprintf("%s", $_REQUEST['phone']);
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
    <div class="container">
        <h1 class="text-center">ฟอร์มลงทะเบียน</h1>
        <div class="alert alert-warning" role="alert">ท่านไม่ได้ลงทะเบียนล่วงหน้า ทางเราขอข้อมูลเพิ่มเติมหน่อยนะคะ</div>
        <form action="register_form2.php" method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="fullname" class="fs-4">ชื่อ-สกุล</label>
                <input type="text" class="form-control form-control-lg" name="fullname" id="fullname" placeholder="กรอกชื่อ-นามสกุล" required>
                <div class="invalid-feedback fs-5">
                    กรุณาใส่ชื่อ-นามสกุล
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="fs-4">เบอร์โทร</label>
                <input type="text" readonly class="form-control-plaintext form-control-lg" id="phone" name="phone" value="<?=$phone;?>">
                <div class="invalid-feedback fs-5">
                    กรุณาใส่เบอร์โทร
                </div>
            </div>
            <div class="form-group">
                <label for="job" class="fs-4">อาชีพ</label>
                <input type="text" class="form-control form-control-lg" name="job" id="job" placeholder="กรอกอาชีพ" required>
                <div class="invalid-feedback fs-5">
                    กรุณาใส่อาชีพ
                </div>
            </div>
            <div class="form-group">
                <label for="part" class="fs-4">หน่วยงาน</label>
                <input type="text" class="form-control form-control-lg" name="part" id="part" placeholder="กรอกหน่วยงาน" required>
                <div class="invalid-feedback fs-5">
                    กรุณาใส่ชื่อหน่วยงาน
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
</body>
</html>