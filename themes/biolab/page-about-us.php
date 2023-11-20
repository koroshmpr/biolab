<?php
/** Template Name: about us page */

get_header(); ?>
<section class="hero pb-5 pb-lg-0">
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-lg-80 -min-vh-lg-60">
        <div class="col-lg-6 px-lg-5 text-center">
            <h1 class="fw-bold display-5 text-center text-white mb-0" data-aos="fade-left"><?= get_the_title(); ?></h1>
            <?php get_template_part('template-parts/loop/breadcrumb'); ?>
            <div class="mb-0 small text-white text-opacity-75 text-center pb-5 pb-lg-0"><?= get_field('aboutus-content'); ?></div>
        </div>
    </div>
</section>
<section class="container pb-5 mt-lg-n5">
    <div class="row justify-content-lg-between justify-content-center align-content-center">
        <div class="col-lg-5 py-5">
            <img class="w-100 h-auto py-3" src="<?= get_field('section_image')['url']; ?>"
                 alt="<?= get_field('section_image')['title']; ?>">
        </div>
        <div class="col-lg-6 my-auto">
            <span class="text-success fw-bold"><?= get_field('section_badge'); ?></span>
            <h5 class="display-4 pt-3 text-secondary fw-bold pe-lg-5"><?= get_field('section_title'); ?></h5>
            <p class="small text-opacity-75 text-dark"><?= get_field('section_content'); ?></p>
            <?php if (have_rows('section_property')) { ?>
                <ul class="list-unstyled">
                    <?php while (have_rows('section_property')):
                        the_row(); ?>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.70062 1.03003C8.61134 1.03003 9.51314 1.20941 10.3545 1.55792C11.1959 1.90644 11.9604 2.41727 12.6044 3.06124C13.2484 3.70522 13.7592 4.46973 14.1077 5.31112C14.4562 6.15251 14.6356 7.05431 14.6356 7.96503C14.6356 8.87575 14.4562 9.77755 14.1077 10.6189C13.7592 11.4603 13.2484 12.2248 12.6044 12.8688C11.9604 13.5128 11.1959 14.0236 10.3545 14.3721C9.51314 14.7207 8.61134 14.9 7.70062 14.9C5.86135 14.9 4.0974 14.1694 2.79684 12.8688C1.49627 11.5683 0.765625 9.80431 0.765625 7.96503C0.765625 6.12575 1.49627 4.36181 2.79684 3.06124C4.0974 1.76068 5.86135 1.03003 7.70062 1.03003ZM11.0606 4.82003L6.66062 9.32003L5.46062 7.97003C4.94062 7.52003 4.11062 8.05003 4.49062 8.72003L5.91062 11.12C6.13062 11.42 6.65062 11.72 7.17062 11.12L11.6506 5.50003C12.1706 4.90003 11.5006 4.38003 11.0506 4.83003L11.0606 4.82003Z"
                                      fill="#1CCA97"/>
                            </svg>
                            <?= get_sub_field('property_list'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }; ?>
            <div class="d-flex">
                <button class="btn btn-primary px-5 rounded-3 py-1">درخواست مشاوره</button>
                <button class="btn text-dark btn-arrow py-1">تماس باما</button>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container bg-secondary rounded-5 p-lg-5 p-4">
        <div class="row justify-content-lg-between justify-content-center align-content-center py-5">
            <div class="col-lg-5 my-auto">
                <span class="text-success"><?= get_field('aboutus-badge'); ?></span>
                <h5 class="display-6 text-white fw-bold pe-lg-5 pt-4"><?= get_field('aboutus-title'); ?></h5>
                <p class="small text-opacity-75 text-white"><?= get_field('aboutus-description'); ?></p>
                <div class="d-flex">
                    <button class="btn btn-primary px-5 rounded-3 py-1">درخواست مشاوره</button>
                    <button class="btn text-white btn-arrow py-1">تماس باما</button>
                </div>
            </div>
            <div class="col-lg-7 mt-5 mt-lg-0 p-lg-5">
                <img class="w-100 h-auto object-fit-cover"
                     src="<?= get_field('aboutus_image')['url']; ?>"
                     alt="<?= get_field('aboutus_image')['title']; ?>">
            </div>
        </div>
        <div class="row py-5 justify-content-center">
            <div class="col-lg-4 p-3">
                <span class="text-success"><?= get_field('ourteam-badge'); ?></span>
                <h5 class="display-6 text-white fw-bold pe-lg-5 py-4"><?= get_field('ourteam-title'); ?></h5>
                <p class="small text-opacity-75 text-white"><?= get_field('ourteam-description'); ?></p>
                <div class="row row-cols-2">
                    <?php while (have_rows('team_ability')): the_row(); ?>
                        <div class="p-2">
                            <span class="fs-1 fw-bold text-success pb-4"><?= get_sub_field('value') ?></span>
                            <p class="text-white fs-5 text-opacity-50"><?= get_sub_field('description') ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
                <button class="btn btn-white w-100 rounded-3 mt-3">به تیم ما بپیوندید</button>
            </div>
            <div class="col-lg-8 row row-cols-2 justify-content-center">
                <?php while (have_rows('team')) : the_row(); ?>
                    <div class="text-white text-center py-4">
                        <img class="img-thumbnail border-primary rounded-circle bg-transparent"
                             width="250" height="250"
                             src="<?= get_sub_field('image')['url']; ?>"
                             alt="<?= get_sub_field('name'); ?>">
                        <p class="text-white fw-bold fs-6 pt-4 mb-1"><?= get_sub_field('name'); ?></p>
                        <p class="text-white text-opacity-50 small pb-2"><?= get_sub_field('position'); ?></p>
                        <div class="d-flex gap-2 align-content-center justify-content-center">
                            <?php while (have_rows('network')): the_row(); ?>
                                <a class="text-white text-opacity-50" target="_blank"
                                   area-label="<?= get_sub_field('icon');?>"
                                   href="<?= get_sub_field('link'); ?>">
                                    <?php
                                    $svgColor = "currentColor";
                                    $args= array(
                                            'colorSvg' => $svgColor
                                    );

                                    get_template_part('template-parts/svg/social/' . get_sub_field('icon') , null , $args); ?>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>

<section class="container pt-lg-5 pb-5">
    <div class="row justify-content-lg-between justify-content-center align-content-center">
        <div class="col-lg-5 py-5">
            <img class="w-100 h-auto py-3" src="<?= get_field('section_image_2')['url']; ?>"
                 alt="<?= get_field('section_image_2')['title']; ?>">
        </div>
        <div class="col-lg-6 my-auto">
            <span class="text-success fw-bold"><?= get_field('section_badge_2'); ?></span>
            <h5 class="display-4 pt-3 text-secondary fw-bold pe-lg-5"><?= get_field('section_title_2'); ?></h5>
            <p class="small text-opacity-75 text-dark"><?= get_field('section_content_2'); ?></p>
            <?php if (have_rows('section_property_2')) { ?>
                <ul class="list-unstyled">
                    <?php while (have_rows('section_property_2')):
                        the_row(); ?>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.70062 1.03003C8.61134 1.03003 9.51314 1.20941 10.3545 1.55792C11.1959 1.90644 11.9604 2.41727 12.6044 3.06124C13.2484 3.70522 13.7592 4.46973 14.1077 5.31112C14.4562 6.15251 14.6356 7.05431 14.6356 7.96503C14.6356 8.87575 14.4562 9.77755 14.1077 10.6189C13.7592 11.4603 13.2484 12.2248 12.6044 12.8688C11.9604 13.5128 11.1959 14.0236 10.3545 14.3721C9.51314 14.7207 8.61134 14.9 7.70062 14.9C5.86135 14.9 4.0974 14.1694 2.79684 12.8688C1.49627 11.5683 0.765625 9.80431 0.765625 7.96503C0.765625 6.12575 1.49627 4.36181 2.79684 3.06124C4.0974 1.76068 5.86135 1.03003 7.70062 1.03003ZM11.0606 4.82003L6.66062 9.32003L5.46062 7.97003C4.94062 7.52003 4.11062 8.05003 4.49062 8.72003L5.91062 11.12C6.13062 11.42 6.65062 11.72 7.17062 11.12L11.6506 5.50003C12.1706 4.90003 11.5006 4.38003 11.0506 4.83003L11.0606 4.82003Z"
                                      fill="#1CCA97"/>
                            </svg>
                            <?= get_sub_field('property_list'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }; ?>
            <div class="d-flex">
                <button class="btn btn-primary px-5 rounded-3 py-1">درخواست مشاوره</button>
                <button class="btn text-dark btn-arrow py-1">تماس باما</button>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/homePage/cta'); ?>

<?php get_footer(); ?>
