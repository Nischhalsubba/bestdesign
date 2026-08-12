<?php
/**
 * Portfolio listing page for the Best Design WordPress theme.
 * Renders the configured hero widget area and a grid of published work items.
 */

get_header();

$work_query = new WP_Query(
    array(
        'post_type'      => 'bestdesign_work',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    )
);
?>

<section class="our-work-hero" style="display: block; width: 100%; overflow: hidden;">
    <?php dynamic_sidebar( 'sidebar-home' ); ?>
    <h1 class="mt-auto mb-auto int container" style="position: absolute; top: 40%; left: 5%;">
        <?php echo esc_html( get_the_title() ); ?>
    </h1>
</section>

<main class="container ourwork pt-4 pb-4">
    <div class="grid-3-3 grid-gap-2">
        <?php while ( $work_query->have_posts() ) : ?>
            <?php
            $work_query->the_post();
            $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            ?>
            <article <?php post_class( 'card' ); ?>>
                <?php if ( $featured_image ) : ?>
                    <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                <?php endif; ?>
                <div class="card-body">
                    <div class="card-text">
                        <h3><?php the_title(); ?></h3>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn">More Details</a>
                </div>
            </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>

<?php get_footer(); ?>
