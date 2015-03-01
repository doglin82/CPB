<?php
/**
 * Custom template meta for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package gentleman
 */

 



/*  posts options */
	$prefix = 'dbt_';
	
$meta_box_quote = array(
	'id' => 'meta-box-quote',
	'title' =>  __('Quote Settings', 'framework'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('The Quote Author','framework'),
				"desc" => __('','framework'),
				"id" => $prefix."quote",
				"type" => "text"
			),
	),
	
	
);

$meta_box_image = array(
	'id' => 'meta-box-image',
	'title' =>  __('Image Settings', 'framework'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Enable Lightbox','framework'),
				"desc" => __('Check this to enable the lightbox.','framework'),
				"id" => $prefix."image_lightbox",
				"type" => "select",
				'std' => 'no',
				'options' => array('yes', 'no'),
			),
	),
	
	
);

	

/** Start Section "declare_meta" */
/*========================================================= page settings */


	$meta_box_page = array(
	'id' => 'gentleman-box',
	'title' => 'Page Settings',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
	'name' => 'Hide breadcrumbs area',
	'id' => $prefix . 'hide_title',
	'type' => 'checkbox'
	),
	array(
	'name' => 'Add a custom title',
	'id' => $prefix . 'title1',
	'type' => 'text'
	),
	array(
	'name' => 'Select sidebar',
	'id' => $prefix . 'sidebar',
	'type' => 'select',
	'options' => array('Blog sidebar','Sidebar 1','Sidebar 2','Sidebar 3','Sidebar 4','Sidebar 5')
	),
	array(
	'name' => 'Blog style',
	'id' => $prefix . 'blog_pagi',
	'type' => 'select',
	'options' => array('default','masonry')
	)
	,
	array(
	'name' => 'Blog masonry columns',
	'id' => $prefix . 'blog_masonry_col',
	'type' => 'select',
	'options' => array('3','4','2')
	)
	)
	);


/*========================================================= page settings portfolio */


