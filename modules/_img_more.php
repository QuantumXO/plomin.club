<?php

include_once 'config.php';


if( isset($_POST['imagesCount']) ){
	
	$imagesCount = $_POST['imagesCount'];
	
	try{

		$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$sql = "SELECT * FROM images ORDER BY id DESC LIMIT :limit, 9";

		$stmt = $connection->prepare($sql);

		$stmt->bindValue(':limit', $imagesCount);

		$stmt->execute();
		//$connection->exec($sql);
		//echo "New record created successfully";


		//if($stmt > 0){

			while($row = $stmt->fetch()){
				$imagesCount++;

				echo "<li class='photo_gallery-item'>";
				echo "<a href=".$row['thumbnail']." class='photo_gallery-link' data-largesrc=".$row['largeSrc']." data-title='".$row['title']."' data-description='".$row['description']."'></a>";
				echo "<img src=".$row['thumbnail']." class='photo_gallery-img' width='1280' height='853' alt='".$row['alt']."' />";	
				echo "<div class='photo_gallery-overLayer'></div>";
				echo "<div class='photo_gallery-infoLayer'><ul><li><h2>photo</h2></li><li><p>View Picture</p></li></ul></div></li>";
			}

		//}
	}catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
}else{
	echo 'ХУЕТA';
}







?>