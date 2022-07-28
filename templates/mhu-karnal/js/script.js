(function($) {
	
	"use strict";
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}

	function headerStyle() {
		if($('.main-header').length){
			var mainHeader = $('.main-header').height();
			var windowpos = $(window).scrollTop();
			if (windowpos >= mainHeader) {
				$('.bounce-in-header').addClass('now-visible');
				$('.scroll-to-top').fadeIn(300);
			} else {
				$('.bounce-in-header').removeClass('now-visible');
				$('.scroll-to-top').fadeOut(300);
			}
		}
	}
	headerStyle();

	if($('.main-header li.dropdown ul').length){
		$('.main-header li.dropdown').append('<div class="dropdown-btn"></div>');
		$('.main-header li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
		$('.navigation li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
	}
	if($('.main-slider .tp-banner').length){

		jQuery('.main-slider .tp-banner').show().revolution({
			dottedOverlay:"yes",
			delay:10000,
			startwidth:1920,
			startheight:620,
			hideThumbs:600,
			
			thumbWidth:80,
			thumbHeight:50,
			thumbAmount:5,
			
			navigationType:"bullet",
			navigationArrows:"0",
			navigationStyle:"preview4",
			
			touchenabled:"on",
			onHoverStop:"off",
			
			swipe_velocity: 0.7,
			swipe_min_touches: 1,
			swipe_max_touches: 1,
			drag_block_vertical: false,
			
			parallax:"mouse",
			parallaxBgFreeze:"on",
			parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
			
			keyboardNavigation:"off",
			
			navigationHAlign:"center",
			navigationVAlign:"bottom",
			navigationHOffset:0,
			navigationVOffset:20,
			
			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,
			
			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,
			
			shadow:0,
			fullWidth:"on",
			fullScreen:"off",
			
			spinner:"spinner4",
			
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			
			shuffle:"off",
			
			autoHeight:"off",
			forceFullWidth:"on",
			
			hideThumbsOnMobile:"on",
			hideNavDelayOnMobile:1500,
			hideBulletsOnMobile:"on",
			hideArrowsOnMobile:"on",
			hideThumbsUnderResolution:0,
			
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			startWithSlide:0,
			videoJsPath:"",
			fullScreenOffsetContainer: ""
	  });
		
	}
	if($('.progress-levels .progress-box .bar-fill').length){
		$(".progress-box .bar-fill").each(function() {
			var progressWidth = $(this).attr('data-percent');
			$(this).css('width',progressWidth+'%');
			$(this).parents('.progress-box').children('.percent').html(progressWidth+'%');
		});
	}
	function enableMasonry() {
		if($('.default-masonry').length){
	
			var winDow = $(window);
			// Needed variables
			var $container=$('.default-masonry');
	
			$container.isotope({
				//itemSelector: '.masonry-item',
				 masonry: {
					columnWidth : 1 
				 },
				animationOptions:{
					duration:500,
					easing:'linear'
				}
			});
			
			winDow.bind('resize', function(){

				$container.isotope({ 
					animationOptions: {
						duration: 500,
						easing	: 'linear',
						queue	: false
					}
				});
			});
		}
	}
	
	enableMasonry();
	if ($('.testimonials-carousel').length) {
		$('.testimonials-carousel').owlCarousel({
			loop:true,
			margin:60,
			nav:true,
			autoplayHoverPause:false,
			autoplay: 5000,
			smartSpeed: 700,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				760:{
					items:2
				},
				1024:{
					items:3
				},
				1100:{
					items:3
				}
			}
		});    		
	}
	if ($('.team-carousel').length) {
		$('.team-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 5000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:3
				},
				1024:{
					items:3
				},
				1200:{
					items:4
				}
			}
		});    		
	}
	if ($('.sponsors-slider').length) {
		$('.sponsors-slider').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:2
				},
				800:{
					items:3
				},
				1200:{
					items:4
				}
			}
		});    		
	}
	function factCounter() {
		if($('.fact-counter').length){
			$('.fact-counter .counter-column.animated').each(function() {
		
				var $t = $(this),
					n = $t.find(".count-text").attr("data-stop"),
					r = parseInt($t.find(".count-text").attr("data-speed"), 10);
					
				if (!$t.hasClass("counted")) {
					$t.addClass("counted");
					$({
						countNum: $t.find(".count-text").text()
					}).animate({
						countNum: n
					}, {
						duration: r,
						easing: "linear",
						step: function() {
							$t.find(".count-text").text(Math.floor(this.countNum));
						},
						complete: function() {
							$t.find(".count-text").text(this.countNum);
						}
					});
				}
				
			});
		}
	}
	if($('.accordion-box').length){
		$(".accordion-box .accord-btn").on('click', function() {
			
			var parentBlock = $(this).parents('.accordion');
			
			$(parentBlock).children('.accord-content').slideToggle(300);
			$(parentBlock).toggleClass('active-block');
			$(this).toggleClass('active');
			
		});	
	}
	if($('.tabs-box').length){
		
		//Tabs
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			$('.tabs-box .tab-buttons .tab-btn').removeClass('active-btn');
			$(this).addClass('active-btn');
			$('.tabs-box .tabs-content .tab').hide(0);
			$('.tabs-box .tabs-content .tab').removeClass('active-post');
			$(target).fadeIn(200);
			$(target).addClass('active-post');
			var windowWidth = $(window).width();
			if (windowWidth < 767) {
				$('html, body').animate({
				   scrollTop: $('.tabs-content').offset().top
				 }, 1000);
			}
			
			if ($('.tabs-box .default-masonry').length) {
				enableMasonry();
			}
		});
		
	}
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect  : 'elastic',
			closeEffect : 'elastic',
			helpers : {
				media : {}
			}
		});
	}
	if($('.filter-list').length){
		$('.filter-list').mixItUp({});
	}
	if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				message: {
					required: true
				}
			}
		});
	}
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1000);
	
		});
	}
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',     
			animateClass: 'animated',
			offset:       0,   
			mobile:       true, 
			live:         true 
		  }
		);
		wow.init();
	}
	
	$(window).on('scroll', function() {
		headerStyle();
		factCounter();
	});
	
	$(window).on('load', function() {
		handlePreloader();
		enableMasonry();
	});

})(window.jQuery);