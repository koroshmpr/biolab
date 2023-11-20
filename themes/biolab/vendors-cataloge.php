<?php
// Template Name: Catalogs vendors
get_header();

// Check if the user is a vendor (you may need to adjust this check based on your user roles and conditions)
if (dokan_is_user_seller(get_current_user_id())) {
    // Handle form submissions
    if (isset($_POST['submit_catalog'])) {
        // Process and save catalog data to the database
        $title = sanitize_text_field($_POST['catalog_title']);
        $cover_image = sanitize_text_field($_POST['catalog_cover_image']);
        $pdf_file = sanitize_text_field($_POST['catalog_pdf_file']);

        // Save the data to your custom table or post type
        // You should add your own code to handle data storage
    }

    if (isset($_POST['submit_video'])) {
        // Process and save video data to the database
        $video_title = sanitize_text_field($_POST['video_title']);
        $video_description = sanitize_text_field($_POST['video_description']);
        $video_file = sanitize_text_field($_POST['video_file']);

        // Save the data to your custom table or post type
        // You should add your own code to handle data storage
    }
    ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main hero top-gap-shop min-vh-100" role="main">
            <div class="container">
                <div class="row justify-content-center gap-5">
                    <!-- Catalog Form -->
                    <form class="col-lg-3 bg-white rounded-3 p-3 row gap-4" method="post">
                        <input class="rounded-3 p-3 border-info border-1 border-opacity-50 shadow-none" type="text" placeholder="نام" name="catalog_title"
                               id="catalog_title" required>
                        <div>
                            <label for="catalog_cover_image">کاور کاتالوگ</label>
                            <input type="file" name="catalog_cover_image" id="catalog_cover_image" required>
                        </div>
                        <div>
                            <label for="catalog_pdf_file">کاتالوگ</label>
                            <input type="file" name="catalog_pdf_file" id="catalog_pdf_file" required>
                        </div>
                        <input class="btn btn-success py-1 w-100 rounded-3" type="submit" name="submit_catalog" value="ذخیره">
                    </form>
                    <div class="catalogue-list col-lg-8 row row-cols-3 bg-white rounded-3 p-5 border-1 border-info">
                        <?php // Display existing catalogs
                        $user_id = get_current_user_id();
                        $user_catalogs = get_user_meta($user_id, 'catalogs', true); // Assuming 'catalogs' is the meta key for storing catalogs

                        if (!empty($user_catalogs)) {
                        echo '<div class="catalogue-list col-lg-8 row row-cols-3 bg-white rounded-3 p-5 border-1 border-info">';

                            foreach ($user_catalogs as $catalog) {
                            // Display each catalog
                            echo '<div class="col">';
                                echo '<h3>' . esc_html($catalog['title']) . '</h3>';
                                echo '<img src="' . esc_url($catalog['cover_image']) . '" alt="Cover Image" />';
                                echo '<a href="' . esc_url($catalog['pdf_file']) . '">Download PDF</a>';
                                // You can format and display other catalog details as needed
                                echo '</div>';
                            }

                            echo '</div>';
                        } else {
                        // ... (Else block remains the same)
                        }?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
}

else { ?>
    <section class="hero top-gap-shop">
        <div class="row">
            <a href="/" class="btn btn-white">بازگشت</a>
        </div>
    </section>
<?php }

get_footer();
?>
