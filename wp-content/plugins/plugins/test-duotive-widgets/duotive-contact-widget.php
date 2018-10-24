<?php
/*
 * Plugin Name: Duotive Contact Details
 * Description: A widget for displaying your contact details. Developed by Duotive.
 * Version: 1.0
 * Author: Duotive
 */
/* Load widget with widget_init function */
add_action( 'widgets_init', 'duotive_contacts' );

/* Register widget */
function duotive_contacts() {
	register_widget( 'duotive_contacts' );
}

/* Handler class for all widget params */
class duotive_contacts extends WP_Widget {

	/* Widget setup. */
	function duotive_contacts() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'contact', 'description' => __('A widget for displaying your contact details.', 'contact') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'duotive-contacts' );
		/* Create the widget. */
		$this->WP_Widget( 'duotive-contacts', __('Duotive - Contact Details'), $widget_ops, $control_ops );
	}

	/** Widget display template */
	function widget( $args, $instance ) {
		extract( $args );

		/* Get widget settings */
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$address = $instance['address'];
		$phone = $instance['phone'];
		$fax = $instance['fax'];		
		$mobile = $instance['mobile'];
		$mail = $instance['mail'];
		$info = $instance['info'];		
		/* Widget themplate */
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<ul>';
			echo '<li>';
				echo '<span class="contact-icon contact-icon-user">&nbsp;</span>';
				echo $name;
			echo '</li>';                        
			echo '<li>';
				echo '<span class="contact-icon contact-icon-address">&nbsp;</span>';
				echo '<p>'.$address.'</p>';
			echo '</li>';
			echo '<li>';
				echo '<span class="contact-icon contact-icon-phone">&nbsp;</span>';
				echo $phone;
			echo '</li>';
			echo '<li>';
				echo '<span class="contact-icon contact-icon-fax">&nbsp;</span>';
				echo $fax;                           
			echo '</li>'; 
			echo '<li>';
				echo '<span class="contact-icon contact-icon-mobile">&nbsp;</span>';
				echo $mobile;
			echo '</li>';
			echo '<li>';
				echo '<span class="contact-icon contact-icon-email">&nbsp;</span>';
				echo '<a href="mailto:'.$mail.'">'.$mail.'</a>';
			echo '</li>';
			echo '<li>';
				echo '<span class="contact-icon contact-icon-info">&nbsp;</span>';
				echo '<p>'.$info.'</p>';
			echo '</li>';                                                        
		echo '</ul>';
		
		
		echo $after_widget;
	}

	/* Update widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Create widget settings instances. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = $new_instance['name'];
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['fax'] = $new_instance['fax'];
		$instance['mobile'] = $new_instance['mobile'];
		$instance['mail'] = $new_instance['mail'];
		$instance['info'] = $new_instance['info'];		
		return $instance;
	}

	/* Admin panel form  */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if ( isset($instance['title']) ) echo $instance['title']; ?>" style="width:98%;" />
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Name'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php if ( isset($instance['name']) ) echo $instance['name']; ?>" style="width:98%;" />
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e('Address'); ?></label><br />
			<textarea style="width:98%; height:100px;" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>"><?php if ( isset($instance['address']) ) echo $instance['address']; ?></textarea>
		</p>  
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e('Phone'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php if ( isset($instance['phone']) ) echo $instance['phone']; ?>" style="width:98%;" />
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e('Fax'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" value="<?php if ( isset($instance['fax']) ) echo $instance['fax']; ?>" style="width:98%;" />
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'mobile' ); ?>"><?php _e('Mobile'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" value="<?php if ( isset($instance['mobile']) ) echo $instance['mobile']; ?>" style="width:98%;" />
		</p>    
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'mail' ); ?>"><?php _e('E-mail'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'mail' ); ?>" name="<?php echo $this->get_field_name( 'mail' ); ?>" value="<?php if ( isset($instance['mail']) ) echo $instance['mail']; ?>" style="width:98%;" />
		</p>                
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'info' ); ?>"><?php _e('Extra info'); ?></label><br />
			<textarea style="width:98%; height:100px;" id="<?php echo $this->get_field_id( 'info' ); ?>" name="<?php echo $this->get_field_name( 'info' ); ?>"><?php if ( isset($instance['info']) ) echo $instance['info']; ?></textarea>
		</p>                                 

                     
	<?php
	}
}

?>