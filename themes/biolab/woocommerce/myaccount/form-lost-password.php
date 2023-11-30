<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>
    <section class="hero top-gap-shop min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
            <form method="post" class="woocommerce-ResetPassword lost_reset_password bg-white rounded-3 p-4 col-lg-5">
                    <h1 class="py-3 text-center fs-3">بازیابی رمز</h1>
                <p><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce')); ?></p><?php // @codingStandardsIgnoreLine ?>

                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first w-100">
<!--                    <label for="user_login">--><?php //esc_html_e('Username or email', 'woocommerce'); ?><!--</label>-->
                    <input class="woocommerce-Input woocommerce-Input--text input-text w-100 rounded-3 p-3 border-1 shadow-none border-info" placeholder="نام کاربری یا ایمیل" type="text" name="user_login"
                           id="user_login" autocomplete="username"/>
                </p>

                <div class="clear"></div>

                <?php do_action('woocommerce_lostpassword_form'); ?>

                <p class="woocommerce-form-row form-row">
                    <input type="hidden" name="wc_reset_password" value="true"/>
                    <button type="submit"
                            class="btn btn-success rounded-3 px-4 py-1 <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
                            value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('Reset password', 'woocommerce'); ?></button>
                </p>

                <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

            </form>
            </div>
        </div>
    </section>
<?php
do_action('woocommerce_after_lost_password_form');
