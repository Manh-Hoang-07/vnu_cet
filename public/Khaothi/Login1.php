<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Login.php
// Chức năng: Đăng nhập
// Bản: 1.1
// Thời gian: tháng 02/2021
// Nhóm thực hiện: CET - ĐHQGHN
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
function check(form){//

	var t,t1, t2, i;
	t=form.username.value ;
	//alert('username: '+ t);
	//alert('username type: '+ typeof(t));
	//if(t=="") alert('username: rong');
	//else alert('username: khong rong ');

	if(t=="")
	{alert("Tên đăng nhập (rỗng)không hợp lệ!!"); 
	//document.getElementById('Send').value="Đăng nhập ";
	form.Send.value = "Đăng nhập ";
	}
	else
	{
		t1=form.password1.value ;
		if(t1=="") 
		{
		alert("Mật khẩu rỗng!");	
		form.Send.value = "Đăng nhập ";
		}
	}	
return 0;}


// -->
</script>
</head>
<body bgcolor="#CCFFDD" background="anhnen.jpg" height="100%" width="100%">
  
<?php 
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "Libs/lib.php";
date_default_timezone_set('Asia/Bangkok') ;
//------------------------------------------------------------------------------------
$todo = htmlspecialchars($_POST['Send']);
//--------------------------------------------------------------------------------------

if($todo!="Đăng nhập"){
echo '<div class="rowdiv" style="text-align:center;width:60%";>
        <fieldset class="styleset">
        <legend><strong>Đăng nhập hệ thống</strong></legend>';
echo '<p align="center"><table border="0" width="100%" style="font-size: 18pt">';
echo '<form action="Login1.php" method="post" name ="Myform"> 
           <tr><td>Tên đăng nhập: </td><td><input type = "text" name ="username" style="height:28px;width:90%"></td>
 	           <td>Mật khẩu: </td><td>      <input type ="password" name ="password1" style="height:28px;width:100%"></td></tr>';	
	   
echo '<tr><td colspan ="4">&nbsp;</td></tr>';
echo '<tr><td colspan = "4" align = "center"><input name="Send" type="submit"  value = "Đăng nhập" > </td></tr>';

echo '</form>';
echo '</table>';	 
echo '</fieldset><div>';
}
//---------------------------------------------------------------------------------------

if($todo =="Đăng nhập"){

	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password1']);

if (!($link = cet_Aconnect($username, $password))) {
	echo"<script>";
		echo "alert('Đăng nhập không hợp lệ');";
	echo"</script>"; exit;	
	}
	mysql_query("SET NAMES utf8");
	//setcookie('name',$username,time()+5000);
	//setcookie('pass',$password,time()+5000);
	//----------8/2/2021-----
	$_SESSION['cetAusbaomat'] = $username;
	$_SESSION['cetpAusbaomat'] = $password;
	//---------------------------------------

	echo "<script>
	window.open('QLDangKyThi.htm','_parent');
	</script>";
//------------------Tiêu đề trang------------------------------	

	$sql    = 'select Mucquyen,Hoten,donvi from  nguoidung where tendangnhap ="'.$username.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	echo 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	$row = mysql_fetch_row($result);
	$Madonvi=$row[2];
	$Tendonvi =Get_name($link, "donvi","Tendonvi","Madonvi",$Madonvi);
	echo '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
	echo '<tr><td width="40%" rowspan="2" style="font-size: 28pt; color: #0000FF" > &nbsp;&nbsp;&nbsp; Wellcome!!</td><td width="30%">........</td><td width="30%">........</td></tr>';
	echo '<tr><td width="30%"><i>Đơn vị:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$row[1].'('.$username .') </i></td></tr>';
	echo '</table>';
echo '<hr>';

//------------------//Tiêu đề trang------------------------------
}
?>
</body>
</html> 
