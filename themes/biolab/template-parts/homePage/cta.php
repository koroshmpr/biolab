<section class="container py-5 pt-0">
    <div class="cta_home rounded-5 d-grid d-lg-flex p-4 pb-0 p-lg-2 justify-content-evenly">
        <div class="col-lg-8 p-1 my-auto">
            <span class="text-success fw-bold"><?= get_field('cta_badge' , 'option'); ?></span>
            <h5 class="display-6 fw-bold py-3"><?= get_field('cta_title' , 'option'); ?></h5>
            <p class="small text-opacity-75"><?= get_field('cta_content' , 'option'); ?></p>
            <div class="d-flex">
                <button class="btn btn-primary px-5 rounded-pill">درخواست مشاوره</button>
                <button class="btn text-primary btn-arrow">تماس باما</button>
            </div>
        </div>
        <div class="col-lg-3 h-100">
            <img  class="pt-lg-0 w-100 object-fit-cover mt-lg-n5 mt-5 overflow-visible" src="<?= get_field('cta_image' , 'option')['url']; ?>"
                 alt="<?= get_field('cta_image' , 'option')['title']; ?>">
        </div>
    </div>
</section>