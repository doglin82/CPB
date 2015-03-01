<?php 
/*
Plugin Name: FLV Shortcodes
Plugin URI: 
Version: 1.1
Author: Fialovy
Author URI: http://fialovy.com/
Description: shortcodes - Torque theme
*/
         
$flv_path = plugins_url('', __FILE__) . '/';

// Begin Shortcodes


class BoostrapShortcodes {

  function __construct() {
    add_action( 'init', array( $this, 'add_shortcodes' ) );

  }


  /*--------------------------------------------------------------------------------------
    *
    * add_shortcodes
    *
    *
    *-------------------------------------------------------------------------------------*/
  function add_shortcodes() {
  	
 $flv_section= 0;$flv_icon_nr = 0;	$fialovy_pricing_tables_nr = 0;$args_tab = array(); $loc_usage=0; $l_buffer=0;$tw_count=0;$flv_icon_2_nr=0;$fialovy_accordion_nr=0;
 $tabs_item_nr=0;$tab_item_nr=0;$vertical_tabs_item_nr=0;$vertical_tab_item_nr=0;$flv_map_nr = 0;$fialovy_testi_nr = 0;$fialovy_testimonial_nr = 10;$fialovy_pattern=0; $fialovy_flex_nr=0;
 $fialovy_wc_sort_nr=0;$service_counter=0;$fialovy_testimonial_slider_nr=0;$fialovy_sudo_slider_nr=0;$fialovy_sudo_slide_nr=0;
 $fialovy_owl_slider_nr=0; $fialovy_owl_slider_posts_nr=0;$fialovy_testimonial_slide_nr=0;
     $fialovy_bx_slider_nr=10;
       
 
 $plugins = get_option('active_plugins');
$required_plugin = 'woocommerce/woocommerce.php';
$debug_queries_on = FALSE;
if ( in_array( $required_plugin , $plugins ) ) {
    $debug_queries_on = TRUE; // Example for yes, it's active
}
 if ($debug_queries_on)
 {
 add_shortcode('sort_products',  array( $this,'woocommerce_sort_products'));	
 }
/*------------- DONE -----------*/
/* - */
add_shortcode('section',  array( $this,'section_func'));/********* done *********/

add_shortcode('heading1',  array( $this,'heading1_func'));/* - */
add_shortcode('heading2',  array( $this,'heading2_func'));/* - */
add_shortcode('heading3',  array( $this,'heading3_func'));/* - */
add_shortcode('heading4',  array( $this,'heading4_func'));/* - */
add_shortcode('heading5',  array( $this,'heading5_func'));/* - */
add_shortcode('heading6',  array( $this,'heading6_func'));/* - */
add_shortcode('progress_bar', array( $this, 'progress_bar_func' )); /* - */

 	add_shortcode('blockquote',  array( $this,'blockquote_func'));/* - */
 	add_shortcode('single_testimonial',  array( $this,'single_testimonial_func'));/* - */
 	add_shortcode('message_box',  array( $this,'message_box_func'));/* - */
 	add_shortcode('tooltip',  array( $this,'tooltip_func'));/* - */
 	add_shortcode('button', array( $this, 'bs_button' ));  /* - */
    add_shortcode('blog_list',  array( $this,'blog_list_func'));  /* - */

	add_shortcode('column', array( $this, 'bs_column' )); 	
	add_shortcode('dropcap',  array( $this,'dropcap_func'));  	/* - */
	add_shortcode('flvcontactform',  array( $this,'contactform_func'));  /* - */
	add_shortcode('subscription_form',  array( $this,'subscription_form_func'));/* - */

	add_shortcode('google_map',  array( $this, 'google_map_func'));  	 /* - */
	add_shortcode('hr',  array( $this,'hr_func')); 
	add_shortcode('icon',  array( $this, 'icon_func'));   /* - */

add_shortcode('list-group', array( $this, 'bs_list_group' ));
add_shortcode('list-group-item', array( $this, 'bs_list_group_item' ));  
    
    add_shortcode('location_img',  array( $this,'location_img_func'));  


add_shortcode('pricing_tables',  array( $this,'pricing_tables_group')); /* - */
add_shortcode('pricing_table',  array( $this,'table_func'));  /* - */
add_shortcode('pricing_table_primary',  array( $this,'table_primary_func'));  /* - */


	add_shortcode('row', array( $this, 'bs_row' )); 	
	add_shortcode('search',  array( $this,'search_func'));    /* - */
    add_shortcode('sidebar',  array( $this, 'sidebar_func')); /* - */
    add_shortcode('span', array( $this, 'bs_span' )); /* - */

	add_shortcode('service_icon',  array( $this,'service_icon_func'));/* - */
    add_shortcode('table', array( $this, 'bs_table' ));
	
add_shortcode('toggle_group', array( $this, 'bs_collapsibles' ));/* - */
add_shortcode('toggle', array( $this, 'bs_collapse' )); /* - */

add_shortcode('tab_group', array( $this, 'tab_group_func' ));/* - */
add_shortcode('tab', array( $this, 'tab_func' )); /* - */

add_shortcode('vertical_tab_group', array( $this, 'vertical_tab_group_func' ));/* - */
add_shortcode('vertical_tab', array( $this, 'vertical_tab_func' )); /* - */

add_shortcode('testimonial_slider',  array( $this,'testimonial_func')); /* - */
add_shortcode('testimonial_slide',  array( $this,'testimonial_slide')); /* - */

add_shortcode('sudo_slider',  array( $this,'sudo_slider_func')); /* - */
add_shortcode('sudo_slide',  array( $this,'sudo_slide_func')); /* - */

add_shortcode('bx_slider', array( $this,'bx_slider_func'));
add_shortcode('bx_slide', array( $this,'bx_slide_func'));

	add_shortcode('vimeo',  array( $this,'vimeo_func'));   /* - */
	add_shortcode('youtube',  array( $this,'youtube_func'));   /* - */
	
	add_shortcode('space',  array( $this,'space_func')); /* - */
	add_shortcode('clear',  array( $this,'clear_func'));  /* - */
	add_shortcode('left',  array( $this,'left_func'));  /* - */
	add_shortcode('right',  array( $this,'right_func'));  /* - */
	add_shortcode('center',  array( $this,'center_func'));  /* - */
	
} 


function heading1_func($atts, $content) {$func_output=''; $class=''; $light='no'; $light = $atts['light_style']; if($light=="yes"){$class="light";}
$func_output.='<h1 class="'.$class.'">'.do_shortcode($content).'</h1>';return $func_output;}
function heading2_func($atts, $content) {$func_output=''; $class=''; $light='no'; $light = $atts['light_style']; if($light=="yes"){$class="light";}
$func_output.='<h2 class="'.$class.'">'.do_shortcode($content).'</h2>';return $func_output;}
function heading3_func($atts, $content) {$func_output=''; $class=''; $light='no'; $light = $atts['light_style']; if($light=="yes"){$class="light";}
$func_output.='<h3 class="'.$class.'">'.do_shortcode($content).'</h3>';return $func_output;}
function heading4_func($atts, $content) {$func_output=''; $class=''; $light='no'; $light = $atts['light_style']; if($light=="yes"){$class="light";}
$func_output.='<h4 class="'.$class.'">'.do_shortcode($content).'</h4>';return $func_output;}
function heading5_func($atts, $content) {$func_output=''; $class=''; $light='no'; $light = $atts['light_style']; if($light=="yes"){$class="light";}
$func_output.='<h5 class="'.$class.'">'.do_shortcode($content).'</h5>';return $func_output;}
function heading6_func($atts, $content) {$func_output=''; $class=''; $light='no'; $light = $atts['light_style']; if($light=="yes"){$class="light";}
$func_output.='<h6 class="'.$class.'">'.do_shortcode($content).'</h6>';return $func_output;}


function section_func($atts, $content){
	global $flv_section;$flv_section++;
	
/* general */
$wide="no";   if(isset($atts['wide']) && $atts['wide']=="yes")   $wide="yes"; 
$height="";   if(isset($atts['height']))   $height=$atts['height']; 
/* background */
$border_color=""; if(isset($atts['border_color']))   $border_color=$atts['border_color']; 
$bg_color=""; if(isset($atts['bg_color']))   $bg_color=$atts['bg_color']; 

$over_color=""; if(isset($atts['overlay_color']))   $over_color=$atts['overlay_color']; 
$overlay_opacity="0.95"; if(isset($atts['overlay_opacity']))   $overlay_opacity=$atts['overlay_opacity']; 

$text_color=""; if(isset($atts['text_color']))   $text_color=$atts['text_color']; 
$stretch_bg="no";   if(isset($atts['stretch_bg']) && $atts['stretch_bg']=="yes")   $stretch_bg="yes"; 
$bg_image=""; if(isset($atts['bg_image']))   $bg_image=$atts['bg_image']; 
if(is_numeric($bg_image)){$bg_image= wp_get_attachment_image_src($bg_image,"full");$bg_image=$bg_image[0];}
$bg_img_width=""; if(isset($atts['bg_image_width']))   $bg_img_width=$atts['bg_image_width']; 
$bg_img_height=""; if(isset($atts['bg_image_height']))   $bg_img_height=$atts['bg_image_height']; 
$bg_img_repeat=""; if(isset($atts['bg_image_repeat']))   $bg_img_repeat=$atts['bg_image_repeat']; 

$func_output='';

$func_output.='<style scoped>';
if($text_color!=''){$func_output.=".home_section_".$flv_section." .row,.home_section_".$flv_section.",.home_section_".$flv_section." p{color:".$text_color." !important;}";}
if($over_color!=''){$func_output.=".home_section_".$flv_section.":before {background: ".$over_color."; 
content: '';width: 100%;height: 100%;position: absolute;top: 0;opacity: ".$overlay_opacity.";z-index: -1;}";}
$func_output.='</style>';

$extraclass="";if( $bg_image!=''){$extraclass="coloured_wrapper";}
if($stretch_bg=="yes" && $bg_image!=''){
$func_output.='<script type="text/javascript">jQuery(document).ready(function(){jQuery(".home_section_'.$flv_section.'").backstretch("'.$bg_image.'");});</script>';
}

$func_output.='<div class="home_section_'.$flv_section.' scroll_section '.$extraclass.'" ';
$func_output.="style='";
if($text_color!=''){$func_output.="color:".$text_color." !important;";}
if($bg_color!=''){$func_output.="background-color: ".$bg_color.";";}
if($border_color!=''){$func_output.="border: solid 1px ".$border_color.";";}
if($height!=''){$func_output.="height:".$height."px;overflow:hidden;";}
if($bg_image!=''){$func_output.="background-image:url(".$bg_image.");";$func_output.="background-repeat:".$bg_img_repeat.";";}
if($stretch_bg=="yes"){$func_output.="background-attachment:fixed;";}
if($bg_img_width!="" || $bg_img_height!=""){$func_output.="backgrpund-size:".$bg_img_width." ".$bg_img_height."";}
$func_output.="'";
$func_output.='>';
if($wide!="yes"){$func_output.='<div class="container"><div class="row">';}
$func_output.=do_shortcode($content);
if($wide!="yes"){$func_output.='</div></div>';}
$func_output.='</div>';

    return $func_output;
}

function space_func($atts, $content) {$func_output=''; $size= 20;    if(isset($atts['size']) && $atts['size']!='')  $size = $atts['size'];$func_output.='<div class="gap_'.$size.'"></div>';return $func_output;}

function clear_func($atts, $content) {$func_output='';$func_output.='<div class="row"></div>';return $func_output;}

function left_func($atts, $content) {global $l_buffer;$func_output='';$class='';if(isset($atts['class'])){$class=$atts['class'];}$func_output.='<div class="'.$class.' alignleft">';$func_output.=do_shortcode($content);$func_output.='</div>';$l_buffer+=0.5;return $func_output;}

function right_func($atts, $content) {global $l_buffer;$func_output='';$class='';if(isset($atts['class'])){$class=$atts['class'];}$func_output.='<div class="'.$class.' alignright">';$func_output.=do_shortcode($content);$func_output.='</div>';$l_buffer+=0.5;return $func_output;}

function center_func($atts, $content) {global $l_buffer;$func_output='';$class='';if(isset($atts['class'])){$class=$atts['class'];}$func_output.='<div class="'.$class.' action-container center aligncenter">';$func_output.=do_shortcode($content);$func_output.='</div>';$l_buffer+=0.5;return $func_output;}


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ progress_bar_func ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 

function progress_bar_func($atts, $content) {
	
$color='white';if(isset($atts['color']))$color=$atts['color'];
$percent='65';if(isset($atts['percent']))$percent=$atts['percent']; 

$text_color='text_darkGrey';
if($color=='white')$text_color='text_darkGrey';
elseif($color=='red')$text_color='text_red';
elseif($color=='orange')$text_color='text_orange';
elseif($color=='yellow')$text_color='text_yellow';
elseif($color=='lime')$text_color='text_lime';
elseif($color=='green')$text_color='text_green';
elseif($color=='teal')$text_color='text_teal';
elseif($color=='blue')$text_color='text_blue';
elseif($color=='purple')$text_color='text_purple';
elseif($color=='pink')$text_color='text_pink';
elseif($color=='grey')$text_color='text_grey';
elseif($color=='black')$text_color='text_darkGrey';

$func_output='';
$func_output.='<h5>'.$content.'</h5>
					<div class="meter">
						<h4 class="light '.$text_color.'"></h4>
						<span class="'.$color.'" title="'.$percent.'%"></span>
					</div>';
return $func_output;
}
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ bx_slider ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    function bx_slider_func($atts, $content){
    	global $fialovy_bx_slider_nr;   	$fialovy_bx_slider_nr++;
	$func_output='';
	
	$source="default";if(isset($atts['source']) && $atts['source']!='') $source = $atts['source'];
	$number=5;if(isset($atts['number'])) $number = $atts['number'];
	$order="asc";if(isset($atts["order"])) $order = $atts['order'];
	
	$wide='no';	if(isset($atts['wide']) && $atts['wide']!='') $wide = $atts['wide'];
	
	$width='auto';	if(isset($atts['width']) && $atts['width']!='') $width = $atts['width'];
	$height='auto';	if(isset($atts['height']) && $atts['height']!='') $height = $atts['height'];
	
	 $mode = 'fade';    if(isset($atts['mode']) && $atts['mode']!='')  $mode = $atts['mode'];
	 $easing = 'easeInSine';    if(isset($atts['easing']) && $atts['easing']!='')  $easing = $atts['easing'];
	 $speed = 1000;    if(isset($atts['speed']) && $atts['speed']!='')  $speed = $atts['speed'];
	 $randomStart = 'false';    if(isset($atts['randomStart']) && $atts['randomStart']=='yes')  $randomStart = 'true';
	 $controls = 'false';    if(isset($atts['controls']) && $atts['controls']=='yes')  $controls = 'true';
	 $auto = 'true';    if(isset($atts['auto']) && $atts['auto']=='no')  $auto ='false';
	 $pause = 3500;    if(isset($atts['pause']) && $atts['pause']!='')  $pause = $atts['pause'];
	 $autoStart = 'true';    if(isset($atts['autoStart']) && $atts['autoStart']=='no')  $autoStart = 'false';
	 $autoDirection = 'next';    if(isset($atts['autoDirection']) && $atts['autoDirection']!='')  $autoDirection = $atts['autoDirection'];
	 $autoHover = 'true';    if(isset($atts['autoHover']) && $atts['autoHover']=='no')  $autoHover = 'false';
	 $pager= 'false'; if(isset($atts['pager']) && $atts['pager']=='yes')  $pager = 'true';
	 
	 
	$func_output.='<ul id="bx_slider_'.$fialovy_bx_slider_nr.'" class="bxslider"  style="display:none;">';
	if($source=="default"){
	$content2=preg_replace("/<br\W*?\/>/", "", $content);
	$content=do_shortcode($content2);
	$func_output.=$content;
	}elseif($source=="post"){
	
$args= array(  'post_type' => $source,'numberposts'     => $number,'orderby' => $order ) ;
$myposts = get_posts( $args );
$i=0;	
foreach( $myposts as $post ) :  setup_postdata($post); 
	$i++;
    $postid = $post->ID;
    $aux = (wp_get_attachment_image_src( get_post_thumbnail_id($postid),'large'));
    $meta_bigimage = get_post_meta($postid, 'flv_bigimage', true);
    if($meta_bigimage==''||$meta_bigimage=='css/bigimage.jpg') $meta_bigimage  =$aux[0]; 
	 $format = get_post_format($postid);
	 $topost='';
	 $topost=get_permalink( $postid );
	if($format=="quote"){
		$quote =  get_post_meta($postid, 'swag_quote', true);     
	 $func_output.='<li><a href="'. $topost.'"><div style="width:60%;height:60%;margin-left:auto;margin-top:20%;"><blockquote>'.$quote.'</blockquote></div></a></li>';	
	 }
	 elseif($format=="video"){
	 	$videotype= get_post_meta($postid, 'swag_video_select', TRUE); 
		 if($videotype != 'custom') {
			$ids= get_post_meta($postid, 'swag_video_id', false,true);
			$videotype= get_post_meta($postid, 'swag_video_select', TRUE);
				if (isset($ids[0]) && $ids[0] != '') 
				if ($videotype == "vimeo")
					$func_output.= '<li><div><iframe src="http://player.vimeo.com/video/' . $ids[0] . '"  style="height:'.$height.'px;width:'.$width.'px;" class="no-wrapper" ></iframe></div></li>';
				else
					$func_output.='<li><div><iframe src="http://www.youtube.com/embed/' . $ids[0] . '" style="height:'.$height.'px;width:'.$width.'px;" class="no-wrapper" ></iframe></div></li>';
               } 
	 }
	elseif($format=="gallery"){
	$images_gallery = get_post_meta($postid, 'swag_galleryl', true);$images=explode(", ", $images_gallery);
	if(count($images)>0)
	$img=str_replace ('"','',$images[0]);else $img=$meta_bigimage;
	$func_output.='<li><a href="'. $topost.'"><img src="'.$img.'" alt="' . $post->post_title . '" title="' . $post->post_title . '" style="min-width:'.$width.'px; height:'.$height.'px;" /></a></li>';
   }
else
	{
	if($aux[0]!=''){
	$func_output.='<li><a href="'. $topost.'"><img src="'.$meta_bigimage.'" alt="' . $post->post_title . '" title="' . $post->post_title . '" style="min-width:'.$width.'px; height:'.$height.'px;" /></a></li>';
	}
}
endforeach; wp_reset_postdata(); 	
	}
	$func_output.='</ul>';
	

	
	$func_output.="<script>jQuery(window).load(function () {
		if(jQuery.isFunction(jQuery.fn.bxSlider)) {
		jQuery('ul#bx_slider_".$fialovy_bx_slider_nr."').show();
		jQuery('ul#bx_slider_".$fialovy_bx_slider_nr."').bxSlider({
		mode: '".$mode."',  //'horizontal', 'vertical', 'fade'
		useCSS: false,
  		easing: '".$easing."',
		speed: ".$speed.",
		randomStart: ".$randomStart.",
		controls: ".$controls.",
		nextText: '',
		prevText: '',
		auto: ".$auto.",
		pause: ".$pause.",
		pager: ".$pager.",
		autoStart: ".$autoStart.",
		autoDirection: '".$autoDirection."',
		autoHover: ".$autoHover."
	});}});</script>";
			
		return $func_output;
	}	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ bx_slide ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
   
    function bx_slide_func($atts2, $content2){
	$foutput='';	
	$img='';
    $msg = '';
    $desc = '';
   // if(isset($atts2['image_url']))  $img = $atts2['image_url'];
	
	 $img='';if(isset($atts2['image_url']))   $img = $atts2['image_url'];
if(is_numeric($img) &&  $img!=''){$img= wp_get_attachment_image_src($img,"full");$img=$img[0];}


   
	$foutput.='<li style="background-image:url('.$img.');">';
	$foutput.='<div class="container">';
	 if($content2)
	$foutput.=do_shortcode($content2);
	$foutput.='</div>';
	$foutput.='</li>';
    return $foutput;

	}
	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ sudo_slider ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  


