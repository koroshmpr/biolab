</main>
<?php
if ( ! is_page('dashboard') ) { // Check if it's not the Dokan dashboard page
    ?>
    <footer class="rounded-3">
        <?php
        // Main footer
        get_template_part('template-parts/layout/footer/index');
        get_template_part('template-parts/layout/backToTop');
        if (is_singular('services')) {
            get_template_part('template-parts/backToArchive');
        }
        ?>
    </footer>
    <?php
}
if (is_singular('product')) { ?>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px)">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-white bg-opacity-10 p-3 border-white border-opacity-25 rounded-0">
                <div class="modal-body text-center overflow-hidden">
                    <img class="img-fluid position-relative product-image__modal" src="<?= get_field('brand_logo_img', 'option')['url']; ?>" alt="Full-size Image">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModal" aria-hidden="true" style="backdrop-filter: blur(8px)">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-white bg-opacity-10 p-3 border-white border-opacity-25 rounded-0">
                <div class="modal-body text-center overflow-hidden">
                    <video controls class="img-fluid position-relative product-image__modal" src="<?= get_field('video_file')['url']; ?>" alt="Full-size Image">
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
