<div class="text-center my-3 <?= $args['containerCLass'] ?? ''; ?>">
    <p class="fs-4 fw-bold text-center mb-3 <?= $args['headingClass'] ?? ''; ?>">
        این مطلب را در <br>
        شبکه های اجتماعی <span class="text-success">اشتراک</span> بگذارید
    </p>
    <?php
    // Get the current post URL
    $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // Get the post title and encode it for use in the share links
    $postTitle = urlencode(get_the_title());
    // Get the author's Twitter handle (replace "twitter" with your user meta key)
    $twitterHandle = get_the_author_meta('twitter');
    // Get the website name for use in the Twitter share link
    $websiteName = get_bloginfo('name');
    ?>
    <ul class="col-12 d-flex list-unstyled gap-2 m-0 align-items-center overflow-hidden justify-content-center p-3 <?= $args['class'] ?? ''; ?> ">
        <li data-aos="fade-up" data-aos-duration="500">
            <a aria-label="share-in-aparat"
               class="bg-white shadow-sm <?= $args['linkClass'] ?? 'px-2 py-1 rounded-circle'; ?>"
               href="https://www.aparat.com/share?url=<?php echo urlencode($postUrl); ?>">
                <?php get_template_part('template-parts/svg/social/aparat', null, $args); ?>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
            <a aria-label="share-in-telegram"
               class="bg-white shadow-sm <?= $args['linkClass'] ?? 'px-2 py-1 rounded-circle'; ?>"
               href="https://telegram.me/share/url?url=<?php echo urlencode($postUrl); ?>&text=<?php echo $postTitle; ?>">
                <?php get_template_part('template-parts/svg/social/telegram', null, $args); ?>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <a aria-label="share-in-youtube"
               class="bg-white shadow-sm <?= $args['linkClass'] ?? 'px-2 py-1 rounded-circle'; ?>"
               href="https://www.youtube.com/share?url=<?php echo urlencode($postUrl); ?>">
                <?php get_template_part('template-parts/svg/social/youtube', null, $args); ?>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
            <a aria-label="share-in-instagram"
               class="bg-white shadow-sm <?= $args['linkClass'] ?? 'px-2 py-1 rounded-circle'; ?>"
               href="https://www.instagram.com/share?url=<?php echo urlencode($postUrl); ?>">
                <?php get_template_part('template-parts/svg/social/instagram', null, $args); ?>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="400" data-aos-duration="500">
            <a aria-label="share-in-twitter"
               class="bg-white shadow-sm <?= $args['linkClass'] ?? 'px-2 py-1 rounded-circle'; ?>"
               href="https://twitter.com/intent/tweet?text=<?php echo urlencode('Check out this awesome post from ' . $websiteName . ': ') . $postTitle; ?>&url=<?php echo urlencode($postUrl); ?>&via=<?php echo urlencode($twitterHandle); ?>">
                <?php get_template_part('template-parts/svg/social/twitter', null, $args); ?>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="500" data-aos-duration="500">
            <a aria-label="share-in-linkedin"
               class="bg-white shadow-sm <?= $args['linkClass'] ?? 'px-2 py-1 rounded-circle'; ?>"
               href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($postUrl); ?>&title=<?php echo $postTitle; ?>">
                <?php get_template_part('template-parts/svg/social/linkedin', null, $args); ?>
            </a>
        </li>
    </ul>
</div>