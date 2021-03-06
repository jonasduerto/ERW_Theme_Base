<?php
/**
 * Custom template tags for this ERW_Theme_Base.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ERW_Theme_Base
 */

if ( ! function_exists( 'ERW_Theme_Base_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function ERW_Theme_Base_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'ERW_Theme_Base' ); ?></h1>
		<div class="nav-links">
			<?php
				if( function_exists('wp_pagenavi') ){
					wp_pagenavi();
				} else {

				if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"> <?php next_posts_link( __( '<i class="fa fa-chevron-left"></i> Older posts', 'ERW_Theme_Base' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <i class="fa fa-chevron-right"></i>', 'ERW_Theme_Base' ) ); ?> </div>
				<?php endif;
				}
			?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/**
 * Custom template tags for this ERW_Theme_Base.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ERW_Theme_Base
 */

if ( ! function_exists( 'ERW_Theme_Base_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function ERW_Theme_Base_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	); ?>

	<ul class="post-meta">
        <?php /*<li><i class="fa fa-user"></i><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>" title="<?php echo get_the_author(); ?>"><?php the_author(); ?></a></span></li>*/ ?>
        <li><i class="fa fa-user"></i><span><?php the_author(); ?></span></li>
        <li><i class="fa fa-calendar"></i><span class="posted-on"><?php echo $time_string; ?></span></li>
        <?php ERW_Theme_Base_post_category(); ?>
    </ul><?php
    echo ( is_archive() ) ? '<hr>' : '';
}
endif;

if ( ! function_exists( 'ERW_Theme_Base_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ERW_Theme_Base_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'ERW_Theme_Base' ) );
		if ( $categories_list && ERW_Theme_Base_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ERW_Theme_Base' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'ERW_Theme_Base' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ERW_Theme_Base' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'ERW_Theme_Base' ), esc_html__( '1 Comment', 'ERW_Theme_Base' ), esc_html__( '% Comments', 'ERW_Theme_Base' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'ERW_Theme_Base' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ERW_Theme_Base_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ERW_Theme_Base_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ERW_Theme_Base_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ERW_Theme_Base_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ERW_Theme_Base_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in ERW_Theme_Base_categorized_blog.
 */
function ERW_Theme_Base_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ERW_Theme_Base_categories' );
}
add_action( 'edit_category', 'ERW_Theme_Base_category_transient_flusher' );
add_action( 'save_post',     'ERW_Theme_Base_category_transient_flusher' );


if ( ! function_exists( 'ERW_Theme_Base_post_category' ) ) :
/**
 * Get category attached to post.
 */
function ERW_Theme_Base_post_category() {
    $category = get_the_category();
    if ( !empty( $category ) ) {
      $i = ( $category[0]->slug == "uncategorized" && array_key_exists( '1', $category ) ) ? 1 : 0 ;
      echo '<li><i class="fa fa-folder-open-o"></i><span class="cat-links"><a href="' . get_category_link( $category[$i]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'ERW_Theme_Base' ), $category[$i]->name ) . '" ' . '>' . $category[$i]->name.'</a></span></li> ';
    }
}
endif;
