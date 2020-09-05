<?php
	//新登录登录
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();
	$statue = '';

	$query = "select * from sfk_member1 where name = '{$_POST['username']}' and pw = md5('{$_POST['password']}')";
	$result = execute($link,$query);

	if(mysqli_num_rows($result)==1){
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$statue = '200';
		echo $statue;
	}else{
		$statue = '404';
		echo $statue;
	}
?>