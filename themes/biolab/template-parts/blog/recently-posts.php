<div class="container py-5">
    <div class="d-flex justify-content-center align-items-center py-5">
        <div class="col-lg-6 text-center">
            <h4 class="mb-3 fs-2 fw-bold"><?= get_field('blog_title'); ?></h4>
            <p><?= get_field('blog_description'); ?></p>
        </div>
    </div>
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'order' => 'DESC',
        'posts_per_page' => '4',
        'ignore_sticky_posts' => true
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
    $i = 0;
    /* Start the Loop */
    ?>
    <div class="d-flex flex-nowrap row-cols-lg-4 row-cols-costume gy-2 pt-lg-3 pb-lg-5 overflow-x-scroll">
        <?php while ($loop->have_posts()) :
            $loop->the_post(); ?>
        <article class="p-2">
            <?php get_template_part('template-parts/blog/noimage-card'); ?>
        </article>
        <?php
        endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</div>