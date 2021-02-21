<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">

<?php 
include "Libs/lib.php";
//me('đăng xuất');
error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Bangkok') ;
	//$username   = $_COOKIE['name'];
	//$password 	= $_COOKIE['pass'];

	//if(empty($username)) {me('Bạn chưa đăng nhập');
		
	//	exit;}
 
//------------------------------------------------------------------------------------

$_COOKIE['name']="";
$_COOKIE['pass']="";
setcookie('name');
setcookie('pass');
//----------8/2/2021-----
$_SESSION['cetAusbaomat'] = "";
$_SESSION['cetpAusbaomat'] = "";
//---------------------------------------

header("QLDangKyThi.htm");

?>
</body>
</html> 
