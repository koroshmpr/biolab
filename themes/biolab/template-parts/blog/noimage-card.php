<div class="rounded-3 <?= $args['bgColor'] ?? 'bg-info bg-opacity-25'; ?> p-4" style="background-color: <?= $args['style-bg'] ?? '';?>">
    <div class="d-flex gap-2">
        <?php
        $sizeSvgX = '90';
        $sizeSvgY = '90';
        $args = array(
            'sizeSvgY' => $sizeSvgY,
            'sizeSvgX' => $sizeSvgX
        );
        get_template_part('template-parts/cards/post-detail/author-image', null, $args); ?>
        <div>
           <?php if(!is_search()) { ?>
               <p class="text-lg-start mb-0">ارسال توسط
                   <span class="fw-bold"><?= get_the_author_meta('nickname', get_queried_object()->post_author); ?></span>
               </p>
           <?php }?>
            <span><?php echo get_the_date('d  F , Y'); ?></span>
        </div>
    </div>
    <div class="d-flex gap-2 py-3">
       <span class="fs-6 fw-bold">
                    <?php $category_detail = get_the_category($post->ID);
                    $category_count = count($category_detail);
                    $i = 0;
                    foreach ($category_detail as $category) {
                        echo $category->name;
                        if (++$i !== $category_count) {
                            echo ' - ';
                        }
                    }
                    ?>
           </span>
        .
        <span><?= reading_time(); ?> دقیقه برای خواندن</span>
    </div>
    <p class="fs-3"> <?= get_the_title(); ?></p>
    <a class="fw-bold ps-0 text-primary btn btn-arrow" href="<?php the_permalink(); ?>">
        ادامه مطلب
    </a>
</div>