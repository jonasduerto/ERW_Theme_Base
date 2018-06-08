<?php
/**
 * @package ERW_Theme_Base
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php /*$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'pheader_img' );*/
      $img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'pheader_img' ); ?>
	<?php if (empty($img_url[0])): ?>
	<?php $var = "<style type=\"text/css\" media=\"screen\">";
		$var .= "	#navigation.navbar-inverse.navbar-transparent {";
		$var .= "	position: static; ";
		$var .= "	border-bottom-color: ";
		$var .= "	rgba(255, 255, 255, 0);";
		$var .= "	background-color: #AC0D0D;";
		$var .= "	top: 0;}";
		$var .= "	</style>";
		echo $var
	 ?>
		<div class="entry-header pt20">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div><!-- .entry-header -->
	<?php else: ?>
		<div id="page-title-<?php echo $post->ID; ?>" class="page_title1 pb0 pt0 parallax" style="background-image: url(<?php echo $img_url[0]; ?>);">
		    <div class="onewrapper gradient pb100 pb70">
		        <div class="container pt100 pb70">
		            <h1 class="pt70 text-center animated bounceInDown"><?php echo the_title(); ?></h1>
		        </div>
		    </div>
		</div>
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


	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'ERW_Theme_Base' ) );
			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'ERW_Theme_Base' ) );
			if ( ! ERW_Theme_Base_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ERW_Theme_Base' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ERW_Theme_Base' );
				}
			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ERW_Theme_Base' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ERW_Theme_Base' );
				}
			} // end check for categories on this blog
			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'ERW_Theme_Base' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->