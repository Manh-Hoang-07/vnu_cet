<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: ThongkeDK.php
// Chức năng: Thống kê  thí sinh đăng ký thi
// Phiên bản: 1.1
// Thời gian: tháng 1/2021
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
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
<title>Thống kê đăng ký thi</title>
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
	
	
	var tong =parseInt(document.cet_Xuatdlthi.Socathi.value,10);
	if((isNaN(tong)==true )||(tong<=0)){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_Xuatdlthi.Socathi.focus(); 
		return false;
	}
	var k=0;
	var Tungay = document.getElementById('Tungay').value;
	var Toingay = document.getElementById('Toingay').value;
	
	
	for (k=1; k<=tong; k++){
		var name = 	"ngaythi"+k;
		var ngaythi = document.getElementById(name).value;
		 
		if(ngaythi==""){
			alert('Ngày thi chưa hợp lệ!'); 
			document.getElementById(name).focus(); 
			return false;
		}
		
		else 
			if ((ngaythi<Tungay)||(ngaythi>Toingay))
			{
				alert('Ngày thi chưa hợp lệ!'); 
				document.getElementById(name).focus(); 
				return false;
			}
		
		var name1 = "giothi" +k; 
		var giothi = document.getElementById(name1);
		if(giothi.value==""){
			alert('Giờ thi chưa hợp lệ!'); 
			giothi.focus(); 
			return false;
		}
	}	
	var Sodiemthi = parseInt(document.cet_Xuatdlthi.Sodiemthi.value,10);
	//alert('diem:'+Sodiemthi); return false;
	for (k=1; k<=Sodiemthi; k++){
		var btongdiemca = "Diemca"+k;	
		var soca = document.getElementById(btongdiemca).value;
		if((isNaN(soca)==true)||(soca<=0)){
			var bDiemthi = "Madiemthi" + k;
			var madiemthi  = document.getElementById(bDiemthi).value;
			alert('Chưa chọn ca thi cho điểm thi '+ madiemthi + ' !'); 
			//document.getElementById(name).focus(); 
			return false;
		}
	}
	var Somonthi = parseInt(document.cet_Xuatdlthi.Somonthi.value,10);
	for (k=1; k<=Somonthi; k++){
		var btongmonca = "Monca"+k;	
		
		var soca = parseInt(document.getElementById(btongmonca).value,10);
		
		if((isNaN(soca)==true)||(soca<=0)){
			var bMonthi = "Mamonthi" +k;
			var mamonthi = document.getElementById(bMonthi).value;
			alert('Chưa chọn ca thi cho môn thi ' +mamonthi +'!' ); 
			//document.getElementById(name).focus(); 
			return false;
		}
	}
	return true;
	
}	
function check(k){
	/*
	var ans = true;
	//alert('k:'+k);
	if(k) ans = confirm("Bạn muốn in thống kê?");
		if(ans ||(k==0)){
			if (check1()){	//alert('check ok');
			*/
				document.cet_Xuatdlthi.Sendcheck.value="Ghi nhậnOK"; 
				document.cet_Xuatdlthi.submit();
			//}
		//}
	
}

function check6(){
	var tong = 0;
	
	tong = parseInt(document.cet_Xuatdlthi.Socathi.value,10);
	if(tong<=0){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_Xuatdlthi.Socathi.focus(); 
		
		}
	else {
		
		document.cet_Xuatdlthi.Socathi.value = tong; 
		document.cet_Xuatdlthi.Sendcheck.value="Tạo form"; 
		document.cet_Xuatdlthi.submit();
		}
	
}


function presubmit(){
	//var tong =0;
	if(typeof document.cet_Xuatdlthi.newform =='object')	document.cet_Xuatdlthi.newform.value =""; 
	//alert('pre OK');
	document.cet_Xuatdlthi.submit();
	
}

function maxsize(){
	
	window.resizeTo(screen.availWidth, screen.availHeight);
}
// -->
</script>
</head>
<body bgcolor="#FCFFFF" onload ="Java:maxsize();">
   
<?php 
	error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//-----------------------Các hàm-------------------------------------------
	include "Libs/lib.php";
	include "Libs/mysql_mysqli.inc.php";
	
