<?php
/**
 * The template for displaying all pages.
 *Í
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

get_header(); ?>

<section class="content col wide layout">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
</section><aside class="col narrow pad sidebar"><?php get_sidebar(); ?></aside>
<?php get_footer(); ?>