<?php
/*
  Plugin Name: FLV Portfolio
  Description: Creates cool portfolios - Torque theme
  Version: 1.1
  Author: Fialovy
 */

$flv_path = plugins_url('', __FILE__) . '/';


$fialovy_gallery_nr = 10;

if ( ! class_exists( 'flvPortfolio' ) ) {
	
class flvPortfolio{
	
	function __construct() {
		
$flv_shortcode = 'portfolio';		
add_action('init', array(&$this, 'handle_init'),10);

add_shortcode($flv_shortcode, array(&$this, 'show_shortcode'));
add_shortcode('flv_' . $flv_shortcode, array(&$this, 'show_shortcode'));
$arg = array('description' => "my description", 'parent' => "cat_ID");

	
$fialovy_latest_nr=0;	
add_shortcode('latest_projects', 'latest_func');


add_action('admin_menu' , array(&$this, 'flv_enable_pages'));
add_action('admin_init', array(&$this, 'handle_admin_init'));

	}
	
  public static function handle_init(){
        global $flv_path;
		
		  wp_enqueue_script('thickbox');
	      wp_enqueue_style('thickbox');
	      wp_enqueue_script('media-upload');
          wp_enqueue_script('jquery');

          $labels = array(
            'name' => 'Portfolio Items',
            'singular_name' => 'Portfolio Item'
          );
		  $options_new = get_option( 'flv_port_admin_settings' );
		  $slug="flv_portfolio";
		  if($options_new['port_single_other_name']!=''){  $slug= $options_new['port_single_other_name'];}
		  

		  
          $args = array(
            'labels' => $labels,
            'query_var' => true,
            'public' => true,
            'has_archive' => true, 
            'hierarchical' => false,
            'supports' => array('title','editor','thumbnail','comments'),
            'taxonomies' =>array('category','post_tag','portfolio_category'),
            'rewrite' => array( 'slug' => $slug, 'with_front' => true)
          ); 

 register_post_type('flv_portfolio',$args);
 
    }
      public static  function show_shortcode($atts){
   
       extract( shortcode_atts( array(
		'rows' => 'something',
		'columns' => 'something',
        'categories'=>'categories',
        'category_ids'=>'categories',
        'style'=>'categories',
        'source'=>'source',
        'order'=>'asc',
        'orderby'=>'asc'
	), $atts ) );
	
 $columns=4; $source="flv_portfolio"; $order="asc"; $orderby="";$thumb_height="Custom Thumbnail Size";$style="style 1";

	if(isset($atts['thumb_height']))$thumb_height=$atts['thumb_height'];
	if(isset($atts['columns'])&& $atts['columns']!='')$columns=$atts['columns'];
	if(isset($atts['source']) && ($atts['source']=="post" || $atts['source']=="posts" ))$source="post";
	if(isset($atts['source']) && ($atts['source']=="wordpress" || $atts['source']=="gallery" ))$source="wordpress";
	if(isset($atts['style']))$style=$atts['style'];
	if(isset($atts['order']))$order=$atts['order'];
	if(isset($atts['orderby']))$orderby=$atts['orderby'];

	
$i=0;$j=0;$k=0;$l=0;$aux=0;
	if(isset($atts['category_ids']) && $atts['category_ids']!=''){$portfolio_category_ids = explode(", ",$atts['category_ids']);}
	if(isset($atts['categories']) && $atts['categories']!=''){ $portfolio_category = explode(", ",$atts['categories']);
	if($portfolio_category[0][0]==" ")$portfolio_category[0]= substr($portfolio_category[0], 1);
	}	else{$portfolio_category=array();$portfolio_category[0]="anything";	}

 $excerpt_length=100;
 if($columns==3){$excerpt_length=35;}
 if($columns==2){$excerpt_length=200;}
 if($columns==1){$excerpt_length=400;} 
 if(isset($atts['excerpt_length']))$excerpt_length=$atts['excerpt_length'];
 
$options_new = get_option( 'flv_port_admin_settings' );
	  
global $fialovy_gallery_nr;$fialovy_gallery_nr++;

$items_column=$columns;$inline=0;$fialovy_gallery_item_nr=0;$gal_nr=0;$gals=array();   $foutput="";
   

if($source=="post" || $source=="flv_portfolio")	 /////////////////////////////================================================normal	 
       {
		    $args=array('post_type'=>$source,
            'posts_per_page' => '1500',
            'order'=>$order,
            'orderby'=>$orderby
            );
        $wquery = new WP_Query( $args );

   $foutput3='';

if($portfolio_category[0]!="anything"){		
     $foutput.='<div class="col full_width">
					<div class="text_center" id="filter"  data-option-key="filter"><a class="btn medium white btn_color" href="#filter" data-option-value="*">'.__('All','torque').'</a>';							
foreach($portfolio_category as $category){
	if($category!=''){
$foutput.='<a class="btn medium white" data-option-value=".flv_'.get_cat_ID($category).'" href="#filter">'.$category.'</a>';
}
}				
$foutput.='</div></div><div class="clear"></div>';
} 

if($style=="style 2"){
$foutput.='<ul class="portfolio gallery'.$fialovy_gallery_nr.'" id="container">	';	
}else{
$foutput.='<ul class="text_center portfolio gallery'.$fialovy_gallery_nr.'" id="container">	';	
	   }

		if(count($wquery->posts)==0){ $foutput.="Items not found";}
		 else     
		foreach($wquery->posts as $port){      	 $ok=0; $postid = $port->ID;
        if($portfolio_category[0]=="anything"){	$ok=1;	}
		else{if(isset($portfolio_category_ids))
			$ids=count($portfolio_category_ids);else $ids=0;
		if($ids){$post_categories = wp_get_post_categories( $postid );
            foreach($post_categories as $c){     $cat = get_category( $c );
			foreach($portfolio_category_ids as &$v) {  $v = strtolower($v);}if(in_array($cat->cat_ID,$portfolio_category_ids))    {  $ok++;}          }
            }else{   $post_categories = wp_get_post_categories( $postid );
			foreach($portfolio_category as &$v) {  $v = strtolower($v);}   foreach($post_categories as $c){    $cat = get_category( $c );	if(in_array(strtolower($cat->name),$portfolio_category)) {  $ok++;}}
			}	}      
        
if($ok!=0){
	
	$lightbox_type=get_post_meta($postid, 'meta_post_lightbox_type', true);
	$thumb_lightbox_video_type = get_post_meta($postid, 'meta_post_lightbox_video_type', true);
	if($lightbox_type=='')$lightbox_type="none";
	
    $page_url=get_permalink($postid);$urll=get_post_meta($postid, 'meta_post_link', true);if($urll!=""){ $page_url=$urll;}

    $aux = (wp_get_attachment_image_src( get_post_thumbnail_id($postid),'large')); 
	if($aux[0]=='')	$aux[0]=THEME_URL. 'images/blank.png';
	$meta_bigimage = get_post_meta($postid, 'flv_bigimage', true);   
	$post_cats='';	$post_categ=wp_get_post_categories( $postid );
	$cat_nr=count($post_categ);for($g=0;$g<$cat_nr;$g++){	 $cat = get_category($post_categ[$g] );	$post_cats.=$cat->name;	if($g!=$cat_nr-1)	{$post_cats.=" / ";}	}

	$fialovy_gallery_item_nr++;

	$postid = $port->ID;
	$lightbox_type=get_post_meta($postid, 'meta_post_lightbox_type', true);
	$thumb_lightbox_video_type = get_post_meta($postid, 'meta_post_lightbox_video_type', true);

	if($lightbox_type=='')$lightbox_type="none";
		
	if($items_column==2){  $foutput.='<li class="col one_half item ';}
	elseif($items_column==3){$foutput.='<li class="col one_third item ';}
	else{$foutput.='<li class="col one_quarter item ';}
	
	 $defaults = array('fields' => 'ids');      $post_categories = wp_get_post_categories( $postid ,$defaults);         

  foreach($post_categories as $c){
                    $cat = get_category( $c );
			if(isset($ids) && $ids!=''){
				if(in_array($cat->cat_ID,$portfolio_category_ids))
				{ 
			   $foutput.=' flv_'.$cat->cat_ID;
			  }
			    }
				else{
                    $cat = get_category( $c );
				if(in_array(strtolower($cat->name),$portfolio_category))
			    $foutput.=' flv_'. get_cat_ID( $cat->name);	
				}
            }   
$foutput.='">';

$urll=get_post_meta($postid, 'meta_post_link', true);
if($urll!=""){ $page_url=$urll;}

if($thumb_height=="Default Image Size"){$size="full";}
else{
if($items_column==4){	$size="portfolio4";	}
if($items_column==3){	$size="portfolio3";	}
if($items_column==2){	$size="portfolio2"; }
}

$section1=$port->post_content;
$foutput.='<div class="img_post">';

$class='';if($style=="style 2"){$class='img_container arrow_bottom_left';	}elseif($style=="style 3"){$class='img_container rounded';}else{$class='img_container arrow_bottom view';	}

if($lightbox_type=="image")	{
	if($meta_bigimage==''){$meta_bigimage=$aux[0];}
	$foutput.='<a href="'.$meta_bigimage.'" data-fancybox-group="gallery" title="'.__($port->post_title).'" class="'.$class.' fancybox">';
	}
elseif($lightbox_type=="gallery"){
	$images_gallery = get_post_meta($postid, 'flv_gallery', true);
	$gal_nr++;
	$gals[$gal_nr]=substr(str_replace(", ","",$images_gallery), 0, -1);
    $pieces = explode('"', $gals[$gal_nr]);
	
	$foutput.='<script type="text/javascript">jQuery(document).ready(function($) {
	jQuery(".manual'.$gal_nr.'").click(function() {	jQuery.fancybox([';
		for($h =0;$h<count($pieces);$h++)
		if($h%2!=0)
		if($h==count($pieces)-1)
		$foutput.="'".$pieces[$h]."'";
		else
		$foutput.="'".$pieces[$h]."', ";
	$gals[$gal_nr].
	$foutput.='], {"padding"		: 0,"transitionIn"		: "none","transitionOut"		: "none","type"              : "image","changeFade"        : 0		});});});</script>';
	$foutput.='<a class="'.$class.' manual'.$gal_nr.'"  title="'.__($port->post_title).'" href="javascript:;">';	
	}				 
elseif($lightbox_type=="video")	{
		if($thumb_lightbox_video_type=="youtube"){
		$thumb_lightbox_youtube_id = get_post_meta($postid, 'meta_post_lightbox_youtube_id', true);
		$foutput.='<a title="'.__($port->post_title).'" class="'.$class.' various fancybox.iframe" href="http://www.youtube.com/embed/'.$thumb_lightbox_youtube_id.'?autoplay=1">';
         }
		elseif($thumb_lightbox_video_type=="vimeo"){
			$thumb_lightbox_vimeo_id= get_post_meta($postid, 'meta_post_lightbox_vimeo_id', true);
		$foutput.='<a title="'.__($port->post_title).'" class="'.$class.' various fancybox.iframe" href="http://player.vimeo.com/video/'.$thumb_lightbox_vimeo_id.'?autoplay=true">';
		}
	 }  


if($style=="style 2"){
if($meta_bigimage==''){$meta_bigimage=$aux[0];}
$foutput.=get_the_post_thumbnail( $postid,$size,  array('alt' => $port->post_title)).'
								<div class="img_overlay"><i class="fa fa-search"></i></div>
							</a>
							<header>
								<h5><a href="'.$page_url.'">'.__($port->post_title).'</a></h5>
								<p>'.flv_port_generate_excerpt($section1,$excerpt_length).'</p>
							</header>';	
	
}elseif($style=="style 3"){
	if($meta_bigimage==''){$meta_bigimage=$aux[0];}
$foutput.=get_the_post_thumbnail( $postid,$size,  array('alt' => $port->post_title)).'
								<div class="img_overlay rounded">
									<p><span>'.__($port->post_title).'</span>'.flv_port_generate_excerpt($section1,$excerpt_length).'</p>
								</div>
							</a>';	

}else{
	if($meta_bigimage==''){$meta_bigimage=$aux[0];}
$foutput.=get_the_post_thumbnail( $postid,$size,  array('alt' => $port->post_title)).'
								<div class="img_overlay"><p>'.flv_port_generate_excerpt($section1,$excerpt_length).'</p></div>
							</a>
							<header><h5><a href="'.$page_url.'">'.__($port->post_title).'</a></h5></header>';
}	
$foutput.='</div>';						

	$foutput.='</li>';

   }
   }


$foutput.='</div>';


		 }

      return $foutput;
    }
    
        public static  function handle_admin_init(){
       add_meta_box('screen_options', 'Portfolio Item Settings', 'flv_screen_opt', 'flv_portfolio', 'normal', 'high');
       
		register_setting( 'flv_port_admin_settings', 'flv_port_admin_settings', array('flvPortfolio', 'settings_validate'));

	
	add_settings_section( 'port_settings', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_settings' ),'flv_port_admin_settings');
	
	
	add_settings_field( 'port_2_col_height', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_2_height' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_2_col_width', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_2_width' ),'flv_port_admin_settings', 'port_settings');
	
	add_settings_field( 'port_3_col_height', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_3_height' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_3_col_width', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_3_width' ),'flv_port_admin_settings', 'port_settings');
	
	add_settings_field( 'port_4_col_height', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_4_height' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_4_col_width', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_4_width' ),'flv_port_admin_settings', 'port_settings');
	
	add_settings_field( 'port_single_height', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_single_height' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_single_width', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_single_width' ),'flv_port_admin_settings', 'port_settings');
	
	add_settings_field( 'port_single_header', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_single_header' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_single_show_header', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_single_show_header' ),'flv_port_admin_settings', 'port_settings');

	
	add_settings_field( 'port_single_header3', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_single_header3' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_single_comm', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_single_comm' ),'flv_port_admin_settings', 'port_settings');
	
	
	add_settings_field( 'port_single_other_header', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_other_header' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_single_bread', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_single_bread' ),'flv_port_admin_settings', 'port_settings');
	add_settings_field( 'port_single_other_name', __( '', 'fialovy' ), array('flvPortfolio', 'section_port_other_name' ),'flv_port_admin_settings', 'port_settings');
	
	 }

public static function settings_validate($input) {

			return $input;
		}
 
public static  function flv_enable_pages(){
   	    $page_title = __('Portfolio Settings', 'fialovy');
		$menu_title = __('Settings', 'fialovy');
		$capability = 'manage_options';
		$function =  array( 'flvPortfolio', 'flv_enable_settings');
		$parent_slug='edit.php?post_type=flv_portfolio';
add_submenu_page($parent_slug, $page_title, $menu_title, $capability, basename(__FILE__), $function);

   }
   
/* height */
public static  function section_port_settings() 	{}

public static function section_port_2_height() 	{ $options = get_option( 'flv_port_admin_settings' );   $value='';if(isset($options['port_2_col_height'])) {$value=$options['port_2_col_height'];}   ?>
	 <tr> <th scope="row">Portfolio Display 2 Image Height:</th>   <td><input type="text" name="flv_port_admin_settings[port_2_col_height]" value="<?php echo $value; ?>" /> <span class="desc">(default: 445)</span></td> </tr>    	    <?php		}

public static function section_port_3_height() 	{ $options = get_option( 'flv_port_admin_settings' );   $value='';if(isset($options['port_3_col_height'])) {$value=$options['port_3_col_height'];}   ?>
	 <tr> <th scope="row">Portfolio Display 3 Image Height:</th>  <td><input type="text" name="flv_port_admin_settings[port_3_col_height]" value="<?php echo $value; ?>" /> <span class="desc">(default: 555)</span></td> </tr>    	    <?php		}

public static function section_port_4_height() 	{ $options = get_option( 'flv_port_admin_settings' );   $value='';if(isset($options['port_4_col_height'])) {$value=$options['port_4_col_height'];}   ?>
	 <tr> <th scope="row">Portfolio Display 4 Image Height:</th>  <td><input type="text" name="flv_port_admin_settings[port_4_col_height]" value="<?php echo $value; ?>" /> <span class="desc">(default: 555)</span></td> </tr>    	    <?php		}


public static function section_port_single_height() 	{ $options = get_option( 'flv_port_admin_settings' );  $value='';if(isset($options['port_single_height'])) {$value=$options['port_single_height'];}    ?>
	 <tr> <th scope="row">Portfolio Single Image Height:</th> <td><input type="text" name="flv_port_admin_settings[port_single_height]" value="<?php echo $value; ?>" /></td> </tr>    	    <?php		}

/* wdith */

public static function section_port_single_width() 	{ $options = get_option( 'flv_port_admin_settings' );  $value='';if(isset($options['port_single_width'])) {$value=$options['port_single_width'];}    ?>
	 <tr> <th scope="row">Portfolio Single Image Width:</th> <td><input type="text" name="flv_port_admin_settings[port_single_width]" value="<?php echo $value; ?>" /> <span class="desc">(default: 750)</span></td> </tr>    	    <?php		}


public static function section_port_2_width() 	{ $options = get_option( 'flv_port_admin_settings' );   $value='';if(isset($options['port_2_col_width'])) {$value=$options['port_2_col_width'];}   ?>
	 <tr> <th scope="row">Portfolio Display 2 Image Width:</th>   <td><input type="text" name="flv_port_admin_settings[port_2_col_width]" value="<?php echo $value; ?>" /> <span class="desc">(default: 555)</span></td> </tr>    	    <?php		}

public static function section_port_3_width() 	{ $options = get_option( 'flv_port_admin_settings' );   $value='';if(isset($options['port_3_col_width'])) {$value=$options['port_3_col_width'];}   ?>
	 <tr> <th scope="row">Portfolio Display 3 Image Width:</th>  <td><input type="text" name="flv_port_admin_settings[port_3_col_width]" value="<?php echo $value; ?>" /> <span class="desc">(default: 555)</span></td> </tr>    	    <?php		}

public static function section_port_4_width() 	{ $options = get_option( 'flv_port_admin_settings' );   $value='';if(isset($options['port_4_col_width'])) {$value=$options['port_4_col_width'];}   ?>
	 <tr> <th scope="row">Portfolio Display 4 Image Width:</th>  <td><input type="text" name="flv_port_admin_settings[port_4_col_width]" value="<?php echo $value; ?>" /> <span class="desc">(default: 555)</span></td> </tr>    	    <?php		}

public static function section_port_single_header() 	{ ?> <tr class="flv-important3"><th scope="row"></th><td><h3>Single Portfolio Page Settings</h3></td></tr>  <?php }
public static function section_port_single_header3() 	{ ?> <tr class="flv-important2"><th scope="row"></th><td><h3>Comment Section</h3></td></tr>  <?php } 

public static function section_port_other_header() 	{ ?> <tr class="flv-important3"><th scope="row"></th><td><h3>Other Settings</h3></td></tr>  <?php }



public static function section_port_single_show_header() 	{ $options = get_option( 'flv_port_admin_settings' );    ?>
	 <tr> <th scope="row">Layout</th> <td><select name="flv_port_admin_settings[port_single_show_header]">
        	<?php if($options['port_single_show_header']=="Vertical"){?>  <option selected="selected">Vertical</option><option>Horizontal</option>
        	<?php }else{?>   <option selected="selected">Horizontal</option><option>Vertical</option>    	
        	<?php } ?>       </select></td> </tr>    	    <?php		}


public static function section_port_single_bread() 	{ $options = get_option( 'flv_port_admin_settings' );    ?>
	 <tr> <th scope="row">Disable Breadcrumbs:</th> <td><select name="flv_port_admin_settings[port_single_bread]">
        	<?php if($options['port_single_bread']=="yes"){?>  <option selected="selected">yes</option><option>no</option> 	
        	<?php }else{?>   <option>yes</option><option selected="selected">no</option>    	
        	<?php } ?>       </select></td> </tr>    	    <?php		}


public static function section_port_single_comm() 	{ $options = get_option( 'flv_port_admin_settings' );    ?>
	 <tr> <th scope="row">Enable Comments:</th> <td><select name="flv_port_admin_settings[port_single_comm]">
        	<?php if($options['port_single_comm']=="yes"){?>  <option selected="selected">yes</option><option>no</option> 	
        	<?php }else{?>   <option>yes</option><option selected="selected">no</option>    	
        	<?php } ?>       </select></td> </tr>    	    <?php		}


public static function section_port_other_name() 	{ $options = get_option( 'flv_port_admin_settings' ); $value='';if(isset($options['port_single_other_name'])) {$value=$options['port_single_other_name'];}  ?>
	 <tr> <th scope="row">Portfolio name (in url):</th>   <td><input type="text" name="flv_port_admin_settings[port_single_other_name]" value="<?php echo $value; ?>" /> <span><i>default value is : flv_portfolio. After changing this value you must go to Settings -> Permalink and use another option for permalinks (don't use the default option)  and then push the save button ( even if you don't modify anything). It's very important!</i></span></td> </tr>    	    <?php		}




public static  function flv_enable_settings(){
   	 ?>
			<div class="wrap">
				<div id="icon-options-general" class="icon32"><br></div>
				<h2><?php _e('Portfolio Settings', 'fialovy'); ?></h2>

		<form method="post" action="options.php" class="flv-custom-port-table">
	<table class="form-table wp-list-table widefat fixed posts">
		<thead>
		 <th style="width:15%" class="manage-column " id="options" scope="col">Option name</th>
        <th style="width:85%" class="manage-column " id="value" scope="col">Value</th>
        </thead>
        <tr class="flv-important3"><th scope="row"></th><td><h3>Portfolio Thumbnail Sizes </h3></td></tr>
        
        <?php settings_fields('flv_port_admin_settings'); ?>
		<?php do_settings_sections('flv_port_admin_settings'); ?>
       
    </table>
					<p class="submit">
						<input name="Submit" type="submit" class="button-primary" value="<?php _e('Save Changes', 'fialovy'); ?>" />
					</p>
				</form>
				<div class="desc"><strong>NOTE:</strong> You may need to <a href="http://wordpress.org/plugins/force-regenerate-thumbnails/">regenerate your thumbnails</a> after changing sizes.</div>
			</div>

		<?php
   }

}

function flv_screen_opt() {
  global $post,$flv_path;
  /* General options */
  $flv_bigimage = get_post_meta($post->ID, 'flv_bigimage', true);
  $flv_gallery= get_post_meta($post->ID, 'flv_gallery', true);
  $values = get_post_custom($post->ID);

  $text2 = isset( $values['meta_post_lightbox_vimeo_id'] ) ? esc_attr( $values['meta_post_lightbox_vimeo_id'][0] ) : '';
  $text3 = isset( $values['meta_post_lightbox_youtube_id'] ) ? esc_attr( $values['meta_post_lightbox_youtube_id'][0] ) : '';
  
  $flv_link = isset( $values['meta_post_link'] ) ? esc_attr( $values['meta_post_link'][0] ) : '';

  $selected3 = isset( $values['meta_post_lightbox_type'] ) ? esc_attr( $values['meta_post_lightbox_type'][0] ) : '';
  $selected4 = isset( $values['meta_post_lightbox_video_type'] ) ? esc_attr( $values['meta_post_lightbox_video_type'][0] ) : '';
  
  $selected5 = isset( $values['meta_post_portfolio_pagination'] ) ? esc_attr( $values['meta_post_portfolio_pagination'][0] ) : '';
   $selected6 = isset( $values['meta_post_large_header'] ) ? esc_attr( $values['meta_post_large_header'][0] ) : '';
    $selected7 = isset( $values['meta_post_layout'] ) ? esc_attr( $values['meta_post_layout'][0] ) : '';

 $selected50 = isset( $values['meta_post_autoplay'] ) ? esc_attr( $values['meta_post_autoplay'][0] ) : '';
 $selected51 = isset( $values['meta_post_responsive'] ) ? esc_attr( $values['meta_post_responsive'][0] ) : '';
 $selected41 = isset( $values['meta_post_trans'] ) ? esc_attr( $values['meta_post_trans'][0] ) : '';
 $text50 = isset( $values['meta_post_trans_speed'] ) ? esc_attr( $values['meta_post_trans_speed'][0] ) : '1250';
   

 $selected501 = isset( $values['meta_post_share_twitter'] ) ? esc_attr( $values['meta_post_share_twitter'][0] ) : '';
 $selected502 = isset( $values['meta_post_share_facebook'] ) ? esc_attr( $values['meta_post_share_facebook'][0] ) : '';
 $selected503 = isset( $values['meta_post_share_google'] ) ? esc_attr( $values['meta_post_share_google'][0] ) : '';


$text7 = isset( $values['meta_post_portfolio_main'] ) ? esc_attr( $values['meta_post_portfolio_main'][0] ) : '';

echo'<input type="hidden" name="flv_nonce" value="'. wp_create_nonce('flv_nonce') .'" />
<div id="options"> 
<div id="lightboxx">
<h3 class="flv-important4">'.__("Header Settings").'</h3>
<table cellpadding="0" cellspacing="5" style="width:100%">
<tr>
	<td style="width:10%">'.__("Large Featured Image Header").':</td>
      <td>
	    <select name="meta_post_large_header" id="meta_post_large_header" style="width:100px;">
	    <option value="no" '. selected( $selected6, "no" ,false).'>'.__("No").'</option>
		<option value="yes" '. selected( $selected6, "yes" ,false).'>'.__("Yes").'</option>
	    </select>
       </td>
        </tr>
       <br/>
</table>    <br/>
<h3 class="flv-important4">'.__("Layout Settings").'</h3>
<br/>
<table cellpadding="0" cellspacing="5" style="width:100%">
<tr>
	<td style="width:10%">'.__("Layout").':</td>
      <td>
	    <select name="meta_post_layout" id="meta_post_layout" style="width:100px;">
		<option value="Horizontal" '. selected( $selected7, "Horizontal" ,false).'>'.__("Horizontal").'</option>
		<option value="Vertical" '. selected( $selected7, "Vertical" ,false).'>'.__("Vertical").'</option>
	    </select>
       </td>
        </tr>
</table>
<br/>
<h3 class="flv-important4">'.__("Pagination Settings").'</h3>
<br/>
<table cellpadding="0" cellspacing="5" style="width:100%">
<tr>
	<td style="width:10%">'.__("Display Pagination").':</td>
      <td>
	    <select name="meta_post_portfolio_pagination" id="meta_post_portfolio_pagination" style="width:100px;">
		<option value="yes" '. selected( $selected5, "yes" ,false).'>'.__("Yes").'</option>
		<option value="no" '. selected( $selected5, "no" ,false).'>'.__("No").'</option>
	    </select>
       </td>
        </tr>
       <br/>
<tr>  <label for="meta_post_portfolio_main">
	  <td style="width:10%">'.__("Main Portfolio URL").':</td> </label>
      <td><input class="textinput upload" style="width:30%;" type="text" id="meta_post_portfolio_main" name="meta_post_portfolio_main" value="'.$text7.'" /></td>
</tr>
</table>
<br/>
<h3 class="flv-important4">'.__("Share Settings").'</h3>
<br/>
<table cellpadding="0" cellspacing="5" style="width:100%">
<tr>  <label for="meta_post_share_twitter">
	  <td style="width:10%">'.__("Twitter url").':</td> </label>
      <td><select name="meta_post_share_twitter" id="meta_post_share_twitter" style="width:100px;"> 
      <option value="yes" '. selected( $selected501, "yes" ,false).'>'.__("Yes").'</option>
      <option value="no" '. selected( $selected501, "no" ,false).'>'.__("No").'</option>
	  </select>  </td>
</tr>
<tr>  <label for="meta_post_share_facebook">
	  <td style="width:10%">'.__("Facebook url").':</td> </label>
      <td><select name="meta_post_share_facebook" id="meta_post_share_facebook" style="width:100px;">
      <option value="yes" '. selected( $selected502, "yes" ,false).'>'.__("Yes").'</option>
      <option value="no" '. selected( $selected502, "no" ,false).'>'.__("No").'</option>
	  
	  </select></td>
</tr>
<tr>  <label for="meta_post_share_google">
	  <td style="width:10%">'.__("Google plus url").':</td> </label>
      <td><select name="meta_post_share_google" id="meta_post_share_google" style="width:100px;">
       <option value="yes" '. selected( $selected503, "yes" ,false).'>'.__("Yes").'</option>
      <option value="no" '. selected( $selected503, "no" ,false).'>'.__("No").'</option>
	 
	  </select></td>
</tr>
</table><br/>
      
<h3 class="flv-important4">'.__("Lightbox Settings").'</h3>
<br/>
		<label for="meta_post_lightbox_type">'.__("Select type").':</label>
		<select name="meta_post_lightbox_type" id="meta_post_lightbox_type" style="width:200px;">
			<option value="image" '. selected( $selected3, "image" ,false).'>'.__("Single Image").'</option>
			<option value="gallery" '.selected( $selected3, "gallery",false).'>'.__("Image Gallery").'</option>
			<option value="video" '.selected( $selected3, "video",false).'>'.__("Video").'</option>
		</select>
	<br/>
	
	<div class="opt4" style="display:none;">
	<table cellpadding="0" cellspacing="5" style="width:100%">
<tr>
<td style="width:10%">'.__("Big Image").':</td>
<td><img width="16" height="20" style="vertical-align:middle;" src="'.$flv_bigimage.'"/> <input class="textinput upload"type="text" id="screen-thumbnail" name="flv_bigimage" value="'.$flv_bigimage.'" style="width:75%;" /> <button class="flv_upload button">Upload</a></td>
</tr>
</table>
</div>	
<div class="opt40" style="display:none;">
<table cellpadding="0" cellspacing="5" style="width:100%">
<tr>
<td style="width:10%">'.__("Insert Images").':</td>';
 if($flv_gallery=='')$flv_gallery=" ";
echo'<td><textarea style="display:none" name="flv_gallery" id="flv_gallery">'.$flv_gallery.'</textarea>
<div id="my_special_div2">'.swag_transform2($flv_gallery).'</div><button  id="_unique_name_button" class="flv_upload_slide2 button2 button">Upload</button>	</td>
</tr>
<tr>
<td><strong>Slider Settings</strong></td>
<td></td>
</tr>
<tr>
	<td style="width:10%">'.__("Autoplay").':</td>
      <td>
	    <select name="meta_post_autoplay" id="meta_post_autoplay" style="width:100px;">
		<option value="no" '. selected( $selected50, "no" ,false).'>'.__("No").'</option>
		<option value="yes" '. selected( $selected50, "yes" ,false).'>'.__("Yes").'</option>
	    </select>
       </td>
        </tr>
	<td style="width:10%">'.__("Responsive").':</td>
      <td>
	    <select name="meta_post_responsive" id="meta_post_responsive" style="width:100px;">
		<option value="yes" '. selected( $selected51, "yes" ,false).'>'.__("Yes").'</option>
		<option value="no" '. selected( $selected51, "no" ,false).'>'.__("No").'</option>
	    </select>
       </td>
        </tr>
 <tr>
	<td style="width:10%">'.__("Transition type").':</td>
      <td>
	    <select name="meta_post_trans" id="meta_post_trans" style="width:100px;">
	    <option value="slide" '. selected( $selected41, "slide" ,false).'>'.__("slide").'</option>
		<option value="random" '. selected( $selected41, "random" ,false).'>'.__("random").'</option>
		<option value="blinds1" '. selected( $selected41, "blinds1" ,false).'>'.__("blinds1").'</option>
		<option value="blinds1Up" '. selected( $selected41, "blinds1Up" ,false).'>'.__("blinds1Up").'</option>
		<option value="blinds1Right" '. selected( $selected41, "blinds1Right" ,false).'>'.__("blinds1Right").'</option>
		<option value="blinds1Down" '. selected( $selected41, "blinds1Down" ,false).'>'.__("blinds1Down").'</option>
		<option value="blinds1Left" '. selected( $selected41, "blinds1Left" ,false).'>'.__("blinds1Left").'</option>
		<option value="blinds2" '. selected( $selected41, "blinds2" ,false).'>'.__("blinds2").'</option>
		<option value="blinds2Up" '. selected( $selected41, "blinds2Up" ,false).'>'.__("blinds2Up").'</option>
		<option value="blinds2Right" '. selected( $selected41, "blinds2Right" ,false).'>'.__("blinds2Right").'</option>
		<option value="blinds2Down" '. selected( $selected41, "blinds2Down" ,false).'>'.__("blinds2Down").'</option>
		<option value="blinds2Left" '. selected( $selected41, "blinds2Left" ,false).'>'.__("blinds2Left").'</option>
		<option value="fold" '. selected( $selected41, "fold" ,false).'>'.__("fold").'</option>
		<option value="foldUp" '. selected( $selected41, "foldUp" ,false).'>'.__("foldUp").'</option>
		<option value="foldRight" '. selected( $selected41, "foldRight" ,false).'>'.__("foldRight").'</option>
		<option value="foldDown" '. selected( $selected41, "foldDown" ,false).'>'.__("foldDown").'</option>
		<option value="foldLeft" '. selected( $selected41, "foldLeft" ,false).'>'.__("foldLeft").'</option>
		<option value="pushOut" '. selected( $selected41, "pushOut" ,false).'>'.__("pushOut").'</option>
		<option value="pushOutUp" '. selected( $selected41, "pushOutUp" ,false).'>'.__("pushOutUp").'</option>
		<option value="pushOutRight" '. selected( $selected41, "pushOutRight" ,false).'>'.__("pushOutRight").'</option>
		<option value="pushOutDown" '. selected( $selected41, "pushOutDown" ,false).'>'.__("pushOutDown").'</option>
		<option value="pushOutLeft" '. selected( $selected41, "pushOutLeft" ,false).'>'.__("pushOutLeft").'</option>
		<option value="pushIn" '. selected( $selected41, "pushIn" ,false).'>'.__("pushIn").'</option>
		<option value="pushInUp" '. selected( $selected41, "pushInUp" ,false).'>'.__("pushInUp").'</option>
		<option value="pushInRight" '. selected( $selected41, "pushInRight" ,false).'>'.__("pushInRight").'</option>
		<option value="pushInDown" '. selected( $selected41, "pushInDown" ,false).'>'.__("pushInDown").'</option>
		<option value="pushInLeft" '. selected( $selected41, "pushInLeft" ,false).'>'.__("pushInLeft").'</option>
		<option value="reveal" '. selected( $selected41, "reveal" ,false).'>'.__("reveal").'</option>
		<option value="revealUp" '. selected( $selected41, "revealUp" ,false).'>'.__("revealUp").'</option>
		<option value="revealRight" '. selected( $selected41, "revealRight" ,false).'>'.__("revealRight").'</option>
		<option value="revealDown" '. selected( $selected41, "revealDown" ,false).'>'.__("revealDown").'</option>
		<option value="revealLeft" '. selected( $selected41, "revealLeft" ,false).'>'.__("revealLeft").'</option>
		<option value="slice" '. selected( $selected41, "slice" ,false).'>'.__("slice").'</option>
		<option value="sliceUp" '. selected( $selected41, "sliceUp" ,false).'>'.__("sliceUp").'</option>
		<option value="sliceRight" '. selected( $selected41, "sliceRight" ,false).'>'.__("sliceRight").'</option>
		<option value="sliceDown" '. selected( $selected41, "sliceDown" ,false).'>'.__("sliceDown").'</option>
		<option value="sliceLeft" '. selected( $selected41, "sliceLeft" ,false).'>'.__("sliceLeft").'</option>
		<option value="sliceReverse" '. selected( $selected41, "sliceReverse" ,false).'>'.__("sliceReverse").'</option>
		<option value="sliceReverseUp" '. selected( $selected41, "sliceReverseUp" ,false).'>'.__("sliceReverseUp").'</option>
		<option value="sliceReverseRight" '. selected( $selected41, "sliceReverseRight" ,false).'>'.__("sliceReverseRight").'</option>
		<option value="sliceReverseDown" '. selected( $selected41, "sliceReverseDown" ,false).'>'.__("sliceReverseDown").'</option>
		<option value="sliceReverseLeft" '. selected( $selected41, "sliceReverseLeft" ,false).'>'.__("sliceReverseLeft").'</option>
		<option value="sliceRandom" '. selected( $selected41, "sliceRandom" ,false).'>'.__("sliceRandom").'</option>
		<option value="sliceRandomUp" '. selected( $selected41, "sliceRandomUp" ,false).'>'.__("sliceRandomUp").'</option>
		<option value="sliceRandomRight" '. selected( $selected41, "sliceRandomRight" ,false).'>'.__("sliceRandomRight").'</option>
		<option value="sliceRandomDown" '. selected( $selected41, "sliceRandomDown" ,false).'>'.__("sliceRandomDown").'</option>
		<option value="sliceRandomLeft" '. selected( $selected41, "sliceRandomLeft" ,false).'>'.__("sliceRandomLeft").'</option>
		<option value="sliceReveal" '. selected( $selected41, "sliceReveal" ,false).'>'.__("sliceReveal").'</option>
		<option value="sliceRevealUp" '. selected( $selected41, "sliceRevealUp" ,false).'>'.__("sliceRevealUp").'</option>
		<option value="sliceRevealRight" '. selected( $selected41, "sliceRevealRight" ,false).'>'.__("sliceRevealRight").'</option>
		<option value="sliceRevealDown" '. selected( $selected41, "sliceRevealDown" ,false).'>'.__("sliceRevealDown").'</option>
		<option value="sliceRevealLeft" '. selected( $selected41, "sliceRevealLeft" ,false).'>'.__("sliceRevealLeft").'</option>
		<option value="sliceRevealReverse" '. selected( $selected41, "sliceRevealReverse" ,false).'>'.__("sliceRevealReverse").'</option>
		<option value="sliceRevealReverseUp" '. selected( $selected41, "sliceRevealReverseUp" ,false).'>'.__("sliceRevealReverseUp").'</option>
		<option value="sliceRevealReverseRight" '. selected( $selected41, "sliceRevealReverseRight" ,false).'>'.__("sliceRevealReverseRight").'</option>
		<option value="sliceRevealReverseDown" '. selected( $selected41, "sliceRevealReverseDown" ,false).'>'.__("sliceRevealReverseDown").'</option>
		<option value="sliceRevealReverseLeft" '. selected( $selected41, "sliceRevealReverseLeft" ,false).'>'.__("sliceRevealReverseLeft").'</option>
		<option value="sliceRevealRandom" '. selected( $selected41, "sliceRevealRandom" ,false).'>'.__("sliceRevealRandom").'</option>
		<option value="sliceRevealRandomUp" '. selected( $selected41, "sliceRevealRandomUp" ,false).'>'.__("sliceRevealRandomUp").'</option>
		<option value="sliceRevealRandomRight" '. selected( $selected41, "sliceRevealRandomRight" ,false).'>'.__("sliceRevealRandomRight").'</option>
		<option value="sliceRevealRandomDown" '. selected( $selected41, "sliceRevealRandomDown" ,false).'>'.__("sliceRevealRandomDown").'</option>
		<option value="sliceRevealRandomLeft" '. selected( $selected41, "sliceRevealRandomLeft" ,false).'>'.__("sliceRevealRandomLeft").'</option>
		<option value="sliceFade" '. selected( $selected41, "sliceFade" ,false).'>'.__("sliceFade").'</option>
		<option value="sliceFadeUp" '. selected( $selected41, "sliceFadeUp" ,false).'>'.__("sliceFadeUp").'</option>
		<option value="sliceFadeRight" '. selected( $selected41, "sliceFadeRight" ,false).'>'.__("sliceFadeRight").'</option>
		<option value="sliceFadeDown" '. selected( $selected41, "sliceFadeDown" ,false).'>'.__("sliceFadeDown").'</option>
		<option value="sliceFadeLeft" '. selected( $selected41, "sliceFadeLeft" ,false).'>'.__("sliceFadeLeft").'</option>
		<option value="zip" '. selected( $selected41, "zip" ,false).'>'.__("zip").'</option>
		<option value="zipUp" '. selected( $selected41, "zipUp" ,false).'>'.__("zipUp").'</option>
		<option value="zipRight" '. selected( $selected41, "zipRight" ,false).'>'.__("zipRight").'</option>
		<option value="zipDown" '. selected( $selected41, "zipDown" ,false).'>'.__("zipDown").'</option>
		<option value="zipLeft" '. selected( $selected41, "zipLeft" ,false).'>'.__("zipLeft").'</option>
		<option value="unzip" '. selected( $selected41, "unzip" ,false).'>'.__("unzip").'</option>
		<option value="unzipUp" '. selected( $selected41, "unzipUp" ,false).'>'.__("unzipUp").'</option>
		<option value="unzipRight" '. selected( $selected41, "unzipRight" ,false).'>'.__("unzipRight").'</option>
		<option value="unzipDown" '. selected( $selected41, "unzipDown" ,false).'>'.__("unzipDown").'</option>
		<option value="unzipLeft" '. selected( $selected41, "unzipLeft" ,false).'>'.__("unzipLeft").'</option>
		<option value="boxRandom" '. selected( $selected41, "boxRandom" ,false).'>'.__("boxRandom").'</option>
		<option value="boxRandomGrowIn" '. selected( $selected41, "boxRandomGrowIn" ,false).'>'.__("boxRandomGrowIn").'</option>
		<option value="boxRandomGrowOut" '. selected( $selected41, "boxRandomGrowOut" ,false).'>'.__("boxRandomGrowOut").'</option>
		<option value="boxRainUpLeft" '. selected( $selected41, "boxRainUpLeft" ,false).'>'.__("boxRainUpLeft").'</option>
		<option value="boxRainDownLeft" '. selected( $selected41, "boxRainDownLeft" ,false).'>'.__("boxRainDownLeft").'</option>
		<option value="boxRainDownRight" '. selected( $selected41, "boxRainDownRight" ,false).'>'.__("boxRainDownRight").'</option>
		<option value="boxRainUpRight" '. selected( $selected41, "boxRainUpRight" ,false).'>'.__("boxRainUpRight").'</option>
		<option value="boxRainGrowInUpLeft" '. selected( $selected41, "boxRainGrowInUpLeft" ,false).'>'.__("boxRainGrowInUpLeft").'</option>
		<option value="boxRainGrowInDownLeft" '. selected( $selected41, "boxRainGrowInDownLeft" ,false).'>'.__("boxRainGrowInDownLeft").'</option>
		<option value="boxRainGrowInDownRight" '. selected( $selected41, "boxRainGrowInDownRight" ,false).'>'.__("boxRainGrowInDownRight").'</option>
		<option value="boxRainGrowInUpRight" '. selected( $selected41, "boxRainGrowInUpRight" ,false).'>'.__("boxRainGrowInUpRight").'</option>
		<option value="boxRainGrowOutUpLeft" '. selected( $selected41, "boxRainGrowOutUpLeft" ,false).'>'.__("boxRainGrowOutUpLeft").'</option>
		<option value="boxRainGrowOutDownLeft" '. selected( $selected41, "boxRainGrowOutDownLeft" ,false).'>'.__("boxRainGrowOutDownLeft").'</option>
		<option value="boxRainGrowOutDownRight" '. selected( $selected41, "boxRainGrowOutDownRight" ,false).'>'.__("boxRainGrowOutDownRight").'</option>
		<option value="boxRainGrowOutUpRight" '. selected( $selected41, "boxRainGrowOutUpRight" ,false).'>'.__("boxRainGrowOutUpRight").'</option>
		<option value="boxRainFlyInUpLeft" '. selected( $selected41, "boxRainFlyInUpLeft" ,false).'>'.__("boxRainFlyInUpLeft").'</option>
		<option value="boxRainFlyInDownLeft" '. selected( $selected41, "boxRainFlyInDownLeft" ,false).'>'.__("boxRainFlyInDownLeft").'</option>
		<option value="boxRainFlyInDownRight" '. selected( $selected41, "boxRainFlyInDownRight" ,false).'>'.__("boxRainFlyInDownRight").'</option>
		<option value="boxRainFlyInUpRight" '. selected( $selected41, "boxRainFlyInUpRight" ,false).'>'.__("boxRainFlyInUpRight").'</option>
		<option value="boxRainFlyOutUpLeft" '. selected( $selected41, "boxRainFlyOutUpLeft" ,false).'>'.__("boxRainFlyOutUpLeft").'</option>
		<option value="boxRainFlyOutDownLeft" '. selected( $selected41, "boxRainFlyOutDownLeft" ,false).'>'.__("boxRainFlyOutDownLeft").'</option>
		<option value="boxRainFlyOutDownRight" '. selected( $selected41, "boxRainFlyOutDownRight" ,false).'>'.__("boxRainFlyOutDownRight").'</option>
		<option value="boxRainFlyOutUpRight" '. selected( $selected41, "boxRainFlyOutUpRight" ,false).'>'.__("boxRainFlyOutUpRight").'</option>
		<option value="boxSpiralInWards" '. selected( $selected41, "boxSpiralInWards" ,false).'>'.__("boxSpiralInWards").'</option>
		<option value="boxSpiralInWardsGrowIn" '. selected( $selected41, "boxSpiralInWardsGrowIn" ,false).'>'.__("boxSpiralInWardsGrowIn").'</option>
		<option value="boxSpiralInWardsGrowOut" '. selected( $selected41, "boxSpiralInWardsGrowOut" ,false).'>'.__("boxSpiralInWardsGrowOut").'</option>
		<option value="boxSpiralOutWards" '. selected( $selected41, "boxSpiralOutWards" ,false).'>'.__("boxSpiralOutWards").'</option>
		<option value="boxSpiralOutWardsGrowIn" '. selected( $selected41, "boxSpiralOutWardsGrowIn" ,false).'>'.__("boxSpiralOutWardsGrowIn").'</option>
		<option value="boxSpiralOutWardsGrowOut" '. selected( $selected41, "boxSpiralOutWardsGrowOut" ,false).'>'.__("boxSpiralOutWardsGrowOut").'</option>
		<option value="fade" '. selected( $selected41, "fade" ,false).'>'.__("fade").'</option>
		<option value="fadeOutIn" '. selected( $selected41, "fadeOutIn" ,false).'>'.__("fadeOutIn").'</option>
		<option value="foldRandomHorizontal" '. selected( $selected41, "foldRandomHorizontal" ,false).'>'.__("foldRandomHorizontal").'</option>
		<option value="foldRandomVertical" '. selected( $selected41, "foldRandomVertical" ,false).'>'.__("foldRandomVertical").'</option>
		<option value="stackUp" '. selected( $selected41, "stackUp" ,false).'>'.__("stackUp").'</option>
		<option value="stackUpReverse" '. selected( $selected41, "stackUpReverse" ,false).'>'.__("stackUpReverse").'</option>
		<option value="stackRight" '. selected( $selected41, "stackRight" ,false).'>'.__("stackRight").'</option>
		<option value="stackRightReverse" '. selected( $selected41, "stackRightReverse" ,false).'>'.__("stackRightReverse").'</option>
		<option value="stackDown" '. selected( $selected41, "stackDown" ,false).'>'.__("stackDown").'</option>
		<option value="stackDownReverse" '. selected( $selected41, "stackDownReverse" ,false).'>'.__("stackDownReverse").'</option>
		<option value="stackLeft" '. selected( $selected41, "stackLeft" ,false).'>'.__("stackLeft").'</option>
		<option value="stackLeftReverse" '. selected( $selected41, "stackLeftReverse" ,false).'>'.__("stackLeftReverse").'</option>
	    </select>
       </td>
        </tr>
 <tr ><label for="meta_post_trans_speed">
	  <td style="width:10%">'.__("Transition speed").':</td> </label>
      <td><input class="textinput" style="width:30%;" type="text" id="meta_post_trans_speed" name="meta_post_trans_speed" value="'.$text50.'" /></td>
      </tr> 

</table>
</div>

	<table class="opt30"  id="tabel" cellpadding="0" cellspacing="5" style="width:100%;display:none;">
	<tr>
	<td style="width:10%">'.__("Select type").':</td>
      <td>
	    <select name="meta_post_lightbox_video_type" id="meta_post_lightbox_video_type" style="width:100px;">
		<option value="vimeo" '. selected( $selected4, "vimeo" ,false).'>'.__("Vimeo").'</option>
		<option value="youtube" '. selected( $selected4, "youtube" ,false).'>'.__("Youtube").'</option>
	    </select>
       </td>
        </tr>
       <br/>
	  <tr class="opt6" style="display:none;">  <label for="meta_post_lightbox_vimeo_id">
	  <td style="width:10%">'.__("Id of video").':</td> </label>
      <td><input class="textinput upload" style="width:30%;" type="text" id="meta_post_lightbox_vimeo_id" name="meta_post_lightbox_vimeo_id" value="'.$text2.'" /></td>
      </tr>
      <tr class="opt7" style="display:none;"><label for="meta_post_lightbox_youtube_id">
	  <td style="width:10%">'.__("Id of video").':</td> </label>
      <td><input class="textinput upload" style="width:30%;" type="text" id="meta_post_lightbox_youtube_id" name="meta_post_lightbox_youtube_id" value="'.$text3.'" /></td>
      </tr> 
  </table>

</div>
 <br/>
<h3></h3>
 <br/>
<table cellpadding="0" cellspacing="5" style="width:100%">
     <tr><label for="meta_post_link">
	  <td style="width:10%">'.__("URL").':</td> </label>
      <td><input class="textinput" style="width:80%;" type="text" id="meta_post_link" name="meta_post_link" value="'.$flv_link.'" /></td>
      <td style="width:10%"><span>'.__("leave empty to use single portfolio link").'</span></td> 
      </tr> 
        </table>
  <br/>
</div>';

}

add_action('save_post', 'flv_update_opt');
function flv_update_opt($post_id) {
global $post;

if(isset($post) && $post->post_type!='flv_portfolio')
return $post_id;

/* Check autosave */
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
return $post_id;
}

if ( isset($_POST['flv_nonce'])  ) {
$nonce=$_REQUEST['flv_nonce'];
if (! wp_verify_nonce($nonce, 'flv_nonce') ) wp_die('Security check');
}

if( isset( $_POST['flv_bigimage'] ) )
update_post_meta($post->ID,'flv_bigimage',$_POST['flv_bigimage']);
if( isset( $_POST['flv_gallery'] ) )
update_post_meta($post->ID,'flv_gallery',$_POST['flv_gallery']);


if( isset( $_POST['meta_post_lightbox_type'] ) )
update_post_meta($post->ID,'meta_post_lightbox_type',$_POST['meta_post_lightbox_type']);
if( isset( $_POST['meta_post_lightbox_video_type'] ) )
update_post_meta($post->ID,'meta_post_lightbox_video_type',$_POST['meta_post_lightbox_video_type']);
if( isset( $_POST['meta_post_lightbox_vimeo_id'] ) )
update_post_meta($post->ID,'meta_post_lightbox_vimeo_id',$_POST['meta_post_lightbox_vimeo_id']);
if( isset( $_POST['meta_post_lightbox_youtube_id'] ) )
update_post_meta($post->ID,'meta_post_lightbox_youtube_id',$_POST['meta_post_lightbox_youtube_id']);

if( isset( $_POST['meta_post_share_twitter'] ) )
update_post_meta($post->ID,'meta_post_share_twitter',$_POST['meta_post_share_twitter']);
if( isset( $_POST['meta_post_share_facebook'] ) )
update_post_meta($post->ID,'meta_post_share_facebook',$_POST['meta_post_share_facebook']);
if( isset( $_POST['meta_post_share_google'] ) )
update_post_meta($post->ID,'meta_post_share_google',$_POST['meta_post_share_google']);
if( isset( $_POST['meta_post_portfolio_main'] ) )
update_post_meta($post->ID,'meta_post_portfolio_main',$_POST['meta_post_portfolio_main']);
if( isset( $_POST['meta_post_portfolio_pagination'] ) )
update_post_meta($post->ID,'meta_post_portfolio_pagination',$_POST['meta_post_portfolio_pagination']);
if( isset( $_POST['meta_post_large_header'] ) )
update_post_meta($post->ID,'meta_post_large_header',$_POST['meta_post_large_header']);
if( isset( $_POST['meta_post_layout'] ) )
update_post_meta($post->ID,'meta_post_layout',$_POST['meta_post_layout']);
if( isset( $_POST['meta_post_autoplay'] ) )
update_post_meta($post->ID,'meta_post_autoplay',$_POST['meta_post_autoplay']);
if( isset( $_POST['meta_post_responsive'] ) )
update_post_meta($post->ID,'meta_post_responsive',$_POST['meta_post_responsive']);
if( isset( $_POST['meta_post_trans'] ) )
update_post_meta($post->ID,'meta_post_trans',$_POST['meta_post_trans']);
if( isset( $_POST['meta_post_trans_speed'] ) )
update_post_meta($post->ID,'meta_post_trans_speed',$_POST['meta_post_trans_speed']);

if( isset( $_POST['meta_post_link'] ) )
update_post_meta($post->ID,'meta_post_link',$_POST['meta_post_link']);

}

add_action('admin_head', 'the_port_head');
function the_port_head(){
        global $post;
    if(isset($post) && $post->post_type=='flv_portfolio'){
           
?>
        <script>
        jQuery(document).ready(function($){

       orig_send_to_editor=window.send_to_editor;
 $('.textinput.upload').change(function(){
                $this = $(this);
                $this.prev().attr('src', $this.val());
            })
          jQuery('.flv_upload').click(function() {
     	   window.upl_target = jQuery(this).prev();
            tb_show('', 'media-upload.php?post_id=<?php _e($post->ID); ?>&type=image&amp;TB_iframe=1');
         window.send_to_editor = function(html) { imgurl = jQuery(html).attr('href');
 window.upl_target.val(imgurl);
window.upl_target.trigger("change");
 tb_remove();
    
             window.send_to_editor = orig_send_to_editor;
         }

         return false;
     }); 


  jQuery('.flv_upload_slide2').click(function(e) {
  	window.upl_target3 = jQuery(this).prev().prev();
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = jQuery(this);

    wp.media.editor.send.attachment = function(props, attachment){ 
     	ceva=window.upl_target3.val();
     	ceva+= '"'+attachment.url+'", ';
        window.upl_target3.val(ceva);

var sp_div=button.prev();
var url=attachment.url;
sp_div.append("<span><img class='special_img' src='"+url.trim()+"'/><span class='xicon'></span></span>");
sp_div.find(".xicon").click(function(){
var txt2='"'+jQuery(this).prev().attr('src')+'", ';
var textarea = jQuery(this).parent().parent().parent().find("#flv_gallery");
var txt = textarea.val();
textarea.val(txt.replace(txt2, ''));
	jQuery(this).parent().hide("slow").remove();
})
    }
    wp.media.editor.open(button);
    return false;
  });
  jQuery('.add_media').on('click', function(){
    _custom_media = false;
  });
    ////end
        });
        </script>
        <?php
    }
}

function swag_transform2($text){
		$fout='';
		if($text!=' '){
		$fout=str_replace ('", "', "</span><span> ", $text);
		$fout=substr_replace($fout,'</span>', -3, -1);
		$fout=substr_replace($fout,'<span>', 0, 2);
		}
		return $fout;
	}


$fialovy_latest_nr=0;	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ latest_projects ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
function latest_func($atts, $content2) {
	global $fialovy_latest_nr;
	$fialovy_latest_nr++;
	$foutput='';
	$inline=200;$gal_nr=rand();
	 $style="style 1"; 	
	 $fialovy_latest_item_nr=0;$fialovy_masonry_item_nr=0; 
	 
$thumb_height="Custom Thumbnail Size";if(isset($atts['thumb_height']))$thumb_height=$atts['thumb_height'];
if(isset($atts['style'])&& $atts['style']!=''){$style=$atts['style'];} // style 1 / style 2 / style 3

$items_column=4;   if (isset($atts['columns_nr'])) {$items_column = $atts['columns_nr'];}
$total_nr=4;   if (isset($atts['number'])) {$total_nr = $atts['number'];}
if($total_nr<$items_column)$total_nr=$items_column;

$excerpt_length=100; if(isset($atts['excerpt_length']))$excerpt_length=$atts['excerpt_length'];

	if(isset($atts['categories']) && $atts['categories']!=''){ $portfolio_category = explode(", ",$atts['categories']);
	if($portfolio_category[0][0]==" ")$portfolio_category[0]= substr($portfolio_category[0], 1);
	}	else{$portfolio_category=array();$portfolio_category[0]="anything";	}

 $source="flv_portfolio";
$options_new = get_option( 'flv_port_admin_settings' );
	  
global $fialovy_gallery_nr;$fialovy_gallery_nr++;

$columns=$items_column;$inline=0;$fialovy_gallery_item_nr=0;$gal_nr=0;$gals=array();   $foutput="";
   

if($source=="post" || $source=="flv_portfolio")	
       {
		    $args=array('post_type'=>$source,
            'posts_per_page' => $total_nr,
            'order'=>'desc',
            'orderby'=>'date',
            'category'=>$portfolio_category
            );
        $wquery = new WP_Query( $args );

   $foutput3='';

if($portfolio_category[0]!="anything"){		
     $foutput.='<div class="col full_width">
					<div class="text_center" id="filter"  data-option-key="filter"><a class="btn medium white btn_color" href="#filter" data-option-value="*">All</a>';							
foreach($portfolio_category as $category){
	if($category!=''){
$foutput.='<a class="btn medium white" data-option-value=".flv_'.get_cat_ID($category).'" href="#filter">'.$category.'</a>';
}
}				
$foutput.='</div></div><div class="clear"></div>';
} 


if($style=="style 2"){
$foutput.='<ul class="portfolio gallery'.$fialovy_gallery_nr.'" id="container">	';	
}else{
$foutput.='<ul class="text_center portfolio gallery'.$fialovy_gallery_nr.'" id="container">	';	
	   }

		if(count($wquery->posts)==0){ $foutput.="Items not found";}
		 else     
		foreach($wquery->posts as $port){      	 $ok=0; $postid = $port->ID;
        if($portfolio_category[0]=="anything"){	$ok=1;	}
		else{if(isset($portfolio_category_ids))
			$ids=count($portfolio_category_ids);else $ids=0;
		if($ids){$post_categories = wp_get_post_categories( $postid );
            foreach($post_categories as $c){     $cat = get_category( $c );
			foreach($portfolio_category_ids as &$v) {  $v = strtolower($v);}if(in_array($cat->cat_ID,$portfolio_category_ids))    {  $ok++;}          }
            }else{   $post_categories = wp_get_post_categories( $postid );
			foreach($portfolio_category as &$v) {  $v = strtolower($v);}   foreach($post_categories as $c){    $cat = get_category( $c );	if(in_array(strtolower($cat->name),$portfolio_category)) {  $ok++;}}
			}	}      
        
if($ok!=0){
	
	$lightbox_type=get_post_meta($postid, 'meta_post_lightbox_type', true);
	$thumb_lightbox_video_type = get_post_meta($postid, 'meta_post_lightbox_video_type', true);
	if($lightbox_type=='')$lightbox_type="none";
	
    $page_url=get_permalink($postid);$urll=get_post_meta($postid, 'meta_post_link', true);if($urll!=""){ $page_url=$urll;}

    $aux = (wp_get_attachment_image_src( get_post_thumbnail_id($postid),'large')); 
	if($aux[0]=='')	$aux[0]=THEME_URL. 'images/blank.png';
	$meta_bigimage = get_post_meta($postid, 'flv_bigimage', true);   
	$post_cats='';	$post_categ=wp_get_post_categories( $postid );
	$cat_nr=count($post_categ);for($g=0;$g<$cat_nr;$g++){	 $cat = get_category($post_categ[$g] );	$post_cats.=$cat->name;	if($g!=$cat_nr-1)	{$post_cats.=" / ";}	}

	$fialovy_gallery_item_nr++;

	$postid = $port->ID;
	$lightbox_type=get_post_meta($postid, 'meta_post_lightbox_type', true);
	$thumb_lightbox_video_type = get_post_meta($postid, 'meta_post_lightbox_video_type', true);

	if($lightbox_type=='')$lightbox_type="none";
		
	if($items_column==2){  $foutput.='<li class="col one_half item ';}
	elseif($items_column==3){$foutput.='<li class="col one_third item ';}
	else{$foutput.='<li class="col one_quarter item ';}
	
	 $defaults = array('fields' => 'ids');      $post_categories = wp_get_post_categories( $postid ,$defaults);         	

  foreach($post_categories as $c){
                    $cat = get_category( $c );
			if(isset($ids) && $ids!=''){
				if(in_array($cat->cat_ID,$portfolio_category_ids))
				{ 
			   $foutput.=' flv_'.$cat->cat_ID;
			  }
			    }
				else{
                    $cat = get_category( $c );
				if(in_array(strtolower($cat->name),$portfolio_category))
			    $foutput.=' flv_'. get_cat_ID( $cat->name);	
				}
            }  
$foutput.='">';

$urll=get_post_meta($postid, 'meta_post_link', true);
if($urll!=""){ $page_url=$urll;}

if($thumb_height=="Default Image Size"){$size="full";}
else{
if($items_column==4){	$size="portfolio4";	}
if($items_column==3){	$size="portfolio3";	}
if($items_column==2){	$size="portfolio2"; }
}

$section1=$port->post_content;
$foutput.='<div class="img_post">';

$class='';if($style=="style 2"){$class='img_container arrow_bottom_left';	}elseif($style=="style 3"){$class='img_container rounded';}else{$class='img_container arrow_bottom view';	}

if($lightbox_type=="image")	{
	if($meta_bigimage==''){$meta_bigimage=$aux[0];}
	$foutput.='<a href="'.$meta_bigimage.'" data-fancybox-group="gallery" title="'.__($port->post_title).'" class="'.$class.' fancybox">';
	}
elseif($lightbox_type=="gallery"){
	$images_gallery = get_post_meta($postid, 'flv_gallery', true);
	$gal_nr++;
	$gals[$gal_nr]=substr(str_replace(", ","",$images_gallery), 0, -1);
    $pieces = explode('"', $gals[$gal_nr]);
	
	$foutput.='<script type="text/javascript">jQuery(document).ready(function($) {
	jQuery(".manual'.$gal_nr.'").click(function() {	jQuery.fancybox([';
		for($h =0;$h<count($pieces);$h++)
		if($h%2!=0)
		if($h==count($pieces)-1)
		$foutput.="'".$pieces[$h]."'";
		else
		$foutput.="'".$pieces[$h]."', ";
	$gals[$gal_nr].
	$foutput.='], {"padding"		: 0,"transitionIn"		: "none","transitionOut"		: "none","type"              : "image","changeFade"        : 0		});});});</script>';
	$foutput.='<a class="'.$class.' manual'.$gal_nr.'"  title="'.__($port->post_title).'" href="javascript:;">';	
	}				 
elseif($lightbox_type=="video")	{
		if($thumb_lightbox_video_type=="youtube"){
		$thumb_lightbox_youtube_id = get_post_meta($postid, 'meta_post_lightbox_youtube_id', true);
		$foutput.='<a title="'.__($port->post_title).'" class="'.$class.' various fancybox.iframe" href="http://www.youtube.com/embed/'.$thumb_lightbox_youtube_id.'?autoplay=1">';
         }
		elseif($thumb_lightbox_video_type=="vimeo"){
			$thumb_lightbox_vimeo_id= get_post_meta($postid, 'meta_post_lightbox_vimeo_id', true);
		$foutput.='<a title="'.__($port->post_title).'" class="'.$class.' various fancybox.iframe" href="http://player.vimeo.com/video/'.$thumb_lightbox_vimeo_id.'?autoplay=true">';
		}
	 }  
if($style=="style 2"){
if($meta_bigimage==''){$meta_bigimage=$aux[0];}
$foutput.=get_the_post_thumbnail( $postid,$size,  array('alt' => $port->post_title)).'
								<div class="img_overlay"><i class="fa fa-search"></i></div>
							</a>
							<header>
								<h5><a href="'.$page_url.'">'.__($port->post_title).'</a></h5>
								<p>'.flv_port_generate_excerpt($section1,$excerpt_length).'</p>
							</header>';	
}elseif($style=="style 3"){
	if($meta_bigimage==''){$meta_bigimage=$aux[0];}
$foutput.=get_the_post_thumbnail( $postid,$size,  array('alt' => $port->post_title)).'
								<div class="img_overlay rounded">
									<p><span>'.__($port->post_title).'</span>'.flv_port_generate_excerpt($section1,$excerpt_length).'</p>
								</div>
							</a>';	

}else{
	if($meta_bigimage==''){$meta_bigimage=$aux[0];}
$foutput.=get_the_post_thumbnail( $postid,$size,  array('alt' => $port->post_title)).'
								<div class="img_overlay"><p>'.flv_port_generate_excerpt($section1,$excerpt_length).'</p></div>
							</a>
						<header><h5><a href="'.$page_url.'">'.__($port->post_title).'</a></h5></header>';
}
$foutput.='</div>';						
	$foutput.='</li>';
   }
   }
$foutput.='</div>';
}
						
return $foutput;
}

	// Initiation call of plugin
	$flvPort = new flvPortfolio(__FILE__);
}


?>
