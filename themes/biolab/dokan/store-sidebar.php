<div id="dokan-secondary" class="dokan-store-sidebar order-last ps-3 pt-3 pt-lg-0 me-0" role="complementary">
    <?php if ( dokan_get_option( 'enable_theme_store_sidebar', 'dokan_appearance', 'off' ) === 'off' ) { ?>

        <div class="dokan-widget-area widget-collapse">
            <?php do_action( 'dokan_sidebar_store_before', $store_user->data, $store_info ); ?>
            <?php
            if ( ! dynamic_sidebar( 'sidebar-store' ) ) {
                $args = [
                    'before_widget' => '<aside class="widget dokan-store-widget %s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h3 class="widget-title d-none">',
                    'after_title'   => '</h3>',
                ];

//                dokan_store_category_widget();

                if ( ! empty( $map_location ) ) {
                    dokan_store_location_widget();
                }

                dokan_store_time_widget();
                dokan_store_contact_widget();
            }
            ?>

            <?php do_action( 'dokan_sidebar_store_after', $store_user->data, $store_info ); ?>
            <?php get_template_part('template-parts/products/cta'); ?>
        </div>

    <?php } else { ?>
        <?php get_sidebar( 'store' ); ?>
    <?php } ?>

</div><!-- #secondary .widget-area -->
