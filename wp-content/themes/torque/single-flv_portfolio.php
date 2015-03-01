<?php
/**
 * The template for displaying Error pages.
 *
 * @package WordPress
 * @subpackage torque
 * @since torque 1.0
 */

get_header(); ?>
<?php 
$options = get_option('flv_port_admin_settings' );
$section1type=$options['port_single_show_header'];


$disable_like_btn="no";if(isset($options['port_single_other_like'])){$disable_like_btn=$options['port_single_other_like'];}

	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
   <?php 	global $post;  $postid = $post->ID;

if(get_post_meta($postid, 'meta_post_layout', true)!=$section1type)$section1type= get_post_meta($postid, 'meta_post_layout', true);   

$featured_header=get_post_meta($postid, 'meta_post_large_header', true);
if($featured_header=="yes"){?>
<header class="cover_img_container"><!-- COVER IMAGE -->
<?php if ( has_post_thumbnail()) {
		$aux = wp_get_attachment_image_src( get_post_thumbnail_id($postid),'full'); 
		if(isset($aux[0])){echo '<div class="cover_image" style="background-image: url('.$aux[0].')"></div>';}
		} ?>
</header>
<?php }
				
  if($section1type=="Horizontal"){
echo '<section class="col main_content"><article class="project_post row">';
					}else{
echo '<div class="col full_width"><article class="project_post">';
		}
					
