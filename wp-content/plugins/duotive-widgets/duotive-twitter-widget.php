<?php
/*
 * Plugin Name: Duotive Recent Tweets
 * Description: A widget for recent Tweets. Developed by Duotive.
 * Version: 2.0
 * Author: Duotive
 */
/* Load widget with widget_init function */
add_action( 'widgets_init', 'duotive_twitter' );

/* Register widget */
function duotive_twitter() {
	register_widget( 'duotive_twitter' );
}

/* Handler class for all widget params */
class duotive_twitter extends WP_Widget {

	/* Widget setup. */
	function duotive_twitter() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'twitter', 'description' => __('A widget for displaying your recent tweets.', 'twitter') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'duotive-twitter' );
		/* Create the widget. */
		$this->WP_Widget( 'duotive-twitter', __('Duotive - Recent Tweets'), $widget_ops, $control_ops );
	}

	/** Widget display template */
	function widget( $args, $instance ) {
		extract( $args );

		/* Get widget settings */
		$title = apply_filters('widget_title', $instance['title'] );
		$id = $instance['id'];
		$number = $instance['number'];
		/* Widget themplate */
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;

		$user = str_replace('&nbsp;', '', $id);
		$user = str_replace('@', '', $id); 
       	if( !class_exists( 'WP_Http' ) ) include_once( ABSPATH . WPINC. '/class-http.php' );

		$url = "http://twitter.com/statuses/user_timeline/".$user.".json";
		$request = new WP_Http;
		$result = $request->request($url);
		if ( isset($result->errors['http_request_failed'][0]) && $result->errors['http_request_failed'][0] != '' ) : 
			$tweets = get_transient( 'duotive-tweets' );
			if ( $tweets ):
				echo '<ul>';
					$tweet_counter = 0;
					foreach($tweets as $tweet):
						$tweet_counter++;
						$pattern = '/\@(\w+)/';
						$replace = '<a target="_blank" rel="nofollow" href="http://twitter.com/$1">@$1</a>';
						$tweet['text'] = preg_replace($pattern, $replace , $tweet['text']);
						$tweet['text'] = make_clickable($tweet['text']);
						echo '<li>';
							echo '<span class="tweet-content">';
								echo $tweet['text'];
							echo '</span>';
							echo '<span class="tweet-date">';
								echo date("g:i A - d F Y",strtotime($tweet['created_at']));
							echo '</span>';						
						echo '</li>';	
						if ( $number == $tweet_counter ) break;					
					endforeach;
				echo '</ul>';
				echo '<a class="follow-url" href="http://www.twitter.com/'.$user.'">Follow on twitter</a>';	
			else:
				echo '<p>Error requiring the lastest tweets. Try again later.</p>';
			endif;
		else:
			if ( $result ) :
				$tweets = json_decode($result['body'], true);
							
				if ( isset($tweets['error']) && $tweets['error'] != '' ) 
				{
					$tweets = get_transient( 'duotive-tweets' );
				}
				else
				{
					set_transient( 'duotive-tweets', $tweets, 60*60*12 );
				}
	
				echo '<ul>';
					$tweet_counter = 0;
					foreach($tweets as $tweet):
						$tweet_counter++;
						$pattern = '/\@(\w+)/';
						$replace = '<a target="_blank" rel="nofollow" href="http://twitter.com/$1">@$1</a>';
						$tweet['text'] = preg_replace($pattern, $replace , $tweet['text']);
						$tweet['text'] = make_clickable($tweet['text']);
						echo '<li>';
							echo '<span class="tweet-content">';
								echo $tweet['text'];
							echo '</span>';
							echo '<span class="tweet-date">';
								echo date("g:i A - d F Y",strtotime($tweet['created_at']));
							echo '</span>';						
						echo '</li>';	
						if ( $number == $tweet_counter ) break;					
					endforeach;
				echo '</ul>';
				echo '<a class="follow-url" href="http://www.twitter.com/'.$user.'">Follow on twitter</a>';
			else:
				echo '<p>Error requiring the lastest tweets. Try again later.</p>';
			endif;
		endif;
	echo $after_widget;
	}

	/* Update widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Create widget settings instances. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['id'] = $new_instance['id'];
		$instance['number'] = $new_instance['number'];
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
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('Twitter user:'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php if ( isset($instance['id']) ) echo $instance['id']; ?>" style="width:98%;" />
		</p>      
		<p>
			<label style="color:#db6e0d; text-transform:uppercase;"  for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of tweets:'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php if ( isset($instance['number']) ) echo $instance['number']; ?>" style="width:98%;" />          
		</p> 
	<?php
	}
}

?>