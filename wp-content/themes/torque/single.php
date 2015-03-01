<?php
/**
 * The Template for displaying all single posts.
 *
 * @package inka
 */

get_header(); 

 global $post;  $postid = $post->ID;
 		$to_top_small=0;
		$template="Right Sidebar";
		$sidebar = ot_get_option("blog_single_sidebar");
		if( ot_get_option("blog_single_template")){	$template = ot_get_option("blog_single_template");		}
		$side='sidebar_blog';
		
		if($sidebar=="Blog Sidebar")$side='sidebar_blog';
		elseif($sidebar=="Sidebar 1")$side='sidebar1';
		elseif($sidebar=="Sidebar 2")$side='sidebar2';
		elseif($sidebar=="Sidebar 3")$side='sidebar3';
		elseif($sidebar=="Sidebar 4")$side='sidebar4';
		elseif($sidebar=="Sidebar 5")$side='sidebar5';
		
		$infos=array();	if(ot_get_option('posts_fields')) { $infos=ot_get_option('posts_fields');}
		$postid=get_the_ID();
 ?>

 
 	<?php
		$show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {

	$format = get_post_format( $postid );
			if($format=="gallery"){

		$image = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
		$images_gallery = get_post_meta(get_the_ID(), 'dbt_post_gallery', true);
		$images=explode(", ", $images_gallery);
		if(count($images)!=1){
		echo'<header class="cover_img_container"><div  class="fixed-header-above cover_image" id="post_carousel_'.get_the_ID().'">';
		for($j=0;$j<count($images)-1;$j++){$attachment= str_replace ('"','',$images[$j]);    echo'<img src="'.$attachment.'" />'; } 
		echo'</div></header>';
		$postid=get_the_ID();
		$blog_slider_autoPlay=get_post_meta($postid, 'dbt_blog_slider_autoplay', true);;	if($blog_slider_autoPlay=='no'){$blog_slider_autoPlay="false";}else{$blog_slider_autoPlay="true";}
		$blog_slider_responsive=get_post_meta($postid, 'dbt_blog_slider_responsive', true);		if($blog_slider_responsive=='no'){$blog_slider_responsive="false";}else {$blog_slider_responsive="true";}
		$blog_slider_slideSpeed=get_post_meta($postid, 'dbt_blog_slider_slideSpeed', true);	if($blog_slider_slideSpeed==''){$blog_slider_slideSpeed=1250;}
		$blog_slider_effect=get_post_meta($postid, 'dbt_blog_slider_effect', true);	if($blog_slider_effect==''){$blog_slider_effect="slide";}

		echo"<script>
			jQuery(document).ready(function () {
    var sudoSlider = jQuery('#post_carousel_".get_the_ID()."').sudoSlider({
    	autoheight: false,
    	        continuous:true,
    	        effect:'".$blog_slider_effect."',
			   responsive:  ".$blog_slider_responsive.",
			   auto: ".$blog_slider_autoPlay.",
			   speed: ".$blog_slider_slideSpeed."
			});
			jQuery('#post_carousel_".get_the_ID()."').next().appendTo(sudoSlider);
	        jQuery('.prevBtn, .nextBtn, #post_carousel_".get_the_ID()."').hover(
	            function () {
	                jQuery('.prevBtn, .nextBtn').stop().fadeTo(200, 1);
	            }, 
	            function () {
	                jQuery('.prevBtn, .nextBtn').stop().fadeTo(200, 0);
	            }
	        );
	       jQuery('.prevBtn, .nextBtn').stop().fadeTo(0, 0);
	 });</script>";

		}else{
		$to_top_small=1;
		}
	} 
elseif($format=="video"){			
		
	$videotype= get_post_meta(get_the_ID(), 'dbt_video_select', false,true);
		$ids= get_post_meta(get_the_ID(), 'dbt_post_video_id', false,true);
		if (isset($ids[0]) && $ids[0] != '') 
		{echo '<header class="cover_img_container"><figure class="cover_image">';
			if ($videotype[0] == "vimeo" || $videotype == "vimeo"){echo '<iframe src="http://player.vimeo.com/video/' . $ids[0] . '"  class="post-slider-border  generalframe"></iframe>'; }
		else {
			echo '<iframe src="http://www.youtube.com/embed/' . $ids[0] . '?wmode=transparent"  class="post-slider-border  generalframe"></iframe>';
		   }
			
		echo '</figure></header>';
		}else{
	$to_top_small=1;
}
	}
	else{
		 if (has_post_thumbnail()) {
		 $show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
			$img_source= wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' );
			echo '<header class="cover_img_container"><div class="cover_image" style="background-image: url('.$img_source[0].');"></div></header>';
		} 
		 }else{
		 $to_top_small=1;	
		 }
	}

if($to_top_small==1 && get_the_post_thumbnail( $postid)!=''){
		 $show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
			$img_source= wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' );
			echo '<header class="cover_img_container"><div class="cover_image" style="background-image: url('.$img_source[0].');"></div></header>';
		} 
		 }


	} ?>
					

				 
