    <div class="Center-Block column-3 ">
           <h3 class="grid-title non-bdr" >&nbsp; </h3>
           <div class="casestudy-content layout-1">
		   <div class="vertical-img">
				<?php the_post_thumbnail('full');  ?>
			</div>
					<div class="left-box text-black">
						<h3 class="lg-text  mb-title"><a class="text-black" href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></h3>
							<div class="text-muted">Posted by: <?php the_author() ?>   </div>
										<div class="tags">
										  <?php the_tags( '<span class="text-muted label-display">Tags:</span>  ', ' ', '<br />' ); ?> 
										</div>
										<div class="clear"></div>
						<div class="user-details-wrapper">
										<div class="user-name ">
										Category : <a href="<?php bloginfo('url'); ?>/category/<?php $category = get_the_category(); echo $category[0]->category_nicename; ?>"><?php
											$category = get_the_category(); 
											echo $category[0]->cat_name;
											?></a>
										</div>


										<div class="user-description">
												<?php echo date("F j, Y | g:i a"); ?>
										</div>
										 
					</div><a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/arrowRight.png" /></a>
						
						</div>
					<div class="right-box text-black">
						<br>
					<p ><?php $my_excerpt = get_the_excerpt();
if ( '' != $my_excerpt ) {
    // Some string manipulation performed
}
echo $my_excerpt; // Outputs the processed value to the page
?>
					</p>
					</div>
               </div>
            </div>