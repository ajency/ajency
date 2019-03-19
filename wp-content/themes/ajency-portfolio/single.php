<?php get_header();  ?>

<div class="container p5">
  <div class="row">
    <div class="col  offset-xl-2 col-xl-8 col12">
       	<div class="headerfix ">
       		<div class="bread-crumb d-flex">
       		  <span class="h1 font-weight-light pt-6 pr-2 pr-md-3">/</span>
       		  <div class="bread-crumb__menu">
	            <a  href="<?php echo get_site_url(); ?>" class="actionable text-link h1">Home</a>
       		    <a href="<?php echo get_site_url(); ?>/software-development-engineering/" class="actionable text-link h1">Engineering</a>
       		    <a href="<?php echo get_site_url(); ?>/product-user-interface-design/" class="actionable text-link h1">User interface design</a>
       		    <a href="<?php echo get_site_url(); ?>/website-design/" class="actionable text-link h1">Website design</a>
       		    <a href="<?php echo get_site_url(); ?>/blog/" class="actionable is-active text-link text-black h1 has-link">Blog</a>
       		    <!-- <a href="#" class="actionable text-link h1">Careers</a> -->
       		  </div>
       		</div>
      	</div>
    </div>
  </div>
</div>

<section class="post-content">
	<div class="container p5">
			<?php
				$term_list = array(); 
				$posttags = array();
				$term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
				$posttags = get_the_tags();
			?>
	  	<div class="row">
	  		<div class="col offset-xl-3 col-xl-6 col12">
	  			<?php if($posttags){ ?>
		  		<div class="single-post_cats_tags">
						<?php
						// list category here
							// if($term_list){
							// 	foreach ($term_list as $term) {
							// 		echo '<a href="'. get_term_link($term->term_id) . '" target="_self" class="list-tag">/'. $term->name .'</a>';
							// 	}
							// }

							// list tags here
							if($posttags){
								foreach ($posttags as $tag) {
									echo '<a href="'. get_term_link($tag->term_id) . '" target="_self" class="list-tag">/'. $tag->name .'</a>';							
								}
							}
						?>
					</div>
				<?php } ?>
				</div>
	  	</div>
	  	<div class="row">	  	
		    <div class="col  offset-xl-3 col-xl-6 col12">
		    	<a href="<?php echo get_site_url(); ?>/blog/" class="blog-back">
		    		<i class="fa fa-arrow-left"></i>
		    	</a>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<h1><?php the_title(); ?></h1>

					<div class="d-flex post-meta">
						<div class="mr-5">
							<label>Posted by:</label><br/>
							<?php the_author(); ?>
						</div>
						<div>
							<label>Published on:</label><br/>
							<?php the_date(); ?>
						</div>
					</div>

					<?php the_content(); ?>

					<?php endwhile; ?>
				<?php endif; ?>				
				<div class="row justify-content-between">
					<div class="col-6">
						<?php if (strlen(get_next_post()->post_title) > 0) { ?>
							<div class="next-post">
								<div class="next-title"><i class="fas fa-arrow-left"></i> Previous Blog</div>
				  				<?php next_post_link('%link'); ?>
							</div>
						<?php } ?>
					</div>

					<div class="col-6 text-right">
						<?php if (strlen(get_previous_post()->post_title) > 0) { ?>
							<div class="next-post">
								<div class="next-title">Next Blog <i class="fas fa-arrow-right"></i></div>
				  				<?php previous_post_link('%link'); ?>
							</div>
						<?php } ?>
					</div>
				</div>

		    </div>
	  	</div>


	</div>
</section>

<div class="container p5">
  <div class="row">
    <div class="col-12">
       <hr>
    </div>
  </div>
</div>

<?php get_footer(); ?>