<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <nav class="nav bg-opac">
        <div class="container grid-4-6">
            <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> home">
                <div class="brand">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/Bestdesign-ori-B&W.png'); ?>" alt="Best Design logo">
                </div>
            </a>

            <div id="menu" onclick="onClickMenu()" role="button" tabindex="0" aria-label="Toggle navigation" aria-controls="navi">
                <div id="bar1" class="bar"></div>
                <div id="bar2" class="bar"></div>
                <div id="bar3" class="bar"></div>
            </div>

            <script>
                function onClickMenu() {
                    document.getElementById("menu").classList.toggle("change");
                    document.getElementById("navi").classList.toggle("change");
                }
            </script>

            <ul class="menu" id="navi">
                <li>
                    <?php wp_nav_menu(array('menu' => 'Top-menu', 'container' => '')); ?>
                </li>
            </ul>
        </div>
    </nav>
