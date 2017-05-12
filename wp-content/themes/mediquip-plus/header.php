<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Mediquip Plus
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="pageholder" <?php if( get_theme_mod( 'mediquip_plus_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<div class="header">
  <div class="container">
    <div class="logo">
     <?php if ( ! dynamic_sidebar( 'header-1' ) ) : ?>             
     <?php endif; // end header widget area ?>   
        <?php mediquip_plus_the_custom_logo(); ?>
        <div class="site-branding-text <?php if( get_theme_mod( 'mediquip_plus_hide_titledesc' ) ) { ?>hidetitle<?php } ?>">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                    <span><?php echo esc_html($description); ?></span>
                <?php endif; ?> 
              </div><!-- .site-branding-text -->   
       </div><!-- logo -->
      
  </div><!-- container -->
  
  <div class="headerNav">
 <div class="container">
      <div class="toggle">
       <a class="toggleMenu" href="#">
         <?php _e('Menu','mediquip-plus'); ?>
       </a>
      </div> <!-- toggle -->
     <div class="sitenav">
      <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
     </div><!-- site-nav -->
  </div><!-- container --> 
</div><!-- .headerNav-->

</div><!--.header -->
    
<?php if ( is_front_page() && !is_home() ) { ?>
	<?php $hideslide = get_theme_mod('mediquip_plus_disabled_slides', '1'); ?>
		<?php if($hideslide == ''){ ?>
              <?php for($sld=11; $sld<14; $sld++) { ?>
                	<?php if( get_theme_mod('mediquip_plus_pagecolumn'.$sld)) { ?>
                	<?php $slidequery = new WP_query('page_id='.esc_attr(get_theme_mod('mediquip_plus_pagecolumn'.$sld,true))); ?>
                	<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
                			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                			$img_arr[] = $image;
               				$id_arr[] = $post->ID;
                		endwhile; 
						wp_reset_postdata();
                	}
                }
                ?>
<?php if(!empty($id_arr)){ ?>
        <div id="slider" class="nivoSlider">
            <?php 
            $i=1;
            foreach($img_arr as $url){ ?>
            <?php if(!empty($url)){ ?>
            <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo $i; ?>" />
            <?php }else{ ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/banner1.jpg" title="#slidecaption<?php echo $i; ?>" />
            <?php } ?>
            <?php $i++; }  ?>
        </div>   
<?php 
	$i=1;
		foreach($id_arr as $id){ 
		$title = get_the_title( $id ); 
		$post = get_post($id); 
		$content =  wp_trim_words( $post->post_content, 20, '' );
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
    <div class="slide_info">
    	<h2><?php echo $title; ?></h2>
    	<p><?php echo esc_html($content); ?></p>             
    </div>
 </div><!--end .slider area-->         
 <?php $i++; } ?>       
 
<div class="clear"></div>        
<?php } ?>
<?php } } ?> 

<?php if ( is_front_page() && ! is_home() ) { ?>
<?php
$hidepageboxes = get_theme_mod('mediquip_plus_disabled_pgboxes', '1');
if( $hidepageboxes == ''){
?> 
<div id="ourservices" <?php if( get_theme_mod( 'mediquip_plus_disabled_slides' ) == '1') { echo 'style="margin-top:10px"'; } ?>>
    <div class="container">
      <?php for($p=1; $p<5; $p++) { ?>
      <?php if( get_theme_mod('mediquip_plus_pageboxes'.$p,false)) { ?>
      <?php $querymed = new WP_query('page_id='.esc_attr(get_theme_mod('mediquip_plus_pageboxes'.$p,true)) ); ?>
      <?php while( $querymed->have_posts() ) : $querymed->the_post(); ?>
      <div class="page4box <?php if($p % 4 == 0) { echo "last_column"; } ?>">
           <?php if (has_post_thumbnail() ){ ?>
             <div class="thumbbx"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?> </a></div> 
            <?php } ?>
           <div class="pagecontent">          
                <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3> 
                <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );  ?></p>
                <a class="pagemore" href="<?php the_permalink(); ?>">
                 <?php _e('Read More','mediquip-plus'); ?>
                </a>
           </div>
        </div>
       <?php endwhile;
             wp_reset_postdata(); ?>                                    
        <?php } } ?> 
      <div class="clear"></div>
  </div> <!-- container -->
</div><!-- #ourservices -->
<?php }?>
<?php } ?>