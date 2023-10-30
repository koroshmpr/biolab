<div class="d-flex gap-3 overflow-x-scroll align-items-start">
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
    if ($children) { ?>
        <?php
        foreach ($children as $subcat) {
            $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true); ?>
            <a class="" href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>">
                <div class="bg-white rounded-5 border border-1 border-info border-opacity-75">
                    <?php if (wp_get_attachment_url($thumbnail_id)) { ?>
                        <img height="150" src="<?= wp_get_attachment_url($thumbnail_id) ?>"
                             alt="<?= $subcat->name; ?>">
                    <?php } else { ?>
                        <?= get_field('author-image-default', 'option'); ?>
                    <?php } ?>
                </div>
                <h6 class="text-dark mt-2 fs-6"><?= $subcat->name; ?></h6>
                <p class="text-primary fs-4">(<?= $subcat->count; ?>)</p>
            </a>
            <?php
            wp_reset_postdata(); // Reset Query
        }
    }
    ?>
</div>