 <?php get_header(); ?>

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
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} else if( is_tag() ){
		$title = single_tag_title( '', false );
	}	else {
		$title = get_the_archive_title();
	}
?>
<section>
	<div class="container p5">
		<div class="row">
			<div class="col offset-xl-2 col-xl-8 col12">
				<h1 class="page-title mb5"><?php echo $title; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col offset-xl-2 col-xl-8 col12">

				<?php if ( have_posts() ) : ?>

					<div class="row">												
							<?php 
								while ( have_posts() ) :
								the_post();
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
								<div class="col-12 col-md-12">
							 		<?php
									 	the_posts_pagination(
											array(
												'screen_reader_text' => __( '' ),
												'prev_text'          => '<div class="prev-posts"><i class="fas fa-arrow-left"></i>' . __( ' Previous', 'ajency' ) . '</div>',
												'next_text'          => '<div class="next-posts">' . __( 'Next ', 'ajency' ) . '<i class="fas fa-arrow-right"></i></div>',
											)
										);
							 		?>
							 	</div>
							</div>
						</div>
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