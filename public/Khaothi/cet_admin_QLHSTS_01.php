<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: admin_QLHSTS.php
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

<title>Cập nhật Hồ sơ thí sinh</title>
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
function check1(){ 
	var t,t1, t2, i;
	//---A-----------------
	
	if(document.cet_admin_QLHS.Hoten.value==""){
		alert("Họ tên không được để trống");
		document.cet_admin_QLHS.Hoten.focus();
		return false;
	}
	if(document.cet_admin_QLHS.Gioitinh.value==""){
		alert("Chưa chọn giới tính");
		document.cet_admin_QLHS.Gioitinh.focus();
		return false;
	}
	if(document.cet_admin_QLHS.Ngaysinh.value==""){
		alert("Ngày sinh không hợp lệ");
		document.cet_admin_QLHS.Ngaysinh.focus();
		return false;
	}
	if (document.cet_admin_QLHS.Noisinh.value==""){
		alert("Nơi sinh không hợp lệ");
		document.cet_admin_QLHS.Noisinh.focus();
		return false;
		}
	if (document.cet_admin_QLHS.Dantoc.value==""){
		alert("Chưa chọn dân tộc");
		document.cet_admin_QLHS.Dantoc.focus();
		return false;
		}
		
	if (document.cet_admin_QLHS.SOCMND.value==""){
		alert("Số CMND/CCCD không hợp lệ");
		document.cet_admin_QLHS.SOCMND.focus();
		return false;
		}
	if (document.cet_admin_QLHS.Ngaycap.value==""){
		alert("Ngày cấp không hợp lệ");
		document.cet_admin_QLHS.Ngaycap.focus();
		return false;
		}
	if (document.cet_admin_QLHS.Noicap.value==""){
		alert("Nơi cấp không hợp lệ");
		document.cet_admin_QLHS.Noicap.focus();
		return false;
		}
	if (document.cet_admin_QLHS.TinhTT.value=="0"){
		alert("Tỉnh/Tp thường trú  không hợp lệ");
		document.cet_admin_QLHS.TinhTT.focus();
		return false;
		}	
		
	if (document.cet_admin_QLHS.HuyenTT.value=="0"){
		alert("Huyên/Quận/Thị xã thường trú  không hợp lệ");
		document.cet_admin_QLHS.HuyenTT.focus();
		return false;
		}		
	
	if ((document.cet_admin_QLHS.Anhhoso.value=="")&&(document.cet_admin_QLHS.FnAnhhoso.value=="")){
		alert("Chưa chọn ảnh hồ sơ");
		document.cet_admin_QLHS.Anhhoso.focus();
		return false;
		}
	
	//---A----
	//---B-----------------
	if(document.cet_admin_QLHS.Email.value==""){
		alert("Email không không hợp lệ !");
		document.cet_admin_QLHS.Email.focus();
		return false;
	}
	if(document.cet_admin_QLHS.dtDidong.value==""){
		alert("Số điện thoại di động  không hợp lệ !");
		document.cet_admin_QLHS.dtDidong.focus();
		return false;
	}
	if(document.cet_admin_QLHS.Nguoinhanthu.value==""){
		alert("Tên người nhận thông báo không được rỗng !");
		document.cet_admin_QLHS.Nguoinhanthu.focus();
		return false;
	}	
	if(document.cet_admin_QLHS.Diachinhanthu.value==""){
		alert("Địa chỉ nhận thông báo không hợp lệ !");
		document.cet_admin_QLHS.Diachinhanthu.focus();
		return false;
	}
	
	//-----------------------C-----------------
	if(document.cet_admin_QLHS.Doituong.value=="0"){
		alert("Chưa chọn đối tượng ưu tiên !");
		document.cet_admin_QLHS.Doituong.focus();
		return false;
	}
	
	if(document.cet_admin_QLHS.Khuvuc.value=="0"){
		alert("Chưa chọn khu vực !");
		document.cet_admin_QLHS.Khuvuc.focus();
		return false;
	}
	
	if(document.cet_admin_QLHS.Tinhlop10.value=="0"){
		alert("Tên tỉnh/thành phố không hợp lệ !");
		document.cet_admin_QLHS.Tinhlop10.focus();
		return false;
	}
	if(document.cet_admin_QLHS.Huyenlop10.value=="0"){
		alert("Tên huyện/quận/thị xã không hợp lệ !");
		document.cet_admin_QLHS.Huyenlop10.focus();
		return false;
	}
	if(document.cet_admin_QLHS.Truonglop10.value=="0"){
		alert("Tên trường chưa phù hợp !");
		document.cet_admin_QLHS.Truonglop10.focus();
		return false;
	}	
	if(document.cet_admin_QLHS.Tinhlop11.value=="0"){
		alert("Tên tỉnh/thành phố không hợp lệ !");
		document.cet_admin_QLHS.Tinhlop11.focus();
		return false;
	}
	
	if(document.cet_admin_QLHS.Huyenlop11.value=="0"){
		alert("Tên huyện/quận/thị xã không hợp lệ !");
		document.cet_admin_QLHS.Huyenlop11.focus();
		return false;
	}
	if(document.cet_admin_QLHS.Truonglop11.value=="0"){
		alert("Tên trường chưa phù hợp !");
		document.cet_admin_QLHS.Truonglop11.focus();
		return false;
	}	
	if(document.cet_admin_QLHS.Tinhlop12.value=="0"){
		alert("Tên tỉnh/thành phố không hợp lệ !");
		document.cet_admin_QLHS.Tinhlop12.focus();
		return false;
	}
	
	if(document.cet_admin_QLHS.Huyenlop12.value=="0"){
		alert("Tên huyện/quận/thị xã không hợp lệ !");
		document.cet_admin_QLHS.Huyenlop12.focus();
		return false;
	}
	if(document.cet_admin_QLHS.Truonglop12.value=="0"){
		alert("Tên trường chưa phù hợp !");
		document.cet_admin_QLHS.Truonglop12.focus();
		return false;
	}	

	if(document.cet_admin_QLHS.L10HK1.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L10HK1.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_admin_QLHS.L10HK1.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L10HK1.focus();
		return false;}
	}
	
	if(document.cet_admin_QLHS.L10HK2.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L10HK2.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_admin_QLHS.L10HK2.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L10HK2.focus();
		return false;}
	}
	if(document.cet_admin_QLHS.L10CN.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L10CN.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_admin_QLHS.L10CN.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L10CN.focus();
		return false;}
	}
	if(document.cet_admin_QLHS.L11HK1.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L11HK1.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_admin_QLHS.L11HK1.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L11HK1.focus();
		return false;}
	}
	if(document.cet_admin_QLHS.L11HK2.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L11HK2.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_admin_QLHS.L11HK2.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L11HK2.focus();
		return false;}
	}
	if(document.cet_admin_QLHS.L11CN.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L11CN.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_admin_QLHS.L11CN.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L11CN.focus();
		return false;}
	}
	if(document.cet_admin_QLHS.L12HK1.value!=""){
		var f = parseFloat(document.cet_admin_QLHS.L12HK1.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L12HK1.focus();
		return false;}
	}
	if(document.cet_admin_QLHS.L12HK2.value!=""){
		var f = parseFloat(document.cet_admin_QLHS.L12HK2.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L12HK2.focus();
		return false;}
	}
	if(document.cet_admin_QLHS.L12CN.value!=""){
		var f = parseFloat(document.cet_admin_QLHS.L12CN.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_admin_QLHS.L12CN.focus();
		return false;}
	}
	return true;
	}
