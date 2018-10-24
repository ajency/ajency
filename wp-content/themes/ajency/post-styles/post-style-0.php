
           <div class="Center-Block column-7 ">
           <h3 class="grid-title non-bdr" >&nbsp; </h3>
           <div class="casestudy-content layout-1">
			<div class="cat-big">
			<?php the_post_thumbnail('full');  ?>
			</div>
			<div class="col-1">
				<h3 class="lg-text text-black  mb-title"><a class="text-black" href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></h3>
						<div class="user-details-wrapper">
										<div class="user-name text-black">
											<a href="<?php bloginfo('url'); ?>/category/<?php $category = get_the_category(); echo $category[0]->category_nicename; ?>"><?php
											$category = get_the_category(); 
											echo $category[0]->cat_name;
											?></a>
										</div>
										<div class="user-description">
											<?php echo date("F j, Y | g:i a"); ?>
										</div>
										 
					</div><a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/arrowRight.png" /></a>
					<p class="sm-content-text"><?php echo get_the_content(); ?>
					</p>
			</div>
					</div>
               </div>