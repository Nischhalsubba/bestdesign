<?php
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' ); 


function google_fonts(){
    wp_register_style('oswald','//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700');
    wp_enqueue_style('oswald');

    wp_register_style('poppins','//fonts.googleapis.com/css?family=Poppins:100,100i,200,300,400,500,600,700,800');
    wp_enqueue_style('poppins');

    wp_register_style('material','//fonts.googleapis.com/icon?family=Material+Icons');
    wp_enqueue_style('material');
}
add_action('wp_enqueue_scripts','google_fonts');

function enqueue_my_custom_styles() {
    wp_register_style('owl-theme-default', get_template_directory_uri().'./owl carousel/owl.theme.default.min.css', array(),false, 'all' );
    wp_enqueue_style('owl-theme-default');

    wp_register_style('owl-carousel-min', get_template_directory_uri().'./owl carousel/owl.carousel.min.css', array(),false, 'all' );
    wp_enqueue_style('owl-carousel-min');

    wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(),false, 'all' );
    wp_enqueue_style('fontawesome');

    //wp_register_style('my-own-css', get_template_directory_uri().'./css/style.css', array(),false, 'all' );
    //wp_enqueue_style('my-own-css');
}

add_action( 'wp_enqueue_scripts', 'enqueue_my_custom_styles' );


function include_jquery(){
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js', '', 1,true);

    add_action('wp_enqueue_scripts','jquery');
}
add_action('wp_enqueue_scripts','include_jquery');


function loadjs()
{
    wp_register_script('owl-carousel', get_template_directory_uri(). './owl carousel/owl.carousel.min.js', '' ,1, true);
    wp_enqueue_script('owl-carousel');

    wp_register_script('indexjs', get_template_directory_uri(). './js/index.js', '' ,1, true);
    wp_enqueue_script('indexjs');

    wp_register_script('parallax', 'https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js', '', 1,true);
    wp_enqueue_script('parallax');

}

add_action('wp_enqueue_scripts','loadjs');

//Menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function remove_ul ( $menu ){
  return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );


function create_services_post_type() {
    register_post_type( 'bestdesign_services',
      array(
        'labels' => array(
          'name' => __( 'Services' ),
          'singular_name' => __( 'Service' ),
          'add_new' => 'Add Services', 
        'add_new_item' => 'Add Services',
        ),
        'public' => true,
        'has_archive' => true,
        'supports'    => array( 'title', 'editor','thumbnail', 'excerpt'),
        'taxonomies'  => array( 'category' )
      )
    );
  }

  add_action( 'init', 'create_services_post_type' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
}


function create_work_post_type() {
  register_post_type( 'bestdesign_work',
    array(
      'labels' => array(
        'name' => __( 'works' ),
        'singular_name' => __( 'work' ),
        'add_new' => 'Add Work', 
        'add_new_item' => 'Add Work',
      ),
      'public' => true,
      'has_archive' => true,
      'supports'    => array( 'title','thumbnail', 'excerpt'),
      'taxonomies'  => array( 'category' )
    )
  );
}

add_action( 'init', 'create_work_post_type' );


function create_say_post_type() {
  register_post_type( 'bd_testimonial',
    array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial' ),
        'add_new' => 'Add Testimonial', 
        'add_new_item' => 'Add Testimonial',
      ),
      'public' => true,
      'has_archive' => true,
      'supports'    => array( 'title','thumbnail', 'excerpt','editor'),
      'taxonomies'  => array( 'category' )
    )
  );
}

add_action( 'init', 'create_say_post_type' );


//Renaming Testimonial
function wpb_change_title_text( $title ){
  $screen = get_current_screen();

  if  ( 'bd_testimonial' == $screen->post_type ) {
       $title = 'Enter the Name here';
  }

  return $title;
}



add_filter( 'enter_title_here', 'wpb_change_title_text' );

//Registering widget
function arphabet_widgets_init() {

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
add_action( 'widgets_init', 'arphabet_widgets_init' );

function shortcode_widgets_init() {

  register_sidebar(
		array(
			'id'            => 'Shortcode-home',
			'name'          => esc_html__( 'Shortcode', 'bestdesign' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shortcode_widgets_init' );



//Setting words limit in excerpt
function word_count($string, $limit) {
 
  $words = explode(' ', $string);
   
  return implode(' ', array_slice($words, 0, $limit));
}



?>

