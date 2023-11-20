<?php
/** Template Name: wishlist */
get_header();
?>

    <section  class="site-main hero top-gap-shop min-vh-100">
        <div class="container bg-white p-4 rounded-3">
            <?php
                // Use do_shortcode to process shortcodes in the content
                echo do_shortcode(get_the_content());
            ?>
        </div>
    </section><!-- #main -->

<?php
/*get_sidebar();*/
get_footer();
