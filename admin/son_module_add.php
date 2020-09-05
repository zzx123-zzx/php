<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';
	
	$link = connect();
	$statue = '';
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$arrayData = array();
		$query = "select * from sfk_father_module";
		$result = execute($link,$query);
		while($data = mysqli_fetch_assoc($result)){
			array_push($arrayData,$data);
		}
		$arrayData = json_encode($arrayData,JSON_UNESCAPED_UNICODE);
		echo $arrayData;
	}
?>