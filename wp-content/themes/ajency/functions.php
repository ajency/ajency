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
      <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/favicon.png">
      <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Hiring Sidebar', 'ajency' ),
  'id'            => 'ajency-hiring',
  'description'   => 'Sidebar for the Hiring Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency GEC Sidebar', 'ajency' ),
  'id'            => 'ajency-gec-sidebar',
  'description'   => 'Sidebar for the GEC Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );


/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency company Sidebar', 'ajency' ),
  'id'            => 'ajency-company-sites',
  'description'   => 'Sidebar for the company Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency eCommerce Sidebar', 'ajency' ),
  'id'            => 'ajency-ecommerce-sites',
  'description'   => 'Sidebar for the eCommerce Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Walnut Sidebar', 'ajency' ),
  'id'            => 'ajency-walnut',
  'description'   => 'Sidebar for the walnut Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Real Estate Sidebar', 'ajency' ),
  'id'            => 'ajency-realestate-sites',
  'description'   => 'Sidebar for the Real Estate Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Content Sites Sidebar', 'ajency' ),
  'id'            => 'ajency-content-sites',
  'description'   => 'Sidebar for the Content Sites Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency listr Sidebar', 'ajency' ),
  'id'            => 'ajency-listr',
  'description'   => 'Sidebar for the Listr Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Weddingz.in Consumer App Sidebar', 'ajency' ),
  'id'            => 'ajency-consumer-app',
  'description'   => 'Sidebar for the Hiring Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Seedeisplatform Sidebar', 'ajency' ),
  'id'            => 'ajency-seedeisplatform-app',
  'description'   => 'Sidebar for the Seedeisplatform Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Design Sidebar', 'ajency' ),
  'id'            => 'ajency-design-app',
  'description'   => 'Sidebar for the Design Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );
/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Shortfilm App Sidebar', 'ajency' ),
  'id'            => 'ajency-shortfilm-app',
  'description'   => 'Sidebar for the Shortfilm app Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency mylan Sidebar', 'ajency' ),
  'id'            => 'ajency-mylan-app',
  'description'   => 'Sidebar for the mylan app Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Weddingz website Sidebar', 'ajency' ),
  'id'            => 'ajency-weddingz-website',
  'description'   => 'Sidebar for the Weddingz website Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Partnerapp Sidebar', 'ajency' ),
  'id'            => 'ajency-partnerapp',
  'description'   => 'Sidebar for the partnerapp Casestudy Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );


/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency commonfloor Sidebar', 'ajency' ),
  'id'            => 'ajency-commonfloor',
  'description'   => 'Sidebar for the commonfloor Casestudy Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Impruw Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Impruw Sidebar', 'ajency' ),
  'id'            => 'ajency-impruw',
  'description'   => 'Sidebar for the impruw Casestudy Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );


/**** Add Our Shortfilm Window ****/
$args = array(
  'name'          => __( 'Ajency Shortfilm Sidebar', 'ajency' ),
  'id'            => 'ajency-shortfilms',
  'description'   => 'Sidebar for the shortfilm Casestudy Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );


/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Shopoye Sidebar', 'ajency' ),
  'id'            => 'ajency-shopoye',
  'description'   => 'Sidebar for the Shopoye Casestudy Page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Stayconnect Sidebar', 'ajency' ),
  'id'            => 'ajency-stayconnect',
  'description'   => 'Sidebar for the Stay Connected',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Overhear Sidebar', 'ajency' ),
  'id'            => 'ajency-overhear',
  'description'   => 'Sidebar for the Overhear Case Study page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Xooma Sidebar', 'ajency' ),
  'id'            => 'ajency-xooma',
  'description'   => 'Sidebar for the Xooma Case Study page',
        'class'         => '',
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' );

register_sidebar( $args );

/**** Add Our Custom Sidebar ****/
$args = array(
  'name'          => __( 'Ajency Why us Sidebar', 'ajency' ),
  'id'            => 'ajency-whyus-sidebar',
  'description'   => 'Sidebar for the Why us page',
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
 include_once(STYLESHEETPATH.'/plugins/ajency-stayconnect.php');
 include_once(STYLESHEETPATH.'/plugins/ajency-footer.php');
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
add_filter( 'widget_display_callback', 'wpse8170_widget_display_callback', 10, 3 );
function wpse8170_widget_display_callback( $instance, $widget, $args ) {
    $instance['filter'] = false;
    return $instance;
}