//-----------------------/Các hàm-------------------------------------------
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	if(empty($username)) {thongbaoloi1('Bạn chưa đăng nhập !');  exit;}
//------------------------------------------------------------------------------------------------------------
	if(!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ'); exit;}
	if(!cet_Acheck($link,$username,$password)) {thongbaoloi('Bạn không có chức năng export dữ liệu'); exit;}
		
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
//-------------------------------------------------------------------------------------------------------------
	//$MaKythi =$_GET['Kythi'];
	$MaKythi = trim($_POST['MaKythi']);
	$codeOK = $_POST['Sendcheck'];
	$code = $_POST['Send'];
	$TenKythi = $_POST['TenKythi'];
	$MotaKythi = $_POST['MotaKythi'];
	$Tungay = $_POST['Tungay'];
	$Toingay = $_POST['Toingay'];
	$Handangky = $_POST["Handangky"];
	$Socathi = $_POST["Socathi"];
	$newform = $_POST['newform'];
	
//-----------------------------------------------------------
if($code =="Quay lại"){
	$MaKythi="";
	$Socathi="";

 }
//------------------------------------------------------------ 
if($codeOK =="Ghi nhậnOK"){
	
	//me('in:'.$MaKythi );	
	print  '<script> window.open("cet_Inthongke.php?kythi='.$MaKythi.'", "_blank");</script>';
	//---set null----
	$MaKythi="";
	$Socathi="";
	
	
}

//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	

$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
$bgcolor = "#00CCEE";
print '<table border="0" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Xuất dữ liệu Đăng ký dự thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.' ('.$username .') </i></td></tr>';
print '</table>';
print '<hr>';
//------------------//Tiêu đề trang------------------------------
print'<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">
	<legend><b>Thống kê đăng ký ca thi&nbsp;(<i>Mã kỳ thi: '.$MaKythi.'</i>)</b></legend>';
	$sqlkythi ='SELECT TenKythi, Tungay, Toingay,Taocathi,Socathi FROM cet_kythi WHERE Makythi ="'.$MaKythi.'"';
	$resultkythi = mysql_query($sqlkythi, $link);
	if (!$resultkythi) {  echo 'MySQL Error 3: ' . $sqlkythi;   exit;	}
	$rowkt = mysql_fetch_row($resultkythi);
	$TenKythi = $rowkt[0];$Tungay = $rowkt[1];$Toingay = $rowkt[2];$DaTaocathi= $rowkt[3];$Socathi =  $rowkt[4];
	
	print '<form action="cet_Xuatdlthi.php" method="post" name ="cet_Xuatdlthi">' ;
	
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<tr><td width="17%">Kỳ thi: </td><td  colspan="2" height ="'.$Height.'"><b>'.cet_List_Kythi2($link,$MaKythi," ",1).'</b></tr>';
	print '<tr><td>Tổng số ca thi: </td><td width="10%"  height ="'.$Height.'"><Input type ="text" name ="Socathi" value = "'.$Socathi.'" readonly ="readonly"></td>
			<td align="right">Ngày thi từ : <Input type ="Date" Id ="Tungay"  value = "'.$Tungay.'"  readonly ="readonly"> tới: <Input type ="Date" Id ="Toingay"  value = "'.$Toingay.'" readonly ="readonly"> </td></tr>';		
	print'</table>';
	
	
	if($Socathi>0){
		print '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
		print '<tr height ="0">
			   <td width="8%" align = "center"></td><td width="15%"> </td><td width="10%"> </td>
			   <td width="8%" align = "center"></td><td width="15%"></td><td width="10%"></td>
			   <td width="8%" align = "center"></td><td width="15%"> </td><td ></td></tr>';
		$sqlkyca = 'SELECT cathi, ngaythi, giothi FROM cet_kythi_cathi WHERE MaKythi ="'.$MaKythi.'" ORDER by Cathi';

		$resultkyca = mysql_query($sqlkyca, $link);
		if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
		
		for($k=1; $k<=$Socathi; $k++){
			$bgiothi = "giothi".$k; 
			$bngaythi = "ngaythi".$k;
			$rowkc = mysql_fetch_row($resultkyca);
			$ngaythi = $rowkc [1]; $giothi = $rowkc [2];
			if($k%3==1) print '<tr height ="'.$Height.'">';
			
			print '<td align = "center">Ca '.$k.':</td>
					<td> <Input type ="Date" name ="'.$bngaythi.'" Id ="'.$bngaythi.'" value ="'.$ngaythi.'" readonly ="readonly"> </td>
					<td><Input type ="text" name ="'.$bgiothi.'"  Id ="'.$bgiothi.'" value ="'.$giothi.'" size="6" readonly ="readonly"> </td>';
			if($k%3==0) print '</tr>';
					
		}
		
		if($Socathi%2)print '<td></td><td></td><td></td></tr>';
		print'</table>';
		}
	print'</fieldset>';
	print '</div>';
	print '<hr>';
	//-----------------------------------Export dữ liệu đăng ký -------------
	if($MaKythi!=""){ // -------đã chọn kỳ thi ---
		//----Xóa dữ liệu cũ ---
		//-- địa điểm thi ---
		$sql = 'DELETE FROM exp.diadiemthi 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu địa điểm thi: ' . $sql;   exit;	}
		//-- cụm điểm thi ---
		$sql = 'DELETE FROM exp.cumthi 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu cụm thi: ' . $sql;   exit;	}
		
		//-- môn thi ---
		$sql = 'DELETE FROM exp.monthi 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu môn thi: ' . $sql;   exit;	}
		
		//-- ca thi ---
		$sql = 'DELETE FROM exp.cathi 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu ca thi: ' . $sql;   exit;	}
		
		//-- điểm thi - môn thi -ca thi  ---
		$sql = 'DELETE FROM exp.monthi_cathi 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu môn - cụm thi: ' . $sql;   exit;	}
		
		//-- danh sách tỉnh ---
		$sql = 'DELETE FROM exp.dstinh 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu tỉnh: ' . $sql;   exit;	}

		//-- danh sách huyen ---
		$sql = 'DELETE FROM exp.dshuyen 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu huyện: ' . $sql;   exit;	}
		//-- danh sách thí sinh ---
		$sql = 'DELETE FROM exp.dsts 	WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi dữ liệu thí sinh: ' . $sql;   exit;	}
		//-- dữ liệu ảnh---------
		//---
		//----------------------------------------------------------------------------------
		//-- Trích xuất dữ liệu-------------
		print '<br>Tạo dữ liệu kỳ thi  :'.$MaKythi;
		//-- địa điểm thi ---
		
		$sql = 'INSERT INTO exp.diadiemthi 
				SELECT B.Madiadiem, B.Macumthi,B.Tendiadiem,B.Diachi,B.Tongsothisinh
					FROM cet_kythi_diadiem A JOIN cet_diadiemthi B ON (A.Madiadiem = B.Madiadiem) 
					WHERE Makythi ="'.$MaKythi.'"';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu địa điểm thi: ' . $sql;   exit;	}
		//-- cụm điểm thi ---
		$sql = 'INSERT INTO exp.cumthi 
				SELECT C.Macumthi,C.Tencumthi
					FROM cet_kythi_diadiem A JOIN cet_diadiemthi B ON (A.Madiadiem = B.Madiadiem)
						JOIN cet_cumthi C ON (B.Macumthi = C.Macumthi)
					WHERE Makythi ="'.$MaKythi.'"  GROUP  BY C.Macumthi';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu cụm thi: ' . $sql;   exit;	}
		
		//-- môn thi ---
		$sql = 'INSERT INTO exp.monthi 
				SELECT B.Mamonthi, B.Tenmonthi
					FROM cet_kythi_monthi A JOIN cet_monthi B ON (A.Mamonthi = B.Mamonthi) 
					WHERE Makythi ="'.$MaKythi.'"';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu môn thi: ' . $sql;   exit;	}
		
		//-- ca thi ---
		$sql = 'INSERT INTO exp.cathi 
				SELECT Cathi, Ngaythi,Giothi
					FROM cet_kythi_cathi  
					WHERE Makythi ="'.$MaKythi.'" ORDER BY Cathi';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu ca thi: ' . $sql;   exit;	}
				
		//-- danh sách tỉnh ---
		$sql = 'INSERT INTO exp.dstinh 
				SELECT Matinh,Tentinh
					FROM tinhtp  
					WHERE (1)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu tỉnh: ' . $sql;   exit;	}
		
		//-- danh sách huyen ---
		$sql = 'INSERT INTO exp.dshuyen
				SELECT Mahuyen,Matinh,Tenquanhuyen
					FROM quanhuyen  
					WHERE (Trangthai =0)';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu huyện: ' . $sql;   exit;	}
		
		//-- điểm thi - môn thi -ca thi  ---
		$sql = 'INSERT INTO exp.monthi_cathi 
				SELECT Madiemthi, Mamonthi, Cathi 
					FROM cet_mon_cathi 
					WHERE Makythi = "'.$MaKythi.'" AND checked  !=0 ';
		$result = mysql_query($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu ca thi: ' . $sql;   exit;	}
		
		//-- danh sách thí sinh ---
		$sql ='CREATE OR REPLACE VIEW  cur_dsts1 AS 
			SELECT 	username, Madiemthi, Mamonthi, Cathi 
				FROM cet_student_cathi 
				WHERE (Makythi = "'.$MaKythi.'") AND (checked !=0)';
		$result =  mysql_query	($sql, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu cet_student_cathi: ' . $sql;   exit;	}
		$sql2= 'INSERT INTO exp.dsts 
				SELECT SOCMND, Hoten, ngaysinh, gioitinh, TinhTT, HuyenTT,  Cathi, Mamonthi,  Macumthi, A.Madiemthi, Anhhoso 
				FROM cur_dsts1 A JOIN cet_student_info  B ON (username = Tendangnhap) JOIN cet_diadiemthi C ON (A.Madiemthi = C.Madiadiem )';
		
		$result =  mysql_query	($sql2, $link);
		if (!$result) {  echo 'Lỗi xuất dữ liệu hồ sơ : ' . $sql2;   exit;	}
		mysql_free_result($result);
		
		//-- dữ liệu ảnh hồ sơ---------
		if(file_exists('data/'.$MaKythi)){
			$files = glob('data/'.$MaKythi.'/*'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file)) {
				unlink($file); // delete file
			  }
			}
			}
		else {
			$status  = mkdir('data/'.$MaKythi);
			print 'ko có TM ... tạo mới';
			//if($status){print 'OK';}
			//else print 'not ok';
			}
		//exit;
		
		
		if(file_exists('data/'.$MaKythi.'/Anhkythi')){//xóa tệp bên trong
			unlink('data/'.$MaKythi.'/Anhkythi/*.*');
		}
		else {//tạo thư mục ảnh---------
			mkdir('data/'.$MaKythi.'/Anhkythi');
		}
		//copy anh 
		$sql3= 'SELECT  Anhhoso FROM exp.dsts WHERE (1)';
				
		$result =  mysql_query	($sql3, $link);
		if (!$result) {  echo 'Lỗi đọc dữ liệu hồ sơ : ' . $sql2;   exit;	}
		for($k =1 ; $k <= mysql_num_rows($result); $k++){
			$row = mysql_fetch_row($result);
			if($row[0] !=0){
				$fname = $row[0];
				if(file_exists('data/Anhhoso/'.$fname)){
					copy('data/Anhhoso/'.$fname, 'data/'.$MaKythi.'/Anhkythi/'.$fname);
				}
			}
		}
		mysql_free_result($result);
		
		//------------export--------
		$filesql = 'data/'.$MaKythi.'/'.$MaKythi.'.txt';
		shell_exec('mysqldump --databases exp --user='.$username.' --password='.$password .' >'.$filesql );
		//-------------zip----------------------------
		//-----------zip ảnh---------
		$pathdir = 'data/'.$MaKythi.'/Anhkythi/';  
  
		// Enter the name to creating zipped directory 
		$zipcreated = 'data/'.$MaKythi.'/'.$MaKythi.'A.zip'; 
		  
		// Create new zip class 
		$zip = new ZipArchive; 
		   
		if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) { 
			  
			// Store the path into the variable 
			$dir = opendir($pathdir); 
			
			while($file = readdir($dir)) { 
				
				if(is_file($pathdir.$file)) { 
					
					$zip -> addFile($pathdir.$file, $file); 
				} 
			} 
			$zip ->close(); 
		} 
		else print 'lỗi nén dữ liệu ảnh ký thi';
		//----------zip all--------------
		
		$pathdir = 'data/'.$MaKythi.'/';  
  
		
		$zipcreated = 'data/'.$MaKythi.'/'.$MaKythi.'.zip'; 
		  
		
		$zip = new ZipArchive; 
		   
		if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) { 
			  
			
			$dir = opendir($pathdir); 
			
			while($file = readdir($dir)) { 
				
				if(is_file($pathdir.$file)) { 
					
					$zip -> addFile($pathdir.$file, $file); 
				} 
			} 
			$zip ->close(); 
		} 
		else print 'lỗi nén dữ liệu đăng ký thi';
		if(file_exists($zipcreated)){
			
			$fnew  = 'data/'.$MaKythi.'/'.$MaKythi.'.bin';
			rename($zipcreated, $fnew);
		}
		//---------------/zip---------------
		//-----------------------------------/Export dữ liệu đăng ký -------------
		print '... hoàn thành....<a href ='.$fnew.'>  download  </a>';
		//----------------------------------------------------------------
		print '<br><hr>';
		//print '<p><input name="Send" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt"> </p>';
	}// -------/đã chọn kỳ thi ---
	print '</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
