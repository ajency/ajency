<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	
	   
         <div class="full-container accordion blog-page content-x" >
<div id="blog" class="wrapper">
           	
				<div class="Center-Block main-page p-l-n aj-group">
				 <div class="content">
				 <h3 class="grid-title non-bdr" >&nbsp; </h3>
						<h1>
							<?php 
								$title = single_cat_title( '', false );
								$wordarray = explode(' ', $title); 
						        if (count($wordarray) > 1 ) { 
						          $wordarray[count($wordarray)-1] = '<span class="highlight">'.($wordarray[count($wordarray)-1]).'</span>'; 
						          $title = implode(' ', $wordarray);  
						        }
								echo $title; 
							?>
						</h1>
						<div class="column-1 margin-none">
						<div class="intro ">
							<?php echo category_description(); ?>
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
                              <a href="#" style="color:#000;">+91 9975931402</a></br>
                              talktous@ajency.in
                           </div>
                        </div>
				   </div>
				   <div class="column-1 ">
					<div class="accord-contents">
						    <div class="last-col">
							
				<?php
							$defaults = array(
								'menu'            => 'footer-menu',
								'container'       => false,
								'menu_class'      => 'footer-menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'depth'           => 0,
								'walker'          => ''
							);

							wp_nav_menu( $defaults );
						?>
                                   <div class="share-intro" style="clear:both">

                                 <div class="share-link">
                                    <b><em>What's</em> not to like?</b>
                                 </div>
                                 <div class="fb-like-box" data-href="https://www.facebook.com/Ajency.in" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
                              </div>
						
						
						</div>
					</div>
					 
				   </div>
				  
			</div>
			</div> 
		
<?php if(have_posts()) : $nextpost = 0;
      while(have_posts()) : the_post();
                    /*$current_date ="";
                    $count_posts = wp_count_posts();
                    
                    $published_posts = $count_posts->publish;
                    $myposts = get_posts(array('posts_per_page'=>$published_posts)); 
					foreach($myposts as $post) :
                         $nextpost++;
                         setup_postdata($post);*/
                        
						 include 'post-styles/post-style-2.php';
                   // endforeach; wp_reset_postdata(); ?>
        
     <?php endwhile; ?>
<?php endif; ?>
      <div class="Center-Block scroll-indicator-container column-6">
                    <h3 class="grid-title non-bdr">&nbsp;</h3>
                    <div class="casestudy-content p-l-n casestudy-footer">
                   <p>
                    <B>FREQUENTLY VIEWED PAGES </B>
                        <ul>
                            <li><a href="http://ajency.in/">What we do</a></li>
                            <li><a href="http://ajency.in/hiring/">We are hiring</a></li>
                            <li><a href="http://ajency.in/stayconnected/">stay connected</a></li>
                            <li><a href="http://ajency.in/category/blog/">blog</a></li>
                            <li><a href="http://ajency.in/where-have-all-the-dwarves-gone/">WHERE HAVE ALL THE DWARVES GONE ?</a></li>
                            <li><a href="http://ajency.in/tuckshop-dilbert/">TUCKSHOP & DILBERT – THINGS WE LIKE TO SHOW OFF</a></li>
                        </ul>
                       <!--  <a href="#start">TO START </a> -->
                         <div class="share-intro" style="clear:both">

                                 <div class="share-link">
                                    <b><em>What's</em> not to like?</b>
                                 </div>
                                 <div class="fb-like-box" data-href="https://www.facebook.com/Ajency.in" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
                              <p class="footer-txt">(C) 2015 Ajency.in. All Right Reserved</p>
                              </div>

                   </p>
                      
                    </div>
                 </div>
		</div>
	</div>

<?php get_footer(); ?>
