<?php if( !defined('ABSPATH') ) exit;?>
	<div id="footer" class="customFooter">
		<div class="container">
			<h2>MORE ABOUT <span>US</span></h2>

			<div class="row blocks">
				<div class="col-md-4">
					<div class="colourBlock shake">
						<div class="icon"></div>
						<h3><a href="#">THINK TANK</a></h3>
					</div>
				</div>
				<div class="col-md-4">
					<div class="colourBlock blue shake">
						<div class="icon"></div>
						<h3><a href="#">MUSIC VIDEOS</a></h3>
					</div>
				</div>
				<div class="col-md-4">
					<div class="colourBlock red shake">
						<div class="icon"></div>
						<h3><a href="#">APPS BASED ON SCIENCE</a></h3>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="colourBlock yellow">
						<h3>FOLLOW D'ART OF SCIENCE</h3>
						<?php dynamic_sidebar('mars-footer-sidebar');?>
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<?php dynamic_sidebar('mars-footer-sidebar');?>
			</div> -->
			<div class="copyright">
				<?php do_action('mars_copyright');?>
            </div>
		</div>
	</div><!-- /#footer -->

	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery( ".facebook_tabs li:nth-child(1)" ).removeClass( "active" );
			jQuery( "#facebooklike" ).removeClass( "active" );
			jQuery( ".facebook_tabs li:nth-child(2)" ).addClass( "active" );
			jQuery( "#facebookstream" ).addClass( "active" );
		});
	</script>
    <?php wp_footer();?> 
</body>
</html>