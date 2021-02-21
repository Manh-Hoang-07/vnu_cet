<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: CapnhatHS.php
// Chức năng: Cập nhật thông tin thí sinh
// Phiên bản: 1.1
// Thời gian: tháng 01/2021
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
// Cập nhật: 
//--------------------------------------------------------------------------------------------
-->
<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<script src="js/jquery-3.5.1.min.js"></script>
<title>Cập nhật Hồ sơ dự thi</title>
<script type="text/javascript">


function check1(){
	//alert('c1');
	var t,t1, t2, i;
	//---A-----------------
	
	if(document.cet_CapnhatHS.Hoten.value==""){
		alert("Họ tên không được để trống");
		document.cet_CapnhatHS.Hoten.focus();
		return false;
	}
	else 
		if(document.cet_CapnhatHS.Hoten.value.length >44){
		alert("Họ tên quá dài");
		document.cet_CapnhatHS.Hoten.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Gioitinh.value==""){
		alert("Chưa chọn giới tính");
		document.cet_CapnhatHS.Gioitinh.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Ngaysinh.value==""){
		alert("Ngày sinh không hợp lệ");
		document.cet_CapnhatHS.Ngaysinh.focus();
		return false;
	}
	if (document.cet_CapnhatHS.Noisinh.value==""){
		alert("Nơi sinh không hợp lệ!");
		document.cet_CapnhatHS.Noisinh.focus();
		return false;
		}
	else 
	if (document.cet_CapnhatHS.Noisinh.value.length >119){
		alert("Nơi sinh quá dài!");
		document.cet_CapnhatHS.Noisinh.focus();
		return false;
		}
			
	if (document.cet_CapnhatHS.Dantoc.value==""){
		alert("Chưa chọn dân tộc");
		document.cet_CapnhatHS.Dantoc.focus();
		return false;
		}
	if (document.cet_CapnhatHS.SOCMND.value==""){
		alert("Số CMND/CCCD không hợp lệ 1");
		document.cet_CapnhatHS.SOCMND.focus();
		return false;
		}
	else 
		if ((document.cet_CapnhatHS.SOCMND.value.length != 12)&&(document.cet_CapnhatHS.SOCMND.value.length != 9)){
			alert("Số CMND/CCCD không hợp lệ (9 hoặc 12 chữ số)");
			document.cet_CapnhatHS.SOCMND.focus();
			return false;
		}
		
	if (document.cet_CapnhatHS.Ngaycap.value==""){
		alert("Ngày cấp không hợp lệ");
		document.cet_CapnhatHS.Ngaycap.focus();
		return false;
		}
	if (document.cet_CapnhatHS.Noicap.value==""){
		alert("Nơi cấp không hợp lệ");
		document.cet_CapnhatHS.Noicap.focus();
		return false;
		}
		else 
			if (document.cet_CapnhatHS.Noicap.value.length > 50){
				alert("Tên nơi cấp cmnd/cccd quá dài");
				document.cet_CapnhatHS.Noicap.focus();
				return false;
		}
			
	if (document.cet_CapnhatHS.TinhTT.value=="0"){
		alert("Tỉnh/Tp thường trú  không hợp lệ");
		document.cet_CapnhatHS.TinhTT.focus();
		return false;
		}	
	if (document.cet_CapnhatHS.HuyenTT.value=="0"){
		alert("Huyện/Quận/Thị xã thường trú  không hợp lệ");
		document.cet_CapnhatHS.HuyenTT.focus();
		return false;
		}	
	if ((document.cet_CapnhatHS.Anhhoso.value=="")&&(document.cet_CapnhatHS.FnAnhhoso.value=="")){
		alert("Chưa chọn ảnh hồ sơ");
		document.cet_CapnhatHS.Anhhoso.focus();
		return false;
		}
	//---A----
	//---B-----------------
	if(document.cet_CapnhatHS.Email.value==""){
		alert("Email không không hợp lệ !");
		document.cet_CapnhatHS.Email.focus();
		return false;
	}
	else 
		if(document.cet_CapnhatHS.Email.value.length >45){
		alert("Email quá dài!");
		document.cet_CapnhatHS.Email.focus();
		return false;
	}
		
	if(document.cet_CapnhatHS.dtDidong.value==""){
		alert("Số điện thoại di động  không hợp lệ !");
		
			alert("Số điện thoại di động  không hợp lệ !");
		document.cet_CapnhatHS.dtDidong.focus();
		return false;
	}
	if(document.cet_CapnhatHS.dtDidong.value.length !=10){
		alert("Số điện thoại di động  không hợp lệ !");
		
			alert("Số điện thoại di động  không hợp lệ !");
		document.cet_CapnhatHS.dtDidong.focus();
		return false;
	}
	if(document.cet_CapnhatHS.dtCodinh.value.length !=""){
		if(document.cet_CapnhatHS.dtDidong.value.length >10){
			alert("Số điện thoại cố định  không hợp lệ !");
			document.cet_CapnhatHS.dtCodinh.focus();
			return false;
		}
	}
	if(document.cet_CapnhatHS.Nguoinhanthu.value==""){
		alert("Tên người nhận thông báo không được rỗng !");
		document.cet_CapnhatHS.Nguoinhanthu.focus();
		return false;
	}	
	else if(document.cet_CapnhatHS.Nguoinhanthu.value.length >45){
		alert("Tên người nhận thông báo quá dài !");
		document.cet_CapnhatHS.Nguoinhanthu.focus();
		return false;
	}	
	if(document.cet_CapnhatHS.Diachinhanthu.value==""){
		alert("Địa chỉ nhận thông báo không hợp lệ !");
		document.cet_CapnhatHS.Diachinhanthu.focus();
		return false;
	}
	else 
	if(document.cet_CapnhatHS.Diachinhanthu.value.length > 150){
		alert("Địa chỉ nhận thông báo quá dài !");
		document.cet_CapnhatHS.Diachinhanthu.focus();
		return false;
	}
	//-----------------------C-----------------
	if(document.cet_CapnhatHS.Doituong.value=="0"){
		alert("Chưa chọn đối tượng ưu tiên !");
		document.cet_CapnhatHS.Doituong.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Khuvuc.value=="0"){
		alert("Chưa chọn khu vực !");
		document.cet_CapnhatHS.Khuvuc.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Tinhlop10.value=="0"){
		alert("Tên tỉnh/thành phố không hợp lệ !");
		document.cet_CapnhatHS.Tinhlop10.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Huyenlop10.value=="0"){
		alert("Tên huyện/quận/thị xã không hợp lệ !");
		document.cet_CapnhatHS.Huyenlop10.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Truonglop10.value=="0"){
		alert("Tên trường chưa phù hợp !");
		document.cet_CapnhatHS.Truonglop10.focus();
		return false;
	}	
	if(document.cet_CapnhatHS.Tinhlop11.value=="0"){
		alert("Tên tỉnh/thành phố không hợp lệ !");
		document.cet_CapnhatHS.Tinhlop11.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Huyenlop11.value=="0"){
		alert("Tên huyện/quận/thị xã không hợp lệ !");
		document.cet_CapnhatHS.Huyenlop11.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Truonglop11.value=="0"){
		alert("Tên trường chưa phù hợp !");
		document.cet_CapnhatHS.Truonglop11.focus();
		return false;
	}	
	if(document.cet_CapnhatHS.Tinhlop12.value=="0"){
		alert("Tên tỉnh/thành phố không hợp lệ !");
		document.cet_CapnhatHS.Tinhlop12.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Huyenlop12.value=="0"){
		alert("Tên huyện/quận/thị xã không hợp lệ !");
		document.cet_CapnhatHS.Huyenlop12.focus();
		return false;
	}
	if(document.cet_CapnhatHS.Truonglop12.value=="0"){
		alert("Tên trường chưa phù hợp !");
		document.cet_CapnhatHS.Truonglop12.focus();
		return false;
	}	
	
	
	if(document.cet_CapnhatHS.L10HK1.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L10HK1.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_CapnhatHS.L10HK1.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L10HK1.focus();
		return false;}
	}
	
	if(document.cet_CapnhatHS.L10HK2.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L10HK2.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_CapnhatHS.L10HK2.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L10HK2.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.L10CN.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L10CN.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_CapnhatHS.L10CN.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L10CN.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.L11HK1.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L11HK1.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_CapnhatHS.L11HK1.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L11HK1.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.L11HK2.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L11HK2.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_CapnhatHS.L11HK2.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L11HK2.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.L11CN.value==""){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L11CN.focus();
		return false;
	}
	else{
		var f = parseFloat(document.cet_CapnhatHS.L11CN.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L11CN.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.L12HK1.value!=""){
		var f = parseFloat(document.cet_CapnhatHS.L12HK1.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L12HK1.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.L12HK2.value!=""){
		var f = parseFloat(document.cet_CapnhatHS.L12HK2.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L12HK2.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.L12CN.value!=""){
		var f = parseFloat(document.cet_CapnhatHS.L12CN.value);
		if((isNaN(f)==true)||(f<0)||(f>10)){
		alert("Điểm không hợp lệ !");
		document.cet_CapnhatHS.L12CN.focus();
		return false;}
	}
	if(document.cet_CapnhatHS.Namtotnghiep.value.length !=""){
		if(document.cet_CapnhatHS.Namtotnghiep.value.length !=4){
			alert("Năm tốt nghiệp  không hợp lệ !");
			document.cet_CapnhatHS.Namtotnghiep.focus();
			return false;
		}
	}
	return true;
	}
function check(){
	//alert('c');
	if (check1())
	{
		//alert("OK: " + document.cet_CapnhatHS.Send1.value);
		document.cet_CapnhatHS.Send.value="Ghi nhận";
		document.cet_CapnhatHS.submit();
	}
}
function checkdiem(a){
	if(a.value!=""){
		if(a.value.length >5){
			alert('Điểm quá nhiều chữ số!');
			a.focus();
			a.value = a.value.substr(0,3);
			
		}
		var f = parseFloat(a.value);
		if((isNaN(f)==true)||(f<0)||(f>10))	{	
			alert('Điểm không hợp lệ!');
			a.value ="";
			a.focus();
			f=0;
			}
			else a.value =f;
		}
	
}

function cet_SCMNNvalid(){//alert('scm');
	var socm = document.cet_CapnhatHS.SOCMND.value;
	var len =socm.length;
	if((len!=12)&&(len !=9)){
		alert('Số CMND/CCCD không hợp lệ (cần 9 hoặc 12 số) !');
		document.cet_CapnhatHS.SOCMND.focus();
		}
	else{
		var i;
		for(i=len+1; i<=12; i++)socm = "0"+socm;
	document.cet_CapnhatHS.SOCMND.value = socm;
	}
}
function goBack() { 
	var kt = confirm('Bạn muốn thoát chức năng Sửa hồ sơ đăng ký?');
	if(kt) { 
	//window.history.back(-1);
	
	self.close();
	}
}
function bindingHuyen(SelectBoxTinh, SelectBoxHuyen, SelectBoxTruong)
{
	//alert(SelectBoxTinh);
	var Matinh = $('#' + SelectBoxTinh).val();
	//alert(Matinh);
	$.getJSON( "cet_getHuyen.php?Matinh=" + Matinh, function( data ) {
		$('#' + SelectBoxHuyen).empty();
		$('#' + SelectBoxHuyen).append('<option selected value="0">-Chọn huyện-</option>');
		//var items = [];
		$.each( data, function( key, val ) {
			//items.push( "<li id='" + key + "'>" + val + "</li>" );
			$('#' + SelectBoxHuyen).append('<option  value="' + key + '">' + val + '</option>');
		});
		
		if(SelectBoxTruong!=' ')
		{
			//alert(SelectBoxTruong);
			bindingTruong(SelectBoxHuyen, SelectBoxTruong);
		}
	});
}

function bindingTruong(SelectBoxHuyen,SelectBoxTruong)
{
	//alert(SelectBoxHuyen);
	//alert(SelectBoxTruong);
	var Mahuyen = $('#' + SelectBoxHuyen).val();
	//alert("cet_getTruong.php?Mahuyen=" + Mahuyen);
	$.getJSON( "cet_getTruong.php?Mahuyen=" + Mahuyen, function( data ) {
		$('#' + SelectBoxTruong).empty();
		$('#' + SelectBoxTruong).append('<option selected value="0">-Chọn trường-</option>');
		//var items = [];
		$.each( data, function( key, val ) {
			//items.push( "<li id='" + key + "'>" + val + "</li>" );
			$('#' + SelectBoxTruong).append('<option  value="' + key + '">' + val + '</option>');
		});
	});
}
</script>
</head>
<body>
<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//------------------------Các hàm-----------------------------------------------
	include "Libs/lib.php";
	
//-----------------------/Các hàm-------------------------------------------
//---------------------------------------------------------------------------	
	
	$username = $_SESSION['tennguoithi'];
	$password = $_SESSION['khoanguoithi'];
	
	if(empty($username)) {thongbaoloi('Bạn chưa đăng nhập !'); Closewindow();} 
	$link = cet_connect();
	
	if(!cet_st_checkhash($link ,$username,$password)){thongbaoloi('Tài khoản không hơp lệ !'); Closewindow();}
	date_default_timezone_set('Asia/bangkok');
	
	$userfullname  = Get_name($link, "cet_student_acc", "Hoten","Tendangnhap",$username);
	if(!cet_st_check_hoso($link, $username))	{me('Bạn chưa có hồ sơ, bạn có thể chọn  chức năng: "Nhập hồ sơ"'); Closewindow();/*print'<script>window.close();</script>';*/}
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");

//------------------Tiêu đề trang------------------------------	

print '<table border="0" bgcolor="#CCFFFF"  width ="100%"  cellpading="0" cellspacing="0">';
print '<tr><td width="40%" style="font-size: 24; color: #0000FF" >&nbsp;&nbsp; Cập nhật hồ sơ dự thi</td>';
print '<td align="right" style="font-size: 12;">Người dùng: </i>&nbsp;<b>'.$username.'</b></td></tr>';
print '</table>';
print '<form action="cet_CapnhatHS.php" method="post" name ="cet_CapnhatHS" enctype ="multipart/form-data">'; 
print '<hr>';

//------------------//Tiêu đề trang------------------------------
$link = cet_connect();


//----------------------------------------------------info---------------------------------------	
print '<input type ="hidden" name ="FnAnhhoso" value = "">';

if($_POST['_capnhat_'] =='11'){ //Lấy dl từ form ---
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
	/*
	$L12HK1=  $_POST['L12HK1'];$L12HK2= ($_POST['L12HK2']==""?0:$_POST['L12HK2']);$L12CN=  ($_POST['L12CN']==""?0:$_POST['L12CN']);
	
	$Namtotnghiep=  ($_POST['Namtotnghiep']);//==""?0:$_POST['Namtotnghiep']);
	
	$dToan =  ($_POST['dToan']==""?0:$_POST['dToan']);	$dVan =  ($_POST['dVan']==""?0:$_POST['dVan']);	$dNgoaingu =  ($_POST['dNgoaingu']==""?0:$_POST['dNgoaingu']);
	$dLy =  ($_POST['dLy']==""?0:$_POST['dLy']); 	$dHoa =  ($_POST['dHoa']==""?0:$_POST['dHoa']);	$dSinh =  ($_POST['dSinh']==""?0:$_POST['dSinh']);
	$dSu =  ($_POST['dSu']==""?0:$_POST['dSu']);	$dDia =  ($_POST['dDia']==""?0:$_POST['dDia']);	$dGDCD =  ($_POST['dGDCD']==""?0:$_POST['dGDCD']);
	*/
	//-------- Sửa các trường thành varchar ----> không chuyển "" -->0
	$L12HK1=  $_POST['L12HK1'];$L12HK2= ($_POST['L12HK2']);$L12CN=  ($_POST['L12CN']);
	$Namtotnghiep=  ($_POST['Namtotnghiep']);
	$dToan =  ($_POST['dToan']);	$dVan =  ($_POST['dVan']);	$dNgoaingu =  ($_POST['dNgoaingu']);
	$dLy =  ($_POST['dLy']); 	$dHoa =  ($_POST['dHoa']);	$dSinh =  ($_POST['dSinh']);
	$dSu =  ($_POST['dSu']);	$dDia =  ($_POST['dDia']);	$dGDCD =  ($_POST['dGDCD']);
	
	//-------------------
	$Huyenlop10 = $_POST['Huyenlop10'];
	$Huyenlop11 = $_POST['Huyenlop11'];
	$Huyenlop12 = $_POST['Huyenlop12'];
	
	
	//---------------------------------------------------------------Anhhoso -------------
	
		$fnamecode = 'Anhhoso';
		if($_FILES[$fnamecode]['name'] != NULL){ 
			$fntmp = $_FILES[$fnamecode]['name'] ;
			print '<script>document.cet_CapnhatHS.FnAnhhoso.value = "'.$fntmp.'" </script>';
			if($SOCMND !=""){
			$Anhhoso= cet_Uploadfile($fnamecode,$SOCMND);
			$url = getimagesize('data/Anhhoso/'.$Anhhoso);
			if (!is_array($url)) me ('ảnh hồ sơ không hợp lệ !!');
			
			}
		}
		//else $filename =$_POST ['FnAnhhoso'];
		
		//print '<script>document.cet_CapnhatHS.FnAnhhoso.value = "'.$filename.'" </script>';
		else $Anhhoso =$_POST ['FnAnhhoso']; //me('Anhho: '.$Anhhoso);
		//print '<script>document.cet_CapnhatHS.FnAnhhoso.value = "'.$Anhhoso.'" </script>';
	//------------------------------------------------------------------------
}
else {// ---Lấy dl từ table---
	$sql  = 'SELECT tendangnhap,SOCMND, Hoten, Ngaysinh, Gioitinh, Noisinh,Dantoc,Anhhoso, Nguoinhanthu, Diachinhanthu, Sodienthoai, Dienthoaicodinh, Email,
	doituonguutien, Khuvuc, Truonglop10, Tinhlop10, Truonglop11, Tinhlop11, Truonglop12, Tinhlop12, L10K1, L10K2, L10CN, L11K1, 
    L11K2, L11CN, L12K1, L12K2, L12CN, NamTotnghiep, dToan, dVan, dNgoaingu, DLy, dHoa, dSinh, dSu, dDia, dGDCD, Ngaycap,Noicap, TinhTT, HuyenTT, Huyenlop10, Huyenlop11,Huyenlop12   
	FROM cet_student_info WHERE Tendangnhap = "'.$username.'"';
	
	
	$result = mysql_query($sql, $link);
	if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	Closewindow();}
	$rowinfo = mysql_fetch_row ($result);
	
	$username= $rowinfo[0];$SOCMND = $rowinfo[1];$Hoten= $rowinfo[2];
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
	//----------------------------------------------------------info------------
	print '<script>document.cet_CapnhatHS.FnAnhhoso.value = "'.$Anhhoso.'" </script>';
	//---------------------------------------------------------------------------------------------------------------
$todo = $_POST['Send'];

if($todo =="Ghi nhận"){
	if($username==""){ thongbaoloi("Chưa đăng nhập"); Closewindow();}
	
	//mail("duyvuba71@gmail.com","My subject","1234567");
	//if (Get_name($link, "cet_student_info","Tendangnhap","Tendangnhap",$username)!="") {me("Đã có Hồ sơ :".$username); }
	//if (Get_name($link, "cet_student_info","SOCMND","SOCMND", $SOCMND)!="") {me("Đã có Hồ sơ :".$SOCMND);}
	//else 
	//	if (Get_name($link, "cet_student_info","tendangnhap","tendangnhap", $username)!="") {me("Đã có Hồ sơ :".$username);}
	//	else 
		{
		
		//---------------------------------------------------------------Anhhoso -------------
		$fnamecode = 'Anhhoso';
		if($_FILES[$fnamecode]['name'] != NULL){ 
		
			$filename= cet_Uploadfile($fnamecode,$SOCMND);
			//$url = getimagesize('data/Anhhoso/'.$filename);
			//if (!is_array($url)) me ('ảnh hồ sơ không hợp lệ !!');
			//-- update: bỏ kiểm tra ảnh vì đã kiểm tra khi upload -----
		}
		else $filename = $_POST['FnAnhhoso'];
		//print '<input type ="text" name ="AnhHoso1" value ="'.$filename.'">';
		//------------------------------------------------------------------------
		/*
		$sql  = 'UPDATE cet_student_info SET 
		  Hoten ="'.$Hoten.'" , Ngaysinh = "'.$Ngaysinh.'",Gioitinh ='.$Gioitinh .',Noisinh ="'.$Noisinh .'", Dantoc = '.$Dantoc.',
		  Anhhoso ="'.$filename.'",Nguoinhanthu = "'.$Nguoinhanthu .'",Diachinhanthu ="'.$Diachinhanthu.'",Sodienthoai ="'.$Sodienthoai.'",
		  Dienthoaicodinh = "'.$Dienthoaicodinh.'",Email = "'.$Email.'",doituonguutien ='.$Doituong.',Khuvuc = "'.$Khuvuc.'",
		  Truonglop10 ="'.$Truonglop10.'",Tinhlop10 = "'.$Tinhlop10.'",Truonglop11 ="'.$Truonglop11.'",Tinhlop11 ="'.$Tinhlop11.'",
		  Truonglop12 = "'.$Truonglop12.'",Tinhlop12 = "'.$Tinhlop12.'",L10K1 = '.$L10HK1.',L10K2 = '.$L10HK2.', L10CN = '.$L10CN.',
		  L11K1 = '.$L11HK1.',L11K2 ='.$L11HK2.',L11CN = '.$L11CN.',L12K1 = '.$L12HK1.',L12K2 = '.$L12HK2.',L12CN ="'.$L12CN.'",
		  NamTotnghiep = '. $Namtotnghiep.',dToan = '.$dToan.',dVan='.$dVan.',dNgoaingu='.$dNgoaingu.',DLy='.$dLy.',dHoa ='.$dHoa.',dSinh='.$dSinh.',
		  dSu ="'.$dSu.'",dDia ='.$dDia.',dGDCD = '.$dGDCD.',Ngaycap ="'.$Ngaycap.'",Noicap = "'.$Noicap.'",TinhTT ="'.$Matinh.'",HuyenTT ="'.$Mahuyen.'",
		  Huyenlop10 = "'.$Huyenlop10.'" , Huyenlop11 = "'.$Huyenlop11.'" ,Huyenlop12 = "'.$Huyenlop12.'"			
		 
		 WHERE (Tendangnhap ="'.$username .'")';	
		 */
		 
		 $sql  = 'UPDATE cet_student_info SET 
		  Hoten ="'.$Hoten.'" , Ngaysinh = "'.$Ngaysinh.'",Gioitinh ="'.$Gioitinh .'",Noisinh ="'.$Noisinh .'", Dantoc = "'.$Dantoc.'",
		  Anhhoso ="'.$filename.'",Nguoinhanthu = "'.$Nguoinhanthu .'",Diachinhanthu ="'.$Diachinhanthu.'",Sodienthoai ="'.$Sodienthoai.'",
		  Dienthoaicodinh = "'.$Dienthoaicodinh.'",Email = "'.$Email.'",doituonguutien ="'.$Doituong.'",Khuvuc = "'.$Khuvuc.'",
		  Truonglop10 ="'.$Truonglop10.'",Tinhlop10 = "'.$Tinhlop10.'",Truonglop11 ="'.$Truonglop11.'",Tinhlop11 ="'.$Tinhlop11.'",
		  Truonglop12 = "'.$Truonglop12.'",Tinhlop12 = "'.$Tinhlop12.'",L10K1 = '.$L10HK1.',L10K2 = '.$L10HK2.', L10CN = '.$L10CN.',
		  L11K1 = "'.$L11HK1.'",L11K2 ="'.$L11HK2.'",L11CN = "'.$L11CN.'",L12K1 = "'.$L12HK1.'",L12K2 = "'.$L12HK2.'",L12CN ="'.$L12CN.'",
		  NamTotnghiep = "'. $Namtotnghiep.'",dToan = "'.$dToan.'",dVan="'.$dVan.'",dNgoaingu="'.$dNgoaingu.'",DLy="'.$dLy.'",dHoa ="'.$dHoa.'",dSinh="'.$dSinh.'",
		  dSu ="'.$dSu.'",dDia ="'.$dDia.'",dGDCD = "'.$dGDCD.'",Ngaycap ="'.$Ngaycap.'",Noicap = "'.$Noicap.'",TinhTT ="'.$Matinh.'",HuyenTT ="'.$Mahuyen.'",
		  Huyenlop10 = "'.$Huyenlop10.'" , Huyenlop11 = "'.$Huyenlop11.'" ,Huyenlop12 = "'.$Huyenlop12.'"			
		 
		 WHERE (Tendangnhap ="'.$username .'")';	
			
		//stop($sql);
		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error 1: ' . mysql_error().$sql;	Closewindow();}
		$sql = 'UPDATE cet_student_acc SET Hoten  ="'.$Hoten.'" WHERE (Tendangnhap ="'.$username .'")';	
		$result = mysql_query($sql, $link);
		if (!$result) {	print 'MySQL Error 2: ' . mysql_error().$sql;	Closewindow();}
		cet_logstudent($link,$SOCMND,"Cập nhật HS",$username);
		me('Đã Cập nhật hồ sơ!!');
	
	}	
		//--------------------------------------------------------------------------hết ghi studen_info -----------
	
	//--------------------------------------------------------------------------hết ghi dữ liệu -----------
	
	}
	
//--- /Ghi---------
//----------------------------------Nhập dữ liệu----------------------------------------------------
//---------------A. Thông tin cá nhân-------------
//print '<form action="cet_CapnhatHS.php" method="post" name ="cet_CapnhatHS" enctype ="multipart/form-data">'; 



print '<div>';
print '<fieldset class="styleset">	<legend><b>A. THÔNG TIN CÁ NHÂN ('.$username.')</b></legend>';
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
		<td><Input type ="text" name ="SOCMND" size ="15"  value ="'.$SOCMND.'" readonly ="readonly" title "cmnd/cccd 9 hoặc 12 số"></td>
		<td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;7. Ngày cấp:</td>
		<td><Input type ="Date" name ="Ngaycap" value ="'.$Ngaycap.'"></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Nơi cấp:</td>
		<td><Input type ="text" name ="Noicap" size ="15" value ="'.$Noicap.'"></td>
		
		</tr>';		
		
print '<tr height="'.$Height.'">
		<td colspan="5"><b>9. Hộ khẩu thường trú</b>:  &nbsp;Tỉnh/Tp:&nbsp'.cet_List_tinh2($link, "TinhTT", "HuyenTT"," ", $Matinh," ",1).'&emsp;&nbsp; Huyện/Quận/Thị xã: &nbsp;'.cet_List_huyen2($link, "HuyenTT"," ", $Matinh, $Mahuyen," ",0).'
		&emsp;&emsp;&emsp;10. Ảnh hồ sơ (dạng *.jpg, tỷ lệ 4:6)</td>
		<td colspan="1"><Input type = "file" name ="Anhhoso" accept="image/jpeg" data-type="image"></td>';
		
		
print '</table>';
print '</field>';
print '</div>';
print '<br>';
//---------------B. Thông tin liên hệ -------------
print '<div>';
$Email = Get_name($link, "cet_student_acc","Email","Tendangnhap",$username);
print '<fieldset class="styleset">	<legend><b>B. THÔNG TIN LIÊN HỆ</b></legend>';

print '<table width="100%" border="0" cellpadding="0" cellspacing="0"  style="font-family: Times New Roman; font-size: 12pt">';
print '<tr><td width="19%"></td><td width="20%"></td><td width="13%"></td><td width="15%"></td>
		<td width="23%"></td><td></td></tr>';
print '<tr height="'.$Height.'">
		<td>11. Địa chỉ Email: </td>
		<td colspan ="1"><input type = "text" name ="Email" size ="30" value ="'.$Email.'" style="height:'.$Height1.';width:100%;font-size: 12pt" readonly ="readonly"></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12. Điện thoại</td><td> Di động:  &nbsp;<Input type ="text" name="dtDidong" value ="'.$Sodienthoai.'" style="height:'.$Height1.';width:60%;font-size: 12pt" title = "điện thoại 10 số" ></td><td colspan="2"> Điện thoại Cố định (<i>nếu có</i>) : &nbsp;<Input type ="text" name="dtCodinh" value ="'.$Dienthoaicodinh.'" style="height:'.$Height1.';width:45%;font-size: 12pt"></td>
		
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
print '<tr><td width="17%"></td><td width="14%"></td><td width="13%"></td><td width="13%"></td><td width="11%"></td><td></td></tr>';
print '<tr height="'.$Height.'">
		<td>15. Đối tượng ưu tiên: </td>
		<td>'.cet_List_doituong($link,"Doituong",$Doituong).'</td>
		<td>&emsp;&emsp;16. Khu vưc</td><td>'.cet_List_khuvuc($link,"Khuvuc",$Khuvuc).' </td><td></td><td></td>
		
		</tr>';
print '<tr height="'.$Height.'">
		<td colspan ="6">17. Nơi học THPT hoặc tương đương</td></tr>';
		//me('t10:'.$Tinhlop10);
print '<tr height="'.$Height.'">
		<td>&emsp;Năm lớp 10  -  Tỉnh/Thành phố:</td><td>'.cet_List_tinh2($link, "Tinhlop10", "Huyenlop10", "Truonglop10" ,$Tinhlop10," ",1).'</td>
		<td>&emsp;Quận/Huyện/Thị xã:</td><td>'.cet_List_huyen2($link, "Huyenlop10", "Truonglop10" ,$Tinhlop10,$Huyenlop10, " ",1).'</td>
		<td >&emsp;Trường THPT: </td><td colspan="1">'.cet_List_truong($link, "Truonglop10", $Huyenlop10, $Truonglop10, " ", 0).'</td>
		</tr>';	

print '<tr height="'.$Height.'">
		<td>&emsp;Năm lớp 11  -  Tỉnh/Thành phố:</td><td>'.cet_List_tinh2($link, "Tinhlop11", "Huyenlop11", "Truonglop11" ,$Tinhlop11," ",1).'</td>
		<td>&emsp;Quận/Huyện/Thị xã:</td><td>'.cet_List_huyen2($link, "Huyenlop11", "Truonglop11" ,$Tinhlop11,$Huyenlop11, " ",1).'</td>
		<td >&emsp;Trường THPT: </td><td colspan="1">'.cet_List_truong($link, "Truonglop11", $Huyenlop11, $Truonglop11, " ", 0).'</td>
		</tr>';	
print '<tr height="'.$Height.'">
		<td>&emsp;Năm lớp 12  -  Tỉnh/Thành phố:</td><td>'.cet_List_tinh2($link, "Tinhlop12", "Huyenlop12", "Truonglop12" ,$Tinhlop12," ",1).'</td>
		<td>&emsp;Quận/Huyện/Thị xã:</td><td>'.cet_List_huyen2($link, "Huyenlop12", "Truonglop12" ,$Tinhlop12,$Huyenlop12, " ",1).'</td>
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

//print '<input type ="text" name ="capnhat" value ="111">';
//-----------------------------------
print'<p align="center"> <input name="Send1" type="button" onclick ="JavaScript:check();" value = "Ghi nhận" style="height:'.$Height1.';font-size: 12pt;font-weight:bold;"> ';
print'<input name="Send" type="hidden"  value = "">';

print '<button onclick="goBack();" style="height:'.$Height1.';font-size: 12pt;font-weight:bold;">Quay lại</button>';
print '</p></form>';
//---------------------------------------------------------------------------------------
?>
</body>
</html> 
