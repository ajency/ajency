<?php
/**
 * This file first checks if the framework is used as a theme or plugin framework and sets values accordingly
 *
 * @author		Christian "Kriesi" Budschedl
 * @copyright	Copyright (c) Christian Budschedl
 * @link		http://kriesi.at
 * @link		http://aviathemes.com
 * @since		Version 1.0
 * @package 	AviaFramework
 */

/**
 * check if file is a plugin or theme based on its location, then set constant and globals for further use within the framework
 * @todo create plugin version of framework and prevent interfering with theme version
 */
 


/**
* AVIA_BASE contains the root server path of the framework that is loaded
*/
if( ! defined('AVIA_BASE' ) ) 	 { 	define( 'AVIA_BASE', TEMPLATEPATH.'/' ); }



/**
* AVIA_BASE_URL contains the http url of the framework that is loaded
*/
if( ! defined('AVIA_BASE_URL' ) ){	define( 'AVIA_BASE_URL', get_bloginfo('template_url') . '/'); }



$avia_base_data = get_theme_data( AVIA_BASE . '/style.css' );
$avia_base_data['prefix'] = $avia_base_data['Title'];



/**
* THEMENAME contains the Name of the currently loaded theme
*/
if( ! defined('THEMENAME' ) ) { define( 'THEMENAME', $avia_base_data['Title'] ); }



if( ! defined('AVIA_FW' ) )
{	
	//define path constants
	
	/**
	* AVIA_FW contains the server path of the framework folder
	*/
	define( 'AVIA_FW', AVIA_BASE . 'framework/' ); 
	
	
	/**
	* AVIA_PHP contains the server path of the frameworks php folder
	*/
	define( 'AVIA_PHP', AVIA_FW . 'php/' );
	
	
	/**
	* AVIA_JS contains the server path of the frameworks javascript folder
	*/
	define( 'AVIA_JS', AVIA_FW . 'js/' );
	
	
	/**
	* AVIA_CSS contains the server path of the frameworks css folder
	*/ 
	define( 'AVIA_CSS', AVIA_FW . 'css/' );
	
	
	/**
	* AVIA_OPTIONS contains the server path of the theme_option_pages folder
	*/ 
	define( 'AVIA_OPTIONS', AVIA_BASE . 'theme_option_pages' ); 
	
	
	
	
	//define url constants
	
	/**
	* AVIA_FW_URL contains the url of the framework folder
	*/ 
	define( 'AVIA_FW_URL', AVIA_BASE_URL . 'framework/' );
	
	/**
	* AVIA_IMG_URL contains the url of the frameworks images folder
	*/ 
	define( 'AVIA_IMG_URL', AVIA_FW_URL . 'images/' ); 
	
	
	/**
	* AVIA_PHP_URL contains the url of the frameworks php folder
	*/ 
	define( 'AVIA_PHP_URL', AVIA_FW_URL . 'php/' );
	
	
	/**
	* AVIA_JS_URL contains the url of the frameworks javascript folder
	*/ 
	define( 'AVIA_JS_URL', AVIA_FW_URL . 'js/' ); 
	
	
	/**
	* AVIA_CSS_URL contains the url of the frameworks css folder
	*/ 
	define( 'AVIA_CSS_URL', AVIA_FW_URL . 'css/' ); 
	
	
	/**
	* AVIA_OPTIONS contains the url of the theme_option_pages folder
	*/ 
	define( 'AVIA_OPTIONS_URL', AVIA_BASE_URL . 'theme_option_pages' ); 
}



//file includes

/**
* This file holds a function set for commonly used operations done by the frameworks frontend
*/
require( AVIA_PHP.'function-set-avia-frontend.php' );

/**
* This file holds the class that improves the menu with megamenu capabilities
*/
require( AVIA_PHP.'class-megamenu.php' );

/**
* This file holds the function that creates the shortcodes within the backend
*/
require( AVIA_PHP.'avia_shortcodes/shortcodes.php' );

/**
* This file holds the class that creates various styles for the frontend that are set within the backend
*/
require( AVIA_PHP.'class-style-generator.php' );

/**
* This file holds the class that creates forms based on option arrays
*/
require( AVIA_PHP.'class-form-generator.php' );

/**
* This file holds the class that creates several framework specific widgets
*/
require( AVIA_PHP.'class-framework-widgets.php' );

/**
* This file holds the class that creates several framework specific widgets
*/
require( AVIA_PHP.'class-breadcrumb.php' );


if(is_admin())
{

	// Load script that are needed for the backend

	/**
	* This file holds a function set for ajax operations done by the framework
	*/
	require( AVIA_PHP.'function-set-avia-ajax.php' );
	
	/**
	* The adminpage class creates the option page menu items
	*/
	require( AVIA_PHP.'class-adminpages.php' );
	
	/**
	* The metabox class creates meta boxes for single posts, pages and other custom post types
	*/
	require( AVIA_PHP.'class-metabox.php' );
	
	/**
	* The htmlhelper class is needed to render the options defined in the config files
	*/
	require( AVIA_PHP.'class-htmlhelper.php' );
		
	/**
	* This file improves the media uploader so it can be used within the framework
	*/
	require( AVIA_PHP.'class-media.php' );
	
	/**
	* This file loads the option set class to create new backend options on the fly
	*/
	require( AVIA_PHP.'class-database-option-sets.php' );
	
		/**
	* This file loads the option set class to create new backend options on the fly
	*/
	require( AVIA_PHP.'wordpress-importer/avia-export-class.php' );
	
	

}




















