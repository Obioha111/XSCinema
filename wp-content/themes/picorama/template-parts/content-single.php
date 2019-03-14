<?php
/**
 * Template part for displaying posts.
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
        
        <div class="category-navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            $post_id = $post->ID; // current post ID
                            $cat = get_the_category(); 
                            $current_cat_id = $cat[0]->cat_ID; // current category ID 
                            
                            $args = array( 
                                'category' => $current_cat_id,
                                'orderby'  => 'post_date',
                                'order'    => 'ASC'
                            );
                            $posts = get_posts( $args );
                            // get IDs of posts retrieved from get_posts
                            $ids = array();
                            foreach ( $posts as $thepost ) {
                                $ids[] = $thepost->ID;
                            }
                            // get and echo previous and next post in the same category
                            $thisindex = array_search( $post_id, $ids );
                            
                            if( isset($ids[ $thisindex - 1 ]) ){
                                ?><a class="nav-left" rel="prev" href="<?php echo esc_url(get_permalink($ids[ $thisindex - 1 ])) ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a><?php
                            }if( isset($ids[ $thisindex + 1 ]) ){
                                ?><a class="nav-right" rel="next" href="<?php echo esc_url(get_permalink($ids[ $thisindex + 1 ])) ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a><?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    </header><!-- .entry-header -->
<?php } ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container single-post">
        
            <div class="row post-details">
            
                <div class="col-md-9">
                	<div class="inner-wrapper">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                            <header class="entry-header">
                                <?php
                                    if ( is_single() ) {
                                        the_title( '<h1 class="entry-title">', '</h1>' );
                                    } else {
                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                    }
                                ?>
                                <?php if ( 'post' === get_post_type() ) : ?>
                                <div class="entry-meta ">
                                    <?php picorama_posted_on(); ?>
                                </div><!-- .entry-meta -->
                                <?php
                                endif; ?>
                            </header><!-- .entry-header -->
                        
                            <div class="entry-content">
                                <?php the_content(); ?>
                               
                                <?php    
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'picorama' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div><!-- .entry-content -->
                            
                        </article><!-- #post-## -->
                        
                        <?php
                            the_post_navigation();
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