<?php 

include "mysql_mysqli.inc.php";
function Getlineperpage()
{
	return 10;
}
//-----------------------Các hàm-------------------------------------------
function Closewindow(){
	echo  '<script> window.close();</script>';
}

function Openwindow(){// dont work???
	echo '<script>window.open("Inhopdong1.php","new","toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,history=yes,resizable=yes");</script>';
	
	}
  
//-----------------------------
function thongbaoloi($tb){
		echo "<script>";
		echo "alert('".$tb."');"; 
		echo "</script>";
}
//-----------------------------
function thongbaoloi1($tb){
		echo "<script>";
		echo "alert('".$tb."');"; 
		echo"window.open('Login2.php','_self');";
		echo "</script>";
}
function thongbaoloi2($tb){
		echo "<script>";
		echo "alert('".$tb."');"; 
		echo"window.open('khLogin2.php','_self');";
		echo "</script>";
}
function thongbaoloi3($tb){
		echo "<script>";
		echo "alert('".$tb."');"; 
		echo"window.open('Login0.php','_self');";
		echo "</script>";
}
//--------------------------------------------------------------------------
function Get_soTT($link){
	$sql    = 'Select So_TT_hoso from capma ';
	$result = mysql_query($sql, $link);
	if ($result) {
		$row = mysql_fetch_row($result);
		$num = $row[0]; 
		$sql = 'Update capma Set So_TT_hoso ='.($num+1).' Where 1';
		$result = mysql_query($sql, $link);
		if (!$result) {thongbaoloi("Lỗi ghi số thứ tự");}
		return $num;
		}
	}
