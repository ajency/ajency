<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>

	<div class="centered-wrapper">
		<section id="portfolio-wrapper">		
			<ul class="portfolio four-columns isotope">
			
				<?php

				// Begin The Loop
				if (have_posts()) : while (have_posts()) : the_post(); 			

				// Get The Taxonomy 'Filter' Categories
				$terms = get_the_terms( get_the_ID(), 'portfolio_cats' ); 
				?>
				<li data-id="id" class="isotope-item">

						<a href="<?php the_permalink(); ?>">
							<span class="item-on-hover">
								<span class="hover-link"></span>
							</span>
							<?php the_post_thumbnail('portfolio-thumb'); ?>
						</a>

							
						<div class="portfolio-carousel-details">
							<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							<span>
							<?php
							$copy = $terms;
							foreach ( $terms as $term ) {
							   echo $term->name;
								if (next($copy )) {
									echo ', ';
								}
							}						
							?>
							</span>
						</div>


				</li>

	
				<?php endwhile; endif; // END the Wordpress Loop ?>
			</ul>
			<?php dt_navigation(); ?>		
					
		</section>

	</div><!--end centered-wrapper-->
<?php get_footer(); ?>