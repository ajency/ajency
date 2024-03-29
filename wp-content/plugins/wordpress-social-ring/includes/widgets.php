<?php





add_action('widgets_init', 'SocialRing_Widget_loader');


function SocialRing_Widget_loader() {


	register_widget('SocialRing_Widget');


}





add_action('widgets_init', 'SocialRing_Fanbox_Widget_loader');


function SocialRing_Fanbox_Widget_loader() {


	register_widget('SocialRing_Fanbox_Widget');


}





class SocialRing_Widget extends WP_Widget {


	function SocialRing_Widget() {


		/* Widget settings. */


		$widget_ops = array('classname' => 'SocialRing_Widget', 'description' => __('Use this widget to add Tweet, Facebook Like and Google Plus One to your sidebar', WP_SOCIAL_RING));





		/* Widget control settings. */


		$control_ops = array('id_base' => 'social_ring_widget');





		/* Create the widget. */


		$this->WP_Widget('social_ring_widget', __('Social Network Buttons - Social Ring', WP_SOCIAL_RING), $widget_ops, $control_ops );


	}





function form($instance) {


		


		$defaults = array( 


				'widget_title' => __('Follow ', WP_SOCIAL_RING).get_bloginfo('name'),


				'gplus_url' => get_bloginfo('url'),


				'tweet_url' => get_bloginfo('url'),


				'flike_url' => get_bloginfo('url'),


				'tweet_account' => '',


				'tweet_hint_account' => '',


				'tweet_hint_desc' => '',


				'tweet_text' => get_bloginfo('name').' - '.get_bloginfo('description'),


				'border_color' => 'D0D0D0',


				'box_padding' => 20,


				'button_margin' => 8


			);


		


		$instance = wp_parse_args( (array) $instance, $defaults );


		


		


		?>


		<p><i><?php _e('This widget needs a sidebar of 200 pixels or more to display properly',WP_SOCIAL_RING); ?></i></p>	


		   <p>


			<p>


				<input id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" value="<?php echo $instance['widget_title']; ?>" />


				<label><?php _e('Widget Title',WP_SOCIAL_RING); ?></label>


			</p>


                        <h4><?php _e('Facebook Like Options', WP_SOCIAL_RING); ?>:</h4>


                        <ul>


                            <li>


				<input id="<?php echo $this->get_field_id('flike_url'); ?>" name="<?php echo $this->get_field_name('flike_url'); ?>" type="text" value="<?php echo $instance['flike_url']; ?>" />


				<label><?php _e('Url',WP_SOCIAL_RING); ?></label>


			    </li>


                        </ul>


                        <h4><?php _e('Google Plus One Options', WP_SOCIAL_RING); ?>:</h4>


                        <ul>


                            <li>


				<input id="<?php echo $this->get_field_id('gplus_url'); ?>" name="<?php echo $this->get_field_name('gplus_url'); ?>" type="text" value="<?php echo $instance['gplus_url']; ?>" />


				<label><?php _e('Url',WP_SOCIAL_RING); ?></label>


			    </li>


                        </ul>


                        <h4><?php _e('Twitter Options', WP_SOCIAL_RING); ?>:</h4>


                        <ul>


				<li>


					<input id="<?php echo $this->get_field_id('tweet_url'); ?>" name="<?php echo $this->get_field_name('tweet_url'); ?>" type="text" value="<?php echo $instance['tweet_url']; ?>" />


					<label><?php _e('Url',WP_SOCIAL_RING); ?></label>


				</li>


				 <li>


					<input id="<?php echo $this->get_field_id('tweet_text'); ?>" name="<?php echo $this->get_field_name('tweet_text'); ?>" type="text" value="<?php echo $instance['tweet_text']; ?>" />


					<label><?php _e('Text',WP_SOCIAL_RING); ?></label>


				</li>


				<li>


					<input id="<?php echo $this->get_field_id('tweet_account'); ?>" name="<?php echo $this->get_field_name('tweet_account'); ?>" type="text" value="<?php echo $instance['tweet_account']; ?>" />


					<label><?php _e('Account',WP_SOCIAL_RING); ?></label>


				</li>


				<li>


					<i><?php _e('Recommend a Twitter account for users to follow after they share content from your website',WP_SOCIAL_RING); ?></i>


				</li>


				<li>


					<input id="<?php echo $this->get_field_id('tweet_hint_account'); ?>" name="<?php echo $this->get_field_name('tweet_hint_account'); ?>" type="text" value="<?php echo $instance['tweet_hint_account']; ?>" />


					<label><?php _e('Account',WP_SOCIAL_RING); ?></label>


				</li>


				<li>


					<input id="<?php echo $this->get_field_id('tweet_hint_desc'); ?>" name="<?php echo $this->get_field_name('tweet_hint_desc'); ?>" type="text" value="<?php echo $instance['tweet_hint_desc']; ?>" />


					<label><?php _e('Description',WP_SOCIAL_RING); ?></label>


				</li>


                        </ul>


			<h4><?php _e('Style Options', WP_SOCIAL_RING); ?>:</h4>


                        <ul>


                            <li>


				<input size ="8" id="<?php echo $this->get_field_id('button_margin'); ?>" name="<?php echo $this->get_field_name('button_margin'); ?>" type="text" value="<?php echo $instance['button_margin']; ?>" />


				<label><?php _e('Button Margin',WP_SOCIAL_RING); ?></label>


			    </li>


			     <li>


				<input size ="8" id="<?php echo $this->get_field_id('box_padding'); ?>" name="<?php echo $this->get_field_name('box_padding'); ?>" type="text" value="<?php echo $instance['box_padding']; ?>" />


				<label><?php _e('Widget Padding',WP_SOCIAL_RING); ?></label>


			    </li>


			      <li>


				<input size ="8" id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" type="text" value="<?php echo $instance['border_color']; ?>" />


				<label><?php _e('Border Color',WP_SOCIAL_RING); ?></label>


			    </li>


                        </ul>


				


		   </p>


		


		<?php


		


	}





