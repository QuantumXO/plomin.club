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
	<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/styles.min.css">
	<title>Афіша || Plomin.club</title>
	<meta name="description" content="" /> 
	<meta name="keywords" content="" />
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
	<article class="main-poster" id="mainPoster">
	<div class="row clearfix">
		<div class="main_poster-container">
			<h3 class="main_poster-title main-title"><span>афіша</span></h3>
			<div class="widget-poster">
				<div class="widget_poster-img"><img src="<?php echo $fileUpload_nearest ?>" width="571" height="299" alt="poster image"></div>
				<div class="widget_poster-inner">
					<p class="widget_poster-topic"><?php echo $posterTitle_nearest ?></p>
					<div class="widget_poster-numbers">
						<span class="widget_poster-date"><?php echo $posterDate_nearest_replace ?></span>
						<span class="widget_poster-time"><?php echo $posterTime_nearest ?></span>
					</div>
					<p class="widget_poster-text"><?php echo $posterMsg_nearest ?></p>
					<a href="<?php echo '//'.$posterLink_nearest ?>" class="widget_poster-btn" rel="nofollow" target="_blank"><span>долучитися</span><img src="img/fb-btn.png" width="24" height="45" alt="FB" class="icon"></a>
				</div>
			</div>
		</div>
		<aside class="main_poster-aside left">
			<h4 class="poster_aside-title">раніше</h4>
			<ul class="poster_aside-list">
			<?php
				while ($row_before = $stmt_before->fetch()){
					echo '<li class="poster_aside-item"><label class="poster_aside-date">'.DateTime::createFromFormat('Y-m-d', $row_before['posterDate'])->format('d.m').'</label><br>';
					echo '<div class="poster_aside-topic">'.$row_before['posterTitle'].'</div></li>';
				}
			?>	
			</ul>
		</aside>
		<aside class="main_poster-aside right">
			<h4 class="poster_aside-title">незабаром</h4>
			<ul class="poster_aside-list">
			<?php
				while ($row_next = $stmt_next->fetch()){
					echo '<li class="poster_aside-item"><label class="poster_aside-date">'.DateTime::createFromFormat('Y-m-d', $row_next['posterDate'])->format('d.m').'</label><br>';
					echo '<div class="poster_aside-topic">'.$row_next['posterTitle'].'</div></li>';
				}
			?>	
			</ul>
		</aside>
	</div>
</article>
</main>
<footer>
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