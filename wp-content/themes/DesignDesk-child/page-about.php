<?php
/**
 * @package WordPress
 * @subpackage Highend
 */
/*
Template Name: Page - About us
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
$main_content_style = "";
if ( vp_metabox('background_settings.hb_content_background_color') ){
	$main_content_style = ' style="background-color: ' . vp_metabox('background_settings.hb_content_background_color') . ';"';
	echo "<style type=\"text/css\">#pre-footer-area:after{border-top-color:" . vp_metabox('background_settings.hb_content_background_color') . "}</style>";
}
?>
<!-- BEGIN #main-content -->
<div id="main-content"<?php echo $main_content_style; ?>>

	<div class="container">

		<?php
			$sidebar_layout = vp_metabox('layout_settings.hb_page_layout_sidebar');
			$sidebar_name = vp_metabox('layout_settings.hb_choose_sidebar');

			if ( $sidebar_layout == "default" || $sidebar_layout == "" )
			{
				$sidebar_layout = hb_options('hb_page_layout_sidebar');
				$sidebar_name = hb_options('hb_choose_sidebar');
			}

			if ( vp_metabox('misc_settings.hb_onepage') ){
				$sidebar_layout = 'fullwidth';
			}

			if ( class_exists('bbPress') ) {
			     if ( is_bbpress() ) {
					$sidebar_layout = 'fullwidth';
			     }
			}
		?>

		<div class="row <?php echo $sidebar_layout; ?> main-row">

			<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- BEGIN .hb-main-content -->
				<?php if ( $sidebar_layout != 'fullwidth' ) { ?>
				<div class="col-9 hb-equal-col-height hb-main-content">
				<?php } else { ?>
				<div class="col-12 hb-main-content">
				<?php } ?>

				<?php the_content();?>
				<?php wp_link_pages('before=<div id="hb-page-links">'.__('Pages:', 'hbthemes').'&after=</div>'); ?>
				<?php if ( comments_open() && hb_options('hb_disable_page_comments') ) comments_template(); ?>

					<div class="ab-timeline">
						<section id="cd-timeline" class="cd-container">
							<div class="cd-timeline-block">
								<div class="cd-timeline-img cd-picture">
									<i class="fa fa-lightbulb-o"></i>
								</div> <!-- cd-timeline-img -->

								<div class="cd-timeline-content">
									<h2>2005: The beginnings…</h2>
									<p>JMD DesignDesk Pvt Ltd is formed in Kolkata with an objective to provide 'end to end exhibiting solutions in a professional &amp; organized manner'</p>
									<a href="#0" class="hb-button hb-small-button">Read more</a>
									<span class="cd-date">
										<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/kolkata_designdesk1.jpg">
									</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->

							<div class="cd-timeline-block">
								<div class="cd-timeline-img cd-movie">
									<i class="fa fa-line-chart"></i>
									<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cd-icon-movie.svg" alt="Movie"> -->
								</div> <!-- cd-timeline-img -->

								<div class="cd-timeline-content">
									<h2>2007: Starting to grow…</h2>
									<p>Started serving Exhibitions across India & first overseas project in Germany!</p>
									<a href="#0" class="hb-button hb-small-button">Read more</a>
									<span class="cd-date">
										<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/designdesk_exhibition_design.jpg">
									</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->

							<div class="cd-timeline-block">
								<div class="cd-timeline-img cd-location">
									<i class="fa fa-bolt"></i>
								</div> <!-- cd-timeline-img -->

								<div class="cd-timeline-content">
									<h2>2009: Bold steps…</h2>
									<p>DesignDesk grows its operations & establishes office in Mumbai – the commercial capital & Exhibition hub of India!</p>
									<a href="#0" class="hb-button hb-small-button">Read more</a>
									<span class="cd-date">
										<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/mumbai_designdesk1.jpg">
									</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->

							<div class="cd-timeline-block">
								<div class="cd-timeline-img cd-picture">
									<i class="fa fa-leaf"></i>
								</div> <!-- cd-timeline-img -->

								<div class="cd-timeline-content">
									<h2>2010: A fresh look…</h2>
									<p>A new brand identity is created. Team strength nears 20 professionals!</p>
									<a href="#0" class="hb-button hb-small-button">Read more</a>
									<span class="cd-date">
										<a href="http://www.designdesk.in/wp-content/uploads/2015/06/New-Logo-Concept.pdf" target="_blank"><img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/newlogo.jpg" height="150"></a>
									</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->

							<div class="cd-timeline-block">
								<div class="cd-timeline-img cd-movie">
									<i class="fa fa-map-marker"></i>
								</div> <!-- cd-timeline-img -->

								<div class="cd-timeline-content">
									<h2>2011: Strength to strength…</h2>
									<p>Our largest &amp; most organised production facility is established in Mumbai</p>
									<a href="#0" class="hb-button hb-small-button">Read more</a>
									<span class="cd-date">
										<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/2011.jpg">
									</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->

							<div class="cd-timeline-block">
								<div class="cd-timeline-img cd-location">
									<i class="fa fa-globe"></i>
								</div> <!-- cd-timeline-img -->

								<div class="cd-timeline-content">
									<h2>2014: Going global…</h2>
									<p>DesignDesk participates at Euroshop 2014, Germany as Sponsor &amp; Co exhibitor at the IFES Stand.</p>
									<p>Annual Project count crosses over 100 Stands across India &amp; the World</p>
									<span class="cd-date">
										<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/2014.jpg">
									</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->

							<div class="cd-timeline-block">
								<div class="cd-timeline-img cd-picture">
									<i class="fa fa-star"></i>
								</div> <!-- cd-timeline-img -->

								<div class="cd-timeline-content">
									<h2>2015: Setting new goals…</h2>
									<p>As we complete 10 years, we chalk out an ambitious Strategic Goal &amp; Roadmap for 2018 !</p>
									<a href="#0" class="hb-button hb-small-button">Read more</a>
									<span class="cd-date">
										<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/10years.png">
									</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->
						</section> <!-- cd-timeline -->
					</div>

				</div>
				<!-- END .hb-main-content -->

				<?php if ( $sidebar_layout != 'fullwidth' ) { ?>
				<!-- BEGIN .hb-sidebar -->
				<div class="col-3  hb-equal-col-height hb-sidebar">
					<?php
					if ( $sidebar_name && function_exists('dynamic_sidebar') )
						dynamic_sidebar($sidebar_name);
					?>
				</div>
				<!-- END .hb-sidebar -->
				<?php } ?>

			</div>
			<!-- END #page-ID -->

		</div>
		<!-- END .row -->

	</div>
	<!-- END .container -->

</div>
<!-- END #main-content -->

<?php endwhile; endif;?>
<?php get_footer(); ?>