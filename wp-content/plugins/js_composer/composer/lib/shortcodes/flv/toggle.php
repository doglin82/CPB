<?php
$item_nr=0;
class WPBakeryShortCode_toggle extends FLV_ShortCode {

    protected function content($atts, $content = null) {
global $item_nr,$toggle_item_nr;$item_nr++;

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
}



vc_map( array(
    "name" => __("Toggle"),
    "base" => "toggle",
    "class" => "flv_custom_item",
    "icon" => "icon-menu2",
    "as_child" => array('only' => 'toggle_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
  "is_container" => true,
 "content_element" => true,
    "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
         "class" => "",
            "heading" => __("Title"),
            "param_name" => "title",
            "value" => __("The title"),
            "description" => __("")
        ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text."),
         "description" => __("Enter your content.")
      )
    ),
   'js_view' => 'VcColumnView'
) );

?>