//--------------------------------------------------------------------------
function Get_mahoso($link){
	$now = getdate();
	$nam = $now['year'];
	$thang = $now['mon'];
	$sql    = 'Select So_Ma_hoso,Thang,Nam from capma ';
	$result = mysql_query($sql, $link);
	if ($result) {
		$row = mysql_fetch_row($result);
		if(($row[2]!=$nam)||($row[1]!=$thang)){
			$num=1;
			$sql1 = 'Update capma Set So_Ma_hoso ='.($num+1).', Thang ='.$thang.', Nam = '.$nam.'  Where 1';
			$result1 = mysql_query($sql1, $link);
			if (!$result) {thongbaoloi("Lỗi ghi số thứ tự");}
		}
		else {
			$num = $row[0]; 
			$sql1 = 'Update capma Set So_Ma_hoso ='.($num+1).' Where 1';
			$result1 = mysql_query($sql1, $link);
			if (!$result1) {thongbaoloi("Lỗi ghi số thứ tự");}
		}
		$ma= $num.'/'.$thang.'-'.$nam;
		return $ma;
	
	}
}	
//--------------------------------------------------------------------------
function Get_mahoso2($link){
	$now = getdate();
	$nam = $now['year'];
	$thang = $now['mon'];
	$sql    = 'Select So_Ma_hoso,Thang,Nam from capma ';
	$result = mysql_query($sql, $link);
	if ($result) {
		$row = mysql_fetch_row($result);
		if(($row[2]!=$nam)||($row[1]!=$thang)){
			$num=1;
			$sql1 = 'Update capma Set  Thang ='.$thang.', Nam = '.$nam.'  Where 1';
			$result1 = mysql_query($sql1, $link);
			if (!$result) {thongbaoloi("Lỗi ghi số thứ tự");}
		}
		else {
			$num = $row[0] +1; 
			//$sql1 = 'Update capma Set So_Ma_hoso ='.($num+1).' Where 1';
			//$result1 = mysql_query($sql1, $link);
			//if (!$result1) {thongbaoloi("Lỗi ghi số thứ tự");}
		}
		$ma= $num.'/'.$thang.'_'.$nam;
		return $ma;
	
	}
}
//--------------------------------------------------------------------------
function Get_makhach($link){
	$now = getdate();
	$nam = $now['year'];
	$thang = $now['mon'];
	$sql    = 'Select So_Ma_khachhang,Thang,Nam from capmakhachhang ';
	$result = mysql_query($sql, $link);
	if ($result) {
		$row = mysql_fetch_row($result);
		if(($row[2]!=$nam)||($row[1]!=$thang)){
			$num=1;
			$sql1 = 'Update capmakhachhang Set  So_Ma_khachhang=1, Thang ='.$thang.', Nam = '.$nam.'  Where 1';
			
			$result1 = mysql_query($sql1, $link);
			if (!$result1) {thongbaoloi("Lib Lỗi ghi số thứ tự");echo 'lib:'.$sql1;}
		}
		else {
			$num = $row[0] +1; 
			
		}
		$ma= $num.'_'.$thang.$nam;
		return $ma;
	
	}
}
//--------------------------------------------------------------------------
function getRemoteIPAddress(){
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    return $ip;
}
function getRealIPAddress(){  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//---------------------
function Date_Inc($now,$days){	
	$date = new DateTime($now);
	date_add($date, date_interval_create_from_date_string($days.' days'));
	return date_format($date, 'Y-m-d');
	}
//---------------------

function Date_Inc1($now,$songay){
	$date = new DateTime($now);$day1=1;$day2=2;
	for($k=1; $k<=$songay; $k++){
		
		date_add($date, date_interval_create_from_date_string($day1.' days'));
		$thu =date_format($date,'w');
		//---Thứ 7,CN
		if($thu==6) {date_add($date, date_interval_create_from_date_string($day2.' days')); }
		else if($thu==0) {date_add($date, date_interval_create_from_date_string($day1.' days')); }
		//---Chưa tính ngày lễ nghỉ: dương lịch + âm lịch
	}
	$next= date_format($date,'Y-m-d');
	return $next;
}
//---------------------
function Date_Inc2($now,$songay,$link){
	$Ngaynghiduonglich=array("01-01","04-30","05-01","09-02");
	$date = new DateTime($now);$day1=1;$day2=2;
	for($k=1; $k<=$songay; $k++){
		
		date_add($date, date_interval_create_from_date_string($day1.' days'));
		$thu =date_format($date,'w');
		//---Thứ 7,CN
		if($thu==6) {$songay++; }
		else if($thu==0) {$songay++; }
		//---Chưa tính ngày lễ nghỉ: dương lịch + âm lịch
		$thangngay = date_format($date,'m-d'); //thongbaoloi($thangngay);
		$ckdate = date_format($date,'Y/m/d');
		if(in_array($thangngay, $Ngaynghiduonglich)){$songay++;}
		//if(Ngay le duong amlic)
		$ckngayle = Get_name($link,"ngayle","ngay","ngay",$ckdate);
		//$sql1 = 'select ngay from ngayle where Ghichu ="Giỗ Tổ Hùng Vương"';
		//echo 'lib:'.$sql1;
		//$result = mysql_query($sql1,$link);
		//$row = mysql_fetch_row($result);
		//$ckngayle = $row[0];
		
		if($ckngayle!=""){$songay++; }
	}
	$next = new DateTime($now); 
	date_add($next, date_interval_create_from_date_string($songay.' days'));
	$next= date_format($next,'Y-m-d');
	return $next;
}
//---------------------
function GetWorkingday2($start,$end,$link){
	if(($start =="0000-00-00")||($start =="00-00-0000")||($start =="")) return 0;
	if(($end =="0000-00-00")||($end =="00-00-0000")||($end =="")) return 0;
	
	$Ngaynghiduonglich=array("01-01","04-30","05-01","09-02");
	$startdate = new DateTime($start);$date=$startdate;
	$enddate = new DateTime($end);
	$songay = $enddate->diff($startdate)->format("%a");

	$workingday =$songay;
	$day1=1;
	for($k=1; $k<=$songay; $k++){
	
		
	
		date_add($date, date_interval_create_from_date_string($day1.' days'));
		$thu =date_format($date,'w');
		//---Thứ 7,CN
		if($thu==6) {$workingday--; }
		else if($thu==0) {$workingday-- ;}
		//---Tính ngày lễ nghỉ: dương lịch cố định
		$thangngay = date_format($date,'m-d'); //thongbaoloi($thangngay);
		$ckdate = date_format($date,'Y/m/d');
		if(in_array($thangngay, $Ngaynghiduonglich)){$workingday--;}
		//---Tính ngày lễ nghỉ: âm lịch 
		$ckngayle = Get_name($link,"ngayle","ngay","ngay",$ckdate);
			
		if($ckngayle!=""){$workingday--; }
	}
	//if($workingday<=0) $workingday=1;
	//echo 'lib197:'.$workingday.',';	
	return $workingday;
	//return $songay;
}
//-----------------------------list loại hồ sơ---------------------------------
function List_loaihoso($link,$Maloaihoso ,$on_off =" ", $onsubmit=0){
	$sql    = 'Select Maloaihoso, Tenloaihoso from loaihoso ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	

	$B_form = '<select size ="1" name ="Maloaihoso" '.$on_off.' style="font-size:12pt;height:27px;width:100%"><option value ="0"> -Chọn loại hồ sơ- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Maloaihoso)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//-----------------------------list loại hồ sơ---------------------------------
function List_loaihoso1($link,$Maloaihoso ,$on_off =" ", $onsubmit=0){
	$sql    = 'Select Maloaihoso, Tenloaihoso from loaihoso ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="Maloaihoso" '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="this.form.submit()"><option value ="0"> -Chọn loại hồ sơ- </option>';
	else 
		$B_form = '<select size ="1" name ="Maloaihoso" '.$on_off.' style="font-size:12pt;height:27px;width:100%"><option value ="0"> -Chọn loại hồ sơ- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Maloaihoso)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_quanhuyen($link,$Maquanhuyen ,$on_off,$onsubmit=0){
	$sql    = 'Select Maquanhuyen, Tenquanhuyen from quan_huyen ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="Maquanhuyen" ' .$on_off.' style="height:27px;font-size:12pt" onchange ="this.form.submit()">;<option value ="0"> - Địa phương- </option>';
	else
		$B_form = '<select size ="1" name ="Maquanhuyen" ' .$on_off.' style="height:27px;font-size:12pt">;<option value ="0"> - Địa phương- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Maquanhuyen)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_nguonvon($link,$Manguonvon ,$on_off){
	$sql    = 'Select Manguonvon, Tennguonvon from nguonvon ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Manguonvon"' .$on_off.' style="height:27px;font-size:12pt">;<option value ="0"> -Chọn nguồn vốn- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Manguonvon)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_nguonvon1($link,$Manguonvon ,$on_off){
	
	$sql    = 'Select Manguonvon, Tennguonvon from nguonvon ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Manguonvon"' .$on_off.' style="height:27px;font-size:12pt" onchange ="this.form.submit()">;<option value ="0"> -Chọn nguồn vốn- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Manguonvon)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_loaiduan($link,$Maloaiduan ,$on_off,$onsubmit=0){

	$sql    = 'Select Maloaiduan, Tenloaiduan from loaiduan ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	if($onsubmit==1)
		$B_form = '<select size ="1" name ="Maloaiduan" ' .$on_off.' style="height:27px;font-size:12pt;width:100%" onchange ="this.form.submit()">;<option value ="0"> -Chọn loại dự án- </option>';
	else
		$B_form = '<select size ="1" name ="Maloaiduan" ' .$on_off.' style="height:27px;font-size:12pt;width:100%"> <option value ="0"> -Chọn loại dự án- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Maloaiduan)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_nhomcongtrinh($link,$Manhomcongtrinh ,$on_off){
	$sql    = 'Select Manhomcongtrinh, Tennhomcongtrinh from nhomcongtrinh ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Manhomcongtrinh" ' .$on_off.' style="height:27px;font-size:12pt">;<option value ="0"> -Chọn nhóm công trình- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Manhomcongtrinh)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_nhomcongtrinh1($link,$Manhomcongtrinh ,$on_off){
	$sql    = 'Select Manhomcongtrinh, Tennhomcongtrinh from nhomcongtrinh ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Manhomcongtrinh" ' .$on_off.' style="height:27px;font-size:12pt" onchange="this.form.submit()">;<option value ="0"> -Chọn nhóm công trình- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Manhomcongtrinh)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_Mahoso($link,$Mahoso,$on_off){
	$sql    = 'Select Mahoso from hoso WHERE (TrangthaiKT != -1)';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Mahoso" onchange = "this.form.submit()" ' .$on_off.' style="height:27px;font-size:12pt"><option value ="0">-Chọn hồ sơ- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Mahoso)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_MahosoSua($link,$Mahoso,$on_off){
	$sql    = 'Select Mahoso from hoso WHERE (TrangthaiKT != -1)AND ((TrangthaiKT=0)or(TrangthaiKT=1)or(TrangthaiKT=30)or(TrangthaiKT=40))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Mahoso" onchange = "this.form.submit()" ' .$on_off.' style="height:27px;font-size:12pt; width:100%"><option value ="0">-Chọn hồ sơ- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Mahoso)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
function List_MahosoSua1($link,$Mahoso,$Bieuthuc,$on_off){
	if($Bieuthuc=="")
		$sql    = 'Select Mahoso from hoso WHERE (TrangthaiKT != -1)AND ((TrangthaiKT=0)or(TrangthaiKT=1)or(TrangthaiKT=30)or(TrangthaiKT=40))';
	else
		$sql    = 'Select Mahoso from hoso WHERE ' .$Bieuthuc ;
	
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Mahoso" onchange = "this.form.submit()" ' .$on_off.' style="height:27px;font-size:12pt; width:100%"><option value ="0">-Chọn hồ sơ- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Mahoso)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_Canbotheodoi($link,$Macanbotheodoi, $on_off){
	$sql    = 'Select Tendangnhap, Hoten from nguoidung WHERE ((Donvi= "KHTH") AND (Tendangnhap!="guest"))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="Macanbotheodoi"' .$on_off.' style="height:27px;font-size:12pt;width:99%"><option value ="0">-Chọn cán bộ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Macanbotheodoi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_Users($link,$MaNV, $on_off){
	$sql    = 'Select Tendangnhap, Hoten,Donvi from nguoidung WHERE Tendangnhap !="guest" ORDER BY Donvi';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="MaNV"' .$on_off.' style="height:27px;font-size:12pt" onchange="this.form.submit()"><option value ="0">-Chọn cán bộ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$MaNV)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' ('.$row[0].','.$row[2].')</option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' ('.$row[0].','.$row[2].') </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_Canbotheodoi1($link,$CBTheodoi, $on_off){
	$sql    = 'Select Tendangnhap,Hoten from nguoidung WHERE ((Donvi= "KHTH") AND (Tendangnhap!="guest"))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="CBTheodoi"' .$on_off.' style="width:100%;height:27px;font-size:12pt" onchange ="this.form.submit()">
	<option value ="0">Cán bộ theo dõi</option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$CBTheodoi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_NhanvienKT($link,$ManhanvienKT, $Matrungtam,$on_off=" "){
	$sql    = 'Select Tendangnhap, Hoten from nguoidung WHERE Donvi= "'.$Matrungtam.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="ManhanvienKT"' .$on_off.' style="height:27px;font-size:12pt"><option value ="0">-Chọn cán bộ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$ManhanvienKT)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_NhanvienKT1($link,$ManhanvienKT, $Matrungtam,$on_off=" "){
	$sql    = 'Select Tendangnhap, Hoten from nguoidung WHERE Donvi= "'.$Matrungtam.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="ManhanvienKT"' .$on_off.' style="height:27px;font-size:12pt" onchange="this.form.submit()"><option value ="0">-Chọn cán bộ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$ManhanvienKT)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_NhanvienKT2($link,$ManhanvienKT, $Matrungtam,$on_off=" "){
	$sql    = 'Select Tendangnhap, Hoten from nguoidung WHERE Donvi= "'.$Matrungtam.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="ManhanvienKT2"' .$on_off.' style="height:27px;font-size:12pt;width:100%" onchange="this.form.submit()"><option value ="0">-Chọn cán bộ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$ManhanvienKT)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_NhanvienTH($link,$ManhanvienTH, $Matrungtam,$on_off){
	$sql    = 'Select Tendangnhap, Hoten from nguoidung WHERE Donvi= "'.$Matrungtam.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="ManhanvienTH"' .$on_off.' style="height:27px;font-size:12pt"><option value ="0">-Chọn nhân viên- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$ManhanvienTH)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//------------------------------------------------------------
function List_Lanhdaovien($link,$Malanhdaovien, $on_off){
	$sql    = 'Select Tendangnhap, Hoten from nguoidung WHERE ((Chucvu=8 )or (Chucvu=9))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="Malanhdaovien"' .$on_off.' style="height:27px;font-size:12pt"><option value ="0">-Chọn cán bộ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Malanhdaovien)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//----------------------------------------------------------
function List_Lanhdaophong($link,$Malanhdaophong, $on_off){
	$sql    = 'Select Tendangnhap, Hoten from nguoidung WHERE Donvi= "KHTH" AND ((chucvu = 2) or (chucvu=3))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="Malanhdaophong"' .$on_off.' style="height:27px;font-size:12pt"><option value ="0">-Chọn cán bộ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Malanhdaophong)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//-----------------------------------------------------
function List_Mauhopdong($Mauhopdong,$on_off){
	global $link;
	$sql    = 'SELECT Mamauhopdong, Tenmauhopdong FROM mauhopdong';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="Mauhopdong" style="font-size:12pt;height:27px"><option value ="0">-Chọn Mẫu hợp đồng-</option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Mauhopdong)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for
	$B_form .= '</select>';
	echo $B_form;
}
//-------------------------------------------------
function List_donvi($link, $Matrungtamkt,$on_off){
	
$sql    = 'Select Madonvi, Tendonvi from donvi WHERE loaidonvi = 1';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Matrungtamkt" '.$on_off.' style="height:27px;font-size:12pt;width:99%">;<option value ="0"> -Chọn trung tâm- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Matrungtamkt)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//-----------------------------------------------------------------
//-------------------------------------------------
function List_donviTH($link, $fieldname, $Matrungtam,$on_off){
	
$sql    = 'Select Madonvi, Tendonvi from donvi WHERE ((loaidonvi = 1)AND (Madonvi!="QKQD"))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$fieldname.'" '.$on_off.' style="height:27px;font-size:12pt;width:99%">;<option value ="0"> -Chọn trung tâm- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Matrungtam)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;

}
//----------------------------------------------------------------------------
function List_TT($link, $fieldname, $Matrungtam,$on_off,$submit=1){
	
$sql    = 'Select Madonvi, Tendonvi from donvi WHERE ((Loaidonvi = 1)AND (Madonvi!="QKQD"))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($submit==1) $onsubmit ='onchange ="this.form.submit()"';

	$B_form = '<select size ="1" name ="'.$fieldname.'" '.$on_off.' style="height:27px;font-size:12pt;width:100%" '.$onsubmit.'">;
				<option value ="0"> -Chọn trung tâm- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Matrungtam)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//-----------------------------------------------------------------
function List_donvi0($link){
	$Madonvi = htmlspecialchars($_POST['Madonvi']);

$sql    = 'Select Madonvi, Tendonvi from donvi ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Madonvi" onchange="this.form.submit()" style="width:50%;font-size:12pt;height:18pt">;<option value ="0"> Chọn đơn vị trong danh sách </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Madonvi)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select></p>';
	echo $B_form;
}
//-----------------------------------------------------------------
function List_donvi00($link){
	$Madonvi = htmlspecialchars($_POST['Madonvi']);

$sql    = 'Select Madonvi, Tendonvi from donvi ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="Madonvi" style="width:50%;font-size:12pt;height:18pt">;<option value ="0"> Chọn đơn vị trong danh sách </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Madonvi)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select></p>';
	echo $B_form;
}
//-----------------------------------------------------------------
function List_donviA($link,$Madonvi,$on_off){
	$sql    = 'Select Madonvi, Tendonvi from donvi WHERE (1)';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="Madonvi"' .$on_off.' style="height:27px;font-size:12pt" ><option value ="0">-Chọn đơn vị- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Madonvi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;

}
//-----------------------------------------------------------------
function List_ChucvuA($link,$Machucvu,$on_off){
	$sql    = 'Select Machucvu, Tenchucvu from chucvu WHERE (1)';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form = '<select size ="1" name ="Machucvu"' .$on_off.' style="height:27px;font-size:12pt" ><option value ="0">-Chọn chức vụ- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Machucvu)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;

}
//---------------------------------------------------------
function List_chucvu0($link){
	$Machucvu = htmlspecialchars($_POST['Machucvu']);
$sql    = 'Select Machucvu, Tenchucvu from chucvu ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1"  name ="Machucvu" onchange="this.form.submit()" style="width:50%;font-size:12pt;height:22pt" >;<option value ="0"> Chọn chức vụ trong danh sách </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
		if($row[0]==$Machucvu)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select></p>';
	echo $B_form;
}
//---------------------------------------------------------
function List_chucvu00($link){
	$Machucvu = htmlspecialchars($_POST['Machucvu']);
$sql    = 'Select Machucvu, Tenchucvu from chucvu ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1"  name ="Machucvu"  style="width:70%;font-size:12pt;height:20pt" >;<option value ="0"> Chọn chức vụ trong danh sách </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
		if($row[0]==$Machucvu)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select></p>';
	echo $B_form;
}
//---------------------------------------------------------
function List_donvi1($link, $Tenbien, $Matrungtamkt,$on_off){
	
$sql    = 'Select Madonvi, Tendonvi from donvi WHERE loaidonvi = 1';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn trung tâm- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Matrungtamkt)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//---------------------------------------------------------
function List_Pheptoan($link, $Tenbien, $Op,$on_off,$submit){
	
	$sql    = 'Select Toantu, Tentoantu from pheptoan ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' .mysql_error();   exit;	}
	if($submit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" onchange ="this.form.submit();" >';
	else 
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >';
	$B_form .= '<option value ="0"> -Chọn phép toán- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Op)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//----------------------------------------------------------------------------------
function List_Thuoctinhtimkiem($Tenbien, $Att,$on_off,$submit){

	if($submit==1)$onsubmit = 'onchange ="this.form.submit()"'; else $onsubmit =" ";
	
	if($Att=="hoso.Mahoso") 				$select1="selected";
	else if($Att=="Sohopdong") 	 	$select2="selected";
	else if($Att=="Tenchudautu") 	$select3="selected";
	
	else if($Att=="Diadiemduan") 	$select4="selected";
	
	else if($Att=="Tenduan")	 	$select5="selected";
	else if($Att=="Ngaylaphoso")  $select6="selected";
	else if($Att=="Ngaytraspchokhach")  $select7="selected";
	
	
	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" '.$onsubmit.' >;
	<option value ="0" > -Chọn thuộc tính- </option>';
	$B_form .= '<option value ="hoso.Mahoso" '.$select1.'>Mã Hồ sơ</option>';
	$B_form .= '<option value ="Sohopdong" '.$select2.'>Số Hợp đồng</option>';
	$B_form .= '<option value ="Tenchudautu" '.$select3.'>Tên chủ đầu tư</option>';
	$B_form .= '<option value ="Diadiemduan" '.$select4.'>Địa điểm dự án</option>';
	$B_form .= '<option value ="Tenduan" '.$select5.'>Tên dự án</option>';
	$B_form .= '<option value ="Ngaylaphoso" '.$select6.'>Thời gian tạo hồ sơ</option>';
	$B_form .= '<option value ="Ngaytraspchokhach" '.$select7.'>Thời gian trả kết quả</option>';
	
	$B_form .= '</select>';
	echo $B_form;
}		
//----------------------------------------------------------------------------------
function List_ThuoctinhtimkiemGiaoHs1($Tenbien, $Att,$on_off,$submit){

	if($submit==1)$onsubmit = 'onchange ="this.form.submit()"'; else $onsubmit =" ";
	
	if($Att=="hoso.Mahoso") 		$select1="selected";
	else if($Att=="Tenchudautu") 	$select3="selected";
	else if($Att=="Diadiemduan") 	$select4="selected";
	else if($Att=="Tenduan")	 	$select5="selected";
	else if($Att=="Ngaylaphoso")  $select6="selected";
	else if($Att=="Ngaytraspchokhach")  $select7="selected";
	
	
	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" '.$onsubmit.' >;
	<option value ="0" > -Chọn thuộc tính- </option>';
	$B_form .= '<option value ="hoso.Mahoso" '.$select1.'>Mã Hồ sơ</option>';
	
	$B_form .= '<option value ="Tenchudautu" '.$select3.'>Tên chủ đầu tư</option>';
	$B_form .= '<option value ="Diadiemduan" '.$select4.'>Địa điểm dự án</option>';
	$B_form .= '<option value ="Tenduan" '.$select5.'>Tên dự án</option>';
	$B_form .= '<option value ="Ngaylaphoso" '.$select6.'>Thời gian tạo hồ sơ</option>';
	$B_form .= '<option value ="Ngaytraspchokhach" '.$select7.'>Thời gian trả kết quả</option>';
	
	$B_form .= '</select>';
	echo $B_form;
}		

function cet_check_cathi(){
	
}
//---------------------------------------------------upload file-------------
function Uploadfile($fnamecode, $Mahoso){
	
	if($_FILES[$fnamecode]['name'] != NULL){ // Đã chọn file
                $path = "data/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES[$fnamecode]['tmp_name'];
                $name = $Mahoso.'_'.$_FILES[$fnamecode]['name'];
                $type = $_FILES[$fnamecode]['type']; 
                $size = $_FILES[$fnamecode]['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
			}
    //else thongbaoloi("Vui lòng chọn file");
}
//---------------------------------------------------trả "tên" trạng thái hồ sơ-------------

function Get_trangthai($ma){
	if($ma==0)		return "chưa giao K.T";
	else if($ma==1) return "KHTH giao K.T";//KHTH đã giao TT, TT chưa giao nv kiểm tra
	else if($ma==10)return "giao NV KT";//KHTH đã giao TT, TT đã giao nv kiểm tra, nhưng chưa nhận
	else if($ma==11)return "Nv. đang K.T";// NV của trung tâm đang kiểm tra
	else if($ma==13) return "Cần bổ sung hs";//KHTH kiểm tra,hs chưa đủ
	else if($ma==14) return "Tiếp nhận, giao TT kt";//KHTH kiểm tra,hs đủ để giao trung tâm KTra
	else if($ma==2) return "đã K.T đủ hs";
	else if($ma==3) return "KT chưa đủ HS"; // Nhân viên trả lời cho TT
	else if($ma==32) return "K.H bổ sung HS(TT)"; // Khách bổ sung hồ sơ sau khi TT yêu cầu
	else if($ma==33) return "K.H bổ sung HS(KHTH chưa giao KT)"; // Khách bổ sung hồ sơ sau khi khth yêu cầu
	else if($ma==4) return "NV từ chối";	// Nhân viên trả lời cho TT
	else if($ma==30) return "TT.XN HS Thiếu";// TT trả lời tới KHTH
	else if($ma==40) return "TT. XN từ chối";
	else if($ma==20) return "TT XN HS đủ"; //trả KT tới KHTH(Ok)";
	else if($ma==31) return "KHTH giao lại";	
	else if($ma==5) return "XN K.T, KHTH trình LĐ Viện phê duyệt";
	else if($ma==50) return "LĐ Viện duyệt HS";
	else if($ma==51) return "Đã lập HĐ";
	else if($ma==52) return "Đã lập Dự toán";
	else if($ma==53) return "Đã Kí HĐ";
	else if($ma==6) return "KHTH giao T.H";
	else if($ma==60) return "Giao NV TH";
	else if($ma==61)return "NV.đang T.H";
	else if($ma==62) return "Đã tạm ứng HĐ";
	else if($ma==7) return "T.H xong";
	else if($ma==71)return "XN K.Q";
	else if($ma==72)return "Ko XN K.Q";
	else if($ma==8) return "Xin ý kiên HĐ";
	else if($ma==80) return "LĐ Viện đã duyệt";
	else if($ma==81) return "LĐ Viện Ko duyệt";
	else if($ma==83) return "Tiến hành thanh lý";
	else if($ma==84) return "Đã thanh lý";
	else if($ma==9) return "Hủy H.S";
	else if($ma==91) return "LĐ viện Hủy D.A";
	else if($ma==92) return "Đã Hủy D.A";
	else if($ma==95) return "Đã Hủy D.A";
	else if($ma==100) return "Đã đóng Dự án";
	else if($ma==-1) return "Hồ sơ xóa";
	else if($ma==-2) return "Hồ sơ chưa xác nhận";
}
function Kh_Get_trangthai($ma){
	if($ma==0)		return "Chưa kiểm tra";
	else if($ma==1) //return "KHTH giao K.T";//KHTH đã giao TT, TT chưa giao nv kiểm tra
			return "Đang kiểm tra hs";
	else if($ma==10)//return "giao NV KT";//KHTH đã giao TT, TT đã giao nv kiểm tra, nhưng chưa nhận
			return "Đang kiểm tra hs";
	else if($ma==11)//return "Nv. đang K.T";// NV của trung tâm đang kiểm tra
			return "Đang kiểm tra hs";
	else if($ma==13) return "Cần bổ sung hs";//KHTH kiểm tra,hs chưa đủ
	else if($ma==14) //return "Tiếp nhận, giao TT kt";//KHTH kiểm tra,hs đủ để giao trung tâm KTra
			return "Đã tiếp nhận hs";
	else if($ma==2) //return "Đã K.T đủ hs";
			return "Đủ HS, mời kí hợp đồng";
	else if($ma==3) return "KT chưa đủ HS"; // Nhân viên trả lời cho TT
	else if($ma==32) return "K.H bổ sung HS"; // Khách bổ sung hồ sơ sau khi TT yêu cầu
	else if($ma==33) return "K.H bổ sung HS"; // Khách bổ sung hồ sơ sau khi TT yêu cầu
	else if($ma==4) return "NV từ chối";	// Nhân viên trả lời cho TT
	else if($ma==30) return "TT.XN HS Thiếu";// TT trả lời tới KHTH
	else if($ma==40) return "TT. XN từ chối";
	else if($ma==20) //return "TT XN HS đủ"; //trả KT tới KHTH(Ok)";
			return "Đủ HS, mời kí hợp đồng";
	else if($ma==31) //return "KHTH giao lại";	
			return "Đang kiểm tra hs";
	else if($ma==5) //return "XN K.T, KHTH trình LĐ Viện phê duyệt";
			return "Đủ HS, mời kí hợp đồng";
	else if($ma==50) //return "LĐ Viện duyệt HS";
		return "Đủ HS, mời kí hợp đồng";
	else if($ma==51) //return "Đã lập HĐ";
			return "Đang thực hiện";
	else if($ma==52) //return "Đã lập Dự toán";
			return "Đang thực hiện";
	else if($ma==53) return "Đang thực hiện";//return "Đã Kí HĐ";
	else if($ma==6)  return "Đang thực hiện";//return "KHTH giao T.H";
	else if($ma==60) return "Đang thực hiện";//return "Giao NV TH";
	else if($ma==61) return "Đang thực hiện";//return "NV.đang T.H";
	else if($ma==62) return "Đang thực hiện";//return "Đã tạm ứng HĐ";
	else if($ma==7)  return "Đang thực hiện";//return "T.H xong";
	else if($ma==71) return "Đang thực hiện";//return "XN K.Q";
	else if($ma==72) return "Đang thực hiện";//return "Ko XN K.Q";
	else if($ma==8)  return "Đang thực hiện";//return "Xin ý kiên HĐ";
	else if($ma==80) return "Thực hiện xong";//return "LĐ Viện đã duyệt";
	else if($ma==81) return "Đang thực hiện";//return "LĐ Viện Ko duyệt";
	else if($ma==83) return "Thực hiện xong";//return "Tiến hành thanh lý";
	else if($ma==84) return "Thực hiện xong";//return "Đã thanh lý";
	else if($ma==9)  return "Hủy Dự án";
	else if($ma==91) return "Hủy Dự án";//return "LĐ viện Hủy D.A";
	else if($ma==92) return "Hủy Dự án";//return "Đã Hủy D.A";
	else if($ma==95) return "Hủy Dự án";
	else if($ma==100) return "Đã đóng Dự án";
	else if($ma==-1) return "Hủy Hồ sơ";
	else if($ma==-2) return "Hồ sơ chưa xác nhận";
}
//---------------------------------------------------------
function List_TrangthaiHS($link, $Tenbien, $Matrangthai,$on_off){
	
$sql    = 'Select Matrangthai, Tentrangthaidu from trangthaihoso ORDER BY STT';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn trạng thái- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Matrangthai)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
//---------------------------------------------------------
function List_TrangthaiHS_rutgon($link, $Tenbien, $Matrangthai,$on_off){
	
$sql    = 'Select Matrangthai, Tentrangthaidu from trangthaihoso WHERE MaRutgon=1 ORDER BY STT';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn trạng thái- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Matrangthai)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	echo $B_form;
}
///----------------------
function HanTT0($D1, $D2){
	$date1=  new DateTime($D1);
	$date2=  new DateTime($D2);
	if($date1 >$date2) return "<i>quá hạn"; 
	
}
function HanTT($D1, $D2){
	$date1=  new DateTime($D1);
	$date2=  new DateTime($D2);
	if($date1 > $date2)  return "<i>chậm".$date1->diff($date2)->format("%d").'ngày';
}
function List_pheduyet($Tenbien, $Mapheduyet,$on_off){
	if($Mapheduyet==1) $select1="selected";
	if($Mapheduyet==2) $select2="selected";
	if($Mapheduyet==3) $select3="selected";
	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:12pt">;<option value ="0" > -Chưa phê duyệt- </option>';
	$B_form .= '<option value ="1" '.$select1.'>Đồng ý thực hiện </option>';
	$B_form .= '<option value ="2" '.$select2.'>Sửa chữa hồ sơ </option>';
	$B_form .= '<option value ="3" '.$select3.'>Hủy hồ sơ dựa án</option>';
	$B_form .= '</select>';
	echo $B_form;
}
         
function List_Hoidongdanhgia($Tenbien,$Pheduyethoidong,$on_off){
	if($Pheduyethoidong==1) $select1="selected";
	if($Pheduyethoidong==2) $select2="selected";
	
	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:12pt" >;<option value ="0" > -Chưa đánh giá- </option>';
	$B_form .= '<option value ="1" '.$select1.'>Đồng ý  </option>';
	$B_form .= '<option value ="2" '.$select2.'>Chưa đồng ý </option>';
	
	$B_form .= '</select>';
	echo $B_form;
}
//Warning: mysql_fetch_row() expects parameter 1 to be resource, boolean given in C:\xampp\htdocs\KhaoThi\lib.php on line 1123
function Get_name($link, $Tablename,$Fieldname,$Keyfield, $code){
	$sql = 'SELECT  '.$Fieldname .' FROM  '.$Tablename .'  WHERE ( '.$Keyfield.' = "'.$code.'")';

	$result = mysql_query($sql, $link)or die (mysql_error().$sql);
	$row = mysql_fetch_row($result);	
	$kq = $row[0];
	mysql_free_result($result);
	return $kq;
}
        
function Get_name2($link, $Tablename,$Fieldname,$Keyfield1, $code1,$Keyfield2, $code2){
	$sql = 'SELECT  '.$Fieldname .' FROM  '.$Tablename .'  WHERE ( '.$Keyfield1.' = "'.$code1.'" AND '.$Keyfield2.' = "'.$code2.'" )';
//stop($sql);
	$result = mysql_query($sql, $link)or die (mysql_error().$sql);
	$row = mysql_fetch_row($result);	
	$kq = $row[0];
	mysql_free_result($result);
	return $kq;
}
function Get_TrangthaiCV($link, $Mahoso,$Macv,$user){
	$sql = 'SELECT  TrangthaiCV FROM thuchienda  WHERE ( Mahoso ="'.$Mahoso.'" AND Macongviec = "'.$Macv.'" AND NVthuchien="'.$user.'")';

	$result = mysql_query($sql, $link);
	$row = mysql_fetch_row($result);	

	return $row[0];
}
function Get_Kpnt($link, $mahoso){//Lấy tổng số tiền đã lập nghiệm thu
	$sql = 'SELECT sum(Sotien) FROM nghiemthu WHERE (Mahoso ="'.$mahoso.'")';
	$result = mysql_query($sql, $link);
	$row = mysql_fetch_row($result);	

	return $row[0];
	
}

function obj_focus($form,$obj_name){
	
	echo '<script>';
	echo 'Laphopdong.elements["'.$obj_name.'"].focus();';
	echo'</script>';
	
}
//-------------------Đọc số---------
function number_to_words($num) {
	$number =(int)$num;
	$string ="";
$dictionary  = array(
0                   => 'không ',
1                   => 'một ',
2                   => 'hai ',
3                   => 'ba ',
4                   => 'bốn ',
5                   => 'năm ',
6                   => 'sáu ',
7                   => 'bảy ',
8                   => 'tám ',
9                   => 'chín ');
$tram = (int)($number / 100);
$chuc = ((int)($number/10))%10;
$donvi = ((int)$number)%10;

if($tram!=0) $string .= $dictionary[$tram] ." trăm ";
if($chuc>1) {if ($donvi==5 )$string .= $dictionary[$chuc] ."mươi lăm"; 
			 else $string .= $dictionary[$chuc].' mươi ';
			 if(($donvi>0)&&($donvi!=5)) $string.=$dictionary[$donvi];
			 }
else if($chuc==1) {
					$string .= " mười "; 
					if ($donvi==5) $string .='lăm'; 
					else if($donvi>0) $string .= $dictionary[$donvi];
					}
else {// chuc ==0

	if($donvi==5){if($tram>0) { $string.='linh năm ';}
				  else $string .='năm ';
				  
				}
	else if($donvi>0) {if ($tram>0)$string .= 'linh '. $dictionary[$donvi];	
						else if ($donvi>0)$string .= $dictionary[$donvi];
					}		

}

return $string;
}
function docso($num){
	$num3 = (int)$num%1000;
	$num6 = (int)(($num /1000)%1000);
	$num9 =  (int)($num/1000000);
	if($num9>0)
	echo number_to_words($num9). 'triệu ';
	if($num6>0)
	echo number_to_words($num6).' nghìn ';
	echo number_to_words($num3). ' đồng';
}
//---------------------------------------------------------
function TrangthaiHD($ma){
	if($ma==0)		return "Chưa đủ ĐK";
	else if($ma==1) return "Chưa lập HĐ";
	else if($ma==11) return "Lập HĐ/chưa kí";
	else if($ma==2) return "Đã ký HĐ";
	else if($ma==3) return "Đã tạm ứng";
	else if($ma==4) return "Chờ Thanh lý";
	else if($ma==5) return "Đã In BB TL";
	else if($ma==6) return "Đã thanh lý";
	else if($ma==8) return "Đã hủy";
}
function List_TrangthaiHD($Tenbien,$MatrangthaiHD,$on_off,$submit){
	if($MatrangthaiHD==0) $select0="selected";
	else if($MatrangthaiHD==1) $select1="selected";
	else if($MatrangthaiHD==11)$select11="selected";
	else if($MatrangthaiHD==2) $select2="selected";
	else if($MatrangthaiHD==3) $select3="selected";
	else if($MatrangthaiHD==4) $select4="selected";
	else if($MatrangthaiHD==5) $select5="selected";
	else if($MatrangthaiHD==6) $select6="selected";
	else if($MatrangthaiHD==8) $select8="selected";
	
	if($submit==1)$onsubmit = 'onchange ="this.form.submit()"'; else $onsubmit =" ";
	
	
	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" '.$onsubmit.' >;
	<option value ="-1" > -Chọn trạng thái- </option>';
	$B_form .= '<option value ="0" '.$select0.'>Chưa đủ ĐK </option>';
	$B_form .= '<option value ="1" '.$select1.'>Chưa lập HĐ</option>';
	$B_form .= '<option value ="11" '.$select11.'>Chưa ký HĐ</option>';
	$B_form .= '<option value ="2" '.$select2.'>Đã ký HĐ</option>';
	$B_form .= '<option value ="3" '.$select3.'>Đã tạm ứng</option>';
	$B_form .= '<option value ="4" '.$select4.'>Chờ thanh lý</option>';
	$B_form .= '<option value ="5" '.$select5.'>Đã in BB TL</option>';
	$B_form .= '<option value ="6" '.$select6.'>Đã thanh lý</option>';
	$B_form .= '<option value ="8" '.$select8.'>Đã hủy HĐ</option>';
	
	$B_form .= '</select>';
	echo $B_form;
}	

function getWorkingDays($startDate,$endDate){
    // do strtotime calculations just once
	$holidays=array("2008-12-25","2008-12-26","2009-01-01");
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);


    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
    $days = ($endDate - $startDate) / 86400 + 1;

    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);

    //It will return 1 if it's Monday,.. ,7 for Sunday
    $the_first_day_of_week = date("N", $startDate);
    $the_last_day_of_week = date("N", $endDate);

    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    if ($the_first_day_of_week <= $the_last_day_of_week) {
        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    }
    else {
        // (edit by Tokes to fix an edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)

        // the day of the week for start is later than the day of the week for end
        if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
            $no_remaining_days--;

            if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
                $no_remaining_days--;
            }
        }
        else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
            $no_remaining_days -= 2;
        }
    }

    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
   $workingDays = $no_full_weeks * 5;
    if ($no_remaining_days > 0 )
    {
      $workingDays += $no_remaining_days;
    }

    //We subtract the holidays
    foreach($holidays as $holiday){
        $time_stamp=strtotime($holiday);
        //If the holiday doesn't fall in weekend
        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
            $workingDays--;
    }

    return $workingDays-1;
}
function number_of_working_days($from, $to) {// same 
    $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
    $holidayDays = ['*-12-25', '*-01-01', '2013-12-23']; # variable and fixed holidays

    $from = new DateTime($from);
    $to = new DateTime($to);
    $to->modify('+1 day');
    $interval = new DateInterval('P1D');
    $periods = new DatePeriod($from, $interval, $to);

    $days = 0;
    foreach ($periods as $period) {
        if (!in_array($period->format('N'), $workingDays)) continue;
        if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($period->format('*-m-d'), $holidayDays)) continue;
        $days++;
    }
    return $days-1;
}
//----------------------------------------------------------------
function ListSP($link,$Mahoso){
	$sql ='SELECT Masanpham, Tensanpham, Tepdinhkem FROM duan_sanpham WHERE (Mahoso = "'.$Mahoso.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi đọc tàiliệu đính kèm :' . $sql);	 exit;	}
	$Tongso_SP = mysql_num_rows($result);
	if($Tongso_SP ==0)
		echo '<b>Sản phẩm của hợp đồng</b><i>(không có sản phẩm)</i></b>';
	else{  //có sản phẩm  	
		echo '<b>Sản phẩm của hợp đồng</b><i>( '.$Tongso_SP.')</i></b>';
		echo '<table  width="100%" border="1">';
		echo '<tr height="'.$Height1.'">';
			echo '<td width ="4%" align="center">STT</td><td width ="46%" align="center" ><b>Tên sản phẩm</td><td  align="center" ><b>Tệp đính kèm</td>';
		echo '</tr>';
		
		
	//-----------------Lặp với mỗi mục Tài liệu đính kèm đã có trong csdl---------------
		
		for($k=1; $k <= $Tongso_SP; $k++){ 
			$row = mysql_fetch_row($result);	
			$tentailieu =  $row[1]; ;
			$tentep =  $row[2]; 
			echo '<tr height="'.$Height1.'">';
				echo '<td align="center">'.$k.'</td>';
				echo '<td>'.$tentailieu.'</td>';
				
				if (!empty($tentep))
				echo '<td><a href="data/'.$tentep.'" download>'.$tentep.'</a></td>';
			else 
				echo '<td ></td>';
			echo '</tr>';
		} 
		
	echo '</table>';	
	}
	
}

function ListTL($link,$Mahoso){
	
	//-----------------Tài liệu đính kèm đã có trong csdl---------------
	$sql ='SELECT Matailieu, Tentailieu, Bangoc, Bansao, Tepdinhkem FROM tailieudinhkem WHERE Mahoso = "'.$Mahoso.'"';
	$result = mysql_query($sql, $link);
			if (!$result) {	thongbaoloi('Lỗi đọc tàiliệu đính kèm :' . $sql);	 exit;	}
	$STT_tailieu = mysql_num_rows($result);
	if($STT_tailieu ==0)
		echo '<b>Tài liệu đính kèm</b><i>(không có tài liệu đính kèm)<br></i></b>';
	else{  //có tài liệu đính kèm 
		echo '<b>Tài liệu đính kèm </b><i>( '.$STT_tailieu. ' tài liệu đính kèm)</i></b>';
		echo '<table width="100%" class="ext1" border="1">';
		echo '<tr height="'.$Height1.'"><td width="4%" align="center">STT</td><td width="46%">Tên tài liệu</td>
		<td width="9%" align="center">Số Bản gốc</td><td width="9%" align="center">Bản sao</td><td >Tệp đính kèm</td>';
		echo '</tr>';
	
	//-----------------Lặp với mỗi mục Tài liệu đính kèm đã có trong csdl---------------
	for($k=1; $k <= $STT_tailieu; $k++){ 
		$row = mysql_fetch_row($result);	
		$tentailieu =  $row[1]; ;
		$tentep =  $row[4]; 
		echo '<tr><td align="center">'.$k.'</td>';
		echo '<td >'.$tentailieu.'</td><td align="center">'.$row[2].'</td><td align="center">'.$row[3].'</td>';
		      
		if (!empty($tentep))
			echo '<td ><a href="data/'.$tentep.'" download>'.$tentep.'</a></td>';
		else 
			echo '<td></td>';
		echo '</tr>';
		
	}
	echo '</td></tr>';
	echo '</table>';
	}
}
function SoHD_YY($SHD){
	
	$i=strpos($SHD,'/'); 
		if($i) {$num = substr($SHD,0,$i);
				$yy = substr($SHD,$i+1,2);
				return (10000*$yy +$num);
		}
	return 0;
}
function Get_loaiHS($CongviecDA){
	if($CongviecDA=="CGDD") $loaihoso = 1;
	else if($CongviecDA=="CGDD; SLKT") $loaihoso = 2;
	else if($CongviecDA=="CGDD; HTKT") $loaihoso = 2;
	else if($CongviecDA=="CGDD; MCN")  $loaihoso = 3;
	else if($CongviecDA=="GTHTD") $loaihoso = 4;
	else if($CongviecDA=="GTHTD1") $loaihoso = 5;
	else if($CongviecDA=="XDVTTD") $loaihoso = 6;
	else if($CongviecDA=="GTHTN") $loaihoso = 7;
	else if($CongviecDA=="XDVTTN") $loaihoso = 8;
	else if($CongviecDA=="CDSN") $loaihoso = 9;
	else if($CongviecDA=="QHMB") $loaihoso = 10;
	else $loaihoso = 0;
	return $loaihoso;
}  
function List_MaNVTH($link,$Tenbien,$NVthuchienT,$Donvi){
	$sql    = 'Select Tendangnhap,Hoten from Nguoidung WHERE Donvi="'.$Donvi.'"';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'"  style="height:27px;font-size:12p;width:100%" >;<option value ="0"> -Chọn CB- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$NVthuchienT)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[0].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[0].' </option>';
	}//end for

	$B_form .= '</select>';
return $B_form;
}
function List_MaCVthem($link,$Tenbien,$MacongviecT,$Maloaihoso){
	$sql    = 'Select Macongviec from loaihosocongviec WHERE Maloaihoso='.$Maloaihoso;
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1309: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'"  style="height:27px;font-size:12p;width:100%" >;<option value ="0"> -Chọn CV- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$MacongviecT)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[0].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[0].' </option>';
	}//end for

	$B_form .= '</select>';
