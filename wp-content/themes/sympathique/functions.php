<?php
/*-----------------------------------------------------------------------------------*/
/*	Include files that theme needs to work smoothly
/*-----------------------------------------------------------------------------------*/
require_once ('framework/admin/index.php');

require_once ('framework/plugins/class-tgm-plugin-activation.php');

include ('framework/meta/my-meta-box-class.php');
include('framework/meta/class-usage.php');

include("framework/widgets/widget-recent-posts.php");
include("framework/widgets/widget-twitter.php");
include("framework/widgets/widget-flickr.php");
include("framework/widgets/widget-contact.php");

include("framework/image-resizer.php");
include("framework/navigation.php");
include("framework/shortcodes.php");
include("framework/breadcrumbs.php");

// include composer after default init
function include_composer() {
	include('framework/extend-composer.php');
}
add_action('init', 'include_composer', 9999);


/*-----------------------------------------------------------------------------------*/
/*	Creating the theme setup function
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'delicious_theme_setup' ) ) {
	function delicious_theme_setup() {
		
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'audio', 'video' ) );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		if ( !isset( $content_width ) )
			$content_width = 640;
	}
	
	add_action( 'after_setup_theme', 'delicious_theme_setup' );
}

	//check woocommerce
	if ( class_exists( 'Woocommerce' ) ) {
		include('framework/extend-woo.php');
	}


/*-----------------------------------------------------------------------------------*/
/*	Register blog sidebar, footer and custom sidebar
/*-----------------------------------------------------------------------------------*/
	
if( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => 'Blog Sidebar',
			'id' => 'sidebar',
			'description' => 'Widgets in this area will be shown in the sidebar.',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));

		register_sidebar(array(
			'name' => 'Footer',
			'id' => 'top-footer',
			'description' => 'Widgets in this area will be shown in the footer.',
			'before_widget' => '<div class="footer-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name' => 'Page Sidebar',
			'id' => 'page-sidebar',
			'description' => 'Widgets in this area will be shown in the sidebar of any page.',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));	
	}

// count sidebar widgets
if( !function_exists('delicious_count_sidebar_widgets') ) {
	function delicious_count_sidebar_widgets( $sidebar_id, $echo = true ) {
		$the_sidebars = wp_get_sidebars_widgets();
		if( !isset( $the_sidebars[$sidebar_id] ) )
			return esc_html__( 'Invalid sidebar ID', 'delicious' );
		if( $echo )
			echo count( $the_sidebars[$sidebar_id] );
		else
			return count( $the_sidebars[$sidebar_id] );
	}
}

