<?php
/*
Template Name: Blog Page
*/

get_header(); ?>

	
	   <div class="container category">
         <div class="full-container accordion hire-page " >
<div id="blog" class="wrapper">
           		<div class="Center-Block main-page p-l-n aj-group">
				 <div class="content">
				 <h3 class="grid-title non-bdr" >&nbsp; </h3>
						<h1>Facebook and TED Team Up to Bring Exclusive Content to <span class="highlight"> 'Paper' </span>

						</h1>
						<div class="column-1 p-l-n">
						<div class="intro ">
					TED says its conferences provide "ideas worth spreading," and Facebook apparently agrees. Facebook and TED on Monday announced a content collaboration for Paper, the company's standalone news reader and publishing app released in late January.
<br><br>
For the week, the Ideas section of Paper will feature TED material exclusively. The Ideas section within the app typically changes each day to highlight a new theme or topic, but TED will be the featured topic for the entire week during its TED2014 conference in Vancouver, Canada.


						</div>
					 	<div class="ajency-detail">
							<a href="index.html">
								<img src="<?php echo site_url(); ?>/ajclib/images/ajency-logo.png"/>
							</a>
							<div class="contact-us">
								 <span style="color:#000;">+91 9975931402</span></br>
                             <a href="mailto:talktous@ajency.in" style="color:#000;">  talktous@ajency.in</a>
							</div>
						</div>
				   </div>
				   <div class="column-6 ">
					<div class="accord-contents">
						<div class="col-1">
							<div class="aj-live-tile">
							 <img src="<?php echo site_url(); ?>/ajclib/images/ted.jpg" class="is-reponsive">
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
                         $random = rand(0,6);
						 include 'post-styles/post-style-' . $random . '.php';
                   // endforeach; wp_reset_postdata(); ?>
        
     <?php endwhile; ?>
<?php endif; ?>
       <div class="Center-Block column-6 ">
               <h3 class="grid-title non-bdr">&nbsp;</h3>
           <div class="casestudy-content last-col">
            
                  <p>
						<ul class="footer-menu">
							<li> <a href="index.html">Home</a></li>
							<li> <a href="hiring.html">Working at ajency.in</a></li>
							<li> <a href="secondcareer.html">Second Carrer</a></li>
							<li> <a href="internship.html">Internship & Projects</a></li>
							<li> <a href="hiring.html">Web Developers </a></li>
						</ul>
						<b>
							JUMP TO NEXT <SPAN>PAGE <img src="<?php echo site_url(); ?>/ajclib/images/arrowRight.png" /></SPAN> 
							
						</b>
						<div class="share-intro">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit
						<div class="share-link">Like it Share it!</div>
						<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.ajency.in%2F&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
						</div>
                  </p>
               </div>
            </div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
