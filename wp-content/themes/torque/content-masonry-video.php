<?php
/*
 * @package inka
 */
 /*  content - masonry - video */
global $post;
?>

	   
<div class="boxed_img">
<?php $infos=array();	if(ot_get_option('posts_fields','')) { $infos=ot_get_option('posts_fields','');}?>

<?php 
		$show_featured='yes';
		if(get_option_tree('featured_image_disp','',false, true)){	$show_featured=get_option_tree('featured_image_disp','',false, true);}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
				echo '<div class="video">';
		$videotype= get_post_meta(get_the_ID(), 'dbt_video_select', false,true);
		$ids= get_post_meta(get_the_ID(), 'dbt_post_video_id', false,true);
		if (isset($ids[0]) && $ids[0] != '') 
		{
			if ($videotype[0] == "vimeo" || $videotype == "vimeo"){echo '<iframe src="http://player.vimeo.com/video/' . $ids[0] . '"   style="margin-bottom:-6px !important;width:100%;max-height:100%;min-height:250px;" class="post-slider-border  generalframe "></iframe>'; }
		else {
			echo '<iframe  style="margin-bottom:-6px !important;width:100%;max-height:100%;min-height:250px;" src="http://www.youtube.com/embed/' . $ids[0] . '?wmode=transparent"  class="post-slider-border  generalframe "></iframe>';
		   }
		}
		echo '</div>';	
		}
		?>
		

</div>
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
 <?php $expt2="exce";$expt=ot_get_option('blog_excerpt',''); if($expt=="Total post content")$expt2="total";?>
<?php if($expt2=="total"){ ?>
              <?php the_content(); ?>
            <div class="post_pag">
            <?php torque_custom_wp_link_pages();?>
			</div> 
            <?php }else{?>
    		<p><?php $output=torque_get_excerpt(get_the_ID()); echo do_shortcode($output); ?><br/></p>    
              <?php    } ?> 
              
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

           
              
              
				

	
	 
              


