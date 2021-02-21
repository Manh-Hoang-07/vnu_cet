<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: cet_SuaAuser.php
// Chức năng: Cập nhật / Xóa / reset mật khẩu tài khoản người dùng tại Trung tâm
// Phiên bản: 1.1
// Thời gian: tháng 02/2021
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
<title>Sửa thông tin người dùng</title>
<script>
<!--
function check1(){ 
	var t,t1, t2, i;
	if(document.cet_SuaAuser.hoten.value==""){
		alert("Họ tên không được để trống");
		document.cet_SuaAuser.hoten.focus();
		return false;
	}
	else 
		if(document.cet_SuaAuser.hoten.value.length >40){
		alert("Họ tên quá dài");
		document.cet_SuaAuser.hoten.focus();
		return false;
	}
	
	
	if(document.cet_SuaAuser.email.value==""){
		alert("Email không hợp lệ");
		document.cet_SuaAuser.email.focus();
		return false;
	}
	else
		if(document.cet_SuaAuser.email.value.length>40){
		alert("Email quá dài");
		document.cet_SuaAuser.email.focus();
		return false;
	}
	t1=document.cet_SuaAuser.password1.value;
	if (t1.length==0){
		alert("Mật khẩu 1 không hợp lệ");
		document.cet_SuaAuser.password1.focus();
		return false;
		}
		
	
	else {
		
		t2=document.cet_SuaAuser.password2.value;

		 if((t2.lenght==0)||(t1.length!=t2.length))	{
			alert("Mật khẩu 2 không hợp lệ");
			document.cet_SuaAuser.password2.focus();
			return false;
			}
	
	
		
		else { 	i=0;
			while((i<t1.length)&&(t1.charAt(i)==t2.charAt(i)))i++;
			//alert('i:'+i);
			if(i<t1.length) {
				alert("Mật khẩu nhập 2 lần không khớp nhau!!");
				document.cet_SuaAuser.password2.focus();
				return false;
			}
		}
	}
	return true;
	}
	