// get all sidebars in an array 
if( !function_exists('delicious_my_sidebars') ) {
	function delicious_my_sidebars() {
		global $wp_registered_sidebars;
		
		$my_sidebars = array();
		
		if ( $wp_registered_sidebars && ! is_wp_error( $wp_registered_sidebars ) ) {
			
			foreach ( $wp_registered_sidebars as $sidebar ) {
				$my_sidebars[ $sidebar['id'] ] = $sidebar['name'];
			}
			
		}
		
		return $my_sidebars;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Register Navigation Menus
/*-----------------------------------------------------------------------------------*/

if( !function_exists('delicious_register_menu') ) {
	function delicious_register_menu() {
		register_nav_menus(
			array(
			'top_menu' => __('Main Menu', 'delicious'),
			'top_header_menu' => esc_html__('Top Header Menu', 'delicious')
			)
		);
	}
	add_action( 'init', 'delicious_register_menu' );
}

/*-----------------------------------------------------------------------------------*/
/*	Set different thumbnail dimensions
/*-----------------------------------------------------------------------------------*/

if( !function_exists('delicious_image_sizes') ) {	
	function delicious_image_sizes() {
		add_image_size( 'blog-thumb', 780, 9999, true ); 		// Blog thumbnails
		add_image_size( 'blog-gallery', 780, 410, true ); 		// Blog gallery thumbnails
		add_image_size( 'blog-video', 780, 440, true ); 		// Blog video thumbnails
		add_image_size( 'blog-home-thumb', 460, 375, true ); 	// Blog homepage thumbnails
		add_image_size( 'sidebar-thumb', 60, 40, true ); 		// Sidebar Posts thumbnails
		add_image_size( 'gallery-thumb', 460, 9999, false ); 	// Gallery thumbnails
		add_image_size( 'member-thumb', 640, 640, true); 		// Team Member thumbnails
		add_image_size( 'portfolio-thumb', 550, 450, true); 	// Portfolio thumbnails
		add_image_size( 'background-thumb', 9999, 9999, true); 	// Background Image for Pages
		add_image_size( 'full-size',  9999, 9999, false ); 		// Full Size

		add_image_size( 'blog-feed-thumb', 340, 280, true ); 	// Blog feed thumbnails
	}

	add_action( 'init', 'delicious_image_sizes' );
}


/*-----------------------------------------------------------------------------------*/
/*	Google Fonts Functions
/*-----------------------------------------------------------------------------------*/

// google fonts link rel
if( !function_exists('delicious_fonts_rel') ) {
	function delicious_fonts_rel() {
		global $smof_data;
		if ($smof_data['default_fonts'] == 0) { 
			$font_array = array( 
				$smof_data['body_font_typo']['face'] => $smof_data['body_font_typo']['face'],
				$smof_data['menu_typo']['face'] => $smof_data['menu_typo']['face'] ,
				$smof_data['h1_typo']['face'] => $smof_data['h1_typo']['face'] ,
				$smof_data['h2_typo']['face'] => $smof_data['h2_typo']['face'] ,
				$smof_data['h3_typo']['face'] => $smof_data['h3_typo']['face'] ,
				$smof_data['h4_typo']['face'] => $smof_data['h4_typo']['face'] ,
				$smof_data['h5_typo']['face'] => $smof_data['h5_typo']['face'] ,
				$smof_data['h6_typo']['face'] => $smof_data['h6_typo']['face'] 
				);
			
			$protocol = is_ssl() ? 'https' : 'http';
			$output = '';
			$i = 1;
			foreach($font_array as $font_item) {
				wp_enqueue_style( 'delicious-font-'.$i.'', "".$protocol."://fonts.googleapis.com/css?family=".$font_item."" );
				$i++;
				}
		}		
	}
	add_action( 'wp_enqueue_scripts', 'delicious_fonts_rel' );
	
}

if( !function_exists('delicious_retrieve_fontname') ) {
	// retrieve google font name
	function delicious_retrieve_fontname($res) {
		$res = explode(':', $res, 2);
		$res = str_replace('+', ' ', $res[0]);	
		return $res;
	}

	// retrieve font-family 

	function delicious_font_family($value1, $value2) {
		global $smof_data;
		$res = '';
		$res = ($smof_data['default_fonts'] == 0) ? delicious_retrieve_fontname($value1) : $value2;
		return $res;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Register and Load Javascript, CSS and Custom Styles
/*-----------------------------------------------------------------------------------*/

// Load jQuery
function delicious_load_jquery() {
    wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_script', 'delicious_load_jquery' );


if( !function_exists('delicious_register_scripts') ) {
	function delicious_register_scripts() {
		wp_register_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.lite.js', array('jquery'), '1.7', true );
		wp_register_script('jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', array('jquery'), '1.0', true );
		wp_register_script('scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'), '1.4.3', true );
		wp_register_script('one-nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '2.2.0', true );
		wp_register_script('one-page', get_template_directory_uri() . '/js/custom-onepage.js', array('jquery'), '1.0', true );
		wp_register_script('carousel', get_template_directory_uri() . '/js/jquery.jcarousel.js', array('jquery'), '0.3.0', true );
		wp_register_script('touchwipe', get_template_directory_uri() . '/js/jquery.touchwipe.min.js', array('jquery'), '1.1.1', true );
		wp_register_script('portfolio-carousel', get_template_directory_uri() . '/js/custom-portfolio-carousel.js', array('jquery'), '1.0', true );
		wp_register_script('blog-carousel', get_template_directory_uri() . '/js/custom-blog-carousel.js', array('jquery'), '1.0', true );
		wp_register_script('tipsy', get_template_directory_uri() . '/js/jquery.tipsy.js', array('jquery'), '1.0.0a', true );
	}
	add_action( 'init', 'delicious_register_scripts' );	
}


if( !function_exists('delicious_footer_scripts') ) {
	function delicious_footer_scripts() {
		if (is_page_template('template-onepage.php')) {
			wp_enqueue_script('one-page');
		}
		wp_enqueue_script('revslider-hack', get_template_directory_uri() . '/js/revslider-hack.js', array('jquery'), '1.0', true );
	}
	add_action( 'wp_footer', 'delicious_footer_scripts' );	
}


if( !function_exists('delicious_enqueue_scripts') ) {
		
	add_action('wp_enqueue_scripts','delicious_enqueue_scripts');	
	
	function delicious_enqueue_scripts() {
		
		// Theme styles
		
		wp_enqueue_style( 'default-style', get_stylesheet_uri() );
		wp_enqueue_style( 'prettyphoto-lightbox', get_template_directory_uri() . '/css/prettyPhoto.css' );
		wp_enqueue_style( 'superfish', get_template_directory_uri() . '/css/superfish.css' );
		wp_enqueue_style( 'blog-font-awesome', get_template_directory_uri() . '/framework/fonts/font-awesome/css/font-awesome.css' );
		wp_enqueue_style( 'audioplayer', get_template_directory_uri() . '/css/audioplayer.css' );
		wp_enqueue_style( 'revslider', get_template_directory_uri() . '/css/revslider.css' );
		wp_enqueue_style( 'extend-composer', get_template_directory_uri() . '/css/extend-composer.css' );
		
		wp_register_style( 'tipsy', get_template_directory_uri() . '/css/tipsy.css' );

		global $smof_data;
		
		if($smof_data['responsive_enabled'] =='1') { 
			wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
		}
		
		wp_enqueue_style( 'color-scheme', get_template_directory_uri() . '/css/color-schemes/'.$smof_data['scheme'] );
		
		//woocommerce style
		if (class_exists( 'Woocommerce' ) ) { 
			wp_enqueue_style( 'dt_woocommerce', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce.css');
		}		
		
		// Theme scripts
		wp_enqueue_script('hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array('jquery'), '6.0', true );
		wp_enqueue_script('jflickrfeed', get_template_directory_uri() . '/js/jflickrfeed.js', array('jquery'), '1.0', true );
		wp_enqueue_script('preloadify', get_template_directory_uri() . '/js/jquery.preloadify.min.js', array('jquery'), '1.0', false );
		wp_enqueue_script('prettyphoto-theme', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), '3.1.4', true );
		wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), '1.0', false );
		// wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.min.js', array('jquery'), '1.1.0', true );
		wp_enqueue_script('mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', array('jquery'), '1.0', false );
		wp_enqueue_script('slides', get_template_directory_uri() . '/js/slides.min.jquery.js', array('jquery'), '1.1.9', true );
		wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/js/smoothScroll.js', array('jquery'), '1.0', true );
		
		if( is_singular() ) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments

		if (( 'portfolio' == get_post_type() ) || (is_page_template('template-blog.php'))) {
			wp_enqueue_script('custom-slides', get_template_directory_uri() . '/js/custom-slides.js', array('slides'), '1.0', true );
		}
		
		if((is_page_template('template-blog.php')) || ( 'post' == get_post_type() )) {
			wp_enqueue_script('jplayer');
		}
		
		if (( 'portfolio' == get_post_type() ) || (is_page_template('template-blog.php')) || (is_page_template('template-portfolio.php')) || (is_page_template('template-gallery.php')) || (is_category()) ) {
			wp_enqueue_script('dt-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.0', true );
			wp_enqueue_script('custom-isotope', get_template_directory_uri() . '/js/custom-isotope.js', array('dt-isotope'), '1.0', true );
		}		
		
		if ( 'portfolio' == get_post_type() ) {
			wp_enqueue_script('carousel');
			wp_enqueue_script('touchwipe');
			wp_enqueue_script('portfolio-carousel');
		}
		
		if (is_page_template('template-onepage.php')) {
			wp_enqueue_script('scrollto');
			wp_enqueue_script('one-nav');
		}		

		wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.4.8', false );		
		
		
		
		// Custom Styles
		
		//boxed or not boxed
		$main_layout = '';
			if($smof_data['layout'] == 'wide') {
				$main_layout .= '#wrapper { width:100%; }';
			}			
			if($smof_data['layout'] == 'boxed') {
				$main_layout .= '#wrapper { width:1020px; margin:0 auto; } @media only screen and (min-width: 1281px) { #wrapper { width:1180px; } } .page-template-template-onepage-php #header { width:1020px; } @media only screen and (min-width: 1281px) {.page-template-template-onepage-php #header { width:1180px; } } ';
			}
			wp_add_inline_style( 'default-style', $main_layout );	
			
			
		// custom background colors	
		$style_css ='';
			if(!empty($smof_data['body_background'])) {
				$style_css .= 'html body {background: '.$smof_data['body_background'].';}';
			}	
			if(!empty($smof_data['wrapper_background'])) {
				$style_css .= '#wrapper, html .title-bg {background: '.$smof_data['wrapper_background'].';}';
			}
			if(!empty($smof_data['header_background'])) {
				$style_css .= '#header {background: '.$smof_data['header_background'].';}';
			}			
			if(!empty($smof_data['footer_background'])) {
				$style_css .= '#footer {background: '.$smof_data['footer_background'].';}';
			}	
			
			if(!empty($smof_data['bottomfooter_background'])) {
				$style_css .= '#bottomfooter {background: '.$smof_data['bottomfooter_background'].';}';
			}	
			
			if(!empty($smof_data['selected_text_background'])) {
				$style_css .= '::selection {background: '.$smof_data['selected_text_background'].'; color: #fff; } ';
				$style_css .= '::-moz-selection {background: '.$smof_data['selected_text_background'].'; color: #fff; } ';
			}			
			
			if((!empty($smof_data['pattern'])) && ($smof_data['pattern'] != 'bg12')) {
				$style_css .= 'html body { background: url('.get_template_directory_uri().'/images/bg/'.$smof_data['pattern'].'.png) repeat scroll 0 0;}';
			}
			else {
				$style_css .= 'body { background: #efefef; }';
			}
			
			// margin-top for logo
			if(!empty($smof_data['margin_logo'])) {
				$style_css .= '#header .logo img { margin-top: '.$smof_data['margin_logo'].'px;}';
			}
			
			if(!empty($smof_data['margin_floating_logo'])) {
				$style_css .= '#floatmenu .logo img { margin-top: '.$smof_data['margin_floating_logo'].'px;}';
			}
						
			wp_add_inline_style( 'default-style', $style_css );
			
		
		//custom css	
		$custom_css = '';
			if(!empty($smof_data['more_css'])) {
				$custom_css .= $smof_data['more_css'];
			}	
			wp_add_inline_style( 'default-style', $custom_css );
			
			
		//counting footer widgets number and assigning them a width
		$number = delicious_count_sidebar_widgets( 'top-footer', false );
		$footer_columns = '';
			if($number == 2) { 
				$footer_columns = '.footer-widget { width: 48% !important; }'; }   	
			else if($number == 3) { 
				$footer_columns = '.footer-widget { width:30.66% !important; }'; } 	
			
			else if ($number == 4) { 
			$footer_columns = '.footer-widget { width:22% !important; }'; } 
			
			else if ($number == 5) { 
			$footer_columns = '.footer-widget { width:16.8% !important; }'; } 
			
			wp_add_inline_style( 'default-style', $footer_columns );
			
			
		// page background metabox styles
		global $post;		
		if(!is_404()) {		

			$page_img = get_post_meta($post->ID,'dt_page_img',true);
			$bg_full = get_post_meta($post->ID,'dt_bg_full',false);
			$bg_position = get_post_meta($post->ID,'dt_bg_position',true);
			$bg_repeat = get_post_meta($post->ID,'dt_bg_repeat',true);
			$bg_attachment = get_post_meta($post->ID,'dt_bg_attachment',true);			
			$bg_color = get_post_meta($post->ID,'dt_bg_color',true);	
			$onepage_bg_color = get_post_meta($post->ID,'dt_onepage_header_color',true);	
		}
		
		if(is_page()) {
			$page_bg = '';
			
			if(!empty($onepage_bg_color)) { $page_bg .= 'html .page-template-template-onepage-php #header { background: '.$onepage_bg_color.'; }'; }
			
			if(empty($bg_full)) {
				if(!empty($page_img['url'])) { $page_bg .= 'html body { background-image: url('.$page_img['url'].'); }'; }
				if(!empty($bg_position)) { $page_bg .= 'html body { background-position: top '.$bg_position.'; }'; }
				if(!empty($bg_repeat)) { $page_bg .= 'html body { background-repeat: '.$bg_repeat.'; }'; }
				if(!empty($bg_attachment)) { $page_bg .= 'html body { background-attachment: '.$bg_attachment.'; }'; }
				if(!empty($bg_color)) { $page_bg .= 'html body { background-color: '.$bg_color.'; }'; }
			}
			wp_add_inline_style( 'default-style', $page_bg );		
		}
		
		
		// Typography Options
		global $smof_data;

			$google_styles = '';
			$google_styles .= 'html body {
									font-family: '.delicious_font_family($smof_data['body_font_typo']['face'], $smof_data['default_body_font_typo']['face']).';
									font-size: '.$smof_data['body_font_typo']['size'].';
									line-height: '.$smof_data['body_font_typo']['height'].';
									color: '.$smof_data['body_font_typo']['color'].';
								}';
			$google_styles .= 'html ul#mainnav li a {  
									font-family: '.delicious_font_family($smof_data['menu_typo']['face'], $smof_data['default_menu_typo']['face']).';
									font-size: '.$smof_data['menu_typo']['size'].';
									
									color: '.$smof_data['menu_typo']['color'].';
								}';									
			$google_styles .= 'html h1 {  
									font-family: '.delicious_font_family($smof_data['h1_typo']['face'], $smof_data['default_h1_typo']['face']).';
									font-size: '.$smof_data['h1_typo']['size'].';
									line-height: '.$smof_data['h1_typo']['height'].';
									color: '.$smof_data['h1_typo']['color'].';
								}';	
			$google_styles .= 'html h2 {  
									font-family: '.delicious_font_family($smof_data['h2_typo']['face'], $smof_data['default_h2_typo']['face']).';
									font-size: '.$smof_data['h2_typo']['size'].';
									line-height: '.$smof_data['h2_typo']['height'].';
									color: '.$smof_data['h2_typo']['color'].';
								}';	
			$google_styles .= 'html h3 {  
									font-family: '.delicious_font_family($smof_data['h3_typo']['face'], $smof_data['default_h3_typo']['face']).';
									font-size: '.$smof_data['h3_typo']['size'].';
									line-height: '.$smof_data['h3_typo']['height'].';
									color: '.$smof_data['h3_typo']['color'].';
								}';	
			$google_styles .= 'html h4 {  
									font-family: '.delicious_font_family($smof_data['h4_typo']['face'], $smof_data['default_h4_typo']['face']).';
									font-size: '.$smof_data['h4_typo']['size'].';
									line-height: '.$smof_data['h4_typo']['height'].';
									color: '.$smof_data['h4_typo']['color'].';
								}';	
			$google_styles .= 'html h5 {  
									font-family: '.delicious_font_family($smof_data['h5_typo']['face'], $smof_data['default_h5_typo']['face']).';
									font-size: '.$smof_data['h5_typo']['size'].';
									line-height: '.$smof_data['h5_typo']['height'].';
									color: '.$smof_data['h5_typo']['color'].';
								}';	
			$google_styles .= 'html h6 {  
									font-family: '.delicious_font_family($smof_data['h6_typo']['face'], $smof_data['default_h6_typo']['face']).';
									font-size: '.$smof_data['h6_typo']['size'].';
									line-height: '.$smof_data['h6_typo']['height'].';
									color: '.$smof_data['h6_typo']['color'].';
								}';										
		wp_add_inline_style( 'default-style', $google_styles );						
	}
}

