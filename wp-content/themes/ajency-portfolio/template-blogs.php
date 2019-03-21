<?php
/**
 * Template Name: Blog
 */

 get_header();  ?>

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
				    <!-- <a href="#" class="actionable text-link h1">Careers</a> -->
				  </div>
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
								<a href="<?php the_permalink(); ?>" class="list-post list-post--featured" style="background-image: url(<?php if (has_post_thumbnail()) : ?><?php the_post_thumbnail_url('medium_large'); ?><?php endif;?>)">
									<div>
									<?php
										$posttags = get_the_tags();
										if ($posttags) {
										  foreach($posttags as $tag) {
										    echo '<span class="list-tag">/'. $tag->name . ' </span>';
										  }
										}
									?>
									</div>
									<h3><?php the_title(); ?></h3>
									<div><?php echo excerpt(15);?></div>
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
							Our <strong>thoughts</strong>, <strong>opinions</strong> and <strong>updates</strong> are shared here.
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
									<div><?php echo excerpt(25); ?></div>
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
				<?php 
					$pageid = get_page_id_by_tempplate('template-all_blogs.php');					
					if($pageid){
				?>
					<div class="row">
						<div class="col col12 text-center mt5">
							<a href="<?php echo get_the_permalink($pageid); ?>" class="btn-view" target="_self"><?php _e('View All ', 'ajency'); ?><i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				<?php } ?>
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