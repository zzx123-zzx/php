<?php
	//计算每个部落的文章总数

	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();
	$query = "select * from sfk_content where module_id = '{$_GET['id']}'";

	$result = execute($link,$query);

	$newData = mysqli_num_rows($result);

	// $newResult = array();

	// while ($num = mysqli_num_rows($result)) {
	// 	array_push($newResult, $num);
	// }

	// $newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);

	echo $newData;
?>