	function update($new_instance, $old_instance) {


		// processes widget options to be saved


		$instance = $old_instance;


		$instance['gplus_url'] = strip_tags( $new_instance['gplus_url'] );


                $instance['tweet_account'] = strip_tags( $new_instance['tweet_account'] );


                $instance['tweet_hint_account'] = strip_tags( $new_instance['tweet_hint_account'] );


                $instance['tweet_url'] = strip_tags( $new_instance['tweet_url'] );


                $instance['tweet_text'] = strip_tags( $new_instance['tweet_text'] );


                $instance['tweet_hint_desc'] = strip_tags( $new_instance['tweet_hint_desc'] );


                $instance['flike_url'] = strip_tags( $new_instance['flike_url'] );


		$instance['widget_title'] = strip_tags( $new_instance['widget_title'] );


		$instance['button_margin'] = strip_tags( $new_instance['button_margin'] );


		$instance['box_padding'] = strip_tags( $new_instance['box_padding'] );


		$instance['border_color'] = strip_tags( $new_instance['border_color'] );


		return $instance;


	}





	// outputs the content of the widget


	function widget($args, $instance) {


	extract($args);


	echo $before_widget."\n";


	if ( isset($instance['widget_title']) ) {


		echo $before_title . $instance['widget_title'] . $after_title."\n";


	}


	$options = get_option(WP_SOCIAL_RING.'_options');


	?>


	<div class="SocialRing_Widget_inside" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;border:1px solid #<?php echo $instance['border_color']; ?>;padding:12px <?php echo $instance['box_padding']; ?>px;min-height:62px;">


		<div style="float:left;margin:0 <?php echo $instance['button_margin']; ?>px">


			<a href="https://twitter.com/share" lang="<?php echo $options['twitter_language']; ?>" class="sr-twitter-button twitter-share-button" data-text="<?php echo $instance['tweet_text']; ?>" data-url="<?php echo $instance['tweet_url']; ?>" data-count="vertical" data-via="<?php echo $instance['tweet_account']; ?>" data-related="<?php echo $instance['tweet_hint_account']; ?>:<?php echo $instance['tweet_hint_desc']; ?>"></a>


		</div>


		<div style="float:left;margin:0 <?php echo $instance['button_margin']; ?>px;padding-top:2px">


			<g:plusone href="<?php echo $instance['gplus_url']; ?>" size="tall"></g:plusone>


		</div>


		<div style="float:left;margin:0 <?php echo $instance['button_margin']; ?>px;">


			<fb:like href="<?php echo $instance['flike_url']; ?>" send="false" layout="box_count" width="70" show_faces="false"></fb:like>


		</div>


		


		<div class="clear"></div>


	</div>


<?php


	echo $after_widget."\n";


	}


}








