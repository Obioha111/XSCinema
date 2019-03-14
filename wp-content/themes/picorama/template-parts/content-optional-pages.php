<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Picorama
 *
 */

?>
<div class="col-md-4">	
    <div class="featured-container">
		<?php if(has_post_thumbnail()){ ?>
            <div class="featured-image">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php } ?>
        <a href="<?php the_permalink();?>"><?php the_title( '<h2>', '</h2>' ); ?></a>
        <div class="about-entry">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink();?>" class="read_more"><?php _e( 'Read More', 'picorama' ); ?></a>
        </div>
        
    </div>
</div>