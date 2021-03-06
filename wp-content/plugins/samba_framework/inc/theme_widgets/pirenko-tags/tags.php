<?php
	/*
		Plugin Name: Pirenko Post Tags
		Plugin URI: http://www.munto.net
		Description: A widget to show in a different way tags or categories for posts.
		Version: 1.0
		Author: Pirenko
		Author URI: http://www.munto.net
	*/
	
	//ADD WIDGET LOADING
	add_action( 'widgets_init', 'load_pirenko_tags' );
	//REGISTER WIDGET
	function load_pirenko_tags() {
		register_widget( 'pirenko_tags_widget' );
	}
	//CREATE CLASS TO CONTROL EVERYTHING
	class pirenko_tags_widget extends WP_Widget 
	{
		//SET UP WIDGET
		function pirenko_tags_widget() 
		{
			$widget_ops = array( 'classname' => 'pirenko-tags-widget', 'description' => ('A widget to add Tag or Categories Links for Posts.') );
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'pirenko-tags-widget' );
			$this->WP_Widget( 'pirenko-tags-widget', __('Samba: Post Tag Links', 'samba_lang'), $widget_ops, $control_ops );
		}

		//SET UP WIDGET OUTPUT
		function widget( $args, $instance ) 
		{
			extract($args);
			//BEFORE WIDGET CODE
			echo $before_widget;	
			//DISPLAY TITLE IF NECESSARY
			if (!empty( $instance['title'] ) )
					echo $before_title . $instance['title'] . $after_title;
			?>
			<div class="pirenko_tags fade_anchor">
                    <?php
						if ( $instance['link_type']=='both')
							$links_type=array('post_tag','category');
						else
							$links_type=$instance['link_type'];
						$args=array(
						'taxonomy'  => $links_type, 
						'format' => 'array',
						'orderby' => 'count',
						'order' => 'DESC',
						'unit'=>'em',
						'smallest' => 1,
                        'largest'=>1
					   ); 
   
                        $tag_cloud=wp_tag_cloud($args);
                        if (!empty($tag_cloud))
						{
							foreach($tag_cloud as $tags) :
								echo "<div class='theme_button_inverted tiny'>";
								echo $tags;
								echo "</div>";
							endforeach; 
						}
						else
						{
							echo ("Tags not found!");	
						}
						echo '<div class="clearfix"></div>';
                    ?>
			</div>
			<?php
			//AFTER WIDGET CODE
			echo $after_widget;
		}
		//UPDATE WIDGET SETTINGS
		function update( $new_instance, $old_instance ) 
		{
			return $new_instance;
		}
		//SET UP WIDGET FORM ON THE CONTROL PANEL
		function form( $instance ) 
		{
			if (isset($instance['title']))
				$title = $instance['title'] ;
			else
				$title="";
			if (isset($instance['link_type']))
				$link_type = $instance['link_type'];
			else
				$link_type="tags";
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'samba_lang'); ?>:</label><br />
				<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="pct_89" />
			</p>
            <p>
				<label for="<?php echo $this->get_field_id('link_type'); ?>"><?php _e('Use categories or tags?', 'samba_lang'); ?></label><br />
				<select id="<?php echo $this->get_field_id('link_type'); ?>" name="<?php echo $this->get_field_name('link_type'); ?>" class="pct_69">
					<?php   
						if ( $link_type == 'category' ) // Make default first in list
                        	echo "\n\t<option selected='selected' value='category'>Categories</option>";
                       	else
                          	echo "\n\t<option value='category'>Categories</option>";
                      	if ( $link_type == 'post_tag' ) // Make default first in list
                        	echo "\n\t<option selected='selected' value='post_tag'>Tags</option>";
                       	else
                         	echo "\n\t<option value='post_tag'>Tags</option>";
						if ( $link_type == 'both' ) // Make default first in list
                        	echo "\n\t<option selected='selected' value='both'>Both</option>";
                       	else
                         	echo "\n\t<option value='both'>Both</option>";
							
                    ?>
              	</select>
			</p>
			<?php
			
		}
	}
?>