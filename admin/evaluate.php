<?php
	header('Access-Control-Allow-Origin: *');

    include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();

	// $query = "select sr.content_id,sr.member_id,sr.content,yy.content as yy_content from sfk_reply as sr,yingyong as yy,sfk_content as sc where sr.content_id = sc.id = ";

	// $query = "select "

	// $query = "select yy.queto_id,yy.content as yy_content,sr.id,sr.content_id,sr.content as sr_content,sc.id,sc.content from sfk_reply as sr,sfk_content as sc,yingyong as yy where sr.content_id = sc.id and yy.queto_id = sr.id";

	// $query = "select sr.id,sr.content_id,sr.content as sr_content,sc.id,sc.content from sfk_reply as sr,sfk_content as sc where sr.content_id = sc.id";

	$query = "select sr.id as sr_id,sr.content_id,sr.content as sr_content,sc.id,sc.content from sfk_reply as sr,sfk_content as sc where sr.content_id = sc.id";

	// $query = "select yy.content_id as yy_content_id,yy.queto_id,yy.content as yy_content,sr.id,sr.content_id,sr.content as sr_content,sc.id,sc.content from sfk_reply as sr,sfk_content as sc,yingyong as yy where sr.content_id = sc.id and yy.content_id = sr.id";

	// $query = "select sr.id,sr.content_id,sr.content as sr_content,sc.id,sc.content from yingyong as sr,sfk_content as sc where sr.content_id = sc.id";

	// $query = "select sr.content as sr_content,sr.content_id as sr_content_id,sc.id,yy.content,yy.content_id from yingyong as yy,sfk_content as sc,sfk_reply as sr where yy.content_id = sc.id and sr.content_id = sc.id";

	$result = execute($link,$query);
	$newResult = array();

	while($num = mysqli_fetch_assoc($result)){
		array_push($newResult,$num);
	}
	$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);
	echo $newData;	
?>