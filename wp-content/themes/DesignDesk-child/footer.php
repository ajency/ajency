<?php
/**
 * @package WordPress
 * @subpackage Highend
 */
?>
<?php if ( vp_metabox('misc_settings.hb_onepage') && !vp_metabox('misc_settings.hb_disable_navigation')) { ?>
	<ul id="hb-one-page-bullets"></ul>
<?php } ?>

<?php if ( hb_options('hb_to_top_button') && !is_page_template('page-blank.php') ) { ?>
<!-- Back to Top Button -->
<a id="to-top"><i class="<?php echo hb_options('hb_back_to_top_icon'); ?>"></i></a>
<!-- END #to-top -->
<?php } ?>

<?php if ( !is_page_template('page-blank.php') && hb_options('hb_enable_quick_contact_box') ) { ?>
<!-- BEGIN #contact-panel -->
<aside id="contact-panel">
	<h4 class="hb-focus-color"><?php echo hb_options('hb_quick_contact_box_title'); ?></h4>
	<p><?php echo hb_options('hb_quick_contact_box_text'); ?></p>

	<!-- <form id="contact-panel-form">
		<p><input type="text" placeholder="<?php _e('Name', 'hbthemes'); ?>" name="hb_contact_name" id="hb_contact_name_id" class="required requiredField" tabindex="33"/></p>
		<p><input type="email" placeholder="<?php _e('Email', 'hbthemes'); ?>" name="hb_contact_email" id="hb_contact_email_id" class="required requiredField" tabindex="34"/></p>
		<p><input type="text" placeholder="<?php _e('Subject', 'hbthemes'); ?>" name="hb_contact_subject" id="hb_contact_subject_id"/></p>
		<p><textarea placeholder="<?php _e('Your message...', 'hbthemes'); ?>" name="hb_contact_message" id="hb_contact_message_id" class="required requiredField" tabindex="35"></textarea></p>
		<a href="#" id="hb-submit-contact-panel-form" class="hb-button no-three-d hb-push-button hb-asbestos hb-small-button">
			<span class="hb-push-button-icon">
				<i class="hb-moon-paper-plane"></i>
			</span>
			<span class="hb-push-button-text"><?php echo hb_options('hb_quick_contact_box_button_title'); ?></span>
		</a>
		<input type="hidden" id="success_text" value="<?php _e('Message Sent!', 'hbthemes'); ?>"/>
	</form> -->
	<?php echo do_shortcode('[formidable id=14]') ?>

</aside>
<!-- END #contact-panel -->

<!-- BEGIN #hb-contact-button -->
<a id="contact-button"><i class="hb-moon-envelop"></i></a>
<!-- END #hb-contact-button -->
<?php } ?>

<?php
	// Google Analytics from Theme Options
	// $google_analytics_code = hb_options('hb_analytics_code');
	// if ($google_analytics_code){
	// 	echo $google_analytics_code;
	// }

	// Custom Script from Theme Options
	$custom_script_code = hb_options('hb_custom_script');
	if ($custom_script_code){
		echo '<script type="text/javascript">' . $custom_script_code . '</script>';
	}

	if(get_the_ID()==827) {	
		echo '<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 1066540854;
		var google_conversion_language = "en";
		var google_conversion_format = "3";
		var google_conversion_color = "ffffff";
		var google_conversion_label = "_RwLCPHpq2cQtr7I_AM";
		var google_remarketing_only = false;
		/* ]]> */
		//var autoptimize_ajax_object = {"ajaxurl":"httyp:\/\/localhost\/designdesk\/wp-admin\/admin-ajax.php","error_msg":"Your Autoptimize cache might not have been purged successfully, please check on the <a href=http:\/\/localhost\/designdesk\/wp-admin\/options-general.php?page=autoptimize  style=\"white-space:nowrap;\">Autoptimize settings page<\/a>.","dismiss_msg":"Dismiss this notice.","nonce":"832d22bc9b"};
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
			<div style="display:inline;">
				<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1066540854/?label=_RwLCPHpq2cQtr7I_AM&amp;guid=ON&amp;script=0"/>
			</div>
		</noscript>';
	}
?>

