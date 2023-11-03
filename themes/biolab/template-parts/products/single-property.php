<div class="p-4 border-info border-opacity-50 rounded-3 border row-gap-4 mt-lg-5 col-12 gap-3 row row-cols-lg-5 row-cols-2 justify-content-lg-between justify-content-center">
    <?php
    $j=0;
    while (have_rows('property', 'option')): the_row(); ?>
        <div class="property d-flex align-items-center gap-3 ps-0" data-aos="fade-right" data-aos-easing="ease-out-cubic"
             data-aos-duration="<?= $j;?>00">
            <?= get_sub_field('property_svg', 'option'); ?>
            <div>
                <p class="fw-bold fs-6"><?= get_sub_field('property_name'); ?></p>
                <p class="opacity-75 mb-0 small"><?= get_sub_field('property_detail'); ?></p>
            </div>
        </div>
        <?php
        $j+= 5;
    endwhile; ?>
</div>