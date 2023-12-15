<?php
// Template Name: shortcode
get_header();
?>

    <main id="primary" class="site-main hero top-gap-shop min-vh-lg-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="<?= get_field('container'); ?>">
                    <div class="border-bottom border-info border-opacity-50 d-flex my-3 justify-content-center">
                        <h1 class="border-bottom  border-success fs-3 mb-0 text-white pb-3 border-2 fw-bold"><?= get_the_title(); ?></h1>
                    </div>
                    <?php
                    // Use do_shortcode to process shortcodes in the content
                    echo do_shortcode(get_the_content());
                    ?>
                </div>
            </div>

        </div>
    </main><!-- #main -->
<?php
/*get_sidebar();*/
get_footer();
