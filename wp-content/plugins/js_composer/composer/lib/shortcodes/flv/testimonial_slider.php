<?php
$fialovy_testimonial_slider_nr=0;
class WPBakeryShortCode_testimonial_slider extends FLV_Container {


    protected function content($atts, $content = null) {
 	 global $fialovy_testimonial_slider_nr;
     $fialovy_testimonial_slider_nr++;

	$func_output2='';
	
	$func_output2.='<div class="testimonial_slider" id="testimonial_slider_'.$fialovy_testimonial_slider_nr.'">
					<div class="boxed">			<div>		
			'.do_shortcode($content2).'
			</div></div>
			<ul class="row testimonial_slider_container">
			</ul>
			</div>
		';

	return $func_output2;
    }
}


vc_map( array(
    "name" => __("Testimonial Slider", "js_composer"),
    "base" => "testimonial_slider",
    "category" => __('Content'),
    "icon"=>"icon-bubbles5",
    "as_parent" => array('only' => 'testimonial_slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
  "is_container" => true,

  'default_content' => '[testimonial_slide  name="John Doe" description="author description"  message="Chemistry is such an amazing theme! You can\'t beat the colors, the options, and the store pages are perfect to setup my online shop, now my website will pay for itself.. thanks again!"][/testimonial_slide]',
    "js_view" => 'VcColumnView'
) );

?>