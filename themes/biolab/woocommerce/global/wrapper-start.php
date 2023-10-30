<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = wc_get_theme_slug_for_templates();

switch ( $template ) {
	case 'twentyten':
		echo '<div id="container"><div id="content" role="main">';
		break;
	case 'biolab':
		echo '<div id="primary"><div id="content" role="main" class="hero biolab top-gap-shop">';
        echo '<div class="container">';
        if (is_shop() or is_product_category()) {?>
            <div class="row">
            <div class="col-lg-3 p-lg-4 p-3 py-lg-0 overflow-hidden">
                <?php get_template_part('template-parts/products/archive-sidebar');?>
            </div>
            <div class="col-lg-9">
        <?php }
		break;
}
