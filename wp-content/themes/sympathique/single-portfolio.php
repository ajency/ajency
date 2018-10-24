<?php get_header(); ?>
	<?php
	$portfolio_slide = get_post_meta($post->ID,'dt_slider_repeat',true);
	
	$portf_more_images = get_post_meta($post->ID, 'dt_more_images_block', true);
	?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php get_template_part( 'includes/subheader' ); ?>
	
	<div class="centered-wrapper">	
		<section class="portfolio-single">
			<article id="post-<?php the_ID(); ?>" class="begin-content">
			<?php
			if(!empty($portfolio_slide)) { ?>		
				<div id="container-slides">
					<div id="slides">
						<div class="slides_container">	

							<?php
								$title = get_the_title();
								$new_title = strtolower(str_replace(' ', '-', $title));
								$i=1;
								
								foreach ($portfolio_slide as $slide){ ?>
								<div class="slide">
								<?php	$image = $slide['dt_image_field_id'];
										$video = $slide['dt_video_field_id'];
									
									if (!empty($video)) {
										echo $video;
									}
									
									if (empty($video)) {
										echo '<a rel="prettyPhoto[pp_gal]" href="'.esc_url($image['url']).'"><img src="'.esc_url($image['url']).'" alt="'.$new_title.'-image-'.$i.'" /></a>'; 
									$i++;	}									
								?>
								</div>
								
								<?php
								}
							?>								
	
						</div><!--end slides_container-->
					<?php if((!empty($i)) && ($i > 2)) {  ?>
						<a href="#" class="prev"><img src="<?php echo get_template_directory_uri(); ?>/images/blog-arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
						<a href="#" class="next"><img src="<?php echo get_template_directory_uri(); ?>/images/blog-arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
					<?php } ?>
					</div><!--end slides-->
				</div><!--end container-slides-->
				
				<span class="masonry-post-meta">
					<?php
						$categories = get_the_terms(get_the_ID(), 'portfolio_cats');
						$separator = ' / ';
						$output = '';
						if($categories){
							foreach($categories as $category) {
								if (function_exists('icl_t')) { 
									$output .= '<a href="'.get_term_link( $category->slug, 'portfolio_cats' ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'delicious' ), $category->name ) ) . '">'.icl_t('Portfolio Category', 'Term '.get_taxonomy_cat_ID( $category->name ).'', $category->name).'</a>'.$separator;
								}
								else {
									$output .= '<a href="'.get_term_link( $category->slug, 'portfolio_cats' ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'delicious' ), $category->name ) ) . '">'.$category->name.'</a>'.$separator;
								}
							}
						echo trim($output, $separator);
						}						
					?>
				</span>
				
				<?php  } ?>

			<div class="clear"></div>

			<?php the_content(); ?>		

		<?php if(!empty($portf_more_images)) { ?>
			<div class="space"></div>
			
			<div class="bgtitle"><h2><?php _e('PROJECT PHOTOS', 'delicious'); ?></h2></div>


			<div class="portfolio-gallery">
			<?php		
					foreach ($portf_more_images as $single_image) {
						$extra_image = $single_image['dt_portfolio_extra_image'];
						$extra_image_name = $single_image['dt_portfolio_extra_image_name'];
						$extra_image_desc = $single_image['dt_portfolio_extra_image_desc'];
						
						$small_image = aq_resize($extra_image['url'], 360, 9999, false);
					?>
						<a title="<?php echo esc_attr($extra_image_desc); ?>" href="<?php echo esc_url($extra_image['url']); ?>" rel="prettyPhoto[pp_gal]">
							<span class="item-on-hover"><span class="hover-image"></span></span>
							<img alt="<?php echo esc_attr($extra_image_name); ?>" src="<?php echo esc_url($small_image); ?>" />			
						</a>
					<?php
					}
			?>	
			</div>
			<?php } ?>
			
			<?php
			$p_related_items = get_post_meta($post->ID, 'dt_related_portf_items');
			if (!empty($p_related_items)) {  get_template_part( 'includes/related-portfolio-posts'); }  ?>			
			</article>
		</section>
		
		<div class="clear"></div>
		
	</div><!--end centered-wrapper-->
	<?php endwhile; endif; ?>	

<?php get_footer(); ?>