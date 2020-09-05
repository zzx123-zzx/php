<?php

	//评论
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	$link = connect();

	// $query = "insert into sfk_reply(content_id,content,time,member_id) values()"

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$arrayData = array();
		$query = "select id from sfk_member1 where name = '{$_GET['username']}'";
		$result = execute($link,$query);
		$data = mysqli_fetch_assoc($result);

		$newData = implode($data);

		echo $newData;
			
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$content_id = $_POST['id'];
		$content = $_POST['reply'];
		$member_id = $_POST['member_id'];

		// $query = "insert into sfk_reply(content_id,content,time,member_id) values({$_POST['id']},'{$_POST['reply']}',now(),{$_POST['member_id']})"; 
		// // var_dump($_POST);

		$query = "insert into sfk_reply (content_id,content,time,member_id) values({$content_id},'{$content}',now(),{$member_id})";

		execute($link,$query);
				if(mysqli_affected_rows($link)==1){
			$statue = '200';
			echo $statue;
		}
	}
?>