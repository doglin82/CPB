<?php 
/*
Plugin Name: FLV Team Members
Plugin URI: 
Version: 1.1
Author: Fialovy
Author URI: http://fialovy.com/
Description: team memebrs - Torque theme
*/
         
$flv_path = plugins_url('', __FILE__) . '/';
$flv_shortcode2 = 'team_members';

add_action('init', array('flvMembers', 'handle_init'));
add_action('admin_menu' , array('flvMembers', 'team_enable_pages'));
add_action('admin_init', array('flvMembers', 'handle_admin_init'));

add_shortcode( $flv_shortcode2, array('flvMembers', 'show_shortcode'));
$arg = array('description' => "my description", 'parent' => "cat_ID");
$fialovy_member_nr = 0;

class flvMembers{

   public static function handle_init(){
        global $flv_path;

          $labels = array(
            'name' => 'Team Members',   'singular_name' => 'Team Member'  );
          $args = array(
          'query_var' => true,
            'labels' => $labels,
            'public' => true,
            'has_archive' => true, 
            'hierarchical' => false,
            'supports' => array('title','thumbnail')
          ); 
         
		  register_post_type('flv_members',$args);    }
      public static  function show_shortcode($atts){
        	extract( shortcode_atts( array(
		'columns' => 'something',
		'team_name' => 'something',
		'target' => 'something',
		'order'=>'asc',
        'orderby'=>'asc',
        'show_email_button' => 'something',
	), $atts ) );
	
 $foutput='';
 $columns=2;
 $countpost=0;
 $team=$post_flv_member_team='';
  $target="_self";
   $show_email_button="yes";
// $fialovy_member_nr++;
 $order="asc";
 $orderby="";
 

if(isset($atts['columns']))$columns=$atts['columns'];
if($columns>4 || $columns<2)$columns=2;
if(isset($atts['team_name']))$team=$atts['team_name'];
if(isset($atts['target']))$target=$atts['target'];	

if(isset($atts['show_email_button']))$show_email_button=$atts['show_email_button'];	

$show_hiring="yes"; if(isset($atts['show_hiring']))$show_hiring=$atts['show_hiring'];	
$hiring_url='#';if(isset($atts['hiring_url']))$hiring_url=$atts['hiring_url'];	

	if(isset($atts['order']))$order=$atts['order'];
	if(isset($atts['orderby']))$orderby=$atts['orderby'];
	
 $args=array('post_type'=>'flv_members',
            'posts_per_page' => '1500',
            'order'=>$order,
            'orderby'=>$orderby
            );
        $wquery = new WP_Query( $args );
		$i=0;
		$foutput.='<div class="flv-sortable row fitrows-layout team-container">';
		if(!$wquery->posts)
		  $foutput.="Items not found";
		 else
        foreach($wquery->posts as $port){
        	
        	$postid = $port->ID;

  $post_flv_member_image=THEME_URL."content/home/portfolio-showcase-01.jpg";
  $post_flv_member_teams = get_post_meta($postid, 'flv_member_team', true);
  $post_flv_member_qual = get_post_meta($postid, 'flv_member_qualif', true);


  $post_flv_member_url = get_post_meta($postid, 'flv_member_url', true);
  $post_flv_member_img = get_post_meta($postid, 'flv_member_img', true);
  if($post_flv_member_img=='')$post_flv_member_img=$post_flv_member_image;

  $post_flv_member_team=explode(', ',$post_flv_member_teams);
  if(in_array($team, $post_flv_member_team) || $team==''){
  	
  	$i++;

	
if($columns==3){$foutput.='<div class="col one_third">';}
elseif($columns==2){$foutput.='<div class="col one_half">';}
else{ $foutput.='<div class="col one_quarter">';}   
		 
  
 $foutput.='<div class="avatar_2_wrap">';
 if ( has_post_thumbnail($postid)) {
$foutput.=get_the_post_thumbnail( $postid,"team",  array('alt' =>$port->post_title,'class'=>'avatar_2'));
}else{
$foutput.='<img alt="" src="'.$post_flv_member_image.'" class="avatar_2" />';	
}
   	  
		 $foutput.='</div>
					<header class="avatar_title">
						<h5>'. $port->post_title.'<span><a href="'.$post_flv_member_url.'">'.$post_flv_member_qual.'</a></span></h5>
					</header>';
					
          $foutput.='</div>';

		if($i==$columns){
		$i=0;}
           }
        }

if($show_hiring=="yes"){
	
if($columns==3){$foutput.='<div class="col one_third">';}
elseif($columns==2){$foutput.='<div class="col one_half">';}
else{ $foutput.='<div class="col one_quarter">';}   
		 
	 $foutput.='<div class="avatar_2_wrap">
							<a class="btn btn_color medium" href="'.$hiring_url.'">Apply Now</a>
							<img src="'.THEME_URL.'img/avatar/163x163_default.jpg" alt="" class="avatar_2"/>
						</div>
						<header class="avatar_title">
							<h5>We\'re Hiring<span><a href="'.$hiring_url.'">Think you have what it takes?</a></span></h5>
						</header>
					</div>';
}


$foutput.='</div>';

      return $foutput;
    }
 public static  function team_enable_settings(){
   	 ?>
			<div class="wrap">
				<div id="icon-options-general" class="icon32"><br></div>
				<h2><?php _e('Team Members Settings', 'fialovy'); ?></h2>

		<form method="post" action="options.php" class="flv-custom-port-table">
	<table class="form-table wp-list-table widefat fixed posts">
		<thead>
		 <th style="width:15%" class="manage-column " id="options" scope="col">Option name</th>
        <th style="width:85%" class="manage-column " id="value" scope="col">Value</th>
        </thead>
        <?php settings_fields('flv_team_admin_settings'); ?>
		<?php do_settings_sections('flv_team_admin_settings'); ?>
       
    </table>
					<p class="submit">
						<input name="Submit" type="submit" class="button-primary" value="<?php _e('Save Changes', 'fialovy'); ?>" />
					</p>
				</form>
			<div class="desc"><strong>NOTE:</strong> You may need to <a href="http://wordpress.org/plugins/force-regenerate-thumbnails/">regenerate your thumbnails</a> after changing sizes.</div>
			</div>

		<?php
   } 
public static function settings_validate($input) {

			return $input;
		}  
	public static  function team_enable_pages(){
   	    $page_title = __('Team Members Settings', 'fialovy');
		$menu_title = __('Settings', 'fialovy');
		$capability = 'manage_options';
		$function =  array( 'flvMembers', 'team_enable_settings');
		$parent_slug='edit.php?post_type=flv_members';
add_submenu_page($parent_slug, $page_title, $menu_title, $capability, basename(__FILE__), $function);

   }
        public static  function handle_admin_init(){
        add_meta_box('screen_options', 'Member Information & Settings', 'flv_screen_opt2', 'flv_members', 'normal', 'high');
		register_setting( 'flv_team_admin_settings', 'flv_team_admin_settings', array('flvMembers', 'settings_validate'));
	add_settings_section( 'team_settings', __( '', 'fialovy' ), array('flvMembers', 'section_team_settings' ),'flv_team_admin_settings');
	
	add_settings_field( 'team_height', __( '', 'fialovy' ), array('flvMembers', 'section_team_height' ),'flv_team_admin_settings', 'team_settings');
	add_settings_field( 'team_width', __( '', 'fialovy' ), array('flvMembers', 'section_team_width' ),'flv_team_admin_settings', 'team_settings');
	
    }
		/* height */
public static  function section_team_settings() 	{}
public static function section_team_height() 	{ $options = get_option( 'flv_team_admin_settings' );  $value='';if(isset($options['team_height'])) {$value=$options['team_height'];}  ?>
	 <tr> <th scope="row">Team Member Image Height:</th>   <td><input type="text" name="flv_team_admin_settings[team_height]" value="<?php echo $value; ?>" /> <span class="desc">(default: 740)</span></td> </tr>    	    <?php		}
public static function section_team_width() 	{ $options = get_option( 'flv_team_admin_settings' );  $value='';if(isset($options['team_width'])) {$value=$options['team_width'];}  ?>
	 <tr> <th scope="row">Team Member Image Width:</th>   <td><input type="text" name="flv_team_admin_settings[team_width]" value="<?php echo $value; ?>" /> <span class="desc">(default: 740)</span></td> </tr>    	    <?php		}		
}


