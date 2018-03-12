<?php
/**
 * @package SV-html5
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pad'); ?>>
	<header>
		<h2 class="brand entry-title"><?php the_title(); ?></h2>
		<p class="dateline brand entry-meta"><?php sv_html5_byline(); ?></p>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<p class="dateline brand entry-meta"><?php sv_html5_posted_on(); ?> by <?php the_author() ?></p>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'sv-html5' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! sv_html5_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'sv-html5' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'sv-html5' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'sv-html5' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'sv-html5' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>
<div class="ma mln pa pln">
<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-width="216" data-show-faces="true"></div><br>
<a href="https://twitter.com/share" class="twitter-share-button" data-via="serpentvenom">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><br>
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="small"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>
		<?php sv_html5_content_nav( 'nav-below' ); ?>
		<?php edit_post_link( __( 'Edit', 'sv-html5' ), '<p class="edit-link">[', ']</p>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