return $B_form;
}
function checknewGiaohs($link,$username){
	$sql    = 'Select Count(Mahoso) FROM hoso WHERE CBTheodoi ="'.$username.'" AND TrangthaiKT = 0 ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1342: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];

}
function checknewLuanchuyenhs($link,$username){
	$sql    = 'Select Count(Mahoso) FROM hoso WHERE CBTheodoi ="'.$username.'" AND ((TrangthaiKT = 20)OR (TrangthaiKT = 30) OR (TrangthaiKT = 40)OR (TrangthaiKT = 32) OR (TrangthaiKT = 33)) ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1351: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];
}

function checknewTTGiaohs($link,$Donvi){
	$sql    = 'Select Count(Mahoso) FROM hoso WHERE DonviKT ="'.$Donvi.'" AND ((TrangthaiKT = 1)OR(TrangthaiKT = 31)) ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1359: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];

}
function checknewTTLuanchuyenhs($link,$Donvi){
	$sql    = 'Select Count(Mahoso) FROM hoso WHERE DonviKT ="'.$Donvi.'" AND ((TrangthaiKT =2)or(TrangthaiKT =3)or(TrangthaiKT=4)or
							(TrangthaiKT =20)or(TrangthaiKT =30)or(TrangthaiKT=40)or(TrangthaiKT=31)or(TrangthaiKT=5))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1367: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];
}

