<?php
add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{	
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_gallery_select = array("Three","Four"); 
		$of_options_portfolio_select = array("Two","Three","Four"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");


		//Stylesheets Reader
		$alt_stylesheet_path = get_template_directory() .'/css/color-schemes/';
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}
		
		// Sidebars
		$options_sidebars = array();
		if (class_exists('SidebarGenerator')) {
			$options_sidebars = SidebarGenerator::get_all_sidebars();
		}
		else $options_sidebars = delicious_my_sidebars();
		
		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri() .'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		
		$default_bg = get_template_directory() .'/images/bg/bg22.png';

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		// Set Standard Google Font
		
		$open_sans = 'Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic&subset=vietnamese,latin,cyrillic,latin-ext,greek,cyrillic-ext,greek-ext';

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( "name" => "General",
                    "type" => "heading");

$of_options[] = array( "name" => "Welcome to Sympathique Options Panel",
					"desc" => "",
					"id" => "introduction",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Welcome to Sympathique Options Panel.</h3>
					It is meant to make your life easier by offering you options which will customize your website(upload custom logo and favicon, choose a color scheme, set up footer social icons, etc.). ",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Responsive Layout",
					"desc" => "Activate the responsive layout. If enabled, the website will change its shape for mobile devices.",
					"id" => "responsive_enabled",
					"std" => "1",
					"on" 		=> "On",
					"off" 		=> "Off",						
					"type" 		=> "switch"
					);					
					
$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => "custom_favicon",
					"std" => "",
					"type" => "upload"); 
					
$of_options[] = array( "name" => "Custom Logo",
					"desc" => "Upload an image that will represent your website's logo. (Max 300x60px)",
					"id" => "custom_logo",
					"std" => "",
					"type" => "upload"); 

$of_options[] = array( 	"name" 		=> "Margin-Top Value for Header`s Logo",
						"desc" 		=> "You can adjust the logo position in header by setting a top-margin to it. You can use negative values as well. For example, if you enter 10, the logo will be lowered by 10px. ",
						"id" 		=> "margin_logo",
						"std" 		=> "",
						"type" 		=> "text"		
					);						
					
$of_options[] = array( "name" => "Footer Copyright Text",
					"desc" => "Place here your copyright line. For ex: Copyright 2014 | My website",
					"id" => "copyright_textarea",
					"std" => "Copyright 2014 - Sympathique.All Rights Reserved",
					"type" => "textarea"); 	
						
$of_options[] = array( 	"name" 		=> "Google Analytics Tracking Code",
						"desc" 		=> "Enable/Disable Google Analytics for your website. If you enable it, just add your Google Analytics Property ID into the textfield to track your site`s activity.",
						"id" 		=> "analytics_enabled",
						"std" 		=> 0,
						"folds"		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",						
						"type" 		=> "switch"
				);
					
$of_options[] = array( "name" => "Google Analytics Property ID",
					"desc" => "Place here Google Analytics Propery ID. It should look like 'UA-XXXXX-X' and you should find it inside your Google Analytics Dashboard.",
					"id" => "ga_id",
					"std" => "",
					"fold" => "analytics_enabled",
					"type" => "text");				
	
$of_options[] = array( "name" => "Styling",
					"type" => "heading");

$url =  ADMIN_DIR . 'assets/images/';
					
$of_options[] = array( "name" => "Main Layout",
					"desc" => "Select main content alignment. Choose between wide and boxed content.",
					"id" => "layout",
					"std" => "wide",
					"type" => "images",
					"options" => array(
						'wide' => $url . '1col.png',
						'boxed' => $url . '3cm.png'
						)
					);

$of_options[] = array( "name" => "Color Scheme",
					"desc" => "Select your color scheme.",
					"id" => "scheme",
					"std" => "red.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$of_options[] = array( "name" =>  "Body Background Color",
					"desc" => "Leave blank if you want to keep the default background color or pick a color for the body. (default: #efefef).",
					"id" => "body_background",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" =>  "Content Wrapper Background Color",
					"desc" => "Leave blank if you want to keep the default background color or pick a color for the content wrapper (default: #fff).",
					"id" => "wrapper_background",
					"std" => "",
					"type" => "color");   	
					
