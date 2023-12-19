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
?>
<?php get_header(); ?>
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
                    get_template_part('template-parts/products/category-loop' , null , $args); ?>
                    <?php
                    if (have_posts()) { ?>
                        <div class="row row-cols-lg-5 row-cols-2 align-items-stretch">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="p-2">
                                    <?php get_template_part('template-parts/products/product-card'); ?>
                                </article>
                            <?php
                            endwhile; ?>
                        </div>
                    <?php } else { ?>
                        <h2 class="text-center fw-bold fs-4 border rounded-3 border-info p-5 bg-white bg-opacity-10">
                            محصولی
                            یافت نشد</h2>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>