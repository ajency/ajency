<?php

	function wpb_adding_styles() {
		wp_enqueue_style('my_stylesheet', get_stylesheet_directory_uri() . '/custom.css');
	}
	add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );

	function new_excerpt_length($length) {
	    return 50;
	}
	add_filter('excerpt_length', 'new_excerpt_length');

	// Changing excerpt more
	function new_excerpt_more($more) {
		global $post;
		return '… <a href="'. get_permalink($post->ID) . '">' . 'VIEW MORE...' . '</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


	function mars_video_meta(){
		global $post, $videotube;
		if( get_post_type( $post->ID ) != 'video' )
			return;
		$viewed = get_post_meta($post->ID,'count_viewed',true) ? get_post_meta($post->ID,'count_viewed',true) : 1;
		$datetime_format = isset( $videotube['datetime_format'] ) ? $videotube['datetime_format'] : 'videotube';
		$comments = wp_count_comments( $post->ID );
		$block = '
			<div class="meta dartmeta">';
				if( $datetime_format != 'videotube' ){
					$block .= '<span class="date">'.get_the_date().'</span>';
				}
				else{
					$block .= '<span class="date">'.sprintf( __('%s ago','mars'), human_time_diff( get_the_time('U'), current_time('timestamp') ) ).'</span>';
				}
				$block .= '
				<span class="views"><i class="fa fa-eye"></i>'.$viewed.'</span>';
				if(function_exists('mars_get_like_count')) { 
					$block .= '<span class="heart"><i class="fa fa-heart"></i>'.mars_get_like_count($post->ID).'</span>';
				}
				$block .= '
					<span class="fcomments"><i class="fa fa-comments"></i>'.$comments->approved.'</span>
				';
				// video category.
				if( has_term( '', 'categories', $post->ID ) && apply_filters( 'mars_post_meta_category' , false) === true ){
					$block .= '<span class="fcategory"><i class="fa fa-folder-open"></i>';
						$block .= get_the_term_list( $post->ID , 'categories');
					$block .= '</span>';				
				}

				$block .= '
			</div>
		';
		print $block;
	}
	add_action('mars_video_meta', 'mars_video_meta', 10);

if( !defined('ABSPATH') ) exit;
