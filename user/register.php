<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';
	
	$link = connect();

	$statue = '';
	if(empty($_POST['username'])){
		$statue = '403';
		echo $statue;
		exit;
	}
	//用户名不得超过32个字符
	if(mb_strlen($_POST['username'])>32){
		$statue = '401';
		echo $statue;
		exit;
	}
	if(mb_strlen($_POST['password'])<6){
		$statue = '402';
		echo $statue;
		exit;
	}
	if($_POST['password']!=$_POST['confirmPassword']){
		$statue = '400';
		echo $statue;
		exit;
	}

	$query2 = "select * from sfk_member1 where name = '{$_POST['username']}'";
	$result = execute($link,$query2);

	if(mysqli_num_rows($result)){
		$statue = '300';
		echo $statue;
		return;
	}


	$query = "insert into sfk_member1(name,pw,register_time) values ('{$_POST['username']}',md5('{$_POST['password']}'),now())";

	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		$statue = '200';
		$username = '';
		$password = '';	
		setcookie($username,$_POST['username']);
		setcookie($password,md5($_POST['password']));
		echo $statue;
	}else {
		$statue = '503';
		echo $statue;
	}

?>