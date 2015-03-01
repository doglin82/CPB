<?php
$toggle_item_nr=0;
class WPBakeryShortCode_toggle_group extends FLV_Container {

    protected function content($atts, $content = null) {
global $toggle_item_nr;$toggle_item_nr++;


    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    $output = '';

      $output .= '<div class="panel-group" id="accordion-'.$toggle_item_nr.'">';
      $output .= do_shortcode( $content );
      $output .= '</div>';

    return $output;
	
    }
}



vc_map( array(
    "name" => __("Toggle Group", "js_composer"),
    "base" => "toggle_group",
    "category" => __('Content'),
    "icon"=>"icon-menu5",
    "as_parent" => array('only' => 'toggle'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
  "is_container" => true,

    "params" => array(
        // add params same as with any other content element
    ),
  'default_content' => '
  [toggle title="'.__('The title').'"]Click edit button to change this text.[/toggle]
  ',
    "js_view" => 'VcColumnView'
) );

?>