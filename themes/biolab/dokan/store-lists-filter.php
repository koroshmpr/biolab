<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/dokan/store-lists-filter.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package Dokan/Templates
 * @version 2.9.30
 */

defined('ABSPATH') || exit; ?>

<?php do_action('dokan_before_store_lists_filter', $stores); ?>
<section class="min-vh-lg-80">
    <div class="container">
        <div id="dokan-store-listing-filter-wrap" class="bg-white shadow-sm text-white bg-opacity-10 mb-5 rounded-2">
            <?php do_action('dokan_before_store_lists_filter_left', $stores); ?>
            <div class="left">
                <p class="item store-count fs-5">
                    <?php
                    // translators: 1) number of stores
                    printf(_n('Total store showing: %d', 'Total stores showing: %d', $number_of_store, 'dokan-lite'), number_format_i18n($number_of_store));
                    ?>
                </p>
            </div>

            <?php do_action('dokan_before_store_lists_filter_right', $stores); ?>
            <div class="right">
                <div class="item">
                    <div class="dokan-icons">
                        <div class="dokan-icon-div"></div>
                        <div class="dokan-icon-div"></div>
                        <div class="dokan-icon-div"></div>
                    </div>

                    <button class="dokan-store-list-filter-button dokan-btn btn btn-success py-1">
                        <?php esc_html_e('Filter', 'dokan-lite'); ?>
                    </button>
                </div>

                <form name="stores_sorting" class="sort-by item" method="get">
                    <label class="px-3"><?php esc_html_e('Sort by', 'dokan-lite'); ?>:</label>

                    <select class="p-1 text-center" name="stores_orderby" id="stores_orderby"
                            aria-label="<?php esc_html_e('Sort by', 'dokan-lite'); ?>">
                        <?php
                        foreach ($sort_filters as $key => $filter) {
                            $optoins = "<option value='${key}'" . selected($sort_by, $key, false) . ">${filter}</option>";
                            printf($optoins);
                        }
                        ?>
                    </select>
                </form>

                <div class="toggle-view item">
                    <span class="dashicons dashicons-screenoptions" data-view="grid-view"></span>
                    <span class="dashicons dashicons-menu-alt" data-view="list-view"></span>
                </div>
            </div>
        </div>

        <?php do_action('dokan_before_store_lists_filter_form', $stores); ?>

        <form role="store-list-filter" method="get" name="dokan_store_lists_filter_form"
              id="dokan-store-listing-filter-form-wrap" style="display: none">

            <?php
            do_action('dokan_before_store_lists_filter_search', $stores);

            if (apply_filters('dokan_load_store_lists_filter_search_bar', true)) :
                ?>
                <div class="store-search grid-item">
                    <input type="search" class="store-search-input" name="dokan_seller_search"
                           placeholder="<?php esc_html_e('Search Vendors', 'dokan-lite'); ?>">
                </div>
            <?php
            endif;

            do_action('dokan_before_store_lists_filter_apply_button', $stores);
            ?>

            <div class="apply-filter">
                <button id="cancel-filter-btn"
                        class="dokan-btn dokan-btn-theme"><?php esc_html_e('Cancel', 'dokan-lite'); ?></button>
                <button id="apply-filter-btn" class="dokan-btn dokan-btn-theme"
                        type="submit"><?php esc_html_e('Apply', 'dokan-lite'); ?></button>
            </div>

            <?php do_action('dokan_after_store_lists_filter_apply_button', $stores); ?>
            <?php wp_nonce_field('dokan_store_lists_filter_nonce', '_store_filter_nonce', false); ?>
        </form>
