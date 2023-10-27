<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();

$price_html = '<div class="pt-3 ' . esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ) . '">';
if ( $product->is_on_sale() && $regular_price > 0 ) {
    $percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 );
    $discount_class = 'your-discount-class'; // Replace with your desired class
    $price_html .= '<div class="regular-price fs-5 text-dark text-opacity-75"><del>' . wc_price( $regular_price ) . '</del>
        <span class="ms-2 bg-danger bg-opacity-10 p-2 rounded-1 text-danger small"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
            <path d="M6.00004 1.83333H10C13.3334 1.83333 14.6667 3.16666 14.6667 6.5V10.5C14.6667 13.8333 13.3334 15.1667 10 15.1667H6.00004C2.66671 15.1667 1.33337 13.8333 1.33337 10.5V6.5C1.33337 3.16666 2.66671 1.83333 6.00004 1.83333Z" stroke="#FF4141" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M5.71338 10.68L10.0734 6.32001" stroke="#FF4141" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M5.98663 7.41332C6.43951 7.41332 6.80662 7.04621 6.80662 6.59334C6.80662 6.14046 6.43951 5.77333 5.98663 5.77333C5.53376 5.77333 5.16663 6.14046 5.16663 6.59334C5.16663 7.04621 5.53376 7.41332 5.98663 7.41332Z" stroke="#FF4141" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10.3467 11.2267C10.7996 11.2267 11.1667 10.8595 11.1667 10.4067C11.1667 9.95378 10.7996 9.58667 10.3467 9.58667C9.89385 9.58667 9.52673 9.95378 9.52673 10.4067C9.52673 10.8595 9.89385 11.2267 10.3467 11.2267Z" stroke="#FF4141" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
' . esc_html( $percentage ) . 'درصد </span></div>';
    $price_html .= '<div class="sale-price fs-3 fw-bold my-2">' . wc_price( $sale_price ) . '</div>';
} else {
    $price_html .= '<div class="price fs-3 fw-bold">' . $product->get_price_html() . '</div>';
}
$price_html .= '</div>';

echo apply_filters( 'woocommerce_price_html', $price_html, $product );
