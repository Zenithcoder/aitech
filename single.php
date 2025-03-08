<?php

get_header();
aitech_mainbody_before();
?>

<main id="site-main">
    <?php
    aitech_mainbody_start(); ?>

    <?php
    get_template_part('loops/single-post', get_post_format()); ?>

    <?php
    aitech_mainbody_end(); ?>
</main>

<?php
aitech_mainbody_after();
get_footer();
?>
