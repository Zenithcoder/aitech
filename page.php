<?php
  get_header(); 
 aitech_mainbody_before();
?>

<div class="container-fluid pt-5 bg-primary hero-header mb-5">
  <?php
    aitech_mainbody_start();
    get_template_part('loops/page-content');
    aitech_mainbody_end();
  ?>
</div>

<?php 
  aitech_mainbody_after();
  get_footer(); 
?>