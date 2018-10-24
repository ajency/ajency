<?php 
/**
 *  Template Name: about Page
 */

	 avia_get_template();


	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */	
	 get_header();
 	 
	?>
		
		<!-- ####### MAIN CONTAINER ####### -->


		
  
  
  
		<div class='container_wrap <?php echo $avia_config['layout']; ?>' id='main'>
		
			<div class='container'><div class="tab_container"> <ul class="loadlink" style="list-style-image:none; float:left;">
<?php
  $ancestors = get_post_ancestors($post->ID);
  $parent = $ancestors[0];

$css_class = 'loadlink'.$page->ID;
  if($parent) { //if its a CHILD page

    echo wp_list_pages("title_li=&include=".$parent."&echo=0" );
    $children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$parent."&echo=0");

}  else { //if it's a PARENT page
    echo wp_list_pages("title_li=&include=".get_the_ID()."&echo=0");
    $children = wp_list_pages("title_li=&child_of=".get_the_ID()."&echo=0" );

	}
  if ($children) { ?>

  <?php echo $children; ?>

  </ul>

  <?php } ?></div>
<div id="result" > 
				<?php 
					if(empty($avia_config['slide_output'])) 
					{
						avia_title(); 
					}
					else
					{
						echo "<h1>".get_the_title(avia_get_the_id())."</h1>";
					}
				?>
				<div class='template-page content <?php echo $avia_config['content_class']; ?> units'>
<?php 
//Load Timeline only on tablets/desktops
if ( wpmd_is_notdevice() ) { ?>
<div id="lokus_timeline">
	<div id="timeline_wrapper">
		<div id="left_arrow"></div>
		<div id="timeline">
			<div id="timeline_horizontal">
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2002.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2002_1.jpg" />
					</div>
				</div>	
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2003.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2003_1.jpg" />
					</div>
				</div>
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2004.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2004_1.jpg" />
					</div>
					
				</div>
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2005.jpg" class="timeline_img"/>
					<div class="upper_img">
						<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
						<div class="viewport">
							<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2005_1.jpg" />
						</div>			
					</div>
					
				</div>
				<div class="portfolio">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2006.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2006_1.jpg" />
					</div>
				
				</div>
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2007.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2007_1.jpg" />
					</div>
					
				</div>
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2008.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2008_1.jpg" />
					</div>
					
				</div>
				<div class="portfolio">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2009.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2009_1.jpg" />
					</div>
				
				</div>
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2010.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2010_1.jpg" />
					</div>
					
				</div>
				<div class="portfolio">
<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2011.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2011_1.jpg" />
					</div>
					
				</div>
				<div class="portfolio">
					<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2012.jpg" class="timeline_img"/>
					<div class="upper_img">
						<img data-original="<?php echo get_bloginfo('template_url'); ?>/img/2012_1.jpg" />
					</div>
					
				</div>
				
			</div>	
		</div>	
		<div id="right_arrow"></div>
	
	</div>
	<div id="left_arrowsc"><span style=" margin-left: 45px;line-height: 27px;">Previous</span></div>
			<div id="right_arrowsc"><span style=" margin-left: -39px;line-height: 27px;">Next</span> </div>
</div>
	
<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.lazyload.js" ></script>
<!--<script src="jquery.tinyscrollbar.js" ></script>-->
<script>

var click_count	= 0;
var col_width	= 260;
var lazy_load_index = 5;

jQuery(document).ready(function($){
	
	//lazy load images
	$("img").lazyload({
		event : 'click'
	});
	
	//tiny scrollbar
	// $('.upper_img').tinyscrollbar();
	
	
	$('#right_arrow').click(function(){
		if(click_count >= (-1 * ($('.portfolio').length - 5)))
		{
			$('#timeline_horizontal').animate({left: '-=' + col_width});
			click_count--;	
			$('.portfolio').eq(lazy_load_index).find('img').click();
			lazy_load_index++;
		}	
	});
	$('#right_arrowsc').click(function(){
		if(click_count >= (-1 * ($('.portfolio').length - 5)))
		{
			$('#timeline_horizontal').animate({left: '-=' + col_width});
			click_count--;	
			$('.portfolio').eq(lazy_load_index).find('img').click();
			lazy_load_index++;
		}	
	});
	
	$('#left_arrow').click(function(){
		if(click_count < 0)
		{
			$('#timeline_horizontal').animate({left: '+=' + col_width});
			click_count++;	
		}
	});	
	
	$('#left_arrowsc').click(function(){
		if(click_count < 0)
		{
			$('#timeline_horizontal').animate({left: '+=' + col_width});
			click_count++;	
		}
	});
});

</script>	
<?php } ?>		
				
				
				<?php
				/* Run the loop to output the posts.
				* If you want to overload this in a child theme then include a file
				* called loop-page.php and that will be used instead.
				*/
				$avia_config['size'] = 'page';
				get_template_part( 'includes/loop', 'page' );
				?>
				
				
				<!--end content-->
				</div>
				
				<?php 

				//get the sidebar
				$avia_config['currently_viewing'] = 'page';
				get_sidebar();
				
				?>
				</div>
			</div><!--end container-->
			<p id="back-top">
		<a href="#top"><span></span>Back to Top</a>
	</p>
	</div>
	<!-- ####### END MAIN CONTAINER ####### -->
<script type="text/javascript">

var mypets=new ddajaxtabs("tab_container", "container")
mypets.setpersist(false)
mypets.setselectedClassTarget("link")
mypets.init()

</script>

<?php get_footer(); ?>