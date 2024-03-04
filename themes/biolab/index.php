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
<?php
$blog_page_id = get_option('page_for_posts');

if ($blog_page_id && get_field('page_description', $blog_page_id)) { ?>
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
                        <?php echo get_field('page_description', $blog_page_id); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>