function check(){	

	if (check1()){
		
		document.cet_SuaAuser.SendOk.value="Ghi nhận";
		//alert("OK: " + document.cet_SuaAuser.SendOk.value);
		document.cet_SuaAuser.submit();
	}
}
function check2(){	

	var ans = confirm('Bạn muốn xóa tài khoản?');
	if(ans){
		document.cet_SuaAuser.SendOk.value="Xóa TK";
		document.cet_SuaAuser.submit();
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
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	
	if(empty($username)) {thongbaoloi1("Bạn chưa đăng nhập"); exit;}
	
	if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ !'); exit;}
	mysql_query("SET NAMES utf8");	
	$auth = Get_name($link,"cetusers","Mucquyen","Tendangnhap",$username);
	if($auth !=3){thongbaoloi('Bạn không có chức năng sửa thông tin  tài khoản!!'); exit;}
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
		
//-------------------------------------------------------------------------------------------		
//------------------Tiêu đề trang------------------------------	
	$Tendonvi =Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	
	print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="0" cellspacing="0">';
	print '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp;&nbsp; Cập nhật thông tin người dùng </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
	print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:('.$userfullname .') </i></td></tr>';
	print '</table>';
	print '<hr>';
//------------------//Tiêu đề trang------------------------------
	$todo = $_POST['SendOk'];
	$Resetpas=$_POST['Resetpas'];
//---------------------------------------------------------------------------------------
if($Resetpas =="Reset mật khẩu"){
	$Tendangnhap = $_POST['Tendangnhap'];
	$Mucquyen =$_POST['Mucquyen'];
	$password1='cet123A';
	$sql ='ALTER USER  "'.$Tendangnhap.'"@"localhost" IDENTIFIED by "'.$password1 .'"';
	
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	cet_log2($link,$Tendangnhap, "ResetMK", "Reset mật khẩu cet", $username);
	me("Đã đặt lại mật khẩu ngầm định");
}
if($todo  =="Xóa TK"){
	$Tendangnhap = $_POST['Tendangnhap'];
	$sql ='DROP USER  "'.$Tendangnhap.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	$sql ='DELETE FROM cetusers WHERE Tendangnhap =  "'.$Tendangnhap.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	cet_log2($link,$Tendangnhap, "XoaTK", "Xóa tài khoản cet", $username);
	$hoten = "";
	$Tendangnhap="";
	$sodienthoai = "";
	$email = "";
	$username_ ="";
	$password_ = "";
	$password2_ = "";
	$mucquyen = "";	
	me("Đã xóa tài khoản!");
	
}
//---------------------------------------------------------------
if($todo =="Ghi nhận"){
	//me('ghi 1');
	$hoten = htmlspecialchars($_POST['hoten']);
	
	$sodienthoai = htmlspecialchars($_POST['sodienthoai']);
	$email = htmlspecialchars($_POST['email']);
	$Mucquyen = htmlspecialchars($_POST['Mucquyen']);
	$Tendangnhap = htmlspecialchars($_POST['Tendangnhap']); 
	$password1 =$_POST['password1'];
	$password_ = password_hash($password1,PASSWORD_BCRYPT);
	$sql   = 'UPDATE  cetusers SET Hoten ="'.$hoten.'", Sodienthoai="'.$sodienthoai.'", Email="'.$email.'",
				Mucquyen='.$Mucquyen.', Matkhau ="'.$password_.'" 			
			WHERE (Tendangnhap ="'.$Tendangnhap.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}

	if($mucquyen==3){
		$sql ='GRANT ALL PRIVILEGES on cet_dkythi.* to "'.$Tendangnhap.'"@"localhost"  IDENTIFIED by "'.$password1 .'" WITH GRANT OPTION';
	}
	if($mucquyen==2){
		$sql ='GRANT select, index, insert, update, references, delete  on cet_dkythi.* to "'.$Tendangnhap.'"@"localhost"  IDENTIFIED by "'.$password1 .'" WITH GRANT OPTION';
	}
	else {
		$sql ='GRANT select, index, insert, update, references,delete  on cet_dkythi.* to "'.$Tendangnhap.'"@"localhost" IDENTIFIED by "'.$password1 .'"';
	}   
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}	
	$sql ='GRANT create user,RELOAD on *.* to "'.$Tendangnhap.'"@"localhost" IDENTIFIED by "'.$password1 .'"';
	
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	$sql ='FLUSH PRIVILEGES';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	/*
	$sql ='ALTER USER  "'.$Tendangnhap.'"@"localhost" IDENTIFIED by "'.$password_ .'"';
	
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	*/
	cet_log2($link,$Tendangnhap, "TaoTK", "Tạo tài khoản cet", $username);
	$hoten = "";
	$Tendangnhap="";
	$sodienthoai = "";
	$email = "";
	$username_ ="";
	$password_ = "";
	$password2_ = "";
	$mucquyen = "";	
	me('Đã cập nhật người dùng!'); 
}
//--------------------------------------------------------------------------------------
$Tendangnhap = $_POST['Tendangnhap'];
//----Tạo form nhập dữ liệu ------------------
    
	
	$sql ='Select Hoten,Sodienthoai,Email,Mucquyen
			FROM cetusers 
			WHERE (Tendangnhap="'.$Tendangnhap.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc dữ liệu người dùng :' . $sql);	 exit;	}
	$row = mysql_fetch_row($result);	
	$hoten = $row[0];
	$sodienthoai = $row[1];
	$email = $row[2];
	$mucquyen = $row[3];
	if($mucquyen==3) {$bselect3 ="checked" ;$bselect1=" ";$bselect2=" ";} 
	else 
	if($mucquyen==2) {$bselect2 ="checked" ;$bselect1=" ";$bselect3=" ";} 
	else  {$bselect1 ="checked" ;$bselect2=" ";$bselect3=" ";}
	
	print '<form action="cet_SuaAuser.php" method="post" name ="cet_SuaAuser">';
	print '<p align="center">
	<table border="0" cellspacing ="0" bgcolor="#FFFFEF" width="80%" >
		<tr><td width="2%"></td><td width="20%"></td><td width="50%"></td><td ></td></tr>
		<tr height="60px"><td >&nbsp;</td><th colspan = "2">Thông tin người dùng</th><td>&nbsp;</td></tr>';
		print'<tr><td width="1%"></td><td width="15%"><td width="50%"></td><td></td></tr>';
		
		print '<tr height="'.$Height.'"><td>&nbsp;</td><td>Cán bộ cần sửa: </td>
		<td>'.cet_ListAuser($link,"Tendangnhap", $Tendangnhap," ",1).'</td></tr>';
		print '<tr height="'.$Height.'"><td>&nbsp;</td><td>Họ và tên(*): </td><td><input type = "text" name ="hoten" size ="30" value ="'.$hoten.'" style="height:'.$Height1.';width:60%;font-size: 12pt"></td><td>&nbsp;</td></tr>';
	print'
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Thuộc nhóm(*): </td><td>
	<input type = "radio" name ="Mucquyen"  value ="1" style="font-size: 13pt" '.$bselect1.'> Nhóm 1 - 
	<input type = "radio" name ="Mucquyen"  value ="2" style="font-size: 13pt" '.$bselect2.'> Nhóm 2 -
	<input type = "radio" name ="Mucquyen"  value ="3" style="font-size: 13pt" '.$bselect3.'> Nhóm 3(A)
	</td><td>&nbsp;</td></tr>
	<tr height="'.$Height1.'"><td>&nbsp;</td><td>Email(*): </td><td><input type = "text" name ="email" size ="30" value ="'.$email.'" style="height:'.$Height1.';width:50%;font-size: 12pt"></td><td>&nbsp;</td></tr>
    <tr height="'.$Height.'"><td>&nbsp;</td><td>Số điện thoại: </td><td><input type = "text" name ="sodienthoai" size ="15" value ="'.$sodienthoai.'" style="height:'.$Height1.';width:30%;font-size: 12pt"></td><td>&nbsp;</td></tr>
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Mật khẩu(*): </td><td> <input type ="password" name ="password1" size ="20" style="height:'.$Height1.';width:30%;font-size: 12pt"></td><td>&nbsp;</td></tr>	
    <tr height="'.$Height.'"><td>&nbsp;</td><td>Xác nhận mật khẩu(*): </td><td><input type ="password" name ="password2" size ="20" style="height:'.$Height1.';width:30%;font-size: 12pt"></td><td>&nbsp;</td></tr>';
	print '<tr><td colspan ="4">&nbsp;</td></tr>';
	print '<tr><td colspan ="4">&nbsp;</td></tr>';
	print '<tr><td colspan = "4" align = "center">
			<input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:'.$Height1.';width:20%;font-size: 12pt";font-weight:bold> &nbsp;&nbsp;
			<input name="Resetpas" type="submit"  value = "Reset mật khẩu" style="height:'.$Height1.';width:20%;font-size: 12pt";font-weight:bold>&nbsp;&nbsp;
			<input name="Send" type="button" onclick ="JavaScript:check2();" value = "Xóa tài khoản" style="height:'.$Height1.';width:20%;font-size: 12pt";font-weight:bold> 
			</td></td></tr>';
	
	print'<input name="SendOk" type="hidden"  value = "">';
	print '</form>';
print '</table> </p>';	 
?>


</body>
</html> 
