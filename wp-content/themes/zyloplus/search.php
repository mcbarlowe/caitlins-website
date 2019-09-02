<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Zyloplus
 */

get_header(); ?>

<div class="container">
     <div class="contentwrapper">
        <section class="site-contentpart">
            <div class="postwrapper">
				<?php if ( have_posts() ) : ?>
                    <header>
                        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'zyloplus' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'search' ); ?>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <?php get_template_part( 'no-results'); ?>
                <?php endif; ?>
            </div><!-- postwrapper -->
        </section>      
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->

<?php get_footer(); ?>