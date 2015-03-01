<?php

define('THEME_URL',  get_template_directory_uri() . '/');
$theme_url =  get_template_directory_uri() . '/';

/**
 * Required: include OptionTree.
 */
 add_filter( 'ot_theme_mode', '__return_true' );
load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
load_template( trailingslashit( get_template_directory() ) . 'option-tree/includes/theme-options.php' );

/* require items */
	require  get_template_directory() . '/inc/storm/StormTwitter.class.php';
	require_once( get_template_directory() . '/inc/storm/oauth/twitteroauth.php');
	require_once( get_template_directory() . '/inc/storm/oauth/OAuth.php');
	require_once( get_template_directory() . '/class-tgm-plugin-activation.php');
	require  get_template_directory() . '/inc/template-tags.php';
	require  get_template_directory() . '/inc/template-meta.php';
	require  get_template_directory() . '/inc/shortcodes.php';	
		

if ( ! function_exists( 'torque_setup' ) ) :
function torque_setup() {
/**
 * Set the content width based on the theme's design and stylesheet.
 */
		 global $content_width;
		if ( ! isset( $content_width ) ){	$content_width = 640; /* pixels */}
		
		load_theme_textdomain( 'torque', get_template_directory() . '/languages' );
		
		//woocommerce
	add_theme_support( 'woocommerce' );	
$plugins = get_option('active_plugins');
$required_plugin = 'woocommerce/woocommerce.php';
$debug_queries_on = FALSE;
if(is_array($plugins))
if ( in_array( $required_plugin , $plugins ) ) {
    $debug_queries_on = TRUE; 
}

if ($debug_queries_on){
	add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );		
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	$cols=4;	if(get_option_tree('woo_shop_columns', '', false)!='')	$cols=get_option_tree('woo_shop_columns', '', false);
	$rows=2;	if(get_option_tree('woo_shop_rows', '', false)!='')	$rows=get_option_tree('woo_shop_rows', '', false);
	if($rows==0)$rows=1;
	if($cols==0)$cols=1;
	$product=$rows*$cols;

//NUMBER OF PRODUCTS TO DISPLAY ON SHOP PAGE
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$product.';' ), 20 );
	add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			$cols=4;
			if(get_option_tree('woo_shop_columns', '', false)!='')	$cols=get_option_tree('woo_shop_columns', '', false);
			return $cols; // 3 products per row

		}
	}

	//woocommerce
	if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
//	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
add_filter( 'woocommerce_enqueue_styles', 'torque_jk_dequeue_styles' );
} else {
	define( 'WOOCOMMERCE_USE_CSS', false );
}

}
/*==================================================================theme support  */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support('post-thumbnails', array( 'post','flv_portfolio','flv_members','product'));
		add_theme_support( 'post-formats', array(  "video" ,"gallery") );
	

/*===================================================================theme menu */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'torque' ),
		) );
/*===================================================================theme filter */
		
		add_filter('excerpt_more','torque_new_excerpt_more');
		add_filter('excerpt_length','torque_custom_excerpt_length', 999 );	

		add_filter('widget_text', 'do_shortcode');
		
		add_filter('widget_categories_dropdown_args', 'widget_category_excluder');
		add_filter('widget_categories_args', 'widget_category_excluder');

/*==================================================================theme actions */

		  add_action('admin_head','torque_admin_head');
		  
		 add_action('init','torque_menu_init'); 
		 
		 add_action( 'wp_enqueue_scripts', 'torque_scripts');
		 add_action( 'wp_enqueue_scripts', 'torque_styles');
		 add_action( 'admin_enqueue_scripts', 'torque_wp_admin_style' );
		 
		 add_action('wp_head', 'torque_header');
		 
		 if (is_admin()) {
		 	add_filter( 'ot_theme_options_page_title', 'filter_ot_theme_options_page_title' );
		 add_action('init','torque_portfolio_init',22);		
		 }
	
/* create meta boxes*/
		add_action('admin_menu','torque_page_add_box');
		
/* save all meta box data */
		add_action('save_post','torque_page_save_data');
		
		add_action( 'widgets_init', 'torque_widgets_init' );
		add_action('widgets_init', array('torque_torque_twitter_widget', 'register_this_widget'));
		add_action('widgets_init', array('torque_instagram_widget', 'register_this_widget'));
	
/* Add it to a column in WP-Admin */
	
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	
		add_action('widgets_init', create_function('', 'return register_widget("show_popular");'));
		add_action('widgets_init', create_function('', 'return register_widget("show_posts");'));
		add_action('widgets_init', create_function('', 'return register_widget("show_featured_posts");'));
		add_action('widgets_init', array('torque_twitter_widget', 'register_this_widget'));
		
		
		$fialovy_insta_nr=0;add_shortcode('instagram', 'torque_insta_func');
		$tw_count=0;add_shortcode('twitter', 'torque_twiiterr_func');
		add_shortcode('related_posts', 'related_posts_func');
		
/*  Include the TGM_Plugin_Activation class.	 */
		add_action( 'tgmpa_register', 'torque_register_required_plugins' );
		
}
endif;
add_action( 'after_setup_theme', 'torque_setup' );

function torque_admin_head() {

    echo '<script>window.theme_url = "' . THEME_URL . '";window.site_url = "' . get_site_url() . '";var $j = jQuery.noConflict();</script>';
}

function woo_custom_product_searchform( $form ) {
	
	$form = '<div class="search-form">
<form role="search"  method="get" action="' . esc_url( home_url( '/'  ) ) . '">
<div class="form-group">
<input type="text" class="form-control" placeholder="'. esc_attr_x( "Search here...", "placeholder", "torque" ) .'"  value="'. esc_attr( get_search_query() ) .'" name="s"  title="'.  esc_attr_x( "Search here...", "placeholder", "torque" ) .'"></div></form></div>';
	
	return $form;
	
}

function pn_get_attachment_id_from_url( $attachment_url = '' ) {
 
	global $wpdb;
	$attachment_id = false;
 
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
 
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
 
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
	}
 
	return $attachment_id;
}		
function torque_fcts(){
		add_theme_support( 'custom-header'); 
		add_theme_support( 'custom-background'); 
}
function filter_ot_theme_options_page_title() {   return 'Torque Theme Options';} 

function torque_portfolio_init() {

		$options = home_url('flv_port_admin_settings' );
		$options3 = home_url('flv_team_admin_settings' );
		

		
		if(isset($options["port_2_col_height"]) && $options["port_2_col_height"]!=''){$port2_height=sanitize_text_field($options["port_2_col_height"]);}else {$port2_height=385;}
		if(isset($options["port_2_col_width"]) && $options["port_2_col_width"]!=''){$port2_width=sanitize_text_field($options["port_2_col_width"]);} else {$port2_width=645;}
		
		if(isset($options["port_3_col_height"]) && $options["port_3_col_height"]!=''){$port3_height=sanitize_text_field($options["port_3_col_height"]);}else {$port3_height=264;}
		if(isset($options["port_3_col_width"]) && $options["port_3_col_width"]!=''){$port3_width=sanitize_text_field($options["port_3_col_width"]);} else {$port3_width=500;}
		
		if(isset($options["port_4_col_height"]) && $options["port_4_col_height"]!=''){$port4_height=sanitize_text_field($options["port_4_col_height"]);}else {$port4_height=445;}
		if(isset($options["port_4_col_width"]) && $options["port_4_col_width"]!=''){$port4_width=sanitize_text_field($options["port_4_col_width"]);} else {$port4_width=555;}
		
		if(isset($options["port_wall_height"]) && $options["port_wall_height"]!=''){$port_wall_height=sanitize_text_field($options["port_wall_height"]);}else {$port_wall_height=350;}
		if(isset($options["port_wall_width"]) && $options["port_wall_width"]!=''){$port_wall_width=sanitize_text_field($options["port_wall_width"]);} else {$port_wall_width=350;}
		
		if(isset($options["port_single_height"]) && $options["port_single_height"]!=''){$port_single_height=sanitize_text_field($options["port_single_height"]);} else {$port_single_height=9999;}
		if(isset($options["port_single_width"]) && $options["port_single_width"]!=''){$port_single_width=sanitize_text_field($options["port_single_width"]);} else {$port_single_width=750;}


		torque_create_crop('portfolio2',$port2_width,$port2_height,true);
		torque_create_crop('portfolio3',$port3_width,$port3_height,true);
		torque_create_crop('portfolio4',$port4_width,$port4_height,true);
		
		torque_create_crop('portfolio_wall',$port_wall_width,$port_wall_height,true);
		torque_create_crop('portfolio_single',$port_single_width,$port_single_height,true);

		torque_create_crop('portfolio_small',170,150,true);
		
		/*team member style*/
		if(isset($options3["team_height"]) && $options3["team_height"]!=''){$team_height=sanitize_text_field($options3["team_height"]);} else {$team_height=210;}
		if(isset($options3["team_width"]) && $options3["team_width"]!=''){$team_width=sanitize_text_field($options3["team_width"]);} else {$team_width=205;}
		torque_create_crop('team',$team_height,$team_width,true); 
		
		torque_create_crop('widget_small',45,45,true);
		torque_create_crop('widget_small2',80,80,true);
		

		
		if(get_option_tree('blog_default_height', '', false)!=''){$blog_d_h=get_option_tree('blog_default_height', '', false);}else {$blog_d_h=340;}
		
		if(get_option_tree('blog_default_width', '', false)!=''){$blog_d_w=get_option_tree('blog_default_width', '', false);}else {$blog_d_w=665;}
		if(get_option_tree('blog_full_width', '', false)!=''){$blog_f_w=get_option_tree('blog_full_width', '', false);}else {$blog_f_w=1045;}

		if(get_option_tree('blog_masonry_width', '', false)!=''){$blog_m_w=get_option_tree('blog_masonry_width', '', false);}else {$blog_m_w=270;}
		if(get_option_tree('blog_masonry_height', '', false)!=''){$blog_m_h=get_option_tree('blog_masonry_height', '', false);}else {$blog_m_h=171;}
		
		
		torque_create_crop('blog_small',$blog_m_w,$blog_m_h,true);
		
		torque_create_crop('blog_post',$blog_d_w,$blog_d_h,true);
		torque_create_crop('blog_post_full',$blog_f_w,$blog_d_h,true);
		
			
}

