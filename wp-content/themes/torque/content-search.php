<?php
/**
 * @package inka
 */
 /*  content - small - search */
global $post;

$out_title=get_the_title(get_option('page_for_posts', true));
$our_id=torque_get_page_id($out_title);
$template = get_post_meta($our_id, '_wp_page_template', true );
$f_size='blog_post';
if(isset( $GLOBALS['front'])){	 if($template=="default"){$f_size="blog_post_full";}else{$f_size="blog_post";}}
?>


	<?php	
	$grav_url=get_bloginfo('template_directory') . '/img/avatar/62x62_deaulft.jpg';
	if(get_the_author_meta('user_email')){
	    
		 echo get_avatar(  get_the_author_meta('user_email'), $size = '62', $default = $grav_url); 
	}
	else{
		  echo "<img width='62' height='62'  alt='img' class='avatar' src=".$grav_url." />";
	}
	
  ?>
<?php $icon='link';	$class=''; $lightbox= get_post_meta(get_the_ID(), 'dbt_image_lightbox'); if(isset($lightbox[0]) && $lightbox[0]=="yes"){
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
	$url= $image[0];
	$icon='search';
	$class='fancybox';
}else{
	$url=get_the_permalink();
	$icon='link';
}
?>	   
<?php $infos=array();	if(ot_get_option('posts_fields','')) { $infos=ot_get_option('posts_fields','');}?>
<?php if (has_post_thumbnail()) { ?>
	<a class="post_img_container <?php echo  esc_attr($class); ?>" href="<?php echo esc_url($url); ?>">
	<?php	$show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
		 echo get_the_post_thumbnail(get_the_ID(),$f_size,  array('alt' => get_the_title()));
		} ?>
		<div class="img_overlay"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></div>
		<span class="point_top"></span>
		<span class="point_middle"></span>
		<span class="point_btm"></span>
</a>	
<?php } ?>

<header class="post_header">		
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<?php if(isset($infos) && !in_array("date",$infos)){  
	$time_string = '';
	$time_string .= '<a class="meta-button" href="'. get_the_permalink().'"><i class="fa fa-clock-o"></i><span class="%3$s">%4$s</span></a>';
	$time_string = sprintf( $time_string,	esc_attr( get_the_date( 'c' ) ),esc_html( get_the_date() ),	esc_attr( get_the_modified_date( 'c' ) ),esc_html( get_the_date() ));
	printf( $time_string	);

}
?>
 	<?php if(  isset($infos) && !in_array("comments_number",$infos) && comments_open()){
 		echo '<a class="meta-button" href="'. get_the_permalink().'#flv_comment"><i class="fa fa-comments"></i><span>';
		$comm_nr=get_comments_number();
		if($comm_nr!=1) echo $comm_nr." Comments";
		else echo $comm_nr." Comment";
		 echo '</span></a>'; } ?>
  	
  		<?php if(isset($infos) && !in_array("author",$infos)) { ?>
		<?php	printf( '<a class="meta-button" href="%1$s"><i class="fa fa-user"></i><span title="%2$s">%3$s</span></a>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'torque' ), get_the_author() ) ),
			esc_html( get_the_author() ));
			}
			?>	
  
  
  <?php if(  isset($infos) && !in_array("likes",$infos) ){ ?>
  <script>
		function increase_likes<?php echo esc_attr(get_the_ID()) ; ?>(id) {
		var ceva=<?php echo esc_attr(get_the_ID()) ; ?>; 
		jQuery.ajax({
		    type: "POST",
		     url: "<?php echo esc_url(THEME_URL) ; ?>inc/functions-custom-like.php",
		    data: "id="+ceva,
		    success: function(response){jQuery("#"+id+" span").html(response);    } });
		 }
		</script>
	<a  class="meta-button" id="nr_likes_<?php echo esc_attr(get_the_ID()); ?>"  onClick="increase_likes<?php echo esc_attr(get_the_ID()); ?>('nr_likes_<?php echo esc_attr(get_the_ID()); ?>');" href="javascript:;"><i class="fa fa-thumbs-up"></i><span><?php  echo torque_getPostLikes(get_the_ID()); ?></span></a>
	<?php } ?>
	
			
<?php 
if(  isset($infos) && !in_array("categories",$infos)) {$category_detail=get_the_category(get_the_ID());
$i=0;$output='';


foreach($category_detail as $category){
if( $category->name!="Uncategorized"){
	$i++;
	if($i==1){
		$output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ,'torque'), $category->name ) ) . '">'.$category->cat_name.'</a>';
	}else {
	$output .= ', <a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ,'torque'), $category->name ) ) . '">'.$category->cat_name.'</a>';
	}
	}

} 
if($i>0){echo '<div class="meta-categories"><i class="fa fa-tags"></i><span> '.$output.'</span></div>'; }} ?>

</header>
<div class="post_content">
  <p><?php the_excerpt(); ?></p>
  </div>             
                     
              
              
				

	
	 
              