$of_options[] = array( "name" =>  "Header Background Color",
					"desc" => "Leave blank if you want to keep the default background color or pick a color for the header (default: #fff).",
					"id" => "header_background",
					"std" => "",
					"type" => "color"); 					

$of_options[] = array( "name" =>  "Footer Background Color",
					"desc" => "Leave blank if you want to keep the default background color or pick a color for the footer (default: #464646).",
					"id" => "footer_background",
					"std" => "",
					"type" => "color");   						

$of_options[] = array( "name" =>  "Bottom-Footer Background Color",
					"desc" => "Leave blank if you want to keep the default background color or pick a color for the bottom footer (default: #3C3C3C).",
					"id" => "bottomfooter_background",
					"std" => "",
					"type" => "color");   

					
$of_options[] = array( "name" =>  "Selected Text Background Color",
					"desc" => "Leave blank if you want to keep the default background color or pick a color for the selected text (default: blue, set by the browser).",
					"id" => "selected_text_background",
					"std" => "",
					"type" => "color");  					

$of_options[] = array( "name" => "Custom Background Image",
					"desc" => "Upload an image that will represent your website's background. This works when main layout is set to boxed. (Ideal: 1920x1100px)",
					"id" => "custom_background",
					"std" => "",
					"type" => "upload");		

$of_options[] = array( "name" => "Patterns for Background",
					"desc" => "Select a pattern and set it as background. Choose between 11 patterns..",
					"id" => "pattern",
					"std" => "bg1",
					"type" => "images",
					"options" => array(
						'bg1' => $url . 'bg1.png',
						'bg2' => $url . 'bg2.png',
						'bg3' => $url . 'bg3.png',
						'bg4' => $url . 'bg4.png',
						'bg5' => $url . 'bg5.png',
						'bg6' => $url . 'bg6.png',
						'bg7' => $url . 'bg7.png',
						'bg8' => $url . 'bg8.png',
						'bg9' => $url . 'bg9.png',
						'bg10' => $url . 'bg10.png',
						'bg11' => $url . 'bg11.png',
						'bg12' => $url . 'bg12.png'
						)
					);					
					
$of_options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => "more_css",
                    "std" => "",
                    "type" => "textarea");
					
	
$of_options[] = array( "name" => "Typography",
					"type" => "heading");	

$of_options[] = array( "name" => "Typography Intro",
					"desc" => "",
					"id" => "typography_intro",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Typography Options</h3> The theme is using Google Fonts to render the typography style for your website. You can however, make use of default fonts, by enabling the 'Default Typography Options' from under these options. If you want to test drive a font before using it, visit the <a href='http://www.google.com/fonts/' target='_blank'>Google Webfonts</a> page.",
					"icon" => true,
					"type" => "info");						

$of_options[] = array( 	"name" 		=> "Body Font Options",
						"desc" 		=> "Select font options for the body.",
						"id" 		=> "body_font_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '12px', 'height' => '20px', 'color' => '#686868'),
						"type" 		=> "google_typography"
				); 	
				
$of_options[] = array( 	"name" 		=> "Menu Font Options",
						"desc" 		=> "Select font options for the main menu.",
						"id" 		=> "menu_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '13px', 'height' => '20px', 'color' => '#686868'),
						"type" 		=> "google_typography"
				); 	
				
$of_options[] = array( 	"name" 		=> "H1 Font Options",
						"desc" 		=> "Select font options for Heading 1.",
						"id" 		=> "h1_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '28px', 'height' => '36px', 'color' => '#444444'),
						"type" 		=> "google_typography"
				); 	

