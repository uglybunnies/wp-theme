<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

get_header(); ?>


<section class="content col wide layout">


			<?php if ( have_posts() ) : ?>

				<header class="pad">
					<h2 class="brand page-title"><?php printf( __( 'Search Results for: %s', 'sv-html5' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</header>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php sv_html5_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header>
						<h2 class="entry-title"><?php _e( 'Nothing Found', 'sv-html5' ); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sv-html5' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

</section><aside class="col narrow pad sidebar"><?php get_sidebar(); ?></aside>
<?php get_footer(); ?>