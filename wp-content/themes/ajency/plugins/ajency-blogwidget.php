<?php
/**
 * Ajency Blog Widget Class
 */
class ajency_blogwidget_widget extends WP_Widget {

    /** constructor */
    function ajency_blogwidget_widget() {
        parent::WP_Widget(false, $name = 'Ajency Blog Widget');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
		    global $wpdb;

        $title = apply_filters('widget_title', $instance['title']); 

        ?>
              <?php echo $before_widget; 
        $posts = new WP_Query(array('post__in' => array( 37, 34, 1071, 976,1002, 1110 )));
        if($posts->have_posts()) : $index = 0;
            $order = array(3,3,3,3,1, 3);
            while($posts->have_posts()) : $posts->the_post();
                    /*$current_date ="";
                    $count_posts = wp_count_posts();
                    
                    $published_posts = $count_posts->publish;
                    $myposts = get_posts(array('posts_per_page'=>$published_posts)); 
					foreach($myposts as $post) :
                         $nextpost++;
                         setup_postdata($post);*/
                         
                         require get_template_directory() . '/../ajency/post-styles/post-style-' . $order[$index] . '.php';
                         $index++;
                   // endforeach; wp_reset_postdata(); ?>
        
     <?php endwhile; ?>
<?php endif; ?>





              <?php echo $after_widget; ?>
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
add_action('widgets_init', create_function('', 'return register_widget("ajency_blogwidget_widget");'));