<?php if($template=="Left Sidebar"){?>
	<div class="col main_content right">
	<?php } elseif($template=="Right Sidebar"){?>
	<div class="col main_content">
	<?php } else {?>
	<div class="col full_width">
	<?php } ?>
       

		<?php while ( have_posts() ) : the_post(); 
			
		$postid=get_the_ID();$post_class='';
		if(has_post_thumbnail()){ $post_class='fullpost';}
		
if($to_top_small==1 && !get_the_post_thumbnail( $postid)!='')	{
	$post_class.=' small_top';
}
?>

 <article id="post-<?php the_ID(); ?>" <?php post_class("post_container ".$post_class); ?> >		
	<?php	$grav_url=get_bloginfo('template_directory') . '/img/avatar/62x62_deaulft.jpg';
	if(get_the_author_meta('user_email')){
	    
		 echo get_avatar(  get_the_author_meta('user_email'), $size = '62', $default = $grav_url); 
	}
	else{
		  echo "<img width='62' height='62' alt='img' class='avatar' src=".$grav_url." />";
	}    ?>
<header class="post_header">		
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<?php if(isset($infos) && !in_array("date",$infos)){  
	$time_string = '';
	$time_string .= '<a class="meta-button" href="'. get_the_permalink().'"><i class="fa fa-clock-o"></i><span class="%3$s">%4$s</span></a>';
	$time_string = sprintf( $time_string,	esc_attr( get_the_date( 'c' ) ),esc_html( get_the_date() ),	esc_attr( get_the_modified_date( 'c' ) ),esc_html( get_the_date() ));
	printf($time_string	);
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

	<a  class="meta-button" id="nr_likes_<?php echo esc_attr(get_the_ID()); ?>"  onClick="increase_likes<?php echo esc_attr(get_the_ID()); ?>('nr_likes_<?php echo esc_attr(get_the_ID()); ?>');" href="javascript:;"><i class="fa fa-thumbs-up"></i><span><?php  echo esc_attr(torque_getPostLikes(get_the_ID())); ?></span></a>
	<?php } ?>
	
			
<?php 
if(  isset($infos) && !in_array("categories",$infos)) {$category_detail=get_the_category(get_the_ID());
$i=0;$output='';
/*
foreach($category_detail as $cd){
if($cd->cat_name!="Uncategorized"){
$i++;
if($i==1){
$categ.= $cd->cat_name;
}else {
$categ.= ", ".$cd->cat_name;	
}}
*/
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
            <?php the_content();?>
          
        <?php
 $tags=ot_get_option('blog_single_tags'); 
 
 if(isset($tags[0]) && $tags[0]!="yes" || !isset($tags[0])){       
	$taxonomy = "post_tag"; // can be category, post_tag, or custom taxonomy name
	$posttags = get_the_tags($postid);	
	if(count($posttags)>1){ ?>	
	<div class="blog-single-tags">
	Tagged:
	<?php
	$curr=0;
		if ($posttags) {
			  foreach($posttags as $tag) {
			  	$curr++;
				$term_slug = $tag->name;$term = get_term_by('slug', $term_slug, $taxonomy);
				if($curr==1){
			  echo "<a href='". get_tag_link($tag->term_id)."'>".$tag->name."</a>";  
				} else {
			echo ", <a href='". get_tag_link($tag->term_id)."'>".$tag->name."</a> ";  	
				}
			  }
		} ?>
	</div><hr>
	<?php } } ?>
	   
	<div class="post_pag">
            <?php torque_custom_wp_link_pages();?>
	</div>

 <?php 
			$psnavi="no";
			$psnavi=ot_get_option('blog_single_navi');
			 if(isset($psnavi[0]) && $psnavi[0]=='yes') {
			 echo "<br/>";
			torque_content_nav( 'nav-below' ); 
			} ?>	
	
	</article>	
	
	<?php $share=ot_get_option('blog_single_share'); if(isset( $share[0]) && $share[0]!="yes"){ ?>
	<div class="post_container">
						<div class="sharebar">
							<h6>Share</h6>
								<ul>
	<?php 	$smicons=ot_get_option('social_icons_single');	if($smicons){   $slides = $smicons;
	foreach ($slides as $slide) {
	echo '<li><a target="'. $slide['social_icon_target'].'"  href="' . $slide['social_icon_url'] . '" title="' . $slide['title'] . '"><i class="fa fa-' . $slide['social_icon_type'] . '"></i></a></li>';
	 }	}	?>

							</ul>
						</div>
						
						<div class="clear"></div>
	</div>	
	<?php } ?>
	<div class="flv_comment" id="flv_comment">
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
		
			?>
</div>
		<?php endwhile; // end of the loop. ?>


<?php if($template!="Full Width"){?>
</div>
	<aside class="col sidebar">
	<?php $side1=torque_get_dynamic_sidebar($side); echo(do_shortcode($side1)); ?>
     </aside><!-- /sidebar -->
	<?php } else { ?>
	</div>
	<?php } ?>
	
<?php get_footer(); ?>