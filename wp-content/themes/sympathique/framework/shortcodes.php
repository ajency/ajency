<?php
/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

function button_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'color' => 'white',
      'text' => '',
	  'size' => 'medium',
      'url' => '',
      ), $atts ) );
		
	if($url) {
      return '<a class="button ' . $color .' '. $size . '" href="' . $url . '">' . $text . $content . '</a>';
	} else {
		return '<a class="button ' . $color . '" href="">' . $text . $content . '</a>';
	}
}

add_shortcode('button', 'button_shortcode');




/*-----------------------------------------------------------------------------------*/
/*	Countdown
/*-----------------------------------------------------------------------------------*/

function countdown_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'time' => 'January 1, 2014 00:00:00'
    ), $atts ) );
   
   	wp_enqueue_script('countdown', get_template_directory_uri() . '/js/jquery.countdown.js', array('jquery'), '1.6.3', false );
   	wp_enqueue_script('custom-countdown', get_template_directory_uri() . '/js/custom-countdown.js', array('countdown'), '1.0', false );
	
		
	//setting a random id
	$random_id_length = 3; 
	$rnd_id = crypt(uniqid(rand(),1)); 
	$rnd_id = strip_tags(stripslashes($rnd_id)); 
	$rnd_id = str_replace(".","",$rnd_id); 
	$rnd_id = strrev(str_replace("/","",$rnd_id)); 
	$rnd_id = str_replace(range(0,9),"",$rnd_id); 
	$rnd_id = substr($rnd_id,0,$random_id_length); 
	$rnd_id = strtolower($rnd_id);  
	
	$countdown_array = array( 'id' => $rnd_id, 'time' => $time );
	wp_localize_script( 'custom-countdown', 'dt_countdown', $countdown_array );
	
	return '<div id="'.$rnd_id.'"></div>';

}

add_shortcode( 'countdown', 'countdown_shortcode' );



/*-----------------------------------------------------------------------------------*/
/*	Clear
/*-----------------------------------------------------------------------------------*/

function clear_shortcode() {
   return '<div class="clear"></div>';
}

add_shortcode( 'clear', 'clear_shortcode' );



/*-----------------------------------------------------------------------------------*/
/*	Separator
/*-----------------------------------------------------------------------------------*/

function separator_shortcode() {
   return '<div class="separator"></div>';
}

add_shortcode( 'separator', 'separator_shortcode' );



/*-----------------------------------------------------------------------------------*/
/*	Space
/*-----------------------------------------------------------------------------------*/

function space_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'height' => '60'
    ), $atts ) );
   return '<div style="clear:both; width:100%; height:'.$height.'px"></div>';
}

add_shortcode( 'space', 'space_shortcode' );



/*-----------------------------------------------------------------------------------*/
/*	Line Break
/*-----------------------------------------------------------------------------------*/

function line_break_shortcode() {
	return '<br />';
}
add_shortcode( 'br', 'line_break_shortcode' );



/*-----------------------------------------------------------------------------------*/
/*	Lists
/*-----------------------------------------------------------------------------------*/

function list_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'icon' => 'check'
    ), $atts ) );
	
	return '<div class="customlist list-icon-'.$icon.'">'.do_shortcode($content).'</div>';
}

add_shortcode('list', 'list_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Taglines
/*-----------------------------------------------------------------------------------*/

function tagline_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => ''
    ), $atts ) );
	  
	return '<section class="intro"><h2>' . $title .'</h2><h5>'. $content .'</h5></section>';
}

add_shortcode('tagline', 'tagline_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Dropcaps
/*-----------------------------------------------------------------------------------*/

function dropcap_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'style' => '1',
		'text' => ''
    ), $atts ) );
	  
	return '<span class="dropcap' . $style . '">' . $text . $content .'</span>';
}

add_shortcode('dropcap', 'dropcap_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Highlighted text
/*-----------------------------------------------------------------------------------*/

function highlighted_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'color' => 'dark',
		'text' => ''
    ), $atts ) );
	  
	return '<span class="highlight ' . $color . '">' . $text . $content .'</span>';
}

add_shortcode('highlighted', 'highlighted_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Social Share Blog
/*-----------------------------------------------------------------------------------*/

function social_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => ''
    ), $atts ) );
	  
	$output = '';
	
	$output .= '<div class="share-options">';
		if(!empty($title)) { $output .= '<h6>'.$title.'</h6>'; }
		$output .= '<a href="" class="twitter-sharer" onClick="twitterSharer()"><i class="fa fa-twitter"></i></a>';
		$output .= '<a href="" class="facebook-sharer" onClick="facebookSharer()"><i class="fa fa-facebook"></i></a>';
		$output .= '<a href="" class="pinterest-sharer" onClick="pinterestSharer()"><i class="fa fa-pinterest"></i></a>';
		$output .= '<a href="" class="google-sharer" onClick="googleSharer()"><i class="fa fa-google-plus"></i></a>';
		$output .= '<a href="" class="delicious-sharer" onClick="deliciousSharer()"><i class="fa fa-share"></i></a>';
		$output .= '<a href="" class="linkedin-sharer" onClick="linkedinSharer()"><i class="fa fa-linkedin"></i></a>';
	$output .= '</div>';
	$output .= '<p></p>';
	
	return $output;
}

