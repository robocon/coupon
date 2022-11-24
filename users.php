<?php
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$q = $dbi->query("SELECT *,SUBSTRING(`morning`,12) AS `time` FROM `users` WHERE `morning` <> '' GROUP BY `fullname` ORDER BY `type` ASC, `morning` DESC");
$q2 = $dbi->query("SELECT *,SUBSTRING(`afternoon`,12) AS `time` FROM `users` WHERE `afternoon` <> '' GROUP BY `fullname` ORDER BY `type` ASC, `afternoon` DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อผู้เข้าอบรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
    <h3>รายชื่อช่วงบ่าย</h3>
        <div>
            <table class="table table-striped">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">ชื่อ-สกุล</th>
                    <th scope="col">เบอร์โทร</th>
                    <th scope="col">หน่วยงาน</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">เวลาที่เข้าร่วมประชุม</th>
                </tr>
                <?php 
                $ii = 1;
                if ($q2->num_rows > 0) {
                    while ($u2 = $q2->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?=$ii;?></td>
                            <td><?=$u2['yot'].$u2['fullname'];?></td>
                            <td><?=$u2['phone'];?></td>
                            <td><?=$u2['part'];?></td>
                            <td><?=$u2['type'];?></td>
                            <td><?=$u2['time'];?> น.</td>
                        </tr>
                        <?php
                        $ii++;
                    }
                }
                ?>
            </table>
        </div>

        <h3>รายชื่อช่วงเช้า</h3>
        <div>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th scope="col">ชื่อ-สกุล</th>
                    <th scope="col">เบอร์โทร</th>
                    <th scope="col">หน่วยงาน</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">เวลาที่เข้าร่วมประชุม</th>
                </tr>
                <?php 
                $i = 1;
                if ($q->num_rows > 0) {
                    while ($u = $q->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=$u['yot'].$u['fullname'];?></td>
                            <td><?=$u['phone'];?></td>
                            <td><?=$u['part'];?></td>
                            <td><?=$u['type'];?></td>
                            <td><?=$u['time'];?> น.</td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
            </table>
        </div>
        
    </div>
</body>
</html>