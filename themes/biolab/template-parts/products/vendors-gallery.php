<?php
// You can customize the query to retrieve vendor data as needed
$vendors = dokan_get_sellers(); ?>

 <div class="row row-cols-6 gallery-container p-4 rounded-3 border border-info my-2" id="sortable-gallery">
                <?php
                $user_gallery = get_user_meta(get_current_user_id(), 'gallery', true);
                if (is_array($user_gallery)) {
                    foreach ($user_gallery as $image_id) {
                        // Get the full URL for each image
                        $image_url = wp_get_attachment_url($image_id);

                        // Display the image with the complete URL and a delete button
                        echo '<div class="position-relative gallery-item" data-attachment-id="' . esc_attr($image_id) . '">';
                        echo '<img class="object-fit" width="100" height="100" src="' . esc_url($image_url) . '" />';
                        echo '</div>';
                    }
                }
                ?>
            </div>
