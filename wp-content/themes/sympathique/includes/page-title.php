					<?php
					global $smof_data;
					if(is_home()) { ?>
						<h1><?php _e("Blog", "delicious"); ?></h1>
					<?php }
					else
					if (is_page_template('template-portfolio.php')) {
						?>
						<div class="one-third">
							<h1><?php the_title(); ?></h1>
						</div>						
						
						<?php
						
						$categs = get_post_meta($post->ID,'dt_cats_field');
						
						$layout = get_post_meta($post->ID,'dt_portfolio_columns',true);
						$navig = get_post_meta($post->ID,'dt_portfolio_navigation',true);
						$nav_number = get_post_meta($post->ID,'dt_nav_number',true);						
						$i=0;
						$j=1;
						$count =0;
						$term_list ='';		
						$list = '';
						
						if(empty($categs)) {
							$termeni = get_terms('portfolio_cats');
							foreach ($termeni as $te) {
								$option = $te->name;
								$categs[$j] = $option;
								$j++;	
								
							}
						}

						foreach ($categs as $categ) {
							$i++;
				
							$to_replace = array(' ', '/', '&');
							$intermediate_replace = strtolower(str_replace($to_replace, '-', $categ));
							$str = preg_replace('/--+/', '-', $intermediate_replace);
							
							$cat_id = get_taxonomy_cat_ID($categ);
							if (function_exists('icl_t')) { 
								$term_list .= '<li><a href="#filter" data-option-value=".'. $cat_id .'">' . esc_html(icl_t('Portfolio Category', 'Term '.get_taxonomy_cat_ID( $categ ).'', $categ)) . '</a></li>';
							}
							else {
								$term_list .= '<li><a href="#filter" data-option-value=".'. $cat_id .'">' . esc_html($categ) . '</a></li>';
							}
							$list .= $categ . ', ';
							if ($count != $i)
							{
								$term_list .= '';
							}
							else 
							{
								$term_list .= '';
							}

						}
						
							if (($i > 1) && ($navig == 'filter')) { ?> 
								<div class="two-third column-last">
									<section id="options">
										<ul id="filters" class="option-set clearfix" data-option-key="filter">
											<li><a href="#filter" data-option-value="*" class="selected active"><?php _e('All', 'delicious'); ?></a></li>
										
										<?php  
										echo $term_list; ?>
										</ul>
									</section>
								</div>
								<?php
							}	

							
					}
					
					
					else if (is_archive()) { ?>
						<?php if (have_posts()) : ?>

							<?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
							<?php if (is_category()) { ?>
							<h1><?php _e('Category: ', 'delicious'); ?><strong><?php single_cat_title(); ?></strong></h1>

							<?php } elseif(is_tag()) { ?>
							<h1><?php _e('Tag: ', 'delicious'); ?><?php single_tag_title(); ?></h1>

							<?php } elseif (is_day()) { ?>
							<h1><?php _e('Archive: ', 'delicious'); ?><?php the_time(get_option('date_format')); ?></h1>

							<?php } elseif (is_month()) { ?>
							<h1><?php _e('Archive: ', 'delicious'); ?><?php the_time(get_option('date_format')); ?></h1>

							<?php } elseif (is_year()) { ?>
							<h1><?php _e('Archive: ', 'delicious'); ?><?php the_time(get_option('date_format')); ?></h1>

							<?php } elseif (is_author()) { ?>
							<h1><?php _e('Author Archive: ', 'delicious'); ?></h1>

							<?php } elseif (is_tax('portfolio_cats')) { ?>
							<h1><?php _e('Projects: ', 'delicious'); ?><strong><?php single_cat_title(); ?></strong></h1>

							<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
							<h1><?php _e('Blog Archives: ', 'delicious'); ?></h1>
							<?php }
							
						endif; 					
					}
					
					else if (is_search()) { ?>
						<div class="three-fourth">
							<h1><?php _e('Search Results for: ', 'delicious'); ?>"<?php the_search_query(); ?>"</h1>
						</div>
						<div class="one-fourth column-last">
							<?php get_search_form(); ?>
						</div>
							<?php
					}
					
					else if ('portfolio' == get_post_type()) {
					?>
					
						<div class="three-fourth">
							<h1><?php the_title(); ?></h1>
						</div>	
						
						<div class="one-fourth column-last">
							<div class="portfolio-nav clearfix"> 
								<?php next_post_link('<div class="next-project">%link</div>'); ?>
								<div class="close-project"><a href="<?php if((isset($smof_data['portfolio_back_link'])) && ($smof_data['portfolio_back_link'] !='')) { echo $smof_data['portfolio_back_link']; } else echo home_url(); ?>">Close Project</a></div>
								<?php previous_post_link('<div class="prev-project">%link</div>'); ?>
							</div>		
						</div>						
					<?php }
					
					else if (is_page()) {
						 echo '<h1>'. get_the_title() . '</h1>'; 
					}
					else if (is_single()) {
							echo '<h1>'. get_the_title() . '</h1>'; 
						}
					else if (is_404()) {
						echo '<h1>OOOOOOPS</h1>';
					}
						
					else {
						
						$pages = get_pages(array(
							'meta_key' => '_wp_page_template',
							'meta_value' => 'template-blog.php'
						));
						foreach($pages as $page){
							echo '<h1>'.esc_html($page->post_title).'</h1>';
						} 
					}
					
if(class_exists('Woocommerce')) {					
	if(is_woocommerce()) {
		if ( is_post_type_archive('product') ) { ?>
			<h1><?php echo get_the_title(woocommerce_get_page_id('shop')); ?></h1> 
		<?php }	
		
		if ( is_product_category() ) { ?>
			<h1><?php _e('Shop: ', 'delicious'); ?><strong><?php single_cat_title(); ?></strong></h1>
		<?php }		
		
		if ( is_product_tag() ) { ?>
			<h1><?php _e('Product Tag: ', 'delicious'); ?><strong><?php single_tag_title(); ?></strong></h1>
		<?php }		
	}
}				
					?>		
				