<?php
/*
 * Plugin Name: Duotive Testimonials
 * Description: A widget for showing your clients latest testimonials. Developed by Duotive.
 * Version: 2.0
 * Author: Duotive
 */
/* Load widget with widget_init function */
add_action( 'widgets_init', 'duotive_testimonials' );

/* Register widget */
function duotive_testimonials() {
	register_widget( 'duotive_testimonials' );
}

/* Handler class for all widget params */
class duotive_testimonials extends WP_Widget {

	/* Widget setup. */
	function duotive_testimonials() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'testimonials', 'description' => __('A widget for showing your clients latest testimonials.', 'testimonials') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'duotive-testimonials' );
		/* Create the widget. */
		$this->WP_Widget( 'duotive-testimonials', __('Duotive - Testimonials'), $widget_ops, $control_ops );
	}

	/** Widget display template */
	function widget( $args, $instance ) {
		extract( $args );

		/* Get widget settings */
		$name = $instance['name'];
		$testimonial = $instance['testimonial'];
		$name1 = $instance['name1'];
		$testimonial1 = $instance['testimonial1'];
		$name2 = $instance['name2'];
		$testimonial2 = $instance['testimonial2'];
		$name3 = $instance['name3'];
		$testimonial3 = $instance['testimonial3'];		
		/* Widget themplate */
		echo $before_widget;
		
			echo '<div class="testimonial">';
				echo '<p>&quot;'.$testimonial.'&quot;</p>';
				echo '<span class="name">&mdash;&nbsp;'.$name.'</span>';
				echo '<span class="arrow"></span>';
            echo '</div>';
			if ( $name1 != '' ):
				echo '<div class="testimonial">';
				echo '<p>&quot;'.$testimonial1.'&quot;</p>';
				echo '<span class="name">&mdash;&nbsp;'.$name1.'</span>';
				echo '<span class="arrow"></span>';
				echo '</div>';	
			endif;
			if ( $name2 != '' ):			
			echo '<div class="testimonial">';
				echo '<p>&quot;'.$testimonial2.'&quot;</p>';
				echo '<span class="name">&mdash;&nbsp;'.$name2.'</span>';
				echo '<span class="arrow"></span>';
            echo '</div>';	
			endif;
			if ( $name3 != '' ):			
			echo '<div class="testimonial">';
				echo '<p>&quot;'.$testimonial3.'&quot;</p>';
				echo '<span class="name">&mdash;&nbsp;'.$name3.'</span>';
				echo '<span class="arrow"></span>';
            echo '</div>';				
			endif;
		echo $after_widget;
	}

	/* Update widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Create widget settings instances. */
		$instance['name'] = $new_instance['name'];
		$instance['testimonial'] = $new_instance['testimonial'];
		$instance['name1'] = $new_instance['name1'];
		$instance['testimonial1'] = $new_instance['testimonial1'];		
		$instance['name2'] = $new_instance['name2'];
		$instance['testimonial2'] = $new_instance['testimonial2'];		
		$instance['name3'] = $new_instance['name3'];
		$instance['testimonial3'] = $new_instance['testimonial3'];				
		return $instance;
	}

	/* Admin panel form  */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Name: '); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php if ( isset($instance['name']) ) echo $instance['name']; ?>" style="width:98%;" />
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'testimonial' ); ?>"><?php _e('Testimonial:'); ?></label><br />
			<textarea id="<?php echo $this->get_field_id( 'testimonial' ); ?>" name="<?php echo $this->get_field_name( 'testimonial' ); ?>" style="width:100%;"><?php if ( isset($instance['testimonial']) ) echo $instance['testimonial']; ?></textarea>
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'name1' ); ?>"><?php _e('Name: '); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'name1' ); ?>" name="<?php echo $this->get_field_name( 'name1' ); ?>" value="<?php if ( isset($instance['name1']) ) echo $instance['name1']; ?>" style="width:98%;" />
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'testimonial1' ); ?>"><?php _e('Testimonial:'); ?></label><br />
			<textarea id="<?php echo $this->get_field_id( 'testimonial1' ); ?>" name="<?php echo $this->get_field_name( 'testimonial1' ); ?>" style="width:100%;"><?php if ( isset($instance['testimonial1']) ) echo $instance['testimonial1']; ?></textarea>
		</p>     
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'name2' ); ?>"><?php _e('Name: '); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'name2' ); ?>" name="<?php echo $this->get_field_name( 'name2' ); ?>" value="<?php if ( isset($instance['name2']) ) echo $instance['name2']; ?>" style="width:98%;" />
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'testimonial2' ); ?>"><?php _e('Testimonial:'); ?></label><br />
			<textarea id="<?php echo $this->get_field_id( 'testimonial2' ); ?>" name="<?php echo $this->get_field_name( 'testimonial2' ); ?>" style="width:100%;"><?php if ( isset($instance['testimonial2']) ) echo $instance['testimonial2']; ?></textarea>
		</p>   
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'name3' ); ?>"><?php _e('Name: '); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'name3' ); ?>" name="<?php echo $this->get_field_name( 'name3' ); ?>" value="<?php if ( isset($instance['name3']) ) echo $instance['name3']; ?>" style="width:98%;" />
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'testimonial3' ); ?>"><?php _e('Testimonial:'); ?></label><br />
			<textarea id="<?php echo $this->get_field_id( 'testimonial3' ); ?>" name="<?php echo $this->get_field_name( 'testimonial3' ); ?>" style="width:100%;"><?php if ( isset($instance['testimonial3']) ) echo $instance['testimonial3']; ?></textarea>
		</p>                   
	<?php
	}
}

?>