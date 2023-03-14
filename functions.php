<?php

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


?>