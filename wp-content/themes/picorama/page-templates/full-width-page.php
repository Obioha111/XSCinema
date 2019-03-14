<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 */

get_header(); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                         <header class="entry-header full-width-page">
                            <?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
                        </header><!-- .entry-header -->
                        <div class="inner-wrapper">
                            <?php
                            while ( have_posts() ) : the_post();
                        
                                get_template_part( 'template-parts/content', 'fullwidth' );
                               
                             // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                                        
                            endwhile; // End of the loop.
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
