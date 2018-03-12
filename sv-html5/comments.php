<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to sv_html5_comment() which is
 * located in the functions.php file.
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */
?>
	<div id="comments" class="pad">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'sv-html5' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title" class="brand comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'sv-html5' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h3 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'sv-html5' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( __( '&#171; Older Comments', 'sv-html5' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &#187;', 'sv-html5' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use sv_html5_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define sv_html5_comment() and that will be used instead.
				 * See sv_html5_comment() in sv-html5/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'sv_html5_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'sv-html5' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&#171; Older Comments', 'sv-html5' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &#187;', 'sv-html5' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'sv-html5' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