function widget_category_excluder($args){
	$args5 = array(	'type'                     => 'post','orderby'                  => 'name','order'                    => 'ASC','taxonomy'                 => 'category'); 
	$ids='';
	$categories = get_categories( $args5 );
	foreach($categories as $category) {
	$args3 = array(	'posts_per_page'   => 100000,	'category'         => $category->term_id,	'post_type'        => 'flv_portfolio',	'post_status'      => 'publish');
	$posts_array = get_posts( $args3 );
	if(count($posts_array)==$category->count){	$ids.=",".$category->term_id;}
	}
	$ids.=",";
	if(isset($args['exclude'])){$exclude=$args['exclude'];}else{$exclude='';}
	  $args['exclude'] =$exclude.$ids; // Keep it safe!

    return $args;
}

function torque_menu_init() {
	
	
	if (is_admin()) {
			
		add_editor_style('css/editor-style.css');
		 
		/* Redirect to theme options page on activation */
		global $pagenow; if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" ) wp_redirect( 'themes.php?page=ot-theme-options' );
		 }
	}
 /**
 * Enqueue scripts and styles
 */
 function torque_header() {
 	require  get_template_directory() . '/inc/settings.php'; 
 }

function torque_wp_admin_style(){
	/* styles for option tree section */
		
		wp_enqueue_style( 'admin-style', THEME_URL.'css/admin.css');
		wp_enqueue_style('torque-app-icons', THEME_URL . 'css/app-icons.css');		
		wp_enqueue_style('torque-admin-font-awesome', THEME_URL . 'css/font-awesome.css');
		wp_enqueue_style( 'colorpicker-style', THEME_URL.'css/colorpicker.css');
		/*------thickbox */
	    wp_enqueue_style('thickbox');
		
	/*-------------------- OPTION TREE STYLES AND SCRIPTS -------------------------*/	
	
	if( (isset($_GET["page"]) and $_GET["page"]=="ot-theme-options") || (isset($_GET["page"]) and   $_GET["page"]=="ot-settings") || (isset($_GET["page"]) and   $_GET["page"]=="ot-documentation")){
	$version="2.4.2";

	
	wp_enqueue_style( 'ot-admin-css', THEME_URL . 'option-tree/assets/css/ot-admin.css', false, $version );
	 /* load jQuery-ui slider */
   wp_enqueue_script( 'jquery-ui-slider' );
  
    /* load jQuery-ui datepicker */
    wp_enqueue_script( 'jquery-ui-datepicker' );
    
    /* load WP colorpicker */
    wp_enqueue_script( 'wp-color-picker' );
    
    /* Load Ace Editor for CSS Editing */
    wp_enqueue_script( 'ace-editor', THEME_URL . 'option-tree/assets/js/vendor/ace/ace.js', null, $version );   
    
    /* load jQuery UI timepicker addon */
    wp_enqueue_script( 'jquery-ui-timepicker', THEME_URL . 'option-tree/assets/js/vendor/jquery/jquery-ui-timepicker.js', array( 'jquery', 'jquery-ui-slider', 'jquery-ui-datepicker' ), '1.4.3' );
    
    /* load all the required scripts */
    wp_enqueue_script( 'ot-admin-js', THEME_URL . 'option-tree/assets/js/ot-admin.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-ui-sortable', 'jquery-ui-slider', 'wp-color-picker', 'ace-editor', 'jquery-ui-datepicker', 'jquery-ui-timepicker' ), OT_VERSION );
    
    
    
    /* create localized JS array */
    $localized_array = array( 
      'ajax'                  => admin_url( 'admin-ajax.php' ),
      'upload_text'           => __( 'Send to OptionTree', 'option-tree' ),
      'remove_media_text'     => __( 'Remove Media', 'option-tree' ),
      'reset_agree'           => __( 'Are you sure you want to reset back to the defaults?', 'option-tree' ),
      'remove_no'             => __( 'You can\'t remove this! But you can edit the values.', 'option-tree' ),
      'remove_agree'          => __( 'Are you sure you want to remove this?', 'option-tree' ),
      'activate_layout_agree' => __( 'Are you sure you want to activate this layout?', 'option-tree' ),
      'setting_limit'         => __( 'Sorry, you can\'t have settings three levels deep.', 'option-tree' ),
      'delete'                => __( 'Delete Gallery', 'option-tree' ), 
      'edit'                  => __( 'Edit Gallery', 'option-tree' ), 
      'create'                => __( 'Create Gallery', 'option-tree' ), 
      'confirm'               => __( 'Are you sure you want to delete this Gallery?', 'option-tree' )
    );
    
    /* localized script attached to 'option_tree' */
    wp_localize_script( 'ot-admin-js', 'option_tree', $localized_array );
	
		}
		wp_enqueue_script( 'colorpicker-script', THEME_URL.'js/colorpicker.js');
		wp_enqueue_script( 'admin-script', THEME_URL.'js/jquery.custom.admin.js');
		/*---thickbox */
	    wp_enqueue_script('thickbox');
	    wp_enqueue_script('media-upload');
		  
		  
}

function fc_remove_woo_lightbox() {
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
}

