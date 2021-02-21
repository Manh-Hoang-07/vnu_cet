print'<br><div class="rowdiv" style="clear:both;width:100%">
	<fieldset class="styleset">	<legend><b>Địa điểm thi - ca thi</legend>';
	print '<br><table  width="100%" border="0" style="font-family: Times New Roman; font-size: 16pt">';
	print '<tr height ="'.$Height.'"><td width="25%">Môn thi</td><td >Chọn ca thi</td></tr>';
	$sqlmt = 'SELECT Makythi, cet_Kythi_monthi.Mamonthi, Tenmonthi FROM cet_kythi_monthi join cet_Monthi on (cet_kythi_monthi.Mamonthi =cet_monthi.Mamonthi) WHERE MaKythi = "'.$MaKythi.'"';
	$resultmt = mysql_query($sqlmt, $link);
	if (!$resultmt) {	print 'MySQL Error: 2' . $sqlmt;	 exit;	}
	$Somonthi =  mysql_num_rows($resultmt);
	if($Somonthi==0) { thongbaoloi( "Chưa có môn thi!"); exit;}	
	$sqlmonca = 'SELECT cathi, ngaythi, giothi FROM cet_kythi_cathi WHERE MaKythi ="'.$MaKythi.'" ORDER by Cathi';
	//print $sqlkyca; exit;
	$resultkyca = mysql_query($sqlkyca, $link);
	if (!$resultkyca) {  echo 'MySQL Error 3: ' . $sqlkyca;   exit;	}
	for($k=1; $k<=$Somonthi; $k++){
		$rowmt =  mysql_fetch_row($resultmt);
		$bMonthi = "Mamonthi".$k; $Mamonthi = $rowmt[1];
		$Tenmonthi = $rowmt[2];
		$btongmonca = "Monca".$k;
		print '<tr height ="'.$Height.'"><td width="10%">'.$Mamonthi.'-'.$Tenmonthi.'  </td><td>';
		
		$sqlmonca = 'SELECT cathi, checked FROM cet_mon_cathi WHERE MaKythi ="'.$MaKythi.'" AND maMonthi ="'.$Mamonthi.'"  ORDER by Cathi';
		$resultmc = mysql_query($sqlmonca, $link);
		//print $sqlmonca; exit;
		if (!$resultmc) {	print 'MySQL Error: 2' . $sqlmc;	 exit;	}
		$ncheck =0;
		for($i=1; $i<=$Socathi; $i++){
			$rowmc = mysql_fetch_row($resultmc);
			
			if($rowmc[1]==0) {$check = " ";}
			else {$check = "checked"; $ncheck ++;}
			
			$bmoncathi = "MonCa".$k."_".$i; 
			
			print 'ca '.$i.' <Input type ="checkbox" name ="'.$bmoncathi.'" value ="1" size="5" onchange = "JavaScript:check7('.$bmoncathi.','.$btongmonca.');" '.$check.' >&nbsp;&nbsp;&nbsp;';
			}
		
		print '<Input type ="hidden" Id ="'.$btongmonca.'"  value = "'.$ncheck.'" size="5">';
		print '<Input type ="hidden" name ="'.$bMonthi.'" value = "'.$Mamonthi.'" size="5">';
		print '</td>';	
		
	print '</tr>';
	}
		
	print '<Input type ="hidden" name ="Somonthi" value = "'.$Somonthi.'" size="5">';	
	//print '<Input type ="hidden" name ="newform" value = "1" >';	
	print'</table>';
	print '</div>';