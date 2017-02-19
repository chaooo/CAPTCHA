<?php 
	session_start();

	$image = imagecreatetruecolor(200, 60);
	$bgcolor = imagecolorallocate($image, 255, 255, 255);
	imagefill($image, 0, 0, $bgcolor);

	$fontface = 'FZLTCXHJW.TTF';
	$str = "的一了是我不在人们有来他这上着个地到大里说就去子得也和那要下看天时过出小么起你都把好还多没为又可家学只以主会样年想生同老中十从自面前头道它后然走很像见两用她国动进成回什边作对开而己些现山民候经发工向事命给长水几义三声于高手知理眼志点心战二问但身方实吃做叫当住听革打呢真全才四已所敌之最光产情路分总条白话东席次亲如被花口放儿常气五第使写军吧文运再果怎定许快明行因别飞外树物活部门无往船望新带队先力完却站代员机更九您每风级跟笑啊孩万少直意夜比阶连车重便斗马哪化太指变社似士者干石满日决百原拿群究各六本思解立河村八难早论吗根共让相研今其书坐接应关信觉步反处记将千找争领或师结块跑谁草越字加脚紧爱等习阵怕月青半火法题建赶位唱海七女任件感准张团屋离色脸片科倒睛利世刚且由送切星导晚表够整认响雪流未场该并底深刻平伟忙提确近亮轻讲农古黑告";
	$strdb = str_split($str,3);
	$captch_code ='';

	for ($i=0; $i < 4; $i++) { 
		$fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
		
		$index = rand(0,count($strdb));
		$cn = $strdb[$index];
		$captch_code .= $cn;

		imagettftext($image, mt_rand(20,24), mt_rand(-60,60), (40*$i+20), mt_rand(30,35), $fontcolor, $fontface, $cn);

		//imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}
	$_SESSION['authcode'] = $captch_code;

	for ($i=0; $i<200; $i++) { 
		$pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
		imagesetpixel($image, rand(1,199), rand(1,59), $pointcolor);
	}

	for ($i=0; $i<5; $i++) { 
		$linecolor = imagecolorallocate($image, rand(80,200), rand(80,200), rand(80,200));
		imageline($image, rand(1,199), rand(1,59), rand(1,199), rand(1,59), $linecolor);
	}

	header('content-type:image/png;charset=utf-8');
	imagepng($image);

	//end
	imagedestroy($image);

?>