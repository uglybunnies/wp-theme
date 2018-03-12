<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

get_header(); ?>
<section class="content layout">

				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
</section><!-- #primary -->

<?php get_footer(); ?>