function checknewKiemtrahs($link,$username){
	$sql    = 'Select Count(Mahoso) FROM hoso WHERE NvkiemtraHS ="'.$username.'" AND ((TrangthaiKT =10)OR(TrangthaiKT =31))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1342: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];

}
function checknewLuanchuyenKiemtrahs($link,$username){
	$sql    = 'Select Count(Mahoso) FROM hoso WHERE NvkiemtraHS ="'.$username.'" AND ((TrangthaiKT =2)or(TrangthaiKT =3)or(TrangthaiKT=4)or
							(TrangthaiKT =20)or(TrangthaiKT =30) or(TrangthaiKT =40)or(TrangthaiKT =5))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1351: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];
}

function checknewThuchienDA($link,$username){
	$sql    = 'Select Count(Mahoso) FROM thuchienda 
			   WHERE (NVThuchien="'.$username.'") AND ((TrangthaiCV =60)OR(TrangthaiCV = 72)OR(TrangthaiCV =81))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1342: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];

}
function checknewTTGiaoDa($link,$Donvi){ // TT chưa giao NV thực hiện, hoặch KHTT yêu cầu thực hiện lại
	$sql    = 'Select Count(Mahoso) FROM hoso 
				WHERE Donvithuchien ="'.$Donvi.'" AND((TrangthaiKT =6)or(TrangthaiKT =81))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1402: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];
}

