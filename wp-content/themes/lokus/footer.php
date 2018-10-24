			<?php 
			global $avia_config;
						
			//reset wordpress query in case we modified it
			wp_reset_query();
			
			
			//checks which colors the footer and socket have and if they are the same to the body a border for separation is added
			$extraClass 	= "";
			$seperator		= "";
			$body_bg		= avia_get_option('boxed') == 'boxed' ? avia_get_option('bg_color_boxed') : avia_get_option('bg_color');
			$footer 		= avia_get_option('footer_bg'); 
			$socket 		= avia_get_option('socket_bg');
			
			if($body_bg == $footer || $footer == "") { $extraClass .= 'footer_border '; $seperator = '<span class="primary-background seperator-addon seperator-top"></span>';}
			if($socket == $footer  || $socket == "") $extraClass .= 'socket_border ';


			
			 /**
			 *  The footer default dummy widgets are defined in folder includes/register-widget-area.php
			 *  If you add a widget to the appropriate widget area in your wordpress backend the 
			 *  dummy widget will be removed and replaced by the real one previously defined
			 */
			?>

		
		<!-- ####### SOCKET CONTAINER ####### -->
			<div class='container_wrap <?php echo $extraClass; ?>' id='socket'>
				<div class='container'>
				  <a href="<?php echo home_url('/contact-us/'); ?>" rel="get-in-touch" class="contactForm">
					<h1>Get in touch with us</h1>
					<?php if ( wpmd_is_notphone() ) { ?><p>Send us a message and we will get back to you as soon as possible.</p><?php } ?>
				  </a>
				<div class="social">
					<?php if ( wpmd_is_notphone() ) { ?><h1>Follow Us On</h1><?php } ?>
						<ul>
							<li><a href="http://www.facebook.com/pages/Lokusdesign/189879267731282" class="ir fb" target="_blank">Facebook</a></li>
							<li><a href="http://www.linkedin.com/company/lokusdesign" class="ir pn" target="_blank">Linkedin </a></li>
							
						</ul>
				</div>
				<div class="interact">
					<span class='copyright'>&copy; <?php _e('Copyright','avia_framework'); ?> - <a href='<?php echo home_url('/'); ?>'><?php echo get_bloginfo('name');?>.</a> All Rights Reserved.</span>
				</div>				
				</div>
			</div>
			<!-- ####### END SOCKET CONTAINER ####### -->
		
		</div><!-- end wrap_all -->
		
		
		
		<?php
			$bg_image 		= avia_get_option('bg_image') == "custom" ? avia_get_option('bg_image_custom') : avia_get_option('bg_image');
		
			if($bg_image && avia_get_option('bg_image_repeat') == 'fullscreen') 
			{ ?>
				<!--[if lte IE 8]>
				<style type="text/css">
				.bg_container {
				-ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg_image; ?>', sizingMethod='scale')";
				filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg_image; ?>', sizingMethod='scale');
				}
				</style>
				<![endif]-->
			<?php
				echo "<div class='bg_container' style='background-image:url(".$bg_image.");'></div>"; 
			}
		?>
		
<script type="text/javascript">
jQuery(function(){
	
	jQuery('#showcase ul').cycle({
		speed: 600,
		timeout: 12000
	});
	
	jQuery("#posts ul").cycle({
		speed: 600,
		timeout: 12000,
		next: "#posts nav .next",
		prev: "#posts nav .prev",
		fx: "scrollHorz"
	});
	
})
</script>
<?php if ( wpmd_is_notdevice() ) { ?>
<script>
jQuery(document).ready(function($){

	// hide #back-top first
	jQuery("#back-top").hide();
	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<?php
}
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 
	avia_option('analytics', false, true, true);
	wp_footer();
	
	
?>
</body>
</html>
