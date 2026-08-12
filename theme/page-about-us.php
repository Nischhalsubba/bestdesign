<?php
/**
 * About page template for the Best Design WordPress theme.
 * Presents the configured introduction and a concise directory of published
 * services using a scoped WordPress query.
 */

get_header();

$services = new WP_Query(
    array(
        'post_type'      => 'bestdesign_services',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    )
);

$intro_title   = function_exists( 'get_field' ) ? get_field( 'title' ) : '';
$intro_content = function_exists( 'get_field' ) ? get_field( 'homepage_introduction' ) : '';
$service_index = 0;
?>

<section class="about-hero">
    <div class="image">
        <h1 class="mt-auto mb-auto int container">ABOUT US</h1>
    </div>
</section>

<section class="intro pt-7 pb-7">
    <div class="container grid grid-cn">
        <div>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/Mask Group 1.png' ); ?>" alt="">
        </div>

        <div class="introduction">
            <?php if ( $intro_title ) : ?>
                <h2 class="txt-secondary"><?php echo esc_html( $intro_title ); ?></h2>
            <?php endif; ?>
            <?php if ( $intro_content ) : ?>
                <?php echo wp_kses_post( $intro_content ); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="container-full cta about-cta">
    <div class="container mt-auto mb-auto">
        <h1>Make with love all what we do.</h1>
        <h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis
        </h2>
        <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="btn">SEE A PROJECT</a>
    </div>
</section>

<section class="service about-service pb-2">
    <div class="int pt-2 pb-2">
        <strong>SERVICE</strong>
        <span>OUR SERVICE</span>
    </div>

    <div class="container d-flex about-flex">
        <?php while ( $services->have_posts() ) : ?>
            <?php
            $services->the_post();
            $service_index++;
            ?>
            <article class="item">
                <div class="int">
                    <strong><?php echo esc_html( str_pad( (string) $service_index, 2, '0', STR_PAD_LEFT ) ); ?></strong>
                    <span><?php the_title(); ?></span>
                </div>
                <p class="mb-3">
                    <?php echo esc_html( bestdesign_limit_words( wp_strip_all_tags( get_the_excerpt() ), 30 ) ); ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="btn outline dark-text">READ MORE</a>
            </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>
