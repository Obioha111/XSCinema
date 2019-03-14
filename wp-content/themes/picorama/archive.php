<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Picorama
 */

get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area page-details">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="row">
                	<div class="col-md-12">
                    	<div class="inner-wrapper">
							<?php
                            if ( have_posts() ) : ?>
                    
                                <header class="404-page-header">
                                	<h1 class="page-title"><?php echo get_the_archive_title(); ?></h1>
                                    <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                                </header><!-- .page-header -->
                                <div class="row">
                                    <?php
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                        
                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/content', 'search' );
                        
                                    endwhile;
                        
                                else :
                        
                                    get_template_part( 'template-parts/content', 'none' );
                        
                                endif; ?><div class="clearfix"></div>
                                <?php
                                    the_posts_pagination( array(
                                        'mid_size' => 2,
                                        'prev_text' => '<span class="fa fa-chevron-left"></span>',
                                        'next_text' => '<span class="fa fa-chevron-right"></span>'
                                    ) ); 
                                ?>
                            </div>
                            
                        </div>
					</div>	
					
            	</div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
