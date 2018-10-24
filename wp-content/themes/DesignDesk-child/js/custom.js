(function($){


	//scripts go here.
	//console.log('script enqueued!');
	$(document).ready(function() {
		//why us counts
		$('.reason3.res4').each(function() {
			$(this).find('.res3in').find('.vc_col-sm-6').each(function(i) {
				console.log(i);
				$(this).find('.shortcode-wrapper').find('h4').prepend('<span class="mild">0' + (i + 1) + '.</span> ');
			});
		});
		$('.res3 .res3in').find('.wpb_column').each(function(i) {
			$(this).find('.shortcode-wrapper').find('h2').prepend('<span class="mild">0' + (i + 1) + '.</span> ');
		});

		//adding the scroll down button on home page slider
		if ($('body').hasClass('home')) {
			$('.wpb_revslider_element').append(
				'<div class="scrolldown_home"></div>'
			);
		}
		//on click of scroll down - scrolling down
		$(document).on('click', '.scrolldown_home', function() {
			$high = window.innerHeight ? window.innerHeight : $(window).height();
			$('html, body').animate({ scrollTop: ($high - 55) }, 600);
		});
	});

	//Timeline jQuery
	$(window).load(function() {
		var $timeline_block = $('.cd-timeline-block');

		//hide timeline blocks which are outside the viewport
		$timeline_block.each(function(i){
			if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
			}
		});

		//on scolling, show/animate timeline blocks when enter the viewport
		$(window).on('scroll', function(){
			$timeline_block.each(function(){
				if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
					$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
				}
			});
		});

		$('.tabbed_maps .vc_col-sm-6').find('.wpb_wrapper').eq(0).addClass('current');
		$('.tabbed_maps').find('.shortcode-map-embed').eq(0).addClass('current');
	});

	//Contact Page
	$(document).on('click', '.tabbed_maps .vc_col-sm-6 .wpb_wrapper', function(e) {
		$('.tabbed_maps .vc_col-sm-6').find('.wpb_wrapper').removeClass('current');
		$('.tabbed_maps').find('.shortcode-map-embed').removeClass('current');

		$(this).addClass('current');

		console.log ($(this).parent().hasClass('to_loca_1'));
		if ($(this).parent().hasClass('to_loca_1')) {
			$('.tabbed_maps').find('.loca_1').addClass('current');
		} else if ($(this).parent().hasClass('to_loca_2')) {
			$('.tabbed_maps').find('.loca_2').addClass('current');
		}
	});

	//Gallery page
	$(window).load(function() {
		if ($('body').hasClass('page-template-page-gallery-standard')) {
			$('#standard-gallery-masonry').find('.standard-gallery-item-wrap').each(function() {
				// $(this).find('.hb-gal-standard-img-wrapper').find('a').attr('rel', 'prettyPhoto[gallery_all]');
			});
		}
		if ($('body').hasClass('page-template-page-gallery-standard-pretty')) {

			$(".theprettygallery").each(function() {
				$thepostID = $(this).data('theid');
				$hashtext = $(this).data('title');
				$hashtext = $hashtext.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/g, '-').replace(/^(-)+|(-)+$/g,'').toLowerCase();
				$(this).addClass('thetitle_' + $hashtext + '_' + $thepostID);
			});

			if (window.location.hash) {
				$current_hashtext = window.location.hash.substr(1);
				setTimeout(function() {
					$('.thetitle_' + $current_hashtext).trigger('click');
				}, 50);
			}

			$("a[rel^='prettyPhoto']").prettyPhoto({
				hook: "rel",
				animation_speed: "fast",
				ajaxcallback: function() {},
				slideshow: 5e3,
				autoplay_slideshow: false,
				opacity: .8,
				show_title: true,
				allow_resize: true,
				allow_expand: true,
				default_width: 900,
				default_height: 344,
				counter_separator_label: "/",
				theme: "pp_default",
				horizontal_padding: 20,
				hideflash: false,
				wmode: "opaque",
				autoplay: true,
				modal: false,
				deeplinking: false,
				overlay_gallery: true,
				overlay_gallery_max: 30,
				keyboard_shortcuts: true,
				changepicturecallback: function() {
					$(window).trigger('scroll');
				},
				callback: function() {
					scr = document.body.scrollTop;
					$('body').removeClass('pp-is-open');
					window.location.hash = '';
					document.body.scrollTop = scr;
				},
				ie6_fallback: true,
				markup: '<div class="pp_pic_holder withtextholders">\
							<div class="ppt">&nbsp;</div> \
							<div class="pp_top"> \
								<div class="pp_left"></div> \
								<div class="pp_middle"></div> \
								<div class="pp_right"></div> \
							</div> \
							<div class="pp_content_container"> \
								<a class="pp_close" href="#"><i class="hb-moon-close-2"></i></a> \
								<div class="pp_left"> \
									<div class="pp_left_data"> \
										<h4 class="pp_cutom_title maintitle"></h4>\
										<div class="thetop">\
										</div>\
										<h5 class="pp_custom_sub_title">Our Task</h5> \
										<div class="ourtaskcontent con"></div>\
										<h5 class="pp_custom_sub_title">How we accomplished it</h5>\
										<div class="howwedidcontent con"></div>\
									</div> \
									<div class="pp_right"> \
										<div class="pp_content"> \
											<div class="pp_loaderIcon"></div> \
											<div class="pp_fade"> \
												<div class="pp_hoverContainer"> \
													<a class="pp_next" href="#"><i class="fa fa-angle-right"></i></a> \
													<a class="pp_previous" href="#"><i class="fa fa-angle-left"></i></a> \
												</div> \
												<div id="pp_full_res"></div> \
												<div class="pp_details" style="display: none;"> \
													<div class="pp_nav"> \
														<a href="#" class="pp_arrow_previous"><i class="fa fa-angle-left"></i></a> \
														<p class="currentTextHolder">0/0</p> \
														<a href="#" class="pp_arrow_next"><i class="fa fa-angle-right"></i></a> \
													</div> \
													<p class="pp_description"></p> \
													{pp_social} \
													<a class="pp_close" href="#"><i class="hb-moon-close-2"></i></a> \
												</div> \
											</div> \
										</div> \
									</div> \
									</div> \
								</div> \
								<div class="pp_bottom"> \
									<div class="pp_left"></div> \
									<div class="pp_middle"></div> \
									<div class="pp_right"></div> \
								</div> \
								<div class="pp_overlay"></div>\
							</div>',
				gallery_markup: '<div class="pp_gallery">\
									<a href="#" class="pp_arrow_previous">Previous</a>\
									<div>\
										<ul>\
											{gallery}\
										</ul>\
									</div>\
									<a href="#" class="pp_arrow_next">Next</a>\
								</div>',
				image_markup: '<div class="use-as-bg" style="background-image: url({path})"><img id="fullResImage" src="{path}" /></div>',
				flash_markup: '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
				quicktime_markup: '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
				iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',
				inline_markup: '<div class="pp_inline">{content}</div>',
				custom_markup: "",
				social_tools: '<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&layout=button_count&show_faces=true&width=500&action=like&font&colorscheme=light&height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'
			});

			$("a[rel^='prettyPhoto']").click(function() {
				$thepostID = $(this).data('theid');
				$hashtext = $(this).data('title');
				$hashtext = $hashtext.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/g, '-').replace(/^(-)+|(-)+$/g,'').toLowerCase();
				window.location.hash = $hashtext + '_' + $thepostID;

				$title = $(this).data('title');
				$location = $(this).data('location');
				$category = $(this).data('category');
				$task = $(this).next('.theneededdata').find('.nee-thetask').html();
				$desc = $(this).next('.theneededdata').find('.nee-fulldesc').html();

				$('body').addClass('pp-is-open');
				

				$('.maintitle').html($title);
				$('.thetop').html(
					'<div class="thetop-s">Location- ' + $location + '</div>' +
					'<div class="thetop-s">Area- ' + $category + '</div>'
				);
				$('.ourtaskcontent').html($task);
				$('.howwedidcontent').html($desc);

				if ($(window).width() > 991) {
					setTimeout(function() {
						$howdyHight =  $('.pp_content_container .pp_left').height() - ($('.howwedidcontent').offset().top - $('.pp_content_container .pp_left').offset().top) - 35;
						$('.howwedidcontent').height($howdyHight);
					}, 50);
					$('.page-template-page-gallery-standard-pretty .pp_content_container .pp_left, .page-template-page-gallery-standard-pretty .pp_content_container .pp_right').height(jQuery(window).height() - 60)
				}
			});

			$(window).resize(function() {
				if ($(window).width() > 991) {
					$howdyHight =  $('.pp_content_container .pp_left').height() - ($('.howwedidcontent').offset().top - $('.pp_content_container .pp_left').offset().top) - 35;
					$('.howwedidcontent').height($howdyHight);
					$('.page-template-page-gallery-standard-pretty .pp_content_container .pp_left, .page-template-page-gallery-standard-pretty .pp_content_container .pp_right').height(jQuery(window).height() - 60)
				} else {
					$('.howwedidcontent').height('auto');
					$('.page-template-page-gallery-standard-pretty .pp_content_container .pp_left, .page-template-page-gallery-standard-pretty .pp_content_container .pp_right').height('auto')
				}
			});
		}
	});

	$(window).load(function() {
		// exhibitions and environments page
		if ($('.three-col-text').length) {
			$fullHeight = $('.three-col-text').outerHeight();
			$cutHeight = 90;
			// if ($fullHeight > $cutHeight) {
			// 	$('.three-col-text').addClass('hasmore');
			// 	$('.three-col-text').after('<a href="#" class="toggle-three-col-text">Show More</a>')
			// } else {
			// 	$('.three-col-text').removeClass('hasmore');
			// 	$('.toggle-three-col-text').remove();
			// }

			$('body').addClass('work-pages');
		}
		if ($('body').hasClass('work-pages')) {
			if ($('.hb-page-title h1').text().trim() == 'Environment' || $('.hb-page-title h1').text().trim() == 'Exhibition') {
				$theLink = $('.hid-link').attr('href');
				$('.hb-page-title').append('<a href="' + $theLink + '" class="page-title-link"></a>');
			}
		}
	});
	$(document).on('click', '.toggle-three-col-text', function(e) {
		e.preventDefault();
		$currentWrap = $(this).prev('.three-col-text');
		if ($(this).hasClass('opened')) {
			$(this).removeClass('opened');
			$(this).text('See More');
			$currentWrap.addClass('hasmore');
		} else {
			$(this).addClass('opened');
			$(this).text('See Less');
			$currentWrap.removeClass('hasmore');
		}
	});

	$(window).load(function() {
		if($('body').hasClass('page-template-page-blog')) {
			if ($('div').hasClass('widget_wysija_cont')) {
				var theline = $('.widget_wysija_cont').parent('.row').next('.hb-separator.extra-space').detach();
				var thebox = $('.widget_wysija_cont').parent('.row').detach();
				$('.hb-main-content').append(theline);
				$('.hb-main-content').append(thebox);
			}
		}
		
		if ($('.myportfolio-container').length) {
			$('.eg-alter-youtube-wrapper .esg-entry-cover .eg-invisiblebutton').prettyPhoto({
				social_tools: false,
				default_width: 600,
				default_height: 480,
			});
		}
	});

})(jQuery);