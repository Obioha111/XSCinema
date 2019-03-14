<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Picorama
 */

get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area page-details">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="row">
                    <section class="error-404 not-found">
                    	<div class="col-md-9 inner-wrapper">
                        
                            <header class="404-page-header">
                                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'picorama' ); ?></h1>
                            </header><!-- .page-header -->
                            
                            <div class="page-content">
                                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'picorama' ); ?></p>
                                <?php 
                                    /* translators: %1$s: smiley */
                                    $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'picorama' ), convert_smilies( ':)' ) ) . '</p>';
                                    the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                                    the_widget( 'WP_Widget_Tag_Cloud' ); 
                                ?>
                            </div><!-- .page-content -->
                            
						</div>
        
                         <div class="col-md-3 sidebar-wrapper">
								<?php get_sidebar(); ?>
            			 </div>

                    </section><!-- .error-404 -->
				</div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
