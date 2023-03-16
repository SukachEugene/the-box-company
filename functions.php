<?php

// connect CSS files
add_action('wp_enqueue_scripts', 'style_files');

function style_files(){
  wp_enqueue_style( 'start-reset', get_template_directory_uri().'/css/start-reset.css');
  wp_enqueue_style( 'globals', get_template_directory_uri().'/css/globals.css');
  // wp_enqueue_style( 'fontawesome-min', get_template_directory_uri().'/css/fontawesome.min.css');
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}



// add_action( 'wp_enqueue_scripts', 'add_font_awesome' );

// function add_font_awesome() {
// wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
// }

// add_action( 'wp_enqueue_scripts', 'crunchify_enqueue_fontawesome' );
// function crunchify_enqueue_fontawesome() {
//         wp_enqueue_style('crunchify-font-awesome', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css?ver=5.7');
// }

// add_action( 'wp_enqueue_scripts', 'crunchify_enqueue_fontawesome' );
// function crunchify_enqueue_fontawesome() {
//         wp_enqueue_style('crunchify-font-awesome', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css?ver=5.7');
// }




// connect scripts, jQuery and slick slider library
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {

	wp_register_style('slick-css', get_theme_file_uri() .'/css/slick.css');
	wp_register_style('slick-theme-css', get_theme_file_uri() .'/css/slick-theme.css');
  wp_enqueue_script('jquery', get_theme_file_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script('slick-min-js', get_theme_file_uri().'/js/slick.min.js');		
	wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js');

	wp_enqueue_style('slick-css');
	wp_enqueue_style('slick-theme-css');
  wp_enqueue_script('jquery');
	wp_enqueue_script('slick-min-js');
  wp_enqueue_script('scripts');
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





/**
 * Font Awesome Kit Setup
 */
if (! function_exists('fa_custom_setup_kit') ) {
  function fa_custom_setup_kit($kit_url = '') {
    foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
      add_action(
        $action,
        function () use ( $kit_url ) {
          wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
        }
      );
    }
  }
}

fa_custom_setup_kit('https://kit.fontawesome.com/3f554732dc.js');
