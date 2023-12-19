<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>
<section class="container myaccount-wrapper">
        <div class="row justify-content-center">
<nav class="woocommerce-MyAccount-navigation w-100 row align-items-start justify-content-center p-lg-4 p-2 bg-white rounded-top-3">
	<ul class="list-group px-5 flex-lg-row d-flex list-group-item list-group-item-action align-items-center border-0 border-bottom border-2 border-success ">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="list-group-item list-group-item-action rounded-3 p-0 <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a class="btn btn-primary  w-100" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