add_shortcode('social-block', 'social_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Cycle Carousel
/*-----------------------------------------------------------------------------------*/

function dt_cycle_carousel( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'slidetime' => 10000
    ), $atts ) );
	
	//setting a random id
	$random_id_length = 3; 
	$rnd_id = crypt(uniqid(rand(),1)); 
	$rnd_id = strip_tags(stripslashes($rnd_id)); 
	$rnd_id = str_replace(".","",$rnd_id); 
	$rnd_id = strrev(str_replace("/","",$rnd_id)); 
	$rnd_id = str_replace(range(0,9),"",$rnd_id); 
	$rnd_id = substr($rnd_id,0,$random_id_length); 
	$rnd_id = strtolower($rnd_id);   

	wp_enqueue_script('cycle');
	$token = wp_generate_password(5, false, false);
	wp_enqueue_script('custom-cycle', get_template_directory_uri() . '/js/custom-cycle.js', array('jquery'), '1.0', false );	
	wp_localize_script( 'custom-cycle', 'dt_cycle_' . $token, array( 'id' => $rnd_id, 'slidetime' => $slidetime) );	

	
	$output ='';
				
	$output .= '<div class="del_cycle" id="cycle_'.$rnd_id.'" data-token="' . $token .'">'.do_shortcode($content).'</div>';
	return $output;
}

add_shortcode( 'cycle-carousel', 'dt_cycle_carousel' );



/*-----------------------------------------------------------------------------------*/
/*	Contact Form Wrapper
/*-----------------------------------------------------------------------------------*/

function contact_wrapper_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => ''
    ), $atts ) );
	  
	return '<div id="contactform '.$class.'">'.do_shortcode($content).'</div>';
}

add_shortcode('form-wrapper', 'contact_wrapper_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/

function column_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'size' => 'one-half',
		'text' => '',
		'position' => ''
    ), $atts ) );

	if(!empty($position)) {
		return '<div class="percent-' . $size . ' column-' . $position . '"> '.do_shortcode($content).'</div>';
	} else {
		return '<div class="percent-' . $size . '"> ' .do_shortcode($content). '</div>';
	}
}

add_shortcode('column', 'column_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Pricing Table
/*-----------------------------------------------------------------------------------*/

//pricing table placebo

function pricing_table_placebo( $atts, $content = null ) {
	return do_shortcode($content);
}
add_shortcode( 'table_placebo', 'pricing_table_placebo' );


// body
function delicious_pricing_table( $atts, $content = null ) {
	global $dt_table;
	extract(shortcode_atts(array(
		'columns' => '4'
    ), $atts));
	
	$columnsNr = '';
	$finished_table = '';

	switch ($columns) {
		case '2':
			$columnsNr .= 'table-2';
			break;
		case '3':
			$columnsNr .= 'table-3';
			break;
		case '4':
			$columnsNr .= 'table-4';
			break;
		case '5':
			$columnsNr .= 'table-5';
			break;
		case '6':
			$columnsNr .= 'table-6';
			break;
	}

	do_shortcode($content);

	$columnContent = '';
	if (is_array($dt_table)) {

		for ($i = 0; $i < count($dt_table); $i++) {
			$columnClass = 'pricing-column'; $n = $i + 1;
			$columnClass .= ( $n % 2 ) ?  '' : ' even-column';
			$columnClass .= ( $dt_table[$i]['featured'] ) ?  ' featured-column' : '';
			$columnClass .= ( $n == count($dt_table) ) ?  ' last-column' : '';
			$columnClass .= ( $n == 1 ) ?  ' first-column' : '';
			$columnContent .= '<div class="'.$columnClass.' '.$columnsNr.'">'; 
			$columnContent .= '<div class="pricing-header">';
			if (( $dt_table[$i]['featured'] ) == '1' ) {
				$columnContent .= '<div class="column-shadow"></div>';
			}			
			$columnContent .='<div class="package-title">'.$dt_table[$i]['title'].'</div><div class="package-value"><span class="package-currency">'.$dt_table[$i]['currency'].'</span><span class="package-price">'.$dt_table[$i]['price'].'</span><span class="package-time">'.$dt_table[$i]['interval'].'</span></div></div>';
			$columnContent .= '<ul class="package-features">'.str_replace(array("\r\n", "\n", "\r", "<p></p>"), array("", "", "", ""), $dt_table[$i]['content']).'</ul>';
			$columnContent .= '</div>'; 
		}
		$finished_table = '<div class="pricing-table">'.$columnContent.'</div>';
	}
	
	$dt_table = '';
	
	return $finished_table;
	
}

add_shortcode('pricing-table', 'delicious_pricing_table');


// Single Column
function shortcode_pricing_column( $atts, $content = null ) {
	global $dt_table;
	extract(shortcode_atts(array(
		'title' => '',
		'price' => '',
		'currency' => '',
		'interval' => '',
		'featured' => 'false'
    ), $atts));
	
	$featured = strtolower($featured);
	
	$column['title'] = $title;
	$column['price'] = $price;
	$column['currency'] = $currency;
	$column['interval'] = $interval;
	$column['featured'] = ( $featured == 'true' || $featured == 'yes' || $featured == '1' ) ? true : false;
	$column['content'] = do_shortcode($content);
	
	$dt_table[] = $column;
	
}

add_shortcode('pricing-column', 'shortcode_pricing_column');


// signup area
function shortcode_signup( $atts, $content = null )
{	  
	return '<div class="signup">'. do_shortcode($content) .'</div>';
}

add_shortcode('signup', 'shortcode_signup');



/*-----------------------------------------------------------------------------------*/
/*	Clients Shortcode
/*-----------------------------------------------------------------------------------*/

function delicious_clients( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'images' => '',
		'title' => ''
    ), $atts ) );
		$array_images = explode(",", $images);
		
		$clientItem = '';
		
		$clientItem .= '<section class="homepage-clients">';
		if(!empty($title)) { 
			$clientItem .= '<h2>'.$title.'</h2>';
		}
		$clientItem .= '<ul class="clients">';
		
			foreach($array_images as $single_image) {
				
				$image_attributes = wp_get_attachment_image_src( $single_image );
				
				$clientItem .='<li>';
				$clientItem .='<a>';
				$clientItem .='<img src="'.$image_attributes[0].'" width="'. $image_attributes[1].'" height="'. $image_attributes[2].'" />';
				$clientItem .='</a>';
				$clientItem .='</li>';
			}
		$clientItem .= '</ul>'; 
		$clientItem .= '</section>'; 
		$clientItem .= '<div class="half-space"></div>'; 
	
	return $clientItem;
	
}

