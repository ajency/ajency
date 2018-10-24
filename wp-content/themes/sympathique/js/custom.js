/*
	Scripts for Sympathique - V1.0
*/

/*-----------------------------------------------------------------------------------*/
/*	Social Networks Block
/*-----------------------------------------------------------------------------------*/

	// Twitter
	function twitterSharer(){
		window.open( 'http://twitter.com/intent/tweet?text='+jQuery(".title-content h2").text() +' '+window.location, 
			"twitterWindow", 
			"width=650,height=350" );
		return false;
	}

	// Facebook

	function facebookSharer(){
		window.open( 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
			'facebookWindow', 
			'width=650,height=350');
		return false;
	}		

	// Pinterest

	function pinterestSharer(){
		window.open( 'http://pinterest.com/pin/create/bookmarklet/?media='+ jQuery('.begin-content img').first().attr('src') + '&description='+jQuery('.title-content h2').text()+' '+encodeURIComponent(location.href), 
			'pinterestWindow', 
			'width=750,height=430, resizable=1');
		return false;
	}	


	// Google Plus

	function googleSharer(){
		window.open( 'https://plus.google.com/share?url='+encodeURIComponent(location.href), 
			'googleWindow', 
			'width=500,height=500');
		return false;
	}	


	// Delicious

	function deliciousSharer(){
		window.open( 'http://delicious.com/save?url='+encodeURIComponent(location.href)+'?title='+jQuery(".title-content h2").text(), 
			'deliciousWindow', 
			'width=550,height=550, resizable=1');
		return false;
	}

	// Linkedin

	function linkedinSharer(){
		window.open( 'http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(location.href)+'$title='+jQuery(".title-content h2").text(), 
			'linkedinWindow', 
			'width=650,height=450, resizable=1');
		return false;
	}

	

