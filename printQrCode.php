<?php 
include('libs/phpqrcode/qrlib.php');
$id = $_GET['id'];

$def_outfile = false;
$def_level = ($_GET['level']) ? $_GET['level'] : 3 ;
$def_size = ($_GET['size']) ? $_GET['size'] : 4 ;
$def_margin = ($_GET['margin']) ? $_GET['margin'] : 4 ;
QRcode::png($id,$def_outfile, $def_level, $def_size, $def_margin);