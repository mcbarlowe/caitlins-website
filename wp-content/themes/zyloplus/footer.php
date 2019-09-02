<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Zyloplus
 */
?>
<div id="footer">
        <div class="copyright-wrapper">
        	<div class="container">
             <?php if ( ! dynamic_sidebar( 'sidebar-footer' ) ) : ?>
            	<div class="footerleft">				
                  <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'zyloplus');?>                
                </div>
                <div class="footerright">				
				 <a href="<?php echo esc_url( __( 'https://zylothemes.com/themes/top-free-corporate-wordpress-theme/', 'zyloplus' ) ); ?>">
				     <?php printf( __( 'Design and Develop by %s', 'zyloplus' ), 'Zylo Themes' ); ?>
                  </a>
                </div>
                <div class="clear"></div>
               <?php endif; // end sidebar widget area ?>	 
            </div><!--#end .container-->           
        </div><!--#end .copyright-wrapper-->
    </div><!--#end #footer-->
    
</div><!--#end pageholder-->
<?php wp_footer(); ?>
</body>
</html>