<section class="container py-3">
    <h4 class="text-center fs-5 pt-3 pb-5"><?= get_field('selected-brands-title'); ?></h4>

    <?php
    $sellers = dokan_get_sellers(['number' => 6]); // Get the first 6 sellers

    if ($sellers['users']) : ?>
        <ul class="d-flex list-unstyled flex-nowrap row-cols-lg-6 row-cols-costume overflow-x-scroll align-items-center justify-content-lg-center">
            <?php foreach ($sellers['users'] as $seller) :
                $vendor = dokan()->vendor->get($seller->ID);
                $store_url = $vendor->get_shop_url();
                ?>
                <li class="dokan-single-seller woocommerce rounded-circle overflow-hidden" style="width: 80px;">
                    <a href="<?php echo esc_url($store_url); ?>">
                        <img src="<?php echo esc_url($vendor->get_avatar()); ?>"
                             alt="<?php echo esc_attr($vendor->get_shop_name()); ?>"
                             size="50">
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p class="dokan-error"><?php esc_html_e('No vendor found!', 'dokan-lite'); ?></p>
    <?php endif; ?>
</section>
