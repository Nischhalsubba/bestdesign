<?php get_header();?>

<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'work',
);
$arr_posts = new WP_Query( $args );
 


?>


<?php get_footer();?>