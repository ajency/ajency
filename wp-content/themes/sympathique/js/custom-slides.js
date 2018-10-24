jQuery(window).load(function() {
	var templateDir = "<?php bloginfo('template_directory') ?>";
	// PORTFOLIO SLIDES //
	jQuery('#slides').slides({
		preload: true,
		preloadImage: templateDir + 'images/nivo-preloader.gif',
		play: 0,
		pause: 0,
		effect: 'fade',
		autoHeight: true,
		effects: {
		 navigation: 'fade',  // [String] Can be either "slide" or "fade"
		 pagination: 'fade' // [String] Can be either "slide" or "fade"
		},
		hoverPause: true
	});
	
	// FADING EFFECTS FOR SLIDESJS //
	jQuery("#slides .next").hide();
	jQuery("#slides .prev").hide();
	
	jQuery("#slides").hover(function() {
			jQuery(".next").stop(true, true).fadeIn();
			jQuery(".prev").stop(true, true).fadeIn();
			}, function() {
			jQuery(".next").fadeOut();
			jQuery(".prev").fadeOut();
	});	
});