<?php get_header();?>

<!-- Carousel-Home -->
<div class="owl-carousel owl-theme section carousel-home">

    <?php
    $args = array(
    'post_type'=> 'bestdesign_services',
    'category_name'=>'featured', 
    );
    query_posts( $args );
    while ( have_posts() ) : the_post();
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    ?>

    <div class="item">
        <img src="<?php print $featured_img_url;?>" alt="<?php the_title();?>">
        <div class="owl-text">
            <h1><?php the_title();?></h1>
            <h2><?php echo get_field( "tagline" ); ?></h2>
            <a href="#" class="btn">MORE ON <?php the_title();?> SERVICE </a>
        </div>
    </div>

    <?php
    endwhile;
 
    // Reset Query
    wp_reset_query();
    ?>
</div>
<div class="owl-nav">
    <div class="owl-prev"></div>
    <div class="owl-next"></div>
</div>

<section class=" intro grid-center pt-7 pb-7">
    <div class="container grid grid-cn">
        <div>
            <img src=" <?php echo get_template_directory_uri(). './images/Mask Group 1.png'  ?> " alt="">
        </div>

        <div class="con">
            <h2 class="txt-secondary"> <?php echo get_field( "title"); ?> </h2>
            <p>
                <?php echo get_field( "homepage_introduction" ); ?>
            </p>

            <a href="#" class="btn outline float-rt p-3">READ MORE </a>

        </div>
    </div>
</section>

<section class="service">
    <div class="int pt-2 pb-2">
        <bold>SERVICE </bold>
        <span>OUR SERVICE</span>
    </div>

    <div class="container">
        <div class="grid pb-2">
            <div class="icon-set">
                <?php
            $args = array(
            'post_type'=> 'bestdesign_services'
            );
            query_posts( $args );
            while ( have_posts() ) : the_post();
            ?>
                <div class="icon">
                    <a href="#" class="grid-icon">
                        <div class="icon-holder">
                            <img src="./wp-content/uploads/icons/services/<?php print $post->post_name;?>.png" alt=""
                                class="sm-icon">
                        </div>

                        <span><?php the_title();?></span>

                        <p class="hidden" style="display:none;"><?php echo wp_filter_nohtml_kses(get_the_excerpt());?>
                        </p>
                    </a>
                </div>
                <?php
                endwhile;
            
                // Reset Query
                wp_reset_query();
                ?>
            </div>
            <div class="content">
                <p>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="work">
    <div class="int pt-2 pb-2">
        <bold>WORK </bold>
        <span>OUR WORK</span>
    </div>

    <div class="owl-carousel owl-theme carousel-work container">
        <?php
            $args = array(
            'post_type'=> 'bestdesign_work'
            );
            query_posts( $args );
            while ( have_posts() ) : the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
     ?>

        <div class="item">
            <a href="#">
                <div class="card">
                    <h3 class="mt-auto mb-auto">
                        <?php the_title();?>
                    </h3>
                    <img src="<?php print $featured_img_url;?>" alt="<?php the_title();?>">
                    <a href="#" class="btn btn-plain"> view details <i class="fas fa-arrow-right"></i> </a>
                    <!-- pending -->
                </div>
            </a>
        </div>
        <?php
                endwhile;
            
                // Reset Query
                wp_reset_query();
         ?>

    </div>
    <?php
    // Get the ID of a given category
    $category_id = get_cat_ID( 'work' );

    // Get the URL of this category
    $category_link = get_category_link( $category_id );
    ?>
    <div class="int mt-3 mb-3">
        <a href="<?php echo get_permalink( get_page_by_path( 'our-work' ) ) ?>" class="btn outline dark-text">SHOW ALL</a> <!-- pending -->
    </div>

</section>


<section class="container-full cta">  <!-- Pending -->
        <div class="container mt-auto mb-auto grid-8-2">
            <h1>
                LET'S DO <br>
                SOMETHING AMAZING
            </h1>
            <a href="#" class="btn pl-3 pr-3 text-center">
                GET A QUOTE
            </a>
        </div>
</section>

<section class="testimonial container pb-2">
        <div class="int pt-2 pb-2">
            <bold>TESTIMONIAL </bold>
            <span>WHAT OUR CLIENT SAYS?</span>
        </div>
        <div class="owl-carousel owl-theme carousel-testimonial">
        <?php
            $args = array(
            'post_type'=> 'bd_testimonial'
            );
            query_posts( $args );
            while ( have_posts() ) : the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        ?>
        <div class="item">
                <blockquote>
                        <?php echo wp_filter_nohtml_kses(get_the_content());?>
                </blockquote>
                <div class="ui-face">
                <img src="<?php print $featured_img_url;?>" alt="<?php the_title();?>">
                </div>

                <h3><?php the_title();?></h3>
                <h4> <?php echo wp_filter_nohtml_kses(get_the_excerpt());?></h4>
            </div>
            <?php
                endwhile;
            
                // Reset Query
                wp_reset_query();
         ?>   
        </div>
        

</section>
<?php get_footer();?>