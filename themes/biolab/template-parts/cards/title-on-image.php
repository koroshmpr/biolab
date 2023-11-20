<article class="rounded-5 card__title-on-image post-card object-fit position-relative overflow-hidden"
         style="height:400px;background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
    <a class="d-flex info_card h-100 flex-column justify-content-end align-items-start position-relative"
       href="<?php the_permalink(); ?>">
        <div class="px-3 py-1 bg-dark bg-opacity-25 w-100">
            <?php
            $category_detail = get_the_category($post->ID); ?>
            <h5 class="fs-5 mb-2 fw-bold text-success">
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
            <p class="text-white fs-6"> <?= get_the_title(); ?></p>
        </div>
    </a>
</article>