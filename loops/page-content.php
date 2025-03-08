<?php
/*
 * The Page Content Loop
 */
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header mb-5" id="post_<?php the_ID()?>">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight"> <?php the_title()?></div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight"><?php the_title()?></h1>
                    <p class="text-white mb-4 animated slideInRight"><?php the_content()?></p>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight"><?php wp_link_pages(); ?></a>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/hero-img.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
<?php
  endwhile;
  else :
    get_template_part('loops/404');
  endif;
?>