function delicious_admin_theme_style() {
    wp_enqueue_style('delicious-admin-style', get_template_directory_uri() . '/css/admin-style.css');
    wp_enqueue_style( 'dt-font-awesome', get_template_directory_uri() . '/framework/fonts/font-awesome/css/font-awesome.css' );
}
add_action('admin_enqueue_scripts', 'delicious_admin_theme_style');

if( !function_exists('delicious_conditional_styles') ) {
	function delicious_conditional_styles() {
			
			// HTML5 Shiv for IE - it looks like add_data is not working for scripts yet. Until then, we`ll switch to old school technique
			global $is_IE;
			if ($is_IE) {
				wp_register_script ('html5shim', get_template_directory_uri() . '/js/html5shim.js');
				wp_enqueue_script ('html5shim');				
			}
			
			// Styles for IE7
			wp_enqueue_style('ie7-hacks', get_template_directory_uri() . '/css/ie7.css');
			global $wp_styles;
			$wp_styles->add_data( 'ie7-hacks', 'conditional', 'lt IE 9' );	
			
	}
	add_filter( 'wp_enqueue_scripts', 'delicious_conditional_styles' );
}



if( !function_exists('enqueue_post_format_resources') ) {
	function enqueue_post_format_resources($format) {

		if( in_array($format, array('gallery')) ) {
			wp_enqueue_script('slides', get_template_directory_uri() . '/js/slides.min.jquery.js', array('jquery'), '1.1.9', false );

		} else {
		  return false;
		}

	}
	add_action( 'wp_enqueue_scripts', 'enqueue_post_format_resources' );	
}



