<?php get_header();  ?>

<div class="container p5">
  <div class="row">
    <div class="col  offset-xl-2 col-xl-8 col12">
       <div class="headerfix ">
         <div class="bread-crumb">
         	<h1 class="ft6 pt-6">
         		<span>/</span> <a href="#" class="text-link text-black">blog </a>
         	</h1>
         </div>
      </div>
    </div>
  </div>
</div>

<section class="post-content">
	<div class="container p5">
	  	<div class="row">
		    <div class="col  offset-xl-2 col-xl-8 col12">
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

				<?php if (strlen(get_previous_post()->post_title) > 0) { ?>
					<div class="next-post">
						<div class="next-title">Next Blog <i class="fas fa-arrow-right"></i></div>
		  				<?php previous_post_link('%link'); ?>
					</div>
				<?php } ?>
		    </div>
	  	</div>


	</div>
</section>


<?php get_footer(); ?>