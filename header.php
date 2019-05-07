<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Best Design</title>

    <?php wp_head (); ?>
</head>

    <nav class="nav bg-opac">
        <div class="container grid-4-6 ">
            <a href="index.html">
                <div class="brand"> <img src="<?php echo get_template_directory_uri(). '/images/Bestdesign-ori-B&W.png';?>" alt="Best Design logo"></div>
            </a>

            <div id="menu" onclick="onClickMenu()">
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
                 <?php wp_nav_menu( array( 'menu' => 'Top-menu','container' => '') ); ?> 
                </li>
             </ul>   
        </div>

    </nav>
