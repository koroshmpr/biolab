<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $wp_query;

// Retrieve the total number of products in the main query
$total_products = $wp_query->found_posts;
$posts_per_page = get_option('posts_per_page');
$total_pages = floor($total_products / $posts_per_page);
$current = $current ?? wc_get_loop_prop('current_page');
$base = $base ?? esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false))));
$format = $format ?? '';
if ( $total_pages <= 1 ) {
    return;
}
?>
<nav class="woocommerce-pagination p-4">
    <?php
    echo paginate_links(
        apply_filters(
            'woocommerce_pagination_args',
            array( // WPCS: XSS ok.
                'base'      => $base,
                'format'    => $format,
                'add_args'  => false,
                'current'   => max( 1, $current ),
                'total'     => intval($total_pages),
                'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                'type'      => 'list',
                'end_size'  => 3,
                'mid_size'  => 3,
            )
        )
    );
    ?>
</nav>
