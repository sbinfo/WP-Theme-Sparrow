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

// add theme support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails', array( 'post' ) );


// register size
add_image_size( 'post-thumb', 1300, 500, true );

// filters
add_filter( 'excerpt_length', function(){
	return 40;
} );

add_filter('excerpt_more', function($more) {
	return '';
});

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
	global $post;
	if(is_front_page()) {
        return '<a href="'. get_permalink($post) . '">Read More <i class="fa fa-arrow-circle-o-right"></i></a>';
    }
}