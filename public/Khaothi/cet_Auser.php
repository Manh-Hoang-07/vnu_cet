<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: cet_Auser.php
// Chức năng: Tạo tài khoản người dùng tại Trung tâm
// Phiên bản: 1.1
// Thời gian: tháng 01/2021
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
// Cập nhật: 
//--------------------------------------------------------------------------------------------
-->
<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Tạo tài khoản người dùng</title>
<script>
<!--
function check1(){ 
	var t,t1, t2, i;
	if(document.cet_Auser.hoten.value==""){
		alert("Họ tên không được để trống");
		document.cet_Auser.hoten.focus();
		return false;
	}
	else 
		if(document.cet_Auser.hoten.value.length >40){
		alert("Họ tên quá dài");
		document.cet_Auser.hoten.focus();
		return false;
	}
	
	if(document.cet_Auser.username_.value==""){
		alert("Tên đăng nhập không hợp lệ");
		document.cet_Auser.username.focus();
		return false;
	}
	if(document.cet_Auser.email.value==""){
		alert("Email không hợp lệ");
		document.cet_Auser.email.focus();
		return false;
	}
	else
		if(document.cet_Auser.email.value.length>40){
		alert("Email quá dài");
		document.cet_Auser.email.focus();
		return false;
	}
	t1=document.cet_Auser.password1.value;
	if (t1.length==0){
		alert("Mật khẩu 1 không hợp lệ");
		document.cet_Auser.password1.focus();
		return false;
		}
		
	
	else {
		
		t2=document.cet_Auser.password2.value;

		 if((t2.lenght==0)||(t1.length!=t2.length))	{
			alert("Mật khẩu 2 không hợp lệ");
			document.cet_Auser.password2.focus();
			return false;
			}
	
	
		
		else { 	i=0;
			while((i<t1.length)&&(t1.charAt(i)==t2.charAt(i)))i++;
			//alert('i:'+i);
			if(i<t1.length) {
				alert("Mật khẩu 3 không hợp lệ");
				document.cet_Auser.password2.focus();
				return false;
			}
		}
	}
	return true;
	}
	
