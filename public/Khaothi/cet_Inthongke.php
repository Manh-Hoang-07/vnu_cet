<!---
//---------------------------------------Mô tả-----------------------------------------------
// Module: InThongkeDK.php
// Chức năng: In Thống kê  thí sinh đăng ký thi
// Phiên bản: 1.1
// Thời gian: tháng 1/2021
// Chủ quản: Trung tâm Khảo Thí - ĐHQGHN (CET)
// Nhóm thực hiện: ĐHCN-ĐHQGHN
// 
//--------------------------------------------------------------------------------------------
-->
<?php
	session_start();
	require_once('Libs/lib.php');
	require_once('tcpdf59/tcpdf.php');
//-----------------------/Các hàm-------------------------------------------
	//$link = cet_connect();
	$username  = $_SESSION['cetAusbaomat'];
	$password  = $_SESSION['cetpAusbaomat'];
	
	if(empty($username)) {thongbaoloi1("Bạn chưa đăng nhập"); exit;}
	
	if (!$link = cet_Aconnect($username, $password)) {thongbaoloi('Đăng nhập không hợp lệ !'); exit;}
	mysql_query("SET NAMES utf8");	
	//$auth = Get_name($link,"cetusers","Mucquyen","Tendangnhap",$username);
	//if($auth !=3){thongbaoloi('Bạn không có chức năng sửa thông tin  tài khoản!!'); exit;}
	$userfullname = Get_name($link,"cetusers","Hoten","Tendangnhap",$username);
	$Width =   Get_name($link,"cet_table_color","Giatri","Mathamso","Width");
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");
	$Height2 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height2");
//------------------------------------------------------------------------------------------------------------	
	$Height	 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height");
	$Height1 = Get_name($link,"cet_table_color","Giatri","Mathamso","Height1");

//-------------------------------------------------------------------------------------------------------------
ob_start (); 
$pdf = new TCPDF('P', 'pt', 'A4');

$pdf->SetCreator(PDF_CREATOR);

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(40, 30, 15,15);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);
$pdf->SetFont('times', '', 14, '', true);
$pdf->AddPage();
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
//-----------------------------------------------------------------

