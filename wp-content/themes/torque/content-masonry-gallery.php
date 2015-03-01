<?php
/**
 * @package inka
 */
 /*  content - masonry - gallery */
global $post;

?>


<?php $infos=array();	$gal_nr=rand();	 if(ot_get_option('posts_fields','')) { $infos=ot_get_option('posts_fields','');}?>

<?php if (has_post_thumbnail(get_the_ID())) {
		$show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
$images_gallery = get_post_meta(get_the_ID(), 'dbt_post_gallery', true);
				$gal_nr=get_the_ID();
				$gals[$gal_nr]=substr(str_replace(", ","",$images_gallery), 0, -1);
			    $pieces = explode('"', $gals[$gal_nr]);
				echo'<a class="boxed_img manual_'.$gal_nr.'"  title="'.__(get_the_title()).'" href="javascript:;">';	
				$foutput='<script type="text/javascript">jQuery(document).ready(function($) {
				jQuery(".manual_'.$gal_nr.'").click(function() {	jQuery.fancybox([';
					for($h =0;$h<count($pieces);$h++)	if($h%2!=0)	if($h==count($pieces)-1)
					$foutput.="'".$pieces[$h]."'";
					else
					$foutput.="'".$pieces[$h]."', ";
				$gals[$gal_nr].
				$foutput.='], {"padding"		: 0,"transitionIn"		: "none","transitionOut"		: "none","type"              : "image","changeFade"        : 0		});});});</script>';
		
		echo get_the_post_thumbnail(get_the_ID(),"blog_small",  array('alt' => get_the_title()));
		} ?>
		<div class="img_overlay"><i class="fa fa-search"></i></div>
		</a>			
<?php  echo $foutput; } ?>


<div class="boxed_post_wrap">
<header>	
<?php	
 $grav_url=get_bloginfo('template_directory') . '/img/avatar/62x62_deaulft.jpg';
	if(get_the_author_meta('user_email')){
	    
		 echo get_avatar(  get_the_author_meta('user_email'), $size = '62', $default = $grav_url); 
	}
	else{
		  echo "<img width='62' height='62'  alt='img' class='avatar' src=".$grav_url." />";
	}
	 ?>  	
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

           
              
              
				

	
	 
              