$args = array( 'orderby' => 'name', 'order' => 'ASC' );
$all_categories = get_categories($args);
$categories=array();
$categories_desc=array();
  foreach($all_categories as $category) {
  	if($category->name!="Uncategorized"){
  	 array_push($categories,$category->name);
	array_push($categories_desc,$category->name." (".$category->count.")");
  }

  } 

	$meta_box_page_portfolio = array(
	'id' => 'gentleman-box-port',
	'title' => 'Page Settings',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
	'name' => 'Header settings',
	'id' => $prefix . 'headerr',
	'type' => 'headline'
	),
	array(
	'name' => 'Hide breadcrumbs area',
	'id' => $prefix . 'hide_title_port',
	'type' => 'checkbox'
	),
	array(
	'name' => 'Add a custom title',
	'id' => $prefix . 'title_port',
	'type' => 'text'
	),
	array(
	'name' => 'Shortcode generator',
	'id' => $prefix . 'headline',
	'type' => 'headline'
	),
	array(
	'name' => 'Number of columns',
	'id' => $prefix . 'portfolio_s_columns',
	'type' => 'select',
	'options' => array('2','3','4')
	),
	array(
	'name' => 'Style',
	'id' => $prefix . 'portfolio_s_style',
	'type' => 'select',
	'options' => array('style 1','style 2','style 3')
	),
	array(
	'name' => 'Categories to display:',
	'id' => $prefix . 'portfolio_s_categories',
	'type' => 'select_multi',
	'options' => $categories,
	'desc'=> $categories_desc
	),
	array(
	'name' => 'Order',
	'id' => $prefix . 'portfolio_s_order',
	'type' => 'select',
	'options' => array('asc','desc')
	),
	array(
	'name' => 'Order By',
	'id' => $prefix . 'portfolio_s_orderby',
	'type' => 'select',
	'options' => array('none','ID','author','title','name','date','modified','parent','rand','comment_count','likes')
	),
	array(
	'name' => 'Thumb Height',
	'id' => $prefix . 'portfolio_s_theight',
	'type' => 'select',
	'options' => array('Custom Thumbnail Size','Default Image Size')
	),
	array(
	'name' => 'Page content below portfolio',
	'id' => $prefix . 'ppage',
	'type' => 'headline'
	),
	array(
	'name' => 'Page content:',
	'id' => $prefix . 'portfolio_s_content',
	'type' => 'rich_textarea'
	),
	)
	); 
	
	$meta_box_all_pages = array(
	'id' => 'gentleman-page-settings',
	'title' => 'Background Settings',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
	'name' => 'Insert background color',
	'id' => $prefix . 'bgcolor',
	'type' => 'text'
	),
	array(
	'name' => 'Stretched background',
	'id' => $prefix . 'bgpattern_fix',
	'type' => 'checkbox'
	),
	array(
	'name' => 'Insert background image',
	'id' => $prefix . 'bgimg',
	'type' => 'upload'
	),
	array(
	'name' => 'Insert background image width',
	'id' => $prefix . 'bgimgw',
	'type' => 'text'
	),
	array(
	'name' => 'Insert background image height',
	'id' => $prefix . 'bgimgh',
	'type' => 'text'
	),
	array(
	'name' => 'Select image repeat option',
	'id' => $prefix . 'bgrepeat',
	'type' => 'select',
	'options' => array('repeat','repeat-x','repeat-y','no-repeat','fixed')
	),
	)
	);
	$meta_box_gallery = array(
	'id' => 'gentleman-meta-box-gallery',
	'title' =>  __('Gallery Settings', 'getleman'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array( "name" => __('Slider Imges','getleman'),
				"desc" => __(' ','getleman'),
				"id" => $prefix."post_gallery",
				"type" => "textarea"
	),
	array(
	'name' => 'Autoplay',
	"desc" => __(' ','getleman'),
	'id' => $prefix . 'blog_slider_autoplay',
	'type' => 'select',
	'options' => array('yes','no'),
	),
	array(
	'name' => 'Responsive',
	"desc" => __(' ','getleman'),
	'id' => $prefix . 'blog_slider_responsive',
	'type' => 'select',
	'options' => array('yes','no'),
	),
	array(
	'name' => 'Slide speed',
	"desc" => __(' ','getleman'),
	'id' => $prefix . 'blog_slider_slideSpeed',
	'type' => 'text'
	),
	array(
	'name' => 'Effect',
	"desc" => __(' ','getleman'),
	'id' => $prefix . 'blog_slider_effect',
	'type' => 'select',
	'options' => array("slide","random","blinds1","blinds1Up","blinds1Right","blinds1Down","blinds1Left","blinds2","blinds2Up","blinds2Right","blinds2Down","blinds2Left","fold","foldUp","foldRight","foldDown","foldLeft","pushOut","pushOutUp","pushOutRight","pushOutDown","pushOutLeft","pushIn","pushInUp","pushInRight","pushInDown","pushInLeft","reveal","revealUp","revealRight","revealDown","revealLeft","slice","sliceUp","sliceRight","sliceDown","sliceLeft","sliceReverse","sliceReverseUp","sliceReverseRight","sliceReverseDown","sliceReverseLeft","sliceRandom","sliceRandomUp","sliceRandomRight","sliceRandomDown","sliceRandomLeft","sliceReveal","sliceRevealUp","sliceRevealRight","sliceRevealDown","sliceRevealLeft","sliceRevealReverse","sliceRevealReverseUp","sliceRevealReverseRight","sliceRevealReverseDown","sliceRevealReverseLeft","sliceRevealRandom","sliceRevealRandomUp","sliceRevealRandomRight","sliceRevealRandomDown","sliceRevealRandomLeft","sliceFade","sliceFadeUp","sliceFadeRight","sliceFadeDown","sliceFadeLeft","zip","zipUp","zipRight","zipDown","zipLeft","unzip","unzipUp","unzipRight","unzipDown","unzipLeft","boxRandom","boxRandomGrowIn","boxRandomGrowOut","boxRainUpLeft","boxRainDownLeft","boxRainDownRight","boxRainUpRight","boxRainGrowInUpLeft","boxRainGrowInDownLeft","boxRainGrowInDownRight","boxRainGrowInUpRight","boxRainGrowOutUpLeft","boxRainGrowOutDownLeft","boxRainGrowOutDownRight","boxRainGrowOutUpRight","boxRainFlyInUpLeft","boxRainFlyInDownLeft","boxRainFlyInDownRight","boxRainFlyInUpRight","boxRainFlyOutUpLeft","boxRainFlyOutDownLeft","boxRainFlyOutDownRight","boxRainFlyOutUpRight","boxSpiralInWards","boxSpiralInWardsGrowIn","boxSpiralInWardsGrowOut","boxSpiralOutWards","boxSpiralOutWardsGrowIn","boxSpiralOutWardsGrowOut","fade","fadeOutIn","foldRandomHorizontal","foldRandomVertical","stackUp","stackUpReverse","stackRight","stackRightReverse","stackDown","stackDownReverse","stackLeft","stackLeftReverse"),
	)
	)
);
	$meta_box_video = array(
	'id' => 'gentleman-meta-box-video',
	'title' =>  __('Video Settings', 'getleman'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Select video type','getleman'),
				"desc" => __(' ','framework'),
				"id" => $prefix."video_select",
				"type" => "select",
				'options' => array('youtube', 'vimeo')
			),
		array( "name" => __('Id of video','getleman'),
				"desc" => __(' ','framework'),
				"id" => $prefix."post_video_id",
				"type" => "text"
			),
		array( "name" => __('Width','framework'),
				"desc" => __('in pixels.','getleman'),
				"id" => $prefix."post_video_width",
				"type" => "text"
			),
		array( "name" => __('Height','framework'),
				"desc" => __('in pixels.','getleman'),
				"id" => $prefix."post_video_height",
				"type" => "text"
			)
	)
	
	
);





