<section class="container py-5" data-aos="zoom-in">
    <div class="cta_home rounded-5 d-grid d-lg-flex p-4 pb-0 p-lg-2 justify-content-evenly">
        <div class="col-lg-8 p-1 my-auto pb-4 pb-lg-1">
            <span class="text-success fw-bold"><?= get_field('cta_badge' , 'option'); ?></span>
            <h5 class="display-6 fw-bold py-3"><?= get_field('cta_title' , 'option'); ?></h5>
            <p class="small text-opacity-75"><?= get_field('cta_content' , 'option'); ?></p>
            <div class="d-flex">
                <button class="btn btn-primary px-5 py-1 rounded-3">درخواست مشاوره</button>
                <button class="btn text-primary btn-arrow py-1">تماس باما</button>
            </div>
        </div>
        <div class="col-lg-3 h-100 order-first order-lg-last pb-4 pb-lg-0">
            <img  class="w-100 object-fit-cover mt-n5 overflow-visible" data-aos="fade-up" data-aos-delay="200" src="<?= get_field('cta_image' , 'option')['url']; ?>"
                 alt="<?= get_field('cta_image' , 'option')['title']; ?>">
        </div>
    </div>
</section>