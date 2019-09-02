<?php
/**
 * The template for displaying 404 pages.
 *
 * @package Zyloplus
 */

get_header(); ?>

<div class="container">
    <div class="contentwrapper">
        <section class="fullwidth">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'zyloplus' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn Dont worry it happens to the best of us.', 'zyloplus' ); ?></p>               
            </div><!-- .page-content -->
        </section>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>