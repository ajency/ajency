<?php 
global $avia_config;
//var_dump(get_pages("title_li=&child_of=".$parent."&echo=0"));
	/*
	 * check which page template should be applied: 
	 * cecks for dynamic pages as well as for portfolio, fullwidth, blog, contact and any other possibility :)
	 * Be aware that if a match was found another template wil be included and the code bellow will not be executed
 	 * located at the bottom of includes/helper-templates.php
	 */
	 avia_get_template();


	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */	
	 get_header();
 	 
	?>
		
		<!-- ####### MAIN CONTAINER ####### -->


		
  
  
  
		<div class='container_wrap <?php echo $avia_config['layout']; ?> <?php page_bodyclass(); ?>' id='main'>
		
			<div class='container'><div  class="tab_container"> 
<?php if (is_home() ) { ?>

<?php } else { ?>
<ul class="loadlink" style="list-style-image:none; float:left;">
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

  <?php } ?>

<?php } ?>

</div>
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


<?php get_footer(); ?>