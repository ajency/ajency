<?php
/**
 * Wishlist page template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 1.1.5
 */

global $wpdb, $yith_wcwl, $woocommerce;

if( isset( $_GET['user_id'] ) && !empty( $_GET['user_id'] ) ) {
	$user_id = $_GET['user_id'];
} elseif( is_user_logged_in() ) {
	$user_id = get_current_user_id();
}

$current_page = 1;
$limit_sql = '';

if( $pagination == 'yes' ) {
	$count = array();

	if( is_user_logged_in() || ( isset( $user_id ) && !empty( $user_id ) ) ) {
		$count = $wpdb->get_results( $wpdb->prepare( 'SELECT COUNT(*) as `cnt` FROM `' . YITH_WCWL_TABLE . '` WHERE `user_id` = %d', $user_id  ), ARRAY_A );
		$count = $count[0]['cnt'];
	} elseif( yith_usecookies() ) {
		$count[0]['cnt'] = count( yith_getcookie( 'yith_wcwl_products' ) );
	} else {
		$count[0]['cnt'] = count( $_SESSION['yith_wcwl_products'] );
	}

	$total_pages = $count/$per_page;
	if( $total_pages > 1 ) {
		$current_page = max( 1, get_query_var( 'page' ) );

		$page_links = paginate_links( array(
			'base' => get_pagenum_link( 1 ) . '%_%',
			'format' => '&page=%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'show_all' => true
		) );
	}

	$limit_sql = "LIMIT " . ( $current_page - 1 ) * 1 . ',' . $per_page;
}

