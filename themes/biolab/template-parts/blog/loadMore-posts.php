<section>
    <div class="d-flex mb-3 justify-content-between border-bottom border-2 border-info border-opacity-75">
        <h4 class="mb-0 pb-3 fs-4 border-bottom border-success border-3 fw-bold">آخرین مقالات</h4>
        <a class="btn btn-arrow text-dark" href="">مشاهده همه</a>
    </div>
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'order' => 'DESC',
        'posts_per_page' => '-1',
        'ignore_sticky_posts' => true
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
    $i = 0;
    /* Start the Loop */
    ?>
    <div class="row gy-2 pt-3">
        <?php while ($loop->have_posts()) :
            $loop->the_post();
            get_template_part('template-parts/blog/title-side-image_big');
        endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
    <div class="py-5 text-center">
        <a class="btn btn-success px-5 py-1 rounded-pill" href="">مقالات بیشتر</a>
    </div>
</section>