<?php


include_once "config.php"; 


if( isset($_FILES['fileUpload']) && isset($_POST['posterTitle']) && isset($_POST['posterDate']) && isset($_POST['posterTime']) && isset($_POST['posterLink']) && isset($_POST['posterMsg']) ){
	
	$fileUpload = $_FILES['fileUpload'];
	$posterTitle = $_POST['posterTitle'];
	$posterDate = $_POST['posterDate'];
	$posterTime = $_POST['posterTime'];
	$posterMsg = $_POST['posterMsg'];
	$posterLink = $_POST['posterLink'];
	$UploadPath = 'img/uploads/posters/';
	$fileUploadPath = $UploadPath . $fileUpload['name'];
	try{

		// set the PDO error mode to exception
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if( ! is_dir( $UploadPath ) ) mkdir( $UploadPath, 0777 );

		$fileUploadPathDone = move_uploaded_file($fileUpload['tmp_name'], $fileUploadPath);

		//$sql = "INSERT INTO posters ('posterLink', 'posterMsg', 'fileUpload') VALUES ($posterLink, $posterMsg, $fileUploadPathDone)";
		$sql = "INSERT INTO posters (posterTitle, posterDate, posterTime, posterLink, posterMsg, fileUpload) VALUES ('$posterTitle', '$posterDate', '$posterTime', '$posterLink', '$posterMsg', '$fileUploadPath')";

		//$result = mysqli_query($connection, $sql);

		$connection->exec($sql);
		echo "New record created successfully";
	}
	catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
    }
	$connection = null;

}

?>