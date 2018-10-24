<?php
// Your php code goes here

function designdesk_scripts_styles() {
	wp_register_script(
		'custom_script',
		get_bloginfo('stylesheet_directory') . '/js/custom.js',
		array('jquery'),
		'1.0'
	);
	wp_enqueue_script('custom_script');

	wp_register_style(
		'font-awesome',
		'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'
	);
	wp_enqueue_style( 'font-awesome' );
}

add_action('wp_enqueue_scripts', 'designdesk_scripts_styles');


function pw_loading_scripts_wrong_again() {
	wp_enqueue_script('custom-js', get_bloginfo('stylesheet_directory') . '/js/backend-meta.js');
}
add_action('admin_init', 'pw_loading_scripts_wrong_again');



// add_action( 'after_setup_theme', 'child_theme_setup' );

// function child_theme_setup() {
//    remove_shortcode( 'gallery_fullwidth' );
//    add_shortcode('gallery_fullwidth', 'hb_gallery_fullwidth_shortcode');
// }

// function hb_gallery_fullwidth_shortcode($params = array()) {

// 	extract(shortcode_atts(array(
// 		'count' => '-1',
// 		'columns' => '4',
// 		'ratio' => 'ratio1',
// 		'orientation' => 'landscape',
// 		'category' => '',
// 		'orderby' => 'date',
// 		'order' => 'DESC',
// 		'animation' => '',
// 		'animation_delay' => '',
// 		'class' => ''
// 	), $params));


// 	if ( $class != '' ){
// 		$class = ' ' . $class;
// 	}
// 	if ($animation != ''){
// 		$animation = ' hb-animate-element ' . $animation;
// 	}

// 	if ($animation_delay != ''){
// 		// Remove ms or s, if entered in the attribute
// 		if ( substr($animation_delay, -2) == 'ms' ){
// 			$animation_delay = substr($animation_delay, 0, -2);
// 		}

// 		if ( substr($animation_delay, -1) == 's' ){
// 			$animation_delay = substr($animation_delay, 0, -1);
// 		}

// 		$animation_delay = ' data-delay="' . $animation_delay . '"';
// 	}

// 	$output = "";
// 	$image_dimensions = get_image_dimensions ( $orientation, $ratio, 1000 );


// 	if ( $category ) {
// 		$category = str_replace(" ", "", $category);
// 		$category = explode(",", $category);

// 		$queried_items = new WP_Query( array( 
// 				'post_type' => 'gallery',
// 				'orderby' => $orderby,
// 				'order' => $order,
// 				'status' => 'publish',
// 				'posts_per_page' => $count,
// 				'tax_query' => array(
// 						array(
// 							'taxonomy' => 'gallery_categories',
// 							'field' => 'slug',
// 							'terms' => $category
// 						)
// 					)			
// 		));
// 	} else {
// 		$queried_items = new WP_Query( array( 
// 				'post_type' => 'gallery',
// 				'orderby' => $orderby,
// 				'order' => $order,
// 				'posts_per_page' => $count,
// 				'status' => 'publish',
// 			));
// 	}

// 	if ( $queried_items->have_posts() ) :

// 	$output .= '<div class="shortcode-wrapper shortcode-portfolio-fullwidth gallery-carousel-wrapper-2' . $class . $animation . '"' . $animation_delay . '>';
// 	$output .= '<div class="fw-section without-border light-text">';
// 	$output .= '<div class="content-total-fw">';
// 	$output .= '<div class="hb-fw-elements columns-' . $columns . '">';

// 	while ( $queried_items->have_posts() ) : $queried_items->the_post();
// 		$thumb = get_post_thumbnail_id(); 
// 		$image = hb_resize( $thumb, '', $image_dimensions['width'], $image_dimensions['height'], true );
// 		$full_image = wp_get_attachment_image_src($thumb,'full');
// 		$gallery_attachments = rwmb_meta('hb_gallery_images', array('type' => 'plupload_image', 'size' => 'full') , get_the_ID());
// 		$unique_id = rand(1,10000);
// 		$custom_color = vp_metabox('gallery_settings.hb_gallery_custom_bg_color');