function flv_screen_opt2() {
  global $post,$flv_path;
  /* General options */
   $flv_bigimage = '';
   $flv_member_team = get_post_meta($post->ID, 'flv_member_team', true);
  $flv_member_qual = get_post_meta($post->ID, 'flv_member_qualif', true);
   $flv_member_url = get_post_meta($post->ID, 'flv_member_url', true);

echo'<input type="hidden" name="flv_nonce" value="'.wp_create_nonce('flv_nonce').'" />
<div id="options">
<div id="lightboxx">
<h3>'.__("General Info").'</h3><br/>
<table cellpadding="0" cellspacing="5" style="width:100%">
<tr>
<td style="width:10%">'.__("Team name").':</td>
<td><input class="textinput upload"type="text" id="screen-thumbnail" name="flv_member_team" value="'.$flv_member_team.'" style="width:75%;" /><br/><span style="font-style:italic;">you can add multiple team names separated by ", "</span></td>
</tr>
<tr>
<td style="width:10%">'.__("Qualification").':</td>
<td><input class="textinput"type="text" id="flv_member_qualif" name="flv_member_qualif" value="'.__($flv_member_qual).'" style="width:75%;" /></td>
</tr>
<tr>
<td style="width:10%">'.__("URL").':</td>
<td><input class="textinput"type="text" id="flv_member_url" name="flv_member_url" value="'.__($flv_member_url).'" style="width:75%;" /></td>
</tr>
</table>
</div>
</div>';
}

