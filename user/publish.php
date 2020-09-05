
<?php
	//发布帖子
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';

	$link = connect();
	$statue = '';

	$member = $_POST['member'];

	//查询前台正在操作页面的用户的id，也就是正在发帖的用户的id
	$query = "select id from sfk_member1 where name = '$member'";

	$result = execute($link,$query);
	$newResult = array();

	$member_id = mysqli_fetch_assoc($result);
	$member_id = implode($member_id);

	//正式插入帖子内容
	$query = "insert into sfk_content(module_id,title,content,time,member_id)
			 values({$_POST['sonModuleId']},'{$_POST['title']}','{$_POST['content']}',now(),{$member_id})
	";
	execute($link,$query);

	if(mysqli_affected_rows($link)==1){
		$statue = '200';
		echo $statue;
	}
 ?>