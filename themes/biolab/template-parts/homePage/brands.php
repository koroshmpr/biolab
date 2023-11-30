<section class="container py-5">
    <h4 class="text-center fs-5 pt-3 pb-5"><?= get_field('selected-brands-title'); ?></h4>
    <?php
    $brands = get_field('selected-brands');

    if ($brands) { ?>
        <div class="d-flex flex-nowrap row-cols-lg-6 row-cols-costume overflow-x-scroll align-items-center justify-content-lg-center">
            <?php foreach ($brands as $brand) {
                $brand_id = $brand->term_id;
                $brandImg = get_field('icon', 'brand_' . $brand_id);
                ?>
                <div class="brand-item">
                    <?php if ($brandImg) : ?>
                        <img class="w-100" src="<?= esc_url($brandImg['url']) ?? ' '; ?>" alt="<?= esc_attr($brand->name); ?>">
                    <?php endif; ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</section>