// 		if ($custom_color){
// 			$custom_color = ' style="background: ' . hb_color($custom_color, 0.85) . ';"';
// 		} else {
// 			$custom_color = "";
// 		}

// 		if ( !$image && !empty($gallery_attachments))
// 		{
// 			reset($gallery_attachments);
// 			$thumb = key($gallery_attachments);
// 			$image = hb_resize( $thumb, '', $image_dimensions['width'], $image_dimensions['height'], true );
// 			$full_image = wp_get_attachment_image_src($thumb,'full');
// 		}

// 		$output .= '<div class="hb-fw-element">';
// 		$output .= '<a href="' . $full_image[0] . '" rel="prettyPhoto[gallery_' . $unique_id . ']">';

// 		if ( $image )
// 			$output .= '<img src="' . $image['url'] . '" width="'. $image['width'] .'" height="'. $image['height'] .'" alt="' . get_the_title() . '"/>';
		
// 		$output .= '<div class="item-overlay-text"'.$custom_color.'>';
// 		$output .= '<div class="item-overlay-text-wrap">';
// 		$output .= '<h4><span class="hb-gallery-item-name">THE TITLE' . get_the_title() . '</span></h4>';
// 		$output .= '<div class="hb-small-separator"></div>';
// 		$output .= '<span class="item-count-text">' . get_the_time('j M Y') . '</span>';
// 		$output .= '</div>';
// 		$output .= '</div>';
// 		$output .= '</a>';
// 		$output .= '</div>';

// 		if ( !empty ( $gallery_attachments ) ) {
// 			$output .= '<div class="hb-reveal-gallery">';
// 			foreach ( $gallery_attachments as $gal_id => $gal_att ) {
// 				if( $gal_id != $thumb )
// 					$output .= '<a href="' . $gal_att['url'] . '" title="' . $gal_att['description'] . '" rel="prettyPhoto[gallery_' . $unique_id . ']"></a>';
// 			}
// 			$output .= '</div>';
// 		}

// 	endwhile;

// 	$output .= '</div>';
// 	$output .= '</div>';
// 	$output .= '</div>';
// 	$output .= '</div>';

// 	endif;
	
// 	wp_reset_query();

