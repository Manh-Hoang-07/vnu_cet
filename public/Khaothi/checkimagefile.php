// kiểm tra file là ảnh

function is_image($path)
{
	$a = getimagesize($path);
	$image_type = $a[2];
	
	if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
	{
		return true;
	}
	return false;
}

$a[0] and $a[1] are the width and height of the image.
$a[2] has the image type.
Other image formats include :
[IMAGETYPE_GIF] => 1
[IMAGETYPE_JPEG] => 2
[IMAGETYPE_PNG] => 3
[IMAGETYPE_SWF] => 4
[IMAGETYPE_PSD] => 5
[IMAGETYPE_BMP] => 6
[IMAGETYPE_TIFF_II] => 7
[IMAGETYPE_TIFF_MM] => 8
[IMAGETYPE_JPC] => 9
[IMAGETYPE_JP2] => 10
[IMAGETYPE_JPX] => 11
[IMAGETYPE_JB2] => 12
[IMAGETYPE_SWC] => 13
[IMAGETYPE_IFF] => 14
[IMAGETYPE_WBMP] => 15
[IMAGETYPE_JPEG2000] => 9
[IMAGETYPE_XBM] => 16
[IMAGETYPE_ICO] => 17
[IMAGETYPE_UNKNOWN] => 0
[IMAGETYPE_COUNT] => 18
//----------------------
$url = getimagesize("stcode.gif");
if (is_array($url)) {
echo "<br />This is image!";
} else {
echo "<br />This is not image!";

}