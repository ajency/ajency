<?php
global $avia_config;
if(isset($avia_config['use_child_theme_functions_only'])) return;

##################################################################
# AVIA FRAMEWORK by Ajency

# this include calls a file that automatically includes all 
# the files within the folder framework and therefore makes 
# all functions and classes available for later use
						
require_once( 'framework/avia_framework.php' );

##################################################################


//register additional image thumbnail sizes that should be generated when user uploads an image:
global $avia_config;

$avia_config['imgSize']['widget'] 			 	= array('width'=>36,  'height'=>36 );						// small preview pics eg sidebar news
$avia_config['imgSize']['post-format-image'] 	= array('width'=>630, 'height'=>999, 'crop'=>false);		// big images for post format image and gallery posts
$avia_config['imgSize']['fullsize'] 		 	= array('width'=>930, 'height'=>930, 'crop'=>false);		// big images for lightbox and portfolio single entries
$avia_config['imgSize']['featured'] 		 	= array('width'=>930, 'height'=>340);						// images for fullsize pages and fullsize slider
$avia_config['imgSize']['portfolio'] 		 	= array('width'=>465, 'height'=>346);						// images for portfolio entries (2,3,4 column)
$avia_config['imgSize']['logo'] 		 		= array('width'=>465, 'height'=>220);						// images for dynamic logo/partner element

//dynamic columns
$avia_config['imgSize']['dynamic_1'] 		 	= array('width'=>446, 'height'=>151);						// images for 2/4 (aka 1/2) dynamic portfolio columns when using 3 columns
$avia_config['imgSize']['dynamic_2'] 		 	= array('width'=>609, 'height'=>210);						// images for 2/3 dynamic portfolio columns
$avia_config['imgSize']['dynamic_3'] 		 	= array('width'=>688, 'height'=>151);						// images for 3/4 dynamic portfolio columns



avia_backend_add_thumbnail_size($avia_config);






##################################################################
# Frontend Stuff necessary for the theme:
##################################################################


$lang = TEMPLATEPATH . '/lang';
load_theme_textdomain('avia_framework', $lang);


/* Register frontend javascripts: */
if(!is_admin()){
	add_action('init', 'avia_frontend_js');
}


if(!function_exists('avia_frontend_js'))
{
	function avia_frontend_js()
	{
		wp_register_script( 'avia-default', AVIA_BASE_URL.'js/avia.js', array('jquery','avia-html5-video'), 2, false );
		wp_register_script( 'avia-prettyPhoto',  AVIA_BASE_URL.'js/prettyPhoto/js/jquery.prettyPhoto.js', 'jquery', "3.0.1", true);
		wp_register_script( 'avia-html5-video',  AVIA_BASE_URL.'js/projekktor/projekktor.min.js', 'jquery', "1", true);
		wp_register_script( 'aviapoly-slider',  AVIA_BASE_URL.'js/aviapoly.js', 'jquery', "1.1.0", true);
		wp_register_script( 'aviapoly-idTabs',  AVIA_BASE_URL.'js/jquery.idTabs.min.js', 'jquery', "1.1.0", true);
	}
}


/* Activate native wordpress navigation menu and register a menu location */
add_theme_support('nav_menus');
$avia_config['nav_menus'] = array('avia' => 'Main Menu');
foreach($avia_config['nav_menus'] as $key => $value){ register_nav_menu($key, THEMENAME.' '.$value); }


//adds the plugin initalization scripts that add styles and functions
require_once( 'config-bbpress/config.php' );		//bbpress forum plugin

//load some frontend functions in folder include:

require_once( 'includes/admin/register-portfolio.php' );		// register custom post types for portfolio entries
require_once( 'includes/admin/register-widget-area.php' );		// register sidebar widgets for the sidebar and footer
require_once( 'css/dynamic-css.php' );							// register the styles for dynamic frontend styling
require_once( 'includes/admin/register-shortcodes.php' );		// register wordpress shortcodes
require_once( 'includes/loop-comments.php' );					// necessary to display the comments properly
require_once( 'includes/helper-slideshow.php' ); 				// holds the class that generates the 2d & 3d slideshows, as well as feature images
require_once( 'includes/helper-templates.php' ); 				// holds some helper functions necessary for dynamic templates
require_once( 'includes/admin/compat.php' );					// compatibility functions for 3rd party plugins
require_once( 'includes/admin/register-plugins.php');			// register the plugins we need







//activate framework widgets
register_widget( 'avia_tweetbox');
register_widget( 'avia_newsbox' );
register_widget( 'avia_portfoliobox' );
register_widget( 'avia_socialcount' );
register_widget( 'avia_combo_widget' );
register_widget( 'avia_partner_widget' );




//add post format options
add_theme_support( 'post-formats', array('link', 'quote', 'gallery' ) );  






######################################################################
# CUSTOM THEME FUNCTIONS
######################################################################


//call functions for the theme
add_filter('the_content_more_link', 'avia_remove_more_jump_link');
add_post_type_support('page', 'excerpt');


