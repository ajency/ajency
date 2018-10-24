<?php
/*
 * Plugin Name: Duotive Contact Form
 * Description: A widget with a simple contact form
 * Version: 1.0
 * Author: Duotive
 */
/* Load widget with widget_init function */
add_action( 'widgets_init', 'duotive_contactform' );

/* Register widget */
function duotive_contactform() {
	register_widget( 'duotive_contactform' );
}

/* Handler class for all widget params */
class duotive_contactform extends WP_Widget {

	/* Widget setup. */
	function duotive_contactform() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'contact-form', 'description' => __('A widget with a simple contact form.', 'duotive') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'duotive-contactform' );
		/* Create the widget. */
		$this->WP_Widget( 'duotive-contactform', __('Duotive - Contact Form', 'duotive'), $widget_ops, $control_ops );
	}

	/** Widget display template */
	function widget( $args, $instance ) {
		extract( $args );

		/* Get widget settings */
		$title = apply_filters('widget_title', $instance['title'] );
		$destinationemail = $instance['destinationemail'];
		/* Widget themplate */
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<ul>';
		?>
            <form id="contactform" method="post" action="<?php bloginfo('template_url'); ?>/page-contact-sender.php">
                <input type="hidden" name="admin_email" value="<?php echo $destinationemail; ?>" />
                <input type="hidden" name="contact_widget" value="1" />                
                <div class="confirmation" id="contact-confirmation-message">Your message has been sent.</div>
                <table>
                    <tr>
                        <td><input type="text" name="name" class="required" size="35" value="<?php echo __('Name:','duotive'); ?>" onblur="if(this.value=='') this.value='<?php echo __('Name:','duotive'); ?>';" onfocus="if(this.value=='<?php echo __('Name:','duotive'); ?>') this.value='';"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" class="required email" size="35" value="<?php echo __('E-mail:','duotive'); ?>" onblur="if(this.value=='') this.value='<?php echo __('E-mail:','duotive'); ?>';" onfocus="if(this.value=='<?php echo __('E-mail:','duotive'); ?>') this.value='';"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="subject" class="required" size="35" value="<?php echo __('Subject:','duotive'); ?>" onblur="if(this.value=='') this.value='<?php echo __('Subject:','duotive'); ?>';" onfocus="if(this.value=='<?php echo __('Subject:','duotive'); ?>') this.value='';"/></td>
                    </tr>   
                    <tr>
                        <td><textarea rows="10" cols="32" name="message" class="required"  onblur="if(this.value=='') this.value='<?php echo __('Message:','duotive'); ?>';" onfocus="if(this.value=='<?php echo __('Message:','duotive'); ?>') this.value='';"><?php echo __('Message:','duotive'); ?></textarea></td>
                    </tr>                    
                    <tr>
                        <td><input type="submit" value="<?php echo __('Send Message','duotive'); ?>"><div id="contact-form-loader"></div></td>
                    </tr>                                                         
                </table>
            </form>
        <?php      
		echo '</ul>';
		
		
		echo $after_widget;
	}

	/* Update widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Create widget settings instances. */
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['destinationemail'] = $new_instance['destinationemail'];		
		return $instance;
	}

	/* Admin panel form  */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if ( isset($instance['title']) ) echo $instance['title']; ?>" style="width:98%;" />
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'destinationemail' ); ?>"><?php _e('Destination e-mail:'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'destinationemail' ); ?>" name="<?php echo $this->get_field_name( 'destinationemail' ); ?>" value="<?php if ( isset($instance['destinationemail']) ) echo $instance['destinationemail']; ?>" style="width:98%;" />
		</p>        
        <small>Usage is not recommended on contact page. </small>
                                           
	<?php
	}
}

?>