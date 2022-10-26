<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);

$dbi->query(sprintf("UPDATE `users` SET `status_regis` = 'y' WHERE `id` = '%s'", $_GET['id']));

$sql = sprintf("SELECT `id`,`fullname` FROM `users` WHERE `id` = '%s' ", $_GET['id']);
$q = $dbi->query($sql);
$user = $q->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คูปองอาหาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>
</head>
<body>
<?php 
$id = $_REQUEST['id'];
?>
<div class="card" style="width: 300px;">
  <img class="card-img-top align-self-center" src="images/2081949.png" alt="คูปองรับประทานอาหารทางวัน" style="width: 180px;">
  <div class="card-body">
    <h5 class="card-title text-center">คูปองอาหารกลางวัน</h5>
    <!-- <p class="card-text text-center">คูปองรับประทานอาหารกลางวัน</p> -->
    <p class="card-text text-center">คุณ<?=$user['fullname'];?></p>
    <h1 class="card-text text-center"><?=sprintf("%03d", $user['id']);?></h1>
  </div>
</div>


</body>
</html>