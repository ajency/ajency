<?php
/**
 * Ajency Widget Class
 */
class ajency_textwidget_widget extends WP_Widget {

    /** constructor */
    function ajency_textwidget_widget() {
        parent::WP_Widget(false, $name = 'Ajency Text Widget');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
		    global $wpdb;

        $title = apply_filters('widget_title', $instance['title']);
    		$subtitle = $instance['subtitle'];
    		$content = $instance['content'];

        $wordarray = explode(' ', $title); 
        if (count($wordarray) > 1 ) { 
          $wordarray[count($wordarray)-1] = '<span class="highlight">'.($wordarray[count($wordarray)-1]).'</span>'; 
          $title = implode(' ', $wordarray);  
        }  

        ?>
              <?php echo $before_widget; ?>
                <div class="Center-Block scroll-indicator-container">
                    <h3 class="grid-title non-bdr">&nbsp;</h3>
                    <div class="casestudy-content p-l-n">
                        <?php if ( $title )
                          echo '<h1>' . $title . '</h1>'; ?>
                        <?php if ( $subtitle )
                          echo '<b class="meta">'.$subtitle.'</b>'; 
                        ob_start();
                        eval('?>'.$content);
                        $content = ob_get_contents();
                        ob_end_clean();
                        ?>
                        <div class="ajency-text scroll-content">
                          <?php echo $content; ?>
                        </div>
                    </div>
                 </div>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		$instance['content'] = $new_instance['content'];
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

        $title = esc_attr($instance['title']);
    		$subtitle = esc_attr($instance['subtitle']);
    		$content = format_to_edit($instance['content']);

        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

		    <p>
          <label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Sub Title'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" />
          
        </p>

		    <p>
          <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content'); ?></label>
          <textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
          
        </p>

        <?php
    }

} // class 
add_action('widgets_init', create_function('', 'return register_widget("ajency_textwidget_widget");'));