<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

get_header(); ?>

<section class="content col wide layout">

			<?php if ( have_posts() ) : ?>
				<header class="pad">
					<h2 class="brand">
						<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'sv-html5' ), '<span>' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'sv-html5' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'sv-html5' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
							else :
								_e( 'Archives', 'sv-html5' );
							endif;
						?>
					</h2>
				</header>

				<?php rewind_posts(); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php sv_html5_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="pad post no-results not-found">
					<header>
						<h2 class="brand"><?php _e( 'Nothing Found', 'sv-html5' ); ?></h2>
					</header><!-- .entry-header -->

					<section class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sv-html5' ); ?></p>
						<?php get_search_form(); ?>
					</section><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

</section><aside class="col narrow pad sidebar"><?php get_sidebar(); ?></aside>
<?php get_footer(); ?>