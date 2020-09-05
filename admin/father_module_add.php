<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	$module_name = $_POST['moduleName'];
	$link = connect();
	$statu = '';

	if(empty($module_name)){
		return;
	}
	if(mb_strlen($module_name)>15||mb_strlen($module_name)<3){
		echo $statu = '403';
		return;
	}

	$query = "select * from sfk_father_module where module_name='{$module_name}'";
	$result = execute($link,$query);
	if(mysqli_num_rows($result)){
		echo '400';
		return;
	}


	$query = "insert into sfk_father_module(module_name) values('{$module_name}')";
	execute($link,$query);

	//影响了一行，代表插入成功
	if(mysqli_affected_rows($link)==1){
		$statu = '200';
		echo $statu;
	}
?>