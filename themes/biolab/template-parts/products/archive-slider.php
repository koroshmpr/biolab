<div class="swiper product_image_swiper px-3 px-lg-0">
    <div class="swiper-wrapper">
        <?php
        $sliders = get_field('images', 'option');
        if ($sliders):
            foreach ($sliders as $slider):
                ?>
                <a target="_blank" href="<?= $slider['link'] ?? '' ; ?>" class="swiper-slide">
                    <?php $image = $slider['image'] ?>
                    <?php $imageMobile = $slider['image-mobile'] ?>
                    <img class="w-100 rounded-3 object-fit-cover <?= $imageMobile ? 'd-none d-lg-block' : ''; ?>"
                         src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" style="min-height: 350px"/>
                    <?php if ($imageMobile) { ?>
                        <img class="w-100 rounded-3 object-fit-cover d-lg-none"
                             src="<?= $imageMobile['url']; ?>"
                             alt="<?= $imageMobile['title']; ?>" style="min-height: 350px"/>
                    <?php } ?>
                </a>
            <?php
            endforeach;
        endif;
        ?>
    </div>
    <div class="swiper-pagination text-white"></div>
</div>
