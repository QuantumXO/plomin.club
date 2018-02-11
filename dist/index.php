<!DOCTYPE html>
<?php
	include_once 'config.php';
	try{
		
		$sql = 'SELECT * FROM posters ORDER BY id DESC LIMIT 5';

		$stmt = $connection->query($sql);
		
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
	<title>Plomin.club</title>
	<meta name="description" content="Літературний клуб 'Пломінь': лекторій, бібліотека, кав'ярня у центрі Києва." /> 
	<meta name="keywords" content="бібліотека, лекція, лекторій, безкоштовні лекції, лекції в Києві, кав'ярня в центрі, лекції про філософію, смачна кава, цікаві книги, безкоштовний київ, філософія в Україні." />
</head>
<body>
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
	<div class="header_slider-wrap">
	<div class="row">
		<div class="header-slider">
			<div class="header_slider-item clearfix">
				<div class="header_slider-content">
					<p class="header_slider-text">
					<span class="arrows">«</span>
						Знаю, хто я: я палаю<br>
						Невтоленний, сам згораю.<br>
						У вогні своїх бажань.<br>
						Що схоплю - вогнем засяє<br>
						Кину — в попіл, і зникає<br>
						Пломінь я — нема вагань<br>
					<span class="arrows">«</span>
					</p>
				</div><!-- //.header_slider-content -->
				<img src="img/shevchenko.png" class="header_slider-img" width="350" height="320" alt="Шевченко">
			</div><!-- //.header_slider-item -->
			<div class="header_slider-item clearfix">
				<div class="header_slider-content">
					<p class="header_slider-text">
					<span class="arrows">«</span>
						Той, хто здатен піти на Смерть,<br>ніколи не стане рабом
					<span class="arrows">«</span>
					</p>
				</div><!-- //.header_slider-content -->
				<img src="img/eliade.png" class="header_slider-img" width="351" height="307" alt="Элиаде">
			</div><!-- //.header_slider-item -->
			<div class="header_slider-item clearfix">
				<div class="header_slider-content">
					<p class="header_slider-text">
					<span class="arrows">«</span>
						Ймовірно, у кінці століття будуть<br>різнитися два класи, один із яких<br>сформується телебаченням,<br>
						інший — читанням
					<span class="arrows">«</span>
					</p>
				</div><!-- //.header_slider-content -->
				<img src="img/junger.png" class="header_slider-img" width="351" height="314" alt="Юнгер">
			</div><!-- //.header_slider-item -->
			<div class="header_slider-item clearfix">
				<div class="header_slider-content">
					<p class="header_slider-text">
					<span class="arrows">«</span>
						Книги просто ніщо,<br>
						якщо вони не живі та не дієві в людях,<br>
						що доросли до їх розуміння<br>
					<span class="arrows">«</span>
					</p>
				</div><!-- //.header_slider-content -->
				<img src="img/spengler.png" class="header_slider-img" width="351" height="314" alt="Шпенглер">
			</div><!-- //.header_slider-item -->
			<div class="header_slider-item clearfix">
				<div class="header_slider-content">
					<p class="header_slider-text">
					<span class="arrows">«</span>
						Людина повинна вигадати нові ілюзії<br>
						реальності, придумати нові слова,<br>
						бо ті, що є — знекровлені, на тій стадії агонії,<br>
						де не врятує і переливання крові<br>
					<span class="arrows">«</span>
					</p>
				</div><!-- //.header_slider-content -->
				<img src="img/cioran.png" class="header_slider-img" width="351" height="313" alt="Чоран">
			</div><!-- //.header_slider-item -->
		</div><!-- //.header_slider -->
	</div><!-- //.row -->
</div>

</header>

<main>
	<article class="main-whowe" id="mainWhoWe">
	<div class="row clearfix">
		<h3 class="main_whowe-title main-title">хто <span>ми</span>?</h3>
		<ul class="main_whowe-list">
			<li class="main_whowe-item">
				<div class="main_whowe-label">
					<img src="img/lecturer.png" class="main_whowe-ico" width="67" height="60" alt="icon">
					<span class="main_whowe-topic">Лекторій</span>
				</div>
				<p class="main_whowe-content">В лекторії нашого літературного клубу регулярно проходять безкоштовні освітні<br>та культурні заходи від провідних українських та європейських інтелектуалів.</p>
				<p class="main_whowe-slogan">Розвиватися — легко!</p>
			</li>
			<li class="main_whowe-item">
				<div class="main_whowe-label">
					<img src="img/library.png" class="main_whowe-ico" width="42" height="65" alt="icon">
					<span class="main_whowe-topic">Бібліотека</span>
				</div>
				<p class="main_whowe-content">В нашій бібліотеці понад 1500 книг. Це рідкісні видання блискучих мислителів Європи минулого та сьогодення, а також безсмертна класика світової літератури.</p>
				<p class="main_whowe-slogan">Розширюйте свій кругозір із «Пломенем»!</p>
			</li>
			<li class="main_whowe-item">
				<div class="main_whowe-label">
					<img src="img/coffee.png" class="main_whowe-ico" width="40" height="59" alt="icon">
					<span class="main_whowe-topic">Кав’ярня</span>
				</div>
				<p class="main_whowe-content">Шукаєте затишне місце в серці Києва, щоб попрацювати?<br>В нашому літературному клубі на Вас чекає тиша, вільний Wi-Fi, свіжозварені кава, чай і печиво.</p>
				<p class="main_whowe-slogan">В наших стінах народжуються найкращі ідеї!</p>
			</li>
			<li class="main_whowe-item">
				<div class="main_whowe-label">
					<img src="img/publishing-office.png" class="main_whowe-ico" width="40" height="55" alt="icon">
					<span class="main_whowe-topic">Видавнича<br>ініціатива</span>
				</div>
				<p class="main_whowe-content">Спільно з талановитими перекладачами ми розпочали переклад українською важливих літературних шедеврів спадщини європейської думки.</p>
				<p class="main_whowe-slogan">Доторкнутися<br>до вічного — в «Пломені»!</p>
			</li>
		</ul>
	</div><!-- //.row -->
</article>
	<article class="main-events" id="mainEvents">
	<div class="row clearfix">
		<h3 class="main_events-title main-title"><span>заходи</span></h3>
	</div>
	<div class="main_events-slider" id="eventsSlider">
		<?php 
			while ($row = $stmt->fetch()){
				echo '<div class="main_events-item">';
				echo '<div class="row">';
				echo "<img src=".$row['fileUpload']." class='main_events-img' width='571' height='299' alt=''>";
				echo "<p class='main_events-topic'>".$row['posterTitle']."</p>";
				echo "<div class='main_events-counter'><span class='main_events-date'>".$row['posterDate']."</span><span class='main_events-time'>".$row['posterTime']."</span></div>";
				echo "<p class='main_events-content'>".$row['posterMsg']."</p>";
				echo '</div><!-- //.row -->';
				echo '</div><!-- //.main_events-item -->'; 
			}
		?>
	</div><!-- //.main_events-slider -->
</article>
	<article class="main-gallery" id="mainGallery">
		<div class="row clearfix">
			<div class="main_gallery-tabs" id="mainGalleryTabs">
				<ul class="main_gallery-list">
					<li class="main_gallery-tab"><a href="#mainGalleryTab-1" class="main_gallery-link">фото</a></li>
					<li class="main_gallery-tab"><a href="#mainGalleryTab-2" class="main_gallery-link">відео</a></li>
				</ul>
				<div id="mainGalleryTab-1" class="main_gallery-photo main_gallery-slider">
					<div class="main_images-gallery" id="mainImagesGallery">
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-1.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>	
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-2.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-4.jpg" class="main_images-img" width="1280" height="1920" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-5.jpg" class="main_images-img" width="1280" height="1920" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-6.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-7.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-8.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-9.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-10.jpg" class="main_images-img" width="1280" height="721" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-11.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-12.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
	<div class="main_images-item">
		<div class="main_images-content">
			<a href="#" class="main_images-close">X</a>
			<img src="img/photo-13.jpg" class="main_images-img" width="1280" height="853" alt="">
			<a class="main_images-expand"></a>
		</div>
	</div>
</div>
				</div>
				<div id="mainGalleryTab-2" class="main_gallery-video main_gallery-slider">
					<div class="main_gallery-item">
	<!--<img src="img/gallery-item.jpg" class="main_gallery-img" width="500" height="300" alt="">-->
	<iframe width='1278' height='851' src='//youtube.com/embed/YehACm6oTis' class='main_images-img' frameborder='0' allowfullscreen></iframe>
</div>
<!--<div class="main_gallery-item">
	<img src="img/gallery-item.jpg" class="main_gallery-img" width="500" height="300" alt="">
</div>
<div class="main_gallery-item">
	<img src="img/gallery-item.jpg" class="main_gallery-img" width="500" height="300" alt="">
</div>
<div class="main_gallery-item">
	<img src="img/gallery-item.jpg" class="main_gallery-img" width="500" height="300" alt="">
</div>-->



				</div>
			</div>
			<iframe class="google-map"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1068.1368280113654!2d30.520339280881686!3d50.450937910860105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce50853c3c51%3A0x6703d85b0d10b524!2z0L_RgNC-0LLRg9C70L7QuiDQotCw0YDQsNGB0LAg0KjQtdCy0YfQtdC90LrQsCwgNSwg0JrQuNGX0LI!5e0!3m2!1sru!2sua!4v1507665260231" width="600" height="450" frameborder="0" allowfullscreen></iframe>
			<img src="img/map.png" class="footer-map" width="328" height="307" alt="Map">
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
