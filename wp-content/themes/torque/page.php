<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package inka
 */

get_header(); ?>


				
	<?php while ( have_posts() ) : the_post(); ?>
				
	<?php 
	global $post;  $postid = $post->ID; ?>
				
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'torque' ),
				'after'  => '</div>',
			) );
		?>
	
	<?php edit_post_link( __( 'Edit', 'torque' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
