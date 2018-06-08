<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ERW_Theme_Base
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main-pages" class="site-main mb50 container" role="main">

	        <?php while ( have_posts() ) : the_post(); ?>

	          	<?php the_content(); ?>

	        <?php endwhile; // end of the loop. 
	        wp_reset_postdata(); ?>

	    </main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
