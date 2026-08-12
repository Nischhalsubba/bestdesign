<?php
/**
 * Default WordPress page template for the Best Design theme.
 * Shows the page title in the shared hero and renders the page body content.
 */

get_header();
?>

<section class="about-hero">
    <div class="image">
        <h1 class="mt-auto mb-auto int container"><?php echo esc_html( get_the_title() ); ?></h1>
    </div>
</section>

<main class="container pt-4 pb-4">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
