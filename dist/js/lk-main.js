'use strict';

(function(){
	
	var lkTabsLink = document.querySelectorAll('.lk_nav-link');
	
	for(let i=0; i<lkTabsLink.length; i++){
		let link = lkTabsLink[i]
		link.addEventListener('click', function(e){
			e.preventDefault();
		}, false);
	}
	
}());




$(function($){
	$(function(){


		function tabs(e){
			
			let mainTabsContent = $('#mainTabsContainer').find('.main_tabs-content');
			let lkTabsLi = $('#lkNav').find('.lk_nav-item');
			let lkTabsLink = $('#lkNav').find('.lk_nav-link');

			lkTabsLi.eq(1).addClass('active');
			mainTabsContent.eq(0).addClass('active');

			lkTabsLi.on('click', function() {
				lkTabsLi.removeClass('active');
				$(this).addClass('active');
				let i = $(this).index();
				$('#mainTabsContainer').find('.main_tabs-content').removeClass('active').eq(i).addClass('active');
			});

			lkTabsLink.on('click', function(e){
				e.preventDefault();
			});

			mainTabsContent.each(function(i){
				this.setAttribute('id', 'tabs-' + i);
			});
			
		}
		tabs();
		
		function widgetFileUpload(e){
			
			let wrapper = $('.file_upload');
			let btn = wrapper.find('.file_upload-btn');
			let lbl = wrapper.find('.file_upload-info');
			let inp = wrapper.find('.file_upload-input');
			
			btn.focus(function(){
				inp.focus()
			});
			// Crutches for the :focus style:
			inp.focus(function(){
				wrapper.addClass( "focus" );
			}).blur(function(){
				wrapper.removeClass( "focus" );
			});

			var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

			inp.change(function(){
				var file_name;
				if( file_api && inp[ 0 ].files[ 0 ] ) 
					file_name = inp[ 0 ].files[ 0 ].name;
				else
					file_name = inp.val().replace( "C:\\fakepath\\", '' );

				if( ! file_name.length )
					return;

				if( lbl.is( ":visible" ) ){
					lbl.text( file_name );
					btn.text( "Выбрать" );
				}else
					btn.text( file_name );
			}).change();
			
		}
		widgetFileUpload();
		
		function publishPoster(){
			
			let publishBtn = $('#publishPosterBtn');
			let publishFiles;
			let posterDate = $('.poster_date-input');
			let posterTime = $('.poster_time-input');
			
			posterDate.mask('9999-99-99');
			posterTime.mask('99:99');

			publishBtn.on('click', function(){
				
				let fileUpload = $('.file_upload-input').prop('files')[0];
				let posterTitle = $('.poster_title-input').val();
				let posterDate = $('.poster_date-input').val();
				let posterTime = $('.poster_time-input').val();
				let posterMsg = $('.poster_msg-input').val();
				let posterLink = $('.poster_link-input').val();
				let notification = $('.main_tabs-notification');
				notification
					.removeClass('error success')
					.addClass('normal')
					.text('Добавить новое событие');
				if(fileUpload == undefined){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Выберите файл');
				}else if(posterTitle == ''){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Введите тему события');
				}else if(posterDate == ''){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Введите дату события');
				}else if(posterTime == ''){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Введите время события');
				}else if(posterMsg == ''){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Введите описание');
				}else if(posterLink == ''){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Введите ссылку на facebook');
				}else{
					let formData = new FormData();
					formData.append('fileUpload', fileUpload);
					formData.append('posterTitle', posterTitle);
					formData.append('posterDate', posterDate);
					formData.append('posterTime', posterTime);
					formData.append('posterMsg', posterMsg);
					formData.append('posterLink', posterLink);
					
					function funcBefore(){
						$('.widget_poster-result').text('Ожидание...');
					}
					function funcSucces(data){
						$('.widget_poster-result').text(data);
						//let publishContent = $('.main_tabs-content.active');
						//publishContent.hide(1000);
						//setTimeout(function(){
						//	publishContent.show(1000);
						//}, 3000);
						//notification
						//	.removeClass('error success')
						//	.addClass('normal')
						//	.text('Добавить новое событие');
					}
					/*function funcError(){
						$('.widget_poster-result').text('Ошибка ajax');
					}*/
					$.ajax({
						url: 'ajax.php',
						type: 'POST',
						//url: document.location.href,
						dataType: 'text',
						contentType: false,
						processData: false,
						//data: ({formData, posterLink: posterLink, posterMsg: posterMsg}),
						data: formData,
						beforeSend: funcBefore,
						success: funcSucces,
						//error: funcError
					});
					notification
						.removeClass('normal error')
						.addClass('success')
						.text('Новое событие добавлено');
				}
				
			});
		}
		publishPoster();
		
		function checkURL(videoLink) {
			var regURL = /^(?:(?:https?|ftp|telnet):\/\/(?:[a-z0-9_-]{1,32}(?::[a-z0-9_-]{1,32})?@)?)?(?:(?:[a-z0-9-]{1,128}\.)+(?:com|net|org|mil|edu|arpa|ru|gov|biz|info|aero|inc|name|[a-z]{2})|(?!0)(?:(?!0[^.]|255)[0-9]{1,3}\.){3}(?!0|255)[0-9]{1,3})(?:\/[a-z0-9.,_@%&?+=\~\/-]*)?(?:#[^ \'\"&<>]*)?$/i;
			return regURL.test(videoLink);
		}
		
		function videoUploadFunc(){
			
			var videoUploadBtn = $('#videoAdd');
			let wrap = $('.main_tabs-content.active');
			let notification = wrap.find('.main_tabs-notification');
			
			videoUploadBtn.on('click', function(e){
				
				let videoLink = $('.videoLink').val();
				
				//checkURL(videoLink);
				
				notification
					.removeClass('error success')
					.addClass('normal')
					.text('Добавить новое Видео');
				
				if(videoLink == ''){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Введите адрес видеофайла');
				}else if(!checkURL(videoLink)){
					notification
						.removeClass('normal success')
						.addClass('error')
						.text('Неверный адрес видеофайла');
				}else{

					let formData = new FormData();
					formData.append('videoLink', videoLink);
					
					$.ajax({
						url: '/files.php',
						type: 'POST',
						dataType: 'text',
						contentType: false,
						processData: false,
						data: formData,
						//beforeSend: funcBefore,
						//success: funcSucces,
						//error: funcError
					});
					notification
						.removeClass('normal error')
						.addClass('success')
						.text('Новое видео добавлено');
					
				}
			});
			
		}
		videoUploadFunc();
		
		
		function dropboxFunc(){
			
			var dropZone = $('#dropbox'),
				message = $('.message', dropbox),
				maxFileSize = 10000000; // максимальный размер файла - 10 мб.
			
			if (typeof(window.FileReader) == 'undefined') {
				dropZone.text('Не поддерживается браузером!');
				dropZone.addClass('error');
			}
			
			dropZone[0].ondragover = function() {
				dropZone.addClass('hover');
				return false;
			};
    
			dropZone[0].ondragleave = function() {
				dropZone.removeClass('hover');
				return false;
			};
			
			function getFileExtension(file){
				var allowedExt = ['jpg', 'jpeg', 'png', 'gif']; //форматы для загрузки
				var ext = file.slice((Math.max(0, file.lastIndexOf(".")) || Infinity) + 1).toLowerCase();
				var allowed;
				for(var i=0; i<allowedExt.length; i++){
					if(ext == allowedExt[i]){
						return true;
						break;
					}else{
						return false
					}
				}
			}
			
			dropZone[0].ondrop = function(event) {
				event.preventDefault();
				dropZone.removeClass('hover');
				dropZone.addClass('drop');
				
				var file = event.dataTransfer.files[0];

				if (file.size > maxFileSize) {
					message.html('Файл: ' + '<span class=file-name>' + file.name + '</span>' + ' слишком большой!');
					dropZone.addClass('error');
					return false;
				}
				
				if(getFileExtension(file.name) == false){
					message.html('Файл: ' + '<span class=file-name>' + file.name + '</span>' + ' имеет неверный формат!');
				}else{
					console.log(file);
				
					let fileData = new FormData();
						fileData.append('file', file);
					let	galleryResult = $('.widget_gallery-result');

					function funcBefore(){
						galleryResult.text('Ожидание...');
					}

					function funcSucces(data){

						message.html('Файл: ' + '<span class=file-name>' + file.name + '</span>' + ' добавлен');

						galleryResult.text(data);
					}

					$.ajax({
						url: '/files.php',
						type: 'POST',
						dataType: 'text',
						contentType: false,
						processData: false,
						data: fileData,
						beforeSend: funcBefore,
						success: funcSucces,
					});
					
					//galleryPreview(file);
				}
			};	
		}
		dropboxFunc();
		
		
	});
	
	$( window ).resize(function(){
		$('.file_upload-input').triggerHandler( "change" );
	});
	
}(jQuery));