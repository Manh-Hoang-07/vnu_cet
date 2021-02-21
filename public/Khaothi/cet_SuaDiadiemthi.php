<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: SuaDiadiemthi.php
// Chức năng: Sửa địa điểm thi
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

<title>Cập nhật địa điểm thi</title>
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
	if((document.cet_SuaDiadiemthi.MaDiadiem.value=="0")||(document.cet_SuaDiadiemthi.MaDiadiem.value==""))	{
		alert('Mã điểm thi chưa hợp lệ!'); 
		document.cet_SuaDiadiemthi.MaDiadiem.focus(); 
		return false;
		}
	if((document.cet_SuaDiadiemthi.TenDiadiem.value=="0")||(document.cet_SuaDiadiemthi.TenDiadiem.value==""))	{
		alert('Tên điểm thi chưa hợp lệ!'); 
		document.cet_SuaDiadiemthi.TenDiadiem.focus(); 
		return false;
		}	
	if((document.cet_SuaDiadiemthi.Diachi.value=="0")||(document.cet_SuaDiadiemthi.Diachi.value==""))	{
		alert('Địa chỉ điểm thi chưa hợp lệ!'); 
		document.cet_SuaDiadiemthi.Diachi.focus(); 
		return false;
		}		
	if((document.cet_SuaDiadiemthi.Tongsothisinh.value=="0")||(document.cet_SuaDiadiemthi.Tongsothisinh.value==""))	{
		alert('Tổng số thí sinh điểm thi chưa hợp lệ!'); 
		document.cet_SuaDiadiemthi.Tongsothisinh.focus(); 
		return false;
		}	
	return true;
	
}	
function check(){

	if (check1()) 
	{
		
		document.cet_SuaDiadiemthi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_SuaDiadiemthi.submit();
		}
}
function check2(){
	var result = confirm("Bạn muốn hủy địa điểm thi ?");
    if(result)  {
                document.cet_SuaDiadiemthi.Sendcheck.value="Ghi HủyOK"; 
				document.cet_SuaDiadiemthi.submit();
              }
    }
function check3(){
	var result = confirm("Bạn muốn khôi phục lại địa thi ?");
    if(result)  {
                document.cet_SuaDiadiemthi.Sendcheck.value="Ghi khôi phụcOK"; 
				document.cet_SuaDiadiemthi.submit();
              }
    }