function sudo_slider_func($atts, $content2) {
global $fialovy_sudo_slider_nr;     $fialovy_sudo_slider_nr++;

	 $speed=1250;    if(isset($atts['speed']) && $atts['speed']!='')  $speed= $atts['speed'];
	 $numeric="false";    if(isset($atts['numeric']) && $atts['numeric']!='no')  $numeric="true";
	 $controlsFade="false";    if(isset($atts['controlsFade']) && $atts['controlsFade']!='no')  $controlsFade="true";
	 $responsive="true";    if(isset($atts['responsive']) && $atts['responsive']!='yes')  $responsive="false";
	 $auto="true";    if(isset($atts['auto']) && $atts['auto']!='yes')  $auto="false";
	 
	 $continuous="true";    if(isset($atts['continuous']) && $atts['continuous']!='yes')  $continuous="false";
	 $effect="slide";    if(isset($atts['effect']) && $atts['effect']!='')  $effect= $atts['effect'];

	$func_output2='';
	$func_output2.='<div id="slider-'.$fialovy_sudo_slider_nr.'" class="flv_sudo">
		<ul class="text_center">';	
	$func_output2.=do_shortcode($content2);
	$func_output2.='</ul>';
	$func_output2.='</div>
		</div>
		
		<script>jQuery(document).ready(function () {
	var sudoSlider = jQuery("#slider-'.$fialovy_sudo_slider_nr.'").sudoSlider({
			effect:"'.$effect.'", 
			continuous:'.$continuous.',
			   numeric: '.$numeric.',
			   responsive: '.$responsive.',
			   controlsFade: '.$controlsFade.',
			   auto: '.$auto.',
			   speed: '.$speed.'  });
	        jQuery(".prevBtn, .nextBtn, #slider-'.$fialovy_sudo_slider_nr.'").hover( function () {    jQuery(".prevBtn, .nextBtn").stop().fadeTo(200, 1);       },        function () {           jQuery(".prevBtn, .nextBtn").stop().fadeTo(200, 0);}  );
	        jQuery(".prevBtn, .nextBtn").stop().fadeTo(0, 0);
});</script>';


	return $func_output2;
}
	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ sudo_slide ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  

