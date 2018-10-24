<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>
		
	<div class="centered-wrapper">
		<section id="masonry-blog" class="columns-three ">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="blog-page">

						<?php get_template_part( 'format', get_post_format() ); ?>
									
					<?php endwhile; ?>
					
			<?php endif; ?>
					
			<?php if(function_exists('dt_navigation')) {
				dt_navigation(); } 
				else  { ?>
				<?php previous_posts_link(); ?> &bull; <?php next_posts_link(); } ?>
			</div>
		</section>
			
	</div>
<?php get_footer(); ?>