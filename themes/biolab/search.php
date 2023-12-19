<?php get_header(); ?>

<section class="container-fluid top-gap-shop hero min-vh-lg-80">
    <div class="row">
        <div class="text-white d-grid column-gap-3 d-lg-flex align-items-center justify-content-center">
            نتیجه جستجو برای :
            <h1 class="fw-bold ms-3 mt-3 mt-lg-0"> <?= the_search_query(); ?> </h1>
        </div>
        <div class="col-lg-6 col-11 mx-auto py-3">
            <?php
            $place = 'search-page';
            $sizeSearch = 'col';
            $inputClass = 'py-3 bg-white';
            $buttonClass = "px-4";
            $dropdownClass = 'px-3';
            $inputValue = esc_attr(get_search_query());
            $args = array(
                'inputValue' => $inputValue,
                'place' => $place,
                'size' => $sizeSearch,
                'inputClass' => $inputClass,
                'buttonClass' => $buttonClass,
                'dropdownClass' => $dropdownClass
            );
            get_template_part('template-parts/search-bar', null, $args); ?>
        </div>
    </div>
    <h2 class="py-5 text-white text-center">
        <?php
        // Get the selected post type from the URL query parameters
        $post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : '';
        // Check if a post type filter is applied
        if (!empty($post_type)) {
            $post_type_info = get_post_type_object($post_type);
            $post_type_label = $post_type_info->labels->name;
            echo ' جستحو در ' . $post_type_label;
        } else {
            echo ' نتایج جستجو کلی';
        }
        ?> </h2>
    <div class="container border border-info border-opacity-50 rounded-3 p-lg-4 p-2">
        <?php
        // Create a new WP_Query for the current post type (if filter is applied)
        $args = array(
            'post_type' => $post_type ? $post_type : array('post', 'product'),
            's' => get_search_query(),
        );
        $post_type_query = new WP_Query($args);
        if ($post_type_query->have_posts()) {
            echo '<div class="d-flex row-cols-xl-6 row-cols-costume row-cols-md-3 flex-wrap gap-3 flex-nowrap overflow-x-lg-scroll">';

            while ($post_type_query->have_posts()) {
                $post_type_query->the_post();
                $current_post_type = get_post_type();
                if ($current_post_type == 'product') {
                    get_template_part('template-parts/products/product-card');
                } elseif ($current_post_type == 'post') {
                    get_template_part('template-parts/blog/noimage-card');
                } elseif ($current_post_type == 'portfolio') {
                    get_template_part('template-parts/portfolio/portfolio-card');
                }
            }
            echo '</div>';
        } else {
            echo '<p class="fs-2 pt-5 text-center">موردی یافت نشد !</p>';
        }
        wp_reset_postdata(); // Reset the post data
        ?>
        <div class="pagination d-flex py-2 justify-content-center gap-3 align-items-center">
            <?php
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
            ));
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
