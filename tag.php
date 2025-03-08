<?php

get_header();
aitech_mainbody_before();
?>

<main id="site-main">
    <?php
    aitech_mainbody_start(); ?>

    <header class="container py-5 text-center">
        <span class="h3 mt-5 fw-light"><?php
            _e('Posts tagged:', 'aitech'); ?></span>
        <h1 class="display-4 mt-3">
            <?php
            echo single_tag_title(); ?>
        </h1>
    </header>

    <?php
    get_template_part('loops/index-loop');
    aitech_mainbody_end();
    ?>
</main>

<?php
aitech_mainbody_after();
get_footer();
?>