add_shortcode('clients', 'delicious_clients');



/*-----------------------------------------------------------------------------------*/
/*	Blog Grid Shortcode
/*-----------------------------------------------------------------------------------*/

function delicious_blog_grid($atts, $content = null) {
	extract(shortcode_atts(array(
		"number" => "6", 
		"columns" => "3",
		"categories" => ""
		
	), $atts));
	
	global $post;
	
	wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.0', false );	
	wp_enqueue_script('custom-isotope', get_template_directory_uri() . '/js/custom-isotope.js', array('isotope'), '1.0', false );
	wp_enqueue_script('custom-slides', get_template_directory_uri() . '/js/custom-slides.js', array('slides'), '1.0', false );
	wp_enqueue_script('jplayer');

	$blog_id = 'masonry-blog';
	$blog_class = 'columns-three';	
	
	if($columns == '3') {
		$blog_class = 'columns-three';
	}
	if($columns == '2') {
		$blog_class = 'columns-two';
	}
	
	$output = '';
		$blog_array_cats = get_terms('category', array('hide_empty' => false));
		if(empty($categories)) {
			foreach($blog_array_cats as $blog__array_cat) {
				$categories .= $blog__array_cat->slug .', ';
			}
		}
		
		$args = array(
			'orderby'=> 'post_date',
			'order' => 'date',
			'post_type' => 'post',
			'category_name' => $categories,
			'posts_per_page' => $number
		);
		
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		
			$output .= '<div class="blog-page">';
				$output .= '<section id="'. $blog_id.'" class="vc_blog_shortcode '.$blog_class.'">';	
		
				while ($my_query->have_posts()) : $my_query->the_post();
			
					ob_start();  
					get_template_part('format', get_post_format());  
					$result = ob_get_contents();  
					ob_end_clean();
					$output .= $result;
			
				endwhile; 
			
				$output .= '</section>';
			$output .= '</div>';	
			}
		wp_reset_query();
	return $output;
}

add_shortcode("blog-grid", "delicious_blog_grid");	



/*-----------------------------------------------------------------------------------*/
/*	Portfolio Grid Shortcode
/*-----------------------------------------------------------------------------------*/

