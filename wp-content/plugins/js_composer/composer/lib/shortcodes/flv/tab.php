<?php
$tab_item_nr=0;
class WPBakeryShortCode_tab extends FLV_ShortCode {

    protected function content($atts, $content = null) {
global $tab_item_nr,$tab_item_nr;$tab_item_nr++;

    extract(shortcode_atts(array(
      "title" => '',
    ), $atts));

	
return '<li><h6><a href="#" id="tab'.$tab_item_nr.'">' . $title . '</a></h6></li> 
<div id="tab'.$tab_item_nr.'C" class="to_tabs_content">
<p>' . do_shortcode($content) . '</p>
</div>';
	
    }
}



vc_map( array(
    "name" => __("Tab"),
    "base" => "tab",
    "class" => "flv_custom_item",
    "icon" => "icon-grid",
    "as_child" => array('only' => 'tab_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
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