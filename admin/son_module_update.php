<?php
	header('Access-Control-Allow-Origin: *');
	include_once '../inc/config.inc.php';
	include_once '../inc/mysqli.inc.php';

	$link = connect();
	$statue = '';
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$query = "select * from sfk_son_module where id = {$_GET['id']}";
		$result = execute($link,$query);
		$data = mysqli_fetch_assoc($result);
		$data = json_encode($data,JSON_UNESCAPED_UNICODE);
		echo $data;
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$allowMime = ['image/png','image/jpeg','image/gif'];
		$allowsubFix = ['png','jpeg','gif','jpg'];
		$info = pathinfo($_FILES['file']['name']);
		$subFix = $info['extension']; 

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
						$query = "update sfk_son_module set
		 		 		father_module_id = {$_POST['fatherModuleId']},
						module_name = '{$_POST['module_name']}',
						info='{$_POST['info']}',
						module_src = '{$newpathname}' where id = {$_GET['id']}"; 
				execute($link,$query);

				if(mysqli_affected_rows($link)==1){
					$statue = '修改成功';
					echo $statue;
				}

			}else{
				echo  '文件移动失败';
			}
		}else{
			echo '你不是上传文件';
			exit;
		}
	}
?>