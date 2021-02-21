<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: QLcathi.php
// Chức năng: Quản lý ca thi
// Phiên bản: 1.1
// Thời gian: tháng 12/2020
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
// Cập nhật: (5/1/2021 - gắn ca thi với điểm thi - theo ND họp 4/1/2021)
//			 13/1/2021 -  Gắn môn thi với điểm thi - do có khả năng các điểm thi thi với lịch khác nhau	
//--------------------------------------------------------------------------------------------
-->
<?php
	session_start();
?>
<html>
 <head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Quản lý ca thi</title>
<script>
<!--
function check1() {
	
	
	var tong =parseInt(document.cet_QLCathi.Socathi.value,10);
	if((isNaN(tong)==true )||(tong<=0)){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_QLCathi.Socathi.focus(); 
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
	var Sodiemthi = parseInt(document.cet_QLCathi.Sodiemthi.value,10);
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
	var Somonthi = parseInt(document.cet_QLCathi.Somonthi.value,10);
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
	var ans = true;
	//alert('k:'+k);
	if(k) ans = confirm("Bạn chắc chắn ghi cập nhật?");
		if(ans ||(k==0)){
			if (check1()){	//alert('check ok');
				document.cet_QLCathi.Sendcheck.value="Ghi nhậnOK"; 
				document.cet_QLCathi.submit();
			}
		}
	
}

function check6(){
	var tong = 0;
	
	tong = parseInt(document.cet_QLCathi.Socathi.value,10);
	if(tong<=0){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_QLCathi.Socathi.focus(); 
		
		}
	else {
		
		document.cet_QLCathi.Socathi.value = tong; 
		document.cet_QLCathi.Sendcheck.value="Tạo form"; 
		document.cet_QLCathi.submit();
		}
	
}
function check7(check, tongdiemca,tongmonca){
	//var tong =0;
	//alert('c7');
	
	var tongdiem = parseInt(tongdiemca.value,10);
	var tongmon = parseInt(tongmonca.value,10);
	if (check.checked == true) {tongdiem ++; tongmon++;}
	else {tongdiem--; tongmon--;}
	tongdiemca.value = tongdiem;
	tongmonca.value = tongmon;
	
}
function check8(check,tongca){
	//var tong =0;
	var tong = parseInt(tongca.value,10);
	if (check.checked == true) tong++;
	else tong--;
	tongca.value = tong;
}
function presubmit(){
	//var tong =0;
	if(typeof document.cet_QLCathi.newform =='object')	document.cet_QLCathi.newform.value =""; 
	//alert('pre OK');
	document.cet_QLCathi.submit();
	
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
	//if($auth !=3){thongbaoloi('Bạn không có chức năng quản lý ca thi!!'); exit;}
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
	$Tendonvi =Get_name($link,"cetusers","donvi","Tendangnhap",$username);
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
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
	
		$sqlct ='UPDATE cet_kythi SET Socathi = '.$Socathi.', Taocathi =1 WHERE Makythi ="'.$MaKythi.'"';
		$resultct = mysql_query($sqlct, $link);
			if (!$resultct) {	print 'MySQL Error: 5' . $sqlct;	 exit;	}	
	//------------------------------Xóa dl cũ -------------------
		$sql = 'DELETE FROM cet_mon_cathi WHERE MaKythi ="'.$MaKythi.'"';
		$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error: 5' . $sql;	 exit;	}	

		$sql = 'DELETE FROM cet_kythi_cathi WHERE MaKythi ="'.$MaKythi.'"';
		$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error: 5' . $sql;	 exit;	}
			
		$sql = 'DELETE FROM cet_diemthi_cathi WHERE MaKythi ="'.$MaKythi.'"';
		$result = mysql_query($sql, $link);
			if (!$result) {	print 'MySQL Error: 5' . $sql;	 exit;	}
			
	//--------------------Cập nhật Kỳ thi - Ca thi---------------------
	for($k=1; $k<=$Socathi; $k++){
		$bNgaythi = "ngaythi".$k; $Ngaythi = $_POST[$bNgaythi];
		$bGiothi = "giothi".$k; $Giothi = $_POST[$bGiothi];
		$sqlcathi ='INSERT INTO cet_kythi_cathi(MaKythi, Cathi,Ngaythi, Giothi) VALUES (
		"'.$MaKythi.'",' .$k.',"'.$Ngaythi.'","'.$Giothi.'")';
		//print $sqlcathi; exit;
		$resultcathi = mysql_query($sqlcathi, $link);
			if (!$resultcathi) {	print 'MySQL Error: 5' . $sqlcathi;	 exit;	}	
	}
	//--------------------Điểm thi - Môn thi - Ca thi-------------
	
	$Sodiemthi = $_POST["Sodiemthi"];
	$Somonthi = $_POST["Somonthi"];
	
	for($d=1; $d<=$Sodiemthi; $d++){
		$bDiemthi = "Madiemthi".$d; 
		$Diemthi = $_POST[$bDiemthi];
			
		for($m=1; $m<=$Somonthi; $m++){
			$bMonthi = "Mamonthi".$d."_".$m;
			$Monthi = $_POST[$bMonthi];
			for($k=1; $k<=$Socathi; $k++){
				$bmoncathi = "DiemMonCa".$d."_".$m."_".$k; 
				$Moncathi = $_POST[$bmoncathi];
				if($Moncathi =="1")
				$sqlmonca ='INSERT INTO cet_mon_cathi(MaKythi, Madiemthi,Mamonthi,Cathi,Checked) VALUES ("'.$MaKythi.'","' .$Diemthi.'","' .$Monthi.'",'.$k.',1)';
				else 
					$sqlmonca ='INSERT INTO cet_mon_cathi(MaKythi, Madiemthi,Mamonthi,Cathi,Checked) VALUES ("'.$MaKythi.'","' .$Diemthi.'","' .$Monthi.'",'.$k.',0)';
			
				$resultmonca = mysql_query($sqlmonca, $link);
					if (!$resultmonca) {	print 'MySQL Error: 5' . $sqlmonca;	 exit;	}	
				}
			}
	}
	//--------------------Điểm thi - Ca thi-------------
	//$Sodiemthi = $_POST["Sodiemthi"];
	for($m=1; $m<=$Sodiemthi; $m++){
		$bDiemthi = "Madiemthi".$m;
		$Diemthi = $_POST[$bDiemthi];
		for($k=1; $k<=$Socathi; $k++){
			$bdiemcathi = "DiemCa".$m."_".$k; 
			$Diemcathi = $_POST[$bdiemcathi];
			if($Diemcathi =="1")
			$sqldiemca ='INSERT INTO cet_diemthi_cathi(MaKythi, Madiemthi,Cathi,Checked) VALUES ("'.$MaKythi.'","' .$Diemthi.'",'.$k.',1)';
			else 
				$sqldiemca ='INSERT INTO cet_diemthi_cathi(MaKythi, Madiemthi,Cathi,Checked) VALUES ("'.$MaKythi.'","' .$Diemthi.'",'.$k.',0)';
			
			$resultdiemca = mysql_query($sqldiemca, $link);
				if (!$resultdiemca) {	print 'MySQL Error: 5' . $sqldiemca;	 exit;	}	
			}
		}
	
	cet_log($link, $MaKythi, "Ghi ca thi",  $username);
	thongbaoloi("Đã ghi ca thi!");
	//---setnull----
	$MaKythi="";
	$Socathi="";
	
	
}