// 	return $output;  
// }

	wp_enqueue_script('jquery');

    function my_action(){
        $selector = $_POST['name'];
        $selector = str_replace('.','',$selector);
        $gallery_posts = new WP_Query( array(
					'post_type' => 'gallery',
					'orderby' => NULL,
					'order' => 'ASC',
					'paged' => 1,
					'posts_per_page' => -1,
					'ignore_sticky_posts' => true,
					'post_status' => 'publish',
				));
        $gallery_columns_count = vp_metabox('gallery_standard_page_settings.hb_gallery_columns');
		if ( !$gallery_columns_count ) $gallery_columns_count = 1;

        foreach($gallery_posts->posts as $post)
        {
        	$filters = wp_get_post_terms($post->ID , 'gallery_categories' , array("fields"=>"slugs"));
        	if(in_array($selector,$filters) || $selector == '*')
        	{
        		?><?php
					$filters_names = wp_get_post_terms($post->ID , 'gallery_categories' , array("fields"=>"names"));
					$id = get_the_time('c',$post->ID);
					//var_dump($id);
					$filters_string = implode ( $filters , " ");
					$filters_names_string = implode ($filters_names, ", ");
					$thumb = get_post_thumbnail_id($post->ID);
					$thumb_width = 400;
					$thumb_height = 300;
					$image = hb_resize( $thumb, '', $thumb_width, $thumb_height, true );
					$full_image = wp_get_attachment_image_src($thumb,'full');
					$gallery_rel = $post->ID;
					$custom_color = vp_metabox('gallery_settings.hb_gallery_custom_bg_color');

					if ($custom_color){
						$custom_color = ' style="background: ' . hb_color($custom_color, 0.85) . ';"';
					} else {
						$custom_color = "";
					}
					$gallery_attachments = rwmb_meta('hb_gallery_images', array('type' => 'plupload_image', 'size' => 'full') , $post->ID);
					if ( !$image && !empty($gallery_attachments))
					{
						reset($gallery_attachments);
						$thumb = key($gallery_attachments);
						$image = hb_resize( $thumb, '',  $thumb_width, $thumb_height, true );
						$full_image = wp_get_attachment_image_src($thumb,'full');
					}
					?>
					<!-- BEGIN .standard-gallery-item-wrap -->
					<div class="col-<?php echo 4; ?> standard-gallery-item-wrap <?php echo $filters_string; ?>" style = "display:block;">

						<!-- BEGIN .standard-gallery-item -->
						<div class="standard-gallery-item" data-value="<?php echo $id; ?>" style="opacity:1">
							<div class="hb-gal-standard-img-wrapper">
								<a class="theprettygallery" href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery_<?php echo $gallery_rel ?>]" title="<?php echo $gal_att['description']; ?>"
									data-location="<?php echo get_post_custom_values('a_popup_location', $post->ID)[0]; ?>"
									<?php if ( $filters_names_string ) { ?>
									data-category="<?php echo get_post_custom_values('a_popup_area', $post->ID)[0]; ?>"
									data-project="<?php echo $filters_names_string; ?>"
									<?php } ?>
									data-title="<?php echo $post->post_title; ?>"
									data-theid="<?php echo $post->ID; ?>">

									<span class="hidden">
										Set by me: <?php print_r( $thumb_width . $thumb_height ); ?>
										<br>
										the ID: <?php print_r( $thumb ); ?>
										<br>
										Width: <?php print_r( $image_dimensions['width'] ); ?>
										<br>
										Height: <?php print_r( $image_dimensions['height'] ); ?>
										<br>
										Image: <?php print_r( $image ); ?>
									</span>
									<img src="<?php echo $image['url']; ?>" style="display:block"/>

									<div class="item-overlay"></div>
									<div class="item-overlay-text"<?php echo $custom_color; ?>>
										<div class="item-overlay-text-wrap">
											<span class="plus-sign"></span>
										</div>
									</div>
								</a>
								<div class="theneededdata" style="display: none;">
									<div class="nee-thetask"><?php echo get_post_custom_values('a_popup_ourtask', $post->ID)[0]; ?></div>
									<div class="nee-fulldesc"><?php echo $post->post_content; ?></div>
								</div>
							</div>

							<?php if ( !empty ( $gallery_attachments ) ) { ?>
								<div class="hb-reveal-gallery">
									<?php foreach ( $gallery_attachments as $gall_key => $gal_att ) {
										if ( $gall_key != $thumb) { ?>
										<a href="<?php echo $gal_att['url']; ?>" title="<?php echo $gal_att['description']; ?>" rel="prettyPhoto[gallery_<?php echo $gallery_rel; ?>]"></a>
									<?php } } ?>
								</div>
							<?php } ?>

							<div class="hb-gal-standard-description">
								<h3><a><span class="hb-gallery-item-name"><?php echo $post->post_title; ?></span></a></h3>
								<?php if ( $filters_names_string ) { ?>
									<div class="hb-small-separator"></div>
									<div class="hb-gal-standard-count"><?php echo $filters_names_string; ?></div>
								<?php } ?>
							</div>

						</div>
						<!-- END .standard-gallery-item -->

					</div>
					<!-- END .standard-gallery-item-wrap -->
				<?php
        	}
        }
        wp_die();
    }
    add_action('wp_ajax_my_action', 'my_action');
    add_action('wp_ajax_nopriv_my_action', 'my_action'); // not really needed
?>