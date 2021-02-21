<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Nhapcumthi.php
// Chức năng: Nhập cụm thi
// Phiên bản: 1.1
// Thời gian: tháng 12/2020
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
<title>Nhập Cụm thi</title>
<script>
<!--
function check1() {
	// if((document.cet_Nhapcumthi.MaCumthi.value=="0")||(document.cet_Nhapcumthi.MaCumthi.value==""))	{
		// alert('Mã cụm thi chưa hợp lệ!'); 
		// document.cet_Nhapcumthi.MaCumthi.focus(); 
		// return false;
		// }
	if((document.cet_Nhapcumthi.TenCumthi.value=="0")||(document.cet_Nhapcumthi.TenCumthi.value==""))	{
		alert('Tên cụm thi chưa hợp lệ!'); 
		document.cet_Nhapcumthi.TenCumthi.focus(); 
		return false;
		}	
	
		
	return true;
	
}	
function check(){

	if (check1()) 
	{
		
		document.cet_Nhapcumthi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_Nhapcumthi.submit();
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


//-----------------------/Các hàm-------------------------------------------
//------------------------------------------------------------------------------------------------------------
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	if(empty($username)) {thongbaoloi1("Bạn chưa đăng nhập"); exit;}
//------------------------------------------------------------------------------------------------------------
	if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ'); exit;}
	//if( cet_Acheck($link,$username,$password)!=1) {thongbaoloi('Bạn không có chức năng thực hiện'); exit;}
		
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
	$Tendonvi =Get_name($link,"cetusers","donvi","Tendangnhap",$username);
//-------------------------------------------------------------------------------------------------------------

	$codeOK = ($_POST['Sendcheck']);
	//$MaCumthi = trim($_POST['MaCumthi']);
	$TenCumthi = ($_POST['TenCumthi']);
	$Ghichu = ($_POST['Ghichu']);
	
//-----------------------------------------------------------

if($codeOK =="Ghi nhậnOK"){

//------------kiểm tra trùng mã---------

	$sql    = 'Select MaCumthi from cet_cumthi where TenCumthi="'.$TenCumthi.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . $sql; 	exit;	}

	if(mysql_num_rows($result)>0) { thongbaoloi( "Trùng tên cụm thi!!");}
	else{
	
	//----Ghi  môn thi ---	
		$sql    = 'Insert into cet_cumthi(TenCumthi,Ghichu)  
		value("'. $TenCumthi .'","'.$Ghichu.'")';

		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error: 2' . $sql;	 exit;	}
	
		cet_log($link, $MaCumthi, "Tạo cụm thi");
		$MaCumthi="";
		$TenCumthi = "";
		
		$Ghichu="";
		thongbaoloi( "Đã ghi nhận!!");
	}//end else
	
	//	setcookie('name',$username,time()+1000);
	//	setcookie('pass',$password,time()+1000);
	}


//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	

$bgcolor = "#00CCEE";
print '<table border="0" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Nhập Cụm thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.' ('.$username .') </i></td></tr>';
print '</table>';
print '<hr>';
//------------------//Tiêu đề trang------------------------------
print'<br><div class="rowdiv" style="clear:both;width:80%">
	<fieldset class="styleset">
	<legend><b>Thông tin Môn thi</b></legend>';
	
	print '<form action="cet_Nhapcumthi.php" method="post" name ="cet_Nhapcumthi">' ;
	//$MaCumthi = cet_getmax($link,"cet_cumthi","Macumthi");
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	
	//<tr><td width="25%" height ="'.$Height.'">Mã Cụm thi : </td>
	//	<td> <input type = "textbox"  name = "MaCumthi"  value = "'. $MaCumthi .'" style="height:'.$Height1.';font-size: 12pt"></td>
	//</tr>';
	print '<tr><td height ="'.$Height.'">Tên Cụm thi :</td><td> <input type = "textbox" name = "TenCumthi" value="'.$TenCumthi.'" style="height:'.$Height1.';width:95%;font-size: 12pt"></td></tr>';
	
	print '<tr><td  height ="'.$Height. '" >Ghi chú:   </td><td> <textarea  rows ="2" name ="Ghichu" style="width:100%;font-size: 12pt" >'.$Ghichu.'</textarea></td></tr>';		
	
	print'</table>';
	print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '<input name="Sendcheck" type="hidden" value ="">';
	
	print '&nbsp;&nbsp;<input name="Send" type="Reset" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt"> </p>';

	print '</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
