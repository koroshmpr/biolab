<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$attributes = $product->get_variation_attributes();
$available_variations = $product->get_available_variations();
$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

    <form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
        <?php do_action( 'woocommerce_before_variations_form' ); ?>

        <?php if ( empty( $attributes ) ) : ?>
            <p class="stock out-of-stock text-primary"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
        <?php else : ?>
            <table class="variations mt-2" cellspacing="0" role="presentation">
                <tbody>
                <?php foreach ( $attributes as $attribute_name => $options ) : ?>
                    <tr>
                        <th class="label">
                            <label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">
                                <?php echo wc_attribute_label( $attribute_name ); ?>
                            </label>
                        </th>
                        <td class="value">
                            <select name="<?php echo esc_attr( 'attribute_' . sanitize_title( $attribute_name ) ); ?>" id="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>" class="select" data-attribute_name="attribute_<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">
                                <option value=""><?php echo esc_html__( 'Choose an option', 'woocommerce' ); ?>&hellip;</option>
                                <?php foreach ( $options as $option ) : ?>
                                    <option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_html( $option ); ?></option>
                                <?php endforeach; ?>
                            </select>

                            <?php
                            // Display "Clear" link for the last attribute
                            echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
                            ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php do_action( 'woocommerce_after_variations_table' ); ?>

            <div class="single_variation_wrap">
                <?php
                do_action( 'woocommerce_before_single_variation' );

                // Output the cart button and placeholder for variation data
                do_action( 'woocommerce_single_variation' );

                do_action( 'woocommerce_after_single_variation' );
                ?>
            </div>
        <?php endif; ?>

        <?php do_action( 'woocommerce_after_variations_form' ); ?>
    </form>

<?php do_action( 'woocommerce_after_add_to_cart_form' );