function delicious_portfolio_grid($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => "Selected Works",
		"number" => "-1",
		"categories" => ""
	), $atts));
	
	global $post;
	
	
	//setting a random id
	$random_id_length = 4; 
	$rnd_id = crypt(uniqid(rand(),1)); 
	$rnd_id = strip_tags(stripslashes($rnd_id)); 
	$rnd_id = str_replace(".","",$rnd_id); 
	$rnd_id = strrev(str_replace("/","",$rnd_id)); 
	$rnd_id = str_replace(range(0,9),"",$rnd_id); 
	$rnd_id = substr($rnd_id,0,$random_id_length); 
	$rnd_id = strtolower($rnd_id);   

	wp_enqueue_script('cycle');
	$token = wp_generate_password(5, false, false);
	
	wp_enqueue_script('dt-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.0', false );	
	wp_enqueue_script('custom-grid', get_template_directory_uri() . '/js/custom-grid-shortcode.js', array('jquery', 'dt-isotope'), '1.0', false );
	
	wp_localize_script( 'custom-grid', 'dt_grid_' .$token, array( 'id' => $rnd_id));	
	
		$layout = get_post_meta($post->ID,'dt_portfolio_columns',true);
		$navig = get_post_meta($post->ID,'dt_portfolio_navigation',true);
		$nav_number = get_post_meta($post->ID,'dt_nav_number',true);	
		
		$cats = explode(",", $categories);
		
		$portfolio_categs = get_terms('portfolio_cats', array('hide_empty' => false));
		$categ_list = '';
		
		foreach ($cats as $categ) {
			foreach($portfolio_categs as $portfolio_categ) {
				if($categ === $portfolio_categ->name) {
					$categ_list .= $portfolio_categ->slug . ', ';
				}
			}
		}
			
		//fallback categories
			$args = array(
				'post_type'=>'portfolio',
				'taxonomy' => 'portfolio_cats'
			);		
			$categ_fall = get_categories( $args );
			$categ_use = array();
			$i = 0;
			foreach($categ_fall as $cate) {
				$categ_use[$i] = $cate->name; 
				$i++;
			}
			$cats = array_filter($cats);
			if(empty($cats)) {
				$cats = array_merge($cats, $categ_use);
			}			
			
			
			$term_list = '';
			$list = '';
			
			foreach ($cats as $cat) {
				$to_replace = array(' ', '/', '&');
				$intermediate_replace = strtolower(str_replace($to_replace, '-', $cat));
				$str = preg_replace('/--+/', '-', $intermediate_replace);
				if (function_exists('icl_t')) { 
				$term_list .= '<li><a href="#filter" data-option-value=".'. get_taxonomy_cat_ID($cat) .'">' . icl_t('Portfolio Category', 'Term '.get_taxonomy_cat_ID( $cat ).'', $cat) . '</a></li>';
				}
				else 
				$term_list .= '<li><a href="#filter" data-option-value=".'. get_taxonomy_cat_ID($cat) .'">' . $cat . '</a></li>';
				$list .= $cat . ', ';
			}		
			
		
	$output = '';
		$output .= '<section class="homepage-grid" id="gridwrapper_'.$rnd_id.'" data-token="' . $token .'">';
			$output .= '<div class="bgtitle"><h2>'.$title.'</h2></div>';
				$output .= '<section id="options">';
					$output .= '<ul id="home-filters" class="option-set clearfix" data-option-key="filter">';
						$output .= '<li><a href="#filter" data-option-value="*" class="selected active">'.__('All', 'delicious').'</a></li>';
						$output .= $term_list;
					$output .= '</ul>';
				$output .= '</section>';
				
			$output .= '<section id="portfolio-wrapper">';
				$output .= '<ul class="portfolio grid isotope grid_'.$rnd_id.'">';

				$args = array(
					'post_type'=>'portfolio',
					'posts_per_page' => $number,
					'term' => 'portfolio_cats',
					'portfolio_cats' => $categ_list
				);
				
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();

					$terms = get_the_terms( get_the_ID(), 'portfolio_cats' );
					$term_val = '';
					if($terms) { foreach ($terms as $term) { $term_val .=get_taxonomy_cat_ID($term->name) .' '; } }
					
					$portf_icon = get_post_meta($post->ID,'dt_portf_icon',true);						
						$portf_thumbnail = get_post_meta($post->ID,'dt_portf_thumbnail',true);	
						$portf_link = get_post_meta($post->ID,'dt_portf_link',true);					
						$thumb_id = get_post_thumbnail_id($post->ID);
						
						$image_url = wp_get_attachment_url($thumb_id);
						
						$grid_thumbnail = $image_url;
						$item_class = 'item-small';
						
						switch ($portf_thumbnail) {
							case 'portfolio-big':
								$grid_thumbnail = aq_resize($image_url, 550, 450, true);
								$item_class = 'item-wide';
								break;
							case 'portfolio-small':
								$grid_thumbnail = aq_resize($image_url, 265, 215, true);
								$item_class = 'item-small';
								break;
							case 'half-horizontal':
								$grid_thumbnail = aq_resize($image_url, 550, 215, true);
								$item_class = 'item-long';
								break;
							case 'half-vertical':
								$grid_thumbnail = aq_resize($image_url, 265, 450, true);
								$item_class = 'item-high';
								break;							
						}	
						
						//retrieve portfolio video
						if ($portf_icon == 'lightbox_to_video') {
							$portfolio_slide = get_post_meta($post->ID,'dt_slider_repeat',true);
								if(!empty($portfolio_slide)) {
									$get_video = array();
									$j=0;
									foreach ($portfolio_slide as $slide){
										$video = $slide['dt_video_field_id'];
										if (!empty($video)) {
											$get_video[$j] = $video;
											$j++;
										}
										
									}									
								}
								$video_output = '';
								$input_string = $get_video[0];
								$count = preg_match('/src=(["\'])(.*?)\1/', $input_string, $match);
								if ($count === FALSE) 
									$video_output = 'not found';
								else 
									$video_output = $match[2];					
						}

					$copy = $terms;
					$res = '';
					if($terms) {
						foreach ( $terms as $term ) {
							if (function_exists('icl_t')) { 
								$res .= icl_t('Portfolio Category', 'Term '.get_taxonomy_cat_ID( $term->name ).'', $term->name);
							}
							else $res .= $term->name;
							if (next($copy )) {
								$res .=  ', ';
							}
						}
					}					


					$output .= '<li class="isotope-item '.$term_val.' '.$item_class.'">';
					
					$test_link = '';
					switch($portf_icon) {
						case 'lightbox_to_image':
							$test_link = '<a href="'. wp_get_attachment_url($thumb_id) .'" rel="prettyPhoto" title="'. get_the_title() .'">';
							break;
						case 'link_to_page':
							$test_link = '<a href="'.get_permalink($post->ID).'">';
							break;
						case 'link_to_link':
							$test_link = '<a href="'.$portf_link.'">';
							break;							
						case 'lightbox_to_video':
							$test_link = '<a href="'.$video_output.'">';
							break;							
					}

						$output .= $test_link;
						$output .= '<div class="grid-item-on-hover">';
							$output .= '<div class="grid-text">';
								$output .= '<h1>'.get_the_title().'</h1>';
							$output .= '</div>';
							$output .= '<div><span>';	
								$output .= $res;
							$output	.='</span></div>';
							
						$output .= '</div>';
						$output .= '<div><img src="'. $grid_thumbnail.'" alt="" />';
						$output .= '</div></a>';
		
					$output .= '</li>';
				endwhile; 
				}
				wp_reset_query(); 
				$output .= '</ul>';
			$output .= '</section>';
	$output .= '</section>';
	$output .= '<div class="space"></div>';	
	return $output;
}

