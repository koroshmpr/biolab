<div class="bg-white copyright py-4">
    <div class="container">
        <div class="d-flex align-items-center flex-wrap justify-content-center">
            <div class="col-lg-10 col-12">
                <div>
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['topHeaderMenuLocation']);
                    $i = 0;
                    if ($menu) :
                        $menu_items = wp_get_nav_menu_items($menu);

                        echo '<ul class="d-flex justify-content-center justify-content-lg-start gap-3 list-unstyled mb-0">';

                        foreach ($menu_items as $item) :
                            $menu_item_title = $item->title;
                            $menu_item_url = $item->url;
                            $icon = get_field('icon', $item->ID);

                            ?>
                            <li  class="nav-item d-flex align-items-center lazy text-center">
                                <a href="<?= esc_url($menu_item_url) ?>" class="lazy text-decoration-none  w-100"
                                   aria-label="<?= $menu_item_title; ?>"
                                   title="<?= $menu_item_title; ?>">
                                    <?php
                                    // Check if ACF field value is not empty and is a valid SVG
                                    if ($icon) {
                                        echo $icon; // Output the ACF field value (SVG icon)
                                    } else {
                                        echo esc_html($menu_item_title); // Output the default menu item text
                                    }
                                    ?>
                                </a>
                            </li>
                            <?php
                            $i++;
                        endforeach;

                        echo '</ul>';
                    endif;
                    ?>
                </div>
                <hr class="w-100 text-dark text-opacity-75 my-2">
                <p class="text-dark mb-0">© 2020 طراحی سایت توسط  <a target="_blank" href="https://binsy.ir" class="fw-bold">آژانس دیجیتال مارکتینگ بینزی</a></p>
            </div>
            <div class="">
                <!--                social media-->
                <?php
                $sizeSvgX = '30';
                $sizeSvgY = '30';
                $colorSvg = 'white';
                $class = "fill-primary justify-content-center";
                $args = array(
                    'class' => $class,
                    'sizeSvgX' => $sizeSvgX,
                    'sizeSvgY' => $sizeSvgY,
                    'colorSvg' => $colorSvg
                );
                get_template_part('template-parts/social-media', null, $args);
                ?>
            </div>
        </div>
    </div>
</div>