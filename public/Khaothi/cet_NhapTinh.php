<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: NhapTinh.php
// Chức năng: Nhập thêm tỉnh mới
// Phiên bản: 1.1
// Thời gian: tháng 1/2021
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
//
//
//--------------------------------------------------------------------------------------------
-->
<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Nhập Tỉnh</title>
<script>
<!--
function check1() {
	
	if((document.cet_NhapTinh.Tentinh.value=="0")||(document.cet_NhapTinh.Tentinh.value==""))	{
		alert('Tên tỉnh chưa hợp lệ!'); 
		document.cet_NhapTinh.Tentinh.focus(); 
		return false;
		}	
	
		
	return true;
	
}	
function check(){

	if (check1()) 
	{
		
		document.cet_NhapTinh.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_NhapTinh.submit();
		}
}
// -->
</script>
</head>
<body bgcolor="#DCFFFF">
   
<?php 
error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//-----------------------Các hàm-------------------------------------------
	include "Libs/lib.php";
//------------------------------------------------------------------------------------------------------------
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	if(empty($username)) {thongbaoloi1("Bạn chưa đăng nhập"); exit;}
	
	if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ !'); exit;}
	mysql_query("SET NAMES utf8");	
	//$auth = Get_name($link,"cetusers","Mucquyen","Tendangnhap",$username);
	//if($auth !=3){thongbaoloi('Bạn không có chức năng sửa thông tin  tài khoản!!'); exit;}
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
	$Tendonvi =Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
		
//------------------------------------------------------------------------------------------------------------
	//if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ'); exit;}
	//if( cet_Acheck($link,$username,$password)!=1) {thongbaoloi('Bạn không có chức năng nhập tỉnh'); exit;}
		
	
//-----------------------/Các hàm-------------------------------------------
//-------------------------------------------------------------------------------------------------------------

	$codeOK = htmlspecialchars($_POST['Sendcheck']);
	$Tentinh = htmlspecialchars($_POST['Tentinh']);
	$Motatinh = htmlspecialchars($_POST['Motatinh']);
	
	
//-----------------------------------------------------------

if($codeOK =="Ghi nhậnOK"){

//------------kiểm tra trùng mã---------
	if(Get_name($link,"tinhtp","Matinh","Tentinh",$Tentinh)!="")  me( "Trùng tên tỉnh !");
	else{
	//----Ghi  tỉnh ---	
	$sql    = 'Insert into tinhtp(Tentinh,Mota) value("'. $Tentinh .'","'.$Motatinh.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	print'MySQL Error: 2' . $sql;	 exit;	}
	$Matinh="";
	$Tentinh = "";
	$Motatinh ="";
	
	thongbaoloi( "Đã ghi nhận!!");
	}
	
	//setcookie('name',$username,time()+1000);
	//setcookie('pass',$password,time()+1000);
	}


//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	
$fullname  = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
$bgcolor = "#00CCEE";
print'<table border="0" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
print'<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Nhập thêm tỉnh </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print'<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.' ('.$username .') </i></td></tr>';
print'</table>';
print'<hr>';
//------------------//Tiêu đề trang------------------------------
echo'<br><div class="rowdiv" style="clear:both;width:80%">
	<fieldset class="styleset">
	<legend><b>Thông tin tỉnh</b></legend>';
	
	print'<form action="cet_NhapTinh.php" method="post" name ="cet_NhapTinh">' ;
	
	print'<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	
	print'<tr height ="'.$Height.'"><td width ="25%">Tên tỉnh :</td>
	<td> <input type = "textbox" name = "Tentinh" value="'.$Tentinh.'" style="height:'.$Height1.';width:50%;font-size: 12pt"></td></tr>';
	print'<tr height ="'.$Height.'"><td>Thông tin thêm:   </td><td> <textarea  rows ="4" name ="Motatinh" style="width:100%;font-size: 12pt" >'.$MotaMonthi.'</textarea></td></tr>';		
	
	
	print'</table>';
	print'<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print'<input name="Sendcheck" type="hidden" value ="">';
	
	print'&nbsp;&nbsp;<input name="Send" type="Reset" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt"> </p>';

	print'</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
