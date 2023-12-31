<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package baloochy
 */

get_header();
?>

    <div id="primary" class="hero top-gap-shop min-vh-lg-80">

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
