<?php
/**
 * @package facebook-tabs
*/
/*
Plugin Name: Facebook Tabs
Plugin URI: http://2brothers.co.nz/
Description: Show Your Facebook Activity, Streams, Friends on your website right away. Atom Facebook Tabs - Configure it very easy.
Version: 0.0.1
Author: Tomas Hulk
Author URI: http://2brothers.co.nz/
*/
class FacebookTabs extends WP_Widget{
    public function __construct() {
        
        add_action( 'wp_enqueue_scripts', array( $this, 'register_facebook_tabs_styles' ) );
        
        $params = array(
            'description' => 'Show Your Facebook Activity, Streams, Friends on your website right away. Atom Facebook Tabs - Configure it very easy.',
            'name' => 'Facebook Tabs'
        );
        parent::__construct('FacebookTabs','',$params);
    }
    
    function register_facebook_tabs_styles() {
        wp_register_style( 'facebook_tabs_style', plugins_url( 'assets/style.css' , __FILE__ ) );
        wp_register_script('facebook_tabs_jquery', '//code.jquery.com/jquery-latest.min.js');
        wp_register_script('facebook_tabs_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js');
        wp_enqueue_style( 'facebook_tabs_style' );
        wp_enqueue_script('facebook_tabs_jquery');
        wp_enqueue_script('facebook_tabs_bootstrap');
 }
 
    public function form($instance){
        extract($instance);
        
        ?>
    <p>
        <label for="<?php echo $this->get_field_id('title');?>">Title</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('title');?>"
            name="<?php echo $this->get_field_name('title');?>"
            value="<?php echo !empty($title) ? $title : "Facebook Tabs"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('likeboxurl');?>">Facebook Page URL (Likebox & Stream)</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('likeboxurl');?>"
            name="<?php echo $this->get_field_name('likeboxurl');?>"
            value="<?php echo !empty($likeboxurl) ? $likeboxurl : "http://www.facebook.com/facebook"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('activityurl');?>">Activity Domain</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('activityurl');?>"
            name="<?php echo $this->get_field_name('activityurl');?>"
            value="<?php echo !empty($activityurl) ? $activityurl : "developers.facebook.com"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('width');?>">Width</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('width');?>"
            name="<?php echo $this->get_field_name('width');?>"
            value="<?php echo !empty($width) ? $width : "300"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('height');?>">Height</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('height');?>"
            name="<?php echo $this->get_field_name('height');?>"
            value="<?php echo !empty($height) ? $height : "300"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'colorscheme' ); ?>">Color Scheme</label> 
        <select id="<?php echo $this->get_field_id( 'colorscheme' ); ?>"
            name="<?php echo $this->get_field_name( 'colorscheme' ); ?>"
            class="widefat" style="width:100%;">
                <option value="light" <?php if ($colorscheme == 'light') echo 'selected="light"'; ?> >Light</option>
                <option value="dark" <?php if ($colorscheme == 'dark') echo 'selected="dark"'; ?> >Dark</option>
        </select>
    </p>
<?php
    }
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        // assigning default values
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
        if(empty($title)) $title = "Facebook Tabs";
        if(empty($likeboxurl)) $likeboxurl = "http://www.facebook.com/facebook";
        if(empty($activityurl)) $activityurl = "developers.facebook.com";
        if(empty($width)) $width = "300";
        if(empty($height)) $height = "300";
        if(empty($colorscheme)) $colorscheme = "light";
        echo $before_widget;
        echo $before_title . $title . $after_title;
        require_once('helpers.php');
        $display_fb = new HelpersFacebookTabs();
        
        ?>
    <div class="facebook_tabs">
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a data-toggle="tab" href="#facebooklike">Friends</a></li>
      <li><a data-toggle="tab" href="#facebookstream">Stream</a></li>
      <li><a data-toggle="tab" href="#facebookactivity">Activity</a></li>
    </ul>
</div>
<div class="tab-content">
  <div class="tab-pane active" id="facebooklike">
      <?php $display_fb->display_facebook_likebox($likeboxurl, $width, $height, $colorscheme, 'true', 'false'); ?>
  </div>
  
  <div class="tab-pane" id="facebookstream">
      <?php $display_fb->display_facebook_likebox($likeboxurl, $width, $height, $colorscheme, 'false', 'true'); ?>
  </div>
  
  <div class="tab-pane" id="facebookactivity">
      <?php $display_fb->display_facebook_activity($activityurl,$width,$height,$colorscheme); ?>
  </div>
</div>
<?php
        echo $after_widget; 
    }
}
//start registering the extension
add_action('widgets_init','register_FacebookTabs');
function register_FacebookTabs(){
    register_widget('FacebookTabs');
}