add_shortcode("portfolio-grid", "delicious_portfolio_grid");	



/*-----------------------------------------------------------------------------------*/
/*	Portfolio Carousel Shortcode
/*-----------------------------------------------------------------------------------*/

function delicious_portfolio_carousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => "Our Works",
		"number" => "8",
		"categories" => ""
	), $atts));
	
	global $post;
	
	wp_enqueue_script('carousel');
	wp_enqueue_script('touchwipe');
	wp_enqueue_script('portfolio-carousel');
	
	$output = '';
	
	$output = '<div class="bgtitle"><h2>'.$title.'</h2></div>';
	
	$output .= '<div id="portfolio-carousel-wrapper" class="any-carousel">';
		$output .= '<a href="#" class="jcarousel-control-prev"></a>';
		$output .= '<a href="#" class="jcarousel-control-next"></a>';
		$output .='<div id="portfolio-carousel">';
			$output .= '<ul>';
			
			$args = array(
				'orderby'=> 'post_date',
				'order' => 'date',
				'post_type' => 'portfolio',
				'posts_per_page' => $number,
				'term' => 'portfolio_cats',
				'portfolio_cats' => $categories
			);
			
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$terms = get_the_terms( get_the_ID(), 'portfolio_cats' );
				$output .= '<li>';
				
				$portf_icon = get_post_meta($post->ID,'dt_portf_icon',true);						
				$portf_link = get_post_meta($post->ID,'dt_portf_link',true);						
				$thumb_id = get_post_thumbnail_id($post->ID);
				
				// Check if wordpress supports featured images, and if so output the thumbnail
				if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 	
				
					if ($portf_icon == 'lightbox_to_image') {
						$output .= '<a href="'. wp_get_attachment_url($thumb_id). '" rel="prettyPhoto">';
							$output .= '<span class="item-on-hover">';
								$output .= '<span class="hover-image"></span>';
							$output .= '</span>';
							$output .= get_the_post_thumbnail(get_the_ID(), 'portfolio-thumb');
						$output .= '</a>';
					}
					else if ($portf_icon == 'link_to_page') {
						$output .= '<a href="'.get_permalink($post->ID).'">';
							$output .= '<span class="item-on-hover">';
								$output .= '<span class="hover-link"></span>';
							$output .= '</span>';
							$output .= get_the_post_thumbnail(get_the_ID(), 'portfolio-thumb');
						$output .= '</a>';
						
					}

					else if ($portf_icon == 'link_to_link') {
						$output .= '<a href="'.$portf_link.'">';
							$output .= '<span class="item-on-hover">';
								$output .= '<span class="hover-link"></span>';
							$output .= '</span>';
							$output .= get_the_post_thumbnail(get_the_ID(), 'portfolio-thumb');
						$output .= '</a>';
						
					}

					else if ($portf_icon == 'lightbox_to_video') {
					
						$portfolio_slide = get_post_meta($post->ID,'dt_slider_repeat',true);
							if(!empty($portfolio_slide)) {
								$get_video = array();
								$j=0;
								foreach ($portfolio_slide as $slide){
									$video = $slide['dt_video_field_id'];
									if (!empty($video)) {
										$get_video[$j] = $video;
										$j++;
									}
								}									
							}
							
							$video_output = '';
							$input_string = $get_video[0];
							$count = preg_match('/src=(["\'])(.*?)\1/', $input_string, $match);
								if ($count === FALSE) 
									$video_output = 'not found\n';
								else 
									$video_output = $match[2];	
									
							$output .= '<a href="'.$video_output.'">';
								$output .= '<span class="item-on-hover">';
									$output .= '<span class="hover-video"></span>';
								$output .= '</span>';
								$output .= get_the_post_thumbnail(get_the_ID(), 'portfolio-thumb');
							$output .= '</a>';
					}
					endif;
					
					$output .= '<div class="portfolio-carousel-details">';
						if ($portf_icon == 'link_to_link') {
							$output .= '<h3><a href="'. $portf_link .'">'. get_the_title() .'</a></h3>';
						}
						else {
							$output .= '<h3><a href="'. get_permalink($post->ID) .'">'. get_the_title() .'</a></h3>';
						}
						$output .= '<span>';
							if(!empty($terms)) {
								$copy = $terms;
									foreach ( $terms as $term ) {
									if (function_exists('icl_t')) { 
										$output .= icl_t('Portfolio Category', 'Term '.get_taxonomy_cat_ID( $term->name ).'', $term->name);
									}
									else {
										$output .= $term->name;
									}
										if (next($copy )) {
											$output .=  ', ';
										}
									}
							}
						$output .= '</span>';						
					$output .= '</div>';
				$output .= '</li>';
			endwhile; wp_reset_query(); 
			}
		$output .= '</ul>';
		$output .= '</div>';
	$output .='</div>';
	$output .= '<div class="space"></div>';	
	
	return $output;
}

