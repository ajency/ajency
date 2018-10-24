<?php
/**
 * Ajency Footer Widget Class
 */
class ajency_footerwidget_widget extends WP_Widget {

    /** constructor */
    function ajency_footerwidget_widget() {
        parent::WP_Widget(false, $name = 'Ajency Footer Widget');
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
                    <div class="casestudy-content p-l-n casestudy-footer">
                   <p>
                    <B>FREQUENTLY VIEWED PAGES </B>
                        <ul>
                            <li><a href="https://ajency.in/">What we do</a></li>
                            <li><a href="https://ajency.in/hiring/">We are hiring</a></li>
                            <li><a href="https://ajency.in/stayconnected/">stay connected</a></li>
                            <li><a href="https://ajency.in/category/blog/">blog</a></li>
                            <li><a href="https://ajency.in/where-have-all-the-dwarves-gone/">WHERE HAVE ALL THE DWARVES GONE ?</a></li>
                            <li><a href="https://ajency.in/tuckshop-dilbert/">TUCKSHOP & DILBERT – THINGS WE LIKE TO SHOW OFF</a></li>
                        </ul>
                       <!--  <a href="#start">TO START </a> -->
                         <div class="share-intro" style="clear:both">

                                 <div class="share-link">
                                    <b><em>What's</em> not to like?</b>
                                 </div>
                                 <div class="fb-like-box" data-href="https://www.facebook.com/Ajency.in" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
                              <p class="footer-txt">(C) 2018 Digital Dwarves Pvt Ltd. All Right Reserved</p>
                              </div>

                   </p>
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
add_action('widgets_init', create_function('', 'return register_widget("ajency_footerwidget_widget");'));