// SOCIALRING FANBOX FACEBOOK








class SocialRing_Fanbox_Widget extends WP_Widget {


	function SocialRing_Fanbox_Widget() {


		/* Widget settings. */


		$widget_ops = array('classname' => 'SocialRing_Fanbox_Widget', 'description' => __('Use this widget to add the Facebook fanbox to your sidebar', 'WP_FANBOX_SOCIAL_RING'));





		/* Widget control settings. */


		$control_ops = array('id_base' => 'social_ring_fanbox_widget');





		/* Create the widget. */


		$this->WP_Widget('social_ring_fanbox_widget', __('Facebook Fanpage - Social Ring ', 'WP_FANBOX_SOCIAL_RING'), $widget_ops, $control_ops );


	}





function form($instance) {


		


		$defaults = array( 


				'widget_title' => __('Follow ', 'WP_FANBOX_SOCIAL_RING').get_bloginfo('name'),


				'data-href' => get_bloginfo('url'),


				'data-color-scheme' => 'light',


				'data-show-faces' => 'true',


				'data-header' => 'true',


				'data-stream' => 'false',


				'data-show-border' => 'true',


				'border_color' => 'D0D0D0',


				'box_padding' => 20,


				'button_margin' => 8


			);


		


		$instance = wp_parse_args( (array) $instance, $defaults );


		


		


		?>


		<p><i><?php _e('This widget needs a sidebar of 300 pixels or more to display properly','WP_FANBOX_SOCIAL_RING'); ?></i></p>	


		   <p>


			<ul>


				<?php // WIDGET TITLE ?>


				<li>


				<input id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" value="<?php echo $instance['widget_title']; ?>" />


				<label><?php _e('Widget Title','WP_FANBOX_SOCIAL_RING'); ?></label>


				</li>


				


				<?php // FB PAGE URL ?>


				<li>


				<input id="<?php echo $this->get_field_id('data-href'); ?>" name="<?php echo $this->get_field_name('data-href'); ?>" type="text" value="<?php echo $instance['data-href']; ?>" />


				<label><?php _e('FB Page URL','WP_FANBOX_SOCIAL_RING'); ?></label>


				</li>


				


				<?php // COLORSCHEME ?>


				<li>


				<select id="<?php echo $this->get_field_id('data-color-scheme'); ?>" name="<?php echo $this->get_field_name('data-color-scheme'); ?>" >


					<option <?php if($instance['data-color-scheme'] == 'light') { echo 'selected="selected"'; } ?> value="light" >Light</option>


					<option <?php if($instance['data-color-scheme'] == 'dark') { echo 'selected="selected"'; } ?> value="dark" >Dark</option>


				</select>


				<label><?php _e('Colorscheme','WP_FANBOX_SOCIAL_RING'); ?></label>


				</li>


				


				<?php // SHOW FACES ?>


				<li>


				<select id="<?php echo $this->get_field_id('data-show-faces'); ?>" name="<?php echo $this->get_field_name('data-show-faces'); ?>" >


					<option <?php if($instance['data-show-faces'] == 'true') { echo 'selected="selected"'; } ?> value="true" >True</option>


					<option <?php if($instance['data-show-faces'] == 'false') { echo 'selected="selected"'; } ?> value="false" >False</option>


				</select>								


				<label><?php _e('Show Faces','WP_FANBOX_SOCIAL_RING'); ?></label>


				</li>


				


				<?php // HEADER ?>


				<li>


				<select id="<?php echo $this->get_field_id('data-header'); ?>" name="<?php echo $this->get_field_name('data-header'); ?>" >


					<option <?php if($instance['data-header'] == 'true') { echo 'selected="selected"'; } ?> value="true" >True</option>


					<option <?php if($instance['data-header'] == 'false') { echo 'selected="selected"'; } ?> value="false" >False</option>


				</select>								


				<label><?php _e('Header','WP_FANBOX_SOCIAL_RING'); ?></label>


				</li>


				


				<?php // STREAM ?>


				<li>


				<select id="<?php echo $this->get_field_id('data-stream'); ?>" name="<?php echo $this->get_field_name('data-stream'); ?>" >


					<option <?php if($instance['data-stream'] == 'true') { echo 'selected="selected"'; } ?> value="true" >True</option>


					<option <?php if($instance['data-stream'] == 'false') { echo 'selected="selected"'; } ?> value="false" >False</option>


				</select>								


				<label><?php _e('Stream','WP_FANBOX_SOCIAL_RING'); ?></label>


				</li>


				


				<?php // SHOW BORDER ?>


				<li>


				<select id="<?php echo $this->get_field_id('data-show-border'); ?>" name="<?php echo $this->get_field_name('data-show-border'); ?>" >


					<option <?php if($instance['data-show-border'] == 'true') { echo 'selected="selected"'; } ?> value="true" >True</option>


					<option <?php if($instance['data-show-border'] == 'false') { echo 'selected="selected"'; } ?> value="false" >False</option>


				</select>								


				<label><?php _e('Show Border','WP_FANBOX_SOCIAL_RING'); ?></label>


				</li>


			</ul>


		   </p>


		


		<?php


		


	}


	


