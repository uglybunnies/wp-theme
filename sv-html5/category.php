<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

get_header(); ?>

<section class="content col wide layout">

			<?php if ( have_posts() ) : ?>

				<header class="pad">
					<h2 class="brand page-title s1"><?php
						printf( __( 'Category Archives: %s', 'sv-html5' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h2>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) ) 
							echo apply_filters( 'category_archive_meta', '<p class="category-archive-meta subtitle">' . $category_description . '</p>' );
					?>
				</header>


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

				<article id="post-0" class="post no-results not-found">
					<header>
						<h2 class="brand entry-title"><?php _e( 'Nothing Found', 'sv-html5' ); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sv-html5' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		</section><aside class="col narrow pad sidebar"><?php get_sidebar(); ?></aside>
<?php get_footer(); ?>