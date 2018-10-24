<?php 
	global $avia_config, $more;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */	
	 get_header();
 		
	?>


		<!-- ####### MAIN CONTAINER ####### -->
		<div class='container_wrap <?php echo $avia_config['layout']; ?>' id='main'>
		
			<div class='container template-blog catPage '>	
				<div class="bannerImg"><?php 
					$categories = get_the_category();
					foreach($categories as $category) { 
					
						if (is_category('mediacoverage')) {
							echo '<img src="http://lokusdesign.com/wp-content/uploads/2013/10/14.jpg" alt="media coverage" />'; 
						}
						
						elseif (is_category('print-coverage')){
							echo '<img src="http://lokusdesign.com/wp-content/uploads/2014/01/print-coverage.jpg" alt="print coverage" />'; 
						}
						elseif (is_category('online-coverage')){
							echo '<img src="http://lokusdesign.com/wp-content/uploads/2014/01/online-coverage.jpg" alt="online coverage" />'; 
						}
						elseif (is_category('electronic-media')){
							echo '<img src="http://lokusdesign.com/wp-content/uploads/2014/01/electronic-media.jpg" alt="electronic media" />'; 
						}
						else{
					
							echo '<img src="http://lokusdesign.com/wp-content/uploads/2013/10/' . $category->cat_ID . '.jpg" alt="' . $category->cat_name . '" />'; 
						
						}
					} 
				?></div>
				
				<?php echo avia_title(avia_which_archive()); ?>
				
				<div class='content twelve units units catPost'>
				
				<div class="two_third">
						<h3 class="lks_title">
						<!--<span class="title">Love<span class="red">@</span>FirstSight:</span><br>-->
						<?php if( in_category('loveatfirstsight') ) : ?>
							A series of consumer <br>insight led studies <br>based on consumer <br>preferences, behaviors, <br>and emotions towards a <br>product category.
						<?php endif; ?>
						<?php if( is_category('mediacoverage') ) : ?>
						We don't go out of our <br>way to create news...<br> We only go out of our <br>way to do good work <br>which makes news! </br>Our directory of news </br>articles and mentions.	
						<?php endif; ?>

						<?php if( is_category('print-coverage') ) : ?>
						We don't go out of our <br>way to create news...<br> We only go out of our <br>way to do good work <br>which makes news!	
						<?php endif; ?>
						<?php if( is_category('online-coverage') ) : ?>
						We don't go out of our <br>way to create news...<br> We only go out of our <br>way to do good work <br>which makes news!	
						<?php endif; ?>
						<?php if( is_category('electronic-media') ) : ?>
						We don't go out of our <br>way to create news...<br> We only go out of our <br>way to do good work <br>which makes news!	
						<?php endif; ?>

						</h3>
					</div>
					
					<div class="three_fifth lst">
					<div class="catDesc">
						<?php echo category_description( $category_id ); ?>
					</div>
					<?php

						if (is_category('mediacoverage')) { ?>
						
					<?php
					//get all child categories for category 15, then for each child category display the posts
					$parent_cat = 14;
					$taxonomy = 'category';
					$cat_children = get_term_children( $parent_cat, $taxonomy );


					if ($cat_children) {
						foreach($cat_children as $category) {
						$args=array(
						  'cat' => $category,
						  'post_type' => 'post',
						  'post_status' => 'publish',
						  'posts_per_page' => 2,
						  'caller_get_posts'=> 1
						  
						);
						$my_query = null;
						$my_query = new WP_Query($args);
						$c_name = get_cat_name($category);
						if( $my_query->have_posts() ) {
						?>
						  <div class="category_name"><a href="<?php echo get_category_link( $category ); ?> "><?php echo $c_name;?></a></div>
						 <?php
						  while ($my_query->have_posts()) : $my_query->the_post(); ?>
						  <div class='post-entry padding_bottom'>
							<div class="postImg">
							<?php 
								$slider = new avia_slideshow(get_the_ID());				
								//echo $slider->display(); //commented 22oct2013
								
								if($slider)//Added on22oct2013
								{
									if(is_single())
										echo $slider->display();
									else							
										echo str_replace("preloading slideshow","preloading slideshow".get_the_ID(), $slider->display());					
									 
								}//end added on 22oct2013
							?>
							</div>
						  
						  	<div class="postContnt">
							<div class="seven units entry-content">
							<h3 class="info-title">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php the_title(); ?>
							</a>
							</h3>
							<?php the_excerpt(); ?>
							</div>
							</div>
							</div>
							
							<?php
						  endwhile;
						}
						?>
						
						<a class="sub_category_link" href="<?php echo get_category_link( $category ); ?> ">View All</a>
						<?php
					  }
					}
					wp_reset_query();  // Restore global post data stomped by the_post().
					?>
					
					
	<?php } 

						else { ?>
						
						<?php
				
				/* Run the loop to output the posts.
				* If you want to overload this in a child theme then include a file
				* called loop-index.php and that will be used instead.
				*/
				
				
				$more = 0;
				get_template_part( 'includes/loop', 'index' );
				?>
				
					<?php	}
					?>
					
					
	
					
				
				
				</div>
				
				<!--end content-->
				</div>
				
				<?php 

				////get the sidebar
				//$avia_config['currently_viewing'] = 'blog';
				//get_sidebar();
				
				?>
				
			</div><!--end container-->

	</div>
	<!-- ####### END MAIN CONTAINER ####### -->


<?php get_footer(); ?>