<?php 
	session_start();

	header('content-type:image/png;charset=utf-8');

	$image = imagecreatetruecolor(100, 30);
	$bgcolor = imagecolorallocate($image, 255, 255, 255);
	imagefill($image, 0, 0, $bgcolor);

/*  //仅仅是4个数字的随机验证码
	for ($i=0; $i < 4; $i++) { 
		$fontsize = 6;
		$fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
		$fontcontent = rand(0,9);

		$x = ($i*100/4) + rand(5,10);
		$y = rand(5,10);

		imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}
*/
	$captch_code ='';
	//字母加数字的随机验证码
	for ($i=0; $i < 4; $i++) { 
		$fontsize = 6;
		$fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
		
		$data = 'acdefghikjmnpqrstuvwxy345789';//可以适当删减用户分辨不清的字母和数字，如0和o,1和l,2和z,6和b等。
		$fontcontent = substr($data, rand(0,strlen($data)), 1);
		$captch_code .=$fontcontent;

		$x = ($i*100/4) + rand(5,10);
		$y = rand(5,10);

		imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}
	$_SESSION['authcode'] = $captch_code;

	for ($i=0; $i<200; $i++) {  //生成干扰点
		$pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
		imagesetpixel($image, rand(1,99), rand(1,99), $pointcolor);
	}

	for ($i=0; $i<5; $i++) {   //生成干扰线
		$linecolor = imagecolorallocate($image, rand(80,200), rand(80,200), rand(80,200));
		imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);
	}

	imagepng($image);

	//end
	imagedestroy($image);

?>