/*-----------------------------------------------------------------------------------*/
/*	Delicious Gallery Function
/*-----------------------------------------------------------------------------------*/	
if ( !function_exists( 'delicious_gallery' ) ) {
	function delicious_gallery($postid) {  

	$token = wp_generate_password(5, false, false);
   	wp_enqueue_script('custom-gallery', get_template_directory_uri() . '/js/custom-gallery.js', array('jquery'), '1.0', false );	
	wp_localize_script( 'custom-gallery', 'dt_gallery_' . $token, array( 'post_id' => $postid) );
	
		$i=0;
		$gallery_images = get_post_meta($postid, 'dt_gallery_block',true);
		
		if(!empty($gallery_images)) {	
				
			echo '<div id="container-slides">';
				echo '<div class="del_gallery" id="slides-'.$postid.'" data-token="' . $token . '" style="position:relative;">';
					echo '<div class="slides_container">';
					
					foreach ($gallery_images as $gallery_item) {
						$item_url = $gallery_item['dt_gallery_post'];
						$item_name = $gallery_item['dt_gallery_photo_name'];
						$item_desc = $gallery_item['dt_gallery_photo_desc'];
						
						$resizer_url = $item_url['url'];
						$resized_image = aq_resize( $resizer_url, 780, 408, true );

							echo  '<div class="slide">';
								echo  '<a rel="prettyPhoto[pp_gal]" href="'.esc_url($resizer_url).'" title="'.esc_attr($item_name).'">';
									echo  '<img src="'.esc_url($resized_image).'" alt="" />';
								echo  '</a>';
								if(!empty($item_desc))
									echo  '<div class="image-caption">'.esc_html($item_desc).'</div>';
							echo  '</div>';
				
						
					}
							
					echo  '</div><!--end slides_container-->';
					
					echo  '<a href="#" class="prev"><img src="'.get_template_directory_uri().'/images/blog-arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>';
					echo  '<a href="#" class="next"><img src="'.get_template_directory_uri().'/images/blog-arrow-next.png" width="24" height="43" alt="Arrow Next"></a>';
				echo  '</div><!--end slides-->';
			echo  '</div><!--end container-slides-->';						
		}
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Delicious Audio Function
/*-----------------------------------------------------------------------------------*/	

if(!function_exists('delicious_audio')) { 
	function delicious_audio($postid) { 
	
		$mp3_item = get_post_meta($postid, 'dt_mp3_audio_block', true);
		$ogg_item = get_post_meta($postid, 'dt_ogg_audio_block', true);
		$swfpath = get_template_directory_uri() .'/js';
		
		$token = wp_generate_password(5, false, false);
		wp_enqueue_script('custom-audio', get_template_directory_uri() . '/js/custom-audio.js', array('jquery'), '1.0', false );	
		wp_localize_script( 'custom-audio', 'dt_audio_' . $token, array( 'post_id' => $postid, 'mp3_item' => $mp3_item, 'ogg_item' => $ogg_item, 'spath' => $swfpath) );		
		
		?>
		
		
		<div id="audio_jplayer_<?php echo $postid; ?>" class="jp-jplayer del_audio" data-token="<?php echo $token; ?>"></div>
		<div id="jp_container_<?php echo $postid; ?>" class="jp-audio">
			<div class="jp-type-single">
				<div class="jp-gui jp-interface">
					<div class="jp-controls">
						<a href="javascript:;" class="jp-play" tabindex="1">play</a>
						<a href="javascript:;" class="jp-pause" tabindex="1">pause</a>
						<div class="jp-current-time"></div>
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>																

						<a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a>
						<a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>
						<div class="jp-duration"></div>								
					</div>
				</div>
				<div class="jp-no-solution">
					<span><?php _e('Update required', 'delicious'); ?></span>
					<?php _e('To play the media you will need to either update your browser to a recent version or change it with a better one like Google Chrome.', 'delicious'); ?>
				</div>
			</div>
		</div>		

<?php	
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Delicious Video Function
/*-----------------------------------------------------------------------------------*/	

if(!function_exists('delicious_video')) { 
	function delicious_video($postid) { 
	
		$mp4_item = get_post_meta($postid, 'dt_mp4_video_block', true);
		$ogv_item = get_post_meta($postid, 'dt_ogv_video_block', true);
		$external_item = get_post_meta($postid, 'dt_external_video_block', true);		

		$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'blog-video');	
		
		if(($mp4_item != '') || ($ogv_item != '') && ($external_item == '')) {

			$swfpath = get_template_directory_uri() .'/js';
			
			$token = wp_generate_password(5, false, false);
			
			wp_enqueue_script('custom-video', get_template_directory_uri() . '/js/custom-video.js', array('jquery'), '1.0', false );	
			wp_localize_script( 'custom-video', 'dt_video_' . $token, array( 'post_id' => $postid, 'mp4_item' => $mp4_item, 'ogv_item' => $ogv_item, 'spath' => $swfpath, 'vposter' => $imgsrc[0]) );				

			?>

			<div id="jp_video_container_<?php echo $postid; ?>" class="jp-video">
				<div class="jp-type-single">
					<div id="video_jplayer_<?php echo $postid; ?>" class="jp-jplayer del_video" data-token="<?php echo $token; ?>"></div>
					<div class="jp-gui">
					
						<div class="jp-video-play">
							<a href="javascript:;" class="jp-video-play-icon" tabindex="1"><i class="icon-play"></i></a>
						</div>
					
						<div class=" jp-interface">
							<div class="jp-controls">
								<a href="javascript:;" class="jp-play" tabindex="1">play</a>
								<a href="javascript:;" class="jp-pause" tabindex="1">pause</a>
								<div class="jp-current-time"></div>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								
								<a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a>
								<a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a>								
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>																					
								<a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a>
								<a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>						
								<div class="jp-duration"></div>								
							</div>
						</div>
					</div>
					<div class="jp-no-solution">
						<span><?php _e('Update required', 'delicious'); ?></span>
						<?php _e('To play the media you will need to either update your browser to a recent version or change it with a better one like Google Chrome.', 'delicious'); ?>
					</div>
				</div>
			</div>		

<?php	
		}
		else 
		//youtube and vimeo embedding
		if(($mp4_item == '') && ($ogv_item == '') && ($external_item != '')) {
			if( strpos($external_item, 'youtube') ) {
				preg_match(
						'/[\\?\\&]v=([^\\?\\&]+)/',
						$external_item,
						$matches
					);
				$id = $matches[1];
				 
				$width = '780';
				$height = '440';
				echo '<div class="youtube-article"><iframe class="dt-youtube" width="' .$width. '" height="'.$height.'" src="//www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe></div>';
			}
			
			if( strpos($external_item, 'vimeo') ) {
				preg_match(
						'/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',
						$external_item,
						$matches
					);
				$id = $matches[2];	

				$width = '780';
				$height = '440';		
				
				echo '<div class="vimeo-article"><iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';	
			}			
		}

	}
}

/*-----------------------------------------------------------------------------------*/
/*	Sets how comments are displayed
/*-----------------------------------------------------------------------------------*/	

if(!function_exists('delicious_comment')) { 
	function delicious_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li class="comment" <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="commentwrap">
				<div class="avatar">
					<?php echo get_avatar($comment,$size='60'); ?>
				</div><!--end avatar-->
				
				<div class="metacomment">
					<span><?php echo get_comment_author_link() ?></span>
					<?php printf(__('on %1$s at %2$s', 'delicious'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(esc_html__('Edit', 'delicious'),'  ','') ?> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
					  
				</div><!--end metacomment-->
			
				<div class="bodycomment">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php esc_html_e('<em>Your comment is awaiting moderation.</em>', 'delicious') ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div><!--end bodycomment-->
			</div><!--end commentwrap-->
		
	<?php }
}


/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types & Taxonomies
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'delicious_register_post_types' );

function delicious_register_post_types() {

//portfolio post type
	register_post_type( 'portfolio',
		array(
			'labels' => array(
			'name' => __( 'Portfolio Items', 'delicious' ),
			'singular_name' => __( 'Portfolio Item', 'delicious' ),
			'add_new' => __( 'Add New', 'delicious' ),
			'add_new_item' => __( 'Add New Portfolio Item', 'delicious' ),
			'edit_item' => __( 'Edit Portfolio Item', 'delicious' ),
			'new_item' => __( 'New Portfolio Item', 'delicious' ),
			'view_item' => __( 'View Portfolio Item', 'delicious' ),
			'search_items' => __( 'Search Portfolio Items', 'delicious' ),
			'not_found' => __( 'No projects found', 'delicious' ),
			'not_found_in_trash' => __( 'No projects found in Trash', 'delicious' ),
			'parent_item_colon' => __( 'Parent Portfolio:', 'delicious' ),
			'menu_name' => __( 'Portfolio', 'delicious' ),
			
		),		  
		'hierarchical' => true,
        'description' => 'add your portfolio items',
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies' => array('portfolio_cats'),
		'menu_icon' =>  'dashicons-portfolio',
		'show_ui' => true,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio', 'with_front' => true)
		)
	  );
	  
//services post type
	register_post_type( 'services',
		array(
			'labels' => array(
			'name' => __( 'Services Items', 'delicious' ),
			'singular_name' => __( 'Services Item', 'delicious' ),
			'add_new' => __( 'Add New', 'delicious' ),
			'add_new_item' => __( 'Add New Services Item', 'delicious' ),
			'edit_item' => __( 'Edit Services Item', 'delicious' ),
			'new_item' => __( 'New Services Item', 'delicious' ),
			'view_item' => __( 'View Services Item', 'delicious' ),
			'search_items' => __( 'Search Services Items', 'delicious' ),
			'not_found' => __( 'No service found', 'delicious' ),
			'not_found_in_trash' => __( 'No service found in Trash', 'delicious' ),
			'parent_item_colon' => __( 'Parent Service:', 'delicious' ),
			'menu_name' => __( 'Services', 'delicious' ),
			
		),		  
		'hierarchical' => false,
        'description' => __( 'Add Your Services Items', 'delicious' ),
        'supports' => array('title'),
        'menu_icon' =>  'dashicons-lightbulb',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'rewrite' => true 
		)
	  );	

//team post type
	register_post_type( 'team',
		array(
			'labels' => array(
			'name' => __( 'Team Members', 'delicious' ),
			'singular_name' => __( 'Team Member', 'delicious' ),
			'add_new' => __( 'Add New', 'delicious' ),
			'add_new_item' => __( 'Add New Team Member', 'delicious' ),
			'edit_item' => __( 'Edit Team Member', 'delicious' ),
			'new_item' => __( 'New Team Member', 'delicious' ),
			'view_item' => __( 'View Team Member', 'delicious' ),
			'search_items' => __( 'Search Through Team Members', 'delicious' ),
			'not_found' => __( 'No members found', 'delicious' ),
			'not_found_in_trash' => __( 'No members found in Trash', 'delicious' ),
			'parent_item_colon' => __( 'Parent Team Member:', 'delicious' ),
			'menu_name' => __( 'Team', 'delicious' ),
			
		),		  
		'hierarchical' => false,
        'description' => __( 'Add a team member', 'delicious' ),
        'supports' => array( 'title', 'thumbnail'),
        'menu_icon' =>  'dashicons-businessman',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'rewrite' => true 
		)
	  );		  

//testimonials post type
	register_post_type( 'testimonials',
		array(
			'labels' => array(
			'name' => __( 'Testimonials', 'delicious' ),
			'singular_name' => __( 'Testimonial', 'delicious' ),
			'add_new' => __( 'Add New', 'delicious' ),
			'add_new_item' => __( 'Add New Testimonial', 'delicious' ),
			'edit_item' => __( 'Edit Testimonial', 'delicious' ),
			'new_item' => __( 'New Testimonial', 'delicious' ),
			'view_item' => __( 'View Testimonial', 'delicious' ),
			'search_items' => __( 'Search Through Testimonials', 'delicious' ),
			'not_found' => __( 'No testimonials found', 'delicious' ),
			'not_found_in_trash' => __( 'No testimonials found in Trash', 'delicious' ),
			'parent_item_colon' => __( 'Parent Testimonial:', 'delicious' ),
			'menu_name' => __( 'Testimonials', 'delicious' ),
			
		),		  
		'hierarchical' => false,
        'description' => __( 'Add a Testimonial', 'delicious' ),
        'supports' => array( 'title'),
        'menu_icon' =>  'dashicons-testimonial',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'rewrite' => true 
		)
	  );		  
	  
	  
}

// Add taxonomies
add_action( 'init', 'delicious_create_taxonomies' );


//create taxonomies
function delicious_create_taxonomies() {
	
	// portfolio taxonomies
	$portfolio_cat_labels = array(
		'name' => __( 'Portfolio Categories', 'delicious' ),
		'singular_name' => __( 'Portfolio Category', 'delicious' ),
		'search_items' =>  __( 'Search Portfolio Categories', 'delicious' ),
		'all_items' => __( 'All Portfolio Categories', 'delicious' ),
		'parent_item' => __( 'Parent Portfolio Category', 'delicious' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'delicious' ),
		'edit_item' => __( 'Edit Portfolio Category', 'delicious' ),
		'update_item' => __( 'Update Portfolio Category', 'delicious' ),
		'add_new_item' => __( 'Add New Portfolio Category', 'delicious' ),
		'new_item_name' => __( 'New Portfolio Category Name', 'delicious' ),
		'choose_from_most_used'	=> __( 'Choose from the most used portfolio categories', 'delicious' )
	); 	

	register_taxonomy('portfolio_cats','portfolio',array(
		'hierarchical' => true,
		'labels' => $portfolio_cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));

}
add_action('init', 'demo_add_default_boxes');
 
function demo_add_default_boxes() {
    register_taxonomy_for_object_type('portfolio_cats', 'portfolio');
}

// Remove Tags Meta Boxes from Portfolio Item Pages
	if (is_admin()) :
		function delicious_remove_meta_boxes() {
				remove_meta_box('tagsdiv-portfolio_cats', 'portfolio', 'side');
		}
	add_action( 'admin_menu', 'delicious_remove_meta_boxes' );
	endif;

// Get Portfolio category ID
function get_taxonomy_cat_ID( $cat_name='General' ) {
	$cat = get_term_by( 'name', $cat_name, 'portfolio_cats' );
	if ( $cat )
		return $cat->term_id;
	return 0;
}



/*-----------------------------------------------------------------------------------*/
/*	Create Custom Boxes for Custom Post Types
/*-----------------------------------------------------------------------------------*/

function delicious_services_meta_boxes(){
	add_meta_box('services', __('Service Item ID!', 'delicious'), 'delicious_services_metabox', 'services', 'side', 'core');
}

function delicious_member_meta_boxes(){
	add_meta_box('team', __('Team Member ID!', 'delicious'), 'delicious_member_metabox', 'team', 'side', 'core');
}

function delicious_testimonial_meta_boxes(){
	add_meta_box('testimonials', __('Testimonial ID!', 'delicious'), 'delicious_testimonial_metabox', 'testimonials', 'side', 'core');
}

add_action( 'add_meta_boxes', 'delicious_services_meta_boxes' );
add_action( 'add_meta_boxes', 'delicious_member_meta_boxes' );
add_action( 'add_meta_boxes', 'delicious_testimonial_meta_boxes' );



/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/

function delicious_services_metabox($post, $metabox){
	?>
		<code>[service id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the service item on another page!', 'delicious') ?></small>
	<?php
}

function delicious_member_metabox($post, $metabox){
	?>
		<code>[team-member id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the team member on another page!', 'delicious') ?></small>
	<?php
}

function delicious_testimonial_metabox($post, $metabox){
	?>
		<code>[testimonial id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the testimonial on another page!', 'delicious') ?></small>
	<?php
}


//modify Services admin page structure
add_filter( 'manage_edit-services_columns', 'delicious_edit_services_columns' ) ;

function delicious_edit_services_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Services', 'delicious' ),
		'shortcode' => __( 'Embed Code', 'delicious' ),
		'date' => __( 'Date', 'delicious' )
	);

	return $columns;
}


add_action( 'manage_services_posts_custom_column', 'delicious_manage_services_columns', 10, 2 );

function delicious_manage_services_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[service id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}


//modify Team admin page structure
add_filter( 'manage_edit-team_columns', 'delicious_edit_team_columns' ) ;

function delicious_edit_team_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Team Members', 'delicious' ),
		'shortcode' => __( 'Embed Code', 'delicious' ),
		'date' => __( 'Date', 'delicious' )
	);

	return $columns;
}


add_action( 'manage_team_posts_custom_column', 'delicious_manage_team_columns', 10, 2 );

function delicious_manage_team_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[team-member id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}


//modify Testimonials admin page structure
add_filter( 'manage_edit-testimonials_columns', 'delicious_edit_testimonials_columns' ) ;

function delicious_edit_testimonials_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'testimonials', 'delicious' ),
		'shortcode' => __( 'Embed Code', 'delicious' ),
		'date' => __( 'Date', 'delicious' )
	);

	return $columns;
}


