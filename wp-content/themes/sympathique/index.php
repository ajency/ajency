<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>
	
	<div class="centered-wrapper">

			<div class="blog-page">
				<section id="posts" class="reg-blog sidebar-right">
				
					<?php 
					if (have_posts()) :  while (have_posts()) : the_post(); 

						get_template_part( 'format', get_post_format() );
							
						endwhile;
					endif;  
					if(function_exists('dt_navigation')) {
						dt_navigation(); 
					}
						
					?>
					
				</section><!--end posts-->	
			</div>				

		<?php get_sidebar(); ?>

	</div><!--end centered-wrapper-->

<?php get_footer(); ?>