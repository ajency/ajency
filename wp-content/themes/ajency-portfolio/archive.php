<?php

/**
 * Template Name: Blog
 */

 get_header();  ?>

<div class="container p5">
	<div class="row">
		<div class="col  offset-xl-2 col-xl-8 col12">
		   <div class="headerfix ">
			 <div class="bread-crumb">
				<h1 class="ft6 pt-6">
					<span>/</span> <a href="#" class="text-link text-black">blog </a>
				</h1>
			 </div>
		  </div>
		</div>
	</div>
</div>

<section class="">
	<div class="container p5">
		<div class="row">
			<div class="col  offset-xl-2 col-xl-8 col12">

				<div class="row">
					<div class="col-12 col-md-6 list-featured-col">
						<?php
						  $args = array(
								'posts_per_page' => 2,
								'meta_key' => 'meta-checkbox',
								'meta_value' => 'yes'
							);
							$featured = new WP_Query($args);


							if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="list-post list-post--featured" style="background-image: url(<?php if (has_post_thumbnail()) : ?><?php the_post_thumbnail_url(); ?><?php endif;?>)">
									<?php
										$posttags = get_the_tags();
										if ($posttags) {
										  foreach($posttags as $tag) {
										    echo '<span class="list-tag">/'. $tag->name . ' </span>';
										  }
										}
									?>
									<h3><?php the_title(); ?></h3>
									<div><?php the_excerpt();?></div>
									<div class="list-meta">
										<div class="list-author"><?php the_author(); ?></div>
										<div class="list-date"><?php the_date(); ?></div>
									</div>
								</a>
								<?php
							endwhile; else:
							endif;

						?>

						<div class="text-center list-text-block">
							Lorem ipsum dolor sit amet, consectetur <strong>adipiscing</strong> elit, sed do eiusmod tempor incididunt ut <strong>labore</strong> et dolore magna.
						</div>

					</div>

					<div class="col-12 col-md-6">
						<?php
						// the query
						$args = array(
								'post_type'=>'post',
								'post_status'=>'publish',
								'meta_key' => 'meta-checkbox',
								'posts_per_page'=>4,
								'meta_query' => array(
									array(
										'key'	=> 'meta-checkbox',
										'value'	=> '',
									)
								)
						);
						$wpb_all_query = new WP_Query($args); ?>

						<?php if ( $wpb_all_query->have_posts()  ) : ?>

							<!-- the loop -->
							<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post() ; ?>
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
									<div><?php the_excerpt(); ?></div>
									<div class="list-meta">
										<div class="list-author"><?php the_author(); ?></div>
										<div class="list-date"><?php the_date(); ?></div>
									</div>
								</a>
							<?php endwhile; ?>
							<!-- end of the loop -->
					</div>
				</div>



					<?php wp_reset_postdata(); ?>

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