<?php
if ( basename(get_page_template()) != 'page-presentation-fullwidth.php' ){
 if ( !is_page_template('page-blank.php') && (hb_options('hb_enable_pre_footer_area') && vp_metabox('layout_settings.hb_pre_footer_callout') == "default" || hb_options('hb_enable_pre_footer_area') && vp_metabox('layout_settings.hb_pre_footer_callout') == "" || vp_metabox('layout_settings.hb_pre_footer_callout') == "show" ) ) { ?>
<?php
	$button_icon="";
	$button_target="";
	if ( hb_options('hb_pre_footer_button_icon') ) {
		$button_icon = '<i class="' . hb_options("hb_pre_footer_button_icon") . '"></i>';
	}

	if (hb_options('hb_pre_footer_button_target') == '_blank'){
		$button_target = ' target="_blank"';
	}
?>
<!-- BEGIN #pre-footer-area -->
<div id="pre-footer-area2">
	<div class="container">
		<span class="pre-footer-text"><?php echo hb_options('hb_pre_footer_text'); ?></span>
		<?php if (hb_options('hb_pre_footer_button_text')) { ?><a href="<?php echo hb_options('hb_pre_footer_button_link'); ?>"<?php echo $button_target; ?> class="hb-button hb-large-button"><?php echo $button_icon; echo hb_options('hb_pre_footer_button_text'); ?></a><?php } ?>
	</div>
</div>
<!-- END #pre-footer-area -->
<?php } } ?>

