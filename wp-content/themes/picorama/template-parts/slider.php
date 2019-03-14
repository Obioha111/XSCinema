<?php 
	$slider_display = get_theme_mod( 'display_slider_setting', 1);
	$slider_cat = get_theme_mod( 'category_setting');
	 ?>	
<?php
//query posts
$args =	array(
	'offset'           => 0,
	'category_name' => $slider_cat,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'posts_per_page'      => 20,
	'suppress_filters' => true
);

$the_query = new WP_Query( $args );

?>
<?php if($slider_display == 1){ ?> 
<div class="flexslider carousel">
	<ul class="slides">
    <!-- items mirrored twice, total of 12 -->
	<?php if ($the_query->have_posts()) : ?>           
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?> 
        	 <?php
				if ( has_post_thumbnail() ) { 
				
				?>
               <li onclick='window.location.href="<?php the_permalink('') ?>"'>
					<?php the_post_thumbnail( 'full', array( 'class' => 'full-slide' ) ); ?>
                    <div class="slide-desc">
                        <div class="desc-container">
                            <h1><?php picorama_custom_title('', '...', true, '25'); ?></h1>
                            
                            <div class="post-data">
                                <?php picorama_posted_on(); ?>
                            </div>
                        </div>
                    </div>
                </li>
        	<?php } ?> 
        <?php endwhile; ?> 
    <?php endif; ?> 
<?php wp_reset_postdata(); ?>

  </ul>

</div>
<?php }else{ ?>
		<div class="no-slide"></div>
<?php }