<?php 
/*
* The Loop for single portfolio Items. Works in conjunction with the file single-portfolio.php
*/



global $avia_config;
if(isset($avia_config['new_query'])) { query_posts($avia_config['new_query']); }

// check if we got posts to display:
if (have_posts()) :

	while (have_posts()) : the_post();	
	$slider = new avia_slideshow(get_the_ID());
	$slider->setImageSize('fullsize');
	$slideHtml = $slider->display();
?>

		<div class='post-entry'>
			<!--<?php locate_template( array( 'framework/php/class-breadcrumb.php' ), true ) ?>-->
			
			<div class="entry-content template-page content twelve alpha units" style="border-top:1px solid #ccc;margin-left: 0px; width:99.9%;">	
				
			
				<div class=" alpha min_height_1">
				<img src="<?php echo get_post_meta($post->ID, 'inside_logo', true); ?>"  class="logo-fade"  style="margin:10px 10px 10px 10px;"/>
					<?php  echo $slideHtml; ?>
		        <!--	<div class='post_nav extralight-border'>
						<div class='previous_post_link_align'>
							<?php previous_post_link('<span class="previous_post_link"> %link </span>'); ?>
						</div>
						<div class='next_post_link_align'>
							<?php next_post_link('<span class="next_post_link"> %link  </span>'); ?>

						</div>
					</div>--><!-- end navigation -->					
				</div>
				
				
				<?php 
				
				echo "<div >";
			//	echo "<h1 class='post-title portfolio-single-post-title'>".get_the_title()."</h1>";
				
				$meta = avia_portfolio_meta(get_the_ID());
				if($meta)
				{
					//echo avia_advanced_hr(false, 'small');
					echo $meta;
				}
				
				//display the actual post content
			//echo avia_advanced_hr(false, 'small');
				the_content(__('Read more  &rarr;','avia_framework')); 
				
			?>	
				
				
				
			
				</div>	<!-- end eight units -->	
									
			</div>							
		
		
		</div><!--end post-entry-->
		
		
<?php 
	endwhile;		
	else: 
?>	
	
	<div class="entry">
		<h1 class='post-title'><?php _e('Nothing Found', 'avia_framework'); ?></h1>
		<?php get_template_part('includes/error404'); ?>
	</div>
<?php

	endif;
?>