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
class SimpleImage {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
 
}
//----------------------------------------------------------------------
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


//------------------------------------------------------------

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

function SoHD_YY($SHD){
	
	$i=strpos($SHD,'/'); 
		if($i) {$num = substr($SHD,0,$i);
				$yy = substr($SHD,$i+1,2);
				return (10000*$yy +$num);
		}
	return 0;
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

function cet_logstudent($link, $logcode, $logname, $user=" ",$ghichu=" "){
		
	$now = getdate();$datetime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].'-'.$now['minutes'];
	$sql = 'INSERT INTO cet_st_history (Ma, Ngaycapnhat,Noidungcapnhat, Canbocapnhat,Ghichu) 
		    VALUE("'.$logcode.'","'.$datetime .'","'.$logname .'","' .$user.'","'.$Ghichu.'")';
	//stop($sql);
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
//---------------------------------------------------------------------------------
//------Kỳ thi tôi đã đăng ký cần chuyển sang kỳ thi mới ----
function cet_List_Kythidangky($link,$Tenbien, $Makythi,$username, $on_off =" ", $onsubmit=0){
	/*
	$sql ='SELECT A.MaKythi,B.Tenkythi,B.Trangthai,DATE_FORMAT(B.Tungay,"%d/%m/%y"),DATE_FORMAT(B.Toingay,"%d/%m/%y"), 
			DATE_FORMAT(B.Handangky,"%d/%m/%y")	FROM cet_student_cathi A JOIN cet_kythi B 
		ON (A.Makythi = B.Makythi)
		WHERE (username ="'.$username.'") GROUP BY A.Makythi';
		
		
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'"   '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="this.form.submit()" ><option value ="0"> -Chọn Kỳ thi- </option>';
	else 
		$B_form = '<select size ="1" name ="'.$Tenbien.'"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%"><option value ="0"> -Chọn Kỳ thi- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
		$lephikythi =  Get_Lephikythi_thisinh($link,"Lephidangky",$row[0],$username);
		$lephidanop = Get_Lephikythi_thisinh($link,"Lephidanop",$row[0],$username);
		if($row[0]==$Makythi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' (Ngày thi: '.$row[3].'-'.$row[4].'; Lệ phí:'.$lephikythi.' - lệ phí đã nộp: '. $lephidanop.') </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' (Ngày thi: '.$row[3].'-'.$row[4].'; Lệ phí:'.$lephikythi.' - lệ phí đã nộp: '. $lephidanop.') </option>';
	}//end for
	*/
	//----Sửa 19/02/2021--- Lấy kỳ thi từ cet_kythi_lephi-------
	
	$sql ='SELECT A.MaKythi,B.Tenkythi,B.Trangthai,DATE_FORMAT(B.Tungay,"%d/%m/%y"),DATE_FORMAT(B.Toingay,"%d/%m/%y"), 
			DATE_FORMAT(B.Handangky,"%d/%m/%y"), Lephidangky, Lephidanop
			FROM cet_dangkythi_lephi A JOIN cet_kythi B 
			ON (A.Makythi = B.Makythi)
			WHERE (username ="'.$username.'" AND A.status =0 AND B.Trangthai=0)';
		
		
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'"   '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="this.form.submit()" ><option value ="0"> -Chọn Kỳ thi- </option>';
	else 
		$B_form = '<select size ="1" name ="'.$Tenbien.'"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%"><option value ="0"> -Chọn Kỳ thi- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
		//$lephikythi =  Get_Lephikythi_thisinh($link,"Lephidangky",$row[0],$username);
		//$lephidanop = Get_Lephikythi_thisinh($link,"Lephidanop",$row[0],$username);
		$lephikythi = $row[6];
		$lephidanop = $row[7];
		if($row[0]==$Makythi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' (Ngày thi: '.$row[3].'-'.$row[4].'; Lệ phí:'.$lephikythi.' - lệ phí đã nộp: '. $lephidanop.') </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' (Ngày thi: '.$row[3].'-'.$row[4].'; Lệ phí:'.$lephikythi.' - lệ phí đã nộp: '. $lephidanop.') </option>';
	}//end for
	
	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//---------------------------------------------------------------------------------
//------Kỳ thi mới mở tôi có thể chuyển sang (mới) ----
function cet_List_Kythimoimo($link,$Tenbien, $Makythi,$username, $on_off =" ", $onsubmit=0){
	
	$sql ='SELECT MaKythi,Tenkythi,Trangthai,DATE_FORMAT(Tungay,"%d/%m/%y"),DATE_FORMAT(Toingay,"%d/%m/%y"), 
		DATE_FORMAT(Handangky,"%d/%m/%y") 
		FROM cet_kythi WHERE (Trangthai = 0)AND(Taocathi=1) AND Makythi 
		NOT IN (SELECT MaKythi FROM cet_student_cathi WHERE username ="'.$username.'" GROUP BY Makythi)';
	
	//-----sửa 19/2/2021---- thay cet_student_cathi == cet_dangkythi_lephi--
	/*
	$sql ='SELECT MaKythi,Tenkythi,Trangthai,DATE_FORMAT(Tungay,"%d/%m/%y"),DATE_FORMAT(Toingay,"%d/%m/%y"), 
		DATE_FORMAT(Handangky,"%d/%m/%y") 
		FROM cet_kythi WHERE (Trangthai = 0)AND(Taocathi=1) AND Makythi 
		NOT IN (SELECT MaKythi FROM cet_dangkythi_lephi WHERE (username ="'.$username.'"))';
	*/	
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'"   '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="this.form.submit()" ><option value ="0"> -Chọn Kỳ thi- </option>';
	else 
		$B_form = '<select size ="1" name ="'.$Tenbien.'"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%"><option value ="0"> -Chọn Kỳ thi- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Makythi)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' (Ngày thi: '.$row[3].'-'.$row[4].') </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' (Ngày thi: '.$row[3].'-'.$row[4].') </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
//-------------------------------------------------------------------------------------------
// --- kiểm tra có thể chuyển kỳ thi $Makythi_old -> $Makythi_new được hay không ----
// --return 1: OK, k: Mã không thỏa mãn điều kiện chuyển (gần kỳ thi đã đăng ký khác)

function cet_check_chuyendangky($link,$username,$Makythi_old, $Makythi_new){
	$Modangky =0; $Dongdangky = 1; $Dathi=2; $Dahuy =4; $Dongcapnhat = 3; $Gankythikhac = 10; $Dadangky = 11;$Quahanchuyen=12;
	
	//--kiểm tra kỳ thi cũ còn thời hạn chuyển không --?
	//* -- lỗi không chạy ----
	$songaygioihan  = Get_name($link,"cet_thamso_kythi", "Giatri", "Mathamso" , "Hanchuyenkythi");
	$ngaythicanchuyen  = Get_name($link,"cet_kythi", "Tungay", "MaKythi" , $Makythi_old);
	$nowdate = date("Y-m-d");
	
	$first_date = strtotime($nowdate);  
	$second_date = strtotime($ngaythicanchuyen); 
	$datediff = ($second_date - $first_date)/(24*3600); 
	if($datediff < $songaygioihan) 
		return $Quahanchuyen ;

	//------------------------------------------------------------------------
	$songaygioihan  = Get_name($link,"cet_thamso_kythi", "Giatri", "Mathamso" , "Songaygiua");
	
	if($songaygioihan ==0) return 1; 
	
	//--- kiểm tra đăng ký gần với kỳ thi khác đã đăng ký -----
	$ngaythidukien = Get_name($link,"cet_kythi", "Tungay","Makythi",$Makythi_new);
	
	//me('ngay:'.$ngaythidukien);
	//--kỳ thi tôi đã đăng ký------
	$sqlkythidadangky ='SELECT B.MaKythi,Trangthai,Tungay,Toingay, Handangky 	
						FROM cet_student_cathi A JOIN cet_kythi B ON (A.Makythi=B.Makythi)	WHERE (username ="'.$username.'" AND B.Makythi !="'.$Makythi.'") GROUP BY B.Makythi';
	$result = mysql_query($sqlkythidadangky,$link);
	
	//stop('4:'.$sqlkythidadangky);
	
	for($k =1; $k <= mysql_num_rows($result); $k++){
		$row = mysql_fetch_row($result);
		if($row[0]==$Makythi_old) continue;
		
		$first_date = strtotime($ngaythidukien);  
		$second_date = strtotime($row[2]); 
		$datediff = abs($second_date - $first_date)/(24*3600); 
		if($datediff<$songaygioihan) return $row[0]; //$Gankythikhac;
	}
	return 1;//--1: OK - có thể chuyển
}
//--------------------------------------------------------------------------------------------
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
function cet_List_tinh2($link, $Tenbien, $TenSelectBoxhuyen, $TenSelectBoxtruong, $Matinh, $on_off=" ",$onsubmit=0){ 
	
	$sql    = 'Select Matinh, Tentinh from tinhtp WHERE  1';
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" id ="'.$Tenbien.'" name ="'.$Tenbien.'" '.$on_off.' style="font-size:11pt;height:27px;" onchange ="bindingHuyen(\''.$Tenbien. '\',\'' . $TenSelectBoxhuyen . '\',\'' . $TenSelectBoxtruong.'\');"><option value ="0"> -Chọn Tỉnh/Tp- </option>';
	else

	$B_form = '<select size ="1" id ="'.$Tenbien.'" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn Tỉnh/Tp- </option>';
	
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
function cet_List_huyen2($link, $Tenbien, $TenSelectBoxtruong, $Matinh, $Mahuyen, $on_off=" ", $onsubmit=0){ 
	$sql    = 'SELECT Matinh, Mahuyen, Tenquanhuyen FROM  quanhuyen WHERE  Matinh = "'.$Matinh.'"';
	//return $sql.','.$Mahuyen;
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	if($onsubmit==1)
		$B_form = '<select size ="1" id ="'.$Tenbien.'" name ="'.$Tenbien.'" '.$on_off.' style="font-size:11pt;height:27px;" onchange ="bindingTruong(\''.$Tenbien . '\',\''.$TenSelectBoxtruong.'\')"><option value ="0"> ---------- </option>';
	else
	$B_form = '<select size ="1" id ="'.$Tenbien.'" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:11pt" >;<option value ="0"> -Chọn Quận/Huyện- </option>';
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
		$B_form = '<select size ="1" id ="'.$Tenbien.'" name ="'.$Tenbien.'" '.$on_off.' style="font-size:12pt;height:27px;" onchange ="this.form.submit();"><option value ="0"> ---------- </option>';
	else
	$B_form = '<select size ="1" id ="'.$Tenbien.'" name ="'.$Tenbien.'" '.$on_off.' style="height:27px;font-size:12pt" >;<option value ="0"> -Chọn trường- </option>';
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
function cet_ListAuser($link,$Tenbien, $Tendangnhap,$on_off =" ", $onsubmit=0){
	
	$sql    = 'Select Tendangnhap,Hoten from cetusers Where (1) ';
	//stop($sql);
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	
	if($onsubmit==1)
		$B_form = '<select size ="1" name ="'.$Tenbien.'"   '.$on_off.' style="font-size:12pt;height:27px;width:100%" onchange ="this.form.submit()" readonly="readonly"><option value ="0"> -Chọn tài khoản cần sửa- </option>';
	else 
		$B_form = '<select size ="1" name ="'.$Tenbien.'"  '.$on_off.'  style="font-size:12pt;height:27px;width:100%" readonly="readonly"><option value ="0"> -Chọn tài khoản cần sửa- </option>';
	for($i=1; $i<=mysql_num_rows($result); $i++){
		$row = mysql_fetch_row($result);
	
		if($row[0]==$Tendangnhap)
			$B_form .= '<option value ="'.$row[0]. '" selected >'.$row[0].' - '.$row[1].' </option>';
		else
			$B_form .= '<option value ="'.$row[0]. '">'.$row[0].' - '.$row[1].' </option>';
	}//end for

	$B_form .= '</select>';
	mysql_free_result($result);
	return $B_form;
}
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

function cet_Acheckhash($link,$u,$p){ // -- mật khẩu có mã hóa ---

	$sql = 'SELECT Matkhau FROM cetusers WHERE tendangnhap ="'.$u.'"';
	//stop ($sql);
	//*
	$result = mysql_query($sql, $link); 
	//stop ('123');
	
	if(mysql_num_rows($result)<=0) return false;
	$row  = mysql_fetch_row($result);
	
	
	if(password_verify ($p , $row[0])) return true;
	return false;	
	//*/
}

//------------------------------
//------------------------------
function cet_st_check($link,$u,$p){// -- mật khẩu không mã hóa ---

	$sql = 'SELECT tendangnhap FROM cet_student_acc WHERE tendangnhap ="'.$u.'" AND password = "'.$p.'"';
	
	$result = mysql_query($sql, $link);
	if(mysql_num_rows($result)>0) return true;
	return false;	
	
}
function cet_st_check_hoso($link,$username){//kiểm tra hồ sơ đã có

	$sql = 'SELECT SOCMND FROM cet_student_info WHERE tendangnhap ="'.$username.'"';
	
	$result = mysql_query($sql, $link);
	if(mysql_num_rows($result)>0) return true;
	return false;	
	

}
//------------------------------

function cet_st_checkhash($link,$u,$p){ // -- mật khảu mã hóa ---

	$sql = 'SELECT Password FROM cet_student_acc WHERE tendangnhap ="'.$u.'"';
	//stop ($sql);
	//*
	$result = mysql_query($sql, $link); 
	//stop ('123');
	
	if(mysql_num_rows($result)<=0) return false;
	$row  = mysql_fetch_row($result);
	
	
	if(password_verify ($p , $row[0])) return true;
	return false;	
	//*/
}

//------------------------------
function cet_info_check($link ,$u){

	$sql = 'SELECT tendangnhap FROM cet_student_info WHERE tendangnhap ="'.$u.'"';
	
	$result = mysql_query($sql, $link);
		if(mysql_num_rows($result)>0) return true;
	return false;	
	
}
//---------------------------------------------------upload file-------------
function cet_Uploadfile_old($fnamecode, $Mahoso){
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
//---------------------------------------------------upload file-------------
function cet_Uploadfile($fnamecode, $Mahoso){ //--- cập nhật resize_image --- 4/2/2021---, kiểm tra tệp upload là ảnh
	$name =" ";
	if($_FILES[$fnamecode]['name'] != NULL){ // Đã chọn file
		$image = new SimpleImage();
                $path = "data/Anhhoso/"; // file ảnh sẽ lưu vào thư mục data
                //$tmp_name = $_FILES[$fnamecode]['tmp_name'];
				
				$url = getimagesize($_FILES[$fnamecode]['tmp_name']);
				if (!is_array($url)) me ('ảnh hồ sơ không hợp lệ !!');
			
		$image->load($_FILES[$fnamecode]['tmp_name']);
				$ext  = substr($_FILES[$fnamecode]['name'],-3);
                $name = $Mahoso.'.'.$ext;
		$image->resize(120, 180);
                $type = $_FILES[$fnamecode]['type']; 
                $size = $_FILES[$fnamecode]['size']; 
				//move_uploaded_file($tmp_name,$path.$name);
		$image->save($path.$name);
		//me('ok');		
			}
    return $name;
	
	//$target_dir = "your-uploaded-images-folder/";
    //$target_file = $path . basename($_FILES[$html_element_name]["name"]);
    
    
    //$image->load($_FILES[$html_element_name]['tmp_name']);
    //$image->resize($new_img_width, $new_img_height);
    //$image->save($target_file);
    //return $target_file; //return name of saved file in case you want to store it in you database or show confirmation message to user
 
}
function cet_HSupdatecheck($link, $username){
	$sql = 'SELECT Makythi FROM cet_student_cathi WHERE username ="'.$username .'"';
	$result = mysql_query($sql, $link);
	return true;
}
//--------------------------------------------------------------------------------------------------------------
//cet_check_Trangthai_Dangky_chuyen($link, $username,$Makythi,$Makythi_old)
//--sửa 18/2/2021 - thêm Makythi_old : để 
//--Kiểm tra username có thể chuyển đợt thi Makythi_old -> Makythi(_new) ??

function  cet_check_Trangthai_Dangky_chuyen($link, $username, $Makythi,$Makythi_old){

	$Modangky =0; $Dongdangky = 1; $Dathi=2; $Dahuy =4; $Dongcapnhat = 3; $Gankythikhac = 10; $Dadangky = 11;
	$checkTrangthai = $Modangky;
	$kythicheck = Get_name($link,"cet_kythi","Trangthai", "Makythi",$Makythi) ;
	
	if($kythicheck!=$Modangky) { return $kythicheck; }
	
	/*
	//--if (dadangky)-----------------------------
	
	//$checkdadangky = Get_name($link,"cet_student_cathi", "Makythi","Makythi",$Makythi);
	//if($checkdadangky==$Makythi) return $Dadangky ;
	
	$sqldadangky = 'SELECT Makythi FROM cet_student_cathi WHERE (username ="'.$username.'" AND Makythi ="'.$Makythi.'")';
	//stop($sqldadangky );
	$result = mysql_query($sqldadangky,$link);
	if(mysql_num_rows($result)>0) return $Dadangky ;
	*/
	$songaygioihan  = Get_name($link,"cet_thamso_kythi", "Giatri", "Mathamso" , "Songaygiua");
	
	if($songaygioihan ==0) return $Modangky;
	
	//--- kiểm tra đăng kí gần -----
	$ngaythidukien = Get_name($link,"cet_kythi", "Tungay","Makythi",$Makythi);
	
	//me('ngay:'.$ngaythidukien);
	//--kỳ thi tôi đã đăng ký------
	$sqlkythidadangky ='SELECT B.MaKythi,Trangthai,Tungay,Toingay, Handangky 	
						FROM cet_student_cathi A JOIN cet_kythi B ON (A.Makythi=B.Makythi)	
						WHERE (username ="'.$username.'" AND B.Makythi !="'.$Makythi.'") GROUP BY B.Makythi';
	$result = mysql_query($sqlkythidadangky,$link);
	
	//stop('4:'.$sqlkythidadangky);
	
	for($k =1; $k <= mysql_num_rows($result); $k++){
		$row = mysql_fetch_row($result);
		//me('n:'.$row[2].'-'.$ngaythidukien.'='.($row[2]-$ngaythidukien));
		if($row[0] == $Makythi_old) continue; // Bỏ qua kiểm tra kỳ thi cũ cần chuyển
	
		$first_date = strtotime($ngaythidukien);  
		$second_date = strtotime($row[2]); 
		$datediff = ($second_date - $first_date)/(24*3600);// return $datediff;
		if(abs($datediff)<=$songaygioihan) return $Gankythikhac;
	}
	
	return $checkTrangthai;
}

//--------------------------------------------------------------------------------------------------------------
//--Cập nhật:  18/2/2021 
//--Kiểm tra username có thể đăng ký Makythi ??
function  cet_check_Trangthai_Dangky($link, $username, $Makythi){

	$Modangky =0; $Dongdangky = 1; $Dathi=2; $Dahuy =4; $Dongcapnhat = 3; $Gankythikhac = 10; $Dadangky = 11;
	$checkTrangthai = $Modangky; $Quahandangky = 13; $Dahuykythi = 14;
	$kythicheck = Get_name($link,"cet_kythi","Trangthai", "Makythi",$Makythi) ;
	
	if($kythicheck!=$Modangky) { return $kythicheck; }
	//---check Quá hạn đăng ký------
		$now = date("Y-m-d");
		$Handangky  = Get_name($link,"cet_kythi","Handangky", "Makythi",$Makythi);
		if($now >$Handangky) return  $Quahandangky;
	
	
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
						FROM cet_student_cathi A JOIN cet_kythi B ON (A.Makythi=B.Makythi)	
						WHERE (username ="'.$username.'" AND B.Makythi !="'.$Makythi.'") GROUP BY B.Makythi';
	$result = mysql_query($sqlkythidadangky,$link);
	
	//stop('4:'.$sqlkythidadangky);
	
	for($k =1; $k <= mysql_num_rows($result); $k++){
		$row = mysql_fetch_row($result);
		//me('n:'.$row[2].'-'.$ngaythidukien.'='.($row[2]-$ngaythidukien));
		
	
	$first_date = strtotime($ngaythidukien);  
	$second_date = strtotime($row[2]); 
	$datediff = ($second_date - $first_date)/(24*3600);// return $datediff;
	if(abs($datediff)<=$songaygioihan) return $Gankythikhac;
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
//------------------------------------------------------------
function Get_Lephikythi_thisinh($link,$Fieldname,$Makythi,$Thisinh){
	$sqllephi = 'SELECT '.$Fieldname.' FROM cet_dangkythi_lephi WHERE (Makythi="'.$Makythi .'"  AND  username = "'. $Thisinh.'")';
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

//------------------------------------------------------------------------------
function cet_Json_huyen($link, $Matinh){ 
	$sql    = 'SELECT Mahuyen, Tenquanhuyen FROM  quanhuyen WHERE  Matinh = "'.$Matinh.'"';
	//return $sql.','.$Mahuyen;
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$jsonResult = array();
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

	$jsonResult[$row[0]] =$row[1];
	}
	mysql_free_result($result);
	return $jsonResult;
}
//------------------------------------------------------------------------------
function cet_Json_truong($link, $Mahuyen){ 
	$sql    = 'SELECT Matruong, Tentruong FROM  truongthpt WHERE  Mahuyen = "'.$Mahuyen.'"';
	//return $sql.','.$Mahuyen;
	$result = mysql_query($sql, $link);
	if (!$result) {  echo 'MySQL Error 3: ' . $sql;   exit;	}
	$jsonResult = array();
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	
	$jsonResult[$row[0]] =$row[1];
	}
	mysql_free_result($result);
	return $jsonResult;
}
?>