add_shortcode("portfolio-carousel", "delicious_portfolio_carousel");



/*-----------------------------------------------------------------------------------*/
/*	Blog Carousel Shortcode
/*-----------------------------------------------------------------------------------*/

function delicious_homeblog_carousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => "From the Blog",
		"number" => "6",
		"categories" => ""
	), $atts));
	
	global $post;
	
		
	wp_enqueue_script('carousel');
	wp_enqueue_script('touchwipe');
	wp_enqueue_script('blog-carousel');
	
	$output = '';
	
	$output = '<div class="bgtitle"><h2>'.$title.'</h2></div>';
	
	$output .= '<div id="blog-carousel-wrapper" class="any-carousel">';
		$output .= '<a href="#" class="jcarousel-control-prev"></a>';
		$output .= '<a href="#" class="jcarousel-control-next"></a>';
		$output .='<div id="homeblog-carousel">';
			$output .= '<ul>';
			
		$blog_array_cats = get_terms('category', array('hide_empty' => false));
		if(empty($categories)) {
			foreach($blog_array_cats as $blog__array_cat) {
				$categories .= $blog__array_cat->slug .', ';
			}
		}
		
			$args = array(
				'orderby'=> 'post_date',
				'order' => 'date',
				'post_type' => 'post',
				'category_name' => $categories,
				'posts_per_page' => $number
			);
			
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$time = get_the_time(get_option('date_format'));

				$output .= '<li>';
				
					$output .= '<a href="'.get_permalink($post->ID).'">';
						$output .= '<span class="item-on-hover"></span>';
						if ( has_post_thumbnail() ) {
							$output .= get_the_post_thumbnail(get_the_ID(), 'blog-home-thumb');
						}
						else {
						
							$output .='<div class="homeblog-thumbnail">';
							$output .= dt_blog_icon($post->ID);
							$output .= '</div>';
						}							
					$output .= '</a>';
						$output .= '<div class="blog-carousel-details">';
							$output .= '<h2><a href="'.get_permalink($post->ID).'">'. get_the_title() .'</a></h2>';
							$output .= '<div class="carousel-meta">';
								$output .= '<span class="post-format">';
									$output .= dt_blog_icon($post->ID); 
								$output .= '</span>';
								$output .='<span class="details">';
								$output .= $time .' / '. get_comments_popup_link(__('No Comments &raquo;', 'delicious'), __('1 Comment &raquo;', 'delicious'), __('% Comments &raquo;', 'delicious'));
								$output .= '</span>';
							$output .= '</div>';
							$output .=  '<p>'.get_the_excerpt().'</p>';
						$output .= '</div>';
				$output .= '</li>';
			endwhile; wp_reset_query(); 
			}
		$output .= '</ul>';
		$output .= '</div>';
	$output .='</div>';
	$output .= '<div class="space"></div>';
	
	return $output;
}

add_shortcode("homeblog-carousel", "delicious_homeblog_carousel");




/*-----------------------------------------------------------------------------------*/
/*	Services Item
/*-----------------------------------------------------------------------------------*/

