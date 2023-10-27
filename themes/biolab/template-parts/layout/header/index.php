<nav class="container sticky__nav w-100 z-3 py-3 pt-lg-2">
    <div class="container border-bottom border-white border-opacity-25 bg-primary text-white">
        <div class="d-flex flex-nowrap align-items-center pb-2 justify-content-between">
            <!--        brand and search bar -->
            <div class="col-lg-3 col-11 d-flex align-items-center gap-3 justify-content-between">
                <!--            logo -->
                <?php $sizeLogo = 'col-4 col-lg-12';
                get_template_part('template-parts/logo-brand', null, array('sizeLogo' => $sizeLogo)); ?>
                <!--        main menu-->
                <?php
                $place = 'header';
                $inputClass= 'bg-opacity-10';
                $dropdownClass = "d-none";
                $sizeSearch = 'col d-none d-lg-inline';
                $args = array(
                    'place' => $place,
                    'size' => $sizeSearch,
                    'dropdownClass' => $dropdownClass,
                    'inputClass' => $inputClass
                );?>
            </div>
            <button class="navbar-toggler d-lg-none text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasMainMenu" aria-controls="offcanvasMainMenu"
                    aria-labelledby="offcanvasMainMenu" aria-label="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
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
            <div class="col-lg-3 d-none d-lg-flex gap-3 justify-content-end">
                <button class="btn py-0 px-1">فروشنده شوید</button>
                <button class="btn btn-white rounded-1 py-0">ورود | ثبت نام</button>
                <button class="btn btn-white rounded-1 px-2 py-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 8H21" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="d-flex mt-3 align-items-center gap-3">
            <?php get_template_part('template-parts/layout/header/megaMenu-product'); ?>
        <nav class="d-none d-lg-block">
            <?php
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations['headerSecondMenuLocation']);
            if ($menu) :
                wp_nav_menu(array(
                    'theme_location' => 'headerSecondMenuLocation',
                    'menu_class' => 'd-flex list-unstyled gap-2 align-items-center desktop-menu flex-wrap gap-2 mb-0',
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

<!--    --><?php //if (is_singular('post')) { get_template_part('template-parts/loop/post-detail-sticky');} ?>
</nav>

