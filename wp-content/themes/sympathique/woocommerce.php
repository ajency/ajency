<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>
	
	<?php
	?>

	<div class="centered-wrapper">
	
		<section id="posts" class="<?php echo $smof_data['woo_layout']; ?>">
			<article id="post-<?php the_ID(); ?>" class="begin-content">
					<?php woocommerce_content(); ?>
			</article>
		</section>
		<?php if($smof_data['woo_layout'] != 'no-sidebar') { ?>
			<aside id="sidebar">
				<?php
					if (function_exists("dt_sidebar")) {
						dt_sidebar($smof_data['woo_sidebar']);
					}
					else {
						dynamic_sidebar( $smof_data['woo_sidebar'] );
					}
				?>
			</aside>
		<?php } ?>
	</div><!--end centered-wrapper-->

<?php get_footer(); ?>