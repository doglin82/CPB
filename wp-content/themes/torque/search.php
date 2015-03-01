<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package inka
 */

get_header();      ?>   	
<?php 
 global $wp_query;
 $post_class='';
 $blog_format=ot_get_option('blog_default_style',''); 

      $out_title=get_the_title(get_option('page_for_posts', true));
	  $front=is_front_page();
      $our_id=torque_get_page_id($out_title);
      $sidebar = get_post_meta( $our_id, 'dbt_sidebar', TRUE ); 
	  $template = get_post_meta($our_id, '_wp_page_template', true );
	  $side='sidebar_blog';
	if($sidebar=="Blog Sidebar")$side='sidebar_blog';elseif($sidebar=="Sidebar 1")$side='sidebar1';elseif($sidebar=="Sidebar 2")$side='sidebar2';elseif($sidebar=="Sidebar 3")$side='sidebar3';elseif($sidebar=="Sidebar 4")$side='sidebar4';elseif($sidebar=="Sidebar 5")$side='sidebar5';

if($template=="sections-template.php"){
	$template='page-sidebar-right.php';
}

 ?>
	   <!-- 
      /*
      |**************************************************************************
      |  Blog
      |  
      |**************************************************************************
      |
      | 
      |
      */
   -->
<?php

 if($template=="page-sidebar-right.php" || $template=="blog-page-sidebar-right.php" || $template==""){ ?>
	<section class="col main_content ">
<?php } elseif($template=="page-sidebar-left.php" || $template=="blog-page-sidebar-left.php") { ?>
	<section class="col main_content right">
<?php } else { ?>		
	<div class="col full_width">
	<?php } ?>
	
<?php if($blog_format=="masonry"){ ?>
	<div class="row" id="container">
<?php } ?>
	<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
<?php if($blog_format=="masonry"){ ?>
<div class="col one_quarter item">
<?php } ?>

<?php if($blog_format=="masonry"){ ?>
<article id="post-<?php the_ID(); ?>"  <?php post_class("boxed_post"); ?> >
<?php } else {?>
<article id="post-<?php the_ID(); ?>"  <?php post_class("post_container"); ?> >
<?php } ?>
				<?php
				$postid=get_the_id();
				$blog_style=get_post_format($postid); if($blog_style==""){$blog_style="default";}

				 if($blog_format=="masonry"){
				get_template_part( 'content-masonry-search');
				 }else{
				 get_template_part( 'content-search');	
				 }
	
				?>
				</article>
<?php if($blog_format=="masonry"){ ?>
</div>
<?php } ?>				
			<?php endwhile; ?>
			
		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>
		
		
	
	<?php if($blog_format=="masonry"){ ?>
	</div>
<?php } ?>

	<?php	torque_pagination($pages = '', $range = 2);				?>
<?php if($template=="page-sidebar-right.php" || $template=="blog-page-sidebar-right.php" || $template=="" || $template=="page-sidebar-left.php" || $template=="blog-page-sidebar-left.php"){ ?>
	</section>
<?php } else { ?>
	</div>
	<?php } ?>

 <?php if($template=="page-sidebar-right.php"  || $template=="blog-page-right.php" || $template=="" || $template=="page-sidebar-left.php" || $template=="blog-page-sidebar-left.php"){?>
	<aside class="col sidebar"><?php $side1=torque_get_dynamic_sidebar($side); echo(do_shortcode($side1)); ?></aside>
<?php } ?>	



<?php get_footer(); ?>