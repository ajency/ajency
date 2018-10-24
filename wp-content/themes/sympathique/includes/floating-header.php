<?php global $smof_data; ?>	
	
	<?php if (!is_page_template('template-blank.php')) { ?>	
		<header id="floatmenu">
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
	<?php } ?>