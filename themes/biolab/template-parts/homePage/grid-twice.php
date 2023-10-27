<section class="container bg-secondary rounded-25 p-0">
    <?php
//    card
    ?>
    <div class="row justify-content-lg-around justify-content-center align-content-center">
        <div class="col-lg-5 ms-lg-auto p-5 my-auto">
            <span class="text-success"><?= get_field('card_badge'); ?></span>
            <h5 class="display-6 text-white fw-bold pe-lg-5 pt-4"><?= get_field('card_title'); ?></h5>
            <p class="small text-opacity-75 text-white"><?= get_field('card_content'); ?></p>
            <?php if (have_rows('card_list')) { ?>
                <ul class="list-unstyled text-white">
                    <?php while (have_rows('card_list')):
                        the_row(); ?>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.70062 1.03003C8.61134 1.03003 9.51314 1.20941 10.3545 1.55792C11.1959 1.90644 11.9604 2.41727 12.6044 3.06124C13.2484 3.70522 13.7592 4.46973 14.1077 5.31112C14.4562 6.15251 14.6356 7.05431 14.6356 7.96503C14.6356 8.87575 14.4562 9.77755 14.1077 10.6189C13.7592 11.4603 13.2484 12.2248 12.6044 12.8688C11.9604 13.5128 11.1959 14.0236 10.3545 14.3721C9.51314 14.7207 8.61134 14.9 7.70062 14.9C5.86135 14.9 4.0974 14.1694 2.79684 12.8688C1.49627 11.5683 0.765625 9.80431 0.765625 7.96503C0.765625 6.12575 1.49627 4.36181 2.79684 3.06124C4.0974 1.76068 5.86135 1.03003 7.70062 1.03003ZM11.0606 4.82003L6.66062 9.32003L5.46062 7.97003C4.94062 7.52003 4.11062 8.05003 4.49062 8.72003L5.91062 11.12C6.13062 11.42 6.65062 11.72 7.17062 11.12L11.6506 5.50003C12.1706 4.90003 11.5006 4.38003 11.0506 4.83003L11.0606 4.82003Z" fill="#1CCA97"/>
                            </svg>
                            <?= get_sub_field('list');?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }; ?>
            <div class="d-flex">
                <button class="btn btn-primary px-5 rounded-pill">درخواست مشاوره</button>
                <button class="btn text-white btn-arrow">تماس باما</button>
            </div>
        </div>
        <div class="col-lg-6 ms-lg-auto mt-5 mt-lg-0">
            <img class="w-100 h-auto object-fit-cover rounded-bottom-start-circle" src="<?= get_field('card_image')['url']; ?>"
                 alt="<?= get_field('card_image')['title']; ?>">
        </div>
    </div>
    <?php
    //    grid
    ?>
    <div class="row justify-content-lg-start justify-content-center align-content-center mt-5 pt-5">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <img class="w-100 h-auto object-fit-cover rounded-top-end-circle"
                 src="<?= get_field('card_image')['url']; ?>"
                 alt="<?= get_field('card_image')['title']; ?>">
        </div>
        <div class="col-lg-5 me-lg-auto p-5 my-auto">
            <span class="text-success"><?= get_field('card_badge'); ?></span>
            <h5 class="display-6 text-white fw-bold pe-lg-5 pt-4"><?= get_field('card_title'); ?></h5>
            <p class="small text-opacity-75 text-white"><?= get_field('card_content'); ?></p>
            <?php if (have_rows('card_list')) { ?>
                <ul class="list-unstyled text-white">
                    <?php while (have_rows('card_list')):
                        the_row(); ?>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.70062 1.03003C8.61134 1.03003 9.51314 1.20941 10.3545 1.55792C11.1959 1.90644 11.9604 2.41727 12.6044 3.06124C13.2484 3.70522 13.7592 4.46973 14.1077 5.31112C14.4562 6.15251 14.6356 7.05431 14.6356 7.96503C14.6356 8.87575 14.4562 9.77755 14.1077 10.6189C13.7592 11.4603 13.2484 12.2248 12.6044 12.8688C11.9604 13.5128 11.1959 14.0236 10.3545 14.3721C9.51314 14.7207 8.61134 14.9 7.70062 14.9C5.86135 14.9 4.0974 14.1694 2.79684 12.8688C1.49627 11.5683 0.765625 9.80431 0.765625 7.96503C0.765625 6.12575 1.49627 4.36181 2.79684 3.06124C4.0974 1.76068 5.86135 1.03003 7.70062 1.03003ZM11.0606 4.82003L6.66062 9.32003L5.46062 7.97003C4.94062 7.52003 4.11062 8.05003 4.49062 8.72003L5.91062 11.12C6.13062 11.42 6.65062 11.72 7.17062 11.12L11.6506 5.50003C12.1706 4.90003 11.5006 4.38003 11.0506 4.83003L11.0606 4.82003Z" fill="#1CCA97"/>
                            </svg>
                            <?= get_sub_field('list');?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }; ?>
            <div class="d-flex">
                <button class="btn btn-primary px-5 rounded-pill">درخواست مشاوره</button>
                <button class="btn text-white btn-arrow">تماس باما</button>
            </div>
        </div>
    </div>
</section>