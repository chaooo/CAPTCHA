<?php 
	session_start();
	

	$table = array(
		'pic0' => '0', 
		'pic1' => '1', 
		'pic2' => '2', 
		'pic3' => '3', 
		);

	$index = rand(0,3);

	$value = $table['pic'.$index];
	$_SESSION['authcode'] = $value;

	$filename = dirname(__FILE__).'\\pic'.$index.'.jpg';
	$contents = file_get_contents($filename);

	header('content-type:image/jpg');
	echo $contents;
	

?>