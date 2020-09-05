<?php

	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	$query = "delete from sfk_father_module where id = {$_GET['id']}";
	execute($link,$query);
	
?>