<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Mediquip Plus
 */

get_header(); ?>

<div class="container">
    <div class="contentsecwrap">
        <section class="site-main">
            <header class="page-header">
                <h1 class="entry-title"><?php _e( '404 Not Found', 'mediquip-plus' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php _e( 'Looks like you have taken a wrong turn.....Don\'t worry... it happens to the best of us.', 'mediquip-plus' ); ?></p>               
            </div><!-- .page-content -->
        </section>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>