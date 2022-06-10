<?php
/**
 * My Custom Theme functions and definitions
 */

/**
 * Register one navigation menu.
 */
 register_nav_menus(
	array(
		'menu-1' => esc_html__( 'Primary Menu', 'my-custom-theme' ),
	)
);

/**
 * Register one sidebar.
 */
function my_custom_theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'my-custom-theme' ),
        'id'   => 'sidebar-1',
    ) );
}
add_action( 'widgets_init', 'my_custom_theme_sidebar' );

// Add featured image functionality.
add_theme_support( 'post-thumbnails' );

add_image_size( 'my-custom-image-size', 640, 999 );

// Add title tag functionality.
add_theme_support( 'title-tag' );

/**
 * Enqueue a stylesheet.
 */
function susansPortraits_enqueue() {
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/normalize.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // wp_enqueue_style( 'tailwind-style', get_theme_file_uri('app.css') );
    wp_enqueue_style( 'tailwindcss', get_template_directory_uri() . '/css/tailwind.prod.css', array(), filemtime(get_template_directory() .'/css/tailwind.prod.css'), 'all');

}
add_action( 'wp_enqueue_scripts', 'susansPortraits_enqueue' );





function dogPortraitCustomPostType() {
    $args = array(
        'labels' => array('name' => 'Portraits',
                                    'singular_name' => 'Portrait'),
        'hierarchical' => false, // true acts like a page; false acts like a post,
        'public' => true, // accessible to user
        'has_archive' => true, // has an archive like a blog post
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), // has these things for the post - remove editor and users can't change certain things ont he backend like adding text
        'rewrite' => array('slug' => 'dog-portraits'), //rewrites the slug
    );

    register_post_type('portraits', $args);
}
add_action( 'init', 'dogPortraitCustomPostType');

function portraitTaxonomy() {
    $args = array(
        'labels' => array('name' => 'types',
                                    'singular_name' => 'type'),
        'hierarchical' => true, // true acts like a category; false acts like a tag,
        'public' => true, // accessible to user
    );

    register_taxonomy( 'types', array('portraits'), $args );

}
add_action('init', 'portraitTaxonomy');