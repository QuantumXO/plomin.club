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
	<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/styles.min.css">
	<title>Галерея || Plomin.club</title>
	<meta name="description" content="Літературний клуб 'Пломінь': лекторій, бібліотека, кав'ярня у центрі Києва." /> 
	<meta name="keywords" content="бібліотека, лекція, лекторій, безкоштовні лекції, лекції в Києві, кав'ярня в центрі, лекції про філософію, смачна кава, цікаві книги, безкоштовний київ, філософія в Україні." />
	<link href="css/least.min.css" rel="stylesheet" />
</head>	
<body>
<header>
	<div class="header-top">
	<div class="row clearfix">
		<div class="header-logo"><img src="img/header-logo.png" width="166" height="75" alt="logo"></div>
		<a href="#" class="nav-open" id="openNav"><span class="hamburger"></span></a>
		<nav class="header-nav" id="headerNav" role="navigation">
			<ul class="header_nav-list">
				<li class="header_nav-item header_nav-item-logo"><img src="img/header-logo.png" width="166" height="75" alt="logo"></li>
				<li class="header_nav-item"><a href="//plomin.club" class="header_nav-link">хто ми?</a></li>
				<li class="header_nav-item"><a href="//plomin.club/poster" class="header_nav-link">афіша</a></li>
				<li class="header_nav-item"><a href="//blog.plomin.club" class="header_nav-link">статті</a></li>
				<li class="header_nav-item"><a href="//shop.plomin.club" class="header_nav-link">магазин</a></li>
				<li class="header_nav-item"><a href="//plomin.club/gallery" class="header_nav-link">галерея</a></li>
				<li class="header_nav-item"><a href="//plomin.club/contacts" class="header_nav-link">контакти</a></li>
			</ul>
		</nav>
	</div>
</div>
	<?php //include_once('blocks/_header-top.html'); ?>
</header>
<main>
	<article class="main-gallery gallery">
		<div class="row clearfix">
			<div class="main_gallery-tabs">
				<h3 class="main_gallery-title main-title"><span>галерея</span></h3>
				<div class="main_gallery-photo gallery-photo">
					<div id="photoGallery">
	<div class="clearfix" id="fullPreview">
		<a class="fullPreview-close"></a>
		<img src="img/photo-9.jpg" class="fullPreview-img" alt="">
		<p class="fullPreview-text"></p>
	</div>
	<ul class="photo_gallery-list" id="photoGalleryList">
		<?php 
			while($row = $stmt->fetch()){
				echo "<li class='photo_gallery-item'>";
				echo "<a href=".$row['thumbnail']." class='photo_gallery-link' data-largesrc=".$row['largeSrc']." data-title='".$row['title']."' data-description='".$row['description']."'></a>";
				echo "<img src=".$row['thumbnail']." class='photo_gallery-img' width='1280' height='853' alt=".$row['alt']." />";	
				echo "<div class='photo_gallery-overLayer'></div>";
				echo "<div class='photo_gallery-infoLayer'><ul><li><h2>photo</h2></li><li><p>View Picture</p></li></ul></div></li>";
			}
	   ?>
	</ul>
	<ul class="photo_gallery-list" id="videoGalleryList">
		<?php 
			while($row2 = $stmt2->fetch()){
				echo "<li class='photo_gallery-item video'><iframe width='240' height='164' src='".$row2['videoLink']."' class='' frameborder='0' allowfullscreen></iframe></li>";
			}
	   ?>
	</ul>
	<!--<a href="#" class="main_images-more" id="mainImagesMore">більше фото</a>-->
</div>

				</div>
			</div>
		</div>
	</article>
</main>	
<footer id="contancts">
	<div class="footer-bottom">
	<div class="row clearfix">
		<div class="footer-inner clearfix">
			<p class="footer-slogan">Пломенійте <span>разом</span> <span>із</span> <span>нами!</span></p>
			<ul class="footer-list">
				<li class="footer-item"><a href="//facebook.com/plominclub/" class="footer_item-link fa fa-facebook" rel="nofollow" target="_blank"></a></li>
				<li class="footer-item"><a href="//t.me/plomin" class="footer_item-link fa fa-telegram" rel="nofollow" target="_blank"></a></li>
				<li class="footer-item"><a href="//vk.com/plomin " class="footer_item-link fa fa-vk" rel="nofollow" target="_blank"></a></li>
				<li class="footer-item"><a href="//instagram.com/plomin_ua" class="footer_item-link fa fa-instagram" rel="nofollow" target="_blank"></a></li>
				<li class="footer-item"><a href="//youtube.com/channel/UC583f9dcWohaUZSyQP-xTIw" class="footer_item-link fa fa-youtube-play" rel="nofollow" target="_blank"></a></li>
				<li class="footer-item"><a href="mailto:plominlit@gmail.com" class="footer_item-link fa fa-envelope-o" rel="nofollow" target="_blank"></a></li>
			</ul>
		</div>
	</div>
</div>

</footer>
<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.min.js"></script>-->
<script src="js/jquery-ui.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/main.js"></script>	
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