function torque_styles() {
	if (!is_admin()) {
	 /*stylesheets*/
	
	wp_enqueue_style('torque-reset', THEME_URL . 'css/reset.css');
	wp_enqueue_style('torque-main', THEME_URL . 'style.css');
	wp_enqueue_style('torque-styles', THEME_URL . 'css/styles.css');
	wp_enqueue_style('torque-elements', THEME_URL . 'css/elements.css');
	wp_enqueue_style('torque-responsive', THEME_URL . 'css/responsive.css');
	wp_enqueue_style('torque-font-awesome', THEME_URL . 'css/font-awesome.css');
	wp_enqueue_style('torque-jquery.mmenu', THEME_URL . 'css/jquery.mmenu.css');
	
	wp_enqueue_style('torque-bx', THEME_URL . 'css/bxslider.css');
	
	wp_enqueue_style('torque-Open+Sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,800,700');
	
	wp_enqueue_style('torque-fancy', THEME_URL . 'css/fancybox/jquery.fancybox.css');


	//woocommerce

	
		$plugins = get_option('active_plugins');
	$required_plugin = 'woocommerce/woocommerce.php';
	$debug_queries_on = FALSE;
	if(is_array($plugins))
	if ( in_array( $required_plugin , $plugins ) ) {
	    $debug_queries_on = TRUE; 
	}
	if ($debug_queries_on){	
		wp_enqueue_style('woocomerce', THEME_URL . 'woocommerce/assets/css/woocommerce.css');
		wp_enqueue_style('woocomerce-layout', THEME_URL . 'woocommerce/assets/css/woocommerce-layout.css');
		
		//Remove prettyPhoto lightbox
	add_action( 'wp_enqueue_scripts', 'fc_remove_woo_lightbox', 99 );
	
		}
		}
}
function torque_jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
function torque_scripts() {
	 if (!is_admin()) {
		wp_enqueue_script('jquery');
	 	
		/*js*/
		wp_enqueue_script('torque-plugins', THEME_URL . 'js/plugins.js','','',true);
		
		wp_enqueue_script('torque-cookie', THEME_URL . 'js/jquery.cookie.js','','',true);
		
		
		wp_enqueue_script('torque-backstretch', THEME_URL . 'js/backstretch.js','','',true);
		
		wp_enqueue_script('torque-bxslider', THEME_URL . 'js/bxslider.js','','',true);
	
		wp_enqueue_script('torque-fancy', THEME_URL . 'css/fancybox/jquery.fancybox.js','','',true);
		
		wp_enqueue_script('torque-sudoSlider.min', THEME_URL . 'js/sudoSlider.min.js','','',true);
	
		
		wp_enqueue_script('torque-isotope', THEME_URL . 'js/isotope.js','','',true);

		
		wp_enqueue_script('torque-map3','https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
		wp_enqueue_script('torque-gmap', THEME_URL . 'js/jquery.gmap.min.js','','',true);

		wp_enqueue_script('torque-fitvids', THEME_URL . 'js/fitvids.js','','',true);
		wp_enqueue_script('torque-modernizr', THEME_URL . 'js/modernizr.js','','',true);
		wp_enqueue_script('torque-jquery.mmenu', THEME_URL . 'js/jquery.mmenu.js','','',true);
		

		
		$message=ot_get_option("success_msg","");
		echo'<script>window.message="'.trim(preg_replace('/\s+/', ' ', $message)).'";</script>';
		
		if ( is_singular() ) {			wp_enqueue_script( "comment-reply" );}
   
	}
}


/**
 * Register widgetized area and update sidebar with default widgets
 */
function torque_widgets_init() {

	register_sidebar(array(
		'name' => __('Blog Sidebar','torque'),
		'id' => 'sidebar_blog',
		'description' => __('The blog sidebar widget area, id="sidebar_blog"','torque'),
		'before_widget' => '<div class="gap_35"></div><hr class="gap_35"><div id="%1$s" class="widget %2$s side-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		));
		register_sidebar(array(
		'name' => __('Sidebar 1','torque'),
		'id' => 'sidebar1',
		'description' => __('The sidebar 1 widget area, id="sidebar1"','torque'),
		'before_widget' => '<div class="gap_35"></div><hr class="gap_35"><div id="%1$s" class="widget %2$s side-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		));
		register_sidebar(array(
		'name' => __('Sidebar 2','torque'),
		'id' => 'sidebar2',
		'description' => __('The sidebar 2 widget area, id="sidebar2"','torque'),
		'before_widget' => '<div class="gap_35"></div><hr class="gap_35"><div id="%1$s" class="widget %2$s side-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		));
		register_sidebar(array(
		'name' => __('Sidebar 3','torque'),
		'id' => 'sidebar3',
		'description' => __('The sidebar 3 widget area, id="sidebar3"','torque'),
		'before_widget' => '<div class="gap_35"></div><hr class="gap_35"><div id="%1$s" class="widget %2$s side-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		));
		register_sidebar(array(
		'name' => __('Sidebar 4','torque'),
		'id' => 'sidebar4',
		'description' => __('The sidebar 4 widget area, id="sidebar4"','torque'),
		'before_widget' => '<div class="gap_35"></div><hr class="gap_35"><div id="%1$s" class="widget %2$s side-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		));
		register_sidebar(array(
		'name' => __('Sidebar 5','torque'),
		'id' => 'sidebar5',
		'description' => __('The sidebar 5 widget area, id="sidebar5"','torque'),
		'before_widget' => '<div class="gap_35"></div><hr class="gap_35"><div id="%1$s" class="widget %2$s side-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		));
		register_sidebar(array(
        'name' => __('Footer 1-1', 'torque'),
        'id' => 'footer-1-1',
        'description' => __('The first footer widget area (first row), id="footer-1-1"', 'torque'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="title"><span class="light lCase">',
        'after_title' => '</span></h4>',
    ));
	    register_sidebar(array(
        'name' => __('Footer 1-2', 'torque'),
        'id' => 'footer-1-2',
        'description' => __('The second footer widget area (first row), id="footer-1-2"', 'torque'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="title"><span class="light lCase">',
        'after_title' => '</span></h4>',
    ));
	    register_sidebar(array(
        'name' => __('Footer 1-3', 'torque'),
        'id' => 'footer-1-3',
        'description' => __('The third footer widget area (first row), id="footer-1-3"', 'torque'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="title"><span class="light lCase">',
        'after_title' => '</span></h4>',
    ));
	 register_sidebar(array(
        'name' => __('Footer 1-4', 'torque'),
        'id' => 'footer-1-4',
        'description' => __('The third footer widget area (first row), id="footer-1-4"', 'torque'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="title"><span class="light lCase">',
        'after_title' => '</span></h4>',
    ));
	 register_sidebar(array(
        'name' => __('Footer Bottom 1', 'torque'),
        'id' => 'footer-bottom-1',
        'description' => __('The bottom 1 , id="footer-bottom-1"', 'torque'),
        'before_widget' => '',
        'after_widget' => '',
    ));  
	 register_sidebar(array(
        'name' => __('Footer Bottom 2', 'torque'),
        'id' => 'footer-bottom-2',
        'description' => __('The bottom 2 , id="footer-bottom-2"', 'torque'),
        'before_widget' => '',
        'after_widget' => '',
    ));  

}



/* CUSTOM FUNCTIONS */

function torque_create_crop($name,$wid,$theight,$cropp){ 
		add_image_size( $name,$wid, $theight,$cropp);
}


if(!function_exists('torque_get_dynamic_sidebar')){
	function torque_get_dynamic_sidebar($index = 1)
	{
		$sidebar_contents = "";
		ob_start();
		dynamic_sidebar($index);
		$sidebar_contents = ob_get_clean();
		return $sidebar_contents;
	}
	}
		

function torque_gallery_transform($text){
		$fout='';
		if($text!=' '){
		$fout=str_replace ('", "', "</span><span> ", $text);
		$fout=substr_replace($fout,'</span>', -3, -1);
		$fout=substr_replace($fout,'<span>', 0, 2);
		}
		return $fout;
	}


function torque_pagination($pages = '', $range = 2) {
		$showitems = ($range * 2) + 1;
		
		global $paged;
		if (empty($paged))
		   { $paged = 1;}
		
		if ($pages == '') {
		    global $wp_query;
		    $pages = $wp_query->max_num_pages;
		    if (!$pages) {
		        $pages = 1;
		    }
		} $curr=1;
		 echo '<div class="gap_50"></div>
					<hr class="gap_35">';
		echo '<nav class="pagination">';
		if (1 != $pages) {
		  $curr=0;
			 /** Previous Post Link */
    if ( get_previous_posts_link() )     { printf( '<div class="float_left">%s</div>'. "\n", get_previous_posts_link("<span class='btn white small'><i class='fa fa-chevron-left'></i></span> <h6>".__("Newer Posts")."</h6>") );}
			
	if ( get_next_posts_link() ){    printf( '<div class="float_right">%s</div>' . "\n", get_next_posts_link("<h6>".__('Older Posts')."</h6> <span class='btn white small'><i class='fa fa-chevron-right'></i></span>") );}
		}
		
		echo "</nav>";
}

function torque_get_excerpt($idd){
		$excerpt = get_the_excerpt();
		$aut='';
		if($excerpt!='')
		{$aut=$excerpt;
		}
		else {
		$content = get_the_content($idd);
		$aut=htmlentities($content);
		}
		if($excerpt=='' && $content=='')  $aut='';
		if( substr($aut, 0, 5)=="Tweet"){$aut=substr_replace($aut,'', 0, 5);}
		if( substr($aut, -5, 5)=="Tweet"){$aut=substr_replace($aut,'', -5, 5);}
		if($aut=="Tweet"){$aut='';}
		return $aut;
	}

function torque_custom_excerpt_length( ) {
		$length=30;
		
		if(ot_get_option("blog_excerpt_len")!=''){$length=ot_get_option("blog_excerpt_len");}
		return $length;
	}

function torque_new_excerpt_more( $more ) {
		$andmore="...";
		if(ot_get_option("blog_excerpt_andmore")!=''){$andmore=ot_get_option("blog_excerpt_andmore");}
		return  " <a href='".get_permalink( get_the_ID() )."' title='read more!'>".$andmore."</a>";
	}
	

function torque_custom_wp_link_pages( $args = '' ) {
		$defaults = array(
		'before' => '<p class="pagination">' . __( 'Pages:',"torque" ),
		'after' => '</p>',
		'text_before' => '',
		'text_after' => '',
		'next_or_number' => 'number',
		'nextpagelink' => __( 'Next page',"torque"  ),
		'previouspagelink' => __( 'Previous page' ,"torque" ),
		'pagelink' => '%',
		'echo' => 1
		);
		
		$r = wp_parse_args( $args, $defaults );
		$r = apply_filters( 'wp_link_pages_args', $r );
		extract( $r, EXTR_SKIP );
		
		global $page, $numpages, $multipage, $more, $pagenow;
		
		$output = '';
		if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
		$output .= $before;
		for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
		$j = str_replace( '%', $i, $pagelink );
		$output .= ' ';
		if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
		{$output .= _wp_link_page( $i );}
		else
		{$output .= '<span class="active">';}
		
		$output .= $text_before . $j . $text_after;
		if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
		{$output .= '</a>';}
		else
		{$output .= '</span>';}
		}
		$output .= $after;
		} else {
		if ( $more ) {
		$output .= $before;
		$i = $page - 1;
		if ( $i && $more ) {
		$output .= _wp_link_page( $i );
		$output .= $text_before . $previouspagelink . $text_after . '</a>';
		}
		$i = $page + 1;
		if ( $i <= $numpages && $more ) {
		$output .= _wp_link_page( $i );
		$output .= $text_before . $nextpagelink . $text_after . '</a>';
		}
		$output .= $after;
		}
		}
		}
		
		if ( $echo )
		{echo $output;}
		
		return $output;
	}


/*------------------------------------------------------------------------ theme's menu */
class torque_description_walker1 extends Walker_Nav_Menu {
	/*start_lvl function*/
	 function start_lvl( &$output, $depth = 0, $args = array() ) {
	$indent = ($depth > 0 ? str_repeat("\t", $depth) : '');
	/* code indent*/
	$display_depth = ($depth + 1);
	/* because it counts the first submenu as 0 */
	$classes = array('level-' . ($display_depth + 1), ($display_depth % 2 ? 'menu-odd' : 'menu-even'), ($display_depth >= 2 ? 'sub-sub-menu' : ''));
	$class_names = implode(' ', $classes);
	/* build html */
	$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}
		
	/* start_el function */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	$attributes = '';
	$attributes = !empty($item -> attr_title) ? ' title="' . esc_attr($item -> attr_title) . '"' : '';
	$attributes .= !empty($item -> target) ? ' target="' . esc_attr($item -> target) . '"' : '';
	$attributes .= !empty($item -> xfn) ? ' rel="' . esc_attr($item -> xfn) . '"' : '';
	$attributes .= !empty($item -> url) ? ' href="' . esc_attr($item -> url) . '"' : '';

	global $wp_query;
	$indent = ($depth) ? str_repeat("\t", $depth) : '';
	$class_names = $value = '';
	$classes = empty($item -> classes) ? array() : (array)$item -> classes;
	$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));

	if($depth==0){$class1=" dropdown";}else{$class1="";}
	
	$class_names = ' class="' . esc_attr($class_names) . '"';
	/* get page id */
	$our_id = torque_get_page_id($item -> title);
	$item_output = '';
	$output .= $indent . '<li class="'.$class1.' '.implode(' ', $classes).'">';
	
	if ($depth != 0) {$description = $append = $prepend = "";
	}
	if(isset($args -> before)){	$item_output = $args -> before;}
	
	$item_output .= '<a class="" ' . $attributes . '><span>';
if(isset($args -> link_before)){	$item_output .= $args -> link_before;}
if(isset($item -> title)){	$item_output .=  $item -> title;}
	$item_output .= '</span></a>';
	$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

	}

}

function torque_get_page_id($page_name){
	
	$page=get_page_by_title($page_name);
if(isset($page->ID)){
return $page->ID;
}else {
	return'';
}

}

if(!function_exists('torque_get_dynamic_sidebar')){
	function torque_get_dynamic_sidebar($index = 1)
	{
		$sidebar_contents = "";
		ob_start();
		dynamic_sidebar($index);
		$sidebar_contents = ob_get_clean();
		return $sidebar_contents;
	}
	}

	function torque_comment($comment, $args, $depth) {
	 $GLOBALS['comment'] = $comment;

        switch ($comment->comment_type) :
            case '' :

		?>
		<li>
			<div class="boxed">

		<?php 
		$avatar=get_avatar($comment, 70, THEME_URL . 'img/avatar/62x62_deaulft.jpg'); 
         echo $avatar;

		 ?>

		<h5><?php comment_author() ?><span> / <span><?php echo esc_attr(human_time_diff( get_comment_time('U'), current_time('timestamp') ) . __(' ago','torque')); ?>  </span> / <?php comment_reply_link(array_merge($args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span></h5>
		<p> <?php comment_text();?></p>

		<?php if ($comment->comment_approved == '0'){?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'torque'); ?></em>
		<?php } ?> 					

		</div>
	
		<?php
		break;
		case 'pingback' :
		case 'trackback' :
		?>
		<li class="post pingback">
		<p><?php _e('Pingback:', 'torque'); ?>
		<?php edit_comment_link(__('(Edit)', 'torque'), ' '); ?></p>
		<?php
		break;
		endswitch;
		}

/* function to display number of posts.
----------------------------------------------- */




function torque_getPostLikes($postID){
	    $count_key = 'post_likes_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return $count;
}

function torque_setPostLikes($postID) {
	    $count_key = 'post_likes_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
}


/* POPULAR POST WIDGET
----------------------------------------------- */


class show_posts extends WP_Widget {
function show_posts() {
		 $widget_ops = array('classname' => 'widget-articles-filter', 'description' => __('Blog posts.','torque'));
		 $this->WP_Widget('show_posts', __('Blog Posts','torque'), $widget_ops);
 }
 
function widget($args, $instance){
		 extract($args);
		 $title ='Blog';		 $postscount = $instance['posts'];
		 global $postcount;
		$myposts = get_posts(array('numberposts' =>$postscount));
		
		echo $before_widget . $before_title . $title . $after_title;
		?>
		<ul class="blog-articles">
		 <?php
		 foreach($myposts as $post){
		 setup_postdata($post);
		?>
		<li>
		<?php echo get_the_post_thumbnail(  $post->ID,'widget_small2',  array('alt' => $post->post_title)); 
		$sentence=get_the_excerpt();
		if(strlen($sentence)>100){$output=substr($sentence, 0, 100)."..."; }else{$output=$sentence;}
		?>
		<a href="<?php echo esc_url(get_permalink( $post->ID)); ?>"><?php echo esc_attr(do_shortcode($output)); ?></a>
		<span><?php echo esc_attr(get_the_date("j F Y")); 
			?>
		</span>
		</li>
		 <?php } ?>
		</ul>
		 <?php 
		 wp_reset_postdata(); 
		  echo $after_widget;
 }
 
function update($newInstance, $oldInstance){
		 $instance = $oldInstance;
		 $instance['posts'] = $newInstance['posts'];
		 
		return $instance;
 }
 
function form($instance){
	if(isset($instance['posts']))$nr=$instance['posts'];else $nr=5;
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('posts').'">' . __('Number of Posts:',  'torque') . ' <input style="width: 50px;"  id="'.$this->get_field_id('posts').'"  name="'.$this->get_field_name('posts').'" type="text"  value="'.$nr.'" /></label></p>';
		echo '<input type="hidden" id="custom_recent" name="custom_recent" value="1" />';
 }
 }
 
class show_popular extends WP_Widget {
 
function show_popular() {
		 $widget_ops = array('classname' => 'tabs flv_tabs', 'description' => __('Show your popular posts.','torque'));
		 $this->WP_Widget('show_popular', __('Latest / Popular / Comments Posts','torque'), $widget_ops);
 }
 
function widget($args, $instance){
		 extract($args);
		
		 $title ='</h5><ul> <li><h6><a href="#" id="tab1">Popular</a></h6></li> 
							<li><h6><a href="#" id="tab2">Recent</a></h6></li> 
							<li><h6><a href="#" id="tab3">Comments</a></h6></li>
						</ul><h5>';
		 $postscount = $instance['posts'];
		 
		 global $postcount;
		 
		$myposts = get_posts(array('orderby' => 'comment_count','numberposts' =>$postscount));
		
		echo $before_widget . $before_title . $title . $after_title;
		?>
		<div class="tab_content">
		 <div id="tab1C" class="tab">

		 <?php
		 foreach($myposts as $post){
		 setup_postdata($post);
//popular
		?>
		<article class="tab_post">
		<a class="tab_post_thumbnail" href="<?php echo esc_url(get_permalink( $post->ID)); ?>">
		<?php echo get_the_post_thumbnail(  $post->ID,'widget_small',  array('alt' => $post->post_title)); ?>
			<div class="img_overlay"><i class="fa fa-link"></i></div>
		</a>
		<header>
			<h6><a href="<?php echo esc_url(get_permalink( $post->ID)); ?>"><?php echo $post->post_title; ?></a></h6>
		</header>
		<ul class="meta">
			<li><i class="fa fa-comments"></i><span><?php $comm_nr=get_comments_number();if($comm_nr!=1) echo esc_attr($comm_nr." Comments");	else echo esc_attr($comm_nr." Comment"); ?> </span></li>
			<li><i class="fa fa-clock-o"></i><span><?php echo esc_attr(get_the_date("j M Y")); ?></span></li>
		</ul>
	</article><hr class="thin gap_20">
		 <?php } ?>

		</div>
		
		 <?php 
//latest	 
		  wp_reset_postdata(); 
		 $myposts = get_posts(array('orderby' => 'date','numberposts' =>$postscount));
			?>
		  <div id="tab2C" class="tab">
		 <?php
		 foreach($myposts as $post){
		 setup_postdata($post);
		?>
	<article class="tab_post">
		<a class="tab_post_thumbnail" href="<?php echo esc_url(get_permalink( $post->ID)); ?>">
		<?php echo get_the_post_thumbnail(  $post->ID,'widget_small',  array('alt' => $post->post_title)); ?>
			<div class="img_overlay"><i class="fa fa-link"></i></div>
		</a>
		<header>
			<h6><a href="<?php echo esc_url(get_permalink( $post->ID)); ?>"><?php echo $post->post_title; ?></a></h6>
		</header>
		<ul class="meta">
			<li><i class="fa fa-comments"></i><span><?php $comm_nr=get_comments_number();if($comm_nr!=1) echo esc_attr($comm_nr." Comments");	else echo esc_attr($comm_nr." Comment"); ?> </span></li>
			<li><i class="fa fa-clock-o"></i><span><?php echo esc_attr(get_the_date("j M Y")); ?></span></li>
		</ul>
	</article><hr class="thin gap_20">
		 <?php } ?>
	 </div>  
		
	 <?php 
//coments	 
	?>
		  <div id="tab3C" class="tab">

		 <?php
		 $args = array(	'number' => $postscount);
$comments = get_comments($args);
foreach($comments as $comment) {
	?>
	<article class="tab_post">
<?php 

$grav_url=get_bloginfo('template_directory') . '/img/avatar/62x62_deaulft.jpg';

	if(get_avatar($comment->comment_author_email)){
	    
		 echo get_avatar( $comment->comment_author_email, $size = '62', $default = $grav_url); 
	}
	else{
		  echo "<img width='62' height='62' alt='img'  class='avatar tab_post_thumbnail' src=".$grav_url." />";
	}
	?>
<header>
	<h6><?php echo esc_attr($comment->comment_author); ?></h6>
<p><?php 
        $sentence=$comment->comment_content;
		if(strlen($sentence)>110){$output=substr($sentence, 0, 110)."..."; }else{$output=$sentence;} 
		echo $output; 
		?></p>
</header>
</article><hr class="thin gap_20"> <!-- DIVIDER -->
						
   <?php }	?>
	 </div>  	


		</div>
		 <?php 
		 wp_reset_postdata(); 
		  echo $after_widget;
 }
 
function update($newInstance, $oldInstance){
		 $instance = $oldInstance;
		 $instance['posts'] = $newInstance['posts'];
		 
		return $instance;
 }
 
function form($instance){
	if(isset($instance['posts']))$nr=$instance['posts'];else $nr=5;
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('posts').'">' . __('Number of Posts:',  'torque') . ' <input style="width: 50px;"  id="'.$this->get_field_id('posts').'"  name="'.$this->get_field_name('posts').'" type="text"  value="'.$nr.'" /></label></p>';
		echo '<input type="hidden" id="custom_recent" name="custom_recent" value="1" />';
 }
 }
 
/* WP_Widget_Recent_Posts
----------------------------------------------- */
class show_featured_posts extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The featured posts on your site","") );
        parent::__construct('recent-posts', __('Featured Blogposts',""), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Featured Blogposts',"" );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4;
        if ( ! $number )
            $number = 10;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'meta_key'=>"post_likes_count", "orderby"=>"meta_value", 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ,'order'=>'desc') ) );
        if ($r->have_posts()) :
?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
           
           <article class="mini_post boxed">
			<a class="mini_post_thumbnail arrow_left" href="<?php the_permalink() ?>">
		<?php 
		$post_title=get_the_title();		$postid=get_the_ID();
		echo get_the_post_thumbnail(  $postid,'widget_small2',  array('alt' => $post_title)); ?>
				<div class="img_overlay"><i class="fa fa-link"></i></div>
			</a>
			<script>
		function increase_likes<?php echo esc_attr(get_the_ID()) ; ?>(id) {
		var ceva=<?php echo esc_attr(get_the_ID()) ; ?>; 
		jQuery.ajax({
		    type: "POST",
		     url: "<?php echo esc_url(THEME_URL) ; ?>inc/functions-custom-like.php",
		    data: "id="+ceva,
		    success: function(response){jQuery("#"+id+" span").html(response);    } });
		 }
		</script>

			<ul class="meta">
				<li><a href="<?php the_permalink() ?>#flv_comment"><i class="fa fa-comments"></i><span><?php echo esc_attr(get_comments_number()); ?></span></a></li>
				<li><a id="nr_likes_side_<?php echo esc_attr(get_the_ID()); ?>"  onClick="increase_likes<?php echo esc_attr(get_the_ID()); ?>('nr_likes_side_<?php echo esc_attr(get_the_ID()); ?>');" href="javascript:;"><i class="fa fa-thumbs-up"></i><span><?php  echo esc_attr(torque_getPostLikes(get_the_ID())); ?></span></a></li>
			</ul>
			<header>
				<h6><a href="<?php the_permalink() ?>"><?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?></a></h6>
			</header>
		</article>
						

        <?php endwhile; ?>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:',"torque" ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php _e( 'Number of posts to show:',"" ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

<?php
    }
}

/* ---------------------------------------------Twitter WIDGET----------------------------------------------- */

function torque_twiiterr_func($atts) {
		global $tw_count;$tw_count++;
		$func_output = '';
		$user="beantownthemes";
		$number="3";
		$consumer_key='iEdZIY9TqWYqDQtnNyWzQ';
		$consumer_secret='PztL2UCU2As9km7V3DI3bdaLcriHLa7gE0kuwJ7Ox4';
		$access_token='31509047-yZQ1BJcJ4WYMkvnPnDiNkEg4W3sixunjjpa8PeT7a';
		$access_token_secret='5mtqW6GTOKk7MhHyR28JhOHReHlgGDirLhQpop4E';
		if(isset($atts["user"]) && $atts["user"]!="") {$user=$atts["user"]; }
		if(isset($atts["number"]) && $atts["number"]!="") {$number=$atts["number"];}
		if(isset($atts["consumer_key"]) && $atts["consumer_key"]!="") {$consumer_key=$atts["consumer_key"];}
		if(isset($atts["consumer_secret"]) && $atts["consumer_secret"]!="") {$consumer_secret=$atts["consumer_secret"];}
		if(isset($atts["access_token"]) && $atts["access_token"]!=""){ $access_token=$atts["access_token"];}
		if(isset($atts["access_token_secret"]) && $atts["access_token_secret"]!="") {$access_token_secret=$atts["access_token_secret"];}

		$default_options = array('key'=>$consumer_key, 'secret'=>$consumer_secret, 'token'=>$access_token,'token_secret'=>$access_token_secret,'screenname'=>$user);
		 $tweets = getTweetss($number, $user,$default_options);
		
		$func_output.='<div class="widget-inner-container">
                 <div class="twitter-feed-container">';
                 
		 $func_output.='<ul class="tweet_list">';
		  foreach($tweets as $tweet){
		  $func_output.=' <li><i class="fa fa-twitter"></i>';
		  $func_output.='<span class="tweet_text">';
		  $func_output.=' <a href="javascript:;" class="user">@'.$user.'</a> ';
		  $func_output.=torque_make_links_clickable($tweet["text"]);
		  $func_output.='</span>';  
		 $func_output.='<span class="tweet_time">'.__('about','torque').' '.torque_time_ago($tweet["created_at"]).'</span> ';
		 $func_output.='</li>';               
		 }
		   $func_output.='</ul></div></div>';	
		 return $func_output;
	}  	
 
function getTweetss($count = 20, $username = false, $options = false) {

		  $config['key'] = $options['key'];
		  $config['secret'] = $options['secret'];
		  $config['token'] = $options['token'];
		  $config['token_secret'] = $options['token_secret'];
		  $config['screenname'] = $options['screenname'];
		  
		  $config['cache_expire'] = intval(get_option('tdf_cache_expire'));
		  if ($config['cache_expire'] < 1) {$config['cache_expire'] = 3600;}
		  $config['directory'] = plugin_dir_path(__FILE__);
		  
		  $obj = new StormTwitter($config);
		  $res = $obj->getTweets($count, $username, $options);
		  update_option('tdf_last_error',$obj->st_last_error);
		  return $res;
}

class torque_twitter_widget extends WP_Widget {

	    public $name = 'Twitter Feed';
	    public $control_options = array();

function __construct() {
        $wdesc = '';
        if(isset($this->widget_desc)) {$wdesc = $this->widget_desc;}
        $widget_options = array(
            'classname' => __CLASS__,
            'description' => $wdesc,
        );
        parent::__construct(__CLASS__, $this->name, $widget_options, $this->control_options);
    }
static function register_this_widget() {      register_widget(__CLASS__);    }

function form($instance) {

        $defaults = array('title' => 'Our tweets','torque' => '3','twname'=>'beantownthemes','consumer_key'=>'','consumer_secret'=>'','access_token'=>'','access_token_secret'=>'');
        $instance = wp_parse_args((array) $instance, $defaults);
?>
        <p>
            <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?> " value="<?php echo esc_attr($instance['title']); ?>" size="20"> </p>
            <p><label for="<?php echo esc_attr($this->get_field_id('twname')); ?>">User ID:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('twname')); ?>" id="<?php echo esc_attr($this->get_field_id('twname')); ?> " value="<?php echo esc_attr($instance['twname']); ?>" size="20"> </p>
            <p><label for="<?php echo esc_attr($this->get_field_id('torque')); ?>">Tweets Nr:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('torque')); ?>" id="<?php echo esc_attr($this->get_field_id('torque')); ?> " value="<?php echo esc_attr($instance['torque']); ?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>">Consumer key:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('consumer_key')); ?>" id="<?php echo esc_attr($this->get_field_id('consumer_key')); ?> " value="<?php echo esc_attr($instance['consumer_key']); ?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>">Consumer secret:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('consumer_secret')); ?>" id="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?> " value="<?php echo esc_attr($instance['consumer_secret']); ?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('access_token')); ?>">Access token:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('access_token')); ?>" id="<?php echo esc_attr($this->get_field_id('access_token')); ?> " value="<?php echo esc_attr($instance['access_token']); ?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('access_token_secret')); ?>">Access token secret:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('access_token_secret')); ?>" id="<?php echo esc_attr($this->get_field_id('access_token_secret')); ?> " value="<?php echo esc_attr($instance['access_token_secret']); ?>" size="20"></input></p>  
        </p>
<?php

    }
function widget ($args,$instance) {
	  extract($args);
	  echo '<div class="widget">'; 
	  echo'<h4 class="title">'.$instance['title'].'</h4>';
	  $tinyarg2 = array(
	      'user' => $instance['twname'],
	      'number' => $instance['torque'],
	      'consumer_key' => $instance['consumer_key'],
	      'consumer_secret' => $instance['consumer_secret'],
	      'access_token' => $instance['access_token'],
	      'access_token_secret' => $instance['access_token_secret'] );
		
	  	echo torque_twiiterr_func($tinyarg2);
		echo '</div>';
	    }
}



function torque_make_links_clickable($text){
 		return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Z?-??-?()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
}

function torque_time_ago($date){
		if(empty($date)) {return "No date provided";}
		if($difference != 1) { 
		//$periods[$j].= "s";
		$periods = array(__("seconds","torque"), __("minutes","torque"), __("hours","torque"), __("days","torque"), __("weeks","torque"), __("months","torque"), __("years","torque"), __("decades","torque"));
		 }else{
		 $periods = array(__("second","torque"), __("minute","torque"), __("hour","torque"), __("day","torque"), __("week","torque"), __("month","torque"), __("year","torque"), __("decade","torque"));	
		 }

		$lengths = array("60","60","24","7","4.35","12","10");
		$now = time();
		$unix_date = strtotime($date);
		if(empty($unix_date)) {return "Bad date"; }
		if($now > $unix_date) {$difference = $now - $unix_date;$tense = __("ago","torque");} else {
		$difference = $unix_date - $now;$tense = __("from now","torque");}
		 
		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		$difference /= $lengths[$j];}
		$difference = round($difference);
		
		return "$difference $periods[$j] {$tense}";
}

function torque_send_message($fields,$maill){

		$name=$_POST['sendername'];
		 $msg=$_POST['message'];		 $subj=$_POST['organisation']; 	
		if($maill!='')$target = $maill;	else  $target =$_POST['to_email'];
		 $message=''; $subject='';
		$headers = 'From:  WebSite - '.$_SERVER['HTTP_HOST'].'' ;
		
		$message.='Sender\'s Name: ';     $message.=$name;     $message.="\n\n";
		$message.='Sender\'s Subject: ';      $message.=$subj;        $message.="\n\n";   
		$message.='Sender\'s Message: ';     $message.=$msg;	 
		$subject.=$name;  
		mail($target,$subject,$message,$headers);
		
    }

function torque_isMobile()
	{   
		if(preg_match('/(huawei|alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
		return true;
		else
		return false;
	}
	
function torque_send_subs_mail($maill){
		 $email_news=$_POST['news_address'];	
		if(isset($_POST['fname'])) $fname=$_POST['fname'];
		if(isset($_POST['lname'])) $lname=$_POST['lname'];
		 $email_news=$_POST['news_address'];

		 $email_it_to_news = $maill;	$email_from_news = $email_news;
		 $email_subject_news = "Newsletter subscriber";
		 $email_message_news.= "New subscriber was added";$email_message_news .=" on ".date("d/m/Y")." at ".date("H:i")."\n\n";
		 $email_message_news .= "Email is: ".stripslashes($email_news)."\n\n";
		 $email_message_news .= "First name is: ".stripslashes($fname)."\n\n";
		 $email_message_news .= "Last email is: ".stripslashes($lname)."\n\n";
		 
		 $headers = 'From:  WebSite - '.$_SERVER['HTTP_HOST'].'' ;
		 mail($email_news, $email_subject_news, $email_message_news, $headers);  

}

function torque_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = $r.",".$g.",".$b;
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
	




function related_posts_func( $atts ) {
	    $func_output='';
      $total_number=5;  if(isset($atts['number'])) $total_number=$atts['number'];
	   $excerpt_length=100; if(isset($atts['excerpt_length']))$excerpt_length=$atts['excerpt_length'];
	   
	$func_output.='<div class="home-projects home-projects2 related-posts">
							<div class="home-mission home-blog single-post">
								<div id="home-projects2" class="owl-carousel">';
	
	global $post;  $postid = $post->ID;      
	$post_categories = wp_get_post_categories($postid);

	$args=array(  'post_type' => 'post','post__not_in' => array($post->ID),'category__and' => $post_categories,'numberposts'     => $total_number,'orderby' => 'rand' ) ;
	$myposts = get_posts( $args );
	if(count($myposts)<$total_number){
		$args= array(  'post_type' => 'post','post__not_in' => array($post->ID),'category__in' => $post_categories ,'numberposts'     => $total_number,'orderby' => 'rand' ) ;
	}
 wp_reset_postdata(); 
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :  setup_postdata($post); 
	
$postid = $post->ID; 
$page_url=get_permalink($postid);

 torque_setPostViews($postid);$views= torque_getPostViews($postid); 
$comment=wp_count_comments($postid);	
$img=THEME_URL . 'css/images/patterns/lightpaperfibers.png';
$blog_style=get_post_format($postid); if($blog_style==""){$blog_style="small";}

$func_output.='<div class="item">
		<div class="col-md-12 home-blog-content">
		<div class="home-blog-inner">';

if($blog_style=="gallery"){
		 $func_output.='<div class="post-thumb">';
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
		$images_gallery = get_post_meta($postid, 'dbt_post_gallery', true);
		$images=explode(", ", $images_gallery);
		if(count($images)!=1){
		$func_output.='<div class="owl-carousel post_carousel post_carousel_'.$postid.'">';
		for($j=0;$j<count($images)-1;$j++){$attachment= str_replace ('"','',$images[$j]);   $func_output.='<div class="item"><img src="'.$attachment.'" width="675" class="img-responsive" alt="img"/></div>'; 
		} 
		$func_output.='</div>';
		
		$postid=get_the_ID();
		$blog_slider_autoPlay=get_post_meta($postid, 'dbt_blog_slider_autoplay', true);;	if($blog_slider_autoPlay==''){$blog_slider_autoPlay=5000;}
		$blog_slider_navigation=get_post_meta($postid, 'dbt_blog_slider_navi', true);		if($blog_slider_navigation=='yes'){$blog_slider_navigation="true";}else {$blog_slider_navigation="false";}
		$blog_slider_slideSpeed=get_post_meta($postid, 'dbt_blog_slider_slideSpeed', true);	if($blog_slider_slideSpeed==''){$blog_slider_slideSpeed=700;}
		$blog_slider_paginationSpeed=get_post_meta($postid, 'dbt_blog_slider_paginationSpeed', true);	if($blog_slider_paginationSpeed==''){$blog_slider_paginationSpeed=400;}
		$func_output.='</div>';
		$func_output.="<script>
		jQuery(document).ready(function () {
		if (jQuery('.post_carousel_".$postid."').size()){
	 	jQuery('.post_carousel_".$postid."').owlCarousel({
        autoPlay: ".$blog_slider_autoPlay.",
        navigation: ".$blog_slider_navigation.",
        slideSpeed: ".$blog_slider_slideSpeed.",
        paginationSpeed: ".$blog_slider_paginationSpeed.",
        singleItem: true,
        pagination: false
    });
    } 
	 });</script>";
	 }
	}
elseif($blog_style=="video"){
	$func_output.='<div class="video">';
		$videotype= get_post_meta($postid, 'dbt_video_select', false,true);
		$ids= get_post_meta($postid, 'dbt_post_video_id', false,true);
		$vwidth = get_post_meta($postid, 'dbt_post_video_width', false,true);
		$vheight = get_post_meta($postid, 'dbt_post_video_height', false,true);
		$vvwidth=650;$vvheight=350;if(isset($vwidth[0]))$vvwidth=$vwidth[0];if(isset($vheight[0]))$vvheight=$vheight[0];
		$vids='';if(!isset($vwidth[0]))$vids='vids';
		if (isset($ids[0]) && $ids[0] != '') 
		{
			if ($videotype[0] == "vimeo" || $videotype == "vimeo"){$func_output.='<iframe src="http://player.vimeo.com/video/' . $ids[0] . '" width="'.$vvwidth.'" height="'.$vvheight.'"  class="post-slider-border  generalframe '.$vids.'"></iframe>'; }
		else {
			$func_output.='<iframe src="http://www.youtube.com/embed/' . $ids[0] . '?wmode=transparent" width="'.$vvwidth.'" height="'.$vvheight.'" class="post-slider-border  generalframe '.$vids.'"></iframe>';
		   }
		}	
		$func_output.='</div>';
	}
else{ 
		if(has_post_thumbnail($postid)){
		$func_output.=get_the_post_thumbnail( $postid,"thumnail",  array('alt' => $post->post_title,'class'=>'img-responsive'));
		}else{
		$func_output.='<img src="'.$img.'" class="img-responsive" alt="img"/>';
		}
}
		$func_output.='<div class="home-blog-overlay">
		<div class="overlay">
		<div class="overlay-inner">
		<a href="'.$page_url.'"><i class="fa fa-link"></i></a>
		</div>
		</div>
		<div class="blog-meta"><span><i class="fa fa-clock-o"></i>'.get_the_modified_date("d/m/y").' <span><i class="fa fa-comments"></i>'.$comment->total_comments.'</span> <span><i class="fa fa-eye"></i>'.$views.'</span></div>
		</div>
		</div>
		<a href="'.$page_url.'">
		<h4>'.$post->post_title.'</h4>
		</a>
		<p>'.flv_port_generate_excerpt($post->content,$excerpt_length).'</p>
		</div>
		</div>';		
	endforeach;
	   wp_reset_postdata(); 
				
	$func_output.='</div></div></div>
	<div class="clear"></div>
	<div class="space30"></div>
	<div class="clear"></div>
	<div class="space30"></div>';
	
     return $func_output;
}


function flv_port_generate_excerpt($text,$row){
    if(strlen($text)>$row){ $excerpt=substr($text, 0, $row); $excerpt.='...';}
    else $excerpt=$text;

  return $excerpt;
}	

function torque_the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url('home');
        echo '"><i class="fa fa-home"></i>';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_single()) {
        	 echo '<li>';
                the_title();
                echo '</li>';

        	}elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<li><strong title="'.$title.'"> '.$title.'</strong></li>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

function flv_multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

/* -----------------------------------Twitter WIDGET----------------------------------------------- */
function torque_torque_twiiterr_func($atts) {
		global $tw_count;$tw_count++;
		$func_output = '';
		$user="beantownthemes";
		$number="3";
		$consumer_key='iEdZIY9TqWYqDQtnNyWzQ';
		$consumer_secret='PztL2UCU2As9km7V3DI3bdaLcriHLa7gE0kuwJ7Ox4';
		$access_token='31509047-yZQ1BJcJ4WYMkvnPnDiNkEg4W3sixunjjpa8PeT7a';
		$access_token_secret='5mtqW6GTOKk7MhHyR28JhOHReHlgGDirLhQpop4E';
		if(isset($atts["user"]) && $atts["user"]!="") {$user=$atts["user"]; }
		if(isset($atts["number"]) && $atts["number"]!="") {$number=$atts["number"];}
		if(isset($atts["consumer_key"]) && $atts["consumer_key"]!="") {$consumer_key=$atts["consumer_key"];}
		if(isset($atts["consumer_secret"]) && $atts["consumer_secret"]!="") {$consumer_secret=$atts["consumer_secret"];}
		if(isset($atts["access_token"]) && $atts["access_token"]!=""){ $access_token=$atts["access_token"];}
		if(isset($atts["access_token_secret"]) && $atts["access_token_secret"]!="") {$access_token_secret=$atts["access_token_secret"];}

		$default_options = array('key'=>$consumer_key, 'secret'=>$consumer_secret, 'token'=>$access_token,'token_secret'=>$access_token_secret,'screenname'=>$user);
		 $tweets = torque_getTweetss($number, $user,$default_options);
		
		$func_output.='<div class="widget-inner-container">
                 <div class="twitter-feed-container">';
		 $func_output.='<ul class="tweet_list">';
		  foreach($tweets as $tweet){
		  $func_output.=' <li><i class="fa fa-twitter"></i>';
		  $func_output.='<span class="tweet_text">';
		  $func_output.=' <a href="javascript:;" class="user">@'.$user.'</a> ';
		  $func_output.=torque_make_links_clickable($tweet["text"]);
		  $func_output.='</span>';  
		 $func_output.='<span class="tweet_time">'.__('about','torque').' '.torque_time_ago($tweet["created_at"]).'</span> ';
		 $func_output.='</li>';               
		 }
		   $func_output.='</ul></div></div>';	
		 return $func_output;
	}  	
 
function torque_getTweetss($count = 20, $username = false, $options = false) {

		  $config['key'] = $options['key'];
		  $config['secret'] = $options['secret'];
		  $config['token'] = $options['token'];
		  $config['token_secret'] = $options['token_secret'];
		  $config['screenname'] = $options['screenname'];
		  
		  $config['cache_expire'] = intval(get_option('tdf_cache_expire'));
		  if ($config['cache_expire'] < 1) {$config['cache_expire'] = 3600;}
		  $config['directory'] = plugin_dir_path(__FILE__);
		  
		  $obj = new StormTwitter($config);
		  $res = $obj->getTweets($count, $username, $options);
		  update_option('tdf_last_error',$obj->st_last_error);
		  return $res;
}

class torque_torque_twitter_widget extends WP_Widget {
	    public $name = 'Twitter Feed';
	    public $control_options = array();
function __construct() {
        $wdesc = '';
        if(isset($this->widget_desc)) {$wdesc = $this->widget_desc;}
        $widget_options = array(
            'classname' => __CLASS__,
            'description' => $wdesc,
        );
        parent::__construct(__CLASS__, $this->name, $widget_options, $this->control_options);
    }
static function register_this_widget() {      register_widget(__CLASS__);    }
function form($instance) {

        $defaults = array('title' => 'Our tweets','torque' => '3','twname'=>'beantownthemes','consumer_key'=>'','consumer_secret'=>'','access_token'=>'','access_token_secret'=>'');
        $instance = wp_parse_args((array) $instance, $defaults);
?>
        <p>
            <p><label for="<?php echo esc_attr($this->get_field_id('title'));; ?>">Title:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title'));?> " value="<?php echo esc_attr($instance['title']); ?>" size="20"> </p>
            <p><label for="<?php echo esc_attr($this->get_field_id('twname')); ?>">User ID:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('twname')); ?>" id="<?php echo esc_attr($this->get_field_id('twname')); ?> " value="<?php echo esc_attr($instance['twname']); ?>" size="20"> </p>
            <p><label for="<?php echo esc_attr($this->get_field_id('torque')); ?>">Tweets Nr:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('torque')); ?>" id="<?php echo esc_attr($this->get_field_id('torque')); ?> " value="<?php echo esc_attr($instance['torque']); ?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>">Consumer key:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('consumer_key')); ?>" id="<?php echo esc_attr($this->get_field_id('consumer_key')); ?> " value="<?php echo esc_attr($instance['consumer_key']); ?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>">Consumer secret:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('consumer_secret')); ?>" id="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?> " value="<?php echo esc_attr($instance['consumer_secret']); ?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('access_token')); ?>">Access token:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('access_token')); ?>" id="<?php echo esc_attr($this->get_field_id('access_token')); ?> " value="<?php echo esc_attr($instance['access_token']);?>" size="20"></input></p>  
            <p><label for="<?php echo esc_attr($this->get_field_id('access_token_secret')); ?>">Access token secret:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('access_token_secret')); ?>" id="<?php echo esc_attr($this->get_field_id('access_token_secret')); ?> " value="<?php echo esc_attr($instance['access_token_secret']); ?>" size="20"></input></p>  
        </p>
