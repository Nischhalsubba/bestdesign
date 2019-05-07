<?php get_header(); ?>

<section class="our-work-hero" style="display: block;width: 100%; overflow:hidden;">

    <?php dynamic_sidebar('sidebar-home') ?>
    <h1 class="mt-auto mb-auto int container" style="position: absolute;top: 40%;left:5%;"> <?php echo get_the_title(); ?> </h1>

</section>
<div class="container ourwork pt-4 pb-4 pt-4">

    <div class="grid-3-3 grid-gap-2">
        <?php
        $args = array(
            'post_type' => 'bestdesign_work'
        );
        query_posts($args);
        while (have_posts()) : the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
        <div class='card'>
            <img src="<?php print $featured_img_url; ?>" alt="<?php the_title(); ?>">
            <div class='card-body'>
                <div class='card-text'>
                    <h3><?php the_title(); ?></h3>

                </div>
                <a href="#" class="btn">More Details</a>
            </div>
        </div>
        <?php
    endwhile;

    // Reset Query
    wp_reset_query();
    ?>
    </div>
</div>


<?php get_footer(); ?> 