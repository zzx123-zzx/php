<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$query = "insert into contact(contact_content,time) values('{$_POST['desc']}','{$_POST['time']}')";

		execute($link,$query);

		if(mysqli_affected_rows($link)==1){
			$statu = '200';
			echo $statu;
		}
	}
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$query = "select * from contact";

		$result = execute($link,$query);

		$newResult = array();

		while($num = mysqli_fetch_assoc($result)){
			array_push($newResult,$num);
		}

		$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);
		echo $newData;	
	}
?>