<div id="pre-footer-area">
	<div class="container">
		<div class="row">
			<div class="col-5" style="display: none;">
					<!-- BEGIN: Signup Form Manual Code from Benchmark Email Ver 2.0 ------>

						<style type="text/css">
							/*.bmform_outer563202 {
								width: 100%;
							}
							.bmform_inner563202 {
								border: 1px solid #797a7b;
							}
							.bmform_head563202 {
								background-color: #d0d6d9;
								height: 37px;
							}
							.bm_headetext563202 {
								color: #000000;
								font-family: Arial, Helvetica, sans-serif;
								font-size: 18px;
								padding: 6px 10px 0 10px;
								font-weight: bold;
							}
							.bmform_body563202 {
								background-color: #f0f2f3;
								color: #000000;
								font-family: Arial, Helvetica, sans-serif;
								font-size: 12px;
								padding: 12px;
							}
							.bmform_introtxt563202 {
								font-family: Arial, Helvetica, sans-serif;
								font-size: 12px;
								padding-bottom: 12px;
							}
							.bmform_frmtext563202 {
								padding: 5px 0px 3px 0px;
								display: block;
								float: none;
								text-align: left;
								text-decoration: none;
								width: auto;
								font-weight: bold;
							}
							.bmform_frm563202 {
								color: #000000;
								display: block;
								float: none;
								font-family: Verdana, sans-serif;
								font-size: 14px;
								font-style: normal;
								font-weight: normal;
								text-align: left;
								text-decoration: none;
								width: 190px;
								padding: 3px;
							}
							.bmform_button563202 {
								text-align: center;
								padding-top: 15px;
							}
							.bmform_submit563202 {
								padding: 3px 12px 3px 12px;
							}
							.bmform_footer563202 {}.footer_bdy563202 {}.footer_txt563202 {}#tdLogo563202 img {
								margin-bottom: 10px;
								max-width: 230px;
							}*/
						</style>
						<script type="text/javascript">
							function CheckField563202(fldName, frm){ if ( frm[fldName].length ) { for ( var i = 0, l = frm[fldName].length; i < l; i++ ) {  if ( frm[fldName].type =='select-one' ) { if( frm[fldName][i].selected && i==0 && frm[fldName][i].value == '' ) { return false; }  if ( frm[fldName][i].selected ) { return true; } }  else { if ( frm[fldName][i].checked ) { return true; } }; } return false; } else { if ( frm[fldName].type == "checkbox" ) { return ( frm[fldName].checked ); } else if ( frm[fldName].type == "radio" ) { return ( frm[fldName].checked ); } else { frm[fldName].focus(); return (frm[fldName].value.length > 0); }} }
							function rmspaces(x) {var leftx = 0;var rightx = x.length -1;while ( x.charAt(leftx) == ' ') { leftx++; }while ( x.charAt(rightx) == ' ') { --rightx; }var q = x.substr(leftx,rightx-leftx + 1);if ( (leftx == x.length) && (rightx == -1) ) { q =''; } return(q); }
							function checkfield(data) {if (rmspaces(data) == ""){return false;}else {return true;}}
							function isemail(data) {var flag = false;if (  data.indexOf("@",0)  == -1 || data.indexOf("\\",0)  != -1 ||data.indexOf("/",0)  != -1 ||!checkfield(data) ||  data.indexOf(".",0)  == -1  ||  data.indexOf("@")  == 0 ||data.lastIndexOf(".") < data.lastIndexOf("@") ||data.lastIndexOf(".") == (data.length - 1)   ||data.lastIndexOf("@") !=   data.indexOf("@") ||data.indexOf(",",0)  != -1 ||data.indexOf(":",0)  != -1 ||data.indexOf(";",0)  != -1  ) {return flag;} else {var temp = rmspaces(data);if (temp.indexOf(' ',0) != -1) { flag = true; }var d3 = temp.lastIndexOf('.') + 4;var d4 = temp.substring(0,d3);var e2 = temp.length  -  temp.lastIndexOf('.')  - 1;var i1 = temp.indexOf('@');if (  (temp.charAt(i1+1) == '.') || ( e2 < 1 ) ) { flag = true; }return !flag;}}
							function CheckFieldD563202(fldH, chkDD, chkMM, chkYY, reqd, frm){ var retVal = true; var dt = validDate563202(chkDD, chkMM, chkYY, frm); var nDate = frm[chkMM].value  + " " + frm[chkDD].value + " " + frm[chkYY].value; if ( dt == null && reqd == 1 ) {	nDate = ""; retVal = false;	} else if ( (frm[chkDD].value != "" || frm[chkMM].value != "" || frm[chkYY].value != "") && dt == null) { retVal = false; nDate = "";} if ( retVal ) {frm[fldH].value = nDate;} return retVal; }
							function validDate563202(chkDD, chkMM, chkYY, frm) {var objDate = null;	if ( frm[chkDD].value != "" && frm[chkMM].value != "" && frm[chkYY].value != "" ) {var mSeconds = (new Date(frm[chkYY].value - 0, frm[chkMM].selectedIndex - 1, frm[chkDD].value - 0)).getTime();var objDate = new Date();objDate.setTime(mSeconds);if (objDate.getFullYear() != frm[chkYY].value - 0 || objDate.getMonth()  != frm[chkMM].selectedIndex - 1  || objDate.getDate() != frm[chkDD].value - 0){objDate = null;}}return objDate;}
							function _checkSubmit563202(frm){
								if ( !isemail(frm["fldEmail"].value) ) {
									alert("Please enter the Email");
									return false;
								}
								return true; }
						</script>
						<div align="center hidden">
							<form style="display:inline;" action="https://lb.benchmarkemail.com//code/lbform" method=post name="frmLB563202" accept-charset="UTF-8" onsubmit="return _checkSubmit563202(this);" >
								<input type=hidden name=successurl value="http://www.benchmarkemail.com/Code/ThankYouOptin" />
								<input type=hidden name=errorurl value="http://lb.benchmarkemail.com//Code/Error" />
								<input type=hidden name=token value="mFcQnoBFKMQ5AkrPywhUBuZXUawFafLC8HcPNpjW%2Bac1SgsGRzPBIg%3D%3D" />
								<input type="hidden" name="doubleoptin" value="" />
								<div class="bmform_outer563202" id="tblFormData563202">
									<div class="bmform_inner563202">
										<div class="bmform_head563202" id="tdHeader563202">
											<div class="bmform_body563202">
												<div class="subscribe" id="tblFieldData563202" style='text-align:left;'>
													<input type="text" placeholder="Subscribe to our Newsletter" class="bmform_frm563202 subscribe_input" name="fldEmail" maxlength="100" />
													<button class="subscribe_submit" type="submit" id="btnSubmit">
														<i class="fa fa-arrow-right"></i>
													</button>
												</div>

											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
			</div>
			<div class="col-12">
				<div class="right_mem">
					<span class="membersof pullrig ht">Members of</span>
					<!--<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/members_of_IFES_and_EDPA.png" alt="" class="member1 pullright">-->
					<a href="http://www.ifesnet.com" title="Member of the International Federation of Exhibition and Event services" class="member1 pullr ight" target="_blank"><img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/IFES-logo.png" alt="Member of the International Federation of Exhibition and Event services"></a> &nbsp; <a href="http://www.edpa.com" title="Member of The Exhibit Designers and Producers Association" class="member1 pullr ight" target="_blank"><img alt="Member of The Exhibit Designers and Producers Association" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/EDPA-logo.png"></a> &nbsp; <a title="Member of the Indian Exhibition Industry Association" href="http://www.ieia.in/" class="member1 pullr ight" target="_blank"><img alt="Member of the Indian Exhibition Industry Association" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/img/ieia_footer_logo.png"></a>
					<!-- <img src="" alt="" class="member2 pullright"> -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if ( basename(get_page_template()) != 'page-presentation-fullwidth.php' ){
if (
	( ( hb_options('hb_enable_footer_widgets') && (vp_metabox('layout_settings.hb_footer_widgets') == "default" || vp_metabox('layout_settings.hb_footer_widgets') == "" )) || vp_metabox('layout_settings.hb_footer_widgets') == "show" ) &&
	!is_page_template('page-blank.php')
) { ?>

<?php
	$footer_bg_image = "";
	$footer_bg = "";
if ( hb_options('hb_enable_footer_background' ) ) {
	$footer_bg_image = " background-image";
}

if ( hb_options("hb_footer_bg_image") ){
	$footer_bg_image = " footer-bg-image";
	$footer_bg = ' style="background-image: url('. hb_options("hb_footer_bg_image") .')"';
}

?>

<!-- BEGIN #footer OPTION light-style -->
<footer id="footer" class="dark-style<?php echo $footer_bg_image; ?>" <?php echo $footer_bg; ?>>

	<!-- BEGIN .container -->
	<div class="container">
		<div class="row footer-row">

	<?php
	$hb_footer_class = array(
		'style-1'=>array('1'=>'col-3', '2'=>'col-3', '3'=>'col-3', '4'=>'col-3'),
		'style-2'=>array('1'=>'col-3', '2'=>'col-3', '3'=>'col-6', '4'=>'hidden'),
		'style-3'=>array('1'=>'col-6', '2'=>'col-3', '3'=>'col-3', '4'=>'hidden'),
		'style-4'=>array('1'=>'col-3', '2'=>'col-6', '3'=>'col-3', '4'=>'hidden'),
		'style-5'=>array('1'=>'col-4', '2'=>'col-4', '3'=>'col-4', '4'=>'hidden'),
		'style-6'=>array('1'=>'col-8', '2'=>'col-4', '3'=>'hidden', '4'=>'hidden'),
		'style-7'=>array('1'=>'col-4', '2'=>'col-8', '3'=>'hidden', '4'=>'hidden'),
		'style-8'=>array('1'=>'col-6', '2'=>'col-6', '3'=>'hidden', '4'=>'hidden'),
		'style-9'=>array('1'=>'col-3', '2'=>'col-9', '3'=>'hidden', '4'=>'hidden'),
		'style-10'=>array('1'=>'col-9', '2'=>'col-3', '3'=>'hidden', '4'=>'hidden'),
		'style-11'=>array('1'=>'col-12', '2'=>'hidden', '3'=>'hidden', '4'=>'hidden'),
	);

	$hb_footer_style = hb_options('hb_footer_layout');
	if ( !$hb_footer_style ) {
		$hb_footer_style = 'style-1';
	}

	$separator_class = "";
	if (!hb_options('hb_enable_footer_separators')){
		$separator_class = " no-separator";
	}

	for( $i = 1 ; $i <= 4 ; $i++ ){
		echo '<div class="' . $hb_footer_class[$hb_footer_style][$i] . ' widget-column' . $separator_class . '">';
		dynamic_sidebar('Footer ' . $i);
		echo '</div>';
	}

	?>
		</div>
	</div>
	<!-- END .container -->

</footer>
<!-- END #footer -->
<?php } } ?>

