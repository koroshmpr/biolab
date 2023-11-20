<?php


$store_user = dokan()->vendor->get(get_query_var('author'));
$store_id = $store_user->get_id();

//$store_id = absint($atts['store_id']);


$dokan_settings = get_user_meta($store_id, 'dokan_profile_settings', true);

// Get and display the custom fields
$manager_name = !empty($dokan_settings['manager_name']) ? esc_html($dokan_settings['manager_name']) : 'N/A';
$technical_manager = !empty($dokan_settings['technical_manager']) ? esc_html($dokan_settings['technical_manager']) : 'N/A';
$registration_number = !empty($dokan_settings['registration_number']) ? esc_html($dokan_settings['registration_number']) : 'N/A';
$company_type = !empty($dokan_settings['company_type']) ? esc_html($dokan_settings['company_type']) : 'N/A';

ob_start(); ?>

<table class="dokan-store-info pb-4">
    <tbody>
    <tr class="dokan-store-address">
        <th class="col-lg-3 col-5">مدیر عامل :</th>
        <td><?php echo $manager_name; ?></td>
    </tr>
    <tr class="dokan-store-address">
        <th>مسئول فنی :</th>
        <td><?php echo $technical_manager; ?></td>
    </tr>
    <tr class="dokan-store-address">
        <th>شماره ثبت شرکت :</th>
        <td><?php echo $registration_number; ?></td>
    </tr>
    <tr class="dokan-store-address">
        <th>نوع شرکت :</th>
        <td><?php echo $company_type; ?></td>
    </tr>
    </tbody>
</table>

<?php
return ob_get_clean();