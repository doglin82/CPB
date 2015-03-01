<?php
$fialovy_pricing_tables_nr=0;$args_tab  = array();
class WPBakeryShortCode_pricing_tables extends FLV_Container {


    protected function content($atts, $content = null) {
		global $fialovy_pricing_tables_nr, $args_tab;
        $return = '';
        $fialovy_pricing_tables_nr ++;
		
		$currency="$";
		$time_period='/month';
		$button_text='Sign Up';
		$items=3;
		
        if(isset($atts["currency"]) && $atts["currency"]!='')$currency = $atts["currency"];
        if(isset($atts["time_period"]) && $atts["time_period"]!='')$time_period = $atts["time_period"];
		if(isset($atts["button_text"]) && $atts["button_text"]!='')$button_text= $atts["button_text"];
		if(isset($atts["items_number"]) && $atts["items_number"]!='')$items = $atts["items_number"];
	
        $args_tab["currency"]=$currency;
		$args_tab["time_period"]=$time_period;
		$args_tab["button_text"]=$button_text;
        $args_tab["items"]=$items;
		
        $content = do_shortcode($content);
        
        $return.= '<div id="pricing_'.$fialovy_pricing_tables_nr.'" class="row pricing_container">' .  do_shortcode($content);
        $return.='</div>';
        return $return;
    }
}


vc_map( array(
    "name" => __("Pricing tables", "js_composer"),
    "base" => "pricing_tables",
    "category" => __('Content'),
    "icon"=>"icon-calendar",
    "as_parent" => array('only' => 'pricing_table,pricing_table_primary'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
  "is_container" => true,

    "params" => array(
        // add params same as with any other content element

         array(
            "type" => "dropdown",
            "holder" => "div",
         "class" => "",
            "heading" => __("Items Number"),
            "param_name" => "items_number",
             "value" => array("3","4","2","1"),
            "description" => __("how many pricing tables contains")
        ),
         array(
            "type" => "textfield",
            "holder" => "div",
         "class" => "",
            "heading" => __("Currency"),
            "param_name" => "currency",
            "value" => __("$"),
            "description" => __("")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
         "class" => "",
            "heading" => __("Time period"),
            "param_name" => "time_period",
            "value" => __("/month"),
            "description" => __("")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
         "class" => "",
            "heading" => __("Button Text"),
            "param_name" => "button_text",
            "value" => __("Sign Up"),
            "description" => __("")
        ),
    ),
  'default_content' => '
  [pricing_table featured="no" class="" title="BASIC" price="" url="#" ]<ul>
							<li>5GB of Disk Space</li>
							<li>20GB Monthly Bandwidth</li>
							<li>2 Users</li>
							<li>-</li>
							<li>-</li>
							<li>-</li>
						</ul>[/pricing_table]
  ',
    "js_view" => 'VcColumnView'
) );

?>