<?php 
/* 
Template Name: Sections
*/
?>
<?php get_header(); ?>

	
<?php while ( have_posts() ) : the_post(); ?>
				
	<?php 
	global $post;  $postid = $post->ID;
?>  
	  
<div id="flv_layout">	
	<?php the_content(); ?>
		
	<?php edit_post_link( __( 'Edit', 'torque' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	
	
   </div>
   <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>