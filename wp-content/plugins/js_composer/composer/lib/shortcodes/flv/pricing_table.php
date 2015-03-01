<?php

class WPBakeryShortCode_pricing_table extends FLV_ShortCode {

    protected function content($atts, $content = null) {
         global $args_tab;
		
		$class="";$extra_class='';
		$title=''; if(isset($atts["title"])){$title= $atts["title"];}
		$price=''; if(isset($atts["price"])){$price= $atts["price"];}
		$url='#'; if(isset($atts["url"])){$url= $atts["url"];}
		$class=''; if(isset($atts["class"]) ){$class= $atts["class"];}
		$featured='no'; if(isset($atts["featured"]) ){$featured= $atts["featured"];}
		
		if ($featured=="yes" || $featured =="true"){$class="";}
		
        $fout='';
		if(!isset($args_tab["items"]))$args_tab["items"]=3;
		if ($featured=="yes" || $featured =="true"){$extra_class="-p";}
		
        if($args_tab["items"]==4){  $fout.='<div class="col one_quarter">';	}
		elseif($args_tab["items"]==3){     $fout.='<div class="col one_third">';}
		elseif($args_tab["items"]==2){     $fout.='<div class="col one_half">';}
		elseif($args_tab["items"]==1){     $fout.='<div class="row">';}
		
		
 if(!isset($args_tab["currency"]))$args_tab["currency"]="";    
 if(!isset($args_tab["time_period"]))$args_tab["time_period"]="";       
 if(!isset($args_tab["button_text"]))$args_tab["button_text"]="";  
  
    if ($featured=="yes" || $featured =="true"){  	$class.=" active";	$btn_type="white no_border";	}
	else{	$btn_type="black";	}
	
	$fout.='<div class="pricing_column '.$class.'">
						<header>
							<h2>'.$title.'</h2>
							<h4>'.$args_tab["currency"].''.$price.'<span>'.$args_tab["time_period"].'</span></h4>
						</header>
						 '.$content.'
						<ul>
							<li><a class="btn medium '.$btn_type.'" href="'.$url.'">'.$args_tab["button_text"].'</a></li>
						</ul>
					</div>';
   $fout.='</div>';  	
        return $fout;
	
    }
}



vc_map( array(
    "name" => __("Pricing table"),
    "base" => "pricing_table",
    "class" => "flv_custom_item",
    "icon" => "icon-file",
    "as_child" => array('only' => 'pricing_tables'), // Use only|except attributes to limit parent (separate multiple values with comma)
  "is_container" => true,
 "content_element" => true,
    "params" => array(
         array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Featured"),
         "param_name" => "featured",
         "value" => array("no","yes"),
         "description" => __("")
      ),    
         array(
            "type" => "textfield",
         "holder" => "div",
            "heading" => __("Title"),
            "param_name" => "title",
            "value" => __("The title"),
            "description" => __("")
        ),
        array(
            "type" => "textfield",
         "holder" => "div",
            "heading" => __("Price"),
            "param_name" => "price",
            "value" => __(""),
            "description" => __("")
        ),
        array(
            "type" => "textfield",
         "holder" => "div",
            "heading" => __("Button Url"),
            "param_name" => "url",
            "value" => __("#"),
            "description" => __("")
        ),
	array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Extra class name" ,"chemistry"),
         "param_name" => "class",
         "value" => __("" ,"chemistry"),
         "description" => __("not required" ,"chemistry")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "heading" => __("Content"),
         "param_name" => "content",
         "value" => __("<ul>
							<li>5GB of Disk Space</li>
							<li>20GB Monthly Bandwidth</li>
							<li>2 Users</li>
							<li>-</li>
							<li>-</li>
							<li>-</li>
						</ul>"),
         "description" => __("Enter your content.")
      )
    ),
   'js_view' => 'VcColumnView'
) );
?>