<?php

	function wpb_adding_styles() {
		wp_enqueue_style('my_stylesheet', get_stylesheet_directory_uri() . '/css/custom.css');
	}

	add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );  

?>