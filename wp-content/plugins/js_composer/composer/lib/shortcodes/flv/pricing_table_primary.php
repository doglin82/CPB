<?php

class WPBakeryShortCode_pricing_table_primary extends FLV_ShortCode {

    protected function content($atts, $content = null) {
      global $args_tab;
		$fout='';
		$title=''; if(isset($atts["title"])){$title= $atts["title"];}
		
        if($args_tab["items"]==4){  $fout.='<div class="col one_quarter">';	}
		elseif($args_tab["items"]==3){     $fout.='<div class="col one_third">';}
		elseif($args_tab["items"]==2){     $fout.='<div class="col one_half">';}
		elseif($args_tab["items"]==1){     $fout.='<div class="row">';}

	$fout.='<div class="pricing_desc">
						<header>
							<h5>'.$title.'</h5>
						</header>
						'.$content.'
					</div>';
   $fout.='</div>';  	
        return $fout;
    }
}



vc_map( array(
    "name" => __("Primary Pricing table"),
    "base" => "pricing_table_primary",
    "class" => "flv_custom_item",
    "icon" => "icon-file",
    "as_child" => array('only' => 'pricing_tables'), // Use only|except attributes to limit parent (separate multiple values with comma)
  "is_container" => true,
 "content_element" => true,
    "params" => array( 
         array(
            "type" => "textfield",
         "holder" => "div",
            "heading" => __("Title"),
            "param_name" => "title",
            "value" => __("The title"),
            "description" => __("")
        ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "heading" => __("Content"),
         "param_name" => "content",
         "value" => __("<ul>
							<li>Disk Space</li>
							<li>Bandwidth</li>
							<li>Users</li>
							<li>Domains</li>
							<li>Email Accounts</li>
							<li>Cloud Backups</li>
							<li></li>
						</ul>"),
         "description" => __("Enter your content.")
      )
    ),
   'js_view' => 'VcColumnView'
) );
?>