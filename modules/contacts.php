<!DOCTYPE html>
<?php
	include_once 'config.php';
?>
<html>
<head>
	@@include('blocks/_head.html')
	<title>Plomin.club</title>
	<meta name="description" content="Літературний клуб 'Пломінь': лекторій, бібліотека, кав'ярня у центрі Києва." /> 
	<meta name="keywords" content="бібліотека, лекція, лекторій, безкоштовні лекції, лекції в Києві, кав'ярня в центрі, лекції про філософію, смачна кава, цікаві книги, безкоштовний київ, філософія в Україні." />
</head>
<body class="contacts-body">
<header>
	<?php //include_once('blocks/_header-top.html'); ?>
	@@include('blocks/_header-top.html')
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
	@@include('blocks/_footer.html')
</footer>	
@@include('blocks/_scripts.html')
</body>
</html>
<?php
//ob_end_flush();
?>
