<?php
/**
 * Template Name: Catalogs Vendors
 */

get_header();

?>
<section class="hero top-gap-shop min-vh-lg-80">
    <div class="container">
        <div class="d-flex justify-content-center">
            <?php if (!empty($success_message)) : ?>
                <div class="alert alert-success" id="success-message"><?php echo esc_html($success_message); ?></div>
            <?php endif; ?>
            <form action="" class="bg-white rounded-3 p-4 row justify-content-center gy-2 col-lg-4 col-11" id="catalog-form">

                <!-- Add Nonce Field -->
                <?php wp_nonce_field('catalog_form_nonce', 'catalog_nonce'); ?>

                <!-- Name Input -->
                <label for="name">نام کاتالوگ:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <!-- Pages Input -->
                <label for="pages">تعداد صفحات:</label>
                <input type="number" id="pages" name="pages" required>
                <br>
                <!-- Cover Input -->
                <label for="cover">کاور:</label>
                <input type="file" id="cover" name="cover" accept="image/*">
                <br>
                <!-- Catalogue Input -->
                <label for="catalogue">فایل کاتالوگ:</label>
                <input type="file" id="catalogue" name="catalogue" accept=".pdf, .doc, .docx">
                <br>
                <!-- Submit Button -->
                <button class="btn btn-success py-1 col-6" type="button" onclick="submitForm()">
                    ثبت
                </button>
            </form>
            <script>
                function submitForm() {
                    // Get form data using FormData
                    const formData = new FormData(document.getElementById('catalog-form'));

                    // Log form data to console
                    for (var pair of formData.entries()) {
                        console.log(pair[0] + ', ' + pair[1]);
                    }

                    // Get the nonce value
                    const nonce = document.getElementById('catalog_nonce').value;

                    // AJAX request to WordPress REST API
                    jQuery.ajax({
                        url: '/wp-json/custom/v1/catalogues/',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-WP-Nonce', nonce);
                        },
                        success: function(response) {
                            console.log('Data added successfully:', response);
                            document.getElementById('success-message').innerHTML = 'Your request has been submitted successfully.';
                        },
                        error: function(error) {
                            console.error('Error adding data:', error);
                            // Optionally, show an error message to the user
                        }
                    });
                }
            </script>

        </div>
    </div>
</section>

<?php
get_footer(); // Ensure the footer is included
?>