	function update($new_instance, $old_instance) {


		// processes widget options to be saved


		$instance = $old_instance;


		$instance['widget_title'] = strip_tags( $new_instance['widget_title'] );


		$instance['data-href'] = strip_tags( $new_instance['data-href'] );


		$instance['data-color-scheme'] = strip_tags( $new_instance['data-color-scheme'] );


		$instance['data-show-faces'] = strip_tags( $new_instance['data-show-faces'] );


		$instance['data-header'] = strip_tags( $new_instance['data-header'] );


		$instance['data-stream'] = strip_tags( $new_instance['data-stream'] );


		$instance['data-show-border'] = strip_tags( $new_instance['data-show-border'] );


		return $instance;


	}





	// outputs the content of the widget


	function widget($args, $instance) {


	extract($args);


	echo $before_widget."\n";


	if ( isset($instance['widget_title']) ) {


		echo $before_title . $instance['widget_title'] . $after_title."\n";


	}


	$options = get_option('WP_FANBOX_SOCIAL_RING'.'_options');


	?>


	<div id="fb-root"></div>


	<script>(function(d, s, id) {


	  var js, fjs = d.getElementsByTagName(s)[0];


	  if (d.getElementById(id)) return;


	  js = d.createElement(s); js.id = id;


	  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1";


	  fjs.parentNode.insertBefore(js, fjs);


	  }(document, 'script', 'facebook-jssdk'));


	</script>





	<div class="fb-like-box" data-href="<?php echo $instance['data-href']; ?>" data-width="300" data-colorscheme="<?php echo $instance['data-color-scheme']; ?>" data-show-faces="<?php echo $instance['data-show-faces']; ?>" data-header="<?php echo $instance['data-header']; ?>" data-stream="<?php echo $instance['data-stream']; ?>" data-show-border="<?php echo $instance['data-show-border']; ?>"></div>





<?php


	echo $after_widget."\n";


	}


}





?>