function check(){	
	if (check1())
	{
		//alert("OK: " + document.cet_admin_QLHS.Send1.value);
		document.cet_admin_QLHS.Sendcheck.value="Ghi nhậnOK";
		document.cet_admin_QLHS.submit();
	}
}
function checkdiem(a){
	if(a.value!=""){
		var f = parseFloat(a.value);
		if((isNaN(f)==true)||(f<0)||(f>10))	{	
			alert('Điểm không hợp lệ!');
			a.focus();
			f=0;
		}
		a.value =f;
	}
}
function goBack() { var kt = confirm('Bạn muốn thoát chức năng Sửa hồ sơ đăng ký?');
	if(kt)  {
		
		window.close();
	}
}
function cet_SCMNNvalid(){//alert('scm');
	var socm = document.cet_admin_QLHS.SOCMND.value;
	var len =socm.length;
	if((len>12)||(len<9)){
		alert('Số CMND/CCCD không hợp lệ !');
		document.cet_admin_QLHS.SOCMND.focus();
		}
	else{
		var i;
		for(i=len+1; i<=12; i++)socm = "0"+socm;
	document.cet_admin_QLHS.SOCMND.value = socm;
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
	if(empty($username)) {thongbaoloi1("Bạn chưa đăng nhập hoặc hết phiên làm việc!"); exit;}
	
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
	$code = $_POST['Send2'];
	$Chitiet = ($_POST['Chitiet1']); //me('1:'.$Chitiet);
	if(($Chitiet=="")&&($code !="Quay lại"))	$Chitiet=$_POST['KKKK'];
	$Tendangnhap_old = $_POST['Tendangnhap_old'];
	if($Chitiet!="") $Tendangnhap=$Chitiet;
	
	if($code =="Quay lại"){
		
		$Tendangnhap =$Chitiet1 =$Chitiet ="";
	}
	//----------------------------------------------------------------------
	if($codeOK =="Ghi HủyOK"){ 
		
		
	}//Hết ghi dữ liệu 
	//-----------------------------------------------------------
	if($codeOK =="Ghi nhậnOK"){ 
		//------------------------------------------------------------------------------------
		$Tendangnhap = $_POST['Tendangnhap'];
		$Hoten = cet_property_name($_POST['Hoten']);
		$Gioitinh = $_POST['Gioitinh'];
		$Ngaysinh = ($_POST['Ngaysinh']);
		$Noisinh = ($_POST['Noisinh']);
		$Dantoc = ($_POST['Dantoc']);
		$SOCMND = ($_POST['SOCMND']);
		$Ngaycap = ($_POST['Ngaycap']);
		$Noicap = ($_POST['Noicap']);
		$Nguoinhanthu = $_POST['Nguoinhanthu'];
		$Diachinhanthu = $_POST['Diachinhanthu'];
		$Sodienthoai = $_POST['dtDidong'];
		$Dienthoaicodinh = $_POST['dtCodinh'];
		$Email = $_POST['Email'];
		$Matinh = $_POST['TinhTT'];
		$Mahuyen = $_POST['HuyenTT'];
		//---------------------------------------------------------------------------------------
		$Nguoinhanthu =  $_POST['Nguoinhanthu'];
		$Diachinhanthu=  $_POST['Diachinhanthu'];
		$Doituong=  $_POST['Doituong'];
		$Khuvuc=  $_POST['Khuvuc'];
		
		$Truonglop10 =  $_POST['Truonglop10'];	$Tinhlop10 =  $_POST['Tinhlop10'];
		$Truonglop11 =  $_POST['Truonglop11'];	$Tinhlop11 =  $_POST['Tinhlop11'];
		$Truonglop12 =  $_POST['Truonglop12'];	$Tinhlop12 =  $_POST['Tinhlop12'];
		
		$L10HK1=  $_POST['L10HK1'];$L10HK2=  $_POST['L10HK2'];$L10CN=  $_POST['L10CN'];
		$L11HK1=  $_POST['L11HK1'];$L11HK2=  $_POST['L11HK2'];$L11CN=  $_POST['L11CN'];
		
		$L12HK1=  $_POST['L12HK1'];$L12HK2= ($_POST['L12HK2']==""?0:$_POST['L12HK2']);$L12CN=  ($_POST['L12CN']==""?0:$_POST['L12CN']);
		
		$Namtotnghiep=  ($_POST['Namtotnghiep']==""?0:$_POST['Namtotnghiep']);
		
		$dToan =  ($_POST['dToan']==""?0:$_POST['dToan']);	$dVan =  ($_POST['dVan']==""?0:$_POST['dVan']);	$dNgoaingu =  ($_POST['dNgoaingu']==""?0:$_POST['dNgoaingu']);
		$dLy =  ($_POST['dLy']==""?0:$_POST['dLy']); 	$dHoa =  ($_POST['dHoa']==""?0:$_POST['dHoa']);	$dSinh =  ($_POST['dSinh']==""?0:$_POST['dSinh']);
		$dSu =  ($_POST['dSu']==""?0:$_POST['dSu']);	$dDia =  ($_POST['dDia']==""?0:$_POST['dDia']);	$dGDCD =  ($_POST['dGDCD']==""?0:$_POST['dGDCD']);
		$Huyenlop10 = $_POST['Huyenlop10'];
		$Huyenlop11 = $_POST['Huyenlop11'];
		$Huyenlop12 = $_POST['Huyenlop12'];
		//me('nn:'.$dNgoaingu);
		//---------------------------------------------------------------Anhhoso -------------
		$fnamecode = 'Anhhoso';
		if($_FILES[$fnamecode]['name'] != NULL){ 
		
			$filename= cet_Uploadfile($fnamecode,$SOCMND);
			$url = getimagesize('data/Anhhoso/'.$filename);
			if (!is_array($url)) me ('ảnh hồ sơ không hợp lệ !!');
		}
		else $filename = $_POST['FnAnhhoso'];
		//print '<input type ="text" name ="AnhHoso1" value ="'.$filename.'">';
		//------------------------------------------------------------------------
		$sql  = 'UPDATE cet_student_info SET 
		  Hoten ="'.$Hoten.'" , Ngaysinh = "'.$Ngaysinh.'",Gioitinh ='.$Gioitinh .',Noisinh ="'.$Noisinh .'", Dantoc = '.$Dantoc.',
		  Anhhoso ="'.$filename.'",Nguoinhanthu = "'.$Nguoinhanthu .'",Diachinhanthu ="'.$Diachinhanthu.'",Sodienthoai ="'.$Sodienthoai.'",
		  Dienthoaicodinh = "'.$Dienthoaicodinh.'",Email = "'.$Email.'",doituonguutien ='.$Doituong.',Khuvuc = "'.$Khuvuc.'",
		  Truonglop10 ="'.$Truonglop10.'",Tinhlop10 = "'.$Tinhlop10.'",Truonglop11 ="'.$Truonglop11.'",Tinhlop11 ="'.$Tinhlop11.'",
		  Truonglop12 = "'.$Truonglop12.'",Tinhlop12 = "'.$Tinhlop12.'",L10K1 = '.$L10HK1.',L10K2 = '.$L10HK2.', L10CN = '.$L10CN.',
		  L11K1 = '.$L11HK1.',L11K2 ='.$L11HK2.',L11CN = '.$L11CN.',L12K1 = '.$L12HK1.',L12K2 = '.$L12HK2.',L12CN ='.$L12CN.',
		  NamTotnghiep = '. $Namtotnghiep.',dToan = '.$dToan.',dVan='.$dVan.',dNgoaingu='.$dNgoaingu.',DLy='.$dLy.',dHoa ='.$dHoa.',dSinh='.$dSinh.',
		  dSu ='.$dSu.',dDia ='.$dDia.',dGDCD = '.$dGDCD.',Ngaycap ="'.$Ngaycap.'",Noicap = "'.$Noicap.'",TinhTT ="'.$Matinh.'",HuyenTT ="'.$Mahuyen.'",
		  SOCMND ="'.$SOCMND.'",Huyenlop10 = "'.$Huyenlop10.'" , Huyenlop11 = "'.$Huyenlop11.'" ,Huyenlop12 = "'.$Huyenlop12.'"		
		 
		 WHERE (Tendangnhap ="'.$Tendangnhap .'")';		
		//me($sql);
		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
		
		cet_logstudent($link,$SOCMND,"Cập nhật Hồ sơ",$username);
		
		me('Đã Cập nhật hồ sơ :'.$Tendangnhap.'!!');
		
	//-----------------------/Hết ghi dữ liệu------------
 	$Tendangnhap =$Chitiet1 =$Chitiet ="";
	//setcookie('name',$username,time()+1000);
	//setcookie('pass',$password,time()+1000);
	}
	
	
//-----------------------------------------------------Tạo form dữ liệu -------------------------------------------				
//------------------Tiêu đề trang------------------------------	----------------------------------------------
print '<table border="0" bgcolor="#00CCFF"  width ="100%"  cellpading="1" cellspacing="1">';
print '<tr><td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF" >&nbsp; Quản lý Hồ sơ TS</td><td width="30%">&nbsp;&nbsp;&nbsp;</td><td width="30%">&nbsp;&nbsp;&nbsp;</td></tr>';
print '<tr><td width="30%" align="right"><i>Đơn vị</i>:&nbsp;</i><b>'.$Tendonvi.'</td><td width="30%" align="right"><i> Đăng nhập:'.$userfullname .'('.$username .') </i></td></tr>';
print '</table>';
print '<form action="cet_admin_QLHSTS.php" method="post" name ="cet_admin_QLHS" enctype ="multipart/form-data">' ;

//-------------------------------------------------Tìm kiếm----------------------------------------------
$Tendangnhap_s = $_POST['Tendangnhap_s']; $SDTDD_s= $_POST['SDTDD_s']; $SOCMND_s= $_POST['SOCMND_s']; $Hoten_s = cet_property_name($_POST['Hoten_s']);$Ngaysinh_s =$_POST['Ngaysinh_s'];
print '<div><fieldset class="styleset">	<legend><b>Tìm kiếm</legend>';
print '<table border ="0"><tr><td width ="25%"></td><td width ="16%"></td><td width ="18%"></td><td width ="22%"></td><td ></td></tr>';
print '<tr>';
print '<td>Tên đăng nhập: <input type ="text" name ="Tendangnhap_s" value ="'.$Tendangnhap_s.'"  style="font-family: Times New Roman; font-size: 12pt;width:62%" onchange="this.form.submit();"></td>';
print '<td>Số ĐTDĐ: <input type ="text" name ="SDTDD_s" value ="'.$SDTDD_s.'"  style="font-family: Times New Roman; font-size: 12pt;width:53%" onchange="this.form.submit();"></td>';
print '<td>Số CMND: <input type ="text" name ="SOCMND_s" value ="'.$SOCMND_s.'"  style="font-family: Times New Roman; font-size: 12pt;width:50%" onchange="this.form.submit();"</td>';
print '<td> Họ và tên: <input type ="text" name ="Hoten_s" value ="'.$Hoten_s.'"  style="font-family: Times New Roman; font-size: 12pt;width:65%" onchange="this.form.submit();"></td>';
print '<td>Ngày sinh: <input type ="Date" name ="Ngaysinh_s" value ="'.$Ngaysinh_s.'"  style="font-family: Times New Roman; font-size: 12pt;width:63%" onchange="this.form.submit();"></td>' ;
print '</tr>';
print '</table>';
print '</fieldset>';
print '</div>';
$dkien="";
if($Tendangnhap_s!="") $dkien .= 'AND (Tendangnhap ="'.$Tendangnhap_s.'")';//me($dkien);
if($SDTDD_s!="") $dkien .= 'AND (Sodienthoai ="'.$SDTDD_s.'")';
if($SOCMND_s!="") $dkien .= 'AND (SoCMND LIKE "%'.$SOCMND_s.'%")';
if($Hoten_s!="") $dkien .= 'AND (Hoten LIKE "%'.$Hoten_s.'%")';
if($Ngaysinh_s!="") $dkien .= 'AND (Ngaysinh ="'.$Ngaysinh_s.'")';
//-------------------------------------------------------------------------------------------------------
print '<hr>';
//------------------//Tiêu đề trang------------------------------
	if($dkien!="")
		$sql ='SELECT Tendangnhap,Email,SoCMND, Hoten,DATE_FORMAT(Ngaysinh,"%d-%m-%Y"),Gioitinh, Sodienthoai,Noisinh	
				FROM cet_student_info WHERE (1)'.$dkien;
	else
		$sql ='SELECT Tendangnhap,Email,SoCMND, Hoten,DATE_FORMAT(Ngaysinh,"%d-%m-%Y"),Gioitinh, Sodienthoai,Noisinh	
				FROM cet_student_info WHERE Tendangnhap NOT IN (SELECT username FROM cet_student_cathi)';
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
 
	if($Tongso_hoso<16) $div_height = $Tongso_hoso * $Height2 + $Height1+35;
	else $div_height =420;
	//--------------Trang------------------------

	$lineperpage = Getlineperpage();
	$Page_total = ceil($Tongso_hoso/$lineperpage);
	if(($page=="0")||($page=="")||($page>$Page_total)) $page=1;  
	if($page==1) $goprepage="disabled"; else $goprepage=" ";
	if($page==$Page_total) $gonextpage="disabled"; else $gonextpage=" ";
	//--------------/Trang------------------------
	
	print '<table border="0"><tr><td width ="75%"><small><i>(Tổng số hồ sơ:['.$Tongso_hoso.'];</small></td>';
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
		<td width="120px" align="center"><b>Tài khoản</td>
		<td width="110px" align="center"><b>Số CMND/CCCD</td>';
		//<td width="110px" align="center"><b>Email</td>
	print'	<td width="120px" align="center"><b>Họ và tên</td>
		<td width="110px" align="center"><b>Ngày sinh</td>
		<td width="70px" align="center"><b>Giới tính</td>
		
		<td width="100px" align="center"><b>Số điện thoại</td>
		<td width="210px" align="center"><b>Nơi sinh</td> 
	</tr>';
	//-----------------Lặp với mỗi Môn thi có trong csdl---------------
	for($id=1; $id <= $lineperpage*($page-1); $id++) 
		$row = mysql_fetch_row($result);	
	$rcolor1 = "#C0C0C0"; $rcolor2 = "#3399FF";
	for($k=$id; ($k < $id+$lineperpage)&&($k<=$Tongso_hoso); $k++){ //$Tongso_hoso
	
		$row = mysql_fetch_row($result); 
		$Tendangnhap = $row[0];	$Email= $row[1];		$SoCMND = $row[2];		$Hoten = $row[3]; 	
		$Ngaysinh = $row[4]; $Gioitinh = ($row[5]==0?"Nam":"Nữ"); 	$Sodienthoai = $row[6]; $Noisinh = $row[7];
		
		
			
		if($k % 2 ==1) $rcolor = $rcolor1; else $rcolor= $rcolor2;
		print '<tr bgcolor="'.$rcolor.'"><td align ="center">'.$k.'</td><td align ="center">
			<input type="submit" class="button" name="Chitiet1" value ="'.$Tendangnhap.'" style="background-color:'.$rcolor.';width:100%;height:'.$Height2.'"  title= "Nhấn để sửa"></td>
			
			<td align="center">'.$SoCMND.'</td>';
			//<td>&nbsp;'.$Email.'</td>
		print'<td >&nbsp;'.$Hoten.'</td>
			<td align="center">'.$Ngaysinh.'</td>
			<td align="center">'.$Gioitinh.'</td>
			<td align="center">'.$Sodienthoai.'</td>
			<td align="center">'.$Noisinh.'</td>
			</tr>';
		
			
	}// for ($k=1; $k <= $Tongso_hoso; $k++)	
	
	print '</table>'	;	
	
	print'</div>'	;
	print '<input type ="hidden" name ="FnAnhhoso" value = "">';	
	print '<input type ="hidden" name ="KKKK" value ="">';
	print '<input type ="hidden" name ="SetFocus" value ="">';
//
//-------------/Xóa--------------------	


//thongbaoloi('466: ' . $code.','.$code1.','.$Tendangnhap.','.$Tendangnhap_old);
//-------------------------------------------------------------------------------------------------------------
/*
	$code = $_POST['Send2'];
	$Chitiet = ($_POST['Chitiet1']); //me('1:'.$Chitiet);
	if(($Chitiet=="")&&($code !="Thoát"))	$Chitiet=$_POST['KKKK'];
	$Tendangnhap_old = $_POST['Tendangnhap_old'];
	if($Chitiet!="") $Tendangnhap=$Chitiet;
*/	
	if(trim($Chitiet)==""){ 

	}
	//$code = $_POST['Send']; me('code:'.$code);
	if($code == "Thoát") {$Tendangnhap = $Chitiet="";}
	if($code == "Quay lại") {$Tendangnhap = $Chitiet="";}
	//me('3:'.$Chitiet.', code:'.$code);
//==========================================================================================================
if(trim($Chitiet)!=""){	// ------------------------------------SỬA----------------------------
	$Tendangnhap = $Chitiet;//$username = $Chitiet;
	//me('1:'.$Chitiet);
	//print'<script>document.cet_admin_QLHS.KKKK.value ="'.$Chitiet.'";</script>';
	
	//--------- Xử lý các tình trạng form nhập dữ liệu--------------
	//--- Đọc dữ liệu từ csdl ---------------
	//me('528: new:' .$Tendangnhap.',old: '.$Tendangnhap_old);
	
	if($Tendangnhap_old != $Tendangnhap) { // Chưa nhập dữ liệu sửa, --> đọc từ CSDL
		$sql  = 'SELECT tendangnhap,SOCMND, Hoten, Ngaysinh, Gioitinh, Noisinh,Dantoc,Anhhoso, Nguoinhanthu, Diachinhanthu, Sodienthoai, Dienthoaicodinh, Email,
		doituonguutien, Khuvuc, Truonglop10, Tinhlop10, Truonglop11, Tinhlop11, Truonglop12, Tinhlop12, L10K1, L10K2, L10CN, L11K1, 
		L11K2, L11CN, L12K1, L12K2, L12CN, NamTotnghiep, dToan, dVan, dNgoaingu, DLy, dHoa, dSinh, dSu, dDia, dGDCD, Ngaycap,Noicap, TinhTT, HuyenTT, Huyenlop10, Huyenlop11,Huyenlop12   
		FROM cet_student_info WHERE Tendangnhap = "'.$Tendangnhap.'"';
		
		
		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
		$rowinfo = mysql_fetch_row ($result);
		
		$Tendangnhap= $rowinfo[0];$SOCMND = $rowinfo[1];$Hoten= $rowinfo[2];
		$Ngaysinh= $rowinfo[3];$Gioitinh = $rowinfo[4]; $Noisinh = $rowinfo[5];
		$Dantoc= $rowinfo[6];$Anhhoso = $rowinfo[7];$Nguoinhanthu = $rowinfo[8];
		$Diachinhanthu= $rowinfo[9];$Sodienthoai= $rowinfo[10];$Dienthoaicodinh= $rowinfo[11];
		$Email= $rowinfo[12];	  $Doituong= $rowinfo[13];$Khuvuc= $rowinfo[14];
		$Truonglop10= $rowinfo[15];$Tinhlop10= $rowinfo[16];
		$Truonglop11= $rowinfo[17];$Tinhlop11= $rowinfo[18];
		$Truonglop12= $rowinfo[19];$Tinhlop12= $rowinfo[20];
		$L10HK1= $rowinfo[21];$L10HK2= $rowinfo[22];$L10CN= $rowinfo[23];
		$L11HK1= $rowinfo[24];$L11HK2= $rowinfo[25];$L11CN= $rowinfo[26];
		$L12HK1= $rowinfo[27];$L12HK2= $rowinfo[28];$L12CN= $rowinfo[29];
		$Namtotnghiep= $rowinfo[30];
		$dToan= $rowinfo[31];$dVan= $rowinfo[32];$dNgoaingu= $rowinfo[33];$dLy= $rowinfo[34];
		$dHoa= $rowinfo[35];$dSinh= $rowinfo[36];$dSu= $rowinfo[37];$dDia= $rowinfo[38];$dGDCD= $rowinfo[39];
		$Ngaycap = $rowinfo[40]; $Noicap = $rowinfo[41];
		$Matinh= $rowinfo[42]; $Mahuyen= $rowinfo[43]; $Huyenlop10 = $rowinfo[44]; $Huyenlop11= $rowinfo[45];$Huyenlop12 = $rowinfo[46];
		
		$imgfname ='data/Anhhoso/'.$Anhhoso; //me('dl:'.$imgfname);
		if(!file_exists($imgfname)) $imgfname ='data/Anhhoso/khunganh.png';
			
		
	}
	else{ //---đã có form-> đọc dl từ form
		$Hoten = cet_property_name($_POST['Hoten']);
		$Gioitinh = $_POST['Gioitinh'];
		$Ngaysinh = ($_POST['Ngaysinh']);
		$Noisinh = ($_POST['Noisinh']);
		$Dantoc = ($_POST['Dantoc']);
		$SOCMND = ($_POST['SOCMND']);
		$Ngaycap = ($_POST['Ngaycap']);
		$Noicap = ($_POST['Noicap']);
		$Nguoinhanthu = $_POST['Nguoinhanthu'];
		$Diachinhanthu = $_POST['Diachinhanthu'];
		$Sodienthoai = $_POST['dtDidong'];
		$Dienthoaicodinh = $_POST['dtCodinh'];
		$Email = $_POST['Email'];
		$Matinh = $_POST['TinhTT'];
		$Mahuyen = $_POST['HuyenTT'];
		//---------------------------------------------------------------------------------------
		$Nguoinhanthu =  $_POST['Nguoinhanthu'];
		$Diachinhanthu=  $_POST['Diachinhanthu'];
		$Doituong=  $_POST['Doituong'];
		$Khuvuc=  $_POST['Khuvuc'];
		
		$Truonglop10 =  $_POST['Truonglop10'];	$Tinhlop10 =  $_POST['Tinhlop10'];
		$Truonglop11 =  $_POST['Truonglop11'];	$Tinhlop11 =  $_POST['Tinhlop11'];
		$Truonglop12 =  $_POST['Truonglop12'];	$Tinhlop12 =  $_POST['Tinhlop12'];
		
		$L10HK1=  $_POST['L10HK1'];$L10HK2=  $_POST['L10HK2'];$L10CN=  $_POST['L10CN'];
		$L11HK1=  $_POST['L11HK1'];$L11HK2=  $_POST['L11HK2'];$L11CN=  $_POST['L11CN'];
		
		$L12HK1=  $_POST['L12HK1'];$L12HK2= ($_POST['L12HK2']==""?0:$_POST['L12HK2']);$L12CN=  ($_POST['L12CN']==""?0:$_POST['L12CN']);
		
		$Namtotnghiep=  ($_POST['Namtotnghiep']==""?0:$_POST['Namtotnghiep']);
		
		$dToan =  ($_POST['dToan']==""?0:$_POST['dToan']);	$dVan =  ($_POST['dVan']==""?0:$_POST['dVan']);	$dNgoaingu =  ($_POST['dNgoaingu']==""?0:$_POST['dNgoaingu']);
		$dLy =  ($_POST['dLy']==""?0:$_POST['dLy']); 	$dHoa =  ($_POST['dHoa']==""?0:$_POST['dHoa']);	$dSinh =  ($_POST['dSinh']==""?0:$_POST['dSinh']);
		$dSu =  ($_POST['dSu']==""?0:$_POST['dSu']);	$dDia =  ($_POST['dDia']==""?0:$_POST['dDia']);	$dGDCD =  ($_POST['dGDCD']==""?0:$_POST['dGDCD']);
		$Huyenlop10 = $_POST['Huyenlop10'];
		$Huyenlop11 = $_POST['Huyenlop11'];
		$Huyenlop12 = $_POST['Huyenlop12'];
		
		
		//---------------------------------------------------------------Anhhoso -------------
		
			$fnamecode = 'Anhhoso';
			if($_FILES[$fnamecode]['name'] != NULL){ 
				$fntmp = $_FILES[$fnamecode]['name'] ;
				print '<script>document.cet_admin_QLHS.FnAnhhoso.value = "'.$fntmp.'" </script>';
				if($SOCMND !=""){
				$Anhhoso= cet_Uploadfile($fnamecode,$SOCMND);
				$url = getimagesize('data/Anhhoso/'.$Anhhoso);
				if (!is_array($url)) me ('ảnh hồ sơ không hợp lệ !!');
				
				}
			}
			//else $filename =$_POST ['FnAnhhoso'];
			
			//print '<script>document.cet_admin_QLHS.FnAnhhoso.value = "'.$filename.'" </script>';
			else $Anhhoso =$_POST ['FnAnhhoso']; //me('Anhho: '.$Anhhoso);
			//print '<script>document.cet_admin_QLHS.FnAnhhoso.value = "'.$Anhhoso.'" </script>';
		//------------------------------------------------------------------------
	}
	//----------------------------------------------------------info------------
	print '<script>document.cet_admin_QLHS.FnAnhhoso.value = "'.$Anhhoso.'" </script>';
	print '<script>document.cet_admin_QLHS.KKKK.value = "'.$Tendangnhap.'" </script>';
	//---------------------------------------------------------------------------------------------------------------
	//--- -------------------- sửa Hồ sơ---------------		
	print '<hr>';
	//-----------========+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	print '<div>';
	print '<fieldset class="styleset">	<legend><b>A. THÔNG TIN CÁ NHÂN ('.$Tendangnhap.')</b></legend>';
	if ($Anhhoso=="") {
		$Anhhoso = $_POST['FnAnhhoso'];
	}
	$imgfname ='data/Anhhoso/'.$Anhhoso; 
	//me('a:'.$imgfname);
	if(!file_exists($imgfname)) $imgfname ='data/Anhhoso/khunganh.png';

	print '<table width="100%" border="0" cellpadding="0" cellspacing="0"  style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr height="'.$Height.'"><td width="19%"></td><td width="11%"></td><td width="17%"></td><td width="9%"></td>
			<td width="11%"></td><td width="20%"></td><td rowspan ="5" align="right">';

		print '<img src ="'.$imgfname.'" style ="height:150;width:115"></td></tr>';

	if($Gioitinh ==1) $sel1 ="checked"; else $sel0 = "checked";
	print '<tr height="'.$Height.'">
			<td>1. Họ, chữ đệm và tên: </td>
			<td colspan ="2"><input type = "text" name ="Hoten" size ="30" value ="'.$Hoten.'" style="height:'.$Height1.';width:100%;font-size: 12pt"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Giới tính: </td><td>Nam <Input type ="radio" name="Gioitinh" value ="0" '.$sel0.' > Nữ<Input type ="radio" name="Gioitinh" value ="1" '.$sel1.'></td>
			
			<td><input type ="hidden" name ="_capnhat_" value ="11"></td></tr>';
	print '<tr height="'.$Height.'">
			<td>3. Ngày sinh:</td>
			<td><Input type ="Date" name ="Ngaysinh" value ="'.$Ngaysinh.'"></td>
			<td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;4. Nơi sinh:</td>
			<td><Input type ="text" name ="Noisinh" value ="'.$Noisinh.'"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Dân tộc:</td>
			<td>'.cet_List_Dantoc($link, "Dantoc", $Dantoc," ").'</td>
			
			</tr>';
			
	print '<tr height="'.$Height.'">
			<td>6. Số CMND/CCCD/Hộ chiếu</td>
			<td><Input type ="text" name ="SOCMND" size ="15"  value ="'.$SOCMND.'"  onchange="cet_SCMNNvalid();"></td>
			<td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;7. Ngày cấp:</td>
			<td><Input type ="Date" name ="Ngaycap" value ="'.$Ngaycap.'"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Nơi cấp:</td>
			<td><Input type ="text" name ="Noicap" size ="15" value ="'.$Noicap.'"></td>
			
			</tr>';		
			
	print '<tr height="'.$Height.'">
			<td colspan="5"><b>9. Hộ khẩu thường trú</b>:  &nbsp;Tỉnh/Tp:&nbsp'.cet_List_tinh($link, "TinhTT", $Matinh," ",1).'&emsp;&nbsp; Huyện/Quận/Thị xã: &nbsp;'.cet_List_huyen($link, "HuyenTT", $Matinh, $Mahuyen," ",0).'
			&emsp;&emsp;&emsp;10. Ảnh hồ sơ : </td>
			<td colspan="1"><Input type = "file" name ="Anhhoso" accept="image/jpeg" data-type="image"></td>';
			
			
	print '</table>';
	print '</field>';
	print '</div>';
	print '<br>';
	//---------------B. Thông tin liên hệ -------------
	print '<div>';
	//$Email = Get_name($link, "cet_student_acc","Email","Tendangnhap",$username);
	print '<fieldset class="styleset">	<legend><b>B. THÔNG TIN LIÊN HỆ</b></legend>';

	print '<table width="100%" border="0" cellpadding="0" cellspacing="0"  style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr><td width="19%"></td><td width="20%"></td><td width="13%"></td><td width="15%"></td>
			<td width="23%"></td><td></td></tr>';
	print '<tr height="'.$Height.'">
			<td>11. Địa chỉ Email: </td>
			<td colspan ="1"><input type = "text" name ="Email" size ="30" value ="'.$Email.'" style="height:'.$Height1.';width:100%;font-size: 12pt" readonly ="readonly"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12. Điện thoại</td><td> Di động:  &nbsp;<Input type ="text" name="dtDidong" value ="'.$Sodienthoai.'" style="height:'.$Height1.';width:60%;font-size: 12pt"></td><td colspan="2"> Điện thoại Cố định (<i>nếu có</i>) : &nbsp;<Input type ="text" name="dtCodinh" value ="'.$Dienthoaicodinh.'" style="height:'.$Height1.';width:45%;font-size: 12pt"></td>
			
			</tr>';
	print '<tr height="'.$Height.'">
			<td colspan ="2">13. Gửi thông báo qua đường bưu điện cho :</td>
			<td colspan ="4"><Input type ="text" name ="Nguoinhanthu" value ="'.$Nguoinhanthu.'" style="height:'.$Height1.';width:100%;font-size: 12pt"></td>
			
			
			</tr>';
			
	print '<tr height="'.$Height.'">
			<td>14. Địa chỉ:</td>
			<td colspan ="5"><Input type ="text" name ="Diachinhanthu" value ="'.$Diachinhanthu.'" size ="15" style="height:'.$Height1.';width:100%;font-size: 12pt"></td>
			
			
			</tr>';		
			

			
	print '</table>';
	print '</field>';
	print '</div>';
	print '<br>';
	//---------------C. Thông tin Học tập  -------------
	print '<div>';

	print '<fieldset class="styleset">	<legend><b>C. THÔNG TIN PHỤC VỤ THI ĐGNL</b></legend>';

	print '<table width="100%" border="0" cellpadding="0" cellspacing="0"  style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr><td width="16%"></td><td width="14%"></td><td width="11%"></td><td width="13%"></td><td width="11%"></td><td></td></tr>';
	print '<tr height="'.$Height.'">
			<td>15. Đối tượng ưu tiên: </td>
			<td>'.cet_List_doituong($link,"Doituong",$Doituong).'</td>
			<td>&emsp;&emsp;16. Khu vưc</td><td>'.cet_List_khuvuc($link,"Khuvuc",$Khuvuc).' </td><td></td><td></td>
			
			</tr>';
	print '<tr height="'.$Height.'">
			<td colspan ="6">17. Nơi học THPT hoặc tương đương</td></tr>';
			//me('t10:'.$Tinhlop10);
	print '<tr height="'.$Height.'">
			<td>&emsp;Lớp 10  -  Tỉnh/Thành phố:</td><td>'.cet_List_tinh($link, "Tinhlop10" ,$Tinhlop10," ",1).'</td>
			<td>&emsp;Quận/Huyện:</td><td>'.cet_List_huyen($link, "Huyenlop10" ,$Tinhlop10,$Huyenlop10, " ",1).'</td>
			<td >&emsp;Trường THPT: </td><td colspan="1">'.cet_List_truong($link, "Truonglop10", $Huyenlop10, $Truonglop10, " ", 0).'</td>
			</tr>';	

	print '<tr height="'.$Height.'">
			<td>&emsp;Lớp 11  -  Tỉnh/Thành phố:</td><td>'.cet_List_tinh($link, "Tinhlop11" ,$Tinhlop11," ",1).'</td>
			<td>&emsp;Quận/Huyện:</td><td>'.cet_List_huyen($link, "Huyenlop11" ,$Tinhlop11,$Huyenlop11, " ",1).'</td>
			<td >&emsp;Trường THPT: </td><td colspan="1">'.cet_List_truong($link, "Truonglop11", $Huyenlop11, $Truonglop11, " ", 0).'</td>
			</tr>';	
	print '<tr height="'.$Height.'">
			<td>&emsp;Lớp 12  -  Tỉnh/Thành phố:</td><td>'.cet_List_tinh($link, "Tinhlop12" ,$Tinhlop12," ",1).'</td>
			<td>&emsp;Quận/Huyện:</td><td>'.cet_List_huyen($link, "Huyenlop12" ,$Tinhlop12,$Huyenlop12, " ",1).'</td>
			<td >&emsp;Trường THPT: </td><td colspan="1">'.cet_List_truong($link, "Truonglop12", $Huyenlop12, $Truonglop12, " ", 0).'</td>
			</tr>';	

	print '</table>';
	print '18. Trung bình chung học tập:';

	print '<table width="100%" border="1" cellpadding="0" cellspacing="0"  style="font-family: Times New Roman; font-size: 12pt">';

	print '<tr height="'.$Height.'">
			<td width="33%" align ="center""><b>Lớp 10</b> </td><td cwidth="33%" align ="center""><b>Lớp 11</b> </td><td  align ="center"><b>Lớp 12 </b></td></tr>';
	print '</tr>';		
	print '<tr>';
	print '<td><table>';
	print '<tr><td align="center">HK I</td><td align="center">HK II </td><td align="center"> Cả năm</td></tr>';
	print '<tr>
			<td align="center"><Input type="text" name ="L10HK1" value ="'.$L10HK1.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12p" onchange = "JavaScript:checkdiem(L10HK1);"></td>
			<td align="center"><Input type="text" name ="L10HK2" value ="'.$L10HK2.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L10HK2);"> </td>
			<td align="center"><Input type="text" name ="L10CN"  value ="'.$L10CN.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L10CN);"></td>
			</tr></table></td>';
			
	print '<td><table><tr>			
			<td align="center">HK I</td><td align="center">HK II </td><td align="center"> Cả năm</td></tr>';		

	print '<tr>		
			<td align="center"><Input type="text" name ="L11HK1" value ="'.$L11HK1.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L11HK1);"></td>
			<td align="center"><Input type="text" name ="L11HK2" value ="'.$L11HK2.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L11HK2);"> </td>
			<td align="center"><Input type="text" name ="L11CN"  value ="'.$L11CN.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L11CN);"></td>
			</tr></table></td>';
	print '<td><table><tr>			
			<td align="center">HK I</td><td align="center">HK II (*) </td><td align="center"> Cả năm (*)</td></tr>';
	print '<tr>			
			<td align="center"><Input type="text" name ="L12HK1" value ="'.$L12HK1.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L12HK1);"></td>
			<td align="center"><Input type="text" name ="L12HK2" value ="'.$L12HK2.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L12HK2);"> </td>
			<td align="center"><Input type="text" name ="L12CN"  value ="'.$L12CN.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(L12CN);"></td>
			</tr></table></td>';
	print '</tr>';	
	print '</table>';
	print '</field>';
	print '</div>';
	print '<br>';

	//---------------C2. Thông tin Tốt nghiệp  -------------
	print '<div>';

	print '<fieldset class="styleset">	<legend><b>D. THÔNG TIN TỐT NGHIỆP</b></legend>';

	print '<table width="100%" border="0" cellpadding="0" cellspacing="0"  style="font-family: Times New Roman; font-size: 12pt">';
	print '<tr><td width="10%"></td><td width="11%"></td><td width="11%"></td><td width="11%"></td>
			<td width="11%"></td><td width="11%"></td><td width="11%"></td><td width="11%"></td><td></td></tr>';
	print '<tr height="'.$Height.'"><td colspan ="9">19. <b>Năm tốt nghiệp THPH </b>(*): <Input type="text" name ="Namtotnghiep" value ="'.$Namtotnghiep.'" style="height:'.$Height1.';width:10%;font-size: 12pt"></td></tr>';
	print '<tr height="'.$Height.'"><td colspan ="9">20. <b>Kết quả tốt nghiệp THPH </b>(*)</td></tr>';
	print '<tr height="'.$Height.'">
	<td align="center"><b>Toán</b></td>
	<td align="center"><b>Văn</b></td>
	<td align="center"><b>Ngoại ngữ</b></td>
	<td align="center"><b>Lý</b></td>
	<td align="center"><b>Hóa</b></td>
	<td align="center"><b>Sinh</b></td>
	<td align="center"><b>Sử</b></td>
	<td align="center"><b>Địa</b></td>
	<td align="center"><b>GDCD</b></td></tr>';

	print '<tr>
			<td align="center"><Input type="text" name ="dToan" value ="'.$dToan.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12p" onchange = "JavaScript:checkdiem(dToan);"></td>
			<td align="center"><Input type="text" name ="dVan" value ="'.$dVan.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dVan);"> </td>
			<td align="center"><Input type="text" name ="dNgoaingu"  value ="'.$dNgoaingu.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dNgoaingu);"></td>
			
			<td align="center"><Input type="text" name ="dLy" value ="'.$dLy.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dLy);"></td>
			<td align="center"><Input type="text" name ="dHoa" value ="'.$dHoa.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dHoa);"> </td>
			<td align="center"><Input type="text" name ="dSinh"  value ="'.$dSinh.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dSinh);"></td>
			
			<td align="center"><Input type="text" name ="dSu" value ="'.$dSu.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dSu);"></td>
			<td align="center"><Input type="text" name ="dDia" value ="'.$dDia.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dDia);"> </td>
			<td align="center"><Input type="text" name ="dGDCD"  value ="'.$dGDCD.'" style="text-align: center;height:'.$Height1.';width:80%;font-size: 12pt" onchange = "JavaScript:checkdiem(dGDCD);"></td>

	</tr>';	


		
	print '</table>';
	print '</field>';
	print '</div>';
	//print '<br>';

	
	
	//-----------------------------------
	print '<p align="center">';
	print'<input name="Send1" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:'.$Height1.';font-size: 12pt;font-weight:bold;"> ';
	print'<input name="Send" type="hidden"  value = "">';
	print '<input name="Sendcheck" type="hidden" value ="">';
	//print '<button onclick="goBack()" style="height:'.$Height1.';font-size: 12pt;font-weight:bold;">Quay lại</button>';
	print '&nbsp;<input type ="submit" name ="Send2" value ="Quay lại" style="height:'.$Height1.';font-size: 12pt;font-weight:bold;" >';
	print '<input type="hidden" name = "Tendangnhap_old" value="'.$Tendangnhap.'">'; // Mã mới == Mã cũ --> sửa , ngược lại mới nạp HS  từ csdl
	print '<input type="hidden" name = "Tendangnhap" value="'.$Tendangnhap.'">';
	print ' <script>cet_admin_QLHS.elements["Send2"].focus();</script>';
	print '</p>';
	print '</form>';
	//---------------------------------------------------------------------------------------


	
	//---------++++++++++++++++++++++++++++++++++++++++++-------------------------------------	
		
	/* print '<p align="center"><input name="Send" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '&nbsp;&nbsp;<input name="Sendback" type="submit" value = "Quay lại" style="height:27px;font-size:12pt;font-weight:bold;width:120pt">';
	print '<input type="hidden" name = "Tendangnhap_old" value="'.$Tendangnhap.'">'; // Mã mới == Mã cũ --> sửa , ngược lại mới nạp HS  từ csdl
	print '<input type="hidden" name = "Tendangnhap" value="'.$Tendangnhap.'">';
	print '<input name="Sendcheck" type="hidden" value ="">';
	print ' <script>cet_admin_QLHS.elements["Sendback"].focus();</script>';
	*/
		
	}
//======================================================================/Sửa=============
	print '</form>';
	
	mysql_free_result($result);

?> 

</body>
</html> 
