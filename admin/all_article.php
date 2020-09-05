<?php
	//所有文章
	header("content-type:text/html;charset=utf-8");
    header('Access-Control-Allow-Origin: *');

    include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
			// $query = "select * from sfk_content";
			$query = "select sc.time,sc.title,sc.module_id,sc.id as sc_id,sm.id,sm.module_name from sfk_content as sc,sfk_son_module as sm where sc.module_id = sm.id";

			$result = execute($link,$query);
			$newResult = array();

			while($num = mysqli_fetch_assoc($result)){
				array_push($newResult,$num);
			}
			$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);
			echo $newData;	
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$query = "insert into sfk_recommend(article_url,article_title) values('{$_POST['article_url']}','{$_POST['article_id']}')";

		execute($link,$query);

		if(mysqli_affected_rows($link)==1){
			$statue = '200';
			echo $statue;
		}
	}
?>