function sudo_slide_func($atts, $content) {
	
global $fialovy_sudo_slide_nr;     $fialovy_sudo_slide_nr++;

 $image='';if(isset($atts['image']))   $image = $atts['image'];
if(is_numeric($image) &&  $image!=''){$image= wp_get_attachment_image_src($image,"full");$image=$image[0];}
	
$func_output='';

if($image!=''){$func_output.='<li style="background-image: url('.$image.')">';}else{$func_output.='<li>';}

$func_output.='<div class="container">'.do_shortcode($content).'</div></li>';
					
    return $func_output;
}

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ testimonial_slider ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  


function testimonial_func($atts, $content2) {
	 global $fialovy_testimonial_slider_nr;
     $fialovy_testimonial_slider_nr++;

	$func_output2='';
	
	$func_output2.='<div class="testimonial_slider" id="testimonial_slider_'.$fialovy_testimonial_slider_nr.'">
					<div class="boxed">	<div>		
			'.do_shortcode($content2).'
			</div></div>
			<ul class="row testimonial_slider_container">
			</ul>
			</div>
		';

	return $func_output2;
}
	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ testimonial_slide ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  

function testimonial_slide($atts, $content) {
	global $fialovy_testimonial_slide_nr;     $fialovy_testimonial_slide_nr++;
    $msg = '';
    $name = '';
	$desc = '';
    $image='';
	$url="#";
    if(isset($atts['image']))   $image = $atts['image'];
	if(isset($atts['message']))   $msg = $atts['message'];
    if(isset($atts['name']))  $name = $atts['name'];
	if(isset($atts['description']))  $desc = $atts['description'];
	if(isset($atts['url']))  $url = $atts['url'];
	
if(is_numeric($image) &&  $image!=''){$image= wp_get_attachment_image_src($image,"full");$image=$image[0];}
$extra_class='';	if($fialovy_testimonial_slide_nr==1)$extra_class="offset3";
$func_output='';
$func_output.='
<div id="testimonial_'.$fialovy_testimonial_slide_nr.'C">
<p>'.$msg.'</p>
</div>
<li class="col one_sixth '.$extra_class.' to_testimonial_slider_container" id="testimonial_'.$fialovy_testimonial_slide_nr.'">
								<div class="point"></div>
								<img src="'.$image.'" alt="" class="avatar"/>
								<header class="avatar_title">
									<h5>'.$name.'<span><a href="'.$url.'">'.$desc.'</a></span></h5>
								</header>
							</li>';
							
    return $func_output;
}


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ contact_form ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 
  
 
function contactform_func($atts) {
	
	$ymaill='';
if(isset($atts['to_email'])) $ymaill=$atts['to_email'];
$message=get_option_tree("success_msg","",false); 
	

 $func_output='';
$url = get_site_url();
$pageURL="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$val=get_option_tree('contact_fields','',false,true);
$fields=array();
if(count($val) >= 1){$fields=$val;}


	 if((isset($emailSent) && $emailSent == true))
		{$func_output.='<div class="notice confirmation">'.$message.'<span></span></div>';}
	 else{

$blog_name = $_SERVER['HTTP_HOST'];
    $func_output.='<div class="flvcontactform form-inner-container contact-form-container">
    <form id="commentform" method="post" name="contact"  class="contact-form">
    <input type="text" name="to_email" id="to_email" value="'.$ymaill.'" style="display:none;" role="input"/>
    <input type="text" name="blog_name" id="blog_name" value="'.$blog_name.'" style="display:none;" role="input"/>';
	$func_output.='<input placeholder="'.__("Your name here...", 'torque').'" tabindex="1" id="name" type="text" value="" name="sendername" class="flvname"/>'; 
	$func_output.='<input placeholder="'.__("Your email here...", 'torque').'" tabindex="2"  id="email" type="text" value="" name="email" class="flvemail"/>';
	$func_output.='<input placeholder="'.__("Subject here...", 'torque').'" tabindex="3"  id="organisation" type="text" value="" name="organisation"  class="flvorg"/>';
	$func_output.='<textarea placeholder="'.__("Message", 'torque').'" tabindex="5"  rows="7" id="message" name="message" class="flvmessage"></textarea>';
	$func_output.='<br/><input type="submit" value="Send the message"  name="flvcontact" id="submit" class="btn btn_color medium submit flvsubmit"/>
<input type="hidden" name="flv_submitted" id="flv_submitted" value="true" />';
 
  $func_output.='</form></div>';
   }
   return $func_output;

}
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ subscription_form ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 
  
    function subscription_form_func($atts, $content) {
        $func_output = '';
		$email_address='';   if(isset($atts["email_address"])) $email_address = $atts["email_address"];
		
		 $func_output.= '
		 <form id="commentform" class="newsletter intro-form-wrap" method="post">
		 <input type="text" name="news_address" id="news_address" value="'.$email_address.'" style="display:none;" role="input"/>
		<input type="text"  name="email" placeholder="'.__("Your email address here...","torque").'" id="news_email" aria-required="true" required>
		 <input type="text" id="fname" name="fname" placeholder="'.__("Your first name...","torque").'" aria-required="true" required>
		 <input type="text" id="lname" name="lname" placeholder="'.__("Your last name...","torque").'"  aria-required="true" required>
		<input type="submit" value="Send the message"  id="submit_mail" class="btn btn_color medium">
		<input type="hidden" name="submitted_news" id="submitted_news" value="true" />
							</form>';

		 return $func_output;
	}

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ search form ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 
 
 function search_func($atts, $content){
 	$fout='';
	$fout='<div class="search-form">
            	<form role="search"  method="get" action="'.esc_url( home_url( '/' ) ) .'">
             		<div class="form-group">
               		<input type="text" class="form-control" placeholder="'.esc_attr_x( "Search here...", "placeholder", "_s" ) .'"  value="'. esc_attr( get_search_query()).'" name="s"  title="'.esc_attr_x( "Search for:", "label", "_s" ).'">
             		</div>
            		</form>
          	</div>';
	return $fout;
 }




