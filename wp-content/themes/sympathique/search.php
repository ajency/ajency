<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>

	<?php
	//if there are results to show
	if (have_posts()) : ?>
		<div class="centered-wrapper">
			<section id="posts" class="reg-blog <?php if($smof_data['blog_sidebar_pos'] !='') { echo $smof_data['blog_sidebar_pos']; } ?>">
				<?php  
					if ( have_posts()) { 
						while (have_posts()) : the_post();
					?>
			
					<article class="post post-item" id="post-<?php the_ID(); ?>">											
						<?php if ( has_post_thumbnail() ) { ?>		
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<span class="item-on-hover"><span class="hover-link"></span></span>
									<?php the_post_thumbnail('blog-thumb'); ?>
								</a>
							</div><!--end post-thumbnail-->						
							
						<?php } ?>

					<div class="post-content">
						<span class="masonry-post-meta">
						<?php echo get_the_time(get_option('date_format')); ?>
						</span>			
						<div class="clear"></div>
						<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
												
						<?php
							the_excerpt(); 
						?>
					</div><!--end post-content-->
					
					</article>

					<?php  endwhile;
					
									
					dt_navigation();
					// if there are results, but not from the blog posts
					} else { ?>
						<article>
							<p><?php _e('Sorry, but the requested resource was not found on this site. Try another search:', 'delicious'); ?></p>
							<?php get_search_form(); ?>
						</article>
				
				<?php } ?>
			</section>

<!-- 			<?php if(function_exists("dt_sidebar")) {
				echo '<aside id="sidebar">';
					if($smof_data['blog_sidebar'] !='') { 
						$blog_sidebar_pos = $smof_data['blog_sidebar']; 
						dt_sidebar($blog_sidebar_pos); 
					}
				echo '</aside>';
				} else get_sidebar();
			?> -->
		</div>
			

			
	<?php
	// if there are no search results
	 else : ?>
		
		<div class="centered-wrapper">
			<div id="posts" class="reg-blog <?php if($smof_data['blog_sidebar_pos'] !='') { echo $smof_data['blog_sidebar_pos']; } ?>">
				<article>
					<p><?php _e('Sorry, but the requested resource was not found on this site. Try another search.', 'delicious'); ?></p>
				</article>
			</div>
			
			<?php get_sidebar(); ?>
		</div>

	<?php endif; ?>

<?php get_footer(); ?>