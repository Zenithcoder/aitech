<?php
  get_header(); 
  aitech_mainbody_before();
?>

<main id="site-main">
  <?php 
    aitech_mainbody_start();
    get_template_part('loops/search-results');
    aitech_mainbody_end();
  ?>
</main>

<?php 
  aitech_mainbody_after();
  get_footer(); 
?>