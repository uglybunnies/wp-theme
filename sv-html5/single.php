<?php
/**
 * The Template for displaying all single posts.
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

get_header(); ?>
<section class="content col wide layout">

			<?php while ( have_posts() ) : the_post(); ?>


				<?php get_template_part( 'content', 'single' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

</section><aside class="col narrow pad sidebar">

<?php get_sidebar(); ?>

</aside>
<?php get_footer(); ?>