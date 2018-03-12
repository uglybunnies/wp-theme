<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */
?>
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

                <section id="archives" class="widget">
                    <h2 class="brand"><?php _e( 'Archives', 'sv-html5' ); ?></h2>
                    <ul>
                        <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                    </ul>
                </section>

					<?php get_search_form(); ?>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<section id="tertiary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</section><!-- #tertiary .widget-area -->
		<?php endif; ?>
