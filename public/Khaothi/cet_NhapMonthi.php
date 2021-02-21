<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: NhapMonthi.php
// Chức năng: Nhập môn thi mới
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
<title>Nhập Môn thi</title>
<script>
<!--
function check1() {
	if((document.cet_NhapMonthi.MaMonthi.value=="0")||(document.cet_NhapMonthi.MaMonthi.value==""))	{
		alert('Mã môn thi chưa hợp lệ!'); 
		document.cet_NhapMonthi.MaMonthi.focus(); 
		return false;
		}
	if((document.cet_NhapMonthi.TenMonthi.value=="0")||(document.cet_NhapMonthi.TenMonthi.value==""))	{
		alert('Tên môn thi chưa hợp lệ!'); 
		document.cet_NhapMonthi.TenMonthi.focus(); 
		return false;
		}	
	if((document.cet_NhapMonthi.MotaMonthi.value=="0")||(document.cet_NhapMonthi.MotaMonthi.value==""))	{
		alert('Mô tả môn thi chưa hợp lệ!'); 
		document.cet_NhapMonthi.MotaMonthi.focus(); 
		return false;
		}		
	if((document.cet_NhapMonthi.Thoigianlambai.value=="0")||(document.cet_NhapMonthi.Thoigianlambai.value==""))	{
		alert('Mô tả môn thi chưa hợp lệ!'); 
		document.cet_NhapMonthi.Thoigianlambai.focus(); 
		return false;
		}		
	else{
		if(parseInt(document.cet_NhapMonthi.Thoigianlambai.value,10)<0){
			alert('Thời gian làm bài thi chưa hợp lệ!'); 
			document.cet_NhapMonthi.Thoigianlambai.focus(); 
			return false;
		}
	} 
		
	return true;
	
}	
function check(){

	if (check1()) 
	{
		
		document.cet_NhapMonthi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_NhapMonthi.submit();
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
//-------------------------------------------------------------------------------------------------------------

	$codeOK = htmlspecialchars($_POST['Sendcheck']);
	$MaMonthi = trim($_POST['MaMonthi']);
	$TenMonthi = htmlspecialchars($_POST['TenMonthi']);
	$Hinhthucthi = htmlspecialchars($_POST['Hinhthucthi']);
	$MotaMonthi = htmlspecialchars($_POST['MotaMonthi']);
	$Ghichu = htmlspecialchars($_POST['Ghichu']);
	$Thoigianlambai = $_POST['Thoigianlambai'];
//-----------------------------------------------------------

if($codeOK =="Ghi nhậnOK"){

//------------kiểm tra trùng mã---------

	$sql    = 'Select MaMonthi from cet_monthi where MaMonthi="'.$MaMonthi.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	echo 'MySQL Error 1: ' . $sql; 	exit;	}
	if(mysql_num_rows($result)>0) { thongbaoloi( "Trùng mã Môn thi!!");}
	else{
	
	//----Ghi  môn thi ---	
		$sql    = 'Insert into cet_monthi(MaMonthi,TenMonthi,Hinhthucthi,Mota, Ghichu,Thoigianlambai)  
		value("'.$MaMonthi.'","'. $TenMonthi .'",'.$Hinhthucthi .',"'.$MotaMonthi .'","'.$Ghichu.'",'.$Thoigianlambai.')';

		$result = mysql_query($sql, $link);
		if (!$result) {	echo 'MySQL Error: 2' . $sql;	 exit;	}
	
		cet_log2($link, $MaMonthi, "Taomon","Tạo môn thi moi",$username);
		$MaMonthi="";
		$TenMonthi = "";
		$MotaMonthi ="";
		$Ghichu="";
		thongbaoloi( "Đã ghi nhận!!");
	}//end else
	
	//setcookie('name',$username,time()+1000);
	//setcookie('pass',$password,time()+1000);
	}//Hết ghi dữ liệu if($code == "Ghi môn hoc")


//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	
$Madonvi1 = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
$bgcolor = "#00CCEE";
echo '<table border="0" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
echo '<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Nhập Môn thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
echo '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Donvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.' ('.$username .') </i></td></tr>';
echo '</table>';
echo '<hr>';
//------------------//Tiêu đề trang------------------------------
echo'<br><div class="rowdiv" style="clear:both;width:80%">
	<fieldset class="styleset">
	<legend><b>Thông tin Môn thi</b></legend>';
	
	echo '<form action="cet_NhapMonthi.php" method="post" name ="cet_NhapMonthi">' ;
	
	echo '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">
	
	<tr><td width="25%" height ="'.$Height.'">Mã kí hiệu Môn thi : </td>
		<td> <input type = "textbox"  name = "MaMonthi"  value = "'. $MaMonthi .'" style="height:'.$Height1.';font-size: 12pt"></td>
	</tr>';
	echo '<tr><td height ="'.$Height.'">Tên Môn thi :</td><td> <input type = "textbox" name = "TenMonthi" value="'.$TenMonthi.'" style="height:'.$Height1.';width:95%;font-size: 12pt"></td></tr>';
	if ($Hinhthucthi =="2") {$checkTN =" "; $checkTL ="checked";}
	 else  {$checkTN ="checked";  $checkTL =" ";}
	
	echo '<tr><td height ="'.$Height.'">Hình thức thi :</td><td>
		<input type="radio" value="1" name = "Hinhthucthi" '.$checkTN. ' "> Trắc nghiệm &nbsp;&nbsp;&nbsp;&nbsp;
		<input type = "radio" value="2" name = "Hinhthucthi" '.$checkTL. '> Tự luận
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thời gian làm bài (phút): <input type = "text"  name = "Thoigianlambai" value="60" size ="5" style="height:'.$Height1.';font-size: 12pt">
		</td></tr>';
	echo '<tr><td  height ="'.$Height. '" >Mô tả môn thi:   </td><td> <textarea  rows ="4" name ="MotaMonthi" style="width:100%;font-size: 12pt" >'.$MotaMonthi.'</textarea></td></tr>';		
	
	echo '<tr><td  height ="'.$Height. '" >Ghi chú:   </td><td> <textarea  rows ="2" name ="Ghichu" style="width:100%;font-size: 12pt" >'.$Ghichu.'</textarea></td></tr>';		
	
	echo'</table>';
	echo '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	echo '<input name="Sendcheck" type="hidden" value ="">';
	//echo '<p align="center"><input name="Send" type="botton" onclick ="JavaScript:check();" value = "Ghi nhận" style="font-size: 12pt;font-weight:bold"/>';
	echo '&nbsp;&nbsp;<input name="Send" type="Reset" value = "Quay lại" style="font-size: 12pt;font-weight:bold"> </p>';

	echo '</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
