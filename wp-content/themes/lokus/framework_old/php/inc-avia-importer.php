<?php

if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);



// Load Importer API
require_once ABSPATH . 'wp-admin/includes/import.php';
$avia_importerError = false;
$import_filepath = TEMPLATEPATH."/includes/admin/dummy";

//check if wp_importer, the base importer class is available, otherwise include it
if ( !class_exists( 'WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) )
	{
		require_once($class_wp_importer);
	}
	else
	{
		$avia_importerError = true;
	}
}

//check if the wp import class is available, this class handles the wordpress XML files. If not include it
//make sure to exclude the init function at the end of the file in kriesi_importer
if ( !class_exists( 'WP_Import' ) ) {
	$class_wp_import = AVIA_PHP . 'wordpress-importer/wordpress-importer.php';
	if ( file_exists( $class_wp_import ) )
	{
		require_once($class_wp_import);
	}
	else
	{
		$avia_importerError = true;
	}
}

if($avia_importerError !== false)
{
	echo "The Auto importing script could not be loaded. please use the wordpress importer and import the XML file that is located in your themes folder manually.";
}
else
{
	if ( class_exists( 'WP_Import' )) 
	{
		include_once('wordpress-importer/avia-import-class.php');
	}
	
			

	if(!is_file($import_filepath.'.xml'))
	{
	
		echo "The XML file containing the dummy content is not available or could not be read in <pre>".TEMPLATEPATH."</pre><br/> You might want to try to set the file permission to chmod 777.<br/>If this doesn't work please use the wordpress importer and import the XML file (should be located in your themes folder: dummy.xml) manually <a href='/wp-admin/import.php'>here.</a>";
	}
	else
	{
		if(!isset($custom_export))
		{
			do_action('avia_import_hook');
			
			$wp_import = new avia_wp_import();
			$wp_import->fetch_attachments = true;
			$wp_import->import($import_filepath.'.xml');
			$wp_import->saveOptions($import_filepath.'.php');
			$wp_import->set_menus();
		}
		else
		{
			$import = new avia_wp_import();
			$import->saveOptions($import_filepath.'.php', $custom_export);
		}
	}
}




