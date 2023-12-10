<section class="<?= is_404() ? 'd-none ' : ''; ?>rounded-1">
    <div class="container">
        <!--    main footer -->
        <div class="row justify-content-center py-5 align-items-center">
            <!--            column-01-->
            <div class="col-lg-4 p-lg-5 pt-lg-0 pb-4 pb-lg-0 mb-4 mb-lg-0" data-aos="fade-left" data-aos-duration="500">
                <div class="p-4 text-center bg-secondary rounded-3">
                    <!--            logo -->
                    <?php $sizeLogo = 'col-3';
                    get_template_part('template-parts/logo-brand', null, array('sizeLogo' => $sizeLogo)); ?>
                    <!--                footer descriptions-->
                    <div class="py-3 text-center">
                        <?= get_field('footer_description', 'option'); ?>
                    </div>
                    <div class="d-flex">
                        <a href="<?= get_field('footer_btn_link', 'option')['url'] ?? ''; ?>"
                           class="btn btn-primary px-5 py-1 rounded-3"><?= get_field('footer_btn_title', 'option'); ?></a>
                        <a href="<?= get_field('footer_btn_link_1', 'option')['url'] ?? ''; ?>"
                           class="btn text-white btn-arrow py-1"><?= get_field('footer_btn_title_1', 'option'); ?></a>
                    </div>

                </div>
                <div class="py-4 d-flex">
                    <div class="bg-white bg-opacity-10 p-2">
                        <?= get_field('license', 'option') ?? ''; ?>
                    </div>
                </div>
            </div>
            <!--            column-02-->
            <div class="col-lg col-12 my-2 my-lg-0">
                <p class="fw-bold fs-5 mb-4 text-center text-white text-lg-start"><?= get_field('first_menu', 'option'); ?></p>
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footerLocationOne']);
                ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationOne',
                    'menu_class' => 'list-unstyled pe-0 d-lg-grid d-flex flex-wrap gap-3 justify-content-lg-start justify-content-center align-items-center align-items-lg-start',
                    'container' => false,
                    'menu_id' => 'navbarTogglerMenu',
                    'item_class' => 'nav-item',
                    'link_class' => 'lazy text-decoration-none text-white text-opacity-75',
                    'depth' => 1,
                ));
                ?>

            </div>
            <!--            column-03-->
            <div class="col-lg col-12 my-2 my-lg-0">
                <p class="fw-bold fs-5 mb-4 text-center text-white text-lg-start"><?= get_field('second_menu', 'option'); ?></p>
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footerLocationTwo']);
                ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationTwo',
                    'menu_class' => 'list-unstyled pe-0 d-lg-grid d-flex flex-wrap gap-3 justify-content-lg-start justify-content-center align-items-center align-items-lg-start',
                    'container' => false,
                    'menu_id' => 'navbarTogglerMenu',
                    'item_class' => 'nav-item',
                    'link_class' => 'lazy text-decoration-none text-white text-opacity-75',
                    'depth' => 1,
                ));
                ?>

            </div>
            <!--            column-04-->
            <div class="col-lg col-12 my-2 my-lg-0 ">
                <p class="fw-bold fs-5 mb-4 text-center text-white text-lg-start"><?= get_field('third_menu', 'option'); ?></p>
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footerLocationThree']);
                ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationThree',
                    'menu_class' => 'list-unstyled pe-0 d-lg-grid d-flex flex-wrap gap-3 justify-content-lg-start justify-content-center align-items-center align-items-lg-start',
                    'container' => false,
                    'menu_id' => 'navbarTogglerMenu',
                    'item_class' => 'nav-item',
                    'link_class' => 'lazy text-decoration-none text-white text-opacity-75',
                    'depth' => 1,
                ));
                ?>

            </div>
            <!--            column-05-->
            <div class="col-lg-3 col-12">
                <?php
                $google_map_iframe = get_field('map', 'option');
                if ($google_map_iframe): ?>
                    <div class="position-relative rounded-1 h-100 overflow-hidden">
                        <?php echo $google_map_iframe; ?>
                        <a href="<?= get_field('map-link', 'option')['url'] ?? ''; ?>"
                           class="btn bg-white text-primary d-flex justify-content-between align-items-center rounded fw-bold position-absolute bottom-0 mb-4 mx-3 py-1 px-3 col-9 ms-auto end-0 start-0">
                            باز کردن نقشه
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/layout/footer/copyright'); ?>
