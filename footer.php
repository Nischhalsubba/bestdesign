<section class="container-full location pb-2">
    <div class="int pt-2 pb-2">
        <bold>LOCATION </bold>
        <span>WE ARE LOCATED AT</span>
    </div>

    <div class="info">
        <div class="info1 grid-center">
            <a href="#">
                <h2>Baneshor kathmandu Nepal</h2>
            </a>
            <img src="<?php echo get_template_directory_uri(). './images/placeholder.png' ?> " alt="">
        </div>

        <div class="info2 grid-center">
            <a href="#">
                <h2>9844444555</h2>
            </a>
            <img src="<?php echo get_template_directory_uri(). './images/telephone.png' ?>" alt="">
        </div>

        <div class="info3 grid-center">
            <a href="#">
                <h2>bestdesignktm@gmail.com</h2>
            </a>

            <img src="<?php echo get_template_directory_uri(). './images/arroba.png' ?>" alt="">
        </div>
    </div>
</section>

<footer class="container-full">
    <div class="container">
        <div class="info-footer pt-2 pb-2">
            <div>

                <ul class="pl-0">
                    <a href="#" class="fnt-2"> SERVICE</a> <br>
                    <?php
                        $args = array(
                        'post_type'=> 'bestdesign_services',
                        'category_name'=>'featured', 
                        'showposts' => '4',
                        'order' => 'DESC',
                        'orderby' => 'date'
                        );
                        query_posts( $args );
                        while ( have_posts() ) : the_post();
                    ?>
                    <li><a href="#" class="thin"><?php the_title();?></a></li>
                    <?php
                        endwhile;
                    
                        // Reset Query
                        wp_reset_query();
                        ?>
                </ul>

            </div>

            <div>
                <ul class="pl-0">
                    <a href="#" class="fnt-2">SOCIAL</a> <br>
                    
                    <li><a href="#" class="thin">
                    <ul id=”your-custom-id” class="pl-0 ">
                    <?php wp_nav_menu( array ( 'menu_id' => 'none','menu_class' => 'pl-0')); ?>
                    </ul>

                    </a></li>
                    
                </ul>
            </div>

            <div>
                <ul class="pl-0">
                    <a href="#" class="fnt-2">OUR WORK</a> <br>
                    <?php
                            $args = array(
                            'post_type'=> 'bestdesign_work',
                            'showposts' => '4',
                            'order' => 'DESC',
                            'orderby' => 'date'
                            );
                            query_posts( $args );
                            while ( have_posts() ) : the_post();
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                    ?>
                    <li><a href="#" class="thin"><?php the_title();?></a></li>

                    <?php
                            endwhile;
                        
                            // Reset Query
                            wp_reset_query();
                    ?>
                    
                </ul>
            </div>
        </div>

        <img src="<?php echo get_template_directory_uri(). '/images/Bestdesign-ori-B&W.png';?>" alt=""
            class="pt-2 pb-2 ml-3">

    </div>

    <hr class="container">
    <div class="copyright grid-center text-center pt-1 pb-1">
        <h5>copyright 2019 All Right Reserved.</h5>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>