<?php
    }
function widget ($args,$instance) {
	  extract($args);
	  echo '<div class="widget">'; 
	  echo'<h4 class="title">'.$instance['title'].'</h4>';
	  $tinyarg2 = array(
	      'user' => $instance['twname'],
	      'number' => $instance['torque'],
	      'consumer_key' => $instance['consumer_key'],
	      'consumer_secret' => $instance['consumer_secret'],
	      'access_token' => $instance['access_token'],
	      'access_token_secret' => $instance['access_token_secret'] );
		
	  	echo torque_torque_twiiterr_func($tinyarg2);
		echo '</div>';
	    }
}



 /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ instagram ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
   
        
    function torque_insta_func($atts){
    	global $fialovy_insta_nr;
    	$fialovy_insta_nr++;
    	$mode="user"; //sau popular
    	$effect="slide";
    	$number=12;
    	$caption="true";
    	$accesst = '19535683.5b9e1e6.8c67ca6d4995481594b9527e41191c0c';
    	$id = '1138644';

		
    	if(isset($atts["user_id"])) {$id = $atts['user_id']; $mode="user";}
		if(isset($atts["access_token"])) $accesst = $atts['access_token'];
		if(isset($atts["number"])) $number = $atts['number'];
		if(isset($atts["effect"])) $effect = $atts['effect'];
		if(isset($atts["caption"]) && $atts["caption"]=="no") $caption ="false";

        
$output='';

$output.='<div class="insta_'.$fialovy_insta_nr.'"></div>';
$output.="<script>	jQuery(document).ready(function($) {
	jQuery('.insta_".$fialovy_insta_nr."').simpleInstagramFancybox({
		captionOn : ".$caption.",
		mode :'".$mode."',
		accessToken :'".$accesst."', // This a mandatory setting that allows you to specify a user token. Default is 19535683.5b9e1e6.8c67ca6d4995481594b9527e41191c0c
		userID : '".$id."', // Set your instagram user ID, get yours here: http://yvesvanbroekhoven.github.com/get-your-instagram-user-id/
		numberOfImages: ".$number.",
		appearEffect : '".$effect."' // Allows you to set the effect used to show photos. Options include fade,slide,motion. 
	}); });</script>";

    return $output;
		
    	}

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ torque_instagram_widget ++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

