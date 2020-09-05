<?php

	//评论
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	// var_dump($_POST);
	$link = connect();
	$quote_id = $_POST['quote_id'];
	$content_id = $_POST['content_id'];
	$content = $_POST['quoteReply'];
	$member_id = $_POST['member_id'];

	$query = "insert into sfk_reply(content_id,quote_id,content,time,member_id) values({$content_id},{$quote_id},'{$content}',now(),{$member_id})";

	execute($link,$query);

	if(mysqli_affected_rows($link)==1){
		$statue = '201';
		echo $statue;
	}
?>