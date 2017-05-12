<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mediquip Plus
 */
?>
<div id="footer">
    	<div class="container">
              <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>             
               <?php endif; // end footer widget area ?>    
                        
               <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>                                  	
               <?php endif; // end footer widget area ?>   
            
               <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>                
               <?php endif; // end footer widget area ?>  
              
               <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>                 
               <?php endif; // end footer widget area ?>      
                
            <div class="clear"></div>
        </div><!--end .container--> 
        
        <div class="copywrap">
        	<div class="container">            	
				 <p><?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'mediquip-plus');?> </p>             
                <p><a href="<?php echo esc_url( __( 'http://zylothemes.com/themes/top-free-medical-wordpress-theme/', 'mediquip-plus' ) ); ?>">
				     <?php printf( __( 'Theme by %s', 'mediquip-plus' ), 'Mediquip Plus Theme' ); ?>
                  </a>
                </p>              
            </div>            
        </div><!--end .copywrap-->                
    </div><!--end .footer--> 
</div><!--end .header page wrap-->  
<?php wp_footer(); ?>
</body>
</html>