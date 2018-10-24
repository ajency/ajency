jQuery(document).ready(function() {
		
	// BLOG SLIDER //
		
	jQuery('div.del_gallery[id^="slides-"]').each( function() { 	
	
		var $div = jQuery(this);
		var token = $div.data('token');
		var settingObj = window['dt_gallery_' + token];
		
		
		jQuery('#slides-'+settingObj.post_id+'').slides({
			preload: true,
			preloadImage: '',
			play: 7000,
			pause: 2500,
			effect: 'slide',
			autoHeight: false,
			effects: {
			 navigation: 'fade',  // [String] Can be either "slide" or "fade"
			 pagination: 'fade' // [String] Can be either "slide" or "fade"
			},
			hoverPause: true
			
		});
		
	
		// FADING EFFECTS FOR SLIDESJS //
		jQuery("#slides-"+settingObj.post_id+" .next").hide();
		jQuery("#slides-"+settingObj.post_id+" .prev").hide();
		
		jQuery("#slides-"+settingObj.post_id+"").hover(function() {
				jQuery(".next").stop(true, true).fadeIn();
				jQuery(".prev").stop(true, true).fadeIn();
				}, function() {
				jQuery(".next").fadeOut();
				jQuery(".prev").fadeOut();
		});
	});
});