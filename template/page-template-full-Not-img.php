<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Full width without container without img
 *
 *
 * @package ERW_Theme_Base
 */

get_header(); ?>
  <main class="content" id="main-pages">
  <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
  <?php endwhile; wp_reset_postdata(); ?>
  </main>
<?php get_footer(); ?>