<form class="p-2 bg-white rounded-5 shadow-sm col-lg-10" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group d-flex gap-lg-3 align-items-center justify-content-center">
        <input <?= $args['inputValue'] ? 'value="' . $args['inputValue'] . '"' : ' '; ?> id="search-form" type="search" name="s" class="btn p-0 ps-2 col-5 col-md-5 text-primary text-start" placeholder="دنبال چه چیزی هستید؟" aria-label="Search">

        <!-- Hidden input for selected post type -->
        <input type="hidden" name="post_type" id="selected-post-type" value="">

        <button type="button" class="btn border-0 pe-0 text-dark border-start d-flex align-items-center py-0 ps-3 col-3 col-md-3 justify-content-evenly" data-bs-toggle="dropdown" aria-expanded="false">
            <span id="showType">دسته‌بندی</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 bi bi-chevron-down"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </button>

        <ul class="dropdown-menu">
            <?php
            $post_types = array('post', 'product');
            foreach ($post_types as $post_type) {
                $post_type_info = get_post_type_object($post_type);
                $post_type_label = $post_type_info->labels->name;
                echo '<li><a class="dropdown-item" href="#" data-post-type="' . $post_type . '">' . $post_type_label . '</a></li>';
            }
            ?>
        </ul>

        <button type="submit" class="btn-success btn text-white d-flex align-items-center rounded-pill px-5 py-1 col-4 col-md-3 justify-content-center" aria-label="Search">جستجو</button>
    </div>
</form>

<script>
    // Update the hidden input value and dropdown button text when a post type is selected
    document.querySelectorAll('.dropdown-item').forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            var selectedPostType = this.getAttribute('data-post-type');
            document.getElementById('selected-post-type').value = selectedPostType;
            if (selectedPostType == 'product') {
                document.getElementById('showType').innerHTML = 'محصول';
            }
            if (selectedPostType == 'post') {
                document.getElementById('showType').innerHTML = 'مقالات';
            }
        });
    });
</script>