/*  posts options declaration*/



function torque_page_add_box() {
	global $meta_box_page,$meta_box_gallery, $meta_box_video,$meta_box_all_pages,$meta_box_page_portfolio,$meta_box_quote, $meta_box_image;

	add_meta_box($meta_box_page['id'], $meta_box_page['title'],'torque_page_show_box','page', $meta_box_page['context'], $meta_box_page['priority']);
	add_meta_box($meta_box_page_portfolio['id'], $meta_box_page_portfolio['title'], 'torque_show_page_portfolio', 'page', $meta_box_page_portfolio['context'], $meta_box_page_portfolio['priority']);
	
	add_meta_box($meta_box_all_pages['id'], $meta_box_all_pages['title'], 'torque_page_show_box_all', 'flv_portfolio', $meta_box_all_pages['context'], $meta_box_all_pages['priority']);
	add_meta_box($meta_box_all_pages['id'], $meta_box_all_pages['title'], 'torque_page_show_box_all', 'post', $meta_box_all_pages['context'], $meta_box_all_pages['priority']);
	add_meta_box($meta_box_all_pages['id'], $meta_box_all_pages['title'], 'torque_page_show_box_all', 'page', $meta_box_all_pages['context'], $meta_box_all_pages['priority']);
	add_meta_box($meta_box_all_pages['id'], $meta_box_all_pages['title'], 'torque_page_show_box_all', 'product', $meta_box_all_pages['context'], $meta_box_all_pages['priority']);
	
	add_meta_box($meta_box_gallery['id'], $meta_box_gallery['title'], 'torque_show_box_galley','post', $meta_box_gallery['context'], $meta_box_gallery['priority']);
	add_meta_box($meta_box_video['id'], $meta_box_video['title'], 'torque_show_box_video', 'post', $meta_box_video['context'], $meta_box_video['priority']);
	add_meta_box($meta_box_quote['id'], $meta_box_quote['title'], 'chemistry_show_box_quote', $meta_box_quote['page'], $meta_box_quote['context'], $meta_box_quote['priority']);
	add_meta_box($meta_box_image['id'], $meta_box_image['title'], 'chemistry_show_box_image', $meta_box_image['page'], $meta_box_image['context'], $meta_box_image['priority']);


	}


