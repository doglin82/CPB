<?php


class WPBakeryShortCode_list_group extends FLV_Container {


    protected function content($atts, $content = null) {

        extract(shortcode_atts(array(
            'class' => '',
        ), $atts));

		$output ='<ul class="list '.$class.'">' . do_shortcode( $content ) . '</ul>';
        return $output;
    }
}



vc_map( array(
    "name" => __("List", "js_composer"),
    "base" => "list_group",
    "category" => __('Content'),
    "class"=>"",
    "icon"=>"icon-list2",
    "as_parent" => array('only' => 'list_group_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
  "is_container" => true,
    "params" => array(

        array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Extra class name"),
         "param_name" => "class",
         "value" => __(""),
         "description" => __("not required")
      ),
    ),
    "custom_markup" => '  
  <div class="wpb_tabs_holder wpb_holder clearfix vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
    "js_view" => 'VcColumnView'
) );

?>