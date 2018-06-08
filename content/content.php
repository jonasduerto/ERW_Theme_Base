<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ERW_Theme_Base
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-snippet mb64'.( is_single() ? ' content': "")); ?>>
    <header class="entry-header nolist">
        <?php
        if( has_post_thumbnail() && !is_single() ){ ?>
            <a class="text-center" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
                the_post_thumbnail( 'ERW_Theme_Base-featured', array( 'class' => 'mb24')); ?>
            </a><?php
        }

        if ( is_single() ) {
            $img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'pheader_img' ); ?>
            <?php if (empty($img_url[0])): ?>
            <?php $var = "<style type=\"text/css\" media=\"screen\">";
                $var .= "   #navigation.navbar-inverse.navbar-transparent {";
                $var .= "   position: static; ";
                $var .= "   border-bottom-color: ";
                $var .= "   rgba(255, 255, 255, 0);";
                $var .= "   background-color: #000;";
                $var .= "   top: 0;}";
                $var .= "   </style>";
                echo $var
             ?>
                <div class="entry-header pt20">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </div><!-- .entry-header -->
            <?php else: ?>
                <div id="page-title-<?php echo $post->ID; ?>" class="page_title1 pb0 pt0 parallax" style="background-image: url(<?php echo $img_url[0]; ?>);">
                    <div class="onewrapper gradient pb100 pb70">
                        <div class="container pt100 pb70">
                            <?php echo the_title( '<h1 class="pt70 text-center animated bounceInDown post-title entry-title">', '</h1>' ); ?>
                        </div>
                    </div>
                </div>
            <?php endif;

        } else {
            the_title( '<h2 class="post-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }

        ERW_Theme_Base_posted_on(); ?><!-- post-meta -->
        
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
            if( !is_single() ){
                the_excerpt();
            }
            else{
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ERW_Theme_Base' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
                
                echo '<hr>';
            }
            
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ERW_Theme_Base' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->
    
</article><!-- #post-## -->
