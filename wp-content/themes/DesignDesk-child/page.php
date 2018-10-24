<?php
/**
 * @package WordPress
 * @subpackage Highend
 * Template Name: Ren - Masonry
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

				<!-- Portfolio masonry -->
				<!-- <div class="home_port_wrap">
					<div class="port port-left port-wide-2 port-1024-4">
						<div class="port port-wide-4 port-high-1">
							<a href="#" class="port-content" style="background-image: url(<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/portfolio/01.jpg);">
								<span class="port-text">
									<span class="port-title">Bottlepack, <span class="port-location">PMEC, Mumbai</span></span>
									<span class="port-arrow"></span>
								</span>
							</a>
						</div>
						<div class="port port-wide-2 port-high-1">
							<a href="#" class="port-content" style="background-image: url(<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/portfolio/02.jpg);">
								<span class="port-text">
									<span class="port-title">Vaultex, <span class="port-location">A + A, Dusseldorf</span></span>
									<span class="port-arrow"></span>
								</span>
							</a>
						</div>
						<div class="port port-wide-2 port-high-1">
							<a href="#" class="port-content" style="background-image: url(<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/portfolio/06.jpg);">
								<span class="port-text">
									<span class="port-title">Emco, <span class="port-location">Elecrama, Bengaluru</span></span>
									<span class="port-arrow"></span>
								</span>
							</a>
						</div>
					</div>
					<div class="port port-center port-wide-1 port-1024-2 center-link">
						<div class="port port-wide-4 port-high-2">
							<a href="#" class="port-content" style="background-image: url(<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/portfolio/rubik_portfolio.png);">
								<span class="port-text">
									<span class="port-title">See more<br>Designs</span>
									<span class="port-arrow"></span>
								</span>
							</a>
						</div>
					</div>
					<div class="port port-right port-wide-1 port-1024-2">
						<div class="port port-wide-4 port-high-1">
							<a href="#" class="port-content" style="background-image: url(<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/portfolio/07.jpg);">
								<span class="port-text">
									<span class="port-title">Siyarams, <span class="port-location">Evteks, Istanbul</span></span>
									<span class="port-arrow"></span>
								</span>
							</a>
						</div>
						<div class="port port-wide-4 port-high-1">
							<a href="#" class="port-content" style="background-image: url(<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/portfolio/05.jpg);">
								<span class="port-text">
									<span class="port-title">Cisco, <span class="port-location">Interop, Mumbai</span></span>
									<span class="port-arrow"></span>
								</span>
							</a>
						</div>
					</div>

					<div class="clearfix"></div>
				</div> -->

				<?php the_content();?>
				<?php wp_link_pages('before=<div id="hb-page-links">'.__('Pages:', 'hbthemes').'&after=</div>'); ?>
				<?php if ( comments_open() && hb_options('hb_disable_page_comments') ) comments_template(); ?>
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