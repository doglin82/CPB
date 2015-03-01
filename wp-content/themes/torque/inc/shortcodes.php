<?php  
/* add shortcodes in shortcode generator */
if (function_exists('vc_map') && is_admin()) {
/* start */
/*--------------------------------------- heading 1 -----------------------------------------*/
vc_map( array(
   "name" => __("Heading 1","torque"),
   "base" => "heading1",
   "class" => "flv_custom_item",
   "icon"=>"icon-font-size",
   "category" => __('Headings',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Light style","torque"),
         "param_name" => "light_style",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- heading 2 -----------------------------------------*/
vc_map( array(
   "name" => __("Heading 2","torque"),
   "base" => "heading2",
   "class" => "flv_custom_item",
   "icon"=>"icon-font-size",
   "category" => __('Headings',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Light style","torque"),
         "param_name" => "light_style",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- heading 3 -----------------------------------------*/
vc_map( array(
   "name" => __("Heading 3","torque"),
   "base" => "heading3",
   "class" => "flv_custom_item",
   "icon"=>"icon-font-size",
   "category" => __('Headings',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Light style","torque"),
         "param_name" => "light_style",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- heading 4 -----------------------------------------*/
vc_map( array(
   "name" => __("Heading 4","torque"),
   "base" => "heading4",
   "class" => "flv_custom_item",
   "icon"=>"icon-font-size",
   "category" => __('Headings',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Light style","torque"),
         "param_name" => "light_style",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- heading 5 -----------------------------------------*/
vc_map( array(
   "name" => __("Heading 5","torque"),
   "base" => "heading5",
   "class" => "flv_custom_item",
   "icon"=>"icon-font-size",
   "category" => __('Headings',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Light style","torque"),
         "param_name" => "light_style",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- heading 6 -----------------------------------------*/
vc_map( array(
   "name" => __("Heading 6","torque"),
   "base" => "heading6",
   "class" => "flv_custom_item",
   "icon"=>"icon-font-size",
   "category" => __('Headings',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Light style","torque"),
         "param_name" => "light_style",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Progress bar -----------------------------------------*/
vc_map( array(
   "name" => __("Progress bar","torque"),
   "base" => "progress_bar",
   "class" => "flv_custom_item",
   "icon"=>"icon-bars3",
   "category" => __('Content',"torque"),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Percent","torque"),
         "param_name" => "percent",
         "value" => __("","torque"),
         "description" => __("must be a number","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Color","torque"),
         "param_name" => "color",
         "value" =>array("white","red","orange","yellow","lime","green","teal","blue","purple","pink","grey","black"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Left -----------------------------------------*/
vc_map( array(
   "name" => __("Left alignement","torque"),
   "base" => "left",
   "class" => "flv_custom_item",
   "icon"=>"icon-paragraph-left",
   "category" => __('Structure',"torque"),
   "params" => array(
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
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Right -----------------------------------------*/
vc_map( array(
   "name" => __("Right alignement","torque"),
   "base" => "right",
   "class" => "flv_custom_item",
   "icon"=>"icon-paragraph-right",
   "category" => __('Structure',"torque"),
   "params" => array(
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
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );  
/*--------------------------------------- Center -----------------------------------------*/
vc_map( array(
   "name" => __("Center alignement","torque"),
   "base" => "center",
   "class" => "flv_custom_item",
   "icon"=>"icon-paragraph-center",
   "category" => __('Structure',"torque"),
   "params" => array(
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
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );  
/*--------##########-------------------------------- Space -----------------------------------------*/
vc_map( array(
   "name" => __("Add space between lines" ,"chemistry"),
   "base" => "space",
   "class" => "flv_custom_item",
   "icon"=>"icon-page-break2",
   "category" => __('Structure' ,"chemistry"),
   "show_settings_on_create" => true,
    "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Space size" ,"chemistry"),
         "param_name" => "size",
         "value" => array("0","5","10","15","20","25","30","35","40","45","50","55","60"),
         "description" => __("" ,"chemistry")
      )
   )
   )
 );
/*--------------------------------------- Clear -----------------------------------------*/
vc_map( array(
   "name" => __("Clear","torque"),
   "base" => "clear",
   "class" => "flv_custom_item",
   "icon"=>"icon-page-break",
   "category" => __('Structure',"torque"),
   "show_settings_on_create" => false
   )
 );

 /*--------------------------------------- Tooltip -----------------------------------------*/
vc_map( array(
   "name" => __("Tooltip","torque"),
   "base" => "tooltip",
   "class" => "flv_custom_item",
   "icon"=>"icon-quotes-left",
   "category" => __('Content',"torque"),
   "params" => array(
   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Url","torque"),
         "param_name" => "url",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Tile","torque"),
         "param_name" => "title",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("I am test text block.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Blockquote -----------------------------------------*/
vc_map( array(
   "name" => __("Blockquote","torque"),
   "base" => "blockquote",
   "class" => "flv_custom_item",
   "icon"=>"icon-quotes-left",
   "category" => __('Content',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Style","torque"),
         "param_name" => "style",
         "value" => array("style1","style2","style3","style4"),
         "description" => __("","torque")
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
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Button -----------------------------------------*/
vc_map( array(
   "name" => __("Button","torque"),
   "base" => "button",
   "class" => "flv_custom_item",
   "icon"=>"app-icons-sign-blank",
   "category" => __('Content',"torque"),
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Color","torque"),
         "param_name" => "color",
         "value" => array("white","red","orange","yellow","lime","green","teal","blue","purple","pink","black","grey"),
         "description" => __("","torque")
      ),
         array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon","torque"),
         "param_name" => "icon",
         "value" => array("none","glass","music","search","envelope-0","heart","star","star-o","user","film","th-large","th","th-list","check","times","search-plus","search-minus","power-off","signal","gear","trash-o","home","file-o","clock-o","road","download","arrow-circle-o-down","arrow-circle-o-up","inbox","play-circle-o","rotate-right","refresh","list-alt","lock","flag","headphones","volume-off","volume-down","volume-up","qrcode","barcode","tag","tags","book","bookmark","print","camera","font","bold","italic","text-height","text-width","align-left","align-center","align-right","align-justify","list","dedent","indent","video-camera","picture","pencil","map-marker","adjust","tint","edit","share","check","arrows","step-backward","fast-backward","backward","play","pause","stop","forward","fast-forward","step-forward","eject","chevron-left","chevron-right","plus-circle","minus-sign","times-circle","check-circle","question-circle","info-circle","crosshairs","times-circle-o","check-circle-o","ban","arrow-left","arrow-right","arrow-up","arrow-down","mail-forward","expand","compress","plus","minus","asterisk","exclamation-circle","gift","leaf","fire","eye","eye-slash","warning","plane","calendar","random","comment","magnet","chevron-up","chevron-down","retweet","shopping-cart","folder","folder-open","arrows-v","arrows-h","bar-chart-o","twitter-square","facebook-square","camera-retro","key","cogs","comments","thumbs-o-up","thumbs-o-down","star-half","heart-o","sign-out","linkedin-square","thumb-tack","external-link","sign-in","trophy","github-square","upload","lemon-o","phone","square-o","bookmark-o","phone-square","twitter","facebook","github","unlock","credit-card","rss","hdd-o","bullhorn","bell","certificate","hand-o-right","hand-o-left","hand-o-up","hand-o-down","arrow-circle-left","arrow-circle-right","arrow-circle-up","arrow-circle-down","globe","wrench","tasks","filter","briefcase","arrows-alt","group","link","cloud","flask","cut","copy","paperclip","save","square","bars","list-ul","list-ol","strikethrough","underline","table","magic","truck","pinterest","pinterest-square","google-plus-square","google-plus","money","caret-down","caret-up","caret-left","caret-right","columns","sort","sort-down","sort-up","envelope","linkedin","rotate-left","legal","dashboard","comment-o","comments-o","bolt","sitemap","umbrella","paste","lightbulb-o","exchange","cloud-download","cloud-upload","user-md","stethoscope","suitcase","bell-o","coffee","cutlery","file-text-o","building","hospital-o","ambulance","medkit","fighter-jet","beer","h-square","plus-square","angle-double-left","angle-double-right","angle-double-up","angle-double-down","angle-left","angle-right","angle-up","angle-down","desktop","laptop","tablet","mobile-phone","circle-o","quote-left","quote-right","spinner","circle","reply","github-alt","folder-o","folder-open-o","smile-o","frown-o","meh-o","gamepad","keyboard-o","flag-o","flag-checkered","terminal","code","reply-all","mail-reply-all","star-half-empty","location-arrow","crop","code-fork","unlink","question","info","exclamation","superscript","subscript","eraser","puzzle-piece","microphone","microphone-slash","shield","calendar-o","fire-extinguisher","rocket","maxcdn","chevron-circle-left","chevron-circle-right","chevron-circle-up","chevron-circle-down","html5","css3","anchor","unlock-alt","bullseye","ellipsis-h","ellipsis-v","rss-square","play-circle","ticket","minus-square","minus-square-o","level-up","level-down","check-square","pencil-square","external-link-square","share-square","compass","toggle-down","toggle-up","toggle-right","eur","gbp","usd","inr","jpy","rub","krw","btc","file","file-text","sort-alpha-asc","sort-alpha-desc","sort-amount-asc","sort-amount-desc","sort-numeric-asc","sort-numeric-desc","thumbs-up","thumbs-down","youtube-square","youtube","xing","xing-square","youtube-play","dropbox","stack-overflow","instagram","flickr","adn","bitbucket","bitbucket-square","tumblr","tumblr-square","long-arrow-down","long-arrow-up","long-arrow-left","long-arrow-right","apple","windows","android","linux","dribbble","skype","foursquare","trello","female","male","gittip","sun-o","moon-o","archive","bug","vk","weibo","renren","pagelines","stack-exchange","arrow-circle-o-right","arrow-circle-o-left","toggle-left","dot-circle-o","wheelchair","vimeo-square","turkish-lira","plus-square-o"),
         "description" => __("<div class='flv_icon_change'></div>","torque")
      ),
        array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon effect","torque"),
         "param_name" => "icon_effect",
         "value" => array("none","spin"),
         "description" => __("","torque")
      ),
            array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Uppercase" ,"chemistry"),
         "param_name" => "uppercase",
         "value" => array("no","yes"),
         "description" => __("" ,"chemistry")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Size","torque"),
         "param_name" => "size",
         "value" => array("medium","small","large"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Target","torque"),
         "param_name" => "target",
         "value" => array("_blank","_self","_parent","_top"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Url","torque"),
         "param_name" => "link",
         "value" => __("#","torque"),
         "description" => __("not required","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title","torque"),
         "param_name" => "title",
         "value" => __("","torque"),
         "description" => __("not required","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Data","torque"),
         "param_name" => "data",
         "value" => __("","torque"),
         "description" => __("additional data. Not required","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Extra class name","torque"),
         "param_name" => "xclass",
         "value" => __("","torque"),
         "description" => __("example : 'round'","torque")
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Blog list -----------------------------------------*/
vc_map( array(
   "name" => __("Blog Posts","torque"),
   "base" => "blog_list",
   "class" => "flv_custom_item",
   "icon"=>"app-icons-list-alt",
   "category" => __('Content',"torque"),
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Order by","torque"),
         "param_name" => "orderby",
         "value" => array("none","ID","author","title","name","date","modified","parent","rand","comment_count"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Order","torque"),
         "param_name" => "order",
         "value" => array("asc","desc"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of posts to display","torque"),
         "param_name" => "number",
         "value" => __("4","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Excerpt Length","torque"),
         "param_name" => "excerpt_length",
         "value" => __("200","torque"),
         "description" => __("","torque")
      )
   )
) );
/*--------------------------------------- Dropcap -----------------------------------------*/
vc_map( array(
   "name" => __("Dropcap","torque"),
   "base" => "dropcap",
   "class" => "flv_custom_item",
   "icon"=>"app-icons-bold",
   "category" => __('Content',"torque"),
   "params" => array(
    array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Style","torque"),
         "param_name" => "style",
         "value" => array("basic","square"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("B","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Contact form -----------------------------------------*/
vc_map( array(
   "name" => __("Contact form","torque"),
   "base" => "flvcontactform",
   "class" => "flv_custom_item",
   "icon"=>"icon-contact-add2",
   "category" => __('Content',"torque"),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Email","torque"),
         "param_name" => "to_email",
         "value" => __("","torque"),
         "description" => __("required","torque")
      )
   )
) );
/*--------------------------------------- Subscription form -----------------------------------------*/
vc_map( array(
   "name" => __("Subscription form","torque"),
   "base" => "subscription_form",
   "class" => "flv_custom_item",
   "icon"=>"icon-contact-remove2",
   "category" => __('Content',"torque"),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Email","torque"),
         "param_name" => "email_address",
         "value" => __("","torque"),
         "description" => __("required","torque")
      )
   )
) );
/*--------------------------------------- Google map -----------------------------------------*/
vc_map( array(
   "name" => __("Google map","torque"),
   "base" => "google_map",
   "class" => "flv_custom_item",
   "icon"=>"app-icons-map-marker",
   "category" => __('Content',"torque"),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Latitude","torque"),
         "param_name" => "lat",
         "value" => __("","torque"),
         "description" => __("required","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Longitude","torque"),
         "param_name" => "long",
         "value" => __("","torque"),
         "description" => __("required","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Zoom","torque"),
         "param_name" => "zoom",
         "value" => __("14","torque"),
         "description" => __("not required","torque")
      ),
	   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Scroll","torque"),
         "param_name" => "scroll",
         "value" => array("no","yes"),
         "description" => __("make map scrollable","torque")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Streetview","torque"),
         "param_name" => "streetview",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Width","torque"),
         "param_name" => "width",
         "value" => __("","torque"),
         "description" => __("in px. leave onpty for 100% width","torque")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height","torque"),
         "param_name" => "height",
         "value" => __("450","torque"),
         "description" => __("in px","torque")
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
   )
) );
/*--------------------------------------- Horizontal line -----------------------------------------*/
vc_map( array(
   "name" => __("Styled Horizontal Line","torque"),
   "base" => "hr",
   "class" => "flv_custom_item",
   "icon"=>"icon-pagebreak",
   "category" => __('Content',"torque"),
   "show_settings_on_create" => false
   )
 );


/*--------------------------------------- Icon -----------------------------------------*/
vc_map( array(
   "name" => __("Icon","torque"),
   "base" => "icon",
   "class" => "flv_custom_item",
   "icon"=>"icon-cool2",
   "category" => __('Content',"torque"),
   "params" => array( 
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Type","torque"),
         "param_name" => "type",
         "value" => array("glass","music","search","envelope-0","heart","star","star-o","user","film","th-large","th","th-list","check","times","search-plus","search-minus","power-off","signal","gear","trash-o","home","file-o","clock-o","road","download","arrow-circle-o-down","arrow-circle-o-up","inbox","play-circle-o","rotate-right","refresh","list-alt","lock","flag","headphones","volume-off","volume-down","volume-up","qrcode","barcode","tag","tags","book","bookmark","print","camera","font","bold","italic","text-height","text-width","align-left","align-center","align-right","align-justify","list","dedent","indent","video-camera","picture","pencil","map-marker","adjust","tint","edit","share","check","arrows","step-backward","fast-backward","backward","play","pause","stop","forward","fast-forward","step-forward","eject","chevron-left","chevron-right","plus-circle","minus-sign","times-circle","check-circle","question-circle","info-circle","crosshairs","times-circle-o","check-circle-o","ban","arrow-left","arrow-right","arrow-up","arrow-down","mail-forward","expand","compress","plus","minus","asterisk","exclamation-circle","gift","leaf","fire","eye","eye-slash","warning","plane","calendar","random","comment","magnet","chevron-up","chevron-down","retweet","shopping-cart","folder","folder-open","arrows-v","arrows-h","bar-chart-o","twitter-square","facebook-square","camera-retro","key","cogs","comments","thumbs-o-up","thumbs-o-down","star-half","heart-o","sign-out","linkedin-square","thumb-tack","external-link","sign-in","trophy","github-square","upload","lemon-o","phone","square-o","bookmark-o","phone-square","twitter","facebook","github","unlock","credit-card","rss","hdd-o","bullhorn","bell","certificate","hand-o-right","hand-o-left","hand-o-up","hand-o-down","arrow-circle-left","arrow-circle-right","arrow-circle-up","arrow-circle-down","globe","wrench","tasks","filter","briefcase","arrows-alt","group","link","cloud","flask","cut","copy","paperclip","save","square","bars","list-ul","list-ol","strikethrough","underline","table","magic","truck","pinterest","pinterest-square","google-plus-square","google-plus","money","caret-down","caret-up","caret-left","caret-right","columns","sort","sort-down","sort-up","envelope","linkedin","rotate-left","legal","dashboard","comment-o","comments-o","bolt","sitemap","umbrella","paste","lightbulb-o","exchange","cloud-download","cloud-upload","user-md","stethoscope","suitcase","bell-o","coffee","cutlery","file-text-o","building","hospital-o","ambulance","medkit","fighter-jet","beer","h-square","plus-square","angle-double-left","angle-double-right","angle-double-up","angle-double-down","angle-left","angle-right","angle-up","angle-down","desktop","laptop","tablet","mobile-phone","circle-o","quote-left","quote-right","spinner","circle","reply","github-alt","folder-o","folder-open-o","smile-o","frown-o","meh-o","gamepad","keyboard-o","flag-o","flag-checkered","terminal","code","reply-all","mail-reply-all","star-half-empty","location-arrow","crop","code-fork","unlink","question","info","exclamation","superscript","subscript","eraser","puzzle-piece","microphone","microphone-slash","shield","calendar-o","fire-extinguisher","rocket","maxcdn","chevron-circle-left","chevron-circle-right","chevron-circle-up","chevron-circle-down","html5","css3","anchor","unlock-alt","bullseye","ellipsis-h","ellipsis-v","rss-square","play-circle","ticket","minus-square","minus-square-o","level-up","level-down","check-square","pencil-square","external-link-square","share-square","compass","toggle-down","toggle-up","toggle-right","eur","gbp","usd","inr","jpy","rub","krw","btc","file","file-text","sort-alpha-asc","sort-alpha-desc","sort-amount-asc","sort-amount-desc","sort-numeric-asc","sort-numeric-desc","thumbs-up","thumbs-down","youtube-square","youtube","xing","xing-square","youtube-play","dropbox","stack-overflow","instagram","flickr","adn","bitbucket","bitbucket-square","tumblr","tumblr-square","long-arrow-down","long-arrow-up","long-arrow-left","long-arrow-right","apple","windows","android","linux","dribbble","skype","foursquare","trello","female","male","gittip","sun-o","moon-o","archive","bug","vk","weibo","renren","pagelines","stack-exchange","arrow-circle-o-right","arrow-circle-o-left","toggle-left","dot-circle-o","wheelchair","vimeo-square","turkish-lira","plus-square-o"),
         "description" => __("<div class='flv_icon_change'></div>","torque")
      ),
        array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon effect","torque"),
         "param_name" => "icon_effect",
         "value" => array("none","spin"),
         "description" => __("","torque")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Shadow","torque"),
         "param_name" => "shadow",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Url","torque"),
         "param_name" => "link",
         "value" => __("#","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Target","torque"),
         "param_name" => "target",
         "value" => array("_blank","_self","_parent","_top"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Size","torque"),
         "param_name" => "size",
         "value" => __("23","torque"),
         "description" => __("in px","torque")
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Color","torque"),
         "param_name" => "color",
         "value" => __("#F07057","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Hover Color","torque"),
         "param_name" => "hover_color",
         "value" => __("#ee2465","torque"),
         "description" => __("","torque")
      ),

   )
) );

/*--------------------------------------- Location google image -----------------------------------------*/
vc_map( array(
   "name" => __("Location google image","torque"),
   "base" => "location_img",
   "class" => "flv_custom_item",
   "icon"=>"icon-earth",
   "category" => __('Content',"torque"),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Latitude","torque"),
         "param_name" => "lat",
         "value" => __("","torque"),
         "description" => __("required","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Longitude","torque"),
         "param_name" => "long",
         "value" => __("","torque"),
         "description" => __("required","torque")
      ),
           array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Language","torque"),
         "param_name" => "language",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Zoom","torque"),
         "param_name" => "zoom",
         "value" => __("14","torque"),
         "description" => __("not required","torque")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Width","torque"),
         "param_name" => "width",
         "value" => __("","torque"),
         "description" => __("in px","torque")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height","torque"),
         "param_name" => "height",
         "value" => __("450","torque"),
         "description" => __("in px","torque")
      ),
   )
) );

/*--------------------------------------- Message box -----------------------------------------*/
vc_map( array(
   "name" => __("Message box","torque"),
   "base" => "message_box",
   "class" => "flv_custom_item",
   "icon"=>"icon-info2",
   "category" => __('Content',"torque"),
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Type","torque"),
         "param_name" => "type",
         "value" => array("default","success","warning","error","info"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title","torque"),
         "param_name" => "title",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Search form  -----------------------------------------*/
vc_map( array(
   "name" => __("Search form","torque"),
   "base" => "search",
   "class" => "flv_custom_item",
   "icon"=>"icon-search3",
   "category" => __('Content',"torque"),
   "show_settings_on_create" => false
   )
 );
/*--------------------------------------- Sidebar -----------------------------------------*/
vc_map( array(
   "name" => __("Sidebar","torque"),
   "base" => "sidebar",
   "class" => "flv_custom_item",
   "icon"=>"app-icons-columns",
   "category" => __('Content',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Id of the sidebar","torque"),
         "param_name" => "id",
         "value" => array("sidebar_blog","sidebar1","sidebar2","sidebar3","sidebar4","sidebar5"),
         "description" => __("you can see the ID just under the sidebar. in appearance -> widgets page","torque")
      )
   )
) );
/*--------------------------------------- Span -----------------------------------------*/
vc_map( array(
   "name" => __("Span","torque"),
   "base" => "span",
   "class" => "flv_custom_item",
   "icon"=>"icon-code",
   "category" => __('Content',"torque"),
   "params" => array(

   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Style","torque"),
         "param_name" => "style",
         "value" => array("default","highlight","darkGrey"),
         "description" => __("","torque")
      ),
   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Extra class name","torque"),
         "param_name" => "class",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Service Icon -----------------------------------------*/
vc_map( array(
   "name" => __("Service Icon","torque"),
   "base" => "service_icon",
   "class" => "flv_custom_item",
   "icon"=>"icon-flower",
   "category" => __('Content',"torque"),
   "params" => array(
    array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon type","torque"),
         "param_name" => "type",
          "value" => array("glass","music","search","envelope-0","heart","star","star-o","user","film","th-large","th","th-list","check","times","search-plus","search-minus","power-off","signal","gear","trash-o","home","file-o","clock-o","road","download","arrow-circle-o-down","arrow-circle-o-up","inbox","play-circle-o","rotate-right","refresh","list-alt","lock","flag","headphones","volume-off","volume-down","volume-up","qrcode","barcode","tag","tags","book","bookmark","print","camera","font","bold","italic","text-height","text-width","align-left","align-center","align-right","align-justify","list","dedent","indent","video-camera","picture","pencil","map-marker","adjust","tint","edit","share","check","arrows","step-backward","fast-backward","backward","play","pause","stop","forward","fast-forward","step-forward","eject","chevron-left","chevron-right","plus-circle","minus-sign","times-circle","check-circle","question-circle","info-circle","crosshairs","times-circle-o","check-circle-o","ban","arrow-left","arrow-right","arrow-up","arrow-down","mail-forward","expand","compress","plus","minus","asterisk","exclamation-circle","gift","leaf","fire","eye","eye-slash","warning","plane","calendar","random","comment","magnet","chevron-up","chevron-down","retweet","shopping-cart","folder","folder-open","arrows-v","arrows-h","bar-chart-o","twitter-square","facebook-square","camera-retro","key","cogs","comments","thumbs-o-up","thumbs-o-down","star-half","heart-o","sign-out","linkedin-square","thumb-tack","external-link","sign-in","trophy","github-square","upload","lemon-o","phone","square-o","bookmark-o","phone-square","twitter","facebook","github","unlock","credit-card","rss","hdd-o","bullhorn","bell","certificate","hand-o-right","hand-o-left","hand-o-up","hand-o-down","arrow-circle-left","arrow-circle-right","arrow-circle-up","arrow-circle-down","globe","wrench","tasks","filter","briefcase","arrows-alt","group","link","cloud","flask","cut","copy","paperclip","save","square","bars","list-ul","list-ol","strikethrough","underline","table","magic","truck","pinterest","pinterest-square","google-plus-square","google-plus","money","caret-down","caret-up","caret-left","caret-right","columns","sort","sort-down","sort-up","envelope","linkedin","rotate-left","legal","dashboard","comment-o","comments-o","bolt","sitemap","umbrella","paste","lightbulb-o","exchange","cloud-download","cloud-upload","user-md","stethoscope","suitcase","bell-o","coffee","cutlery","file-text-o","building","hospital-o","ambulance","medkit","fighter-jet","beer","h-square","plus-square","angle-double-left","angle-double-right","angle-double-up","angle-double-down","angle-left","angle-right","angle-up","angle-down","desktop","laptop","tablet","mobile-phone","circle-o","quote-left","quote-right","spinner","circle","reply","github-alt","folder-o","folder-open-o","smile-o","frown-o","meh-o","gamepad","keyboard-o","flag-o","flag-checkered","terminal","code","reply-all","mail-reply-all","star-half-empty","location-arrow","crop","code-fork","unlink","question","info","exclamation","superscript","subscript","eraser","puzzle-piece","microphone","microphone-slash","shield","calendar-o","fire-extinguisher","rocket","maxcdn","chevron-circle-left","chevron-circle-right","chevron-circle-up","chevron-circle-down","html5","css3","anchor","unlock-alt","bullseye","ellipsis-h","ellipsis-v","rss-square","play-circle","ticket","minus-square","minus-square-o","level-up","level-down","check-square","pencil-square","external-link-square","share-square","compass","toggle-down","toggle-up","toggle-right","eur","gbp","usd","inr","jpy","rub","krw","btc","file","file-text","sort-alpha-asc","sort-alpha-desc","sort-amount-asc","sort-amount-desc","sort-numeric-asc","sort-numeric-desc","thumbs-up","thumbs-down","youtube-square","youtube","xing","xing-square","youtube-play","dropbox","stack-overflow","instagram","flickr","adn","bitbucket","bitbucket-square","tumblr","tumblr-square","long-arrow-down","long-arrow-up","long-arrow-left","long-arrow-right","apple","windows","android","linux","dribbble","skype","foursquare","trello","female","male","gittip","sun-o","moon-o","archive","bug","vk","weibo","renren","pagelines","stack-exchange","arrow-circle-o-right","arrow-circle-o-left","toggle-left","dot-circle-o","wheelchair","vimeo-square","turkish-lira","plus-square-o"),
         "description" => __("<div class='flv_ico_service_change'></div>")
      ),
        array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon effect","torque"),
         "param_name" => "icon_effect",
         "value" => array("none","spin"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Style","torque"),
         "param_name" => "style",
         "value" => array("style1","style2","style3"),
         "description" => __("","torque")
      ),
    array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Target","torque"),
         "param_name" => "target",
         "value" => array("_blank","_self","_parent","_top"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("URL","torque"),
         "param_name" => "url",
         "value" => __("","torque"),
         "description" => __("not required","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title","torque"),
         "param_name" => "title",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );
/*--------------------------------------- Pattern background -----------------------------------------*/
vc_map( array(
   "name" => __("Pattern Background Section","torque"),
   "base" => "pattern_background",
   "class" => "flv_custom_item",
   "icon"=>"app-icons-th",
   "category" => __('Content',"torque"),
   "params" => array(
   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Pattern","torque"),
         "param_name" => "pattern",
         "value" => array('slider-bg','texture2','services-texture','tagline','back-body','back-body2','45degreee_fabric','60degree_gray','absurdidad','agsquare','arches','agsquare','batthern','bedge_grunge','beige_paper','bgnoise_lg','billie_holiday','binding_light','blizzard','blu_stripes','brickwall','bright_squares','brillant','brushed_alu','candyhole','cardboard','cardboard_flat','checkered-pattern','chruch','circles','clean_textile','climpek','cloth_alike','concrete_wall_2','concrete_wall_3','cork_1','corrugation','cracks_1','cream_dust','cream_pixels','creampaper','crisp_paper_ruffles','cross_scratches','crosses','cubes','cutcube','daimond_eyes','debut_light','diagonal_striped_brick','diagonal-noise','diamond_upholstery','diamonds','double-lined','dust','egg_shell','elastoplast','embossed_paper','escheresque','escheresque_ste','exclusive_paper','extra_clean_paper','fabric_1','fabric_of_squares_gray','fabric_plaid','fancy_deboss','farmer','first_aid_kit','foggy_birds','frenchstucco','furley_bg','gplaypattern','gradient_squares','graphy','gray_jean','grey','grey_sandbag','grid','grid_noise','grilled','groovepaper','grunge_wall','handmadepaper','hexellence','kindajean','knitted-netting','knitting250px','large_leather','lghtmesh','light_alu','light_checkered_tiles','light_noise_diagonal','light_wool','lightpaperfibers','linedpaper','linen','natural_paper','noise_lines','noise_pattern_with_crosslines','noisy_grid','office','old_mathematics','old-wall','p1','p2','p3','p4','p5','p6','paper','paper_1','paper_2','paper_3','paper_fibers','pinstripe','plaid','polaroid','purty_wood','pw_maze_white','pw_pattern','ravenna','retina_wood','rockywall','rough_diagonal','scribble_light','shinedotted','shl','silver_scales','skelatal_weave','skin','skin_side_up','small-dots','smooth_wall','snow','squairy_light','stitched_wool','strange_bullseyes','struckaxiom','stucco','subtle_dots','subtle_freckles','subtle_grunge','subtle_stripes','subtle-crosslines','subtlenet2','tex2res1','tex2res2','tex2res3','tex2res5','textured_stripes','tileable_wood_texture','triangles_pattern','vintage_speckles','wall','wall4','wavecut','wavegrid','weave','white_bed_sheet','white-brick-wall','white_bed_sheet','white_carbonfiber','white_leather','white_paperboard','white_plaster','white_texture','white_tiles','white_wall','white_wall_hash','white_wall2','white_wave','white-brick-wall','whitediamond','white-diamond','white-paperboard','whitey','wide_rectangles','wild_oliva','witewall_3','wood','wood_pattern','worn-dots'),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) );


/*--------------------------------------- Single Testimonial -----------------------------------------*/
vc_map( array(
   "name" => __("Single Testimonial","torque"),
   "base" => "single_testimonial",
   "class" => "flv_custom_item",
   "icon" => "icon-bubble6",
   "category" => __('Media',"torque"),
   "params" => array(
    array(
            "type" => "attach_image",
            "heading" => __("Image", "js_composer"),
            "param_name" => "image",
            "description" => __("","torque")
        ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Name","torque"),
         "param_name" => "name",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
	array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Url","torque"),
         "param_name" => "url",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Description","torque"),
         "param_name" => "description",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
       array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content","torque"),
         "param_name" => "content",
         "value" => __("Click edit button to change this text.","torque"),
         "description" => __("Enter your content.","torque")
      )
   )
) ); 

/*--------------------------------------- Vimeo -----------------------------------------*/
vc_map( array(
   "name" => __("Vimeo video","torque"),
   "base" => "vimeo",
   "class" => "flv_custom_item",
   "icon"=>"icon-vimeo2",
   "category" => __('Media',"torque"),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("ID of the video","torque"),
         "param_name" => "id",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
	array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height","torque"),
         "param_name" => "height",
         "value" => __("","torque"),
         "description" => __("in px","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Width","torque"),
         "param_name" => "width",
         "value" => __("","torque"),
         "description" => __("in px","torque")
      ),
	array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Autoplay","torque"),
         "param_name" => "autoplay",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
     array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Display in HD format","torque"),
         "param_name" => "hd",
         "value" => array("no","yes"),
         "description" => __("","torque")
      )  
   )
) );  
/*--------------------------------------- Youtube -----------------------------------------*/
vc_map( array(
   "name" => __("Youtube video","torque"),
   "base" => "youtube",
   "class" => "flv_custom_item",
   "icon" => "app-icons-youtube-sign",
   "category" => __('Media',"torque"),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("ID of the video","torque"),
         "param_name" => "id",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
	array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height","torque"),
         "param_name" => "height",
         "value" => __("","torque"),
         "description" => __("in px","torque")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Width","torque"),
         "param_name" => "width",
         "value" => __("","torque"),
         "description" => __("in px","torque")
      ),
	array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Autoplay","torque"),
         "param_name" => "autoplay",
         "value" => array("no","yes"),
         "description" => __("","torque")
      ),
     array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Display in HD format","torque"),
         "param_name" => "hd",
         "value" => array("no","yes"),
         "description" => __("","torque")
      )  
   )
) ); 
/*--------------------------------------- team_members -----------------------------------------*/
vc_map( array(
   "name" => __("Team Members","torque"),
   "base" => "team_members",
   "class" => "flv_custom_item",
   "icon" => "app-icons-user ",
   "category" => __('Social',"torque"),
   "params" => array(
     array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Show Hiring box" ,"chemistry"),
         "param_name" => "show_hiring",
         "value" => array("yes","no"),
         "description" => __("" ,"chemistry")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Hiring Box Url","torque"),
         "param_name" => "hiring_url",
         "value" => __("","torque"),
         "description" => __("","torque")
      ),
	array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Columns","torque"),
         "param_name" => "columns",
         "value" => array("4","3","2"),
         "description" => __("","torque")
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Team Name","torque"),
         "param_name" => "team_name",
         "value" => __("","torque"),
         "description" => __("leave empty to show all team members","torque")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Target","torque"),
         "param_name" => "target",
         "value" => array("_blank","_self","_parent","_top"),
         "description" => __("target for social icons","torque")
      ),
     array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Order","torque"),
         "param_name" => "order",
         "value" => array("asc","desc"),
         "description" => __("","torque")
      ) ,
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Order by","torque"),
         "param_name" => "orderby",
         "value" => array('none','ID','author','title','name','date','modified','rand' ),
         "description" => __("","torque")
      )   
   )
) ); 
/*--------------------------------------- latest_projects -----------------------------------------*/
vc_map( array(
   "name" => __("Latest Projects","torque"),
   "base" => "latest_projects",
   "class" => "flv_custom_item",
   "icon" => "icon-bookmarks",
   "category" => __('Portfolio',"torque"),
   "params" => array(
	array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Style","torque"),
         "param_name" => "style",
         "value" => array("style 1","style 2","style 3"),
         "description" => __("","torque")
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Thumb Height","torque"),
         "param_name" => "thumb_height",
         "value" => array("Custom Thumbnail Size","Default Image Size"),
         "description" => __("","torque")
      ),
     array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of columns","torque"),
         "param_name" => "columns_nr",
         "value" => array("4","3","2"),
         "description" => __("","torque")
      ),
       array(
         "type" => "exploded_textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of total items","torque"),
         "param_name" => "number",
         "value" => __("4","torque"),
         "description" => __("","torque")
      ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Enter the category names","torque"),
         "param_name" => "categories",
         "value" => __("","torque"),
         "description" => __("category names must de separated by comma","torque")
      )
   )
) ); 
 $plugins = get_option('active_plugins');
$required_plugin = 'woocommerce/woocommerce.php';
$debug_queries_on = FALSE;
if ( in_array( $required_plugin , $plugins ) ) {
    $debug_queries_on = TRUE; // Example for yes, it's active
}
 if ($debug_queries_on)
 {
/*--------------------------------------- sort_products -----------------------------------------*/
vc_map( array(
   "name" => __("Woocommerce Sortable Products","torque"),
   "base" => "sort_products",
   "class" => "flv_custom_item",
   "icon" => "icon-cart4",
   "category" => __('Woocommerce',"torque"),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of total products to display","torque"),
         "param_name" => "per_page",
         "value" => __("12","torque"),
         "description" => __("","torque")
      ),
     array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of columns","torque"),
         "param_name" => "columns",
         "value" => array("4","3","2"),
         "description" => __("","torque")
      ),
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Order","torque"),
         "param_name" => "order",
         "value" => array("asc","desc"),
         "description" => __("","torque")
      ) ,
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Order by","torque"),
         "param_name" => "orderby",
         "value" => array('none','ID','author','title','name','date','modified','rand' ),
         "description" => __("","torque")
      ),
      array(
         "type" => "exploded_textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Enter the category names","torque"),
         "param_name" => "categories",
         "value" => __("","torque"),
         "description" => __("category names must de separated by comma","torque")
      ),     
   )
) ); 
}
 }
 