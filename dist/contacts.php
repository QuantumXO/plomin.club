<!DOCTYPE html>
<?php
	include_once 'config.php';
?>
<html>
<head>
	<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/styles.min.css">
	<title>Plomin.club</title>
	<meta name="description" content="Літературний клуб 'Пломінь': лекторій, бібліотека, кав'ярня у центрі Києва." /> 
	<meta name="keywords" content="бібліотека, лекція, лекторій, безкоштовні лекції, лекції в Києві, кав'ярня в центрі, лекції про філософію, смачна кава, цікаві книги, безкоштовний київ, філософія в Україні." />
</head>
<body class="contacts-body">
<header>
	<?php //include_once('blocks/_header-top.html'); ?>
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
</header>

<main>
	<article class="main-contacts">
		<div class="row clearfix">
			<h3 class="contacts-title main-title"><span>контакти</span></h3>
			<div class="contacts-inner">
				<iframe class="google-map"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1068.1368280113654!2d30.520339280881686!3d50.450937910860105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce50853c3c51%3A0x6703d85b0d10b524!2z0L_RgNC-0LLRg9C70L7QuiDQotCw0YDQsNGB0LAg0KjQtdCy0YfQtdC90LrQsCwgNSwg0JrQuNGX0LI!5e0!3m2!1sru!2sua!4v1507665260231" width="600" height="450" frameborder="0" allowfullscreen></iframe>
				<img src="img/map.png" class="footer-map" width="328" height="307" alt="Map">
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
</body>
</html>
<?php
//ob_end_flush();
?>
