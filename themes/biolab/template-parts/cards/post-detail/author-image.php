<?php $user_array_img = get_field('profile_image', 'user_' . $post->post_author);

if ($user_array_img) { ?>

    <img class="rounded-circle img-fluid" width="42" height="42" src="<?php echo $user_array_img['url'] ?>"

         alt="<?php echo $user_array_img['alt'] ?>">

<?php } else {

    ?>
            <?= get_field('author-image-default', 'option'); ?>
    <?php

} ?>