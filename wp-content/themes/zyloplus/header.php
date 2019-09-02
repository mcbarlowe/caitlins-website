<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Zyloplus
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="pageholder" <?php if( get_theme_mod( 'zyloplus_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

<div class="header <?php if( !is_front_page() && !is_home() || get_theme_mod('zyloplus_disabled_slides', '1') ){ ?>headerinner<?php } ?> ">
		<div class="headertop">
 <div class="container">
       <div class="left">          
         <?php if ( ! dynamic_sidebar( 'headerwidget' ) ) : ?>      
         <?php endif; // end sidebar widget area ?>   
       </div>
     <div class="right">
       <div class="social-icons">
		   <?php if ( get_theme_mod('zyloplus_fb_link') != "") { ?>
             <a title="<?php esc_attr('facebook', 'zyloplus'); ?>" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('zyloplus_fb_link')); ?>"></a> 
           <?php } ?>       
           <?php if ( get_theme_mod('zyloplus_twitt_link') != "") { ?>
             <a title="<?php esc_attr('twitter', 'zyloplus'); ?>" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('zyloplus_twitt_link')); ?>"></a>
           <?php } ?>       
           <?php if ( get_theme_mod('zyloplus_gplus_link') != "") { ?>
             <a title="<?php esc_attr('google-plus', 'zyloplus'); ?>" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url(get_theme_mod('zyloplus_gplus_link')); ?>"></a>
           <?php } ?>      
           <?php if ( get_theme_mod('zyloplus_linked_link') != "") { ?> 
            <a title="<?php esc_attr('linkedin', 'zyloplus'); ?>" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('zyloplus_linked_link')); ?>"></a>
           <?php } ?>      
      </div>
  </div>     
  <div class="clear"></div>
 </div><!-- .container -->  
</div><!-- .headertop -->  

        <div class="container">
            <div class="logo">
            	<?php zyloplus_the_custom_logo(); ?>
               <div class="site-branding-text">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                    <p><?php echo $description; ?></p>
                <?php endif; ?> 
              </div><!-- .site-branding-text -->
               
            </div><!-- logo -->
             <div class="hdrright">
             <div class="toggle">
                <a class="toggleMenu" href="#"><?php esc_html_e('Menu','zyloplus'); ?></a>
             </div><!-- toggle --> 
            
            <div class="sitenav">
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div><!-- site-nav -->
            </div>
            <div class="clear"></div>
            
        </div><!-- container -->
  </div><!--.header -->

<?php if ( is_front_page() && !is_home() ) { ?>
	<?php $hideslide = get_theme_mod('zyloplus_disabled_slides', '1'); ?>
		<?php if($hideslide == ''){ ?>
              <?php for($sld=7; $sld<10; $sld++) { ?>
                	<?php if( get_theme_mod('zyloplus_pagesetting'.$sld)) { ?>
                	<?php $slidequery = new WP_Query('page_id='.absint(get_theme_mod('zyloplus_pagesetting'.$sld,true))); ?>
                	<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
                			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                			$img_arr[] = $image;
               				$id_arr[] = $post->ID;
                		endwhile; wp_reset_postdata();
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
		$content = esc_html( wp_trim_words( $post->post_content, 20, '' ) );
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
    <div class="slide_info">
    	<h2><?php echo $title; ?></h2>
    	<p><?php echo $content; ?></p>             
     </div> 
  </div>
<?php $i++; } ?>       
 
<div class="clear"></div>        
<?php } ?>
<?php } } ?>   
     
<?php if ( is_front_page() && ! is_home() ) { ?>  
<?php
$hidepageboxes = get_theme_mod('zyloplus_disabled_pgboxes', '1');
if( $hidepageboxes == ''){
?> 
    
		 <section id="columnwrapper">
            	<div class="container">
                    <div class="services-wrap">                       
                    <?php 	$zyloplus_whychooseus_title = get_theme_mod('zyloplus_whychooseus_title');
		 					if( !empty($zyloplus_whychooseus_title) ){ ?>
               				 <h2 class="section-title"><?php echo esc_attr($zyloplus_whychooseus_title); ?></h2>              
					  <?php } ?> 
                                    
                     <?php for($p=1; $p<5; $p++) { ?>       
                        <?php if( get_theme_mod('zyloplus_pagecolumn'.$p,false)) { ?>          
                            <?php $querymax = new WP_Query('page_id='.absint(get_theme_mod('zyloplus_pagecolumn'.$p,true))); ?>				
                                    <?php while( $querymax->have_posts() ) : $querymax->the_post(); ?> 
                                    <div class="boxes-4 <?php if($p % 4 == 0) { echo "last_column"; } ?>">                                    
                                      <?php if(has_post_thumbnail() ) { ?>
                                        <div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                                      <?php } ?>
                                     <div class="pagecontent">
                                     <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
                                      <?php $zyloplus_page_excerptlength = get_theme_mod('zyloplus_page_excerptlength');
		 					if( !empty($zyloplus_page_excerptlength) ){ ?>
               				  <p><?php echo wp_trim_words( get_the_content(), get_theme_mod('zyloplus_page_excerptlength'), '&hellip;' ); ?></p>       
					  <?php } else { ?> 
                      <p><?php echo wp_trim_words( get_the_content(), 25, '&hellip;' ); ?></p>       
                      <?php } ?>
                                   
                    <a class="ReadMore" href="<?php the_permalink(); ?>">                                      
                     <?php esc_html_e('Read More','zyloplus'); ?>
                    </a> 
                     </div>                                   
                    </div>
                    <?php endwhile;
                     wp_reset_postdata(); ?>
                                    
                        <?php } } ?>  
                    <div class="clear"></div>  
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section> 
<?php } ?>
<?php } ?>