<?php 
/* 
Template Name: Portfolio
*/
 get_header();
 

	 while ( have_posts() ) : the_post(); 
	 
	global $post;  $postid = $post->ID;

	$shortcode_columns=get_post_meta($postid, 'dbt_portfolio_s_columns', TRUE); 
	$shortcode_categ=get_post_meta($postid, 'dbt_portfolio_s_categories', TRUE); 
	$shortcode_order=get_post_meta($postid, 'dbt_portfolio_s_order', TRUE); 
	$shortcode_orderby=get_post_meta($postid, 'dbt_portfolio_s_orderby', TRUE); 
	$shortcode_content=get_post_meta($postid, 'dbt_portfolio_s_content', TRUE); 
	$shortcode_thumb=get_post_meta($postid, 'dbt_portfolio_s_theight', TRUE); 
	$shortcode_style=get_post_meta($postid, 'dbt_portfolio_s_style', TRUE); 
	
 ?>
   <!-- 
      /*
      |**************************************************************************
      |  Portfolio
      |  
      |**************************************************************************
      |
      | 
      |
      */
   -->
<?php $port_categories="";	if(isset($shortcode_categ[0]) && $shortcode_categ[0]!=""){	

		foreach($shortcode_categ as $category){
		$port_categories.=$category.", ";
		}
} 


echo '<div id="port_preloader"></div>';
$shortcode='';
$shortcode='[portfolio  columns="'.$shortcode_columns.'" style="'.$shortcode_style.'" categories="'.$port_categories.'" order="'.$shortcode_order.'" ';
if($shortcode_orderby!="likes"){$shortcode.='orderby="'.$shortcode_orderby.'" ';}else{$shortcode.='meta_key="post_likes_count" orderby="meta_value" ';	}
$shortcode.=' thumb_height="'.$shortcode_thumb.'"]';
echo do_shortcode($shortcode);
		?>  

<?php if($shortcode_content!=''){ ?>
<?php   echo'<div class="flvpage-content">'.do_shortcode($shortcode_content).'</div>';  ?>  
<?php } else{ ?>
	<style>.team-container {  margin-bottom: 0px;padding-bottom:60px;}</style>	
	<?php } ?>
<?php endwhile; // end of the loop. 

//footer
 get_footer();
  ?>
