<?php 
	include_once 'config.php';
	

if(!isset($_COOKIE['admin'])){
	if(isset($_POST['submit'])){
		$userName = trim($_POST['username']);
		$password = trim($_POST['password']);
		if(!empty($userName) && !empty($password) && $userName == $admin && $password == $adminPass){
			setcookie('admin', time() + (60*60*24)); // 24 hours
			$home_url = '//' . $_SERVER['HTTP_HOST'];
			header('Location: ' . $home_url + $LK_file_name + '.php');
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Личный кабинет || Plomin.club</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/lk.css">
	<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>



<?php
	if(empty($_COOKIE['admin'])){
?>
<body class="form_lk-body">
	<main class="form_lk-main">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-lk">
			<div class="form_lk-block"><span class="form_lk-label fa fa-user"><i class=""></i></span><input type="text" class="form_lk-login" name="username" placeholder="логин"></div>
			<div class="form_lk-block"><span class="form_lk-label fa fa-lock"><i class=""></i></span><input type="password" class="form_lk-pass" name="password" placeholder="*******"></div>
			<div class="form_lk-block"><input type="submit" class="form_lk-btn" name="submit" value="login" /></div>
		</form>
	</main>
</body>
<?php 
	}else{
		
		try{
			
			if(isset($_POST['upd_save'])){	
				
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql_upd = "UPDATE `posters`
							SET `posterLink` = :posterLink,
								`posterMsg` = :posterMsg,
								`fileUpload` = :fileUpload,
								`posterTitle` = :posterTitle,
								`posterDate` = :posterDate,
								`posterTime` = :posterTime
							WHERE `id` = :edit_id
						";
				$stmt_upd = $connection->prepare($sql_upd);
				$stmt_upd->bindValue(":posterLink", $_POST['upd_link']);
				$stmt_upd->bindValue(":posterMsg", $_POST['upd_msg']);
				$stmt_upd->bindValue(":fileUpload", 'img/uploads/posters/'.$_POST['upd_img']);
				$stmt_upd->bindValue(":posterTitle", $_POST['upd_title']);
				$stmt_upd->bindValue(":posterDate", $_POST['upd_date']);
				$stmt_upd->bindValue(":posterTime", $_POST['upd_time']);
				$stmt_upd->bindValue(":edit_id", $_GET['edit_id']);
				$count = $stmt_upd->execute();
				
				
			}else if(isset($_POST['delete_yes'])){
					$sql_del = $connection->exec("DELETE FROM posters WHERE id = ".$_GET['del_id']); //удаляем строку из таблицы
					
			}else{
				
				$sql = 'SELECT * FROM posters';

				$stmt = $connection->query($sql);
			}
				
		}catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}
		//$connection = null;
		
?>	
<body>
	<header></header>

	<main id="lkTabs">	

		<aside class="lk_nav-aside">
			<nav class="lk-nav" id="lkNav">
				<ul class="lk_nav-list">
					<li class="lk_nav-item">
						<a href="#" class="lk_nav-link">Афиша</a>
					</li>
					<li class="lk_nav-item">
						<a href="#" class="lk_nav-link">Фото / Видео</a>
					</li>
					<li class="lk_nav-item">
						<a href="#" class="lk_nav-link">link</a>
					</li>
					<li class="lk_nav-item">
						<a href="#" class="lk_nav-link">link</a>
					</li>
				</ul>
			</nav>
		</aside>
		<div class="main-container">
			<h3 class="lk-title">Личный кабинет <span>Plomin.club</span></h3>
			<div class="main_tabs-container" id="mainTabsContainer">
				<div class="main_tabs-content">
					<div class="main_tabs-notification normal">Добавить новое событие</div>
					<h4 class="main_tabs-title">Афиша</h4>
					<div class="main_tabs-widget clearfix widget-poster">
						<div class="widget-block file_upload">
							<button type="button" class="file_upload-btn widget_poster-btn">Выбрать</button>
							<div class="file_upload-info">Файл не выбран</div>
							<input type="file" name="fileUpload" class="file_upload-input widget_poster-input" />
						</div>
						<div class="widget-block poster-title">
							<input type="text" name="posterTitle" class="poster_title-input widget_poster-input" placeholder="Тема события" />
						</div>
						<div class="widget-block poster-date">
							<input type="text" name="posterDate" class="poster_date-input widget_poster-input" placeholder="2017-10-28" />
						</div>
						<div class="widget-block poster-time">
							<input type="text" name="posterTime" class="poster_time-input widget_poster-input" placeholder="20:00" />
						</div>
						<div class="widget-block poster-msg">
							<textarea name="posterMsg" class="poster_msg-input" placeholder="Описание"></textarea>
						</div>
						<div class="widget-block poster-link">
							<input type="text" name="posterLink" class="poster_link-input widget_poster-input" placeholder="Ссылка на ФБ" />
						</div>
						<div class="widget-block publish">
							<button id="publishPosterBtn" class="publish-btn widget_submit-btn">Опубликовать</button>
						</div>
						<div class="widget_poster-result"></div>
						<?php
							if(isset($_GET['edit_id'])){
								$edit = $connection->query("SELECT * FROM posters WHERE id = ".$_GET['edit_id']); 
								echo "<table class='widget_poster-all widget_poster-edit' id='widgetPosterEdit' border='1'><form action='' method='POST'>";
								echo "<tr class='table_tr-titles'><td>ID</td><td>Изображение</td><td>Тема</td><td>Дата</td><td>Время</td><td>Описание</td><td>Ссылка на Fb</td><td></td></tr>";
								
								while($row_edit = $edit->fetch()){
									$file = substr($row_edit['fileUpload'], 20);
									echo "<td class='id'>".$row_edit['id']."</td>";
									echo "<td class='image'><input type='text' name='upd_img' value='".$file."'></input></td>";
									echo "<td class='posterTitle'><input type='text' name='upd_title' value='".$row_edit['posterTitle']."'></input></td>";
									echo "<td class='posterDate'><input type='text' name='upd_date' value='".$row_edit['posterDate']."'></input></td>";
									echo "<td class='posterTime'><input type='text' name='upd_time' value='".$row_edit['posterTime']."'></input></td>";
									echo "<td class='posterMsg'><textarea name='upd_msg'>".$row_edit['posterMsg']."</textarea></td>";
									echo "<td class='posterLink'><input type='text' name='upd_link' value='".$row_edit['posterLink']."'></td>";
									echo "<td class='posterSave'><input type='submit' name='upd_save' id='allPostersDelete' value='Сохранить' data-id='".$row_edit['id']."' /><a href='/lk'>Назад</a></td>";
								}
								echo "</form></table>";
								
							}else{
								if(isset($_GET['del_id'])){
									echo "
										<div class='popUp-delete'>
											<h3>Вы уверены?</h3>
											<form action='' method='POST'>
												<input type='submit' name='delete_yes' value='Да' />
												<input type='submit' name='delete_no' value='Нет' />
											</form>
										</div>
									";
								}
								
							?>
								<table class="widget_poster-all" id="allPosters" border="1">
									<tr class="table_tr-titles">
										<td>ID</td>
										<td>Изображение</td>
										<td>Тема</td>
										<td>Дата</td>
										<td>Время</td>
										<td>Описание</td>
										<td>Ссылка на Fb</td>
										<td></td>
									</tr>
							<?php
								while ($row = $stmt->fetch()){
									$posterId = $row['id'];
									echo "<tr>";
									echo "<td class='id'>".$posterId."</td>";
									echo "<td class='image'><img src='".$row['fileUpload']."' alt='' /></td>";
									echo "<td class='posterTitle'>".$row['posterTitle']."</td>";
									echo "<td class='posterDate'>".DateTime::createFromFormat('Y-m-d', $row['posterDate'])->format('d.m')."</td>";
									echo "<td class='posterTime'>".$row['posterTime']."</td>";
									echo "<td class='posterMsg'>".$row['posterMsg']."</td>";
									echo "<td class='posterLink'>".$row['posterLink']."</td>";
									echo "<td class='posterDelete'><a href='?del_id=".$posterId."' id='allPostersDelete'>Удалить</a><a href='?edit_id=".$posterId."' id='allPostersEdit'>Редактировать</a></td>";
									echo "</tr>";
								}
							?>
								</table>
							<?php
							}
							?>
					</div>
				</div>
				<div class="main_tabs-content clearfix">
					<div class="main_tabs-notification normal">Добавить новые фото / видео</div>
					<h4 class="main_tabs-title">Галерея</h4>
					<div class="main_tabs-widget widget-gallery">
						<div class="widget-block video">
							<input type="text" name="videoInput" class="videoLink video-input" placeholder="Адрес видеофайла" id="videoUpload" />
						</div>
						<div class="widget-block publish">
							<button id="videoAdd" class="publish-btn widget_submit-btn">Добавить</button>
						</div>
						<div class="widget-block dropbox-wrap" id="dropbox">
							<div class="dropbox_msg-wrap">
								<span class="message">Перетащите сюда картинку для загрузки</span>
							</div>
							
						</div>
						<div class="widget_gallery-result"></div>
					</div>
					<div class="widget_gallery-preview" id="galleryPreview">
						
					</div>
					2
				</div>
				<div class="main_tabs-content">
					3
				</div>
				<div class="main_tabs-content">
					4
				</div>
			</div>
		</div>	



	</main>









<?php		
	} 
?>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!--<script src="//code.jquery.com/jquery-1.2.4.min.js"></script>-->
<!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->
<!--<script src="js/jquery-ui.min.js"></script>-->
<script src="js/jquery.mask.min.js"></script>
<!--<script src="js/jquery.filedrop.min.js"></script>-->
<script src="js/lk-main.js"></script>
</body>
</html>