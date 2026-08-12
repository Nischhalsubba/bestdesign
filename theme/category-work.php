<?php
/**
 * Category archive template for posts assigned to the legacy Work category.
 * Uses the normal WordPress archive loop so titles, excerpts, and permalinks are
 * rendered instead of running an unused secondary query.
 */

get_header();
?>

<main class="container pt-4 pb-4">
    <h1><?php single_cat_title(); ?></h1>

    <?php if ( have_posts() ) : ?>
        <div class="grid-3-3 grid-gap-2">
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <article <?php post_class( 'card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </a>
                    <?php endif; ?>
                    <div class="card-body">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e( 'No work posts were found.', 'bestdesign' ); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
