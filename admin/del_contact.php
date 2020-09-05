<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();
	$statue = '';

	$query = "delete from contact where id = {$_GET['id']}";
	execute($link,$query);	

	if(mysqli_affected_rows($link)){
		$statue = '200';
		echo $statue;
	}else {
		$statue = '403';
		echo $statue;
	}
?>