//------Html = Get data ---------------------
	$MaKythi = $_GET['kythi'];
	$bhtml  = '<br><div class="rowdiv" style="clear:both;width:100%" >
	<fieldset class="styleset">
	<legend><b>Thống kê đăng ký ca thi&nbsp;(<i>Mã kỳ thi: '.$MaKythi.'</i>)</b></legend><br>';
	
	$sqlkythi ='SELECT TenKythi, Tungay, Toingay,Taocathi,Socathi FROM cet_kythi WHERE Makythi ="'.$MaKythi.'"';
	$resultkythi = mysql_query($sqlkythi, $link);
	if (!$resultkythi) {  echo 'MySQL Error 3: ' . $sqlkythi;   exit;	}
	$rowkt = mysql_fetch_row($resultkythi);
	$TenKythi = $rowkt[0];$Tungay = $rowkt[1];$Toingay = $rowkt[2];$DaTaocathi= $rowkt[3];$Socathi=$rowkt[4];
	$bhtml .=  '</div><br>
		<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 14pt">';
		
	$bhtml .=  '<tr><td width="25%">Kỳ thi: </td>
					<td  height ="'.$Height.'" width="20%"><b>'.$MaKythi.'</b></td><td width="55%">'.$TenKythi.'</td></tr>';
	$bhtml .=  '<tr><td>Tổng số ca thi: </td><td height ="'.$Height.'">'.$Socathi.'</td>
			<td align="left">Ngày thi từ : '.$Tungay.' tới: ' .$Toingay.'</td></tr>';		
	$bhtml .= '</table>';
	$bhtml .= '<br>';
	
	if($Socathi>0){
		$bhtml .=  '<table  width="100%" border="0" style="font-family: Times New Roman; font-size: 13pt">';
		$bhtml .=  '<tr height ="0">
			   <td width="8%" align = "center"></td><td width="15%"> </td><td width="10%"> </td>
			   <td width="8%" align = "center"></td><td width="15%"></td><td width="10%"></td>
			   <td width="8%" align = "center"></td><td width="15%"> </td><td ></td></tr>';
		$sqlkyca = 'SELECT cathi, ngaythi, giothi FROM cet_kythi_cathi WHERE MaKythi ="'.$MaKythi.'" ORDER by Cathi';

		$resultkyca = mysql_query($sqlkyca, $link);
		if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
		
		for($k=1; $k<=$Socathi; $k++){
			$rowkc = mysql_fetch_row($resultkyca);
			$ngaythi = $rowkc [1]; $giothi = $rowkc [2];
			if($k%3==1) $bhtml .=  '<tr height ="'.$Height.'">';
			
			$bhtml .=  '<td align = "center">Ca '.$k.':</td>
					<td>'.$ngaythi.'</td>
					<td>'.$giothi.' </td>';
			if($k%3==0) $bhtml .=  '</tr>';
					
		}
		if($Socathi%3 ==1)$bhtml .=  '<td></td><td></td><td></td><td></td></tr>';
		else if($Socathi%3 ==2) $bhtml .=  '<td></td><td></td></tr>';
		$bhtml .= '</table>';
		//$bhtml .=  '<hr>';
		
		//------------------------------------------------------------------------------------------
		//--------------------------(5/1/2021)Điểm thi - Môn thi  - Ca thi: số lượng  đăng ký----------------------
		
		//$bhtml .= '<br><div class="rowdiv" style="clear:both;width:100%">';
		
		$hcolor =  Get_name($link, "cet_table_color","giatri","mathamso", "heading1");	
		$bhtml .=  '<br><table  width="105%" border="1" cellpading = "0" cellspacing="0" style="font-family: Times New Roman; font-size: 13pt" cellpading="0" cellspacing="1">';
		$bhtml .=  '<tr><td width="14%"></td><td width="27%"></td>';
		for($c =1; $c <=$Socathi; $c++) $bhtml .=  '<td width="11%"></td>'; $bhtml .=  '<td> </td></tr>';
		
		$bhtml .=  '<tr height ="'.$Height.'"  bgcolor="'.$hcolor.'" ><td ><b>Mã</b></td><td><b> Tên (Điểm thi/Môn thi)</b></td>';
		for($c =1; $c <=$Socathi; $c++) 
			$bhtml .=  '<td align ="center">Ca '.$c.'</td>'; 
		$bhtml .=  '<td align ="center">Tổng</td></tr>';

		$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$MaKythi.'"';
		$resultmt = mysql_query($sqlmt, $link);
		if (!$resultmt) {	$bhtml .=  'MySQL Error: 2' . $sqlmt;	 exit;	}
		$Somonthi =  mysql_num_rows($resultmt);
		$socamon = array($Somonthi+1);
		for ($t=0; $t<=$Somonthi; $t++) $socamon[$t]=0;
		
		$sqldt = 'SELECT Makythi, cet_kythi_diadiem.Madiadiem, Tendiadiem FROM cet_kythi_diadiem join cet_diadiemthi on (cet_kythi_diadiem.Madiadiem =cet_diadiemthi.Madiadiem) WHERE MaKythi ="'.$MaKythi.'"';
		$resultdt = mysql_query($sqldt, $link);
		if (!$resultdt) {	$bhtml .=  'Error: 2' . $sqldt;	 exit;	}
		$Sodiadiem =  mysql_num_rows($resultdt);
		if($Sodiadiem==0) { thongbaoloi( "Chưa có điểm thi!"); exit;}	
		
		$socadiadiem = array($Sodiadiem+1);	for ($t=0; $t<=$Sodiadiem; $t++) $socadiadiem[$t]=0;
		
		$Tongca = array ($Socathi+1);	for($j=1; $j<=$Socathi; $j++) $Tongca[j] =0;
		
		
		
		for($k=1; $k<=$Sodiadiem; $k++){
			if($k % 2==0) $bcolor = $bcolor1; else  $bcolor = $bcolor2;
			$socadiadiem[k] = 0; 
			$rowdt =  mysql_fetch_row($resultdt);
			$bDiemthi = "Madiemthi".$k; $Madiemthi = $rowdt[1];
			
			$Tendiemthi = $rowdt[2];
			$btongdiemca = "Diemca".$k;
			$mergecell = 1+$Socathi;
			$bhtml .=  '<tr height ="'.$Height.'" ><td align="left">'.$Madiemthi.'</td>
						<td colspan="'.$mergecell.'">'.$Tendiemthi.'</td>
			<td align ="center"><b>'.cet_getvalue2($link, $MaKythi,$Madiemthi).'</b>';
			
			
			$ncheck =0;
			$mcheck=0;
			$bhtml .=  '</td>';	
			$bhtml .=  '</tr>';
		
		//------------------------Ghép môn----------------
				$sqlmt = 'SELECT Makythi, cet_kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$MaKythi.'"';
				$resultmt = mysql_query($sqlmt, $link);
				if (!$resultmt) {	$bhtml .=  'MySQL Error: 2' . $sqlmt;	 exit;	}
				$Somonthi =  mysql_num_rows($resultmt);
				if($Somonthi==0) { thongbaoloi( "Chưa có môn thi!"); exit;}	
				
				if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
				for($km=1; $km<=$Somonthi; $km++){
					$rowmt =  mysql_fetch_row($resultmt);
					$bMonthi = "Mamonthi".$k."_".$km; $Mamonthi = $rowmt[1];
					$Tenmonthi = $rowmt[2];
					$btongmonca = "Monca".$km;
					$bhtml .=  '<tr height ="'.$Height.'"><td align="right">'.$Mamonthi.'</td><td>&emsp;'.$Tenmonthi.'  </td>';;
					
					$sqlmonca = 'SELECT cathi, checked FROM cet_mon_cathi WHERE MaKythi ="'.$MaKythi.'" AND Madiemthi ="'.$Madiemthi.'" AND maMonthi ="'.$Mamonthi.'"  ORDER by Cathi';
					$resultmc = mysql_query($sqlmonca, $link);
					//$bhtml .=  $sqlmonca; exit;
					if (!$resultmc) {	$bhtml .=  'MySQL Error: 4' . $sqlmc;	 exit;	}
					$ncheck =0;
					$Tongmon =0;
					for($j=1; $j<=$Socathi; $j++){
						$rowmc = mysql_fetch_row($resultmc);
						
						if($rowmc[1]==0) {$check = " ";}
						else {$check = "checked"; $ncheck ++; $socadiadiem[k]++;$socamon[$km]++;}
						
						$bmoncathi = "DiemMonCa".$k.'_'.$km."_".$j; 
						$sodangky  = cet_getvalue($link, $MaKythi,$Madiemthi,$Mamonthi,$j);
						$Tongca[$j] += $sodangky; $Tongmon+=$sodangky;
						
						 $bhtml .=  '<td align ="center" >'.$sodangky.'</td>';
						}
			
					$bhtml .=  '<td align ="center" >'.$Tongmon;
					
					
					$bhtml .=  '</td>';	
			
					$bhtml .=  '</tr>';
			}
		//------------------------------------------------------
		
		}
		$bhtml .=  '<tr height ="'.$Height.'" ><td ></td><td align="center"><b><i>Tổng</i></b></td>';
		$tongkythi =0;
		for($c =1; $c <=$Socathi; $c++) {
		$bhtml .=  '<td align ="center">'.$Tongca[$c].'</td>'; $tongkythi +=$Tongca[$c];}
		$bhtml .=  '<td align="center"><b>'.$tongkythi.'</b></td></tr>';	
		
		
		$bhtml .= '</table>';
	
		}
	
	$bhtml .= '</fieldset>';
	$bhtml .=  '</div>';
		


//------------------------------------------------------------------
$pdf->writeHTMLCell(0, 0, '', '', $bhtml, 0, 1, 0, true, '', true);
$pdf->Output('test1.pdf', 'I');
ob_end_flush();
//============================================================+
// END OF FILE
//============================================================+
?>