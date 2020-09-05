<?php

	//获取文章作者名字还有文章作者发布的文章总数，联表查询
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	$link = connect();
	

	//联表查询时注意要让两个表对应起来，sm.id = sc.member_id	
	$query = "select sm.name,sc.content from sfk_member1 as sm,sfk_content as sc where sm.id = sc.member_id and sm.id= '{$_GET['id']}'";
	$result = execute($link,$query);

	$newResult = array();

	while($num = mysqli_fetch_assoc($result)){
		array_push($newResult,$num);
	}

	$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);

	echo $newData;
	// var_dump($_GET);

?>