<section class="hero top-gap-shop min-vh-lg-80">
    <div class="container">
        <div class="swiper product_image_swiper px-3 px-lg-0">
            <div class="swiper-wrapper">
                <?php
                $sliders = get_field('hero-slider');
                if ($sliders):
                    foreach ($sliders as $slider):
                        ?>
                        <a target="_blank" href="<?= $slider['link'] ?? ''; ?>" class="swiper-slide">
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
        <?php
        $heroCategories = get_field('hero-categories');
        if ($heroCategories) : ?>
            <div class="swiper category-slider my-4">
                <div class="swiper-wrapper">
                    <?php
                    $i = 1; // Initialize the counter for the data-aos-duration
                    foreach ($heroCategories as $category_item) :
                        if ($category_item) :
                            $category_obj = get_term($category_item, 'product_cat');
                            $category_link = get_term_link($category_obj);
                            $category_title = $category_obj->name;
                            $thumbnail_id = get_term_meta($category_item, 'thumbnail_id', true);
                            ?>
                            <a class="swiper-slide d-flex flex-column align-items-center justify-content-center" href="<?= esc_url($category_link); ?>"
                               data-aos="fade-left"
                               data-aos-duration="<?= $i; ?>00">
                                <div style="width: 120px;" class="image-square bg-white rounded-5 border border-1 border-info border-opacity-75">
                                    <?php if (wp_get_attachment_url($thumbnail_id)) { ?>
                                        <img class="image-square object-fit-cover img-fluid rounded-5"
                                             src="<?= wp_get_attachment_url($thumbnail_id); ?>"
                                             alt="<?= esc_attr($category_title); ?>">
                                    <?php } else { ?>
                                        <div class="image-square bg-white  rounded-5 d-flex justify-content-center align-items-center">
                                            <?= get_field('author-image-default', 'option'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <h6 class="text-dark fw-bold text-center mt-3 fs-6 lh-lg"
                                    style="min-height: 50px;"><?= esc_html($category_title); ?></h6>
                            </a>
                            <?php
                            $i += 2;
                            wp_reset_postdata(); // Reset Query
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>