<?php

function saligtaran_wp_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
}

function saligtaran_enqueue_styles() {
  wp_enqueue_style( 'saligtaran-g-fonts', 'https://fonts.googleapis.com/css?family=Oswald:300,500|Roboto:400,700', array() );
  wp_enqueue_style( 'saligtaran-style', get_stylesheet_uri(), array('saligtaran-g-fonts') ); 
}

function saligtaran_enqueue_scripts() {
  if (is_home()) {
    wp_enqueue_script('saligtaran-index-script', get_template_directory_uri().'/js/index.js', array(), false, true );
  } else if (is_singular()) {
    wp_enqueue_script('saligtaran-permalink-script', get_template_directory_uri().'/js/permalink.js', array(), false, true );
  }
  
}

add_action( 'wp_enqueue_scripts', 'saligtaran_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'saligtaran_enqueue_scripts' );
add_action( 'after_setup_theme', 'saligtaran_wp_setup' );