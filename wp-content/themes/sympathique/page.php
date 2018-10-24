<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="centered-wrapper">
	
		<section id="posts" class="<?php echo dt_sidebar_position($post->ID); ?>">
			<article id="post-<?php the_ID(); ?>" class="begin-content">
					<?php the_content(); ?>
			</article>
		</section>

		<?php endwhile; ?>

		<?php endif; ?>
		
		<?php
			global $dt_sidebar_pos;
			if(($dt_sidebar_pos === 'sidebar-right') || ($dt_sidebar_pos === 'sidebar-left')) 
				get_sidebar(); 
		?>
		

	</div><!--end centered-wrapper-->

<?php get_footer(); ?>