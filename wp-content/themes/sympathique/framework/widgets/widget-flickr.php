<?php
/******************************************
/* Flickr Widget
******************************************/
class dt_flickr extends WP_Widget {
							
    /** constructor */
    function dt_flickr() {
        parent::__construct(false, $name = 'Sympathique - Flickr');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $number = (int) strip_tags($instance['number']);
	  	$id = strip_tags($instance['id']);
	  	$tags = strip_tags($instance['tags']);
		
            echo $before_widget;
                if ( $title )
					echo $before_title . $title . $after_title; ?>
							<div id="flickr">
								<script type="text/javascript">
									jQuery(document).ready(function(){						
										//footer flickr function
										jQuery('#flickr').jflickrfeed({
											limit: <?php echo $number; ?>,
											qstrings: {
												id: '<?php echo $id; ?>',
												tags: '<?php echo $tags; ?>'
											},
											itemTemplate: 
											'<li>' +
												'<a rel="prettyPhoto[pp_gal]" href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a>' +
											'</li>' 
										}, function(data) {
											jQuery('#flickr a').prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
										});								
									});
								</script>
							</div>
            <?php echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['number'] = (int) strip_tags($new_instance['number']);
	$instance['id'] = strip_tags($new_instance['id']);
	$instance['tags'] = strip_tags($new_instance['tags']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Flickr Feed', 'number'=> 10, 'id' => '58842866@N08', 'tags' => 'architecture'));			
        $title = esc_attr($instance['title']);
        $number = (int) strip_tags($instance['number']);
	  	$id = strip_tags($instance['id']);
	  	$tags = strip_tags($instance['tags']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'delicious'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Pics to Show:', 'delicious'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Your Flickr ID:', 'delicious'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" />
        </p>
		<p>To find out which is your flickr ID, check out <a target="_blank" href="http://idgettr.com/">idgettr.com</a></p>		
		<p>
          <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Optional - Display only pictures under a tag(name a tag):', 'delicious'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" type="text" value="<?php echo $tags; ?>" />
        </p>		
		
        <?php 
    }

} // class dt_flickr
// register Flickr Feed Widget
add_action('widgets_init', create_function('', 'return register_widget("dt_flickr");'));	
?>