//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	

$bgcolor = "#00CCEE";
print '<table border="0" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Quản lý ca thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname.' ('.$username .') </i></td></tr>';
print '</table>';
print '<hr>';
//------------------//Tiêu đề trang------------------------------
print'<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">
	<legend><b>Quản lý ca thi&nbsp;(<i>Mã kỳ thi: '.$MaKythi.'</i>)</b></legend>';
	$sqlkythi ='SELECT TenKythi, Tungay, Toingay,Taocathi,Socathi FROM cet_kythi WHERE Makythi ="'.$MaKythi.'"';
	$resultkythi = mysql_query($sqlkythi, $link);
	if (!$resultkythi) {  echo 'MySQL Error 3: ' . $sqlkythi;   exit;	}
	$rowkt = mysql_fetch_row($resultkythi);
	$TenKythi = $rowkt[0];$Tungay = $rowkt[1];$Toingay = $rowkt[2];$DaTaocathi= $rowkt[3];
	//thongbaoloi("new:".$newform);
	if($newform == "") 
		$Socathi =  $rowkt[4];
	
	if (($MaKythi !="") && ($Taocathi > 0)){
		thongbaoloi("đã tao ca thi:" .$MaKythi .':'.$Taocathi);
		//exit;
		
	}	
	
	
	print '<form action="cet_QLCathi.php" method="post" name ="cet_QLCathi">' ;
	
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<tr><td width="17%">Kỳ thi: </td><td  colspan="2" height ="'.$Height.'"><b>'.cet_List_Kythi2($link,$MaKythi," ",1).'</b></tr>';
	print '<tr><td>Tổng số ca thi(*): </td><td width="10%"  height ="'.$Height.'"><Input type ="text" name ="Socathi" value = "'.$Socathi.'" onchange ="JavaScript:check6();"></td>
			<td align="right">Ngày thi từ : <Input type ="Date" Id ="Tungay" value = "'.$Tungay.'" readonly ="readonly"> tới: <Input type ="Date" Id ="Toingay"  value = "'.$Toingay.'" readonly ="readonly"> </td></tr>';		
	print'</table>';
	
	
	if($Socathi>0){
		
	//--------------------------ca  thi-------------------------
	print'<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">
	<legend><b>Thời gian ca thi</legend>';
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<tr height ="'.$Height.'">
	       <td width="8%" align = "center">Ca thi</td><td width="15%"> Ngày thi </td><td width="10%"> Giờ thi </td>
           <td width="8%" align = "center">Ca thi</td><td width="15%"> Ngày thi </td><td width="10%"> Giờ thi </td>
		   <td width="8%" align = "center">Ca thi</td><td width="15%"> Ngày thi </td><td > Giờ thi </td></tr>';
	$sqlkyca = 'SELECT cathi, ngaythi, giothi FROM cet_kythi_cathi WHERE MaKythi ="'.$MaKythi.'" ORDER by Cathi';

	$resultkyca = mysql_query($sqlkyca, $link);
	if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
	
	for($k=1; $k<=$Socathi; $k++){
		$bgiothi = "giothi".$k; 
		$bngaythi = "ngaythi".$k;
		$rowkc = mysql_fetch_row($resultkyca);
		$ngaythi = $rowkc [1]; $giothi = $rowkc [2];
		if($k%3==1) print '<tr height ="'.$Height.'">';
		
		print '<td align = "right">Ca '.$k.':</td>
				<td> <Input type ="Date" name ="'.$bngaythi.'" Id ="'.$bngaythi.'" value ="'.$ngaythi.'" > </td>
				<td><Input type ="text" name ="'.$bgiothi.'"  Id ="'.$bgiothi.'" value ="'.$giothi.'" size="6"> </td>';
		if($k%3==0) print '</tr>';
				
	}
	
	if($Socathi%2)print '<td></td><td></td><td></td></tr>';
	print'</table>';
	print '</div>';
	//------------------------------------------------------------------------------------------
	//--------------------------(5/1/2021)Điểm thi - Môn thi  - Ca thi----------------------
	
	print'<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">	<legend><b>Địa điểm thi - ca thi</legend>';
	$hcolor =  Get_name($link, "cet_table_color","giatri","mathamso", "heading1");	
	print '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt" cellpading="0" cellspacing="1">';
	print '<tr><td width="5%"></td><td width="5%"></td><td width="27%"></td><td></td></tr>';
	print '<tr height ="'.$Height.'"  bgcolor="'.$hcolor.'" ><td colspan="2"><b>Mã</b></td><td><b> Tên (Điểm thi/Môn thi)</b></td><td ><b>Chọn ca thi</b></td></tr>';
	
	$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$MaKythi.'"';
	$resultmt = mysql_query($sqlmt, $link);
	if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
	$Somonthi =  mysql_num_rows($resultmt);
	$socamon = array($Somonthi+1);
	for ($t=0; $t<=$Somonthi; $t++) $socamon[$t]=0;
	$sqldt = 'SELECT Makythi, cet_kythi_diadiem.Madiadiem, Tendiadiem FROM cet_kythi_diadiem join cet_diadiemthi on (cet_kythi_diadiem.Madiadiem =cet_diadiemthi.Madiadiem) WHERE MaKythi ="'.$MaKythi.'"';
	$resultdt = mysql_query($sqldt, $link);
	if (!$resultdt) {	print 'Error: 2' . $sqldt;	 exit;	}
	$Sodiadiem =  mysql_num_rows($resultdt);
	if($Sodiadiem==0) { thongbaoloi( "Chưa có điểm thi!"); exit;}	
	$socadiadiem = array($Sodiadiem+1);
	for ($t=0; $t<=$Sodiadiem; $t++) $socadiadiem[$t]=0;
	//$bcolor1 = "#DEDEDE"; $bcolor2 = "#F0F0F0";
	$bcolor1 =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolor1");
	$bcolor2 =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolor2");
	
	for($k=1; $k<=$Sodiadiem; $k++){
		if($k % 2==0) $bcolor = $bcolor1; else  $bcolor = $bcolor2;
		$socadiadiem[$k] = 0; 
		$rowdt =  mysql_fetch_row($resultdt);
		$bDiemthi = "Madiemthi".$k; $Madiemthi = $rowdt[1];
		
		$Tendiemthi = $rowdt[2];
		$btongdiemca = "Diemca".$k;
		print '<tr height ="'.$Height.'" bgcolor="'.$bcolor.'"><td colspan="2">'.$Madiemthi.'</td><td>'.$Tendiemthi.'</td><td>';
		
		//$sqldiemca = 'SELECT cathi, checked FROM cet_diemthi_cathi WHERE MaKythi ="'.$MaKythi.'" AND Madiemthi ="'.$Madiemthi.'"  ORDER by Cathi';
		//$resultdiemca = mysql_query($sqldiemca, $link);
		
		//if (!$resultdiemca) {	print 'Error: 2' . $sqldiemca;	 exit;	}
		
		$ncheck =0;
		$mcheck=0;
		print '</td>';	
		print '</tr>';
	
	//------------------------Ghép môn----------------
			$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$MaKythi.'"';
			$resultmt = mysql_query($sqlmt, $link);
			if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
			$Somonthi =  mysql_num_rows($resultmt);
			if($Somonthi==0) { thongbaoloi( "Chưa có môn thi!"); exit;}	
			
			if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
			for($km=1; $km<=$Somonthi; $km++){
				$rowmt =  mysql_fetch_row($resultmt);
				$bMonthi = "Mamonthi".$k."_".$km; $Mamonthi = $rowmt[1];
				$Tenmonthi = $rowmt[2];
				$btongmonca = "Monca".$km;
				print '<tr height ="'.$Height.'"><td></td><td align="right" bgcolor="'.$bcolor.'">'.$Mamonthi.'</td><td bgcolor="'.$bcolor.'">&emsp;'.$Tenmonthi.'  </td><td bgcolor="'.$bcolor.'">';
				
				$sqlmonca = 'SELECT cathi, checked FROM cet_mon_cathi WHERE MaKythi ="'.$MaKythi.'" AND Madiemthi ="'.$Madiemthi.'" AND maMonthi ="'.$Mamonthi.'"  ORDER by Cathi';
				$resultmc = mysql_query($sqlmonca, $link);
				//print $sqlmonca; exit;
				if (!$resultmc) {	print 'MySQL Error: 4' . $sqlmc;	 exit;	}
				$ncheck =0;
				for($j=1; $j<=$Socathi; $j++){
					$rowmc = mysql_fetch_row($resultmc);
					
					if($rowmc[1]==0) {$check = " ";}
					else {$check = "checked"; $ncheck ++; $socadiadiem[$k]++;$socamon[$km]++;}
					
					$bmoncathi = "DiemMonCa".$k.'_'.$km."_".$j; 
					
					print 'ca '.$j.' <Input type ="checkbox" name ="'.$bmoncathi.'" value ="1" size="5" onchange = "JavaScript:check7('.$bmoncathi.','.$btongdiemca.','.$btongmonca.');" '.$check.' >&nbsp;&nbsp;&nbsp;';
					}
		
				//print '<Input type ="text" Id ="'.$btongmonca.'"  value = "'.$ncheck.'" size="5">';
				print '<Input type ="hidden" name ="'.$bMonthi.'" value = "'.$Mamonthi.'" size="5">';
				print '</td>';	
		
				print '</tr>';
	}
			//------------------------------------------------------
	}
		
	print '<Input type ="hidden" name ="Sodiemthi" value = "'.$Sodiadiem.'" size="5">';	
	//print '<Input type ="hidden" name ="newform" value = "1" >';	
	print'</table>';
	
	//--------------lưu giá trị để kiểm tra----------------------------------
		//-------------------Các địa điểm------------------------------
	$sqldt = 'SELECT Makythi, cet_kythi_diadiem.Madiadiem, Tendiadiem FROM cet_kythi_diadiem join cet_diadiemthi on (cet_kythi_diadiem.Madiadiem =cet_diadiemthi.Madiadiem) WHERE MaKythi ="'.$MaKythi.'"';
	$resultdt = mysql_query($sqldt, $link);
	if (!$resultdt) {	print 'Error: 2' . $sqldt;	 exit;	}
	$Sodiadiem =  mysql_num_rows($resultdt);
	if($Sodiadiem==0) { thongbaoloi( "Chưa có điểm thi!"); exit;}	
	
	for($k=1; $k<=$Sodiadiem; $k++){
		$rowdt =  mysql_fetch_row($resultdt);
		$bDiemthi = "Madiemthi".$k; $Madiemthi = $rowdt[1];
		$btongdiemca = "Diemca".$k;
		//--đang sửa--check số ca của địa điểm thi	
		print '<Input type ="hidden" Id ="'.$bDiemthi.'" name = "'.$bDiemthi.'" value = "'.$Madiemthi.'" size="5">';
		//print '<Input type ="text" Id ="'.$btongdiemca.'"  value = "'.$ncheck.'" size="5">&nbsp;';
		print '<Input type ="hidden" Id ="'.$btongdiemca.'"  value = "'.$socadiadiem[$k].'" size="5">&nbsp;';
	}
	print '<br>';
		//------------------------Các môn thi --------------------
	$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$MaKythi.'"';
	$resultmt = mysql_query($sqlmt, $link);
	if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
	$Somonthi =  mysql_num_rows($resultmt);
	for($m=1; $m<=$Somonthi; $m++){
		$rowmt = mysql_fetch_row($resultmt);
		$btongmonca = "Monca".$m;
		$bMonthi = "Mamonthi".$m; $Mamonthi = $rowmt[1];
		//---đang sửa---	check số ca của môn  thi		
		print '<Input type ="hidden" Id ="'.$bMonthi.'" value = "'.$Mamonthi.'" size="3">';
		print '<input type = "hidden" Id = "'.$btongmonca.'" value ="'.$socamon[$m].'" size ="3">';
		
	}
	print '</div>';
	//------------------------------/Đia điểm thi - ca thi------------------------------------------------------------
	
	//--------------------------Môn thi - ca thi----------------------
	/*
	print'<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">	<legend><b>Môn thi - ca thi</legend>';
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<tr height ="'.$Height.'"><td width="25%">Môn thi</td><td >Chọn ca thi</td></tr>';
	$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$MaKythi.'"';
	$resultmt = mysql_query($sqlmt, $link);
	if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
	$Somonthi =  mysql_num_rows($resultmt);
	if($Somonthi==0) { thongbaoloi( "Chưa có môn thi!"); exit;}	
	
	if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
	for($k=1; $k<=$Somonthi; $k++){
		$rowmt =  mysql_fetch_row($resultmt);
		$bMonthi = "Mamonthi".$k; $Mamonthi = $rowmt[1];
		$Tenmonthi = $rowmt[2];
		$btongmonca = "Monca".$k;
		print '<tr height ="'.$Height.'"><td width="10%">'.$Mamonthi.'-'.$Tenmonthi.'  </td><td>';
		
		$sqlmonca = 'SELECT cathi, checked FROM cet_mon_cathi WHERE MaKythi ="'.$MaKythi.'" AND maMonthi ="'.$Mamonthi.'"  ORDER by Cathi';
		$resultmc = mysql_query($sqlmonca, $link);
		//print $sqlmonca; exit;
		if (!$resultmc) {	print 'MySQL Error: 4' . $sqlmc;	 exit;	}
		$ncheck =0;
		for($i=1; $i<=$Socathi; $i++){
			$rowmc = mysql_fetch_row($resultmc);
			
			if($rowmc[1]==0) {$check = " ";}
			else {$check = "checked"; $ncheck ++;}
			
			$bmoncathi = "MonCa".$k."_".$i; 
			
			print 'ca '.$i.' <Input type ="checkbox" name ="'.$bmoncathi.'" value ="1" size="5" onchange = "JavaScript:check7('.$bmoncathi.','.$btongmonca.');" '.$check.' >&nbsp;&nbsp;&nbsp;';
			}
		
		print '<Input type ="hidden" Id ="'.$btongmonca.'"  value = "'.$ncheck.'" size="5">';
		print '<Input type ="hidden" name ="'.$bMonthi.'" value = "'.$Mamonthi.'" size="5">';
		print '</td>';	
		
	print '</tr>';
	}
	print'</table>';
	*/
	print '<Input type ="hidden" name ="Somonthi" value = "'.$Somonthi.'" size="5">';	
	print '<Input type ="hidden" name ="newform" value = "1" >';	
	
	print '</div>';
	
	}
	
	print'</fieldset>';
	print '</div>';
	
	//print '<Input type ="hidden" name ="MaKythi" value = "'.$MaKythi.'">';
	
	
	//----------------------------------------------------------------
	if($DaTaocathi>0)
	print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check(1);" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	else
	print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check(0);" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '<input name="Sendcheck" type="hidden" value ="">';
	
	print '&nbsp;&nbsp;<input name="Send" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt"> </p>';

	print '</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