add_action( 'manage_testimonials_posts_custom_column', 'delicious_manage_testimonials_columns', 10, 2 );

function delicious_manage_testimonials_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[testimonial id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Other Functions
/*-----------------------------------------------------------------------------------*/

// Include the Google Analytics Tracking Code (ga.js)
function delicious_google_analytics_tracking_code(){
	global $smof_data;

	if ($smof_data['analytics_enabled'] === '1') { 

		wp_enqueue_script('google-analytics', get_template_directory_uri() . '/js/google-analytics.js', array('jquery'), '1.0', false );	
		wp_localize_script( 'google-analytics', "ga", array( 'ga_id' => $smof_data['ga_id']) );		

	}
}

add_action('wp_footer', 'delicious_google_analytics_tracking_code');


// Language Switcher for WPML
if (function_exists('icl_get_languages')) {
	function delicious_language_selector() {
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		wp_enqueue_script( 'tipsy' );
		wp_enqueue_style( 'tipsy' );

		if(!empty($languages)){
			echo '<div id="header_language_list"><ul>';
			foreach($languages as $l){
				if($l['active']) { echo '<li class="active-lang switch-lang" original-title="'.$l['translated_name'].'">'; }
					else { echo '<li class="switch-lang" original-title="'.$l['translated_name'].'">'; }
				if(!$l['active']) echo '<a href="'.$l['url'].'">';
				echo substr($l['translated_name'], 0, 2);
				if(!$l['active']) echo '</a>';
				echo '</li>';
			}
			echo '</ul></div>';
		}
	}
}

//get sidebar position
if(!function_exists('dt_sidebar_position')) { 
	function dt_sidebar_position($postid) {
		global $dt_sidebar_pos;
		$dt_sidebar_pos = get_post_meta($postid, 'dt_sidebar_position', true);
		
		$sidebar_class = '';
		
		if($dt_sidebar_pos == 'sidebar-right')
			$sidebar_class = 'sidebar-right';
		else if($dt_sidebar_pos == 'sidebar-left')
			$sidebar_class = 'sidebar-left';
		else if($dt_sidebar_pos == 'no-sidebar')
			$sidebar_class = 'no-sidebar';
		echo $sidebar_class;	
	}
}


//return icon for each blog post format
if(!function_exists('dt_blog_icon')) { 
	function dt_blog_icon($postid) {
		$format = get_post_format( $postid );
		$result = '';
		switch ($format) {
			case '0':
				$result = '<i class="fa fa-pencil"></i>';
				break;
			case 'gallery':
				$result = '<i class="fa fa-camera-retro"></i>';
				break;
			case 'link':
				$result = '<i class="fa fa-link"></i>';
				break;
			case 'quote':
				$result = '<i class="fa fa-quote-left"></i>';
				break;		
			case 'audio':
				$result = '<i class="fa fa-music"></i>';
				break;	
			case 'video':
				$result = '<i class="fa fa-video-camera"></i>';
				break;										
		}
		return $result;
	}
}


//wrap "Read more" button 
if(!function_exists('delicious_wrap_readmore')) { 
	function delicious_wrap_readmore($more_link)
	{
		return '<div class="post-readmore">'.$more_link.'</div>';
	}
	add_filter('the_content_more_link', 'delicious_wrap_readmore', 10, 1);
}

// make "Read more" button to start from top
function dt_remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'dt_remove_more_jump_link');


