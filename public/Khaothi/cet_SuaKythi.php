<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: SuaKythi.php
// Chức năng: Cập nhật kỳ thi
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

<title>Cập nhật kỳ thi</title>
<style>

table {
    border-collapse: collapse;
    width: 100%;
    border: 0px solid black;
} 
table.ext0{
    table-layout: fixed;
    border: 0px solid black;
}
table.ext1{
    table-layout: fixed;
    border: 1px solid black;
}
.button {
    border: none;
    color: black;
    padding: 0px 0px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 0px 0px;
    cursor: pointer;
}
</style>
<script>
<!--
function check1() {
	
	if((document.cet_SuaKythi.MaKythi.value=="0")||(document.cet_SuaKythi.MaKythi.value==""))	{
		alert('Mã kỳ thi chưa hợp lệ!'); 
		document.cet_SuaKythi.MaKythi.focus(); 
		return false;
		}
	
	
	if((document.cet_SuaKythi.Tenkythi1.value=="0")||(document.cet_SuaKythi.Tenkythi1.value==""))	{
		alert('Tên kỳ thi chưa hợp lệ!'); 
		document.cet_SuaKythi.Tenkythi1.focus(); 
		return false;
		}	
		
	var Tungay = document.cet_SuaKythi.Tungay.value;
	var Toingay = document.cet_SuaKythi.Toingay.value;	
	var Handangky = document.cet_SuaKythi.Handangky.value;	
	if((Tungay =="0")||(Tungay==""))	{
		alert('Ngày thi chưa hợp lệ!'); 
		document.cet_SuaKythi.Tungay.focus(); 
		return false;
		}	
	if((Toingay =="0")||(Toingay==""))	{
		alert('Ngày thi chưa hợp lệ!'); 
		document.cet_SuaKythi.Toingay.focus(); 
		return false;
		}	
		
	if(Tungay>Toingay){
		alert('Ngày thi chưa hợp lệ!'); 
		document.cet_SuaKythi.Toingay.focus(); 
		return false; 
	}	
	if((Handangky =="0")||(Handangky==""))	{
		alert('Hạn đăng ký chưa hợp lệ!'); 
		document.cet_SuaKythi.Handangky.focus(); 
		return false;
	}		
	
	if (Handangky>=Tungay){
		alert('Hạn đăng ký chưa hợp lệ!'); 
		document.cet_SuaKythi.Handangky.focus();  
		return false;
	}	
	
		
	if((document.cet_SuaKythi.MotaKythi.value=="0")||(document.cet_SuaKythi.MotaKythi.value==""))	{
		alert('Mô tả kỳ thi chưa hợp lệ!'); 
		document.cet_SuaKythi.MotaKythi.focus(); 
		return false;
		}		
	if((document.cet_SuaKythi.Tongsodachon.value=="0")||(document.cet_SuaKythi.Tongsodachon.value==""))	{
		alert('Chọn địa điểm thi chưa hợp lệ!'); 
		//document.cet_SuaKythi.Tongsodachon.focus(); 
		return false;
		}	
	//alert('so mon:'+ document.cet_SuaKythi.Tongsomon.value);	
 	if((document.cet_SuaKythi.Tongsomon.value=="0")||(document.cet_SuaKythi.Tongsomon.value==""))	{
		alert('Chọn môn thi chưa hợp lệ!'); 
		//document.cet_SuaKythi.Tongsodachon.focus(); 
		return false;
		}	
	
	return true;
	
}	
function check(){
		
	if (check1()) 
	{
		
		document.cet_SuaKythi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_SuaKythi.submit();
		}
		
}
function checksum(c, d, e){
	
		var k,n, k2, n2 =0;
		k= parseInt(c.value,10);
		k2= parseInt(e.value,10);
		if(document.cet_SuaKythi.Tongsodachon.value=="") n=0;
		else 	n = parseInt(document.cet_SuaKythi.Tongsodachon.value,10);
		
		if (d.checked ==true)	 n += k;
		else n -= k;
		document.cet_SuaKythi.Tongsodachon.value= n;
		
		if(document.cet_SuaKythi.Tongsophongdachon.value=="") n2=0;
		else 	n2 = parseInt(document.cet_SuaKythi.Tongsophongdachon.value,10);
		
		if (d.checked ==true)	 n2 += k2;
		else n2 -= k2;
		document.cet_SuaKythi.Tongsophongdachon.value= n2;
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
	document.cet_SuaKythi.TongLephi.value = result;
}
function checksum3(){ 
		var Lephi = document.getElementsByName('Lephithi');
		var Checkbox = document.getElementsByName('MTcheck');
        var result = 0;
		
		for (var i = 0; i < Lephi.length; i++) 
			if(Checkbox[i].checked==true)		
			result += parseInt (Lephi[i].value,10);
		
		document.cet_SuaKythi.TongLephi.value = result;
}
function check4(check, ngaythi, giothi, lephi, luachon){
	var tong = 0;
	//alert('check4');
	tong = parseInt(document.cet_SuaKythi.Tongsomon.value,10);
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
	document.cet_SuaKythi.Tongsomon.value = tong;
}
function check5(){
	var tong = 0;
	//alert('check4');
	tong = parseInt(document.cet_SuaKythi.Socathi.value,10);
	if(tong<=0){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_SuaKythi.Socathi.focus(); 
		
		}
	else {
		
		document.cet_SuaKythi.Socathi.value = tong; 
		}
	document.cet_SuaKythi.Tongsomon.value = tong;
}
// -->
</script>
</head>
<body bgcolor="#9CDBE2">


