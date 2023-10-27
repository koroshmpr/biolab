<section class="hero">
    <div class="container p-lg-5">
        <div class="row justify-content-lg-between justify-content-center align-content-center">
            <div class="col-lg-6 my-auto">
                <h1 class="display-4 text-white fw-bold"><?= get_field('hero_title'); ?></h1>
                <p class="fs-5 text-opacity-75 text-white py-4"><?= get_field('hero_content'); ?></p>
                <?php get_template_part('template-parts/search-bar');?>
            </div>
            <div class="col-lg-5 py-5">
                <img class="w-100 h-auto py-3" src="<?= get_field('hero_image')['url']; ?>"
                     alt="<?= get_field('hero_image')['title']; ?>">
            </div>
        </div>
    </div>
</section>