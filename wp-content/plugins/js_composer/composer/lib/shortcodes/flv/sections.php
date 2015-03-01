<?php

 $flv_section= 0;
class WPBakeryShortCode_section extends FLV_Container {

    protected function content($atts, $content = null) {
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
$func_output.='</div></div>';

    return $func_output;
    }
}


vc_map( array(
    "name" => __("Section"),
    "base" => "section",
    "icon" => "icon-stack",
    "as_parent" => array('except' => 'section'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
  	"is_container" => true,

    "params" => array(
    array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Wide"),
         "param_name" => "wide",
         "value" => array("no","yes"),
         "description" => __("select 'yes' to use 100% width section")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height"),
         "param_name" => "height",
         "value" => __(""),
         "description" => __("leave empty to use section auto height.")
      ),
      array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => __("Background color"),
            "param_name" => "bg_color",
            "value" => '', //Default Red color
            "description" => __("Choose background color")
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => __("Overlay color"),
            "param_name" => "overlay_color",
            "value" => '', //Default Red color
            "description" => __("Choose overlay color")
        ),
          array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Overlay opacity"),
         "param_name" => "overlay_opacity",
         "value" => __("0.95"),
         "description" => __("")
      ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => __("Border color"),
            "param_name" => "border_color",
            "value" => '', //Default Red color
            "description" => __("Choose Border color")
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => __("Text color"),
            "param_name" => "text_color",
            "value" => '', //Default Red color
            "description" => __("Choose text color")
        ),
         array(
            "type" => "attach_image",
            "heading" => __("Background Image"),
            "param_name" => "bg_image",
            "description" => __("Background Image")
        ),
         array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Image Width"),
         "param_name" => "bg_image_width",
         "value" => __(""),
         "description" => __("leave empty for auto value")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Image Height"),
         "param_name" => "bg_image_height",
         "value" => __(""),
         "description" => __("leave empty for auto value")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Image Repeat"),
         "param_name" => "bg_image_repeat",
         "value" => array('repeat','repeat-x','repeat-y','no-repeat'),
         "description" => __("")
      ),
        array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Stretch Background Image"),
         "param_name" => "stretch_bg",
         "value" => array("no","yes"),
         "description" => __("")
      )
    ),
     'js_view' => 'VcColumnView'
) );


?>