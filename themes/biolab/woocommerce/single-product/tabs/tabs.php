<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if (!empty($product_tabs)) : $index = 0 ?>

    <div class="my-5 border rounded-3 p-lg-4 col-12 border-info border-opacity-50">
        <div class="row justify-content-center justify-content-lg-start bg-white">
            <ul class="nav col-lg-auto nav-tabs border-0 align-items-center p-3 mb-4 rounded-3 gap-2 tab-product flex-nowrap overflow-x-scroll" id="myTab" role="tablist">
                <?php foreach ($product_tabs as $key => $product_tab) : ?>
                    <li class="nav-item  rounded" role="presentation">
                        <button class="tab-shop text-primary border-0 lh-1 rounded-3 fs-5 px-4 py-3 small-sm-down fw-bold lazy <?= $index == 0 ? 'active' : '' ?>"
                                id="cat-<?php echo esc_attr($key); ?>-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#cat-<?php echo esc_attr($key); ?>"
                                type="button"
                                role="tab"
                                aria-controls="cat-<?php echo esc_attr($key); ?>"
                                aria-selected="true">
                            <?= $product_tab['title'] ?>
                        </button>
                    </li>
                    <?php $index++;
                endforeach; ?>
            </ul>
            <?php $index = 0 ?>

            <div class="tab-content" id="myTabContent">
                <?php foreach ($product_tabs as $key => $product_tab) : ?>
                    <div class="tab-pane px-4 fade <?= $index == 0 ? 'show active' : '' ?>"
                         id="cat-<?php echo esc_attr($key); ?>"
                         role="tabpanel"
                         aria-labelledby="cat-<?php echo esc_attr($key); ?>-tab">
                        <?php
                        if (isset($product_tab['callback'])) {
                            call_user_func($product_tab['callback'], $key, $product_tab);
                        }
                        ?>
                    </div>
                    <?php $index++;
                endforeach; ?>
            </div>
        </div>
    </div>
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
