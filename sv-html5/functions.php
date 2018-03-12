<?php
/*
* SV-html5 functions and definitions
*
* @package WordPress
* @subpackage SV-html5
*
*/
function init_sv_html5(){
 if (!is_admin()) {
	wp_deregister_script('jquery');

	// load the local copy of jQuery in the footer
	wp_register_script('jquery', 'http://code.jquery.com/jquery.min.js', false, '1.8.1', true);

	

	wp_enqueue_script('jquery');
}
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
remove_filter('term_description','wpautop');
}
add_action('init', 'init_sv_html5');

if ( ! function_exists( 'sv_html5_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * functions.php file.
 */
function sv_html5_setup() {
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'GlobalNav' => __( 'GlobalNav', 'sv-html5' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );
}
endif; // sv_html5_setup

/**
 * Tell WordPress to run sv_html5_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'sv_html5_setup' );

add_theme_support('post-formats', array('gallery','image'));
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function sv_html5_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'sv_html5_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function sv_html5_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'sv-html5' ),
		'id' => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="brand widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar 2', 'sv-html5' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar area', 'sv-html5' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="brand widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'init', 'sv_html5_widgets_init' );
if ( ! function_exists( 'sv_html5_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function sv_html5_content_nav( $nav_id ) {
	global $wp_query;

	?>
	<nav id="<?php echo $nav_id; ?>" class="pad plain">

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="navigation pad inlineList">
		<?php previous_post_link( '<li class="nav-previous">%link</li>', '<span class="meta-nav">' . _x( '&#171;', 'Previous post link', 'sv-html5' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="nav-next">%link</li>', '%title <span class="meta-nav">' . _x( '&#187;', 'Next post link', 'sv-html5' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="navigation pad inlineList">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&#171;</span> Older posts', 'sv-html5' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
			<li class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&#187;</span>', 'sv-html5' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // sv_html5_content_nav
if ( ! function_exists( 'sv_html5_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function sv_html5_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'sv-html5' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'sv-html5' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p><em><?php _e( 'Your comment is awaiting moderation.', 'sv-html5' ); ?></em></p>
				<?php endif; ?>
				<p class="brand"><strong>
				<span class="comment-author vcard">
					<?php printf( __( '%s said on', 'sv-html5' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				<!-- .comment-author .vcard -->
				</span>
				<span class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s:', 'sv-html5' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'sv-html5' ), ' ' );
					?>
				</span><!-- .comment-meta .commentmetadata -->
				</strong></p>
			</header>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for sv_html5_comment()
if ( ! function_exists( 'sv_html5_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own sv_html5_posted_on to override in a child theme
 *
 */
function sv_html5_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'sv-html5' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
endif;
if (! function_exists('sv_html5_byline')):
	function sv_html5_byline(){
		printf(__('by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author"">%7$s</a></span>', 'sv-html5'),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'sv-html5' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;
/**
 * Adds custom classes to the array of body classes.
 *
 */
function sv_html5_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'sv_html5_body_classes' );
/**
 * Returns true if a blog has more than 1 category
 *
 */
function sv_html5_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so sv_html5_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so sv_html5_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in sv_html5_categorized_blog
 *
 */
function sv_html5_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'sv_html5_category_transient_flusher' );
add_action( 'save_post', 'sv_html5_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function sv_html5_enhanced_image_navigation( $url ) {
	global $post, $wp_rewrite;

	$id = (int) $post->ID;
	$object = get_post( $id );
	if ( wp_attachment_is_image( $post->ID ) && ( $wp_rewrite->using_permalinks() && ( $object->post_parent > 0 ) && ( $object->post_parent != $id ) ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'sv_html5_enhanced_image_navigation' );
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid)))
               return true;   // we're at the page or at a sub page
	else
               return false;  // we're elsewhere
}

// Add the Contact Form 7 scripts only on the contact page
function deregister_cf7_js() {
    if ( !is_page('contact')) {
        wp_deregister_script( 'contact-form-7');
    }
}
add_action( 'wp_print_scripts', 'deregister_cf7_js' );
function deregister_ct7_styles() {
    if ( !is_page('contact')) {
	    wp_deregister_style( 'contact-form-7');
	}
}
add_action( 'wp_print_styles', 'deregister_ct7_styles');

?>