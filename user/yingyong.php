<?php
	//引用回复api
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	$link = connect();
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$arrayData = array();
		$query = "select * from yingyong where content_id = {$_GET['id']}";
		$result = execute($link,$query);
		while($data = mysqli_fetch_assoc($result)){
			array_push($arrayData,$data);
		}
		$arrayData = json_encode($arrayData,JSON_UNESCAPED_UNICODE);
		echo $arrayData;
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$qeury = "insert into yingyong (queto_id,content,content_id,member_id,time,name) values({$_POST['quote_id']},'{$_POST['content']}',{$_POST['content_id']},{$_POST['member_id']},now(),'{$_POST['name']}')";

	execute($link,$qeury);

	if(mysqli_affected_rows($link)==1){
		$statue = '200';
		echo $statue;
	}
		// var_dump($_POST);
	}
?>
