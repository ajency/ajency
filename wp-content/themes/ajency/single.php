<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		<!-- IE8 fallback moved below head to work properly. Added respond as well. Tested to work. -->
			<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
		
			<!-- respond.js -->
		<!--[if lt IE 9]>
		          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
		<![endif]-->	
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39249546-3', 'auto');
  ga('send', 'pageview');

</script>
	</head>
	
	<body <?php body_class(); ?>>
			<div class="spinner2">
				<div class="spinner"></div>
			</div>
			<!--<div class="aj-scroll-arrow">
				<img id="showMenu" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/threelines.png" />
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/arrowLeft.png" class="scroll-left"/>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/arrowRight.png" class="scroll-right"/> 
			</div>-->
			<!--<div id="scrollleft"></div>
			<div id="scrollright"></div>-->

			<div class="main-content-blog main-content panorama perspective effect-airbnb modalview scrollbar"  id="perspective">
				<div class="container contentHolder" id="CanScrollWithYAxis">
					<div>
				     		<div class="cb-image" >
			
		</div>
	
         <div class="full-container-blog full-container accordion  single-post   content-x" >
      
 <div class="wrapper">		   <!--Section Block 1 -->
           		<div class="Center-Block main-page p-l-n aj-group">
				 <div class="content">
				 <h3 class="grid-title non-bdr" >&nbsp; </h3>
						<h1>
							<?php 
								$title = get_the_title();
								$wordarray = explode(' ', $title); 
						        if (count($wordarray) > 1 ) { 
						          $wordarray[count($wordarray)-1] = '<span class="highlight">'.($wordarray[count($wordarray)-1]).'</span>'; 
						          $title = implode(' ', $wordarray);  
						        }
					        ?>
							<?php echo $title; ?>
						</h1>
						<div class="column-1 margin-none">
						<div class="intro ">
					       <?php the_excerpt(); ?> 
                            <br>
                            <div class="sm-text">
                            <?php while ( have_posts() ) : the_post(); ?>
                            
                        <!--  <?php
                             foreach((get_the_category()) as $category) {
                            
                             echo $category->cat_name . ' ';
                        
                             }
                             ?>| <?php the_date(); ?>
                          |-->
                           <span class="text-muted ">Posted by:</span> <?php the_author(); ?> 
                            </div>
                           <div class="tags">
                            <?php the_tags( '<span class="text-muted label-display">Tags:</span>', '', '<br />' ); ?> 
                        </div>
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
			 <div class="column-1  ">
					<div class="accord-contents ">
			
							<div class="aj-live-tile blog-img">
							 <?php if ( has_post_thumbnail()) : ?>
							  <?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
							   <div style="background: url('<?php echo esc_url( $src[0] ); ?>')center no-repeat ;    background-size:cover; "> </div>
							   
							 <?php endif; ?>
							</div> 
						
					</div>
					 
				   </div> 
				  
			</div>
			</div>
   <div class="Center-Block  content-mode center-blog <?php echo get_post_meta($post->ID, 'blog-class', true); ?>">
				<h3 class="grid-title non-bdr">&nbsp;</h3>
						<div class="reading-canvas">
							
							<?php the_content(); ?>
						   	<?php endwhile; // end of the loop. ?>
						</div>
				
			</div>
			 <div class="Center-Block scroll-indicator-container column-6">
                    <h3 class="grid-title non-bdr">&nbsp;</h3>
                    <div class="casestudy-content p-l-n casestudy-footer">
                   <p>
                    <B>FREQUENTLY VIEWED PAGES </B>
                        <ul>
                            <li><a href="https://ajency.in/">What we do</a></li>
                            <li><a href="https://ajency.in/hiring/">We are hiring</a></li>
                            <li><a href="https://ajency.in/stayconnected/">stay connected</a></li>
                            <li><a href="https://ajency.in/category/blog/">blog</a></li>
                            <li><a href="https://ajency.in/where-have-all-the-dwarves-gone/">WHERE HAVE ALL THE DWARVES GONE ?</a></li>
                            <li><a href="https://ajency.in/tuckshop-dilbert/">TUCKSHOP & DILBERT – THINGS WE LIKE TO SHOW OFF</a></li>
                        </ul>
                        <!-- <a href="#start">TO START </a> -->
                         <div class="share-intro" style="clear:both">

                                 <div class="share-link">
                                    <b><em>What's</em> not to like?</b>
                                 </div>
                                 <div class="fb-like-box" data-href="https://www.facebook.com/Ajency.in" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
                              <p class="footer-txt">(C) 2018 Ajency.in. All Right Reserved</p>
                              </div>

                   </p>
                    
                    </div>
                 </div>
<!--   <div class="Center-Block column-6 ">
               <h3 class="grid-title non-bdr">&nbsp;</h3>
           <div class=" last-col">
            
                  <p>
						<?php
							// $defaults = array(
							// 	'menu'            => 'footer-menu',
							// 	'container'       => false,
							// 	'menu_class'      => 'footer-menu',
							// 	'menu_id'         => '',
							// 	'echo'            => true,
							// 	'fallback_cb'     => 'wp_page_menu',
							// 	'before'          => '',
							// 	'after'           => '',
							// 	'link_before'     => '',
							// 	'link_after'      => '',
							// 	'depth'           => 0,
							// 	'walker'          => ''
							// );

							// wp_nav_menu( $defaults );
						?>
						
						<b>			<?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
							JUMP TO  <SPAN>NEXT PAGE  <a href="<?php echo get_permalink( $next_post->ID ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/arrowRight.png" /></a></SPAN>
						</b>
			

<?php endif; ?>
					   <div class="share-intro" style="clear:both">

                                 <div class="share-link">
                                    <b><em>What's</em> not to like?</b>
                                 </div>
                                 <div class="fb-like-box" data-href="https://www.facebook.com/Ajency.in" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
                              </div>
                  </p>
               </div>
            </div> -->
  
           
			        
            </div>
          
         </div>
     
<?php get_footer(); ?>