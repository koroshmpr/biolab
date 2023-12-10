<div class="dashboard-widget dokan-announcement-widget">
    <div class="widget-title">
        <i class="fas fa-bullhorn" aria-hidden="true"></i> <?php esc_html_e( 'Latest Announcement', 'dokan' ); ?>

        <span class="pull-right">
            <?php
            $announcement_url = dokan_get_navigation_url('single-announcement');

            ?>
            <a href="<?php echo esc_url( $announcement_url ); ?>"><?php esc_html_e( 'See All', 'dokan' ); ?></a>
        </span>
    </div>

    <?php if ( $notices ):?>
        <ul class="list-unstyled">
            <?php foreach ( $notices as $notice ): ?>
                <?php
                $notice_url = trailingslashit( dokan_get_navigation_url( 'single-announcement' ) . $notice->ID );
                ?>
                <li>
                    <div class="dokan-dashboard-announce-content dokan-left">
                        <a href="<?php echo esc_url( $notice_url ); ?>"><h3><?php echo esc_html( $notice->post_title ); ?></h3></a>
                        <?php echo wp_kses_post( wp_trim_words( $notice->post_content, 6, '...' ) ); ?>
                    </div>
                    <div class="dokan-dashboard-announce-date dokan-right <?php echo ( $notice->status == 'unread' ) ? 'dokan-dashboard-announce-unread' : 'dokan-dashboard-announce-read'; ?>">
                        <div class="announce-day"><?php echo date_i18n( 'd', strtotime( $notice->post_date ) ); ?></div>
                        <div class="announce-month"><?php echo date_i18n( 'F', strtotime( $notice->post_date ) ); ?></div>
                        <div class="announce-year"><?php echo date_i18n( 'Y', strtotime( $notice->post_date ) ); ?></div>
                    </div>
                    <div class="dokan-clearfix"></div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div class="dokan-no-announcement">
            <div class="announcement-no-wrapper">
                <i class="fas fa-bell dokan-announcement-icon"></i>
                <p><?php esc_html_e( 'No announcement found', 'dokan' ); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div> <!-- .products -->
