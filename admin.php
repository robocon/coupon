<?php 
require_once 'config.php';

$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

$action = $_REQUEST['action'];
if ($action=='del') {
    # code...
    $id = $_REQUEST['id'];
    $s = $dbi->query(sprintf("DELETE FROM `users` WHERE `id` = '%s'", $id));
    header("Location: admin.php");
    exit;
}




$q = $dbi->query("SELECT * FROM `users` ORDER BY `id` ASC");
$i = 1;

?>
<table>
<?php
while ($a = $q->fetch_assoc()) {
    ?>
    <tr>
        <td><?=$i;?></td>
        <td><?=$a['idcard'];?></td>
        <td><?=$a['fullname'];?></td>
        <td>
            <a href="admin.php?action=del&id=<?=$a['id'];?>">ลบ</a>
        </td>
    </tr>
    <?php
    $i++;
}
?>
</table>