jQuery(function($) {
  "use strict";
// hide #back-top first
$("#back-top").hide();

// scroll body to 0px on click
$('#back-top a').on("click", function(){
	$('body,html').animate({
		scrollTop: 0
	}, 800);
	return false;
});

// fade in #back-top
$(window).scroll(function () {
	if ($(this).scrollTop() > 100) {
		$('#back-top').fadeIn();
	} else {
		$('#back-top').fadeOut();
	}
});

// initialize slick slider
$('.mz-slider').slick({
	infinite: true,
	autoplay: true,
	autoplaySpeed: 5000,
	speed: 500,
	fade: true,
	cssEase: 'linear'
});

});