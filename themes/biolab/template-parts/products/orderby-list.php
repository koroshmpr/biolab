<form class="w-100 woocommerce-ordering border-bottom border-info border-opacity-50 d-flex gap-3 align-content-center" method="get">
    <h5 class="border-bottom border-2 border-success  w-auto py-1 mb-0 fw-bold fs-6 col-3 col-lg-auto">مرتب سازی بر اساس :</h5>
    <div class="d-flex gap-3 align-items-center text-dark overflow-x-scroll orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
        <?php
        $orderby_options = array(
            'menu_order' => __('پیش فرض', 'woocommerce'),
            'popularity' => __('محبوبیت', 'woocommerce'),
            'rating'     => __('امتیاز', 'woocommerce'),
            'date-asc'   => __('جدیدترین', 'woocommerce'),
            'date-desc'  => __('قدیمی‌ترین', 'woocommerce'),
            'price'      => __('ارزانترین', 'woocommerce'),
            'price-desc' => __('گرانترین', 'woocommerce')
        );

        $current_orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : 'menu_order';
        ?>

        <?php foreach ($orderby_options as $orderby_value => $orderby_label) :
            $url_params = array(
                'orderby' => $orderby_value,
                'paged' => 1 // Reset pagination to page 1
            );
            $url = esc_url(add_query_arg($url_params)); // Generate URL with orderby parameter

            // Add class 'active' to the currently selected option
            $class = ($current_orderby === $orderby_value) ? ' text-success border-bottom border-success ' : '';
            ?>
            <a href="<?php echo $url; ?>" class="col-auto pb-2<?php echo $class; ?>"><?php echo esc_html($orderby_label); ?></a>
        <?php endforeach; ?>
    </div>
    <?php wc_query_string_form_fields(null, array('submit', 'paged', 'product-page')); ?>
</form>