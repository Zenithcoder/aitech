<?php

get_header();
aitech_mainbody_before();
?>

    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <?php
        aitech_mainbody_start();
        get_template_part('loops/index-loop');

        ?>
    </div>

<?php
get_footer();
?>