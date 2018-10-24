<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

/**** Add to Head ****/
function ajency_theme_head_script() {
  ?>
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <link rel="shortcut icon" href="favicon.ico">
      <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/ajency-lib.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/transition/MetroJs.css" />
		      <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/large-big-deskstop.css" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=168413963274202";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
  <?php
}
add_action( 'wp_head', 'ajency_theme_head_script' );

/**** Add to Footer ****/
function ajency_theme_foot_script() {
  ?>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/js/jquery-1.7.1.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/library/js/jquery.easing.1.3.js"></script>
      <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/library/js/combine.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/js/alljsfile.js"></script>
  <?php
}
add_action( 'wp_footer', 'ajency_theme_foot_script' );

/**
 * Adds classes to the array of body classes.
 *
 * @uses body_class() filter
 */
function ajency_body_classes( $classes ) {
  
  $classes[] = 'tablet-spacing'; 
  
  return $classes;
}
add_filter( 'body_class', 'ajency_body_classes' );

/**** Dequeue 320Press Styles and Scripts ****/
function remove_scripts() {
  wp_dequeue_script( 'bootstrap' );
  wp_dequeue_script( 'wpbs-scripts' );
}
add_action('wp_print_scripts', 'remove_scripts');

function remove_styles() {
  wp_dequeue_style( 'bootstrap' );
  //wp_dequeue_style( 'wpbs-style' );
}
add_action('wp_print_styles', 'remove_styles');

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Sidebar', 'ajency' ),
  'id'            => 'ajency-sidebar',
  'description'   => 'Sidebar for the Ajency Site',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

// Run this code on 'after_theme_setup', when plugins have already been loaded.
add_action('after_setup_theme', 'load_plugins');

// This function loads the plugins.
function load_plugins() {
  include_once(STYLESHEETPATH.'/plugins/ajency-textwidget.php');
  include_once(STYLESHEETPATH.'/plugins/ajency-teamwidget.php');
include_once(STYLESHEETPATH.'/plugins/ajency-blogwidget.php');    
}

/**** Remove Default Menu Item Classes ****/
//this will be run for each menu item
add_filter('nav_menu_css_class', 'cssattr_filter', 100, 1);

function cssattr_filter($var) {
  if(!is_array($var)) return;

  $current_indicators = array('current-menu-item', 'current-menu-parent', 'current_page_item', 'current_page_parent');
  
  $newArr = array();
  foreach($var as $el){
    //check if it contains an ID or it's indicating the current page
    if ((preg_match('#[0-9]#',$el))||in_array($el, $current_indicators)){ 
      array_push($newArr, $el);
    }
  }
  
  return $newArr;
}