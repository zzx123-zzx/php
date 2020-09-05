<?php

	//删除轮播图数据

	header("content-type:text/html;charset=utf-8");
    header('Access-Control-Allow-Origin: *');

    include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	$query = "delete from sfk_banner where id ='{$_GET['id']}'";

	execute($link,$query);

	if(mysqli_affected_rows($link)){
		echo '200';
	}else{
		echo '404';
	}
?>