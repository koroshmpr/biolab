<section class="container py-lg-5">
    <div class="text-center py-4 col-lg-6 mx-auto">
        <h2 class="fw-bold display-4"><?= get_field('workflow_title'); ?></h2>
        <p class="small text-dark text-opacity-75"><?= get_field('workflow_content'); ?></p>
    </div>
    <div class="d-flex gap-3 align-content-center py-lg-5 flex-lg-nowrap flex-wrap">
        <?php while (have_rows('workflows')):
            the_row(); ?>
            <div class="d-flex gap-3 align-content-start">
                <span class="lh-1 display-1 fw-bold text-info mb-auto"><?= get_row_index();?></span>
                <div>
                    <span class="fs-4"><?= get_sub_field('pre_text'); ?></span>
                    <h4 class="fw-bold fs-3"><?= get_sub_field('title'); ?></h4>
                    <p class="small text-dark text-opacity-75 pt-2"><?= get_sub_field('description'); ?></p>
                </div>
            </div>
        <?php
        endwhile; ?>
    </div>
</section>