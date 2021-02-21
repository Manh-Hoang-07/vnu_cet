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
	
	
	var tong =parseInt(document.cet_ThongkeDK.Socathi.value,10);
	if((isNaN(tong)==true )||(tong<=0)){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_ThongkeDK.Socathi.focus(); 
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
	var Sodiemthi = parseInt(document.cet_ThongkeDK.Sodiemthi.value,10);
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
	var Somonthi = parseInt(document.cet_ThongkeDK.Somonthi.value,10);
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
				document.cet_ThongkeDK.Sendcheck.value="Ghi nhậnOK"; 
				document.cet_ThongkeDK.submit();
			//}
		//}
	
}

function check6(){
	var tong = 0;
	
	tong = parseInt(document.cet_ThongkeDK.Socathi.value,10);
	if(tong<=0){
		alert('Số ca thi chưa hợp lệ!'); 
		document.cet_ThongkeDK.Socathi.focus(); 
		
		}
	else {
		
		document.cet_ThongkeDK.Socathi.value = tong; 
		document.cet_ThongkeDK.Sendcheck.value="Tạo form"; 
		document.cet_ThongkeDK.submit();
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
	if(typeof document.cet_ThongkeDK.newform =='object')	document.cet_ThongkeDK.newform.value =""; 
	//alert('pre OK');
	document.cet_ThongkeDK.submit();
	
}
function Chuyencathi1(Makythi,Madiemthi,Mamonthi,Cathi){
//function Chuyencathi1(){
	alert('chuyen ca' );
} 
// -->
</script>
</head>
<body bgcolor="#FCFFFF">
   
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
	$auth = Get_name($link,"cetusers","Mucquyen","Tendangnhap",$username);
	if($auth !=3){thongbaoloi('Bạn không có chức năng sửa thông tin  tài khoản!!'); exit;}
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
	
	//me('in:'.$MaKythi );	
	print  '<script> window.open("cet_Inthongke.php?kythi='.$MaKythi.'", "_blank");</script>';
	//---setnull----
	$MaKythi="";
	$Socathi="";
	
	
}

//--------- Xử lý các tình trạng form nhập dữ liệu--------------
//------------------Tiêu đề trang------------------------------	

