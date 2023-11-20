<?php
/**
 * "Order received" message.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order|false $order
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="border-bottom border-info border-opacity-50 d-flex justify-content-center mb-lg-4 mb-2 text-center text-white fs-4">
<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received border-bottom border-success mb-0 pb-3 border-2 fw-bold fs-4">
	<?php
	/**
	 * Filter the message shown after a checkout is complete.
	 *
	 * @since 2.2.0
	 *
	 * @param string         $message The message.
	 * @param WC_Order|false $order   The order created during checkout, or false if order data is not available.
	 */
	$message = apply_filters(
		'woocommerce_thankyou_order_received_text',
		__( 'Thank you. Your order has been received.', 'woocommerce' ),
		$order
	);

	echo esc_html( $message );
	?>
</p>
</div>