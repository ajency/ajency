<?php global $avia_config; ?>


		<div class='post-entry'>

			<h1 class='post-title offset-by-one'>
					<a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:','avia_framework')?> <?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			
			<?php 
				$slider = new avia_slideshow(get_the_ID());
				if($slider) echo $slider->display();
			?>
			
			<!--meta info-->
	        <div class="one unit alpha blog-meta meta-color">
	        	
	        	<div class='post-format primary-background flag'>
	        		<span class='post-format-icon post-format-icon-<?php echo get_post_format(); ?>'></span>
	        		
	        	</div>
	        	
				
			</div><!--end meta info-->	
			

			<div class="seven units entry-content">	
			
			
	        	<div class='blog-inner-meta extralight-border'>
	        	
					<span class='post-meta-infos'>
					
						
						<?php 
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
						
						$portfolio_cats = get_the_term_list(  get_the_ID(), 'portfolio_entries', '', ', ','');
						
						if($portfolio_cats && !is_object($portfolio_cats))
						{
							echo '<span class="blog-categories minor-meta">'.__('in ','avia_framework');
							echo $portfolio_cats;
							echo ' </span><span class="text-sep">/</span> ';
						}
						
						
						echo '<span class="blog-author minor-meta">'.__('by ','avia_framework');
						the_author_posts_link(); 
						echo '</span>';
						
						
						?>
					
					</span>	
					
				</div>	
				
			<span class='date-container minor-meta meta-color'><?php echo get_the_date(); ?></span>	
				<?php 
				
				the_content(__('Read more  &rarr;','avia_framework'));  
				
				if(has_tag() && is_single())
				{	
					echo '<span class="blog-tags">';
					echo the_tags('<strong>'.__('Tags: ','avia_framework').'</strong><span>'); 
					echo '</span></span>';
				}	
				?>	
								
			</div>	
			

		</div><!--end post-entry-->