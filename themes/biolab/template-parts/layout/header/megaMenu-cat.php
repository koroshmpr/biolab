<button class="btn btn-white rounded-4 category-dropdown__button py-1 fw-bold" type="button" data-bs-toggle="dropdown"
        data-bs-auto-close="false" aria-expanded="false">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 bi bi-list"
         viewBox="0 0 16 16">
        <path fill-rule="evenodd"
              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </svg>
    دسته‌بندی
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 bi bi-chevron-down"
         viewBox="0 0 16 16">
        <path fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
    </svg>
</button>
<div class="col-11 col-lg-12 category-dropdown dropdown-menu container mt-n2 py-0 overflow-hidden"
     aria-labelledby="dropdownMenuButton">
    <?php
    $excluded_category_id = 16;
    $parent_categories = get_categories(array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'pad_counts' => false,
        'hierarchical' => 1,
        'hide_empty' => false,
        'exclude' => $excluded_category_id,
        'parent' => 0
    )); ?>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-3 px-0">
                <nav id="myTab"
                     class="nav nav-pills flex-nowrap vh-lg-80 flex-row flex-lg-column list-group border-end border-1 border-info overflow-scroll">
                    <?php
                    if ($parent_categories) {
                        foreach ($parent_categories as $key => $parent_cat) {
                            $thumbnail_id = get_term_meta($parent_cat->term_id, 'thumbnail_id', true);
                            ?>
                            <a data-bs-toggle="pill"
                               href="#category_tab<?= $key; ?>"
                               class="<?= $key == 1 ? 'active ' : ' '; ?> w--lg-auto d-flex justify-content-between col-2 col-lg gap-2 p-lg-3  py-3 px-2 text-lg-start text-center list-group-item-action text-primary fw-bold category-link">
                                <?= $parent_cat->name; ?>
                                <span onclick="javascript:window.location='<?= get_term_link($parent_cat); ?>';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </span>
                            </a>
                            <?php
                            wp_reset_postdata(); // Reset Query
                        }
                    }
                    ?>

                </nav>
            </div>
            <div class="col-lg-9 tab-content p-3 overflow-scroll" style="height: 80vh;">
                <?php
                foreach ($parent_categories as $key => $parent_cat) {
                    $thumbnail_id = get_term_meta($parent_cat->term_id, 'thumbnail_id', true); ?>
                    <article class="tab-pane h-100 fade <?= $key == 1 ? 'show active' : ''; ?>"
                             id="category_tab<?= $key; ?>">
                        <div class="row gap-2 p-lg-4 overflow-y-scroll align-items-start h-auto">
                            <?php
                            // Loop for subcategories
                            $subcategories = get_categories(array(
                                'taxonomy' => 'product_cat',
                                'orderby' => 'name',
                                'parent' => $parent_cat->term_id,
                                'hide_empty' => false,
                            ));

                            if ($subcategories) {
                                foreach ($subcategories as $sub_cat) {
                                    $thumbnail_id_sub = get_term_meta($sub_cat->term_id, 'thumbnail_id', true);
                                    ?>
                                    <a class="border-start border-3 border-success ps-2 bg-info bg-opacity-10 text-dark text-opacity-75"
                                       href="<?= get_term_link($sub_cat); ?>"><?= $sub_cat->name; ?></a>
                                    <?php
                                    // Loop for subcategories of the current subcategory
                                    $sub_subcategories = get_categories(array(
                                        'taxonomy' => 'product_cat',
                                        'orderby' => 'name',
                                        'parent' => $sub_cat->term_id,
                                        'hide_empty' => false,
                                    ));

                                    if ($sub_subcategories) {
                                        foreach ($sub_subcategories as $sub_sub_cat) {
                                            ?>
                                            <a class="ps-3 row align-items-start"
                                               href="<?= get_term_link($sub_sub_cat); ?>">
                                                <div class="border-start border-success border-opacity-50 border-2 text-opacity-75"><?= $sub_sub_cat->name; ?></div>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>

                                <?php }
                            }
                            ?>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
