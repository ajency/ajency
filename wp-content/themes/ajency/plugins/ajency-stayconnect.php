<?php
/**
 * Ajency stayconnect Widget Class
 */
class ajency_stayconnectwidget_widget extends WP_Widget {

    /** constructor */
    function ajency_stayconnectwidget_widget() {
        parent::WP_Widget(false, $name = 'Ajency StayConnect Widget');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
		    global $wpdb;

        $title = apply_filters('widget_title', $instance['title']); 

        ?>
 
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

        $title = esc_attr($instance['title']);

        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <?php
    }

} // class 
add_action('widgets_init', create_function('', 'return register_widget("ajency_stayconnectwidget_widget");'));