<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Login.php
// Chức năng: Đăng nhập
// Bản: 1.1
// Thời gian: tháng 12/2020
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
//--------------------------------------------------------------------------------------------
-->
<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Đăng nhập</title>
<script>
<!--
function check(){//

	alert("check pass");
return 0;}


// -->
</script>
</head>
<body  height="100%" width="100%">
  
<?php 

error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "Libs/lib.php";
date_default_timezone_set('Asia/Bangkok') ;
//------------------------------------------------------------------------------------
$todo = htmlspecialchars($_POST['Send']);
//--------------------------------------------------------------------------------------

if($todo!="Đăng nhập"){
	
echo '<form action="Login.php" method="post" name ="Myform">'; 	
echo '<table width ="100%" border ="0" fix>
<tr ><td width ="100%" height="125" background="cet.png" ></td></tr> 
	
<tr ><td height ="100">&nbsp;</td></tr></table>';
echo '<table width="100%" border ="0"><tr><td width ="30%"></td><td width ="35%"></td><td ></td></tr>';
echo '<tr><td height ="230"></td><td>';
echo '<div class="rowdiv" style="width:100%";>
        <fieldset class="styleset">
        <legend><strong>Đăng nhập hệ thống</strong></legend>
		<table width ="100%" border ="0">
		<tr>
			<td  background="KeyCet.jpg"  rowspan="2" height="50" width ="23%"></td><td height="50" width ="30%"> Tên đăng nhập:</td>
			<td ><input type = "text" name ="username" style="height:28px;width:80%"></td>
		</tr>
		<tr ><td height="50"> Mật khẩu:</td>	<td > <input type ="password" name ="password1" style="height:28px;width:80%"></td>
		</tr>
		<tr><td height="45"></td><td><input name="Send" type="submit" style="font-size: 13pt" value = "Đăng nhập" > </td><td></td>  
		</tr>
	</table>';
echo '</div> </td><td></td></tr></table>';
echo '</form>';

}

//---------------------------------------------------------------------------------------

if($todo =="Đăng nhập"){

	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password1']);

if (!($link = mysql_connect('localhost', $username, $password))) {
	echo"<script>";
		echo "alert('Đăng nhập không hợp lệ');";
	echo"</script>"; exit;	
	}
	if (!mysql_select_db('qlhoso', $link)) {	 echo 'Could not select database ';exit; }
	mysql_query("SET NAMES utf8");
	$sql    = 'select Mucquyen from  nguoidung where tendangnhap ="'.$username.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	echo 'MySQL Error 1: ' . mysql_error().$sql;	exit;}

//setcookie('name',$username,time()+5000);
//setcookie('pass',$password,time()+5000);
//----------8/2/2021-----
$_SESSION['cetAusbaomat'] = $username;
$_SESSION['cetpAusbaomat'] = $password;
//---------------------------------------

echo "<script>
window.open('QLDangKythi.htm','_self');
</script>";

//------------------Tiêu đề trang------------------------------	

//------------------//Tiêu đề trang------------------------------
}
?>
</body>
</html> 
