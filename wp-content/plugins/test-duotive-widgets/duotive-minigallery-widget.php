<?php
/*
 * Plugin Name: Duotive Mini Gallery
 * Description: A widget for an image gallery in the sidebar. Devepoled by Duotive.
 * Version: 2.0
 * Author: Duotive
 */
/* Load widget with widget_init function */
add_action( 'widgets_init', 'duotive_minigallery' );

/* Register widget */
function duotive_minigallery() {
	register_widget( 'duotive_minigallery' );
}

/* Handler class for all widget params */
class duotive_minigallery extends WP_Widget {

	/* Widget setup. */
	function duotive_minigallery() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'minigallery', 'description' => __('A widget for an image gallery in the sidebar.', 'minigallery') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'duotive-minigallery' );
		/* Create the widget. */
		$this->WP_Widget( 'duotive-minigallery', __('Duotive - Mini Gallery'), $widget_ops, $control_ops );
	}

	/** Widget display template */
	function widget( $args, $instance ) {
		extract( $args );

		/* Get widget settings */
		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$images = $instance['images'];
		/* Widget themplate */
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		$urls = explode("\n", $images);
		echo '<div class="mini-gallery">';
			$i = 1;
			foreach($urls as $url):
				$class = '';
				if ( $i%3 == 0 ) $class = ' class="last" ';
				echo '<a '.$class.' href="'.$url.'" rel="minigallery[modal]">';
					echo '<img src="'.get_bloginfo('template_directory').'/includes/timthumb.php?src='.trim($url).'&amp;h=54&amp;w=67&amp;zc=1&amp;q=100" />';
				echo '</a>';
				$i++;
			endforeach;
		echo '</div>';
	echo $after_widget;
	}

	/* Update widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Create widget settings instances. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['images'] = $new_instance['images'];
		return $instance;
	}

	/* Admin panel form  */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" style="width:98%;" />
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'images' ); ?>"><?php _e('Image URLs:'); ?></label><br />
			<textarea style="width:98%; height:100px;" id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name( 'images' ); ?>"><?php if( isset($instance['images']) ) echo $instance['images']; ?></textarea>          
		</p> 
	<?php
	}
}

?>