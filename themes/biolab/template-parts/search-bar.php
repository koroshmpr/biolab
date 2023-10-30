<form class="search-form p-2 py-4 py-lg-2 bg-white rounded-pill shadow-sm" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group d-flex gap-3 align-items-center">
        <input id="search-form" type="search" name="s" class="form-control col-12 col-lg-8 w-50 text-primary border-0 shadow-0 text-center text-lg-start" placeholder="دنبال چه چیزی هستید؟" aria-label="Search">
        <button type="button" class="btn text-dark border-start d-flex align-items-center py-0 ps-3 col-12 col-lg justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">دسته‌بندی</button>
        <ul class="dropdown-menu">
            <?php
            $post_types = array('post', 'product');
            foreach ($post_types as $post_type) {
                $post_type_info = get_post_type_object($post_type);
                $post_type_label = $post_type_info->labels->name;
                $search_query = get_search_query();
                $search_url = esc_url(home_url('/')) . '?s=' . $search_query;
                if ($post_type !== 'post') {
                    $search_url .= '&post_type=' . $post_type;
                }
                echo '<li><a class="dropdown-item" href="' . $search_url . '">' . $post_type_label . '</a></li>';
            }
            ?>
        </ul>
        <button type="submit" class="btn-success btn text-white d-flex align-items-center rounded-pill px-5 col-12 col-lg justify-content-center" aria-label="Search">جستجو</button>
    </div>
</form>