<?php
if ( basename(get_page_template()) != 'page-presentation-fullwidth.php' ){
if ( hb_options('hb_enable_footer_copyright') && !is_page_template('page-blank.php') ) { ?>
<!-- BEGIN #copyright-wrapper -->
<div id="copyright-wrapper" class="<?php echo hb_options('hb_copyright_style'); ?> <?php echo hb_options('hb_copyright_color_scheme'); if ( hb_options("hb_footer_bg_image") ){ echo 'footer-bg-image'; } ?> clearfix"> <!-- Simple copyright opcija light style opcija-->

	<!-- BEGIN .container -->
	<div class="container">

		<!-- BEGIN #copyright-text -->
		<div id="copyright-text">
			<p><?php echo do_shortcode(hb_options('hb_copyright_line_text')); ?>

			<?php
				if (hb_options('hb_enable_backlink')){
					echo ' <a href="http://www.mojomarketplace.com/store/hb-themes?r=hb-themes&utm_source=hb-themes&utm_medium=textlink&utm_campaign=themesinthewild">Theme by HB-Themes.</a>';
				}
			?>

			</p>
		</div>
		<!-- END #copyright-text -->

		<?php
		if ( has_nav_menu ('footer-menu') ) {
			wp_nav_menu( array ( 'theme_location' => 'footer-menu' , 'container_id' => 'footer-menu', 'container_class'=> 'clearfix', 'menu_id'=>'footer-nav', 'menu_class' => '', 'walker' =>  new hb_custom_walker) );
		}
		?>

	</div>
	<!-- END .container -->

</div>
<!-- END #copyright-wrapper -->
<?php } } ?>

