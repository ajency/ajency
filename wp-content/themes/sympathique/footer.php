<?php global $smof_data; //get theme options ?>

	<?php
	if (!is_page_template('template-onepage.php')) { ?>
		<div class="space"></div>
	<?php } ?>

	<footer id="footer">	
	
		<?php 
			// FOOTER OPTIONS FOR ONE PAGE TEMPLATES
			if (is_page_template('template-onepage.php')) { ?>
				
				<?php
				$footer_opt = get_post_meta($post->ID,'dt_footer_opt', false);
				
				if (in_array("display_widgets", $footer_opt)) { ?>
				<div class="centered-wrapper"> 
					<?php 
					if ( is_active_sidebar( 'top-footer' ) ) : ?>		
					<div id="topfooter">
						<?php dynamic_sidebar( 'top-footer' ); ?>
					</div><!--end topfooter-->
					<?php endif; ?>
					</div>
				<?php
				}	
				
				if (in_array("display_copyright", $footer_opt)) { ?>
					
					<div id="bottomfooter">		
						<div class="centered-wrapper">		
							<div class="one-half">
								<?php if($smof_data['copyright_textarea'] !='') { ?>
								<p><?php echo wp_kses_post($smof_data['copyright_textarea']);  ?></p>
								<?php } else { ?>
								<p><?php _e('COPYRIGHT &copy; 2013 - SYMPATHIQUE | ALL RIGHTS RESERVED', 'delicious'); ?></p>
								<?php } ?>
							</div><!--end one-half-->

							<div class="one-half column-last">
								<ul class="social">
									<?php
										$social_links = array('rss','facebook','twitter','flickr','google-plus', 'dribbble' , 'linkedin', 'pinterest', 'youtube', 'github-alt', 'vimeo-square', 'instagram', 'tumblr', 'xing', 'vk', 'foursquare', 'wechat', 'behance', 'soundcloud', 'codepen', 'slideshare');
										if($social_links) {
											foreach($social_links as $social_link) {
												if(!empty($smof_data[$social_link])) { echo '<li><a href="'. $smof_data[$social_link] .'" title="'. $social_link .'" class="'.$social_link.'"  target="_blank"><i class="fa fa-'.$social_link.'"></i></a></li>';
												}												
											}
											if(!empty($smof_data['skype'])) { echo '<li><a href="skype:'. $smof_data['skype'] .'?chat" title="'. $smof_data['skype'] .'" class="skype" target="_blank"><i class="fa fa-skype"></i></a></li>';
											}											
										}
									?>					
								</ul>	
							</div><!--end one-half-->
						</div><!--end centered-wrapper-->				
					</div><!--end bottomfooter-->				
				
				<?php
				}	 
			} else {
		?>	
	
	
		<div class="centered-wrapper">
		<?php
			if ( is_active_sidebar( 'top-footer' ) ) : ?>		
			<div id="topfooter">
				<?php dynamic_sidebar( 'top-footer' ); ?>
			</div><!--end topfooter-->
		<?php endif; ?>	
	
		</div><!--end centered-wrapper-->
		
		<div id="bottomfooter">		
			<div class="centered-wrapper">		
				<div class="one-half">
					<?php if($smof_data['copyright_textarea'] !='') { ?>
					<p><?php echo wp_kses_post($smof_data['copyright_textarea']);  ?></p>
					<?php } else { ?>
					<p><?php _e('COPYRIGHT &copy; 2013 - SYMPATHIQUE | ALL RIGHTS RESERVED', 'delicious'); ?></p>
					<?php } ?>
				</div><!--end one-half-->

				<div class="one-half column-last">
					<ul class="social">
						<?php
							$social_links = array('rss','facebook','twitter','flickr','google-plus', 'dribbble' , 'linkedin', 'pinterest', 'youtube', 'github-alt', 'vimeo-square', 'instagram', 'tumblr', 'xing', 'vk', 'foursquare', 'wechat', 'behance', 'soundcloud', 'codepen', 'slideshare');
							if($social_links) {
								foreach($social_links as $social_link) {
									if(!empty($smof_data[$social_link])) { echo '<li><a href="'. esc_url($smof_data[$social_link]) .'" title="'. $social_link .'" class="'.$social_link.'"  target="_blank"><i class="fa fa-'.$social_link.'"></i></a></li>';
									}
								}
								if(!empty($smof_data['skype'])) { echo '<li><a href="skype:'. $smof_data['skype'] .'?chat" title="'. $smof_data['skype'] .'" class="skype" target="_blank"><i class="fa fa-skype"></i></a></li>';
								}								
							}
						?>					
					</ul>	
					
					<?php if (function_exists('delicious_language_selector')) { ?>
					<div class="flags_language_selector"><?php delicious_language_selector(); ?></div>
					<?php } ?>					
					
				</div><!--end one-half-->
			</div><!--end centered-wrapper-->				
		</div><!--end bottomfooter-->
		
		<?php
		}
		?>
	</footer><!--end footer-->	
</div>

	<?php wp_footer(); ?>
</body> 
</html>