<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ERW_Theme_Base
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php /*$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'pheader_img' );*/
      $img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'pheader_img' ); ?>
    <?php if (empty($img_url[0])): ?>
    <?php $var = "<style type=\"text/css\" media=\"screen\">";
        $var .= "   #navigation.navbar-inverse.navbar-transparent {";
        $var .= "   position: relative; ";
        $var .= "   border-bottom-color: rgba(255, 255, 255, 0);";
        $var .= "   background-color: #222;";
        $var .= "   /*top: 0;*/}";
        $var .= "   #primary {padding-top: 80px;}";
        $var .= "   </style>";
        echo $var;
     /*?>
        <div class="entry-header pt20">
            <?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </div><!-- .entry-header -->
    <?php*/ else: ?>

        <section class="inner-header divider layer-overlay overlay-dark" style="background-image: url(<?php echo $image_src[0]; ?>);">
            <div class="container">
                <div class="section-content text-center">             
                    <div class="text-center">
                        <h3 class="title-page"><?php the_title(); ?></h3>
                        <?php echo wp_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endif ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <div class="page-links">
        <?php wp_link_pages( __( 'Pages:', 'ERW_Theme_Base' ) ); ?>
    </div><!-- .page-links -->
    <div class="entry-edit">
        <?php edit_post_link( __( 'Edit', 'ERW_Theme_Base' ) ); ?>
    </div><!-- .entry-edit -->

</article><!-- #post-## -->