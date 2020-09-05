<?php

	//推荐文章api
	header("content-type:text/html;charset=utf-8");
    header('Access-Control-Allow-Origin: *');
    include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_POST['article_url'])){
			$status = 1;
			$query = "insert into sfk_recommend(article_url,article_title,status) values('{$_POST['article_url']}','{$_POST['article_title']}','{$status}')";

		// $query = "insert into sfk_recommend ()"

			execute($link,$query);

			if(mysqli_affected_rows($link)==1){
				$statue = '200';
				echo $statue;
			}
		}else{
			echo 'no';
		}
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$query = "select * from sfk_recommend";

		$result = execute($link,$query);

		$newResult = array();

		while($num = mysqli_fetch_assoc($result)){
			array_push($newResult,$num);
		}

		$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);
		echo $newData;	
	}
?>