<?php get_header(); ?>

<?php get_template_part( 'includes/subheader' ); ?>
	
	<div class="centered-wrapper">
		<section>
			<article>
				<h1 class="align-center"><?php esc_html_e('Error 404 - Not Found', 'delicious'); ?></h1>
				<h4 class="align-center"><?php esc_html_e('Sorry, but the requested resource was not found on this site. Please try again or contact the administrator for assistance.', 'delicious'); ?></h4>
				<div class="space"></div>
				<p class="align-center"><?php esc_html_e('Are you looking for something?', 'delicious'); ?></p>
				<div class="no-page"><?php get_search_form(); ?></div>
				<div class="space"></div>
			</article>
		</section>
	</div>

<?php get_footer(); ?>