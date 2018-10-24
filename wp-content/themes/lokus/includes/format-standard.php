<?php global $avia_config; ?>

		<div class='post-entry'>

			
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
			<!--<h1 class='post-title offset-by-one'>
					<a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:','avia_framework')?> <?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>-->
			<!--meta info-->
	        <!--<div class="one unit alpha blog-meta meta-color">
	        	
	        	<div class='post-format primary-background flag'>
	        		<span class='post-format-icon post-format-icon-<?php echo get_post_format(); ?>'></span>
	        		
	        	</div>
	        	
				
			</div>-->
			<!--end meta info-->	
			

			<div class="seven units entry-content">	
			

 

				
				<?php 
				$pdf="pdf_url";
	
			$trimtitle = get_the_title();
	
			$shorttitle = wp_trim_words( $trimtitle, $num_words = 10, $more = '… ' );
	
				echo '<h3 class="info-title">' . '<a target="blank" href="' .get_post_meta($post->ID, $pdf, true) . '">' . $shorttitle . '</a></h3>';  
	
				if(is_single())//added on 22oct2013 
				 {
					echo  the_content();
				 }
				else
				{
					//echo "sdfsd";
					$trimexcerpt = get_the_excerpt();
					
					//$shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 50, $more = '… ' );
					
					//echo  $shortexcerpt  ;
					echo  $trimexcerpt  ;
					?><!--<div class="rdMre"><a href="<?php echo get_permalink() ?>">Read More</a></div>-->
					<?php 
				}
	
			?>
 
	</div>
	
			</div>
			

		</div><!--end post-entry-->