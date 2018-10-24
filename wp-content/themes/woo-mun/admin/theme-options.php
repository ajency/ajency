<?php

add_action('init','of_options_munditia_pmc');

if (!function_exists('of_options_munditia_pmc')) {
function of_options_munditia_pmc(){
	
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
$of_options_munditia_pmc_select = array("one","two","three","four","five"); 
$of_options_munditia_pmc_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
$of_options_munditia_pmc_homepage_blocks = array( 
	"disabled" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"block_one"		=> "Block One",
		"block_two"		=> "Block Two",
		"block_three"	=> "Block Three",
	), 
	"enabled" => array (
		"placebo" => "placebo", //REQUIRED!
		"block_four"	=> "Block Four",
	),
);


//Stylesheets Reader
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//Background Images Reader
$bg_images_path = get_stylesheet_directory(). '/css/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri().'/css/images/bg/'; // change this to where you store your bg images
$images_url = get_template_directory_uri().'/css/images/'; // change this to where you store your bg images
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

//Background Images Reader
$bg_images_path_header = get_stylesheet_directory(). '/css/images/bg-footer/'; // change this to where you store your bg images
$bg_images_url_header  = get_template_directory_uri().'/css/images/bg-footer/'; // change this to where you store your bg images
$bg_images_header  = array();

if ( is_dir($bg_images_path_header ) ) {
    if ($bg_images_dir_header = opendir($bg_images_path_header) ) { 
        while ( ($bg_images_file_header = readdir($bg_images_dir_header)) !== false ) {
            if(stristr($bg_images_file_header, ".png") !== false || stristr($bg_images_file_header, ".jpg") !== false) {
                $bg_images_header[] = $bg_images_url_header . $bg_images_file_header;
            }
        }    
    }
}

//Background header Images Reader
$bg_images_path_header = get_stylesheet_directory() . '/css/images/bg-footer/'; // change this to where you store your bg images
$bg_images_url_header  = get_template_directory_uri().'/css/images/bg-footer/'; // change this to where you store your bg images
$bg_images_header  = array();

if ( is_dir($bg_images_path_header ) ) {
    if ($bg_images_dir_header = opendir($bg_images_path_header) ) { 
        while ( ($bg_images_file_header = readdir($bg_images_dir_header)) !== false ) {
            if(stristr($bg_images_file_header, ".png") !== false || stristr($bg_images_file_header, ".jpg") !== false) {
                $bg_images_header[] = $bg_images_url_header . $bg_images_file_header;
            }
        }    
    }
}



/*-----------------------------------------------------------------------------------*/
/* TO DO: Add options/functions that use these */
/*-----------------------------------------------------------------------------------*/

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
$body_att = array("scroll","fixed");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$number_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","25","30","35","40","45","50");
$slider_entries = array("sliceDown", "sliceDownLeft", "sliceUp", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "fold", "fade", "random", "slideInRight", "slideInLeft", "boxRandom", "boxRain", "boxRainReverse", "boxRainGrow", "boxRainGrowReverse");
$google_fonts = array("", "Allan:bold", "Allerta", "Allerta+Stencil", "Amaranth", "Anonymous+Pro", "Arimo", "Arvo", "Bentham", "Buda:light", "Cabin:bold", "Calligraffitti", "Cantarell", "Cardo", "Cherry+Cream+Soda", "Chewy","Coda:800", "Coming+Soon","Copse", "Corben:bold", "Cousine", "Covered+By+Your+Grace", "Crafty+Girls", "Crimson", "Crushed", "Cuprum", "Droid Sans", "Droid Sans Mono", "Droid Serif", "Fontdiner+Swanky", "Geo", "Gruppo", "Homemade+Apple", "IM Fell", "Inconsolata", "Irish+Growler", "Josefin Sans Std Light", "Josefin+Sans", "Josefin+Slab", "Just+Another+Hand", "Just+Me+Again+Down+Here", "Kenia", "Kranky", "Kreon", "Kristi", "Lato", "Lekton", "Lobster", "Luckiest+Guy", "Maven+Pro", "Merriweather", "Michroma", "Molengo", "Mountains+of+Christmas", "Neucha", "Neuton", "Nobile", "OFL Sorts Mill Goudy TT", "OFL Standard TT", "Orbitron", "Pacifico", "Permanent+Marker", "Philosopher", "PT Sans", "PT Sans Narrow", "Puritan", "Raleway:100", "Reenie Beanie", "Rock+Salt", "Schoolbell", "Six+Caps", "Slackey", "Sniglet:800", "Sunshiney", "Syncopate", "Tangerine", "Tinos", "Ubuntu", "UnifrakturCook:bold", "UnifrakturMaguntia", "Unkempt", "Vibur", "Vidaloka", "Vollkorn", "Walter+Turncoat", "Yanone Kaffeesatz");
$google_fonts_display = str_replace('+', ' ', $google_fonts);
$number_entries_display = array("Select a number:","3","6","9");
$number_entries_display_port = array("Select a number:","3","6","9");
// Image Alignment radio box
$of_options_munditia_pmc_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$of_options_munditia_pmc_image_link_to = array("image" => "The Image","post" => "The Post"); 

// Set the Options Array
global $of_options_munditia_pmc;
$of_options_munditia_pmc = array();



$of_options_munditia_pmc[] = array( "name" => "Home Settings",
					"type" => "heading");
				
$of_options_munditia_pmc[] = array( "name" => "General settings",
                    "type" => "innerheading");	

$of_options_munditia_pmc[] = array( "name" => "Allow responsive mode?",
					"desc" => "Check this if you wish to allow responsive mode.",
					"id" => "showresponsive",
					"std" => 1,
					"type" => "checkbox");						
					
$of_options_munditia_pmc[] = array( "name" => "Portfolio slug",
					"desc" => "If you are not using default <a href='".admin_url()."options-permalink.php' target='_blank'>Permalink structure</a> you will need to: <p>1. save Permalink to default structure </p><p> 2. save Permalink to your custom structure</p>",
					"id" => "port_slug",
					"std" => "portfolio",
					"type" => "text"); 
									
									
					
$of_options_munditia_pmc[] = array( "name" => "Portfolio and post setting for home page",
                    "type" => "innerheading");								
				
				
$of_options_munditia_pmc[] = array( "name" => "Number of recent portfolio  on home page",
					"desc" => "Select how many recent items you wish to display in portfolio",
					"id" => "home_recent_number",
					"std" => "9",
					"type" => "select",
					"options" => $number_entries);		

$of_options_munditia_pmc[] = array( "name" => "Number of recent portfolio items display per slide",
					"desc" => "Select how many recent portfolio items display per slide",
					"id" => "home_recent_number_display",
					"std" =>"3",
					"type" => "select",
					"options" => $number_entries_display );						
	

	
		
$of_options_munditia_pmc[] = array( "name" => "Woocommerce Settings",
					"type" => "heading");

$of_options_munditia_pmc[] = array( "name" => "Woocomerce setting for home page",
                    "type" => "innerheading");		

$of_options_munditia_pmc[] = array( "name" =>  "Category type for Woocommerce",
					"desc" => "Set Category type for Woocommerce.",
					"id" => "catwootype",
					'options' => array('1' => 'Full width', '2' => 'With sidebar','3' => 'Full width with categories on the top'),
					"std" => "1",					
					"type" => "radio");		
					
$of_options_munditia_pmc[] = array( "name" => "Use WooCommerce ZOOM function",
					"desc" => "Check if you to use ZOOM function",
					"id" => "woo_zoom",
					"std" => 1,
					"type" => "checkbox");						


					
$of_options_munditia_pmc[] = array( "name" => "Number of recent Products on home page",
					"desc" => "Select how many recent Products you wish to display in Home page",
					"id" => "home_recent_products_number",
					"std" => "8",
					"type" => "select",
					"options" => $number_entries);		

$of_options_munditia_pmc[] = array( "name" => "Number of Products items display per slide",
					"desc" => "Select how many  Products display per slide",
					"id" => "home_recent_number_display_product",
					"std" => "8",
					"type" => "select",
					"options" => $number_entries_display);							
					
															
$of_options_munditia_pmc[] = array( "name" => "Number of feautured Products on home page",
					"desc" => "Select how many feautured Products you wish to display in Home Page",
					"id" => "home_recent_productsF_number",
					"std" => "8",
					"type" => "select",
					"options" => $number_entries);	
					
$of_options_munditia_pmc[] = array( "name" => "Number of feautured Products items display per slide",
					"desc" => "Select how many feautured Products display per slide",
					"id" => "home_recent_number_display_fproduct",
					"std" => "4",
					"type" => "select",
					"options" => $number_entries_display);							
							

$of_options_munditia_pmc[] = array( "name" => "WooCommerce Text",
                    "type" => "innerheading");		

$of_options_munditia_pmc[] = array( "name" => "Cart",
                    "desc" => "Translation for cart text.",
                    "id" => "translation_cart",
                    "std" => __('Cart','wp-munditia'),
                    "type" => "text");	
	

$of_options_munditia_pmc[] = array( "name" => "Share this product title",
                    "desc" => "Translation for Share this product title.",
                    "id" => "translation_share_product",
                    "std" =>  __('<span>Share</span> this product','wp-munditia'),
                    "type" => "text");	


$of_options_munditia_pmc[] = array( "name" => "Also like product",
                    "desc" => "Translation for Also like product title.",
                    "id" => "translation_also_like",
                    "std" => __('<span>Also</span> like','wp-munditia'),
                    "type" => "text");			

$of_options_munditia_pmc[] = array( "name" => "Login / Register",
                    "desc" => "Translation for Login / Register.",
                    "id" => "translation_login_register",
                    "std" => __('Login / Register','wp-munditia'),
                    "type" => "text");	

$of_options_munditia_pmc[] = array( "name" => "Our Futured Products",
                    "desc" => "Translation for Our futured products text.",
                    "id" => "translation_featured",
                    "std" => __('Our Futured Products','wp-munditia'),
                    "type" => "text");	
					
$of_options_munditia_pmc[] = array( "name" => "Recent Products",
                    "desc" => "Translation for Home page Recebt product title.",
                    "id" => "translation_recent_pruduct_title",
                    "std" => __('recent Products','wp-munditia'),
                    "type" => "text");						
					
$of_options_munditia_pmc[] = array( "name" => "Read more for product",
                    "desc" => "Translation for Read more.",
                    "id" => "translation_morelink",
                    "std" => __('Read more','wp-munditia'),
                    "type" => "text");					

$of_options_munditia_pmc[] = array( "name" => "Other WooCommerce settings",
                    "type" => "innerheading");		

$of_options_munditia_pmc[] = array( "name" => "Number of Products per page in Shop",
					"desc" => "Select how many Category Products per page you wish to display",
					"id" => "product_cat_page",
					"std" => "9",
					"type" => "select",
					"options" => $number_entries);						
													
				
$of_options_munditia_pmc[] = array( "name" => "Content Setting",
                    "type" => "heading");
					
			
					
$of_options_munditia_pmc[] = array( "name" => "Quote for default pages (blog, sigle post, single portfolio)",
                    "type" => "innerheading");	

$of_options_munditia_pmc[] = array( "name" => "Big quote text ",
					"desc" => "Enter big text for quote bar.",
					"id" => "quote_big",
					"std" => __('CHECK OUR LATEST WORDPRESS THEME THAT IMPLEMENTS PAGE BUILDER','wp-munditia'),
					"type" => "text"); 	

$of_options_munditia_pmc[] = array( "name" => "Small quote text ",
					"desc" => "Enter small text for quote bar.",
					"id" => "quote_small",
					"std" => __('- learn how to build Wordpress Themes with ease with a premium Page Builder which allows you to add new Pages in seconds.','wp-munditia'),
					"type" => "text"); 	

$of_options_munditia_pmc[] = array( "name" => "Top bar content",
                    "type" => "innerheading");						
										

$of_options_munditia_pmc[] = array( "name" => "Top bar left text",
					"desc" => "Enter top bar left text.",
					"id" => "top_notification",
					"std" => __('In case of any question call this number <span>+386 415 686 32</span>','wp-munditia'),
					"type" => "text"); 			
						



$of_options_munditia_pmc[] = array( "name" => "Our major brands images",
                    "type" => "innerheading");							


$of_options_munditia_pmc[] = array( "name" => "Our major brands",
					"desc" => "You can add unlimited number of images and sort them with drag and drop.",
					"id" => "advertiseimage",
					"std" =>  array('title' => 'Facebook','class'=>'top','url' => 'http://munditia.premiumcoding.com/wp-content/uploads/2014/01/social-icon-facebook.png','link' => 'https://www.facebook.com/PremiumCoding'),
					"nivo" => false,						
					"team" => false,	
					"ios" => false,					
					"descshow" => false,
					"social" => false,
					"type" => "slider");					
				
					
$of_options_munditia_pmc[] = array( "name" => "General Settings",
                    "type" => "heading");
					
$of_options_munditia_pmc[] = array( "name" => "Show support tab at the bottom of the page?",
					"desc" => "Check this if you wish to show support tab at the bottom of the page.",
					"id" => "show_support",
					"std" => 1,
					"type" => "checkbox");							
							
					
$of_options_munditia_pmc[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => "logo",
					"std" => "http://munditia.premiumcoding.com/wp-content/uploads/2012/10/logo.png",
					"type" => "upload");
									
					
$of_options_munditia_pmc[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => "favicon",
					"std" => "http://curvey.premiumcoding.com/wp-content/uploads/2012/05/faviconLogo.png",
					"type" => "upload"); 					
							
 $of_options_munditia_pmc[] = array( "name" => "Google Analytics",
                    "desc" => "Paste your Google analytics code here.",
                    "id" => "google_analytics",
                    "std" => "/",
                    "type" => "textarea");	   		                                               									
    
$of_options_munditia_pmc[] = array( "name" => "Styling Options",
					"type" => "heading");
					
$of_options_munditia_pmc[] = array( "name" => "Use boxed version?",
					"desc" => "Check this if you wish to use boxed style.",
					"id" => "use_boxed",
					"std" => 0,
					"type" => "checkbox");							

$of_options_munditia_pmc[] = array( "name" =>  "Main Theme Color ",
					"desc" => "Set the main color for your theme.",
					"id" => "mainColor",
					"std" => "#EEC43D",
					"type" => "color");		
					
$of_options_munditia_pmc[] = array( "name" =>  "Second Theme Color (for creating gradient)",
					"desc" => "Set the Second Theme Color (for creating gradient).",
					"id" => "gradient_color",
					"std" => "#ffffff",
					"type" => "color");	
					
$of_options_munditia_pmc[] = array( "name" =>  "Border Color (for making a border around elements with gradient)",
					"desc" => "Set the Border Color (for making a border around elements with gradient).",
					"id" => "gradient_border_color",
					"std" => "#ffffff",
					"type" => "color");						
					
					
$of_options_munditia_pmc[] = array( "name" =>  "Box Color ",
					"desc" => "Set the box color for your theme.",
					"id" => "boxColor",
					"std" => "#2a2b2c",
					"type" => "color");		
						

$of_options_munditia_pmc[] = array( "name" =>  "Shadow Color ",
					"desc" => "Set the Shadow color for your fonts.",
					"id" => "ShadowColorFont",
					"std" => "#ffffff",
					"type" => "color");			

					
$of_options_munditia_pmc[] = array( "name" => "Shadow opacity",
					"desc" => "Set Shadow opacity (between 0 and 1).",
					"id" => "ShadowOpacittyColorFont",
					"std" => "0.15",
					"type" => "text"); 	
						
					

$of_options_munditia_pmc[] = array( "name" => "Body background ",
                    "type" => "innerheading");
					
$of_options_munditia_pmc[] = array( "name" => "Use background color for body (block colors will be overwritten)",
					"desc" => "Check this if you wish to have one background color or pattern for the whole body (when you are not using boxed version)",
					"id" => "use_background",
					"std" => 1,
					"type" => "checkbox");					
					
$of_options_munditia_pmc[] = array( "name" =>  "Body Background Color",
					"desc" => "Pick a background color for the theme.",
					"id" => "body_background_color",
					"std" => "#ffffff",
					"type" => "color");

$of_options_munditia_pmc[] = array( "name" => "Enable Background pattern",
					"desc" => "Displays pattern as background (not the image or color)",
					"id" => "background_image",
					"std" => 1,
					"type" => "checkbox");
					
$of_options_munditia_pmc[] = array( "name" => "Background Pattern",
					"desc" => "Select a background pattern.",
					"id" => "body_bg",
					"std" => $bg_images_url."bg16.png",
					"type" => "tiles",
					"options" => $bg_images,
					);	
						
$of_options_munditia_pmc[] = array( "name" => "Enable Background image (for boxed style)",
					"desc" => "Displays image as background (not the pattern or color)",
					"id" => "background_image_full",
					"std" => 1,
					"type" => "checkbox");
					
$of_options_munditia_pmc[] = array( "name" => "Background Image (for boxed style)",
					"desc" => "Upload background image",
					"id" => "image_background",
					"std" => "http://munditia.premiumcoding.com/wp-content/uploads/2014/01/slideshow-2.jpg",
					"type" => "upload");						
					
$of_options_munditia_pmc[] = array( "name" => "Footer/Header background ",
                    "type" => "innerheading");					
					

					
$of_options_munditia_pmc[] = array( "name" =>  "Header and Footer Background Color",
					"desc" => "Header and Footer Background Color.",
					"id" => "header_background_color",
					"std" => "#ffffff",
					"type" => "color");
									
$of_options_munditia_pmc[] = array( "name" => "Enable Background pattern for header/footer",
					"desc" => "Displays pattern as background (not the image or color)",
					"id" => "background_patterm_footer_header",
					"std" => 1,
					"type" => "checkbox");
					
$of_options_munditia_pmc[] = array( "name" => "Background Pattern",
					"desc" => "Select a background pattern.",
					"id" => "h_f_bg",
					"std" => $bg_images_url."bg16.png",
					"type" => "tiles",
					"options" => $bg_images,
					);	

$of_options_munditia_pmc[] = array( "name" => "Custom Style",
                    "type" => "innerheading");				
					
$of_options_munditia_pmc[] = array( "name" => "Custom Style",
                    "desc" => "Add your custom style.",
                    "id" => "custom_style",
                    "std" => " ",
                    "type" => "textarea");						


$of_options_munditia_pmc[] = array( "name" => "Typography",
                    "type" => "heading");
					
$of_options_munditia_pmc[] = array( "name" => "Body Typography Settings",
					"desc" => "Change body typography. Set the font family, size, color and style.",
					"id" => "body_font",
					"std" => array('size' => '13px','color' => '#2a2b2c','face' => 'arial'),
					"type" => "typography");
									
					
$of_options_munditia_pmc[] = array( "name" => "Heading Typography Settings",
					"desc" => "Change heading typography. Set the font family and style.",
					"id" => "heading_font",
					"std" => array('face' => 'Yanone%20Kaffeesatz:300','style' => 'normal'),
					"type" => "typography");	
					
$of_options_munditia_pmc[] = array( "name" => "Menu Typography Settings",
					"desc" => "Change munu typography. Set the font family.",
					"id" => "menu_font",
					"std" => 'Helvetica Neue',
					"type" => "font");		

$of_options_munditia_pmc[] = array( "name" => "Menu font color",
					"desc" => "Change Menu Text Color (main menu).",
					"id" => "menu_color",
					"std" => "#121212",
					"type" => "color");	
					
					
$of_options_munditia_pmc[] = array( "name" => "Box Text Color (text on ribbons and boxes)",
					"desc" => "Change Box Text Color (text on ribbons and boxes).",
					"id" => "body_box_coler",
					"std" => "#ffffff",
					"type" => "color");	

$of_options_munditia_pmc[] = array( "name" => "Link Typography (color of text links)",
					"desc" => "Change Link Typography (color of text links).",
					"id" => "body_link_coler",
					"std" => "#2a2b2c",
					"type" => "color");						

$of_options_munditia_pmc[] = array( "name" => "H1 typography",
					"desc" => "Set H1 font size and color.",
					"id" => "heading_font_h1",
					"std" => array('size' => '30px','color' => '#2a2b2c'),
					"type" => "sizeColor");

$of_options_munditia_pmc[] = array( "name" => "H2 typography",
					"desc" => "Set H2 font size and color.",
					"id" => "heading_font_h2",
					"std" => array('size' => '22px','color' => '#2a2b2c'),
					"type" => "sizeColor");
					
$of_options_munditia_pmc[] = array( "name" => "H3 typography",
					"desc" => "Set H3 font size and color.",
					"id" => "heading_font_h3",
					"std" => array('size' => '20px','color' => '#2a2b2c'),
					"type" => "sizeColor");					

$of_options_munditia_pmc[] = array( "name" => "H4typography",
					"desc" => "Set H4 font size and color.",
					"id" => "heading_font_h4",
					"std" => array('size' => '16px','color' => '#2a2b2c'),
					"type" => "sizeColor");	

$of_options_munditia_pmc[] = array( "name" => "H5 typography",
					"desc" => "Set H5 font size and color.",
					"id" => "heading_font_h5",
					"std" => array('size' => '14px','color' => '#2a2b2c'),
					"type" => "sizeColor");		

$of_options_munditia_pmc[] = array( "name" => "H6 typography",
					"desc" => "Set H6 font size and color.",
					"id" => "heading_font_h6",
					"std" => array('size' => '12px','color' => '#2a2b2c'),
					"type" => "sizeColor");		
										
																							
$of_options_munditia_pmc[] = array( "name" => "Social Options",
					"type" => "heading");  
					
$of_options_munditia_pmc[] = array( "name" => "Social Icons",
					"desc" => "You can add unlimited number of social Icons and sort them with drag and drop.",
					"id" => "socialicons",
					"std" =>  array('title' => 'slide','url' => '/wp-content/uploads/2012/09/sponsor1.png','link' => 'http://premiumcoding.com'),
					"nivo" => false,						
					"team" => false,	
					"ios" => false,					
					"descshow" => false,
					"social" => true,
					"type" => "slider");						


$of_options_munditia_pmc[] = array( "name" => "Error page",
					"type" => "heading");      

					
$of_options_munditia_pmc[] = array( "name" => "404 Error page Title",
                    "desc" => "Set the title of the Error page (404 not found error).",
                    "id" => "errorpagetitle",
                    "std" => __('OOOPS! 404','wp-munditia'),
                    "type" => "text");	
					
$of_options_munditia_pmc[] = array( "name" => "404 Error page Sub Title",
                    "desc" => "Set the sub title of the Error page (404 not found error).",
                    "id" => "errorpagesubtitle",
                    "std" => "Seems like you stumbled at something that doesn't really exist",
                    "type" => "text");						

$of_options_munditia_pmc[] = array( "name" => "404 Error page Title Content Text",
                    "desc" => "Add a description for your 404 page.",
                    "id" => "errorpage",
                    "std" => __('Sorry, but the page you are looking for has not been found.<br/>Try checking the URL for errors, then hit refresh.</br>Or you can simply click the icon below and go home:)','wp-munditia'),
                    "type" => "textarea");	   	
					
	
$of_options_munditia_pmc[] = array( "name" => "Footer Options",
					"type" => "heading");      
		
					
$of_options_munditia_pmc[] = array( "name" => "Copyright info",
                    "desc" => "Add your Copyright or some other notice.",
                    "id" => "copyright",
                    "std" => __('&copy; 2011 All rights reserved. ','wp-munditia'),
                    "type" => "textarea");	

					
					

					
$of_options_munditia_pmc[] = array( "name" => "Translation",
					"type" => "heading");   	
									
						
							
$of_options_munditia_pmc[] = array( "name" => "General Translaction",
                    "type" => "innerheading");								
					
					
$of_options_munditia_pmc[] = array( "name" => "Our latest posts",
                    "desc" => "Translation for Our latest posts text.",
                    "id" => "translation_post",
                    "std" =>  __('Our latest posts','wp-munditia'),
                    "type" => "text");	
					
$of_options_munditia_pmc[] = array( "name" => "Enter search",
                    "desc" => "Translation for enter search text in widget.",
                    "id" => "translation_enter_search",
                    "std" =>  __('Enter search...','wp-munditia'),
                    "type" => "text");						
					
$of_options_munditia_pmc[] = array( "name" => "Portfolio title on home page.",
                    "desc" => "Translation for portfolio title on home page.",
                    "id" => "translation_port",
                    "std" => __('Recent from Our portfolio','wp-munditia'), 
                    "type" => "text");							
					
$of_options_munditia_pmc[] = array( "name" => "Related post",
                    "desc" => "Translation for Related post text.",
                    "id" => "translation_relatedpost",
                    "std" => __('Related post','wp-munditia'),
                    "type" => "text");						


$of_options_munditia_pmc[] = array( "name" => "Home page Our major brands",
                    "desc" => "Translation for Home page Our major brands title.",
                    "id" => "translation_advertise_title",
                    "std" => __('Our major brands','wp-munditia'),
                    "type" => "text");	
					
					
					
$of_options_munditia_pmc[] = array( "name" => "Read more for blog",
                    "desc" => "Translation for Read more.",
                    "id" => "translation_morelinkblog",
                    "std" => __('Read more about this...','wp-munditia'),
                    "type" => "text");						
					
$of_options_munditia_pmc[] = array( "name" => "Read more for portfolio items on front page",                    
					"desc" => "Translation for Read more.",                    
					"id" => "translation_morelinkport",
                    "std" => __('Read more about this...','wp-munditia'),
                    "type" => "text");
			
			

$of_options_munditia_pmc[] = array( "name" => "Portfolio Translaction",
                    "type" => "innerheading");
					

$of_options_munditia_pmc[] = array( "name" => "Project Description",
					"desc" => "Set Project Description",
					"id" => "port_project_description",
					"std" => __('Project description:','wp-munditia'),
					"type" => "text");		

$of_options_munditia_pmc[] = array( "name" => "Project details",
					"desc" => "Set Project details",
					"id" => "port_project_details",
					"std" => __('Project details:','wp-munditia'),
					"type" => "text");						
									
					
$of_options_munditia_pmc[] = array( "name" => "Project URL",
					"desc" => "Set the Project URL Title",
					"id" => "port_project_url",
					"std" => __('Project URL:','wp-munditia'),
					"type" => "text");			
					
$of_options_munditia_pmc[] = array( "name" => "Project designer",
					"desc" => "Set the Project designer Title",
					"id" => "port_project_designer",
					"std" => __('Project designer:','wp-munditia'),
					"type" => "text");	
					
$of_options_munditia_pmc[] = array( "name" => "Project Date of completion",
					"desc" => "Set the Project Date of completion Title",
					"id" => "port_project_date",
					"std" => __('Date of completion:','wp-munditia'),
					"type" => "text");	

$of_options_munditia_pmc[] = array( "name" => "Project Client",
					"desc" => "Set the Client Title",
					"id" => "port_project_client",
					"std" => __('Client:','wp-munditia'),
					"type" => "text");		

$of_options_munditia_pmc[] = array( "name" => "Share the project",
					"desc" => "Set the Share the project Title",
					"id" => "port_project_share",
					"std" => __('Share the <span>project</span>','wp-munditia'),
					"type" => "text");	

$of_options_munditia_pmc[] = array( "name" => "Related project",
					"desc" => "Set the Related projject Title",
					"id" => "port_project_related",
					"std" => __('Related <span>project</span>','wp-munditia'),
					"type" => "text");	

$of_options_munditia_pmc[] = array( "name" => "Show all",
                    "desc" => "Translation for Show all.",
                    "id" => "translation_all",
                    "std" => __('Show all:','wp-munditia'),
                    "type" => "text");		
					
					
									

$of_options_munditia_pmc[] = array( "name" => "Blog translation",
                    "type" => "innerheading");

$of_options_munditia_pmc[] = array( "name" => "Translation for text By",
                    "desc" => "Translation for text By.",
                    "id" => "translation_by",
                    "std" => __('By: ','wp-munditia'),
                    "type" => "text");	

$of_options_munditia_pmc[] = array( "name" => "Leave the comment",
                    "desc" => "Translation for text Leave the comment.",
                    "id" => "translation_leave_comment",
                    "std" => __('Leave the comment ','wp-munditia'),
                    "type" => "text");
					

$of_options_munditia_pmc[] = array( "name" => "Share post",
                    "desc" => "Translation for Share  post title.",
                    "id" => "translation_share_post",
                    "std" => __('Share this post','wp-munditia'),
                    "type" => "text");		


$of_options_munditia_pmc[] = array( "name" => "Comment translation",
                    "type" => "innerheading");
					
$of_options_munditia_pmc[] = array( "name" => "Recent Comments text",
                    "desc" => "Translation for Recent Comments text.",
                    "id" => "translation_recent_comments",
                    "std" => __('Recent Comments','wp-munditia'),
                    "type" => "text");						

$of_options_munditia_pmc[] = array( "name" => "Leave a Reply text",
                    "desc" => "Translation for Leave a Reply title.",
                    "id" => "translation_comment_leave_replay",
                    "std" => __('Leave a Reply','wp-munditia'),
                    "type" => "text");	

$of_options_munditia_pmc[] = array( "name" => "Leave a Reply to text",
                    "desc" => "Translation for Leave a Reply to title.",
                    "id" => "translation_comment_leave_replay_to",
                    "std" => __('Leave a Reply to','wp-munditia'),
                    "type" => "text");		

$of_options_munditia_pmc[] = array( "name" => "Cancle Replay text",
                    "desc" => "Translation for Cancle Replay title.",
                    "id" => "translation_comment_leave_replay_cancle",
                    "std" => __('Cancle Replay','wp-munditia'),
                    "type" => "text");						

$of_options_munditia_pmc[] = array( "name" => "Name text",
                    "desc" => "Translation for Name text.",
                    "id" => "translation_comment_name",
                    "std" => __('Name','wp-munditia'),
                    "type" => "text");		

$of_options_munditia_pmc[] = array( "name" => "Mail text",
                    "desc" => "Translation for Mail text.",
                    "id" => "translation_comment_mail",
                    "std" => __('Mail','wp-munditia'),
                    "type" => "text");	

$of_options_munditia_pmc[] = array( "name" => "Website text",
                    "desc" => "Translation for Website text.",
                    "id" => "translation_comment_website",
                    "std" => __('Website','wp-munditia'),
                    "type" => "text");							

$of_options_munditia_pmc[] = array( "name" => "Required text",
                    "desc" => "Translation for required text.",
                    "id" => "translation_comment_required",
                    "std" => __('required','wp-munditia'),
                    "type" => "text");							

$of_options_munditia_pmc[] = array( "name" => "Comments are closed text",
                    "desc" => "Translation for Comments are closed text.",
                    "id" => "translation_comment_closed",
                    "std" => __('Comments are closed.','wp-munditia'),
                    "type" => "text");		

$of_options_munditia_pmc[] = array( "name" => "No Responses text",
                    "desc" => "Translation for No Responses text.",
                    "id" => "translation_comment_no_responce",
                    "std" => __('No Responses','wp-munditia'),
                    "type" => "text");

$of_options_munditia_pmc[] = array( "name" => "One Response text",
                    "desc" => "Translation One Response text.",
                    "id" => "translation_comment_one_comment",
                    "std" => __('One Response','wp-munditia'),
                    "type" => "text");

$of_options_munditia_pmc[] = array( "name" => "Responses text",
                    "desc" => "Translation for Responses text.",
                    "id" => "translation_comment_max_comment",
                    "std" => __('Responses','wp-munditia'),
                    "type" => "text");					


		
$of_options_munditia_pmc[] = array( "name" => "Backup Options",
					"type" => "heading");

$of_options_munditia_pmc[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);

$of_options_munditia_pmc[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "YToxNDg6e3M6MTM6InNob3dhZHZlcnRpc2UiO3M6MToiMSI7czoxNToiaW5mb3RleHRfc3RhdHVzIjtzOjE6IjEiO3M6MTA6ImJveF9zdGF0dXMiO3M6MToiMSI7czoxODoiaG9tZV9yZWNlbnRfbnVtYmVyIjtzOjI6IjEyIjtzOjI2OiJob21lX3JlY2VudF9udW1iZXJfZGlzcGxheSI7czoxOiIzIjtzOjMxOiJob21lX3JlY2VudF9udW1iZXJfZGlzcGxheV9wb3N0IjtzOjE6IjMiO3M6MjM6ImhvbWVfcmVjZW50X251bWJlcl9wb3N0IjtzOjI6IjIwIjtzOjE2OiJob2VtcmVjZW50ZGVzaWduIjtzOjE6IjEiO3M6MTA6ImNhdHdvb3R5cGUiO3M6MToiMSI7czoxMToiYWRkX3RvX2NhcnQiO3M6MToiMSI7czoyMToicmFjZW50X3N0YXR1c19wcm9kdWN0IjtzOjE6IjEiO3M6Mjc6ImhvbWVfcmVjZW50X3Byb2R1Y3RzX251bWJlciI7czoyOiIxMiI7czozNDoiaG9tZV9yZWNlbnRfbnVtYmVyX2Rpc3BsYXlfcHJvZHVjdCI7czoxOiI2IjtzOjIyOiJyYWNlbnRfc3RhdHVzX3Byb2R1Y3RGIjtzOjE6IjEiO3M6Mjg6ImhvbWVfcmVjZW50X3Byb2R1Y3RzRl9udW1iZXIiO3M6MjoiMTIiO3M6MzU6ImhvbWVfcmVjZW50X251bWJlcl9kaXNwbGF5X2Zwcm9kdWN0IjtzOjE6IjMiO3M6MTY6InByb2R1Y3RfY2F0X3BhZ2UiO3M6MjoiMTIiO3M6MTY6InRyYW5zbGF0aW9uX2NhcnQiO3M6NDoiQ2FydCI7czoyNToidHJhbnNsYXRpb25fc2hhcmVfcHJvZHVjdCI7czoxODoiU2hhcmUgdGhpcyBwcm9kdWN0IjtzOjIxOiJ0cmFuc2xhdGlvbl9hbHNvX2xpa2UiO3M6MTk6IllvdSBtaWdodCBhbHNvIGxpa2UiO3M6MjY6InRyYW5zbGF0aW9uX2xvZ2luX3JlZ2lzdGVyIjtzOjE2OiJMb2dpbiAvIFJlZ2lzdGVyIjtzOjIwOiJ0cmFuc2xhdGlvbl9mZWF0dXJlZCI7czoyOToiRmVhdHVyZWQgUHJvZHVjdHMgaW4gRW1wb3JpdW0iO3M6MzI6InRyYW5zbGF0aW9uX3JlY2VudF9wcnVkdWN0X3RpdGxlIjtzOjI3OiJSZWNlbnQgQXJyaXZhbHMgaW4gRW1wb3JpdW0iO3M6ODoiaW5mb3RleHQiO3M6NTc6IldlbGNvbWUgdG8gPHNwYW4+RW1wb3JpdW08L3NwYW4+IC0gV2UgYXJlIGdsYWQgdG8gc2VlIHlvdSI7czoxOToicXVvdGVfYm90dG9tX2JvcmRlciI7czoxOiIxIjtzOjEwOiJib3gxX3RpdGxlIjtzOjI2OiJGYXN0IGFuZCBlZmZpY2llbnQgU3VwcG9ydCI7czoxMDoiYm94MV9pbWFnZSI7czo4MToiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzExL2ZlYXR1cmVkLWltYWdlLTUuanBnIjtzOjk6ImJveDFfbGluayI7czoyNDoiaHR0cDovL3ByZW1pdW1jb2RpbmcuY29tIjtzOjE2OiJib3gxX2Rlc2NyaXB0aW9uIjtzOjI3NjoiPHN0cm9uZz5Eb25lYyBwZWRlPC9zdHJvbmc+IGp1c3RvLCBmcmluZ2lsbGEgdmVsLCBhbHUsIA0KdnVscHV0IGVnZXQsIGFyY3UuIEluIGVuaW0ganVzdG8sIA0KdXQsIGltcGVyZGlldCBhLCB2ZW5lbmF0aXMgdml0YWUsIHRvLg0KcGVkZSA8c3Ryb25nPmp1c3RvPC9zdHJvbmc+LCBmcmluZ2lsbGEgdmVsLCBhbGlldC4gTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsICA8c3Ryb25nPmNvbnNlY3RldHVlciBhZGlwaXNjaW5nIDwvc3Ryb25nPiBlbGl0LCBzZWQgZGlhbSBub251bW0uIjtzOjEwOiJib3gyX3RpdGxlIjtzOjI1OiJPbmxpbmUgc3RvcmUgLSBzaW1wbGlmaWVkIjtzOjEwOiJib3gyX2ltYWdlIjtzOjExNDoiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzExL3Bob3RvZHVuZS0xMzAyMzkyLXdvbWFuLW9wZW5pbmctYS1yZXRhaWwtc3RvcmUteHMuanBnIjtzOjk6ImJveDJfbGluayI7czoyNDoiaHR0cDovL3ByZW1pdW1jb2RpbmcuY29tIjtzOjE2OiJib3gyX2Rlc2NyaXB0aW9uIjtzOjI3NjoiPHN0cm9uZz5Eb25lYyBwZWRlPC9zdHJvbmc+IGp1c3RvLCBmcmluZ2lsbGEgdmVsLCBhbHUsIA0KdnVscHV0IGVnZXQsIGFyY3UuIEluIGVuaW0ganVzdG8sIA0KdXQsIGltcGVyZGlldCBhLCB2ZW5lbmF0aXMgdml0YWUsIHRvLg0KcGVkZSA8c3Ryb25nPmp1c3RvPC9zdHJvbmc+LCBmcmluZ2lsbGEgdmVsLCBhbGlldC4gTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsICA8c3Ryb25nPmNvbnNlY3RldHVlciBhZGlwaXNjaW5nIDwvc3Ryb25nPiBlbGl0LCBzZWQgZGlhbSBub251bW0uIjtzOjEwOiJib3gzX3RpdGxlIjtzOjI4OiJDYXJuaXZhbCBNYXNrcyBEaXNjb3VudCBTYWxlIjtzOjEwOiJib3gzX2ltYWdlIjtzOjkwOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMTEvcGhvdG9kdW5lLTI0NjE2ODUtbWFzay14cy5qcGciO3M6OToiYm94M19saW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO3M6MTY6ImJveDNfZGVzY3JpcHRpb24iO3M6Mjc2OiI8c3Ryb25nPkRvbmVjIHBlZGU8L3N0cm9uZz4ganVzdG8sIGZyaW5naWxsYSB2ZWwsIGFsdSwgDQp2dWxwdXQgZWdldCwgYXJjdS4gSW4gZW5pbSBqdXN0bywgDQp1dCwgaW1wZXJkaWV0IGEsIHZlbmVuYXRpcyB2aXRhZSwgdG8uDQpwZWRlIDxzdHJvbmc+anVzdG88L3N0cm9uZz4sIGZyaW5naWxsYSB2ZWwsIGFsaWV0LiBMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgIDxzdHJvbmc+Y29uc2VjdGV0dWVyIGFkaXBpc2NpbmcgPC9zdHJvbmc+IGVsaXQsIHNlZCBkaWFtIG5vbnVtbS4iO3M6MTQ6ImFkdmVydGlzZWltYWdlIjthOjk6e2k6MTthOjQ6e3M6NToib3JkZXIiO3M6MToiMSI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDEiO3M6MzoidXJsIjtzOjczOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvcjEucG5nIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7fWk6MjthOjQ6e3M6NToib3JkZXIiO3M6MToiMiI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDIiO3M6MzoidXJsIjtzOjczOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvcjIucG5nIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7fWk6MzthOjQ6e3M6NToib3JkZXIiO3M6MToiMyI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDMiO3M6MzoidXJsIjtzOjczOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvcjMucG5nIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7fWk6NDthOjQ6e3M6NToib3JkZXIiO3M6MToiNCI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDQiO3M6MzoidXJsIjtzOjczOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvcjQucG5nIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7fWk6NTthOjQ6e3M6NToib3JkZXIiO3M6MToiNSI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDUiO3M6MzoidXJsIjtzOjczOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvcjYucG5nIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7fWk6NjthOjQ6e3M6NToib3JkZXIiO3M6MToiNiI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDYiO3M6MzoidXJsIjtzOjczOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvcjkucG5nIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7fWk6NzthOjQ6e3M6NToib3JkZXIiO3M6MToiNyI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDciO3M6MzoidXJsIjtzOjc1OiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvci0xMC5wbmciO3M6NDoibGluayI7czoyNDoiaHR0cDovL3ByZW1pdW1jb2RpbmcuY29tIjt9aTo4O2E6NDp7czo1OiJvcmRlciI7czoxOiI4IjtzOjU6InRpdGxlIjtzOjk6IlNwb25zb3IgOCI7czozOiJ1cmwiO3M6NzQ6Imh0dHA6Ly9lbXBvcml1bS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMi8wOS9zcG9uc29yNTEucG5nIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7fWk6OTthOjQ6e3M6NToib3JkZXIiO3M6MToiOSI7czo1OiJ0aXRsZSI7czo5OiJTcG9uc29yIDkiO3M6MzoidXJsIjtzOjc3OiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3BvbnNvckxvZ283LnBuZyI7czo0OiJsaW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO319czo0OiJsb2dvIjtzOjc1OiJodHRwOi8vZGFlZHJhLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzEwL2xvZ28tZGFlZHJhNC5wbmciO3M6NzoiZmF2aWNvbiI7czo3NzoiaHR0cDovL21lcmNvci5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMi8wOS9mYXZpY29uLW1lcmNvci5wbmciO3M6MTY6Imdvb2dsZV9hbmFseXRpY3MiO3M6NTA4OiI8c2NyaXB0IHR5cGU9XCJ0ZXh0L2phdmFzY3JpcHRcIj4NCg0KICB2YXIgX2dhcSA9IF9nYXEgfHwgW107DQogIF9nYXEucHVzaChbXCdfc2V0QWNjb3VudFwnLCBcJ1VBLTg2OTM0ODYtMjdcJ10pOw0KICBfZ2FxLnB1c2goW1wnX3RyYWNrUGFnZXZpZXdcJ10pOw0KDQogIChmdW5jdGlvbigpIHsNCiAgICB2YXIgZ2EgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwnc2NyaXB0XCcpOyBnYS50eXBlID0gXCd0ZXh0L2phdmFzY3JpcHRcJzsgZ2EuYXN5bmMgPSB0cnVlOw0KICAgIGdhLnNyYyA9IChcJ2h0dHBzOlwnID09IGRvY3VtZW50LmxvY2F0aW9uLnByb3RvY29sID8gXCdodHRwczovL3NzbFwnIDogXCdodHRwOi8vd3d3XCcpICsgXCcuZ29vZ2xlLWFuYWx5dGljcy5jb20vZ2EuanNcJzsNCiAgICB2YXIgcyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwnc2NyaXB0XCcpWzBdOyBzLnBhcmVudE5vZGUuaW5zZXJ0QmVmb3JlKGdhLCBzKTsNCiAgfSkoKTsNCg0KPC9zY3JpcHQ+IjtzOjk6Im1haW5Db2xvciI7czo3OiIjRUVDNDNEIjtzOjg6ImJveENvbG9yIjtzOjc6IiMzNDM0MzQiO3M6MTU6IlNoYWRvd0NvbG9yRm9udCI7czo3OiIjZmZmZmZmIjtzOjIzOiJTaGFkb3dPcGFjaXR0eUNvbG9yRm9udCI7czozOiIwLjIiO3M6MjE6ImJvZHlfYmFja2dyb3VuZF9jb2xvciI7czo3OiIjZmFmYWZhIjtzOjE2OiJiYWNrZ3JvdW5kX2ltYWdlIjtzOjE6IjEiO3M6NzoiYm9keV9iZyI7czo3OToiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdGhlbWVzL2VtcG9yaXVtL2ltYWdlcy9iZy9iZzE2LnBuZyI7czoxODoiYm9keV9iZ19wcm9wZXJ0aWVzIjtzOjEwOiJyZXBlYXQgMCAwIjtzOjIzOiJiYWNrZ3JvdW5kX2ltYWdlX2hlYWRlciI7czoxOiIxIjtzOjIzOiJoZWFkZXJfYmFja2dyb3VuZF9jb2xvciI7czo3OiIjMWUxZTIwIjtzOjk6ImhlYWRlcl9iZyI7czo4NjoiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdGhlbWVzL2VtcG9yaXVtL2ltYWdlcy9iZy1oZWFkZXIvYmcxMi5wbmciO3M6MjA6ImhlYWRlcl9iZ19wcm9wZXJ0aWVzIjtzOjEwOiJyZXBlYXQgMCAwIjtzOjEyOiJjdXN0b21fc3R5bGUiO3M6MDoiIjtzOjExOiJkZW1vX3NsaWRlciI7YTo0OntpOjE7YTo4OntzOjU6Im9yZGVyIjtzOjE6IjEiO3M6NToidGl0bGUiO3M6NToiTWFza3MiO3M6MzoidXJsIjtzOjc2OiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMTEvZW1wdHlIb2xkZXIucG5nIjtzOjU6InZpZGVvIjtzOjA6IiI7czozOiJ0b3AiO3M6MjoiMjUiO3M6NDoibGVmdCI7czoyOiI1NyI7czo0OiJsaW5rIjtzOjA6IiI7czoxMToiZGVzY3JpcHRpb24iO3M6MTc4NjoiPGRpdiBjbGFzcz1cImNhcHRpb25Cb3hcIiBzdHlsZT1cImhlaWdodDogMjM1cHg7IG1hcmdpbi1sZWZ0OjQwcHg7IHotaW5kZXg6MTI7XCI+DQo8aDEgY2xhc3M9XCJ1bmRlcmxpbmVcIiBzdHlsZT1cInBhZGRpbmc6IDE1cHggMjVweCAxNXB4IDBweDsgZm9udC1zaXplOiAyNnB4ICFpbXBvcnRhbnQ7XCI+Q0FSTklWQUwgTUFTS1M8L2gxPg0KPHVsIGNsYXNzPVwicXVvdGVcIiBzdHlsZT1cInBhZGRpbmctcmlnaHQ6IDIwcHg7XCI+DQoJPGxpIGNsYXNzPVwibGVmdFwiPllvdSBjYW4gYWRkIDxzdHJvbmc+dW5pcXVlIDwvc3Ryb25nPiBpbWFnZXM8L2xpPg0KCTxsaSBjbGFzcz1cInJpZ2h0XCI+dG8gZWFjaCBzbGlkZSBhbmQgbWFrZSB0aGVtIDxzcGFuIHN0eWxlPVwiZm9udC13ZWlnaHQ6IGJvbGQ7XCI+ZGlzdGluY3QuPC9zcGFuPjwvbGk+DQoJPGxpIGNsYXNzPVwibGVmdFwiPkdldCB0aGUgY29tcGxldGUgPHNwYW4gc3R5bGU9XCJmb250LXdlaWdodDogYm9sZDtcIj5mcmVlZG9tPC9zcGFuPiBvZiB5b3VyIGRlc2lnbi48L2xpPg0KCTxsaSBjbGFzcz1cInJpZ2h0XCI+QSBjcmVhdGl2ZSBhcHByb2FjaCB0byA8c3Ryb25nPndlYiBkZXNpZ24uPC9zdHJvbmc+PC9saT4NCjwvdWw+DQo8dWw+DQoJPGxpIGNsYXNzPVwiYnV0dG9uXCI+PGEgaHJlZj1cImh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbVwiPlJFQUQgTU9SRTwvYT48L2xpPg0KPC91bD4NCjwvZGl2Pg0KDQo8dWw+DQoNCg0KPGxpIGNsYXNzPVwidG9wMVwiPg0KPGEgaHJlZiA9XCJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vc2hvcC0yL2Etc2lsdmVyLWFuZC1ibGFjay1jYXJuaXZhbC1tYXNrL1wiPg0KPGltZyBzdHlsZSA9IFwibWFyZ2luOi0xMjBweCAwcHggMCAtNjAwcHg7XCIgc3JjPVwiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzExL2Nhcm5pdmFsLW1hc2stMTUucG5nDQpcIi8+PC9hPjwvbGk+DQoNCjxsaSBjbGFzcz1cInRvcDJcIj4NCjxhIGhyZWYgPVwiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3Nob3AtMi9hLXNpbHZlci1hbmQtYmxhY2stY2Fybml2YWwtbWFzay9cIj4NCjxpbWcgc3R5bGUgPSBcIm1hcmdpbjotMTI1cHggMHB4IDAgLTI4NXB4O1wiIHNyYz1cImh0dHA6Ly9lbXBvcml1bS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMi8xMS9jYXJuaXZhbC1tYXNrLTIzLnBuZw0KXCIvPjwvYT48L2xpPg0KDQo8bGkgY2xhc3M9XCJ0b3AzXCI+DQo8YSBocmVmID1cImh0dHA6Ly9lbXBvcml1bS5wcmVtaXVtY29kaW5nLmNvbS9zaG9wLTIvYS1zaWx2ZXItYW5kLWJsYWNrLWNhcm5pdmFsLW1hc2svXCI+DQo8aW1nIHN0eWxlID0gXCJtYXJnaW46MTIwcHggMHB4IDAgLTYwMHB4O1wiIHNyYz1cImh0dHA6Ly9lbXBvcml1bS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMi8xMS9jYXJuaXZhbC1tYXNrLTUucG5nDQpcIi8+PC9hPjwvbGk+DQoNCjxsaSBjbGFzcz1cInRvcDRcIj4NCjxhIGhyZWYgPVwiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3Nob3AtMi9hLXNpbHZlci1hbmQtYmxhY2stY2Fybml2YWwtbWFzay9cIj4NCjxpbWcgc3R5bGUgPSBcIm1hcmdpbjoxMTVweCAwcHggMCAtMjg1cHg7XCIgc3JjPVwiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzExL2Nhcm5pdmFsLW1hc2stNC5wbmcNClwiLz48L2E+PC9saT4NCg0KPC91bD4NCg0KICI7fWk6MjthOjg6e3M6NToib3JkZXIiO3M6MToiMiI7czo1OiJ0aXRsZSI7czo1OiJWaWRlbyI7czozOiJ1cmwiO3M6MDoiIjtzOjU6InZpZGVvIjtzOjM4OiJodHRwOi8vcGxheWVyLnZpbWVvLmNvbS92aWRlby8zNTg5OTE0OSI7czozOiJ0b3AiO3M6MToiNiI7czo0OiJsZWZ0IjtzOjQ6Ijc5LjEiO3M6NDoibGluayI7czowOiIiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjY3NzoiPGRpdiBjbGFzcz1cImNhcHRpb25Cb3hcIiBzdHlsZT1cImhlaWdodDogNDQwcHg7IHdpZHRoOjIwMHB4O1wiPg0KPGgxIGNsYXNzPVwidW5kZXJsaW5lXCIgc3R5bGU9XCJwYWRkaW5nOiAxNXB4IDI1cHggMTVweCAwcHg7IGZvbnQtc2l6ZTogMjZweCAhaW1wb3J0YW50O1wiPlZJREVPUzwvaDE+DQo8dWwgY2xhc3M9XCJxdW90ZVwiIHN0eWxlPVwicGFkZGluZy1yaWdodDogMjBweDtcIj4NCgk8bGkgY2xhc3M9XCJsZWZ0XCI+WW91IGNhbiBhZGQgdmlkZW9zDQoJYW5kIGFkZCBkZXNjcmlwdGlvbg0KCVRlbGwgeW91ciB2aXNpdG9ycy4NCgl3aGF0IGl0XCdzIGFib3V0Lg0KICAgICAgICBMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0dWVyIGFkaXBpc2NpbmcgZWxpdCwgc2VkIGRpYW0gbm9udW1teSBuaWJoIGV1aXNtb2QgdGluY2lkdW50IHV0IGxhb3JlZXQgZG9sb3JlIG1hZ25hIGFsaXF1YW0gZXJhdCB2b2x1dHBhdC4gIExvcmVtIGlwc3VtIGRvbG9yIHNpdCBhbWV0LCBjb25zZWN0ZXR1ZXIgYWRpcGlzY2luZyBlbGl0LiBMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldDwvc3Ryb25nPjwvbGk+DQo8L3VsPg0KDQoJPGxpIGNsYXNzPVwiYnV0dG9uXCI+PGEgaHJlZj1cImh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbVwiPlJFQUQgTU9SRTwvYT48L2xpPg0KDQo8L2Rpdj4iO31pOjM7YTo4OntzOjU6Im9yZGVyIjtzOjE6IjMiO3M6NToidGl0bGUiO3M6NToiSXBhZHMiO3M6MzoidXJsIjtzOjc2OiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMTEvZW1wdHlIb2xkZXIucG5nIjtzOjU6InZpZGVvIjtzOjA6IiI7czozOiJ0b3AiO3M6MjoiMjQiO3M6NDoibGVmdCI7czoyOiI2MCI7czo0OiJsaW5rIjtzOjA6IiI7czoxMToiZGVzY3JpcHRpb24iO3M6MTQwMjoiPHVsPg0KPGxpIGNsYXNzPVwidG9wMlwiIHN0eWxlPVwiei1pbmRleDo5O1wiPg0KPGEgaHJlZiA9XCJodHRwOi8vZGFlZHJhLnByZW1pdW1jb2RpbmcuY29tXCI+DQo8aW1nIHN0eWxlID0gXCJtYXJnaW46MjBweCAwcHggMCAtNjg1cHg7XCIgc3JjPVwiaHR0cDovL2RhZWRyYS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMi8xMC9pcGhvbmUucG5nDQpcIi8+PC9hPjwvbGk+DQoNCg0KPGxpIGNsYXNzPVwidG9wMVwiIHN0eWxlPVwiei1pbmRleDo4O1wiPg0KPGEgaHJlZiA9XCJodHRwOi8vZGFlZHJhLnByZW1pdW1jb2RpbmcuY29tXCI+DQo8aW1nIHN0eWxlID0gXCJtYXJnaW46LTYzcHggMHB4IDAgLTYyMHB4O1wiIHNyYz1cImh0dHA6Ly9kYWVkcmEucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMTAvbGNkbW9uaXRvci5wbmcNClwiLz48L2E+PC9saT4NCg0KPGxpIGNsYXNzPVwidG9wM1wiIHN0eWxlPVwiei1pbmRleDoxMDtcIj4NCjxhIGhyZWYgPVwiaHR0cDovL2RhZWRyYS5wcmVtaXVtY29kaW5nLmNvbVwiPg0KPGltZyBzdHlsZSA9IFwibWFyZ2luOjEwNnB4IDBweCAwIC0zMzBweDtcIiBzcmM9XCJodHRwOi8vZGFlZHJhLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzEwL2lwYWQucG5nDQpcIi8+PC9hPjwvbGk+DQoNCjwvdWw+DQoNCg0KDQoNCg0KPGRpdiBjbGFzcz1cImNhcHRpb25Cb3hcIiBzdHlsZT1cImhlaWdodDogMjM1cHg7XCI+DQo8aDEgY2xhc3M9XCJ1bmRlcmxpbmVcIiBzdHlsZT1cInBhZGRpbmc6IDE1cHggMjVweCAxNXB4IDBweDsgZm9udC1zaXplOiAyNnB4ICFpbXBvcnRhbnQ7XCI+VU5MSU1JVEVEIElNQUdFUzwvaDE+DQo8dWwgY2xhc3M9XCJxdW90ZVwiIHN0eWxlPVwicGFkZGluZy1yaWdodDogMjBweDtcIj4NCgk8bGkgY2xhc3M9XCJsZWZ0XCI+WW91IGNhbiBhZGQgPHN0cm9uZz51bmlxdWUgPC9zdHJvbmc+IHdpZGUgaW1hZ2VzPC9saT4NCgk8bGkgY2xhc3M9XCJyaWdodFwiPnZpZGVvcyBhbmQgZXh0cmEgaW1hZ2VzIDxzcGFuIHN0eWxlPVwiZm9udC13ZWlnaHQ6IGJvbGQ7XCI+dG8gc2xpZGVyLjwvc3Bhbj48L2xpPg0KCTxsaSBjbGFzcz1cImxlZnRcIj5HZXQgdGhlIGNvbXBsZXRlIDxzcGFuIHN0eWxlPVwiZm9udC13ZWlnaHQ6IGJvbGQ7XCI+ZnJlZWRvbTwvc3Bhbj4gb2YgeW91ciBkZXNpZ24uPC9saT4NCgk8bGkgY2xhc3M9XCJyaWdodFwiPkEgY3JlYXRpdmUgYXBwcm9hY2ggdG8gPHN0cm9uZz53ZWIgZGVzaWduLjwvc3Ryb25nPjwvbGk+DQo8L3VsPg0KPHVsPg0KCTxsaSBjbGFzcz1cImJ1dHRvblwiPjxhIGhyZWY9XCJodHRwOi8vcHJlbWl1bWNvZGluZy5jb21cIj5SRUFEIE1PUkU8L2E+PC9saT4NCjwvdWw+DQo8L2Rpdj4NCiI7fWk6NDthOjg6e3M6NToib3JkZXIiO3M6MToiNCI7czo1OiJ0aXRsZSI7czo1OiJJbWFnZSI7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly9lbXBvcml1bS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMi8xMS9yYWlsd2F5LmpwZyI7czo1OiJ2aWRlbyI7czowOiIiO3M6MzoidG9wIjtzOjI6IjI1IjtzOjQ6ImxlZnQiO3M6MjoiMjUiO3M6NDoibGluayI7czowOiIiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjY5MjoiPGRpdiBjbGFzcz1cImNhcHRpb25Cb3hcIiBzdHlsZT1cImhlaWdodDogMjM1cHg7XCI+DQo8aDEgY2xhc3M9XCJ1bmRlcmxpbmVcIiBzdHlsZT1cInBhZGRpbmc6IDE1cHggMjVweCAxNXB4IDBweDsgZm9udC1zaXplOiAyNnB4ICFpbXBvcnRhbnQ7XCI+VU5MSU1JVEVEIElNQUdFUzwvaDE+DQo8dWwgY2xhc3M9XCJxdW90ZVwiIHN0eWxlPVwicGFkZGluZy1yaWdodDogMjBweDtcIj4NCgk8bGkgY2xhc3M9XCJsZWZ0XCI+WW91IGNhbiBhZGQgPHN0cm9uZz51bmlxdWUgPC9zdHJvbmc+IHdpZGUgaW1hZ2VzPC9saT4NCgk8bGkgY2xhc3M9XCJyaWdodFwiPnZpZGVvcyBhbmQgZXh0cmEgaW1hZ2VzIDxzcGFuIHN0eWxlPVwiZm9udC13ZWlnaHQ6IGJvbGQ7XCI+dG8gc2xpZGVyLjwvc3Bhbj48L2xpPg0KCTxsaSBjbGFzcz1cImxlZnRcIj5HZXQgdGhlIGNvbXBsZXRlIDxzcGFuIHN0eWxlPVwiZm9udC13ZWlnaHQ6IGJvbGQ7XCI+ZnJlZWRvbTwvc3Bhbj4gb2YgeW91ciBkZXNpZ24uPC9saT4NCgk8bGkgY2xhc3M9XCJyaWdodFwiPkEgY3JlYXRpdmUgYXBwcm9hY2ggdG8gPHN0cm9uZz53ZWIgZGVzaWduLjwvc3Ryb25nPjwvbGk+DQo8L3VsPg0KPHVsPg0KCTxsaSBjbGFzcz1cImJ1dHRvblwiPjxhIGhyZWY9XCJodHRwOi8vcHJlbWl1bWNvZGluZy5jb21cIj5SRUFEIE1PUkU8L2E+PC9saT4NCjwvdWw+DQo8L2Rpdj4iO319czoxMToibml2b19zbGlkZXIiO2E6Mjp7aToxO2E6NTp7czo1OiJvcmRlciI7czoxOiIxIjtzOjU6InRpdGxlIjtzOjc6IkltYWdlIDEiO3M6MzoidXJsIjtzOjEwMjoiaHR0cDovL2VtcG9yaXVtLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzExL3Bob3RvZHVuZS0yMDM0MjU0LWRhcmstZmFzaGlvbi1tLW5pdm8uanBnIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7czoxMToiZGVzY3JpcHRpb24iO3M6NjE6IlRoaXMgaXMgYSBOaXZvIFNsaWRlciBDYXB0aW9uIFRleHQuIFNheSBzb21ldGhpbmcgbWVhbmluZ2Z1bC4iO31pOjI7YTo1OntzOjU6Im9yZGVyIjtzOjE6IjIiO3M6NToidGl0bGUiO3M6NzoiSW1hZ2UgMiI7czozOiJ1cmwiO3M6MTQyOiJodHRwOi8vZW1wb3JpdW0ucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMTEvcGhvdG9kdW5lLTMwMjYyMTgtY2xhc3NpY2FsLXJldHJvLXN0eWxlLXBvcnRyYWl0LXJvbWFudGljLWJlYXV0eS12aW50YWdlLW5pdm8uanBnIjtzOjQ6ImxpbmsiO3M6MjQ6Imh0dHA6Ly9wcmVtaXVtY29kaW5nLmNvbSI7czoxMToiZGVzY3JpcHRpb24iO3M6Mjc6IkNoZWNrIG91ciBsYXRlc3QgQ29sbGVjdGlvbiI7fX1zOjE0OiJzbGlkZXJfb3BhY2l0eSI7czozOiIwLjkiO3M6ODoiYW5pc3BlZWQiO3M6MzoiODAwIjtzOjk6InBhdXNldGltZSI7czo1OiIyMDAwMCI7czoyNToic2xpZGVyX2ZvbnRTaXplX2NvbG9yTml2byI7YToyOntzOjQ6InNpemUiO3M6NDoiMjRweCI7czo1OiJjb2xvciI7czo3OiIjMmEyYjJjIjt9czoyMDoic2xpZGVyX2JhY2tDb2xvck5pdm8iO3M6NzoiI0VFQzQzRCI7czoyMjoic2xpZGVyX2JvcmRlckNvbG9yTml2byI7czo3OiIjRUVDNDNEIjtzOjY6ImVmZmVjdCI7czo2OiJyYW5kb20iO3M6Njoic2xpY2VzIjtzOjI6IjE1IjtzOjc6ImJveGNvbHMiO3M6MToiOCI7czo3OiJib3hyb3dzIjtzOjE6IjQiO3M6OToiYm9keV9mb250IjthOjM6e3M6NDoic2l6ZSI7czo0OiIxM3B4IjtzOjU6ImNvbG9yIjtzOjc6IiMyYTJiMmMiO3M6NDoiZmFjZSI7czo1OiJhcmlhbCI7fXM6MTI6ImhlYWRpbmdfZm9udCI7YToyOntzOjQ6ImZhY2UiO3M6MjM6Illhbm9uZSUyMEthZmZlZXNhdHo6MjAwIjtzOjU6InN0eWxlIjtzOjY6Im5vcm1hbCI7fXM6OToibWVudV9mb250IjtzOjE0OiJIZWx2ZXRpY2EgTmV1ZSI7czoxNDoiYm9keV9ib3hfY29sZXIiO3M6NzoiIzJhMmIyYyI7czoxNToiYm9keV9saW5rX2NvbGVyIjtzOjc6IiMyYTJiMmMiO3M6MTU6ImhlYWRpbmdfZm9udF9oMSI7YToyOntzOjQ6InNpemUiO3M6NDoiMzRweCI7czo1OiJjb2xvciI7czo3OiIjMmEyYjJjIjt9czoxNToiaGVhZGluZ19mb250X2gyIjthOjI6e3M6NDoic2l6ZSI7czo0OiIzMHB4IjtzOjU6ImNvbG9yIjtzOjc6IiMyYTJiMmMiO31zOjE1OiJoZWFkaW5nX2ZvbnRfaDMiO2E6Mjp7czo0OiJzaXplIjtzOjQ6IjIycHgiO3M6NToiY29sb3IiO3M6NzoiIzJhMmIyYyI7fXM6MTU6ImhlYWRpbmdfZm9udF9oNCI7YToyOntzOjQ6InNpemUiO3M6NDoiMThweCI7czo1OiJjb2xvciI7czo3OiIjMmEyYjJjIjt9czoxNToiaGVhZGluZ19mb250X2g1IjthOjI6e3M6NDoic2l6ZSI7czo0OiIxN3B4IjtzOjU6ImNvbG9yIjtzOjc6IiMyYTJiMmMiO31zOjE1OiJoZWFkaW5nX2ZvbnRfaDYiO2E6Mjp7czo0OiJzaXplIjtzOjQ6IjE2cHgiO3M6NToiY29sb3IiO3M6NzoiIzJhMmIyYyI7fXM6NDoidGVhbSI7YTo2OntpOjE7YToxMTp7czo1OiJvcmRlciI7czoxOiIxIjtzOjU6InRpdGxlIjtzOjg6IkphbmUgRG9lIjtzOjQ6InJvbGUiO3M6MTk6IlByZXNpZGVudCAmIEZvdW5kZXIiO3M6MzoidXJsIjtzOjc0OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L3RlYW1NZW1iZXIxLmpwZyI7czo0OiJpY29uIjtzOjc0OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L2ZvdW5kZXJUZWFtLnBuZyI7czo3OiJ0d2l0dGVyIjtzOjMyOiJodHRwOi8vdHdpdHRlci5jb20vcHJlbWl1bWNvZGluZyI7czo4OiJmYWNlYm9vayI7czozNjoiaHR0cDovL3d3dy5mYWNlYm9vay5jb20vR0ZsYXNoRGVzaWduIjtzOjU6InZpbWVvIjtzOjE2OiJodHRwOi8vdmltZW8uY29tIjtzOjc6ImRyaWJibGUiO3M6Mjc6Imh0dHA6Ly9kcmliYmJsZS5jb20vZ2xqaXZlYyI7czo0OiJtYWlsIjtzOjIyOiJpbmZvQHByZW1pdW1jb2RpbmcuY29tIjtzOjExOiJkZXNjcmlwdGlvbiI7czoyNzE6IjxiPkxvcmVtIGlwc3VtPC9iPiBkb2xvciBzaXQgYW1ldCBkYXMgY29uc2UgDQpuaWJoIGV1aXNtb2RvcyB0aW5jaWR1bnQgdXQgbGFvcmVlIGNvbnNlDQplc3QgYXQuIE51bGxhIHZpdGFlIDxiPmVsaXQgbGliZXJvPC9iPiwgYSBwaGEgc2l0IGFtDQp0ZXR1ZXIgYWRpcGlzY2luZyBlbGl0LiBOdWxsYSB2aXRhZSBlbGl0IGxlcm8sIA0KYSBwaGFyZXRyYS4gPGI+TG9yZW0gaXBzdW08L2I+IGN0ZXR1ZXIgYWRpcGlzY2luZy4gDQpMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldC4iO31pOjI7YToxMTp7czo1OiJvcmRlciI7czoxOiIyIjtzOjU6InRpdGxlIjtzOjg6IkpvaG4gRG9lIjtzOjQ6InJvbGUiO3M6MTM6IldlYiBEZXZlbG9wZXIiO3M6MzoidXJsIjtzOjc0OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L3RlYW1NZW1iZXIyLnBuZyI7czo0OiJpY29uIjtzOjc5OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L3dlYkRldmVsb3Blckljb24ucG5nIjtzOjc6InR3aXR0ZXIiO3M6MzI6Imh0dHA6Ly90d2l0dGVyLmNvbS9wcmVtaXVtY29kaW5nIjtzOjg6ImZhY2Vib29rIjtzOjM2OiJodHRwOi8vd3d3LmZhY2Vib29rLmNvbS9HRmxhc2hEZXNpZ24iO3M6NToidmltZW8iO3M6MDoiIjtzOjc6ImRyaWJibGUiO3M6Mjc6Imh0dHA6Ly9kcmliYmJsZS5jb20vZ2xqaXZlYyI7czo0OiJtYWlsIjtzOjIyOiJpbmZvQHByZW1pdW1jb2RpbmcuY29tIjtzOjExOiJkZXNjcmlwdGlvbiI7czoyNzE6IjxiPkxvcmVtIGlwc3VtPC9iPiBkb2xvciBzaXQgYW1ldCBkYXMgY29uc2UgDQpuaWJoIGV1aXNtb2RvcyB0aW5jaWR1bnQgdXQgbGFvcmVlIGNvbnNlDQplc3QgYXQuIE51bGxhIHZpdGFlIDxiPmVsaXQgbGliZXJvPC9iPiwgYSBwaGEgc2l0IGFtDQp0ZXR1ZXIgYWRpcGlzY2luZyBlbGl0LiBOdWxsYSB2aXRhZSBlbGl0IGxlcm8sIA0KYSBwaGFyZXRyYS4gPGI+TG9yZW0gaXBzdW08L2I+IGN0ZXR1ZXIgYWRpcGlzY2luZy4gDQpMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldC4iO31pOjM7YToxMTp7czo1OiJvcmRlciI7czoxOiIzIjtzOjU6InRpdGxlIjtzOjEzOiJKb3NlcGhpbmUgRG9lIjtzOjQ6InJvbGUiO3M6MTY6IkN1c3RvbWVyIFNlcnZpY2UiO3M6MzoidXJsIjtzOjc0OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L3RlYW1NZW1iZXIzLnBuZyI7czo0OiJpY29uIjtzOjc4OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L3N1cHBvcnRUZWFtSWNvbi5wbmciO3M6NzoidHdpdHRlciI7czozMjoiaHR0cDovL3R3aXR0ZXIuY29tL3ByZW1pdW1jb2RpbmciO3M6ODoiZmFjZWJvb2siO3M6MzY6Imh0dHA6Ly93d3cuZmFjZWJvb2suY29tL0dGbGFzaERlc2lnbiI7czo1OiJ2aW1lbyI7czowOiIiO3M6NzoiZHJpYmJsZSI7czowOiIiO3M6NDoibWFpbCI7czoyMjoiaW5mb0BwcmVtaXVtY29kaW5nLmNvbSI7czoxMToiZGVzY3JpcHRpb24iO3M6MjcxOiI8Yj5Mb3JlbSBpcHN1bTwvYj4gZG9sb3Igc2l0IGFtZXQgZGFzIGNvbnNlIA0KbmliaCBldWlzbW9kb3MgdGluY2lkdW50IHV0IGxhb3JlZSBjb25zZQ0KZXN0IGF0LiBOdWxsYSB2aXRhZSA8Yj5lbGl0IGxpYmVybzwvYj4sIGEgcGhhIHNpdCBhbQ0KdGV0dWVyIGFkaXBpc2NpbmcgZWxpdC4gTnVsbGEgdml0YWUgZWxpdCBsZXJvLCANCmEgcGhhcmV0cmEuIDxiPkxvcmVtIGlwc3VtPC9iPiBjdGV0dWVyIGFkaXBpc2NpbmcuIA0KTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQuIjt9aTo0O2E6MTE6e3M6NToib3JkZXIiO3M6MToiNCI7czo1OiJ0aXRsZSI7czo2OiJEYW1pZW4iO3M6NDoicm9sZSI7czo5OiJQSFAgQ29kZXIiO3M6MzoidXJsIjtzOjc0OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L3RlYW1NZW1iZXI0LnBuZyI7czo0OiJpY29uIjtzOjc0OiJodHRwOi8vbWVyY29yLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEyLzA5L3BocFRlYW1JY29uLnBuZyI7czo3OiJ0d2l0dGVyIjtzOjMyOiJodHRwOi8vdHdpdHRlci5jb20vcHJlbWl1bWNvZGluZyI7czo4OiJmYWNlYm9vayI7czozNjoiaHR0cDovL3d3dy5mYWNlYm9vay5jb20vR0ZsYXNoRGVzaWduIjtzOjU6InZpbWVvIjtzOjA6IiI7czo3OiJkcmliYmxlIjtzOjI3OiJodHRwOi8vZHJpYmJibGUuY29tL2dsaml2ZWMiO3M6NDoibWFpbCI7czoyMjoiaW5mb0BwcmVtaXVtY29kaW5nLmNvbSI7czoxMToiZGVzY3JpcHRpb24iO3M6MjcxOiI8Yj5Mb3JlbSBpcHN1bTwvYj4gZG9sb3Igc2l0IGFtZXQgZGFzIGNvbnNlIA0KbmliaCBldWlzbW9kb3MgdGluY2lkdW50IHV0IGxhb3JlZSBjb25zZQ0KZXN0IGF0LiBOdWxsYSB2aXRhZSA8Yj5lbGl0IGxpYmVybzwvYj4sIGEgcGhhIHNpdCBhbQ0KdGV0dWVyIGFkaXBpc2NpbmcgZWxpdC4gTnVsbGEgdml0YWUgZWxpdCBsZXJvLCANCmEgcGhhcmV0cmEuIDxiPkxvcmVtIGlwc3VtPC9iPiBjdGV0dWVyIGFkaXBpc2NpbmcuIA0KTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQuIjt9aTo1O2E6MTE6e3M6NToib3JkZXIiO3M6MToiNSI7czo1OiJ0aXRsZSI7czoxMzoiQ2hyaXN0aW5hIERvZSI7czo0OiJyb2xlIjtzOjk6Ik1hcmtldGVlciI7czozOiJ1cmwiO3M6NzQ6Imh0dHA6Ly9tZXJjb3IucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvdGVhbU1lbWJlcjUucG5nIjtzOjQ6Imljb24iO3M6ODA6Imh0dHA6Ly9tZXJjb3IucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvbWFya2V0aW5nVGVhbUljb24ucG5nIjtzOjc6InR3aXR0ZXIiO3M6MzI6Imh0dHA6Ly90d2l0dGVyLmNvbS9wcmVtaXVtY29kaW5nIjtzOjg6ImZhY2Vib29rIjtzOjM2OiJodHRwOi8vd3d3LmZhY2Vib29rLmNvbS9HRmxhc2hEZXNpZ24iO3M6NToidmltZW8iO3M6MDoiIjtzOjc6ImRyaWJibGUiO3M6MDoiIjtzOjQ6Im1haWwiO3M6MjI6ImluZm9AcHJlbWl1bWNvZGluZy5jb20iO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjI3MToiPGI+TG9yZW0gaXBzdW08L2I+IGRvbG9yIHNpdCBhbWV0IGRhcyBjb25zZSANCm5pYmggZXVpc21vZG9zIHRpbmNpZHVudCB1dCBsYW9yZWUgY29uc2UNCmVzdCBhdC4gTnVsbGEgdml0YWUgPGI+ZWxpdCBsaWJlcm88L2I+LCBhIHBoYSBzaXQgYW0NCnRldHVlciBhZGlwaXNjaW5nIGVsaXQuIE51bGxhIHZpdGFlIGVsaXQgbGVybywgDQphIHBoYXJldHJhLiA8Yj5Mb3JlbSBpcHN1bTwvYj4gY3RldHVlciBhZGlwaXNjaW5nLiANCkxvcmVtIGlwc3VtIGRvbG9yIHNpdCBhbWV0LiI7fWk6NjthOjExOntzOjU6Im9yZGVyIjtzOjE6IjYiO3M6NToidGl0bGUiO3M6ODoiQW5ueSBEb2UiO3M6NDoicm9sZSI7czoxNjoiQ3VzdG9tZXIgU2VydmljZSI7czozOiJ1cmwiO3M6NzQ6Imh0dHA6Ly9tZXJjb3IucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvdGVhbU1lbWJlcjYucG5nIjtzOjQ6Imljb24iO3M6ODA6Imh0dHA6Ly9tZXJjb3IucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTIvMDkvc3VwcG9ydFRlYW1JY29uLTEucG5nIjtzOjc6InR3aXR0ZXIiO3M6MzI6Imh0dHA6Ly90d2l0dGVyLmNvbS9wcmVtaXVtY29kaW5nIjtzOjg6ImZhY2Vib29rIjtzOjM2OiJodHRwOi8vd3d3LmZhY2Vib29rLmNvbS9HRmxhc2hEZXNpZ24iO3M6NToidmltZW8iO3M6MTY6Imh0dHA6Ly92aW1lby5jb20iO3M6NzoiZHJpYmJsZSI7czoyNzoiaHR0cDovL2RyaWJiYmxlLmNvbS9nbGppdmVjIjtzOjQ6Im1haWwiO3M6MjI6ImluZm9AcHJlbWl1bWNvZGluZy5jb20iO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjI3MToiPGI+TG9yZW0gaXBzdW08L2I+IGRvbG9yIHNpdCBhbWV0IGRhcyBjb25zZSANCm5pYmggZXVpc21vZG9zIHRpbmNpZHVudCB1dCBsYW9yZWUgY29uc2UNCmVzdCBhdC4gTnVsbGEgdml0YWUgPGI+ZWxpdCBsaWJlcm88L2I+LCBhIHBoYSBzaXQgYW0NCnRldHVlciBhZGlwaXNjaW5nIGVsaXQuIE51bGxhIHZpdGFlIGVsaXQgbGVybywgDQphIHBoYXJldHJhLiA8Yj5Mb3JlbSBpcHN1bTwvYj4gY3RldHVlciBhZGlwaXNjaW5nLiANCkxvcmVtIGlwc3VtIGRvbG9yIHNpdCBhbWV0LiI7fX1zOjExOiJwb3J0X251bWJlciI7czoyOiIxMiI7czoxODoic29ydGluZ3Bvc3RfbnVtYmVyIjtzOjI6IjEyIjtzOjEzOiJmYWNlYm9va19zaG93IjtzOjE6IjEiO3M6ODoiZmFjZWJvb2siO3M6MzY6Imh0dHA6Ly93d3cuZmFjZWJvb2suY29tL0dGbGFzaERlc2lnbiI7czoxMjoidHdpdHRlcl9zaG93IjtzOjE6IjEiO3M6NzoidHdpdHRlciI7czozMzoiaHR0cHM6Ly90d2l0dGVyLmNvbS9wcmVtaXVtY29kaW5nIjtzOjEwOiJ2aW1lb19zaG93IjtzOjE6IjEiO3M6NToidmltZW8iO3M6MTY6Imh0dHA6Ly92aW1lby5jb20iO3M6MTI6InlvdXR1YmVfc2hvdyI7czoxOiIxIjtzOjc6InlvdXR1YmUiO3M6Mjc6Imh0dHA6Ly9kcmliYmJsZS5jb20vZ2xqaXZlYyI7czoxMjoic3R1bWJsZV9zaG93IjtzOjE6IjEiO3M6Nzoic3R1bWJsZSI7czoyNzoiaHR0cDovL3d3dy5zdHVtYmxldXBvbi5jb20vIjtzOjk6ImRpZ2dfc2hvdyI7czoxOiIxIjtzOjQ6ImRpZ2ciO3M6MTk6Imh0dHA6Ly93d3cuZGlnZy5jb20iO3M6MTA6ImVtYWlsX3Nob3ciO3M6MToiMSI7czo1OiJlbWFpbCI7czoyMjoiaW5mb0BwcmVtaXVtY29kaW5nLmNvbSI7czoxMjoiY29udGFjdGVtYWlsIjtzOjE3OiJpbmZvQHlvdXJtYWlsLmNvbSI7czoxMjoiY29udGFjdGVycm9yIjtzOjI1OiJFcnJvciB3aGlsZSBzZW5kaW5nIG1haWwuIjtzOjE0OiJjb250YWN0c3VjY2VzcyI7czo3OiJTdWNjZXNzIjtzOjE0OiJlcnJvcnBhZ2V0aXRsZSI7czoxMDoiT09PUFMhIDQwNCI7czoxNzoiZXJyb3JwYWdlc3VidGl0bGUiO3M6NjM6IlNlZW1zIGxpa2UgeW91IHN0dW1ibGVkIGF0IHNvbWV0aGluZyB0aGF0IGRvZXNuXCd0IHJlYWxseSBleGlzdCI7czo5OiJlcnJvcnBhZ2UiO3M6MTcxOiJTb3JyeSwgYnV0IHRoZSBwYWdlIHlvdSBhcmUgbG9va2luZyBmb3IgaGFzIG5vdCBiZWVuIGZvdW5kLjxici8+VHJ5IGNoZWNraW5nIHRoZSBVUkwgZm9yIGVycm9ycywgdGhlbiBoaXQgcmVmcmVzaC48L2JyPk9yIHlvdSBjYW4gc2ltcGx5IGNsaWNrIHRoZSBpY29uIGJlbG93IGFuZCBnbyBob21lOikiO3M6MTY6InNob3dzb2NpYWxmb290ZXIiO3M6MToiMSI7czo5OiJjb3B5cmlnaHQiO3M6Mjk6IsKpIDIwMTEgQWxsIHJpZ2h0cyByZXNlcnZlZC4gIjtzOjIzOiJ0cmFuc2xhdGlvbl9zb2NpYWx0aXRsZSI7czoxNzoiU29jaWFsaXplIHdpdGggdXMiO3M6MjA6InRyYW5zbGF0aW9uX2ZhY2Vib29rIjtzOjg6IkZhY2Vib29rIjtzOjE5OiJ0cmFuc2xhdGlvbl90d2l0dGVyIjtzOjc6IlR3aXR0ZXIiO3M6MTc6InRyYW5zbGF0aW9uX3ZpbWVvIjtzOjU6IlZpbWVvIjtzOjE5OiJ0cmFuc2xhdGlvbl9kcmliYmxlIjtzOjc6IkRyaWJibGUiO3M6MTc6InRyYW5zbGF0aW9uX2VtYWlsIjtzOjEzOiJTZW5kIHVzIEVtYWlsIjtzOjE2OiJ0cmFuc2xhdGlvbl9wb3N0IjtzOjE2OiJPdXIgbGF0ZXN0IHBvc3RzIjtzOjI0OiJ0cmFuc2xhdGlvbl9lbnRlcl9zZWFyY2giO3M6MTU6IkVudGVyIHNlYXJjaC4uLiI7czoxNjoidHJhbnNsYXRpb25fcG9ydCI7czoxNjoiUmVjZW50IHBvcnRmb2xpbyI7czoyMzoidHJhbnNsYXRpb25fcmVsYXRlZHBvc3QiO3M6NzoiUmVsYXRlZCI7czoyNzoidHJhbnNsYXRpb25fYWR2ZXJ0aXNlX3RpdGxlIjtzOjE2OiJPdXIgTWFqb3IgQnJhbmRzIjtzOjIwOiJ0cmFuc2xhdGlvbl9tb3JlbGluayI7czo5OiJSZWFkIG1vcmUiO3M6MjQ6InBvcnRfcHJvamVjdF9kZXNjcmlwdGlvbiI7czoyMDoiUHJvamVjdCBEZXNjcmlwdGlvbjoiO3M6MjA6InBvcnRfcHJvamVjdF9kZXRhaWxzIjtzOjE2OiJQcm9qZWN0IGRldGFpbHM6IjtzOjE2OiJwb3J0X3Byb2plY3RfdXJsIjtzOjEyOiJQcm9qZWN0IFVSTDoiO3M6MjE6InBvcnRfcHJvamVjdF9kZXNpZ25lciI7czoxNzoiUHJvamVjdCBkZXNpZ25lcjoiO3M6MTc6InBvcnRfcHJvamVjdF9kYXRlIjtzOjI3OiJQcm9qZWN0IERhdGUgb2YgY29tcGxldGlvbjoiO3M6MTk6InBvcnRfcHJvamVjdF9jbGllbnQiO3M6MTU6IlByb2plY3QgQ2xpZW50OiI7czoxODoicG9ydF9wcm9qZWN0X3NoYXJlIjtzOjE3OiJTaGFyZSB0aGUgcHJvamVjdCI7czoyMDoicG9ydF9wcm9qZWN0X3JlbGF0ZWQiO3M6MTU6IlJlbGF0ZWQgcHJvamVjdCI7czoxNToidHJhbnNsYXRpb25fYWxsIjtzOjg6IlNob3cgYWxsIjtzOjI0OiJ0cmFuc2xhdGlvbl9uZXh0X3Byb2plY3QiO3M6MTY6Ik5leHQgcHJvamVjdCDihpIiO3M6Mjc6InRyYW5zbGF0aW9uX3ByZXZpdXNfcHJvamVjdCI7czoxNzoi4oaQIFByZXYgcHJvamVjdCAiO3M6MTQ6InRyYW5zbGF0aW9uX2J5IjtzOjM6IkJ5OiI7czoyMjoidHJhbnNsYXRpb25fY2F0ZWdvcmllcyI7czoxMToiQ2F0ZWdvcmllczoiO3M6MTY6InRyYW5zbGF0aW9uX3RhZ3MiO3M6NjoiVGFnczogIjtzOjI2OiJ0cmFuc2xhdGlvbl9zaGFyZV9jYXRlZ29yeSI7czo1OiJTaGFyZSI7czoyMToidHJhbnNsYXRpb25fYmxvZ19wYWdlIjtzOjU5OiJXZWxjb21lIHRvIDxzcGFuPm91ciBibG9nPC9zcGFuPiwgd2Ugd2lsbCBrZWVwIHlvdSBpbmZvcm1lZCI7czozMjoidHJhbnNsYXRpb25fY29tbWVudF9sZWF2ZV9yZXBsYXkiO3M6NToiUmVwbHkiO3M6MzU6InRyYW5zbGF0aW9uX2NvbW1lbnRfbGVhdmVfcmVwbGF5X3RvIjtzOjE2OiJMZWF2ZSBhIFJlcGx5IHRvIjtzOjM5OiJ0cmFuc2xhdGlvbl9jb21tZW50X2xlYXZlX3JlcGxheV9jYW5jbGUiO3M6MTM6IkNhbmNsZSBSZXBsYXkiO3M6MjQ6InRyYW5zbGF0aW9uX2NvbW1lbnRfbmFtZSI7czo0OiJOYW1lIjtzOjI0OiJ0cmFuc2xhdGlvbl9jb21tZW50X21haWwiO3M6NDoiTWFpbCI7czoyNzoidHJhbnNsYXRpb25fY29tbWVudF93ZWJzaXRlIjtzOjc6IldlYnNpdGUiO3M6Mjg6InRyYW5zbGF0aW9uX2NvbW1lbnRfcmVxdWlyZWQiO3M6ODoicmVxdWlyZWQiO3M6MjY6InRyYW5zbGF0aW9uX2NvbW1lbnRfY2xvc2VkIjtzOjIwOiJDb21tZW50cyBhcmUgY2xvc2VkLiI7czozMToidHJhbnNsYXRpb25fY29tbWVudF9ub19yZXNwb25jZSI7czoxMDoiTm8gUmVwbGllcyI7czozMToidHJhbnNsYXRpb25fY29tbWVudF9vbmVfY29tbWVudCI7czo5OiJPbmUgUmVwbHkiO3M6MzE6InRyYW5zbGF0aW9uX2NvbW1lbnRfbWF4X2NvbW1lbnQiO3M6NzoiUmVwbGllcyI7czoyNDoidHJhbnNsYXRpb25fY29udGFjdF9uYW1lIjtzOjQ6Ik5hbWUiO3M6MjU6InRyYW5zbGF0aW9uX2NvbnRhY3RfZW1haWwiO3M6NToiRW1haWwiO3M6Mjc6InRyYW5zbGF0aW9uX2NvbnRhY3RfbWVzc2FnZSI7czo3OiJNZXNzYWdlIjtzOjI0OiJ0cmFuc2xhdGlvbl9jb250YWN0X3NlbmQiO3M6MTI6IlNlbmQgTWVzc2FnZSI7czoyNToidHJhbnNsYXRpb25fY29udGFjdF9jbGVhciI7czo1OiJDbGVhciI7czoxODoicmFjZW50X3N0YXR1c19wb3J0IjtzOjA6IiI7czoxMzoicmFjZW50X3N0YXR1cyI7czowOiIiO30=",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);				

	}

}

?>
