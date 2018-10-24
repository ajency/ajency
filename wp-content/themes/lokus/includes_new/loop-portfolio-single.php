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
			
			
			<div class="entry-content">	
				
			
				<div class="eight units alpha min_height_1">
				
					<?php echo $slideHtml; ?>
		        	<div class='post_nav extralight-border'>
						<div class='previous_post_link_align'>
							<?php previous_post_link('<span class="previous_post_link">&larr; %link </span><span class="post_link_text">'.__('(previous entry)', 'avia_framework')."</span>"); ?>
						</div>
						<div class='next_post_link_align'>
							<?php next_post_link('<span class="next_post_link"><span class="post_link_text">'.__('(next entry)', 'avia_framework').'</span> %link &rarr;</span>'); ?>
						</div>
					</div> <!-- end navigation -->					
				</div>
				
				
				<?php 
				
				echo "<div class='four units'>";
				echo "<h1 class='post-title portfolio-single-post-title'>".get_the_title()."</h1>";
				
				$meta = avia_portfolio_meta(get_the_ID());
				if($meta)
				{
					echo avia_advanced_hr(false, 'small');
					echo $meta;
				}
				
				//display the actual post content
				echo avia_advanced_hr(false, 'small');
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
