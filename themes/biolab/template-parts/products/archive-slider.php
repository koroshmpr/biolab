<div class="swiper product_image_swiper px-3 px-lg-0">
    <div class="swiper-wrapper">
        <?php while (have_rows('images', 'option')) : the_row(); ?>
            <div class="swiper-slide">
                <?php $image = get_sub_field('image', 'option'); ?>
                <?php $imageMobile = get_sub_field('image_mobile', 'option'); ?>
                <img class="w-100 rounded-3 object-fit-cover <?= $imageMobile ? 'd-none d-lg-block' : ''; ?>"
                     src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" style="min-height: 350px"/>
                <?php if ($imageMobile) { ?>
                    <img class="w-100 rounded-3 object-fit-cover d-lg-none" src="<?= $imageMobile['url']; ?>"
                         alt="<?= $imageMobile['title']; ?>" style="min-height: 350px"/>
                <?php } ?>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="swiper-pagination text-white"></div>
</div>
