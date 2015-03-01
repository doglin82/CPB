<?php
$tabs_item_nr=0;
class WPBakeryShortCode_tab_group extends FLV_Container {

    protected function content($atts, $content = null) {
global $tabs_item_nr;$tabs_item_nr++;

    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    $output = '';

      $output .= '<div class="tabs" id="tabs-'.$tabs_item_nr.'"><ul> ';
      $output .= do_shortcode( $content );
      $output .= '</ul><div class="tab_content flv_tabs_content"></div></div>';


    return $output;
	
    }
}



vc_map( array(
    "name" => __("Tab Group", "js_composer"),
    "base" => "tab_group",
    "category" => __('Content'),
    "icon"=>"icon-list",
    "as_parent" => array('only' => 'tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
  "is_container" => true,

    "params" => array(
        // add params same as with any other content element
    ),
  'default_content' => '
  [tab title="'.__('The title').'"]Click edit button to change this text.[/tab]
  ',
    "js_view" => 'VcColumnView'
) );

?>