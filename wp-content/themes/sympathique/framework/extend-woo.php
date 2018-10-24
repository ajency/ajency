<?php
/*-----------------------------------------------------------------------------------*/
/*	Sympathique extend-woo.php - version: 1.0
/*-----------------------------------------------------------------------------------*/


// remove Woo Actions

global $woocommerce;

function wooc_init () {

	add_theme_support( 'woocommerce' );
	
	//remove woo styles
	if(!is_admin()){
		if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );
		} else {
			define( 'WOOCOMMERCE_USE_CSS', false );
		}
	}
}


add_action('init','wooc_init');

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_space', 7 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );

add_action( 'woocommerce_before_cart_table', 'dt_before_cart_table_div', 10 );
add_action( 'woocommerce_after_cart_table', 'dt_after_cart_table_div', 10 );

function dt_before_cart_table_div() {
	echo '<div class="styling-table-cart">';
}

function dt_after_cart_table_div() {
	echo '</div>';
}

function dt_woocommerce_space() {
	echo '<div style="clear:both"></div>';
}

function delicious_remove_woo_page_title() {
return false;
}
add_filter('woocommerce_show_page_title', 'delicious_remove_woo_page_title');


//wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10); // remove woo main content
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10); // remove woo main content end

add_action( 'woocommerce_before_main_content', 'dt_woocommerce_output_content_wrapper', 10); 	// add new wrapper
add_action( 'woocommerce_after_main_content', 'dt_woocommerce_output_content_wrapper_end', 10); // add new wrapper 

function dt_woocommerce_output_content_wrapper() {
	get_template_part( 'includes/subheader' );
	echo '<div class="centered-wrapper">';
}

function dt_woocommerce_output_content_wrapper_end() {
	echo '</div>';
}



//breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );	// remove breadcrumb
