</main>
<?php
$product_archive_id = wc_get_page_id('shop');
$page_description = get_field('page_description', is_shop() ? $product_archive_id : '');

if ($page_description) { ?>
    <section class="container position-relative rounded-4 p-2 p-lg-4 mt-3 mt-lg-0 mb-5" style="background-color: #F9FBFA;">
        <div class="accordion accordion-preview" id="categoryAccordion">
            <div class="accordion-item bg-transparent border-0">
                <h6 class="accordion-header position-absolute bottom-0 start-50 translate-middle-x z-1 mb-n3" id="categoryHeader">
                    <button class="btn text-primary bg-white border collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                        مشاهده بیشتر
                    </button>
                </h6>
                <div id="categoryCollapse" class="accordion-collapse collapse" aria-labelledby="categoryHeader"
                     data-bs-parent="#categoryAccordion">
                    <div class="accordion-body">
                        <?php echo $page_description; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
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