/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ blog list ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function blog_list_func($atts, $content) {
    $func_output='';

	$orderby='date';if(isset($atts['orderby']))$orderby=$atts['orderby'];
	$order='desc';if(isset($atts['order']))$order=$atts['order'];
	$number=4;if(isset($atts['number']))$number=$atts['number'];
	$exce=100;if(isset($atts['excerpt_length']))$exce=$atts['excerpt_length'];
//GET the posts
	
$myposts = get_posts(array('orderby' => $orderby,'numberposts' =>$number,'order'=>$order));

$infos=array();	if(ot_get_option('posts_fields','')) { $infos=ot_get_option('posts_fields','');}

 foreach($myposts as $po){
 	$link= get_permalink($po->ID);
	$title=$po->post_title;
$gal_nr=rand();	
$func_output.='<div class="col one_quarter">
					<article class="boxed_post">';

$icon='link';	$class=''; $lightbox= get_post_meta($po->ID, 'dbt_image_lightbox'); if(isset($lightbox[0]) && $lightbox[0]=="yes"){
$image = wp_get_attachment_image_src( get_post_thumbnail_id($po->ID), 'single-post-thumbnail' ); $url= $image[0];	$icon='search';	$class='fancybox';}else{	$url=get_the_permalink();	$icon='link';}
	
$show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}	
$format = get_post_format( $po->ID );

if($format=="gallery"){
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
	$images_gallery = get_post_meta($po->ID, 'dbt_post_gallery', true);
				$gal_nr++;
				$gals[$gal_nr]=substr(str_replace(", ","",$images_gallery), 0, -1);
			    $pieces = explode('"', $gals[$gal_nr]);
				$func_output.='<a class="boxed_img manual'.$gal_nr.'"  title="'.__(get_the_title($po->ID)).'" href="javascript:;">';	
				$func_output.='<script type="text/javascript">jQuery(document).ready(function($) {
				jQuery(".manual'.$gal_nr.'").click(function() {	jQuery.fancybox([';
					for($h =0;$h<count($pieces);$h++)	if($h%2!=0)	if($h==count($pieces)-1)
					$func_output.="'".$pieces[$h]."'";
					else
					$func_output.="'".$pieces[$h]."', ";
				$gals[$gal_nr].
				$func_output.='], {"padding"		: 0,"transitionIn"		: "none","transitionOut"		: "none","type"              : "image","changeFade"        : 0		});});});</script>';
		
		$func_output.=get_the_post_thumbnail($po->ID,"blog_small",  array('alt' => get_the_title($po->ID)));
		$func_output.='<div class="img_overlay"><i class="fa fa-search"></i></div>
		</a>';
		}	
		
}elseif($format=="video"){
if(isset($show_featured[0]) && $show_featured[0]!='yes') {
		$func_output.='<div class="boxed_img"><div class="video">';
		$videotype= get_post_meta($po->ID, 'dbt_video_select', false,true);
		$ids= get_post_meta($po->ID, 'dbt_post_video_id', false,true);
		if (isset($ids[0]) && $ids[0] != '') 
		{
		if ($videotype[0] == "vimeo" || $videotype == "vimeo"){$func_output.='<iframe  style="margin-bottom:-6px !important;width:100%;max-height:100%;min-height:250px;" src="http://player.vimeo.com/video/' . $ids[0] . '"  class="post-slider-border  generalframe "></iframe>'; }
		else {
		$func_output.='<iframe  style="margin-bottom:-6px !important;width:100%;max-height:100%;min-height:250px;" src="http://www.youtube.com/embed/' . $ids[0] . '?wmode=transparent"  class="post-slider-border  generalframe "></iframe>';
		   }
		}
		$func_output.='</div></div>';	
		}
				
}else{
 	if (has_post_thumbnail($po->ID)) {
		$show_featured='yes';	if(ot_get_option('featured_image_disp','')){	$show_featured=ot_get_option('featured_image_disp','');}
		if(isset($show_featured[0]) && $show_featured[0]!='yes') {
		$func_output.='<a class="boxed_img '.$class.'" href="'. $url.'">'.get_the_post_thumbnail($po->ID,"blog_small",  array('alt' => get_the_title($po->ID)));
		} 
		$func_output.='<div class="img_overlay"><i class="fa fa-'.$icon.'"></i></div></a>';
 } 	}
 	


$func_output.='<div class="boxed_post_wrap">
							<header>';					

$grav_url=get_bloginfo('template_directory') . '/img/avatar/62x62_deaulft.jpg';
	if(get_the_author_meta('user_email',$po->post_author)){
	    
		  $func_output.= get_avatar(  get_the_author_meta('user_email',$po->post_author), $size = '62', $default = $grav_url); 
	}
	else{
		  $func_output.="<img width='62' height='62' class='avatar' src=".$grav_url." />";
	}

  
	
$func_output.='<h5><a href="'.$link.'">'.get_the_title($po->ID).'</a></h5>';
$excerpt = $po->post_content; $excerpt = strip_tags($excerpt);
 if( strlen($excerpt)>$exce){  $excerpt = substr($excerpt, 0, $exce);  $excerpt = substr($excerpt, 0, strripos($excerpt, " ")); $excerpt = $excerpt.'...';$func_output.='<p>'.strip_shortcodes($excerpt).'</p>';	  }else{  $func_output.='<p>'.strip_shortcodes($po->post_content).'</p>';	  }
$func_output.='</header><ul class="meta">';
 
 if(isset($infos) && !in_array("date",$infos)){  
	$func_output.='<li class="date"><i class="fa fa-clock-o"></i><span>'.get_the_time("d M",$po->ID).'</span></li>';

 }

 if(  isset($infos) && !in_array("comments_number",$infos) && comments_open($po->ID)){
 		$func_output.='<li><a  href="'.$link.'#flv_comment"><i class="fa fa-comments"></i><span>';
		$comm_nr=get_comments_number($po->ID);	$func_output.=$comm_nr;
		$func_output.='</span></a></li>'; } 
  
if(  isset($infos) && !in_array("likes",$infos) ){ 
 $func_output.=' <script>
		function increase_likes'.$po->ID.'(id) {
		var ceva='.$po->ID.'; 
		jQuery.ajax({  type: "POST",
		     url: "'.THEME_URL .'inc/functions-custom-like.php",
		    data: "id="+ceva,
		    success: function(response){jQuery("#nr_likes_'.$po->ID.' span").html(response);   } });	 }
		</script>';
	$func_output.='<li><a  id="nr_likes_'.$po->ID.'"  onClick="increase_likes'.$po->ID.'(nr_likes_'.$po->ID.');" href="javascript:;"><i class="fa fa-thumbs-up"></i><span>'.torque_getPostLikes($po->ID).'</span></a></li>'; 
 } 
	
	$func_output.='</ul>
						</div>
					</article>
				</div>';
	
}
	
 return $func_output;
 }


function hr_func($atts, $content) {

$func_output='';
 $func_output.='<hr class="gap_35">';
return $func_output;
}


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ service_icon ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 


function service_icon_func($atts, $content) {
global $service_counter;
$class='';if(isset($atts['type']))$class=$atts['type'];
$urll='';if(isset($atts['url']))$urll=$atts['url']; 
$target='self';if(isset($atts['target']))$target=$atts['target']; 
$title='';if(isset($atts['title']))$title=$atts['title']; 
$style='style1';if(isset($atts['style']))$style=$atts['style']; //stle1 // stle2 // stle3
$icon_effect="none";if(isset($atts['icon_effect']))$icon_effect=$atts['icon_effect'];
$ex_class='';if($icon_effect=="spin"){$ex_class="fa-spin";}


$func_output='';
if($style=='style1'){
	 if($urll!='') $func_output.='<a href="'.$urll.'"  target="'.$target.'">';
	$func_output.='<div class="features">
						<div class="feature_icon">
							<i class="fa fa-'.$class.' '.$ex_class.'"></i>
						</div>
						<h5>'.$title.'</h5>
						<p>'.do_shortcode($content).'</p>
					</div>';
	  if($urll!='') $func_output.='</a>';
}elseif($style=='style2'){

$func_output.='<div class="features"><div class="boxed"><div>
							<div class="feature_icon">
								<i class="fa fa-'.$class.' '.$ex_class.'"></i>
							</div>
							<h5>'.$title.'</h5>
							<p>'.do_shortcode($content).'</p>';
	if($urll!=''){$func_output.='<a href="'.$urll.'"  target="'.$target.'"><h6>'.__('Read More','torque').'</h6></a>';}
	$func_output.='</div></div></div>';
}else{
 	if($urll!='') $func_output.='<a href="'.$urll.'"  target="'.$target.'">';
$func_output.='<div class="features_pushed fa-'.$class.' '.$ex_class.'">
						<h5>'.$title.'</h5>
						<p>'.do_shortcode($content).'</p>
					</div><div class="gap_20"></div>';	
 	 if($urll!='') $func_output.='</a>';
  
}
return $func_output;
} 
 /*--------------------------------------------------------------------------------------
    *
    * vimeo
    *
    *-------------------------------------------------------------------------------------*/

function vimeo_func($atts) {
    global $l_buffer;
    $func_output='';
$aut=0;
$hd=0;
    if(isset($atts['width'])) $w=$atts['width'];
    if(isset($atts['height'])) $h=$atts['height'];
	if(isset($atts['autoplay']) && $atts['autoplay']=="yes") $aut=1;
	if(isset($atts['hd']) && $atts['hd']=="yes") $hd=1;
	$vids='';
	if(!isset($atts['width']))
	$vids='vids';
if(isset($atts['width']) && isset($atts['height']))
    {$func_output.='<div class="movie_contaner" style="margin-bottom:-6px;width:'.$w.'px;max-height:'.$h.'px;"><iframe style="width:100%;max-height:100%;" src="http://player.vimeo.com/video/'.$atts['id'].'?title=0&amp;byline=0&amp;portrait=0&amp;autoplay='.$aut.'';
    if($hd==1)
	 $func_output.='&amp;hd_off=0';
     $func_output.='" width="'.$w.'" height="'.$h.'" ></iframe></div>';}
else
	{$func_output.='<iframe class="'.$vids.'" style="margin-bottom:-6px !important;width:100%;max-height:100%;min-height:250px;" src="http://player.vimeo.com/video/'.$atts['id'].'?title=0&amp;byline=0&amp;portrait=0&amp;autoplay='.$aut.'';
 if($hd==1)
  $func_output.='&amp;hd_off=0';
  $func_output.='" ></iframe>';
	}
    return $func_output;
}

 /*--------------------------------------------------------------------------------------
    *
    * youtube
    *
    *-------------------------------------------------------------------------------------*/

function youtube_func($atts) {
    global $l_buffer;
    $func_output='';
$aut=0;
$hd=0;
    if(isset($atts['width'])) $w=$atts['width'];
    if(isset($atts['height'])) $h=$atts['height'];
	if(isset($atts['autoplay']) && $atts['autoplay']=="yes") $aut=1;
	if(isset($atts['hd']) && $atts['hd']=="yes") $hd=1;
		$vids='';
	if(!isset($atts['width']))
	$vids='vids';
	
	if(isset($atts['width']) && isset($atts['height']))
    {$func_output.='<div class="movie_contaner" style="margin-bottom:-6px;width:'.$w.'px;max-height:'.$h.'px;"><iframe style="width:100%;max-height:100%;"  src="http://www.youtube.com/embed/'.$atts['id'].'?autoplay='.$aut.'';
    if($hd==1)
    $func_output.='&amp;hd='.$hd.'';
    $func_output.='"  width="'.$w.'" height="'.$h.'" allowfullscreen></iframe></div>';
	}else{
	 $func_output.='<iframe   style="margin-bottom:-6px !important;width:100%;max-height:100%;min-height:250px;" class="'.$vids.'" src="http://www.youtube.com/embed/'.$atts['id'].'?autoplay='.$aut.'';
	 if($hd==1)
    $func_output.='&amp;hd='.$hd.'';
    $func_output.='"  allowfullscreen></iframe>';
	 }
	//$func_output.='<div style="width:'.$w.';height:'.$h.';"><object width="'.$w.'" height="'.$h.'"><param name="movie" value="http://www.youtube.com/v/'.$atts['id'].'?version=3&amp;hl=en_US"></param><param name="wmode" value="transparent"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'.$atts['id'].'?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="'.$w.'" height="'.$h.'" allowscriptaccess="always" wmode="transparent" allowfullscreen="true"></embed></object></div>';

    return $func_output;


}
/*--------------------------------------------------------------------------------------
    *
    * tooltip
    *
    *-------------------------------------------------------------------------------------*/

 function tooltip_func($atts, $content){
   $fout='';

	$title=''; if(isset($atts["title"]))$title= $atts["title"];//basic / light / colored
	$url='#'; if(isset($atts["url"]))$url= $atts["url"];

	
	$fout.=' <a href="'.$url.'" title="'.$title.'" class="tooltip"><span>'.do_shortcode($content).'</span></a>';
    return $fout;
    }
 
  /*--------------------------------------------------------------------------------------
    *
    * message_box_func
    *
    *-------------------------------------------------------------------------------------*/

 function message_box_func($atts, $content){
   $fout='';

	$type='default'; if(isset($atts["type"]))$type= $atts["type"];
	$title=''; if(isset($atts["title"]))$title= $atts["title"];
$class='';
if($type=="default"){$class='';}
elseif($type=="success"){$class='alert_success';}
elseif($type=="error"){$class='alert_error';}
elseif($type=="warning"){$class='alert_warning';}
elseif($type=="info"){$class='alert_info';}

	$fout.='<div class="alert_box '.$class.'">
						<a href="#" class="close"><i class="fa fa-times"></i></a>
						<p><span>'.$title.'</span> '.do_shortcode($content).'</p>
					</div>';
    return $fout;
    }
 /*--------------------------------------------------------------------------------------
    *
    * single_testimonial
    *
    *-------------------------------------------------------------------------------------*/

 function single_testimonial_func($atts, $content){
   $fout='';

	$url='#'; if(isset($atts["url"]))$url= $atts["url"];
	$name=''; if(isset($atts["name"]))$name= $atts["name"];
	$desc=''; if(isset($atts["description"]))$desc= $atts["description"];
	$image=""; if(isset($atts['image']))   $image=$atts['image']; 
if(is_numeric($image)){$image= wp_get_attachment_image_src($image,"full");$image=$image[0];}

	$fout.=' <div class="testimonial_single">
						<div class="quote boxed"><div>
							<p>'.do_shortcode($content).'</p>
						</div></div>
						<div class="quoter">
							<img src="'.$image.'" alt="" class="avatar"/>
							<header class="avatar_title">
								<h5>'.$name.'<span><a href="'.$url.'">'.$desc.'</a></span></h5>
							</header>
						</div>
					</div>';
    return $fout;
    }
  /*--------------------------------------------------------------------------------------
    *
    * blockquote
    *
    *-------------------------------------------------------------------------------------*/

 function blockquote_func($atts, $content){
   $fout='';
   $type='';
	$style=''; if(isset($atts["style"]))$style= $atts["style"];//basic / light / colored
	$class=''; if(isset($atts["class"]))$class= $atts["class"];
	if($style=='style1')$type='alt';
	elseif($style=='style2')$type='alt1';
	elseif($style=='style3')$type='alt2';
	elseif($style=='style4')$type='alt3';
	
	$fout.=' <blockquote class="'.$class.' '.$type.'">'.do_shortcode($content).'</blockquote>';
    return $fout;
    }
 
  /*--------------------------------------------------------------------------------------
    *
    * dropcap
    *
    *-------------------------------------------------------------------------------------*/

 function dropcap_func($atts, $content){
    $fout='';
	$color=''; if(isset($atts["style"]))$color= $atts["style"]; //basic / color / square / circle
	$style='';
	if($color=="basic") $style='dropcap text_darkGrey';
	elseif($color=="square") $style='dropcap_alt';

	
	$fout.='<span class="flv_dropcap '.$style.' ">'.do_shortcode($content).'</span>';
    return $fout;
    }
 /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ google_map ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 

function google_map_func($atts, $content) {
	global $flv_map_nr;
    $flv_map_nr++;
    global $l_buffer;
    $func_output='';
	   extract( shortcode_atts( array(
		'lat' => 'something',
		'long' => 'somethinga',
		'class'=>'somethinga',
		'top'=>'something',
		'scroll'=>'something',
		'streetview'=>'something',
		'width'=>'something',
		'height'=>'something',
		 'zoom' => 'somethinga'
	), $atts ) );
	
	$latitude=$lat;
	$streetview="no";
	
	$longitude=$long;
        $w=395;
        $h=450;
		$class="";
		$id="";
		$top=0;
		$zoom=14;
		$scroll="true";
        if(isset($atts['width'])) $w=$atts['width'];
        if(isset($atts['height'])) $h=$atts['height'];
		 if(isset($atts['class']))$class=$atts['class'];
		  if(isset($atts['top']))$top=$atts['top'];
		 if(isset($atts['zoom']))$zoom=$atts['zoom'];
		  if(isset($atts['streetview']))$streetview=$atts['streetview'];
		 if(isset($atts['scroll']) and $atts['scroll']=="no")$scroll="false";
		  

if(isset($atts['width'])){
$func_output.="<div  class='map_google aligncenter  ".$class ."' style='width:".$w."px; height:".$h."px' id='map-".$flv_map_nr."'></div><div class='row'></div>";
$func_output.="<script>";
if($streetview=="yes"){
  $func_output.="function initialize".$flv_map_nr."() {
  var bryantPark = new google.maps.LatLng( ".$lat.",".$long.");
  var panoramaOptions = { scrollwheel:".$scroll.",  position: bryantPark,  pov: { heading: 165, pitch: 0 }, zoom: ".$zoom." };
  var myPano = new google.maps.StreetViewPanorama(    document.getElementById('map-".$flv_map_nr."'),   panoramaOptions);
  myPano.setVisible(true);}
google.maps.event.addDomListener(window, 'load', initialize".$flv_map_nr.");";
}else{
$func_output.="jQuery(window).load(function () {if ( jQuery.isFunction(jQuery.fn.gMap) ) {jQuery('#map-".$flv_map_nr."').gMap({scrollwheel:".$scroll.",  zoom:  ".$zoom.",markers: [{ latitude: ".$lat.", longitude: ".$long." }]  });} })";
	
}

$func_output.="</script>";	
}
else {
$func_output.="<div  class='map_google ".$class."' style='top:".$top."px;margin-bottom:0px;height:".$h."px' id='map-".$flv_map_nr."'></div>";
$func_output.="<script>";
if($streetview=="yes"){
  $func_output.="function initialize".$flv_map_nr."() {
  var bryantPark = new google.maps.LatLng( ".$lat.",".$long.");
  var panoramaOptions = { scrollwheel:".$scroll.",  position: bryantPark,  pov: { heading: 165, pitch: 0 }, zoom: ".$zoom."};
  var myPano = new google.maps.StreetViewPanorama(    document.getElementById('map-".$flv_map_nr."'),   panoramaOptions);
  myPano.setVisible(true);}
google.maps.event.addDomListener(window, 'load', initialize".$flv_map_nr.");";
}else{
$func_output.="jQuery(window).load(function () {if ( jQuery.isFunction(jQuery.fn.gMap) ) {jQuery('#map-".$flv_map_nr."').gMap({ scrollwheel:".$scroll.", zoom:  ".$zoom.",markers: [{ latitude: ".$lat.", longitude: ".$long." }]  });} })";	
}
$func_output.="</script>";	
}	
    $l_buffer+=0.5;
    return $func_output;
}
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ location_img ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 

