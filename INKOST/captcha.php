<?php
session_start();
header("Content-type: image/png");

$captcha_image = imagecreatefrompng("images/captcha.png")
	or die("Fail to create image !");
$captcha_font = imageloadfont("images/anonymous.gdf");
$captcha_text = substr(md5(uniqid('')),-9,9);

$_SESSION['captcha'] = $captcha_text;

$captcha_color = imagecolorallocate($captcha_image,0,0,0);
imagestring($captcha_image,$captcha_font,15,5,$captcha_text,$captcha_color);
imagepng($captcha_image);
imagedestroy($captcha_image);
?>