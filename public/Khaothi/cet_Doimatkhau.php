<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: cet_Doimatkhau.php
// Chức năng: Đổi mật khẩu tài khoản cá nhân người dùng tại Trung tâm
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
	t1=document.cet_Doimatkhau.passwordcur.value;
	if (t1.length==0){
		alert("Mật khẩu hiện tại không hợp lệ");
		document.cet_Doimatkhau.passwordcur.focus();
		return false;
		}
	t1=document.cet_Doimatkhau.password1.value;
	if (t1.length==0){
		alert("Mật khẩu 1 không hợp lệ");
		document.cet_Doimatkhau.password1.focus();
		return false;
		}
		
	
	else {
		
		t2=document.cet_Doimatkhau.password2.value;

		 if((t2.lenght==0)||(t1.length!=t2.length))	{
			alert("Mật khẩu 2 không hợp lệ");
			document.cet_Doimatkhau.password2.focus();
			return false;
			}
	
	
		
		else { 	i=0;
			while((i<t1.length)&&(t1.charAt(i)==t2.charAt(i)))i++;
			//alert('i:'+i);
			if(i<t1.length) {
				alert("Mật khẩu nhập 2 lần không khớp nhau!!");
				document.cet_Doimatkhau.password2.focus();
				return false;
			}
		}
	}
	return true;
	}
	
function check(){	

	if (check1()){
		
		document.cet_Doimatkhau.SendOk.value="Ghi nhận";
		//alert("OK: " + document.cet_Doimatkhau.SendOk.value);
		document.cet_Doimatkhau.submit();
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
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
	$Tendonvi =Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
			
//-------------------------------------------------------------------------------------------		
//------------------Tiêu đề trang------------------------------	
	
	print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="0" cellspacing="0">';
	print '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp;&nbsp; Thay đổi mật khẩu </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
	print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:('.$userfullname .') </i></td></tr>';
	print '</table>';
	print '<hr>';
	
//------------------//Tiêu đề trang------------------------------
	$todo = $_POST['SendOk'];
	
//---------------------------------------------------------------------------------------

if($todo =="Ghi nhận"){
	
	$passwordcur =$_POST['passwordcur'];
	$password1 =$_POST['password1'];
	$password2 =$_POST['password2'];
	//stop($passwordcur.','.$password1);
	
	$password_ = password_hash($password1,PASSWORD_BCRYPT);
	if(!cet_Acheckhash($link ,$username,$passwordcur)){stop('Mật khẩu hiện tại không phù hợp!');}
	$sql   = 'UPDATE  cetusers SET Matkhau ="'.$password_.'" WHERE (Tendangnhap ="'.$username.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}

	$sql ='ALTER USER "'.$username.'"@"localhost" IDENTIFIED by "'.$password1 .'"';
	  
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}	
	$sql ='FLUSH PRIVILEGES';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	
	cet_log2($link,$username, "DoiMK", "Đổi mật khẩu tài khoản cet", $username);
	me('Đã cập đổi mật khẩu!'); 
}
//--------------------------------------------------------------------------------------

//----Tạo form nhập dữ liệu ------------------
   
	
	print '<form action="cet_Doimatkhau.php" method="post" name ="cet_Doimatkhau">';
	print '<p align="center">
	<table border="0" cellspacing ="1" bgcolor="#FFFFEF" width="50%" >
		<tr><td width="5%"></td><td width="30%"></td><td width="55%"></td><td ></td></tr>
		<tr height="60px"><td >&nbsp;</td><th colspan = "2">Thay đổi mật khẩu</th><td>&nbsp;</td></tr>';
		
	print'<tr height="'.$Height.'"><td>&nbsp;</td><td>Mật khẩu hiện tại(*): </td><td> <input type ="password" name ="passwordcur" size ="20" style="height:'.$Height1.';width:80%;font-size: 13pt"></td><td>&nbsp;</td></tr>		
	<tr height="'.$Height.'"><td>&nbsp;</td><td>Mật khẩu mới(*): </td><td> <input type ="password" name ="password1" size ="20" style="height:'.$Height1.';width:80%;font-size: 13pt"></td><td>&nbsp;</td></tr>	
    <tr height="'.$Height.'"><td>&nbsp;</td><td>Xác nhận mật khẩu(*): </td><td><input type ="password" name ="password2" size ="20" style="height:'.$Height1.';width:80%;font-size: 13pt"></td><td>&nbsp;</td></tr>';
	print '<tr><td colspan ="4">&nbsp;</td></tr>';
	print '<tr><td colspan ="4">&nbsp;</td></tr>';
	print '<tr><td colspan = "4" align = "center">
			<input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:'.$Height1.';width:20%;font-size: 12pt";font-weight:bold> &nbsp;&nbsp;
			</td></td></tr>';
	
	print'<input name="SendOk" type="hidden"  value = "">';
	print '</form>';
print '</table> </p>';	 

?>


</body>
</html> 
