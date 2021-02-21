<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: NhapKythi.php
// Chức năng: Nhập Kỳ thi
// Phiên bản: 1.1
// Thời gian: tháng 12/2020
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
//--------------------------------------------------------------------------------------------
-->
<?php
	session_start();
?>
<html>
 <head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Nhập Kỳ thi</title>
<script>
<!--
function check1() {
	
	if((document.cet_NhapKythi.MaKythi.value=="0")||(document.cet_NhapKythi.MaKythi.value==""))	{
		alert('Mã kỳ thi chưa hợp lệ!'); 
		document.cet_NhapKythi.MaKythi.focus(); 
		return false;
		}
	if((document.cet_NhapKythi.TenKythi.value=="0")||(document.cet_NhapKythi.TenKythi.value==""))	{
		alert('Tên kỳ thi chưa hợp lệ!'); 
		document.cet_NhapKythi.TenKythi.focus(); 
		return false;
		}	
	
	var Tungay = document.cet_NhapKythi.Tungay.value;
	var Toingay = document.cet_NhapKythi.Toingay.value;	
	var Handangky = document.cet_NhapKythi.Handangky.value;	
	if((Tungay =="0")||(Tungay==""))	{
		alert('Ngày thi chưa hợp lệ!'); 
		document.cet_NhapKythi.Tungay.focus(); 
		return false;
		}	
	if((Toingay =="0")||(Toingay==""))	{
		alert('Ngày thi chưa hợp lệ!'); 
		document.cet_NhapKythi.Toingay.focus(); 
		return false;
		}	
			
	if(Tungay>Toingay){
		alert('Ngày thi chưa hợp lệ!'); 
		document.cet_NhapKythi.Toingay.focus(); 
		return false; 
	}	
	if((Handangky =="0")||(Handangky==""))	{
		alert('Hạn đăng ký chưa hợp lệ!'); 
		document.cet_NhapKythi.Handangky.focus(); 
		return false;
	}			
	if (Handangky>=Tungay){
		alert('Hạn đăng ký chưa hợp lệ!'); 
		document.cet_NhapKythi.Handangky.focus();  
		return false;
	}	
	
	
	/*
		if((document.cet_NhapKythi.Socathi.value=="0")||(document.cet_NhapKythi.Socathi.value==""))	{
		alert('Tổng số ca thi chưa hợp lệ!'); 
		document.cet_NhapKythi.Socathi.focus(); 
		return false;
		}	
		*/		
	if((document.cet_NhapKythi.MotaKythi.value=="0")||(document.cet_NhapKythi.MotaKythi.value==""))	{
		alert('Mô tả kỳ thi chưa hợp lệ!'); 
		document.cet_NhapKythi.MotaKythi.focus(); 
		return false;
		}		
	if((document.cet_NhapKythi.Tongsodachon.value=="0")||(document.cet_NhapKythi.Tongsodachon.value==""))	{
		alert('Chọn địa điểm thi chưa hợp lệ!'); 
		//document.cet_NhapKythi.Tongsodachon.focus(); 
		return false;
		}	
 	if((document.cet_NhapKythi.Tongsomon.value=="0")||(document.cet_NhapKythi.Tongsomon.value==""))	{
		alert('Chọn môn thi chưa hợp lệ!'); 
		//document.cet_NhapKythi.Tongsodachon.focus(); 
		return false;
		}	
	
	return true;
	
}	
function check(){
	
	if (check1()) 
	{
		
		document.cet_NhapKythi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_NhapKythi.submit();
		}
}
function checksum(c, d){
	
		var k,n=0;
		k= parseInt(c.value,10);
		if(document.cet_NhapKythi.Tongsodachon.value=="") n=0;
		else 	n = parseInt(document.cet_NhapKythi.Tongsodachon.value,10);
		
		if (d.checked ==true)	 n += k;
		else n -= k;
		document.cet_NhapKythi.Tongsodachon.value= n;
		
}
function check2(){
	var Checkbox = document.getElementsByName('MTcheck');
  var Lephi = document.getElementsByName('Lephithi');
	var result = 0;
	for (var i = 0; i < Checkbox.length; i++) 
		if(Checkbox[i].checked==true){
			Lephi[i].disabled = false;
			result += parseInt (Lephi[i].value,10);	
		}
		else {
			Lephi[i].disabled = true;		
		}
	document.cet_NhapKythi.TongLephi.value = result;
}
function checksum3(){
		var Lephi = document.getElementsByName('Lephithi');
		var Checkbox = document.getElementsByName('MTcheck');
  var result = 0;
		
		for (var i = 0; i < Lephi.length; i++) 
			if(Checkbox[i].checked==true)		
			result += parseInt (Lephi[i].value,10);
		
		document.cet_NhapKythi.TongLephi.value = result;
}
function check4(check, ngaythi, giothi, lephi, luachon){
	var tong = 0;
	//alert('check4');
	tong = parseInt(document.cet_NhapKythi.Tongsomon.value,10);
	if(check.checked==true){
		lephi.disabled = false;
		ngaythi.disabled = false;
		giothi.disabled = false;
		luachon.disabled = false;
		tong++;
		
		}
	else {
		lephi.disabled = true;		
		ngaythi.disabled = true;
		giothi.disabled = true;
		luachon.disabled = true;
		tong--;
		}
	document.cet_NhapKythi.Tongsomon.value = tong;
}
function check5(){
	var tong = 0;
	//alert('check4');
	tong = parseInt(document.cet_NhapKythi.Socathi.value,10);
	if(tong<=0){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_NhapKythi.Socathi.focus(); 
		
		}
	else {
		
		document.cet_NhapKythi.Socathi.value = tong; 
		}
	document.cet_NhapKythi.Tongsomon.value = tong;
}
function myFunction(){
	alert('bye');
}
// -->
</script>
</head>
<body bgcolor="#DCFFFF">
 