function delicious_services($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;
	
	$args = array(
		'post_type' => 'services',
		'posts_per_page' => 1,
		'p' => $id
	);
	
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
	while ($my_query->have_posts()) : $my_query->the_post();


	$service_icon = get_post_meta($post->ID, 'dt_service_icon', true);
	$service_text = get_post_meta($post->ID, 'dt_service_text', true);
	$service_style = get_post_meta($post->ID, 'dt_service_style', true);
	
	$service_class ='';
	
	if($service_style == "service-style-2") { $service_class = 'second-service';  }
		else 
	if($service_style == "service-style-1") { $service_class = 'homepage-services';  }
	
	$retour = '';
	$retour .= '<section class="'.$service_class.'">';
	$retour .='<div class="service-item">';
	$retour .= '<i class="fa '.$service_icon.'"></i>';
	$retour .='<h3 class="service">'.get_the_title().'</h3>';
	$retour .='<p class="clear">'.wp_kses_post($service_text).'</p>';
	$retour .='</div>';
	$retour .='</section>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("service", "delicious_services");



/*-----------------------------------------------------------------------------------*/
/*	Team Member
/*-----------------------------------------------------------------------------------*/

function delicious_member($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;

	$args = array(
		'post_type' => 'team',
		'posts_per_page' => 1,
		'p' => $id
	);
	
	$team_query = new WP_Query($args);
	if( $team_query->have_posts() ) :
	while ($team_query->have_posts()) : $team_query->the_post();
	
	$member_text = get_post_meta($post->ID, 'dt_member_text', true);
	$position = get_post_meta($post->ID, 'dt_member_position', true);
	$twitter = get_post_meta($post->ID, 'dt_member_twitter', true);
	$facebook = get_post_meta($post->ID, 'dt_member_facebook', true);
	$email = get_post_meta($post->ID, 'dt_member_mail', true);
	$linkedin = get_post_meta($post->ID, 'dt_member_linkedin', true);
	$google = get_post_meta($post->ID, 'dt_member_google', true);
	$clink = get_post_meta($post->ID, 'dt_member_link', true);
	
	$mail = is_email($email);
	
	$image = get_the_post_thumbnail( $id, 'member-thumb', array('class' => 'team-avatar') );
	$url_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	
	$retour ='';
	$retour .='<div class="team-member">';
		$retour .='<div class="team-details">';
			$retour .= $image;
			
			$retour .='<div class="team-text">';
				$retour .='<h3>';
				$retour .= get_the_title();
				$retour .='</h3>';
				if(!empty($position)) {
				$retour .='<h6>'.$position.'</h6>'; }
				$retour .='<p>'.wp_kses_post($member_text).'</p>';
			$retour .='</div>';
		
			$retour .='<div class="team-social">';
				if(!empty($mail)) {
				$retour .='<a href="mailto:'.$mail.'"><img src="'. get_template_directory_uri() .'/images/social/team-email.png" alt="Email Address" /></a>';  }	
				if(!empty($facebook)) {
				$retour .='<a href="'.esc_url($facebook).'"><img src="'. get_template_directory_uri() .'/images/social/team-facebook.png" alt="Facebook Profile" /></a>'; }				
				if(!empty($twitter)) {
				$retour .='<a href="'.esc_url($twitter).'"><img src="'. get_template_directory_uri() .'/images/social/team-twitter.png" alt="Twitter Page" /></a>'; }
				if(!empty($google)) {
				$retour .='<a href="'.esc_url($google).'"><img src="'. get_template_directory_uri() .'/images/social/team-google.png" alt="Google+ Profile" /></a>'; }						
				if(!empty($linkedin)) {
				$retour .='<a href="'.esc_url($linkedin).'"><img src="'. get_template_directory_uri() .'/images/social/team-linkedin.png" alt="Linkedin Profile" /></a>'; }	
				if(!empty($clink)) {
				$retour .='<a href="'.esc_url($clink).'"><img src="'. get_template_directory_uri() .'/images/social/link.png" alt="" /></a>'; }							
			$retour .='</div>';
		$retour .='</div>';
	$retour .='</div>';

	 endwhile; else:
	 $retour ='';
	 $retour .= "nothing found.";
	 endif;

    //Reset Query
    wp_reset_query();
	
	return $retour;
}
add_shortcode("team-member", "delicious_member");



/*-----------------------------------------------------------------------------------*/
/*	Portfolio Homepage Carousel
/*-----------------------------------------------------------------------------------*/

function delicious_portfolio($atts, $content = null) {
	extract(shortcode_atts(array(
		"items" => '5',
		"title" => 'RECENT PROJECTS'
	), $atts));
	
	global $post;
	
	$retour ='';
	$retour .= '<div class="centered-wrapper">';
	$retour .= '<section>';
	$retour .= '<div class="bgtitle"><h2>';
	$retour .= $title;
	$retour .= '</h2></div>';
	$retour .= '<ul id="mycarousel">';
	
		$args = array(
			'orderby'=> 'post_date',
			'order' => 'rand',
			'post_type' => 'portfolio',
			'posts_per_page' => $items
		);
		
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post();
			
			$portf_icon = get_post_meta($post->ID,'dt_portf_icon',true);	
			$thumb_id = get_post_thumbnail_id($post->ID);

			$mythumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumb');
			
			if ( has_post_thumbnail() ) { 
				$retour .='<li>';

				if ($portf_icon == 'lightbox_to_image') {  
					$retour .='<a href="'. wp_get_attachment_url($thumb_id) .'" title="'. get_the_title() .'" rel="prettyPhoto">';
					$retour .='<span class="item-on-hover"><span class="hover-image"></span></span>';
					$retour .='<img src="'. $mythumbnail[0] .'" height="'. $mythumbnail[2] .'" width="'. $mythumbnail[1] .'" alt="'. get_the_title() .'" /></a>';						
				}				
				
				else 		
				if ($portf_icon == 'link_to_page') {
					$retour .='<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
					$retour .='<span class="item-on-hover"><span class="hover-link"></span></span>';
					$retour .='<img src="'. $mythumbnail[0] .'" height="'. $mythumbnail[2] .'" width="'. $mythumbnail[1] .'" alt="'. get_the_title() .'" /></a>';
				}
					
				else 
				if ($portf_icon == 'lightbox_to_video') {
					$portfolio_slide = get_post_meta($post->ID,'dt_slider_repeat',true);
						if(!empty($portfolio_slide)) {
							$get_video = array();
							$j=0;
							foreach ($portfolio_slide as $slide){
								$video = $slide['dt_video_field_id'];
								if (!empty($video)) {
									$get_video[$j] = $video;
									$j++;
								}	
							}									
						}
						
						$input_string = $get_video[0];
						$ret_video = '';
						$count = preg_match('/src=(["\'])(.*?)\1/', $input_string, $match);
						if ($count === FALSE) 
							$ret_video = 'not found';
						else 
							$ret_video = $match[2] ;						

					$retour .='<a href="'. $ret_video .'" title="'. get_the_title() .'">';
					$retour .='<span class="item-on-hover"><span class="hover-video"></span></span>';
					$retour .='<img src="'. $mythumbnail[0] .'" height="'. $mythumbnail[2] .'" width="'. $mythumbnail[1] .'" alt="'. get_the_title() .'" /></a>';			
				}
					
				$retour .='<span class="caption"><a href="'. get_permalink() .'">'. get_the_title() .'</a></span>';
				$retour .='</li>';
			}
			endwhile; wp_reset_query(); }
		$retour .='</ul>';
	$retour .='</section>';
	$retour .='</div><!--end centered-wrapper-->';
	
		return $retour;

}

