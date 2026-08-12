<?php
/**
 * Default single-post template for the Best Design theme.
 * Renders the current post title, featured image when available, and body copy.
 */

get_header();
?>

<main class="container pt-4 pb-4">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="single-featured-image">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>
            <?php endif; ?>

            <div class="single-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
