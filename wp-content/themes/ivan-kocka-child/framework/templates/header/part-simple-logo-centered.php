<?php
/**
 *
 * Template Part called at class Ivan_Layout_Header_Simple_Below_Menu
 *
 * @package   IvanFramework
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Your Name or Company Name
 * @version 1.0
 * @since 1.0
 */
?>

<?php
	
	// Variable used to display additional classes in the layout.
	$_classes = '';

	// Check if Fixed Header option is enabled and output the respective class.
	$_classes .= ivan_get_option_display( 'header-fixed-switch', ' header-fixed', '' );

	// Check if Lateral Lines in modules is enabled and output the respective class.
	$_classes .= ivan_get_option_display( 'header-lateral-lines-switch', ' lateral-lines', '' );

	// Check if Negative Height is enabled and output the respective class.
	$_classes .= ivan_get_option_display( 'header-negative-height', ' negative-height', '' );

	// If header has negative height
	if( true == ivan_get_option( 'header-negative-height' ) ) :

		// Display After Fold
		$_classes .= ivan_get_option_display( 'header-after-fold', ' show-after-fold display-after-fold', '' );

		// Used to keep showing the logo even before the page fold
		$_classes .= ivan_get_option_display( 'header-after-fold-logo', ' keep-logo-before-fold', '' );

		// Apply background type to header
		$_classes .= ' ' . ivan_get_option( 'header-bg-type' );

		// Apply color scheme to header
		$_classes .= ' ' . ivan_get_option( 'header-color-scheme' );

		// Apply boxed layout to header
		$_classes .= ivan_get_option_display( 'header-boxed-layout', ' simple-boxed-menu', '' );

	endif;

	// Locally Disabled Modules
	$disabled_items = ivan_get_post_option( 'header-local-disabled-modules' );
	if( $disabled_items == null )
		$disabled_items = array();

	$enabled_items = ivan_get_post_option( 'header-local-enabled-modules' );
	if( $enabled_items == null )
		$enabled_items = array();

?>

<div class="<?php echo apply_filters( 'iv_header_classes', 'iv-layout header simple-logo-centered apply-height'. $_classes ); ?>">
	<div class="container">
		<div class="row">

			<div class="<?php ivan_header_dimensions('modules', 3); ?> hidden-xs hidden-sm calc-height-area">
				<?php 
				$menu_args = array(
					'theme_location' => 'primary',
					'container' => 'div',
					'container_class' => 'hidden-xs hidden-sm iv-module-menu menu-wrapper ivan-keep-container-height pull-left',
					'menu_class' => ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' menu' . ' ',
					'menu_holder' => 'centered'
					);

				Ivan_Module_Menu::display( $menu_args ); 
				?>
			</div>

			<div class="<?php ivan_header_dimensions('logo', 3); ?> header-center-area">
				<?php Ivan_Module_Logo::display(); ?>
			</div>
            
			<div class="<?php ivan_header_dimensions('modules', 3); ?> header-right-area">
            <div class="<?php ivan_header_dimensions('modules', 3); ?> hidden-xs hidden-sm calc-height-area">
			
                <?php 
				$menu_args = array(
					'theme_location' => 'primary_module',
					'container' => 'div',
					'container_class' => 'hidden-xs hidden-sm iv-module-menu menu-wrapper ivan-keep-container-height pull-left',
					'menu_class' => ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' menu pull-left' . ' ',
					'menu_holder' => 'centered'
					);

				Ivan_Module_Menu::display( $menu_args ); 
				?>
			</div>
				<?php
					if( ivan_get_option( 'header-woo-cart-switch' ) || in_array('woo_cart', $enabled_items) == true ) :
						if( in_array('woo_cart', $disabled_items) == false )
							Ivan_Module_Woo_Cart::display();
					endif;
				?>

				<?php
					if( ivan_get_option( 'header-login-ajax-switch' ) || in_array('login_ajax', $enabled_items) == true ) :
						if( in_array('login_ajax', $disabled_items) == false )	
							Ivan_Module_Login_Ajax::display();
					endif;
				?>

				<?php
				if( ivan_get_option( 'header-search-switch' ) || in_array('live_search', $enabled_items) == true ) :
					if( in_array('live_search', $disabled_items) == false )	
						Ivan_Module_Live_Search::display();
				endif; ?>

				<?php
				if( ivan_get_option( 'header-social-switch' ) || in_array('social_icons', $enabled_items) == true ) :
					if( in_array('social_icons', $disabled_items) == false )
						Ivan_Module_Social_Icons::display( 'header-social-icons', 'hidden-xs hidden-sm' ); // @todo: replace 'option_id' by the correct option ID
				endif;
				?>

				<?php
				if( ivan_get_option( 'header-text-switch' ) || in_array('text_module', $enabled_items) == true ) :
					if( in_array('text_module', $disabled_items) == false )	
						Ivan_Module_Custom_Text::display( 'header-text-content', 'hidden-xs hidden-sm' );
				endif;
				?>

				<?php
					// Check the responsive menu type to be used...
					if( true != ivan_get_option('header-select-menu-switch') ) :
						Ivan_Module_Responsive_Menu::display('.header', 'header-menu-wrap');
					else:
						// Display responsive menu in a select
						Ivan_Module_Responsive_Menu_Select::display('.header .menu');
					endif;
				?>

				<?php global $woocommerce; ?>
            <div id="cart-price-widget" class="iv-module  cart hidden-xs">
                <div class="centered">
                    <span>Cart : <?php echo $woocommerce->cart->get_cart_total(); ?></span>
                </div>
            </div>
            
             
			</div>

		</div>					
	</div>
</div>