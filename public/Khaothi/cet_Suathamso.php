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
<title>Sửa tham số kỳ thi</title>
<style>

input[type=text] {
  width: 100%;
  padding: 5px 10px;
  margin: 0px 0;
  box-sizing: border-box;
  border: 0px solid white;
  border-radius: 0px;
  background-color: #CCFFDD;
  color: black;
}
 
</style>
<script>
<!--
function check1() {
	var somuc = parseInt(document.cet_Suathamso.Tongso.value,10);
	var i=0;
	for(i=1; i<=somuc; i++){
		var bgt ="gt"+i;
		
		if(document.getElementById(bgt).value==""){
			alert('Giá trị tham số không được để trống!!'); 
			document.getElementById(bgt).focus();
			return false;
		}
		var bten ="ten"+i;
		if(document.getElementById(bten).value==""){
			alert('Mô tả tham số không được để trống!!'); 
			document.getElementById(bten).focus();
			return false;
		}
	}
	return true;
}	
function check(){

	if (check1()) 
	{
		//alert('c1 OK');
		document.cet_Suathamso.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_Suathamso.submit();
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
	//$username   = $_COOKIE['name'];
	//$password = $_COOKIE['pass'];
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	if(empty($username)) {	thongbaoloi1('Bạn chưa đăng nhập !');  	exit;	}
//------------------------------------------------------------------------------------------------------------
	if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ'); exit;}
	if(!cet_Acheck($link,$username,$password)) {thongbaoloi('Bạn không có chức năng cập nhật tham số'); exit;}
		
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");

//-------------------------------------------------------------------------------------------------------------
	$codeOK = ($_POST['Sendcheck']);
	
//-----------------------------------------------------------
	
if($codeOK =="Ghi nhậnOK"){
	$Tongso = $_POST['Tongso'];
	for($id = 1; $id <= $Tongso; $id++){
		$bma ="ma".$id; $bgt ="gt".$id;  $bten ="ten".$id;
		
		$Mathamso=$_POST[$bma]; 		
		$Giatri=$_POST[$bgt]; 		
		$Mota=$_POST[$bten];
		
		$sql = 'UPDATE cet_thamso_kythi SET Giatri="'.$Giatri.'",Tenthamso ="'.$Mota.'"
		WHERE Mathamso = "'.$Mathamso.'"';
   		$result = mysql_query($sql, $link);
		if (!$result) {	thongbaoloi('Lỗi cơ sở dữ liệu :' . $sql);	 exit;	}
	
	}
	cet_log2($link,"Suathamso", "sửa tham số", "sửa tham số", $username);
	me("Đã Cập nhật tham số!");
	
	//setcookie('name',$username,time()+3000);
	//setcookie('pass',$password,time()+3000);
	}

//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	
$fullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 26pt; color: #0000FF" >&nbsp;&nbsp; Cập nhật tham số kỳ thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$fullname.'('.$username .') </i></td></tr>';
print '</table>';
print '<hr>';
//------------------//Tiêu đề trang------------------------------

print '<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">
	<legend><b>Tham số </b></legend>';
	print '<form action="cet_Suathamso.php" method="post" name ="cet_Suathamso">' ;
	
	$sql = 'SELECT Mathamso, Giatri, Tenthamso FROM cet_thamso_kythi WHERE (1)';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc dữ liệu trường :' . $sql);	 exit;	}
	$Tongso_hoso = mysql_num_rows($result);
	
	print '<table border="1" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
	print '<tr height="'.$Height.'"><td width="5%" align="center">STT</td>
	<td width="10%" align="center"><b>Mã tham số </b></td><td width="8%" align="center"><b>Giá trị</b></td><td align="center"><b>Mô tả</b></td></tr>' ;
	print '<input type ="hidden" name ="Tongso" Id ="Tongso" value ="'.$Tongso_hoso.'">';
	
	for($id=1; $id <= $Tongso_hoso; $id++) {
		$bma ="ma".$id;$bgt ="gt".$id; $bten ="ten".$id;
		$row = mysql_fetch_row($result);	
		$Mathamso=$row[0]; 		$Giatri=$row[1]; 		$Mota=$row[2];
		
		print '<tr height="'.$Height.'"><td align="center">'.$id.'</td>
		<td  align="left"> <input type ="text" Id ="'.$bma.'"  name ="'.$bma.'"  value ="'.$Mathamso.'" readonly ="readonly"></td>
		<td align="center"><input type ="text" Id ="'.$bgt.'"  name ="'.$bgt.'"  value ="'.$Giatri.'" style ="width:100%;heght:30pt" class="button"></td>
		<td align="center"><input type ="text" Id ="'.$bten.'" name ="'.$bten.'" value ="'.$Mota.'" style ="width:100%"></td></tr>' ;
	
	}
	print '</table>';
	print'<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print'<input name="Sendcheck" type="hidden" value ="">';
	
	print '</form>';

	mysql_free_result($result);

?> 

</body>
</html> 