class torque_instagram_widget extends WP_Widget {

    public $name = 'Instagram Feed';
    public $control_options = array();

    function __construct() {
        $wdesc = '';
        if(isset($this->widget_desc)) $wdesc = $this->widget_desc;
        $widget_options = array(
            'classname' => __CLASS__,
            'description' => $wdesc,
        );
        parent::__construct(__CLASS__, $this->name, $widget_options, $this->control_options);
    }

    static function register_this_widget() {
        register_widget(__CLASS__);
    }

    function form($instance) {

        $defaults = array('instaID' => '1138644', 'title' => 'Instagram','imgnr' => '12','accessToken'=>'19535683.5b9e1e6.8c67ca6d4995481594b9527e41191c0c');
        $instance = wp_parse_args((array) $instance, $defaults);
?>
        <p>
            <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?> " value="<?php echo esc_attr($instance['title']); ?>" size="20"> </p>
            <p><label for="<?php echo esc_attr($this->get_field_id('instaID')); ?>">User ID:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('instaID')); ?>" id="<?php echo esc_attr($this->get_field_id('instaID')); ?> " value="<?php echo esc_attr($instance['instaID']); ?>" size="20"> </p>
            <p><label for="<?php echo esc_attr($this->get_field_id('accessToken')); ?>">AccessToken:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('accessToken')); ?>" id="<?php echo esc_attr($this->get_field_id('accessToken')); ?> " value="<?php echo esc_attr($instance['accessToken']); ?>" size="20"> </p>
            <p><label for="<?php echo $this->get_field_id('imgnr'); ?>">Image Nr:</label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('imgnr')); ?>" id="<?php echo esc_attr($this->get_field_id('imgnr')); ?> " value="<?php echo esc_attr($instance['imgnr']); ?>" size="20"></input></p>  
        </p>