function checknewTTLuanchuyenDa($link,$Donvi){ // NV thực hiện xong, hoặch KHTT yêu cầu thực hiện lại
	$sql    = 'Select Count(Mahoso) FROM hoso 
				WHERE Donvithuchien ="'.$Donvi.'" AND((TrangthaiKT =7)or(TrangthaiKT =71)or(TrangthaiKT =72)or(TrangthaiKT =8)or(TrangthaiKT =81))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1402: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];
}


function checknewGiaoDA($link,$CBTheodoi){ // Chưa giao TT, 
	$sql    = 'Select Count(Mahoso) FROM hoso 
				WHERE CBTheodoi ="'.$CBTheodoi.'" AND ((TrangthaiKT =50)OR(TrangthaiKT =51)OR(TrangthaiKT =52)OR(TrangthaiKT =53))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1421: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];
}
function checknewLuanchuyenDA($link,$CBTheodoi){ // Chưa giao TT, 
	$sql    = 'Select Count(Mahoso) FROM hoso 
				WHERE CBTheodoi ="'.$CBTheodoi.'" AND ((TrangthaiKT=71)OR(TrangthaiKT=72)OR(TrangthaiKT=8)OR(TrangthaiKT=81))';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'lib-MySQL Error 1429: ' . $sql;   exit;	}
	$row = mysql_fetch_row($result);
	return $row[0];
}
//-------------------------------
function In_ChitietHS($Mahoso,$link){
	$sql ='Select STT,DATE_FORMAT(Ngaylaphoso,"%d-%m-%Y"), Nhanvienlap,DATE_FORMAT(Ngaytraspchokhach,"%d-%m-%Y"), 
			Loaikhachhang,Tenchudautu,DiachiCDT,Hotenkhachhang, Cvnguoidaidien,Sodienthoai, Email,Tenduan,Diadiemduan,
			Maquanhuyen,Nguonvon, Loaiduan,Nhomcongtrinh, Loaihoso, Ghichu, TrangthaiKT,CBtheodoi,DonviKT,HanNVtraKTchoTT,
			CanboKHTHGiaoKT,Ngaygiaothuchien,Donvithuchien,Ngayhenhoanthanh,NgayDvtrasanpham, NvThuchienDA,NgayhenNVTraKQ,
			ButpheTT, ButpheKHTH, Butphelanhdaovien,CbTTGiaoTH , Noidungduan   
			FROM hoso where Mahoso = "'.$Mahoso.'"';

				   
		   
	$result = mysql_query($sql, $link);
			if (!$result) {	thongbaoloi('Lỗi đọc hồ sơ :' . $sql);	 exit;	}
	$row = mysql_fetch_row($result);			

	$Tenloaihoso = htmlspecialchars($_POST['Tenloaihoso']);
	$Maloaihoso = $row[17];
	$Loaikhachhang = $row[4]; 
	if($Loaikhachhang=="1") {$ckkhachcanhan="checked"; $ckkhachtochuc=" ";}else {$ckkhachtochuc="checked";$ckkhachcanhan=" ";$Loaikhachhang="2";}
	
	
	$Ngaynhanhoso = $row[1];
	$Songayxulyhoso = trim(htmlspecialchars($_POST['Songayxulyhoso']));
	$Tenchudautu = $row[5]; //tên tổ chức
	$DiachiCDT = $row[6];
	$Tennguoidaidien = $row[7];
	$Cvnguoidaidien = $row[8];
	$Sodienthoai = $row[9];
	$Email = $row[10];
	$Tenduan = $row[11];
	$Diadiemduan = $row[12];
	$Maquanhuyen = $row[13];
	$Manguonvon = $row[14];
	$Maloaiduan = $row[15];
	$Manhomcongtrinh  = $row[16];
	$Ngaytraketqua =  $row[3];
	$STT_hoso =$row[0];		
	$Ghichu = $row[18];
	if($row[19]>0){$TrangthaiKT=$row[19];$Macanbotheodoi = $row[20]; $Matrungtamkt = $row[21]; $Madonvithuchien =$row[25];
	$Ngayhenhoanthanh = $row[26];$NvGiaothuchien =$row[23];}
	$ManhanvienTH =$row[28]; $NgayhenNVtraSP =$row[29];
	$ButpheTT =$row[30]; $ButpheKHTH=$row[31] ; $Butphelanhdaovien = $row[32];$CbTTGiaoTH = $row[33];
	$Nhanvienlap = $row[2];
	$Noidungduan = $row[34];
	
//--- Tạo bảng thông tin chi tiết ---------------	
$Border =0;	
echo '<small> Chi tiết hồ sơ: '.$Mahoso.'<br>';	
echo '<table class="ext1" bgcolor="#FFFFEE"  width ="100%"  cellpading="0" cellspacing="0" border="'.$Border.'">
    <tr><td width="1%"></td><td width="4%"></td><td width="7%"></td><td width="14%" ></td><td width="10%"></td><td width="8%"></td><td width="10%"></td><td width="7%"></td><td width="7%"></td><td width="14%" align="right"><i>Người nhận Hồ sơ:&nbsp;</td><td width ="10%"><input type ="text"   style="width:99%" name ="Nhanvienlap" readonly="readonly" value ='.$Nhanvienlap.'></td><td width ="4%"></td></tr>';

//dòng 2
	echo '<tr> <td height ="'.$Height1.'"></td>';
	
	echo '<td colspan="2" >Mã Hồ sơ:</td><td>
	<input type ="text" name="Mahoso" value ="'.$Mahoso.'" readonly ="readonly" style ="width:100%;font-size:12pt;height:'.$Height.'"></td>'; 
	
	$Songayxulyhoso = GetWorkingday2($Ngaynhanhoso,$Ngaytraketqua,$link);
	echo '<td align="right">Ngày nhận:&nbsp;</td><td ><input  type ="textbox" name ="Ngaynhanhoso" value ='.$Ngaynhanhoso.' style="width:100%; height:'.$Height2.'" readonly ="readonly"></td>';
	echo '<td align="right">Số ngày xử lý:&nbsp; </td><td ><input  style="width:100%;height:'.$Height2.'" type ="textbox" name ="Songayxulyhoso"  readonly ="readonly" value ='.$Songayxulyhoso.' ></td>';

	echo '<td align="right" colspan="2">Ngày hẹn trả sản phẩm:&nbsp;</td><td colspan="1"><input style="width:100%; height:'.$Height2.'" type="text" name ="Ngaytraketqua"  value ='.$Ngaytraketqua.' readonly ="readonly"></td><td></td>';
	echo '</tr>';

//dòng 1
    echo '<tr><td height ="'.$Height1.'"> </td>';
	echo  '<td colspan="2" width ="16%">Loại hồ sơ: </td><td colspan ="5" style="width:100%;height:'.$Height2.'">';
	List_loaihoso($link,$Maloaihoso,"disabled"); echo '</td>';
	
	echo '<td colspan ="3" align="right">&nbsp;Khách hàng:<input type ="radio" name = "Loaikhachhang" onchange ="this.form.submit()" value ="1" '.$ckkhachcanhan.' readonly ="readonly"> Cá nhân &nbsp;&nbsp;&nbsp;&nbsp;<input type ="radio" name = "Loaikhachhang"  value ="2" '.$ckkhachtochuc.' disabled>Tổ chức &nbsp;&nbsp;&nbsp;</td>';
	echo '<td></td>';
	echo '</tr>';	

//dòng 3

	if($Loaikhachhang=="2"){//khách hàng là tổ chức

	echo '<tr><td height ="'.$Height1.'"></td>';
	
	echo '<td colspan="2">Chủ đầu tư:</td><td colspan="3"><input type="text" name ="Tenchudautu" value ="'.$Tenchudautu.'" style="width:100%; height:'.$Height2.'" readonly ="readonly"></td>';
	echo '<td align="right">Địa chỉ CĐT:&nbsp;</td><td colspan ="5"><input type="text" name ="DiachiCDT" value = "'.$DiachiCDT.'" style="width:100%;height:'.$Height2.'" readonly ="readonly"></td>';
	echo '</tr>';
//dòng 4
	echo '<tr><td height ="'.$Height1.'"></td>';
	echo '<td colspan="2" >Người đại diện:</td><td><input  type="text" name ="Tennguoidaidien" value ="'.$Tennguoidaidien.'" style="width:100%;height:'.$Height2.'" readonly ="readonly"></td>';
	echo '<td align="right">Chức vụ:&nbsp;</td><td><input  type="text"  name ="Cvnguoidaidien" value ="'.$Cvnguoidaidien.'" style="width:100%;height:'.$Height2.'" readonly ="readonly"></td>';
	echo '<td align="right">Điện thoại:&nbsp; </td><td ><input type="text"  name ="Sodienthoai" value ="'.$Sodienthoai.'" style="width:100%;height:'.$Height2.'" readonly ="readonly"></td>';
	echo '<td align="right">Email:&nbsp;</td><td colspan="3"><input type="text" name ="Email" value ="'.$Email.'" style="width:100%;height:'.$Height2.'" readonly ="readonly"</td>';
	echo '</tr>';	
	}
	else {// Cá nhân
	echo '<tr><td height ="'.$Height1.'"></td>';
	echo '<td colspan="2" width ="16%">Khách hàng:</td><td colspan="3"><input  type="text" name ="Tennguoidaidien" value ="'.$Tennguoidaidien.'" style="width:100%;height:'.$Height2.'" readonly ="readonly"></td>';
	echo '<td align="right">Điện thoại:&nbsp; </td><td ><input type="text" size ="8" name ="Sodienthoai" style="width:100%;height:'.$Height2.'" value ="'.$Sodienthoai.'" readonly ="readonly"></td>';
	echo '<td align="right">Email:&nbsp;</td><td colspan ="2"><input type="text" name ="Email" value ="'.$Email.'" style="width:100%;height:'.$Height2.'" readonly ="readonly"></td><td></td>';
	echo '</tr>';	
	} 

//dòng 4
	echo '<tr><td height ="'.$Height1.'"></td>';
	echo '<td colspan="2">Tên dự án:</td><td colspan="9"><input type="text" style="width:100%;height:'.$Height2.'" name ="Tenduan" value ="'.$Tenduan.'" readonly ="readonly"></td>';
	echo '</tr>';
	echo '<tr><td height ="'.$Height1.'"></td>';
	echo '<td colspan="2">Nội dung D.A:</td><td colspan="9"><input type="text" style="width:100%;height:'.$Height2.'" name ="Noidungduan" value ="'.$Noidungduan.'" readonly ="readonly"></td>';
	echo '</tr>';
	echo '<tr><td></td>';
	echo '<td colspan="2">Địa điểm dự án:</td><td colspan="4"><input type="text" name ="Diadiemduan" style="width:100%;height:'.$Height2.'" value ="'.$Diadiemduan.'" readonly ="readonly"></td>';
	echo '<td colspan="2" align="right"> Quận/huyện, thị xã:&nbsp;</td>';
	echo '<td colspan ="3">'; List_quanhuyen($link,$Maquanhuyen,"disabled");echo '</td>';
	echo '</tr>';

//dòng 5
	echo '<tr><td height ="'.$Height1.'"></td>';
	echo '<td colspan="2">Nguồn vốn:</td><td colspan ="1">'; List_nguonvon($link,$Manguonvon, "disabled");echo'</td>';
	echo '<td align ="right">Loại dự án:</td><td colspan="2">';  List_loaiduan($link,$Maloaiduan, "disabled");echo'</td>';
	echo '<td colspan="2" align="right">Nhóm công trình:&nbsp;</td><td colspan ="2">'; List_nhomcongtrinh($link, $Manhomcongtrinh,"disabled");echo'</td><td></td>';
	echo '</tr>';
	
//dòng 6
	echo '<tr><td height ="'.$Height1.'"></td>';
	
	echo '<td colspan="2" valign="top" >Ghi chú:</td align="right"><td colspan ="9"><textarea  rows ="2" name ="Ghichu" style="width:100%" readonly ="readonly">'.$Ghichu.'</textarea></td>';
	
	echo '</tr>';

//dòng 7
echo '<tr><td height ="'.$Height1.'"> </td><td colspan ="3"> <hr></td><td colspan ="8"></td></tr>';
	echo '<tr><td></td>';
		
if(trim($Mahoso)!=""){
	//-----------------Tài liệu đính kèm đã có trong csdl---------------
	$sql ='SELECT Matailieu, Tentailieu, Bangoc, Bansao, Tepdinhkem FROM tailieudinhkem WHERE Mahoso = "'.$Mahoso.'"';
	$result = mysql_query($sql, $link);
			if (!$result) {	thongbaoloi('Lỗi đọc tàiliệu đính kèm :' . $sql);	 exit;	}
	$STT_tailieu = mysql_num_rows($result);
	$max_STT_tailieu	= $STT_tailieu;
//	thongbaoloi('d601 - max:'. $max_STT_tailieu);
	if($STT_tailieu ==0)
	echo '<td colspan ="11" align="left"><b>Tài liệu đính kèm</b><i>(không có tài liệu đính kèm)</i></b></td></tr>';
	else{  //có tài liệu đính kèm 
	echo '<td colspan ="11" align="left"><b>Tài liệu đính kèm </b><i>('.$STT_tailieu. ' tài liệu đính kèm)</i></b></td></tr>';
	//-----------------------
	echo '<tr><td></td><td colspan="11">';
		echo '<table width="100%" class="ext1" border="1">';
		echo '<tr height="'.$Height1.'"><td width="4%" align="center">STT</td><td width="48%">Tên tài liệu</td><td width="9%" align="center">Số Bản gốc</td><td width="9%" align="center">Bản sao</td><td >Tệp đính kèm</td>';
		echo '</tr>';
	
//dòng 8
	
	//-----------------Lặp với mỗi mục Tài liệu đính kèm đã có trong csdl---------------
	for($k=1; $k <= $STT_tailieu; $k++){ 
		$row = mysql_fetch_row($result);	
		if ($row[0]>$max_STT_tailieu) $max_STT_tailieu = $row[0];// tài liệu thêm mới bắt đầu từ số $max_STT_tailieu		
		$Mamuctailieu = 'ten'.$k; ////$Mamuctailieu = 'ten'.$row[0]; //
		$Mabangoc="goc".$k; $Mabansao="sao".$k; $Mafiledinhkem = "tep".$k;
		$tentailieu =  $row[1]; ;
		$tentep =  $row[4]; 
		$ckbangoc =$row[2]; $ckbansao = $row[3];
		//if($row[3]=="1") $ckbansao = "checked"; else $ckbansao="";
		//thongbaoloi('ten:'.$Mafiledinhkem.'-'.$tentep);
		$Xoatl ="Xoa".$k;$Matlcapnhat ="Matl".$k;
		
		echo '<tr><td align="center"><input type ="hidden" name = "'.$Matlcapnhat.'" value = "'.$row[0].'">'.$k.'</td>';// <input type = "checkbox" name = "'.$Xoatl.'" value = "'.$row[0].'">  '.$k.'</td>';
		echo '<td><input type ="text"  name ="'.$Mamuctailieu.'" value ="'.$tentailieu.'" style="width:100%;height:'.$Height2.'" readonly="readonly"></td>
		      <td><input type ="text" name="'.$Mabangoc.'" style ="width:100%;text-align:center;height:'.$Height2.'" value =' .$ckbangoc.' readonly="readonly"></td>
			  <td><input type ="text" name="'.$Mabansao.'" style ="width:100%;text-align:center;height:'.$Height2.'" value =' .$ckbansao.' readonly="readonly"></td>';
		if (!empty($tentep))
			
			echo '<td ><a href="data/'.$tentep.'" download>'.$tentep.'</a></td>';
		else 
			echo '<td >----</td>';
		echo '</tr>';
		
	}
	}	
	} 
	echo '</table>';
	echo '</div>';
	
///-----------------------------------------------------------Bút phê ----------------	
	$ButpheTT =$ButpheKHTH = $Butphelanhdaovien =$DiengiaiKT="";
	echo'<hr>';
	echo '<input type ="checkbox" Id ="Ckbutphe" value ="1" checked onclick="setVisibility();">Bút phê';
		
	echo '<fieldset id ="butphe" class="styleset" style="width: 100%; height:110px;border-style: solid; border-width: 0px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">';		    
	
	echo '<table width="100%" border="0">
	<tr><td width="40%"><b><i>Ý kiến Lãnh đạo TT</td><td width="30%"> <b><i>Ý kiến LĐ Phòng KHTH</td><td width="30%"><b><i>Bút phê của Lãnh đạo Viện</td></tr>';
	
	echo'<tr><td>';
	
	echo '<div style="width: 98%; height:70px;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 0px; padding-right: 0px; padding-top: 1px; padding-bottom: 1px">';
		$sql1 = 'Select DATE_FORMAT(Ngayghi,"%d/%m"), Noidung,Nguoighi From butphett WHERE Mahoso ="'.$Mahoso.'"ORDER BY Ngayghi';
		$result1 = mysql_query($sql1, $link);
		$Tongso = mysql_num_rows($result1);
		for($k=1; $k <= $Tongso; $k++){ 
				$row1 = mysql_fetch_row($result1);	
				echo $row1[0].':'.$row1[1].'<br>';
		}
		echo '</div>';
		//echo'<textarea  rows ="2" name ="ButpheTT" style="width:99%" readonly ="readonly">'.$ButpheTT.' </textarea>
	echo'</td>';
	echo'<td >
		<div style="width: 98%; height:70px;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 0px; padding-right: 0px; padding-top: 1px; padding-bottom: 1px">';
		$sql1 = 'Select DATE_FORMAT(Ngayghi,"%d/%m"), Noidung,Nguoighi From butphekhth WHERE Mahoso ="'.$Mahoso.'"ORDER BY Ngayghi';
		$result1 = mysql_query($sql1, $link);
		$Tongso = mysql_num_rows($result1);
		for($k=1; $k <= $Tongso; $k++){ 
				$row1 = mysql_fetch_row($result1);	
				echo $row1[0].':'.$row1[1].'<br>';
		}
		echo '</div>';
		//echo '<textarea  rows ="2" name ="ButpheKHTH" style="width:99%" readonly ="readonly">'.$ButpheKHTH.' </textarea>
	echo'</td>';
	echo '<td >
		<div style="width: 98%; height:70px;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 0px; padding-right: 0px; padding-top: 1px; padding-bottom: 1px">';
		$sql1 = 'Select DATE_FORMAT(Ngayghi,"%d/%m"), Noidung,Nguoighi From butpheldvien WHERE Mahoso ="'.$Mahoso.'"ORDER BY Ngayghi';
		$result1 = mysql_query($sql1, $link);
		$Tongso = mysql_num_rows($result1);
		for($k=1; $k <= $Tongso; $k++){ 
				$row1 = mysql_fetch_row($result1);	
				echo $row1[0].':'.$row1[1].'<br>';
		}
		echo '</div>';
		//echo'<textarea  rows ="2" name ="Butphelanhdaovien" style="width:99%" readonly ="readonly">'.$Butphelanhdaovien.' </textarea>
	
	echo'</td></tr>';
	
	//echo '</tr>';
	
	echo '</table>';
	
	echo '</fieldset>';
	
	echo'<hr>';
	//echo '<script>document.getElementById("butphe").style.display = "none";</script>';
	echo '<script>document.getElementById("Ckbutphe").focus();</script>';


}
function lastdayofmonth($year,$mon){
	if(($mon==1)||($mon==3)||($mon==5)||($mon==7)||($mon==8)||($mon==10)||($mon==112)) return 31;
	else 
	if($mon!=2) return 30;
	else
		if(($year%4!=0)||(($year%4==0)&&($year%100!=0)||($year%400==0)))//nam khong nhuan
			return 29;
		else return 28;

	//return 28;
}
function kh_duocsuahs($TrangthaiKT){
	if(($TrangthaiKT==-2)or($TrangthaiKT==0)or($TrangthaiKT==3)or($TrangthaiKT==13)or($TrangthaiKT==30)) 
		 return true;
	else return false;
}	
function hsCanBosung	($TrangthaiKT){
	if(($TrangthaiKT==3)or($TrangthaiKT==13)or($TrangthaiKT==30)or($TrangthaiKT==4)or($TrangthaiKT==40)) 
		 return true;
	else return false;
}
function  XacdinhTheodoi($link){
	$sql    = 'Select SoluongCB, CbDaphan FROM cbtheodoihs 	WHERE 1';
	$result = mysql_query($sql, $link);
	if (!$result) {	echo 'Lỗi đọc danh sách cán bộ theo dõi: ' . $sql; 	exit;	}
	$row = mysql_fetch_row($result);
	$SoluongCB=$row[0]; $CbDaphan =$row[1];
	if($CbDaphan< $SoluongCB) $CbDaphan++; else $CbDaphan=1;
	
	$sql1    = 'Select Tendangnhap FROM nguoidung	WHERE (motcua=1) AND (Donvi="KHTH")  ORDER BY Tendangnhap';
	$result1 = mysql_query($sql1, $link);
	if (!$result) {	echo 'Lỗi đọc danh sách cán bộ theo dõi 1: ' . $sql1; 	exit;	}
	for($k=1; $k<$CbDaphan; $k++)
		$row1 = mysql_fetch_row($result1);
	$row1 = mysql_fetch_row($result1);
	$MaCbTheodoi=$row1[0];
	//Cập nhật cbtheodoihs
	$sql2    = 'UPDATE cbtheodoihs 	SET CbDaphan ='.$CbDaphan.' WHERE 1';
	$result2 = mysql_query($sql2, $link);
	if (!$result2) {	echo 'Lỗi đọc danh sách cán bộ theo dõi: ' . $sql2; 	exit;	}
	return $MaCbTheodoi;
	
}
function cet_List_status($link,$Trangthai,$on_off =" ", $onsubmit=0){
	
	$sql    = 'Select code, name from cet_status Where (1) ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="Trangthaikythi" '.$on_off.' style="font-size:12pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> ----- </option>';
	else 
		$B_form = '<select size ="1" name ="Trangthaikythi"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%" ><option value ="0"> ----- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Trangthai)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;

}