jQuery(document).ready(function() {

	// ADD ALT CLASS TO PRICING TABLE LINE
	jQuery(".package-features > ul").each(function(){
		jQuery(this).children("li:odd").addClass("alt");
	});		
	
	

	// SCROLL TO TOP BUTTON
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scrollup').fadeIn();
		} else {
			jQuery('.scrollup').fadeOut();
		}
	}); 

	jQuery('.scrollup').click(function(){
		jQuery("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	
	
	// FADING EFFECT FOR CLIENTS //
	jQuery(".clients li").hover(function() {
		jQuery(this).children('a').animate({opacity:"0.8"},{queue:false,duration:200}) },
		function() {
			jQuery(this).children('a').animate({opacity:"0.4"},{queue:false,duration:200})
			});		


			
	// IN AND OUT EFFECTS //
	jQuery('.item-on-hover, .item-on-hover-white').hover(function(){		 		 
		jQuery(this).animate({ opacity: 1 }, 200);
		jQuery(this).children('.hover-link, .hover-image, .hover-video').animate({ opacity: 1 }, 200);
	}, function(){
		jQuery(this).animate({ opacity: 0 }, 200);
		jQuery(this).children('.hover-link, .hover-image, .hover-video').animate({ opacity: 0 }, 200);
	});
		

		
	//TRANSFORM MENU INTO SELECT FOR RESPONSIVE LAYOUT //
	jQuery('#mainnav').mobileMenu({
		defaultText: 'Navigate to...',
		className: 'select-menu',
		subMenuDash: '&ndash;'
	});
	jQuery( ".select-menu" ).wrap( "<div class='menu-icon'></div>" );
	jQuery('.menu-icon').prepend('<i class="fa fa-reorder"></i>');
	

	
	
	// PRELOAD IMAGES //
	jQuery("#portfolio-carousel, #homeblog-carousel, .post-thumbnail, .four-columns li, .three-columns li, .two-columns li, .grid li").preloadify();

	
	
	// MENU SUPERFISH //
	jQuery('ul#mainnav').superfish({
		delay: 100,
		autoArrows: false,
		animation: {opacity:'show',opacity:'show'}, 
           speed: 'fast' 
	});
	
	
	
	// ONE PAGE HACKS //
	jQuery('.page-template-template-onepage-php ul#mainnav li:first-child').addClass('active');
	jQuery('.page-template-template-onepage-php ul#mainnav li.external').each(function() {
		jQuery(this).children('a').addClass('external');
	});	
	
	$headerheight = jQuery('.page-template-template-onepage-php #header').height();
	jQuery('.page-template-template-onepage-php section > .wpb_row').css('padding-top', $headerheight);
	
	
	
	// MENU HACKS //
	jQuery('#mainnav > li > a').wrapInner('<span></span>');
	
	jQuery("ul#mainnav li").css({ "overflow":"visible"});

	jQuery("ul#mainnav li ul li:last-child").addClass('nav-last-item');
	jQuery("ul#mainnav li ul li:first-child").addClass('nav-first-item');
	
	jQuery("#mainnav > li").each(function(){
		var $thisis = jQuery(this);
		if($thisis.hasClass('current-menu-item')) {
			$thisis.addClass("current-item item-active");		
			$thisis.prev().addClass('prev-item');
		  }
	});	
	
	jQuery("#mainnav > li > ul.sub-menu li").each(function(){
		var $thisis = jQuery(this);
		if($thisis.hasClass('current-menu-item')) {
			$thisis.parent().parent().addClass("current-item item-active");		
			$thisis.parent().parent().prev().addClass('prev-item');
		  }
	});		

	jQuery('#mainnav > li').hover(
		function(){ jQuery(this).prev().addClass('previ-item') },
		function(){ jQuery(this).prev().removeClass('previ-item') }
	)	

	
	jQuery(window).load(function() {
	
	// CALCULATES HEIGHT FOR SPECIFIC DIVS
	var bmax = 0;
	jQuery('.what-post').each(function() {
		bmax = Math.max(bmax, jQuery(this).children("a").outerHeight());
	})
	.height(bmax);	
	
	var emax = 0;
	jQuery('.portfolio-carousel-details').each(function() {
		emax = Math.max(emax, jQuery(this).outerHeight());
	})
	.height(emax);	

	var dmax = 0;
	jQuery('#portfolio-carousel li').each(function() {
		dmax = Math.max(dmax, jQuery(this).outerHeight());
	})
	.height(dmax);	
    
	
	
	// FIXES THE BACKGROUND IMAGE WHEN ADDED //
		var theWindow        = jQuery(window),
			$bg              = jQuery("#bg"),
			aspectRatio      = $bg.width() / $bg.height();
									
		function resizeBg() {
			
			if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
				$bg
					.removeClass()
					.addClass('bgheight');
			} else {
				$bg
					.removeClass()
					.addClass('bgwidth');
			}
						
		}
									
		theWindow.resize(function() {
			resizeBg();
		}).trigger("resize");

	});	
	
	$img_width = jQuery('img.subheader-bg').width();
	$screen_width = jQuery(window).width();
	
	
	
	// PRETTYPHOTO //
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
	
	// SHADOWS LOADING EFFECT //
	jQuery(".home .top-shadow").hide().delay(1500).fadeIn(3000);
	jQuery(".home .bottom-shadow").hide().delay(1500).fadeIn(3000);


	
	// APPENDING HTML CONTENT FOR ICON FONT
	jQuery('#topfooter').append('<div class="clear"></div>');

	jQuery('#contact-widget li.address').prepend('<i class="fa fa-info-circle"></i>');
	jQuery('#contact-widget li.phone').prepend('<i class="fa fa-phone"></i>');
	jQuery('#contact-widget li.email').prepend('<i class="fa fa-envelope"></i>');
	jQuery('span.hover-image').prepend('<i class="fa fa-search"></i>');
	jQuery('span.hover-link').prepend('<i class="fa fa-external-link"></i>');
	jQuery('span.hover-video').prepend('<i class="fa fa-film"></i>');

	jQuery('.check').prepend('<i class="fa fa-check"></i>');
	
	// FONT AWESOME LISTS
	var ICONS = ["glass" , "music" , "search" , "envelope-o" , "heart" , "star" , "star-o" , "user" , "film" , "th-large" , "th" , "th-list" , "check" , "times" , "search-plus" , "search-minus" , "power-off" , "signal" , "cog" , "trash-o" , "home" , "file-o" , "clock-o" , "road" , "download" , "arrow-circle-o-down" , "arrow-circle-o-up" , "inbox" , "play-circle-o" , "repeat" , "refresh" , "list-alt" , "lock" , "flag" , "headphones" , "volume-off" , "volume-down" , "volume-up" , "qrcode" , "barcode" , "tag" , "tags" , "book" , "bookmark" , "print" , "camera" , "font" , "bold" , "italic" , "text-height" , "text-width" , "align-left" , "align-center" , "align-right" , "align-justify" , "list" , "outdent" , "indent" , "video-camera" , "picture-o" , "pencil" , "map-marker" , "adjust" , "tint" , "pencil-square-o" , "share-square-o" , "check-square-o" , "arrows" , "step-backward" , "fast-backward" , "backward" , "play" , "pause" , "stop" , "forward" , "fast-forward" , "step-forward" , "eject" , "chevron-left" , "chevron-right" , "plus-circle" , "minus-circle" , "times-circle" , "check-circle" , "question-circle" , "info-circle" , "crosshairs" , "times-circle-o" , "check-circle-o" , "ban" , "arrow-left" , "arrow-right" , "arrow-up" , "arrow-down" , "share" , "expand" , "compress" , "plus" , "minus" , "asterisk" , "exclamation-circle" , "gift" , "leaf" , "fire" , "eye" , "eye-slash" , "exclamation-triangle" , "plane" , "calendar" , "random" , "comment" , "magnet" , "chevron-up" , "chevron-down" , "retweet" , "shopping-cart" , "folder" , "folder-open" , "arrows-v" , "arrows-h" , "bar-chart" , "twitter-square" , "facebook-square" , "camera-retro" , "key" , "cogs" , "comments" , "thumbs-o-up" , "thumbs-o-down" , "star-half" , "heart-o" , "sign-out" , "linkedin-square" , "thumb-tack" , "external-link" , "sign-in" , "trophy" , "github-square" , "upload" , "lemon-o" , "phone" , "square-o" , "bookmark-o" , "phone-square" , "twitter" , "facebook" , "github" , "unlock" , "credit-card" , "rss" , "hdd-o" , "bullhorn" , "bell" , "certificate" , "hand-o-right" , "hand-o-left" , "hand-o-up" , "hand-o-down" , "arrow-circle-left" , "arrow-circle-right" , "arrow-circle-up" , "arrow-circle-down" , "globe" , "wrench" , "tasks" , "filter" , "briefcase" , "arrows-alt" , "users" , "link" , "cloud" , "flask" , "scissors" , "files-o" , "paperclip" , "floppy-o" , "square" , "bars" , "list-ul" , "list-ol" , "strikethrough" , "underline" , "table" , "magic" , "truck" , "pinterest" , "pinterest-square" , "google-plus-square" , "google-plus" , "money" , "caret-down" , "caret-up" , "caret-left" , "caret-right" , "columns" , "sort" , "sort-desc" , "sort-asc" , "envelope" , "linkedin" , "undo" , "gavel" , "tachometer" , "comment-o" , "comments-o" , "bolt" , "sitemap" , "umbrella" , "clipboard" , "lightbulb-o" , "exchange" , "cloud-download" , "cloud-upload" , "user-md" , "stethoscope" , "suitcase" , "bell-o" , "coffee" , "cutlery" , "file-text-o" , "building-o" , "hospital-o" , "ambulance" , "medkit" , "fighter-jet" , "beer" , "h-square" , "plus-square" , "angle-double-left" , "angle-double-right" , "angle-double-up" , "angle-double-down" , "angle-left" , "angle-right" , "angle-up" , "angle-down" , "desktop" , "laptop" , "tablet" , "mobile" , "circle-o" , "quote-left" , "quote-right" , "spinner" , "circle" , "reply" , "github-alt" , "folder-o" , "folder-open-o" , "smile-o" , "frown-o" , "meh-o" , "gamepad" , "keyboard-o" , "flag-o" , "flag-checkered" , "terminal" , "code" , "reply-all" , "star-half-o" , "location-arrow" , "crop" , "code-fork" , "chain-broken" , "question" , "info" , "exclamation" , "superscript" , "subscript" , "eraser" , "puzzle-piece" , "microphone" , "microphone-slash" , "shield" , "calendar-o" , "fire-extinguisher" , "rocket" , "maxcdn" , "chevron-circle-left" , "chevron-circle-right" , "chevron-circle-up" , "chevron-circle-down" , "html5" , "css3" , "anchor" , "unlock-alt" , "bullseye" , "ellipsis-h" , "ellipsis-v" , "rss-square" , "play-circle" , "ticket" , "minus-square" , "minus-square-o" , "level-up" , "level-down" , "check-square" , "pencil-square" , "external-link-square" , "share-square" , "compass" , "caret-square-o-down" , "caret-square-o-up" , "caret-square-o-right" , "eur" , "gbp" , "usd" , "inr" , "jpy" , "rub" , "krw" , "btc" , "file" , "file-text" , "sort-alpha-asc" , "sort-alpha-desc" , "sort-amount-asc" , "sort-amount-desc" , "sort-numeric-asc" , "sort-numeric-desc" , "thumbs-up" , "thumbs-down" , "youtube-square" , "youtube" , "xing" , "xing-square" , "youtube-play" , "dropbox" , "stack-overflow" , "instagram" , "flickr" , "adn" , "bitbucket" , "bitbucket-square" , "tumblr" , "tumblr-square" , "long-arrow-down" , "long-arrow-up" , "long-arrow-left" , "long-arrow-right" , "apple" , "windows" , "android" , "linux" , "dribbble" , "skype" , "foursquare" , "trello" , "female" , "male" , "gratipay" , "sun-o" , "moon-o" , "archive" , "bug" , "vk" , "weibo" , "renren" , "pagelines" , "stack-exchange" , "arrow-circle-o-right" , "arrow-circle-o-left" , "caret-square-o-left" , "dot-circle-o" , "wheelchair" , "vimeo-square" , "try" , "plus-square-o" , "space-shuttle" , "slack" , "envelope-square" , "wordpress" , "openid" , "university" , "graduation-cap" , "yahoo" , "google" , "reddit" , "reddit-square" , "stumbleupon-circle" , "stumbleupon" , "delicious" , "digg" , "pied-piper" , "pied-piper-alt" , "drupal" , "joomla" , "language" , "fax" , "building" , "child" , "paw" , "spoon" , "cube" , "cubes" , "behance" , "behance-square" , "steam" , "steam-square" , "recycle" , "car" , "taxi" , "tree" , "spotify" , "deviantart" , "soundcloud" , "database" , "file-pdf-o" , "file-word-o" , "file-excel-o" , "file-powerpoint-o" , "file-image-o" , "file-archive-o" , "file-audio-o" , "file-video-o" , "file-code-o" , "vine" , "codepen" , "jsfiddle" , "life-ring" , "circle-o-notch" , "rebel" , "empire" , "git-square" , "git" , "hacker-news" , "tencent-weibo" , "qq" , "weixin" , "paper-plane" , "paper-plane-o" , "history" , "circle-thin" , "header" , "paragraph" , "sliders" , "share-alt" , "share-alt-square" , "bomb" , "futbol-o" , "tty" , "binoculars" , "plug" , "slideshare" , "twitch" , "yelp" , "newspaper-o" , "wifi" , "calculator" , "paypal" , "google-wallet" , "cc-visa" , "cc-mastercard" , "cc-discover" , "cc-amex" , "cc-paypal" , "cc-stripe" , "bell-slash" , "bell-slash-o" , "trash" , "copyright" , "at" , "eyedropper" , "paint-brush" , "birthday-cake" , "area-chart" , "pie-chart" , "line-chart" , "lastfm" , "lastfm-square" , "toggle-off" , "toggle-on" , "bicycle" , "bus" , "ioxhost" , "angellist" , "cc" , "ils" , "meanpath" , "buysellads" , "connectdevelop" , "dashcube" , "forumbee" , "leanpub" , "sellsy" , "shirtsinbulk" , "simplybuilt" , "skyatlas" , "cart-plus" , "cart-arrow-down" , "diamond" , "ship" , "user-secret" , "motorcycle" , "street-view" , "heartbeat" , "venus" , "mars" , "mercury" , "transgender" , "transgender-alt" , "venus-double" , "mars-double" , "venus-mars" , "mars-stroke" , "mars-stroke-v" , "mars-stroke-h" , "neuter" , "genderless" , "facebook-official" , "pinterest-p" , "whatsapp" , "server" , "user-plus" , "user-times" , "bed" , "viacoin" , "train" , "subway" , "medium" , "y-combinator" , "optin-monster" , "opencart" , "expeditedssl" , "battery-full" , "battery-three-quarters" , "battery-half" , "battery-quarter" , "battery-empty" , "mouse-pointer" , "i-cursor" , "object-group" , "object-ungroup" , "sticky-note" , "sticky-note-o" , "cc-jcb" , "cc-diners-club" , "clone" , "balance-scale" , "hourglass-o" , "hourglass-start" , "hourglass-half" , "hourglass-end" , "hourglass" , "hand-rock-o" , "hand-paper-o" , "hand-scissors-o" , "hand-lizard-o" , "hand-spock-o" , "hand-pointer-o" , "hand-peace-o" , "trademark" , "registered" , "creative-commons" , "gg" , "gg-circle" , "tripadvisor" , "odnoklassniki" , "odnoklassniki-square" , "get-pocket" , "wikipedia-w" , "safari" , "chrome" , "firefox" , "opera" , "internet-explorer" , "television" , "contao" , "500px" , "amazon" , "calendar-plus-o" , "calendar-minus-o" , "calendar-times-o" , "calendar-check-o" , "industry" , "map-pin" , "map-signs" , "map-o" , "map" , "commenting" , "commenting-o" , "houzz" , "vimeo" , "black-tie" , "fonticons"];	

	for ( var i in ICONS ) {
		jQuery('.list-icon-' + ICONS[i] + ' li').prepend('<i class="fa fa-'+ ICONS[i] +'"></i>');
	}	
	


	/*jQuery(".searchform-switch .fa-times-circle").hide();
	jQuery(".searchform-switch .fa-search").click(function() {
		jQuery(".searchform-switch .fa-search").hide("slow");
		
		jQuery(".header-search-form").fadeIn("slow", function(){
			  jQuery(this).removeClass("display-none");
		});
		jQuery(".searchform-switch .fa-times-circle").show("slow");
	});
	
	jQuery(".searchform-switch .fa-times-circle").click(function() {
		jQuery(".searchform-switch .fa-times-circle").hide("slow");
		jQuery(".header-search-form").fadeOut("slow", function(){
			  jQuery(this).addClass("display-none");
		});			
		jQuery(".searchform-switch .fa-search").show("slow");
	});*/	
		
	jQuery(window).scroll(function(){
		var y = jQuery(window).scrollTop();
		if( y > 250){
			jQuery("#floatmenu").fadeIn("slow");
		} else {
			jQuery('#floatmenu').fadeOut('fast');
		}

	});	
});



// Min Height for pages with low content
jQuery(document).ready(function(){
	var footerHeight = jQuery("#footer").outerHeight();
	var windowHeight = jQuery(window).outerHeight();
	var contentMinHeight = (windowHeight-footerHeight-50);
	
	jQuery(".begin-content").css({"min-height": contentMinHeight });
});


jQuery(window).load(function() {
	var barh = jQuery(".vc_progress_bar").width();
	
	var pmax = 0;
	jQuery('.vc_label').each(function() {
		pmax = Math.max(pmax, jQuery(this).outerWidth());
	}).width(pmax + 20);
	
	var result = barh - (pmax) - 35;
	
	jQuery('.vc_dt_bar').width(result);
	

});