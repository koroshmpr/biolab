<?php
$home_url     = home_url();
$active_class = ' class="active"'
?>

<div class="dokan-dash-sidebar min-vh-100 py-5">
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
    <style>
        .dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active:after {
            border-width: 16px 16px 16px 0!important;
    </style>
    <ul class="dokan-dashboard-menu d-none">
        <li<?php echo $active_menu === 'custom_section' ? $active_class : ''; ?>>
            <a href="<?php echo home_url( '/vendors-cataloge/' ); ?>">
                <i class="fas fa-cog"></i>
                <?php _e( 'کاتالوگ ها', 'text-domain' ); ?>
            </a>
        </li>
    </ul>
</div>
