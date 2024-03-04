<div class="accordion accordion-flush row p-2 pb-1 bg-white rounded-4 mt-3" id="category-dropdown">
    <?php
    $post_categories = get_categories(array(
        'taxonomy' => 'category', // Change to the taxonomy you are using for posts
        'orderby' => 'name',
        'parent' => 0,
        'pad_counts' => true,
        'hierarchical' => true,
        'hide_empty' => false,
    ));

    if ($post_categories) {
        foreach ($post_categories as $post_cat) {
            $thumbnail_id = get_term_meta($post_cat->term_id, 'thumbnail_id', true);
            $post_cat_id = 'post-cat-' . $post_cat->term_id; // Generate a unique ID for each post category
            ?>
            <div class="accordion-item my-1 border-info border border-1 overflow-hidden rounded-4">
                <h5 class="accordion-header rounded-4 fs-6">
                    <button class="py-3 px-2 d-flex justify-content-between accordion-button collapsed bg-white shadow-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#<?= $post_cat_id ?>" aria-expanded="false"
                            aria-controls="<?= $post_cat_id ?>">
                        <h6 class="category-title fw-bold mb-0 fs-6"><?= $post_cat->name; ?></h6>
                        <a class="me-auto ms-3" href="<?= get_term_link($post_cat->term_id); ?>">
                            <svg width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
                            </svg>
                        </a>
                    </button>

                </h5>
                <div id="<?= $post_cat_id ?>" class="accordion-collapse collapse" data-bs-parent="#category-dropdown">
                    <div class="accordion-body">
                        <?php
                        // Get all subcategories of the current post category
                        $subcategories = get_categories(array(
                            'taxonomy' => 'category', // Change to the taxonomy you are using for posts
                            'orderby' => 'name',
                            'parent' => $post_cat->term_id,
                            'hide_empty' => false,
                        ));

                        if ($subcategories) {
                            echo '<ul>';
                            foreach ($subcategories as $subcategory) {
                                echo '<li><a href="' . get_term_link($subcategory) . '">' . $subcategory->name . '</a></li>';
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
