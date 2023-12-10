<section class="hero">
    <div class="container p-xl-5">
        <div class="row justify-content-lg-between justify-content-center align-content-center mt-md-6 mt-lg-3 mt-md-5 pt-md-5
         pt-lg-3 pt-xl-0 mt-xl-0">
            <div class="col-12 col-md-7 my-auto pt-2 pt-lg-0 pt-md-5">
                <h1 class="display-4 text-white fw-bold"><?= get_field('hero_title'); ?></h1>
                <p class="fs-5 text-opacity-75 text-white py-4"><?= get_field('hero_content'); ?></p>
                <?php
                $inputValue = '';
                $args = array(
                    'inputValue' => $inputValue,
                );
                get_template_part('template-parts/search-bar', null, $args); ?>
            </div>
            <div class="col-md-5  py-5">
                <img class="w-100 h-auto py-3" src="<?= get_field('hero_image')['url']; ?>"
                     alt="<?= get_field('hero_image')['title']; ?>">
            </div>
        </div>
    </div>
</section>