add_shortcode("portfolio", "delicious_portfolio");



/*-----------------------------------------------------------------------------------*/
/*	Testimonial Item
/*-----------------------------------------------------------------------------------*/

function delicious_testimonials($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;
	
	$args = array(
		'post_type' => 'testimonials',
		'posts_per_page' => 1,
		'p' => $id
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
	while ($my_query->have_posts()) : $my_query->the_post();
	
	$testimonial_desc = get_post_meta($post->ID, 'dt_testimonial_desc', true);	
	$testimonial_name = get_post_meta($post->ID, 'dt_testimonial_name', true);	
	$testimonial_details = get_post_meta($post->ID, 'dt_testimonial_details', true);	
	
	$retour ='';
	
	$retour .='<div class="testimonial-wrap">';
	$retour .='<div class="testimonial-item">';
	$retour .='<p>'.wp_kses_post($testimonial_desc).'</p>';
	$retour .='<div class="testimonial-pin"></div>';
	$retour .='<div class="testimonial-meta">';
	$retour .='<h5>'.esc_html($testimonial_name).'</h5>, <span>'.wp_kses_post($testimonial_details).'</span>';
	$retour .='</div>';
	$retour .='</div>';
	$retour .='</div>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("testimonial", "delicious_testimonials");



/*-----------------------------------------------------------------------------------*/
/*	CF7 Shortcode Hack
/*-----------------------------------------------------------------------------------*/

add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

function mycustom_wpcf7_form_elements( $form ) {
$form = do_shortcode( $form );

return $form;
}





/*-----------------------------------------------------------------------------------*/
/*	Blog Feed Shortcode
/*-----------------------------------------------------------------------------------*/

function delicious_blog_feed($atts, $content = null) {
	extract(shortcode_atts(array(
		"number" => "6",
		"categories" => ""
	), $atts));
	
	global $post;
	
	$output = '';
			
		$blog_array_cats = get_terms('category', array('hide_empty' => false));
		if(empty($categories)) {
			foreach($blog_array_cats as $blog__array_cat) {
				$categories .= $blog__array_cat->slug .', ';
			}
		}
		
			$args = array(
				'orderby'=> 'post_date',
				'order' => 'date',
				'post_type' => 'post',
				'category_name' => $categories,
				'posts_per_page' => $number
			);

			$output .= '<ul class="blog-feed-list">';
			
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$time = get_the_time(get_option('date_format'));

				
					$output .= '<li>';
					$output .= '<div class="thumbnail-side">';
						$output .= '<a href="'.get_permalink($post->ID).'">';
							if ( has_post_thumbnail() ) {
								$output .= get_the_post_thumbnail(get_the_ID(), 'blog-feed-thumb');
							}
							else {
							
								$output .='<div class="feed-thumbnail">';
								$output .= dt_blog_icon($post->ID);
								$output .= '</div>';
							}							
						$output .= '</a>';
					$output .= '</div>';
						$output .= '<div class="blog-feed-details">';
							$output .= '<h2><a href="'.get_permalink($post->ID).'">'. get_the_title() .'</a></h2>';
							$output .= '<div class="carousel-meta">';
								$output .= '<span class="post-format">';
									$output .= dt_blog_icon($post->ID); 
								$output .= '</span>';
								$output .='<span class="details">';
								$output .= $time .' / '. get_comments_popup_link(__('No Comments &raquo;', 'delicious'), __('1 Comment &raquo;', 'delicious'), __('% Comments &raquo;', 'delicious'));
								$output .= '</span>';
							$output .= '</div>';
							$output .=  '<p>'.get_the_excerpt().'</p>';
						$output .= '</div>';
					$output .= '</li>';
				
			endwhile; wp_reset_query(); 
			}
		$output .= '</ul>';
	$output .= '<div class="space"></div>';
	
	return $output;
}

add_shortcode("dt-blog-feed", "delicious_blog_feed");





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes Filter
/*-----------------------------------------------------------------------------------*/
add_filter("the_content", "dt_the_content_filter");
 
function dt_the_content_filter($content) {
 
	// array of custom shortcodes
	$block = join("|",array("list","social-block", "cycle-carousel", "pricing-column", "pricing-table"));
 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
 
	return $rep;

}

// enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

?>