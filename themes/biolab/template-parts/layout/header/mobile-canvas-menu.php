<div class="offcanvas offcanvas-start mobile-offcanvas bg-transparent" tabindex="-1" id="offcanvasMainMenu"
     aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header justify-content-end pe-4 align-items-center position-absolute top-0 end-0">
        <button type="button" class="btn-close fs-6 bg-white bg-opacity-50" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body row gy-5 justify-content-center align-content-start bg-primary w-75 pe-0">
        <form class="pb-2 border-bottom border-info border-opacity-50 mt-5 position-relative mobile-search" method="get"
              action="<?php echo esc_url(home_url('/')); ?>">
            <input id="search-form-mobile" type="search" name="s"
                   class="btn ps-2 py-0 text-white text-opacity-75 border-0 text-start w-100 bg-transparent mobile-search"
                   placeholder="جستجوی محصول ..." aria-label="Search">
            <button type="submit"
                    class="position-absolute end-0 top-0 pe-3 btn d-flex align-items-center px-3 py-1 justify-content-center text-info"
                    aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search"
                     viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
        <!--tabs-->
        <ul class="nav nav-tabs row row-cols-2 px-0 border-info border-opacity-50" id="myTab" role="tablist">
            <li class="nav-item px-0" role="presentation">
                <button class="text-success nav-link active rounded-0 w-100" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                        aria-selected="true">
                    دسته بندی ها
                </button>
            </li>
            <li class="nav-item px-0" role="presentation">
                <button class="text-success nav-link rounded-0 w-100" id="menu-tab" data-bs-toggle="tab"
                        data-bs-target="#menu-tab-pane" type="button" role="tab" aria-controls="menu-tab-pane"
                        aria-selected="false">
                    منو
                </button>
            </li>
        </ul>
        <div class="tab-content px-0 mt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                 tabindex="0">
                <ul class="row list-unstyled lh-lg gy-4 mt-2 overflow-y-scroll">
                    <?php
                    $children = get_categories(array(
                        'taxonomy' => 'product_cat',
                        'orderby' => 'name',
                        'pad_counts' => false,
                        'hierarchical' => 1,
                        'hide_empty' => true
                    ));

                    if ($children) {
                        foreach ($children as $key => $subcat) {
                            // Get the ACF 'icon' field value for the current category
                            $icon = get_field('icon', 'product_cat_' . $subcat->term_id);
                            ?>
                            <li class="row pe-0 gap-2 ps-4 py-2 border-bottom border-info border-opacity-25 align-items-center">
                                <?php if ($icon) { ?>
                                    <img class="col-2 pe-0" width="30" height="30" src="<?= $icon['url']; ?>" alt="<?= $icon['title']; ?>">
                                <?php } ?>
                                <a href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>"
                                   class="small text-white col">
                                    <?= $subcat->name; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>

            </div>
            <div class="tab-pane fade" id="menu-tab-pane" role="tabpanel" aria-labelledby="menu-tab" tabindex="0">
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['topHeaderMenuLocation']);
                if ($menu) :
                    wp_nav_menu(array(
                        'theme_location' => 'topHeaderMenuLocation',
                        'menu_class' => 'navbar-nav row',
                        'container' => false,
                        'menu_id' => 'navbarMenuMobile',
                        'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
                        'link_class' => 'nav-link fs-6 text-white ps-4 py-2 border-bottom border-info border-opacity-25', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                        'depth' => 2,
                    ));
                endif;
                ?>
            </div>
        </div>
    </div>
</div>