//allow mp4, webm and ogv file uploads
add_filter('upload_mimes','avia_upload_mimes');
if(!function_exists('avia_upload_mimes'))
{
	function avia_upload_mimes($mimes){ return array_merge($mimes, array ('mp4' => 'video/mp4', 'ogv' => 'video/ogg', 'webm' => 'video/webm')); }
}

add_filter('avia_ampersand','avia_ampersand');
if(!function_exists('avia_ampersand'))
{
	function avia_ampersand($content){ 
	$content = str_replace(" &amp; "," <span class='special_amp'>&amp;</span> ",$content);
	$content = str_replace(" &#038; "," <span class='special_amp'>&amp;</span> ",$content);
	return $content; }
}
//change default thumbnail size on theme activation
add_action('avia_backend_theme_activation', 'avia_set_thumb_size');
if(!function_exists('avia_set_thumb_size'))
{
	function avia_set_thumb_size() {update_option( 'thumbnail_size_h', 80 ); update_option( 'thumbnail_size_w', 80 );}
}

//remove post thumbnails from pages, posts and various custom post types
if(!function_exists('avia_remove_post_thumbnails'))
{
	add_theme_support( 'post-thumbnails' );
	
	add_action('posts_selection', 'avia_remove_post_thumbnails');
	add_action('init', 'avia_remove_post_thumbnails');
	add_filter('post_updated_messages','avia_remove_post_thumbnails');
	function avia_remove_post_thumbnails($msg) 
	{
		global $post_type;
		$remove_when = array('post','page','portfolio');

		if(is_admin())
		{
			foreach($remove_when as $remove)
			{
				if($post_type == $remove || (isset($_GET['post_type']) && $_GET['post_type'] == $remove)) { remove_theme_support( 'post-thumbnails' ); };
			}
		}
		
		return $msg;
	}
}







######################################################################
# /*advanced title + subtitle function*/
######################################################################
if(!function_exists('avia_title'))
{
	function avia_title($title = "", $subtitle = false, $meta = false, $extraClass = "")
	{
		if(is_object($title)) $title = $title->post_title;
		if(!$title) $title = get_the_title(avia_get_the_id());
		
		if(!$meta) $extraClass .= " no_padding_title";
		if($subtitle === false) $subtitle = avia_post_meta('subtitle');
		
		echo "<div class='$extraClass title_container extralight-border'>";
		echo '<h1 class="page-title heading-color">'.$title.'</h1>';
		if($subtitle) echo '<div class="page-subtitle meta-color">'.do_shortcode($subtitle).'</div>';
		//echo '<span class="extralight-border seperator-addon seperator-bottom"></span>';
		
		
		/*
		*	display the theme search form
		*   the tempalte file that is called is searchform.php in case you want to edit it
		*/
		if($meta !== false)
		{
			echo "<div class='title_meta'>";
			if($meta === true)
			{
				get_search_form(); 
			}
			else if(function_exists($meta))
			{
				$meta();
			}
			echo "</div>";
		}
		
		echo "</div>";
	}
}


######################################################################
# /*crates the hr separator with the colored flag by using divs without images. Therefore complete color customization from the backend is possible */
######################################################################
if(!function_exists('avia_advanced_hr'))
{
	function avia_advanced_hr($text = "", $class = "")
	{
		$output  = "";
		$output .= '<div class="hr hr_flag '.$class.'">';
		
		if($text !== false)
		{
			$output .= '		<div class="primary-background hr_color">';
			$output .= '    		<span class="flag-text on-primary-color">'.$text.'</span>';
			$output .= '    	</div>';
		}
		else
		{
			$output .= '    	<span class="primary-background seperator-addon"></span>';
		}
		
		$output .= '    	<span class="hr-seperator extralight-border"></span>';
		$output .= '</div>';
		
		return $output;
	}
}

######################################################################
# /*displays the portfolio meta information list*/
######################################################################

if(!function_exists('avia_portfolio_meta'))
{
	function avia_portfolio_meta($id = false)
	{
		if(!$id) $id = get_the_ID();
		if(!$id) return false;
		
		$output = "";
		$metas = avia_post_meta($id);
		$portfolio_keys = avia_get_option('portfolio-meta', array(array('meta'=>'Skills Needed'), array('meta'=>'Client'), array('meta'=>'Project URL')));
		
		
		$p_metas = array();
		foreach($metas as $key =>$meta)
		{
			if(strpos($key,'portfolio-meta-') !== false)
			{
				$newkey = str_replace("portfolio-meta-","",$key);
				$p_metas[$newkey-1] = $meta;
			}
		}
		
		$counter = 0;
		foreach($portfolio_keys as $key)
		{
			if(!empty($p_metas[$counter]))
			{
				//convert urls
				if(avia_portfolio_url($p_metas[$counter]))
				{
					$linktext = $p_metas[$counter];
					if(strlen($linktext) > 50) $linktext = __('Link','avia_framework');
					$p_metas[$counter] = "<a href='".$p_metas[$counter]."'>".$linktext."</a>";
				}
				
				$output .= "<li><strong class='portfolio-meta-key'>".$key['meta'].":</strong> <div class='portfolio-meta-value'>".$p_metas[$counter]."</div></li>";
			}
			$counter++;
		}
		
		if($output) $output = "<ul class='portfolio-meta-list'>".$output."</ul>";
		return $output;
	}
}

