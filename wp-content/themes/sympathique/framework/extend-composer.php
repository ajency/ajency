<?php
// if (function_exists('vc_disable_frontend')) {
//    vc_disable_frontend();
// }
if (function_exists('vc_map')) {

vc_map( array(
   "name" => __("Space", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/splitter_horizontal.png',
   "base" => "space",
   "weight" => 25,
   "class" => "space_extended",
   "category" => __("Content", "js_composer"),
   "description" => __("Add space between elements", "js_composer"),
   "params" => array( 
      array(
         "type" => "textfield",
         "heading" => __("Space Height", "js_composer"),
         "param_name" => "height",
         "admin_label" => true,
		   "value" => 60,
         "description" => __("You can add white space between elements to separate them beautifully. Values are in pixels, so insert only a value, without any px after it.", "js_composer")
      )
   )
) );


// Social Block

vc_map( array(
   "name" => __("Social Block", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/share.png',
   "weight" => 17,
   "base" => "social-block",
   "description" => __("Sharing on social networks widget", "js_composer"),
   "class" => "social_extended",
   "category" => __("Social", "js_composer"),
   "params" => array( 
      array(
         "type" => "textfield",
		   "admin_label" => true,
         "heading" => __("Title before the social block (optional)", "js_composer"),
         "param_name" => "title",
         "description" => __("If you want to set a title for the social block, add it above. Something like 'Share this post' will work very well. Icons included in the social block: twitter, facebook, pinterest, google+, delicious and linkedin.", "js_composer")
      )
   )
) );


// Blog Post Grid

$blog_cats = get_terms('category', array('hide_empty' => false));
$cats_array = array();
foreach($blog_cats as $blog_cat) {
	$cats_array[$blog_cat->name] = $blog_cat->slug;
}

vc_map( array(
   "name" => __("Blog Grid", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/newspaper_add.png',
   "base" => "blog-grid",
   "weight" => 19,
   "description" => __("Masonry layout for blog posts", "js_composer"),   
   "class" => "blog_grid_extended",
   "category" => __("Content", "js_composer"),
   "params" => array( 
      array(
         "type" => "textfield",
		   "admin_label" => true,
         "heading" => __("Number of Items to Display", "js_composer"),
         "param_name" => "number",
         "value" => 6,
         "description" => __("Set how many blog items would you like to include in the grid. The grid is built using the masonry style. Use '-1' to include all your items.", "js_composer")
      ),
    array(
      "type" => "dropdown",
      "heading" => __("Grid Columns", "js_composer"),
      "param_name" => "columns",
      "admin_label" => true,
      "value" => array("2" => "2", "3" => "3"),
      "description" => __("Select blog grid columns.", "js_composer")
    ),
    array(
      "type" => "checkbox",
      "heading" => __("Display posts only from categories", "js_composer"),
      "param_name" => "categories",
      "value" => $cats_array,
	  "description" => __("Select blog categories you want to display posts from(mandatory).", "js_composer")	  
    )	
   )
) );


// Portfolio Grid

$portfolio_categs = get_terms('portfolio_cats', array('hide_empty' => false));
$portfolio_cats_array = array();
foreach($portfolio_categs as $portfolio_categ) {
	$portfolio_cats_array[$portfolio_categ->name] = $portfolio_categ->name;
}


vc_map( array(
   "name" => __("Portfolio Grid", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/folder_picture.png',
   "base" => "portfolio-grid",
   "description" => __("Masonry grid layout for portfolio items", "js_composer"),
   "weight" => 20,   
   "class" => "portfolio_grid_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(
      array(
         "type" => "textfield",
         "heading" => __("Grid Title", "js_composer"),
         "param_name" => "title",
         "value" => "Our Works",
         "description" => __("Set a title for the grid.", "js_composer")
      ),   
      array(
         "type" => "textfield",
		   "admin_label" => true,
         "heading" => __("Number of Items to Display", "js_composer"),
         "param_name" => "number",
         "value" => 6,
         "description" => __("Set how many portfolio items would you like to include in the grid. Use '-1' to include all your items.", "js_composer")
      ),
      array(
         "type" => "checkbox",
         "class" => "",
         "heading" =>  __("Portfolio Categories", "js_composer"),
         "param_name" => "categories",
         "value" => $portfolio_cats_array,
         "description" => __("Select from which categories to display projects(mandatory).", "js_composer")
      )    
   )
) );

// Portfolio Carousel

vc_map( array(
   "name" => __("Portfolio Carousel", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/photos.png',
   "description" => __("Carousel Slider for Portfolio Items", "js_composer"),
   "weight" => 19,
   "base" => "portfolio-carousel",
   "class" => "portfolio_carousel_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(
      array(
         "type" => "textfield",
         "heading" => __("Carousel Title", "js_composer"),
         "param_name" => "title",
         "value" => "Our Works",
         "description" => __("Set a title for the carousel.", "js_composer")
      ),   
      array(
         "type" => "textfield",
		   "admin_label" => true,
         "heading" => __("Number of Items to Display", "js_composer"),
         "param_name" => "number",
         "value" => 8,
         "description" => __("Set how many portfolio items would you like to include in the carousel. Use '-1' to include all your items.", "js_composer")
      ),
      array(
         "type" => "checkbox",
         "heading" =>  __("Portfolio Categories", "js_composer"),
         "param_name" => "categories",
         "value" => $portfolio_cats_array,
         "description" => __("Select from which categories to display projects(mandatory).", "js_composer")
      )	  
   )
) );

// Blog Post Carousel

vc_map( array(
   "name" => __("Blog Posts Carousel", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/new_window.png',
   "description" => __("Carousel Slider for Blog Posts", "js_composer"),
   "weight" => 18,
   "base" => "homeblog-carousel",
   "class" => "homeblog_carousel_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(
      array(
         "type" => "textfield",
         "heading" => __("Carousel Title", "js_composer"),
         "param_name" => "title",
         "value" => "From the Blog",
         "description" => __("Set a title for the carousel.", "js_composer")
      ),   
      array(
         "type" => "textfield",
		   "admin_label" => true,
         "heading" => __("Number of Items to Display", "js_composer"),
         "param_name" => "number",
         "value" => 8,
         "description" => __("Set how many blog items would you like to include in the carousel. Use '-1' to include all your items.", "js_composer")
      ),
    array(
      "type" => "checkbox",
      "heading" => __("Display posts only from categories:", "js_composer"),
      "param_name" => "categories",
      "value" => $cats_array,
	  "description" => __("Select blog categories you want to display posts from(mandatory).", "js_composer")	  
    )	  
   )
) );

// List styles

vc_map( array(
   "name" => __("List", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/text_list_bullets.png',
   "description" => __("List Element with Icon Style", "js_composer"),
   "weight" => 14,
   "base" => "list",
   "class" => "list_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(
      array(
         "type" => "textfield",
         "heading" => __("Icon Name", "js_composer"),
         "param_name" => "icon",
         "admin_label" => true,
         "value" => "check",
         "description" => __("Please set an icon for the custom list. The entire list of icons can be found at <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>FontAwesome project page</a>. For example, if an icon is named 'fa-angle-right', the value you have to add inside the field is 'angle-right'.", "js_composer")
      ),   
      array(
         "type" => "textarea_html",
         "heading" => __("List Rows", "js_composer"),
         "param_name" => "content",
         "value" => "<ul><li>Lorem ipsum</li><li>Consectetur adipisicing</li><li>Ullamco laboris</li><li>Quis nostrud exercitation</li>",
         "description" => __("Create your list using the WordPress default functionality.", "js_composer")
      )
   )
) );



// Clients
vc_map( array(
   "name" => __("Clients", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/tie.png',
   "description" => __("Area for Clients/Partners Logos", "js_composer"),
   "weight" => 13,
   "base" => "clients",
   "class" => "clients_extended",
   "category" => __("Content", "js_composer"),
   "params" => array( 
      array(
         "type" => "textfield",
         "admin_label" => true,
         "heading" => __("Title", "js_composer"),
         "param_name" => "title",
         "value" => "",
         "description" => __("Set a title for the clients block.", "js_composer")
      ),   
      array(
         "type" => "attach_images",
		   "admin_label" => true,
         "heading" => __("Upload Images", "js_composer"),
         "param_name" => "images",
         "value" => "",
         "description" => __("Upload the images for your clients.", "js_composer")
      )
   )
) );


// Shortcode Carousel
vc_map( array(
   "name" => __("Shortcode Carousel", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/application_cascade.png',
   "description" => __("Shortcodes displayed in a carousel", "js_composer"),
   "weight" => 12,
   "base" => "cycle-carousel",
   "class" => "shortcode_carousel_extended",
   "category" => __("Content", "js_composer"),
   "params" => array( 
      array(
         "type" => "textarea_html",
         "heading" => __("Shortcode Carousel", "js_composer"),
         "param_name" => "content",
         "admin_label" => true,
         "value" => "",
         "description" => __("Add your shortcodes, one on each line, to generate a carousel. This widget is perfect for creating carousels based on testimonials, services or team members. ", "js_composer")
      ),
      array(
         "type" => "textfield",
         "heading" => __("Time between slides(in milliseconds)", "js_composer"),
         "param_name" => "effect",
         "admin_label" => true,
         "value" => "8000",
         "description" => __("Set the time for which a carousel item is visible. To set a time to 7 seconds, the value you need to use is 7000. ", "js_composer")
      )	  
   )
) );



// Pricing Table

		$output = '';
		
		// setup the output of our shortcode
		$output .= '<br />';
		$output .= '[pricing-table columns="4"]<br />';
		$output .= '[pricing-column title="BASIC" price="19" currency="$" interval="month"]';
		$output .= '<ul>';
		$output .= '<li>24/7 Support</li>';
		$output .= '<li>Free 10GB Storage</li>';
		$output .= '<li>Documentation &amp; Tutorials</li>';
		$output .= '<li>Google Apps Sync</li>';
		$output .= '<li>Up to 10 Projects</li>';
		$output .= '<li>Free Facebook Page</li>';
		$output .= '<li>Up to 3 Users</li>';
		$output .= '</ul>';
		$output .= '[signup][button url="#"]Sign Up[/button][/signup]<br />';
		$output .= '[/pricing-column]<br />';
		$output .= '[pricing-column title="ADVANCED" featured="yes" price="29" currency="$" interval="month"]';
		$output .= '<ul>';
		$output .= '<li>24/7 Support</li>';
		$output .= '<li>Free 20GB Storage</li>';
		$output .= '<li>Documentation &amp; Tutorials</li>';
		$output .= '<li>Google Apps Sync</li>';
		$output .= '<li>Up to 20 Projects</li>';
		$output .= '<li>Free Facebook Page</li>';
		$output .= '<li>Up to 5 Users</li>';
		$output .= '</ul>';
		$output .= '[signup][button color="red" url="#"]Sign Up[/button][/signup]<br />';
		$output .= '[/pricing-column]<br />';
		$output .= '[pricing-column title="PROFESSIONAL" price="49" currency="$" interval="month"]';
		$output .= '<ul>';
		$output .= '<li>24/7 Support</li>';
		$output .= '<li>Free 50GB Storage</li>';
		$output .= '<li>Documentation &amp; Tutorials</li>';
		$output .= '<li>Google Apps Sync</li>';
		$output .= '<li>Up to 50 Projects</li>';
		$output .= '<li>Free Facebook Page</li>';
		$output .= '<li>Up to 10 Users</li>';
		$output .= '</ul>';
		$output .= '[signup][button url="#"]Sign Up[/button][/signup]<br />';
		$output .= '[/pricing-column]<br />';
		$output .= '[pricing-column title="ULTIMATE" price="99" currency="$" interval="month"]';
		$output .= '<ul>';
		$output .= '<li>24/7 Support</li>';
		$output .= '<li>Unlimited Storage</li>';
		$output .= '<li>Documentation &amp; Tutorials</li>';
		$output .= '<li>Google Apps Sync</li>';
		$output .= '<li>Unlimited Projects</li>';
		$output .= '<li>Free Facebook Page</li>';
		$output .= '<li>Unlimited Users</li>';
		$output .= '</ul>';
		$output .= '[signup][button url="#"]Sign Up[/button][/signup]<br />';
		$output .= '[/pricing-column]<br />';
		$output .= '[/pricing-table]<br />';
		$output .= '[space]<br />';

vc_map( array(
   "name" => __("Pricing Table", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/table_money.png',
   "description" => __("Pricing Tables Element", "js_composer"),
   "weight" => 11,
   "base" => "table_placebo",
   "class" => "pricing_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(  
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "heading" => __("Pricing Table Example", "js_composer"),
         "param_name" => "content",
         "value" => $output,
         "description" => __("This is an example of a pricing table with 4 columns. Edit it and make it your own.", "js_composer")
      )
   )
) );


// Tagline

vc_map( array(
   "name" => __("Tagline", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/text.png',
   "description" => __("Set a custom tagline with style", "js_composer"),
   "weight" => 10,
   "base" => "tagline",
   "class" => "intro_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(
      array(
         "type" => "textfield",
         "admin_label" => true,
         "heading" => __("Tagline First Line", "js_composer"),
         "param_name" => "title",
         "value" => "We`re an award winning digital studio specialised in web design.",
         "description" => __("Add your tagline first line. Usually, it says who you are and what you do.", "js_composer")
      ),   
      array(
         "type" => "textarea",
         "heading" => __("Tagline Second Line(s)", "js_composer"),
         "param_name" => "content",
         "value" => "Our projects stand out from the crowd so if you want to collaborate, <a href='#'>get in touch with us</a> to see how we can help you!",
         "description" => __("More about who you are and what you do.", "js_composer")
      )
   )
) );


// Blog Feed

vc_map( array(
   "name" => __("Blog Feed", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/newspaper_add.png',
   "description" => __("Add a blog posts feed", "js_composer"),
   "weight" => 16,
   "base" => "dt-blog-feed",
   "class" => "blog_feed_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(
      array(
         "type" => "textfield",
         "admin_label" => true,
         "heading" => __("Number of Items to Display", "js_composer"),
         "param_name" => "number",
         "value" => 8,
         "description" => __("Set how many blog items would you like to include in the feed. Use '-1' to include all your items.", "js_composer")
      ),
    array(
      "type" => "checkbox",
      "heading" => __("Display posts only from categories:", "js_composer"),
      "param_name" => "categories",
      "value" => $cats_array,
     "description" => __("Select blog categories you want to display posts from(mandatory).", "js_composer")     
    )   
   )
) );


// Countdown

vc_map( array(
   "name" => __("Countdown", "js_composer"),
   "icon" => get_template_directory_uri().'/images/composer/clock_history_frame.png',
   "description" => __("jQuery Countdown for any page", "js_composer"),
   "weight" => 9,
   "base" => "countdown",
   "class" => "countdown_extended",
   "category" => __("Content", "js_composer"),
   "params" => array(
      array(
         "type" => "textfield",
         "heading" => __("Countdown Date", "js_composer"),
         "param_name" => "time",
         "admin_label" => true,
         "value" => "January 1, 2015 00:00:00",
         "description" => __("Add a future date so that the countdown can start. The format should be like 'January 1, 2014 00:00:00'", "js_composer")
      )
	)
) );

}

if (function_exists('vc_map_update')) {

   $row_update = array (
     'weight' => 100
   );

   $rev_update = array (
     'weight' => 17
   );   
   $c_update = array (
     'weight' => 13
   );     

   $no_animation = array (
      'admin_label' => false
   );

   vc_map_update('vc_row', $row_update);
   vc_map_update('vc_column_text', $row_update);

   
   vc_map_update('rev_slider_vc', $rev_update);
   vc_map_update('contact-form-7', $c_update);

} 

// if (function_exists('vc_remove_element')) {
// 	vc_remove_element("vc_teaser_grid");
// 	vc_remove_element("vc_posts_slider");
// }

?>