function location_img_func($atts, $content) {
    global $l_buffer;
	global $loc_usage;$loc_usage++;

    $func_output='';
	   extract( shortcode_atts( array(
		'lat' => 'something',
		'long' => 'somethinga',
		'language' => 'somethinga',
               'width' => 'somethinga',
               'height' => 'somethinga',
                 'zoom' => 'somethinga'
	), $atts ) );
	
	$latitude=$lat;
	$longitude=$long;
        $w=395;
        $h=200;
		$zoom=14;
        if(isset($atts['width']))         $w=$atts['width'];
		if(isset($atts['zoom']))$zoom=$atts['zoom'];
        if(isset($atts['height']))            $h=$atts['height'];
		
   $chr= substr($w, -1, 1);   
  
   if($chr=="%") 
 {
$func_output.='<div class="map_google" style="width:'.$w.'; height:'.$h.'px;">';}
   else
$func_output.='<div class="map_google" style="width:'.$w.'px; height:'.$h.'px;">';  	

$func_output.='<object width="'.$w.'" height="'.$h.'" data="https://maps.google.com/maps?q='.$latitude.','.$longitude;
$func_output.='&amp;hl=';
if($language)
$func_output.=$language;
else
$func_output.='en';
$func_output.='&amp;ll='.$latitude.','.$longitude.'&amp;spn=0.013716,0.033023&amp;output=embed&amp;z='.$zoom.'"></object><br><small><a href="https://maps.google.com/maps?q='.$latitude.','.$longitude;
$func_output.='&amp;hl=';
if($language)
$func_output.=$language;
else
$func_output.='en';
$func_output.='&amp;ll='.$latitude.','.$longitude.'&amp;spn=0.013716,0.033023&amp;output=embed&amp;z='.$zoom.'"></a></small>';
	$func_output.='</div>';

    $l_buffer+=0.5;
    return $func_output;
}
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ pricing tables ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  

    

    function pricing_tables_group($atts, $content) {
        global $fialovy_pricing_tables_nr, $args_tab;
        $return = '';
        $fialovy_pricing_tables_nr ++;
		
		$currency="$";
		$time_period='/MONTH';
		$button_text='Sign Up';
		$items=3;
		
        if(isset($atts["currency"]) && $atts["currency"]!='')$currency = $atts["currency"];
        if(isset($atts["time_period"]) && $atts["time_period"]!='')$time_period = $atts["time_period"];
		if(isset($atts["button_text"]) && $atts["button_text"]!='')$button_text= $atts["button_text"];
		if(isset($atts["items_number"]) && $atts["items_number"]!='')$items = $atts["items_number"];
	
        $args_tab["currency"]=$currency;
		$args_tab["time_period"]=$time_period;
		$args_tab["button_text"]=$button_text;
        $args_tab["items"]=$items;
		
        $content = do_shortcode($content);
        
        $return.= '<div id="pricing_'.$fialovy_pricing_tables_nr.'" class="row pricing_container">' .  do_shortcode($content);
        $return.='</div>';
        return $return;
    }
  /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ table_primary ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  
 
    function table_primary_func($atts, $content){
        global $args_tab;
		$fout='';
		$title=''; if(isset($atts["title"])){$title= $atts["title"];}
		
        if($args_tab["items"]==4){  $fout.='<div class="col one_quarter">';	}
		elseif($args_tab["items"]==3){     $fout.='<div class="col one_third">';}
		elseif($args_tab["items"]==2){     $fout.='<div class="col one_half">';}
		elseif($args_tab["items"]==1){     $fout.='<div class="row">';}

	$fout.='<div class="pricing_desc">
						<header>
							<h5>'.$title.'</h5>
						</header>
						'.$content.'
					</div>';
   $fout.='</div>';  	
        return $fout;
    }
  /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ table ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  
 
    function table_func($atts, $content){
        global $args_tab;
		
		$class="";$extra_class='';
		$title=''; if(isset($atts["title"])){$title= $atts["title"];}
		$price=''; if(isset($atts["price"])){$price= $atts["price"];}
		$url='#'; if(isset($atts["url"])){$url= $atts["url"];}
		$class=''; if(isset($atts["class"]) ){$class= $atts["class"];}
		$featured='no'; if(isset($atts["featured"]) ){$featured= $atts["featured"];}
		
		if ($featured=="yes" || $featured =="true"){$class="";}
		
        $fout='';
		if(!isset($args_tab["items"]))$args_tab["items"]=3;
		if ($featured=="yes" || $featured =="true"){$extra_class="-p";}
		
        if($args_tab["items"]==4){  $fout.='<div class="col one_quarter">';	}
		elseif($args_tab["items"]==3){     $fout.='<div class="col one_third">';}
		elseif($args_tab["items"]==2){     $fout.='<div class="col one_half">';}
		elseif($args_tab["items"]==1){     $fout.='<div class="row">';}
		
		
 if(!isset($args_tab["currency"]))$args_tab["currency"]="";    
 if(!isset($args_tab["time_period"]))$args_tab["time_period"]="";       
 if(!isset($args_tab["button_text"]))$args_tab["button_text"]="";  
  
    if ($featured=="yes" || $featured =="true"){  	$class.=" active";	$btn_type="white no_border";	}
	else{	$btn_type="black";	}
	
	$fout.='<div class="pricing_column '.$class.'">
						<header>
							<h2>'.$title.'</h2>
							<h4>'.$args_tab["currency"].''.$price.'<span>'.$args_tab["time_period"].'</span></h4>
						</header>
						 '.$content.'
						<ul>
							<li><a class="btn medium '.$btn_type.'" href="'.$url.'">'.$args_tab["button_text"].'</a></li>
						</ul>
					</div>';
   $fout.='</div>';  	
        return $fout;
    }
 
  /*--------------------------------------------------------------------------------------
    *
    * icons
    *
    *-------------------------------------------------------------------------------------*/

