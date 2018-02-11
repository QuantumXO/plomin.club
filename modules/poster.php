<!DOCTYPE html>
<?php
	error_reporting(E_ALL);
	include_once 'config.php';

	try{
		
		$sql = 'SELECT * FROM posters ORDER BY id DESC LIMIT 1';

		$stmt = $connection->query($sql);
		
		while ($row = $stmt->fetch()){
			
			$fileUpload = $row['fileUpload'];
			$posterTitle = $row['posterTitle'];
			$posterDate = $row['posterDate'];
			$posterTime = $row['posterTime'];
			$posterMsg = $row['posterMsg'];
			$posterLink = $row['posterLink'];
		}
		
		//////////////
		
		$currentDate = date("Y-m-d");
		
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql_nearest = "SELECT * FROM posters WHERE posterDate <= '$currentDate' ORDER BY id DESC LIMIT 1";
		
		
		$stmt_nearest = $connection->prepare($sql_nearest);
		$stmt_nearest->bindValue(":currentDate", $currentDate);
		
		$stmt_nearest->execute();
		
		while ($row_nearest = $stmt_nearest->fetch()){
			
			$fileUpload_nearest = $row_nearest['fileUpload'];
			$posterTitle_nearest = $row_nearest['posterTitle'];
			$posterDate_nearest = $row_nearest['posterDate'];
			$posterDate_nearest_replace = DateTime::createFromFormat('Y-m-d', $posterDate_nearest)->format('d.m');
			$posterTime_nearest = $row_nearest['posterTime'];
			$posterMsg_nearest = $row_nearest['posterMsg'];
			$posterLink_nearest = $row_nearest['posterLink'];
		}
		
		
		//////////////
		// 3 events BEFORE 
		
		$sql_before = "SELECT * FROM posters WHERE posterDate < '$posterDate_nearest' ORDER BY id DESC LIMIT 3";
		
		$stmt_before = $connection->query($sql_before);
		
		//////////////
		// 3 events NEXT
		
		$sql_next = "SELECT * FROM posters WHERE posterDate > '$currentDate' ORDER BY id LIMIT 3";
		
		$stmt_next = $connection->query($sql_next);
		
		
	}catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
    }
	$connection = null;
?>
<html>
<head>
	@@include('blocks/_head.html')
	<title>Афіша || Plomin.club</title>
	<meta name="description" content="" /> 
	<meta name="keywords" content="" />
</head>
<body>
<header>
	@@include('blocks/_header-top.html')
	<?php //include_once('blocks/_header-top.html'); ?>
</header>
<main>
	@@include('blocks/_poster.html')
</main>
<footer>
	@@include('blocks/_footer.html')
</footer>
@@include('blocks/_scripts.html')
</body>
</html>