<?php
$fialovy_sudo_slider_nr=0;
class WPBakeryShortCode_sudo_slider extends FLV_Container {

    protected function content($atts, $content = null) {
global $fialovy_sudo_slider_nr;     $fialovy_sudo_slider_nr++;

	 $speed=1250;    if(isset($atts['speed']) && $atts['speed']!='')  $speed= $atts['speed'];
	 $numeric="false";    if(isset($atts['numeric']) && $atts['numeric']!='no')  $numeric="true";
	 $controlsFade="false";    if(isset($atts['controlsFade']) && $atts['controlsFade']!='no')  $controlsFade="true";
	 $responsive="true";    if(isset($atts['responsive']) && $atts['responsive']!='yes')  $responsive="false";
	 $auto="true";    if(isset($atts['auto']) && $atts['auto']!='yes')  $auto="false";
	 
	 $continuous="true";    if(isset($atts['continuous']) && $atts['continuous']!='yes')  $continuous="false";
	 $effect="slide";    if(isset($atts['effect']) && $atts['effect']!='')  $effect= $atts['effect'];

	$func_output2='';
	$func_output2.='<div id="slider-'.$fialovy_sudo_slider_nr.'" class="flv_sudo">
		<ul class="text_center">';	
	$func_output2.=do_shortcode($content2);
	$func_output2.='</ul>';
	$func_output2.='</div>
		</div>
		
		<script>jQuery(document).ready(function () {
	var sudoSlider = jQuery("#slider-'.$fialovy_sudo_slider_nr.'").sudoSlider({
			effect:"'.$effect.'", 
			continuous:'.$continuous.',
			   numeric: '.$numeric.',
			   responsive: '.$responsive.',
			   controlsFade: '.$controlsFade.',
			   auto: '.$auto.',
			   speed: '.$speed.'  });
	        jQuery(".prevBtn, .nextBtn, #slider-'.$fialovy_sudo_slider_nr.'").hover( function () {    jQuery(".prevBtn, .nextBtn").stop().fadeTo(200, 1);       },        function () {           jQuery(".prevBtn, .nextBtn").stop().fadeTo(200, 0);}  );
	        jQuery(".prevBtn, .nextBtn").stop().fadeTo(0, 0);
});</script>';



	return $func_output2;
    }
}


vc_map( array(
    "name" => __("Sudo Slider", "js_composer"),
    "base" => "sudo_slider",
    "category" => __('Content'),
    "icon"=>"icon-popout",
    "as_parent" => array('only' => 'sudo_slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
  "is_container" => true,

    "params" => array(
        // add params same as with any other content element
array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Continuous","inka"),
         "param_name" => "continuous",
         "value" => array("yes","no"),
         "description" => __("","inka")
      ),
  array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Effect","inka"),
         "param_name" => "effect",
         "value" => array("slide","random","blinds1","blinds1Up","blinds1Right","blinds1Down","blinds1Left","blinds2","blinds2Up","blinds2Right","blinds2Down","blinds2Left","fold","foldUp","foldRight","foldDown","foldLeft","pushOut","pushOutUp","pushOutRight","pushOutDown","pushOutLeft","pushIn","pushInUp","pushInRight","pushInDown","pushInLeft","reveal","revealUp","revealRight","revealDown","revealLeft","slice","sliceUp","sliceRight","sliceDown","sliceLeft","sliceReverse","sliceReverseUp","sliceReverseRight","sliceReverseDown","sliceReverseLeft","sliceRandom","sliceRandomUp","sliceRandomRight","sliceRandomDown","sliceRandomLeft","sliceReveal","sliceRevealUp","sliceRevealRight","sliceRevealDown","sliceRevealLeft","sliceRevealReverse","sliceRevealReverseUp","sliceRevealReverseRight","sliceRevealReverseDown","sliceRevealReverseLeft","sliceRevealRandom","sliceRevealRandomUp","sliceRevealRandomRight","sliceRevealRandomDown","sliceRevealRandomLeft","sliceFade","sliceFadeUp","sliceFadeRight","sliceFadeDown","sliceFadeLeft","zip","zipUp","zipRight","zipDown","zipLeft","unzip","unzipUp","unzipRight","unzipDown","unzipLeft","boxRandom","boxRandomGrowIn","boxRandomGrowOut","boxRainUpLeft","boxRainDownLeft","boxRainDownRight","boxRainUpRight","boxRainGrowInUpLeft","boxRainGrowInDownLeft","boxRainGrowInDownRight","boxRainGrowInUpRight","boxRainGrowOutUpLeft","boxRainGrowOutDownLeft","boxRainGrowOutDownRight","boxRainGrowOutUpRight","boxRainFlyInUpLeft","boxRainFlyInDownLeft","boxRainFlyInDownRight","boxRainFlyInUpRight","boxRainFlyOutUpLeft","boxRainFlyOutDownLeft","boxRainFlyOutDownRight","boxRainFlyOutUpRight","boxSpiralInWards","boxSpiralInWardsGrowIn","boxSpiralInWardsGrowOut","boxSpiralOutWards","boxSpiralOutWardsGrowIn","boxSpiralOutWardsGrowOut","fade","fadeOutIn","foldRandomHorizontal","foldRandomVertical","stackUp","stackUpReverse","stackRight","stackRightReverse","stackDown","stackDownReverse","stackLeft","stackLeftReverse"),
         "description" => __("","inka")
      ),     
        array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Speed" ,"chemistry"),
         "param_name" => "speed",
         "value" => __("1250" ,"chemistry"),
         "description" => __("in miliseconds" ,"chemistry")
      ),
         array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Numeric","inka"),
         "param_name" => "numeric",
         "value" => array("no","yes"),
         "description" => __("","inka")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Controls Fade","inka"),
         "param_name" => "controlsFade",
         "value" => array("no","yes"),
         "description" => __("","inka")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Responsive","inka"),
         "param_name" => "responsive",
         "value" => array("yes","no"),
         "description" => __("","inka")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Auto play","inka"),
         "param_name" => "auto",
         "value" => array("yes","no"),
         "description" => __("","inka")
      )
    ),
    "js_view" => 'VcColumnView'
) );

?>