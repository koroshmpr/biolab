<div class="accordion accordion-flush row p-2 pb-1 bg-white rounded-4 mt-3" id="category-dropdown">
    <?php
    $parent_categories = get_categories(array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'parent' => 0,
        'pad_counts' => true,
        'hierarchical' => true,
        'hide_empty' => false,
        'exclude' => '16',
    ));

    if ($parent_categories) {
        foreach ($parent_categories as $parent_cat) {
            $thumbnail_id = get_term_meta($parent_cat->term_id, 'thumbnail_id', true);
            $parent_cat_id = 'parent-cat-' . $parent_cat->term_id; // Generate a unique ID for each parent category
            ?>
            <div class="accordion-item my-1 border-info border border-1 overflow-hidden rounded-4">
                <h5 class="accordion-header rounded-4 fs-6">
                    <button class="py-3 px-2 d-flex justify-content-between accordion-button collapsed bg-white shadow-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#<?= $parent_cat_id ?>" aria-expanded="false"
                            aria-controls="<?= $parent_cat_id ?>">
                        <h6 class="category-title fw-bold mb-0 fs-6"><?= $parent_cat->name; ?></h6>
<!--                        <p class="mb-0 text-primary small fw-bold pe-2 ms-auto">-->
<!--                            --><?//= $parent_cat->count; ?>
<!--                            <span class="ps-1">کالا</span>-->
<!--                        </p>-->
                    </button>
                </h5>
                <div id="<?= $parent_cat_id ?>" class="accordion-collapse collapse" data-bs-parent="#category-dropdown">
                    <div class="accordion-body">
                        <?php
                        // Get all subcategories of the current parent category
                        $subcategories = get_categories(array(
                            'taxonomy' => 'product_cat',
                            'orderby' => 'name',
                            'parent' => $parent_cat->term_id,
                            'hide_empty' => false,
                        ));

                        if ($subcategories) {
                            echo '<ul>';
                            foreach ($subcategories as $subcategory) {
                                echo '<li><a href="' . get_term_link($subcategory) . '">' . $subcategory->name . '</a>';

                                // Get sub-subcategories (depth more than 2)
                                $sub_subcategories = get_categories(array(
                                    'taxonomy' => 'product_cat',
                                    'orderby' => 'name',
                                    'parent' => $subcategory->term_id,
                                    'hide_empty' => false,
                                ));

                                if ($sub_subcategories) {
                                    echo '<ul>';
                                    foreach ($sub_subcategories as $sub_subcategory) {
                                        echo '<li><a href="' . get_term_link($sub_subcategory) . '">' . $sub_subcategory->name . '</a></li>';
                                    }
                                    echo '</ul>';
                                }

                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata(); // Reset Query
        }
    }
    ?>
</div>
