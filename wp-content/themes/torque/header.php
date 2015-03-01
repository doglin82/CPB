<?php if(isset($_POST['flv_submitted'])) {$fields=ot_get_option('contact_fields');if($ymaill=='')$ymaill=ot_get_option('c_email');  torque_send_message($fields,$ymaill);} 
if(isset($_POST['submitted_news'])) {$ymaill=$_POST['news_address'];  torque_send_subs_mail($ymaill);}?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if gte IE 9 ]><html class="no-js ie9" lang="en"> <![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" /><title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" /><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php /*favicon*/ $favicon = "#"; if (ot_get_option('favico')) $favicon = ot_get_option('favico'); ?>
<link rel="shortcut icon" href="<?php echo esc_attr($favicon); ?>" type="image/x-icon" /><link rel="apple-touch-icon" href="images/apple-touch-icon.png"><link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png"><link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
<?php	wp_head();  ?>
</head>
<?php 
/* body class */

global $post; if(isset($post->ID)) $postid = $post->ID; global $wp_query;

 if(is_404()){$page_title="404";   } 
 elseif(is_category()){$page_title="category";	}
 elseif(isset($wp_query->post->post_title)){  $page_title = strtolower($wp_query->post->post_title);}
 else {$page_title ="404";}
 $postid= torque_get_page_id($page_title); 
 if( is_single()){$postid=get_the_ID();	} if(is_home() || is_archive() || is_search())  {$out_title=get_the_title( get_option('page_for_posts', true));$postid=torque_get_page_id($out_title);}
 
$plugins = get_option('active_plugins');$required_plugin = 'woocommerce/woocommerce.php';$debug_queries_on = FALSE;
if(is_array($plugins))if ( in_array( $required_plugin , $plugins ) ) {    $debug_queries_on = TRUE;  }
if ($debug_queries_on && is_woocommerce()) {
	if(is_shop())$page_id=woocommerce_get_page_id( 'shop' );
}

 $boxed=ot_get_option("enable_boxed");  
 $class='';$class2='';
 if($boxed=="yes"){$class="flv_boxed";$class2="flv_body";}
 
 /* end body class */
?>
<body <?php body_class("fadein"); ?>>

<?php if(is_home()){
		$out_title=get_the_title(get_option('page_for_posts', true));	
		$our_id=torque_get_page_id($out_title);	
		$postid=$our_id;} ?>
 
<!-- Header -->
<header id="header"> <div class="container"><!-- CONTAINER -->
<!-- Logo -->					
<?php 
$lurl=get_home_url();if(ot_get_option("logo_url")) {$lurl=ot_get_option("logo_url"); }  $logo=ot_get_option("logo");   if($logo==''){$logo= THEME_URL . 'img/logo.png';}
$logo_w=ot_get_option("logo_w");$logo_h=ot_get_option("logo_h");			
?>
<a href="<?php echo esc_url($lurl); ?>" id="nav_logo"><img class="img-responsive" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" src="<?php echo esc_attr($logo); ?>" <?php if($logo_w!=''){ ?> width="<?php echo esc_attr($logo_w); ?>" <?php } ?> <?php if($logo_h!=''){ ?> height="<?php echo esc_attr($logo_h); ?>" <?php } ?>  /></a>


<ul class="socialicons">
    <?php 	$smicons=ot_get_option('social_icons');	if($smicons){   $slides = $smicons;
	foreach ($slides as $slide) {
	echo '<li><a target="'. $slide['social_icon_target'].'"  href="' . $slide['social_icon_url'] . '" title="' . $slide['title'] . '"><i class="fa fa-' . $slide['social_icon_type'] . '"></i></a></li>';
	 }	}	?>
          </ul>
          
<div id="nav_search"><!-- SEARCH -->
            	<form role="search" id="nav_searchbox"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
               		<input type="text" class="form-control"   value="<?php echo esc_attr( get_search_query() ); ?>" name="s"  title="<?php echo esc_attr_x( 'Search for:', 'label', 'torque' ); ?>">
             		 <input type="submit" value="Search" class="display_none" />
            		</form>
			</div><!-- SEARCH END -->
            
            <div id="mobile_nav"><a href="#menu"></a></div><!-- MOBILE SELECT NAV -->
            <nav id="menu"><!-- MAIN NAVIGATION -->
            	
		<?php	$menuid=get_nav_menu_locations(); 
		if (torque_isMobile() == TRUE) {
			$menuname = (ot_get_option('mobi_menu'));
			if ($menuname != ''){
			wp_nav_menu( array( 'menu' => $menuname,'container'=>false ,  'walker'=>new torque_description_walker1()) ); 	
			}else{
			if($menuid["primary"]==0){	
			}else{
			wp_nav_menu( array( 'theme_location' => 'primary','container'=>false ,  'walker'=>new torque_description_walker1()) ); }}
			}
			else{
			if(isset($menuid["primary"]) && $menuid["primary"]==0){		
			}else{	wp_nav_menu( array( 'theme_location' => 'primary','container'=>false , 'walker'=>new torque_description_walker1()) ); }	
			} ?>
</nav>
</div>
</header>
<?php 

$hide_bread=get_post_meta($postid, 'dbt_hide_title', TRUE);  
$template = get_post_meta($postid, '_wp_page_template', true );
if($template== 'portfolio-template.php'){$hide_bread=get_post_meta($postid, 'dbt_hide_title_port', TRUE); }
$hide_bread_port="no"; $options = get_option('flv_port_admin_settings' );$hide_bread_port=$options['port_single_bread']; 
$section1type=$options['port_single_show_header'];

if(!is_404())
if($hide_bread!="on" && (is_archive() || is_search())){ 
/*get archives header*/
if(is_search()){ $search_query = get_search_query(); $this_header =  "Search : " .$search_query; }

elseif(function_exists ("is_product_category") && is_product_category()){ $this_header= single_cat_title('', false);}
elseif(function_exists ("is_product_tag") && is_product_tag()){  $this_header= single_tag_title('', false); } 
	 
else if ( is_category() ) { $this_header =  "Category: " .single_cat_title("", false); }
else if ( is_tag() ) { $this_header = "Tag: " .single_tag_title("", false); }
else if ( is_author() ) {if(get_query_var('author_name')) : $curauth = get_user_by('slug', get_query_var('author_name'));else :    $curauth = get_userdata(get_query_var('author'));endif;  $this_header =$curauth->nickname; }
else if ( is_day() ) { $this_header = "Daily archives for " . get_the_date(); }
else if ( is_month() ){ $this_header = "Monthly archives for " . get_the_date('F, Y'); }
else if ( is_year() ){ $this_header = "Yearly archives for " . get_the_date('Y'); }
else if (function_exists("is_shop") && is_shop() ){ $this_header = "Shop "; }
else { $this_header = "Archives"; }
$display_title= $this_header;
?>		
<header id="page_header"><div class="container"><h3 class="light"><?php echo esc_attr($display_title); ?></h3></div></header>	
<?php 
}elseif($hide_bread!="on" && !is_single() || (is_single() && 'flv_portfolio' == get_post_type() && $hide_bread_port!="yes" )){
if(is_home()) {
$out_title=get_the_title(get_option('page_for_posts', true));
$display_title= $out_title;	
} else{
$top_header_title1=get_post_meta($postid, 'dbt_title1', TRUE);	if($top_header_title1==''){$top_header_title1=get_the_title();}	
if($template== 'portfolio-template.php' && get_post_meta($postid, 'dbt_title_port', TRUE)!=''){$display_title=get_post_meta($postid, 'dbt_title_port', TRUE);}
else{$display_title= $top_header_title1;	}
}
	?>		
	<header id="page_header">
		<div class="container">
			<h3 class="light"><?php echo esc_attr($display_title); ?></h3>	
			<nav>
				<ul>
					<?php torque_the_breadcrumb() ?>
				</ul>
			</nav>
		</div>
	</header>	
<?php } 
if($hide_bread=="on" || (is_single() && 'post' == get_post_type()) || (is_single() && 'flv_portfolio' == get_post_type() && $hide_bread_port=="yes" ) ){ ?>	
	<div class="flv_page_top_padding"></div>	
<?php } ?>

<?php  if($template!= 'sections-template.php' && !is_404() || is_search()){ ?>	

		<main>
		<div class="container">
				<div class="row">
<?php } ?>



