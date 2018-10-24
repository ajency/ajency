<?php global $smof_data; //get theme options ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
		
		<!-- mobile meta tag -->		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		
		<!-- Custom Favicon -->
		<?php if(!empty($smof_data['custom_favicon'])) { ?><link rel="icon" type="image/png" href="<?php echo esc_url($smof_data['custom_favicon']); ?>" /><?php } ?>			
				
		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_enqueue_script('jquery'); ?>

		<?php wp_head(); ?>			

	</head>
	
<body <?php body_class(); ?>>

<?php
//use custom background image instead of color in theme options panel

	if(!is_404()) {
		$page_img = get_post_meta($post->ID,'dt_page_img',true);
		$bg_full = get_post_meta($post->ID,'dt_bg_full',false);
	}
	

		if(!empty($bg_full['url'])) {
	?>
		<img id="bg" src="<?php echo $page_img['url']; ?>" alt="" />
	<?php } 
	
	else if(!empty($smof_data['custom_background'])) { ?>	
		<img id="bg" src="<?php echo esc_url($smof_data['custom_background']); ?>" alt="" />
	<?php } ?>

	
	<div id="wrapper">

		<a class="scrollup"><i class="fa fa-angle-up"></i></a>
		
	<?php if (is_page_template('template-onepage.php')) { ?>

		<header id="header">
			<div class="centered-wrapper">
				<div class="one-third">
					<?php if($smof_data['custom_logo'] !='') { ?>
						<div class="logo"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo esc_url($smof_data['custom_logo']); ?>" alt="<?php bloginfo( 'name' ) ?>" /></a></div>
					<?php } 
					
					else { ?>			
				
						<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ) ?>" /></a></div>
					<?php } ?>				
					
				</div><!--end one-third-->
				
				<div class="two-third column-last">	
					<div id="onepage-nav">
						<nav id="navigation">
						
						<?php 	
							$nav_menu = get_post_meta($post->ID, 'dt_menu_select', true); 
							wp_nav_menu( array(
								'menu' 		=> $nav_menu, 
								'menu_id'	=> 'mainnav'
								)
							); 
						?>
						</nav><!--end navigation-->
					</div>
				</div><!--end two-third-->
			<div class="clear"></div>			
			</div><!--end centered-wrapper-->

			<div class="top-shadow"></div>		
		</header>	
	
	<?php } else {
		
	if (!is_page_template('template-blank.php')) {	?>
		
	<?php  if($smof_data['top-header'] =='1') { ?>
		<div id="top-header">
			<div class="centered-wrapper">
				<div class="percent-one-half">
					<?php if($smof_data['left_area_menu'] =='menu') { ?>
							<nav id="subnavigation">
								<?php wp_nav_menu( array(
									'theme_location' => 'top_header_menu',
									'menu' => 'Top Header Menu',
									'menu_id' => 'subnav',
									'before' => '/ ',
									'sort_column' => 'menu_order',
									'fallback_cb' => ''
								)); ?>
							</nav> <?php
						}
						else if($smof_data['left_area_menu'] =='text') { 
							echo wp_kses_post($smof_data['left_area_option_2']); 
						} ?>
				</div>
				
				<div class="percent-one-half column-last">
									
					<ul class="social">
						<?php
							$social_links = array('rss','facebook','twitter','flickr','google-plus', 'dribbble' , 'linkedin', 'pinterest', 'youtube', 'github-alt', 'vimeo-square', 'instagram', 'tumblr', 'xing', 'vk', 'foursquare', 'wechat', 'behance', 'soundcloud', 'codepen', 'slideshare');
							if($social_links) {
								foreach($social_links as $social_link) {
									if(!empty($smof_data[$social_link])) { echo '<li><a href="'. esc_url($smof_data[$social_link]) .'" title="'. $social_link .'" class="'.$social_link.'"  target="_blank"><i class="fa fa-'.$social_link.'"></i></a></li>';
									}							
								}
								if(!empty($smof_data['skype'])) { echo '<li><a href="skype:'. $smof_data['skype'] .'?chat" title="'. $smof_data['skype'] .'" class="skype" target="_blank"><i class="fa fa-skype"></i></a></li>';
								}									
						}
						?>					
					</ul>	
					
					<?php if (function_exists('delicious_language_selector')) { ?>
					<div class="flags_language_selector"><?php delicious_language_selector(); ?></div>
					<?php } ?>
					
				</div><!--end one-half-->		
			</div>
		</div>
	<?php } ?>
		<header id="header">
			<div class="centered-wrapper">
				<div class="one-fourth">
					<?php if($smof_data['custom_logo'] !='') { ?>
						<div class="logo"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo $smof_data['custom_logo']; ?>" alt="<?php bloginfo( 'name' ) ?>" /></a></div>
					<?php } 
					
					else { ?>			
				
						<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ) ?>" /></a></div>
					<?php } ?>				
					
				</div><!--end one-fourth-->
				
				<div class="three-fourth column-last">		
				
				<?php if($smof_data['search-header'] === '1') { ?>
					<div class="searchform-switch">
                                         
						<i class="fa fa-search"></i>

						<i class="fa fa-times-circle"></i>
					</div>
					
					<form class="header-search-form display-none" method="get" action="<?php echo home_url(); ?>/">
						<input class="header-search-input" type="text" placeholder="<?php echo __("Search...", "delicious"); ?>" id="s" name="s" value="<?php the_search_query(); ?>">
						<button type="submit">
							<i class="fa fa-search"></i>  
                                               

							
						</button>
					</form>		
				<?php } ?>
				
					<nav id="navigation">
						<?php wp_nav_menu( array(
							'theme_location' => 'top_menu',
							'menu_id' => 'mainnav',
							'sort_column' => 'menu_order',
							'fallback_cb' => ''
						)); ?>
					</nav><!--end navigation-->
				
					
				</div><!--end three-fourth-->
				<div class="clear"></div>
			</div><!--end centered-wrapper-->
		</header>			
		<?php 		
		} 
	}
	
	if($smof_data['floating_header'] === '1') {
		get_template_part( 'includes/floating', 'header' );
	}
	?>