<?php
/*
 * Plugin Name: Duotive Tabs
 * Description: A widget for content tabs. Devepoled by Duotive.
 * Version: 1.0
 * Author: Duotive
 */
/* Load widget with widget_init function */
add_action( 'widgets_init', 'duotive_tabs' );

/* Register widget */
function duotive_tabs() {
	register_widget( 'duotive_tabs' );
}

/* Handler class for all widget params */
class duotive_tabs extends WP_Widget {

	/* Widget setup. */
	function duotive_tabs() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tabs-widget', 'description' => __('A widget for content tabs.', 'tabs') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'duotive-tabs' );
		/* Create the widget. */
		$this->WP_Widget( 'duotive-tabs', __('Duotive - Tabs'), $widget_ops, $control_ops );
	}

	/** Widget display template */
	function widget( $args, $instance ) {
		extract( $args );

		/* Get widget settings */
		$title = apply_filters('widget_title', $instance['title'] );
		$title1 = $instance['tabs-title-1'];
		$title2 = $instance['tabs-title-2'];
		$title3 = $instance['tabs-title-3'];
		$title4 = $instance['tabs-title-4'];
		$title5 = $instance['tabs-title-5'];		
		$content1 = $instance['tabs-content-1'];		
		$content2 = $instance['tabs-content-2'];		
		$content3 = $instance['tabs-content-3'];		
		$content4 = $instance['tabs-content-4'];				
		$content5 = $instance['tabs-content-5'];				
		/* Widget themplate */
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<div class="sidebar-tabs">';
			echo '<ul>';
				if ( $title1 ): 
					echo '<li><a href="#sidebar-tabs-content-1">'.$title1.'</a></li>';
				endif; 
				if ( $title2 ):
					echo '<li><a href="#sidebar-tabs-content-2">'.$title2.'</a></li>';
				endif; 
				if ( $title3 ):
					echo '<li><a href="#sidebar-tabs-content-3">'.$title3.'</a></li>';
				endif; 
				if ( $title4 ):				
					echo '<li><a href="#sidebar-tabs-content-4">'.$title4.'</a></li>';
				endif; 
				if ( $title5 ):				
					echo '<li><a href="#sidebar-tabs-content-5">'.$title5.'</a></li>';				
				endif; 				
			echo '</ul>';
			if ( $content1 ): 
				echo '<div id="sidebar-tabs-content-1">'.$content1.'</div>';
			endif;
			if ( $content2 ):
				echo '<div id="sidebar-tabs-content-2">'.$content2.'</div>';
			endif;
			if ( $content3 ):			
				echo '<div id="sidebar-tabs-content-3">'.$content3.'</div>';
			endif;
			if ( $content4 ):			
				echo '<div id="sidebar-tabs-content-4">'.$content4.'</div>';
			endif;
			if ( $content5 ):			
				echo '<div id="sidebar-tabs-content-5">'.$content5.'</div>';			
			endif;			
		echo '</div>';
		echo $after_widget;
	}

	/* Update widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Create widget settings instances. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tabs-title-1'] = $new_instance['tabs-title-1'];
		$instance['tabs-title-2'] = $new_instance['tabs-title-2'];
		$instance['tabs-title-3'] = $new_instance['tabs-title-3'];
		$instance['tabs-title-4'] = $new_instance['tabs-title-4'];
		$instance['tabs-title-5'] = $new_instance['tabs-title-5'];		
		$instance['tabs-content-1'] = $new_instance['tabs-content-1'];		
		$instance['tabs-content-2'] = $new_instance['tabs-content-2'];		
		$instance['tabs-content-3'] = $new_instance['tabs-content-3'];		
		$instance['tabs-content-4'] = $new_instance['tabs-content-4'];		
		$instance['tabs-content-5'] = $new_instance['tabs-content-5'];				
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
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'tabs-title-1' ); ?>"><?php _e('Tab 1 title'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'tabs-title-1' ); ?>" name="<?php echo $this->get_field_name( 'tabs-title-1' ); ?>" value="<?php if ( isset($instance['tabs-title-1']) ) echo $instance['tabs-title-1']; ?>" style="width:98%;" />
		</p>        
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'tabs-content-1' ); ?>"><?php _e('Tab 1 content:'); ?></label><br />
			<textarea style="width:98%; height:100px;" id="<?php echo $this->get_field_id( 'tabs-content-1' ); ?>" name="<?php echo $this->get_field_name( 'tabs-content-1' ); ?>"><?php if ( isset($instance['tabs-content-1']) ) echo $instance['tabs-content-1']; ?></textarea>          
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'tabs-title-2' ); ?>"><?php _e('Tab 2 title'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'tabs-title-2' ); ?>" name="<?php echo $this->get_field_name( 'tabs-title-2' ); ?>" value="<?php if ( isset($instance['tabs-title-2']) ) echo $instance['tabs-title-2']; ?>" style="width:98%;" />
		</p>        
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'tabs-content-2' ); ?>"><?php _e('Tab 2 content:'); ?></label><br />
			<textarea style="width:98%; height:200px;" id="<?php echo $this->get_field_id( 'tabs-content-2' ); ?>" name="<?php echo $this->get_field_name( 'tabs-content-2' ); ?>"><?php if ( isset($instance['tabs-content-2']) ) echo $instance['tabs-content-2']; ?></textarea>          
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'tabs-title-3' ); ?>"><?php _e('Tab 3 title'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'tabs-title-3' ); ?>" name="<?php echo $this->get_field_name( 'tabs-title-3' ); ?>" value="<?php if ( isset($instance['tabs-title-3']) ) echo $instance['tabs-title-3']; ?>" style="width:98%;" />
		</p>        
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'tabs-content-3' ); ?>"><?php _e('Tab 3 content:'); ?></label><br />
			<textarea style="width:98%; height:300px;" id="<?php echo $this->get_field_id( 'tabs-content-3' ); ?>" name="<?php echo $this->get_field_name( 'tabs-content-3' ); ?>"><?php if ( isset($instance['tabs-content-3']) ) echo $instance['tabs-content-3']; ?></textarea>          
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'tabs-title-4' ); ?>"><?php _e('Tab 4 title'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'tabs-title-4' ); ?>" name="<?php echo $this->get_field_name( 'tabs-title-4' ); ?>" value="<?php if ( isset($instance['tabs-title-4']) ) echo $instance['tabs-title-4']; ?>" style="width:98%;" />
		</p>        
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'tabs-content-4' ); ?>"><?php _e('Tab 4 content:'); ?></label><br />
			<textarea style="width:98%; height:400px;" id="<?php echo $this->get_field_id( 'tabs-content-4' ); ?>" name="<?php echo $this->get_field_name( 'tabs-content-4' ); ?>"><?php if ( isset($instance['tabs-content-4']) ) echo $instance['tabs-content-4']; ?></textarea>          
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'tabs-title-5' ); ?>"><?php _e('Tab 5 title'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'tabs-title-5' ); ?>" name="<?php echo $this->get_field_name( 'tabs-title-5' ); ?>" value="<?php if ( isset($instance['tabs-title-5']) ) echo $instance['tabs-title-5']; ?>" style="width:98%;" />
		</p>        
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'tabs-content-5' ); ?>"><?php _e('Tab 5 content:'); ?></label><br />
			<textarea style="width:98%; height:500px;" id="<?php echo $this->get_field_id( 'tabs-content-5' ); ?>" name="<?php echo $this->get_field_name( 'tabs-content-5' ); ?>"><?php if ( isset($instance['tabs-content-5']) ) echo $instance['tabs-content-5']; ?></textarea>          
		</p>                            
	<?php
	}
}

?>