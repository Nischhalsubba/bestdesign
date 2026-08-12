<?php
/**
 * Theme bootstrap for the Best Design WordPress site.
 * Registers theme features, public assets, menus, custom post types, sidebars,
 * and the small content helpers used by the legacy templates.
 */

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

/** Enqueues the fonts and icon family used by the public theme. */
function bestdesign_enqueue_fonts() {
    wp_enqueue_style( 'bestdesign-oswald', '//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700', array(), null );
    wp_enqueue_style( 'bestdesign-poppins', '//fonts.googleapis.com/css?family=Poppins:100,100i,200,300,400,500,600,700,800', array(), null );
    wp_enqueue_style( 'bestdesign-material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), null );
}
add_action( 'wp_enqueue_scripts', 'bestdesign_enqueue_fonts' );

/** Enqueues the canonical theme stylesheet and third-party carousel/icon styles. */
function bestdesign_enqueue_styles() {
    wp_enqueue_style( 'bestdesign-theme', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'bestdesign-owl-theme', get_template_directory_uri() . '/owl carousel/owl.theme.default.min.css', array(), null );
    wp_enqueue_style( 'bestdesign-owl-carousel', get_template_directory_uri() . '/owl carousel/owl.carousel.min.css', array(), null );
    wp_enqueue_style( 'bestdesign-fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2' );
}
add_action( 'wp_enqueue_scripts', 'bestdesign_enqueue_styles' );

/** Enqueues the theme interaction script and its third-party dependencies. */
function bestdesign_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script(
        'bestdesign-owl-carousel',
        get_template_directory_uri() . '/owl carousel/owl.carousel.min.js',
        array( 'jquery' ),
        null,
        true
    );
    wp_enqueue_script(
        'bestdesign-theme',
        get_template_directory_uri() . '/js/index.js',
        array( 'jquery', 'bestdesign-owl-carousel' ),
        wp_get_theme()->get( 'Version' ),
        true
    );
    wp_enqueue_script(
        'bestdesign-parallax',
        'https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js',
        array( 'jquery' ),
        '1.4.2',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'bestdesign_enqueue_scripts' );

/** Registers the header and footer navigation locations exposed by the theme. */
function bestdesign_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu', 'bestdesign' ),
            'footer-menu' => __( 'Footer Menu', 'bestdesign' ),
        )
    );
}
add_action( 'init', 'bestdesign_register_menus' );

/** Removes WordPress's outer list wrapper where the legacy markup supplies its own list. */
function bestdesign_remove_menu_list_wrapper( $menu ) {
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'bestdesign_remove_menu_list_wrapper' );

/** Registers the Services content type used by the home and service templates. */
function bestdesign_register_services_post_type() {
    register_post_type(
        'bestdesign_services',
        array(
            'labels' => array(
                'name'          => __( 'Services', 'bestdesign' ),
                'singular_name' => __( 'Service', 'bestdesign' ),
                'add_new'       => __( 'Add Service', 'bestdesign' ),
                'add_new_item'  => __( 'Add Service', 'bestdesign' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'taxonomies'  => array( 'category' ),
        )
    );
}
add_action( 'init', 'bestdesign_register_services_post_type' );

/** Adds the ACF options page when Advanced Custom Fields Pro is available. */
function bestdesign_register_acf_options_page() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page();
    }
}
add_action( 'acf/init', 'bestdesign_register_acf_options_page' );

/** Registers the portfolio/work content type used by project listings. */
function bestdesign_register_work_post_type() {
    register_post_type(
        'bestdesign_work',
        array(
            'labels' => array(
                'name'          => __( 'Works', 'bestdesign' ),
                'singular_name' => __( 'Work', 'bestdesign' ),
                'add_new'       => __( 'Add Work', 'bestdesign' ),
                'add_new_item'  => __( 'Add Work', 'bestdesign' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array( 'title', 'thumbnail', 'excerpt' ),
            'taxonomies'  => array( 'category' ),
        )
    );
}
add_action( 'init', 'bestdesign_register_work_post_type' );

/** Registers the testimonial content type displayed by the home-page carousel. */
function bestdesign_register_testimonial_post_type() {
    register_post_type(
        'bd_testimonial',
        array(
            'labels' => array(
                'name'          => __( 'Testimonials', 'bestdesign' ),
                'singular_name' => __( 'Testimonial', 'bestdesign' ),
                'add_new'       => __( 'Add Testimonial', 'bestdesign' ),
                'add_new_item'  => __( 'Add Testimonial', 'bestdesign' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array( 'title', 'thumbnail', 'excerpt', 'editor' ),
            'taxonomies'  => array( 'category' ),
        )
    );
}
add_action( 'init', 'bestdesign_register_testimonial_post_type' );

/** Rewords the testimonial title placeholder so editors know to enter a client name. */
function bestdesign_testimonial_title_placeholder( $title ) {
    $screen = get_current_screen();

    if ( $screen && 'bd_testimonial' === $screen->post_type ) {
        return __( 'Enter the name here', 'bestdesign' );
    }

    return $title;
}
add_filter( 'enter_title_here', 'bestdesign_testimonial_title_placeholder' );

/** Registers the home-page Our Work widget area. */
function bestdesign_register_work_sidebar() {
    register_sidebar(
        array(
            'id'            => 'sidebar-home',
            'name'          => esc_html__( 'Our Work', 'bestdesign' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'bestdesign_register_work_sidebar' );

/** Registers the legacy Shortcode widget area used by existing page content. */
function bestdesign_register_shortcode_sidebar() {
    register_sidebar(
        array(
            'id'            => 'shortcode-home',
            'name'          => esc_html__( 'Shortcode', 'bestdesign' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'bestdesign_register_shortcode_sidebar' );

/** Returns the first requested number of whitespace-separated words from a string. */
function bestdesign_limit_words( $string, $limit ) {
    $words = preg_split( '/\s+/', trim( $string ) );
    return implode( ' ', array_slice( $words, 0, max( 0, (int) $limit ) ) );
}
