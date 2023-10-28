<?php
global $product;

?>
<div class="card p-2 rounded-3 border-info border-opacity-50">

    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail'); ?>
    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"
         class=" mx-2 d-block border-0 rounded object-fit img-thumbnail" height="210">
    <div class="card-body text-lg-start text-center pb-0 px-0">
        <?php
        if ($product->is_on_sale()) { ?>
            <span class="px-2 py-1 btn-success rounded-pill small">فروش ویژه</span>
       <?php } ?>
        <h6 class="card-title text-dark fs-5 mt-2 pt-1">
            <a href="<?php the_permalink(); ?>"
               class="stretched-link text-dark fs-6 fw-bold"><?php the_title(); ?></a>
        </h6>
        <p class="card-text mb-0">
            <?php
            if (is_numeric($product->get_price())) :
                if (!$product->is_type('variable')) {
                    if ($product->get_sale_price() == true) { ?>
                        <span class="text-secondary fs-6 fw-bold"><?php echo number_format($product->get_sale_price());?>تومان</span>
                        <span class="text-primary small text-opacity-50 text-decoration-line-through ms-1">
                                <?php echo number_format($product->get_regular_price()); ?> تومان
                        </span>

                    <?php } else {
                        echo number_format($product->get_regular_price()); ?><span class="text-primary ms-1">تومان</span>
                    <?php }
                } else {
                    echo number_format($product->get_variation_regular_price([$min_or_max = 'min'][$for_display = false])) .
                        ' تا '
                        . number_format($product->get_variation_regular_price([$min_or_max = 'max'][$for_display = false]));
                    ?> <span class="text-primary ms-1">تومان</span>
                <?php }endif; ?>
        </p>
        <?php
        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
            sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="btn btn-addToCard d-none">%s</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->get_id() ),
                esc_attr( $product->get_sku() ),
                $product->is_purchasable() ? 'اضافه کردن به سبد خرید' : '',
                esc_attr( $product->get_type() ),
                esc_html( $product->add_to_cart_text() )
            ),
            $product );
        ?>
    </div>
</div>