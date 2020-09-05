 <?php

    //php处理多文件上传的几种方法
    header("content-type:text/html;charset=utf-8");
    header('Access-Control-Allow-Origin: *');

    include_once '../inc/mysqli.inc.php';
	include_once '../inc/config.inc.php';
	$link = connect();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		foreach ($_FILES as $fileInfo) {
	   
	   $tmpfile = $fileInfo['tmp_name'];
		   $info = pathinfo($fileInfo['name']);
		   $filefix = $info['extension'];

		   $path = 'E:/php/PHPTutorial/WWW/demo/IndexBBS/project/static/';

		   $dstfile = $path.$fileInfo['name'];

		   $newpathname = '../../static/'.$fileInfo['name'];
		 
		    if (move_uploaded_file($tmpfile, $dstfile)) {
		    	$query = "insert into sfk_banner (banner_src) values('{$newpathname}')";
		    	execute($link,$query);
		        echo $dstfile;
		    } else {
		        echo '404';
		    }
		}
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$query = "select * from sfk_banner";

		$result = execute($link,$query);
		$newResult = array();

		while($num = mysqli_fetch_assoc($result)){
			array_push($newResult,$num);
		}
		$newData = json_encode($newResult,JSON_UNESCAPED_UNICODE);

		echo $newData;
	}