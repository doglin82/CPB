<?php
/**
 * @package inka
 */
 /*  content - small */
global $post;
?>

       
            
<?php $infos=array();	if(ot_get_option('posts_fields','')) { $infos=ot_get_option('posts_fields','');}?>

<?php $icon='link';	$class=''; $lightbox= get_post_meta(get_the_ID(), 'dbt_image_lightbox'); if(isset($lightbox[0]) && $lightbox[0]=="yes"){
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $url= $image[0];	$icon='search';	$class='fancybox';}else{	$url=get_the_permalink();	$icon='link';}
?>	

<?php if (has_post_thumbnail(get_the_ID())) {
		$show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
		?>
		<a class="boxed_img <?php echo  esc_attr($class); ?>" href="<?php echo esc_url($url); ?>">
		<?php
		 echo get_the_post_thumbnail(get_the_ID(),"blog_small",  array('alt' => get_the_title()));
		} ?>
				<div class="img_overlay"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></div>
</a>
		<?php } ?>

<div class="boxed_post_wrap">
<header>	
<?php	$grav_url=get_bloginfo('template_directory') . '/img/avatar/62x62_deaulft.jpg';
	if(get_the_author_meta('user_email')){
	    
		 echo get_avatar(  get_the_author_meta('user_email'), $size = '62', $default = $grav_url); 
	}
	else{
		  echo "<img width='62' height='62'  alt='img' class='avatar' src=".$grav_url." />";
	}   ?>  	
<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

<div class="post_content">
   <p><?php the_excerpt(); ?></p>
  </div>  
 </header> 
 <ul class="meta">
  
<?php if(isset($infos) && !in_array("date",$infos)){  
	$time_string = '';
	$time_string .= '<i class="fa fa-clock-o"></i><span class="%3$s">%4$s</span>';
	$time_string = sprintf( $time_string,	esc_attr( get_the_date( 'c' ) ),esc_html( get_the_date() ),	esc_attr( get_the_modified_date( 'c' ) ),esc_html( get_the_date("d M") ));
	printf( '<li class="date"><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></li>',	esc_url( get_permalink() ),	esc_attr( get_the_time() ),$time_string	);
	}
?>
 	<?php if(  isset($infos) && !in_array("comments_number",$infos) && comments_open()){
 		echo '<li><a  href="'. get_the_permalink().'#flv_comment"><i class="fa fa-comments"></i><span>';
		$comm_nr=get_comments_number();
		 echo $comm_nr;
		 echo '</span></a></li>'; } ?>  
  
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

	<li><a  id="nr_likes_<?php echo esc_attr(get_the_ID()); ?>"  onClick="increase_likes<?php echo esc_attr(get_the_ID()); ?>('nr_likes_<?php echo esc_attr(get_the_ID()); ?>');" href="javascript:;"><i class="fa fa-thumbs-up"></i><span><?php  echo torque_getPostLikes(get_the_ID()); ?></span></a></li>
	<?php } ?>
			

</ul>
</div>
  
              
				

	
	 
              


