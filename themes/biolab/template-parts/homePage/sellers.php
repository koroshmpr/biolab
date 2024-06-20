<section class="container p-3 rounded-3 border border-info border-opacity-50">
    <h4 class="text-center fs-5 pt-3 pb-5"><?= get_field('selected-brands-title'); ?></h4>

    <?php $chooseFrom = get_field('selected-from');
    if ($chooseFrom == 'vendors') {
        $vendors = get_field('selected-vendors'); ?>
        <ul class="d-flex list-unstyled flex-nowrap row-cols-lg-6 row-cols-costume overflow-x-scroll align-items-center justify-content-lg-center">
            <?php if ($vendors) :
                foreach ($vendors as $vendor) :
                    $store_url = $vendor['user_nicename'] ?? '';
                    ?>
                    <li class="dokan-single-seller woocommerce overflow-hidden border-start border-end border-info px-4 border-opacity-50"
                        style="width: 150px;">
                        <a href="<?= esc_url(home_url() . '/vendor/' . $store_url); ?>">
                            <?= $vendor["user_avatar"] ?? ''; ?>
                        </a>
                    </li>
                <?php endforeach;
            endif; ?>
        </ul>
    <?php }
    if ($chooseFrom == 'random') {
        $number = get_field('random-number');
        $sellers = dokan_get_sellers(['number' => $number ?? 6]); // Get the first 6 sellers

        if ($sellers['users']) : ?>
            <ul class="d-flex list-unstyled flex-nowrap flex-lg-wrap row-cols-lg-6 row-cols-costume overflow-x-scroll overflow-x-lg-visible align-items-center justify-content-lg-center">
                <?php foreach ($sellers['users'] as $seller) :
                    $vendor = dokan()->vendor->get($seller->ID);
                    $store_url = $vendor->get_shop_url();
                    ?>
                    <li class="dokan-single-seller woocommerce  overflow-hidden border-start border-end border-info px-4 border-opacity-50"
                        style="width: 150px;">
                        <a href="<?php echo esc_url($store_url); ?>">
                            <img src="<?php echo esc_url($vendor->get_avatar()); ?>"
                                 alt="<?php echo esc_attr($vendor->get_shop_name()); ?>"
                                 size="50">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p class="dokan-error"><?php esc_html_e('No vendor found!', 'dokan-lite'); ?></p>
        <?php endif;
    }
    ?>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // remove zero from start of phone numbers after enter value
        const handleInput = (inputElement, timeoutId) => {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                let value = inputElement.value.trim();
                value.startsWith('0') && (inputElement.value = value.substring(1));
            }, 1000);
        };
        var usernameField = document.getElementById('username');

        // Check if the element exists
        if (usernameField) {
            // Add the inputmode attribute with value 'numeric'
            usernameField.setAttribute('inputmode', 'numeric');
        }
    });
    let regEmailInput = document.getElementById('reg_email');
    console.log(regEmailInput);
    let timeoutIdRegEmail;
    if(regEmailInput) {
        regEmailInput.addEventListener('input', () => handleInput(regEmailInput, timeoutIdRegEmail));
        regEmailInput.setAttribute('inputmode', 'numeric');
    }
    })
</script>