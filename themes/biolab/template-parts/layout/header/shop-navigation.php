<?php
global $post;
$current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations['navigationLocation']);
$i = 0;
if ($menu) :
    $menu_items = wp_get_nav_menu_items($menu);

    echo '<ul class="d-flex justify-content-evenly px-3 mb-0 gap-3 list-unstyled">';

    foreach ($menu_items as $item) :
        $menu_item_title = $item->title;
        $menu_item_url = $item->url;
        $icon = get_field('icon', $item->ID);
        $iconActive = get_field('icon_active', $item->ID);

        // Check if the menu item URL matches the current page URL
        $is_current_page = ($menu_item_url === $current_url);

        ?>
        <li  class="nav-item d-flex align-items-center lazy text-center justify-content-center col">
            <a href="<?= esc_url($menu_item_url) ?>" class="lazy row text-white justify-content-center text-decoration-none fw-bold w-100 gy-1"
               aria-label="<?= $menu_item_title; ?>"
               title="<?= $menu_item_title; ?>">
                <p class="px-0 mb-0"><?= $is_current_page ? $iconActive : $icon; ?></p>
                <span class="px-0 small mb-0 text-white <?= $is_current_page ? '' : 'text-opacity-75' ?>"><?= $menu_item_title; ?></span>
            </a>
        </li>
        <?php
        $i++;
    endforeach;

    echo '</ul>';
endif;
?>
