<nav class="row py-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ul class="breadcrumb text-white d-flex fw-bold gap-1 list-unstyled justify-content-center mb-0">
        <li class="breadcrumb-item text-white text-opacity-50">صفحه اصلی</li>
        <?php if (get_queried_object()->post_type == 'post'){ ?>
            <li class="breadcrumb-item">بلاگ</li>
            <li class="breadcrumb-item">
                <?php
                $category_detail = get_the_category($post->ID);
                $category_count = count($category_detail);
                $i = 0;
                foreach ($category_detail as $category) {
                    echo $category->name;
                    if (++$i !== $category_count) {
                        echo ' - ';
                    }
                } ?>
            </li>
        <?php };?>
        <?php if (get_queried_object()->post_type == 'page') {?>
            <li class="breadcrumb-item text-success">
            <?= get_the_title();?>
            </li>
        <?php } ?>
    </ul>
</nav>