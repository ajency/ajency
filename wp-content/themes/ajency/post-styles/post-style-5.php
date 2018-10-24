				 <div class="Center-Block column-6 ">
           <h3 class="grid-title non-bdr" >&nbsp; </h3>
           <div class="casestudy-content full-layout ">
					<div class="vertical-img-1">
							<?php the_post_thumbnail('large');  ?>
							<div class="overlay-txt">
						<h3 class="lg-text  mb-title"><a class="text-white" href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></h3>
							<div class="user-details-wrapper">
											<div class="user-name">
													<a href="<?php bloginfo('url'); ?>/category/<?php $category = get_the_category(); echo $category[0]->category_nicename; ?>"><?php
											$category = get_the_category(); 
											echo $category[0]->cat_name;
											?></a>
											</div>
											<div class="user-description">
												<?php echo date("F j, Y | g:i a"); ?>
											</div>
											 
						</div>
					</div>
					</div><br>
					<div class="vertical-img-1">
						<?php the_post_thumbnail('large');  ?>
							<div class="overlay-txt">
						<h3 class="lg-text  mb-title"><a class="text-white" href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></h3>
							<div class="user-details-wrapper">
											<div class="user-name">
														<a href="<?php bloginfo('url'); ?>/<?php $category = get_the_category(); echo $category[0]->category_nicename; ?>"><?php
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
            </div>