<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package inka
 */
?>
	<div class="col-lg-3 col-sm-3 col-12" id="sidebar">

		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar_blog' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
