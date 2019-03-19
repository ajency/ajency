 <?php 
/**
 * Template Name: All Blogs
 */
 get_header(); ?>

 <div class="container p5">
	<div class="row">
		<div class="col  offset-xl-2 col-xl-8 col12">
		   	<div class="headerfix ">
				<div class="bread-crumb d-flex">
				  <span class="h1 font-weight-light pt-6 pr-2 pr-md-3">/</span>
				  <div class="bread-crumb__menu">
            <a  href="<?php echo get_site_url(); ?>" class="actionable text-link h1">Home</a>
				    <a href="<?php echo get_site_url(); ?>/software-development-engineering/" class="actionable text-link h1">Engineering</a>
				    <a href="<?php echo get_site_url(); ?>/product-user-interface-design/" class="actionable text-link h1">User interface design</a>
				    <a href="<?php echo get_site_url(); ?>/website-design/" class="actionable text-link h1">Website design</a>
				    <a href="<?php echo get_site_url(); ?>/blog/" class="actionable is-active text-link text-black h1">Blog</a>
				  </div>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php 
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
		'post_type'=>'post',
		'post_status'=>'publish',
		'orderby' => 'date',
		'posts_per_page'=> get_option('posts_per_page'),
		'paged' => $paged,
	);

	$query = new WP_Query($args);

?>
<section>
	<div class="container p5">
		<div class="row">
			<div class="col offset-xl-2 col-xl-8 col12">

				<?php if ( $query->have_posts() ) : ?>

					<div class="row">												
							<?php 
								while ( $query->have_posts() ) :
								$query->the_post();
							?>
								<div class="col-12 col-md-6">	
									<a href="<?php the_permalink(); ?>" class="list-post">
										<?php
											$posttags = get_the_tags();
											if ($posttags) {
												foreach($posttags as $tag) {
													echo '<span class="list-tag">/'. $tag->name . ' </span>';
												}
											}
										?>
											<h3><?php the_title(); ?></h3>
											<div><?php echo excerpt(25); ?></div>
											<div class="list-meta">
												<div class="list-author"><?php the_author(); ?></div>
												<div class="list-date"><?php the_date(); ?></div>
											</div>
									</a>
								</div>
						 	<?php endwhile; ?>						 						
						</div>
						<div class="archive-post-pagination">
							<div class="row">
								<div class="col-12 col-md-12 nav-links">
							 		<?php										
										previous_posts_link( '<div class="prev-posts"><i class="fas fa-arrow-left"></i>' . __( ' Previous', 'ajency' ) . '</div>' );
										next_posts_link( '<div class="next-posts">' . __( 'Next ', 'ajency' ) . '<i class="fas fa-arrow-right"></i></div>', $query->max_num_pages );
							 		?>
							 	</div>
							</div>
						</div>
						<?php wp_reset_query(); ?>
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<div class="container p5">
	<div class="row">
		<div class="col-12">
			<hr>
		</div>
	</div>
</div>

 <?php get_footer(); ?>