<?php
/*
Template Name: Ajency Case Study
*/
?>

<?php get_header(); ?>
         
         <div class="full-container accordion ">
            <div class="wrapper">
               <div class="Center-Block case-study-page p-l-n aj-group">
                  <div class="content">
                     <h3 class="grid-title non-bdr" >&nbsp; </h3>
                     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                              
                     <h1>
                        <?php the_title(); ?>
                     </h1>
                     <div class=" margin-none">
                        <div class="intro">

                           <?php the_content(); ?>
                           
                        </div>

                        <div class="ajency-detail">
                           <div id="header">
                              <a href="#menu"></a>
                              Examples
                           </div>
                           <a href="<?php echo get_bloginfo('url'); ?>">
                           <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/ajency-logo.png"/>
                           </a>
                           <div class="contact-us">
                           <span style="color:#000;">+91 9975931402</span></br>
                             <a href="mailto:talktous@ajency.in" style="color:#000;">  talktous@ajency.in</a>
                           </div>
                        </div>
                     </div>
           
                          <?php endwhile; ?>
                        

                        <?php endif; ?>
                  </div>
               </div>
                   <?php dynamic_sidebar(get_post_meta($post->ID, 'sidebar', true)); ?>  
            
            </div>
                     
         </div>

<?php get_footer(); ?>