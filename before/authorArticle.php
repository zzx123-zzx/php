<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	$query = "select content from sfk_content where member_id = '{$_GET['id']}'";

	$result = execute($link,$query);

	$newData = mysqli_num_rows($result);

	echo $newData;

	// var_dump($_GET['id']);
?>