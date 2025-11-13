<?php
/**
 * Custom Theme functions and definitions
 *
 * @package Custom_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Theme setup
 */
function custom_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 630, true );

    // Register navigation menus
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'custom-theme' ),
            'footer'  => __( 'Footer Menu', 'custom-theme' ),
        )
    );

    // Switch default core markup to output valid HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    // Add support for wide and full alignment
    add_theme_support( 'align-wide' );

    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Add support for block styles
    add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 * Set the content width in pixels
 */
function custom_theme_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'custom_theme_content_width', 1200 );
}
add_action( 'after_setup_theme', 'custom_theme_content_width', 0 );

/**
 * Register widget areas
 */
function custom_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Sidebar', 'custom-theme' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'custom-theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer', 'custom-theme' ),
            'id'            => 'footer-1',
            'description'   => __( 'Add widgets here to appear in your footer.', 'custom-theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'custom_theme_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function custom_theme_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style( 'custom-theme-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Enqueue navigation script (for mobile menu)
    wp_enqueue_script( 'custom-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );

    // Enqueue comment reply script on single posts
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'custom_theme_scripts' );

/**
 * Add a pingback url auto-discovery header for single posts
 */
function custom_theme_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'custom_theme_pingback_header' );

/**
 * Custom excerpt length
 */
function custom_theme_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_theme_excerpt_length' );

/**
 * Custom excerpt more string
 */
function custom_theme_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_theme_excerpt_more' );

/**
 * Add custom image sizes
 */
add_image_size( 'custom-theme-featured', 800, 450, true );
add_image_size( 'custom-theme-thumbnail', 400, 300, true );

/**
 * Filter the categories archive widget to add a span around post count
 */
function custom_theme_cat_count_span( $links ) {
    $links = str_replace( '</a> (', '</a> <span class="count">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
}
add_filter( 'wp_list_categories', 'custom_theme_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
function custom_theme_archive_count_span( $links ) {
    $links = str_replace( '</a>&nbsp;(', '</a> <span class="count">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
}
add_filter( 'get_archives_link', 'custom_theme_archive_count_span' );
