<section class="container py-3">
    <div class="d-flex mb-3 justify-content-between border-bottom border-2 border-info border-opacity-75">
        <h4 class="mb-0 pb-3 fs-4 border-bottom border-success border-3 fw-bold">منتخب بایولب</h4>
        <a class="btn btn-arrow text-dark" href="">مشاهده همه</a>
    </div>
    <div class="row row-cols-lg-4 g-3 row-cols-1 pt-3 pt-lg-0 pb-5 justify-content-lg-between justify-content-center">
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'meta_value_num',
            'meta_key' => 'post_views',
            'order' => 'DESC',
            'posts_per_page' => '4',
            'ignore_sticky_posts' => true
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
            $i = 0;
            /* Start the Loop */
            ?>
            <?php while ($loop->have_posts()) :
            $loop->the_post(); ?>
            <div data-aos="fade-up">
                <?php get_template_part('template-parts/cards/title-on-image'); ?>
            </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</section>