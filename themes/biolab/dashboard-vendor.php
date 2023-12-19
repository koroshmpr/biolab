<?php
/** Template Name: vendor dashboard */
get_header();
?>

    <div id="primary">

        <?php
        while (have_posts()) :
            the_post();

            // Use do_shortcode to process shortcodes in the content
            echo do_shortcode(get_the_content());

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </div><!-- #main -->

<?php
/*get_sidebar();*/
get_footer();