if( is_user_logged_in() || ( isset( $user_id ) && !empty( $user_id ) ) )
{ $wishlist = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `" . YITH_WCWL_TABLE . "` WHERE `user_id` = %s" . $limit_sql, $user_id ), ARRAY_A ); }
elseif( yith_usecookies() )
{ $wishlist = yith_getcookie( 'yith_wcwl_products' ); }
else
{ $wishlist = isset( $_SESSION['yith_wcwl_products'] ) ? $_SESSION['yith_wcwl_products'] : array(); }

// Start wishlist page printing
if( function_exists('wc_print_notices') ) {
	wc_print_notices();
}else{
	$woocommerce->show_messages();
}
 ?>
<div id="yith-wcwl-messages"></div>

<form id="yith-wcwl-form" action="<?php echo esc_url( $yith_wcwl->get_wishlist_url() ) ?>" method="post">
	<?php
	do_action( 'yith_wcwl_before_wishlist_title' );

	/*
	Title Removed from this page...
	$wishlist_title = get_option( 'yith_wcwl_wishlist_title' );
	if( !empty( $wishlist_title ) )
	{ echo apply_filters( 'yith_wcwl_wishlist_title', '<h2>' . $wishlist_title . '</h2>' ); }
	*/

	do_action( 'yith_wcwl_before_wishlist' );
	?>
	<table class="shop_table cart wishlist_table" cellspacing="0">
		<thead>
		<tr>
			<th class="product-name" colspan="2"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-thumbnail">&nbsp;</th>
			<?php if( get_option( 'yith_wcwl_price_show' ) == 'yes' ) : ?><th class="product-price"><span class="nobr"><?php _e( 'Price', 'yit' ) ?></span></th><?php endif ?>
			<?php if( get_option( 'yith_wcwl_stock_show' ) == 'yes' ) : ?><th><span class="nobr"><?php _e( 'Stock Status', 'yit' ) ?></span></th><?php endif ?>
			<?php if( get_option( 'yith_wcwl_add_to_cart_show' ) == 'yes' ) : ?><th><span class="nobr"></th><?php endif ?>
		</tr>
		</thead>
		<tbody>
		<?php
		if( count( $wishlist ) > 0 ) :
			foreach( $wishlist as $values ) :
				if( !is_user_logged_in() && !isset( $_GET['user_id'] ) ) {
					if( isset( $values['add-to-wishlist'] ) && is_numeric( $values['add-to-wishlist'] ) ) {
						$values['prod_id'] = $values['add-to-wishlist'];
						$values['ID'] = $values['add-to-wishlist'];
					} else {
						$values['prod_id'] = $values['product_id'];
						$values['ID'] = $values['product_id'];
					}
				}

				$product_obj = get_product( $values['prod_id'] );

				if( $product_obj !== false && $product_obj->exists() ) : ?>
					<tr id="yith-wcwl-row-<?php echo $values['ID'] ?>">
						<?php $remove_wishlist = esc_attr( "remove_item_from_wishlist( '" . esc_url( $yith_wcwl->get_remove_url( $values['ID'] ) ) . "', 'yith-wcwl-row-" . $values['ID'] ."');" ); ?>
						<td class="product-remove"><div><a href="javascript:void(0)" onclick="<?php echo $remove_wishlist ?>" class="remove" title="<?php _e( 'Remove this product', 'yit' ) ?>">&times;</a></td>
						<td class="product-thumbnail">
							<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $values['prod_id'] ) ) ) ?>">
								<?php echo $product_obj->get_image() ?>
							</a>
						</td>
						<td class="product-name">
							<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $values['prod_id'] ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product_obj->get_title(), $product_obj ) ?></a>
						</td>
						<?php if( get_option( 'yith_wcwl_price_show' ) == 'yes' ) : ?>
							<td class="product-price">
								<?php
								if( $product_obj->price != '0' ) {
									$wc_price = function_exists('wc_price') ? 'wc_price' : 'woocommerce_price';

									if( get_option( 'woocommerce_tax_display_cart' ) == 'excl' )
										{ echo apply_filters( 'woocommerce_cart_item_price_html', $wc_price( $product_obj->get_price_excluding_tax() ), $values, '' ); }
									else
										{ echo apply_filters( 'woocommerce_cart_item_price_html', $wc_price( $product_obj->get_price() ), $values, '' ); }
								} else {
									echo apply_filters( 'yith_free_text', __( 'Free!', 'yit' ) );
								}
								?>
							</td>
						<?php endif ?>
						<?php if( get_option( 'yith_wcwl_stock_show' ) == 'yes' ) : ?>
							<td class="product-stock-status">
								<?php
								$availability = $product_obj->get_availability();
								$stock_status = $availability['class'];

								if( $stock_status == 'out-of-stock' ) {
									$stock_status = "Out";
									echo '<span class="wishlist-out-of-stock">' . __( 'Out of Stock', 'yit' ) . '</span>';
								} else {
									$stock_status = "In";
									echo '<span class="wishlist-in-stock">' . __( 'In Stock', 'yit' ) . '</span>';
								}
								?>
							</td>
						<?php endif ?>
						<?php if( get_option( 'yith_wcwl_add_to_cart_show' ) == 'yes' ) : ?>
							<td class="product-add-to-cart">
								<?php if(isset($stock_status) && $stock_status != 'Out'): ?>
									<?php echo YITH_WCWL_UI::add_to_cart_button( $values['prod_id'], isset($availability['class']) ); ?>
								<?php endif ?>
							</td>
						<?php endif ?>
					</tr>
				<?php
				endif;
			endforeach;
		else: ?>
			<tr>
				<td colspan="6" class="wishlist-empty"><?php _e( 'No products were added to the wishlist', 'yit' ) ?></td>
			</tr>
		<?php
		endif;

		if( isset( $page_links ) ) : ?>
			<tr>
				<td colspan="6"><?php echo $page_links ?></td>
			</tr>
		<?php endif ?>
		</tbody>
	</table>
	<?php
		do_action( 'yith_wcwl_after_wishlist' );

	   $share_url  = $yith_wcwl->get_wishlist_url();
	   $share_url .= get_option( 'permalink-structure' ) != '' ? '&amp;user_id=' : '?user_id=';
	   $share_url .= get_current_user_id();

	   $title = __('My Wishlist', 'ivan_domain');
	   ?>
	   <div class="share-icons">
	   	<a href="http://www.facebook.com/sharer.php?u=<?php echo $share_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
	   	<a href="http://twitter.com/home?status=<?php echo $title; ?> - <?php echo $share_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
	   	<a href="https://plus.google.com/share?url=<?php echo $share_url; ?>&title=<?php echo $title; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
	   	<a href="http://linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $title; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
	   	<a href="http://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&description=<?php echo $title; ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
	   	<a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $share_url; ?>"><i class="fa fa-envelope"></i></a>
	   </div>
	<?php 	
	do_action( 'yith_wcwl_after_wishlist_share' );
	?>
</form>