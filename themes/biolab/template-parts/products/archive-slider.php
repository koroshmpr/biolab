<div class="swiper product_image_swiper px-3 px-lg-0">
    <div class="swiper-wrapper">
        <?php while (have_rows('images', 'option')) : the_row(); ?>
            <div class="swiper-slide">
                <?php $image = get_sub_field('image', 'option'); ?>
                <img class="w-100 object-fit-cover" src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>"/>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="swiper-pagination text-white"></div>
</div>