/****************************************************************************************************** Horizontal ***************************************************************************/					
if($section1type=="Horizontal"){
	$aux = (wp_get_attachment_image_src( get_post_thumbnail_id($postid),'large')); 
	if($aux[0]=='') {$aux[0]='';}     $meta_bigimage = get_post_meta($postid, 'flv_bigimage', true);  if($meta_bigimage=='')	 $meta_bigimage  =$aux[0]; 
	$lightbox_type=get_post_meta($postid, 'meta_post_lightbox_type', true);
	$thumb_lightbox_video_type = get_post_meta($postid, 'meta_post_lightbox_video_type', true);
	
	if($lightbox_type=='')$lightbox_type="none";
	if($lightbox_type!="none"){	
	if($lightbox_type=="image")	{
		if ( has_post_thumbnail()) {
		if(isset($options["port_single_height"]) && $options["port_single_height"]!=''){$size="portfolio_single";}else{$size="";}
		echo get_the_post_thumbnail( $postid,$size,  array('alt' => get_the_title(),"class"=>"rounded"));
		}
	}
	elseif($lightbox_type=="gallery"){
		$images_gallery = get_post_meta($postid, 'flv_gallery', true);
		$images=explode(", ", $images_gallery);
			if(count($images)!=1){
			echo'<div  class="" id="post_carousel_'.get_the_ID().'">';
			for($j=0;$j<count($images)-1;$j++){$attachment= str_replace ('"','',$images[$j]);    echo'<img src="'.$attachment.'" />'; } 
			echo'</div>';

		$blog_slider_continuous="true";
		$blog_slider_autoPlay=get_post_meta($postid, 'meta_post_autoplay', true);	if($blog_slider_autoPlay=='yes'){$blog_slider_autoPlay="true";}else {$blog_slider_autoPlay="false";}
		$blog_slider_responsive=get_post_meta($postid, 'meta_post_responsive', true);	if($blog_slider_responsive=='no'){$blog_slider_responsive="false";}else {$blog_slider_responsive="true";}
		$blog_slider_effect=get_post_meta($postid, 'meta_post_trans', true);	if($blog_slider_effect==''){$blog_slider_effect="slide";}
		$blog_slider_slideSpeed=get_post_meta($postid, 'meta_post_trans_speed', true);	if($blog_slider_slideSpeed==''){$blog_slider_slideSpeed=1250;}

		echo"<script>
		jQuery(document).ready(function () {
	    var sudoSlider = jQuery('#post_carousel_".get_the_ID()."').sudoSlider({	 effect:'".$blog_slider_effect."', continuous:".$blog_slider_continuous.", responsive:  ".$blog_slider_responsive.",  auto: ".$blog_slider_autoPlay.",   speed: ".$blog_slider_slideSpeed."	});
				jQuery('#post_carousel_".get_the_ID()."').next().appendTo(sudoSlider);
		        jQuery('.prevBtn, .nextBtn, #post_carousel_".get_the_ID()."').hover(
		        function () {        jQuery('.prevBtn, .nextBtn').stop().fadeTo(200, 1);   },    function () {      jQuery('.prevBtn, .nextBtn').stop().fadeTo(200, 0);          }      );
		       jQuery('.prevBtn, .nextBtn').stop().fadeTo(0, 0);
		 });</script>";
		 }
	}
	elseif($lightbox_type=="video")	{
		if($thumb_lightbox_video_type=="youtube"){
		$thumb_lightbox_youtube_id = get_post_meta($postid, 'meta_post_lightbox_youtube_id', true);
		echo'<iframe  src="http://www.youtube.com/embed/'.$thumb_lightbox_youtube_id.'?rel=0" width="100%" height="450" frameborder="0" allowfullscreen class="vids video generalframe "></iframe>';
    }
		elseif($thumb_lightbox_video_type=="vimeo"){
			$thumb_lightbox_vimeo_id= get_post_meta($postid, 'meta_post_lightbox_vimeo_id', true);
		echo'<iframe src="http://player.vimeo.com/video/'.$thumb_lightbox_vimeo_id.'"   width="100%" height="450"  frameborder="0" class="vids video generalframe "></iframe>';
		}
	   	else {
		 if (has_post_thumbnail()) {
    echo '<img src="'.$meta_bigimage.'" class="rounded"/>';
 			}
		}
		}
	}
	?>
		</article>
		
	</section>
	<aside class="col sidebar_100">
	<header>
	<h1><?php echo esc_attr(get_the_title());?></h1>
	
	<?php $time_string = '';
		$time_string .= '<i class="fa fa-clock-o"></i><span datetime="%3$s">%4$s</span>';
		$time_string = sprintf( $time_string,	esc_attr( get_the_date( 'c' ) ),esc_html( get_the_date() ),	esc_attr( get_the_modified_date( 'c' ) ),esc_html( get_the_modified_date("d M Y") ));
		printf( '<a class="meta-button" href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',	esc_url( get_permalink() ),	esc_attr( get_the_time() ),$time_string	);
	
	?>
							
	<?php echo '<a class="meta-button" href="#"><i class="fa fa-comments"></i><span>';
	$comm_nr=get_comments_number();
	 echo $comm_nr;
	 if($comm_nr!=1) _e(" Comments","torque"); else _e(" Comment","torque");
	 echo '</span></a>';  ?>  

	<?php if($disable_like_btn!="yes"){ ?> 
		 <script>
			function increase_likes(id) {
			var ceva=<?php echo esc_attr($postid) ; ?>; 
			jQuery.ajax({
			    type: "POST",
			    url: "<?php echo esc_url(THEME_URL) ; ?>inc/functions-custom-like.php",
			    data: "id="+ceva,
			    success: function(response){jQuery("#"+id+" span").html(response+" Likes");    } });
			 }
			</script>
	<a class="meta-button" href="javascript:;" id="nr_likes_<?php echo esc_attr($postid); ?>"  onClick="increase_likes('nr_likes_<?php echo esc_attr($postid); ?>');"><i class="icon-heart icon-large" ><i class="fa fa-thumbs-up"></i><span><?php  echo esc_attr(torque_getPostLikes($postid)); ?> Likes</span></a>
		<?php } ?>	
							
	<?php the_content();?>
	</header>
												
	<div class="gap_35 clear"></div><!-- GAP -->
					
	<?php	$taxonomy = "post_tag"; // can be category, post_tag, or custom taxonomy name
	$posttags = get_the_tags($postid);	
	if(count($posttags)>0){ ?>	
	<section class="list_2">
	<h5><?php _e("Skills Used","torque"); ?></h5>
	<ul>
	<?php
		if ($posttags) {
			  foreach($posttags as $tag) {
				$term_slug = $tag->name;$term = get_term_by('slug', $term_slug, $taxonomy);
			  echo'<li><i class="fa fa-circle"></i>'.$tag->name.'</li>';  
			  }
		} ?>
	</ul>
	</section>
	<?php } ?>	
					
	<?php 
	$share_twitter=get_post_meta($postid, 'meta_post_share_twitter', true);
	$share_fb=get_post_meta($postid, 'meta_post_share_facebook', true);
	$share_g_plus=get_post_meta($postid, 'meta_post_share_google', true);
	if($share_twitter!='no' || $share_fb!='no' || $share_g_plus!='no'){ ?>
							
							<section class="sharebar">
								<h6>Share</h6>
								<ul>
	<?php if($share_twitter!='no') { ?>	<li><a target="blank" href="https://twitter.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li> 		<?php } ?>
	<?php if($share_fb!='no') { ?>		<li><a target="blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-facebook"></i></a></li> 			<?php } ?>
	<?php if($share_g_plus!='no') { ?>	<li><a target="blank" href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-google-plus"></i></a></li>	<?php } ?>
								</ul>
							</section>
		<?php } ?>	
					</aside>
	<div class="col full_width">
		<div class="gap_35 clear"></div><!-- GAP -->
	
	<?php 
	$pagination_show=get_post_meta($postid, 'meta_post_portfolio_pagination', true);
	$portfolio_main=get_post_meta($postid, 'meta_post_portfolio_main', true);
	if($pagination_show!='no'){ ?>
						
	<nav class="pagination">
	<?php previous_post_link( '<div class="float_left">%link', '<span class="btn white small"><i class="fa fa-chevron-left"></i></span> <h6>' . _e( '', 'Previous Project', 'torque' ) . 'Previous Project</h6></div>' ); ?>
		<a class="pagination_menu" href="<?php esc_url($portfolio_main); ?>"><i class="fa fa-th-large"></i></a>
	<?php next_post_link( '<div class="float_right">%link', '<h6>Next Project ' . _e( '', 'Next Project', 'torque' ) . '</h6> <span class="btn white small"><i class="fa fa-chevron-right"></i></span></div>' ); ?>
	</nav>					
	<?php } ?>
	</div>
<?php	}else{

/****************************************************************************************************** vertical ***************************************************************************/

				
	$aux = (wp_get_attachment_image_src( get_post_thumbnail_id($postid),'large')); 
	if($aux[0]=='') {$aux[0]='';}     $meta_bigimage = get_post_meta($postid, 'flv_bigimage', true);  if($meta_bigimage=='')	 $meta_bigimage  =$aux[0]; 
	$lightbox_type=get_post_meta($postid, 'meta_post_lightbox_type', true);
	$thumb_lightbox_video_type = get_post_meta($postid, 'meta_post_lightbox_video_type', true);
	
	if($lightbox_type=='')$lightbox_type="none";
	if($lightbox_type!="none"){	
	if($lightbox_type=="image")	{
	if ( has_post_thumbnail()) {
		if(isset($options["port_single_height"]) && $options["port_single_height"]!=''){$size="portfolio_single";}else{$size="";}
		echo get_the_post_thumbnail( $postid,$size,  array('alt' => get_the_title(),"class"=>"rounded"));
		}
	}
	elseif($lightbox_type=="gallery"){
		$images_gallery = get_post_meta($postid, 'flv_gallery', true);
		$images=explode(", ", $images_gallery);
			if(count($images)!=1){
			echo'<div  class="" id="post_carousel_'.get_the_ID().'">';
			for($j=0;$j<count($images)-1;$j++){$attachment= str_replace ('"','',$images[$j]);    echo'<img src="'.$attachment.'" />'; } 
			echo'</div>';
		
		$blog_slider_continuous="true";
		$blog_slider_autoPlay=get_post_meta($postid, 'meta_post_autoplay', true);	if($blog_slider_autoPlay=='yes'){$blog_slider_autoPlay="true";}else {$blog_slider_autoPlay="false";}
		$blog_slider_responsive=get_post_meta($postid, 'meta_post_responsive', true);	if($blog_slider_responsive=='no'){$blog_slider_responsive="false";}else {$blog_slider_responsive="true";}
		$blog_slider_effect=get_post_meta($postid, 'meta_post_trans', true);	if($blog_slider_effect==''){$blog_slider_effect="slide";}
		$blog_slider_slideSpeed=get_post_meta($postid, 'meta_post_trans_speed', true);	if($blog_slider_slideSpeed==''){$blog_slider_slideSpeed=1250;}

		echo"<script>
		jQuery(document).ready(function () {
	    var sudoSlider = jQuery('#post_carousel_".get_the_ID()."').sudoSlider({	 effect:'".$blog_slider_effect."', continuous:".$blog_slider_continuous.", responsive:  ".$blog_slider_responsive.",  auto: ".$blog_slider_autoPlay.",   speed: ".$blog_slider_slideSpeed."	});
				jQuery('#post_carousel_".get_the_ID()."').next().appendTo(sudoSlider);
		        jQuery('.prevBtn, .nextBtn, #post_carousel_".get_the_ID()."').hover(
		        function () {        jQuery('.prevBtn, .nextBtn').stop().fadeTo(200, 1);   },    function () {      jQuery('.prevBtn, .nextBtn').stop().fadeTo(200, 0);          }      );
		       jQuery('.prevBtn, .nextBtn').stop().fadeTo(0, 0);
		 });</script>";
		 }
	}
	elseif($lightbox_type=="video")	{
		if($thumb_lightbox_video_type=="youtube"){
		$thumb_lightbox_youtube_id = get_post_meta($postid, 'meta_post_lightbox_youtube_id', true);
		echo'<iframe  src="http://www.youtube.com/embed/'.$thumb_lightbox_youtube_id.'?rel=0" width="100%" height="580" frameborder="0" allowfullscreen class="vids video generalframe "></iframe>';
    }
		elseif($thumb_lightbox_video_type=="vimeo"){
			$thumb_lightbox_vimeo_id= get_post_meta($postid, 'meta_post_lightbox_vimeo_id', true);
		echo'<iframe src="http://player.vimeo.com/video/'.$thumb_lightbox_vimeo_id.'"   width="100%" height="580"  frameborder="0" class="vids video generalframe "></iframe>';
		}
	   	else {
		 if (has_post_thumbnail()) {
    echo '<img src="'.$meta_bigimage.'" class="rounded"/>';
 			}
		}
		}
	}
	?>
	
	<header>
	<h1><?php echo esc_attr(get_the_title());?></h1>
								
	<?php 	$time_string = '';
		$time_string .= '<i class="fa fa-clock-o"></i><span datetime="%3$s">%4$s</span>';
		$time_string = sprintf( $time_string,	esc_attr( get_the_date( 'c' ) ),esc_html( get_the_date() ),	esc_attr( get_the_modified_date( 'c' ) ),esc_html( get_the_modified_date("d M Y") ));
		printf( '<a class="meta-button" href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',	esc_url( get_permalink() ),	esc_attr( get_the_time() ),$time_string	);
	?>
	
								
	<?php if( comments_open()){
	echo '<a class="meta-button" href="#"><i class="fa fa-comments"></i><span>';
	$comm_nr=get_comments_number();
	echo $comm_nr;
	 if($comm_nr!=1) _e(" Comments","torque"); else _e(" Comment","torque");
	echo '</span></a>'; } ?>  
			 
		
	<?php if($disable_like_btn!="yes"){ ?> 
	 <script>
	function increase_likes(id) {
	var ceva=<?php echo esc_attr($postid) ; ?>; 
	jQuery.ajax({
	    type: "POST",
	    url: "<?php echo esc_url(THEME_URL) ; ?>inc/functions-custom-like.php",
	    data: "id="+ceva,
	    success: function(response){jQuery("#"+id+" span").html(response+" Likes");    } });
	 }
	</script>
	<a class="meta-button" href="javascript:;" id="nr_likes_<?php echo esc_attr($postid); ?>"  onClick="increase_likes('nr_likes_<?php echo esc_attr($postid); ?>');"><i class="icon-heart icon-large" ><i class="fa fa-thumbs-up"></i><span><?php  echo esc_attr(torque_getPostLikes($postid)); ?> Likes</span></a>
	
		<?php } ?>		
		
	 <?php the_content();?>
	</header>
							
	<div class="gap_35 clear"></div><!-- GAP -->
		
	<?php	$taxonomy = "post_tag"; // can be category, post_tag, or custom taxonomy name
		$posttags = get_the_tags($postid);	
		if(count($posttags)>0){ ?>	
		<section class="list_2">
		<h5><?php _e("Skills Used","torque"); ?></h5>
		<ul>
		<?php
			if ($posttags) {
				  foreach($posttags as $tag) {
					$term_slug = $tag->name;$term = get_term_by('slug', $term_slug, $taxonomy);
				  echo'<li><i class="fa fa-circle"></i>'.$tag->name.'</li>';  
				  }
			} ?>
		</ul>
		</section>
		<?php } ?>				
					
	<?php 
	$share_twitter=get_post_meta($postid, 'meta_post_share_twitter', true);
	$share_fb=get_post_meta($postid, 'meta_post_share_facebook', true);
	$share_g_plus=get_post_meta($postid, 'meta_post_share_google', true);
	if($share_twitter!='no' || $share_fb!='no' || $share_g_plus!='no'){ ?>
							
							<section class="sharebar">
								<h6>Share</h6>
								<ul>
	<?php if($share_twitter!='no') { ?>	<li><a target="blank" href="https://twitter.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li> 		<?php } ?>
	<?php if($share_fb!='no') { ?>		<li><a target="blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-facebook"></i></a></li> 			<?php } ?>
	<?php if($share_g_plus!='no') { ?>	<li><a target="blank" href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-google-plus"></i></a></li>	<?php } ?>
								</ul>
							</section>
		<?php } ?>				
	
	<div class="gap_35 clear"></div><!-- GAP -->
	
	<?php 
	$pagination_show=get_post_meta($postid, 'meta_post_portfolio_pagination', true);
	$portfolio_main=get_post_meta($postid, 'meta_post_portfolio_main', true);
	if($pagination_show!='no'){ ?>
						
	<nav class="pagination">
	<?php previous_post_link( '<div class="float_left">%link', '<span class="btn white small"><i class="fa fa-chevron-left"></i></span> <h6>' . _x( '', 'Previous Project', 'torque' ) . 'Previous Project</h6></div>' ); ?>
		<a class="pagination_menu" href="<?php echo esc_attr($portfolio_main); ?>"><i class="fa fa-th-large"></i></a>
	<?php next_post_link( '<div class="float_right">%link', '<h6>Next Project ' . _x( '', 'Next Project', 'torque' ) . '</h6> <span class="btn white small"><i class="fa fa-chevron-right"></i></span></div>' ); ?>
	</nav>
							
	<?php } ?>						
		</article>
	</div>
					
<?php	} ?>

			<div class="clear"></div>
			<?php $comm=$options["port_single_comm"];
			if($comm=="yes"){
			comments_template( '', true );
			} ?>  


<?php endwhile; ?>


<?php get_footer(); ?>