<?php
/**
 * Front-page template for the Best Design WordPress theme.
 * Composes featured services, the introduction, service explorer, work carousel,
 * call-to-action, and testimonials from the theme's registered content types.
 */

get_header();

$featured_services = new WP_Query(
    array(
        'post_type'      => 'bestdesign_services',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'category_name'  => 'featured',
    )
);

$services = new WP_Query(
    array(
        'post_type'      => 'bestdesign_services',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    )
);

$work_items = new WP_Query(
    array(
        'post_type'      => 'bestdesign_work',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    )
);

$testimonials = new WP_Query(
    array(
        'post_type'      => 'bd_testimonial',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    )
);

$upload_dir    = wp_get_upload_dir();
$intro_title   = function_exists( 'get_field' ) ? get_field( 'title' ) : '';
$intro_content = function_exists( 'get_field' ) ? get_field( 'homepage_introduction' ) : '';
?>

<!-- Featured services carousel. -->
<div class="owl-carousel owl-theme section carousel-home">
    <?php while ( $featured_services->have_posts() ) : ?>
        <?php
        $featured_services->the_post();
        $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $tagline        = function_exists( 'get_field' ) ? get_field( 'tagline' ) : '';
        ?>
        <article class="item">
            <?php if ( $featured_image ) : ?>
                <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
            <?php endif; ?>
            <div class="owl-text">
                <h1><?php the_title(); ?></h1>
                <?php if ( $tagline ) : ?>
                    <h2><?php echo esc_html( $tagline ); ?></h2>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>" class="btn">MORE ON <?php echo esc_html( get_the_title() ); ?> SERVICE</a>
            </div>
        </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>

<section class="intro grid-center pt-7 pb-7">
    <div class="container grid grid-cn">
        <div>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/Mask Group 1.png' ); ?>" alt="">
        </div>
        <div class="con">
            <?php if ( $intro_title ) : ?>
                <h2 class="txt-secondary"><?php echo esc_html( $intro_title ); ?></h2>
            <?php endif; ?>
            <?php if ( $intro_content ) : ?>
                <p><?php echo wp_kses_post( $intro_content ); ?></p>
            <?php endif; ?>
            <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="btn outline float-rt p-3">READ MORE</a>
        </div>
    </div>
</section>

<!-- Service explorer used by js/index.js for the hover description preview. -->
<section class="service">
    <div class="int pt-2 pb-2">
        <strong>SERVICE</strong>
        <span>OUR SERVICE</span>
    </div>

    <div class="container">
        <div class="grid pb-2">
            <div class="icon-set">
                <?php while ( $services->have_posts() ) : ?>
                    <?php
                    $services->the_post();
                    $service_slug = get_post_field( 'post_name', get_the_ID() );
                    $icon_url     = trailingslashit( $upload_dir['baseurl'] ) . 'icons/services/' . rawurlencode( $service_slug ) . '.png';
                    ?>
                    <div class="icon">
                        <a href="<?php the_permalink(); ?>" class="grid-icon">
                            <div class="icon-holder">
                                <img src="<?php echo esc_url( $icon_url ); ?>" alt="" class="sm-icon">
                            </div>
                            <span><?php the_title(); ?></span>
                            <p class="hidden" style="display: none;"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="content" aria-live="polite">
                <p></p>
            </div>
        </div>
    </div>
</section>

<!-- Recent work carousel. -->
<section class="work">
    <div class="int pt-2 pb-2">
        <strong>WORK</strong>
        <span>OUR WORK</span>
    </div>

    <div class="owl-carousel owl-theme carousel-work container">
        <?php while ( $work_items->have_posts() ) : ?>
            <?php
            $work_items->the_post();
            $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            ?>
            <article class="item">
                <div class="card">
                    <h3 class="mt-auto mb-auto"><?php the_title(); ?></h3>
                    <?php if ( $featured_image ) : ?>
                        <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-plain">View details <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>

    <div class="int mt-3 mb-3">
        <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="btn outline dark-text">SHOW ALL</a>
    </div>
</section>

<section class="container-full cta">
    <div class="container mt-auto mb-auto grid-8-2">
        <h1>LET'S DO <br>SOMETHING AMAZING</h1>
        <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="btn pl-3 pr-3 text-center">GET A QUOTE</a>
    </div>
</section>

<!-- Client testimonials carousel. -->
<section class="testimonial container pb-2">
    <div class="int pt-2 pb-2">
        <strong>TESTIMONIAL</strong>
        <span>WHAT OUR CLIENT SAYS?</span>
    </div>
    <div class="owl-carousel owl-theme carousel-testimonial">
        <?php while ( $testimonials->have_posts() ) : ?>
            <?php
            $testimonials->the_post();
            $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            ?>
            <article class="item">
                <blockquote><?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?></blockquote>
                <?php if ( $featured_image ) : ?>
                    <div class="ui-face">
                        <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    </div>
                <?php endif; ?>
                <h3><?php the_title(); ?></h3>
                <h4><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></h4>
            </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>
