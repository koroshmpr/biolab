<?php
/**
 * Dokan Store Contact Form widget Template
 *
 * @since   2.4
 *
 * @package dokan
 */
?>
<?php
$fieldClass = ' p-2 rounded-1 my-3';
?>
<div class="border-bottom border-info border-opacity-50 d-flex my-2">
    <h5 class="border-bottom border-success mb-0 pb-3 border-2 fw-bold">ارتباط با شرکت</h5>
</div>
<form id="dokan-form-contact-seller" action="" method="post" class="seller-form clearfix bg-info bg-opacity-10 p-2 px-3 border border-info border-opacity-50 rounded-15 mb-4">
    <div class="ajax-response"></div>
    <ul>
        <li class="dokan-form-group">
            <input type="text" name="name" value="<?php echo esc_attr( $username ); ?>" placeholder="<?php esc_attr_e( 'Your Name', 'dokan-lite' ); ?>" class="dokan-form-control <?= $fieldClass;?>" minlength="5" required="required">
        </li>
        <li class="dokan-form-group">
            <input type="email" name="email" value="<?php echo esc_attr( $email ); ?>" placeholder="<?php esc_attr_e( 'you@example.com', 'dokan-lite' ); ?>" class="dokan-form-control <?= $fieldClass;?>" required="required">
        </li>
        <li class="dokan-form-group">
            <textarea name="message" maxlength="1000" cols="25" rows="3" value="" placeholder="<?php esc_attr_e( 'Type your messsage...', 'dokan-lite' ); ?>" class="dokan-form-control <?= $fieldClass;?> " required="required"></textarea>
        </li>
    </ul>

    <?php do_action( 'dokan_contact_form', $seller_id ); ?>

    <?php wp_nonce_field( 'dokan_contact_seller', 'dokan_contact_seller_nonce' ); ?>
    <input type="hidden" name="dokan_recaptcha_token" class="dokan_recaptcha_token">
    <input type="hidden" name="seller_id" value="<?php echo esc_html( $seller_id ); ?>">
    <input type="hidden" name="action" value="dokan_contact_seller">
    <input type="submit" name="store_message_send" value="<?php esc_attr_e( 'Send Message', 'dokan-lite' ); ?>" class="dokan-right dokan-btn bg-white dokan-btn-theme btn btn-success border-0 px-5 py-2 rounded-1">
</form>
