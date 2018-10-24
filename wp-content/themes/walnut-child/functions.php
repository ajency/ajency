<?php

add_action('wp_enqueue_scripts', 'appear_script');
function appear_script() {
    wp_enqueue_script('waypoints', site_template_directory_uri() . '/scripts/waypoints.min.js', array(
        'jquery'));
		
	wp_enqueue_script('responsive_table', site_template_directory_uri() . '/js/rwd-table.js', array(
        'jquery'));
		
	wp_enqueue_script('responsive_table_custom', site_template_directory_uri() . '/js/responsiveTbl-custom.js', array(
	'jquery'));

	wp_register_style( 'responsive_table_css', site_template_directory_uri() . '/css/rwd-table.css' );
	wp_enqueue_style( 'responsive_table_css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri().'/style.css', false ,'' ); 
	// wp_enqueue_style( 'responsive-styles', site_template_directory_uri().'/css/responsive.css', true );  
}

function site_template_directory_uri() {
    return site_url('wp-content/themes/walnut-child');
}
/*
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'responsive_table_styles' );

/**
 * Register style sheet.
 */
 /*
function responsive_table_styles() {
	wp_register_style( 'responsive_table_css', site_template_directory_uri() . '/css/rwd-table.css' ) );
	wp_enqueue_style( 'responsive_table_css' );
}*/

?>
