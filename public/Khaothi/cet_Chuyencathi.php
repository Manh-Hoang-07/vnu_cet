<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Chuyencathi.php
// Chức năng: Admin -- Cập nhật Hồ sơ thí sinh --- 
// Phiên bản: 1.1
// Thời gian: tháng 1/2021
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

<title>Chuyển/dồn ca thi thí sinh</title>
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

function presubmit() { 
	var s = parseInt(document.cet_Chuyencathi.sotschuyen.value, 10);
	if(s<=0)alert('Chưa chọn thí sinh để chuyển!!');
	
	else{
		s = parseInt(document.cet_Chuyencathi.Cathi2.value, 10);
		if(s==0) alert('Chưa chọn ca thi chuyển tới!!');
		else{
			var kt = confirm('Bạn muốn ghi chuyển ca?');
			
			if(kt)  {
				document.cet_Chuyencathi.confirmOK.value ="Ghi chuyển ca";
				document.cet_Chuyencathi.submit();
			}
		}
	}
}
function checksotts(k){
	var s = parseInt(document.cet_Chuyencathi.sotschuyen.value, 10);
	
	if(k.checked){
		s++;
	}
	else {
		s--;
		document.cet_Chuyencathi.bcheckAll.checked = false;
	 }
	 document.cet_Chuyencathi.sotschuyen.value =s;
}
function checkAll(k){
	
	var s = 0;//parseInt(document.cet_Chuyencathi.sotschuyen.value, 10);
	var i=0;
	var csd = parseInt(document.cet_Chuyencathi.csdau.value, 10);// chỉ số dòng đầu của trang
	var csc = parseInt(document.cet_Chuyencathi.cscuoi.value, 10);//chỉ số dòng cuối của trang
	if(k.checked){
		for(i=csd; i<=csc; i++){
			var c= "sv"+i;
			document.getElementById(c).checked=true; s++;
		}
	}
	else {
		for(i=csd; i<=csc; i++){
			var c= "sv"+i;
			document.getElementById(c).checked=false; 
		
	 }
	}
	document.cet_Chuyencathi.sotschuyen.value = s;
	
	
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
		
	
	//if(empty($username)) {thongbaoloi1('Bạn chưa đăng nhập hoặc phiên làm việc đã hết!');    exit;	}

//------------------------------------------------------------------------------------------------------------
	/*if (!$link = mysql_connect('localhost', $username, $password)) {thongbaoloi('Đăng nhập không hợp lệ'); exit;}
	if (!mysql_select_db('cet_dkythi', $link)) {	 thongbaoloi('Could not select database ');exit; }
	mysql_query("SET NAMES utf8");
	
	$sql    = 'select Mucquyen, Donvi, hoten from  cetusers where tendangnhap ="'.$username.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
	$row = mysql_fetch_row($result);
	$Donvi =$row[1];
	$userfullname = $row[2];
	//if( ! usercheck_admin()) {thongbaoloi('Bạn không có chức năng cập nhật Hồ sơ'); exit;}
	*/
	
//-------------------------------------------------------------------------------------------------------------
	///*
	$Makythi = $_POST['Makythi']; //me('kt:'.$Makythi);
	$Madiemthi =$_POST['Madiemthi'];
	$Mamonthi =$_POST['Mamonthi'];
	$Cathi=$_POST['Cathi'];
	//*/
	//------------test--------
	$Cathi2=$_POST['Cathi2'];
	// $Makythi = "C32021";
	// $Madiemthi ="G2";
	// $Mamonthi ="A1";
	// $Cathi=1;
//------------------------------------------------------	
	$codeOK = $_POST['confirmOK'];

	
	if($codeOK =="Quay lại"){
		
		$Tendangnhap =$Chitiet1 =$Chitiet ="";
	}
	//----------------------------------------------------------------------
	
	//-----------------------------------------------------------

	if($codeOK =="Ghi chuyển ca"){ 
	$csd = $_POST['csdau']; $csc = $_POST['cscuoi'];
	for($k= $csd; $k<=$csc; $k++){
		$bcheck ="sv".$k;
		$Taikhoan  = $_POST[$bcheck];
		if($Taikhoan !="") {
			
			//me('dc:'.$bcheck.':'.$_POST[$bcheck]);
			$sqlupdate = 'UPDATE cet_student_cathi SET checked = 0 
						WHERE Makythi ="'.$Makythi.'" AND Madiemthi ="'.$Madiemthi.'" AND Mamonthi ="'.$Mamonthi.'" AND username ="'.$Taikhoan.'" AND Cathi  = "'.$Cathi.'"';
			$result = mysql_query($sqlupdate, $link);
			
			$sqlupdate = 'UPDATE cet_student_cathi SET checked = 1 
						WHERE Makythi ="'.$Makythi.'" AND Madiemthi ="'.$Madiemthi.'" AND Mamonthi ="'.$Mamonthi.'" AND username ="'.$Taikhoan.'" AND Cathi  = "'.$Cathi2.'"';
			$result = mysql_query($sqlupdate, $link);
			//stop($sqlupdate);
		}
		//else me('dc:'.$bcheck.'not check');
		$sqllog = 'INSERT INTO cet_log_chuyenca (Makythi, Taikhoan, Cathicu, Cathimoi, Ngoithuchien) 
					VALUE ("'.$Makythi.'", "'.$Taikhoan.'", "'.$Cathi.'", "'.$Cathi2.'", "'.$username.'")';
		$result = mysql_query($sqllog, $link);
	}
	$noidung ="chuyen ".$Cathi ."," .$Cathi2;
	cet_log2($link, $Makythi,"Chuyenca",$noidung,$username);

	//setcookie('name',$username,time()+1000);
	//setcookie('pass',$password,time()+1000);
	}
	
	
//-----------------------------------------------------Tạo form dữ liệu -------------------------------------------				
//------------------Tiêu đề trang------------------------------	----------------------------------------------
print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
print '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp; Chuyển ca thi </td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Donvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname .'('.$username .') </i></td></tr>';
print '</table>';
print '<form action="cet_Chuyencathi.php" method="post" name ="cet_Chuyencathi" enctype ="multipart/form-data">' ;

//-------------------------------------------------Chọn ca thi cần chuyển----------------------------------------------
$Tendangnhap_s = $_POST['Tendangnhap_s']; $SDTDD_s= $_POST['SDTDD_s']; $SOCMND_s= $_POST['SOCMND_s']; $Hoten_s = cet_property_name($_POST['Hoten_s']);$Ngaysinh_s =$_POST['Ngaysinh_s'];
print '<div><fieldset class="styleset">	<legend><b>Xác định ca thi cần chuyển</legend>';
print '<table border ="0"><tr><td width ="10%"></td><td width ="35%"></td><td width ="10%"></td><td ></td></tr>';
print '<tr>';
print '<td>&emsp;Kỳ thi: </td><td>'.cet_List_Kythi3($link,"Makythi", $Makythi," ",1).'</td>';
print '<td>&emsp;Địa điểm thi: </td><td>'.cet_List_Diemthi($link,"Madiemthi",$Makythi,$Madiemthi," ", 1).'</td></tr>';

print '<tr><td>&emsp;Môn thi: </td><td>'.cet_List_Monthi($link, "Mamonthi",  $Makythi,$Madiemthi,$Mamonthi, " ", 1).'</td>';
print '<td>&emsp;Ca thi: </td><td>'.cet_List_Cathi($link, "Cathi",  $Makythi,$Madiemthi,$Mamonthi,$Cathi," ", 1).'</td>';

print '</tr>';
print '</table>';
print '</fieldset>';
print '</div>';
$dkien="1";
if($Tendangnhap_s!="") $dkien .= 'AND (Tendangnhap ="'.$Tendangnhap_s.'")';//me($dkien);
if($SDTDD_s!="") $dkien .= 'AND (Sodienthoai ="'.$SDTDD_s.'")';
if($SOCMND_s!="") $dkien .= 'AND (SoCMND LIKE "%'.$SOCMND_s.'%")';
if($Hoten_s!="") $dkien .= 'AND (Hoten LIKE "%'.$Hoten_s.'%")';
if($Ngaysinh_s!="") $dkien .= 'AND (Ngaysinh ="'.$Ngaysinh_s.'")';
//-------------------------------------------------------------------------------------------------------
print '<hr>';
//------------------//Tiêu đề trang------------------------------

	$sql ='SELECT username, Hoten, DATE_FORMAT(Ngaysinh,"%d-%m-%Y"),SOCMND, Email,Sodienthoai, Mamonthi,Cathi,checked	 
			FROM cet_student_cathi JOIN cet_student_info ON (username=Tendangnhap )
			WHERE (Makythi = "'.$Makythi.'" AND Madiemthi ="'.$Madiemthi.'" AND Mamonthi = "'.$Mamonthi.'" AND Cathi ="'.$Cathi.'" AND checked =1 )';
	
	//stop($sql);
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
 
	//if($Tongso_hoso<16) $div_height = $Tongso_hoso * $Height2 + $Height1+35;
	//else
		$div_height =400;
	//--------------Trang------------------------

	$lineperpage = Getlineperpage();
	$Page_total = ceil($Tongso_hoso/$lineperpage);
	if(($page=="0")||($page=="")||($page>$Page_total)) $page=1;  
	if($page==1) $goprepage="disabled"; else $goprepage=" ";
	if($page==$Page_total) $gonextpage="disabled"; else $gonextpage=" ";
	//--------------/Trang------------------------
	
	print '<table border="0"><tr><td width ="75%"><small><i>(Tổng số đăng ký thi:['.$Tongso_hoso.'];</small></td>';
	print '<td width="5%">Trang: </td><td width="4%"><input type ="text" value ="'.$page.'" name ="page" style="width:100%" onchange="this.form.submit();"></td>';
	print '<td width="2%"><input type ="submit" value =">" name ="next" style="width:100%" '.$gonextpage.'></td>';
	print '<td width="2%"><input type ="submit" value =">>" name ="next" style="width:100%" '.$gonextpage.'></td>';
	print '<td width="2%"><input type ="submit" value ="<" name ="next" style="width:100%" '.$goprepage.'></td>';
	print '<td width="2%"><input type ="submit" value ="<<" name ="next" style="width:100%" '.$goprepage.'></td>';

	print'<td width="1%">/</td><td><input type="text" name ="Page_total" value ="'.$Page_total.'" style="width:100%" readonly ="readonly" ></td>';

	print'</tr></table>';
		
	print '<div style="width: 100%; height:'.$div_height.'px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	print '<table class ="ext1" width="100%" border="1">'; 
	
	print '<tr height="40px" ><td width="60px" align="center"><b>STT</td>
		<td width="170px" align="left">&nbsp;&nbsp;<input type="checkbox"   Id= "bcheckAll" name ="bcheckAll" value ="'.$Tendangnhap.'" style="background-color:'.$rcolor.';width:15;height:15"  title= "Chọn tất cả"  onchange ="Java:checkAll(bcheckAll);">
		
		<b>Tài khoản</td>
		<td width="110px" align="center"><b>CMND/CCCD</td>
		<td width="110px" align="center"><b>Họ và tên</td>
		
		<td width="110px" align="center"><b>Ngày sinh</td>
		<td width="180px" align="center"><b>Email</td>
		<td width="100px" align="center"><b>Số điện thoại</td>
		<td width="90px" align="center"><b>Môn thi</td>
		
		<td width="90px" align="center"><b>Ca thi</td> 
		<td width="160px" align="center"><b>Ca thi khác đã đăng ký</td> 
	</tr>';
	//-----------------Lặp với mỗi Môn thi có trong csdl---------------
	for($id=1; $id <= $lineperpage*($page-1); $id++) 
		$row = mysql_fetch_row($result);	
	$rcolor1 = "#C0C0C0"; $rcolor2 = "#3399FF";
	for($k=$id; ($k < $id+$lineperpage)&&($k<=$Tongso_hoso); $k++){ //$Tongso_hoso
	
		$row = mysql_fetch_row($result); 
		$Tendangnhap = $row[0];	$Hoten = $row[1];$Ngaysinh = $row[2]; 		$SOCMND = $row[3];	$Email= $row[4];		
		 $Mamonthi = $row[6]; 	$Sodienthoai = $row[5]; $Cathi = $row[7];
		
		
		
		if($k % 2 ==1) $rcolor = $rcolor1; else $rcolor= $rcolor2;
		$bcheck = "sv".$k;
		print '<tr bgcolor="'.$rcolor.'"><td align ="center">'.$k.'</td><td align ="left" valign ="bottom">&nbsp;&nbsp;
			<input type="checkbox"   Id= "'.$bcheck.'" name ="'.$bcheck.'" value ="'.$Tendangnhap.'" style="background-color:'.$rcolor.';width:15;height:15"  title= "Nhấn chọn chuyển"  onchange ="Java:checksotts('.$bcheck.');">&nbsp;'.$Tendangnhap.' </td>';
			
		print	'<td align="center">'.$SOCMND.'</td>
			
			<td >&nbsp;'.$Hoten.'</td>
			<td align="center">'.$Ngaysinh.'</td>
			<td>&nbsp;'.$Email.'</td>
			
			<td align="center">'.$Sodienthoai.'</td>
			<td align="center">'.$Mamonthi.'</td>
			<td align="center">'.$Cathi.'</td>
			<td>&nbsp;'.cet_set_cathikhac($link,$Tendangnhap, $Makythi,$Madiemthi,$Mamonthi,$Cathi).'</td></tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	
	print '</table>'	;	
	print  '<input type ="hidden" Id = "csdau" name = "csdau"   value ="'.$id.'"> <input type ="hidden" Id = "cscuoi" name = "cscuoi"   value ="'.($k-1).'">';
	print'</div>'	;
	
	
	//---------------------------------
	print '<hr>';
	
	print '<b>Chuyển các thí sinh tới: &emsp;&emsp;</b>';
	$duocchuyendiemthi  = Get_name($link, "cet_thamso_kythi","Giatri","Mathamso","Chuyendd");
	if($duocchuyendiemthi==0) // Không được phép chuyển địa điểm khi ghép ca
		print 'Điểm thi: &emsp; </td><td>'.cet_List_Diemthi($link,"Madiemthi2",$Makythi,$Madiemthi,"disabled", 0).'</td>';
	else 
		print 'Điểm thi: &emsp; </td><td>'.cet_List_Diemthi($link,"Madiemthi2",$Makythi,$Madiemthi," ", 0).'</td>';
	print '&emsp;Ca thi: </td><td>'.cet_List_Cathi2($link, "Cathi2",  $Makythi,$Madiemthi,$Mamonthi,$Cathi," ", 0).'</td>';
	print '&emsp;<input type = "button" name ="Send"  value = "Ghi chuyển ca" style="height:29px;font-size:12pt;font-weight:bold;width:120pt" onclick ="JavaScript:presubmit();">';
	print '<input type ="hidden" name = "confirmOK" value="">';
	print '<input type ="hidden" name = "sotschuyen" value="0">';
	print '</form>';
	//-----------------------------------------------------------------------------------------------------------------------
	mysql_free_result($result);

?> 

</body>
</html> 
