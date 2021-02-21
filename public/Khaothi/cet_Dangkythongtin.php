<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: AddAcc.php
// Chức năng: Tạo tài khoản người dùng
// Phiên bản: 1.1
// Thời gian: tháng 01/2021
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
// Cập nhật: 
//--------------------------------------------------------------------------------------------
-->
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Tạo tài khoản người dùng</title>
<script>
<!--
function check1(){ 
	var t,t1, t2, i;
	if(document.cet_Addacc.hoten.value==""){
		alert("Họ tên không được để trống");
		document.cet_Addacc.hoten.focus();
		return false;
	}
	
	if(document.cet_Addacc.username.value==""){
		alert("Tên đăng nhập không hợp lệ");
		document.cet_Addacc.username.focus();
		return false;
	}
	if(document.cet_Addacc.email.value==""){
		alert("Email không hợp lệ");
		document.cet_Addacc.email.focus();
		return false;
	}
	t1=document.cet_Addacc.password1.value;
	if (t1.length==0){
		alert("Mật khẩu 1 không hợp lệ");
		document.cet_Addacc.password1.focus();
		return false;
		}
		
	
	else {
		
		t2=document.cet_Addacc.password2.value;

		 if((t2.lenght==0)||(t1.length!=t2.length))	{
			alert("Mật khẩu 2 không hợp lệ");
			document.cet_Addacc.password2.focus();
			return false;
			}
	
	
		
		else { 	i=0;
			while((i<t1.length)&&(t1.charAt(i)==t2.charAt(i)))i++;
			//alert('i:'+i);
			if(i<t1.length) {
				alert("Mật khẩu 3 không hợp lệ");
				document.cet_Addacc.password2.focus();
				return false;
			}
		}
	}
	return true;
	}
	
function check(){	

	if (check1()){
		alert("OK: " + document.cet_Addacc.Send.value);
		document.cet_Addacc.Send.value="Ghi nhận";
		document.cet_Addacc.submit();
	}
	
	
}

// -->
</script>
</head>
<body bgcolor="#CCFFDD">
  
<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

//------------------------Các hàm-----------------------------------------------
	include "Libs/lib.php";
	$Width =1024;
	$Height =30;
	$Height1=28;
	$Height2=25;
	$Border = 1;
//-----------------------/Các hàm-------------------------------------------
	$username   = $_COOKIE['name'];
	$password = $_COOKIE['pass'];
	date_default_timezone_set('Asia/bangkok') ;

//------------------Tiêu đề trang------------------------------	

print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" style="font-size: 24; color: #0000FF" >&nbsp;&nbsp; Tạo tài khoản người dùng </td>';
print '<td align="right" style="font-size: 12;">Người dùng: </i>:&nbsp;<b>chưa đăng ký</b></td></tr>';
print '</table>';
print '<hr>';

//------------------//Tiêu đề trang------------------------------
$link = cet_connect();
//-------------------------------------------------------------------------------------------	
	
//---------------------------
$todo = $_POST['Send'];

if($todo =="Ghi nhận"){
	$hoten = $_POST['hoten'];
	$sodienthoai = ($_POST['sodienthoai']);
	$email = ($_POST['email']);
	$username = ($_POST['username']);
	$password = ($_POST['password1']);
	$password2 = ($_POST['password2']);
	if($username==""){ thongbaoloi("Tên đăng nhập rỗng"); exit;}
	
	$sql    = 'Select tendangnhap from cet_student where (tendangnhap ="'.$username.'")';
	$result = mysql_query($sql, $link);
	if(mysql_num_rows($result)>0) { thongbaoloi("Trùng tên đăng nhập"); }
	else{
		$sql    = 'Select tendangnhap from cet_student where (email ="'.$email.'")';
		$result = mysql_query($sql, $link);
		if(mysql_num_rows($result)>0) { thongbaoloi("Trùng email"); }
		
		else{	
			$sql    = 'Insert into cet_student (Hoten, Sodienthoai, Email,tendangnhap,Trangthai) 
			value ("'.$hoten.'","'.$sodienthoai.'","'.$email.'","'.$username.'",0)';
			$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}

			//$sql ='GRANT select, index, insert, update, references on cet_dkythi.* to "'.$username.'"@"%" IDENTIFIED by "'.$password .'"';
				   
			//$result = mysql_query($sql, $link);
			//if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
		}
		cet_logstudent($link,$username,"Tạo tài khoản",$email);
	
	}
	

}
//--- /Ghi---------
//--------------------------------------------------------------------------------------

print '<p align="center"><table border="0" cellspacing ="0" bgcolor="#FFFFEF" width="80%" >
     <tr ><td height="50">&nbsp;</td><th colspan = "2">Thông tin người dùng</th><td>&nbsp;</td></tr>';
print '<form action="cet_Addacc.php" method="post" name ="cet_Addacc"> 
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Họ và tên(*): </td><td><input type = "text" name ="hoten" size ="30" value ="'.$hoten.'" style="height:'.$Height1.';width:60%;font-size: 12pt"></td><td>&nbsp;</td></tr>
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Tên đăng nhập(*): </td><td><input type = "text" name ="username" size ="20" value ="" style="height:'.$Height1.';width:20%;font-size: 12pt"></td><td>&nbsp;</td></tr>
	
	<tr height="'.$Height1.'"><td>&nbsp;</td><td>Email(*): </td><td><input type = "text" name ="email" size ="30" value ="'.$email.'" style="height:'.$Height1.';width:50%;font-size: 12pt"></td><td>&nbsp;</td></tr>
    <tr height="'.$Height.'"><td>&nbsp;</td><td>Số điện thoại: </td><td><input type = "text" name ="sodienthoai" size ="15" value ="'.$sodienthoai.'" style="height:'.$Height1.';width:30%;font-size: 12pt"></td><td>&nbsp;</td></tr>
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Mật khẩu(*): </td><td> <input type ="password" name ="password1" size ="20" style="height:'.$Height1.';width:30%;font-size: 12pt"></td><td>&nbsp;</td></tr>	
    <tr height="'.$Height.'"><td>&nbsp;</td><td>Xác nhận mật khẩu(*): </td><td><input type ="password" name ="password2" size ="20" style="height:'.$Height1.';width:30%;font-size: 12pt"></td><td>&nbsp;</td></tr>';
print '<tr><td colspan ="4">&nbsp;</td></tr>';

print '<tr><td>&nbsp;</td><td colspan = "2" align = "center">
<input name="Send1" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:'.$Height1.';width:30%;font-size: 12pt";font-weight:bold> </td><td>&nbsp;</td></tr>';
print'<input name="Send" type="hidden"  value = "">';

print '</form>';
print '</table> </p>';	 

//---------------------------------------------------------------------------------------



?>


</body>
</html> 
