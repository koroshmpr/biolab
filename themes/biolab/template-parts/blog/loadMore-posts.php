<section>
    <div class="d-flex mb-3 justify-content-between border-bottom border-2 border-info border-opacity-75">
        <h4 class="mb-0 pb-3 fs-4 border-bottom border-success border-3 fw-bold">آخرین مقالات</h4>
        <a class="btn btn-arrow text-dark" href="">مشاهده همه</a>
    </div>
    <?php
    $posts_per_page = get_option('posts_per_page');
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'ignore_sticky_posts' => true
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <div class="row gy-2 pt-3" id="posts-container">
            <?php while ($loop->have_posts()) :
                $loop->the_post();
                get_template_part('template-parts/blog/title-side-image_big');
            endwhile; ?>
        </div>
        <div class="py-5 text-center">
            <?php
            if ($loop->found_posts > $posts_per_page) {
                ?>
                <button class="btn btn-success px-5 py-1 rounded-pill load-more">مقالات بیشتر</button>
            <?php } ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>
</section>
<script>
    jQuery(function ($) {
        $('.load-more').click(function () {
            var button = $(this),
                data = {
                    'action': 'loadmore',
                    'query': load_more_params.posts,
                    'page': load_more_params.current_page
                };

            $.ajax({
                url: load_more_params.ajaxurl,
                data: data,
                type: 'POST',
                success: function (data) {
                    if (data) {
                        button.before(data);
                        load_more_params.current_page++;
                        if (load_more_params.current_page == load_more_params.max_page)
                            button.remove();
                    } else {
                        button.remove();
                    }
                }
            });
        });
    });

</script>