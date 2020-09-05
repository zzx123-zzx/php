<?php

	//获取这个文章的所有评论
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	$link = connect();


	if($_SERVER['REQUEST_METHOD'] == 'GET'){
	$arrayData = array();
	// $query = "select * from sfk_reply where content_id = '{$_GET['id']}'";
	$query = "select sm.name,sr.member_id,sr.time,sr.id,sr.content,sr.quote_id from sfk_reply sr,sfk_member1 sm where sr.member_id = sm.id and  sr.content_id = {$_GET['id']}";
	$result = execute($link,$query);
	$newResult = array();

	while($num = mysqli_fetch_assoc($result)){
		array_push($newResult,$num);
	}
	$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);

	echo $newData;
			
	}
?>