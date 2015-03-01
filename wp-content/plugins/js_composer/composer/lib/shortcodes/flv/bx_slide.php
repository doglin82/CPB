<?php

class WPBakeryShortCode_bx_slide extends FLV_ShortCode {

    protected function content($atts2, $content2 = null) {
   $foutput='';	
	$img='';
    $msg = '';
    $desc = '';
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
}



vc_map( array(
    "name" => __("Bx slide"),
    "base" => "bx_slide",
    "icon" => "app-icons-sign-blank",
    "class" => "flv_custom_item",
    "as_child" => array('only' => 'bx_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)

  "is_container" => true,
 "content_element" => true,
    "params" => array(
          array(
            "type" => "attach_image",
            "heading" => __("Image", "js_composer"),
            "param_name" => "image_url",
            "description" => __("")
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