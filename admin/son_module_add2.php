<?php
	//添加兴趣部落
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';
	
	$link = connect();
	$statue = '';
		$father_module_id = $_POST['fatherModuleId'];
		$module_name = $_POST['sonMoudleName'];
		$infos = $_POST['info'];
		// $member_id = $_POST['memberId'];
		// $sort = $_POST['sonModuleSort'];


		if ($_FILES['file']['error']) {
		switch($_FILES['file']['error']){
			case 1:
				$str = '上传文件超过限制值';
				break;
			case 2:
				$str = '上传文件超过html表单值';
			case 3:
				$str = '只有部分文件被上传';
			case 4:
				$str = '没有文件被上传';
			case 6:
				$str = '找不到零时文件夹';
			case 7:
				$str = '文件写入失败';
		}
		echo $str;
		exit;
	}
	$allowMime = ['image/png','image/jpeg','image/gif'];

	$allowsubFix = ['png','jpeg','gif','jpg'];
	$info = pathinfo($_FILES['file']['name']);
	$subFix = $info['extension'];        //后缀名
	// var_dump($info); 
	if(!in_array($_FILES['file']['type'],$allowMime)){
		exit('不准许的mime类型');
	}
	$path = 'E:/php/PHPTutorial/WWW/demo/IndexBBS/project/static/';
	if(!file_exists($path)){
		mkdir($path);
	}

	$name = uniqid().'.'.$subFix;
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		if(move_uploaded_file($_FILES['file']['tmp_name'],$path.$name)){
			$a = $path.$name;
			$newpathname = '../../static/'.$name;   //随机的图片名
			// var_dump($_POST);
			$query = "insert into sfk_son_module(father_module_id,module_name,info,module_src) values ({$father_module_id},'{$module_name}','{$infos}','{$newpathname}')";
			execute($link,$query);

			if(mysqli_affected_rows($link)==1){
				$statue = '200';
				echo $statue;
			}

		}else{
			echo  '文件移动失败';
		}
	}else{
		echo '你不是上传文件';
		exit;
	}
?>