<?php 
$style = avia_get_option('boxed','stretched'); 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo avia_get_browser('class', true); echo " html_$style";?> ">
<head>
<?php if(!is_page(547)) { ?> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<?php } ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php 
	global $avia_config;

	/*
	 * outputs a rel=follow or nofollow tag to circumvent google duplicate content for archives
	 * located in framework/php/function-set-avia-frontend.php
	 */
	 if (function_exists('avia_set_follow')) { echo avia_set_follow(); }
	 
	 
	 /*
	 * outputs a favicon if defined
	 */
	 if (function_exists('avia_favicon'))    { echo avia_favicon(avia_get_option('favicon')); }
	 
?>


<!-- page title, displayed in your browser bar -->
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="icon" type="image/png"  href="<?php echo get_bloginfo('template_url'); ?>/images/favicon.png">

<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<!-- add feeds, pingback and stuff-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> RSS2 Feed" href="<?php avia_option('feedburner',get_bloginfo('rss2_url')); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- mobile setting -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- plugin and theme output with wp_head() -->
<meta name="robots" content="index, follow">

<?php
##################################################################
# Styles
##################################################################
?>
	<!-- add css stylesheets -->	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<?php if ( wpmd_is_phone() ) {
	//load only if on a phone
	?>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/main-mobile.css" type="text/css" media="screen"/>
	<?php } ?>
		
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/grid.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/base.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/layout.css?v=1" type="text/css" media="screen"/>
	<?php
	if ( wpmd_is_notphone() ) {
		//load only if on a desktop/tablet
		?>
		<!-- add css stylesheets -->
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/main.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/slideshow.css?v=1" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/shortcodes.css" type="text/css" media="screen"/>

		<link href='http://fonts.googleapis.com/css?family=Shanti|Quattrocento' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Magra' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/js/projekktor/theme/style.css" type="text/css" media="screen"/>
		<!-- LOAD the HoverAlls CSS -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_bloginfo('template_url'); ?>/css/hoveralls.css"/>
		<!-- LOAD Demo CSS -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_bloginfo('template_url'); ?>/css/demostyle.css"/>
				
		<?php
	}
	
	if ( wpmd_is_notdevice() ) {
	//load only if on a desktop
	?>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/custom.css" type="text/css" media="screen"/>
		<!--[if IE 8]>
		<style tye="text/css">
		body .whiteBG{padding-right:42px !important;}
		.whiteBG li {
		float: left !important;
		margin: 0 20px 0 0!important;
		overflow: hidden !important;
		width: 475px!important;
		}
		.whiteBG a.header {
		color: #ffffff !important;
		}
		.whiteBG a.details{
		color: #ffffff !important;
		font-weight:bold;
		}
		.whiteBG p {
		color: #fff;
		line-height: 19px;
		font-size: 16px;
		margin-left: 33px;
		}
		.whiteBG {
		background: none repeat scroll 0 0 #F59E34;
		min-height: 165px;
		padding-top:40px !important;
		padding-left:50px !important;
		padding-right:10px !important;
		}
		body#home #socket .container {
		margin-top:0px !important;
		}
		.description h2 {
		background: url("http://www.lokusdesign.com/wp-content/themes/lokus/images/spriteHeaders.png") repeat scroll  !important;
		background-position: -236px 0;
		width: 240px!important;
		height: 252px!important;
		float:left;
		}
		.description div {
		background: none repeat scroll 0 0 #AAABAF !important;
		color: white !important;
		height: 212px !important;
		padding: 40px 8px 0 20px!important;
		width: 510px !important;
		margin-left:200px;
		}
		.descLinks{
		margin: 0px 0 35px;
		}
		 .descLinks{
		overflow: hidden;
		padding: 0px 0px 0 !important;
		position: relative;
		}
		.description {
		float: left;
		overflow: hidden;
		}
		.links {
		float: right;
		margin: 0px 0px 0 0;
		width: 280px;
		border-right: 5px solid #AAABAF;
		padding-right: 27px;
		}
		.links a h4 {
		font-weight: normal;
		color: #B8B6B6;
		font-size: 16px;
		letter-spacing: -1px;
		margin: 1px 0 0;
		}
		.links a h3{
		color: #9C9C9C;
		font-size: 18px;
		letter-spacing: -1px;
		margin:2px 0 0;
		font-family: arial;
		font-weight: 800;
		font-family: arial bold !important;
		}
		.links a {
		display: block;
		height: 46px;
		border-bottom: solid 1px #DDD;
		position: relative;
		letter-spacing: -1px;
		background: url(http://www.lokusdesign.com/wp-content/themes/lokus/images/spriteSubNavIcons.png) no-repeat right -310px;
		}
		.links a:hover{color:#F36B24!important; }
		.links a:hover{
		border-bottom: solid 1px #F36B24;display: block;
		background: url(http://www.lokusdesign.com/wp-content/themes/lokus/images/spriteSubNavIcons.png) no-repeat ;
		background-position: right -410px;
		}
		.links a h3:hover, .links a h4:hover{color:#F36B24; display: block;}
		.description div a{
		color: #ffffff;
		font-size: 14px;
		}
		.description div a:hover {
		color: #F36B24;
		font-size: 14px;
		}
		.description div ul {
		list-style: disc outside !important;
		}
		.tab_container ul li a {
		color: #7E7E7E;
		text-transform: none !important;
		font-size: 14px;
		}


		</style>
		<![endif]-->

		<!--[if IE 7]>
			<style tye="text/css">
		body .whiteBG{padding-right:42px !important;}
		.whiteBG li {
		float: left !important;
		margin: 0 20px 0 0!important;
		overflow: hidden !important;
		width: 475px!important;
		}
		.whiteBG a.header {
		color: #ffffff !important;
		}
		.whiteBG a.details{
		color: #ffffff !important;
		font-weight:bold;
		}
		.whiteBG p {
		color: #fff;
		line-height: 19px;
		font-size: 16px;
		margin-left: 33px;
		}
		.whiteBG {
		background: none repeat scroll 0 0 #F59E34;
		min-height: 165px;
		padding-top:40px !important;
		padding-left:50px !important;
		padding-right:10px !important;
		}
		body#home #socket .container {
		margin-top:0px !important;
		}
		.description h2 {
		background: url("http://www.lokusdesign.com/wp-content/themes/lokus/images/spriteHeaders.png") repeat scroll  !important;
		background-position: -236px 0;
		width: 240px!important;
		height: 252px!important;
		float:left;
		}
		.description div {
		background: none repeat scroll 0 0 #AAABAF !important;
		color: white !important;
		height: 212px !important;
		padding: 40px 8px 0 20px!important;
		width: 510px !important;
		margin-left:200px;
		}
		.descLinks{
		margin: 0px 0 35px;
		}
		 .descLinks{
		overflow: hidden;
		padding: 0px 0px 0 !important;
		position: relative;
		}
		.description {
		float: left;
		overflow: hidden;
		}
		.links {
		float: right;
		margin: 0px 0px 0 0;
		width: 280px;
		border-right: 5px solid #AAABAF;
		padding-right: 27px;
		}
		.links a h4 {
		font-weight: normal;
		color: #B8B6B6;
		font-size: 16px;
		letter-spacing: -1px;
		margin: 1px 0 0;
		}
		.links a h3{
		color: #9C9C9C;
		font-size: 18px;
		letter-spacing: -1px;
		margin:2px 0 0;
		font-family: arial;
		font-weight: 800;
		font-family: arial bold !important;
		}
		.links a {
		display: block;
		height: 46px;
		border-bottom: solid 1px #DDD;
		position: relative;
		letter-spacing: -1px;
		background: url(http://www.lokusdesign.com/wp-content/themes/lokus/images/spriteSubNavIcons.png) no-repeat right -310px;
		}
		.links a:hover{color:#F36B24!important; }
		.links a:hover{
		border-bottom: solid 1px #F36B24;display: block;
		background: url(http://www.lokusdesign.com/wp-content/themes/lokus/images/spriteSubNavIcons.png) no-repeat ;
		background-position: right -410px;
		}
		.links a h3:hover, .links a h4:hover{color:#F36B24; display: block;}
		.description div a{
		color: #ffffff;
		font-size: 14px;
		}
		.description div a:hover {
		color: #F36B24;
		font-size: 14px;
		}
		.description div ul {
		list-style: disc outside !important;
		}
		.tab_container ul li a {
		color: #7E7E7E;
		text-transform: none !important;
		font-size: 14px;
		}


		.description div
		{
			padding-left:0 !important;
		}
		</style>
		<![endif]-->
	<?php } 
	if ( wpmd_is_tablet() ) {
	//load only if on a tablet
	?>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/tablet.css" type="text/css" media="screen"/>
		<?php
		if ( is_front_page() ) {
		?>
			<style type="text/css">
				.slideshow_container, .slideshow_container ul {
					height: auto !important;
				}
				.slideshow_container {
					margin: 0;
				}
			</style>
		<?php
		}
	} 
##################################################################
# Scripts
##################################################################

	/* add javascript */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'avia-default' );
	wp_enqueue_script( 'avia-prettyPhoto' );
	wp_enqueue_script( 'avia-html5-video' );
	wp_enqueue_script( 'aviapoly-slider' );
	wp_enqueue_script( 'aviapoly-idTabs' );

	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	 
	wp_head();
	?>
	
	<script type="text/javascript">
		function formDefault(theInput) {
			if (theInput.value =='') {
				theInput.value = theInput.defaultValue;
			}
		}
	</script>

	<script type="text/javascript" language="javascript">
		jQuery(document).ready(function(){
			jQuery(".slidingDiv").hide();
			jQuery(".show_hide").show();
			jQuery('.show_hide').click(function(){
				jQuery(".slidingDiv").slideToggle();
			});
		});
	</script>

	<script language="text/javascript">
		jQuery(function() {
			jQuery(".loadlink").click(function(event) {
				event.preventDefault();
				jQuery("#result").load(jQuery(this).attr("href"));
			});
		});
		
		jQuery(document).ready(function(){
			jQuery('ul.loadlink').find('a').each(function(){
				jQuery(this).addClass('TEST');
			});
		});
	</script>

	<!-- LOAD Easing -->
	<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.easing.1.3.min.js"></script>
	
	<?php if ( wpmd_is_notphone() ) { ?>
		<!-- LOAD HoverAlls -->
		<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.hoveralls.js"></script>
		<script type="text/javascript">
			jQuery(window).load(function ($) {
				jQuery('.tooltip').HoverAlls({tooltip:true,starts:"-100px,-20px",ends:"-4px,-14px",returns:"-100px,-20px",bg_class:"tooltip4background",speed_in:1000,speed_out:380,effect_in:"easeOutBack",effect_out:"easeInSine",bg_width:"400px",bg_height:"185px",html_mode:".tooltiphtml"});
			});
		</script>
	<?php } ?>
	
	<!--<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/ajaxtabs.js"></script>-->
	
	<?php if ( wpmd_is_device() ) { ?>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				//Sliding Menu
				jQuery('#menu-main').hide();
				jQuery('.drop-menu').click(function() {
					jQuery('#menu-main').slideToggle('fast');
				});
			});
		</script>
	<?php } ?>
	

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40264364-2', 'lokusdesign.com');
  ga('send', 'pageview');

</script>


</head>



<?php 
/*
 * prepare big slideshow if available
 * If we are displaying a dynamic template the slideshow might already be set
 * therefore we dont need to call it here
 */

if(!avia_special_dynamic_template())
{
	avia_template_set_page_layout();
	if(isset($post))
	{
		$slider = new avia_slideshow(avia_get_the_ID());
		$avia_config['slide_output'] =  $slider->display_big();
	}
}


?>


<body id="top home" <?php body_class($style); ?>>
<div id="uniqueID" >
</div>
<?php
/*if ( wpmd_is_notphone() ) {
	if ( is_home() ) {
		echo'<div class="banner-add">
	<div class="container-add">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore </p>
	</div>
	</div>';
	} else {

		// This is not a homepage
	}
}*/
?>

	<div id='wrap_all'>	
			<?php if( is_front_page() ) : ?>
			<!-- <div id="showcase">
				<ul>
			
					<li><a href="#" class="pstvLoader"><img src="http://www.lokus.ajency.in/wp-content/uploads/2012/06/big_smirnoff.jpg" width="1224" height="700" alt="Packaging Design"></a></li>
            
					<li><a href="#" class="pstvLoader"><img src="http://www.lokus.ajency.in/wp-content/uploads/2012/06/big_mahindra.jpg" width="1224" height="700" alt="Brand Communication"></a></li>
			
                </ul>
             </div>-->
			<?php endif;?>  
			<!-- ####### HEAD CONTAINER ####### -->
			
				<div id="head-wrap">		
				<div class='container_wrap <?php page_bodyclass(); ?>' id='header'>
						
						<div class='container'>
						
						<?php

						/*
						*	display the theme logo by checking if the default css defined logo was overwritten in the backend.
						*   the function is located at framework/php/function-set-avia-frontend-functions.php in case you need to edit the output
						*/
						echo avia_logo(AVIA_BASE_URL.'images/layout/logo.png');
						
						/*
						*	display the main navigation menu
						*   check if a description for submenu items was added and change the menu class accordingly
						*   modify the output in your wordpress admin backend at appearance->menus
						*/
						echo "<div class='main_menu' data-selectname='".__('Select a page','avia_framework')."'>";
						$args = array('theme_location'=>'avia', 'fallback_cb' => 'avia_fallback_menu', 'max_columns'=>4);
						wp_nav_menu($args); 
						if ( wpmd_is_device() ) {
							echo "<button class='drop-menu'><span>Menu</span></button>";
						}
						echo "</div>";
						
						?>
						
						</div><!-- end container-->
						
				
				</div><!-- end container_wrap-->
				</div>
			<!-- ####### END HEAD CONTAINER ####### -->
			
			<?php 
			//display slideshow big if one is available
			if ( wpmd_is_notphone() ) {
				if(!empty($avia_config['slide_output'])) echo "<div class='container_wrap' id='slideshow_big'><div class='container'>".$avia_config['slide_output']."</div></div>";
			}
			?>

			
