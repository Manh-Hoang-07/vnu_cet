<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
$Mahuyen = $_REQUEST['Mahuyen'];
if($Mahuyen=='') $Mahuyen = 1;
include_once("Libs/lib.php");
$link = cet_connect();
$result = cet_Json_truong($link, $Mahuyen);
print(json_encode($result,JSON_UNESCAPED_UNICODE));
?>