<?php
/*
 Template Name: Blank
*/
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<section>
			<article id="page-<?php the_ID(); ?>" class="page-blank">
				<section>
					<?php the_content(); ?>
				</section>
			</article>
		</section>

	<?php endwhile; ?>

	<?php endif; ?>
	
	<?php wp_footer(); ?>
</body> 
</html>	