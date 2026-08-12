<?php
/**
 * Shared footer for the Best Design WordPress theme.
 * Renders location/contact shortcuts, recent featured services, the registered
 * footer menu, recent work, theme branding, and the current copyright year.
 */

$footer_services = new WP_Query(
    array(
        'post_type'      => 'bestdesign_services',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'category_name'  => 'featured',
        'order'          => 'DESC',
        'orderby'        => 'date',
    )
);

$footer_work = new WP_Query(
    array(
        'post_type'      => 'bestdesign_work',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'order'          => 'DESC',
        'orderby'        => 'date',
    )
);
?>

<section class="container-full location pb-2">
    <div class="int pt-2 pb-2">
        <strong>LOCATION</strong>
        <span>WE ARE LOCATED AT</span>
    </div>

    <div class="info">
        <div class="info1 grid-center">
            <a href="https://maps.google.com/?q=Baneshor+Kathmandu+Nepal">
                <h2>Baneshor kathmandu Nepal</h2>
            </a>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder.png' ); ?>" alt="">
        </div>

        <div class="info2 grid-center">
            <a href="tel:9844444555">
                <h2>9844444555</h2>
            </a>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/telephone.png' ); ?>" alt="">
        </div>

        <div class="info3 grid-center">
            <a href="mailto:bestdesignktm@gmail.com">
                <h2>bestdesignktm@gmail.com</h2>
            </a>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/arroba.png' ); ?>" alt="">
        </div>
    </div>
</section>

<footer class="container-full">
    <div class="container">
        <div class="info-footer pt-2 pb-2">
            <div>
                <h2 class="fnt-2">SERVICE</h2>
                <ul class="pl-0">
                    <?php while ( $footer_services->have_posts() ) : ?>
                        <?php $footer_services->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>" class="thin"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            </div>

            <div>
                <h2 class="fnt-2">SOCIAL</h2>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'container'      => false,
                        'menu_class'     => 'pl-0 footer-social-menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </div>

            <div>
                <h2 class="fnt-2">OUR WORK</h2>
                <ul class="pl-0">
                    <?php while ( $footer_work->have_posts() ) : ?>
                        <?php $footer_work->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>" class="thin"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>

        <img
            src="<?php echo esc_url( get_template_directory_uri() . '/images/Bestdesign-ori-B&W.png' ); ?>"
            alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> logo"
            class="pt-2 pb-2 ml-3"
        >
    </div>

    <hr class="container">
    <div class="copyright grid-center text-center pt-1 pb-1">
        <h5>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> All Rights Reserved.</h5>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
