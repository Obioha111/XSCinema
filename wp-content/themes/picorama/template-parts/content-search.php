<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Picorama
 */

?>
<div class="col-md-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        
         <div class="archived-image-wrapper <?php if( !has_post_thumbnail() ){ echo 'no-image'; }?>"><?php
             if(has_post_thumbnail()){ ?>
                <a href="<?php the_permalink('') ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
            <?php } ?>
            
            
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header><!-- .entry-header -->
    
        </div>
    
    </article><!-- #post-## -->
</div>