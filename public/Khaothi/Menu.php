﻿<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<!--mstheme--><link rel="stylesheet" href="aftr1011-109.css">
<meta name="Microsoft Theme" content="aftrnoon 1011">
<title>Menu </title>
<style>

button {
    border: none;
	background-color: #CCFFDD;
    color: blue;
    padding: 6px 6px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 1px 1px;
    cursor: pointer;
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
button1 {
    border: none;
	background-color: #CCFFDD;
    color: green;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 0px 0px;
    cursor: pointer;
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
</style>
<script>
<!--
function Onload(){
	alert('load');
}	
function Underconstruction(){
	alert('Chức năng chưa có');
}	

function change(k) { //alert('k:'+k);
	if(typeof Myform1.elements['ckhoso'] =='object')	Myform1.elements['ckhoso'].value ="0";
	if(typeof Myform1.elements['ckduan'] =='object')	Myform1.elements['ckduan'].value ="0"
	if(typeof Myform1.elements['ckdiaphuong'] =='object')	Myform1.elements['ckdiaphuong'].value ="0";
	if(typeof Myform1.elements['ckloaihoso'] =='object')	Myform1.elements['ckloaihoso'].value ="0";
	if(typeof Myform1.elements['cknguonvon'] =='object')	Myform1.elements['cknguonvon'].value ="0";
	if(typeof Myform1.elements['ckloaiduan'] =='object')	Myform1.elements['ckloaiduan'].value ="0";
	if(typeof Myform1.elements['ckloaicongtrinh'] =='object')	Myform1.elements['ckloaicongtrinh'].value ="0";
	if(typeof Myform1.elements['ckdonvi'] =='object')	Myform1.elements['ckdonvi'].value ="0";
	if(typeof Myform1.elements['cknguonhd'] =='object')	Myform1.elements['cknguonhd'].value ="0";
	if(typeof Myform1.elements['ckkhachhang'] =='object')	Myform1.elements['ckkhachhang'].value ="0";
	if(typeof Myform1.elements['ckuser'] =='object')	Myform1.elements['ckuser'].value ="0";
	if(typeof Myform1.elements['cksaoluu'] =='object')	Myform1.elements['cksaoluu'].value ="0";
	if(typeof Myform1.elements['cknguondutoan'] =='object')	Myform1.elements['cknguondutoan'].value ="0";
	if(typeof Myform1.elements['ckthongke'] =='object')	Myform1.elements['ckthongke'].value ="0";
	
	
	if(k==1)	 	Myform1.elements['ckhoso'].value ="1";
	else if(k==2)	Myform1.elements['ckduan'].value ="1"
	else if(k==3)	Myform1.elements['ckdiaphuong'].value ="1";
	else if(k==4)	Myform1.elements['ckloaihoso'].value ="1";
	else if(k==5)	Myform1.elements['cknguonvon'].value ="1";
	else if(k==6)	Myform1.elements['ckloaiduan'].value ="1";
	else if(k==7)	Myform1.elements['ckloaicongtrinh'].value ="1";
	else if(k==8)	{Myform1.elements['ckdonvi'].value ="1"; }
	else if(k==9)	Myform1.elements['cknguonhd'].value ="1";
	else if(k==10)	Myform1.elements['ckkhachhang'].value ="1";
	else if(k==11)	Myform1.elements['ckuser'].value ="1";
	else if(k==12)	Myform1.elements['cksaoluu'].value ="1";
	else if(k==13)	Myform1.elements['cknguondutoan'].value ="1";
	else if(k==14)	Myform1.elements['ckthongke'].value ="1";
	
}		
function Click(k){ 
	if(typeof Myform1.elements['ckhoso'] =='object')	Myform1.elements['ckhoso'].value ="0";
	if(typeof Myform1.elements['ckduan'] =='object')	Myform1.elements['ckduan'].value ="0"
	if(typeof Myform1.elements['ckdiaphuong'] =='object')	Myform1.elements['ckdiaphuong'].value ="0";
	if(typeof Myform1.elements['ckloaihoso'] =='object')	Myform1.elements['ckloaihoso'].value ="0";
	if(typeof Myform1.elements['cknguonvon'] =='object')	Myform1.elements['cknguonvon'].value ="0";
	if(typeof Myform1.elements['ckloaiduan'] =='object')	Myform1.elements['ckloaiduan'].value ="0";
	if(typeof Myform1.elements['ckloaicongtrinh'] =='object')	Myform1.elements['ckloaicongtrinh'].value ="0";
	if(typeof Myform1.elements['ckdonvi'] =='object')	Myform1.elements['ckdonvi'].value ="0";
	if(typeof Myform1.elements['cknguonhd'] =='object')	Myform1.elements['cknguonhd'].value ="0";
	if(typeof Myform1.elements['ckkhachhang'] =='object')	Myform1.elements['ckkhachhang'].value ="0";
	if(typeof Myform1.elements['ckuser'] =='object')	Myform1.elements['ckuser'].value ="0";
	if(typeof Myform1.elements['cksaoluu'] =='object')	Myform1.elements['cksaoluu'].value ="0";
	if(typeof Myform1.elements['cknguondutoan'] =='object')	Myform1.elements['cknguondutoan'].value ="0";
	if(typeof Myform1.elements['ckthongke'] =='object')	Myform1.elements['ckthongke'].value ="0";
	if(typeof Myform1.elements['cktrogiup'] =='object')	Myform1.elements['cktrogiup'].value ="0";
	
	if(k==1){
		if(Myform1.elements['ckhoso'].checked) Myform1.elements['ckhoso'].value ="0";
		else {Myform1.elements['ckhoso'].value ="1"; Myform1.elements['ckhoso'].checked=true;}
	}
	else if(k==2){
		if(Myform1.elements['ckduan'].checked) Myform1.elements['ckduan'].value ="0";
		else {Myform1.elements['ckduan'].value ="1"; Myform1.elements['ckduan'].checked=true;}
		Myform1.elements['ckhoso'].value ="0";
		
	}
	else if(k==3){
		window.open('LaphopdongA.php','main');
		
	}
	else if(k==4){//alert('DA');
		window.open('cet_DangkyHS.php','blank'); 
		
	}
	else if(k==410){//alert('DA');
		window.open('cet_CapnhatHS.php','blank');
		
	}
	else if(k==81){//alert('Đăng ký thi');
		window.open('cet_Dangkythi.php','main');
		
	}
	else if(k==811){//alert('Đăng ký thi');
		window.open('cet_SuaDangkythi.php','main');
		
	}
	else if(k==20){//alert('KP');
		window.open('Capnhatkinhphi.php','main');
		
	}
	else if(k==50){//alert('NTDV');
		window.open('NghiemthuDv0.php','main');
		
	}
	
	else if(k==5){
		if(Myform1.elements['ckdiaphuong'].checked) Myform1.elements['ckdiaphuong'].value ="0";
		else {Myform1.elements['ckdiaphuong'].value ="1"; Myform1.elements['ckdiaphuong'].checked=true;}
	}
	else if(k==6){
		if(Myform1.elements['ckloaihoso'].checked) Myform1.elements['ckloaihoso'].value ="0";
		else {Myform1.elements['ckloaihoso'].value ="1"; Myform1.elements['ckloaihoso'].checked=true;}
	}
	else if(k==7){
		if(Myform1.elements['cknguonvon'].checked) Myform1.elements['cknguonvon'].value ="0";
		else {Myform1.elements['cknguonvon'].value ="1"; Myform1.elements['cknguonvon'].checked=true;}
	}
	else if(k==8){
		if(Myform1.elements['ckloaiduan'].checked) Myform1.elements['ckloaiduan'].value ="0";
		else {Myform1.elements['ckloaiduan'].value ="1"; Myform1.elements['ckloaiduan'].checked=true;}
	}
	else if(k==9){
		if(Myform1.elements['ckloaicongtrinh'].checked) Myform1.elements['ckloaicongtrinh'].value ="0";
		else {Myform1.elements['ckloaicongtrinh'].value ="1"; Myform1.elements['ckloaicongtrinh'].checked=true;}
	}
	else if(k==10){
		if(Myform1.elements['ckdonvi'].checked) Myform1.elements['ckdonvi'].value ="0";
		else {Myform1.elements['ckdonvi'].value ="1"; Myform1.elements['ckdonvi'].checked=true;}
	}
	else if(k==11){
		if(Myform1.elements['cknguonhd'].checked) Myform1.elements['cknguonhd'].value ="0";
		else {Myform1.elements['cknguonhd'].value ="1"; Myform1.elements['cknguonhd'].checked=true;}
	}
	else if(k==12){
		if(Myform1.elements['cknguondutoan'].checked) Myform1.elements['cknguondutoan'].value ="0";
		else {Myform1.elements['cknguondutoan'].value ="1"; Myform1.elements['cknguondutoan'].checked=true;}
	}
	else if(k==13){
		if(Myform1.elements['ckkhachhang'].checked) Myform1.elements['ckkhachhang'].value ="0";
		else {Myform1.elements['ckkhachhang'].value ="1"; Myform1.elements['ckkhachhang'].checked=true;}
	}
	else if(k==14){
		if(Myform1.elements['ckuser'].checked) Myform1.elements['ckuser'].value ="0";
		else {Myform1.elements['ckuser'].value ="1"; Myform1.elements['ckuser'].checked=true;}
	}
	else if(k==15){
		if(Myform1.elements['cksaoluu'].checked) Myform1.elements['cksaoluu'].value ="0";
		else {Myform1.elements['cksaoluu'].value ="1"; Myform1.elements['cksaoluu'].checked=true;}
	}
	else if(k==17){
		if(Myform1.elements['ckthongke'].checked) Myform1.elements['ckthongke'].value ="0";
		else {Myform1.elements['ckthongke'].value ="1"; Myform1.elements['ckthongke'].checked=true;}
	}
	else if(k==16){
		window.open('Capnhatngayle.php','main');
	}
	else if(k==21){
		window.open('Login2.php','main');
	}
	else if(k==36){ //alert('36');
		window.open('cet_help.php','_blank');
	}
	
}
function cet_NhapMonThi(){
	window.open('cet_NhapMonthi.php','main');
}
function cet_SuaMonthi(){
	window.open('cet_SuaMonthi.php','main');
	}
function GiaoHs1(){
	window.open('Giaonhanhoso1.php','main');
	}
function GiaoHs2(){
	window.open('Giaonhanhoso2.php','main');
	}
function GiaoHs3(){
	window.open('Giaonhanhoso3.php','main');
	}		
function GiaoDa(){
	window.open('Giaothuchienduan.php','main');
	}
function GiaoDa2(){
	window.open('Giaothuchienduan2.php','main');
	}
function GiaoDa3(){
	window.open('Giaothuchienduan3.php','main');
	}
	
function LapHdA(){
	window.open('LaphopdongA.php','main');
	}
function Kinhphi(){
	window.open('Capnhatkinhphi.php','main');
	}
function ThemKythi(){

	window.open('cet_NhapKythi.php','main');
	}
function Suakythi(){
	window.open('cet_SuaKythi.php','main');
	}
function cet_NhapTinh(){
	window.open('cet_NhapTinh.php','main');
	}	
function cet_SuaTinh(){
	window.open('underconstruction.php','main');
	//window.open('cet_SuaTinh.php','main');
	}	
function cet_NhapHuyen(){
	window.open('cet_Nhaphuyen.php','main');
	}	
function cet_SuaHuyen(){
	//window.open('underconstruction.php','main');
	window.open('cet_Suahuyen.php','main');
	}	
function cet_Nhaptruong(){
	window.open('cet_Nhaptruong.php','main');
	}	
function cet_Suatruong(){//alert('sửa');
	window.open('cet_Suatruong.php','main');
	}
function cet_Suathamso(){
	window.open('cet_Suathamso.php','main');
	}	
function Suanvon(){
	window.open('Suanguonvon.php','main');
	}	
function Nhaploaida(){
	window.open('Nhaploaiduan.php','main');
	}		
function Sualoaida(){
	window.open('Sualoaiduan.php','main');
	}	
function NhapnhomCT(){
	window.open('Nhapnhomcongtrinh.php','main');
	}	
function SuanhomCT(){
	window.open('Suanhomcongtrinh.php','main');
	}	
function NhapDd(){
	window.open('cet_NhapDiadiemthi.php','main'); 
	}	
function SuaDd(){
	window.open('cet_SuaDiadiemthi.php','main');
	}
function XoaDd(){
	alert('Chức năng chưa xây dựng!!');
	//window.open('underconstruction.php','main');
	//window.open('cet_XoaDiadiemThi.php','main');
	}	
function NhapnguonHd(){
	window.open('Nhapnguonhopdong.php','main');
	}	
function SuanguonHd(){
	window.open('Suanguonhopdong.php','main');
	}	
function Capnhat_Admin(){
	window.open('Capnhatnguonhopdong_Admin.php','main');
	}	
function SuathamsoHd(){
	window.open('Suathamsohopdong.php','main');
	}	
function Nhapccdt(){
	window.open('Nhapcancudutoan.php','main');
	}
function Suaccdt(){
	window.open('Suacancudutoan.php','main');
	}	
function Chonccdt(){
	window.open('Choncancudutoan.php','main');
	}	
function Suadt(){
	window.open('Suadutoan.php','main');
	}	
function cet_Nhapcumthi(){
	window.open('cet_Nhapcumthi.php','main');
	}
function cet_admin_QLHSTS(){
	window.open('cet_admin_QLHSTS.php','main');
	}
function cet_Chuyencathi(){
	window.open('cet_Chuyencathi.php','main');
	}
function cet_ThongkeDKT(){
	window.open('cet_ThongkeDK.php','main');
	}	
function cet_Suacumthi(){
	window.open('cet_Suacumthi.php','main');
	}	
function cet_Auser(){
	
	window.open('cet_Auser.php','main');
	}	
function cet_SuaAuser(){
	window.open('cet_SuaAuser.php','main');
	}	
	
function cet_Xuser(){
	Underconstruction();
	//window.open('cet_Xoauser.php','main');
	}	
function cetDangkytaikhoan(){
	window.open('cet_AddAcc.php','main');
	}		
function thongke1(){
	window.open('Thongke1.php','main');
	}	
function thongke2(){
	window.open('Thongke2.php','main');
	}	
function backup(){alert('Chức năng chưa xây dựng!!');
	//window.open('saoluu.php','main');
	}	
function Rest(){alert('Chức năng chưa xây dựng!!');
	//window.open('phuchoi.php','main');
	}	
function cet_Xuatdlthi(){
	window.open('cet_Xuatdlthi.php','main');
	}	
function CapnhatSo_Thang_Nam(){
	window.open('CapnhatSo_Thang_Nam.php','main');
	}		
function cet_Imp_thi(){
	alert('Chức năng chưa xây dựng!!');
	//window.open('cet_Imp_thi.php','main');
	}		
function 	UpdateKp(){
	window.open('UpdateKp.php','main');
		
	}
function dangnhap(){
	window.open('Login2.php','main');
	}
function QLcathi(){
	window.open('cet_QLCathi.php','main');
	}	
function cet_thongke1(){
	Underconstruction();
}
function cet_thongke2(){
	Underconstruction();
}
function cet_thongke3(){
	Underconstruction();
}
function dangxuat(){ 
if(confirm('Bạn đăng xuất?')){
	window.open("Logout.php","main");
/*
	if(typeof Myform1.elements['ckhoso'] =='object')	Myform1.elements['ckhoso'].value ="0";
	if(typeof Myform1.elements['ckduan'] =='object')	Myform1.elements['ckduan'].value ="0"
	if(typeof Myform1.elements['ckdiaphuong'] =='object')	Myform1.elements['ckdiaphuong'].value ="0";
	if(typeof Myform1.elements['ckloaihoso'] =='object')	Myform1.elements['ckloaihoso'].value ="0";
	if(typeof Myform1.elements['cknguonvon'] =='object')	Myform1.elements['cknguonvon'].value ="0";
	if(typeof Myform1.elements['ckloaiduan'] =='object')	Myform1.elements['ckloaiduan'].value ="0";
	
	if(typeof Myform1.elements['ckloaicongtrinh'] =='object')	Myform1.elements['ckloaicongtrinh'].value ="0";
	if(typeof Myform1.elements['ckdonvi'] =='object')	Myform1.elements['ckdonvi'].value ="0";
	if(typeof Myform1.elements['cknguonhd'] =='object')	Myform1.elements['cknguonhd'].value ="0";
	if(typeof Myform1.elements['ckkhachhang'] =='object')	Myform1.elements['ckkhachhang'].value ="0";
	
	if(typeof Myform1.elements['ckuser'] =='object')	Myform1.elements['ckuser'].value ="0";
	if(typeof Myform1.elements['cksaoluu'] =='object')	Myform1.elements['cksaoluu'].value ="0";
	if(typeof Myform1.elements['cknguondutoan'] =='object')	Myform1.elements['cknguondutoan'].value ="0";
*/
	$_COOKIE['name']="";
	$_COOKIE['pass']="";
	setcookie('name');
	setcookie('pass');
	//----------8/2/2021-----
	$_SESSION['cetAusbaomat'] = "";
	$_SESSION['cetpAusbaomat'] = "";
//---------------------------------------
	//this.form.submit();
	//header("QLDangKyThi.htm");
}

}

function cet_doipass(){
	//alert('đổi');
	window.open('cet_Doimatkhau.php','main');
	//window.open('cet_AddAcc.php','main');
	}		
function f1(k){

	var bname = 'B'+k;
	Myform1.elements[bname].style.background = "#FFFF99";
}
function f2(k){
	var bname = 'B'+k;
	//if(k%2==0)
		Myform1.elements[bname].style.background = "#FFFEEE";
	//else 
	//	Myform1.elements[bname].style.background = "#66CCFF";
}

// -->
</script>
<base target="contents">
</head>
<body>

<?php

error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "Libs/lib.php";
//$username =$_COOKIE['name'];
//$password =$_COOKIE['pass'];
$username   = $_SESSION['cetAusbaomat'];
$password	= $_SESSION['cetpAusbaomat'];
$Height  =28; 
$Height1 = 'height="24px"';
$Height2 = 'height="22px"';
$Border=0;
$Color1 ="#FFFEEE";$Color2 ="#66CCFF";
$Style1 ='style="font-family: Tahoma;font-size:12pt;width:100%;height:24px;background-color:#FFFEEE;text-align:left"';
//$Style2 ='style="font-family: Tahoma;font-size:10pt;width:100%;height:22px;background-color:#66CCFF;text-align:left"';
$Style2 ='style="font-family: Tahoma;font-size:10pt;width:100%;height:22px;background-color:#FFFEEE;text-align:left"';
if($username==""){$Donvi=$Loaidonvi=$Mucquyen=$Chucvu=""; }
else {
	if (!$link = mysql_connect('localhost', $username, $password)) {thongbaoloi('Menu: Đăng nhập không hợp lệ'); 
		echo "<script>window.open('Login2.php','main');</script>";
		exit;}
	if (!mysql_select_db('cet_dkythi', $link)) {thongbaoloi('Không kết nối được cơ sở dữ liệu'); 
			exit; }
		mysql_query("SET NAMES utf8");
		$sql    = 'select Mucquyen, Hoten,Donvi from  cetusers where (tendangnhap ="'.$username.'")';
		$result = mysql_query($sql, $link);
		if (!$result) {	echo 'MySQL Error 1: ' . mysql_error().$sql;	exit;}
		$row = mysql_fetch_row($result);
		$Mucquyen = $row[0]; $Donvi=trim($row[2]); $LoaiDonvi=$row[3];//1-admin, 2-sửa /xóa, 3- chỉ xem
		$Chucvu = $row[4];
	
}
echo '<form action="Menu.php" method="post" name ="Myform1">';

echo '<table border="0" width="190" cellpadding="0" cellspacing="0" style ="font-family: Tahoma" >
	
	<tr><td colspan="3" align="center"><small><small><i>Đăng nhập:'.$username.'</small></small></td></tr>	
	<tr><td width ="3%"><hr></td><td width ="4%"><hr></td><td width ="93%"><hr></td></tr>
	<tr '.$Height1.'>
		<td  align="center"><input type = "checkbox" disabled></td>
		<td colspan = "2"><font size="3"><a target="main" href="underconstruction.php"><button name="B48"'.$Style1.' onmousemove="f1(48);" onmouseout="f2(48);">Trang chủ</button> </td>
	</tr>';
	
//-----------------------menu-------------------------
if(($Mucquyen==1)||($Mucquyen==2)||($Mucquyen==3)){

	$ckhoso = htmlspecialchars($_POST['ckhoso']);
	if($ckhoso=="1"){
		echo	'<tr '.$Height1.'>
			<td align="center"><input type = "checkbox" name ="ckhoso" value ="1"  checked  onclick="JavaScript:change(1);" onchange = "this.form.submit()" ></td>
			<td colspan = "2"><button  name="B0"'.$Style1.' onclick="JavaScript:Click(1);" onmousemove="f1(0);" onmouseout="f2(0);")>Quản lý Môn thi</button></td> 
		</tr>';
		if(($Donvi=="KHTH")||($Donvi=="BLDV")||($Mucquyen=1 )){
		echo '<tr '.$Height2.'>	<td></td><td></td>';
			echo '<td><button name="B1"'.$Style2.'  onclick="cet_NhapMonThi();"  onmousemove="f1(1);" onmouseout="f2(1);">Thêm Môn thi</button></td>';
		echo'</tr> 
		<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B3"'.$Style2.' onclick="cet_SuaMonthi();"onmousemove="f1(3);" onmouseout="f2(3);">Cập nhật Môn thi</button></td>
		</tr>'; }
		if(($Donvi=="QKQD")||($Donvi=="KHTH")||($Donvi=="BLDV")){
		echo '<tr '.$Height2.'>	<td></td><td></td>
			<td ><button name="B5"'.$Style2.' onclick="Underconstruction();"onmousemove="f1(5);" onmouseout="f2(5);">Xóa Môn thi</button></td>
		</tr> ';}
		if(($LoaiDonvi==1)&&($Donvi!="QKQD")){ 

		if(($Chucvu==4)||($Chucvu==5))	
		echo '<tr '.$Height2.'>	<td></td><td></td>
			<td ><button name="B7"'.$Style2.' onclick="GiaoHs2();"onmousemove="f1(7);" onmouseout="f2(7);">TT Tiếp nhận Hồ sơ </button></td>
		</tr>';
		
		echo'<tr '.$Height2.'>	<td ></td><td></td>
			<td ><button name="B9"'.$Style2.' onclick="GiaoHs3();"onmousemove="f1(9);" onmouseout="f2(9);">Kiểm tra hồ sơ</button></td>
		</tr> ';
		}
	}
	else {
		echo	'<tr '.$Height1.'>
			<td  align="center"><input type = "checkbox" name ="ckhoso" value ="1" onclick="JavaScript:change(1);" onchange = "this.form.submit()"></td>
			  <td colspan = "2"><button name="B0"'.$Style1.' onclick="JavaScript:Click(1);" onmousemove="f1(0);" onmouseout="f2(0);">Quản lý Môn thi </button></td> 
		</tr>';
	}
//------------------------Dự án------------------------
	
//----------------------Thí sinh--------------------------
/*
	echo '<tr '.$Height1.'>
		<td align="center"><input type = "checkbox" disabled></td>
		<td colspan = "2"><button name="B8"'.$Style1.' onclick="JavaScript:Click(4);"onmousemove="f1(8);" onmouseout="f2(8);">Đăng ký Hồ sơ</button> </td>
	</tr>';	
	echo '<tr '.$Height1.'>
		<td align="center"><input type = "checkbox" disabled></td>
		<td colspan = "2"><button name="B810"'.$Style1.' onclick="JavaScript:Click(410);"onmousemove="f1(810);" onmouseout="f2(810);">Cập nhật Hồ sơ</button> </td>
	</tr>';	
	print '<tr '.$Height1.'>
		<td align="center"><input type = "checkbox" disabled></td>
		<td colspan = "2"><button name="B81"'.$Style1.' onclick="JavaScript:Click(81);"onmousemove="f1(81);" onmouseout="f2(81);">Đăng ký Kỳ thi</button> </td>
	</tr>';	
	print '<tr '.$Height1.'>
		<td align="center"><input type = "checkbox" disabled></td>
		<td colspan = "2"><button name="B810"'.$Style1.' onclick="JavaScript:Click(811);"onmousemove="f1(811);" onmouseout="f2(811);">Thay đổi đăng ký thi</button> </td>
	</tr>';	
	
*/
//----------------------/Thí sinh--------------------------	

	$ckdiaphuong = htmlspecialchars($_POST['ckdiaphuong']);

	if($ckdiaphuong=="1"){
		echo'<tr '.$Height1.'>
		<td align="center"><input type = "checkbox" name ="ckdiaphuong" value ="1"  checked onclick="JavaScript:change(3);" onchange = "this.form.submit()"></td>
		<td colspan = "2"><button name="B10" '.$Style1.' onclick="JavaScript:Click(5);" onmousemove="f1(10);" onmouseout="f2(10);">Quản lý kỳ thi</button></td> 
		</tr>
		<tr '.$Height2.'>	<td ></td><td></td>
			<td ><button name="B17" '.$Style2.' onclick="ThemKythi();"onmousemove="f1(17);" onmouseout="f2(17);">Tạo Kỳ thi</button></td>
		</tr> 
		<tr '.$Height2.'>	<td height="25" ></td><td></td>
			<td ><button name="B19"'.$Style2.' onclick="Suakythi();"onmousemove="f1(19);" onmouseout="f2(19);">Cập nhật Kỳ thi</button></td>
		</tr> 
		<tr '.$Height2.'>	<td height="25" ></td><td></td>
			<td ><button name="B191"'.$Style2.' onclick="QLcathi();" onmousemove="f1(191);" onmouseout="f2(191);">Quản lý Ca thi</button></td>
		</tr> 
		
		<tr '.$Height2.'>	<td height="25" ></td><td></td>
			<td ><button name= "B192" '.$Style2.' onclick="cet_admin_QLHSTS();" onmousemove="f1(192);" onmouseout="f2(192);">Sửa thông tin HSTS</button></td>
		</tr> 
		
		<tr '.$Height2.'>	<td height="25" ></td><td></td>
			<td ><button name="B193"'.$Style2.' onclick="cet_ThongkeDKT();"onmousemove="f1(193);" onmouseout="f2(193);">Thống kê đăng ký</button></td>
		</tr> 
		<tr '.$Height2.'>	<td height="25" ></td><td></td>
			<td ><button name="B195"'.$Style2.' onclick="cet_Chuyencathi();"onmousemove="f1(195);" onmouseout="f2(195);">Chuyển ca thi</button></td>
		</tr> '	;
		}
	else {
		echo	'<tr '.$Height1.'>
				<td  align="center"><input type = "checkbox" name ="ckdiaphuong" value ="1" onclick="JavaScript:change(3);" onchange = "this.form.submit()"></td>
				<td colspan = "2"><button name="B10"'.$Style1.' onclick="JavaScript:Click(5);" onmousemove="f1(10);" onmouseout="f2(10);">Quản lý kỳ thi </button></td> 
				
			</tr>';
	}
//me('dv:'.$ckdonvi);
$ckdonvi = $_POST['ckdonvi'];
	if($ckdonvi=="1"){ 
		echo	'<tr '.$Height1.'><td align="center"><input type = "checkbox" name ="ckdonvi" value ="1" checked onclick="JavaScript:change(8);"onchange = "this.form.submit()"></td>
		<td colspan = "2"><button name="B20"'.$Style1.' onclick="JavaScript:Click(10);" onmousemove="f1(20);" onmouseout="f2(20);">Địa điểm thi</button></td> 
			</tr>
			<tr '.$Height2.'>	<td ></td><td></td>
				<td ><button name="B37"'.$Style2.' onclick="NhapDd();"onmousemove="f1(37);" onmouseout="f2(37);">Thêm địa điểm</button> </td>
			</tr> 
			<tr '.$Height2.'>	<td></td><td></td>
				<td ><button name="B39"'.$Style2.' onclick="SuaDd();"onmousemove="f1(39);" onmouseout="f2(39);">Cập nhật địa điểm</button> </td>
				</tr>';
				
	}
	else { 
		echo'<tr '.$Height1.'><td  align="center"><input type = "checkbox" name ="ckdonvi" value ="1" onclick="JavaScript:change(8);" onchange = "this.form.submit()"></td>
		<td colspan = "2"><button name="B20"'.$Style1.' onclick="JavaScript:Click(10);" onmousemove="f1(20);" onmouseout="f2(20);">Địa điểm thi</button></td> 
		</tr>';
	}	

//----------------------------------------------
	
	$cknguondutoan = htmlspecialchars($_POST['cknguondutoan']); // căn cứ của dự toán hợp đồng
	if($cknguondutoan=="1"){
		echo	'<tr '.$Height1.'>
				<td  align="center"><input type = "checkbox" name ="cknguondutoan" value ="1" checked onclick="JavaScript:change(13);"onchange = "this.form.submit()"></td>
				<td colspan = "2"><button name="B24"'.$Style1.' onclick="JavaScript:Click(12);" onmousemove="f1(24);" onmouseout="f2(24);">Tham số kỳ thi</button></td> 
			</tr>
			
			<tr  '.$Height2.'>	<td ></td><td></td>
				<td ><button name="B53"'.$Style2.' onclick="cet_Suathamso();"onmousemove="f1(53);" onmouseout="f2(53);">Cập nhật Tham số</button> </td>
			</tr>'; 
			
			
	}
	else {
		echo	'<tr '.$Height1.'>
			<td  align="center"><input type = "checkbox" name ="cknguondutoan" value ="1" onclick="JavaScript:change(13);" onchange = "this.form.submit()"></td><td colspan = "2">
			<button name="B24"'.$Style1.' onclick="JavaScript:Click(12);"onmousemove="f1(24);" onmouseout="f2(24);">Tham số kỳ thi</button></td> 
		</tr>';	
		
	}
//---------------------------------------------

	$ckkhachhang = htmlspecialchars($_POST['ckkhachhang']); // 
	if($ckkhachhang=="1"){
	echo	'<tr '.$Height1.'>
			<td  align="center"><input type = "checkbox" name ="ckkhachhang" value ="1" checked  onclick="JavaScript:change(10);"onchange = "this.form.submit()"></td>
			<td colspan = "2"><button name="B26"'.$Style1.' onclick="JavaScript:Click(13);" onmousemove="f1(26);" onmouseout="f2(26);">Quản lý Cụm thi</button></td> 
		</tr>
		<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B59"'.$Style2.' onclick="cet_Nhapcumthi();"onmousemove="f1(59);" onmouseout="f2(59);">Thêm Cụm thi</button> </td>
		</tr> 
		<tr '.$Height2.'>	<td ></td><td></td>
			<td ><button name="B61"'.$Style2.' onclick="cet_Suacumthi();"onmousemove="f1(61);" onmouseout="f2(61);">Sửa Cụm thi</button> </td>
		</tr> ';
		}
	else {
	echo	'<tr '.$Height1.'>
			<td  align="center"><input type = "checkbox" name ="ckkhachhang" value ="1"  onclick="JavaScript:change(10);" onchange = "this.form.submit()"></td>
			<td colspan = "2"><button name="B26"'.$Style1.' onclick="JavaScript:Click(13);" onmousemove="f1(26);" onmouseout="f2(26);">Quản lý Cụm thi</button></td> 
		</tr>';	
	}	
	
	$ckuser = htmlspecialchars($_POST['ckuser']);
	if($ckuser=="1"){
	echo   '<tr '.$Height1.'><td  align="center"><input type = "checkbox" name ="ckuser" value ="1" checked onclick="JavaScript:change(11);" onchange = "this.form.submit()"></td>
	<td colspan = "2"><button name="B28"'.$Style1.' onclick="JavaScript:Click(14);" onmousemove="f1(28);" onmouseout="f2(28);">Quản lý người dùng</button></td> 
		</tr>
		<tr '.$Height2.'><td ></td><td></td>
			<td ><button name="B63"'.$Style2.' onclick="cet_Auser();"onmousemove="f1(63);" onmouseout="f2(63);">Thêm người dùng</button> </td>
		</tr>'; 
		echo '<tr '.$Height2.'>	<td ></td><td></td>
			<td ><button name="B65"'.$Style2.' onclick="cet_SuaAuser();"onmousemove="f1(65);" onmouseout="f2(65);">Sửa người dùng</button> </td>
		</tr> ';
		echo '<tr '.$Height2.'>	<td></td><td></td>
			<td><button name="B67" '.$Style2.' onclick="cet_Xuser();"onmousemove="f1(67);" onmouseout="f2(67);">Xóa người dùng</button> </td>
		</tr> ';
		echo '<tr '.$Height2.'>	<td></td><td></td>
			<td><button name="B68" '.$Style2.' onclick="cetDangkytaikhoan();"onmousemove="f1(68);" onmouseout="f2(68);">Đăng ký tài khoản</button> </td>
		</tr> ';
		}
	else{
	echo	'<tr '.$Height1.'><td  align="center"><input type = "checkbox" name ="ckuser" value ="1" onclick="JavaScript:change(11);"onchange = "this.form.submit()"></td>
	<td colspan = "2"><button name="B28"'.$Style1.' onclick="JavaScript:Click(14);"onmousemove="f1(28);" onmouseout="f2(28);">Quản lý người dùng</button></td> 
		</tr>';
	}

//---------------------------------------------------Địa phương - trường ----------------------

	$ckloaihoso = htmlspecialchars($_POST['ckloaihoso']);
	if($ckloaihoso=="1"){
		echo	'<tr '.$Height1.'>
				<td align="center"><input type = "checkbox" name ="ckloaihoso" value ="1" checked onclick="JavaScript:change(4);"onchange = "this.form.submit()"></td><td colspan = "2">
				<button name="B121"'.$Style1.' onclick="JavaScript:Click(6);"onmousemove="f1(121);" onmouseout="f2(121);">Quản lý danh mục</button></td> 
			</tr>
			<tr '.$Height2.'>	<td ></td><td></td>
				<td ><button name="B211"'.$Style2.' onclick="cet_NhapTinh();"onmousemove="f1(211);" onmouseout="f2(211);">Thêm tỉnh/thành phố</button> </td>
			</tr> 
			<tr '.$Height2.'>	<td  ></td><td></td>
				<td ><button name="B231"'.$Style2.' onclick="cet_SuaTinh();"onmousemove="f1(231);" onmouseout="f2(231);">Sửa tỉnh/thành phố</button> </td>
			</tr> ';
			
			print '<tr '.$Height2.'>	<td ></td><td></td>
				<td ><button name="B212"'.$Style2.' onclick="cet_NhapHuyen();"onmousemove="f1(212);" onmouseout="f2(212);">Thêm huyện/quận</button> </td>
			</tr> 
			<tr '.$Height2.'>	<td  ></td><td></td>
				<td ><button name="B232"'.$Style2.' onclick="cet_SuaHuyen();"onmousemove="f1(232);" onmouseout="f2(232);">Sửa huyện/quận</button> </td>
			</tr> ';
			print '<tr '.$Height2.'>	<td ></td><td></td>
				<td ><button name="B213"'.$Style2.' onclick="cet_Nhaptruong();"onmousemove="f1(213);" onmouseout="f2(213);">Thêm trường thpt</button> </td>
			</tr> 
			<tr '.$Height2.'>	<td  ></td><td></td>
				<td ><button name="B234"'.$Style2.' onclick="cet_Suatruong();"onmousemove="f1(234);" onmouseout="f2(234);">Sửa trường thpt</button> </td>
			</tr> ';
	}
	else {
	echo	'<tr '.$Height1.'>
			<td align="center"><input type = "checkbox" name ="ckloaihoso" value ="1" onclick="JavaScript:change(4);" onchange = "this.form.submit()"></td>
			<td colspan = "2"><button name="B12"'.$Style1.' onclick="JavaScript:Click(6);" onmousemove="f1(12);" onmouseout="f2(12);">Quản lý danh mục</button></td> 
		</tr> ';
	}
//----------------------------------------------------------------------------------------------

	$cksaoluu = htmlspecialchars($_POST['cksaoluu']);
	if($cksaoluu=="1"){
	echo '<tr '.$Height1.'><td align="center"><input type = "checkbox" name ="cksaoluu" value ="1" checked onclick="JavaScript:change(12);" onchange = "this.form.submit()"></td>
		<td colspan = "2"><button name="B32"'.$Style1.' onclick ="JavaScript:Click(15)" onmousemove="f1(32);" onmouseout="f2(32);">Sao lưu - Khôi phục</button></td> 
		</tr>
		<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B69"'.$Style2.'  onclick="backup();"onmousemove="f1(69);" onmouseout="f2(69);">Sao lưu dữ liệu</button> </td>
		</tr> 
		<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B71"'.$Style2.' onclick="Rest();"onmousemove="f1(71);" onmouseout="f2(71);">Phục hồi dữ liệu</button> </td>
		
		</tr> 
		<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B77"'.$Style2.' onclick="cet_Xuatdlthi();"onmousemove="f1(77);" onmouseout="f2(77);">Xuất dữ liệu thi</button> </td>
		
		</tr> 
		<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B79"'.$Style2.' onclick="cet_Imp_thi();"onmousemove="f1(79);" onmouseout="f2(79);">Nhập dữ liệu kết quả thi</button> </td>
		
		</tr>';
		//<tr '.$Height2.'><td></td><td></td>
		//	<td ><button name="B81"'.$Style2.' onclick="CapnhatSo_Thang_Nam();"onmousemove="f1(81);" onmouseout="f2(81);">Cập nhật Số</button> </td>
		
		//</tr>';
		
		}
	else{
	echo	'<tr '.$Height1.'><td  align="center"><input type = "checkbox" name ="cksaoluu" value ="1" onclick="JavaScript:change(12);" onchange = "this.form.submit()"></td><td colspan = "2">
			<button name="B32"'.$Style1.' onclick ="JavaScript:Click(15);" onmousemove="f1(32);" onmouseout="f2(32);">Sao lưu - Khôi phục</button></td> 
		</tr>';
			
	}	
	$ckthongke = htmlspecialchars($_POST['ckthongke']);
	if($ckthongke=="1")	{
		echo    '<tr '.$Height1.'>
		<td  align="center"><input type = "checkbox"  name ="ckthongke" value ="1" checked onclick="JavaScript:change(14);" onchange = "this.form.submit()"></td>
		<td colspan = "2"><button name="B34"'.$Style1.' onclick ="JavaScript:Click(17);" onmousemove="f1(34);" onmouseout="f2(34);">Thống kê - Phân tích</button> </td>
		</tr>';
		
		echo '<tr '.$Height2.'><td></td><td></td>
		<td ><button name="B73"'.$Style2.'  onclick="cet_thongke1();"onmousemove="f1(73);" onmouseout="f2(73);">Thống kê 1</button> </td>
		</tr>'; 
		echo '<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B75"'.$Style2.'  onclick="cet_thongke2();"onmousemove="f1(75);" onmouseout="f2(75);">Thống kê 2</button> </td>
			</tr>'; 
		echo '<tr '.$Height2.'><td></td><td></td>
			<td ><button name="B751"'.$Style2.'  onclick="cet_thongke3();"onmousemove="f1(751);" onmouseout="f2(751);">Thống kê 3</button> </td>
			</tr>'; 
	}
	else {
		echo    '<tr '.$Height1.'>
		<td  align="center"><input type = "checkbox"  name ="ckthongke" value ="1"  onclick="JavaScript:change(14);" onchange = "this.form.submit()"></td>
		<td colspan = "2"><button name="B34"'.$Style1.' onclick ="JavaScript:Click(17);" onmousemove="f1(34);" onmouseout="f2(34);">Thống kê - Phân tích</button> </td>
		</tr>';
		
	}
	
	echo'<tr '.$Height1.'>	<td  align="center"><input type = "checkbox" disabled></td>
		<td colspan = "2"><button name="B42"'.$Style1.' onclick="dangxuat();" onmousemove="f1(42);" onmouseout="f2(42);">Đăng xuất</button> </td>	
		</tr>';
	
	echo'</tr>
		<tr '.$Height1.'><td align="center"><input type = "checkbox" disabled></td>
		<td colspan = "2"><a target="main" href="Doimatkhau.php"><button name="B44"'.$Style1.' onclick="cet_doipass();" onmousemove="f1(44);" onmouseout="f2(44);">Đổi mật khẩu</button> </td>
		</tr>';	
	}
	echo'<tr '.$Height1.'>
			<td  align="center"><input type = "checkbox" disabled></td>
			<td colspan = "2"><button name="B36"'.$Style1.' onclick="JavaScript:Click(36);" onmousemove="f1(36);" onmouseout="f2(36);">Trợ giúp</button> </td>
		</tr>';
	echo '<tr '.$Height1.'>	<td align="center"><input type = "checkbox" disabled></td>
			<td colspan = "2"><button name="B40"'.$Style1.' onclick="JavaScript:Click(21);" onmousemove="f1(40);" onmouseout="f2(40);">Đăng nhập</button> </td>
		</tr>';
echo '</table>';

echo '</form>';
  	

?>
	
</body>
</html> 
