<?php if( !defined('ABSPATH') ) exit;?>
<?php 
/**
 * Template Name: Home Page
 */
?>
<?php get_header(); ?>
	
	<div class="blueBg">
		<h1>SCIENCE MADE FUN</h1>
		<h2>See More . Do More . Be More</h2>

		<div class="slideContainer">
			<?php putRevSlider("home") ?>
		</div>
	</div>

	<div class="container">
		<?php if( have_posts() ) : the_post();?>
			<?php the_content();?>
		<?php endif;?>
	</div>
<?php get_footer();?>