add_action('save_post', 'flv_update_opt2');
function flv_update_opt2($post_id) {
global $post;

if(isset($post) && $post->post_type!='flv_members')
return $post_id;

/* Check autosave */
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
return $post_id;
}
if ( isset($_POST['flv_nonce'])  ) {
$nonce=$_REQUEST['flv_nonce'];
if (! wp_verify_nonce($nonce, 'flv_nonce') ) wp_die('Security check');
}

if( isset( $_POST['flv_member_team'] ) )update_post_meta($post->ID,'flv_member_team',$_POST['flv_member_team']);
if( isset( $_POST['flv_member_qualif'] ) )update_post_meta($post->ID,'flv_member_qualif',$_POST['flv_member_qualif']);
if( isset( $_POST['flv_member_url'] ) )update_post_meta($post->ID,'flv_member_url',$_POST['flv_member_url']);

}
 
 
add_action('admin_head', 'flv_the_member_head');
function flv_the_member_head(){
        global $post;
    if(isset($post) && $post->post_type=='flv_members'){
          
?>
        <script>
        jQuery(document).ready(function($){
        	
           orig_send_to_editor=window.send_to_editor;
 jQuery('.textinput.upload').change(function(){
                $this = $(this);
                $this.next().next().attr('src', $this.val());
            })    	
  jQuery('.flv_member_upload').click(function(e) {
  	window.upl_target = jQuery(this).prev();
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = jQuery(this);

    wp.media.editor.send.attachment = function(props, attachment){ 
     	var url=attachment.url;
        window.upl_target.val(url);
    }
    wp.media.editor.open(button);
    return false;
  });
        });

        </script>
        <?php
    }
} ?>