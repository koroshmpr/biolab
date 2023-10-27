<?php
/** Template Name: contact-us page */

get_header(); ?>
    <section class="hero">
        <div class="container d-flex justify-content-center align-items-start align-items-lg-center min-vh-lg-80 -min-vh-lg-50">
            <div class="col-6 px-lg-5 pt-5 pt-lg-0 text-center">
                <h1 class="fw-bold display-5 text-center text-white mb-0"
                    data-aos="fade-left"><?= get_the_title(); ?></h1>
                <?php get_template_part('template-parts/loop/breadcrumb'); ?>
            </div>
        </div>
    </section>
    <section class="container py-lg-5 h-lg-200p">
        <div class="row justify-content-center translate-middle-lg-y">
            <div class="col-lg-6 col-11 bg-white rounded-5 p-3 p-lg-5 shadow-sm">
                <h2 class="fw-bold fs-3 text-dark pb-4">با ما در ارتباط باشید</h2>
                <?php echo do_shortcode('[gravityform id="' . get_field('form-id') . '" title="false" description="false" ajax="true"]') ?>
            </div>
        </div>
    </section>
    <section class="rounded-5" style="height: 650px">
        <?= get_field('map', 'option'); ?>
    </section>
    <section class="container translate-middle-lg-y">
        <div class="col-lg-10 col-11 mx-auto d-flex flex-wrap gap-4 justify-content-center align-items-center py-5 py-lg-0">
            <div class="rounded-3 z-2 shadow-sm bg-white col p-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="61" viewBox="0 0 60 61" fill="none">
                    <circle cx="49" cy="11.5" r="11" fill="#5BBB7B" fill-opacity="0.3"/>
                    <path d="M54.925 45.825C54.925 46.725 54.725 47.65 54.3 48.55C53.875 49.45 53.325 50.3 52.6 51.1C51.375 52.45 50.025 53.425 48.5 54.05C47 54.675 45.375 55 43.625 55C41.075 55 38.35 54.4 35.475 53.175C32.6 51.95 29.725 50.3 26.875 48.225C24 46.125 21.275 43.8 18.675 41.225C16.1 38.625 13.775 35.9 11.7 33.05C9.65 30.2 8 27.35 6.8 24.525C5.6 21.675 5 18.95 5 16.35C5 14.65 5.3 13.025 5.9 11.525C6.5 10 7.45 8.6 8.775 7.35C10.375 5.775 12.125 5 13.975 5C14.675 5 15.375 5.15 16 5.45C16.65 5.75 17.225 6.2 17.675 6.85L23.475 15.025C23.925 15.65 24.25 16.225 24.475 16.775C24.7 17.3 24.825 17.825 24.825 18.3C24.825 18.9 24.65 19.5 24.3 20.075C23.975 20.65 23.5 21.25 22.9 21.85L21 23.825C20.725 24.1 20.6 24.425 20.6 24.825C20.6 25.025 20.625 25.2 20.675 25.4C20.75 25.6 20.825 25.75 20.875 25.9C21.325 26.725 22.1 27.8 23.2 29.1C24.325 30.4 25.525 31.725 26.825 33.05C28.175 34.375 29.475 35.6 30.8 36.725C32.1 37.825 33.175 38.575 34.025 39.025C34.15 39.075 34.3 39.15 34.475 39.225C34.675 39.3 34.875 39.325 35.1 39.325C35.525 39.325 35.85 39.175 36.125 38.9L38.025 37.025C38.65 36.4 39.25 35.925 39.825 35.625C40.4 35.275 40.975 35.1 41.6 35.1C42.075 35.1 42.575 35.2 43.125 35.425C43.675 35.65 44.25 35.975 44.875 36.4L53.15 42.275C53.8 42.725 54.25 43.25 54.525 43.875C54.775 44.5 54.925 45.125 54.925 45.825Z"
                          stroke="#222222" stroke-width="3" stroke-miterlimit="10"/>
                </svg>
                <p class="py-3 fw-bold fs-3">شماره پشتیبانی</p>
                <p><?= get_field('address', 'option'); ?></p>
                <a aria-label="tel" target="_blank" href="tel:<?= get_field('phone_number', 'option'); ?>"
                   class="btn btn-success"><?= get_field('phone_number_label', 'option'); ?></a>
            </div>
            <div class="rounded-3 z-2 shadow-sm bg-white col p-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="61" viewBox="0 0 60 61" fill="none">
                    <circle cx="49" cy="11.5" r="11" fill="#5BBB7B" fill-opacity="0.3"/>
                    <path d="M55 26.25V38.75C55 47.5 50 51.25 42.5 51.25H17.5C10 51.25 5 47.5 5 38.75V21.25C5 12.5 10 8.75 17.5 8.75H35"
                          stroke="#222222" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M17.5 22.5L25.325 28.75C27.9 30.8 32.125 30.8 34.7 28.75L37.65 26.4" stroke="#222222"
                          stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M48.75 20C52.2018 20 55 17.2018 55 13.75C55 10.2982 52.2018 7.5 48.75 7.5C45.2982 7.5 42.5 10.2982 42.5 13.75C42.5 17.2018 45.2982 20 48.75 20Z"
                          stroke="#222222" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
                <p class="py-3 fw-bold fs-3">ارسال ایمیل</p>
                <p>پاسخ 24 ساعته تمامی ایمیل ها</p>
                <a aria-label="email" target="_blank" href="mailto:<?= get_field('email', 'option'); ?>"
                   class="btn btn-success"> <?= get_field('email', 'option'); ?></a>
            </div>
            <div class="rounded-3 z-2 shadow-sm bg-white col p-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="61" viewBox="0 0 60 61" fill="none">
                    <circle cx="49" cy="11.5" r="11" fill="#5BBB7B" fill-opacity="0.3"/>
                    <path d="M29.9999 33.575C34.3078 33.575 37.7999 30.0828 37.7999 25.775C37.7999 21.4672 34.3078 17.975 29.9999 17.975C25.6921 17.975 22.2 21.4672 22.2 25.775C22.2 30.0828 25.6921 33.575 29.9999 33.575Z"
                          stroke="#222222" stroke-width="3"/>
                    <path d="M9.05 21.225C13.975 -0.424994 46.05 -0.399994 50.95 21.25C53.825 33.95 45.925 44.7 39 51.35C33.975 56.2 26.025 56.2 20.975 51.35C14.075 44.7 6.17501 33.925 9.05 21.225Z"
                          stroke="#222222" stroke-width="3"/>
                </svg>
                <p class="py-3 fw-bold fs-3">آدرس</p>
                <address><?= get_field('address', 'option'); ?></address>
                <a class="btn btn-success" aria-label="map-link" target="_blank" href="<?= get_field('map-link', 'option'); ?>">مشاهده روی نقشه</a>
            </div>
        </div>
    </section>
<?php get_footer(); ?>