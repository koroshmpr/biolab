<div class="cta_home banner p-2 my-4 rounded-4 shadow-sm">
    <img class="w-100 h-auto object-fit" src="<?= get_field('archive-banner_image', 'option')['url']; ?>"
         alt="<?= get_field('archive-banner_image', 'option')['title']; ?>">
    <div class="p-2">
        <p class="fs-5"><?= get_field('archive-banner_title', 'option'); ?></p>
        <a class="btn btn-secondary rounded-pill px-2 py-0" href="<?= get_field('archive-banner_link' , 'option');?>">
            <?= get_field('archive-banner_link-text' , 'option');?>
        </a>
    </div>
</div>