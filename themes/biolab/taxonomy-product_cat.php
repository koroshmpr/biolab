<?php
/**
 * The template for displaying product category archives.
 *
 * @link https://woocommerce.com/
 *
 * @package WooCommerce
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

?>

<section class="hero top-gap-shop min-vh-lg-80">
    <div class="container">
        <div class="row justify-content-between align-items-start">
            <div class="col-lg-3 pe-lg-4 order-last order-lg-first">
                <?php get_template_part('template-parts/products/archive-sidebar'); ?>
            </div>
            <div class="col-lg-9">
                <?php
                $textClass = 'text-white';
                $args = array(
                    'textClass' => $textClass
                );
                get_template_part('template-parts/products/category-loop', null, $args);

                if (have_posts()) {
                    ?>
                    <div class="row row-cols-xl-5 row-cols-md-3 row-cols-lg-4 row-cols-2 align-items-stretch">
                        <?php
                        while (have_posts()) : the_post();
                            ?>
                            <article class="p-2">
                                <?php get_template_part('template-parts/products/product-card'); ?>
                            </article>
                        <?php
                        endwhile;
                        ?>
                    </div>

                    <?php
                    // WooCommerce Pagination
                    global $wp_query;

                    // Retrieve the total number of products in the main query
                    $total_products = $wp_query->found_posts;
                    $posts_per_page = get_option('posts_per_page');
                    $total_pages = ceil($total_products / $posts_per_page); // Use ceil to round up

                    if ($total_pages > 1) {
                        ?>
                        <nav class="woocommerce-pagination p-4">
                            <?php
                            echo paginate_links(
                                array(
                                    'base'      => $base ?? esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false)))),
                                    'format'    => $format ?? '',
                                    'add_args'  => false,
                                    'current'   => max(1, get_query_var('paged')),
                                    'total'     => $total_pages,
                                    'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                                    'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                                    'type'      => 'list',
                                    'end_size'  => 3,
                                    'mid_size'  => 3,
                                )
                            );
                            ?>
                        </nav>
                        <?php
                    }

                } else {
                    ?>
                    <h2 class="text-center fw-bold fs-4 border rounded-3 border-info p-5 bg-white bg-opacity-10">
                        محصولی یافت نشد
                    </h2>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