function torque_show_page_portfolio() {
		global $meta_box_page_portfolio,$post;
		
		wp_create_nonce('gentleman4_meta_box_nonce');
		wp_nonce_field( 'my_gentleman4_meta_box_nonce','gentleman4_meta_box_nonce' );
		
		echo '<table class="form-table">';
		foreach ($meta_box_page_portfolio['fields'] as $field) {
			$meta = get_post_meta($post -> ID, $field['id'], true);
			if($field['type']!='headline')	{echo '<tr>', '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>', '<td>';}
			switch ($field['type']) {
				case 'checkbox' :
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
				case 'text' :
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="' . $meta . '" size="30" style="width:100%" />', '<br />';
					break;
				case 'upload' :
					echo '<img width="20" height="20" style="vertical-align:middle;margin-right:5px;" src="' . $meta . '"/><input class="special_img" type="text" name="', $field['id'], '" id="', $field['id'], '" value="' . $meta . '" size="30" style="width:85%;margin-right:10px;" /><button class="flv_upload_image button">Upload</button>', '<br />';
					break;
					case 'rich_textarea' :
				echo ' <div class="customEditor"><textarea class="flv_textarea hidden" name="custom_meta_box" id="'.$field['id'].'">' . $meta. '</textarea></div>
				<div id="poststuff"> '.wp_editor(html_entity_decode($meta),$field['id']) .'</div>';
				break;	
				case 'select' :
					echo '<label for="', $field['id'], '">';
		
					echo '<select id="' . $field['id'] . '" name="' . $field['id'] . '">';
		
					foreach ($field['options'] as $option) {
		
						echo '<option';
						if ($meta == $option) {
							echo ' selected="selected"';
						}
						echo '>' . $option . '</option>';
					}
					echo '</select>';
					break;
					case 'select_multi' :
	
						 echo '<select data-placeholder="Choose a building..." multiple="true" class="chosen" name="'.$field['id'].'[]" id="'.$field['id'].'">';
                           $index=0;
                            foreach ($field['options'] as $option) {
                            	echo '<option';
								if( is_array($meta) && in_array($option, $meta) || $option==$meta)
                               { echo ' selected="selected"';}
								else {echo'';}
								echo' value="'.$option.'">'.$field['desc'][$index].'</option>';
								$index++;
                            }
                            echo '</select>';
                      
					break;
					
				case 'textarea' :
				echo '<textarea class="flv_textarea" name="', $field['id'], '" id="', $field['id'], '">' . $meta . '</textarea>';
				break;
				case 'headline' :
				echo '<tr><th style="padding:30px 0 30px 0;"><div id="options" style="height:20px;"><h3 class="flv-important5" style="height:15px;"></h3></div></th><td style="padding:30px 0 30px 0;margin:0px ;width:100%;"><div id="options"><h3 class="flv-important5">' . $field['name'] . '</h3></div></td></tr>';
				break;
			}
			echo '<td>', '</tr>';
		}
		echo '</table>';
		}
