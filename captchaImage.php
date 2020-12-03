<?php

	session_start();

	$random = md5(rand());

	$captcha_code = substr($random, 0 , 6);

	$_SESSION['captcha_code'] = $captcha_code;

	header ('Content-Type: image/png');

	$image = imagecreatetruecolor(200, 38);

	$background_colour = imagecolorallocate($image, 100, 200, 40);

	$text_colour = imagecolorallocate($image, 255, 255, 255);

	imagefilledrectangle($image, 0, 0, 200, 38, $background_colour);

	$font = dirname(__FILE__) . '/arial.ttf';

	imagettftext($image, 20, 0, 60, 38, $text_colour, $font, $captcha_code);

	imagepng($image);

	imagedestroy($image);
?>