<?php 

error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//-----------------------Các hàm-------------------------------------------
include "Libs/lib.php";
$Width =1024;
$Height =32;
$Height1=28;
$Border = 1;
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
	$MaKythi = trim($_POST['MaKythi']);
	$TenKythi = $_POST['TenKythi'];
	$MotaKythi = $_POST['MotaKythi'];
	$Tungay = $_POST['Tungay'];
	$Toingay = $_POST['Toingay'];
	$Handangky = $_POST["Handangky"];
	$Socathi = $_POST["Socathi"];
	
//-----------------------------------------------------------

if($codeOK =="Ghi nhậnOK"){

//------------kiểm tra trùng mã---------

	$sql  = 'Select MaKythi from cet_kythi where MaKythi="'.$MaKythi.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . $sql; 	exit;	}
	
	if(mysql_num_rows($result)>0) { thongbaoloi( "Trùng mã Kỳ  thi!!");}
	else{
	
	//----Ghi  Ky thi ---	
		$sql  = 'Insert into cet_kythi(MaKythi,TenKythi,Mota,Tungay,Toingay,Handangky)  
		value("'.$MaKythi.'","'. $TenKythi .'","'.$MotaKythi .'","'.$Tungay .'","'.$Toingay.'","'.$Handangky.'")';
		
		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error: 2' . $sql;	 exit;	}
	
	

	//--------------------Ghi địa điểm----------------
	$Tongso_DD = $_POST["Tongso_DD"];
	for($i=1; $i<=$Tongso_DD; $i++) {
		$bMaDiadiem = "AnMaDD".$i;
		$MaDiadiem = $_POST[$bMaDiadiem];
		$bDDcheck = "DDcheck".$i;
		$DDcheck = $_POST[$bDDcheck] ;
		if($DDcheck == "1"){
			$sqldd = 'INSERT INTO cet_kythi_diadiem (Makythi, Madiadiem) 
					VALUES ("'.$MaKythi.'","'.$MaDiadiem.'")';
			$resultdd = mysql_query($sqldd, $link);
			if (!$resultdd) {	print 'MySQL Error: 2' . $sqldd;	 exit;	}		
		}
	}
	//--------------------/Ghi địa điểm----------------
	
	//--------------------Ghi môn thi----------------
	$Tongso_MT = $_POST["Tongso_MT"];
	//$ArMT = $_POST["Lephithi"];
	//print_r ($ArMT); exit;
	
	for($i=1; $i<=$Tongso_MT; $i++) {
		$bMTcheck ="MTcheck".$i;
		$MTcheck = $_POST[$bMTcheck] ;
		
		
		if($MTcheck == "1"){
			$bMaMonthi = "MaMT".$i;	$MaMonthi = $_POST[$bMaMonthi];
			$bLuachon = "Luachon".$i; $Luachon = ($_POST[$bLuachon]=="1"? 1:0);
			$bThoigianlambai = "Thoigianlambai".$i; $Thoigianlambai = $_POST[$bThoigianlambai];
			//$bNgaythi = "Ngaythi".$i; $Ngaythi = $_POST[$bNgaythi];
			
			$bLephithi = "Lephi".$i; $Lephithi = $_POST[$bLephithi];
			
			
			$sqlmt = 'INSERT INTO cet_kythi_monthi(Makythi, MaMonthi, Luachon, Lephithi, Thoigianlambai) VALUES (
			"'.$MaKythi.'","'. $MaMonthi.'",'. $Luachon.',"'. $Lephithi.'","'.$Thoigianlambai.'")';
			$resultmt = mysql_query($sqlmt, $link);
			if (!$resultmt) {	print 'MySQL Error: 3' . $sqlmt;	 exit;	}		
				
		}
	}
	
	//--------------------/Ghi Môn thi----------------
	$path = 'data/'.$MaKythi;
	if(!file_exists($path))
		mkdir($path);

	//--------------------------------------------------
	cet_log2($link, $MaKythi, "Taokythi", "Tạo kỳ thi ",$username);
	$MaKythi="";
	
	$TenKythi = "";
	$MotaMonthi ="";
	$Ghichu="";
	thongbaoloi( "Đã ghi nhận!!");
	
	//setcookie('name',$username,time()+1000);
	//setcookie('pass',$password,time()+1000);
	cet_log($link,$MaKythi,"Tạo kỳ thi", $username);
	//Hết ghi dữ liệu if($code == "Ghi môn hoc")
	}	
 }