function check(){	

	if (check1()){
		//alert("OK: " + document.cet_Auser.Send.value);
		document.cet_Auser.Send.value="Ghi nhận";
		document.cet_Auser.submit();
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
//-----------------------/Các hàm-------------------------------------------
	//$username   = $_COOKIE['name'];
	//$password = $_COOKIE['pass'];
	$username   = $_SESSION['cetAusbaomat'];
	$password = $_SESSION['cetpAusbaomat'];
	date_default_timezone_set('Asia/bangkok') ;
	if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ'); exit;}
//------------------Tiêu đề trang------------------------------	
	$auth = Get_name($link,"cetusers","Mucquyen","Tendangnhap",$username);
	if($auth !=3){thongbaoloi('Bạn không có chức năng tạo tài khoản!!'); exit;}
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);

	$Tendonvi =Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" style="font-size: 24; color: #0000FF" >&nbsp;&nbsp; Tạo tài khoản người dùng </td>';
print '<td align="right" style="font-size: 12;">Người dùng: </i>:&nbsp;<b>'.$userfullname.'</b></td></tr>';
print '</table>';
print '<hr>';

//------------------//Tiêu đề trang------------------------------
//-------------------------------------------------------------------------------------------	
	$hoten = $_POST['hoten'];
	$sodienthoai = ($_POST['sodienthoai']);
	$email = ($_POST['email']);
	$username_ = ($_POST['username_']);
	$password_ = ($_POST['password1']);
	$password2_ = ($_POST['password2']);
	$mucquyen = ($_POST['mucquyen']);
//------------------------------------
$todo = $_POST['Send'];

if($todo =="Ghi nhận"){
	
	if($username==""){ thongbaoloi("Tên đăng nhập rỗng"); exit;}
	
	$sql    = 'Select tendangnhap from cetusers where (tendangnhap ="'.$username_.'")';
	$result = mysql_query($sql, $link);
	if(mysql_num_rows($result)>0) { thongbaoloi("Tên đăng nhập đã có!"); }
	else{
		$sql    = 'Select tendangnhap from cetusers where (email ="'.$email.'")';
		$result = mysql_query($sql, $link);
		if(mysql_num_rows($result)>0) { thongbaoloi("Email đã có người đăng ký!"); }
		
		else{	
			$pashash  =  password_hash($password_,PASSWORD_BCRYPT);
			$sql    = 'Insert into cetusers (Hoten, Sodienthoai, Email,tendangnhap,Matkhau, Mucquyen,Donvi) 
			value ("'.$hoten.'","'.$sodienthoai.'","'.$email.'","'.$username_.'","'.$pashash.'","'.$mucquyen.'"," Trung tâm khảo thí")';
			//stop($sql);
			$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
			if($mucquyen==3){
				$sql ='GRANT ALL PRIVILEGES on cet_dkythi.* to "'.$username_.'"@"localhost"  IDENTIFIED by "'.$password_ .'" WITH GRANT OPTION';
			}
			else 
			if($mucquyen==2){
				$sql ='GRANT select, index, insert, update, references,delete on cet_dkythi.* to "'.$username_.'"@"localhost"  IDENTIFIED by "'.$password_ .'" WITH GRANT OPTION';
			}
			else {
				$sql ='GRANT select, index, insert, update, references, delete on cet_dkythi.* to "'.$username_.'"@"localhost" IDENTIFIED by "'.$password_ .'"';
			}   
			$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
			
			$sql ='GRANT create user,RELOAD on *.* to "'.$username_.'"@"localhost" IDENTIFIED by "'.$password1 .'"';
	
			$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
			$sql ='FLUSH PRIVILEGES';
			$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
		
		cet_log2($link,$username_, "TaoTK", "Tạo tài khoản cet", $username);
		$hoten = "";
		$sodienthoai = "";
		$email = "";
		$username_ ="";
		$password_ = "";
		$password2_ = "";
		$mucquyen = "";
		}
	
	}
	

}
//--- /Ghi---------
//--------------------------------------------------------------------------------------
if($mucquyen=="3") {$bselect3 ="checked";$bselect2 =" ";$bselect2 =" ";}
else 
if($mucquyen=="2") {$bselect2 ="checked";$bselect1 =" ";$bselect3 =" ";}
else {$bselect1 ="checked";$bselect2 =" "; $bselect3 =" "; }
print '<form action="cet_Auser.php" method="post" name ="cet_Auser">';
print '<p align="center"><table border="0" cellspacing ="0" bgcolor="#FFFFEF" width="80%" >
	 <tr><td width="2%"></td><td width="20%"></td><td width="50%"></td><td ></td></tr>
     <tr ><td height="50">&nbsp;</td><th colspan = "2">Thông tin người dùng</th><td>&nbsp;</td></tr>

	<tr height="'.$Height.'"><td>&nbsp;</td><td>Họ và tên(*): </td><td><input type = "text" name ="hoten" size ="30" value ="'.$hoten.'" style="height:'.$Height1.';width:60%;font-size: 12pt"></td><td>&nbsp;</td></tr>
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Tên đăng nhập(*): </td><td><input type = "text" name ="username_" size ="20" value ="'.$username_.'" style="height:'.$Height1.';width:20%;font-size: 12pt"></td><td>&nbsp;</td></tr>
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Thuộc nhóm(*): </td><td>
	<input type = "radio" name ="mucquyen"  value ="1" style="font-size: 13pt" '.$bselect1.'> Nhóm 1 - 
	<input type = "radio" name ="mucquyen"  value ="2" style="font-size: 13pt" '.$bselect2.'> Nhóm 2 -
	<input type = "radio" name ="mucquyen"  value ="3" style="font-size: 13pt" '.$bselect3.'> Nhóm 3 (A) - 	</td><td>&nbsp;</td></tr>
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
