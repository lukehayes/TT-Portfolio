<?php
/*
Template Name: Full-width layout
Template Post Type: product
*/
?>

<?php get_header(); ?>
<h3>Portfolio Template from plugin.</h3>


<?php global $post; ?>

<p><?php the_title(); ?></p>

<p><?php echo $post->post_content; ?></p>

<?php get_footer(); ?>
