<?php
/**
 * Template Name: Alt Home Page Features, no sidebar
 * Description: Alt Home Page Features with no sidebar
 */
// Define page_id
$page_ID = get_the_ID();
 
// Define paginated posts
$page    = get_query_var( 'page' );
 
// Define custom query parameters
$args    = array(
    'post_type'      => 'post',
    'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
);

if ( is_front_page() )
    $args['paged'] = $page;
	
$the_query = new WP_Query( $args );
	
get_header(); ?>
<?php get_template_part( 'template-parts/slider' ) ; ?>
<div id="content" class="site-content">
	<?php  if(get_theme_mod( 'display_optional_pages_setting', 1) == 1) { ?>
        <section id="home-optional-pages" class="featured-article">
            <div class="container">
                <div class="row">
                    <?php 
						$optional_first_selected_page = get_theme_mod( 'optional_first_page_setting');
						$optional_second_selected_page = get_theme_mod( 'optional_second_page_setting');
					 	$optional_third_selected_page = get_theme_mod( 'optional_third_page_setting');
						
						if($optional_first_selected_page){
							$optional_first_args = array(
									'post_type' => 'page',
									'p' => $optional_first_selected_page,
									'order'   => 'ASC',
									); 
					
							$optional_first_page = new WP_Query( $optional_first_args );
						
							if ($optional_first_page->have_posts()) :          
								while ($optional_first_page->have_posts()) : $optional_first_page->the_post();
									get_template_part('template-parts/content', 'optional-pages');                    
								endwhile;
								wp_reset_postdata();
							endif; 
						}
						if($optional_second_selected_page){
							$optional_second_args = array(
									'post_type' => 'page',
									'p' => $optional_second_selected_page,
									'order'   => 'ASC',
									); 
					
							$optional_second_page = new WP_Query( $optional_second_args );
						
							if ($optional_second_page->have_posts()) :          
								while ($optional_second_page->have_posts()) : $optional_second_page->the_post();
									get_template_part('template-parts/content', 'optional-pages');                    
								endwhile;
								wp_reset_postdata();
							else:
							endif; 
						}
						if($optional_third_selected_page){
							$optional_third_args = array(
									'post_type' => 'page',
									'p' => $optional_third_selected_page,
									'order'   => 'ASC',
									); 
					
							$optional_third_page = new WP_Query( $optional_third_args );
						
							if ($optional_third_page->have_posts()) :          
								while ($optional_third_page->have_posts()) : $optional_third_page->the_post();
									get_template_part('template-parts/content', 'optional-pages');                    
								endwhile;
								wp_reset_postdata();
							else:
							endif; 
						}
					 ?>
                </div>
            </div>
        </section>
	<?php  } ?>
	<div id="primary" class="content-area">    
		<main id="main" class="site-main" role="main">
        	<div class="container">
            	<div class="white-background">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                if ( $the_query->have_posts() ) :
                       
                                    /* Start the Loop */
                                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        
                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/content', get_post_format() );
                        
                                    endwhile;
                                    $pagination_args = array(
                                        'mid_size' => 2,
                                        'prev_text' => '<span class="fa fa-chevron-left"></span>', 
                                        'next_text' => '<span class="fa fa-chevron-right"></span>'
                                    );
                                                                        
									$orig_query = $wp_query; 
                                    $wp_query = $the_query;
									
                                    the_posts_pagination( $pagination_args );
									
                        			$wp_query = $orig_query;
                                else :
                        
                                    get_template_part( 'template-parts/content', 'none' );
                        
                                endif;
                                ?>
                                <?php wp_reset_postdata(); ?>
    					</div>
                    </div>
                </div><!-- white-background -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
