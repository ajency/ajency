(function($){ jQuery.fn.HoverAlls=function(options){ var defaults = {  
starts : "0px , 0px", ends : "0px , 0px", returns : "0px , 0px", speed_in : 380, speed_out : 500, effect_in : "swing", effect_out : "swing", start_opacity : 0, end_opacity : 1, bg_height : "100%", bg_width : "100%", text_class : false, bg_class : false, container_class : false, overlay_class : false, big_link : false, link_target : "_blank", mobile : false, passthrough : false, full_frame : false, center_text : false, on_click : false, call_on_start : false, text_starts : "0px , 0px", text_ends : "0px, 0px", text_returns : "0px, 0px", text_speed_in : 1000, text_speed_out : 1000, text_effect_in : "swing", text_effect_out : "swing", text_start_opacity : 1, text_end_opacity : 1, html_mode : false, ticker_mode : false, ticker_repeat : 1, tooltip : false, target_container : false, top_drop : false, modal : false, lightbox : false, lighbox_center : false, alertbox : false, overlay_speed_in : 800, overlay_speed_out : 100, preset_1 : false, /* CUSTOM PRESET */ preset_2 : false, /* CUSTOM PRESET */ preset_3 : false /* CUSTOM PRESET */ }; var o =  $.extend(defaults, options); return this.each(function(){  
// LIMIT INITIAL VARIABLES AND SETTINGS BASED ON USER OPTIONS						  
var hv_click_status = false; var hv_lightbox_open = false; var $this = $(this); if(o.on_click){if(o.top_drop == false){ o.big_link = false; }}; if(o.modal || o.alertbox || o.lightbox){o.on_click = true;}; if(o.alertbox){o.modal = true; o.lightbox_center = true;}; if(o.top_drop){o.overlay = false;}; 
// ***************************
// BONUS: MOBILE DEVICE DETECT
// ***************************
if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/) || navigator.userAgent.match(/Windows Phone OS 7/i)){/* YOUR CODE HERE */};
// *****************************************************************
// I. SETUP THE HOVERALLS COORDINATES SYSTEM AND STRUCTUAL VARIABLES
// *****************************************************************
var start_x = o.starts.split(",")[0]; var start_y = o.starts.split(",")[1]; var end_x = o.ends.split(",")[0]; var end_y = o.ends.split(",")[1]; 
var return_x = o.returns.split(",")[0]; var return_y = o.returns.split(",")[1]; var text_x = o.text_starts.split(",")[0]; var text_y = o.text_starts.split(",")[1]; 
var text_end_x = o.text_ends.split(",")[0]; var text_end_y = o.text_ends.split(",")[1]; var text_return_x = o.text_returns.split(",")[0]; var text_return_y = o.text_returns.split(",")[1]; 
var x_width = parseInt($this.css("width"), 10) + "px"; var y_height = parseInt($this.css("height"), 10) + "px"; var containerwrapper = "<div class='hoveralls_container'>"; var hoverallsbackgroundwrapper = "<div class='hoveralls_background'><p class='hoveralls_text'>"; var linkwrapper = "<div class='hoveralls_background' style='cursor:pointer'><p style='cursor:pointer' class='hoveralls_text'>"; if (o.html_mode !== false){ var hoverallsbackgroundwrapperhtml = "<div class='hoveralls_background'>"; var linkwrapperhtml = "<div class='hoveralls_background' style='cursor:pointer'>"; var lightboxlinkwrapper = "<div class='hoveralls_container'><a href="+the_link+" target="+o.link_target+"><div class='hoveralls_background'>";};
// ***********************************
// II. GET LINKS AND TEXT AS VARIABLES
// ***********************************
if(o.html_mode){ // FIND THE LINK
	if(o.lightbox){if($this.is("img")){if($this.attr('rel') != undefined){the_link = $this.attr('rel');}};} else {if($(o.html_mode).find('a.hoveralls_link').length){var the_link = $(o.html_mode).find('a.hoveralls_link').attr("href");} else { the_link = "";}};
	if($(o.html_mode).find('.hoveralls_text').length){ var hoveralls_text = $(o.html_mode).find('.hoveralls_text').text(); 
	} else { hoveralls_text = "";}
} else { /* HTML MODE IS OFF */ 
	if($this.is("img")){ if($this.attr('rel') != undefined){ the_link = $this.attr('rel'); } else { the_link = ""; };
		if($this.attr('alt') != undefined){ hoveralls_text = $this.attr('alt'); } else { hoveralls_text = ""; }; 
	} else { /* IF THE OBJECT IS A CONTAINER, GET THE LINK AND TEXT */
		if ($this.find('a.hoveralls_link').attr('href') != undefined){ the_link = $this.find('.hoveralls_link').attr('href'); 
			$this.find('.hoveralls_link').remove(); // WHEN USING CLASSES, THIS REMOVES THE DIV TEXT			
		} else { the_link = "";};	// FIND THE TEXT
		if ($this.find('.hoveralls_text').length){ hoveralls_text = $this.find('.hoveralls_text').text(); 
			$this.find('.hoveralls_text').remove(); // WHEN USING CLASSES, THIS REMOVES THE DIV TEXT
		} else { hoveralls_text = "";}}};		
// ***************************************************
// III. BUILD ELEMENTS INVOLVED IN THE HOVERALLS EVENT	
// ***************************************************
if (o.html_mode){ // BUILD OBJECTS
	if (the_link == ""){ if(o.target_container == false){ $this.wrap(containerwrapper).after(hoverallsbackgroundwrapperhtml);
		} else { $(o.target_container).wrap(containerwrapper).after(hoverallsbackgroundwrapperhtml); $this.wrap(containerwrapper);};
	} else { if(o.target_container == false){ if (o.big_link){ $this.wrap('<a href="'+the_link+'" target="'+o.link_target+'">'+containerwrapper).after(linkwrapperhtml); 
				$(o.html_mode).find('.hoveralls_link').remove(); // REMOVE THE ORIGINAL LINK					
			} else { $this.wrap(containerwrapper).after(hoverallsbackgroundwrapperhtml); };
		} else { $this.wrap(containerwrapper); // SETUP FOR LIGHTBOXES
			if(o.modal){ if(o.big_link){ $(o.target_container).wrap(containerwrapper).after('<a href="'+the_link+'" target="'+o.link_target+'">'+hoverallsbackgroundwrapperhtml);
			} else { $(o.target_container).wrap(containerwrapper).after(hoverallsbackgroundwrapperhtml);};	
			} else { /* SETUP FOR NON-LIGHTBOXES */ if(o.big_link){ $this.wrap(containerwrapper); $(o.target_container).wrap('<a href="'+the_link+'" target="'+o.link_target+'">'+containerwrapper).after(linkwrapperhtml); } else { $(o.target_container).wrap(containerwrapper).after(hoverallsbackgroundwrapperhtml);}}}};	
			if(o.lightbox){ $(o.target_container).append('<img src="'+the_link+'" class="hv_lightbox_img"/>');};
} else { // HTML MODE IS OFF
	if (the_link == ""){if(o.target_container == false){$this.wrap(containerwrapper).after(hoverallsbackgroundwrapper);} else {
			$(o.target_container).wrap(containerwrapper).after(hoverallsbackgroundwrapper);	$this.wrap(containerwrapper);};
	} else { if(o.target_container == false){if(o.big_link){ $this.wrap('<a href="'+the_link+'" target="'+o.link_target+'">'+containerwrapper).after(linkwrapper);} else { 
	$this.wrap(containerwrapper).after('<a href="'+the_link+'" target="'+o.link_target+'">'+ linkwrapper);};
		} else { if(o.modal){ $this.wrap(containerwrapper); if(o.big_link){	$(o.target_container).wrap('<a href="'+the_link+'" target="'+o.link_target+'">'+containerwrapper).after(linkwrapper);		
		} else { $(o.target_container).wrap(containerwrapper).after('<a href="'+the_link+'" target="'+o.link_target+'">'+ linkwrapper);};
		} else { $this.wrap(containerwrapper); if(o.big_link){ $(o.target_container).wrap('<a href="'+the_link+'" target="'+o.link_target+'">'+containerwrapper).after(linkwrapper);									
		} else { $(o.target_container).wrap(containerwrapper).after('<a href="'+the_link+'" target="'+o.link_target+'">'+ linkwrapper); }}			
		if(o.lightbox){ $(o.target_container).append('<img src="'+the_link+'" class="hv_lightbox_img"/>');}}}};
/* TOOLTIPS */ if(o.target_container == false){if(o.tooltip){$this.parent('.hoveralls_container').find('.hoveralls_background').addClass('hv_tooltip').css({'top':start_y,'left':start_x})};
} else {if(o.tooltip){$(o.target_container).parent('.hoveralls_container').find('.hoveralls_background').addClass('hv_tooltip').css({'top':start_y,'left':start_x})}};
// **********************************
// CACHE OBJECTS FOR FASTER SELECTION
// **********************************
var $hv = {container: $this.parent('.hoveralls_container'), background: $this.parent('.hoveralls_container').find('.hoveralls_background'), text_container: $this.parent('.hoveralls_container').find('.hoveralls_text')};
if(o.target_container){$hv.container = $(o.target_container).parent('.hoveralls_container'); $hv.background = $(o.target_container).parent('.hoveralls_container').find('.hoveralls_background');		$hv.text_container = $(o.target_container).parent('.hoveralls_container').find('.hoveralls_text');};
// *****************
// IV. OVERLAY SETUP
// *****************
if (o.modal || o.alertbox || o.lightbox){if($('#hv_overlay').length == 0){$('<div id="hv_overlay">').prependTo('div.template-dynamic-portfolio_page');}}; // ONLY CREATE ONE OVERLAY CONTAINER
$('#hv_overlay, .closelightbox').live('click', function(){ hv_lightbox_open = false; hv_click_status = false;								
if(o.modal || o.alertbox || o.lightbox){
	$('#hv_overlay').fadeOut(o.overlay_speed_out, function(){if(o.overlay_class !== false){ $('#hv_overlay').removeClass(o.overlay_class)};});
	$hv.container.find('.hoveralls_text').stop().animate(aniTextBackArgs,o.text_speed_out,o.text_effect_out, function(){if(o.passthrough){$(this).css({'top':text_y,'left':text_x})}});	
	$hv.container.stop().animate(aniBackArgs,o.speed_out,o.effect_out, function(){if(o.alertbox){$(this).css({'display':'none'})};})}; return false; });
// *********************************************************
// V. MODIFY STYLES AND ELEMENTS ACCORDING TO USER SETTINGS
// *********************************************************
// SET CSS AND PLACE TEXT
if(o.target_container == false){$hv.container.css({'width':x_width,'height':y_height}).find('.hoveralls_background').css({'width':o.bg_width,'height':o.bg_height,'top':start_y,'left':start_x}).fadeTo(0,o.start_opacity).find('.hoveralls_text').css({'opacity':o.text_start_opacity,'top':text_y,'left':text_x}).text(hoveralls_text)} else {$hv.text_container.css({'opacity':o.text_start_opacity,'top':text_y,'left':text_x}).text(hoveralls_text)};
if(o.html_mode !== false){$(o.html_mode).find('.hoveralls_text').css({'opacity':o.text_start_opacity,'top':text_y,'left':text_x})};
if(o.modal || o.alertbox || o.lightbox){$hv.container.fadeTo(0,o.start_opacity).css({'width':o.bg_width,'height':o.bg_height,'display':'none'})} else { if(o.top_drop){$hv.container.css({'width':o.bg_width,'height':o.bg_height}).fadeTo(0,o.start_opacity)} else { $hv.background.css({'width':o.bg_width,'height':o.bg_height}).fadeTo(0,o.start_opacity)}};
// CLASSES
if(o.text_class){$hv.text_container.addClass(o.text_class)}; 
if(o.bg_class){if(o.modal || o.alertbox || o.top_drop || o.lightbox){$hv.container.addClass(o.bg_class)} else {$hv.background.addClass(o.bg_class)}};
if(o.container_class !== ""){$hv.container.addClass(o.container_class)};
// *************************************************
// VI. FULL FRAME MODE, HTML MODE, TICKER MODE SETUP
// *************************************************
if(o.full_frame){o.background_width = x_width; o.background_height = y_height; start_x = "0px"; start_y = "0px"; o.move_x = "0px"; o.move_y = "0px"; 
if(o.center_text){$hv.background.css({'display':'table','height':y_height}).find('.hoveralls_text').css({'display':'table-cell','vertical-align':'middle'}); } else { $hv.background.css({'display':'block','height':y_height}).find('.hoveralls_text').css({'display':'block'})}}; // VERTICALLY CENTER TEXT
// HTML INJECTION 
if(o.html_mode !== false){if(o.target_container == false){$(o.html_mode).appendTo($this.parent('.hoveralls_container').find('.hoveralls_background'))} else {if(o.top_drop){$(o.html_mode).appendTo($(o.target_container).parent('.hoveralls_container'))} else {$(o.html_mode).appendTo($(o.target_container).parent('.hoveralls_container').find('.hoveralls_background'))}}};
// TICKER MODE SETUP
if(o.ticker_mode){o.passthrough = false; $hv.container.find('.hoveralls_text').css({'white-space':'nowrap'});
	if(o.ticker_repeat > 1){$hv.container.find('.hoveralls_text').wrapInner("<span class='tickerspacer'>");
		var ticker_repeattext = "<span class='tickerspacer'>"+$hv.container.find('.hoveralls_text').text()+"</span>";		
		for(var tickercount = 1; tickercount < (o.ticker_repeat); tickercount++){ 
			if (o.ticker_repeat > 1){ $hv.container.find('.hoveralls_text').append(ticker_repeattext)}}}};
// ************************
// VII. PRE-ANIMATION SETUP
// ************************
var aniArgs = {'left':end_x,'top':end_y,'opacity':o.end_opacity}; var aniBackArgs = {'left':return_x,'top':return_y,'opacity':o.start_opacity}; 
var aniTextArgs = {'left':text_end_x,'top':text_end_y,'opacity':o.text_end_opacity}; var aniTextBackArgs = {'left':text_return_x,'top':text_return_y,'opacity':o.text_start_opacity}; 
// RESET POSITION FOR LIGHTBOXES
if(o.modal || o.alertbox || o.top_drop || o.lightbox){ $hv.container.css({'height':o.bg_height,'width':o.bg_width,'margin':'0px','padding':'0px','position':'fixed','z-index':999999,'opacity':o.opacity_out,'left':start_x,'top':start_y}).find('.hoveralls_text').css({'left':text_x,'top':text_y})} else { if(o.top_drop == false){ $hv.background.css({'left':start_x,'top':start_y}).find('.hoveralls_text').css({'left':text_x,'top':text_y})}};
// ********************
// VIII. LIGHTBOX SETUP
// ********************
if(o.lightbox_center || o.alertbox){ // CENTER THE LIGHTBOX
	end_x = ((($(window).width())-(parseInt(o.bg_width.replace("px", ""), 10)))/2)+"px"; 
	end_y = ((($(window).height())-(parseInt(o.bg_height.replace("px",""), 10)))/2)+"px";
	aniArgs['left'] = end_x; aniArgs['top'] = end_y; /* UPDATE THE ANIMATION ARGUMENTS */ 
	if(o.alertbox){ aniBackArgs['left'] = end_x; aniBackArgs['top'] = end_y; start_x = end_x; start_y = end_y;}};
$(window).resize(function(){ 
	if(o.modal || o.alertbox || o.lightbox){if(o.lightbox_center){ // CENTER THE LIGHTBOX
	end_x = ((($(window).width())-(parseInt(o.bg_width.replace("px", ""), 10)))/2)+"px"; 
	end_y = ((($(window).height())-(parseInt(o.bg_height.replace("px",""), 10)))/2)+"px";
	aniArgs['left'] = end_x; aniArgs['top'] = end_y; // UPDATE THE ANIMATION ARGUMENTS
	if(o.alertbox){ aniBackArgs['left'] = end_x; aniBackArgs['top'] = end_y; start_x = end_x; start_y = end_y;};	
	if(hv_lightbox_open){$hv.container.css({'top':end_y,'left':end_x})}}}});
// *************************
// IX. START THE HOVER EVENT
// *************************
if (o.on_click == false){ 
$this.parent('.hoveralls_container').hover(function(){ hv_click_status = true;
	$hv.container.stop().clearQueue(); $hv.background.stop().clearQueue(); $hv.text_container.stop().clearQueue();
	if(o.target_container == false){							
		if(o.tooltip){$(this).css({'overflow':'visible'})};	
		$hv.background.stop().animate(aniArgs, o.speed_in, o.effect_in).find('.hoveralls_text').stop().animate(aniTextArgs, o.text_speed_in, o.text_effect_in);
		if(o.ticker_mode){$hv.container.find('.hoveralls_text').css({'top':text_y,'left':text_x})};
	} else { // ANIMATE TARGET CONTAINERS
		if(o.top_drop){$hv.container.stop().animate(aniArgs, o.speed_in, o.effect_in).find('.hoveralls_text').stop().animate(aniTextArgs, o.text_speed_in, o.text_effect_in);
		} else { $hv.background.stop().animate(aniArgs, o.speed_in, o.effect_in).find('.hoveralls_text').stop().animate(aniTextArgs, o.text_speed_in, o.text_effect_in)}};
}, function() { /******* MOUSE OUT **********/ hv_click_status = false; 
	$hv.background.stop().clearQueue(); $hv.container.stop().clearQueue(); $hv.text_container.stop().clearQueue();
	if (o.ticker_mode){ if(o.top_drop){ $hv.container.stop().animate(aniBackArgs,o.speed_out,o.effect_out).find('.hoveralls_text').animate({'opacity':o.text_start_opacity}, o.text_speed_out, o.text_effect_out, function(){$(this).css({'top':text_y,'left':text_x})});
		} else { $hv.background.stop().animate(aniBackArgs,o.speed_out,o.effect_out).find('.hoveralls_text').animate({'opacity':o.text_start_opacity}, o.text_speed_out, o.text_effect_out, function(){ $(this).css({'top':text_y,'left':text_x})})}
	} else { if(o.top_drop){ $hv.container.find('.hoveralls_text').stop().animate(aniTextBackArgs,o.text_speed_out,o.text_effect_out, function(){ if(o.passthrough){$(this).css({'top':text_y,'left':text_x})}}); $hv.container.stop().animate(aniBackArgs,o.speed_out,o.effect_out, function(){ if(o.tooltip){$(this).parent('.hoveralls_container').css({'overflow':'hidden'})}});
		} else { $hv.container.find('.hoveralls_text').stop().animate(aniTextBackArgs,o.text_speed_out,o.text_effect_out, function(){ if(o.passthrough){ $(this).css({'top':text_y,'left':text_x})}}); $hv.background.stop().animate(aniBackArgs,o.speed_out,o.effect_out, function(){	if(o.tooltip){$(this).parent('.hoveralls_container').css({'overflow':'hidden'})}});}}}); // END HOVER EVENT
// ************************
// X. START THE CLICK EVENT 
// ************************
} else if(o.on_click){ $this.parent('.hoveralls_container').click(function(){ 
/*********** CLOSE ****************/ if(hv_click_status){hv_click_status = false; 
$hv.container.stop().clearQueue(); $hv.background.stop().clearQueue(); $hv.text_container.stop().clearQueue();
	if (o.ticker_mode){if(o.top_drop){$hv.container.stop().animate(aniBackArgs,o.speed_out,o.effect_out).find('.hoveralls_text').animate({'opacity':o.text_start_opacity}, o.text_speed_out, o.text_effect_out, function(){$(this).css({'top':text_y,'left':text_x})}); } else { $hv.container.find('.hoveralls_text').stop().animate({'opacity':o.text_end_opacity},function(){$(this).css({'top':text_y,'left':text_x})}); $hv.background.stop().animate(aniBackArgs,o.speed_out,o.effect_out).find('.hoveralls_text').animate({'opacity':o.text_start_opacity}, o.text_speed_out, o.text_effect_out,function(){ $(this).css({'top':text_y,'left':text_x})});}; $hv.background.stop().animate(aniBackArgs,o.speed_out,o.effect_out).find('.hoveralls_text').animate({'opacity':o.text_start_opacity}, o.text_speed_out, o.text_effect_out,function(){ $(this).css({'top':text_y,'left':text_x})}); } else { if(o.top_drop){ $hv.container.find('.hoveralls_text').stop().animate(aniTextBackArgs,o.text_speed_out,o.text_effect_out, function(){if(o.passthrough){$(this).css({'top':text_y,'left':text_x})}}); $hv.container.stop().animate(aniBackArgs,o.speed_out,o.effect_out); } else { $hv.container.find('.hoveralls_text').stop().animate(aniTextBackArgs,o.text_speed_out,o.text_effect_out, function(){ if(o.passthrough){$(this).css({'top':text_y,'left':text_x})}}); if(o.modal == false && o.alertbox == false && o.lightbox == false){$hv.background.stop().animate(aniBackArgs,o.speed_out,o.effect_out)}}; $hv.container.find('.hoveralls_text').stop().animate(aniTextBackArgs,o.text_speed_out,o.text_effect_out, function(){ if(o.passthrough){$this.css({'top':text_y,'left':text_x})}}); $hv.background.stop().animate(aniBackArgs,o.speed_out,o.effect_out)};
/**************** OPEN *****************/	
} else { hv_click_status = true; $hv.container.stop().clearQueue(); $hv.background.stop().clearQueue(); $hv.text_container.stop().clearQueue();
	if(o.ticker_mode){$hv.container.find('.hoveralls_text').css({'top':text_y,'left':text_x})};	
if(o.target_container == false){ $hv.background.stop().animate(aniArgs, o.speed_in, o.effect_in).find('.hoveralls_text').animate(aniTextArgs, o.text_speed_in, o.text_effect_in);
} else { /* LIGHTBOXES */ if(o.modal || o.alertbox || o.lightbox){ hv_lightbox_open = true; if(o.overlay_class !== false){ $('#hv_overlay').addClass(o.overlay_class)}; $hv.container.css({'opacity':o.opacity_out,'left':start_x,'top':start_y,'display':'block'}).stop().animate(aniArgs, o.speed_in, o.effect_in).find('.hoveralls_text').css({'left':text_x,'top':text_y}).stop().animate(aniTextArgs, o.text_speed_in, o.text_effect_in); $('#hv_overlay').fadeIn(o.overlay_speed_in)} else { if(o.top_drop == false){ $hv.background.css({'left':start_x,'top':start_y}).find('.hoveralls_text').css({'left':text_x,'top':text_y}).stop().animate(aniArgs, o.speed_in, o.effect_in).find('.hoveralls_text').animate(aniTextArgs, o.text_speed_in, o.text_effect_in);} else { $hv.container.css({'left':start_x,'top':start_y,'opacity':o.opacity_out}).stop().animate(aniArgs, o.speed_in, o.effect_in).find('.hoveralls_text').css({'left':text_x,'top':text_y}).stop().animate(aniTextArgs, o.text_speed_in, o.text_effect_in)}}}}; return false; })}; /* END CLICK EVENT */ 
// *********************
// XI. AUTO CALL SETTING
// *********************
if(o.call_on_start){ if(o.on_click){$hv.container.trigger('click'); hv_click_status = true;} else {$hv.container.trigger('mouseenter'); hv_click_status = true;}};
/* SOME FINAL WRAPUP AND CLOSURE */ }); /* END RETURN THIS.EACH LOOP */ } /* END HoverAlls FUNCTION */ })(jQuery);