if(!function_exists('avia_portfolio_url'))
{
	function avia_portfolio_url($url)
	{
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
}





######################################################################
# /*creates the notification banner at the top of your website*/
######################################################################
if(!function_exists('avia_banner'))
{
	function avia_banner($padding = 0)
	{
		$extraClass = "minimized";
		$output = "";
		$cookieHash = "";
		$bannerText = avia_get_option('banner');
		$cookieName = THEMENAME.'_avia_banner';
		$bannerHash = md5($bannerText);
		$padding = $padding * 43;
		
		if(!trim($bannerText)) return;
		
		if( empty($_COOKIE[$cookieName])) $extraClass = "minimized firstcall";
		if(!empty($_COOKIE[$cookieName])) $cookieHash = $_COOKIE[$cookieName];
		if(!empty($_COOKIE[$cookieName]) && $bannerHash != $cookieHash) $extraClass = "maximized";
		
		$output .= "<div class='$extraClass info_text_header' id='info_text_header' data-hash='$bannerHash' data-cookiename='$cookieName'><div style='padding-right:".$padding."px;' class='infotext_wrap'>";
		$output .= "<div class='infotext'>$bannerText <a class='close_info_text rounded' href='#close'>".__('close','avia_framework')."</a></div>";
		
		$output .= "</div></div>";
		echo $output;
	}
}




######################################################################
# set post excerpt to be visible on theme acivation in user backend
######################################################################
add_action('avia_backend_theme_activation', 'avia_show_menu_description');
if(!function_exists('avia_show_menu_description'))
{
	function avia_show_menu_description()
	{
		global $current_user;
	    get_currentuserinfo();
		$old_meta_data = $meta_data = get_user_meta($current_user->ID, 'metaboxhidden_page', true);
		
		if(is_array($meta_data) && isset($meta_data[0]))
		{
			$key = array_search('postexcerpt', $meta_data);
			
			if($key !== false)
			{	
				unset($meta_data[$key]);
				update_user_meta( $current_user->ID, 'metaboxhidden_page', $meta_data, $old_meta_data );
			}
		}	
		else
		{
				update_user_meta( $current_user->ID, 'metaboxhidden_page', array('postcustom', 'commentstatusdiv', 'commentsdiv', 'slugdiv', 'authordiv', 'revisionsdiv') );
		}
	}
}


######################################################################
# import the dynamic frontpage template on theme installation
######################################################################
add_action('avia_backend_theme_activation', 'avia_default_dynamics');
add_action('avia_ajax_reset_options_page',  'avia_default_dynamics');
if(!function_exists('avia_default_dynamics'))
{
	function avia_default_dynamics() 
	{
		global $avia;
		$firstInstall = get_option($avia->option_prefix.'_dynamic_elements');
		
		if(empty($firstInstall))
		{
			$custom_export = "dynamic_elements";
			require_once AVIA_PHP . 'inc-avia-importer.php';
		}
	}
}

function the_crumbs() {
	if (!is_home()) {
		echo 'You are here: <a href="';
		echo get_option('home');
		echo '">';
		echo 'Home'; // Home Link Text, change this to meet your needs
		echo "</a> /";
		if (is_category() || is_single()) {
			the_category(', ','&title_li=');
			if (is_single()) {
				echo " /";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
}}}

add_action('thesis_hook_before_content','show_crumbs');

/*wordpress 3.4 changed 404 check -  this is the mod for the avia framework to operate*/
function avia_disable_404( $query = false ) {

	global $avia_config, $wp_query;

	if(!isset($avia_config['first_query_run']) && is_front_page() && is_paged())
	{
		$wp_query->is_paged = false;
		$avia_config['first_query_run'] = true;
		add_action( 'wp', 'avia_enable_404' );
	}
}

function avia_enable_404() {

	global $wp_query;
	$wp_query->is_paged = true;

}

add_action( 'pre_get_posts', 'avia_disable_404' ,1 ,10000);

// deactivate default theme seo if third party plugin is used. Currently supported plugins: Yoast WP SEO and All in One SEO
if(defined('WPSEO_VERSION') || class_exists('All_in_One_SEO_Pack')) $avia_config['deactivate_seo'] = true;


function excerpt($num) {
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)."...";
	
	return $excerpt;
}

function archive_redirect(){

	if( is_tax( 'portfolio_entries' ))
	{
		$term_slug = get_query_var( 'term' );
		$redirect_link = home_url('/work/');
		$redirect_link = add_query_arg('lcat',$term_slug ,$redirect_link);
		wp_safe_redirect($redirect_link);
		exit;
	}
}
add_action('template_redirect','archive_redirect');
function page_bodyclass() {  // add class to <body> tag
	global $wp_query;
	$page = '';
	if (is_front_page() ) {
    	   $page = 'home';
	} elseif (is_page()) {
   	   $page = $wp_query->query_vars["pagename"];
	}
	if ($page)
		echo ''. $page. '';
}
