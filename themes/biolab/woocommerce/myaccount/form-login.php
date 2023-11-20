<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs, the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form');
?>
<section class="hero vh-100" style="padding-top:150px">
    <div class="container-fluid pb-3">
        <div class="row justify-content-center">
            <div class="col-lg-4 rounded-3 p-3" style="background-color: #F9FBFA;">
            <ul class="tab-product row row-cols-2 mx-auto nav rounded-3 nav-tabs border-0 py-2 justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="w-100 tab-shop nav-link text-success rounded-3 fw-bold d-flex gap-3 fs-4 align-items-center justify-content-center pb-1 active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane"
                            type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">ورود
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="w-100 tab-shop nav-link text-success rounded-3 fw-bold d-flex gap-3 fs-4 align-items-center justify-content-center pb-1" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-tab-pane"
                            type="button" role="tab" aria-controls="register-tab-pane" aria-selected="false">ثبت نام
                    </button>
                </li>
            </ul>
            <div class="tab-content text-white" id="myTabContent">
                <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab">
                    <form class="woocommerce-form woocommerce-form-login login border-0 my-0 py-3" method="post">
                        <?php do_action('woocommerce_login_form_start'); ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text border shadow-none border-1 border-info p-3 rounded-3"
                                   name="username" placeholder="تام کاربری"
                                   id="username" autocomplete="username"
                                   value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/>
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <input class="woocommerce-Input woocommerce-Input--text input-text border shadow-none border-1 border-info p-3 rounded-3" type="password" placeholder="پسورد"
                                   name="password" id="password" autocomplete="current-password"/>
                        </p>

                        <?php do_action('woocommerce_login_form'); ?>
                        <p class="woocommerce-LostPassword lost_password d-flex justify-content-between pt-2">
                            <label class="woocommerce-form__label text-dark text-opacity-75 woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                       name="rememberme"
                                       type="checkbox" id="rememberme" value="forever"/>
                                <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
                            </label>
                            <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
                        </p>
                        <p class="form-row">
                            <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                            <button type="submit"
                                    class="woocommerce-button w-100 btn btn-success py-3 text-white fs-4 rounded-3 button woocommerce-form-login__submit<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
                                    name="login"
                                    value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
                        </p>


                        <?php do_action('woocommerce_login_form_end'); ?>
                    </form>
                </div>
                <div class="tab-pane fade" id="register-tab-pane" role="tabpanel" aria-labelledby="register-tab">
                    <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
                        <form method="post"
                              class="woocommerce-form woocommerce-form-register register border-0 my-0 py-3 text-dark text-opacity-75" <?php do_action('woocommerce_register_form_tag'); ?> >
                            <?php do_action('woocommerce_register_form_start'); ?>

                            <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text border-info border rounded-3 p-3"
                                           name="username" id="reg_username" autocomplete="username" placeholder="نام کاربری"
                                           value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/>
                                </p>
                            <?php endif; ?>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text border-info border rounded-3 p-3"
                                       name="email" id="reg_email" autocomplete="email" placeholder="ایمیل"
                                       value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/>
                            </p>
                            <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span
                                                class="required">*</span></label>
                                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text input-text border-info border rounded-3 p-3"
                                           name="password" id="reg_password" autocomplete="new-password" placeholder="پسورد"/>
                                </p>
                            <?php else : ?>
                                <p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>
                            <?php endif; ?>
                            <?php do_action('woocommerce_register_form'); ?>
                            <p class="woocommerce-form-row form-row">
                                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                                <button type="submit"
                                        class="woocommerce-Button w-100 rounded-3 py-3 text-white fs-4 btn btn-success woocommerce-button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit"
                                        name="register"
                                        value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
                            </p>
                            <?php do_action('woocommerce_register_form_end'); ?>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<?php do_action('woocommerce_after_customer_login_form'); ?>