<?php
    }
  function widget ($args,$instance) {
  extract($args);
  echo '<div class="inst_title textwidget"><h4 class="title">'.$instance['title'].'</h4>';
  $tinyarg1 = array(
      'user_id' => $instance['instaID'],
      'access_token' => $instance['accessToken'],
      'number' => $instance['imgnr'],

      );
  echo torque_insta_func($tinyarg1);
 echo '</div>';
    }

}

/* TGM PLUGIN */
function torque_register_required_plugins() {

		$plugins = array(
		array(
		'name' 		=> 'Revolution Slider',
		'slug' 		=> 'revslider',
		'required' 	=> false,
		),
		array(
		'name' 		=> 'FLV Admin Settings',
		'slug' 		=> 'flv_admin_settings',
		'required' 	=> false,
		),
		array(
		'name' 		=> 'FLV Portfolio',
		'slug' 		=> 'flv_torque_portfolio',
		'required' 	=> false,
		),
		array(
		'name' 		=> 'FLV Shortcodes',
		'slug' 		=> 'flv_torque_shortcodes',
		'required' 	=> false,
		),
		array(
		'name' 		=> 'FLV Team Members',
		'slug' 		=> 'flv_torque_team_members',
		'required' 	=> false,
		),
		array(
		'name' 		=> 'Force Regenerate Thumbnails',
		'slug' 		=> 'force-regenerate-thumbnails',
		'required' 	=> false,
		)
		);
	

		$config = array(
			'domain'       		=> 'torque',         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', 'torque' ),
				'menu_title'                       			=> __( 'Install Plugins', 'torque' ),
				'installing'                       			=> __( 'Installing Plugin: %s', 'torque' ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', 'torque' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'Torque theme recommends the following plugin: %1$s. The plugin can be found in your download package (from ThemeForrest). Please install it!', 'Torque theme recommends the following plugins: %1$s. The plugins can be found in your download package (from ThemeForrest). Please install them!' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( '', '' ),
				'activate_link' 				  			=> _n_noop( '', '' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', 'torque' ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'torque' ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'torque' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa( $plugins, $config );

}

function torque_closetags($html) {
    preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
    $openedtags = $result[1];
    preg_match_all('#</([a-z]+)>#iU', $html, $result);
    $closedtags = $result[1];
    $len_opened = count($openedtags);
    if (count($closedtags) == $len_opened) {
        return $html;
    }
    $openedtags = array_reverse($openedtags);
    for ($i=0; $i < $len_opened; $i++) {
        if (!in_array($openedtags[$i], $closedtags)) {
            $html .= '</'.$openedtags[$i].'>';
        } else {
            unset($closedtags[array_search($openedtags[$i], $closedtags)]);
        }
    }
    return $html;
} 