//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	
$Madonvi1 = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
$bgcolor = "#00CCEE";
print '<table border="0" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Tạo  Kỳ  thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.' ('.$username .') </i></td></tr>';
print '</table>';
print '<hr>';
//------------------//Tiêu đề trang------------------------------
print'<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">
	<legend><b>Thông tin  Kỳ  thi</b></legend>';
	
	print '<form action="cet_NhapKythi.php" method="post" name ="cet_NhapKythi" >' ;
	
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	
	print '<tr><td width="14%" height ="'.$Height.'">Mã Kỳ  thi : </td>
		<td width="15%"> <input type = "textbox"  name = "MaKythi"  value = "'. $MaKythi .'" style="height:'.$Height1.';font-size: 12pt" size ="10"></td>
		
	  <td width="15%" align="right">Tên Kỳ  thi :</td><td colspan="2"> <input type = "textbox" name = "TenKythi" value="'.$TenKythi.'" style="height:'.$Height1.';width:100%;font-size: 12pt"></td>
		
	</tr>';
	print '<tr><td height ="'.$Height.'">Từ ngày : </td><td>
		 <input type = "Date"  name = "Tungay"  value = "'. $Tungay .'" style="height:'.$Height1.';font-size: 12pt" size ="50"></td>
		 <td >Tới ngày : </td><td><input type = "Date"  name = "Toingay"  value = "'. $Toingay .'" style="height:'.$Height1.';font-size: 12pt"></td>
		 <td align="right"> 
		 Hạn đăng ký : <input type = "Date"  name = "Handangky"  value = "'. $Handangky .'" style="height:'.$Height1.';font-size: 12pt"></td>
			</tr>';
			//Số ca: <input type = "textbox" name = "Socathi" size ="3" value="'.$Socathi.'" style="height:'.$Height1.';font-size: 12pt" onchange ="Java:check5();">
	print '<tr><td  height ="'.$Height. '" >Mô tả Kỳ  thi: </td><td colspan="4"> <textarea  rows ="2" name ="MotaKythi" style="width:100%;font-size: 12pt" >'.$MotaMonthi.'</textarea></td></tr>';		
	//print '<tr><td  height ="'.$Height. '" >Ghi chú: </td><td colspan="3"> <textarea  rows ="2" name ="Ghichu" style="width:100%;font-size: 12pt" >'.$Ghichu.'</textarea></td></tr>';		
	
	print'</table>';
	print'</fieldset>';
	
	//------------- Các địa điểm ------------
	
	print '<fieldset class="styleset">	<legend><b>Chọn địa điểm tổ chức thi(<input type ="text" name ="Tongsodachon" value ="'.$Tongsodachon.'" readonly="readonly" size ="5">)</b></legend>';
	$sqldd = 'SELECT id, MaDiadiem, TenDiadiem, Diachi, TongSothisinh,Ghichu FROM cet_diadiemthi WHERE Trangthai=0';
	$resultdd = mysql_query($sqldd, $link);
	if (!$resultdd) {	print 'MySQL Error: 2' . $sqldd;	 exit;	}	
	$Tongso_DD = mysql_num_rows($resultdd);
	print '<input type ="hidden" name ="Tongso_DD" value ="'.$Tongso_DD.'"> ';
	
	print '<div style="width: 100%; height:200px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	print '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr>
			 <td width="10%" align ="left"><b>Mã điểm </b><input type ="hidden" name ="Tongsodachon2" value ="'.$Tongsodachon.'" readonly="readonly" size ="5"></td>
			 <td width="31%" align ="center"><b>Tên địa điểm</b></td>
			 <td width="9%" align ="center"><b>Số TS</b> </td>
			 
			 <td width="10%" align ="left"><b>Mã điểm </b><input type ="hidden" name ="Tongsodachon1" value ="'.$Tongsodachon.'" readonly="readonly" size ="5"></td>
			 <td width="31%" align ="center"><b>Tên địa điểm</b></td>
			 <td align ="center"><b>Số TS</b> </td>';
	print '</tr>';
	for($k= 1; $k<=$Tongso_DD; $k++){ 
	
		$row = mysql_fetch_row($resultdd); 
		$iddd = $row[0];
		$MaDiadiem=$row[1];
		$TenDiadiem=$row[2];
		$TongSothisinh=$row[4];
		$Diachi = $row[3];
		$Ghichu = $row[5];
		$bDDcheck = "DDcheck".$k; 
		$AnMaDiadiem ="AnMaDD".$k;
		$AnsoTH = "AnsoTSdd".$k;
		
		if($k % 4 ==1) $rcolor = "#C0C0C0";  else $rcolor= "#3399FF";
		if($k % 2 ==1){
			
			print '<tr bgcolor="'.$rcolor.'">
				<td align ="left"><input type ="checkbox" name ="'.$bDDcheck.'" value="1"  style="height:13pt;width:13pt" onchange ="Java:checksum('.$AnsoTH.',' .$bDDcheck.');">&nbsp;&nbsp;'.$MaDiadiem.'</td>
				<td>'.$TenDiadiem.'</td>
				<td align ="center">'.$TongSothisinh.'<input type ="hidden" name ="'.$AnsoTH.'" value ="'.$TongSothisinh.'"></td>
			
				 <input type ="hidden" name ="'.$AnMaDiadiem.'" value ="'.$MaDiadiem.'"></td>';
		
		}
		else{
			
			print '<td align ="left"><input type ="checkbox" name ="'.$bDDcheck.'" value="1"  style="height:13pt;width:13pt" onchange ="Java:checksum('.$AnsoTH.',' .$bDDcheck.');">&nbsp;&nbsp;'.$MaDiadiem.'</td>
				<td>'.$TenDiadiem.'</td>
				<td align ="center">'.$TongSothisinh.'<input type ="hidden" name ="'.$AnsoTH.'" value ="'.$TongSothisinh.'"></td>
			
				 <input type ="hidden" name ="'.$AnMaDiadiem.'" value ="'.$MaDiadiem.'"></td></tr>';
		
		}
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	if($Tongso_DD % 2 ==1) print'<td></td><td></td><td></td></tr>';		
	print '</table>';
	print '</div>';
	print '</fieldset>';
	//--------------------------
	//------------- Môn thi ------------
	
	print '<fieldset class="styleset">	<legend><b>Chọn Môn thi</b></legend>';
	
	$sqlmt = 'SELECT id_monthi, MaMonThi, TenMonThi, Mota, Hinhthucthi,Thoigianlambai FROM cet_monthi  WHERE Trangthai=0';
	
	$resultmt = mysql_query($sqlmt, $link);
	if (!$resultmt) {	print 'MySQL Error: 3' . $sqlmt;	 exit;	}	
	$Tongso_MT = mysql_num_rows($resultmt);
	print '<input type ="hidden" name ="Tongso_MT" value ="'.$Tongso_MT.'"> ';
	
	print '<div style="width: 100%; height:200px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	print '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr><td width="13%"><b>Mã môn</b></td><td width="50%"><b>Tên môn thi</b></td><td width="15%"><b>Hình thức</b></td><td width="10%"><b>Tùy chọn</b></td>
	<td width="12%"><b>Ngày thi</b></td><td width="17%"><b>Tg làm bài</b></td><td><b>Lệ phí <input type ="hidden" name ="Tongsomon" value ="0"></b></td>';
	
	print '</tr>';
	for($k= 1; $k<=$Tongso_MT; $k++){ 
	
		$rowmt = mysql_fetch_row($resultmt); 
		$idmt = $rowmt[0];
		$MaMonthi=$rowmt[1];
		$TenMonthi=$rowmt[2];
		$Motamonthi=$rowmt[3];
		if($rowmt[4]==1) $Hinhthucthi = "Trắc nghiệm";
		else $Hinhthucthi = "Tự luận";
		$Thoigianlambai = $rowmt[5];
		$bMTcheck = "MTcheck".$k; 
		$bMaMonthi ="MaMT".$k;
		$AnsoMT = "AnsoMT".$k;
		$bNgaythi = "Ngaythi".$k;
		$bThoigianlambai = "Thoigianlambai".$k;
		$bLephithi = "Lephi".$k;
		$bLuachon = "Luachon".$k;
		if($k % 2 ==1) $rcolor = "#C0C0C0"; else $rcolor= "#3399FF";
		print '<tr bgcolor="'.$rcolor.'">
			<td><input type ="checkbox" name ="'.$bMTcheck.'" value="1"  style="height:13pt;width:13pt" onchange ="Java:check4('.$bMTcheck.','.$bNgaythi.','.$bThoigianlambai.','.$bLephithi.','.$bLuachon.');">&nbsp;&nbsp;
			
			'.$MaMonthi.'</td>
			<td>'.$TenMonthi.'</td>
			<td>'.$Hinhthucthi.'</td>
			<td align ="center"><input type ="checkbox" name ="'.$bLuachon.'" value="1"  style="height:13pt;width:13pt"  disabled></td>
			<td><input type ="Date" name ="'.$bNgaythi.'" onchange = "Java:check5('.$bNgaythi.');" disabled></td>
			<td><input type ="textbox" name = "'.$bThoigianlambai. '"  value ="'.$Thoigianlambai.'"  size ="10" style="heght: 90%;" onchange ="Java:check6('.$bThoigianlambai.');" disabled></td>	
			<td><input type ="textbox" name ="'.$bLephithi.'" value ="0" onchange ="Java:checksum3();" disabled ></td>	
			<input type ="hidden" name ="'.$bMaMonthi.'" value ="'.$MaMonthi.'"></td>
			</tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
		
	print '</table>';
	
	print '</div>';
	print '</fieldset>';
	
	//------------- Ca thi ------------
	
	
	//----------------------------------------hết ca thi----------
	//----------------------------------------------------------------
	
	print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '<input name="Sendcheck" type="hidden" value ="">';
	
	print '&nbsp;&nbsp;<input name="Send" type="Reset" value = "Hủy" style="font-size: 12pt;font-weight:bold"> </p>';

	print '</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
