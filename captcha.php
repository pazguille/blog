<?php

session_start();

$string = '';

for ($i = 0; $i < 5; $i++) {
	// this numbers refer to numbers of the ascii table (lower case)
	$string .= chr(rand(97, 122));
}

$_SESSION['rand_code'] = $string;

$dir = '/fonts/';

$image = imagecreatetruecolor(65, 25);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 200, 46, 38); // red
$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,0,0,200,100,$white);
imagettftext ($image, 15, 0, 0, 20, $color, $dir."TREBUC.TTF", $_SESSION['rand_code']);

header("Content-type: image/png");
imagepng($image);

?>