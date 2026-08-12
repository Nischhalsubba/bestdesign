<!DOCTYPE html>
<!--
  Shared WordPress header for the Best Design theme.
  Provides document metadata, the theme-safe logo URLs, and navigation hooks
  consumed by the maintained js/index.js interaction layer.
-->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <nav class="nav bg-opac">
        <div class="container grid-4-6">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
                <div class="brand">
                    <img
                        src="<?php echo esc_url( get_template_directory_uri() . '/images/Bestdesign-ori-B&W.png' ); ?>"
                        data-logo-default="<?php echo esc_url( get_template_directory_uri() . '/images/Bestdesign-ori-B&W.png' ); ?>"
                        data-logo-scrolled="<?php echo esc_url( get_template_directory_uri() . '/images/Bestdesign-ori-color.png' ); ?>"
                        alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> logo"
                    >
                </div>
            </a>

            <button id="menu" class="menu-toggle" type="button" aria-label="Toggle navigation" aria-controls="navi" aria-expanded="false">
                <span id="bar1" class="bar"></span>
                <span id="bar2" class="bar"></span>
                <span id="bar3" class="bar"></span>
            </button>

            <ul class="menu" id="navi">
                <li>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'container'      => false,
                        )
                    );
                    ?>
                </li>
            </ul>
        </div>
    </nav>