function icon_func($atts, $content) {
	global $flv_icon_nr;
	$flv_icon_nr++;
$func_output='';

$sign='no';if(isset($atts['sign']) && $atts['sign']=="yes")$sign="yes";
$class='plus';if(isset($atts['type']))$class=$atts['type'];
$urll='#';if(isset($atts['link']))$urll=$atts['link']; 
$size="23";if(isset($atts['size']))$size=$atts['size']; 
$shadow="no";if(isset($atts['shadow']) && $atts['shadow']=="yes")$shadow="yes" ;
$target="self";if(isset($atts['target']))$target=$atts['target'];
$icon_effect="none";if(isset($atts['icon_effect']))$icon_effect=$atts['icon_effect'];
$ex_class='';if($icon_effect=="spin"){$ex_class="fa-spin";}

$color="#333333";if(get_option_tree("theme_color")!='')$color=get_option_tree("theme_color");
if(isset($atts['color']))$color=$atts['color']; 
$colorhover="#E96546";if(isset($atts['hover_color']))$colorhover=$atts['hover_color']; 

if($urll!="#"){$func_output.='<a href="'.$urll.'" target="'.$target.'" class="iicon" ';

$func_output.='>';}

$func_output.='<i class="fa fa-'.$class.' '.$ex_class.' '.'icn-'.$flv_icon_nr.'"';
if($sign=="no"){
$func_output.=' style="font-size:'.$size.'px !important;color:'.$color.';';
if($shadow=="yes"){$func_output.='text-shadow:2px 2px 0 #181818;';}
$func_output.='"';

$func_output.=' onMouseOver="this.style.color=\''.$colorhover.'\'"    onMouseOut="this.style.color=\''.$color.'\'"';
} 


$func_output.='></i>';
if($urll!="#"){$func_output.='</a>';}
$func_output.=' ';
return $func_output;
} 

  
  /*--------------------------------------------------------------------------------------
    *
    * bs_button
    *
    * //DW mod added xclass var
    *-------------------------------------------------------------------------------------*/
  function bs_button($atts, $content = null) {
     extract(shortcode_atts(array(
       "icon" => "none",
       "icon_effect" => "none",
        "type" => false,
        "size" => false,
        "uppercase"=> false,
        "link" => '',
        "target" => false,
        "xclass" => false,
         "color" => false,
        "title" => false,
        "data" => false
     ), $atts));
	 
$ex_class='';if(isset($icon_effect) && $icon_effect=="spin"){$ex_class="fa-spin";}

      if($data) { 
          $data = explode('|',$data);
          foreach($data as $d):
            $d = explode(',',$d);    
                $data_props .= 'data-'.$d[0]. '="'.$d[1].'" ';
          endforeach;
      }
     $return  =  '<a href="' . $link . '" class="btn ';
     $return .= ($uppercase=="yes") ? ' uppercase'  : ' ';
     $return .= ($type) ? ' ' . $type : '';
     $return .= ($size) ? ' ' . $size : 'medium';
     $return .= ($xclass) ? ' ' . $xclass : '';
	 $return .= ($color) ? ' ' . $color : '';
     $return .= '"';
     $return .= ($target) ? ' target=' . $target : '';
     $return .= ($title) ? ' title="' . $title . '"' : '';
	 if(isset($data_props)){$return .= ($data_props) ? ' ' . $data_props : '';}
     $return .= '>';
	 if($icon!="none"){$return .='<i class="fa fa-'.$icon.' '.$ex_class.'"></i><span>';}
	 $return .=do_shortcode( $content );
	 if($icon!="none"){$return .='</span>';}
	 $return .='</a> ';

     return $return;
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_span
    *
    *-------------------------------------------------------------------------------------*/
  function bs_span( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "style" => '',
       "class" => ''
    ), $atts)); 
