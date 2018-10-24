<?php
/*
 * Plugin Name: Duotive Slideshow
 * Description: A widget for an image slideshow in the sidebar. Devepoled by Duotive.
 * Version: 2.0
 * Author: Duotive
 */
/* Load widget with widget_init function */
add_action( 'widgets_init', 'duotive_slideshow' );

/* Register widget */
function duotive_slideshow() {
	register_widget( 'duotive_slideshow' );
}

/* Handler class for all widget params */
class duotive_slideshow extends WP_Widget {

	/* Widget setup. */
	function duotive_slideshow() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'slideshow', 'description' => __('A widget for an image slideshow in the sidebar.', 'slideshow') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'duotive-slideshow' );
		/* Create the widget. */
		$this->WP_Widget( 'duotive-slideshow', __('Duotive - Slideshow'), $widget_ops, $control_ops );
	}

	/** Widget display template */
	function widget( $args, $instance ) {
		extract( $args );

		/* Get widget settings */
		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$images = $instance['images'];
		$width = (int)$instance['width'];
		$height = (int)$instance['height'];
		$effect = $instance['effect'];
		$slices = $instance['slices'];
		$boxCols = $instance['boxCols'];
		$boxRows = $instance['boxRows'];
		$animSpeed = $instance['animSpeed'];
		$pauseTime = $instance['pauseTime'];
		/* Widget themplate */
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		$urls = explode("\n", $images);
		if ( $width == 0 ) $width = 260;
		if ( $height == 0 ) $height = 260;
		if ( $effect == '' ) $effect = 'random';
		if ( $slices == 0 ) $slices = 10;
		if ( $boxCols == 0 ) $boxCols = 4;
		if ( $boxRows == 0 ) $boxRows = 4;
		if ( $animSpeed == 0 ) $animSpeed = 800;
		if ( $pauseTime == 0 ) $pauseTime = 4000;		
		echo '
			<script type="text/javascript">
				jQuery(document).ready(function($) { 
					$(".sidebar-slideshow").nivoSlider({controlNav:false, directionNavHide:false, effect:\''.$effect.'\', slices:'.$slices.', boxCols:'.$boxCols.', boxRows:'.$boxRows.', animSpeed:'.$animSpeed.', pauseTime:'.$pauseTime.' });												
				});				
			</script>
		';
		echo '<div class="sidebar-slideshow-wrapper" style="width:'.$width.'px;">';
			echo '<div class="sidebar-slideshow" style="height:'.$height.'px;">';
				$i = 1;
				foreach($urls as $url):
					echo '<img src="'.get_bloginfo('template_directory').'/includes/timthumb.php?src='.trim($url).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1&amp;q=100" />';
				endforeach;
			echo '</div>';
		echo '</div>';			
	echo $after_widget;
	}

	/* Update widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Create widget settings instances. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['images'] = $new_instance['images'];
		$instance['width'] = $new_instance['width'];
		$instance['height'] = $new_instance['height'];	
		$instance['effect'] = $new_instance['effect'];
		$instance['slices'] = $new_instance['slices'];	
		$instance['boxCols'] = $new_instance['boxCols'];
		$instance['boxRows'] = $new_instance['boxRows'];
		$instance['animSpeed'] = $new_instance['animSpeed'];
		$instance['pauseTime'] = $new_instance['pauseTime'];		
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
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php if ( isset($instance['width']) ) echo $instance['width']; ?>" style="width:98%;" />
		</p>         
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php if ( isset($instance['height']) ) echo $instance['height']; ?>" style="width:98%;" />
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'animSpeed' ); ?>"><?php _e('Animation speed'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'animSpeed' ); ?>" name="<?php echo $this->get_field_name( 'animSpeed' ); ?>" value="<?php if ( isset($instance['animSpeed']) ) echo $instance['animSpeed']; ?>" style="width:98%;" />
            <em style="font-style:normal; font-size:8pt; display:block; text-align:right; padding-top:6px;">Slide transition speed</em>
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'pauseTime' ); ?>"><?php _e('Pause time'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'pauseTime' ); ?>" name="<?php echo $this->get_field_name( 'pauseTime' ); ?>" value="<?php if ( isset($instance['pauseTime']) )  echo $instance['pauseTime']; ?>" style="width:98%;" />
            <em style="font-style:normal; font-size:8pt; display:block; text-align:right; padding-top:6px;">How long each slide will show</em>            
		</p>                 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'effect' ); ?>"><?php _e('Effect'); ?></label><br />
			<select id="<?php echo $this->get_field_id( 'effect' ); ?>" name="<?php echo $this->get_field_name( 'effect' ); ?>">
				<option value="sliceDown" <?php if ( isset($instance['effect']) && $instance['effect'] == 'sliceDown' ) echo 'selected="selected"'; ?>>sliceDown</option>
            	<option value="sliceDownLeft" <?php if ( isset($instance['effect']) && $instance['effect'] == 'sliceDownLeft' ) echo 'selected="selected"'; ?>>sliceDownLeft</option>
            	<option value="sliceUp" <?php if ( isset($instance['effect']) && $instance['effect'] == 'sliceUp' ) echo 'selected="selected"'; ?>>sliceUp</option>
            	<option value="sliceUpLeft" <?php if ( isset($instance['effect']) && $instance['effect'] == 'sliceUpLeft' ) echo 'selected="selected"'; ?>>sliceUpLeft</option>
            	<option value="sliceUpDown" <?php if ( isset($instance['effect']) && $instance['effect'] == 'sliceUpDown' ) echo 'selected="selected"'; ?>>sliceUpDown</option>
            	<option value="fold" <?php if ( isset($instance['effect']) && $instance['effect'] == 'fold' ) echo 'selected="selected"'; ?>>fold</option>
            	<option value="fade" <?php if ( isset($instance['effect']) && $instance['effect'] == 'fade' ) echo 'selected="selected"'; ?>>fade</option>
            	<option value="random" <?php if ( isset($instance['effect']) && $instance['effect'] == 'random' ) echo 'selected="selected"'; ?>>random</option>
            	<option value="slideInRight" <?php if ( isset($instance['effect']) && $instance['effect'] == 'slideInRight' ) echo 'selected="selected"'; ?>>slideInRight</option>                                                                                                                                
            	<option value="slideInLeft" <?php if ( isset($instance['effect']) && $instance['effect'] == 'slideInLeft' ) echo 'selected="selected"'; ?>>slideInLeft</option>                                                                                                                                
            	<option value="boxRandom" <?php if ( isset($instance['effect']) && $instance['effect'] == 'boxRandom' ) echo 'selected="selected"'; ?>>boxRandom</option>                                                                                                                                
            	<option value="boxRain" <?php if ( isset($instance['effect']) && $instance['effect'] == 'boxRain' ) echo 'selected="selected"'; ?>>boxRain</option>                                                                                                                                
            	<option value="boxRainReverse" <?php if ( isset($instance['effect']) && $instance['effect'] == 'boxRainReverse' ) echo 'selected="selected"'; ?>>boxRainReverse</option>                                                                                                                                
            	<option value="boxRainGrow" <?php if ( isset($instance['effect']) && $instance['effect'] == 'boxRainGrow' ) echo 'selected="selected"'; ?>>boxRainGrow</option>                                                                                                                                
            	<option value="boxRainGrowReverse" <?php if ( isset($instance['effect']) && $instance['effect'] == 'boxRainGrowReverse' ) echo 'selected="selected"'; ?>>boxRainGrowReverse</option>                                                                                                                                            
            </select>            
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'slices' ); ?>"><?php _e('Slices'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'slices' ); ?>" name="<?php echo $this->get_field_name( 'slices' ); ?>" value="<?php if ( isset($instance['slices']) ) echo $instance['slices']; ?>" style="width:98%;" />
            <em style="font-style:normal; font-size:8pt; display:block; text-align:right; padding-top:6px;">For slice animations</em>            
		</p> 
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'boxCols' ); ?>"><?php _e('Box columns'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'boxCols' ); ?>" name="<?php echo $this->get_field_name( 'boxCols' ); ?>" value="<?php if ( isset($instance['boxCols']) ) echo $instance['boxCols']; ?>" style="width:98%;" />
            <em style="font-style:normal; font-size:8pt; display:block; text-align:right; padding-top:6px;">For box animations</em>             
		</p>
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;" for="<?php echo $this->get_field_id( 'boxRows' ); ?>"><?php _e('Box rows'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'boxRows' ); ?>" name="<?php echo $this->get_field_name( 'boxRows' ); ?>" value="<?php if ( isset($instance['boxRows']) ) echo $instance['boxRows']; ?>" style="width:98%;" />
		</p>                                         
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'images' ); ?>"><?php _e('Image URLs:'); ?></label><br />
			<textarea style="width:98%; height:300px;" id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name( 'images' ); ?>"><?php if ( isset($instance['images']) ) echo $instance['images']; ?></textarea>          
            <em style="font-style:normal; font-size:8pt; display:block; text-align:right; padding-top:6px;">Add image urls here. Each url on a new line.</em>            
		</p> 
	<?php
	}
}

?>