function cet_log($link, $logcode, $logname, $user=""){
	
	if($user=="")$user = $_COOKIE['name'];
	$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
	$sql = 'INSERT INTO cet_history (Ma,Ngaycapnhat,Noidungcapnhat, Canbocapnhat) 
		    VALUE("'.$logcode.'","'.$datetime .'","'.$logname .'","' .$user.'")';
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql);	 exit;	}
}
function cet_log2($link,$Ma, $Macapnhat, $Noidungcapnhat, $Canbocapnhat =" ", $Ghichu=" "){// Chuẩn hóa cet_log

	if($Canbocapnhat=="") $Canbocapnhat = $_COOKIE['name'];
	
	$sql = 'INSERT INTO cet_history (Ma, Macapnhat, Noidungcapnhat, Canbocapnhat,Ghichu) 
		    VALUE("'.$Ma.'","'.$Macapnhat.'","'.$Noidungcapnhat.'","'.$Canbocapnhat.'","'.$Ghichu.'")';

	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql);	 exit;	}
}

function cet_logstudent($link, $logcode, $logname, $user="",$ghichu=""){
		
	$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
	$sql = 'INSERT INTO cet_st_history (Ma, Ngaycapnhat,Noidungcapnhat, Canbocapnhat,Ghichu) 
		    VALUE("'.$logcode.'","'.$datetime .'","'.$logname .'","' .$user.'","'.$Ghichu.'")';
	
	$result = mysql_query($sql, $link);
	if (!$result) {	thongbaoloi('Lỗi ghi lịch  sử cập nhật :' . $sql);	 exit;	}
}
function cet_get_status($code){
	if($code==0) return "Mở";
	else if($code==1) return "Đóng đăng ký";
	else if($code==2) return "Đã thi";
	else if($code==-1) return "Đã hủy";
	else return " --- ";
}
function stop($s){
	print $s; exit;
} 
function me($s){ thongbaoloi($s);}
//-----------------------------list kỳ thi ---------------------------------
function cet_List_Kythi($link,$MaKythi,$on_off =" ", $onsubmit=0){
	
	$sql    = 'Select Makythi, Tenkythi from cet_kythi Where Trangthai=0 ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="MaKythi"   '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="this.form.submit()" readonly="readonly"><option value ="0"> -Chọn Kỳ thi- </option>';
	else 
		$B_form = '<select size ="1" name ="MaKythi"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%" readonly="readonly"><option value ="0"> -Chọn Kỳ thi- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$MaKythi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//-------------------------------------------------------
function cet_List_Kythi2($link,$MaKythi,$on_off =" ", $onsubmit=0){
	
	$sql    = 'Select Makythi, Tenkythi from cet_kythi Where Trangthai=0 ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="MaKythi"   '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="Java:presubmit()" readonly="readonly"><option value ="0"> -Chọn Kỳ thi- </option>';
	else 
		$B_form = '<select size ="1" name ="MaKythi"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%" readonly="readonly"><option value ="0"> -Chọn Kỳ thi- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$MaKythi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//-------------------------------------------------------
function cet_List_Kythi3($link,$Tenbien, $Makythi,$on_off =" ", $onsubmit=0){
	//me('on:'.$onsubmit.':'.$Tenbien.':'.$Makythi);
	$sql    = 'Select Makythi, Tenkythi FROM cet_kythi Where Trangthai=0 ';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'"   '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="this.form.submit()" ><option value ="0"> -Chọn Kỳ thi- </option>';
	else 
		$B_form = '<select size ="1" name ="'.$Tenbien.'"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%"><option value ="0"> -Chọn Kỳ thi- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Makythi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//---------------------------------------------------------
function cet_List_Dantoc($link, $Tenbien, $Madantoc, $on_off=" "){
	
	$sql    = 'Select IdDantoc, Tendantoc from cet_dantoc WHERE  1';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn dân tộc- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Madantoc)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	return $B_form;
}

//---------------------------------------------------------
function cet_List_khuvuc($link, $Tenbien, $Makhuvuc, $on_off=" "){
	
	$sql    = 'Select Makhuvuc, Tenkhuvuc from cet_khuvuc WHERE  1';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn khu vực- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Makhuvuc)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	return $B_form;
}
//---------------------------------------------------------
function cet_List_doituong($link, $Tenbien, $Madoituong, $on_off=" "){
	$sql    = 'Select Madoituong, Tendoituong from cet_doituonguutien WHERE  1';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn đối tượng ưu tiên- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Madoituong)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	return $B_form;
}
//------------------------------------------------------------------------------
function cet_List_cumthi($link, $Tenbien, $Macumthi, $on_off=" "){
	$sql    = 'Select Macumthi, Tencumthi from cet_cumthi WHERE  1';

	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn Cụm thi- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Macumthi)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//------------------------------------------------------------------------------
