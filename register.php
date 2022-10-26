<?php 
require_once 'config.php';
$action = $_POST['action'];
if($action=='regis'){ 
    $dbi = new mysqli(HOST,USER,PASS,DB);
    $sql = sprintf("INSERT INTO `users` (`idcard`, `fullname`, `status_regis`) VALUES ('%s', '%s', 'y');", $_POST['idcard'], $_POST['fullname']);
    $q = $dbi->query($sql);
    if($q===false){
        dump($dbi->error);
        exit;
    }
    $id = $dbi->insert_id;
    $_SESSION['resMsg'] = 'บันทึกข้อมูลเรียบร้อย';
    header("Location: print_coupon.php?id=$id");
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
    /* #idcard:invalid {
        border: 2px dashed red;
    } */
    </style>
    <div class="container">
        <h3>ฟอร์มลงทะเบียน</h3>
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
                <label for="idcard">เลขบัตรประชาชน</label>
                <input type="number" class="form-control" name="idcard" id="idcard" placeholder="กรอกเลขบัตรประชาชน" required>
                <div class="invalid-feedback">
                    กรุณาใส่เลขบัตรประชาชน
                </div>
            </div>
            <div class="form-group">
                <label for="fullname">ชื่อ-สกุล</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="กรอกชื่อ-นามสกุล ไม่ต้องมีคำนำหน้าชื่อ" required>
                <div class="invalid-feedback">
                    กรุณาใส่ชื่อ-นามสกุล
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">ลงทะเบียน</button>
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