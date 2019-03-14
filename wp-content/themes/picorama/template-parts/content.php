<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Picorama
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

     <div class="featured-image-wrapper <?php if( !has_post_thumbnail() ){ echo 'no-image'; }?>"><?php
         if(has_post_thumbnail()){ ?>
            <a href="<?php the_permalink('') ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
        <?php } ?>
        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php picorama_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php
        endif; ?>
    </div>
        
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			}else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
        
        <div class="entry-meta mobile">
			<?php picorama_posted_on(); ?>
        </div><!-- .entry-meta -->
        
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink('') ?>" class="read_more"><?php _e( 'Read More', 'picorama' ); ?></a>
       
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