<?php 

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED&~ E_WARNING );
date_default_timezone_set('Asia/Bangkok') ;
//-----------------------Các hàm-------------------------------------------
	include "Libs/lib.php";
	include "Libs/mysql_mysqli.inc.php";
	
//-----------------------/Các hàm-------------------------------------------
//------------------------------------------------------------------------------------------------------------
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	if(empty($username)) {thongbaoloi1('Bạn chưa đăng nhập hoặc phiên làm việc đã hết!');    exit;	}
	
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
//------------------Cập nhật Môn thi -----------------------------------------------
	$codeOK = $_POST['Sendcheck'];
	$code = $_POST['Sendback'];
	$Chitiet = htmlspecialchars($_POST['Chitiet1']); 
	if($code =="Quay lại"){
		
		$Makythi =$Chitiet1 =$Chitiet ="";
	}
	if($codeOK =="Ghi nhậnOK"){ 
	
		$Makythi = $_POST['Makythi'];
		$TenKythi= $_POST['Tenkythi1'];
		$MotaKythi = $_POST['MotaKythi'];
		$Tungay = $_POST['Tungay'];
		$Toingay= $_POST['Toingay'];
		$Handangky= $_POST['Handangky'];
		$Trangthai = $_POST['Trangthaikythi'];
		
	//----Cập nhật  Kỳ thi ---	
		$sql    = 'UPDATE cet_kythi SET 
		TenKythi ="'.$TenKythi .'",
		Mota ="'.$MotaKythi .'",
		Tungay ="'.$Tungay.'", 
		Toingay ="'.$Toingay.'", 
		Handangky="'.$Handangky.'",  
		Trangthai = '.$Trangthai.' 
		WHERE Makythi ="'.$Makythi.'"';
		
		
		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error: 2' . $sql;	 exit;	}
	
	//--------------------Ghi địa điểm----------------
		$sql    = 'DELETE FROM cet_kythi_diadiem WHERE Makythi ="'.$Makythi.'"';
		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error: 2' . $sql;	 exit;	}
		
	$Tongso_DD = $_POST["Tongso_DD"];
	
	for($i=1; $i<=$Tongso_DD; $i++) {
		$bMaDiadiem = "AnMaDD".$i;
		$MaDiadiem = $_POST[$bMaDiadiem];
		$bDDcheck = "DDcheck".$i;
		$DDcheck = $_POST[$bDDcheck] ;
		if($DDcheck == "1"){
			$sqldd = 'INSERT INTO cet_kythi_diadiem (Makythi, Madiadiem) 
					VALUES ("'.$Makythi.'","'.$MaDiadiem.'")';
			$resultdd = mysql_query($sqldd, $link);
			if (!$resultdd) {	print 'MySQL Error: 2' . $sqldd;	 exit;	}	
			
		}
	}

	//--------------------/Ghi địa điểm----------------
	
	//--------------------Ghi môn thi----------------
	$sql    = 'DELETE FROM cet_kythi_monthi WHERE Makythi ="'.$Makythi.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error: 2' . $sql;	 exit;	}
	$Tongso_MT = $_POST["Tongso_MT"];
	for($i=1; $i<=$Tongso_MT; $i++) {
		$bMTcheck ="MTcheck".$i;
		$MTcheck = $_POST[$bMTcheck] ;
		
		
		if($MTcheck == "1"){
			$bMaMonthi = "MaMT".$i;	$MaMonthi = $_POST[$bMaMonthi];
			$bLuachon = "Luachon".$i; $Luachon = ($_POST[$bLuachon]=="1"? 1:0);
			$bThoigianlambai = "Thoigianlambai".$i; $Thoigianlambai = $_POST[$bThoigianlambai];
			//$bNgaythi = "Ngaythi".$i; $Ngaythi = $_POST[$bNgaythi];
			
			$bLephithi = "Lephi".$i; $Lephithi = ($_POST[$bLephithi]==""?0:$_POST[$bLephithi]);
			
			
			$sqlmt = 'INSERT INTO cet_kythi_monthi(Makythi, MaMonthi, Luachon, Lephithi, Thoigianlambai) VALUES (
			"'.$Makythi.'","'. $MaMonthi.'",'. $Luachon.','. $Lephithi.','.$Thoigianlambai.')';
		
			$resultmt = mysql_query($sqlmt, $link);
			if (!$resultmt) {	print 'MySQL Error: 3' . $sqlmt;	 exit;	}		
				
		}
	}
	
	//--------------------/Ghi Môn thi----------------
	cet_log($link, $Makythi, "Sửa kỳ thi");
	$Makythi="";
	
	$TenKythi = "";
	$MotaMonthi ="";
	$Ghichu="";
	thongbaoloi( "Đã ghi nhận!!");
	
	//setcookie('name',$username,time()+1000);
	//setcookie('pass',$password,time()+1000);
	
	//Hết ghi dữ liệu if($code == "Ghi môn hoc")
		
	}//Hết ghi dữ liệu 
	//----------------------------------------------------------------------
	if($codeOK =="Ghi HủyOK"){ 
		
		$Makythi = $_POST['Makythi'];
		$sql = 'UPDATE cet_kythi SET  	Trangthai =  1	WHERE Makythi = "'.$Makythi.'"';
		$result = mysql_query($sql, $link);
		//echo $sql; 
		
			
		//----hết Ghi Môn thi ------	
					
		
		//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$Makythi.'","' .$datetime.'","Hủy", "Hủy Môn thi"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
		//-----------Xóa các biến nhập dữ liệu-----------------
		
		
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi('đã Hủy môn thi ');	
	}//Hết ghi dữ liệu 
	
