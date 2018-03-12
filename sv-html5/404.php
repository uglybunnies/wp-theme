<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

get_header(); ?>

<section class="content layout">

			<article id="post-0" class="post error404 not-found">
				<header>
					<h2 class="brand"><?php _e( 'Well this is somewhat embarrassing, isn&rsquo;t it?', 'sv-html5' ); ?></h2>
				</header>

				<section class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'sv-html5' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'sv-html5' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'sv-html5' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</section><!-- .entry-content -->
			</article><!-- #post-0 -->

</section>
<?php get_footer(); ?>