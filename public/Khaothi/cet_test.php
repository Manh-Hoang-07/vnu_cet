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
//------------------------Các hàm---------------------------------------------
	

//------------------Tiêu đề trang------------------------------	

	print '<table border="0" bgcolor="#CCFFFF"  width ="100%"  cellpading="0" cellspacing="0">';
	print '<tr><td width="40%" style="font-size: 24; color: #0000FF" >&nbsp;&nbsp; Xác nhận đăng ký dự thi</td>';
	print '<td align="right" style="font-size: 12;">Người dùng: </i>&nbsp;<b>'.$username.'</b></td></tr>';
	print '</table>';
	print '<hr>';
	$link = mysqli_connect($localhost, "duyvb", "rgbhjkm", "cet_dkythi");
            if (!$link){ 
				print 'Could not connect to mysql 1'; 	exit; 
			}
	
	mysqli_query("SET NAMES utf8");
	$Matinh0 =1;
	$sql ='SELECT Mahuyen, Tenquanhuyen, Phamvi,Trangthai,Ghichu	FROM quanhuyen WHERE (Matinh ="'.$Matinh0.'")';
	
	$result = mysqli_query($link,$sql);
	
	print '<div style="width: 100%; height:'.$div_height.'px; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';
	print '<table class ="ext1" width="100%" border="1">'; 
	
	print '<tr height="40px" >
	    <td width="40px" align="center"><b>STT</td>
		<td width="40px" align="center"><b>Mã</td>
		<td width="180px" align="center"><b>Tên quận/huyện</td>
		
		<td width="90px" align="center"><b>Đơn vị hành chính</td>
		<td width="90px" align="center"><b>Trạng thái</td>
		<td width="280px" align="center"><b>Ghi chú</td> 
	</tr>';
	//-----------------Lặp với mỗi Môn thi có trong csdl---------------
	for($k=1; $k <= mysqli_num_rows($result); $k++){	
		$row = mysqli_fetch_row($result); 
		$Mahuyen=$row[0];
		$Tenhuyen=$row[1];
		if($row[2]==3)$Phamvi= "huyện"; 
		else if($row[2]==1)$Phamvi= "quận";
		else if($row[2]==2)$Phamvi= "thị xã";
		else $Phamvi= "-----";
		
		if($row[3]==0) $Trangthai="Bình thường";
		else if($row[3]==1)$Trangthai="Đã loại bỏ";
		else $Trangthai=" --- ";
		
		$Ghichu = $row[4];
		
		if($k % 2 ==1) $rcolor = "#C0C0C0"; else $rcolor= "#3399FF";
		print '<tr bgcolor="'.$rcolor.'"><td align ="center">'.$k.'</td><td align ="center">'.$Mahuyen.'</td>';
		print '<td align ="left">
			<input type="submit" class="button"  name="Chitiet1" value ="'.$Tenhuyen.'" style="background-color:'.$rcolor.';width:100%;height:'.$Height2.'"  title= "Nhấn để sửa"></td>
		
		<td align ="center">&nbsp;'.$Phamvi.'</td>
		<td align ="center"> &nbsp;'.$Trangthai.'</td>
		<td>&nbsp;'.$Ghichu.'</td>
		</tr>';
		
			
	}// for	
	
	print '</table>'	;	
	print'</div>'	;	
	
?>
</body>
</html> 
