function scaleVideoContainer() {

		var height = $(window).height() - $('#wpadminbar').height();
		var unitHeight = parseInt(height) + 'px';
		$('#front-page-1').css('height',unitHeight);

	}

	function initBannerVideoSize(element){

		$(element).each(function(){
			$(this).data('height', $(this).height());
			$(this).data('width', $(this).width());
		});

		scaleBannerVideoSize(element);

	}

	function scaleBannerVideoSize(element){

		var windowWidth = $(window).width(),
		windowHeight = $(window).height() - $('#wpadminbar').height(),
		videoWidth,
		videoHeight;

		$(element).each(function(){
			var videoAspectRatio = $(this).data('height')/$(this).data('width');

			$(this).width(windowWidth);

			if(windowWidth < 1000){
				videoHeight = windowHeight;
				videoWidth = videoHeight / videoAspectRatio;
				$(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

				$(this).width(videoWidth).height(videoHeight);
			}

			$('#front-page-1 .video-container video').addClass('fadeIn animated');

		});
	}

	scaleVideoContainer();

	initBannerVideoSize('.video-container .poster img');
	initBannerVideoSize('.video-container .filter');
	initBannerVideoSize('.video-container video');

	$(window).on('resize', function() {
		scaleVideoContainer();
		scaleBannerVideoSize('.video-container .poster img');
		scaleBannerVideoSize('.video-container .filter');
		scaleBannerVideoSize('.video-container video');
	});

	$('a[href^="#"]').on('click',function (e) {
		e.preventDefault();

		var target = this.hash;
		var $target = $(target);

		$('html, body').stop().animate({
			'scrollTop': $target.offset().top
		}, 900, 'swing');
	});

/* Original code
jQuery(function( $ ){

	if (document.location.hash) {
			window.setTimeout(function () {
				document.location.href += '';
			}, 10);
	}

	// Local Scroll Speed - TURNED OFF BECAUSE I am trying other options.
	$.localScroll({
		duration: 750
	}); 

	// Image Section Height
	var windowHeight = $( window ).height();

	$( '.image-section' ) .css({'height': windowHeight +'px'});
		
	$( window ).resize(function(){
	
		var windowHeight = $( window ).height();
	
		$( '.image-section' ) .css({'height': windowHeight +'px'});
	
	});

}); */