function cet_List_Diemthi($link, $Tenbien,  $Makythi,$Madiemthi, $on_off=" ", $onsubmit =0){
	
	//me('on:'.$onsubmit.':'.$Tenbien.':'.$Makythi);
	$sql    = 'Select A.Madiadiem,Tendiadiem FROM  cet_kythi_diadiem A JOIN cet_diadiemthi B ON (A.Madiadiem = B.Madiadiem) WHERE  Makythi ="'.$Makythi.'"';
	
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.'  style="font-size:11pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> -Chọn địa điểm thi- </option>';
	else

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn địa điểm thi- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Madiemthi)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[0].'-'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[0].'-'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//------------------------------------------------------------------------------
function cet_List_Monthi($link, $Tenbien,  $Makythi,$Madiemthi,$Mamonthi, $on_off=" ", $onsubmit =0){
	
	//me('on:'.$onsubmit.':'.$Tenbien.':'.$Makythi);
	$sql    = 'Select A.Mamonthi,Tenmonthi FROM  cet_mon_cathi A JOIN cet_monthi B ON (A.Mamonthi = B.Mamonthi) 
	WHERE  Makythi ="'.$Makythi.'"  AND Madiemthi ="'.$Madiemthi.'" GROUP BY A.Mamonthi';
	
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:11pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> -Chọn môn thi- </option>';
	else

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn môn thi- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Mamonthi)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[0].'-'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[0].'-'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//------------------------------------------------------------------------------
function cet_List_Cathi($link, $Tenbien,  $Makythi,$Madiemthi,$Mamonthi,$Cathi, $on_off=" ", $onsubmit =0){
	
	
	$sql    = 'Select Cathi, checked  FROM  cet_mon_cathi A  
	WHERE  Makythi ="'.$Makythi.'"  AND Madiemthi ="'.$Madiemthi.'" AND Mamonthi ="'.$Mamonthi.'"';
	
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:11pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> -Chọn ca thi- </option>';
	else

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn ca thi- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Cathi)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[0].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[0].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}

//------------------------------------------------------------------------------
function cet_List_Cathi2($link, $Tenbien,  $Makythi,$Madiemthi,$Mamonthi,$Cathi, $on_off=" ", $onsubmit =0){
	/* Lấy các ca thi của $Makythi, $Madiemthi, $Mamonthi khác với $Cathi
	*/
	
	$sql    = 'Select Cathi, checked  FROM  cet_mon_cathi A  
	WHERE  Makythi ="'.$Makythi.'"  AND Madiemthi ="'.$Madiemthi.'" AND Mamonthi ="'.$Mamonthi.'" AND checked !="0" AND Cathi !="'.$Cathi.'"';
	
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:11pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> -Chọn ca thi- </option>';
	else

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn ca thi- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Cathi)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[0].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[0].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}

//--------------------------------------------------------------------------------------------
function cet_set_cathikhac($link,$Tendangnhap, $Makythi,$Madiemthi,$Mamonthi,$Cathi){
	
	$sql ='SELECT Cathi,checked	 
			FROM cet_student_cathi 
			WHERE (username = "'.$Tendangnhap.'" AND Makythi = "'.$Makythi.'" AND Madiemthi ="'.$Madiemthi.'"  AND Cathi !="'.$Cathi.'" AND checked =1 )';
	//stop($sql);
	$result = mysql_query($sql, $link);
	
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$B_form ="";
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
		if($i < mysql_num_rows($result))
			$B_form .= $row[0].', ';
		else $B_form .= $row[0];
		
	}//end for

	mysql_free_result($result);
	return $B_form;
}
//------------------------------------------------------------------------------
function cet_List_tinh($link, $Tenbien, $Matinh, $on_off=" ",$onsubmit=0){ 
	$sql    = 'Select Matinh, Tentinh from tinhtp WHERE  1';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:11pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> -Chọn Tỉnh/Tp- </option>';
	else

	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn Tỉnh/Tp- </option>';
	
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Matinh)
			$B_form .= '<option value ="'.$row[0].'" selected >'.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0].'">'.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}