/*====================================================================page settings display */
function torque_page_show_box() {
		global $meta_box_page,$post;
		
		wp_create_nonce('torque_meta_box_nonce');
		wp_nonce_field( 'my_torque_meta_box_nonce','torque_meta_box_nonce' );
		
		echo '<table class="form-table">';
		foreach ($meta_box_page['fields'] as $field) {
			$meta = get_post_meta($post -> ID, $field['id'], true);
			echo '<tr>', '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>', '<td>';
			switch ($field['type']) {
				case 'checkbox' :
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
				case 'text' :
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="' . $meta . '" size="30" style="width:100%" />', '<br />';
					break;
				case 'upload' :
					echo '<img width="20" height="20" style="vertical-align:middle;margin-right:5px;" src="' . $meta . '"/><input class="special_img" type="text" name="', $field['id'], '" id="', $field['id'], '" value="' . $meta . '" size="30" style="width:85%;margin-right:10px;" /><button class="flv_upload_image button">Upload</button>', '<br />';
					break;
				case 'rich_textarea' :
				echo ' <div class="customEditor"><textarea class="flv_textarea hidden" name="custom_meta_box" id="'.$field['id'].'">' . $meta. '</textarea></div>
				<div id="poststuff"> '.wp_editor(html_entity_decode($meta),$field['id']) .'</div>';
				break;	
				case 'select' :
					echo '<label for="', $field['id'], '">';
		
					echo '<select id="' . $field['id'] . '" name="' . $field['id'] . '">';
		
					foreach ($field['options'] as $option) {
		
						echo '<option';
						if ($meta == $option) {
							echo ' selected="selected"';
						}
						echo '>' . $option . '</option>';
					}
					echo '</select>';
					break;
				case 'textarea' :
				echo '<textarea class="flv_textarea" name="', $field['id'], '" id="', $field['id'], '">' . $meta . '</textarea>';
				break;
			}
			echo '<td>', '</tr>';
		}
		echo '</table>';
		}
/*====================================================================page settings display */
function torque_page_show_box_all() {
		global $meta_box_all_pages,$post;
		
		wp_create_nonce('gentleman3_meta_box_nonce');
		wp_nonce_field( 'my_gentleman3_meta_box_nonce','gentleman3_meta_box_nonce' );
		  ?><script>jQuery(document).ready(function($) { 
jQuery('.special_img').change(function(){   $this = jQuery(this);        $this.prev().attr('src', $this.val());            })

	  jQuery('.flv_upload_image').click(function(e) {
	  	window.upl_target3 = jQuery(this).prev();
	    var send_attachment_bkp = wp.media.editor.send.attachment;  var button = jQuery(this);
		wp.media.editor.send.attachment = function(props, attachment){ 
			
	    ceva=window.upl_target3.val();    ceva=attachment.url;    window.upl_target3.val(ceva);
	    
		var sp_div=button.prev();var url=attachment.url;
		sp_div.append(url.trim());
		
		  }
      wp.media.editor.open(button);
      return false;
 	 });
 	 
 
  jQuery('.add_media').on('click', function(){
    _custom_media = false;
  });
 });
</script>
            <?php
		echo '<table class="form-table">';
		foreach ($meta_box_all_pages['fields'] as $field) {
			$meta = get_post_meta($post -> ID, $field['id'], true);
			echo '<tr>', '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>', '<td>';
			switch ($field['type']) {
				case 'checkbox' :
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
				case 'header' :
					echo '<h3 class="flv-important5">'.$field['desc'].'</h3>';
					break;
					
				case 'textblockupload' :
					if ($meta == '')
						{$meta = " ";}
					echo '<textarea style="display:none" name="', $field['id'], '" id="', $field['id'], '">' . $meta . '</textarea><div id="my_special_div"  >' . genlteman_transform($meta) . '</div><button class="flv_upload_slide button">Upload</button>';
					break;
				case 'text' :
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="' . $meta . '" size="30" style="width:100%" />', '<br />';
					break;
				case 'upload' :
					echo '<img width="20" height="20" style="vertical-align:middle;margin-right:5px;" src="' . $meta . '"/><input class="special_img" type="text" name="', $field['id'], '" id="', $field['id'], '" value="' . $meta . '" size="30" style="width:85%;margin-right:10px;" /><button class="flv_upload_image button">Upload</button>', '<br />';
					break;
				case 'select' :
					echo '<label for="', $field['id'], '">';
		
					echo '<select id="' . $field['id'] . '" name="' . $field['id'] . '">';
		
					foreach ($field['options'] as $option) {
		
						echo '<option';
						if ($meta == $option) {
							echo ' selected="selected"';
						}
						echo '>' . $option . '</option>';
					}
					echo '</select>';
					break;
				case 'textarea' :
				echo '<textarea class="flv_textarea" name="', $field['id'], '" id="', $field['id'], '">' . $meta . '</textarea>';
				break;
			}
			echo '<td>', '</tr>';
		}
		echo '</table>';
		}