$of_options[] = array( 	"name" 		=> "H2 Font Options",
						"desc" 		=> "Select font options for Heading 2.",
						"id" 		=> "h2_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '24px', 'height' => '32px', 'color' => '#444444'),
						"type" 		=> "google_typography"
				); 					

$of_options[] = array( 	"name" 		=> "H3 Font Options",
						"desc" 		=> "Select font options for Heading 3.",
						"id" 		=> "h3_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '18px', 'height' => '24px', 'color' => '#444444'),
						"type" 		=> "google_typography"
				); 	

$of_options[] = array( 	"name" 		=> "H4 Font Options",
						"desc" 		=> "Select font options for Heading 4.",
						"id" 		=> "h4_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '16px', 'height' => '22px', 'color' => '#444444'),
						"type" 		=> "google_typography"
				); 

$of_options[] = array( 	"name" 		=> "H5 Font Options",
						"desc" 		=> "Select font options for Heading 5.",
						"id" 		=> "h5_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '14px', 'height' => '20px', 'color' => '#444444'),
						"type" 		=> "google_typography"
				); 				

$of_options[] = array( 	"name" 		=> "H6 Font Options",
						"desc" 		=> "Select font options for Heading 6.",
						"id" 		=> "h6_typo",
						"std" 		=> array('face' => $open_sans, 'size' => '13px', 'height' => '20px', 'color' => '#444444'),
						"type" 		=> "google_typography"
				); 
				
$of_options[] = array( 	"id" 		=> "typo_space",
						"type" 		=> "space"
				); 				
				
