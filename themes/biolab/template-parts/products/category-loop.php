<div class="d-flex gap-3 justify-content-start overflow-x-scroll align-items-end my-4">
    <?php
    $children = get_categories(array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'parent' => false,
        'pad_counts' => true,
        'hierarchical' => true,
        'hide_empty' => false,
        'exclude' => '16',
    ));
    // Get the current category ID from the body class
    $current_category_id = 0;
    $i = 0;
    if (is_tax('product_cat')) {
        $term = get_queried_object();
        if ($term) {
            $current_category_id = $term->term_id;
        }
    }
    if ($children) { ?>
        <?php
        foreach ($children as $subcat) {
            $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true);
            $category_class = 'border';
            if ($subcat->term_id === $current_category_id) {
                $category_class = 'border border-success border-2';
            }
            ?>
            <a class="" href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>" data-aos="fade-left" data-aos-duration="<?= $i;?>00">
                <div class="image-square bg-white rounded-5 border border-1 border-info border-opacity-75">
                    <?php if (wp_get_attachment_url($thumbnail_id)) { ?>
                        <img class="image-square <?= $category_class ?> object-fit-cover rounded-5" width="150" height="150" src="<?= wp_get_attachment_url($thumbnail_id) ?>"
                             alt="<?= $subcat->name; ?>">
                    <?php } else { ?>
                        <div class="image-square bg-white <?= $category_class ?> rounded-5 d-flex justify-content-center align-items-center">
                        <?= get_field('author-image-default', 'option'); ?>
                        </div>
                    <?php } ?>
                </div>
                <h6 class="text-dark text-opacity-75 text-center mt-3 fs-5"><?= $subcat->name; ?></h6>
            </a>
            <?php
            $i+=2;
            wp_reset_postdata(); // Reset Query
        }
    }
    ?>
</div>