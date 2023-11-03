    <div class="accordion accordion-flush row p-2 pb-1 bg-white rounded-4 mt-3" id="category-dropdown">
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
        if ($children) {
            foreach ($children as $subcat) {
                $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true);
                $subcat_id = 'subcat-' . $subcat->term_id; // Generate a unique ID for each subcategory
                ?>
                <div class="accordion-item my-1 border-info border border-1 overflow-hidden rounded-4">
                    <h5 class="accordion-header rounded-4">
                        <button class="d-flex justify-content-between accordion-button collapsed bg-white shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#<?= $subcat_id ?>" aria-expanded="false"
                                aria-controls="<?= $subcat_id ?>">
                            <h6 class="category-title fw-bold mb-0 fs-6"><?= $subcat->name; ?></h6>
                            <p class="mb-0 text-primary small fw-bold pe-2 ms-auto">
                                <?= $subcat->count; ?>
                                <span class="ps-1">کالا</span>
                            </p>
                        </button>
                    </h5>
                    <div id="<?= $subcat_id ?>" class="accordion-collapse collapse" data-bs-parent="#category-dropdown">
                        <div class="accordion-body">
                            <?php
                            // Get the subcategories of the current parent category
                            $subcategories = get_categories(array(
                                'taxonomy' => 'product_cat',
                                'orderby' => 'name',
                                'parent' => $subcat->term_id,
                                'hide_empty' => false,
                            ));

                            if ($subcategories) {
                                echo '<ul>';
                                foreach ($subcategories as $subcategory) {
                                    echo '<li><a href="' . get_term_link($subcategory) . '">' . $subcategory->name . '</a></li>';
                                }
                                echo '</ul>';
                            } else { ?>
                                <a href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>"><?= $subcat->name; ?></a>
                            <?php }
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
