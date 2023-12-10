<?php
/* Template Name: faq */

get_header(); ?>

<section class="hero top-gap-shop h-100">
    <div class="container">
        <h1 class="fs-2 py-4 text-white text-center"><?= get_the_title(); ?></h1>
        <?php
        $faqs = get_field('faqs');
        $i = 0;
        if (have_rows('faqs')): ?>
            <div class="px-3 px-lg-0 row row-cols-lg-3 row-cols-md-2 gy-3 justify-content-lg-between justify-content-center py-5">
                <?php while (have_rows('faqs')): the_row();
                    $question = get_sub_field('name'); ?>
                    <article class="px-md-4 py-2">
                        <div class="bg-light rounded-3 d-flex flex-column justify-content-between p-4"
                             data-aos="zoom-in" style="min-height: 320px;">
                            <div class="d-flex flex-column gap-3 align-items-start">
                                <svg class="w-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.4"
                                          d="M21.0105 11.22V15.71C21.0105 20.2 19.2205 22 14.7205 22H9.33051C8.75051 22 8.22047 21.97 7.73047 21.9"
                                          stroke="#5BBB7B" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path opacity="0.4" d="M3.03906 15.52V11.22" stroke="#5BBB7B" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.0299 12C13.8599 12 15.2099 10.5101 15.0299 8.68005L14.3599 2H9.68989L9.01991 8.68005C8.83991 10.5101 10.1999 12 12.0299 12Z"
                                          stroke="#5BBB7B" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M18.3303 12C20.3503 12 21.8303 10.36 21.6303 8.34998L21.3503 5.59998C20.9903 2.99998 19.9903 2 17.3703 2H14.3203L15.0203 9.01001C15.2003 10.66 16.6803 12 18.3303 12Z"
                                          stroke="#5BBB7B" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M5.66979 12C7.31979 12 8.80978 10.66 8.96978 9.01001L9.18981 6.80005L9.66979 2H6.61981C3.99981 2 2.99983 2.99998 2.63983 5.59998L2.3598 8.34998C2.1598 10.36 3.64979 12 5.66979 12Z"
                                          stroke="#5BBB7B" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M9 19C9 19.75 8.78998 20.4601 8.41998 21.0601C8.22998 21.3801 7.99998 21.67 7.72998 21.9C7.69998 21.94 7.67 21.97 7.63 22C6.93 22.63 6.01 23 5 23C3.78 23 2.68997 22.45 1.96997 21.59C1.94997 21.56 1.92002 21.54 1.90002 21.51C1.78002 21.37 1.67002 21.2201 1.58002 21.0601C1.21002 20.4601 1 19.75 1 19C1 17.74 1.58 16.61 2.5 15.88C2.67 15.74 2.84998 15.62 3.03998 15.52C3.61998 15.19 4.29 15 5 15C6 15 6.89998 15.36 7.59998 15.97C7.71998 16.06 7.82999 16.17 7.92999 16.28C8.58999 17 9 17.95 9 19Z"
                                          stroke="#5BBB7B" stroke-width="1.5" stroke-miterlimit="10"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <g opacity="0.4">
                                        <path d="M6.48975 18.98H3.50977" stroke="#5BBB7B" stroke-width="1.5"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 17.52V20.51" stroke="#5BBB7B" stroke-width="1.5"
                                              stroke-miterlimit="10"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                </svg>
                                <h3 class="text-dark f-4"><?= $question; ?></h3>
                                <?php
                                $rowIndex = get_row_index();
                                $index = 1;
                                while (have_rows('faq')): the_row();
                                    $question = get_sub_field_object('question');
                                    $show = get_sub_field_object('show_no_card');
                                    $rowIndex = get_row_index();
                                    if ($show['value'] == 'true' && $index < 5) {
                                        ?>
                                        <a class="text-dark text-opacity-75"
                                           href="#<?= sanitize_title($question['name']); ?>"><?= $question['value']; ?></a>
                                    <?php }
                                    $index++;
                                endwhile;
                                $rowIndex = get_row_index();
                                ?></div>
                            <a class="text-dark text-opacity-50 d-flex justify-content-between align-items-center"
                               href="#heading-<?= $rowIndex; ?>">
                                <span>بیشتر</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                     fill="none">
                                    <path d="M8.00065 15.1667C11.6673 15.1667 14.6673 12.1667 14.6673 8.50001C14.6673 4.83334 11.6673 1.83334 8.00065 1.83334C4.33398 1.83334 1.33398 4.83334 1.33398 8.50001C1.33398 12.1667 4.33398 15.1667 8.00065 15.1667Z"
                                          stroke="#6C757D" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33398 8.5H10.6673" stroke="#6C757D" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M8 11.1667V5.83334" stroke="#6C757D" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php
                endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="container py-5">
    <?php
    if (have_rows('faqs')):?>
        <?php while (have_rows('faqs')): the_row();
            $rowIndex = get_row_index(); ?>
            <div class="accordion accordion-flush overflow-hidden py-5" id="heading-<?= $rowIndex; ?>">
                <?php $title = get_sub_field('name');
                $args = array(
                    'title' => $title
                );
                get_template_part('template-parts/loop/header_underline', null, $args);
                while (have_rows('faq')): the_row();
                    $question = get_sub_field_object('question');
                    $rowIndex = get_row_index();
                    $answer = get_sub_field_object('answer');
                    if ($question) {
                        ?>
                        <div class="accordion-item my-1 border-info border border-1 overflow-hidden rounded-4"
                             id="<?= sanitize_title($question['name']); ?>">
                            <h2 class="accordion-header" id="heading-<?= $rowIndex; ?>">
                                <button class="d-flex justify-content-between accordion-button collapsed bg-white shadow-none"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse-<?= sanitize_title($question['name']); ?>"
                                        aria-expanded="<?= $i == 0 ? 'true' : 'false'; ?>"
                                        aria-controls="collapse-<?= sanitize_title($question['name']); ?>">
                                    <?= $question['value']; ?>
                                </button>
                            </h2>
                            <div id="collapse-<?= sanitize_title($question['name']); ?>"
                                 class="accordion-collapse collapse <?= $i == 0 ? 'show' : ''; ?>"
                                 aria-labelledby="heading-<?= sanitize_title($question['name']); ?>"
                                 data-bs-parent="#heading-<?= $rowIndex; ?>">
                                <div class="accordion-body">
                                    <?= $answer['value']; ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    $i++;
                endwhile; ?>
            </div>
        <?php endwhile;
    endif; ?>
</section>

<?php
get_template_part('template-parts/homePage/cta');
get_footer(); ?>
