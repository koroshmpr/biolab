<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta text-white d-flex gap-1 border-bottom border-2 flex-wrap border-white mb-3 pb-3 me-lg-4 border-opacity-75 align-items-center">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

    <?php wc_get_template_part('loop/rating');?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in text-white text-opacity-50 border-start border-2 border-white ps-2">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>


    <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

        <span class="sku_wrapper text-white text-opacity-50 border-start border-2 border-white ps-2">شناسه: <span class="sku text-white"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

    <?php endif; ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
