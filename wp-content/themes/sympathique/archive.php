<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>
		
	<div class="centered-wrapper">
		<section id="posts" class="reg-blog <?php if($smof_data['blog_sidebar_pos'] !='') { echo $smof_data['blog_sidebar_pos']; } ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="blog-page">

					<article <?php post_class('post-item'); ?>" id="post-<?php the_ID(); ?>">
						<div class="post-content">					

							<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
													
							<?php  
								global $more; 
								the_content(esc_html__('Read More', 'delicious'));; 
							?>
						</div><!--end post-content-->
					</article>					
					<?php endwhile; ?>
					
			<?php endif; ?>
					
			<?php if(function_exists('dt_navigation')) {
				dt_navigation(); } 
				else  { ?>
				<?php previous_posts_link(); ?> &bull; <?php next_posts_link(); } ?>
			</div>
		</section>
			
		<?php if(function_exists("dt_sidebar")) {
			echo '<aside id="sidebar">';
				if(isset($smof_data['blog_sidebar'])) {
					if($smof_data['blog_sidebar'] !='') { 
						$blog_sidebar_pos = $smof_data['blog_sidebar']; 
						dt_sidebar($blog_sidebar_pos); 
					}
				}
			echo '</aside>';
			} else get_sidebar();
		?>
	</div>
<?php get_footer(); ?>