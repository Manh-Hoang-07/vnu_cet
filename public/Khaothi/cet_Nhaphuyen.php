<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Nhapquanhuyen.php
// Chức năng: Nhập thêm quận huyện
// Bản: 1.1
// Thời gian: tháng 4/2016
// Nhóm thực hiện: Viện Quy hoạch xây dựng Hà Nội
//--------------------------------------------------------------------------------------------
-->
<?php
	session_start();
?>
<html>
 <head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Nhập thêm quận huyện </title>
<script>
<!--
function check1() {//alert('c');
	
	if((document.cet_NhapHuyen.Tenhuyen.value=="0")||(document.cet_NhapHuyen.Tenhuyen.value==""))	{
		alert('Tên huyện/quận chưa hợp lệ!'); 
		document.cet_NhapHuyen.Tenhuyen.focus(); 
		return false;
		}	
	if((document.cet_NhapHuyen.Matinh.value=="0")||(document.cet_NhapHuyen.Matinh.value==""))	{
		alert('Chưa chọn thuộc tỉnh!'); 
		document.cet_NhapHuyen.Matinh.focus(); 
		return false;
		}
	if((document.cet_NhapHuyen.Phamvi.value=="0")||(document.cet_NhapHuyen.Phamvi.value==""))	{
		alert('Chưa xác định loại quận/huyện/thị xã!'); 
		//document.cet_NhapHuyen.Matinh.focus(); 
		return false;
		}
		
	return true;
	
}	
function check(){

	if (check1()) 
	{
		//alert('c OK');
		document.cet_NhapHuyen.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_NhapHuyen.submit();
		}
}
// -->
// -->
</script>
</head>
<body bgcolor="#CCFFDD">
  
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
//------------------------------------------------------------------------------------------------------------
	
	//if( cet_Acheck($link,$username,$password)!=1) {thongbaoloi('Bạn không có chức năng nhập huyện'); exit;}
		
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");

	$Madonvi1 = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
//-------------------------------------------------------------------------------------------------------------
	$codeOK = htmlspecialchars($_POST['Sendcheck']);
	$Matinh = htmlspecialchars($_POST['Matinh']);
	
	
	$Tenhuyen = htmlspecialchars($_POST['Tenhuyen']);
	$Phamvi = htmlspecialchars($_POST['Phamvi']);//1: nội thành, 3: ngoại thành,2:thị xã
	$Ghichu   = htmlspecialchars($_POST['Ghichu']);
	
//-----------------------------------------------------------
	
if($codeOK =="Ghi nhậnOK"){
   
///------------kiểm tra trùng mã---------

	
	if(Get_name2($link,"quanhuyen","Mahuyen","Matinh",$Matinh, "Tenquanhuyen",$Tenhuyen)) 
	{ thongbaoloi( "Trùng tên huyện/quận/thị xã!");}
	else{
	
	//----Ghi quan_huyen ---	
		$sql    = 'Insert into quanhuyen(Matinh,Tenquanhuyen,Phamvi, Ghichu)  
		value("'.$Matinh.'","'. $Tenhuyen .'","'.$Phamvi .'","'.$Ghichu.'")';
		//stop($sql);
		$result = mysql_query($sql, $link);
		if (!$result) {	thongbaoloi('Lỗi cơ sở dữ liệu :' . $sql);	 exit;	}
	
	$Matinh=" ";
	$Tenquanhuyen= " ";
	$Phamvi =" ";
	$Ghichu =" ";
	me("Đã ghi huyện/quận !");
	}//end else
	//setcookie('name',$username,time()+3000);
	//setcookie('pass',$password,time()+3000);
	}//Hết ghi dữ liệu if($code == "Ghi quận huyện")


//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	
$fullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 26pt; color: #0000FF" >&nbsp;&nbsp; Thêm Quận/Huyện </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$fullname.'('.$username .') </i></td></tr>';
print '</table>';
print '<hr>';
//------------------//Tiêu đề trang------------------------------

print '<br><div class="rowdiv" style="clear:both;width:70%">
	<fieldset class="styleset">
	<legend><b>Nhập thông tin Quận/Huyện/Thị xã </b></legend>';
	
	print '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<form action="cet_Nhaphuyen.php" method="post" name ="cet_NhapHuyen">' ;
	print '<tr height ="'.$Height.'"><td width="20%" height ="'.$Height.'">Thuộc tỉnh/thành : </td> ';
	
	print '<td>'.cet_List_tinh($link,"Matinh","Matinh",$Matinh,"",0).'</td>
	</tr>';
	print '<tr height ="'.$Height.'"><td> Tên quận huyện :</td><td> <input type = "textbox" name = "Tenhuyen" value ="'.$Tenquanhuyen.'" style="height:'.$Height1.';width:60%;font-size: 12pt"></td>';
	print '<tr height ="'.$Height.'"><td>Phạm vi: </td><td>';
	print '<input type="radio" value="1" name = "Phamvi" '.$checkNoithanh. ' "> Quận nội thành';
	
	print '<input type="radio" value="2" name = "Phamvi" '.$checkThixa. ' )"> Thị xã'; 
	print '<input type="radio" value="3" name = "Phamvi" '.$checkNgoaithanh. ' )"> Huyện (ngoại thành)';
	print '</td></tr>';
	print '<tr height ="'.$Height.'"><td>Thông tin thêm:   </td><td><input type = "textbox" name = "Ghichu"  value = "'.$Ghichu.'" style="height:'.$Height1.';width:95%;font-size: 12pt"></p>';

	print'</table>';
	print'<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print'<input name="Sendcheck" type="hidden" value ="">';
	//print '<input name="Send" type="Reset" value = "Khởi tạo lại" style="font-size: 12pt;fontweight:bold"> </p>';

	print '</form>';

	mysql_free_result($result);

?> 

</body>
</html> 
