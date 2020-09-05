<?php
	//此表查询对应子版块下的帖子

	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

/*
	select * from sfk_content,sfk_son_module where sfk_content.module.id and sfk_son_module.id = {$_GET['id']}

*/	
	$link = connect();

	$query = "select sc.title,sc.content,sm.module_name,sc.id from sfk_content as sc,sfk_son_module as sm where sc.module_id = sm.id and sm.father_module_id = {$_GET['id']}";

	// $query = "select * from sfk_content as sc where sc.module_id = {$_GET['id']}";

	$result = execute($link,$query);

	$newResult = array();

	while($num = mysqli_fetch_assoc($result)){
		array_push($newResult,$num);
	}

	$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);

	echo $newData;
?>