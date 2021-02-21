<script>
function mydate()
{
  //alert("");
document.getElementById("dt").hidden=false;
document.getElementById("ndt").hidden=true;
}
function mydate1()
{
	 d=new Date(document.getElementById("dt").value);
	dt=d.getDate();
	mn=d.getMonth();
	mn++;
	yy=d.getFullYear();
	document.getElementById("ndt").value=dt+"/"+mn+"/"+yy
	document.getElementById("ndt").hidden=false;
	document.getElementById("dt").hidden=true;
	}
</script>
<?php
session_start();

$first_date = strtotime('2020-07-06');  
 $second_date = strtotime('2020-07-15'); 
 $datediff = abs($first_date - $second_date);   
 echo floor($datediff / (60*60*24));

print '<input type="date" id="dt" value ="2021/02/18" onchange="mydate1();">
<input type="text" id="ndt"  onclick="mydate();" hidden />
';
		
//Nguồn: https://trungtrinh.com/tinh-khoang-cach-giua-2-ngay-bat-ky-bang-php.html
/*
$string = 'c4ca4238a0b923820dcc';
$encrypted = \web_uet\vendor\laravel\frameword\src\Illuminate\Support\Facades\Crypt::encrypt($string);
$decrypted_string = \web_uet\vendor\laravel\frameword\src\Illuminate\Support\Facades\Crypt::decrypt($encrypted);
//web_uet/vendor/laravel/frameword/src/IIuminate/Cookie/Middeware/EncryptCookie.php
var_dump($string);
var_dump($encrypted);
var_dump($decrypted_string);
*/
/*
use  Illuminate\Support\Facades\Crypt;
print '1:';
print_r($_COOKIE);
$encrypted = Crypt::encryptString('Hello world.');
print '12';
$decrypted = Crypt::decryptString($encrypted);
print '1234';
*/
/*
$expected  = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$correct   = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$incorrect = crypt('apple', '$2a$07$usesomesillystringforsalt$');
$s1 = '$2y$10$CfjbbOc5d/6wr4/klktEhO7MddZnXE9cpVglsq8tUENIjsTWDotrG';
$s2 = '$2y$10$nftBjjPMOQv8T19mlvBST..ElBZcxWmYPdhhJcHD3C796cHgILCpG';
$s1 = password_hash('123456', PASSWORD_DEFAULT);
$s2 = password_hash('123456', PASSWORD_DEFAULT);
var_dump($s1);
var_dump($s2);
var_dump(hash_equals($s1,$s2));
*/
?>
