<?php
	//子板块

	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';
	
	$link = connect();

	//ssm为子版块的别名，sfm为父板块的别名
	$query = "select ssm.id,ssm.module_name,sfm.module_name as father_module_name from sfk_son_module as ssm,sfk_father_module as sfm where ssm.father_module_id = sfm.id order by sfm.id";

	$result = execute($link,$query);
	$newResult = array();

	while($num = mysqli_fetch_assoc($result)){
		array_push($newResult,$num);
	}
	$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);

	echo $newData;
?>