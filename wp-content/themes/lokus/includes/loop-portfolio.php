<?php 
/*
* The Loop for portfolio overview pages. Works in conjunction with the file template-portfolio.php and taxonomy-portfolio_entries.php
*/



global $avia_config;
$avia_config['avia_is_overview'] = true;

if ( wpmd_is_notphone() ) {
	if(isset($avia_config['new_query'])) { 
		
		$avia_config['new_query']['posts_per_page'] = -1;
		//$avia_config['new_query']['order'] = 'ASC';
		//$avia_config['new_query']['order_by'] = 'DESC';
		query_posts($avia_config['new_query']); 
	}
}
else {
	if(isset($avia_config['new_query'])) { 
		
		$avia_config['new_query']['posts_per_page'] = 40;
		//$avia_config['new_query']['orderby'] = 'rand';
		query_posts($avia_config['new_query']); 
	}
}

$loop_counter = 1;
// check if we got a page to display:
if (have_posts()) :
	
	$extraClass = 'first';
	$style = 'portfolio-entry-no-description';
	
	$grid = 'one_fourth';
	$image_size = 'portfolio';

	
	
	switch($avia_config['portfolio_columns'])
	{
		case "1": $grid = 'fullwidth';  $image_size = 'fullsize'; break;
		case "2": $grid = 'one_half';   break;
		case "3": $grid = 'one_third';  break;
		case "4": $grid = 'one_fourth'; break;
	}
	
	$avia_config['portfolio_columns_iteration'] = $avia_config['portfolio_columns'][0];
	if(!isset($avia_config['remove_portfolio_text'])) $style = 'portfolio-entry-description';
	
	
	$includeArray = "";
	if(isset($avia_config['new_query']['tax_query'][0]['terms'])) $includeArray = $avia_config['new_query']['tax_query'][0]['terms'];
	
	$args = array(
	
		'taxonomy'	=> 'portfolio_entries',
		'hide_empty'=> 0,
		'orderby' => 'slug',
		'include'	=> $includeArray
	
	);

	$categories = get_categories($args);
	$container_id = "";
	
	
	if(!isset($avia_config['portfolio_sorting']) || $avia_config['portfolio_sorting'] == 'yes')
	{
		if(!empty($categories[0]))
		{
		
			$output = '<div id="lokus_portfolio_sort" class="usual">';			
			$output .= "<ul style='margin-top: -45px;margin-left: -1px;'>";
			
			$selected_count = 1;
			foreach($categories as $category)
			{
				$selectedCls =  ($selected_count == 1 && !isset($_GET['lcat']))?'class="selected"':'';
				$selectedCls = (isset($_GET['lcat']) && ($_GET['lcat'] == $category->slug))? 'class="selected"' : $selectedCls;
				$output .= '<li><a href="#'.$category->slug.'_sort"'.$selectedCls.'>'.$category->cat_name.'</a></li>';
				$container_id .= $category->term_id;
				$selected_count++;
			}
			
			$output .= "</ul>";
			
			echo $output;
		}
	}
	
	if(!empty($categories[0]))
	{
		
		foreach($categories as $category)
		{
				
				echo '<div><div id="'.$category->slug.'_sort">';
				$box_count = 0 ;
				$second_last = 5;
				//iterate over the posts
				while (have_posts()) : the_post();	
				
					//get the categories for each post and create a string that serves as classes so the javascript can sort by those classes
					$sort_classes = "";
					$item_categories = get_the_terms( $id, 'portfolio_entries' );

					if(is_object($item_categories) || is_array($item_categories))
					{
						
						foreach($item_categories as $item_category):
						
							if($category->slug == $item_category->slug ):
							
							$box_count++;
						?>
							<div data-ajax-id='<?php echo get_the_ID();?>'class='post-entry post-entry-<?php echo get_the_ID();?> flex_column all_sort no_margin <?php echo $sort_classes.' '.$grid.' '.$extraClass.' '.$style; ?>'>
								
								<div class='inner-entry  tooltip_<?php echo get_the_ID();?>_<?php echo $item_category->slug;?>'>										
									<?php 
										//Display only image grid on phone
										if ( wpmd_is_device() ) {
											$project_logo = get_post_meta(get_the_ID(),'Project_logo',true); //get project logo link
											if($project_logo)
											{
											$permalink = get_permalink();
											echo '<a href="'.$permalink.'"><img src="'.$project_logo.'"/></a>';
											}
										}
										//Display Custom portfolio grid otherwise
										else {
											$project_logo = get_post_meta(get_the_ID(),'Project_logo',true); //get project logo link
											if($project_logo)
											{
											echo '<a href="javascript:void(0);"><img src="'.$project_logo.'"/></a>';
											}
											
											if(get_the_excerpt() != ''):
											
											$permalink = get_permalink();
											$permalink = add_query_arg('lcat',$item_category->term_id,$permalink);
											echo '<div class="hide_tooltip" id="tooltip_'.get_the_ID().'_'.$item_category->slug.'_html">
											<img src="'.$project_logo.'" rel="'.$permalink.'"/><p>'.get_the_excerpt().'</p>
											<a href="'.$permalink.'" id="tooltip_'.get_the_ID().'_'.$item_category->slug.'_html_mode" class="readmore"> Read More</a>
											<div class="clear"></div>
											</div>';

										?>
											<script>
											jQuery(window).load(function () {
													
													jQuery('.<?php echo "tooltip_".get_the_ID().'_'.$item_category->slug;?>').HoverAlls({
													modal:true,
													ends:'<?php echo (($box_count % $second_last ) == 0 || ($box_count % 6) == 0)? '-360px,0px' : '0px,0px'?>',
													returns:'0px,-1900px',
													speed_in:200,
													speed_out:200,
													bg_width:"370px",
													bg_height:"175px",
													target_container:"<?php  echo '#tooltip_'.get_the_ID().'_'.$item_category->slug.'_html'?>",
													overlay_class:"lokusInfoOverlay",
													container_class:"lokusInfoContainer",
													link_target:'_parent'
												});
											});
											</script>
									<?php endif;
										} ?>			
								
								
								</div>		        
							<!-- end post-entry-->
			
							</div>
												<?php 
							 $second_last = (($box_count % 6) == 0)? $second_last + 6 : $second_last;
							endif;
						endforeach;
					}

					$loop_counter++;
					$extraClass = "";

					if($loop_counter > $avia_config['portfolio_columns_iteration'])
					{
						$loop_counter = 1;
						$extraClass = 'first';
					}


				endwhile;
		echo '</div></div>'; //End Tab
		}
	}
	
	echo "</div>";	// EndIDTab
	
	if(!isset($avia_config['remove_pagination'] ))
	{
		echo "<div class='hr hr_invisible'></div>";
		echo avia_pagination();	
	}	
	echo "<!-- end -->"; //dont remove
	else: 
?>	
	
	<div class="entry">
		<h1 class='post-title'><?php _e('Nothing Found', 'avia_framework'); ?></h1>
		<p><?php _e('Sorry, no posts matched your criteria', 'avia_framework'); ?></p>
	</div>
	

<?php
	endif;
	
unset($avia_config['avia_is_overview']);		
?> 
<script type="text/javascript"> 
  jQuery(document).ready(function(){
	jQuery("#lokus_portfolio_sort ul").idTabs(function(id,list,set){ 
	jQuery("a",set).removeClass("selected").filter("[href='"+id+"']",set).addClass("selected"); 
		for(i in list) 
		  jQuery(list[i]).hide(); 
	   jQuery(id).fadeIn(); 
		return false; 
	  });
  });
  jQuery(document).ready(function(){
	jQuery('.readmore').click(function(){
		window.location.href = jQuery(this).attr('href');
	});
  });
</script>
	<p id="back-top">
		<a href="#top"><span></span>Back to Top</a>
	</p>
						
