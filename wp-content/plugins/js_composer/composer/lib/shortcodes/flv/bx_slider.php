<?php
$fialovy_bx_slider_nr=0;
class WPBakeryShortCode_bx_slider extends FLV_Container {

    protected function content($atts, $content = null) {
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
	 
	 
	$func_output.='<ul id="bx_slider_'.$fialovy_bx_slider_nr.'" class="bxslider">';
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

	if($width!="auto")
	$func_output.="<style scoped>#bx_slider_".$fialovy_bx_slider_nr." img[alt=bx_slide]{width:".$width."px;}</style>";
	if($height!="auto")
	$func_output.="<style scoped>#bx_slider_".$fialovy_bx_slider_nr." img[alt=bx_slide]{height:".$height."px;}</style>";
	
if($wide=="yes"){
	$func_output.="<style scoped>#bx_slider_".$fialovy_bx_slider_nr." img[alt=bx_slide]{width:100%;}
	</style>";
}
	
	$func_output.="<script>jQuery(window).load(function () {
		if(jQuery.isFunction(jQuery.fn.bxSlider)) {
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
}

	 
vc_map( array(
    "name" => __("Bx Slider", "js_composer"),
    "base" => "bx_slider",
    "category" => __('Content'),
    "icon"=>"icon-popout",
    "as_parent" => array('only' => 'bx_slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    "is_container" => true,

    "params" => array(
        // add params same as with any other content element
array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Source","torque"),
         "param_name" => "source",
         "value" => array("default","post"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of posts" ,"torque"),
         "param_name" => "number",
         "value" => __("5" ,"torque"),
         "description" => __("" ,"torque")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Order","torque"),
         "param_name" => "order",
         "value" => array("asc","desc"),
         "description" => __("","torque")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Wide","torque"),
         "param_name" => "wide",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Width" ,"torque"),
         "param_name" => "width",
         "value" => __("auto" ,"torque"),
         "description" => __("" ,"torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height" ,"torque"),
         "param_name" => "height",
         "value" => __("auto" ,"torque"),
         "description" => __("" ,"torque")
      ),
  array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Mode","torque"),
         "param_name" => "mode",
         "value" => array("fade","horizontal", "vertical"),
         "description" => __("","torque")
      ),     
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Easing","torque"),
         "param_name" => "easing",
         "value" => array("easeInSine","linear","swing","easeInQuad","easeOutQuad","easeInOutQuad","easeInCubic","easeOutCubic","easeInOutCubic","easeInQuart","easeOutQuart","easeInOutQuart","easeInQuint","easeOutQuint","easeInOutQuint","easeInExpo","easeOutExpo","easeInOutExpo","easeOutSine","easeInOutSine","easeInCirc","easeOutCirc","easeInOutCirc","easeInElastic","easeOutElastic","easeInOutElastic","easeInBack","easeOutBack","easeInOutBack","easeInBounce","easeOutBounce","easeInOutBounce"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Speed" ,"torque"),
         "param_name" => "speed",
         "value" => __("1000" ,"torque"),
         "description" => __("in miliseconds" ,"torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Random Start","torque"),
         "param_name" => "randomStart",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Controls","torque"),
         "param_name" => "controls",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Auto","torque"),
         "param_name" => "auto",
         "value" => array("yes","no"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Pause" ,"torque"),
         "param_name" => "pause",
         "value" => __("3500" ,"torque"),
         "description" => __("in miliseconds" ,"torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Auto Direction","torque"),
         "param_name" => "autoDirection",
         "value" => array("next","prev"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Auto Start","torque"),
         "param_name" => "autoStart",
         "value" => array("yes","no"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Auto Hover","torque"),
         "param_name" => "autoHover",
         "value" => array("yes","no"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Pager","torque"),
         "param_name" => "pager",
         "value" => array("no","yes"),
         "description" => __("","torque")
      )
    ),
    "js_view" => 'VcColumnView'
) );

?>