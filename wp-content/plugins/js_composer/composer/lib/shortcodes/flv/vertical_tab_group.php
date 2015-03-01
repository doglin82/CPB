<?php
$vertical_tabs_item_nr=0;
class WPBakeryShortCode_vertical_tab_group extends FLV_Container {

    protected function content($atts, $content = null) {

global $vertical_tabs_item_nr;$vertical_tabs_item_nr++;

    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    $output = '';

      $output .= '<div class="vertical_tabs" id="vert-tabs-'.$vertical_tabs_item_nr.'">
						<ul class="col one_third">';
      $output .= do_shortcode( $content );
      $output .= '</ul><div class="col two_thirds flv_vertical_tabs_content vertical_tabs_content">
				</div></div>';


    return $output;
	
    }
}



vc_map( array(
    "name" => __("Vertical Tab Group", "js_composer"),
    "base" => "vertical_tab_group",
    "category" => __('Content'),
    "icon"=>"app-icons-th-list",
    "as_parent" => array('only' => 'vertical_tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
  "is_container" => true,

    "params" => array(
        // add params same as with any other content element
    ),
  'default_content' => '
  [vertical_tab title="'.__('The title').'"]Click edit button to change this text.[/vertical_tab]
  ',
    "js_view" => 'VcColumnView'
) );

?>