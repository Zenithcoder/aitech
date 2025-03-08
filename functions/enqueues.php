<?php
function custom_enqueue_scripts()
{
  // * styles *

  // Bootstrap 5 style
  wp_register_style('bootstrap5', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.0.0', null);
  wp_enqueue_style('bootstrap5');

  // custom style
  wp_register_style('bootstrap-style', get_template_directory_uri() . '/css/style.css', false, '1.0.0', null);
  wp_enqueue_style('bootstrap-style');

  wp_register_style('animate', get_template_directory_uri() . '/lib/animate/animate.min.css', false, '1.0.0', null);
  wp_enqueue_style('animate');

  wp_register_style('owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', false, '1.0.0', null);
  wp_enqueue_style('owlcarousel');

  // * scripts *

  // remove jQuery
  //wp_deregister_script('jquery');
  // add latest jQuery * uncomment to enable jQuery *
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js', false, '3.6.0', false);
  wp_enqueue_script('jquery');

  wp_register_script('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', false, '5.1.0', true);
  wp_enqueue_script('bootstrap5');

  // custom script
 // wp_register_script('main', get_template_directory_uri() . '/js/main.js', false, '1.0.0', true);
 // wp_enqueue_script('main');
 

  wp_register_script('wow', get_template_directory_uri() . '/lib/wow/wow.min.js', false, '1.0.0', true);
  wp_enqueue_script('wow');

  wp_register_script('easing', get_template_directory_uri() . '/lib/easing/easing.min.js', false, '1.0.0', true);
  wp_enqueue_script('easing');

  wp_register_script('waypoints', get_template_directory_uri() . '/lib/waypoints/waypoints.min.js', false, '1.0.0', true);
  wp_enqueue_script('waypoints');

  wp_register_script('counterup', get_template_directory_uri() . '/lib/counterup/counterup.min.js', false, '1.0.0', true);
  wp_enqueue_script('counterup');

  wp_register_script('owl-carousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', false, '1.0.0', true);
  wp_enqueue_script('owl-carousel');

  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery', 'wow'), '1.0.0', true);
  // Enqueue WOW.js
 // wp_enqueue_script('wow-js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), '1.1.2', true);

  // Enqueue WOW.js CSS (optional, for animations)
  //wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');
}

add_action('wp_enqueue_scripts', 'custom_enqueue_scripts', 100);