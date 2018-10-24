
<?php global $avia_config; ?>


		<div class='post-entry quote-entry extralight-border'>
		
			<?php 
				$slider = new avia_slideshow(get_the_ID());
				echo $slider->display();
			?>

			<!--meta info-->
	        <div class="one unit alpha blog-meta meta-color blog-meta-<?php echo get_post_format(); ?>">
	        	
	        	<div class='post-format primary-background flag'>
	        		<span class='post-format-icon post-format-icon-<?php echo get_post_format(); ?>'></span>
	        		
	        	</div>
	        		
				
			</div><!--end meta info-->	
			
			<blockquote class='first-quote'>
					<?php the_title(); ?>
			</blockquote>
			
			<div class="entry-content">	

				<?php 
				
				echo "<div class='quote-content'>";
				the_content(__('Read more  &rarr;','avia_framework'));  
				echo "</div>";
				
				if(has_tag() && is_single())
				{	
					echo '<span class="blog-tags">';
					echo the_tags('<strong>'.__('Tags: ','avia_framework').'</strong><span>'); 
					echo '</span></span>';
				}	
				?>	
				
				<div class='blog-inner-meta extralight-border quote-inner-meta'>
	        	
					<span class='post-meta-infos'>
					
						<span class='date-container-mod minor-meta meta-color'><?php echo get_the_date(); ?></span>	
						<?php 
						echo "</span><span class='text-sep'>/</span>";	
						if(comments_open() || get_comments_number())
						{
							echo "<span class='comment-container minor-meta'>";
							comments_popup_link(" <span>0 ".__('Comments','avia_framework')."</span>", 
												" <span>1 ".__('Comment' ,'avia_framework')."</span>",
												" <span>% ".__('Comments','avia_framework')."</span>",'comments-link',
												__('Comments Off'  ,'avia_framework')); 	
							echo "</span><span class='text-sep'>/</span>";	 
						}
						
						
						?>
						 
	
						<?php
						$cats = get_the_category();
						
						if(!empty($cats))
						{
							echo '<span class="blog-categories minor-meta">'.__('in ','avia_framework');
							the_category(', ');
							echo ' </span><span class="text-sep">/</span> ';
						}
						
						echo '<span class="blog-author minor-meta">'.__('by ','avia_framework');
						the_author_posts_link(); 
						echo '</span><span class="text-sep">/</span>';
						
						
						echo '<span class="blog-permalink minor-meta">';
						echo "<a href='".get_permalink()."'>".__('#permalink','avia_framework')."</a>";
						echo '</span>';
						
						?>
					
					</span>	
					
				</div>
								
			</div>	
			

		</div><!--end post-entry-->