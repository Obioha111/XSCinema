<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Picorama
 */

?>
<?php if(has_post_thumbnail()){ ?>
    <header class="entry-header article-header">
        <?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
        <div class="blue-overlay"></div>
    </header><!-- .entry-header -->
<?php } ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
        
            <div class="row">
                <div class="col-md-12">
                	
                </div>
			</div>
            
            <div class="row page-details">
                
                <div class="col-md-9">
                	<div class="inner-wrapper">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                            <header class="entry-header">
								<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
                            </header><!-- .entry-header -->
                            
                            <div class="entry-content">
                                <?php
                                    the_content();
                        
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'picorama' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div><!-- .entry-content -->
                        
                            <footer class="entry-footer">
                                <?php
                                    edit_post_link(
                                        sprintf(
                                            /* translators: %s: Name of current post */
                                            esc_html__( 'Edit %s', 'picorama' ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    );
                                ?>
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->
                        
                        <?php
                         // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
                    </div>
				</div>
                
                <div class="col-md-3 sidebar-wrapper">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->