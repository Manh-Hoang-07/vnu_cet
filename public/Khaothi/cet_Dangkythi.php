﻿<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Dangkythi.php
// Chức năng: Thí sinh đăng ký kỳ thi
// Phiên bản: 1.1
// Thời gian: tháng 01/2021
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

<title>Đăng ký kỳ thi</title>
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
function updatecheck(){
	
		document.cet_Dangkythi.Sendcheck.value="Sửa đăng ký"; 
		document.cet_Dangkythi.submit();
	}
function check(){

	if (check1()) 
	{		
	
		document.cet_Dangkythi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_Dangkythi.submit();
		}
	}
	
function check1() {
	var selMaDiemthi = document.cet_Dangkythi.SelDiadiem.value;
	var ListMaDiemthi = document.getElementsByName('SelDiadiem');
	if(selMaDiemthi==""){ alert('Bạn chưa chọn điểm thi!!');	return false;}
	var soDiemthi = parseInt(document.cet_Dangkythi.Sodiemthi.value,10);
	var Somonthi = parseInt(document.cet_Dangkythi.Somonthi.value,10);
	var d =0;
	var selDiemthi =0;
	for (d=1; d<=soDiemthi; d++){
		//var bDiemthi = "Madiemthi"+d;
		if(ListMaDiemthi[d-1].checked){selDiemthi=d; break;}
		//if (Madiemthi = document.getElementId(bDiemthi).value == selMaDiemthi){selDiemthi=d; break;}
	}
	var Socathi = document.cet_Dangkythi.Socathi.value;
	var km =0;
	var j=0, i=0;
	var bitcheck = new Array(Somonthi);
	
	for(km =1; km<=Somonthi; km++){
		
		var bSelMonthi = "selMamonthi" +selDiemthi+"_"+km;
		bitcheck[km-1]=0;
		if(document.getElementById(bSelMonthi).checked){
			 
			var bmoncathi = "DiemMonCa"+selDiemthi+'_'+km;
			var checkca = document.getElementsByName(bmoncathi);
			var i =0;
			var Socathi1 = checkca.length;
			var kt = false;
			
			for(j = 1; j<=Socathi1; j++){
				 
				if(checkca[j-1].checked) {
					kt =true; 
					bitcheck[km-1]=j;
				}
			}
			if(! kt) {alert('Chưa chọn ca thi cho môn thi: '+ km +'!'); return false;}
		}
	}
	
	for(j=0; j<Somonthi-1; j++) 
		for(i =j+1; i< Somonthi; i++)  if((bitcheck[j]==bitcheck[i])&&(bitcheck[j]!=0)) {
			alert('Chọn trùng ca thi của môn thi :  '+(i+1)+','+(j+1) +' !!');
			return false;
		}		
	return true;
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
function Xoachitiet() { 
	
   	document.cet_Dangkythi.Chitiet.value =" ";
	document.cet_Dangkythi.MahosoKT.value =" ";
	document.cet_Dangkythi.page.value ="1";
	
	}	
function setVisibility(k) {
	var i=0;
	var Sodiadiem=  parseInt(document.cet_Dangkythi.Sodiemthi.value,10);
	for (i =1; i<=Sodiadiem; i++){
		var divname = 'DD'+i;
		document.getElementById(divname).style.display = 'none';
	}
	var divname = 'DD'+k;
	document.getElementById(divname).style.display = 'inline';
	cet_Dangkythi.elements["Sendback"].focus();
}		
function  setcathi_mon(k,m){
	//alert('cathi:'+ document.cet_SuaDangkythi.Socathi.value);
		var bSelMonthi = "selMamonthi"+ k +"_" +m;
		var Socathi = parseInt(document.cet_Dangkythi.Socathi.value,10);
		if(document.getElementById(bSelMonthi).checked){
			//alert(bSelMonthi + 'set check');
			
		}
		else {
			var bmoncathi = "DiemMonCa"+ k +"_" +m; 
			var checkca = document.getElementsByName(bmoncathi);
			var i =0;
			var Socathi1 = checkca.length;
			for(i=0; i<Socathi1; i++) checkca[i].checked=false;
			//alert(bSelMonthi+ 'set un check');
			
		}
}	

function  setmonthi(k,m){
	//alert('mon thi:'+ k+'_'+m);
	var bSelMonthi = "selMamonthi"+ k +"_" +m;
	//var Socathi = parseInt(document.cet_SuaDangkythi.Socathi.value,10);
	document.getElementById(bSelMonthi).checked =true;
}
function  fullsetmonthi(k,m,j){
	var bmoncathi = "DiemMonCa"+ k +"_" +m; 
	var checkca = document.getElementsByName(bmoncathi);
	var i =0;
	var Socathi = checkca.length;
	for(i=0; i<Socathi; i++) checkca[i].checked=false;
	alert('Ca này đã hết chỗ đăng ký');	
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
	$username = $_SESSION['tennguoithi'];	$password = $_SESSION['khoanguoithi'];
	if(empty($username)) {thongbaoloi('Bạn chưa đăng nhập !');Closewindow();} 
	$link = cet_connect();
	
	if(!cet_st_checkhash($link ,$username,$password)){thongbaoloi('Tài khoản không hơp lệ !'); Closewindow(); exit;}
	date_default_timezone_set('Asia/bangkok') ;
	$userfullname  = Get_name($link, "cet_student_acc", "Hoten","Tendangnhap",$username);
	if(!cet_st_check_hoso($link, $username))	{me('Bạn chưa tạo hồ sơ dự thi - cần Nhập hồ sơ trước khi đăng ký thi!'); Closewindow();exit;/*print'<script>window.close();</script>';*/}
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
//-----------------------/Các hàm-------------------------------------------
//------------------------------------------------------------------------------------------------------------
	
//------------------Ghi nhận đăng thi -----------------------------------------------
	$codeOK = $_POST['Sendcheck'];
	$code = $_POST['Sendback'];
	$Chitiet = htmlspecialchars($_POST['Chitiet1']); 
	
	if($code =="Quay lại"){
		
		$Makythi =$Chitiet1 =$Chitiet ="";
	}
	//---------------------------------------------------------------------------------------
	
	if($codeOK =="Ghi nhậnOK"){ //--------------------Ghi Điểm thi - Môn thi - Ca thi-------------
	
		$Sodiemthi = $_POST["Sodiemthi"];
		$Somonthi = $_POST["Somonthi"];
		$Socathi = $_POST["Socathi"];
		$Makythi = $_POST["Makythi"];
		$SelDiadiem = $_POST["SelDiadiem"];
		
		///--------------------Check trước khi ghi --------------------
		//---------------Có thể Trường hợp sau khi chọn ca thi nhưng đã có thí sinh khác ghi đầy ca--------------
		//----------------------cập nhật kiểm tra 31/1/2021---------------------------
		$checkOK = true;
		$mes ='';
		for($d=1; $d<=$Sodiemthi; $d++){
				
				$bDiemthi = "Madiemthi".$d; 
				$Diemthi = $_POST[$bDiemthi];
				//me($d.','.$Diemthi);
				if($Diemthi == $SelDiadiem)	break;
			}
			
			for($m=1; $m<=$Somonthi; $m++){
				$bmoncathi = "DiemMonCa".$d."_".$m; 
				$Moncathi = $_POST[$bmoncathi]; //me('ca:'.$Moncathi);
				$bSelMonthi = "selMamonthi".$d."_".$m;
				$SelMonthi = $_POST[$bSelMonthi];
				
				$bMonthi = "Mamonthi".$d."_".$m;
				$Monthi = $_POST[$bMonthi];
				
				if($Monthi != $SelMonthi) continue; // bỏ qua Môn thi thí sinh không lựa chọn thi 
				
				
				for($k=1; $k<=$Socathi; $k++){
					
					if($Moncathi == $k){ //me('ca:'.$k);
						$sodangky = Get_count_dangky($link, $Makythi,$SelDiadiem,$k);
						
						$maxsothisinh = Get_name($link,"cet_diadiemthi", "Tongsothisinh","Madiadiem",$SelDiadiem);
						//me($Makythi.','.$SelDiadiem .','.$k);
						//me('max:'.$maxsothisinh.', da co:'.$sodangky);
						if($sodangky >=$maxsothisinh) {
							$checkOK = false;
							$mes .= $SelDiadiem.' ca '.$k. ', ';
						}	
					}
				}
			}
				
		///-----------------------------Ghi đăng ký ca thi ----------------------
		if(!$checkOK){ me ('Không thể đăng ký: '.$mes .' đã hết chỗ!');}
		else {
			//me('OK');
			
			//--Khóa để ghi --?
			
			$sqlmonca ='DELETE FROM cet_student_cathi WHERE Makythi = "'.$Makythi.'" AND username = "'.$username. '"';
			$resultmonca = mysql_query($sqlmonca, $link);
			//	me($sqlmonca);
			if (!$resultmonca) {	print 'MySQL Error: 5' .mysql_error($link) . $sqlmonca;	 exit;	}	
			//me('seld:'.$SelDiadiem);
			for($d=1; $d<=$Sodiemthi; $d++){
				
				$bDiemthi = "Madiemthi".$d; 
				$Diemthi = $_POST[$bDiemthi];
				//me($d.','.$Diemthi);
				if($Diemthi == $SelDiadiem)	break;
			}
			$Tonglephi =0;
			for($m=1; $m<=$Somonthi; $m++){
				$bmoncathi = "DiemMonCa".$d."_".$m; 
				$Moncathi = $_POST[$bmoncathi]; //me('ca:'.$Moncathi);
				$bMonthi = "Mamonthi".$d."_".$m;
				$Monthi = $_POST[$bMonthi];
				for($k=1; $k<=$Socathi; $k++){
					
					if($Moncathi == $k){
						$sqlmonca ='INSERT INTO cet_student_cathi(username, MaKythi, Madiemthi,Mamonthi,Cathi,Checked) VALUES ("'.$username.'","'.$Makythi.'","' .$Diemthi.'","' .$Monthi.'",'.$k.',1)';
						$Lephimon = Get_Lephi($link,$Makythi,$Monthi);
						$Tonglephi += $Lephimon;
					}
					else 
						$sqlmonca ='INSERT INTO cet_student_cathi(username, MaKythi, Madiemthi,Mamonthi,Cathi,Checked) VALUES ("'.$username.'","'.$Makythi.'","' .$Diemthi.'","' .$Monthi.'",'.$k.',0)';
			
					$resultmonca = mysql_query($sqlmonca, $link);
					if (!$resultmonca) {	print 'MySQL Error: 5' . $sqlmonca;	 exit;	}	
					}
			}
			$sqlupdate = 'INSERT cet_dangkythi_lephi (status,Lephidangky,Makythi,username,Diemthi) VALUE (0 ,'.$Tonglephi.',"'.$Makythi.'","'.$username. '","'.$Diemthi.'")';
			//stop($sqlupdate);
			$result = mysql_query($sqlupdate, $link);
			if (!$result) {	print 'MySQL Error: 5' . $sqlupdate. mysql_error($result);	 exit;	}	
			// ----mở khóa ---?
			
			cet_log2($link, $Makythi, "DangkyKT","Đăng ký thi", $username);
			me( "Đã ghi nhận đăng ký dự thi!!");
			print  '<script> window.open("cet_Bill.php?sv='.$username.'&kythi='.$Makythi.'", "_blank");</script>';
						   
			//---setnull----
			$Makythi=$Chitiet1 = $Chitiet ="";
			$Socathi="";
			
		}
		
		//setcookie('name',$username,time()+1000);
		//setcookie('pass',$password,time()+1000);
	}//Hết ghi dữ liệu 
	//----------------------------------------------------------------------
	
//-----------------------------------------------------Tạo form dữ liệu -------------------------------------------				

//------------------Tiêu đề trang------------------------------	----------------------------------------------
echo '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
echo '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp; Đăng ký Kỳ thi</td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
echo '<tr><td width="30%" align="right"></td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname .'('.$username .') </i></td></tr>';
echo '</table>';
echo '<form action="cet_Dangkythi.php" method="post" name ="cet_Dangkythi" enctype ="multipart/form-data">' ;

echo '<hr>';
//------------------//Tiêu đề trang------------------------------
	$code = ($_POST['Send']); 
	
	$Dieukien ="(1)";
	$ckLoaikythi = $_POST['ckLoaikythi'];
	if ($ckLoaikythi==1) { // Kỳ thi tôi đã đăng ký
		$checkloai1 ="checked";
		//$Dieukien .= 'AND(1)';
		$sql ='SELECT A.MaKythi,B.Tenkythi,B.Trangthai,DATE_FORMAT(B.Tungay,"%d/%m/%Y"),DATE_FORMAT(B.Toingay,"%d/%m/%Y"), 
				DATE_FORMAT(B.Handangky,"%d/%m/%Y")	FROM cet_student_cathi A JOIN cet_kythi B 
				ON (A.Makythi = B.Makythi)
				WHERE username ="'.$username.'" GROUP BY A.Makythi';
		//stop($sql);
	}
	else {
		if ($ckLoaikythi==3){ // Tất cả các Kỳ thi 
		$checkloai3 ="checked";
		$sql ='SELECT MaKythi,Tenkythi,Trangthai,DATE_FORMAT(Tungay,"%d/%m/%y"),DATE_FORMAT(Toingay,"%d/%m/%y"), DATE_FORMAT(Handangky,"%d/%m/%y") 
			   FROM cet_kythi WHERE (Taocathi=1) ';

		
		}
		else  {// kỳ thi mới mở - có thể đăng ký
		$checkloai2 ="checked";
		$sql ='SELECT MaKythi,Tenkythi,Trangthai,DATE_FORMAT(Tungay,"%d/%m/%Y"),DATE_FORMAT(Toingay,"%d/%m/%Y"), DATE_FORMAT(Handangky,"%d/%m/%Y") 
			   FROM cet_kythi WHERE (Trangthai = 0)AND(Taocathi=1) AND Makythi NOT IN (SELECT MaKythi FROM cet_student_cathi WHERE username ="'.$username.'" GROUP BY Makythi)';
		
		//stop($sql);
		}
	}		

	
	
	
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc Kỳ thi :' . $sql);	 exit;	}
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
	
	echo '<table border="0"><tr height "'.$Height1.'"><td td width ="55%">
	  Kỳ thi Tôi đã đăng ký<input type ="radio" name ="ckLoaikythi" value ="1" '.$checkloai1.' onchange ="this.form.submit()" onchange="JavaScript:Xoachitiet();">
	- Kỳ thi mới mở: <input type ="radio" name ="ckLoaikythi" value ="2"  '.$checkloai2.' onchange ="this.form.submit()" onchange="JavaScript:Xoachitiet();"> 
	- Tất cả Kỳ thi: <input type ="radio" name ="ckLoaikythi" value ="3"  '.$checkloai3.' onchange ="this.form.submit()" onchange="JavaScript:Xoachitiet();"></td><td width ="20%"><small><i>(Số kỳ thi:['.$Tongso_hoso.']'.($Tongso_hoso<=0?" - bạn chưa đăng ký đơt thi nào":"").')</small></td>';
	echo '<td width="5%">Trang: </td><td width="4%"><input type ="text" value ="'.$page.'" name ="page" style="width:100%" onchange="this.form.submit();"></td>';
	echo '<td width="2%"><input type ="submit" value =">" name ="next" style="width:100%" '.$gonextpage.'></td>';
	echo '<td width="2%"><input type ="submit" value =">>" name ="next" style="width:100%" '.$gonextpage.'></td>';
	echo '<td width="2%"><input type ="submit" value ="<" name ="next" style="width:100%" '.$goprepage.'></td>';
	echo '<td width="2%"><input type ="submit" value ="<<" name ="next" style="width:100%" '.$goprepage.'></td>';

	echo'<td width="1%">/</td><td><input type="text" name ="Page_total" value ="'.$Page_total.'" style="width:85%" readonly ="readonly" ></td>';

	echo'</tr></table>';
		
	echo '<div style="width: 100%; height:'.$div_height.'px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	echo '<table class ="ext1" width="100%" border="1">'; 
	
	echo '<tr height="40px" ><td width="60px" align="center"><b>STT</td>
		<td width="90px" align="center"><b>Mã Kỳ thi</td>
		<td width="400px"><b>Tên Kỳ thi</td>
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


//me('466: ' . $code.','.$code1.','.$Makythi.','.$Makythi_old.','.$Chitiet.','.$Chitiet1);
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
//--------------------------------------form đăng ký ----------------
if(trim($Makythi)!=""){	// sửa
//--------- Xử lý các tình trạng form nhập dữ liệu--------------
if(0){
	print '<br><hr><br> <b><i> --- Bạn không thể đăng ký đợt thi này !! </i></b>';
	return;
}
//--- Đọc dữ liệu từ csdl ---------------

if($Makythi_old!=$Makythi)
{ // Chưa nhập dữ liệu sửa, --> đọc từ CSDL
	
	$sql = 'SELECT MaKythi, TenKythi, Mota, DATE_FORMAT(Tungay,"%d/%m/%Y"),DATE_FORMAT(Toingay,"%d/%m/%Y"), DATE_FORMAT(Handangky,"%d/%m/%Y"), 
			Trangthai, Socathi,  Taocathi FROM cet_kythi 
			WHERE Makythi = "'.$Makythi.'" ';
	//me($sql);
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
//--- -------------------- Thông tin kỳ thi---------------		
print '<hr>';
$div_height1 = '540'; //height:'.$div_height1.'px; 
print '<div style="width: 100%; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';

	print'<fieldset><legend><b>Thông tin Kỳ thi</b></legend>';
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt" cellpading="0" cellspacing="0">';
	
	print '<tr><td width="12%" height ="'.$Height.'">Mã Kỳ  thi : </td>
		<td width="13%"> <input type = "textbox"  name = "MaKythi"  value = "'. $Makythi .'" style="height:'.$Height1.';font-size: 12pt" size ="10" readonly ="readonly"></td>
		
	    <td width="11%" >Tên Kỳ  thi :</td><td colspan="4"> <input type = "textbox" name = "Tenkythi1" value="'.$Tenkythi.'" style="height:'.$Height1.';width:100%;font-size: 12pt" readonly ="readonly"></td>
		
	</tr>';
	$TungayT = ($Tungay);
	print '<tr><td height ="'.$Height.'">Ngày thi từ : </td><td>
		   <input type = "Text"  name = "Tungay"   value = "'. $TungayT .'" style="width: 147px; height:'.$Height1.';font-size: 12pt" size ="25" readonly ="readonly"></td>
		   <td >Tới ngày : </td><td width="13%"><input type = "Text"  name = "Toingay"  value = "'. $Toingay .'" style="width: 147px; height:'.$Height1.';font-size: 12pt" size ="25" readonly ="readonly"></td>
		   <td  width="23%" align="right"> 
		   Hạn đăng ký : <input type = "TEXT"  name = "Handangky"  value = "'. $Handangky .'" style="width: 147px; height:'.$Height1.';font-size: 12pt" size ="25" readonly ="readonly"></td>
			<td width="10%" >Trạng thái:</td><td> '.cet_List_status($link,$Trangthai,'disabled').' </td></tr>';
			
	print '<tr><td  height ="'.$Height. '" >Mô tả Kỳ  thi:   </td><td colspan="6"> <textarea  rows ="2" name ="MotaKythi" style="width:100%;font-size: 12pt" readonly ="readonly">'.$Mota.'</textarea></td></tr>';		
	print'</table>';
	//print '</fieldset>';
	//--------------------------Thông tin ca  thi-------------------------
	//print'<br><div class="rowdiv" style="clear:both;width:100%">
	//print '<fieldset class="styleset"> 	<legend><b>Thời gian ca thi</legend>';
	print '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<tr height ="0">
	       <td width="10%" align = "center">
		   <td width="5%" align = "center"></td><td width="5%"></td><td width="5%"></td>
		   <td width="5%" align = "center"></td><td width="5%"></td><td width="5%"></td>
		   <td width="5%" align = "center"></td><td width="5%"></td><td width="5%"></td>
		   <td width="5%" align = "center"></td><td width="5%"></td><td width="5%"></td>
		   </tr>';
	$sqlkyca = 'SELECT cathi, DATE_FORMAT(ngaythi, "%d/%m/%y"), giothi FROM cet_kythi_cathi WHERE MaKythi ="'.$Makythi.'" ORDER by Cathi';
	
	$resultkyca = mysql_query($sqlkyca, $link);
	
	if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
	$Socathi = mysql_num_rows($resultkyca);
	for($k=1; $k<=$Socathi; $k++){
		$bgiothi = "giothi".$k; 
		$bngaythi = "ngaythi".$k;
		$rowkc = mysql_fetch_row($resultkyca);
		$ngaythi = $rowkc [1]; $giothi = $rowkc [2];
		if($k==1)print '<tr height ="'.$Height.'"><td>Thời gian ca thi:</td>';
		else if($k%4==1) print '<tr height ="'.$Height.'"><td></td>';
		
		print '<td align = "right">ca '.$k.':</td>
				<td> <Input type ="text" name ="'.$bngaythi.'" Id ="'.$bngaythi.'" value ="'.$ngaythi.'" readonly ="readonly" size ="8"  style ="text-align: center;"> </td>
				<td><Input type ="text" name ="'.$bgiothi.'"  Id ="'.$bgiothi.'" value ="'.$giothi.'" readonly ="readonly" style="text-align: center;font-family: Times New Roman; font-size: 12pt" size ="6"> </td>';
		if($k%4==0) print '</tr>';
				
	}
	
	if($Socathi%4)print '</tr>';
	print'</table>';
	
	print '</fieldset></div>';
	//------------------------------------------------------------------------------------------
	
	$checkTrangthai  = cet_check_Trangthai_Dangky($link, $username,$Makythi);
	$Modangky =0; $Dongdangky = 1; $Dathi=2; $Dahuy =4; $Dongcapnhat = 3; $Gankythikhac = 10; $Dadangky = 11;
	
	//me('624 code:'.$checkTrangthai); return;
	
	if(($checkTrangthai ==$Modangky)||($codeOK=="Sửa đăng ký")){// --------------------------------còn mở đăng ký ----------------------
		//----------------------------------------Địa điểm ------------------
		print'<br><div class="rowdiv" style="clear:both;width:100%">
		<fieldset class="styleset">	<legend><b>Chọn Địa điểm thi - Ca thi (<i>mỗi kỳ thi chỉ được chọn 1 điểm thi với các ca thi (dự kiến)được phép tại điểm thi đó</i>)</legend>';
		$hcolor =  Get_name($link, "cet_table_color","giatri","mathamso", "heading1");	
		print '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 13pt" cellpading="0" cellspacing="1">';
		print '<tr><td width="5%"></td><td width="5%"></td><td width="27%"></td><td width="57%"></td><td></td></tr>';
		print '<tr height ="'.$Height.'"  bgcolor="'.$hcolor.'" ><td colspan="2"><b>Mã</b></td><td><b> Tên (Điểm thi/Môn thi)</b></td><td><b>Chọn ca thi</b></td><td>Lệ phí</td></tr>';
		
		$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$Makythi.'"';
		$resultmt = mysql_query($sqlmt, $link);
		if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
		$Somonthi =  mysql_num_rows($resultmt);
		$socamon = array($Somonthi+1);
		for ($t=0; $t<=$Somonthi; $t++) $socamon[$t]=0;
		$sqldt = 'SELECT Makythi, cet_kythi_diadiem.Madiadiem, Tendiadiem, Diachi,Tongsothisinh FROM cet_kythi_diadiem join cet_diadiemthi on (cet_kythi_diadiem.Madiadiem =cet_diadiemthi.Madiadiem) WHERE MaKythi ="'.$Makythi.'"';
		$resultdt = mysql_query($sqldt, $link);
		if (!$resultdt) {	print 'Error: 2' . $sqldt;	 exit;	}
		$Sodiadiem =  mysql_num_rows($resultdt);
		if($Sodiadiem==0) { thongbaoloi( "Chưa có điểm thi!"); exit;}	
		$socadiadiem = array($Sodiadiem+1);
		
		for ($t=0; $t<=$Sodiadiem; $t++) $socadiadiem[$t]=0;
		//$bcolor1 = "#DEDEDE"; $bcolor2 = "#F0F0F0";
		$bcolor1 =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolor1");
		$bcolor2 =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolor2");
		$bcolorA =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolorA");
		$bcolorB =  Get_name($link, "cet_table_color","giatri","mathamso", "bcolorB");
		
		for($k=1; $k<=$Sodiadiem; $k++){
		
			if($k % 2==0) $bcolor = $bcolor1; else  $bcolor = $bcolor2;
			$socadiadiem[k] = 0; 
			$rowdt =  mysql_fetch_row($resultdt);
			$bDiemthi = "Madiemthi".$k; $Madiemthi = $rowdt[1];
			
			$Tendiemthi = $rowdt[2];$Diachi = $rowdt[3]; $Maxsothisinh = $rowdt[4];
			$btongdiemca = "Diemca".$k;
			
			print '<tr height ="'.$Height.'" bgcolor="'.$bcolor.'"><td colspan="2">
				<Input type ="Radio" name ="SelDiadiem" value ="'.$Madiemthi.'" onclick="setVisibility('.$k.');">'.$Madiemthi.'</td>
				<td colspan="2">'.$Tendiemthi.' ( địa chỉ: '.$Diachi.'<i>- tối đa :  '.$Maxsothisinh.' thí sinh </i>)</td>';
				
			
			$ncheck =0;
			$mcheck=0;
			
			print '<td></td></tr>';
		
		//------------------------Ghép môn----------------
		print '<tr><td><td colspan ="4">';
		$divname = "DD".$k;
		print '<fieldset id ="'.$divname.'" class="styleset" style="width: 100%;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
		
		print '<table border ="0"><tr><td width ="8%"></td><td width ="25%"></td><td width ="60%"></td> <td></td></tr>';
				
				$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi,Luachon, Lephithi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$Makythi.'"';
				
				$resultmt = mysql_query($sqlmt, $link);
				if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
				$Somonthi =  mysql_num_rows($resultmt);
				if($Somonthi==0) { thongbaoloi( "Chưa có môn thi!"); exit;}	
				
				if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
				
				for($km=1; $km<=$Somonthi; $km++){
					if($km%2) $bcolorx = $bcolorA; else $bcolorx = $bcolorB;
					$rowmt =  mysql_fetch_row($resultmt);
					$bMonthi = "Mamonthi".$k."_".$km; $Mamonthi = $rowmt[1];
					$bSelMonthi = "selMamonthi".$k."_".$km;
					$Tenmonthi = $rowmt[2];
					$btongmonca = "Monca".$km;
					$option = $rowmt[3]; $Lephithi  = $rowmt[4]; 
					if($option=="0") $selcheckmt ='checked onclick="return false;"'; else $selcheckmt ='onclick = setcathi_mon('.$k.','.$km.'); ';
					
					print '<tr height ="'.$Height.'">
					<td align="left" bgcolor="'.$bcolorx.'"><input type ="checkbox" Id ="'.$bSelMonthi.'" name ="'.$bSelMonthi.'" value ="'.$Mamonthi.'" style="width:17px;height:17px;" ' .$selcheckmt.'  >&nbsp;
					'.$Mamonthi.'</td>
					<td bgcolor="'.$bcolorx.'">&emsp;'.$Tenmonthi.'  </td>
					<td bgcolor="'.$bcolorx.'" colspan="1">';
					
					$sqlmonca = 'SELECT cathi, checked FROM cet_mon_cathi WHERE MaKythi ="'.$Makythi.'" AND Madiemthi ="'.$Madiemthi.'" AND maMonthi ="'.$Mamonthi.'"  ORDER by Cathi';
					$resultmc = mysql_query($sqlmonca, $link);
					//print $sqlmonca; exit;
					if (!$resultmc) {	print 'MySQL Error: 4' . $sqlmc;	 exit;	}
					$ncheck =0;
					print '<table border="0" cellpading="0" cellspacing="0"><tr>';
					for($i=1; $i<$Socathi; $i++)print '<td width="13%"></td>';
					print '<td ></td></tr><tr>';
					for($j=1; $j<=$Socathi; $j++){
						print '<td>';
						$rowmc = mysql_fetch_row($resultmc);
						$bmoncathi = "DiemMonCa".$k.'_'.$km; 
						$sodangky = Get_count_dangky($link, $Makythi,$Madiemthi,$j);
						if($rowmc[1]==0) {
							$check = "disabled"; //print '&emsp;&emsp;&emsp;';
							print 'ca '.$j .'&nbsp;&nbsp;--';
							$div1 = "DiemMonCa".$k.'_'.$km.'_'.$j;
							print '<fieldset id ="'.$div1 .'" class="styleset">';
							print ' <input type ="radio" name ="'.$bmoncathi.'" value ="'.$j.'" >';
							print '</fieldset>';
							print '<script>document.getElementById("'.$div1 .'").style.display = "none";</script>';
						}
						else {$check = " "; $ncheck ++; $socadiadiem[k]++;$socamon[$km]++;
						
								//$bmoncathi = "DiemMonCa".$k.'_'.$km; 
								//$sodangky = Get_count_dangky($link, $Makythi,$Madiemthi,$j);
								//me('s:'.$sodangky);
								
								print '<input type ="hidden" name = "sodangky" value ="'.$sodangky.'" size ="1">';
								if($sodangky  < $Maxsothisinh)// vẫn còn có thể đăng ký
									print 'ca '.$j.' <Input type ="radio" name ="'.$bmoncathi.'" value ="'.$j.'" '.$check.'  onchange = setmonthi('.$k.','.$km.')>&nbsp;&nbsp;&nbsp;';
								else {//hết chỗ đăng ký
									print 'ca '.$j.' <Input type ="radio" name ="'.$bmoncathi.'" Id ="'.$bmoncathi.'" value ="'.$j.'" '.$check.'  onclick = fullsetmonthi('.$k.','.$km.','.$j.');>&nbsp;&nbsp;&nbsp;';
								
								}
							}
						print '</td>';
						}
					print '</tr>';
					print '</table>';
					//print '<Input type ="text" Id ="'.$btongmonca.'"  value = "'.$ncheck.'" size="5">';
					print '<Input type ="hidden" name ="'.$bMonthi.'" value = "'.$Mamonthi.'" size="5">';
					print '</td>';	
					print '<td bgcolor="'.$bcolorx.'">'.$Lephithi.' đ </td>';
					print '</tr>';
		}
		print '</table>';print '</fieldset>';
		print  '<script>document.getElementById("'.$divname.'").style.display = "none";</script>';
				//------------------------------------------------------
		print '</tr>';			
		}
		print'</table>';
		
		print '<Input type ="hidden" name ="Sodiemthi" value = "'.$Sodiadiem.'" size="5">';	
		//print '<Input type ="hidden" name ="newform" value = "1" >';	
		
	}
	else 
		if($checkTrangthai ==$Gankythikhac){
			print '<br>---<b><i>Bạn đã đăng ký Kỳ thi có thời gian thi gần nên không thể đăng ký kỳ thi này!!</i></b>';
		}
		else
		if($checkTrangthai ==$Dadangky){
			print '<br>---<b><i>Bạn đã đăng ký kỳ thi này!!</i></b>';
		}
		else
		if($checkTrangthai ==$Dongdangky){
			print '<br>---<b><i>Kỳ thi đã đóng thời gian đăng ký!!</i></b>';
		}
		else
		if($checkTrangthai ==$Dathi){
			print '<br>---<b><i>Kỳ thi đã thi, bạn không thể đăng ký!!</i></b>';
		}
		else{ print '<br>---<b><i>Kỳ thi đã hết thời gian đăng ký!!</i></b>';
		}
	//--------------lưu giá trị để kiểm tra----------------------------------
	//-------------------Các địa điểm------------------------------
	$sqldt = 'SELECT Makythi, cet_kythi_diadiem.Madiadiem, Tendiadiem, Tongsothisinh FROM cet_kythi_diadiem join cet_diadiemthi on (cet_kythi_diadiem.Madiadiem =cet_diadiemthi.Madiadiem) WHERE MaKythi ="'.$Makythi.'"';
	$resultdt = mysql_query($sqldt, $link);
	if (!$resultdt) {	print 'Error: 2' . $sqldt;	 exit;	}
	$Sodiadiem =  mysql_num_rows($resultdt);
	if($Sodiadiem==0) { thongbaoloi( "Chưa có điểm thi!"); exit;}	
	
	for($k=1; $k<=$Sodiadiem; $k++){
		$rowdt =  mysql_fetch_row($resultdt);
		$bDiemthi = "Madiemthi".$k; $Madiemthi = $rowdt[1];
		$btongdiemca = "Diemca".$k;
		$Tongsothisinh = $rowdt[2];
		print '<Input type ="hidden" Id ="'.$bDiemthi.'" name = "'.$bDiemthi.'" value = "'.$Madiemthi.'" size="5">';
		//print '<Input type ="text" Id ="'.$btongdiemca.'"  value = "'.$ncheck.'" size="5">&nbsp;';
		print '<Input type ="hidden" Id ="'.$btongdiemca.'"  value = "'.$socadiadiem[k].'" size="5">&nbsp;';
	}
	print '<br>';
	//------------------------Các môn thi --------------------
	$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$Makythi.'"';
	$resultmt = mysql_query($sqlmt, $link);
	if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
	$Somonthi =  mysql_num_rows($resultmt);
	for($m=1; $m<=$Somonthi; $m++){
		$rowmt = mysql_fetch_row($resultmt);
		$btongmonca = "Monca".$m;
		$bMonthi = "Mamonthi".$m; $Mamonthi = $rowmt[1];
		print '<Input type ="hidden" Id ="'.$bMonthi.'" value = "'.$Mamonthi.'" size="3">';
		print '<input type = "hidden" Id = "'.$btongmonca.'" value ="'.$socamon[$m].'" size ="3">';
		
	}
	print '<Input type ="hidden" Id ="Somonthi" name ="Somonthi" value = "'.$Somonthi.'" size="3">';
	print '<Input type ="hidden" Id ="Socathi" name ="Socathi" value = "'.$Socathi.'" size="3">';
	print '</div>';
	//------------------------------/Đia điểm thi - ca thi----------------------------------------------
	
//----------------------------------------------	
	
	print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '&nbsp;&nbsp;<input name="Sendback" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	echo '<input type="hidden" name = "Makythi_old" value="'.$Makythi.'">'; // Mã mới == Mã cũ --> sửa , ngược lại mới nạp HS  từ csdl
	print '<input type="hidden" name = "Makythi" value="'.$Makythi.'">';
	echo '<input name="Sendcheck" type="hidden" value ="">';
	echo '<script>cet_Dangkythi.elements["Sendback"].focus();</script>';
	if($checkTrangthai!=$Modangky){	print '<script>cet_Dangkythi.Send.disabled = true;</script>';}
	
	
}
	echo '</form>';
	
	mysql_free_result($result);

?> 

</body>
</html> 