$of_options[] = array( 	"name" 		=> "Default Typography Options",
						"desc" 		=> "Enable/Disable default fonts. If enabled, Google font faces will be overwritten by these styles. The changes will be applied only to the fonts, while the rest of the info like font size and color will remain the same.",
						"id" 		=> "default_fonts",
						"std" 		=> 0,
						"folds"		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",						
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Body Font Options",
						"desc" 		=> "Select font options for the body.",
						"id" 		=> "default_body_font_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 	
				
$of_options[] = array( 	"name" 		=> "Menu Font Options",
						"desc" 		=> "Select font options for the main menu.",
						"id" 		=> "default_menu_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 	
				
$of_options[] = array( 	"name" 		=> "H1 Font Options",
						"desc" 		=> "Select font options for Heading 1.",
						"id" 		=> "default_h1_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 	

$of_options[] = array( 	"name" 		=> "H2 Font Options",
						"desc" 		=> "Select font options for Heading 2.",
						"id" 		=> "default_h2_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 					

$of_options[] = array( 	"name" 		=> "H3 Font Options",
						"desc" 		=> "Select font options for Heading 3.",
						"id" 		=> "default_h3_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 	

$of_options[] = array( 	"name" 		=> "H4 Font Options",
						"desc" 		=> "Select font options for Heading 4.",
						"id" 		=> "default_h4_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 

$of_options[] = array( 	"name" 		=> "H5 Font Options",
						"desc" 		=> "Select font options for Heading 5.",
						"id" 		=> "default_h5_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 				

$of_options[] = array( 	"name" 		=> "H6 Font Options",
						"desc" 		=> "Select font options for Heading 6.",
						"id" 		=> "default_h6_typo",
						"std" 		=> array('face' => 'Arial'),
						"fold"		=> "default_fonts",
						"type" 		=> "typography"
				); 
								
				
$of_options[] = array( "name" => "Header",
					"type" => "heading");
					
$of_options[] = array( "name" => "Enable/Disable Floating Header",
					"desc" => "You can enable a floating top-bar which will include your logo and menu.",
					"id" => "floating_header",
					"std" => "1",
					"std" 		=> 1,
					"folds" 	=> 1,					
					"on" 		=> "Enable",
					"off" 		=> "Disable",						
					"type" 		=> "switch");					

$of_options[] = array( 	"name" 		=> "Margin-Top Value for Floating Header`s Logo",
						"desc" 		=> "You can adjust the floating header`s logo position by setting a top-margin to it. You can use negative values as well. For example, if you enter 10, the logo will be lowered by 10px.",
						"id" 		=> "margin_floating_logo",
						"std" 		=> "",
						"fold" 		=> "floating_header", /* the checkbox hook */
						"type" 		=> "text"		
					);							
					
$of_options[] = array( "name" => "Search Icon in Header",
					"desc" => "If the option is on, a search icon will be displayed in the navigation.",
					"id" => "search-header",
					"std" => "1",					
					"on" 		=> "On",
					"off" 		=> "Off",						
					"type" 		=> "switch");					
					
$of_options[] = array( "name" => "Top Header Options",
					"desc" => "",
					"id" => "top_header_intro",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Top Header Options</h3> Customize the top-header area of the theme. Choose whether to display a top-header zone or not and what content to use inside it.",
					"icon" => true,
					"type" => "info");					

$of_options[] = array( 	"name" 		=> "Enable/Disable Top Header Area",
						"desc" 		=> "If enabled, the top header area will be shown on the website. Here you can add a secondary menu and highlight your social networks references.",
						"id" 		=> "top-header",
						"std" 		=> 1,
						"folds" 	=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",						
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Left Area: WordPress Menu or simple Text",
						"desc" 		=> "Choose what content to use in the left area of the top-header.",
						"id" 		=> "left_area_menu",
						"std" 		=> "text",
						"fold" 		=> "top-header", /* the checkbox hook */
						"type" 		=> "radio",
						"options"	=> array("menu" => "'Top Header' WordPress Menu","text" => "Simple Text")
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Call Us: +321 123 4567",
						"id" 		=> "left_area_option_2",
						"std" 		=> "Call Us: +321 123 4567",
						"fold" 		=> "top-header", /* the checkbox hook */
						"type" 		=> "textarea"		
					);	

$of_options[] = array( 	"name" 		=> "Right Area: Social Networks References. Use 'Social' tab to define them",
						"desc"		=> "Social networks references can be set in the 'Social' tab of the admin panel.",
						"type"		=> "",
						"fold"		=> "top-header"
				);					
				
					
$of_options[] = array( "name" => "Sub Header Options",
					"desc" => "",
					"id" => "top_header_intro",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Sub Header Options</h3>  Customize the sub-header area of the theme. Set a default subheader style and customize it for your needs. ",
					"icon" => true,
					"type" => "info");		

$of_options[] = array( "name" => "Subheader Style",
					"desc" => "Select an appropriate style for the subheader.",
					"id" => "subheader_select",
					"std" => "style-1",
					"type" => "select",
					"options" => array('style-0' => 'Standard Style', 'style-1' => 'Sympathique Style', 'style-2' => 'Agency Style', 'style-3' => 'Corporate Style'));
					
$of_options[] = array( 	"name" 		=> "Subheader Background Type",
						"desc" 		=> "The theme will behave differently depending what type of background you pick. If you choose 'Image', make sure that the image you upload is big enough to cover any screen resolution(recommended: 1920x180px). If you pick 'Color', set a color from below.",
						"id" 		=> "bg_type",
						"std" 		=> "pattern",
						"type" 		=> "radio",
						"options"	=> array("pattern" => "Pattern","image" => "Image", "color" => "Color")
				);	

$of_options[] = array( 	"name" 		=> "Subheader Background Image",
						"desc" 		=> "Upload your image for the subheader(pattern or image).",
						"id" 		=> "subheader_img",
						"std" 		=> "",
						"type" 		=> "upload"
				);	

$of_options[] = array( "name" =>  "Subheader Color",
					"desc" => "Leave blank if you want to keep the default background color or pick a color for the subheader (default: #fafafa). Make sure to pick the 'Color' option from the list.",
					"id" => "subheader_color",
					"std" => "",
					"type" => "color");		

$of_options[] = array( "name" => "Portfolio",
                    "type" => "heading");			

$of_options[] = array( 	"name" 		=> "Link URL for the portfolio 'X' button icon",
						"desc" 		=> "Add an URL for the portfolio X button icon. Default URL is set to homepage. Ex: http://website.com#work",
						"id" 		=> "portfolio_back_link",
						"std" 		=> "",
						"type" 		=> "text"		
					);	             						

$of_options[] = array( "name" => "Blog",
					"type" => "heading");	

$of_options[] = array( "name" => "Sidebar Position for Blog Posts Inner Pages",
					"desc" => "Select a sidebar position for blog posts inner pages. It will be applied to archive and search pages as well.",
					"id" => "blog_sidebar_pos",
					"std" => "sidebar-right",
					"type" => "images",
					"options" => array(
						'sidebar-right' => $url . '2cr.png',
						'sidebar-left' => $url . '2cl.png'
						)
					);	

$of_options[] = array( "name" => "Sidebar Name for Blog Posts Inner Pages",
					"desc" => "Select the sidebar which will be applied to blog posts inner pages, archive pages and search result pages.",
					"id" => "blog_sidebar",
					"std" => "",
					"type" => "select",
					"options" => $options_sidebars);	
					
$of_options[] = array( "name" => "Enable Social Share Icons for Blog Posts Inner Pages",
					"desc" => "If the option is on, the social icons for sharing the post will be displayed.",
					"id" => "social_box",
					"std" => "1",
					"on" 		=> "On",
					"off" 		=> "Off",						
					"type" 		=> "switch");						
					
$of_options[] = array( "name" => "Enable Author Box for Blog Posts Inner Pages",
					"desc" => "If the option is on, the author box will be displayed.",
					"id" => "author_box",
					"std" => "1",
					"on" 		=> "On",
					"off" 		=> "Off",						
					"type" 		=> "switch");							
					
					
$of_options[] = array( "name" => "Social",
					"type" => "heading");	

$of_options[] = array( "name" => "Social Options",
					"desc" => "",
					"id" => "social_options_info",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Social Options.</h3>
					Set your social network references. Add your links for popular platforms like Twitter and Facebook. These links will affect the top-header and bottom-footer areas. If you don`t want to include a social icon in the list, just leave the textfield empty. ",
					"icon" => true,
					"type" => "info");					

$of_options[] = array( "name" => "RSS",
					"desc" => "Your RSS Feed address",
					"id" => "rss",
					"std" => "http://feeds.feedburner.com/EnvatoNotes",
					"type" => "text");					

$of_options[] = array( "name" => "Facebook",
					"desc" => "Your Facebook page/profile URL",
					"id" => "facebook",
					"std" => "http://www.facebook.com/envato",
					"type" => "text");	
					
$of_options[] = array( "name" => "Twitter",
					"desc" => "Your Twitter URL",
					"id" => "twitter",
					"std" => "http://twitter.com/envato",
					"type" => "text");	

$of_options[] = array( "name" => "Flickr",
					"desc" => "Your Flickr Page URL",
					"id" => "flickr",
					"std" => "http://www.flickr.com/photos/we-are-envato",
					"type" => "text");					

$of_options[] = array( "name" => "Google Plus",
					"desc" => "Your Google Plus Profile URL",
					"id" => "google-plus",
					"std" => "http://plus.google.com/",
					"type" => "text");						

$of_options[] = array( "name" => "Dribbble",
					"desc" => "Your Dribbble Profile URL",
					"id" => "dribbble",
					"std" => "",
					"type" => "text");	

$of_options[] = array( "name" => "Pinterest",
					"desc" => "Your Pinterest URL",
					"id" => "pinterest",
					"std" => "",
					"type" => "text");	

$of_options[] = array( "name" => "LinkedIn",
					"desc" => "Your LinkedIn Profile URL",
					"id" => "linkedin",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Skype",
					"desc" => "Your Skype ID",
					"id" => "skype",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Github",
					"desc" => "Your Github Profile URL",
					"id" => "github-alt",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "YouTube",
					"desc" => "Your YouTube Profile URL",
					"id" => "youtube",
					"std" => "",
					"type" => "text");		
					
$of_options[] = array( "name" => "Vimeo",
					"desc" => "Your Vimeo Profile URL",
					"id" => "vimeo-square",
					"std" => "",
					"type" => "text");	

$of_options[] = array( "name" => "Instagram",
					"desc" => "Your Instagram URL",
					"id" => "instagram",
					"std" => "",
					"type" => "text");		

$of_options[] = array( "name" => "Tumblr",
					"desc" => "Your Tumblr URL",
					"id" => "tumblr",
					"std" => "http://tumblr.com/",
					"type" => "text");	

$of_options[] = array( "name" => "Xing",
					"desc" => "Your Xing Profile URL",
					"id" => "xing",
					"std" => "",
					"type" => "text");	

$of_options[] = array( "name" => "VK",
					"desc" => "Your VK URL",
					"id" => "vk",
					"std" => "",
					"type" => "text");		

$of_options[] = array( "name" => "FourSquare",
					"desc" => "Your Foursquare URL",
					"id" => "foursquare",
					"std" => "",
					"type" => "text");		

$of_options[] = array( "name" => "WeChat",
					"desc" => "Your WeChat URL",
					"id" => "wechat",
					"std" => "",
					"type" => "text");		


$of_options[] = array( "name" => "Behance",
					"desc" => "Your Behance URL",
					"id" => "behance",
					"std" => "",
					"type" => "text");		

$of_options[] = array( "name" => "Soundcloud",
					"desc" => "Your Soundcloud URL",
					"id" => "soundcloud",
					"std" => "",
					"type" => "text");		

$of_options[] = array( "name" => "Codepen",
					"desc" => "Your Codepen URL",
					"id" => "codepen",
					"std" => "",
					"type" => "text");		

$of_options[] = array( "name" => "Slideshare",
					"desc" => "Your Slideshare URL",
					"id" => "slideshare",
					"std" => "",
					"type" => "text");																																												

// WooCommerce Options

if ( class_exists( 'Woocommerce' ) ) {	
				
$of_options[] = array( "name" => "WooCommerce",
					"type" => "heading");					

$of_options[] = array( "name" => "WooCommerce Options",
					"desc" => "",
					"id" => "woo_options_info",
					"std" => "<h3 style=\"margin: 0 0 10px;\">WooCommerce Options.</h3>
					Here you can set some extra options, apart from the ones which comes with the WooCommerce plugin. They are meant to integrate the plugin with the theme seamlessly. <a href='http://www.woothemes.com/woocommerce/'>WooCommerce</a> is a WordPress eCommerce toolkit that helps you sell anything.",
					"icon" => true,
					"type" => "info");	


$url =  ADMIN_DIR . 'assets/images/';
					
$of_options[] = array( "name" => "Shop Pages Layout",
					"desc" => "Select a layout for the shop pages. This will be applied for most of the shop pages, including main shop page, product pages and category pages.",
					"id" => "woo_layout",
					"std" => "sidebar-right",
					"type" => "images",
					"options" => array(
						'no-sidebar' => $url . '1col.png',
						'sidebar-left' => $url . '2cl.png',
						'sidebar-right' => $url . '2cr.png'
						)
					);		


$of_options[] = array( "name" => "Shop Pages Sidebar",
					"desc" => "Select the sidebar which will be used for your shop pages. This option works only if the shop layout is set to left or right sidebar.",
					"id" => "woo_sidebar",
					"std" => "",
					"type" => "select",
					"options" => $options_sidebars);						


$of_options[] = array( "name" => "Products per Row",
					"desc" => "Set how many products would you like to display on a single row. In other words, how many columns will the shop page has?",
					"id" => "woo_products_per_row",
					"std" => "3",
					"type" => "select",
					"options" => array("2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6"));						
}
	
// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
					
	}
}
?>