<?php
/** Template Name: Blog Page */

get_header(); ?>
    <section class="hero top-gap-shop">
        <div class="container">
            <div class="row row-cols-lg-4 g-3 row-cols-1 pt-3 pb-5 justify-content-lg-between justify-content-center">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'posts_per_page' => '4',
                    'ignore_sticky_posts' => true
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) :
                    $i = 0;
                    /* Start the Loop */
                    while ($loop->have_posts()) :
                        $loop->the_post(); ?>
                        <div data-aos="fade-up">
                            <?php
                            $styleBg = '#F9FBFA';
                            $bgColor = ' ';
                            $args = array(
                                'style-bg' => $styleBg,
                                'bgColor' => $bgColor,
                            );
                            get_template_part('template-parts/blog/noimage-card', null, $args); ?>
                        </div>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 px-3 px-lg-0 gx-5 gy-2 g-lg-0 justify-content-lg-between justify-content-center mt-lg-5 py-5">
                <?php
                $args2 = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'posts_per_page' => '3',
                    'ignore_sticky_posts' => true,
                    'offset' => 3
                );
                $loop = new WP_Query($args2);
                if ($loop->have_posts()) :
                    $i = 0;
                    /* Start the Loop */
                    while ($loop->have_posts()) :
                        $loop->the_post();
                        get_template_part('template-parts/cards/title-side-image');
                    endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php
/// most visited post
get_template_part('template-parts/blog/selected-posts');
// recetly added post
get_template_part('template-parts/blog/post-loop-sidebar');
?>
<?php get_footer(); ?>