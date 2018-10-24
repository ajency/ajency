// set automatically a width to slider bullets

if ( undefined !== window.jQuery ) {
	jQuery(window).resize(function() {
		var n = jQuery(".fullwidthbanner-container .tp-bullets.simplebullets.navbar .bullet").length;

		var width = jQuery(".rev_slider").width();
			if (width < 1023) {
				jQuery(".fullwidthbanner-container .tp-bullets.simplebullets.navbar .bullet").css("width", (width)/n);
			}
			else if ((width > 1023) && (width < 1280)) {
				jQuery(".fullwidthbanner-container .tp-bullets.simplebullets.navbar .bullet").css("width", 940/n);
			}
			
			else {
				jQuery(".fullwidthbanner-container .tp-bullets.simplebullets.navbar .bullet").css("width", 1120/n);
				jQuery(".fullwidthbanner-container .simplebullets").css("margin-left" , -560);
			}
	});
}