$Tendonvi = Get_name($link,"cetusers","donvi","Tendangnhap",$username);
$bgcolor = "#00CCEE";
print '<table border="0" bgcolor="'.$bgcolor.'"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" rowspan="2" style="font-size: 20pt; color: #0000FF" >&nbsp;&nbsp; Thống kê Đăng ký dự thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
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
	$TenKythi = $rowkt[0];$Tungay = $rowkt[1];$Toingay = $rowkt[2];$DaTaocathi= $rowkt[3];
	//thongbaoloi("new:".$newform);
	if($newform == "") 
		$Socathi =  $rowkt[4];
	
	if (($MaKythi !="") && ($Taocathi > 0)){
		thongbaoloi("đã tao ca thi:" .$MaKythi .':'.$Taocathi);
		//exit;
		
	}	
	
	
	print '<form action="cet_ThongkeDK.php" method="post" name ="cet_ThongkeDK">' ;
	
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<tr><td width="17%">Kỳ thi: </td><td  colspan="2" height ="'.$Height.'"><b>'.cet_List_Kythi2($link,$MaKythi," ",1).'</b></tr>';
	print '<tr><td>Tổng số ca thi: </td><td width="10%"  height ="'.$Height.'"><Input type ="text" name ="Socathi" value = "'.$Socathi.'" readonly ="readonly"></td>
			<td align="right">Ngày thi từ : <Input type ="Date" Id ="Tungay"  value = "'.$Tungay.'"  readonly ="readonly"> tới: <Input type ="Date" Id ="Toingay"  value = "'.$Toingay.'" readonly ="readonly"> </td></tr>';		
	print'</table>';
	
	
	if($Socathi>0){
		
		//--------------------------ca  thi-------------------------
		//print'<br><div class="rowdiv" style="clear:both;width:100%">
		//<fieldset class="styleset">
		//<legend><b>Thời gian ca thi</legend>';
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
		print '<hr>';
		//print '</div>';
		//------------------------------------------------------------------------------------------
		//--------------------------(5/1/2021)Điểm thi - Môn thi  - Ca thi: số lượng  đăng ký----------------------
		
		//print'<br><div class="rowdiv" style="clear:both;width:100%">
		//<fieldset class="styleset">	<legend><b>Địa điểm thi - ca thi</legend>';
		$hcolor =  Get_name($link, "cet_table_color","giatri","mathamso", "heading1");	
		print '<table  width="100%" border="1" cellpading = "0" cellspacing="0" style="font-family: Times New Roman; font-size: 16pt" cellpading="0" cellspacing="1">';
		print '<tr><td width="10%"></td><td width="27%"></td>';
		for($c =1; $c <=$Socathi; $c++) print '<td></td>'; print '<td> </td></tr>';
		
		print '<tr height ="'.$Height.'"  bgcolor="'.$hcolor.'" ><td ><b>Mã</b></td><td><b> Tên (Điểm thi/Môn thi)</b></td>';
		for($c =1; $c <=$Socathi; $c++) print '<td align ="center">Ca '.$c.'</td>'; print '<td align ="center">Tổng</td></tr>';

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
		
		$socadiadiem = array($Sodiadiem+1);	for ($t=0; $t<=$Sodiadiem; $t++) $socadiadiem[$t]=0;
		
		$Tongca = array ($Socathi+1);	for($j=1; $j<=$Socathi; $j++) $Tongca[j] =0;
		
		//$bcolor1 = "#DEDEDE"; $bcolor2 = "#F0F0F0";
		$bcolor1 =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolor1");
		$bcolor2 =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolor2");
		
		for($k=1; $k<=$Sodiadiem; $k++){
			if($k % 2==0) $bcolor = $bcolor1; else  $bcolor = $bcolor2;
			$socadiadiem[k] = 0; 
			$rowdt =  mysql_fetch_row($resultdt);
			$bDiemthi = "Madiemthi".$k; $Madiemthi = $rowdt[1];
			
			$Tendiemthi = $rowdt[2];
			$btongdiemca = "Diemca".$k;
			$mergecell = 1+$Socathi;
			print '<tr height ="'.$Height.'" bgcolor="'.$bcolor.'"><td align="left">'.$Madiemthi.'</td><td colspan="'.$mergecell.'">'.$Tendiemthi.'</td>
			<td align ="center"><b>'.cet_getvalue2($link, $MaKythi,$Madiemthi).'</b></td>';
			
			
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
					print '<tr height ="'.$Height.'"><td align="right" bgcolor="'.$bcolor.'">'.$Mamonthi.'</td><td bgcolor="'.$bcolor.'">&emsp;'.$Tenmonthi.'  </td>';;
					
					$sqlmonca = 'SELECT cathi, checked FROM cet_mon_cathi WHERE MaKythi ="'.$MaKythi.'" AND Madiemthi ="'.$Madiemthi.'" AND maMonthi ="'.$Mamonthi.'"  ORDER by Cathi';
					$resultmc = mysql_query($sqlmonca, $link);
					//print $sqlmonca; exit;
					if (!$resultmc) {	print 'MySQL Error: 4' . $sqlmc;	 exit;	}
					$ncheck =0;
					$Tongmon =0;
					for($j=1; $j<=$Socathi; $j++){
						$rowmc = mysql_fetch_row($resultmc);
						
						if($rowmc[1]==0) {$check = " ";}
						else {$check = "checked"; $ncheck ++; $socadiadiem[k]++;$socamon[$km]++;}
						
						$bmoncathi = "DiemMonCa".$k.'_'.$km."_".$j; 
						$sodangky  = cet_getvalue($link, $MaKythi,$Madiemthi,$Mamonthi,$j);
						$Tongca[$j] += $sodangky; $Tongmon+=$sodangky;
						//print '<td align ="center" bgcolor ="'.$bcolor.'" onclick ="JavaScript:Chuyencathi();">'.$sodangky.' </td>';
						 print '<td bgcolor ="'.$bcolor.'"><input type="button"  class="button"  name="Chuyencathi"  value = "'.$sodangky.'"
						 onclick ="JavaScript:Chuyencathi1('.$MaKythi.','.$Madiemthi.','.$Mamonthi.','.$j.');" 
						 style="background-color:'.$bcolor.';width:100%;height:'.$Height.';"  title= "Nhấn để chuyển ca"></td>';
						}
			
					print '<td align ="center" bgcolor ="'.$bcolor.'">'.$Tongmon;
					
					print '<Input type ="hidden" name ="'.$bMonthi.'" value = "'.$Mamonthi.'" size="5">';
					print '</td>';	
			
					print '</tr>';
		}
				//------------------------------------------------------
		}
		print '<tr height ="'.$Height.'"  bgcolor="'.$hcolor.'" ><td ></td><td align="center"><b><i>Tổng</i></b></td>';
		$tongkythi =0;
		for($c =1; $c <=$Socathi; $c++) {
		print '<td align ="center">'.$Tongca[$c].'</td>'; $tongkythi +=$Tongca[$c];}
		print '<td align="center"><b>'.$tongkythi.'</b></td></tr>';	
		print '<Input type ="hidden" name ="Sodiemthi" value = "'.$Sodiadiem.'" size="5">';	
		
		print'</table>';
		}
	
	print'</fieldset>';
	print '</div>';
	
	//print '<Input type ="hidden" name ="MaKythi" value = "'.$MaKythi.'">';
	
	
	//----------------------------------------------------------------
	if($DaTaocathi>0){
		print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check(1);" value = "In thống kê" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
		//else
		//print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check(0);" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
		print '<input name="Sendcheck" type="hidden" value ="">';
		
		print '&nbsp;&nbsp;<input name="Send" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt"> </p>';
	}
	print '</form>';

	mysql_free_result($result);


?> 

</body>
</html> 
