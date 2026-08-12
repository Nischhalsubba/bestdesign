<?php
/**
 * Default WordPress archive/index template for the Best Design theme.
 * Renders the active query with titles, excerpts, featured images, and standard
 * pagination when no more specific template matches the request.
 */

get_header();
?>

<main class="container pt-4 pb-4">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </a>
                <?php endif; ?>

                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; ?>

        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e( 'No content was found.', 'bestdesign' ); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
