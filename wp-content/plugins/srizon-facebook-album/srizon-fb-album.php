<?php
/*
Plugin Name: Srizon Facebook Album
Plugin URI: http://www.srizon.com/srizon-facebook-album
Description: Show your Facebook Albums/Galleries on your WordPress Site
Text Domain: srizon-facebook-album
Domain Path: /languages
Version: 3.1.2
Author: Afzal
Author URI: http://www.srizon.com/contact
*/

function srizon_fb_album_load_textdomain() {
	load_plugin_textdomain( 'srizon-facebook-album', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'srizon_fb_album_load_textdomain' );

// libraries
require_once 'lib/srizon_functions.php';
require_once 'lib/srizon_fb_album.php';
require_once 'lib/srizon_pagination.php';
require_once 'lib/srizon-fb-ui.php';
require_once 'lib/srizon-fb-db.php';

// font end files
if(!is_admin()) {
	require_once 'site/srizon-fb-front.php';
	require_once 'site/srizon-fb-album-front.php';
	require_once 'site/srizon-fb-gallery-front.php';
}

// backend files
if(is_admin()) {
	require_once 'admin/index.php';
}

register_activation_hook( __FILE__, 'srz_fb_install' );
register_uninstall_hook( __FILE__, 'srz_fb_uninstall' );
function srz_fb_install() {
	SrizonFBDB::CreateDBTables();
}

function srz_fb_uninstall() {
	//SrizonFBDB::DeleteDBTables();
	//delete_option('srzfbcomm');
}

function srz_fb_get_resource_url( $relativePath ) {
	return plugins_url( $relativePath, plugin_basename( __FILE__ ) );
}
