<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M15 22.75H9C3.57 22.75 1.25 20.43 1.25 15V9C1.25 3.57 3.57 1.25 9 1.25H15C20.43 1.25 22.75 3.57 22.75 9V15C22.75 20.43 20.43 22.75 15 22.75ZM9 2.75C4.39 2.75 2.75 4.39 2.75 9V15C2.75 19.61 4.39 21.25 9 21.25H15C19.61 21.25 21.25 19.61 21.25 15V9C21.25 4.39 19.61 2.75 15 2.75H9Z" fill="#5BBB7B"/>
<path d="M8.56976 16.02C8.37976 16.02 8.18977 15.95 8.03977 15.8C7.74977 15.51 7.74977 15.03 8.03977 14.74L14.5898 8.19003C14.8798 7.90003 15.3598 7.90003 15.6498 8.19003C15.9398 8.48003 15.9398 8.96003 15.6498 9.25003L9.09976 15.8C8.94976 15.95 8.75976 16.02 8.56976 16.02Z" fill="#5BBB7B"/>
<path d="M8.98001 11.11C7.89001 11.11 7 10.22 7 9.13004C7 8.04004 7.89001 7.15002 8.98001 7.15002C10.07 7.15002 10.96 8.04004 10.96 9.13004C10.96 10.22 10.07 11.11 8.98001 11.11ZM8.98001 8.66003C8.72001 8.66003 8.5 8.87005 8.5 9.14005C8.5 9.41005 8.71001 9.62003 8.98001 9.62003C9.25001 9.62003 9.45999 9.41005 9.45999 9.14005C9.45999 8.87005 9.24001 8.66003 8.98001 8.66003Z" fill="#5BBB7B"/>
<path d="M15.52 16.84C14.43 16.84 13.54 15.95 13.54 14.86C13.54 13.77 14.43 12.88 15.52 12.88C16.61 12.88 17.5 13.77 17.5 14.86C17.5 15.95 16.61 16.84 15.52 16.84ZM15.52 14.39C15.26 14.39 15.04 14.6 15.04 14.87C15.04 15.14 15.25 15.35 15.52 15.35C15.79 15.35 16 15.14 16 14.87C16 14.6 15.79 14.39 15.52 14.39Z" fill="#5BBB7B"/>
</svg></span>', $post, $product ); ?>

	<?php
endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
