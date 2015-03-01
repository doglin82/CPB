<?php 
/* 
Template Name: Page With Left Sidebar
*/
?>

<?php get_header(); ?>
<?php
 global $post;  $postid = $post->ID;
  $template = get_post_meta($post->ID, '_wp_page_template', true );
  $pageid=$postid;
$sidebar = get_post_meta($pageid, 'dbt_sidebar', TRUE);
$side='sidebar_blog';
if($sidebar=="Blog Sidebar"){$side='sidebar_blog';}
elseif($sidebar=="Sidebar 1"){$side='sidebar1';}
elseif($sidebar=="Sidebar 2"){$side='sidebar2';}
elseif($sidebar=="Sidebar 3"){$side='sidebar3';}
elseif($sidebar=="Sidebar 4"){$side='sidebar4';}
elseif($sidebar=="Sidebar 5"){$side='sidebar5';}
?>

	

<section class="col main_content right">
		
       	
<?php  while ( have_posts() ) : the_post(); ?>

		
				
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
	
	 </section>
	
		<aside class="col sidebar"><?php $side1=torque_get_dynamic_sidebar($side); echo(do_shortcode($side1)); ?></aside>


<?php get_footer(); ?>