<?php
/** Template Name: form */

get_header(); ?>
    <section class="hero">
        <div class="container d-flex justify-content-center align-items-start align-items-lg-center min-vh-lg-80 -min-vh-lg-60">
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
                <h2 class="fw-bold fs-3 text-dark pb-4"><?= get_field('form_title'); ?></h2>
                <?php echo do_shortcode('[gravityform id="'. get_field("form_id") . '" title="false" description="false" ajax="true"]') ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>