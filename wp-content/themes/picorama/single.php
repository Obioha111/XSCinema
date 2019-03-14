<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Picorama
 */

get_header(); ?>
<div id="content" class="site-content">	
	<?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'single' );

    endwhile; // End of the loop.
    ?>

<?php get_footer(); ?>
