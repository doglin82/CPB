<?php 
/*
Plugin Name: FLV Admin Settings
Plugin URI: 
Version: 1.1
Author: Fialovy
Author URI: http://fialovy.com/
Description: customise your admin page
*/
function annointed_admin_bar_remove() {
        global $wp_admin_bar;

        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( ! class_exists( 'flv_admin' ) ) {


	class flv_admin {

		/*--------------------------------------------*
		 * Constructor
		 *--------------------------------------------*/

		/**
		 * Initializes the plugin by setting localization, filters, and administration functions.
		 */
		function __construct() {

			// Adding Plugin Menu
			add_action( 'admin_menu', array( &$this, 'flv_menu' ) );

			// Register Settings
			add_action( 'admin_init', array( &$this, 'flv_adm_settings' ) );

			// Change Login header URL
			add_filter( 'login_headerurl', array( &$this, 'flv_adm_set_login_headerurl' ) );

			// Change Login header Title
			add_filter( 'login_headertitle', array( &$this, 'flv_login_headertitle' ) );

			// Change the default Login page Logo
			add_action( 'login_head', array( &$this, 'flv_adm_set_login_logo' ) );


		} // end constructor

		/**
		 * Defines constants for the plugin.
		 */
		function constants() {
			define( 'flv_admin_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		}

		/*--------------------------------------------*
		 * Admin Menu
		 *--------------------------------------------*/

		function flv_menu()
		{
			$page_title = __('FLV Admin Settings', 'fialovy');
			$menu_title = __('FLV Admin Settings', 'fialovy');
			$capability = 'manage_options';
			$menu_slug = 'flv_adm_set';
			$function =  array( &$this, 'flv_menu_contents');
			add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);

		}	//flv_menu


		/*--------------------------------------------*
		 * Settings & Settings Page
		 *--------------------------------------------*/

		public function flv_adm_settings() {
  $options = get_option( 'flv_adm_settings' );
  
if( $options['flv_adm_footer_text'] != "" ) {
	global $opt_value_footer; $opt_value_footer=$options['flv_adm_footer_text'];
	function remove_footer_admin () {global $opt_value_footer; echo $opt_value_footer;   }
	add_filter('admin_footer_text', 'remove_footer_admin'); 
}
if( $options['flv_adm_howdy_text'] != "" ) {
	global $opt_value_howdy; $opt_value_howdy=$options['flv_adm_howdy_text'];
	add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );
	function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
		global $opt_value_howdy;
	$user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_edit_profile_url( $user_id );
	if ( 0 != $user_id ) {
	/* Add the "My Account" menu */
	$avatar = get_avatar( $user_id, 28 );
	$howdy = sprintf( __($opt_value_howdy.', %1$s'), $current_user->display_name );
	$class = empty( $avatar ) ? '' : 'with-avatar';
	$wp_admin_bar->add_menu( array('id' => 'my-account','parent' => 'top-secondary','title' => $howdy . $avatar,'href' => $profile_url,'meta' => array('class' => $class,),
	) );
	}
	};	
}

if($options['flv_adm_hidewplog_text']=="yes"){
		
		add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);
	}

			// Settings
	register_setting( 'flv_adm_settings', 'flv_adm_settings', array(&$this, 'settings_validate') );

			// Logo Settings
	add_settings_section( 'login_logo', __( '', 'fialovy' ), array( &$this, 'section_login_logo' ), 'flv_adm_settings' );
	add_settings_field( 'login_logo_url', __( 'Url Of Login Logo', 'fialovy' ), array( &$this, 'section_login_logo_url' ), 'flv_adm_settings', 'login_logo' );
	add_settings_field( 'login_logo_height', __( 'Set Logo Height', 'fialovy' ), array( &$this, 'section_login_logo_height' ), 'flv_adm_settings', 'login_logo' );
	add_settings_field( 'flv_adm_howdy_text', __( 'Custom Howdy text:', 'fialovy' ), array( &$this, 'section_flv_adm_howdy_text' ), 'flv_adm_settings', 'login_logo' );
	add_settings_field( 'flv_adm_hidewplog_text', __( 'Hide top - left wp logo:', 'fialovy' ), array( &$this, 'section_flv_adm_hidewplog_text' ), 'flv_adm_settings', 'login_logo' );
	add_settings_field( 'flv_adm_footer_text', __( 'Custom Bottom Footer text:', 'fialovy' ), array( &$this, 'section_flv_adm_footer_text' ), 'flv_adm_settings', 'login_logo' );

		}	//flv_adm_settings


		/*--------------------------------------------*
		 * Settings & Settings Page
		 * flv_menu_contents
		 *--------------------------------------------*/

		public function flv_menu_contents() {
		?>
			<div class="wrap">
				<!--<div id="icon-freshdesk-32" class="icon32"><br></div>-->
				<div id="icon-options-general" class="icon32"><br></div>
				<h2><?php _e('FLV Admin Settings', 'fialovy'); ?></h2>

				<form method="post" action="options.php" class="flv-custom-table">
					<?php settings_fields('flv_adm_settings'); ?>
					<?php do_settings_sections('flv_adm_settings'); ?>
					<p class="submit">
						<input name="Submit" type="submit" class="button-primary" value="<?php _e('Save Changes', 'fialovy'); ?>" />
					</p>
				</form>
			</div>

		<?php
		}	//flv_menu_contents


		function section_login_logo() 	{


		}

		function section_login_logo_url() 	{
		    $options = get_option( 'flv_adm_settings' );
		    ?>
		    <span class='upload'>
		        <input type='text' size="120"  id='flv_adm_settings[login_logo_url]' class='text-upload' name='flv_adm_settings[login_logo_url]' value='<?php echo esc_url( $options["login_logo_url"] ); ?>'/>
		        <img style='max-width: 300px; display: block;' src='<?php echo esc_url( $options["login_logo_url"] ); ?>' class='preview-upload' />
		    </span>
		    <?php
		}

		function section_login_logo_height() 	{
		    $options = get_option( 'flv_adm_settings' );

		    ?>
		        <input type='text'  size="120" id='flv_adm_settings[login_logo_height]' class='text' name='flv_adm_settings[login_logo_height]' value='<?php echo sanitize_text_field($options["login_logo_height"]); ?>'/> px
		    <?php
		}
		function section_flv_adm_howdy_text() 	{
		    $options = get_option( 'flv_adm_settings' );

		    ?>
		        <input type='text' size="120"  id='flv_adm_settings[flv_adm_howdy_text]' class='text' name='flv_adm_settings[flv_adm_howdy_text]' value='<?php echo sanitize_text_field($options["flv_adm_howdy_text"]); ?>'/>
		    <?php
		}
		function section_flv_adm_hidewplog_text() 	{
		    $options = get_option( 'flv_adm_settings' );

		    ?>

		   <select  id='flv_adm_settings[flv_adm_hidewplog_text]' name="flv_adm_settings[flv_adm_hidewplog_text]"><?php $val=sanitize_text_field($options["flv_adm_hidewplog_text"]);$sel_no="";$sel_yes=""; if($val=="no")$sel_no="selected";else $sel_yes="selected";?><option value="no" <?php echo $sel_no; ?>>no</option><option value="yes" <?php echo $sel_yes; ?>>yes</option></select>
    <?php }
		function section_flv_adm_footer_text() 	{
		    $options = get_option( 'flv_adm_settings' );

		    ?>
		        <input type='text'  size="120" id='flv_adm_settings[flv_adm_footer_text]' class='text' name='flv_adm_settings[flv_adm_footer_text]' value='<?php echo sanitize_text_field($options["flv_adm_footer_text"]); ?>'/>
		    <?php
		}


		/*--------------------------------------------*
		 * Settings Validation
		 *--------------------------------------------*/

		function settings_validate($input) {

			return $input;
		}


		/*--------------------------------------------*
		 * Plugin Functions
		 *--------------------------------------------*/

		function flv_adm_set_login_logo() {

			$options = get_option( 'flv_adm_settings' );

			if( $options['login_logo_url'] != "" ) {
				echo '<style type="text/css">
	        	h1 a { background-image:url('.esc_url( $options["login_logo_url"] ).') !important; 	height:'.sanitize_text_field( $options["login_logo_height"] ).'px !important; background-size: auto auto !important; }
	        		</style>';
	    	}
		}

		function flv_login_headertitle( $title ) {		return get_bloginfo( 'name' );		}

		function flv_adm_set_login_headerurl( $url ) {			return home_url();		}

	} // End Class


	// Initiation call of plugin
	$flv_adm = new flv_admin(__FILE__);

}
?>