/*====================================================================post gallery settings */
function torque_show_box_galley() {
	global $meta_box_gallery, $post;
	
	
		wp_create_nonce('gentleman1_meta_box_nonce');
		wp_nonce_field( 'my_gentleman1_meta_box_nonce','gentleman1_meta_box_nonce' );
		

	echo '<table class="form-table">';
 
	foreach ($meta_box_gallery['fields'] as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 			
				
			case 'text':
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta!='' ? $meta: '', '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			break;
	
			case 'textarea':
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			if($meta=='')$meta=" ";
			echo '<textarea style="display:none;" name="', $field['id'], '" id="', $field['id'], '">'.$meta.'</textarea><div id="my_special_div9" >'.torque_gallery_transform($meta).'</div><button class="flv_upload_slide9 button">Upload</button>';
			break;
			
			case 'select':
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				echo'<select id="'.$field['id'].'" name="'.$field['id'].'">';
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				} 
				
				echo'</select>';
				break;
			
		}
	}
	echo '</table>';

}
/*====================================================================post video settings */
function torque_show_box_video() {
	global $meta_box_video, $post;
	
	wp_create_nonce('gentleman2_meta_box_nonce');
	wp_nonce_field( 'my_gentleman2_meta_box_nonce','gentleman2_meta_box_nonce' );
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_video['fields'] as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'select':
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				echo'<select id="'.$field['id'].'" name="'.$field['id'].'">';
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				} 
				
				echo'</select>';
			break;	
			case 'text':
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta!='' ? $meta: '', '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			break;

			case 'textarea':
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta!='' ? $meta: '', '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : '', '</textarea>';
			break;

		}

	}
 
	echo '</table>';
}


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function chemistry_show_box_quote() {
	global $meta_box_quote, $post;

	// Use nonce for verification
	wp_create_nonce('gentleman10_meta_box_nonce');
	wp_nonce_field( 'my_gentleman10_meta_box_nonce','gentleman10_meta_box_nonce' );
	

	echo '<table class="form-table">';
 
	foreach ($meta_box_quote['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If textarea		
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta!='' ? $meta: '', '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars((  $field['desc']), ENT_QUOTES)), '</textarea>';
			
			break;
case 'text':
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta!='' ? $meta: '', '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			break;
		}

	}
 
	echo '</table>';
}


function chemistry_show_box_image() {
	global $meta_box_image, $post;
	
	// Use nonce for verification
	wp_create_nonce('gentleman13_meta_box_nonce');
	wp_nonce_field( 'my_gentleman13_meta_box_nonce','gentleman13_meta_box_nonce' );
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_image['fields'] as $field) {
		
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		switch ($field['type']) {
 
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;

		}

	}
 
	echo '</table>';
}






/* save posts */

