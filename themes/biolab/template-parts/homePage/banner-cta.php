<?php
$ctabanners = get_field('ctaBanners');
// Check if there are selected banners
if ($ctabanners) :?>
    <section class="container my-5 px-0">
        <div class="p-4 px-lg-0 row row-cols-lg-2 row-cols-1 align-items-center justify-content-lg-between justify-content-center gap-3">
            <?php
            $i = 0;
            // Loop through the selected banners
            foreach ($ctabanners as $ctabanner) :
                $desktop = $ctabanner['image-desktop'];
                $mobile = $ctabanner['image-mobile']
                ?>
                <a href="<?= $ctabanner['link'] ?? ''; ?>" data-aos="zoom-in" data-aos-delay="<?= $i; ?>0"
                   class="rounded-3 overflow-hidden p-3 d-flex align-items-center"
                   style="height: 250px;">
                    <picture class="img-fluid object-fit-cover">
                        <source media="(min-width: 576px)" srcset="<?= $desktop['url'] ?? ''; ?>">
                        <source media="(max-width: 575px)"
                                srcset="<?= isset($mobile) ? $desktop['url'] : (isset($desktop) ? $desktop['url'] : '') ?>">
                        <img class="img-fluid position-absolute shadow-sm top-0 start-0 w-100 h-100 z-n1 object-fit-cover"
                             src="<?= $desktop['url'] ?? ''; ?>"
                             alt="<?= $desktop['title']; ?>">
                    </picture>
                </a>
                <?php
                $i += 5;
            endforeach; ?>
        </div>
    </section>
<?php endif; ?>