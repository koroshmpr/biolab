<?php get_header();

track_post_views(get_the_ID());


while (have_posts()) :

    the_post();

    $comment_count = get_comments_number(); // Get the number of comments for this post

    ?>
    <section class="top-gap-shop hero-squere">
        <div class="container">
            <div class="row align-items-start pb-4 justify-content-lg-between justify-content-center">
                <!--            sidebar-->
                <aside class="row justify-content-center col-lg-4 col-12 mx-lg-0">
                    <div class="img-fluid mb-5">
                        <img class="w-100 object-fit rounded-3 d-none d-lg-inline shadow-sm img-fluid"
                             src="<?= get_the_post_thumbnail_url(); ?>" width="368" height="368"
                             alt="<?= the_title(); ?>"/>
                    </div>
                    <?php get_template_part('template-parts/loop/post-sidebar'); ?>
                </aside>
                <div class="col-12 col-lg-8 order-first order-lg-last">
                    <!--                breadcrumb-->
                    <div class="p-1">
                        <nav class="row" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ul class="breadcrumb text-white d-flex fw-bold gap-2 list-unstyled">
                                <li class="breadcrumb-item">صفحه اصلی</li>
                                <?php if (get_queried_object()->post_type == 'post'): ?>
                                <li class="breadcrumb-item">بلاگ</li>
                                <li class="breadcrumb-item">
                                    <?php endif;
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
                            </ul>
                        </nav>
                    </div>
                    <!--                title-->
                    <h1 class="fw-bold text-white"><?= get_the_title(); ?></h1>
                    <div class="d-flex justify-content-between align-items-center">
                        <!--                    post detail-->
                        <div class="d-flex gap-2 align-items-center justify-content-start py-3 text-white text-opacity-50">
                            <?php get_template_part('template-parts/cards/post-detail/author-image'); ?>
                            <div>
                                <div class="fs-6">
                                    ازسال توسط
                                    <span class="fw-bold text-white">
                                 <?= get_the_author_meta('display_name', $post->post_author); ?>
                                </span>
                                </div>
                                <div class="fw-normal fs-6 d-lg-flex">
                                    <?php echo get_the_date('d  F , Y'); ?>
                                    <span class="d-flex px-lg-2 align-items-center">
                                زمان مطالعه :
                                <span class="fw-bold mx-1 my-0">
                                    <?= reading_time(); ?>
                                </span>
                                دقیقه
                                 </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-flex d-grid gap-lg-2 gap-1 align-items-center">
                            <?php
                            $post_id = get_the_ID();
                            $rating_value = get_post_meta($post_id, 'rating_value', true);

                            // Get total ratings and average rating
                            $total_ratings = get_post_meta($post_id, 'total_ratings', true);
                            $total_rating_value = get_post_meta($post_id, 'total_rating_value', true);
                            $average_rating = 0;

                            if (is_numeric($total_ratings) && is_numeric($total_rating_value) && $total_ratings > 0) {
                                $average_rating = round($total_rating_value / $total_ratings, 1);
                            }
                            // Display the stars and average rating
                            ?>
                            <a href="#rating" class="d-flex gap-1 align-items-center justify-content-center text-white">
                                <div class="rating-result">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $average_rating) { ?>
                                            <span class="star filled">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        </span>
                                        <?php } else { ?>
                                            <span class="star">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="currentColor" class="bi bi-star"
                                                 viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                            </svg>
                                        </span>
                                        <?php }
                                    }
                                    ?>
                                </div>
                                <div class="ratings-summary text-center">
                                    <?php
                                    echo '<span class="average-rating">' . $average_rating . '</span>';
                                    ?>
                                </div>
                            </a>
                            <div class="d-flex gap-2 align-items-stretch justify-content-center">
                                <a href="#comment-section"
                                   class="btn-white rounded-pill d-flex align-items-center gap-3 shadow-sm px-2 py-1 border-0 bg-white bg-opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                         fill="none">
                                        <path d="M5.66683 12.6667H5.3335C2.66683 12.6667 1.3335 12 1.3335 8.66667V5.33334C1.3335 2.66667 2.66683 1.33334 5.3335 1.33334H10.6668C13.3335 1.33334 14.6668 2.66667 14.6668 5.33334V8.66667C14.6668 11.3333 13.3335 12.6667 10.6668 12.6667H10.3335C10.1268 12.6667 9.92683 12.7667 9.80016 12.9333L8.80016 14.2667C8.36016 14.8533 7.64016 14.8533 7.20016 14.2667L6.20016 12.9333C6.0935 12.7867 5.84683 12.6667 5.66683 12.6667Z"
                                              stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.6641 7.33333H10.6701" stroke="white" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.99715 7.33333H8.00314" stroke="white" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.32967 7.33333H5.33566" stroke="white" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <?= $comment_count; ?></a>
                                <div class="d-none d-lg-inline vr bg-white"></div>
                                <a class="btn-white px-2 py-1 border-0 rounded-circle shadow-sm bg-white bg-opacity-10"
                                   href="#share-section">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                         fill="none">
                                        <path d="M11.3066 4.11333C12.64 5.04 13.56 6.51333 13.7466 8.21333"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M2.32666 8.24667C2.49999 6.55333 3.40666 5.08 4.72666 4.14667"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M5.45996 13.96C6.23329 14.3533 7.11329 14.5733 8.03996 14.5733C8.93329 14.5733 9.77329 14.3733 10.5266 14.0067"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M8.03986 5.13333C9.06343 5.13333 9.89319 4.30357 9.89319 3.28C9.89319 2.25643 9.06343 1.42667 8.03986 1.42667C7.01629 1.42667 6.18652 2.25643 6.18652 3.28C6.18652 4.30357 7.01629 5.13333 8.03986 5.13333Z"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M3.22003 13.28C4.2436 13.28 5.07337 12.4502 5.07337 11.4267C5.07337 10.4031 4.2436 9.57333 3.22003 9.57333C2.19646 9.57333 1.3667 10.4031 1.3667 11.4267C1.3667 12.4502 2.19646 13.28 3.22003 13.28Z"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M12.7801 13.28C13.8037 13.28 14.6334 12.4502 14.6334 11.4267C14.6334 10.4031 13.8037 9.57333 12.7801 9.57333C11.7565 9.57333 10.9268 10.4031 10.9268 11.4267C10.9268 12.4502 11.7565 13.28 12.7801 13.28Z"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="pt-2 mb-5 fs-5 text-white text-opacity-75"><?= get_the_excerpt();?></p>
                    <!--                thumbnail-->
                    <div class="img-fluid d-lg-none">
                        <img class="w-100 object-fit rounded-2" width="390" height="390"
                             src="<?= get_the_post_thumbnail_url(); ?>"
                             alt="<?= the_title(); ?>"/>
                    </div>
                    <!--                content-->
                    <article class="pt-5 post-content">
                        <?php the_content(); ?>
                        <div class="pb-3" id="share-section"></div>
                    </article>
                    <!--                rating-->
                    <div id="rating"
                         class="rating-section p-3 rounded bg-info bg-opacity-25 d-flex justify-content-between align-items-center my-5">
                        <p class="mb-0 fw-bold text-primary">چه میزان از این مقاله لذت بردید</p>
                        <div class="rating position-relative">
                            <div id="rating_loader"
                                 class="d-none position-absolute top-0 bottom-0 start-0 end-0 bd-blur z-2 d-flex align-items-center justify-content-center">
                                <div data-aos="zoom-in">
                                    <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                                </div>
                            </div>
                            <?php
                            $post_id = get_the_ID();
                            $rating_value = get_post_meta($post_id, 'rating_value', true);
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating_value) { ?>
                                    <button class="star filled btn p-0 text-primary" aria-label="rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                             fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    </button>
                                <?php } else { ?>
                                    <button class="star btn p-0 text-primary" aria-label="rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                             fill="currentColor" class="bi bi-star"
                                             viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                        </svg>
                                    </button>
                                <?php }
                            } ?>
                        </div>
                        <script>
                            jQuery(document).ready(function ($) {
                                $('.rating .star').click(function () {
                                    $('#rating_loader').removeClass('d-none');
                                    $(this).prevAll('.star').addBack().find('path').attr('d', 'M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z');
                                    $(this).nextAll('.star').find('path').attr('d', 'M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z');
                                    var ratingValue = $(this).index() + 1;
                                    $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                                        action: 'save_rating',
                                        post_id: <?php echo $post_id; ?>,
                                        rating_value: ratingValue
                                    });
                                    setTimeout(function () {
                                        $('#rating_loader').addClass('d-none');
                                    }, 700)
                                });
                            });
                        </script>
                    </div>
                    <!--                share button-->
                    <?php
                    $sizeSvgX = '20';
                    $sizeSvgY = '20';
                    $class = 'fill-success';
                    $mainClass = 'd-grid';
                    $colorSvg = '#5BBB7B';
                    $args = array(
                        'sizeSvgX' => $sizeSvgX,
                        'class' => $class,
                        'mainClass' => $mainClass,
                        'sizeSvgY' => $sizeSvgY,
                        'colorSvg' => $colorSvg
                    );
                    get_template_part('template-parts/share-button', null, $args); ?>
                    <!--                tags-->
                    <?php
                    $tags = get_the_tags();
                    if ($tags) { ?>
                        <div>
                            <p class="fw-bold fs-3 py-3">برچسب های این مقاله</p>
                            <ul class="d-flex gap-2 align-items-center list-unstyled flex-wrap">
                                <li class="px-2 text-primary py-2 rounded-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                         class="bi bi-tag-fill" viewBox="0 0 16 16">
                                        <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg>
                                </li>
                                <?php foreach ($tags as $tag) {
                                    echo '<li class="bg-success bg-opacity-10 px-3 text-success pt-2 pb-1 rounded-1">' . $tag->name . '</li>';
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <!--                author information-->
                    <?php get_template_part('template-parts/cards/post-detail/author-information'); ?>
                    <!--                comments-->
                    <div class="mt-5">
                        <?php
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile;
wp_reset_query();
get_footer(); ?>

