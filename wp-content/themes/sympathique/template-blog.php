<?php
/*

Template Name: Blog Page

 */
?>
<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>
	
	<?php
		$dt_template_blog = get_post_meta($post->ID, 'dt_blog_layout', true);
		$dt_blog_categories = get_post_meta($post->ID, 'dt_blog_categories', true);
		$dt_posts_number = get_post_meta($post->ID, 'dt_posts_number', true);
		$blog_id = '';
		$blog_class = '';
		
		if(($dt_template_blog == 'sidebar-right') || ($dt_template_blog == 'sidebar-left')) {
			$blog_id = 'posts'; 
			$blog_class = 'reg-blog';
		}
		else {
			$blog_id = 'masonry-blog';
		}
		
		if($dt_template_blog == 'sidebar-right') {
			$sidebar_class = 'sidebar-right';
		}
		
		if($dt_template_blog == 'sidebar-left') {
			$sidebar_class = 'sidebar-left';
		}
		
		if($dt_template_blog == 'masonry-3-cols') {
			$blog_class = 'columns-three';
		}
		if($dt_template_blog == 'masonry-2-cols') {
			$blog_class = 'columns-two';
		}
	?>
	
	<div class="centered-wrapper">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php
		
			//get blog categories to filter posts from
			$blog_cats = '';
			if(!empty($dt_blog_categories)) {
				$blog_cats = implode(', ', $dt_blog_categories);		
			}
			else {
				$blog_array_cats = get_terms('category', array('hide_empty' => false));
				foreach($blog_array_cats as $blog__array_cat) {
					$blog_cats .= $blog__array_cat->slug .', ';
				}
			}
			
			//items to display on page
			if($dt_posts_number != '') {
				$display_number = $dt_posts_number;
			}
			else {
				$display_number = 10;
			}
			
			//pagination
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');

			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');

			} else {
				$paged = 1;
			}			
			
			//query posts
			query_posts(
				array(
				'post_type'=> 'post',
				'posts_per_page' => $display_number,
				'category_name' => $blog_cats,
				'paged'=>$paged
			));	
		?>
		
			<div class="blog-page">
				<section id="<?php echo $blog_id; ?>" class="<?php if(!empty( $blog_class )) { echo $blog_class; } ?> <?php if ( !empty( $sidebar_class )) { echo $sidebar_class; }?>">
				
					<?php 
					if (have_posts()) :  while (have_posts()) : the_post(); 

						get_template_part( 'format', get_post_format() );
							
						endwhile;
					endif;  

					if(($dt_template_blog == 'sidebar-right') || ($dt_template_blog == 'sidebar-left')) { 
						dt_navigation(); 
					}
					?>						
				</section><!--end posts-->	
			</div>				
			
			<?php 
			if(($dt_template_blog == 'masonry-3-cols') || ($dt_template_blog == 'masonry-2-cols')) { 
				dt_navigation(); 
			}
			?>					
			
			<?php			
		wp_reset_query(); 
		?>

	<?php endwhile; ?>

	<?php else : ?>
		<section id="posts">
			<article>
				<h2><?php _e('Not Found', 'delicious'); ?></h2>
				<p><?php _e('Sorry, but the requested resource was not found on this site.', 'delicious'); ?></p>
				<?php get_search_form(); ?>
			</article>
		</section>
	
	<?php endif; ?>

	<?php 

	if(($dt_template_blog == 'sidebar-right') || ($dt_template_blog == 'sidebar-left')) :
		get_sidebar(); 
	endif;
	?>

	</div><!--end centered-wrapper-->

<?php get_footer(); ?>