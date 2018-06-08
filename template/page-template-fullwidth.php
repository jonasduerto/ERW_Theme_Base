<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Full width without container
 *
 *
 * @package ERW_Theme_Base
 */

get_header(); ?>

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'pheader_img' );  ?>
<div id="page-title-<?php echo $post->ID; ?>" class="page_title1 pb0 pt0 parallax" style="background-image: url(<?php echo $url; ?>);">
    <div class="onewrapper gradient pb100 pb70">
        <div class="container pt100 pb70">
            <h1 class="pt70 text-center animated bounceInDown"><?php the_title(); ?></h1>
        </div>
    </div>
</div>


	<main class="content mb50" id="main-pages">

		<?php while ( have_posts() ) : the_post(); ?>
	         <?php the_content(); ?>
	    <?php endwhile; wp_reset_postdata(); ?>

    </main>
    
<?php get_footer(); ?>