if($atts['style']=="darkGrey")$atts['style']="highlight bg_darkGrey";
    return '<span class="' . $class . '  ' . $atts['style'] . '">' . do_shortcode( $content ) . '</span>';

  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_row
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_row( $atts, $content = null ) {

    return '<div class="row">' . do_shortcode( $content ) . '</div>';

  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_column
    *
    *-------------------------------------------------------------------------------------*/
  function bs_column( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "lg" => false,
      "md" => false,
      "sm" => false,
      "xs" => false,
      "offset-lg" => false,
      "offset-md" => false,
      "offset-sm" => false,
      "offset-xs" => false,
      "pull-lg" => false,
      "pull-md" => false,
      "pull-sm" => false,
      "pull-xs" => false,
      "push-lg" => false,
      "push-md" => false,
      "push-sm" => false,
      "push-xs" => false,
      "class" => false,
    ), $atts));
    $return  =  '<div class="';
    $return .= ($lg) ? 'col-lg-' . $lg . ' ' : '';
    $return .= ($md) ? 'col-md-' . $md . ' ' : '';
    $return .= ($sm) ? 'col-sm-' . $sm . ' ' : '';
    $return .= ($xs) ? 'col-xs-' . $xs . ' ' : '';
	$return .= ($class) ? ' ' . $class . ' ' : '';
    $return .= (isset($atts["offset-lg"])) ? 'col-lg-offset-' . $atts["offset-lg"] . ' ' : '';
    $return .= (isset($atts["offset-md"])) ? 'col-md-offset-' . $atts["offset-md"] . ' ' : '';
    $return .= (isset($atts["offset-sm"])) ? 'col-sm-offset-' . $atts["offset-sm"] . ' ' : '';
    $return .= (isset($atts["offset-xs"])) ? 'col-xs-offset-' . $atts["offset-xs"] . ' ' : '';
    $return .= (isset($atts["pull-lg"])) ? 'col-lg-pull-' . $atts["pull-lg"] . ' ' : '';
    $return .= (isset($atts["pull-md"])) ? 'col-md-pull-' . $atts["pull-md"] . ' ' : '';
    $return .= (isset($atts["pull-sm"])) ? 'col-sm-pull-' . $atts["pull-sm"] . ' ' : '';
    $return .= (isset($atts["pull-xs"])) ? 'col-xs-pull-' . $atts["pull-xs"] . ' ' : '';
    $return .= (isset($atts["push-lg"])) ? 'col-lg-push-' . $atts["push-lg"] . ' ' : '';
    $return .= (isset($atts["push-md"])) ? 'col-md-push-' . $atts["push-md"] . ' ' : '';
    $return .= (isset($atts["push-sm"])) ? 'col-sm-push-' . $atts["push-sm"] . ' ' : '';
    $return .= (isset($atts["push-xs"])) ? 'col-xs-push-' . $atts["push-xs"] . ' ' : '';
    $return .= '">' . do_shortcode( $content ) . '</div>';

    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_list_group
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_list_group( $atts, $content = null ) {
  	$class="";if(isset($atts["class"]))$class=$atts["class"];
    return '<ul class="list '.$class.'">' . do_shortcode( $content ) . '</ul>';

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_list_group_item
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_list_group_item( $atts, $content = null ) {
  	$return='';
	$class="";if(isset($atts["class"]))$class=$atts["class"]; // " " //etc
	$icon_type="";if(isset($atts["icon_type"]))$icon_type=$atts["icon_type"]; // " " //etc
	$icon_color="colored";if(isset($atts["icon_color"]))$icon_color=$atts["icon_color"]; //colored / light
	if($icon_color=="colored")$icon_color="text_color";
	$return.='<li class="'.$class.'">';
	if($icon_type!="" && $icon_type!=" ")
	$return.='<i class="fa fa-'.$icon_type.' '.$icon_color.'"></i> ';
	$return.=do_shortcode( $content ) . '</li>';;
	
    return $return;

  }







  /*--------------------------------------------------------------------------------------
    *
    * simple_table
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_table( $atts ) {
      extract( shortcode_atts( array(
          'cols' => 'none',
          'data' => 'none',
          'type' => 'type'
      ), $atts ) );
      $cols = explode(',',$cols);
      $data = explode(',',$data);
      $total = count($cols);
      $output = '';
      $output .= '<table class="table table-'. $type .' table-bordered"><tr>';
      foreach($cols as $col):
          $output .= '<th>'.$col.'</th>';
      endforeach;
      $output .= '</tr><tr>';
      $counter = 1;
      foreach($data as $datum):
          $output .= '<td>'.$datum.'</td>';
          if($counter%$total==0):
              $output .= '</tr>';
          endif;
          $counter++;
      endforeach;
          $output .= '</table>';
      return $output;
  }



  /*--------------------------------------------------------------------------------------
    *
    * vertical_tab_func
    *
    *-------------------------------------------------------------------------------------*/
  function vertical_tab_group_func( $atts, $content = null ) {

global $vertical_tabs_item_nr;$vertical_tabs_item_nr++;

    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    $output = '';

      $output .= '<div class="vertical_tabs" id="vert-tabs-'.$vertical_tabs_item_nr.'">
						<ul class="col one_third">';
      $output .= do_shortcode( $content );
      $output .= '</ul><div class="col two_thirds flv_vertical_tabs_content vertical_tabs_content">
				</div></div>';


    return $output;
  }




  /*--------------------------------------------------------------------------------------
    *
    * vertical_tab_func
    *
    *
    *-------------------------------------------------------------------------------------*/
  function vertical_tab_func( $atts, $content = null ) {

global $vertical_tab_item_nr;$vertical_tab_item_nr++;
$return='';
    extract(shortcode_atts(array(
      "title" => '',
       "icon" => '',
    ), $atts));

$return.='<li id="tab'.$vertical_tab_item_nr.'">';
if($icon!='')$return.='<i class="fa fa-'.$icon.'"></i>'; 
$return.=$title . '</li><div id="tab'.$vertical_tab_item_nr.'C"  class="to_tabs_vert_content">
		 '.do_shortcode($content) . '</div>';
		 
		return $return;
  }


  /*--------------------------------------------------------------------------------------
    *
    * tab_group_func
    *
    *-------------------------------------------------------------------------------------*/
  function tab_group_func( $atts, $content = null ) {

global $tabs_item_nr;$tabs_item_nr++;

    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    $output = '';

      $output .= '<div class="tabs" id="tabs-'.$tabs_item_nr.'"><ul> ';
      $output .= do_shortcode( $content );
      $output .= '</ul><div class="tab_content flv_tabs_content"></div></div>';


    return $output;
  }




  /*--------------------------------------------------------------------------------------
    *
    * tab_func
    *
    *
    *-------------------------------------------------------------------------------------*/
  function tab_func( $atts, $content = null ) {

global $tab_item_nr,$tab_item_nr;$tab_item_nr++;

    extract(shortcode_atts(array(
      "title" => '',
    ), $atts));

	
return '<li><h6><a href="#" id="tab'.$tab_item_nr.'">' . $title . '</a></h6></li> 
<div id="tab'.$tab_item_nr.'C" class="to_tabs_content">
<p>' . do_shortcode($content) . '</p>
</div>';
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_collapsibles
    *
    *-------------------------------------------------------------------------------------*/
  function bs_collapsibles( $atts, $content = null ) {

    if( isset($GLOBALS['collapsibles_count']) )
      $GLOBALS['collapsibles_count']++;
    else
      $GLOBALS['collapsibles_count'] = 0;

    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    $output = '';

      $output .= '<div class="panel-group" id="accordion-'.$GLOBALS['collapsibles_count'].'">';
      $output .= do_shortcode( $content );
      $output .= '</div>';


    return $output;
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_collapse
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_collapse( $atts, $content = null ) {

    if( !isset($GLOBALS['current_collapse']) )
      $GLOBALS['current_collapse'] = 0;
    else
      $GLOBALS['current_collapse']++;
	
      $state1 = '';
	  
if( !isset($GLOBALS['collapsibles_count']))$GLOBALS['collapsibles_count']= $GLOBALS['current_collapse'];

    extract(shortcode_atts(array(
      "title" => '',
    ), $atts));

	
return '<div class="accordion"><div class="accordion_normal">
							<i class="fa fa-plus"></i>
							<a href=""><h6>' . $title . '</h6></a>
							<div class="accordion_content">
								<p>' . do_shortcode($content) . '</p>
							</div>
						</div></div>';

  }



  /*--------------------------------------------------------------------------------------
    *
    * sidebar
    *
    *
    *-------------------------------------------------------------------------------------*/


function sidebar_func($atts, $content) {
    $func_output='';
    if(isset($atts['id']))
        $id = $atts['id'];
    
    ob_start();

dynamic_sidebar($id );
$func_output.='<div class="flv_widgets_container">';
$func_output.= ob_get_clean();
$func_output.='</div>';

    $func_output.=$content;


    return $func_output;
}

  /*--------------------------------------------------------------------------------------
    *
    * woocommerce
    *
    *
    *-------------------------------------------------------------------------------------*/
function woocommerce_sort_products( $atts ){
    global $woocommerce_loop,$fialovy_wc_sort_nr;
 $fialovy_wc_sort_nr++;
 
    extract( shortcode_atts( array(
        'per_page'      => '9',
        'columns'       => '3',
        'orderby'       => 'title',
        'order'         => 'asc',
        'categories'         => ''
        ), $atts ) );
 
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'ignore_sticky_posts'   => 1,
        'orderby' => $orderby,
        'order' => $order,
        'posts_per_page' => $per_page,
        'meta_query' => array(
            array(
                'key' => '_visibility',
                'value' => array('catalog', 'visible'),
                'compare' => 'IN'
            )
        )
    );
    if(isset($atts['categories']) && $atts['categories']!='')
	{
	$portfolio_category = flv_multiexplode(array(",",", "),$atts['categories']);
	if($portfolio_category[0][0]==" ")$portfolio_category[0]= substr($portfolio_category[0], 1);
	}
	else{
	$portfolio_category=array();
	}
	   ob_start();
?>
<section id="woo_sortable">
<?php
if(count($portfolio_category)!=0){
	   echo '<div class="col full_width">
					<div class="text_center folio-filter" data-option-key="filter" id="filter"><a class="btn medium white btn_color" data-option-value="*" href="#filter">All Products</a>';

foreach($portfolio_category as $category) {
			if(get_term_by('name',$category,'product_cat')){
			$theCatId = get_term_by('name',$category,'product_cat');
			$cid=$theCatId->term_id;
			}
			else
			$cid= "";
        echo'<a class="btn medium white" data-option-value=".flvc_'.$cid.'" href="#filter">'.$category.'</a>';
       		 }
						
           echo '</div></div><div class="clear"></div>';

    
    }
    $products = new WP_Query( $args );
 
    $woocommerce_loop['columns'] = $columns;
 
    if ( $products->have_posts() ) : ?>
 
         	
 	<div class="woocommerce row shop" id="<?php echo $columns ?>_col">
 		<div class="loading  lod-<?php echo $fialovy_wc_sort_nr ?>" ></div>
        <ul class="woo_sortable  products thumb-info-list" id="woo-content-<?php echo $fialovy_wc_sort_nr ?>">
							
            <?php while ( $products->have_posts() ) : $products->the_post(); ?>
            	<?php $cats=''; ?>
 				<div class="folio-item 
 				<?php $terms = get_the_terms( get_the_id(), 'product_cat' );  	if($terms)foreach ($terms as $term){echo 'flvc_'. $term->term_id." " ;}
	if($columns==2){  echo ' col one_half item';}
	elseif($columns==3){echo ' col one_third item';}
	else{ echo' col one_quarter item  ';}

 				?>">
 					 
                <?php woocommerce_get_template_part( 'content', 'product' ); ?>
 					</div>
            <?php endwhile; // end of the loop. ?>
 
        </ul>
 </div> </section><div class="clear"></div>
 
    <?php endif;
 
    wp_reset_query();
 
	echo"<script type='text/javascript'>
/*	jQuery(window).load(function () {
	var container = '';
	 container = jQuery('#woo-content-".$fialovy_wc_sort_nr."');
	  jQuery('.lod-".$fialovy_wc_sort_nr."').addClass('hide');
	  container.fadeIn('slow').removeClass('hide');
	  jQuery(window).trigger('resize');
}); 
*/
	jQuery(document).ready(function(){
	var container = '';
	 container = jQuery('#woo-content-".$fialovy_wc_sort_nr."');
	  jQuery('.lod-".$fialovy_wc_sort_nr."').addClass('hide');
	  container.fadeIn('slow').removeClass('hide');
});
</script>";
  return ob_get_clean();
}
}

new BoostrapShortcodes();



 ?>