<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files, and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs, the version of the template file will be bumped, and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! empty( $breadcrumb ) ) {

    // Add a custom class to the breadcrumb wrapper
    $custom_class = 'woocommerce-breadcrumb text-white d-flex gap-2 fs-6'; // Change this to your desired class name

    echo '<div class="' . esc_attr( $custom_class ) . '">'; // Open the custom wrapper

    foreach ( $breadcrumb as $key => $crumb ) {

        echo $before;

        if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
            echo '<a class="text-white text-opacity-75" href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
        } else {
            echo esc_html( $crumb[0] );
        }

        echo $after;

        if ( sizeof( $breadcrumb ) !== $key + 1 ) {
            echo '>&nbsp&nbsp';
        }
    }

    echo '</div>'; // Close the custom wrapper
}