//return post categories
if(!function_exists('dt_categories')) { 
	function dt_categories($postid) {
		// RETRIEVE POST CATEGORIES
		$categories = get_the_category();
		$separator = ', ';
		$output = '';
		$cats = '';
		if($categories){
			foreach($categories as $category) {
				$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" , 'delicious'), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		$cats .= trim($output, $separator);
		$cats .= ' / ';
		}
		
		return $cats;
	}
}

// custom styles for the rev slider admin page
if(!function_exists('delicious_load_custom_wp_admin_style')) { 
	function delicious_load_custom_wp_admin_style() {
		global $pagenow;
		if($pagenow == 'admin.php')
			wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/revslider.css', false, '1.0.0' );
			wp_enqueue_style( 'custom_wp_admin_css' );
		
	}
	add_action( 'admin_enqueue_scripts', 'delicious_load_custom_wp_admin_style' );
}


/**
 * Modifies WordPress's built-in comments_popup_link() function to return a string instead of echo comment results
 */
function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments', 'delicious' );
    if ( false === $one ) $one = __( '1 Comment', 'delicious' );
    if ( false === $more ) $more = __( '% Comments', 'delicious' );
    if ( false === $none ) $none = __( 'Comments Off', 'delicious' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = __('Enter your password to view comments.', 'delicious');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s', 'delicious'), $title ) ) . '">';
    $str .= get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
 
/**
 * Modifies WordPress's built-in comments_number() function to return string instead of echo
 */
function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments', 'delicious') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __('No Comments', 'delicious') : $zero;
    else // must be one
        $output = ( false === $one ) ? __('1 Comment', 'delicious') : $one;
 
    return apply_filters('comments_number', $output, $number);
}


//require and recommend plugins
add_action( 'tgmpa_register', 'delicious_register_required_plugins' ); 

function delicious_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
				'name'                  => 'WPBakery Visual Composer', // The plugin name
				'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
				'version'				=> '4.7',
				'source'                => get_template_directory_uri() . '/framework/plugins/visual-composer/js_composer.zip', // The plugin source
				'required'              => true, // If false, the plugin is only 'recommended' instead of required
				'external_url'       => ''
			),	
		
		array(
				'name'                  => 'Sidebar Generator', // The plugin name
				'slug'                  => 'sidebar-generator', // The plugin slug (typically the folder name)
				'version'				=> '2.0',
				'source'                => get_template_directory_uri() . '/framework/plugins/sidebar-generator/sidebar-generator.zip', // The plugin source
				'required'              => false, // If false, the plugin is only 'recommended' instead of required
			),			

		array(
				'name'                  => 'Revolution Slider', // The plugin name
				'slug'                  => 'revslider', // The plugin slug (typically the folder name)
				'version'				=> '5.0.7',
				'source'                => get_template_directory_uri() . '/framework/plugins/revolution-slider/revslider.zip', // The plugin source
				'required'              => false, // If false, the plugin is only 'recommended' instead of required
			),	
			
		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'version'	=> '',
			'required' 	=> false,
		),		
		array(
				'name'                  => 'Envato WordPress Toolkit', // The plugin name
				'version'				=> '1.7.3',
				'slug'                  => 'envato-wordpress-toolkit', // The plugin slug (typically the folder name)
				'source'                => get_template_directory_uri() . '/framework/plugins/envato-wordpress-toolkit/envato-wordpress-toolkit.zip', // The plugin source
				'required'              => false, // If false, the plugin is only 'recommended' instead of required
			),				

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}


//set excerpt length
if(!function_exists('delicious_custom_excerpt_length')) { 
	function delicious_custom_excerpt_length( $length ) {
		return 25;
	}
	add_filter( 'excerpt_length', 'delicious_custom_excerpt_length', 999 );

}	


//add excerpt link
if(!function_exists('delicious_new_excerpt_more')) { 
	function delicious_new_excerpt_more($more) {
		   global $post;
		return '...<p class="readmore"><a class="more-btn" href="'. get_permalink($post->ID) . '">'.__('Read More', 'delicious').'</a></p>';
	}
	add_filter('excerpt_more', 'delicious_new_excerpt_more');
}

// disable plugin notifications

add_action( 'init', 'dt_disable_revslider' );
function dt_disable_revslider() {
	if(function_exists('set_revslider_as_theme')) { 
		set_revslider_as_theme();
	}
}

add_action( 'vc_before_init', 'dt_disable_vc' );
function dt_disable_vc() {
	if(function_exists('vc_set_as_theme')) { 
    	vc_set_as_theme($disable_updater = true);
    }
}


// Localization Support
$lang = get_template_directory() . '/lang';

load_theme_textdomain('delicious', $lang);


// If theme is activated for the first time
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}
?>