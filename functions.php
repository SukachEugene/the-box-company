<?php


add_action('wp_enqueue_scripts', 'my_theme_enqueue_files');

function my_theme_enqueue_files(){

  //external styles
  wp_enqueue_style('slick-css', get_theme_file_uri() .'/css/slick.css');
	wp_enqueue_style('slick-theme-css', get_theme_file_uri() .'/css/slick-theme.css');
  wp_enqueue_style( 'start-reset', get_template_directory_uri().'/css/start-reset.css');
  wp_enqueue_style( 'globals', get_template_directory_uri().'/css/globals.css');

  // custom styles file/files
  wp_enqueue_style( 'style', get_stylesheet_uri() );

  //external scripts
  wp_enqueue_script('jquery', get_theme_file_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script('slick-min-js', get_theme_file_uri().'/js/slick.min.js');	
  wp_enqueue_script('font-awesome-kit', 'https://kit.fontawesome.com/3f554732dc.js', [], null );

	 // custom scripts file/files
  wp_enqueue_script('jquery-scripts', get_template_directory_uri().'/js/jquery-scripts.js');
  wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js');
 
}




// remove top mafrin by WP admin panel
add_action('get_header', 'remove_admin_login_header');

function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}




// header nav menu
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_mobil_menu' );

function register_my_mobil_menu() {
  register_nav_menu('mobil-menu',__( 'Mobil Menu' ));
}




// turn off the default gutenberg builder
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");

function disable_gutenberg_editor() {
  return false;
}

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );




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


// add_post_type_support( 'projects', 'post-thumbnails' );
// add_theme_support( 'post-thumbnails' );
// add_theme_support('post-thumbnails');
// add_post_type_support( 'projects', 'thumbnail' );  

add_action('after_setup_theme', 'theme_features');

function theme_features(){
  add_theme_support('post-thumbnails');
}
