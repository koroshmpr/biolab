<article class="row gap-lg-1 align-items-center mb-4">
    <img class="col-lg-4 col-6 rounded-5 object-fit" height="220" src="<?php echo the_post_thumbnail_url(); ?>"
         alt="<?= get_the_title(); ?>">
    <div class=" gap-2 col">
        <span class="fw-normal fs-6 d-flex gap-1 align-items-center">
            <?php get_template_part('template-parts/svg/clock');
            echo get_the_date('d  F , Y'); ?>
        </span>
        <h5 class="fs-6 fw-bold my-3">
            <?php $category_detail = get_the_category($post->ID); ?>
            <?php
            $category_count = count($category_detail);
            $i = 0;
            foreach ($category_detail as $category) {
                echo $category->name;
                if (++$i !== $category_count) {
                    echo ' - ';
                }
            }
            ?>
        </h5>
        <p class="fs-6 mb-0 text-dark px-0"><?= get_the_title(); ?></p>
        <a class="fw-bold text-success mt-4 ps-0 btn btn-arrow" href="<?php the_permalink(); ?>">ادامه مطلب</a>
    </div>
</article>