function check4() {
	var sp =0, sts =0, tongts =0;
	if(document.cet_SuaDiadiemthi.Tongsophong.value!="") sp  = parseInt(document.cet_SuaDiadiemthi.Tongsophong.value,10);
	if(sp<=0) {alert('Số phòng thi chưa phù hợp !'); document.cet_SuaDiadiemthi.Tongsophong.focus(); }
	if(document.cet_SuaDiadiemthi.SoTSphong.value!="") sts  = parseInt(document.cet_SuaDiadiemthi.SoTSphong.value,10);
	
	tongts = sp*sts;
	document.cet_SuaDiadiemthi.Tongsothisinh.value=tongts;
}
function check5() {  
	var sp =0, sts =0, tongts =0;
	if(document.cet_SuaDiadiemthi.Tongsophong.value!="") sp  = parseInt(document.cet_SuaDiadiemthi.Tongsophong.value,10);
	
	if(document.cet_SuaDiadiemthi.SoTSphong.value!="") sts  = parseInt(document.cet_SuaDiadiemthi.SoTSphong.value,10);
	if(sts<=0) {alert('Số thí sinh /phong chưa phù hợp !'); document.cet_SuaDiadiemthi.SoTSphong.focus(); }
	tongts = sp*sts;
	document.cet_SuaDiadiemthi.Tongsothisinh.value=tongts;
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
	$Height  =29; 
	$Height1 =26;
	$Height2 =24;
	$Border=0;
//-----------------------/Các hàm-------------------------------------------
//------------------------------------------------------------------------------------------------------------
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	if(empty($username)) {thongbaoloi1("Bạn chưa đăng nhập hoặc phiên làm việc đã hết!"); exit;}
	
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
		
	
	if(empty($username)) {thongbaoloi1('Bạn chưa đăng nhập hoặc phiên làm việc đã hết!');    exit;	}

//------------------------------------------------------------------------------------------------------------
	
//------------------Cập nhật địa điểm thi -----------------------------------------------
	$codeOK = $_POST['Sendcheck'];
	
	if($codeOK =="Ghi nhậnOK"){ 
		$MaDiadiem = trim($_POST['MaDiadiem']);
		$TenDiadiem =$_POST['TenDiadiem'];
		$Tongsothisinh = $_POST['Tongsothisinh'];
		$Diachi = $_POST['Diachi'];
		$Ghichu = $_POST['Ghichu'];
		$Tongsophong= $_POST['Tongsophong'];
		$SoTSphong= $_POST['SoTSphong'];
		$Macumthi = $_POST['Macumthi'];
		$sql = 'UPDATE cet_diadiemthi SET  	TenDiadiem = "'. $TenDiadiem .'", TongSothisinh = '.$Tongsothisinh .', Diachi ="'.$Diachi .'",Ghichu= "'.$Ghichu.'",
				sophong= '.$Tongsophong.', SoTS_Phong= '.$SoTSphong.',Macumthi ="'.$Macumthi.'" 		
				WHERE MaDiadiem = "'.$MaDiadiem.'"';
		
		
		$result = mysql_query($sql, $link);
			
		//----hết Ghi Môn thi ------	
					
		
		//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$MaDiadiem.'","' .$datetime.'","Sửa", "Cập nhật Môn thi"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
		//-----------Xóa các biến nhập dữ liệu-----------------
		
		
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi(' đã Cập nhật! ');	
	}//Hết ghi dữ liệu 
	//----------------------------------------------------------------------
	if($codeOK =="Ghi HủyOK"){ 
		
		$MaDiadiem = $_POST['MaDiadiem'];
		$sql = 'UPDATE cet_diadiemthi SET  	Trangthai =  1	WHERE MaDiadiem = "'.$MaDiadiem.'"';
		$result = mysql_query($sql, $link);
		//print $sql; 
		
			
		//----hết Ghi Môn thi ------	
					
		
		//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$MaDiadiem.'","' .$datetime.'","Hủy", "Hủy địa điểm"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
		//-----------Xóa các biến nhập dữ liệu-----------------
		
		
		setcookie('name',$username,time()+3000);
		setcookie('pass',$password,time()+3000);
		thongbaoloi('đã Hủy địa điểm !!');	
	}//Hết ghi dữ liệu 
//-----------------------------------------------------------
//----------------------------------------------------------------------
	if($codeOK =="Ghi khôi phụcOK"){ 
		
		$MaDiadiem = $_POST['MaDiadiem'];
		$sql = 'UPDATE cet_diadiemthi SET  	Trangthai =  0	WHERE MaDiadiem = "'.$MaDiadiem.'"';
		$result = mysql_query($sql, $link);
		//print $sql; 
		
			
		//----hết Ghi Môn thi ------	
					
		
		//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$MaDiadiem.'","' .$datetime.'","Khôi phục", "khôi phục địa điểm"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	me('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
		//-----------Xóa các biến nhập dữ liệu-----------------
		
		
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		me('đã khôi phục địa điểm thi!');	
	}//Hết ghi dữ liệu 
//-----------------------------------------------------Tạo form dữ liệu -------------------------------------------				
//------------------Tiêu đề trang------------------------------	----------------------------------------------
print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
print '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp; Cập nhật Địa điểm  thi</td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname .'('.$username .') </i></td></tr>';
print '</table>';
print '<form action="cet_SuaDiadiemthi.php" method="post" name ="cet_SuaDiadiemthi" enctype ="multipart/form-data">' ;

print '<hr>';
//------------------//Tiêu đề trang------------------------------
	$code = htmlspecialchars($_POST['Send']); 
	
	$sql ='SELECT  MaDiadiem, TenDiadiem, TongSothisinh,Diachi, Trangthai, Ghichu, Macumthi 
			FROM cet_diadiemthi  WHERE (1)';
	
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc diem thi :' . $sql);	 exit;	}
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
	
	print '<table border="0"><tr><td width ="75%"><small><i>(Tổng số điểm thi:['.$Tongso_hoso.'];</small></td>';
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
		<td width="90px" align="center"><b>Mã Điểm thi</td>
		<td width="200px"><b>Tên Điểm thi</td>
		<td width="100px" align="center"><b>Tổng Số TS</td>
		<td width="350px"><b>Địa chỉ</td>
		<td width="70px" align="center"><b>Trạng thái</td>
		<td width="80px" align="center"><b>Ghi chú</td> 
	</tr>';
	//-----------------Lặp với mỗi Môn thi có trong csdl---------------
	for($id=1; $id <= $lineperpage*($page-1); $id++) 
		$row = mysql_fetch_row($result);	

	for($k=$id; ($k < $id+$lineperpage)&&($k<=$Tongso_hoso); $k++){ //$Tongso_hoso
	
		$row = mysql_fetch_row($result); 
		$MaDiadiem=$row[0];
		$TenDiadiem=$row[1];
		$TongSothisinh=$row[2];
		$Diachi = $row[3];
		
		if($row[4]==0) $Trangthai="Active";
		else if($row[4]==1)$Trangthai="deActive";
		else $Trangthai=" --- ";
		
		$Ghichu = $row[5];
		$Macumthi  = $row[6];
		
		if($k % 2 ==1) $rcolor = "#C0C0C0"; else $rcolor= "#3399FF";
		print '<tr bgcolor="'.$rcolor.'"><td align ="center">'.$k.'</td><td align ="center">
			<input type="submit" class="button" name="Chitiet1" value ="'.$MaDiadiem.'" style="background-color:'.$rcolor.';width:100%;height:'.$Height2.'"  title= "Nhấn để sửa"></td>
			<td>'.$TenDiadiem.'</td>
			<td align="center">'.$TongSothisinh.'</td>
			<td>'.$Diachi.'</td>
			<td align="center">'.$Trangthai.'</td>
			<td>'.$Ghichu.'</td>
			</tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	
	print '</table>'	;	
	print'</div>'	;	
	
//-------------------In chi tiết Môn thi---------------------------------

//-------------Xóa Môn thi--------------------------------------------------------------------------------

if($code =="Xóa Môn thi"){ 
	$sql= 'UPDATE hoso SET TrangthaiKT =-1		WHERE (Mahoso="'.$Mahoso.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {
  	 	thongbaoloi('Lỗi Xóa Môn thi: ' . mysql_error());
   	 	exit;
		}
		

//--------Cập nhật history---------------
	$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
	$sql = 'INSERT INTO cet_history (Mahoso,Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
		    VALUE("'.$Mahoso.'","' .$datetime .'",-1, "Xóa Môn thi"'.',"' .$username.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi ghi lịch  sửa cập nhật :' . $sql);	 exit;	}	
	$Mahoso="";
}
//
//-------------/Xóa--------------------	
//thongbaoloi('Lỗi Xóa Môn thi: ' . $code.','.$code1);


//-------------------------------------------------------------------------------------------------------------
	$Chitiet = htmlspecialchars($_POST['Chitiet1']); $code1 =$_POST['Sendback'];
	if($Chitiet!="")$Mahoso=$Chitiet;
	if($code1 =="Quay lại"){ $Mahoso=$Chitiet="";}
	if($code1 !="Quay lại"){ 
	if(trim($Chitiet)==""){ 
		$Mahoso= $_POST['Mahoso'];
		$Chitiet =$Mahoso;
		}
	}

if(trim($Mahoso)!=""){	// sửa
//--------- Xử lý các tình trạng form nhập dữ liệu--------------

//--- Đọc dữ liệu từ csdl ---------------
//

$Mahoso_old = $_POST['Mahoso_old'];

if($Mahoso_old!=$Mahoso)
{ // Chưa nhập dữ liệu sửa, --> đọc từ CSDL
	
	$sql = 'SELECT MaDiadiem, TenDiadiem, TongSothisinh, Diachi, Trangthai, Ghichu, Sophong, SoTS_phong,Macumthi 
			FROM cet_diadiemthi  WHERE MaDiadiem = "'.$Mahoso.'" ';
	
	
	$result = mysql_query($sql, $link);
			if (!$result) {	thongbaoloi('Lỗi đọc Môn thi :' . $sql);	 exit;	}
			
	
	if(mysql_num_rows($result)>=1) $checksua =1; 		
	$row = mysql_fetch_row($result);			

		$MaDiadiem=$row[0];
		$TenDiadiem=$row[1];
		$TongSothisinh=$row[2];
		$Diachi = $row[3];
			
		if($row[4]==0) $Trangthai="Active";
		else if($row[4]==1)$Trangthai="deActive";
		else $Trangthai=" --- ";
		
		$Ghichu = $row[5];
		$Tongsophong= $row[6];$SoTSphong= $row[7];
		$Macumthi = $row[8];
		//me('cum:'.$Macumthi);
		$TongSothisinh = $Tongsophong *$SoTSphong;
	//me('t:'.$TongSothisinh);
	
	
}
//--- --------------------Tạo form sửa ---------------		
print'<hr>';
'<br><div class="rowdiv" style="clear:both;width:90%">
	<fieldset>
	<legend><b>Cập nhật  thi</b></legend>';
	
	print '<fieldset> <legend><b>Cập nhật Địa điểm thi</b></legend>';
	
		
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">
	
	<tr><td width="20%" height ="'.$Height.'">Mã điểm thi : </td>
		<td> <input type = "textbox"  name = "MaDiadiem"  value = "'. $MaDiadiem .'" style="height:'.$Height1.';font-size: 12pt" readonly ="readonly">
		&emsp;&emsp;&emsp;Cụm thi:'.cet_List_cumthi($link,"Macumthi", $Macumthi) ;
	print'</td>
	</tr>';
	print '<tr><td height ="'.$Height.'">Tên Điểm thi :</td><td> <input type = "textbox" name = "TenDiadiem" value="'.$TenDiadiem.'" style="height:'.$Height1.';width:100%;font-size: 12pt"></td></tr>';
	print'<tr><td  height ="'.$Height. '" >Địa chỉ điểm thi:   </td><td> <textarea  rows ="2" name ="Diachi" style="width:100%;font-size: 12pt" >'.$Diachi.'</textarea></td></tr>';		
	
	print '<tr><td height ="'.$Height.'">Tổng số phòng thi:</td><td> <input type = "textbox"  name = "Tongsophong"  value = "'. $Tongsophong .'" style="height:'.$Height1.';font-size: 12pt" size="8" onchange = "JavaScript:check4();">
			&nbsp;&nbsp;&nbsp;&nbsp;Số thí sinh /phòng <input type = "textbox"  name = "SoTSphong"  value = "'. $SoTSphong .'" style="height:'.$Height1.';font-size: 12pt" size="8" onchange = "JavaScript:check5();"> 
			&nbsp;&nbsp;&nbsp;&nbsp;Tổng số thí sinh:<input type = "textbox"  name = "Tongsothisinh"  value = "'. $TongSothisinh .'" style="height:'.$Height1.';font-size: 12pt" size="8" readonly ="readonly"></td></tr>';
		
	
	print'<tr><td  height ="'.$Height. '" >Ghi chú:   </td><td> <textarea  rows ="2" name ="Ghichu" style="width:100%;font-size: 12pt" >'.$Ghichu.'</textarea></td></tr>';		
	
	print'</table>';
	
	
	print'<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	if($Trangthai =="Active")
		print'&nbsp;&nbsp;<input name="Delete" type="button" onclick ="return check2();" value = "Hủy địa điểm" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	else 
		print'&nbsp;&nbsp;<input name="Restore" type="button" onclick ="return check3();" value = "Khôi phục địa điểm" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print'<input type="hidden" name = "Mahoso_old" value="'.$Mahoso.'">'; // Mã mới == Mã cũ --> sửa , ngược lại mới nạp HS  từ csdl
	print'&nbsp;&nbsp;<input name="Sendback" type="submit"  value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	
	print'<input name="Sendcheck" type="hidden" value =" ">';
	print'<script>cet_SuaDiadiemthi.elements["Sendback"].focus();</script>';
print'</table>';
}//Sửa
	print'</form>';
	
	mysql_free_result($result);

?> 

</body>
</html> 
