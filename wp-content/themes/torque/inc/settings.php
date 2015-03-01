<?php  global $theme_url;	
$body_font_select=ot_get_option('body_font_select');if(ot_get_option('body_font_custom')) $body_font_select=ot_get_option('body_font_custom');
$menu_font_select=ot_get_option('menu_font_select');if(ot_get_option('menu_font_custom')) $menu_font_select=ot_get_option('menu_font_custom');
$h1_font_select=ot_get_option('h1_font_select');if(ot_get_option('h1_font_custom')) $h1_font_select=ot_get_option('h1_font_custom');
$h2_font_select=ot_get_option('h2_font_select');if(ot_get_option('h2_font_custom')) $h2_font_select=ot_get_option('h2_font_custom');
$h3_font_select=ot_get_option('h3_font_select');if(ot_get_option('h3_font_custom')) $h3_font_select=ot_get_option('h3_font_custom');
$h4_font_select=ot_get_option('h4_font_select');if(ot_get_option('h4_font_custom')) $h4_font_select=ot_get_option('h4_font_custom');
$h5_font_select=ot_get_option('h5_font_select');if(ot_get_option('h5_font_custom')) $h5_font_select=ot_get_option('h5_font_custom');
$h6_font_select=ot_get_option('h6_font_select');if(ot_get_option('h6_font_custom')) $h6_font_select=ot_get_option('h6_font_custom');
 if($body_font_select!='' && $body_font_select!="default") {?><link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($body_font_select); ?>" rel="stylesheet" type="text/css" />  <?php } 
 if($menu_font_select!='' && $menu_font_select!="default") {?><link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($menu_font_select); ?>" rel="stylesheet" type="text/css" />   <?php }
 if($h1_font_select!='' && $h1_font_select!="default") {?> <link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($h1_font_select); ?>" rel="stylesheet" type="text/css" />   <?php } 
 if($h2_font_select!='' &&  $h2_font_select !="default") {?> <link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($h2_font_select); ?>" rel="stylesheet" type="text/css" />   <?php } 
 if($h3_font_select!='' && $h3_font_select !="default") {?> <link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($h3_font_select); ?>" rel="stylesheet" type="text/css" />   <?php }
 if($h4_font_select!='' && $h4_font_select !="default") {?> <link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($h4_font_select); ?>" rel="stylesheet" type="text/css" />   <?php }
 if($h5_font_select!='' && $h5_font_select !="default") {?> <link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($h5_font_select); ?>" rel="stylesheet" type="text/css" />   <?php }
 if($h6_font_select!='' && $h6_font_select !="default") {?> <link href="http://fonts.googleapis.com/css?family=<?php echo esc_attr($h6_font_select); ?>" rel="stylesheet" type="text/css" />   <?php }

/* if($menu_font_select!='default' && $menu_font_select!='' || $h1_font_select!='default' && $h1_font_select!='' || $h2_font_select!='default' && $h2_font_select!='' || $h3_font_select!='default' && $h3_font_select!='' || $h4_font_select!='default' && $h4_font_select!='' || $h5_font_select!='default' && $h5_font_select!='' || $h6_font_select!='default' && $h6_font_select!='' || $Slider_font_select!='default' && $Slider_font_select!=''  || $body_font_select!='default' && $body_font_select!=''){?> */ 
 ?>	
 <style type="text/css">
.woocommerce .price,.button,.one_fourth,.one_half,.three_fourth,.one_third,.one-third,.sixteen,.fifteen,.one_third,.a-tab,p,.jstwitter,ul li, ol li,.footerCredits .columns,.textwidget,.port-item-container,#contact small,.blog-meta,#calendar_wrap{
	<?php if($body_font_select!="default"){ ?>font-family:"<?php echo esc_attr($body_font_select); ?>" ,Helvetica, Arial, sans-serif !important;<?php } ?>
 	font-weight:<?php echo ot_get_option('body_font_weight_select');?> !important;
 	<?php $italic0=ot_get_option('body_font_style_select'); if(isset($italic0[0]) && $italic0[0]=="italic"){ echo "font-style:italic;";} ?>
 	<?php if(ot_get_option('body_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('body_font_size_select');?>px; <?php } ?>}
 	
 	ul.menu li a{<?php if($menu_font_select!="default"){ ?>font-family:"<?php echo esc_attr($menu_font_select); ?>" ,Helvetica, Arial, sans-serif !important;<?php } ?> 
 	font-weight:<?php echo ot_get_option('menu_font_weight_select');?> !important;
 	<?php $italic1=ot_get_option('menu_font_style_select'); if(isset($italic1[0]) && $italic1[0]=="italic") {echo esc_attr("font-style:italic!important"); }?>
 	<?php if(ot_get_option('menu_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('menu_font_size_select');?>px !important; <?php } ?>}
 	
 	h1{<?php if($h1_font_select!="default"){ ?>font-family:"<?php echo esc_attr($h1_font_select); ?>", Arial, Helvetica, sans-serif !important;<?php } ?>
 	font-weight:<?php echo ot_get_option('h1_font_weight_select');?> !important;
 	<?php $italic2=ot_get_option('h1_font_style_select'); if(isset($italic2[0]) && $italic2[0]=="italic") {echo esc_attr("font-style:italic;"); }?>
 	<?php if(ot_get_option('h1_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('h1_font_size_select');?>px; <?php } ?>}
 	
 	h2{<?php if( $h2_font_select !="default"){ ?>font-family:"<?php echo esc_attr($h2_font_select); ?>", Arial, Helvetica, sans-serif !important;<?php } ?>
 	font-weight:<?php echo ot_get_option('h2_font_weight_select');?> !important;
 	<?php $italic3=ot_get_option('h2_font_style_select'); if(isset($italic3[0]) && $italic3[0]=="italic") {echo esc_attr("font-style:italic;"); }?>
 	<?php if(ot_get_option('h2_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('h2_font_size_select');?>px; <?php } ?>}
 	
 	h3{<?php if($h3_font_select !="default"){ ?>font-family:"<?php echo esc_attr($h3_font_select); ?>", Arial, Helvetica, sans-serif !important;<?php } ?>
 	font-weight:<?php echo ot_get_option('h3_font_weight_select');?> !important;
 	<?php $italic4=ot_get_option('h3_font_style_select'); if(isset($italic4[0]) && $italic4[0]=="italic"){ echo esc_attr("font-style:italic;");} ?>
 	<?php if(ot_get_option('h3_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('h3_font_size_select');?>px; <?php } ?>}
 	
 	h4{<?php if($h4_font_select !="default"){ ?>font-family:"<?php echo $h4_font_select; ?>", Arial, Helvetica, sans-serif !important;<?php } ?>
 	font-weight:<?php echo ot_get_option('h4_font_weight_select');?> !important;
 	<?php $italic5=ot_get_option('h4_font_style_select'); if(isset($italic5[0]) && $italic5[0]=="italic"){ echo esc_attr("font-style:italic;");} ?>
 	<?php if(ot_get_option('h4_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('h4_font_size_select');?>px; <?php } ?>}
 	
 	h5{<?php if($h5_font_select !="default"){ ?>font-family:"<?php echo esc_attr($h5_font_select); ?>", Arial, Helvetica, sans-serif !important;<?php } ?>
 	font-weight:<?php echo ot_get_option('h5_font_weight_select');?> !important;
 	<?php $italic6=ot_get_option('h5_font_style_select'); if(isset($italic6[0]) && $italic6[0]=="italic") {echo esc_attr("font-style:italic;");} ?>
 	<?php if(ot_get_option('h5_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('h5_font_size_select');?>px; <?php } ?>}
 	
 	h6{<?php if($h6_font_select !="default"){ ?>font-family:"<?php echo esc_attr($h6_font_select); ?>", Arial, Helvetica, sans-serif !important;<?php } ?>
 	font-weight:<?php echo  ot_get_option('h6_font_weight_select');?> !important;
 	<?php $italic7=ot_get_option('h6_font_style_select'); if(isset($italic7[0]) && $italic7[0]=="italic") {echo esc_attr("font-style:italic;");} ?>
 	<?php if(ot_get_option('h6_font_size_select') !=""){ ?>font-size:<?php echo ot_get_option('h6_font_size_select');?>px; <?php } ?>}
 	
 		</style><?php /*}*/

  
 global $wp_query;
 if(is_404())$page_title="404";   elseif(is_category())$page_title="category"; elseif(is_search())$page_title="search";	else  $page_title = strtolower($wp_query->post->post_title);
 $page_id= torque_get_page_id($page_title); 
 if( is_single()){$page_id=get_the_ID();	}
 if(is_home() || is_archive() || is_search())  {$out_title=get_the_title( get_option('page_for_posts', true));$page_id=torque_get_page_id($out_title);}
 
   $plugins = get_option('active_plugins');$required_plugin = 'woocommerce/woocommerce.php';$debug_queries_on = FALSE;
if(is_array($plugins))if ( in_array( $required_plugin , $plugins ) ) {    $debug_queries_on = TRUE;  }
if ($debug_queries_on && is_woocommerce()) {
	if(is_shop())$page_id=woocommerce_get_page_id( 'shop' );
}

 $bg_col=get_post_meta($page_id, 'dbt_bgcolor', TRUE );
 $bg_img=get_post_meta($page_id, 'dbt_bgimg', TRUE );
 $bg_img_w=get_post_meta($page_id, 'dbt_bgimgw', TRUE );
 $bg_img_h=get_post_meta($page_id, 'dbt_bgimgh', TRUE );
 $bg_img_repeat=get_post_meta($page_id, 'dbt_bgrepeat', TRUE );
 $bg_img_pos=get_post_meta($page_id, 'dbt_bgpos', TRUE ); 
 $bg_stretch=get_post_meta($page_id, 'dbt_bgpattern_fix', TRUE ); 

 $sticky_menu=ot_get_option('sticky_menu');	
 $theme_color=ot_get_option("theme_color");if($theme_color==''){$theme_color="#e6624d";}
 $theme_color_schema=ot_get_option("theme_color_schema");if($theme_color_schema==''){$theme_color_schema="orange";}
 
if($theme_color_schema=="red"){$theme_color="#e55151";}
elseif($theme_color_schema=="orange"){$theme_color="#e6624d";}
elseif($theme_color_schema=="yellow"){$theme_color="#bb9113";}
elseif($theme_color_schema=="lime"){$theme_color="#72d23e";}
elseif($theme_color_schema=="green"){$theme_color="#22d07c";}
elseif($theme_color_schema=="teal"){$theme_color="#2bcdb8";}
elseif($theme_color_schema=="blue"){$theme_color="#46ace7";}
elseif($theme_color_schema=="purple"){$theme_color="#9770c6";}
elseif($theme_color_schema=="pink"){$theme_color="#e656a0";}
elseif($theme_color_schema=="black"){$theme_color="#333333";}
 
 $footer_rainbow=ot_get_option('footer_rainbow');	
 $header_rainbow=ot_get_option('header_rainbow');	
 
 $disable_header_bg=ot_get_option('disable_header_bg');	
 $header_bg=ot_get_option('header_bg');if($header_bg==''){$header_bg=THEME_URL . 'img/pageheader_bg.jpg';}	
 $disable_header_overlay=ot_get_option('disable_header_overlay');	
 $header_overlay=ot_get_option('header_overlay');if($header_overlay==''){$header_overlay= '#434952';}	
 $header_overlay_opacity=ot_get_option('header_overlay_opacity');if($header_overlay_opacity==''){$header_overlay_opacity= '0.95';}	

 $woo_btn_color=ot_get_option("woo_btn_color");if($woo_btn_color=='')$woo_btn_color="orange";
 $woo_btn_general_color=ot_get_option("woo_btn_general_color");if($woo_btn_general_color=='')$woo_btn_general_color="orange";
 $woo_btn_size=ot_get_option("woo_btn_general_size");if($woo_btn_size=='')$woo_btn_size="medium";
 $woo_btn_sidebar_size=ot_get_option("woo_btn_sidebar_size");if($woo_btn_sidebar_size=='')$woo_btn_sidebar_size="small";
 

 $mobile_sliding='';if(ot_get_option("mobile_menu_sliding")){$mobile_sliding=ot_get_option("mobile_menu_sliding");}
 $mobile_color='light';if(ot_get_option("mobi_menu_color")){$mobile_color=ot_get_option("mobi_menu_color");}
 
  ?>

<?php if($bg_stretch=="on" && $bg_img!=""){ ?>
<script type="text/javascript">jQuery(document).ready(function(){jQuery.backstretch("<?php echo esc_attr($bg_img);?>");});</script>
<?php } ?>

<?php if(isset($mobile_sliding[0]) && $mobile_sliding[0]=="yes"){ ?>
<script type="text/javascript">jQuery(function() { jQuery("#menu").clone().attr('id', 'menu-desktop' ).insertBefore("#menu");jQuery("#menu").mmenu({  transitionDuration: 2000,  position: "left",   zposition: "front",   slidingSubmenus: true,   classes: "mm-<?php echo esc_attr($mobile_color); ?>" 	  });});</script>
<?php } else {  ?>
<script type="text/javascript">jQuery(function() { jQuery("#menu").clone().attr('id', 'menu-desktop' ).insertBefore("#menu");jQuery("#menu").mmenu({  transitionDuration: 2000,  position: "left",  zposition: "front",   slidingSubmenus: false,   classes: "mm-<?php echo esc_attr($mobile_color); ?>"	  });});</script>
<?php } ?>
<style  type="text/css">
/* start body */
body{
<?php if($bg_img!=""){?>background-image:url(<?php echo $bg_img;?>);<?php } ?>
background-color: <?php echo esc_attr("#".$bg_col);?>;
background-repeat: <?php echo esc_attr($bg_img_repeat.' ');?>;
background-position: <?php echo esc_attr($bg_img_pos);?>;
background-size:<?php echo esc_attr($bg_img_w.' '); echo esc_attr($bg_img_h);?>; 
<?php if($bg_img_repeat=="fixed"){?>background-attachment:fixed;<?php } ?>
} /* end body */

<?php if(!isset($disable_header_bg[0]) || $disable_header_bg[0]!="yes"){  ?>	
#page_header { background: url(<?php echo esc_attr($header_bg);?>) no-repeat scroll center center / cover rgba(0, 0, 0, 0);}
<?php } else { ?>#page_header h3{color:#9CA2AA;}<?php } ?>

<?php if(!isset($disable_header_overlay[0]) || $disable_header_overlay[0]!="yes"){?>	
#page_header:before {    background: <?php echo $header_overlay;?>;    opacity: <?php echo esc_attr($header_overlay_opacity);?>;   }
<?php } ?>

<?php if(isset($sticky_menu[0]) && $sticky_menu[0]=="yes"){?>
#header{position:relative !important;}	#page_header{	margin-top:0px;}
<?php } else { ?>
body.admin-bar #header {    top: 32px;}
<?php } ?>
<?php if(isset($header_rainbow[0]) && $header_rainbow[0]=="yes"){?>
#header:before{background:none; }
<?php } ?>
<?php if(isset($footer_rainbow[0]) && $footer_rainbow[0]=="yes"){?>
#main_footer:before{background:none;}	
<?php } ?>

/* THEME  MAIN COLOR */
p a,h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,blockquote,ul.list li i.text_color,
ul.list_2 li i,.list_2 ul li i,.avatar_title h5 span a,#header nav ul li.dropdown ul li a:hover,#page_header ul li a,
.feature_icon,.features_pushed:before,.pagination_menu i:hover,.meta li a:hover,.meta-categories a:hover,.widget_categories li h6 a,
.mini_post header h6:hover, .mini_post li:hover,#main_footer .col ul li a:hover,.pricing_column h2,
.tabs > ul li a.inactive:hover,.accordion h2:hover, .accordion h3:hover, .accordion h4:hover, .accordion h5:hover, .accordion h6:hover,
.text_color,.footer-contact i, .tweet_list li i,.widget_archive a:hover,.widget_recent_comments a:hover,.blog-single-tags a:hover
{color:<?php echo esc_attr($theme_color); ?> ;} 

.dropcap_alt,blockquote.alt2,.img_overlay,.coloured_wrapper.defaultcolor_wrap:before,.meta-button:hover,.tagcloud a:hover,
#totop:hover,.pricing_column.active,.highlight
{background:<?php echo esc_attr($theme_color); ?> ;} 

::selection{background:<?php echo esc_attr($theme_color); ?>;color:#fff;} 
::-moz-selection{background:<?php echo esc_attr($theme_color); ?> ;color:#fff;} 

blockquote{border-left: 2px solid <?php echo esc_attr($theme_color); ?>;}
.features:hover .feature_icon{
	background: <?php echo esc_attr($theme_color); ?>;
	border: 1px solid <?php echo esc_attr($theme_color); ?>;
	background-image: -o-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
	background-image: -ms-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
	background-image: -moz-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
	background-image: -webkit-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
}
.notification{
	border: 1px solid <?php echo esc_attr($theme_color); ?>;
	background: <?php echo esc_attr($theme_color); ?>;
	background-image: -o-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
	background-image: -ms-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
	background-image: -moz-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
	background-image: -webkit-linear-gradient(top, <?php echo esc_attr($theme_color); ?>, <?php echo esc_attr($theme_color); ?>);
	
}
<?php 

if($theme_color_schema=="red"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_red.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #e55151;	border: 1px solid #bb2424;background-image: -o-linear-gradient(top, #f25e5e, #e55151);	background-image: -ms-linear-gradient(top, #f25e5e, #e55151);	background-image: -moz-linear-gradient(top, #f25e5e, #e55151);	background-image: -webkit-linear-gradient(top, #f25e5e, #e55151);}.btn_color:hover{color: #fff;background: #f25151;background-image: -o-linear-gradient(top, #ff5e5e, #f25151);	background-image: -ms-linear-gradient(top, #ff5e5e, #f25151);	background-image: -moz-linear-gradient(top, #ff5e5e, #f25151);	background-image: -webkit-linear-gradient(top, #ff5e5e, #f25151);}.btn_color:active{	background: #e55151;background-image: -o-linear-gradient(bottom, #f25e5e, #e55151);	background-image: -ms-linear-gradient(bottom, #f25e5e, #e55151);background-image: -moz-linear-gradient(bottom, #f25e5e, #e55151);background-image: -webkit-linear-gradient(bottom, #f25e5e, #e55151);}');}
elseif($theme_color_schema=="orange" || $theme_color_schema=="custom"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_orange.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{text-shadow: 0 1px 1px rgba(0,0,0,0.2);color: #fff;border: 1px solid #c94e3a;border-right: 0;background: #e6624d;background-image: -o-linear-gradient(top, #f36f5a, #e6624d);background-image: -ms-linear-gradient(top, #f36f5a, #e6624d);background-image: -moz-linear-gradient(top, #f36f5a, #e6624d);background-image: -webkit-linear-gradient(top, #f36f5a, #e6624d);}.btn_color:hover{text-shadow: 0 1px 1px rgba(0,0,0,0.2);	color: #fff;background: #f36f5a;background-image: -o-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -ms-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -moz-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -webkit-linear-gradient(top, #ff7c67, #f36f5a);}.btn_color:active{	text-shadow: 0 1px 1px rgba(0,0,0,0.2);color: #fff;background: #e6624d;background-image: -o-linear-gradient(bottom, #f36f5a, #e6624d);	background-image: -ms-linear-gradient(bottom, #f36f5a, #e6624d);background-image: -moz-linear-gradient(bottom, #f36f5a, #e6624d);background-image: -webkit-linear-gradient(bottom, #f36f5a, #e6624d);}');}
elseif($theme_color_schema=="yellow"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_yellow.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{text-shadow: 0 1px 1px rgba(255,255,255,0.2);	color: #bb9113;	background: #f7d15e;border: 1px solid #d4ae39;background-image: -o-linear-gradient(top, #ffde6b, #f7d15e);background-image: -ms-linear-gradient(top, #ffde6b, #f7d15e);background-image: -moz-linear-gradient(top, #ffde6b, #f7d15e);background-image: -webkit-linear-gradient(top, #ffde6b, #f7d15e);}.btn_color:hover{color: #bb9113;background: #ffde6b;background-image: -o-linear-gradient(top, #ffeb78, #ffde6b);background-image: -ms-linear-gradient(top, #ffeb78, #ffde6b);background-image: -moz-linear-gradient(top, #ffeb78, #ffde6b);background-image: -webkit-linear-gradient(top, #ffeb78, #ffde6b);}.btn_color:active{	background: #ffde6b;background-image: -o-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -ms-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -moz-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -webkit-linear-gradient(bottom, #ffeb78, #ffde6b);}');}
elseif($theme_color_schema=="lime"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_lime.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #72d23e;border: 1px solid #4aac14;background-image: -o-linear-gradient(top, #7ddd49, #72d23e);background-image: -ms-linear-gradient(top, #7ddd49, #72d23e);background-image: -moz-linear-gradient(top, #7ddd49, #72d23e);background-image: -webkit-linear-gradient(top, #7ddd49, #72d23e);}.btn_color:hover{color: #fff;background: #7cdc48;background-image: -o-linear-gradient(top, #87e753, #7cdc48);background-image: -ms-linear-gradient(top, #87e753, #7cdc48);background-image: -moz-linear-gradient(top, #87e753, #7cdc48);	background-image: -webkit-linear-gradient(top, #87e753, #7cdc48);}.btn_color:active{background: #72d23e;background-image: -o-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -ms-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -moz-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -webkit-linear-gradient(bottom, #7ddd49, #72d23e);}');}
elseif($theme_color_schema=="green"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_green.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #22d07c;border: 1px solid #1ba964;background-image: -o-linear-gradient(top, #2fdd89, #22d07c);background-image: -ms-linear-gradient(top, #2fdd89, #22d07c);background-image: -moz-linear-gradient(top, #2fdd89, #22d07c);background-image: -webkit-linear-gradient(top, #2fdd89, #22d07c);}.btn_color:hover{color: #fff;background: #2fdd89;background-image: -o-linear-gradient(top, #3cea96, #2fdd89);background-image: -ms-linear-gradient(top, #3cea96, #2fdd89);background-image: -moz-linear-gradient(top, #3cea96, #2fdd89);	background-image: -webkit-linear-gradient(top, #3cea96, #2fdd89);}.btn_color:active{background: #22d07c;	background-image: -o-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -ms-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -moz-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -webkit-linear-gradient(bottom, #2fdd89, #22d07c);}');}
elseif($theme_color_schema=="teal"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_teal.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #2bcdb8;border: 1px solid #1bae8d;background-image: -o-linear-gradient(top, #38dac5, #2bcdb8);background-image: -ms-linear-gradient(top, #38dac5, #2bcdb8);background-image: -moz-linear-gradient(top, #38dac5, #2bcdb8);background-image: -webkit-linear-gradient(top, #38dac5, #2bcdb8);}.btn_color:hover{color: #fff;background: #38dac5;background-image: -o-linear-gradient(top, #45e7d2, #38dac5);background-image: -ms-linear-gradient(top, #45e7d2, #38dac5);background-image: -moz-linear-gradient(top, #45e7d2, #38dac5);	background-image: -webkit-linear-gradient(top, #45e7d2, #38dac5);}.btn_color:active{background: #22d07c;background-image: -o-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -ms-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -moz-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -webkit-linear-gradient(bottom, #38dac5, #2bcdb8);}');}
elseif($theme_color_schema=="blue"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_blue.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #46ace7;border: 1px solid #2787be;background-image: -o-linear-gradient(top, #53b9f4, #46ace7);background-image: -ms-linear-gradient(top, #53b9f4, #46ace7);background-image: -moz-linear-gradient(top, #53b9f4, #46ace7);background-image: -webkit-linear-gradient(top, #53b9f4, #46ace7);}.btn_color:hover{color: #fff;background: #53b9f4;	background-image: -o-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -ms-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -moz-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -webkit-linear-gradient(top, #60c6ff, #53b9f4);}.btn_color:active{	background: #46ace7;background-image: -o-linear-gradient(bottom, #53b9f4, #46ace7);	background-image: -ms-linear-gradient(bottom, #53b9f4, #46ace7);background-image: -moz-linear-gradient(bottom, #53b9f4, #46ace7);background-image: -webkit-linear-gradient(bottom, #53b9f4, #46ace7);}');}
elseif($theme_color_schema=="purple"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_purple.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #9770c6;	border: 1px solid #8254b8;	background-image: -o-linear-gradient(top, #a47dd3, #9770c6);background-image: -ms-linear-gradient(top, #a47dd3, #9770c6);background-image: -moz-linear-gradient(top, #a47dd3, #9770c6);background-image: -webkit-linear-gradient(top, #a47dd3, #9770c6);}.btn_color:hover{color: #fff;background: #a47dd3;background-image: -o-linear-gradient(top, #b18ae0, #a47dd3);background-image: -ms-linear-gradient(top, #b18ae0, #a47dd3);background-image: -moz-linear-gradient(top, #b18ae0, #a47dd3);background-image: -webkit-linear-gradient(top, #b18ae0, #a47dd3);}.btn_color:active{	background: #9770c6;	background-image: -o-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -ms-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -moz-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -webkit-linear-gradient(bottom, #a47dd3, #9770c6);}');}
elseif($theme_color_schema=="pink"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_pink.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #e656a0;	border: 1px solid #b94882;	background-image: -o-linear-gradient(top, #f363ad, #e656a0);background-image: -ms-linear-gradient(top, #f363ad, #e656a0);background-image: -moz-linear-gradient(top, #f363ad, #e656a0);background-image: -webkit-linear-gradient(top, #f363ad, #e656a0);}.btn_color:hover{color: #fff;background: #f363ad;background-image: -o-linear-gradient(top, #ff70ba, #f363ad);background-image: -ms-linear-gradient(top, #ff70ba, #f363ad);background-image: -moz-linear-gradient(top, #ff70ba, #f363ad);background-image: -webkit-linear-gradient(top, #ff70ba, #f363ad);}.btn_color:active{background: #e656a0;background-image: -o-linear-gradient(bottom, #f363ad, #e656a0);background-image: -ms-linear-gradient(bottom, #f363ad, #e656a0);background-image: -moz-linear-gradient(bottom, #f363ad, #e656a0);	background-image: -webkit-linear-gradient(bottom, #f363ad, #e656a0);}');}
elseif($theme_color_schema=="black"){echo esc_attr('.vertical_tabs ul li.active:after{background: url('.THEME_URL.'img/buttontip_black.png);}.features:hover .feature_icon, .notification, .vertical_tabs ul li.active, .btn_color{background: #444;	border: 1px solid #333;	background-image: -o-linear-gradient(top, #505050, #444);	background-image: -ms-linear-gradient(top, #505050, #444);	background-image: -moz-linear-gradient(top, #505050, #444);	background-image: -webkit-linear-gradient(top, #505050, #444);}.btn_color:hover{color: #fff;background: #4e4e4e;background-image: -o-linear-gradient(top, #595959, #4e4e4e);background-image: -ms-linear-gradient(top, #595959, #4e4e4e);background-image: -moz-linear-gradient(top, #595959, #4e4e4e);background-image: -webkit-linear-gradient(top, #595959, #4e4e4e);}.btn_color:active{	background: #444;	background-image: -o-linear-gradient(bottom, #505050, #444);background-image: -ms-linear-gradient(bottom, #505050, #444);background-image: -moz-linear-gradient(bottom, #505050, #444);background-image: -webkit-linear-gradient(bottom, #505050, #444);}');}
?>
</style>

<?php if(ot_get_option('extra_css')!=''){echo '<style>'.ot_get_option('extra_css').'</style>';} ?>	
<script type="text/javascript"> window.theme_url = "<?php echo esc_attr(THEME_URL); ?>";var $j = jQuery.noConflict();
jQuery(window).load(function () {
	$j(".woocommerce a.button,.woocommerce input.button,.woocommerce button.button").addClass("btn <?php echo esc_attr($woo_btn_general_color); ?> <?php echo esc_attr($woo_btn_size); ?>");
	$j("aside.sidebar .woocommerce a.button,aside.sidebar .woocommerce button.button,aside.sidebar .woocommerce input.button").removeClass("small medium large").addClass("<?php echo esc_attr($woo_btn_sidebar_size); ?>");
	$j(".add_to_cart_button,.single_add_to_cart_button").removeClass("lime white red orange yellow green teal blue purple black grey").addClass("btn <?php echo esc_attr($woo_btn_size); ?>  <?php echo esc_attr($woo_btn_color); ?>").removeClass("button"); 
	$j(".woocommerce a.button,.woocommerce input.button,.woocommerce button.button,aside.sidebar .woocommerce a.button,aside.sidebar .woocommerce button.button,aside.sidebar .woocommerce input.button").removeClass("button");

setTimeout(function(){
jQuery('.woocommerce #payment input#place_order').removeClass("button").addClass("btn <?php echo esc_attr($woo_btn_general_color); ?> <?php echo esc_attr($woo_btn_size); ?>");
}, 2000);

});
$j(document).ready(function() {
	$j(".woocommerce a.button,.woocommerce input.button,.woocommerce button.button,.woocommerce input#submit").addClass("btn <?php echo esc_attr($woo_btn_general_color); ?> <?php echo esc_attr($woo_btn_size); ?>");
	$j("aside.sidebar .woocommerce a.button,aside.sidebar .woocommerce button.button,aside.sidebar .woocommerce input.button").removeClass("small medium large").addClass("<?php echo esc_attr($woo_btn_sidebar_size); ?>");
	$j(".add_to_cart_button,.single_add_to_cart_button").removeClass("lime white red orange yellow green teal blue purple black grey").addClass("btn <?php echo esc_attr($woo_btn_sidebar_size); ?>  <?php echo esc_attr($woo_btn_color); ?>").removeClass("button"); 
	$j(".woocommerce a.button,.woocommerce input.button,.woocommerce button.button,aside.sidebar .woocommerce a.button,aside.sidebar .woocommerce button.button,aside.sidebar .woocommerce input.button").removeClass("button");

	});
</script>



