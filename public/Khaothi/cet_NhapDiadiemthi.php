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
<title>Nhập địa điểm thi</title>
<script>
<!--
function check1() { 
	if((document.cet_NhapDiadiemthi.MaDiadiem.value=="0")||(document.cet_NhapDiadiemthi.MaDiadiem.value==""))	{
		alert('Mã điểm thi chưa hợp lệ!'); 
		document.cet_NhapDiadiemthi.MaDiadiem.focus(); 
		return false;
		}
	if((document.cet_NhapDiadiemthi.TenDiadiem.value=="0")||(document.cet_NhapDiadiemthi.TenDiadiem.value==""))	{
		alert('Tên điểm thi chưa hợp lệ!'); 
		document.cet_NhapDiadiemthi.TenDiadiem.focus(); 
		return false;
		}	
	if((document.cet_NhapDiadiemthi.Diachi.value=="0")||(document.cet_NhapDiadiemthi.Diachi.value==""))	{
		alert('Địa chỉ điểm thi chưa hợp lệ!'); 
		document.cet_NhapDiadiemthi.Diachi.focus(); 
		return false;
		}	
		
	if((document.cet_NhapDiadiemthi.Tongsothisinh.value=="0")||(document.cet_NhapDiadiemthi.Tongsothisinh.value==""))	{
		alert('Tổng số thí sinh điểm thi chưa hợp lệ!'); 
		document.cet_NhapDiadiemthi.Tongsothisinh.focus(); 
		return false;
		}	

	return true;
	
}	
function check(){

	if (check1()) 
	{
		
		document.cet_NhapDiadiemthi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_NhapDiadiemthi.submit();
		}
}
function check2() {
	var sp =0, sts =0, tongts =0;
	if(document.cet_NhapDiadiemthi.Tongsophong.value!="") sp  = parseInt(document.cet_NhapDiadiemthi.Tongsophong.value,10);
	if(sp<=0) {alert('Số phòng thi chưa phù hợp !'); document.cet_NhapDiadiemthi.Tongsophong.focus(); }
	if(document.cet_NhapDiadiemthi.SoTSphong.value!="") sts  = parseInt(document.cet_NhapDiadiemthi.SoTSphong.value,10);
	
	tongts = sp*sts;
	document.cet_NhapDiadiemthi.Tongsothisinh.value=tongts;
}
function check3() {
	var sp =0, sts =0, tongts =0;
	if(document.cet_NhapDiadiemthi.Tongsophong.value!="") sp  = parseInt(document.cet_NhapDiadiemthi.Tongsophong.value,10);
	
	if(document.cet_NhapDiadiemthi.SoTSphong.value!="") sts  = parseInt(document.cet_NhapDiadiemthi.SoTSphong.value,10);
	if(sts<=0) {alert('Số thí sinh /phong chưa phù hợp !'); document.cet_NhapDiadiemthi.SoTSphong.focus(); }
	tongts = sp*sts;
	document.cet_NhapDiadiemthi.Tongsothisinh.value=tongts;
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

	$codeOK = $_POST['Sendcheck'];
	
	
//-----------------------------------------------------------

if($codeOK =="Ghi nhậnOK"){
	$MaDiadiem = trim($_POST['MaDiadiem']);
	$TenDiadiem =$_POST['TenDiadiem'];
	$Tongsothisinh = $_POST['Tongsothisinh'];
	$Diachi = $_POST['Diachi'];
	$Ghichu = $_POST['Ghichu'];
	$Tongsophong = $_POST['Tongsophong'];
	$SoTSphong = $_POST['SoTSphong'];
	$Macumthi = $_POST['Macumthi'];
//------------kiểm tra trùng mã---------

	$sql    = 'Select MaDiadiem from cet_diadiemthi where MaDiadiem="'.$MaDiadiem.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	echo 'MySQL Error 1: ' . $sql; 	exit;	}
	if(mysql_num_rows($result)>0) { thongbaoloi( "Trùng mã địa điểm thi!!");}
	else{
	
	//----Ghi  địa điểm ---	
		$sql    = 'Insert into cet_diadiemthi(MaDiadiem,TenDiadiem,TongSothisinh, Diachi, Ghichu,Sophong, SoTS_phong,Macumthi)  
		value("'.$MaDiadiem.'","'. $TenDiadiem .'",'.$Tongsothisinh .',"'.$Diachi .'","'.$Ghichu.'",'.$Tongsophong.','.$SoTSphong.',"'.$Macumthi.'")';

		$result = mysql_query($sql, $link);
		if (!$result) {	echo 'MySQL Error: 2' . $sql;	 exit;	}
	//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$MaDiadiem.'","' .$datetime.'","Thêm", "Thêm điểm thi"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
	$MaDiadiem="";
	$TenDiadiem = "";
	$Diachi ="";
	$Ghichu="";
	$Tongsothisinh="";
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
echo '<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Nhập Địa điểm thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
echo '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.' ('.$username .') </i></td></tr>';
echo '</table>';
echo '<hr>';
//------------------//Tiêu đề trang------------------------------
echo '<br><div class="rowdiv" style="clear:both;width:90%">
	<fieldset class="styleset">
	<legend><b>Thông tin Địa điểm thi</b></legend>';
	
	echo '<form action="cet_NhapDiadiemthi.php" method="post" name ="cet_NhapDiadiemthi">' ;
	
	echo '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">
	
	<tr><td width="20%" height ="'.$Height.'">Mã điểm thi : </td>
		<td> <input type = "textbox"  name = "MaDiadiem"  value = "'. $MaDiadiem .'" style="height:'.$Height1.';font-size: 12pt">
			&emsp;&emsp;Cụm thi:'.cet_List_cumthi($link,"Macumthi",$Macumthi) ;
	print'	</td>
	</tr>';
	echo '<tr><td height ="'.$Height.'">Tên Điểm thi :</td><td> <input type = "textbox" name = "TenDiadiem" value="'.$TenDiadiem.'" style="width:100%;height:'.$Height1.';font-size: 12pt"></td></tr>';
	
	echo '<tr><td  height ="'.$Height. '" >Địa chỉ điểm thi:   </td><td> <textarea  rows ="2" name ="Diachi" style="width:100%;font-size: 12pt" >'.$Diachi.'</textarea></td></tr>';		
	echo '<tr><td height ="'.$Height.'">Tổng số phòng thi:</td><td> <input type = "textbox"  name = "Tongsophong"  value = "'. $Tongsophong .'" style="height:'.$Height1.';font-size: 12pt" size="8" onchange = "JavaScript:check2();">
			&nbsp;&nbsp;&nbsp;&nbsp;Số thí sinh /phòng <input type = "textbox"  name = "SoTSphong"  value = "'. $SoTSphong .'" style="height:'.$Height1.';font-size: 12pt" size="8" onchange = "JavaScript:check3();"> 
			&nbsp;&nbsp;&nbsp;&nbsp;Tổng số thí sinh:<input type = "textbox"  name = "Tongsothisinh"  value = "'. $Tongsothisinh .'" style="height:'.$Height1.';font-size: 12pt" size="8" readonly ="readonly"></td></tr>';
		
	echo '<tr><td  height ="'.$Height. '" >Ghi chú:   </td><td> <textarea  rows ="2" name ="Ghichu" style="width:100%;font-size: 12pt" >'.$Ghichu.'</textarea></td></tr>';		
	
	echo'</table>';
	echo '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	echo '<input name="Sendcheck" type="hidden" value ="">';
	//echo '<p align="center"><input name="Send" type="botton" onclick ="JavaScript:check();" value = "Ghi nhận" style="font-size: 12pt;font-weight:bold"/>';
	echo '&nbsp;&nbsp;<input name="Send" type="Reset" value = "Hủy" style="font-size: 12pt;font-weight:bold"> </p>';

	echo '</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
