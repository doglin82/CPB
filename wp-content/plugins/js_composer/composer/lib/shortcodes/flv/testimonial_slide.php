<?php
$fialovy_testimonial_slide_nr=0;
class WPBakeryShortCode_testimonial_slide extends FLV_ShortCode {

    protected function content($atts, $content = null) {
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
}




vc_map( array(
    "name" => __("Testimonial slide"),
    "base" => "testimonial_slide",
    "icon" => "icon-bubble6",
    "class" => "flv_custom_item",
    "as_child" => array('only' => 'testimonial_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)

  "is_container" => true,
 "content_element" => true,
    "params" => array(
        // add params same as with any other content element
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
            "heading" => __("Url", "js_composer"),
            "param_name" => "url",
            "value" => __("" ,"chemistry"),
            "description" => __("", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
         "class" => "",
            "heading" => __("Name", "js_composer"),
            "param_name" => "name",
            "value" => __("John Doe" ,"chemistry"),
            "description" => __("Type the name here", "js_composer")
        ),
         array(
            "type" => "textfield",
            "holder" => "div",
         	"class" => "",
            "heading" => __("Description", "js_composer"),
            "param_name" => "description",
            "value" => __("author description" ,"chemistry"),
            "description" => __("Type the testimonial author description here", "js_composer")
        ),
         array(
            "type" => "textarea",
            "holder" => "div",
         	"class" => "",
            "heading" => __("Message", "js_composer"),
            "param_name" => "message",
            "value" => __("Chemistry is such an amazing theme! You can't beat the colors, the options, and the store pages are perfect to setup my online shop, now my website will pay for itself.. thanks again!" ,"chemistry"),
            "description" => __("Type your message here", "js_composer")
        )
    ),
   'js_view' => 'VcColumnView'
) );

?>