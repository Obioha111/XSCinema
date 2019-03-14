<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Picorama
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="footer-widget-container">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-one-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-two-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-three-widget'); ?>
                    </div>
				</div>
			</div>
        </div>
        
		<div class="site-info">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-12">
                    <?php if(is_front_page() ){
						$theme = wp_get_theme(); ?>  
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'picorama' ) ); ?>" title="<?php esc_attr_e( 'WordPress' ,'picorama' ); ?>"><?php printf( __( 'Powered by %s', 'picorama' ), 'WordPress' ); ?></a>
					<?php
						$url = $theme['Author URI'];
						$link = sprintf( wp_kses( __( 'and <a href="%s">Themesforbloggers.com</a>', 'picorama' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
						echo $link;
					?>
                    <?php } else{?>
                    	<?php echo __('&copy; ', 'picorama') . esc_attr( get_bloginfo('name') );  ?>
                        <?php } ?>
					</div>
                </div>
            </div>
        </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
