<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
$Matinh = $_REQUEST['Matinh'];
if($Matinh=='') $Matinh = 1;
include_once("Libs/lib.php");
$link = cet_connect();
$result = cet_Json_huyen($link, $Matinh);
print(json_encode($result,JSON_UNESCAPED_UNICODE));
?>