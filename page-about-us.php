<?php get_header(); ?>
<section class="about-hero">
    <div class="image">
        <h1 class="mt-auto mb-auto int container">ABOUT US</h1>
    </div>
</section>

<section class="intro pt-7 pb-7">
    <div class="container grid grid-cn">
        <div>
            <img src=" <?php echo get_template_directory_uri() . './images/Mask Group 1.png'  ?> " alt="">
        </div>

        <div class="introduction">
            <h2 class="txt-secondary"> <?php echo get_field("title"); ?> </h2>
            <?php echo get_field("homepage_introduction"); ?>
            <a href="#" class="btn outline float-rt p-3 dark-text">READ MORE </a>
        </div>
        <!--Introduction-->
    </div>
</section>

<section class="container-full cta about-cta">
    <div class="container mt-auto mb-auto ">
        <h1>
            Make with love all what we do.
        </h1>
        <h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis
        </h2>
        <a href="#" class="btn">
            SEE A PROJECT
        </a>
    </div>
</section>


<section class="service about-service pb-2">
    <div class="int pt-2 pb-2">
        <bold>SERVICE </bold>
        <span>OUR SERVICE</span>
    </div>

    <div class="container d-flex about-flex">
        <?php
        $args = array(
            'post_type' => 'bestdesign_services'
        );
        query_posts($args);
        while (have_posts()) : the_post();
            ?>
        <div class="item">
            <div class="int">
                <?php $i = 0;
                $i++;  ?>
                <bold><?php echo $i; ?></bold>
                <span><?php the_title(); ?></span>
            </div>
            <p class="mb-3">
                <?php echo wp_filter_nohtml_kses(word_count(get_the_excerpt(), '30')); ?>
            </p>
            <a href="#" class="btn outline dark-text  ">READ MORE</a>
        </div>
        <?php
    endwhile;

    // Reset Query
    wp_reset_query();
    ?>
    </div>

</section>

<?php get_footer(); ?> 