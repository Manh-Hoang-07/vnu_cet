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
<title>Nhập thêm trường</title>
<script>
<!--
function check1() {//alert('c');
	if((document.cet_Nhaptruong.Matinh.value=="0")||(document.cet_Nhaptruong.Matinh.value==""))	{
		alert('Chưa chọn thuộc tỉnh!'); 
		document.cet_Nhaptruong.Matinh.focus(); 
		return false;
		}
	if((document.cet_Nhaptruong.Mahuyen.value=="0")||(document.cet_Nhaptruong.Mahuyen.value==""))	{
		alert('Chưa chọn huyện/quận chưa hợp lệ!'); 
		document.cet_Nhaptruong.Mahuyen.focus(); 
		return false;
		}	
	if((document.cet_Nhaptruong.Tentruong.value=="0")||(document.cet_Nhaptruong.Tentruong.value==""))	{
		alert('Tên trường chưa hợp lệ!'); 
		document.cet_Nhaptruong.Tentruong.focus(); 
		return false;
		}	
	if((document.cet_Nhaptruong.Makhuvuc.value=="0")||(document.cet_Nhaptruong.Makhuvuc.value==""))	{
		alert('Chưa xác định khu vực!'); 
		document.cet_Nhaptruong.Makhuvuc.focus(); 
		return false;
		}
		
	return true;
	
}	
function check(){

	if (check1()) 
	{
		//alert('c OK');
		document.cet_Nhaptruong.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_Nhaptruong.submit();
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
	if(empty($username)) {	thongbaoloi1('Bạn chưa đăng nhập !');  	exit;	}
	if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ !'); exit;}
	mysql_query("SET NAMES utf8");	
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
	//me('them:'.$userfullname);
	$Tendonvi =Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
//------------------------------------------------------------------------------------------------------------
	
//-------------------------------------------------------------------------------------------------------------
	$codeOK = ($_POST['Sendcheck']);
	$Matinh = ($_POST['Matinh']);
	$Mahuyen = ($_POST['Mahuyen']);
	$Tentruong = ($_POST['Tentruong']);
	$Makhuvuc = ($_POST['Makhuvuc']);
	$Ghichu   = ($_POST['Ghichu']);
	
//-----------------------------------------------------------
	
if($codeOK =="Ghi nhậnOK"){
   
///------------kiểm tra trùng mã---------

	
	if(Get_name2($link,"truongthpt","Matruong","Mahuyen",$Mahuyen,"Tentruong", $Tentruong)!="") 
	{ thongbaoloi( "Trùng tên trường (đã có)!");}
	else{
	
	//----Ghi trường---	
		$sql    = 'Insert into truongthpt(Matinh,Mahuyen,Tentruong,Khuvuc, Ghichu)  
		value("'.$Matinh.'","'. $Mahuyen .'","'.$Tentruong.'","'.$Makhuvuc.'","'.$Ghichu.'")';
		
		$result = mysql_query($sql, $link);
		if (!$result) {	thongbaoloi('Lỗi cơ sở dữ liệu :' . $sql);	 exit;	}
	
	
	$Tentruong= " ";
	
	$Ghichu =" ";
	me("Đã ghi thêm trường!");
	}//end else
	//setcookie('name',$username,time()+3000);
	//setcookie('pass',$password,time()+3000);
	}//Hết ghi dữ liệu if($code == "Ghi quận huyện")


//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	
//$fullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
//$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 26pt; color: #0000FF" >&nbsp;&nbsp; Thêm trường mới </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.'('.$username .') </i></td></tr>';
print '</table>';
print '<hr>';
//------------------//Tiêu đề trang------------------------------

print '<br><div class="rowdiv" style="clear:both;width:80%">
	<fieldset class="styleset">
	<legend><b>Nhập thông tin trường </b></legend>';
	print '<form action="cet_Nhaptruong.php" method="post" name ="cet_Nhaptruong">' ;
	print '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	
	print '<tr height ="'.$Height.'"><td width="25%" height ="'.$Height.'">Thuộc tỉnh/thành phố : </td> ';
	print '<td>'.cet_List_tinh($link,"Matinh",$Matinh," ",1).'</td></tr>';
	print '<tr height ="'.$Height.'"><td width="20%" height ="'.$Height.'">Thuộc quận/huyện/thị xã xã : </td> ';
	print '<td>'.cet_List_huyen($link,"Mahuyen",$Matinh,$Mahuyen," ", 0).'</td></tr>';
	print '<tr height ="'.$Height.'"><td> Tên trường :</td><td> <input type = "textbox" name = "Tentruong" value ="'.$Tentruong.'" style="height:'.$Height1.';width:60%;font-size: 12pt"></td>';
	print '<tr height ="'.$Height.'"><td>Thuộc khu vực: </td>';
	print '<td>'.cet_List_khuvuc($link,"Makhuvuc",$Makhuvuc,"",0);
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
