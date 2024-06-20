<section class="hero-squere top-gap-shop min-vh-lg-80">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-content-start">
            <div class="col-12 col-lg-7 pt-2 pt-lg-0 pt-md-5">
                <h1 class="display-5 text-white fw-bold"><?= get_field('hero_title'); ?></h1>
                <p class="fs-5 text-opacity-75 text-white py-4"><?= get_field('hero_content'); ?></p>
                <?php
                $inputValue = '';
                $args = array(
                    'inputValue' => $inputValue,
                );
                get_template_part('template-parts/search-bar', null, $args); ?>
                <?php
                $serachWords = get_field('search-words');
                if ($serachWords) :?>
                <div class="d-flex mt-4 align-items-center gap-2 flex-wrap">
                    <?php foreach ($serachWords as $searchWord) : ?>
                        <a class="bg-success bg-opacity-25 text-success px-3 py-2 rounded-3"
                           href="<?= home_url(); ?>/?s=<?= $searchWord['word']; ?>"><?= $searchWord['word']; ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 pt-5 pt-lg-0">
                <img class="w-100 h-auto py-3" src="<?= get_field('hero_image')['url']; ?>"
                     alt="<?= get_field('hero_image')['title']; ?>">
            </div>
        </div>
    </div>
</section>