<?php


class WPBakeryShortCode_list_group_item extends FLV_ShortCode {

    protected function content($atts, $content = null) {

	  	$return='';
	$class="";if(isset($atts["class"]))$class=$atts["class"]; // " " //etc
	$icon_type="";if(isset($atts["icon_type"]))$icon_type=$atts["icon_type"]; // " " //etc
	$icon_color="colored";if(isset($atts["icon_color"]))$icon_color=$atts["icon_color"]; //colored / light
	if($icon_color=="colored")$icon_color="text_color";
	$return.='<li class="'.$class.'">';
	if($icon_type!="" && $icon_type!=" ")
	$return.='<i class="fa fa-'.$icon_type.' '.$icon_color.'"></i> ';
	$return.=do_shortcode( $content ) . '</li>';;
	
    return $return;
    }
}


vc_map( array(
    "name" => __("List Item"),
    "base" => "list_group_item",
    "class" => "flv_custom_item",
    "icon" => "app-icons-minus",
    "as_child" => array('only' => 'list_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
  "is_container" => true,
 "content_element" => true,
    "params" => array(
    array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Type" ,"chemistry"),
         "param_name" => "icon_type",
         "value" => array(" ","clock-o","times","warning","glass","music","search","envelope-alt","heart","star","star-empty","user","film","th-large","th","th-list","ok","remove","zoom-in","zoom-out","off","signal","cog","home","file-alt","time","road","download-alt","download","upload","inbox","play-circle","repeat","refresh","list-alt","lock","flag","headphones","volume-off","volume-down","volume-up","qrcode","barcode","tag","tags","book","bookmark","print","camera","font","bold","italic","text-height","text-width","align-left","align-center","align-right","align-justify","list","indent-left","indent-right","facetime-video","picture","pencil","map-marker","adjust","ccw","tint","edit","share","check","move","step-backward","fast-backward","backward","play","pause","stop","forward","fast-forward","step-forward","eject","chevron-left","chevron-right","plus-sign","minus-sign","remove-sign","ok-sign","question-sign","info-sign","screenshot","remove-circle","ok-circle","ban-circle","arrow-left","arrow-right","arrow-up","arrow-down","share-alt","resize-full","resize-small","plus","minus","asterisk","exclamation-sign","gift","leaf","fire","eye-open","eye-close","warning-sign","plane","calendar","random","comment","magnet","chevron-up","chevron-down","retweet","shopping-cart","folder-close","folder-open","resize-vertical","resize-horizontal","bar-chart","twitter-sign","facebook-sign","camera-retro","key","cogs","comments","thumbs-up-alt","thumbs-down-alt","star-half","heart-empty","signout","linkedin-sign","pushpin","external-link","signin","trophy","github-sign","upload-alt","lemon","phone","check-empty","bookmark-empty","phone-sign","twitter","facebook","github","unlock","credit-card","rss","hdd","bullhorn","bell","certificate","hand-right","hand-left","hand-up","hand-down","circle-arrow-left","circle-arrow-right","circle-arrow-up","circle-arrow-down","globe","wrench","tasks","filter","briefcase","fullscreen","group","link","cloud","beaker","cut","copy","paper-clip","save","sign-blank","reorder","list-ul","list-ol","strikethrough","underline","table","magic","truck","pinterest","pinterest-sign","google-plus-sign","google-plus","money","caret-down","caret-up","caret-left","caret-right","columns","sort","sort-down","sort-up","envelope","linkedin","undo","legal","dashboard","comment-alt","comments-alt","bolt","sitemap","umbrella","paste","lightbulb","exchange","cloud-download","cloud-upload","user-md","stethoscope","suitcase","bell-alt","coffee","food","file-text-alt","building","hospital","ambulance","medkit","fighter-jet","beer","h-sign","plus-sign-alt","double-angle-left","double-angle-right","double-angle-up","double-angle-down","angle-left","angle-right","angle-up","angle-down","desktop","laptop","tablet","mobile-phone","circle-blank","quote-left","quote-right","spinner","circle","reply","github-alt","folder-close-alt","folder-open-alt","expand-alt","collapse-alt","smile","frown","meh","gamepad","keyboard","flag-alt","flag-checkered","terminal","code","reply-all","mail-reply-all","star-half-empty","location-arrow","crop","code-fork","unlink","question","info","exclamation","superscript","subscript","eraser","puzzle-piece","microphone","microphone-off","shield","calendar-empty","fire-extinguisher","rocket","maxcdn","chevron-sign-left","chevron-sign-right","chevron-sign-up","chevron-sign-down","html5","css3","anchor","unlock-alt","bullseye","ellipsis-horizontal","ellipsis-vertical","rss-sign","play-sign","ticket","minus-sign-alt","check-minus","level-up","level-down","check-sign","edit-sign","external-link-sign","share-sign","compass","collapse","collapse-top","expand","eur","gbp","usd","inr","jpy","cny","krw","btc","file","file-text","sort-by-alphabet","sort-by-alphabet-alt","sort-by-attributes","sort-by-attributes-alt","sort-by-order","sort-by-order-alt","thumbs-up","thumbs-down","youtube-sign","youtube","xing","xing-sign","youtube-play","dropbox","stackexchange","instagram","flickr","adn","bitbucket","bitbucket-sign","tumblr","tumblr-sign","long-arrow-down","long-arrow-up","long-arrow-left","long-arrow-right","apple","windows","android","linux","dribbble","skype","foursquare","trello","female","male","gittip","sun","moon","archive","bug","vk","weibo","renren"),
         "description" => __("<div class='flv_icon_change'></div>" ,"chemistry")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Color" ,"chemistry"),
         "param_name" => "icon_color",
         "value" => array("colored","light"),
         "description" => __("" ,"chemistry")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Extra class name","torque"),
         "param_name" => "class",
         "value" => __("","torque"),
         "description" => __("not required","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content"),
         "param_name" => "content",
         "value" => __('Click edit button to change this text.'),
         "description" => __("Enter your content.")
      )
    ),
   'js_view' => 'VcColumnView'
) );


?>