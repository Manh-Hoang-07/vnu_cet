<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: SuaMonthi.php
// Chức năng: Sửa môn thi
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

<title>Cập nhật môn thi</title>
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
	if((document.cet_SuaMonthi.MaMonthi.value=="0")||(document.cet_SuaMonthi.MaMonthi.value==""))	{
		alert('Mã môn thi chưa hợp lệ!'); 
		document.cet_SuaMonthi.MaMonthi.focus(); 
		return false;
		}
	if((document.cet_SuaMonthi.TenMonthi.value=="0")||(document.cet_SuaMonthi.TenMonthi.value==""))	{
		alert('Tên môn thi chưa hợp lệ!'); 
		document.cet_SuaMonthi.TenMonthi.focus(); 
		return false;
		}	
	if((document.cet_SuaMonthi.MotaMonthi.value=="0")||(document.cet_SuaMonthi.MotaMonthi.value==""))	{
		alert('Mô tả môn thi chưa hợp lệ!'); 
		document.cet_SuaMonthi.MotaMonthi.focus(); 
		return false;
		}		
	return true;
	
}	
function check(){
	
	if (check1()) 
	{
		
		document.cet_SuaMonthi.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_SuaMonthi.submit();
		}
}
function check2(){
	var result = confirm("Bạn muốn hủy môn thi ?");
    if(result)  {
                document.cet_SuaMonthi.Sendcheck.value="Ghi HủyOK"; 
				document.cet_SuaMonthi.submit();
              }
    }
function check3(){
	var result = confirm("Bạn muốn khôi phục lại môn thi ?");
    if(result)  {
                document.cet_SuaMonthi.Sendcheck.value="Ghi khôi phụcOK"; 
				document.cet_SuaMonthi.submit();
              }
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
	if($code =="Quay lại"){
		
	}
//---------------------------------------------------------
	if($codeOK =="Ghi nhậnOK"){ 
		$Mamonthi = $_POST['MaMonthi'];
		$TenMonthi = $_POST['TenMonthi'];
		$Hinhthucthi = $_POST['Hinhthucthi'];
		$MotaMonthi = $_POST['MotaMonthi'];
		$Ghichu = $_POST['Ghichu'];
		$Thoigianlambai = $_POST['Thoigianlambai'];
		$sql = 'UPDATE cet_monthi SET  	TenMonthi = "'. $TenMonthi .'", Hinhthucthi = '.$Hinhthucthi .', Mota ="'.$MotaMonthi .'",Ghichu= "'.$Ghichu.'", 
				Thoigianlambai = '.$Thoigianlambai.' WHERE MaMonthi = "'.$Mamonthi.'"';
		$result = mysql_query($sql, $link);
		//print $sql;exit;		
		//----hết Ghi Môn thi ------	
			
		//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$Mamonthi.'","' .$datetime.'","Sửa", "Cập nhật Môn thi"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
		//-----------Xóa các biến nhập dữ liệu-----------------
		
		//cet_log($link,$Mamonthi,"Sửa môn thi");
		
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi(' đã Cập nhật! ');	
	}//Hết ghi dữ liệu 
	//----------------------------------------------------------------------
	if($codeOK =="Ghi HủyOK"){ 
		
		$Mamonthi = $_POST['MaMonthi'];
		$sql = 'UPDATE cet_monthi SET  	Trangthai =  1	WHERE MaMonthi = "'.$Mamonthi.'"';
		$result = mysql_query($sql, $link);
		//echo $sql; 
		
			
		//----hết Ghi Môn thi ------	
					
		
		//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$Mamonthi.'","' .$datetime.'","Hủy", "Hủy Môn thi"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
		//-----------Xóa các biến nhập dữ liệu-----------------
		
		
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi('đã Hủy môn thi ');	
	}//Hết ghi dữ liệu 
//-----------------------------------------------------------
//----------------------------------------------------------------------
	if($codeOK =="Ghi khôi phụcOK"){ 
		
		$Mamonthi = $_POST['MaMonthi'];
		$sql = 'UPDATE cet_monthi SET  	Trangthai =  0	WHERE MaMonthi = "'.$Mamonthi.'"';
		$result = mysql_query($sql, $link);
		//echo $sql; 
		
			
		//----hết Ghi Môn thi ------	
					
		
		//--------Cập nhật history---------------
		$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
		$sql1 = 'INSERT INTO cet_history (Ma, Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
				VALUE("'.$Mamonthi.'","' .$datetime.'","Khôi phục", "khôi phục môn thi"'.',"' .$username.'")';
		//print $sql1;
		$result = mysql_query($sql1, $link);
		if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql1);	 exit;	}	
			
		//-----------Xóa các biến nhập dữ liệu-----------------
		
		
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi('đã khôi phục môn thi ');	
	}//Hết ghi dữ liệu 
