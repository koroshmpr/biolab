<div class="py-2 py-lg-4 p-4 border-info border-opacity-50 rounded-3 border row-gap-4 mt-5 col-12 gap-lg-3 row row-cols-lg-5 row-cols-2 justify-content-lg-between justify-content-center">
    <?php
    $j=0;
    while (have_rows('property', 'option')): the_row(); ?>
        <div class="property d-flex align-items-center gap-3 ps-0" data-aos="fade-right" data-aos-easing="ease-out-cubic"
             data-aos-duration="<?= $j;?>00">
            <div><?= get_sub_field('property_svg', 'option'); ?></div>
            <div>
                <p class="fw-bold fs-6 mb-0 mb-1"><?= get_sub_field('property_name'); ?></p>
                <p class="opacity-75 mb-0 small"><?= get_sub_field('property_detail'); ?></p>
            </div>
        </div>
        <?php
        $j+= 5;
    endwhile; ?>
</div>