<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zyloplus
 */

get_header(); ?>

<div class="container">
     <div class="contentwrapper">
        <section class="site-contentpart <?php if ( !is_active_sidebar( 'sidebar-1' ) ) { ?>fullwidth<?php } ?>">
			<?php if ( have_posts() ) : ?>
                <header class="page-header">
                     <?php
						the_archive_title( '<h2 class="entry-title">', '</h2>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?> 
                </header><!-- .page-header -->
				<div class="postwrapper">
					<?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content'); ?>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'archive' ); ?>
            <?php endif; ?>
        </section>
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
	
<?php get_footer(); ?>