//-----------------------------------------------------Tạo form dữ liệu -------------------------------------------				
//------------------Tiêu đề trang------------------------------	----------------------------------------------
echo '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
echo '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp; Cập nhật Môn thi</td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
echo '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname .'('.$username .') </i></td></tr>';
echo '</table>';
echo '<form action="cet_SuaMonthi.php" method="post" name ="cet_SuaMonthi" enctype ="multipart/form-data">' ;

echo '<hr>';
//------------------//Tiêu đề trang------------------------------
	$code = htmlspecialchars($_POST['Send']); 
	
	$sql ='SELECT MaMonthi,TenMonthi,Mota,Hinhthucthi,Trangthai,Ghichu  	FROM cet_monthi WHERE (1)';
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
	
	echo '<table border="0"><tr><td width ="75%"><small><i>(Tổng số môn thi:['.$Tongso_hoso.'];</small></td>';
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
		<td width="90px" align="center"><b>Mã Môn thi</td>
		<td width="200px" align="center"><b>Tên môn thi</td>
		<td width="100px" align="center"><b>Hình thức thi</td>
		<td width="350px" align="center"><b>Mô tả</td>
		<td width="70px" align="center"><b>Trạng thái</td>
		<td width="80px" align="center"><b>Ghi chú</td> 
	</tr>';
	//-----------------Lặp với mỗi Môn thi có trong csdl---------------
	for($id=1; $id <= $lineperpage*($page-1); $id++) 
		$row = mysql_fetch_row($result);	

	for($k=$id; ($k < $id+$lineperpage)&&($k<=$Tongso_hoso); $k++){ //$Tongso_hoso
	
		$row = mysql_fetch_row($result); 
		$MaMonthi=$row[0];
		$TenMonthi=$row[1];
		$Mota=$row[2];
		if($row[3]==1)$Hinhthucthi="Trắc nghiệm";
		else if($row[3]==2)$Hinhthucthi="Tự luận";
		else $Hinhthucthi=" --- ";
		if($row[4]==0) $Trangthai="Active";
		else if($row[4]==1)$Trangthai="deActive";
		else $Trangthai=" --- ";
		
		$Ghichu = $row[5];
		
		if($k % 2 ==1) $rcolor = "#C0C0C0"; else $rcolor= "#3399FF";
		echo '<tr bgcolor="'.$rcolor.'"><td align ="center">'.$k.'</td><td align ="center">
			<input type="submit" class="button" name="Chitiet1" value ="'.$MaMonthi.'" style="background-color:'.$rcolor.';width:100%;height:'.$Height2.'"  title= "Nhấn để sửa"></td>
			<td>&nbsp;'.$TenMonthi.'</td>
			<td>&nbsp;'.$Hinhthucthi.'</td>
			<td>&nbsp;'.$Mota.'</td>
			<td> &nbsp;'.$Trangthai.'</td>
			<td>&nbsp;'.$Ghichu.'</td>
			</tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	
	echo '</table>'	;	
	echo'</div>'	;	
	
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
	$sql = 'INSERT INTO hoso_history (Mahoso,Ngaycapnhat,Macapnhat,Noidungcapnhat, Canbocapnhat) 
		    VALUE("'.$Mahoso.'","' .$datetime .'",-1, "Xóa Môn thi"'.',"' .$username.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi ghi lịch  sửa cập nhật :' . $sql);	 exit;	}	
	$Mahoso="";
}
//
//-------------/Xóa--------------------	
//thongbaoloi('Lỗi Xóa Môn thi: ' . $code.','.$code1);


//-------------------------------------------------------------------------------------------------------------
	$Chitiet = htmlspecialchars($_POST['Chitiet1']); 
	if($Chitiet!="")$Mahoso=$Chitiet;
	if(trim($Chitiet)==""){ 
	if($code1 !="Quay lại"){
		$Mahoso= $_POST['Mahoso'];
		$Chitiet =$Mahoso;
		}
	}
if($code == "Quay lại") $Mahoso ="";
if(trim($Mahoso)!=""){	// sửa
//--------- Xử lý các tình trạng form nhập dữ liệu--------------

//--- Đọc dữ liệu từ csdl ---------------
//

$Mahoso_old = $_POST['Mahoso_old'];

if($Mahoso_old!=$Mahoso)
{ // Chưa nhập dữ liệu sửa, --> đọc từ CSDL
	
	$sql = 'SELECT MaMonthi,TenMonthi,Mota,Hinhthucthi,Trangthai,Ghichu,Thoigianlambai 	FROM cet_monthi WHERE MaMonthi = "'.$Mahoso.'" ';
	$result = mysql_query($sql, $link);
		if (!$result) {	thongbaoloi('Lỗi đọc Môn thi :' . $sql);	 exit;	}
	
	if(mysql_num_rows($result)>=1) $checksua =1; 		
	$row = mysql_fetch_row($result);			

		$MaMonthi=$row[0];
		$TenMonthi=$row[1];
		$MotaMonthi=$row[2];
		if($row[3]==2)$checkTL = "checked";
		else $checkTN = "checked";
		
		
		if($row[4]==0) $Trangthai="Active";
		else if($row[4]==1)$Trangthai="deActive";
		else $Trangthai=" --- ";
		
		$Ghichu = $row[5];
		$Thoigianlambai =  $row[6];
	
	
	
}
//--- --------------------Tạo form sửa ---------------		
echo'<hr>';
'<br><div class="rowdiv" style="clear:both;width:80%">
	<fieldset>
	<legend><b>Cập nhật Môn thi</b></legend>';
	
	echo '<fieldset> <legend><b>Cập nhật Môn thi</b></legend>';
	
	echo '<br><table  width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: Times New Roman; font-size: 16pt">
	
	<tr><td width="15%" height ="'.$Height.'">Mã Môn thi : </td>
		
		<td  width="10%"> <input type = "textbox"  name = "MaMonthi"  value = "'. $MaMonthi .'" style="height:'.$Height1.';font-size: 12pt" readonly ="readonly" ></td>
			
		<td width="40%">Hình thức thi :
			<input type="radio" value="1" name = "Hinhthucthi" '.$checkTN. ' "> Trắc nghiệm &nbsp;&nbsp;&nbsp;&nbsp;
			<input type = "radio" value="2" name = "Hinhthucthi" '.$checkTL. '> Tự luận</td>
		<td align="right">Thời gian thi (phút): <Input type ="text" name ="Thoigianlambai" value ="'.$Thoigianlambai.'" size ="4" style="height:'.$Height1.';font-size: 12pt"> </td>
		</tr>';
	echo '<tr><td  height ="'.$Height.'">Tên Môn thi :</td><td colspan ="3"> <input type = "textbox" name = "TenMonthi" value="'.$TenMonthi.'" style="height:'.$Height1.';width:100%;font-size: 12pt"></td></tr>';
	echo '<tr><td  height ="'.$Height. '" >Mô tả môn thi:   </td><td colspan ="3"> <textarea  rows ="3" name ="MotaMonthi" style="width:100%;font-size: 12pt" >'.$MotaMonthi.'</textarea></td></tr>';		
	
	echo '<tr><td  height ="'.$Height. '" >Ghi chú:   </td><td colspan ="3"> <textarea  rows ="2" name ="Ghichu" style="width:100%;font-size: 12pt" >'.$Ghichu.'</textarea></td></tr>';		
	
	echo'</table>';
		
	//echo '<p align = "center"><input name="Send" type="botton" onclick ="JavaScript:check();"value = "Ghi nhận" style="height:'.height2.';font-size:12pt;font-weight:bold;width:120pt" '.$on_off.'>&nbsp;';
	echo '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	
	
	if($Trangthai =="Active")
		
		echo '&nbsp;&nbsp;<input name="Delete" type="button" onclick ="return check2();" value = "Hủy môn thi" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	else 
		
		echo '&nbsp;&nbsp;<input name="Restore" type="button" onclick ="return check3();" value = "Khôi phục môn thi" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '&nbsp;&nbsp;<input name="Sendback" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	echo '<input type="hidden" name = "Mahoso_old" value="'.$Mahoso.'">'; // Mã mới == Mã cũ --> sửa , ngược lại mới nạp HS  từ csdl
	echo '<input name="Sendcheck" type="hidden" value ="">';
	echo '<script>cet_SuaMonthi.elements["Sendback"].focus();</script>';
echo '</table>';
}//Sửa
	echo '</form>';
	
	mysql_free_result($result);

?> 

</body>
</html> 
