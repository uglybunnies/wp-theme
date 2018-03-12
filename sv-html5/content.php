<?php
/**
 * @package SV-html5
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pad'); ?>>
	<header>
		<h2 class="brand"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'sv-html5' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
			<p class="dateline brand entry-meta"><?php sv_html5_byline(); ?></p>
		<!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'more <span class="meta-nav">&#187;</span>', 'sv-html5' ) ); ?>
		<p class="dateline brand entry-meta"><?php sv_html5_posted_on(); ?> by <?php the_author() ?></p>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'sv-html5' ) );
				if ( $categories_list && sv_html5_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'sv-html5' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'sv-html5' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( '<span class="sep"> | </span>Tagged %1$s<span class="sep"> | </span>', 'sv-html5' ), $tags_list ); ?>
			</span>			
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'sv-html5' ), __( '1 Comment', 'sv-html5' ), __( '% Comments', 'sv-html5' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'sv-html5' ), '<span class="edit-link">[', ']</span>' ); ?>

	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