//-----------------------------------------------------Tạo form dữ liệu -------------------------------------------				
//------------------Tiêu đề trang------------------------------	----------------------------------------------
echo '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
echo '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp; Cập nhật Kỳ thi</td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
echo '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname .'('.$username .') </i></td></tr>';
echo '</table>';
echo '<form action="cet_SuaKythi.php" method="post" name ="cet_SuaKythi" enctype ="multipart/form-data">' ;

echo '<hr>';
//------------------//Tiêu đề trang------------------------------
	$code = htmlspecialchars($_POST['Send']); 
	
	$sql ='SELECT MaKythi,Tenkythi,Trangthai,DATE_FORMAT(Tungay,"%d-%m-%Y"),DATE_FORMAT(Toingay,"%d-%m-%Y"), DATE_FORMAT(Handangky,"%d-%m-%Y")	FROM cet_kythi WHERE (1)';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc Môn thi :' . $sql);	 exit;	}
	$Tongso_hoso = mysql_num_rows($result);
//-------------------------------------------- -------------------------------------------------------	
	$pNext = $_POST['next'];
	$page = $_POST['page'];
	$Page_total =$_POST['Page_total'];
	if($pNext=="<") {$page--;}
	else 
		if($pNext==">") {	$page++;	}
		else 
			if($pNext==">>") {	$page=$Page_total;	}
			else
				if($pNext=="<<") {	$page =1;	}
	//----------------------------------------todo---------------------------------------------------------------
 
	if($Tongso_hoso<16) $div_height = $Tongso_hoso * $Height2 + $Height1+35;
	else $div_height =420;
	//--------------Trang------------------------

	$lineperpage = Getlineperpage();
	$Page_total = ceil($Tongso_hoso/$lineperpage);
	if(($page=="0")||($page=="")||($page>$Page_total)) $page=1;  
	if($page==1) $goprepage="disabled"; else $goprepage=" ";
	if($page==$Page_total) $gonextpage="disabled"; else $gonextpage=" ";
	//--------------/Trang------------------------
	
	echo '<table border="0"><tr><td width ="75%"><small><i>(Số kỳ thi:['.$Tongso_hoso.'];</small></td>';
	echo '<td width="5%">Trang: </td><td width="4%"><input type ="text" value ="'.$page.'" name ="page" style="width:100%" onchange="this.form.submit();"></td>';
	echo '<td width="2%"><input type ="submit" value =">" name ="next" style="width:100%" '.$gonextpage.'></td>';
	echo '<td width="2%"><input type ="submit" value =">>" name ="next" style="width:100%" '.$gonextpage.'></td>';
	echo '<td width="2%"><input type ="submit" value ="<" name ="next" style="width:100%" '.$goprepage.'></td>';
	echo '<td width="2%"><input type ="submit" value ="<<" name ="next" style="width:100%" '.$goprepage.'></td>';

	echo'<td width="1%">/</td><td><input type="text" name ="Page_total" value ="'.$Page_total.'" style="width:100%" readonly ="readonly" ></td>';

	echo'</tr></table>';
		
	echo '<div style="width: 100%; height:'.$div_height.'px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	echo '<table class ="ext1" width="100%" border="1">'; 
	
	echo '<tr height="40px" ><td width="60px" align="center"><b>STT</td>
		<td width="90px" align="center"><b>Mã Kỳ thi</td>
		<td width="400px" align="center"><b>Tên Kỳ thi</td>
		<td width="110px" align="center"><b>Ngày bắt đầu</td>
		<td width="110px" align="center"><b>Ngày kết thúc</td>
		
		<td width="110px" align="center"><b>Hạn đăng ký</td> 
		<td width="90px" align="center"><b>Trạng thái</td>
	</tr>';
	//-----------------Lặp với mỗi Môn thi có trong csdl---------------
	for($id=1; $id <= $lineperpage*($page-1); $id++) 
		$row = mysql_fetch_row($result);	

	for($k=$id; ($k < $id+$lineperpage)&&($k<=$Tongso_hoso); $k++){ //$Tongso_hoso
	
		$row = mysql_fetch_row($result); 
		$MaKythi = $row[0];
		$Tenkythi = $row[1];
		$Trangthai= cet_get_status($row[2]);
		$Tungay = $row[3];
		$Toingay = $row[4]; 
		$Handangky = $row[5];
		
		
			
		if($k % 2 ==1) $rcolor = "#C0C0C0"; else $rcolor= "#3399FF";
		echo '<tr bgcolor="'.$rcolor.'"><td align ="center">'.$k.'</td><td align ="center">
			<input type="submit" class="button" name="Chitiet1" value ="'.$MaKythi.'" style="background-color:'.$rcolor.';width:100%;height:'.$Height2.'"  title= "Nhấn để sửa"></td>
			<td>&nbsp;'.$Tenkythi.'</td>
			<td align="center">'.$Tungay.'</td>
			<td align="center">'.$Toingay.'</td>
			<td align="center">'.$Handangky.'</td>
			<td align="center">'.$Trangthai.'</td>
			</tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	
	echo '</table>'	;	
	echo'</div>'	;	

//
//-------------/Xóa--------------------	


//thongbaoloi('466: ' . $code.','.$code1.','.$Makythi.','.$Makythi_old);
//-------------------------------------------------------------------------------------------------------------
	$Chitiet = htmlspecialchars($_POST['Chitiet1']); 
	$Makythi_old = $_POST['Makythi_old'];
	if($Chitiet!="") $Makythi=$Chitiet;
	if(trim($Chitiet)==""){ 
/*
	if($code !="Quay lại"){
		$Makythi= $_POST['Makythi'];
		$Chitiet =$Makythi;
		}
	*/	
	}
if($code == "Quay lại") $Makythi ="";
if(trim($Makythi)!=""){	// sửa
//--------- Xử lý các tình trạng form nhập dữ liệu--------------

//--- Đọc dữ liệu từ csdl ---------------
//
//
//thongbaoloi('484: ' . $code.','.$code1.','.$Makythi.','.$Makythi_old);
if($Makythi_old!=$Makythi)
{ // Chưa nhập dữ liệu sửa, --> đọc từ CSDL
	
	$sql = 'SELECT MaKythi, TenKythi, Mota, Tungay, Toingay,Handangky, Trangthai, Socathi,  Taocathi FROM cet_kythi WHERE Makythi = "'.$Makythi.'" ';
	//print $sql; exit;
	$result = mysql_query($sql, $link);
		if (!$result) {	thongbaoloi('Lỗi đọc kỳ thi :' . $sql);	 exit;	}
	
	if(mysql_num_rows($result)>=1) $checksua =1; 		
	$row = mysql_fetch_row($result);			

		$Makythi=$row[0];
		$Tenkythi=$row[1];
		$Mota = $row[2];
		$Tungay = $row[3];
		$Toingay= $row[4];
		$Handangky = $row[5];
		$Trangthai= $row[6];
}
//--- -------------------- sửa kỳ thi---------------		
print '<hr>';
$div_height1 = '540';
print '<div style="width: 100%; height:'.$div_height1.'px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';

	print'<fieldset><legend><b>Cập nhật Kỳ thi</b></legend>';
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt" cellpading="0" cellspacing="0">';
	
	print '<tr><td width="12%" height ="'.$Height.'">Mã Kỳ  thi : </td>
		<td width="13%"> <input type = "textbox"  name = "MaKythi"  value = "'. $Makythi .'" style="height:'.$Height1.';font-size: 12pt" size ="10" readonly ="readonly"></td>
		
	    <td width="11%" >Tên Kỳ  thi :</td><td colspan="4"> <input type = "textbox" name = "Tenkythi1" value="'.$Tenkythi.'" style="height:'.$Height1.';width:100%;font-size: 12pt"></td>
		
	</tr>';
	print '<tr><td height ="'.$Height.'">Ngày thi từ : </td><td>
		   <input type = "Date"  name = "Tungay"  value = "'. $Tungay .'" style="width: 147px; height:'.$Height1.';font-size: 12pt" size ="25"></td>
		   <td >Tới ngày : </td><td width="13%"><input type = "Date"  name = "Toingay"  value = "'. $Toingay .'" style="width: 147px; height:'.$Height1.';font-size: 12pt" size ="25"></td>
		   <td  width="23%" align="right"> 
		   Đăng ký : <input type = "Date"  name = "Handangky"  value = "'. $Handangky .'" style="width: 147px; height:'.$Height1.';font-size: 12pt" size ="25"></td>
			<td width="10%" >Trạng thái:</td><td> '.cet_List_status($link,$Trangthai).' </td></tr>';
			//Số ca: <input type = "textbox" name = "Socathi" size ="3" value="'.$Socathi.'" style="height:'.$Height1.';font-size: 12pt" onchange ="Java:check5();">
	print '<tr><td  height ="'.$Height. '" >Mô tả Kỳ  thi:   </td><td colspan="6"> <textarea  rows ="2" name ="MotaKythi" style="width:100%;font-size: 12pt" >'.$Mota.'</textarea></td></tr>';		
	print'</table>';
	print '</fieldset>';
	//----------------------------------------Địa điểm ------------------
	
	$sqlsum = 'SELECT sum(Sophong), sum(Tongsothisinh) FROM cet_kythi_diadiem A JOIN cet_diadiemthi B ON (A.MaDiadiem = B.MaDiadiem) WHERE Makythi ="'.$Makythi.'"';
	//print $sqlsum; 
	$resultsum = mysql_query($sqlsum, $link);
	$rowsum = mysql_fetch_row($resultsum); 
	$Tongsodachon = $rowsum[1];
	$Tongsophongdachon = $rowsum[0];
	//thongbaoloi('d:'.$)
	print '<fieldset class="styleset">	<legend><b>Chọn địa điểm tổ chức thi(<input type ="text" name ="Tongsodachon" value ="'.$Tongsodachon.'" readonly="readonly" size ="4">/<input type ="text" name ="Tongsophongdachon" value ="'.$Tongsophongdachon.'" readonly="readonly" size ="4">)</b></legend>';
	
	$sqldd = 'SELECT  A.Madiadiem, A.Tendiadiem,TongSothisinh, Sophong,Makythi, Trangthai  
			  FROM cet_diadiemthi A LEFT OUTER JOIN (SELECT Madiadiem, Makythi FROM cet_kythi_diadiem WHERE Makythi ="'.$Makythi.'") B on (A.madiadiem = B.Madiadiem)  
			  WHERE trangthai=0 ORDER BY Makythi DESC, A. Madiadiem '; 	
	//print '<br>'.$sqldd; exit;	
	$resultdd = mysql_query($sqldd, $link);
	if (!$resultdd) {	print 'MySQL Error: 2' . $sqldd;	 exit;	}	
	$Tongso_DD = mysql_num_rows($resultdd);
	print '<input type ="hidden" name ="Tongso_DD" value ="'.$Tongso_DD.'"> ';
	
	print '<div style="width: 100%; height:200px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	print '<table width="100%" cellpadding="0" cellspacing="0" border="1" style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr>
			   <td width="8%" align ="left"><b>Mã điểm </b><input type ="hidden" name ="Tongsodachon2" value ="'.$Tongsodachon.'" readonly="readonly" size ="5"></td>
			   <td width="28%" align ="center"><b>Tên địa điểm</b></td>
			   <td width="8%" align ="center"><b>Số phòng</b> </td>
			   <td width="6%" align ="center"><b>Số TS</b> </td>
			   
			   <td width="8%" align ="left"><b>Mã điểm </b><input type ="hidden" name ="Tongsodachon1" value ="'.$Tongsodachon.'" readonly="readonly" size ="5"></td>
			   <td width="28%" align ="center"><b>Tên địa điểm</b></td>
			   <td width="8%" align ="center"><b>Số phòng</b> </td>
			   <td align ="center"><b>Số TS</b> </td>';
	print '</tr>';
	for($k= 1; $k<=$Tongso_DD; $k++){ 
	
		$row = mysql_fetch_row($resultdd); 
		//$iddd = $row[0];
		$MaDiadiem=$row[0];
		$TenDiadiem=$row[1];
		$TongSothisinh=$row[2];
		$TongSophong=$row[3];
		
		$bDDcheck = "DDcheck".$k; 
		$AnMaDiadiem ="AnMaDD".$k;
		$AnsoTH = "AnsoTSdd".$k;
		$Ansophong = "Ansophong".$k;
		if($row[4]=="") $check = " ";
		else $check = "checked";
		if($k % 4 ==1) $rcolor = "#C0C0C0";  else $rcolor= "#3399FF";
		
		if($k % 2 ==1){
			print '<tr bgcolor="'.$rcolor.'">';
			print'	<td align ="left"><input type ="checkbox" name ="'.$bDDcheck.'" value="1"  style="height:13pt;width:13pt" onchange ="Java:checksum('.$AnsoTH.',' .$bDDcheck.','.$Ansophong.');" ' .$check.'>&nbsp;&nbsp;'.$MaDiadiem.'</td>
				<td>'.$TenDiadiem.'</td> <td align="center">'.$TongSophong.'<input type ="hidden" name ="'.$Ansophong.'" value ="'.$TongSophong.'"></td>
				<td align ="center">'.$TongSothisinh.'<input type ="hidden" name ="'.$AnsoTH.'" value ="'.$TongSothisinh.'"></td>
			
				 <input type ="hidden" name ="'.$AnMaDiadiem.'" value ="'.$MaDiadiem.'"></td>';
		
		}
		else{
			
			print '<td align ="left"><input type ="checkbox" name ="'.$bDDcheck.'" value="1"  style="height:13pt;width:13pt" onchange ="Java:checksum('.$AnsoTH.',' .$bDDcheck.','.$Ansophong.');" ' .$check.'>&nbsp;&nbsp;'.$MaDiadiem.'</td>
				<td>'.$TenDiadiem.'</td><td align="center">'.$TongSophong.'<input type ="hidden" name ="'.$Ansophong.'" value ="'.$TongSophong.'"></td>
				<td align ="center">'.$TongSothisinh.'<input type ="hidden" name ="'.$AnsoTH.'" value ="'.$TongSothisinh.'"></td>
			
				 <input type ="hidden" name ="'.$AnMaDiadiem.'" value ="'.$MaDiadiem.'"></td>';
				 print'</tr>';
		}
					
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	
	if($Tongso_DD % 2 ==1) print'<td></td><td></td><td></td><td></td></tr>';	
	print '</table>';
	print '</fieldset>';
	//--------------------------------Môn thi---------------
	
	print '<fieldset class="styleset">	<legend><b>Chọn Môn thi</b></legend>';
	
	$sqlsum  = 'SELECT Mamonthi FROM cet_kythi_monthi  WHERE Makythi ="'.$Makythi.'"';
	$resultsum = mysql_query($sqlsum, $link);
	if (!$resultsum) {	stop('Query Error 4: ' . $sql);}	
	$Tongsodachon = mysql_num_rows($resultsum);
	
	$sqlmt = 'SELECT A.id_monthi, A.MaMonThi, A.TenMonThi, A.Mota, A.Hinhthucthi,A.Thoigianlambai, B.Makythi, B.Luachon, B.Thoigianlambai,B.Lephithi 
			  FROM cet_monthi A 
			  LEFT OUTER JOIN (SELECT Makythi, Mamonthi,Luachon, Thoigianlambai,Lephithi FROM cet_kythi_monthi  WHERE Makythi ="'.$Makythi.'") B ON (A.Mamonthi=B.Mamonthi)
			  WHERE Trangthai = 0  ORDER BY Makythi DESC, A.Mamonthi';
	$resultmt = mysql_query($sqlmt, $link);
	if (!$resultmt) {	print 'MySQL Error: 3' . $sqlmt;	 exit;	}	
	$Tongso_MT = mysql_num_rows($resultmt);
	//stop("m:".$Tongso_MT);
	print '<input type ="hidden" name ="Tongso_MT" value ="'.$Tongso_MT.'"> ';
	
	print '<div style="width: 100%; height:200px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	print '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr><td width="15%"><b>Mã môn</b></td><td width="50%"><b>Tên môn thi</b></td><td width="15%"><b>Hình thức</b></td><td width="14%"><b>Tùy chọn</b></td>
	<td width="12%"><b>Ngày thi</b></td><td width="17%"><b>Tg làm bài</b></td><td><b>Lệ phí <input type ="hidden" name ="Tongsomon" value ="'.$Tongsodachon.'"></b></td>';
	
	print '</tr>';
	for($k= 1; $k<=$Tongso_MT; $k++){ 
	
		$rowmt = mysql_fetch_row($resultmt); 
		$idmt = $rowmt[0];
		$MaMonthi=$rowmt[1];
		$TenMonthi=$rowmt[2];
		$Motamonthi=$rowmt[3];
		if($rowmt[4]==1) $Hinhthucthi = "Trắc nghiệm";
		else $Hinhthucthi = "Tự luận";
		if($rowmt[6]==$Makythi)		{
			$Thoigianlambai = $rowmt[8];
			$Lephithi = $rowmt[9];
			$on_off = " ";
			}
		else {
			$Thoigianlambai = $rowmt[5];
			$Lephithi = "0";
			$on_off = "disabled";
			}
		
		$check1 = ($rowmt[6]==$Makythi)? "checked" : " ";
		$check2 = ($rowmt[7]==1)? "checked" : " ";
		
		$bMTcheck = "MTcheck".$k; 
		$bMaMonthi ="MaMT".$k;
		$AnsoMT = "AnsoMT".$k;
		$bNgaythi = "Ngaythi".$k;
		$bThoigianlambai = "Thoigianlambai".$k;
		$bLephithi = "Lephi".$k;
		$bLuachon = "Luachon".$k;
		if($k % 2 ==1) $rcolor = "#C0C0C0"; else $rcolor= "#3399FF";
		print '<tr bgcolor="'.$rcolor.'">
			<td><input type ="checkbox" name ="'.$bMTcheck.'" value="1"  style="height:13pt;width:13pt" onchange ="Java:check4('.$bMTcheck.','.$bNgaythi.','.$bThoigianlambai.','.$bLephithi.','.$bLuachon.');" '.$check1.' >&nbsp;&nbsp;
			
			'.$MaMonthi.'</td>
			<td>'.$TenMonthi.'</td>
			<td>'.$Hinhthucthi.'</td>
			<td align ="center"><input type ="checkbox" name ="'.$bLuachon.'" value="1"  style="height:13pt;width:13pt" '. $on_off.' "  " '. $check2 .'></td>
			<td><input type ="Date" name ="'.$bNgaythi.'" onchage = "Java:check5('.$bNgaythi.');"  '. $on_off.' ></td>
			<td><input type ="textbox" name = "'.$bThoigianlambai. '"  value ="'.$Thoigianlambai.'"  size ="10" style="heght: 90%;" onchange ="Java:check6('.$bThoigianlambai.');"  '. $on_off.' ></td>	
			<td><input type ="textbox" name ="'.$bLephithi.'" value ="'.$Lephithi.' " onchange ="Java:checksum3();"  '. $on_off.' ></td>	
			<input type ="hidden" name ="'.$bMaMonthi.'" value ="'.$MaMonthi.'"></td>
			</tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
		
	print '</table>';
	print '</fieldset>';
	//--------------------------
	print '</div>';	
//----------------------------------------------	
	
	print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	/*
	if($Trangthai =="Active")
		
		echo '&nbsp;&nbsp;<input name="Delete" type="button" onclick ="return check2();" value = "Hủy môn thi" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	else 
		
		echo '&nbsp;&nbsp;<input name="Restore" type="button" onclick ="return check3();" value = "Khôi phục môn thi" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	*/
	print '&nbsp;&nbsp;<input name="Sendback" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	echo '<input type="hidden" name = "Makythi_old" value="'.$Makythi.'">'; // Mã mới == Mã cũ --> sửa , ngược lại mới nạp HS  từ csdl
	print '<input type="hidden" name = "Makythi" value="'.$Makythi.'">';
	echo '<input name="Sendcheck" type="hidden" value ="">';
	echo '<script>cet_SuaKythi.elements["Sendback"].focus();</script>';

	
}
	echo '</form>';
	
	mysql_free_result($result);

?> 

</body>
</html> 
