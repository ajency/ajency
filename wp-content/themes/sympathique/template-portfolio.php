<?php
/*

Template Name: Portfolio

 */
global $smof_data;
?>
<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>
<?php
						$categs = get_post_meta($post->ID,'dt_cats_field');
						
						$layout = get_post_meta($post->ID,'dt_portfolio_columns',true);
						$navig = get_post_meta($post->ID,'dt_portfolio_navigation',true);
						$nav_number = get_post_meta($post->ID,'dt_nav_number',true);	
						$list = '';
						
						$portfolio_categs = get_terms('portfolio_cats', array('hide_empty' => false));
						
						foreach ($categs as $categ) {
							foreach($portfolio_categs as $portfolio_categ) {
								if($categ === $portfolio_categ->name) {
									$list .= $portfolio_categ->slug . ', ';
								}
							}
							
						}

?>
	<div class="centered-wrapper">
		<?php 
			if (have_posts()) : while (have_posts()) : the_post(); 	
				the_content(); 
			endwhile; endif;
		?>
		<section id="portfolio-wrapper">		
			<ul class="portfolio <?php echo $layout; ?> isotope">
			
				<?php
					$show_number = '-1';
				if ($navig == 'no-filter') {
					if (!empty($nav_number)) {
						$show_number = $nav_number;
					}
					else $show_number = 8;
				}
				
				//get post type - portfolio
				query_posts(array(
					'post_type'=>'portfolio',
					'posts_per_page' => $show_number,
					'term' => 'portfolio_cats',
					'portfolio_cats' => $list,
					'paged'=>$paged
				));

				// Begin The Loop
				if (have_posts()) : while (have_posts()) : the_post(); 			

				// Get The Taxonomy 'Filter' Categories
				$terms = get_the_terms( get_the_ID(), 'portfolio_cats' ); 

				$portf_icon = get_post_meta($post->ID,'dt_portf_icon',true);						
					$portf_thumbnail = get_post_meta($post->ID,'dt_portf_thumbnail',true);			
					$portf_link = get_post_meta($post->ID,'dt_portf_link',true);				
					$thumb_id = get_post_thumbnail_id($post->ID);
					
					$image_url = wp_get_attachment_url($thumb_id);
					
					$grid_thumbnail = $image_url;
					$item_class = 'item-small';
					
					switch ($portf_thumbnail) {
						case 'portfolio-big':
							$grid_thumbnail = aq_resize($image_url, 550, 450, true);
							$item_class = 'item-wide';
							break;
						case 'portfolio-small':
							$grid_thumbnail = aq_resize($image_url, 265, 215, true);
							$item_class = 'item-small';
							break;
						case 'half-horizontal':
							$grid_thumbnail = aq_resize($image_url, 550, 215, true);
							$item_class = 'item-long';
							break;
						case 'half-vertical':
							$grid_thumbnail = aq_resize($image_url, 265, 450, true);
							$item_class = 'item-high';
							break;							
					}	
					
					//retrieve portfolio video
					if ($portf_icon == 'lightbox_to_video') {
						$portfolio_slide = get_post_meta($post->ID,'dt_slider_repeat',true);
							if(!empty($portfolio_slide)) {
								$get_video = array();
								$j=0;
								foreach ($portfolio_slide as $slide){
									$video = $slide['dt_video_field_id'];
									if (!empty($video)) {
										$get_video[$j] = $video;
										$j++;
									}
									
								}									
							}
							$input_string = $get_video[0];
							$count = preg_match('/src=(["\'])(.*?)\1/', $input_string, $match);
					}		
				
				?>
				<li class="isotope-item <?php if($terms) { foreach ($terms as $term) { echo get_taxonomy_cat_ID($term->name) .' '; } } else { echo 'none '; } ?><?php if($layout == 'grid') { echo $item_class; } ?>">
					<?php	
					if($layout != 'grid') {
						
						// Check if wordpress supports featured images, and if so output the thumbnail
						if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
							
							if ($portf_icon == 'lightbox_to_image') {  ?>
							<a href="<?php echo wp_get_attachment_url($thumb_id);?>" rel="prettyPhoto">
								<span class="item-on-hover">
									<span class="hover-image"></span>
								</span>
								<?php the_post_thumbnail('portfolio-thumb'); ?>
							</a>
							
						<?php }
						
							else 
							
							if ($portf_icon == 'link_to_page') {  ?>
							<a href="<?php the_permalink(); ?>">
								<span class="item-on-hover">
									<span class="hover-link"></span>
								</span>
								<?php the_post_thumbnail('portfolio-thumb'); ?>
							</a>
							
						<?php }		

							else 
							
							if ($portf_icon == 'link_to_link') {  ?>
							<a href="<?php echo $portf_link; ?>">
								<span class="item-on-hover">
									<span class="hover-link"></span>
								</span>
								<?php the_post_thumbnail('portfolio-thumb'); ?>
							</a>
							
						<?php }								

							else 
							if ($portf_icon == 'lightbox_to_video') {
								
							?>
							<a href='<?php 
								if ($count === FALSE) 
									echo('not found\n');
								else 
									echo($match[2] . "\n");
							?>'>
								<span class="item-on-hover">
									<span class="hover-video"></span>
								</span>
								<?php the_post_thumbnail('portfolio-thumb'); ?>
							</a>
							
						<?php }									

						endif; ?>	
							
						<div class="portfolio-carousel-details">
						<?php if ($portf_icon == 'link_to_link') { ?>
							<h3><a href="<?php echo $portf_link ?>"><?php echo get_the_title(); ?></a></h3>
						<?php }
						else { ?>
							<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<?php } ?>
							<span>
							<?php
							$copy = $terms;
							foreach ( $terms as $term ) {
							if (function_exists('icl_t')) { 
							   echo icl_t('Portfolio Category', 'Term '.get_taxonomy_cat_ID( $term->name ).'', $term->name);
							}
							else 
								echo $term->name;
								if (next($copy )) {
									echo ', ';
								}
							}						
							?>
							</span>
						</div>
						
					<?php 
					} 
					
					if($layout == 'grid') {
						if ($portf_icon == 'lightbox_to_image') { ?>
							<a href="<?php echo wp_get_attachment_url($thumb_id);?>" rel="prettyPhoto[pp_port]" title="<?php the_title(); ?>">
						<?php } 
						else if ($portf_icon == 'link_to_page') {  ?>
							<a href="<?php the_permalink(); ?>">
						<?php } 
						else if ($portf_icon == 'link_to_link') {  ?>
							<a href="<?php echo $portf_link; ?>">
						<?php } 						
						else if ($portf_icon == 'lightbox_to_video') {  ?>
							<a href='<?php 
								if ($count === FALSE) 
									echo('not found\n');
								else 
									echo($match[2] . "\n");
							?>'>
						<?php }
						?>

							<div class="grid-item-on-hover">
								<div class="grid-text">
									<h1><?php echo get_the_title(); ?></h1>
								</div>
								<span>
								<?php
									$copy = $terms;
									foreach ( $terms as $term ) {
									   echo $term->name;
										if (next($copy )) {
											echo ', ';
										}
									}
								?>
								</span>
							</div>
							<img src="<?php echo $grid_thumbnail; ?>" alt="" />
						</a>	
						
					<?php
					}
					?>

				</li>

	
				<?php endwhile; endif; // END the Wordpress Loop ?>
			</ul>
			<?php dt_navigation(); ?>
			<?php wp_reset_query(); // Reset the Query Loop ?>			
					
		</section>

	</div><!--end centered-wrapper-->

<?php get_footer(); ?>