<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Suatruong.php
// Chức năng: Sửa trường THPT
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

<title>Cập nhật trường thpt</title>
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
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 0px 0px;
    cursor: pointer;
}
.button1 {
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
function check1() {//alert('c1');
	if((document.cet_Suatruong.MatinhS.value=="0")||(document.cet_Suatruong.MatinhS.value==""))	{
		alert('Chưa chọn thuộc tỉnh!'); 
		document.cet_Suatruong.MatinhS.focus(); 
		return false;
		}
	if((document.cet_Suatruong.MahuyenS.value=="0")||(document.cet_Suatruong.MahuyenS.value==""))	{
		alert('Chưa chọn huyện/quận chưa hợp lệ!'); 
		document.cet_Suatruong.MahuyenS.focus(); 
		return false;
		}	
	if((document.cet_Suatruong.TentruongS.value=="0")||(document.cet_Suatruong.TentruongS.value==""))	{
		alert('Tên trường chưa hợp lệ!'); 
		document.cet_Suatruong.TentruongS.focus(); 
		return false;
		}	
	if((document.cet_Suatruong.MakhuvucS.value=="0")||(document.cet_Suatruong.MakhuvucS.value==""))	{
		alert('Chưa xác định khu vực!'); 
		document.cet_Suatruong.MakhuvucS.focus(); 
		return false;
		}
		
	return true;
	
}	
function check(){

	if (check1()) 
	{
		//alert('c OK');
		document.cet_Suatruong.Sendcheck.value="Ghi nhậnOK"; 
		document.cet_Suatruong.submit();
		}
} 
function setupdate(k){
	document.cet_Suatruong.matruongsua.value=k;
	alert('k:'+k);
	document.cet_Suatruong.submit();
	//alert('k:'+k);
}
function confirm2(){
	if(confirm('Bạn muốn loại bỏ trường?')){
		document.cet_Suatruong.Sendcheck.value="Ghi hủy"; 
		document.cet_Suatruong.submit();
	}
}
function confirm3(){
	if(confirm('Bạn muốn khôi phục trường?')){
		document.cet_Suatruong.Sendcheck.value="Ghi khôi phục"; 
		document.cet_Suatruong.submit();
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
	
//-----------------------/Các hàm-------------------------------------------
//------------------------------------------------------------------------------------------------------------
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	iif(empty($username)) {thongbaoloi1('Bạn chưa đăng nhập hoặc phiên làm việc đã hết!');    exit;	}
	
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
//------------------------------------------------------------------------------------------------------------
	
	$codeOK = ($_POST['Sendcheck']);
	$Matinh0 = ($_POST['Matinh0']);
	$Mahuyen0 = ($_POST['Mahuyen0']);
	$MatinhS = ($_POST['MatinhS']);
	$MahuyenS = ($_POST['MahuyenS']);
	$TentruongS = ($_POST['TentruongS']);
	$MakhuvucS = ($_POST['MakhuvucS']);
	$GhichuS   = ($_POST['GhichuS']);
	$TrangthaiS   = ($_POST['TrangthaiS']);
	$Matruonggoc = $_POST['Matruonggoc'];
//------------------Cập nhật Môn thi -----------------------------------------------
	
	if($codeOK =="Quay lại"){
		
	}
	if($codeOK =="Ghi nhậnOK"){ //me('Ghi OK:'.$Matruonggoc);
		$sql = 'UPDATE truongthpt SET  	Tentruong = "'.$TentruongS.'", Khuvuc = "'.$MakhuvucS.'",Ghichu = "'.$GhichuS.'" WHERE (Mahuyen ="'.$Mahuyen0.'" AND Matruong = "'.$Matruonggoc.'")';
		$result = mysql_query($sql, $link);
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi(' đã Cập nhật! ');	
	}//Hết ghi dữ liệu 
	//----------------------------------------------------------------------
	if($codeOK =="Ghi hủy"){ 
		
		$sql = 'UPDATE truongthpt SET  	Trangthai = 1 WHERE (Mahuyen ="'.$Mahuyen0.'" AND Matruong = "'.$Matruonggoc.'")';
		$result = mysql_query($sql, $link);
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi('Đã loại bỏ trường! ');	
			
		}//Hết ghi dữ liệu 
	if($codeOK =="Ghi khôi phục"){ 
		
		$sql = 'UPDATE truongthpt SET  	Trangthai = 0 WHERE (Mahuyen ="'.$Mahuyen0.'" AND Matruong = "'.$Matruonggoc.'")';
		$result = mysql_query($sql, $link);
		//setcookie('name',$username,time()+3000);
		//setcookie('pass',$password,time()+3000);
		thongbaoloi('đã khôi phục trường ');	
	}//Hết ghi dữ liệu 
	

//-----------------------------------------------------Tạo form dữ liệu -------------------------------------------				
//------------------Tiêu đề trang------------------------------	----------------------------------------------
	print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
	print '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp; Cập nhật thông tin trường</td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
	print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname .'('.$username .') </i></td></tr>';
	print '</table>';
	print '<form action="cet_Suatruong.php" method="post" name ="cet_Suatruong" enctype ="multipart/form-data">' ;
	print '<hr>';
	print '<table><tr>';
	if($Matinh0=="") $Matinh0=1;
	if($Mahuyen0=="") $Mahuyen0=1;
	print '<td width="30%"> Chọn tỉnh/thành phố: '.cet_List_tinh($link,"Matinh0",$Matinh0," ",1).'</td>';
	print '<td> Chọn quận/huyện/thị xã: '.cet_List_huyen($link,"Mahuyen0",$Matinh0,$Mahuyen0," ",1).'</td>';
	print '</tr></table>';
	print '<hr>';
//------------------//Tiêu đề trang------------------------------
	$code = htmlspecialchars($_POST['Send']); 
	
	$sql ='SELECT Mahuyen, Tentruong, Khuvuc,Trangthai,Ghichu,Matruong	FROM truongthpt WHERE (Mahuyen ="'.$Mahuyen0.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc dữ liệu trường :' . $sql);	 exit;	}
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
	
	print '<table border="0"><tr><td width ="75%"><small><i>(Tổng số trường:['.$Tongso_hoso.'];</small></td>';
	print '<td width="5%">Trang: </td><td width="4%"><input type ="text" value ="'.$page.'" name ="page" style="width:100%" onchange="this.form.submit();"></td>';
	print '<td width="2%"><input type ="submit" value =">" name ="next" style="width:100%" '.$gonextpage.'></td>';
	print '<td width="2%"><input type ="submit" value =">>" name ="next" style="width:100%" '.$gonextpage.'></td>';
	print '<td width="2%"><input type ="submit" value ="<" name ="next" style="width:100%" '.$goprepage.'></td>';
	print '<td width="2%"><input type ="submit" value ="<<" name ="next" style="width:100%" '.$goprepage.'></td>';

	print'<td width="1%">/</td><td><input type="text" name ="Page_total" value ="'.$Page_total.'" style="width:100%" readonly ="readonly" ></td>';

	print'</tr></table>';
		
	print '<div style="width: 100%; height:'.$div_height.'px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	print '<table class ="ext1" width="100%" border="1">'; 
	//<td width="60px" align="center"><b>Mã trường</td>
	print '<tr height="40px" >
	    <td width="60px" align="center"><b>STT</td>
		
		<td width="300px" align="center"><b>Tên trường</td>
		<td width="60px" align="center"><b>Mahuyen</td>
		<td width="90px" align="center"><b>Khu vực</td>
		<td width="90px" align="center"><b>Trạng thái</td>
		<td width="180px" align="center"><b>Ghi chú</td> 
	</tr>';
	//-----------------Lặp với mỗi Môn thi có trong csdl---------------
	for($id=1; $id <= $lineperpage*($page-1); $id++) 
		$row = mysql_fetch_row($result);	

	for($k=$id; ($k < $id+$lineperpage)&&($k<=$Tongso_hoso); $k++){ //$Tongso_hoso
	
		$row = mysql_fetch_row($result); 
		$Mahuyen=$row[0];
		$Tentruong=$row[1];
		$Khuvuc=$row[2];
		
		if($row[3]==0) $Trangthai="Bình thường";
		else if($row[3]==1)$Trangthai="Đã loại bỏ";
		else $Trangthai=" --- ";
		
		$Ghichu = $row[4];
		$Matruong = $row[5];
		if($k % 2 ==1) $rcolor = "#C0C0C0"; else $rcolor= "#3399FF";
		print '<tr bgcolor="'.$rcolor.'"><td align ="center">'.$k.'</td>';
		print '<td align ="left">
			<input type="submit" class="button"  name="Chitiet1" value ="'.$Tentruong.'" style="background-color:'.$rcolor.';width:100%;height:'.$Height2.'"  title= "Nhấn để sửa"></td>
		<td align ="center">'.$Mahuyen.'</td>
		<td align ="center">&nbsp;'.$Khuvuc.'</td>
		<td align ="center"> &nbsp;'.$Trangthai.'</td>
		<td>&nbsp;'.$Ghichu.'</td>
		</tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	
	print '</table>'	;	
	print'</div>'	;	
	

//-------------------------------------------------------------------------------------------------------------
	$Chitiet = htmlspecialchars($_POST['Chitiet1']); 
	//me('c1:'.$Chitiet);
	//$Chitiet = htmlspecialchars($_POST['matruongsua']); 
	if($Chitiet!="") $Mahoso=$Chitiet;
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
	$Mahuyen =$Mahuyen0;
	$sql ='SELECT Matinh, Mahuyen, Tentruong, Khuvuc,Trangthai,Ghichu,Matruong	FROM truongthpt 
	WHERE (Mahuyen ="'.$Mahuyen.'" AND Tentruong ="'.$Mahoso.'")';
	//stop($sql);
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc dữ liệu trường :' . $sql);	 exit;	}
	
	if(mysql_num_rows($result)>=1) $checksua =1; 		
	$row = mysql_fetch_row($result);			
	$MatinhS = $row[0]; $MahuyenS= $row[1]; $TentruongS= $row[2]; $KhuvucS= $row[3];$TrangthaiS= $row[4];
	$GhichuS= $row[5];$MatruongS= $row[6];
	
}
//--- --------------------Tạo form sửa ---------------		
print'<hr>';
'<br><div class="rowdiv" style="clear:both;width:80%">
	<fieldset>
	<legend><b>Cập nhật Môn thi</b></legend>';
	
	print '<fieldset> <legend><b>Cập nhật thông tin trường</b></legend>';
	
	print '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	
	print '<tr height ="'.$Height.'"><td width="25%" height ="'.$Height.'">Thuộc tỉnh/thành phố : </td> ';
	print '<td>'.cet_List_tinh($link,"MatinhS",$MatinhS,"disabled",0).'</td></tr>';
	print '<tr height ="'.$Height.'"><td width="20%" height ="'.$Height.'">Thuộc quận/huyện/thị xã: </td> ';
	print '<td>'.cet_List_huyen($link,"MahuyenS",$MatinhS,$MahuyenS,"disabled", 0).'</td></tr>';
	print '<tr height ="'.$Height.'"><td> Tên trường :</td><td> <input type = "textbox" name = "TentruongS" value ="'.$TentruongS.'" style="height:'.$Height1.';width:60%;font-size: 12pt"></td>';
	print '<input type ="hidden" name ="Matruonggoc" value ="'.$MatruongS.'">';
	print '<tr height ="'.$Height.'"><td>Thuộc khu vực: </td>';
	print '<td>'.cet_List_khuvuc($link,"MakhuvucS",$KhuvucS,"",0);
	print '&emsp;Trạng thái: '.($TrangthaiS == "0"? "bình thường":"đã xóa");
	print '</td></tr>';
	print '<tr height ="'.$Height.'"><td>Thông tin thêm:   </td><td><input type = "textbox" name = "GhichuS"  value = "'.$GhichuS.'" style="height:'.$Height1.';width:95%;font-size: 12pt"></p>';

	print'</table>';
		
	//print '<p align = "center"><input name="Send" type="botton" onclick ="JavaScript:check();"value = "Ghi nhận" style="height:'.height2.';font-size:12pt;font-weight:bold;width:120pt" '.$on_off.'>&nbsp;';
	print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	
	
	if($TrangthaiS =="0")
		
		print '&nbsp;&nbsp;<input name="Delete" type="button" onclick ="return confirm2();" value = "Hủy tên trường" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	else 
		
		print '&nbsp;&nbsp;<input name="Restore" type="button" onclick ="return confirm3();" value = "Khôi phục" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '&nbsp;&nbsp;<input name="Sendback" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '<input type="hidden" name = "Mahoso_old" value="'.$Mahoso.'">'; // Mã mới == Mã cũ --> sửa , ngược lại mới nạp HS  từ csdl
	
	print '<input name="Sendcheck" type="hidden" value ="">';
	print '<script>cet_Suatruong.elements["Sendback"].focus();</script>';
print '</table>';
}//Sửa
	print '</form>';
	
	mysql_free_result($result);

?> 

</body>
</html> 
