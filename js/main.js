'use strict';






$(function($){
	$(function(){
		
		
		var nav = $('#headerNav');
		var openNav = $('#openNav');
		var loc = window.location.href;
		//console.log(loc);
		
		function currentLink(e){
			let link = nav.find('a');
			link.each(function(){
				let linkCurrent = this.href;
				//console.log(linkCurrent);
				//console.log(result);
				if(loc == linkCurrent)
					$(this).addClass('active');
			
			});
				
			
			/*if(link.attr('href') == '//plomin.club/index.php') {               // если НЕ равно null
				link.addClass('active');    // добавляем класс
			}*/
			/*nav.find('a').on('load', function(){
				let link = this;
				
			});*/
		}
		currentLink();
		
		openNav.on('click', function(e){
			e.preventDefault();
			$(this).toggleClass('active')
			nav.toggleClass('visible');
			$('body').toggleClass('hidden');
		});

		$('.header-slider').slick({
			dots: true,
			arrows: false,
			//autoplay: true,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			lazyLoad: 'ondemand',
			autoplaySpeed: 30000,
		});

		$('#eventsSlider').slick({
			dots: true,
			arrows: false,
			//autoplay: true,
			infinite: true,
			variableWidth: true,
			//slidesToShow: 3,
			slidesToScroll: 1,
			lazyLoad: 'ondemand',
			//autoplaySpeed: 30000,
			responsive: [
				{
					breakpoint: 1920,
					settings: {
						slidesToShow: 3, /// 3
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
					}
				},
			],
			dotsClass: 'events-dots slick-dots',
		});

		 $("#mainGalleryTabs").tabs({
			active: 1,
		 });

		//$('.main_images-img').Lazy();
		
		$('.main_gallery-video').slick({
			dots: false,
			arrows: true,
			autoplay: false,
			infinite: true,
			centerMode: true,
			slidesToScroll: 1,
			//useTransform: true,
			variableWidth: true,
			lazyLoad: 'ondemand',
			responsive: [
				{
					breakpoint: 1920,
					settings: {
						slidesToShow: 1, /// 3
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
					}
				},
			],
			prevArrow: '<button type="button" class="main_gallery-arrow main_gallery-prev"></button>',
			nextArrow: '<button type="button" class="main_gallery-arrow main_gallery-next"></button>',
		});
		
		
		function mainPhotoGallery(e){
			var container = $('#mainImagesGallery');
			var containerBlur = $('.main_images-gallery.blur');
			var content = $('.main_images-content');
			var contentActive = $('.main_images-content.active');
			var fullSizeLink = $('.main_images-expand');
			var closeBtn = $('.main_images-close');
			var photoGalleryImg = container.find('img');
			
			$.fn.imagesLoaded = function(callback){
			  var elems = this.filter('img'),
				  len   = elems.length;

			  elems.bind('load',function(){
				  if (--len <= 0){ callback.call(elems,this); }
			  }).each(function(){
				 // cached images don't fire load sometimes, so we reset src.
				 if (this.complete || this.complete === undefined){
					var src = this.src;
					// webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
					// data uri bypasses webkit log warning (thx doug jones)
					this.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
					this.src = src;
				 }  
			  }); 

			  return this;
			};

			photoGalleryImg.hide();
			$('#loader').show();
			photoGalleryImg.imagesLoaded(function(){
				$(this).show();
				$('#loader').hide();
			});
			
			
			container.find('a').on('click', function(e){
				e.preventDefault();
			});
			
			container.find(content).each(function(i){
				$(this).attr('id', 'image-' + ++i);
			});
			
			
			/*container.find('img').each(function(i){
				$(this).attr({
					'width': '250px',
					'height': '166px'
				});
			});*/
			
			container.find(fullSizeLink).on('click', function(e){
				content.removeClass('active');
				$(this).parent(content).addClass('active');
				container.addClass('blur');
			});

			closeBtn.on('click', function(e){
				$(this).parent(content).removeClass('active');
				container.removeClass('blur');
			});
			
			$(document).mouseup(function (e){ // событие клика по веб-документу
				if (!content.is(e.target) // если клик был не по нашему блоку
					&& content.has(e.target).length === 0) { // и не по его дочерним элементам
					content.removeClass('active');
					container.removeClass('blur');
				}
			});
			
			// вызов функции при ресайзе окна
			$(window).on('resize load', function() {
				// функция центрирования элемента
				function alignCenter() {
					contentActive.css({
						// вычисление координат left и top
						left: ($(window).width() - contentActive.width()) / 2 + 'px',
						top: ($(window).height() - contentActive.height()) / 2 + 'px'
					});
				}
				
				alignCenter(contentActive);	
			});	
			
		}
		mainPhotoGallery();
		
		function photoGallery(){
			let photoGallery = $('#photoGallery');
			let photoGalleryList = photoGallery.find('#photoGalleryList');
			let photoGalleryLink = photoGallery.find('.photo_gallery-link');
			let photoGalleryImg = photoGallery.find('.photo_gallery-img');
			let fullPreview = photoGallery.find('#fullPreview');
			let fullPreviewImg = photoGallery.find('.fullPreview-img');
			let fullPreviewTxt = photoGallery.find('.fullPreview-text');
			let close = photoGallery.find('.fullPreview-close');
			let flag = false;
			
			function animate(flag){
				
			}
			
			if( $(window).width() >= '500'){
				photoGalleryList.slick({
					arrows: true,
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 3,
					prevArrow: '<button type="button" class="photo_gallery-arrow photo_gallery-prev"></button>',
					nextArrow: '<button type="button" class="photo_gallery-arrow photo_gallery-next"></button>',
				});
			}
				
			
			
			photoGalleryLink.on('click', function(e){
				
				e.preventDefault();
				
				//console.log($(this).attr('data-largesrc'));
				//var newImg = document.createElement('img')[0];
				//fullPreview.css({'display': 'block'});
				flag = true;
				fullPreview.fadeIn(500);
				fullPreviewImg.attr({'src': $(this).attr('data-largesrc')});
				fullPreviewTxt.text($(this).attr('data-description'));
				//newImg.attr('src', '0');
				//fullPreview.append(newImg);
			});
			
			close.on('click', function(){
				//fullPreview.css({'display': 'none'});	
				//fullPreview.hide(300);
				//flag = false;
			});
			
			$(document).click(function(e){
				if(e.target != photoGalleryLink && e.target != fullPreview[0] && !fullPreview.has(e.target).lenght ){
					//fullPreview.hide(300);
				}
					//
			});
			
		}
		photoGallery();
		
		var videoGalleryList = $('#videoGalleryList');
		if( $(window).width() >= '500'){
			videoGalleryList.slick({
				arrows: true,
				infinite: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				prevArrow: '<button type="button" class="photo_gallery-arrow photo_gallery-prev"></button>',
				nextArrow: '<button type="button" class="photo_gallery-arrow photo_gallery-next"></button>',
			});
		}
		
		function imgMore(){
			
			var mainImagesMore = $('#mainImagesMore');
			var imagesCount = 0;
			
			mainImagesMore.on('click', function(e){
				e.preventDefault();
				let container = $('#mainImagesGallery');
				
				$.ajax({
					url: 'gallery.php',
					type: 'POST',
					data: {'imagesCount': imagesCount},
					cache: false,
					success: function(data){
						if (!data == 0){
							container.append(data);
							imagesCount += 9;
							//console.log(imagesCount);
							mainPhotoGallery();
						}else{
							console.log('Больше нет записей');
							mainImagesMore.css('visibility', 'hidden');
							setInterval(function() {
						    	mainImagesMore.css('visibility', 'visible');
							}, 2000);
						}
					}
				});
			});	
				
		}
		imgMore();					  
		
	});

}(jQuery));