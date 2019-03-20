<?php 
/*
*Template Name: Full Width Layout
*/
get_header();  ?>

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
            <a href="<?php echo get_site_url(); ?>/website-design/" class="actionable is-active text-link text-black h1">Website design</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="post-content">
	<div class="container p5">
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="row">
        <div class="col offset-xl-3 col-xl-6 col12">
          <h1><?php the_title(); ?></h1>
          <p class="body-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        </div>
      </div>

      <?php the_content(); ?>

      <?php endwhile; ?>
    <?php endif; ?>
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