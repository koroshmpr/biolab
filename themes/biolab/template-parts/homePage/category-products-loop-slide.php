<?php
$category_list = get_field('category-products-list');
if ($category_list) :
    foreach ($category_list as $category_item) :
        $category = $category_item['category'];
        $count = $category_item['count'];
        $price = $category_item['price'];

        if ($category) :
            // Arguments for WP_Query to get products from the selected category
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $count,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $category,
                    ),
                ),
                'meta_key' => '_price',
                'orderby' => 'meta_value_num',
                'order' => $price // 'asc' for ascending, 'desc' for descending
            );
            $category_obj = get_term($category, 'product_cat');
            $category_link = get_term_link($category_obj);
            $category_title = $category_obj->name;

            // Query for the related products
            $selected = new WP_Query($args);

            if ($selected->have_posts()) : ?>

                <section class="container py-5">
                    <div class="border-bottom d-flex justify-content-between align-items-center border-info border-opacity-50 mb-4">
                        <h6 class="border-bottom text-secondary border-success mb-0 pb-3 border-2 fw-bold fs-4">
                            <?php echo esc_html($category_title); ?>
                        </h6>
                        <div class="d-flex">
                            <a href="<?php echo esc_url($category_link); ?>" class="fw-bold px-2 text-primary btn-arrow">
                                مشاهده همه
                            </a>
                        </div>
                    </div>

                    <div class="d-flex border rounded-3 p-3 border-dark border-opacity-10 row-cols-xl-6 row-cols-costume row-cols-md-3 flex-lg-wrap flex-nowrap overflow-x-lg-scroll">
                        <?php while ($selected->have_posts()) : $selected->the_post(); ?>
                            <div class="p-2">
                                <?php get_template_part('template-parts/products/product-card'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php
            endif;
            wp_reset_postdata();
        endif;
    endforeach;
endif;
?>
