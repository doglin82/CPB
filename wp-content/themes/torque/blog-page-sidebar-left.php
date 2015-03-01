<?php 
/* 
Template Name: Blog page - sidebar left
*/
?>

<?php get_header(); ?>
       	
<?php

 global $post;  $postid = $post->ID;
 $count_posts=0;
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

$blog_format=get_post_meta($pageid, 'dbt_blog_pagi', TRUE);
$blog_masonry_col=get_post_meta($pageid, 'dbt_blog_masonry_col', TRUE); if($blog_masonry_col==''){$blog_masonry_col=3;}

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


<section class="col main_content right">

	
<?php if($blog_format=="masonry"){ ?>
	<div class="row" id="container">
<?php } ?>

<?php if(get_option('posts_per_page ')){$pages2=get_option('posts_per_page ');}
query_posts("posts_per_page=".$pages2."&paged=" . get_query_var('paged'));  ?>

	<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
<?php if($blog_format=="masonry"){ 
if($blog_masonry_col=="4"){?>
<div class="col one_quarter item">
<?php }elseif($blog_masonry_col=="2"){ ?>
<div class="col one_half item">	
<?php }else{ ?>
<div class="col one_third item">	
<?php }
} ?>

<?php if($blog_format=="masonry"){ ?>
<article id="post-<?php the_ID(); ?>"  <?php post_class("boxed_post"); ?> >
<?php } else {?>
<article id="post-<?php the_ID(); ?>"  <?php post_class("post_container"); ?> >
<?php } ?>
				<?php
				$postid=get_the_id();
				$blog_style=get_post_format($postid); if($blog_style==""){$blog_style="default";}

				 if($blog_format=="masonry"){
				 get_template_part( 'content-masonry-'.$blog_style, get_post_format() );
				 }else{
				 get_template_part( 'content-'.$blog_style, get_post_format() );	
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

	</section>


	<aside class="col sidebar"><?php $side1=torque_get_dynamic_sidebar($side); echo(do_shortcode($side1)); ?></aside>



<?php get_footer(); ?>