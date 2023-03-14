<?php


// connect CSS files
function style_files(){
  wp_enqueue_style( 'start-reset', get_template_directory_uri().'/css/start-reset.css');
  wp_enqueue_style( 'globals', get_template_directory_uri().'/css/globals.css');
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action('wp_enqueue_scripts', 'style_files');



// remove top mafrin by WP admin panel
function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');



// header nav menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );


// turn off the default gutenberg builder
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");

function disable_gutenberg_editor() {
  return false;
}


// create global options contents fields

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();   
}


// filter for download .svg files from: https://github.com/WordPress/gutenberg/issues/22861
add_filter( 'upload_mimes', function() {
  $mimes = [
    'svg' => 'image/svg+xml',
    'jpg|jpeg' => 'image/jpeg',
    'png' => 'image/png',
  ];
  return $mimes;
});
