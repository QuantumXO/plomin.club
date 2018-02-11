<?php


include_once "config.php"; 

if(isset($_POST['videoLink'])){
	$videoLink = $_POST['videoLink'];
	
	
	try{
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO video (videoLink) VALUES ('$videoLink')";
		$connection->exec($sql);
		echo "New record created successfully";
	}catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
}


if(isset($_FILES['file'])){
	
	$fileUpload = $_FILES['file'];
	$fileUploadName = $_FILES['file']['name'];
	$UploadPath = 'uploads/';
	$fileUploadPath = $UploadPath . $fileUpload['name'];
	$allowed_ext = array('jpg','jpeg','png','gif'); //форматы для загрузки
	
	
	function get_extension($fileUploadName){
		$ext = explode('.', $fileUploadName);
		$ext = array_pop($ext);
		return strtolower($ext);
	}

	
	try{
		
		if(!in_array(get_extension($fileUploadName), $allowed_ext)){
			//echo 'Неверный формат файла для загрузки! Только: '.implode(',', $allowed_ext);
			echo 'Неверный формат файла!';
		}else{
			
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if( ! is_dir( $UploadPath ) ) mkdir( $UploadPath, 0777 );

			$fileUploadPathDone = move_uploaded_file($fileUpload['tmp_name'], $fileUploadPath);

			$sql = "INSERT INTO images (fileName) VALUES ('$fileUploadName')";
			$connection->exec($sql);
			echo "New record created successfully";
		}
	}catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
}



?>