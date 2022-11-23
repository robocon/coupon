<?php 
require_once 'config.php';
$dbi = new mysqli(HOST,USER,PASS,DB);
$dbi->query("SET NAMES UTF8");

function toThai($txt){
    return iconv("TIS-620", "UTF-8", $txt);
}
?>
<form action="import.php" method="post" enctype="multipart/form-data">
    <input type="file" name="import" id="import">
    <button type="submit">submit</button>
    <input type="hidden" name="action" value="import">
</form>
<?php 
$action = $_POST['action'];
if($action=="import"){
    $im = $_FILES['import'];
    $content = file_get_contents($im['tmp_name']);
    $items = explode("\r\n", $content);

    $new_users = array();
    foreach ($items as $key => $item) {
        if (!empty($item)) { 
            list($yot,$name,$job,$part,$phone,$type) = explode(',', toThai($item));
            $name = preg_replace("/\s+/i", ' ', $name);
            $fullName = $yot.$name;
            $phone = str_replace(array("-",' '), '', $phone);
            
            $new_users[$phone] = array($yot,$phone,$name,$job,$part, $type);
        }
        
    }
    
    foreach ($new_users as $key => $u) { 
        dump($u);
        $yot = $u['0'];
        $phone = $u['1'];
        $name = $u['2'];
        $job = $u['3'];
        $part = $u['4'];
        $type = $u['5'];

        $sql = "INSERT INTO `users` (
            `id`, `yot`, `phone`, `fullname`, `job`, `part`,`type`, `morning`, `afternoon`
        ) VALUES (
            NULL, '$yot', '$phone', '$name', '$job', '$part','$type', NULL, NULL 
        );";
        $insert = $dbi->query($sql);
        dump($insert);

    }
    // dump($new_users);
}