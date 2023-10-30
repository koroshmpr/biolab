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
    $children = get_categories(array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'pad_counts' => false,
        'hierarchical' => 1,
        'hide_empty' => true
    )); ?>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-2 col-7 px-0">
                <nav id="myTab"
                     class="nav nav-pills flex-nowrap flex-row flex-lg-column list-group border-end border-1 border-info overflow-x-scroll">
                    <?php
                    if ($children) {
                        foreach ($children as $key => $subcat) {
                            $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true); ?>
                            <a data-bs-toggle="pill"
                               href="#category_tab<?= $key; ?>"
                               class="<?= $key == 1 ? 'active ' : ' '; ?> w--lg-auto col-2 col-lg gap-2 p-lg-3  py-3 px-2 text-lg-start text-center list-group-item-action text-primary fw-bold category-link">
                                <?= $subcat->name; ?>
                            </a>
                            <?php
                            wp_reset_postdata(); // Reset Query
                        }
                    }
                    ?>
                </nav>
            </div>
            <div class="col-lg-9 tab-content p-3 overflow-scroll">
                <?php
                foreach ($children as $key => $subcat) {
                $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true); ?>
                <article class="tab-pane fade <?= $key == 1 ? 'show active' : ''; ?>"
                         id="category_tab<?= $key; ?>">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => 1,
                        'posts_per_page' => '12',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $subcat->term_taxonomy_id,
                                'operator' => 'IN'
                            )
                        )
                    );
                    $loop = new WP_Query($args); ?>
                    <div class="mb-lg-3 mb-4 border-start border-3 border-success ps-2 bg-info bg-opacity-10 text-dark text-opacity-50"><?= $subcat->name; ?></div>
                    <div class="row row-cols-2 row-cols-lg-6">

                        <?php

                        if ($loop->have_posts()) {
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <a class="p-2 hover_text-primary" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        <?php endwhile;
                        if (wp_get_attachment_url($thumbnail_id)) { ?>
                            <img class="position-absolute end-0 top-0 opacity-25 object-fit col-5 col-lg-2"
                                 src="<?= wp_get_attachment_url($thumbnail_id); ?>"
                                 alt="<?= $subcat->name; ?>">
                        <?php } }
                        wp_reset_postdata();
                        ?>
                    </div>
                </article>
            <?php } ?>
            </div>
        </div>
    </div>

</div>