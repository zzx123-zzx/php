<?php

	//根据id获取所欲子版块
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	$query = "select * from sfk_son_module where id ={$_GET['id']}";

	$result = execute($link,$query);

	$newResult = array();

	while($num = mysqli_fetch_assoc($result)){
		array_push($newResult,$num);
	}

	$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);

	echo $newData;
