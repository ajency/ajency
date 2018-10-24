<?php

	//retrieve related items from wp dashboard
	$related_items = get_post_meta($post->ID, 'dt_related_portf_items');
	
	//check if there are any. If so, query them.
	if (!empty($related_items)) {
		$args = array(
			'post__in' => $related_items,
			'post_type' => 'portfolio',
			'posts_per_page' => -1
			);
			
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) { ?>
			
				<div class="space"></div>		
				<div class="bgtitle"><h2><?php _e('RELATED PROJECTS','delicious'); ?></h2></div>
				
				<div id="portfolio-carousel-wrapper" class="any-carousel">
					<a href="#" class="jcarousel-control-prev"></a>
					<a href="#" class="jcarousel-control-next"></a>	
					<div id="portfolio-carousel">	
						<ul> <?php
							while ($my_query->have_posts()) : $my_query->the_post();
								
								//get categories for each portfolio item
								$terms = get_the_terms( get_the_ID(), 'portfolio_cats' );

								//get portfolio thumbnail
								$mythumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumb'); ?>	
								
								<?php if ( has_post_thumbnail() ) {  ?>	
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>">
											<span class="item-on-hover"><span class="hover-link"></span></span>
											<img src="<?php echo $mythumbnail[0]; ?>" height="<?php echo $mythumbnail[2]; ?>" width="<?php echo $mythumbnail[1]; ?>" alt="<?php echo the_title(); ?>" />
										</a>
											<div class="portfolio-carousel-details">
												<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>		
												<span> <?php
													$copy = $terms;
														foreach ( $terms as $term ) {
														if (function_exists('icl_t')) { 
															echo icl_t('Portfolio Category', 'Term '.get_taxonomy_cat_ID( $term->name ).'', $term->name);
														}
														else echo esc_html($term->name);
															if (next($copy )) {
																echo ', ';
															}
														} ?>								
												</span>
											</div>
									</li>				
								<?php } ?>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>	<?php 
			wp_reset_query(); 
		}  
	} 
?>