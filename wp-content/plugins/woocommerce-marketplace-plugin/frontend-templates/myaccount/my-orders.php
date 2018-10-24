<?php
/**
 * My Orders
 *
 * Shows recent orders on the account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() )
) ) );

if ( $customer_orders ) : ?>


<?php
/*echo '<pre>';
print_r($customer_orders);
echo '</pre>'; */
?>


	<h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Recent Orders', 'woocommerce' ) ); ?></h2>

	<table class="shop_table my_account_orders">

		<thead>
			<tr>
				<th class="order-number"><span class="nobr"><?php _e( 'Order', 'woocommerce' ); ?></span></th>
				<th class="order-date"><span class="nobr"><?php _e( 'Date', 'woocommerce' ); ?></span></th>
				<th class="order-status"><span class="nobr"><?php _e( 'Status', 'woocommerce' ); ?></span></th>
				<th class="order-total"><span class="nobr"><?php _e( 'Total', 'woocommerce' ); ?></span></th>
				<th class="order-actions">&nbsp;</th>
			</tr>
		</thead>

		<tbody><?php
			foreach ( $customer_orders as $customer_order ) {

				if($customer_order->post_parent == 0){


				$order      = wc_get_order();
				$order->populate( $customer_order );
				$item_count = $order->get_item_count();

				
				$sub_orders = wmp_get_suborders($customer_order->ID);


				?>




						

<?php
if(count($sub_orders)>0){ ?>

							

										<?php
								foreach($sub_orders as $sub_order){


									$suborder      = wc_get_order();
				$suborder->populate( $sub_order );
				$sub_item_count = $suborder->get_item_count();

						?>

										<tr>


<td class="order-number">

						<a href="<?php echo $order->get_view_order_url(); ?>">
							<?php echo $suborder->get_order_number(); ?>
						</a>

						<br />Part of combined order
						<a href="<?php echo $order->get_view_order_url(); ?>">
							<?php echo $order->get_order_number(); ?>
						</a>

					</td>

<td class="order-date">
<time datetime="<?php echo date( 'Y-m-d', strtotime( $suborder->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $suborder->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $suborder->order_date ) ); ?></time>
</td>
<td class="order-status">
<?php echo wc_get_order_status_name( $suborder->get_status() ); ?>
</td>
<td class="order-total">
<?php echo sprintf( _n( '%s for %s item', '%s for %s items', $sub_item_count, 'woocommerce' ), $suborder->get_formatted_order_total(), $sub_item_count ); ?>
</td>

<td class="order-actions">
<?php
							$actions = array();


							
						


							if ( in_array( $suborder->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_payment', array( 'pending', 'failed' ), $suborder ) ) ) {
								$actions['pay'] = array(
									'url'  => $suborder->get_checkout_payment_url(),
									'name' => __( 'Pay', 'woocommerce' )
								);
							}

							if ( in_array( $suborder->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $suborder ) ) ) {
								$actions['cancel'] = array(
									'url'  => $suborder->get_cancel_order_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ),
									'name' => __( 'Cancel', 'woocommerce' )
								);
							}

							$actions['view'] = array(
								'url'  => $suborder->get_view_order_url(),
								'name' => __( 'View', 'woocommerce' )
							);

							$actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $suborder );

							if ($actions) {
								foreach ( $actions as $key => $action ) {
									echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
								}
							}


							


						?>



</tr>

<?php } ?>

									



						

					
						<?php
						

						 }else{ ?>



				<tr class="order">


					

					<td class="order-number">

						<a href="<?php echo $order->get_view_order_url(); ?>">
							<?php echo $order->get_order_number(); ?>
						</a>

						
					</td>


					<td class="order-date">
						<time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $order->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></time>
					</td>
					<td class="order-status" style="text-align:left; white-space:nowrap;">
						<?php echo wc_get_order_status_name( $order->get_status() ); ?>
					</td>
					<td class="order-total">
						<?php echo sprintf( _n( '%s for %s item', '%s for %s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?>
					</td>
					<td class="order-actions">
						<?php
							$actions = array();


							
						


							if ( in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_payment', array( 'pending', 'failed' ), $order ) ) ) {
								$actions['pay'] = array(
									'url'  => $order->get_checkout_payment_url(),
									'name' => __( 'Pay', 'woocommerce' )
								);
							}

							if ( in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) ) {
								$actions['cancel'] = array(
									'url'  => $order->get_cancel_order_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ),
									'name' => __( 'Cancel', 'woocommerce' )
								);
							}

							$actions['view'] = array(
								'url'  => $order->get_view_order_url(),
								'name' => __( 'View', 'woocommerce' )
							);

							$actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order );

							if ($actions) {
								foreach ( $actions as $key => $action ) {
									echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
								}
							}


							


						?>
					</td>
				</tr>


				<?php } ?>
				<?php
			}

		}
		?></tbody>

	</table>

<?php endif; ?>
