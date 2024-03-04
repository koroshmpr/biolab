<?php get_header(); ?>
    <section class="hero top-gap-shop min-vh-lg-80">
        <div class="container">
            <div class="row justify-content-between align-items-start">
                <div class="col-lg-3 pe-lg-4 order-last order-lg-first">
                    <?php get_template_part('template-parts/blog/blog-category-dropdown'); ?>
                </div>
                <div class="col-lg-9">
                    <?php
                    if (have_posts()) {
                    ?>
                    <div class="row row-cols-lg-3 row-cols-md-2 align-items-stretch">
                        <?php
                        while (have_posts()) : the_post();
                            ?>
                            <article class="p-2">
                                <?php
                                $styleBg = '#F9FBFA';
                                $bgColor = ' ';
                                $args = array(
                                    'style-bg' => $styleBg,
                                    'bgColor' => $bgColor,
                                );
                                get_template_part('template-parts/blog/noimage-card', null, $args); ?>
                            </article>
                        <?php
                        endwhile;
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php if (category_description()) { ?>
    <section class="container position-relative rounded-4 p-2 p-lg-4 mt-3 mt-lg-0 mb-5" style="background-color: #F9FBFA;">
        <div class="accordion accordion-preview" id="categoryAccordion">
            <div class="accordion-item bg-transparent border-0">
                <h6 class="accordion-header position-absolute bottom-0 start-50 translate-middle-x z-1 mb-n3" id="categoryHeader">
                    <button class="btn text-primary bg-white border collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                        مشاهده بیشتر
                    </button>
                </h6>
                <div id="categoryCollapse" class="accordion-collapse collapse" aria-labelledby="categoryHeader"
                     data-bs-parent="#categoryAccordion">
                    <div class="accordion-body">
                        <?php echo category_description(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer() ?>