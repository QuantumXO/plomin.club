<!DOCTYPE html>
<?php
	include_once 'config.php';

try{
	$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
	$sql = "SELECT * FROM images ORDER BY id DESC LIMIT 20";
	$stmt = $connection->prepare($sql);
	$stmt->execute();
	
	$sql2 = "SELECT * FROM video ORDER BY id DESC LIMIT 20";
	$stmt2 = $connection->prepare($sql2);
	$stmt2->execute();
	
}catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}
$connection = null;


?>
<html>
<head>
	@@include('blocks/_head.html')
	<title>Галерея || Plomin.club</title>
	<meta name="description" content="Літературний клуб 'Пломінь': лекторій, бібліотека, кав'ярня у центрі Києва." /> 
	<meta name="keywords" content="бібліотека, лекція, лекторій, безкоштовні лекції, лекції в Києві, кав'ярня в центрі, лекції про філософію, смачна кава, цікаві книги, безкоштовний київ, філософія в Україні." />
	<link href="css/least.min.css" rel="stylesheet" />
</head>	
<body>
<header>
	@@include('blocks/_header-top.html')
	<?php //include_once('blocks/_header-top.html'); ?>
</header>
<main>
	<article class="main-gallery gallery">
		<div class="row clearfix">
			<div class="main_gallery-tabs">
				<h3 class="main_gallery-title main-title"><span>галерея</span></h3>
				<div class="main_gallery-photo gallery-photo">
					@@include('blocks/_photo-gallery.html')
				</div>
			</div>
		</div>
	</article>
</main>	
<footer id="contancts">
	@@include('blocks/_footer.html')
</footer>
@@include('blocks/_scripts.html')	
<script src="js/modernizr.custom.min.js"></script>
<!--<script src="js/least.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" defer="defer"></script>
<script>
$(function($) {
	$(function() {
		
	});		
}(jQuery));
</script>
</body>
</html>