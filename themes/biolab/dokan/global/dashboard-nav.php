<?php
$home_url     = home_url();
$active_class = ' class="active"'
?>

<div class="dokan-dash-sidebar py-5">
    <?php
    global $allowedposttags;

    // These are required for the hamburger menu.
    if ( is_array( $allowedposttags ) ) {
        $allowedposttags['input'] = [ // phpcs:ignore
            'id'      => [],
            'type'    => [],
            'checked' => [],
        ];
    }

    echo wp_kses( dokan_dashboard_nav( $active_menu ), $allowedposttags );

    // Adding a Custom Menu Item for Catalogs & Videos
    ?>
    <ul class="dokan-dashboard-menu">
        <li<?php echo $active_menu === 'custom_section' ? $active_class : ''; ?>>
            <a href="<?php echo home_url( '/vendors-cataloge/' ); ?>">
                <i class="fas fa-cog"></i>
                <?php _e( 'کاتالوگ ها', 'text-domain' ); ?>
            </a>
        </li>
    </ul>
</div>
