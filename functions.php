<?php

add_action( 'wp_enqueue_scripts', 'sparrow_styles' );
add_action('wp_footer', 'sparrow_scripts');
add_action('after_setup_theme', 'sparrow_menu');
add_action( 'widgets_init', 'sparrow_register_widgets' );

function sparrow_register_widgets(){
    register_sidebar( array(
        'name'          => __('Right Sidebar'),
        'id'            => "right_sidebar",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => "</h5>\n",
    ) );
}

function sparrow_styles() {
    // styles
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
}

function sparrow_scripts() {
    // scripts
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery'], null, true);
    wp_enqueue_script( 'doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery'], null, true);
    wp_enqueue_script( 'init', get_template_directory_uri() . '/assets/js/init.js', ['jquery'], null, true);
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', ['jquery'], null, true);
}

function sparrow_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
    register_nav_menu( 'footer-menu', 'Footer Menu' );
}