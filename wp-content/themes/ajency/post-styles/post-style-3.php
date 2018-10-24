   <div class="Center-Block column-2 ">
           <h3 class="grid-title non-bdr" >&nbsp; </h3>
           <div class="casestudy-content full-layout">
			<div class="mb-full-img">	<?php the_post_thumbnail('full');  ?></div>
					<div class="overlay-txt">
						<h3 class="xl-text  mb-title"><a  class="text-white" href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></h3>
							<div class="user-details-wrapper">
											<div class="user-name">
												Category : <a href="<?php bloginfo('url'); ?>/category/<?php $category = get_the_category(); echo $category[0]->category_nicename; ?>"><?php
											$category = get_the_category(); 
											echo $category[0]->cat_name;
											?></a>
											</div>
											<div class="user-description">
												<?php echo date("F j, Y | g:i a"); ?>
											</div>
											 
						</div>
					</div>
               </div>
            </div>