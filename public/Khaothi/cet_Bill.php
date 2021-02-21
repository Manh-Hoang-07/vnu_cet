<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: Bill.php
// Chức năng: In phiếu xác nhận đăng ký thi + lệ phí
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
<title>Bill</title>
<script type="text/javascript">
<!--


// -->
</script>
</head>
<body>
<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//------------------------Các hàm-----------------------------------------------
include "Libs/lib.php";
	
//-----------------------/Các hàm-------------------------------------------
//-----------------------Tài khoản test-------------------------------------------

//---------------------------------------------------------------------------	
	//$username = $_GET['sv'];
	$username = $_SESSION['tennguoithi'];
	$password = $_SESSION['khoanguoithi'];
	$Makythi = $_GET['kythi'];
	
	$link = cet_connect();
	date_default_timezone_set('Asia/bangkok') ;
	
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
	$Height = 34;
//------------------Tiêu đề trang------------------------------	
	$Sobaodanh ="A2035123456";
	print '<table border="1" width ="100%"  cellpading="0" cellspacing="0">';
	print '<tr height ="'.$Height.'"><td align = "center" style="font-size: 16;"><b>PHIẾU DỰ THI ĐÁNH GIÁ NĂNG LỰC HỌC SINH<BR>TRUNG HỌC PHỔ THÔNG</b></td></tr>';
	print '<tr height ="'.$Height.'"><td align = "center" >Số báo danh của bạn: <b>'.$Sobaodanh.'</b></td></tr>';
	print '</table>';
	print '</table><tr><td>';
	print '<td align="right" style="font-size: 12;">Người dùng: </i>&nbsp;<b>'.$username.'</b></td></tr>';
	print '</table>';
	print '<hr>';
	$sql ='SELECT Tenmonthi, A. cathi, Lephithi, D.Ngaythi, D.Giothi, A.Madiemthi 
			FROM cet_student_cathi A JOIN cet_kythi_monthi B JOIN cet_monthi C JOIN cet_kythi_cathi D
			ON (A.Makythi =B.Makythi AND A.Mamonthi =B.Mamonthi AND B.Mamonthi =C.Mamonthi AND A.Makythi =D.Makythi AND A.cathi =D.cathi)
			WHERE A.Makythi ="'.$Makythi.'"  AND username ="'.$username.'" AND checked =1';
	//stop($sql);
	
	$sqlhoso = 'SELECT Hoten, Gioitinh,DATE_FORMAT(Ngaysinh,"%d/%m/%Y"), SOCMND, HuyenTT, TinhTT, Anhhoso
				FROM cet_student_info
				WHERE Tendangnhap = "'.$username.'"';
	$result = mysql_query($sqlhoso, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc dữ liệu hồ sơ :' . $sqlhoso.mysql_error($result));	 exit;	}
	$row = mysql_fetch_row($result);
	$Hoten = $row[0];$Gioitinh = ($row[1]==0?"Nam":"Nữ");
	$Ngaysinh = $row[2];$SOCMND = $row[3];
	$HuyenTT = Get_name($link, "quanhuyen","Tenquanhuyen","Mahuyen",$row[4]);
	$TinhTT= Get_name($link, "tinhtp","Tentinh","Matinh",$row[5]);
	$Anhhoso = 'data/Anhhoso/'.$row[6];
	
	print '<table border="1" width ="100%"  cellpading="0" cellspacing="0" style = "font-size:14pt">';
	print '<tr height ="'.$Height.'"><td style="width: 70%;font-size: 15pt;"><b>A. THÔNG TIN CÁ NHÂN</b></td>';
	print '<td rowspan="5"><img src ="'.$Anhhoso.'"></td></tr>';
	print '<tr height ="'.$Height.'"><td>1. Họ, chữ đệm và tên của thí sinh: <b>'.$Hoten.'</b></td></tr>';
	print '<tr height ="'.$Height.'"><td>2. Giới tính: <b>'.$Gioitinh.'</b> 3. Ngày sinh : <b>'.$Ngaysinh.'</b> </td></tr>';
	print '<tr height ="'.$Height.'"><td>4. Số CMND/CCCD/Hộ chiếu: <b>'.$SOCMND.'</b> </td></tr>';
	print '<tr height ="'.$Height.'"><td>5. Hộ khẩu thường trú: <b>'.$HuyenTT.', '.$TinhTT.'</b> </td></tr>';
	print '</table>';
	
	print '<table border="1" width ="100%"  cellpading="0" cellspacing="0" style = "font-size:14pt">';
		print '<tr height ="'.$Height.'"><td style="width: 70%;font-size: 15pt;"><b>A. THÔNG TIN DỰ THI</b></td><td rowspan="5"></td></tr>';
		print '<tr height ="'.$Height.'"><td>6. Địa điểm dự thi : <b>'.$Tendiadiemthi.'</b></td></tr>';
		print '<tr height ="'.$Height.'"><td>7. Đợt thi: <b>'.$Makythi.' - '. $Tenkythi .'</b> </td></tr>';

	$sqlduthi = 'SELECT Madiemthi,Mamonthi,Cathi
				FROM cet_student_cathi
				WHERE (username = "'.$username.'" AND Makythi = "'.$Makythi.'" AND checked >0 )';
	$result = mysql_query($sqlduthi, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc dữ ca thi :' . $sqlhoso.mysql_error($result));	 exit;	}
	for ($k=1; $k<=mysql_num_rows($result); $k++){
		
		$row = mysql_fetch_row($result);
		
			print '<tr height ="'.$Height.'"><td>8. Ngày thi: <b>'.$Ngaythi.'</b> </td></tr>';
		print '<tr height ="'.$Height.'"><td>9. Cathi <b>'.$Cathi.':  '.$Ngaythi.',  Giờ thi: '.$Giothi .'</b> </td></tr>';
		print '<tr height ="'.$Height.'"><td>10. Phòng thi: <b>'.$Phongthi.'</b> </td></tr>';
		print '<tr height ="'.$Height.'"><td>11. Môn thi: <b>'.$Monthi.'</b> </td></tr>';
	}
	print '</table>';
	
	print 'Bill for '.$username.','.$Makythi.', Điểm thi: ';
	$Tong = 0;
	$Somon =  mysql_num_rows($result);
	for($k=1; $k<=$Somon; $k++){
		$row =  mysql_fetch_row($result);
		
		print '<br>Môn : '.$row[0].' , ca : '.$row[1].'('.$row[3].','.$row[4].'), Lệ phí : '.$row[2];
		$Tong += $row[2];
	}
	print '<br>Tổng lệ phí: '.$Tong;
	print '<br>Lệ phí đã nộp: ';
	print '<br>Lệ phí còn phải nộp: '.$Tong;
	
?>
</body>
</html> 
