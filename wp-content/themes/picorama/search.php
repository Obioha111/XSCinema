<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Picorama
 */

get_header(); ?>
<div id="content" class="site-content">
	<section id="primary" class="content-area page-details">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="row">
                
                	<div class="col-md-12">
                    	<div class="inner-wrapper">
							<?php
                            if ( have_posts() ) : ?>
                    
                                <header class="404-page-header">
                                    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'picorama' ), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h1>
                                </header><!-- .page-header -->
                    
                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                    
                                    /**
                                     * Run the loop for the search to output the results.
                                     * If you want to overload this in a child theme then include a file
                                     * called content-search.php and that will be used instead.
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
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