<?php if ( ( is_singular('post') && hb_options('hb_blog_enable_next_prev') ) || (is_singular('portfolio') && hb_options('hb_portfolio_enable_next_prev') ) || ( is_singular('team') && hb_options('hb_staff_enable_next_prev') ) ) { ?>
	<nav class="hb-single-next-prev">
	<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>

	<?php if ( !empty($prev_post) ) { ?>
	<a href="<?php echo get_permalink($prev_post->ID); ?>" title="<?php echo $prev_post->post_title; ?>" class="hb-prev-post">
		<i class="hb-moon-arrow-left-4"></i>
		<span class="text-inside"><?php _e('Prev','hbthemes'); ?></span>
	</a>
	<?php } ?>

	<?php if ( !empty($next_post) ) { ?>
	<a href="<?php echo get_permalink($next_post->ID); ?>" title="<?php echo $next_post->post_title; ?>" class="hb-next-post">
		<i class="hb-moon-arrow-right-5"></i>
		<span class="text-inside"><?php _e('Next','hbthemes'); ?></span>
	</a>
	<?php } ?>

</nav>
<!-- END LINKS -->
<?php } ?>

</div>
<!-- END #main-wrapper -->

</div>
<!-- END #hb-wrap -->

<?php if ( hb_options('hb_side_section') ) { ?>
	<div id="hb-side-section">
		<a href="#" class="hb-close-side-section"><i class="hb-icon-x"></i></a>
		<?php if ( is_active_sidebar( 'hb-side-section-sidebar' ) ) {
			dynamic_sidebar('hb-side-section-sidebar');
		} else {
			echo '<p class="aligncenter" style="margin-top:30px;">';
			_e('Please add widgets to this widgetized area ("Side Panel Section") in Appearance > Widgets.', 'hbthemes');
			echo '</p>';
		} ?>
	</div>
<?php } ?>


<?php if ( hb_options('hb_search_style') == 'hb-modern-search') { ?>
	<!-- BEGIN #fancy-search -->
	<div id="modern-search-overlay">
		<a href="#" class="hb-modern-search-close"><i class="hb-icon-x"></i></a>

		<div class="table-middle hb-modern-search-content">
			<p><?php _e('Type and press Enter to search', 'hbthemes'); ?></p>

			<form method="get" id="hb-modern-form" action="<?php echo home_url( '/' ); ?>" novalidate="" autocomplete="off">
				<input type="text" value="" name="s" id="hb-modern-search-input" autocomplete="off">
			</form>
		</div>

	</div>
<?php } ?>

<!-- BEGIN #hb-modal-overlay -->
<div id="hb-modal-overlay"></div>
<!-- END #hb-modal-overlay -->

<?php wp_footer(); ?>
<script>
  

</script>

<script type="text/javascript"> 
_linkedin_partner_id = "287371";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=287371&fmt=gif" />
</noscript>

</body>
<!-- END body -->

</html>
<!-- END html -->