<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	$link = connect();
	$statue = '';

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$query = "select * from sfk_father_module where id = {$_GET['id']}";
		$result = execute($link,$query);
		$data = mysqli_fetch_assoc($result);
		$data = json_encode($data,JSON_UNESCAPED_UNICODE);
		echo $data;
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(!is_numeric($_POST['id'])){
			$statue = '503';
			echo $statue;
		}		
		$query = "update sfk_father_module set module_name='{$_POST['newModuleName']}' where id = {$_POST['id']}";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			$statue = '200';
			echo $statue;
		}else {
			$statue = '403';
			echo $statue;		
		}
	}
?>