function torque_page_save_data($post_id) {
	global $post;
	global $meta_box_page,$meta_box_gallery,$meta_box_video,$meta_box_all_pages,$meta_box_page_portfolio;
	global $meta_box_quote, $meta_box_image,  $meta_box_video, $meta_box_gallery_single;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
		}
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}	
		
	if( isset( $_POST['torque_meta_box_nonce'] ) &&  wp_verify_nonce( $_POST['torque_meta_box_nonce'],'my_torque_meta_box_nonce' ) ){ 
	foreach ($meta_box_page['fields'] as $field) {
	$old = get_post_meta($post_id, $field['id'], true);
	if($field['type']=="checkbox"){if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = "";}}else{
	if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = $old;}}
	if ($new && $new != $old) {
	update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
	delete_post_meta($post_id, $field['id'], $old);
	}
	}
	}

	if( isset( $_POST['gentleman1_meta_box_nonce'] ) && wp_verify_nonce( $_POST['gentleman1_meta_box_nonce'],'my_gentleman1_meta_box_nonce' ) ) {
	foreach ($meta_box_gallery['fields'] as $field) {
	$old = get_post_meta($post_id, $field['id'], true);
	if($field['type']=="checkbox"){if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = "";}}else{
	if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = $old;}}
	if ($new && $new != $old) {
	update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
	delete_post_meta($post_id, $field['id'], $old);
	}
	}
	}

	if( isset( $_POST['gentleman2_meta_box_nonce'] ) && wp_verify_nonce( $_POST['gentleman2_meta_box_nonce'],'my_gentleman2_meta_box_nonce' ) ) {
	foreach ($meta_box_video['fields'] as $field) {
	$old = get_post_meta($post_id, $field['id'], true);
	if($field['type']=="checkbox"){if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = "";}}else{
	if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = $old;}
	if ($new && $new != $old) {
	update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
	delete_post_meta($post_id, $field['id'], $old);
	}
	}	
	}
	}
	
	if( isset( $_POST['gentleman3_meta_box_nonce'] ) && wp_verify_nonce( $_POST['gentleman3_meta_box_nonce'],'my_gentleman3_meta_box_nonce' ) ) {
	foreach ($meta_box_all_pages['fields'] as $field) {
	$old = get_post_meta($post_id, $field['id'], true);
	if($field['type']=="checkbox"){if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = "";}}else{
	if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = $old;}}
	if ($new && $new != $old) {
	update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
	delete_post_meta($post_id, $field['id'], $old);
	}
	}	
	}

	if( isset( $_POST['gentleman4_meta_box_nonce'] ) && wp_verify_nonce( $_POST['gentleman4_meta_box_nonce'],'my_gentleman4_meta_box_nonce' ) ) {
	foreach ($meta_box_page_portfolio['fields'] as $field) {
	$old = get_post_meta($post_id, $field['id'], true);
	if($field['type']=="checkbox"){if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = "";}}else{
	if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = $old;}}
	if ($new && $new != $old) {
	update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
	delete_post_meta($post_id, $field['id'], $old);
	}
	}	
	}
	
	if( isset( $_POST['gentleman10_meta_box_nonce'] ) && wp_verify_nonce( $_POST['gentleman10_meta_box_nonce'],'my_gentleman10_meta_box_nonce' ) ) {
	foreach ($meta_box_quote['fields'] as $field) {
	$old = get_post_meta($post_id, $field['id'], true);
	if($field['type']=="checkbox"){if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = "";}}else{
	if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = $old;}}
	if ($new && $new != $old) {
	update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
	delete_post_meta($post_id, $field['id'], $old);
	}
	}	
	}
	
	
	if( isset( $_POST['gentleman13_meta_box_nonce'] ) && wp_verify_nonce( $_POST['gentleman13_meta_box_nonce'],'my_gentleman13_meta_box_nonce' ) ) {
	foreach ($meta_box_image['fields'] as $field) {
	$old = get_post_meta($post_id, $field['id'], true);
	if($field['type']=="checkbox"){if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = "";}}else{
	if(isset($_POST[$field['id']])){ $new = $_POST[$field['id']];}else{ $new = $old;}}
	if ($new && $new != $old) {
	update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
	delete_post_meta($post_id, $field['id'], $old);
	}
	}	
	}
	

}