//------------------------------------------------------------------------------
function cet_List_huyen($link, $Tenbien, $Matinh, $Mahuyen, $on_off=" ", $onsubmit=0){ 
	$sql    = 'SELECT Matinh, Mahuyen, Tenquanhuyen FROM  quanhuyen WHERE  Matinh = "'.$Matinh.'"';
	//return $sql.','.$Mahuyen;
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:11pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> ---------- </option>';
	else
	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn Quận/Huyện- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[1]==$Mahuyen)
			$B_form .= '<option value ="'.$row[1].'" selected >'.$row[2].' </option>';
		else
			$B_form .= '<option value ="'.$row[1].'">'.$row[2].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//------------------------------------------------------------------------------
function cet_List_truong($link, $Tenbien, $Mahuyen, $Matruong, $on_off=" ", $onsubmit=0){ 
	$sql    = 'SELECT  Mahuyen,Matruong, Tentruong FROM  truongthpt WHERE  Trangthai = 0 AND Mahuyen = "'.$Mahuyen.'"';
	//return $sql;
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="font-size:12pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> ---------- </option>';
	else
	$B_form = '<select size ="1" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn trường- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[1]==$Matruong)
			$B_form .= '<option value ="'.$row[1].'" selected >'.$row[2].' </option>';
		else
			$B_form .= '<option value ="'.$row[1].'">'.$row[2].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}

//----------------------------------------------------------------------------------------------------
//------------------------------
function cet_connect(){
	if(!$link = mysql_connect('localhost', 'cet_guest','guest123')){ 
		print 'Could not connect to mysql 1'; 	exit; 
		}
	if (!mysql_select_db('cet_dkythi', $link)) {
		print 'Could not select database 2';exit;	
		}
	mysql_query("SET NAMES utf8");
	return $link;
}
//------------------------------
function cet_Aconnect($u,$p){
	
	if(!$link = mysql_connect('localhost', $u,$p)){ 
		print 'Tài khoản đăng nhập không hợp lệ !'; 	exit; 
		}
	if (!mysql_select_db('cet_dkythi', $link)) {
		print 'Không thể kết nối Database';exit;	
		}
	mysql_query("SET NAMES utf8");
	return $link;
}
//------------------------------

function cet_Acheck($link ,$u,$p){
//$u="duyvb"; $p="rgbhjkm"
	$sql = 'SELECT mucquyen FROM cetusers WHERE tendangnhap ="'.$u.'" ';
	
	$result = mysql_query($sql, $link);
	if(mysql_num_rows($result)==0) return 0;
	$row  = mysql_fetch_row($result);
	return $row[0];	
	
}

//------------------------------
function cet_st_check($link ,$u,$p){

	$sql = 'SELECT tendangnhap FROM cet_student_acc WHERE tendangnhap ="'.$u.'" AND Matkhau = "'.$p.'"';
	
	$result = mysql_query($sql, $link);
		if(mysql_num_rows($result)>0) return true;
	return false;	
	
}
//------------------------------
function cet_info_check($link ,$u){

	$sql = 'SELECT tendangnhap FROM cet_student_info WHERE tendangnhap ="'.$u.'"';
	
	$result = mysql_query($sql, $link);
		if(mysql_num_rows($result)>0) return true;
	return false;	
	
}
//---------------------------------------------------upload file-------------
function cet_Uploadfile($fnamecode, $Mahoso){
	$name =" ";
	if($_FILES[$fnamecode]['name'] != NULL){ // Đã chọn file
                $path = "data/Anhhoso/"; // file ảnh sẽ lưu vào thư mục data
                $tmp_name = $_FILES[$fnamecode]['tmp_name'];
				$ext  = substr($_FILES[$fnamecode]['name'],-3);
                $name = $Mahoso.'.'.$ext;
                $type = $_FILES[$fnamecode]['type']; 
                $size = $_FILES[$fnamecode]['size']; 
				move_uploaded_file($tmp_name,$path.$name);
				
			}
    return $name;
}
function cet_HSupdatecheck($link, $username){
	$sql = 'SELECT Makythi FROM cet_student_cathi WHERE username ="'.$username .'"';
	$result = mysql_query($sql, $link);
	return true;
}
//--------------------------------------------------------------------------------------------------------------

function  cet_check_Trangthai_Dangky($link, $username, $Makythi){

	$Modangky =0; $Dongdangky = 1; $Dathi=2; $Dahuy =4; $Dongcapnhat = 3; $Gankythikhac = 10; $Dadangky = 11;
	$checkTrangthai = $Modangky;
	$kythicheck = Get_name($link,"cet_kythi","Trangthai", "Makythi",$Makythi) ;
	
	if($kythicheck!=$Modangky) { return $kythicheck; }
	
	
	//--if (dadangky)-----------------------------
	
	//$checkdadangky = Get_name($link,"cet_student_cathi", "Makythi","Makythi",$Makythi);
	//if($checkdadangky==$Makythi) return $Dadangky ;
	
	$sqldadangky = 'SELECT Makythi FROM cet_student_cathi WHERE (username ="'.$username.'" AND Makythi ="'.$Makythi.'")';
	//stop($sqldadangky );
	$result = mysql_query($sqldadangky,$link);
	if(mysql_num_rows($result)>0) return $Dadangky ;
	
	$songaygioihan  = Get_name($link,"cet_thamso_kythi", "Giatri", "Mathamso" , "Songaygiua");
	
	if($songaygioihan ==0) return $Modangky;
	
	//--- kiểm tra đăng kí gần -----
	$ngaythidukien = Get_name($link,"cet_kythi", "Tungay","Makythi",$Makythi);
	
	//me('ngay:'.$ngaythidukien);
	//--kỳ thi tôi đã đăng ký------
	$sqlkythidadangky ='SELECT B.MaKythi,Trangthai,Tungay,Toingay, Handangky 	
						FROM cet_student_cathi A JOIN cet_kythi B ON (A.Makythi=B.Makythi)	WHERE (username ="'.$username.'" AND B.Makythi !="'.$Makythi.'") GROUP BY B.Makythi';
	$result = mysql_query($sqlkythidadangky,$link);
	
	//stop('4:'.$sqlkythidadangky);
	
	for($k =1; $k <= mysql_num_rows($result); $k++){
		$row = mysql_fetch_row($result);
		//me('n:'.$row[2].'-'.$ngaythidukien.'='.($row[2]-$ngaythidukien));
		
		if(abs($row[2]-$ngaythidukien)<=$songaygioihan) return $Gankythikhac;
	}
	
	return $checkTrangthai;
}

//--------------------------------------------------------------------------------------------------------------
function  cet_check_XoaDangky($link, $username, $Makythi){

	$Modangky =0; $Dongdangky = 1; $Dathi=2; $Dahuy =4; $Dongcapnhat = 3; $Gankythikhac = 10; $Danoplephi = 12;
	$checkTrangthai = $Modangky;
	$kythicheck = Get_name($link,"cet_kythi","Trangthai", "Makythi",$Makythi) ;
	
	if($kythicheck!=$Modangky) { return $kythicheck; }
	//--- kiểm tra đã nộp lệ phí -----
		
	$sql ='SELECT Lephidanop FROM cet_dangkythi_lephi 	WHERE (username ="'.$username.'" AND Makythi ="'.$Makythi.'")';
	$result = mysql_query($sql,$link);
	//stop($sql);
	if(mysql_num_rows($result)==0) return $Modangky;
		
	$row = mysql_fetch_row($result);
	//me('c:'.$row[0]);
	if($row[0]>0) return $Danoplephi;
	
	mysql_free_result($result);
	return $Modangky;
}
//--------------------------------------------------------------------------------------------------------------
function Get_cet_student_ca($link,$username, $Makythi,$Madiemthi,$Mamonthi,$cathi){
	$sqlkythidadangky  = 'SELECT checked FROM cet_student_cathi 
	WHERE (username = "'.$username.'" AND Makythi="'.$Makythi .'"  AND  Madiemthi ="'. $Madiemthi.'"  AND Mamonthi = "'. $Mamonthi.'"  AND cathi = '.$cathi.')';
	//return $sql;
	$result = mysql_query($sqlkythidadangky,$link);
	if(mysql_num_rows($result)==0) return 0;
	$row = mysql_fetch_row($result);
	$kq =  $row[0];
	mysql_free_result($result);
	return $kq;
}
//---------------------------------------------------------
function cet_property_name($str){
	$str=trim($str);
	do{ 
		$a1 = str_replace("  "," ",$str);
		if($a1.length == $str.length) break;
		$str = $a1;
	}while(1);
	return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
}
//------------------------------------------------------------
function Get_Lephi($link,$Makythi,$Mamonthi){
	$sqllephi = 'SELECT Lephithi FROM cet_kythi_monthi WHERE (Makythi="'.$Makythi .'"  AND  Mamonthi = "'. $Mamonthi.'")';
	//stop($sqllephi);
	$result = mysql_query($sqllephi,$link);
	if(mysql_num_rows($result)==0) return 0;
	$row = mysql_fetch_row($result);
	$kq =  $row[0];
	mysql_free_result($result);
	return $kq;
}
//---------------------------------------------------------------------
function cet_getvalue($link, $Makythi,$Madiemthi,$Mamonthi,$Cathi){
	$sqlcount = 'SELECT count(*) FROM cet_student_cathi WHERE (Makythi="'.$Makythi .'"  AND  Madiemthi = "'. $Madiemthi.'" AND Mamonthi = "'. $Mamonthi.'" AND Cathi = "'. $Cathi.'" AND checked != 0)';
	//stop($sqlcount);
	$result = mysql_query($sqlcount,$link);
	if(mysql_num_rows($result)==0) return 0;
	$row = mysql_fetch_row($result);
	$kq =  $row[0];
	mysql_free_result($result);
	return $kq;
}

//---------------------------------------------------------------------
function cet_getvalue2($link, $Makythi,$Madiemthi){
	$sqlcount = 'SELECT count(*) FROM cet_student_cathi WHERE (Makythi="'.$Makythi .'"  AND  Madiemthi = "'. $Madiemthi.'" AND checked != 0)';
	//stop($sqlcount);
	$result = mysql_query($sqlcount,$link);
	if(mysql_num_rows($result)==0) return 0;
	$row = mysql_fetch_row($result);
	$kq =  $row[0];
	mysql_free_result($result);
	return $kq;
}
//----------------------------------------------------------------------
function Get_count_dangky($link, $Makythi,$Madiemthi,$Cathi){
	// Số thí sinh đã đăng ký tại(Kythi, Diemthi, Cathi)
	$sqlcount = 'SELECT count(*) FROM cet_student_cathi WHERE (Makythi="'.$Makythi .'"  AND  Madiemthi = "'. $Madiemthi.'" AND  Cathi = "'. $Cathi.'" AND checked != 0)';
	//stop($sqlcount);
	$result = mysql_query($sqlcount,$link);
	if(mysql_num_rows($result)==0) return 0;
	$row = mysql_fetch_row($result);
	$kq =  $row[0];
	mysql_free_result($result);
	return $kq;
}
//-------------------------------------------------
?>