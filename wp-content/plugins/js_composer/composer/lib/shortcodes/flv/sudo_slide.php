<?php
$fialovy_sudo_slide_nr=0;
class WPBakeryShortCode_sudo_slide extends FLV_ShortCode {

    protected function content($atts, $content = null) {
    	
	
global $fialovy_sudo_slide_nr;     $fialovy_sudo_slide_nr++;

 $image='';if(isset($atts['image']))   $image = $atts['image'];
if(is_numeric($image) &&  $image!=''){$image= wp_get_attachment_image_src($image,"full");$image=$image[0];}
	
$func_output='';

if($image!=''){$func_output.='<li style="background-image: url('.$image.')">';}else{$func_output.='<li>';}

$func_output.='<div class="container">'.do_shortcode($content).'</div></li>';
					
    return $func_output;

    }
}




vc_map( array(
    "name" => __("Sudo slide"),
    "base" => "sudo_slide",
    "icon" => "app-icons-sign-blank",
    "class" => "flv_custom_item",
    "as_child" => array('only' => 'sudo_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)

  "is_container" => true,
 "content_element" => true,
    "params" => array(
          array(
            "type" => "attach_image",
            "heading" => __("Image", "js_composer"),
            "param_name" => "image",
            "description" => __("")
        ),
        array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Url" ,"chemistry"),
         "param_name" => "url",
         "value" => __("#" ,"chemistry"),
         "description" => __("" ,"chemistry")
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "heading" => __("Content"),
         "param_name" => "content",
         "value" => __(""),
         "description" => __("Enter your content.")
      )

    ),
      
   'js_view' => 'VcColumnView'
) );

?>