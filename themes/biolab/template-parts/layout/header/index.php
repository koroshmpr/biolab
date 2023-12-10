<nav class="container sticky__nav w-100 z-3 py-3 pt-lg-2">
    <div class="container border-bottom border-white border-opacity-25 bg-primary text-white px-lg-3 pb-1 rounded-bottom">
        <div class="d-flex flex-nowrap align-items-center justify-content-between">
            <!--        brand and search bar -->
            <div class="col-lg-3 col-11 d-flex align-items-center gap-3 justify-content-between">
                <!--            logo -->
                <?php $sizeLogo = 'col-4 col-lg-12';
                get_template_part('template-parts/logo-brand', null, array('sizeLogo' => $sizeLogo)); ?>
                <!--        main menu-->
                <?php
                $place = 'header';
                $inputClass = 'bg-opacity-10';
                $dropdownClass = "d-none";
                $sizeSearch = 'col d-none d-lg-inline';
                $args = array(
                    'place' => $place,
                    'size' => $sizeSearch,
                    'dropdownClass' => $dropdownClass,
                    'inputClass' => $inputClass
                ); ?>
            </div>
            <button class="navbar-toggler d-lg-none text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasMainMenu" aria-controls="offcanvasMainMenu"
                    aria-labelledby="offcanvasMainMenu" aria-label="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list"
                     viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
            <!--            menu-->
            <div class="me-auto col-lg-5 navbar navbar-expand-lg d-none d-lg-grid justify-content-center">
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
                    if ($menu) :
                        wp_nav_menu(array(
                            'theme_location' => 'headerMenuLocation',
                            'menu_class' => 'navbar-nav gap-2 align-items-center desktop-menu flex-wrap',
                            'container' => false,
                            'menu_id' => 'navbarTogglerMenu',
                            'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
                            'link_class' => 'nav-link text-white fw-bold', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                            'depth' => 1,
                        ));
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-flex gap-3 justify-content-end align-items-center">
                <?php
                if (is_user_logged_in()) {
                    $user = wp_get_current_user();
                    $user_roles = $user->roles;

                    if (in_array('seller', $user_roles) || in_array('administrator', $user_roles) || in_array('editor', $user_roles)) { ?>
                        <a href="/dashboard" class="btn btn-white rounded-1 px-2 py-2 lh-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="20" height="20"
                                 viewBox="0 0 80.000000 80.000000"
                                 preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0,80) scale(0.1,-0.1)" fill="currentColor"
                                   stroke="currentColor">
                                    <path d="M62 648 c-9 -9 -12 -72 -12 -220 0 -201 -1 -208 -20 -208 -15 0 -20 -7 -20 -24 0 -56 0 -56 390 -56 390 0 390 0 390 56 0 17 -5 24 -20 24 -19 0 -20 7 -20 208 0 148 -3 211 -12 220 -17 17 -659 17 -676 0z m663 -218 l0 -205 -132 -3 c-78 -1 -133 -7 -133 -12 0 -6 -27 -10 -60 -10 -33 0 -60 4 -60 10 0 5 -55 11 -132 12 l-133 3 -3 195 c-1 107 0 200 3 207 3 11 71 13 327 11 l323 -3 0 -205z m-390 -240 c8 -13 122 -13 130 0 4 6 67 10 156 10 138 0 150 -1 147 -17 -3 -17 -29 -18 -368 -18 -339 0 -365 1 -368 18 -3 16 9 17 147 17 89 0 152 -4 156 -10z"/>
                                    <path d="M110 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M150 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M190 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M230 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M270 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M310 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M350 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M390 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M430 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M470 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M510 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M550 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M590 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M630 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 590 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M110 550 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 550 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M110 510 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 510 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M549 464 c-13 -14 -37 -35 -52 -46 l-29 -20 -33 32 -34 33 -58 -56 -59 -56 -32 32 c-25 25 -34 29 -44 19 -10 -10 -4 -21 29 -54 l42 -42 55 52 c30 29 58 52 62 52 5 0 22 -14 39 -30 l31 -30 66 57 c36 32 63 63 61 70 -7 19 -17 16 -44 -13z"/>
                                    <path d="M110 470 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 470 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M110 430 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 430 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M110 390 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 390 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M110 350 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 350 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M110 310 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 310 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M110 270 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                    <path d="M670 270 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"/>
                                </g>
                            </svg>
                        </a>
                    <?php } else {
                        // User doesn't have one of the specified roles
                        // Show another button or content
                        echo '<a href="/my-account/#sellerRadio" id="beSeller" class="btn py-0 px-1">فروشنده شوید</a>';
                    }
                } else { ?>
                    <a href="/my-account/#sellerRadio" id="beSeller" class="btn py-0 px-1">فروشنده شوید</a>
                             <?php } ?>
                <div class="d-flex gap-2">
                    <?php
                    if (is_user_logged_in()) { ?>
                        <div class="d-flex align-items-center position-relative">
                            <a type="button" class="px-1 shadow-sm rounded-circle text-white"
                               id="dropdownMenuReference"
                               data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </a>
                            <a class="no-decoration fw-bold text-center text-white" href="/my-account/">
                                <?php global $current_user;
                                wp_get_current_user();
                                echo $current_user->display_name;
                                ?>
                            </a>
                            <ul class="dropdown-menu translate-middle-x top-100"
                                aria-labelledby="dropdownMenuReference">
                                <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                                    <li>
                                        <a class="dropdown-item <?php echo wc_get_account_menu_item_classes($endpoint); ?> "
                                           href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a type="button" class="btn btn-white rounded-1 py-2 lh-sm" href="/my-account">
                            ورود | ثبت نام
                        </a>
                    <?php }
                    ?>
                </div>
                <a href="/cart" class="btn btn-white rounded-1 px-2 py-2 lh-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                              stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                              stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                              stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M9 8H21" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex mt-3 align-items-center gap-3">
        <?php get_template_part('template-parts/layout/header/megaMenu-product'); ?>
        <nav class="">
            <?php
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations['headerSecondMenuLocation']);
            if ($menu) :
                wp_nav_menu(array(
                    'theme_location' => 'headerSecondMenuLocation',
                    'menu_class' => 'd-flex list-unstyled gap-3 align-items-center desktop-menu flex-wrap gap-2 mb-0',
                    'container' => false,
                    'menu_id' => 'headerSecondMenu',
                    'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
                    'link_class' => 'nav-link text-white text-opacity-75 py-1', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                    'depth' => 1,
                ));
            endif;
            ?>
        </nav>

    </div>
</nav>
<?php get_template_part('template-parts/layout/header/mobile-canvas-menu');?>
<nav class="d-lg-none bg-secondary fixed-bottom pb-1 pt-2 shadow-sm">
    <?php get_template_part('template-parts/layout/header/shop-navigation'); ?>
</nav>