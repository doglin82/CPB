/*-----------------------------------------------------------------------------------

 	Custom JS - All back-end jQuery
 
-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	
	 
	var standardTrigger = jQuery('#post-format-0');
	
/*----------------------------------------------------------------------------------*/
/*	Quote Options
/*----------------------------------------------------------------------------------*/

	var quoteOptions = jQuery('#meta-box-quote');
	var quoteTrigger = jQuery('#post-format-quote');
	
	quoteOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Image Options
/*----------------------------------------------------------------------------------*/

	var imageOptions = jQuery('#meta-box-image');
	var imageTrigger = jQuery('#post-format-image');
	
	imageOptions.css('display', 'none');

	
/*----------------------------------------------------------------------------------*/
/*	Video Options
/*----------------------------------------------------------------------------------*/

	var videoOptions = jQuery('#meta-box-video');
	var videoTrigger = jQuery('#post-format-video');
	
	videoOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Video Options
/*----------------------------------------------------------------------------------*/

	var galleryOptions = jQuery('#meta-box-gallery');
	var galleryTrigger = jQuery('#post-format-gallery');
	
	galleryOptions.css('display', 'none');
	
/*----------------------------------------------------------------------------------*/
/*	The Brain
/*----------------------------------------------------------------------------------*/

	var group = jQuery('#post-formats-select input');
	
	group.change( function() {
		if(jQuery(this).val() == 'quote') {
			quoteOptions.css('display', 'block');
			swagHideAll(quoteOptions);
			
		}  else if(jQuery(this).val() == 'video') {
			videoOptions.css('display', 'block');
			swagHideAll(videoOptions);
			
		} else if(jQuery(this).val() == '0') {
			imageOptions.css('display', 'block');
			swagHideAll(imageOptions);
			
		} else if(jQuery(this).val() == 'gallery') {
			galleryOptions.css('display', 'block');
			swagHideAll(galleryOptions);
			
		}else {
			quoteOptions.css('display', 'none');
			videoOptions.css('display', 'none');
			imageOptions.css('display', 'none');
			galleryOptions.css('display', 'none');
		}
		
	});

	if(standardTrigger.is(':checked'))
		imageOptions.css('display', 'block');
		
	if(quoteTrigger.is(':checked'))
		quoteOptions.css('display', 'block');
		
	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');
		
	if(imageTrigger.is(':checked'))
		imageOptions.css('display', 'block');
		
	if(galleryTrigger.is(':checked'))
		galleryOptions.css('display', 'block');
		
		
	function swagHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
		imageOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
		notThisOne.css('display', 'block');
	}
	

jQuery(".updated.vc-license-activation-notice").hide();
	
//portfolio single
if(jQuery("#meta_post_lightbox_type").val()=="type2"){
	jQuery("#meta_post_lightbox_type").parents("tr").next().hide();
}
jQuery("#meta_post_lightbox_type").change(function(){
	if(jQuery("#meta_post_lightbox_type").val()=="type2"){	jQuery("#meta_post_lightbox_type ").parents("tr").next().hide();	}
	else{jQuery("#meta_post_lightbox_type ").parents("tr").next().show();	}
})




//default
	jQuery("#dbt_bgpattern").parent().parent().append("<div class='patchange' style='border:1px solid #ddd;width:60%;height:50px;float:right;'></div>");
	var new_bg2="url('"+window.theme_url+'css/images/patterns/'+jQuery("#dbt_bgpattern").find("option:selected").text()+".png')";
    jQuery("#dbt_bgpattern").parent().parent().parent().find(".patchange").css('background-image',new_bg2); 
	jQuery("#dbt_bgpattern").change(function () {
	var new_bg="url('"+window.theme_url+'css/images/patterns/';	
	new_bg+=jQuery(this).find("option:selected").text();
    new_bg+=".png')";
    jQuery(this).parent().parent().parent().find(".patchange").css('background-image',new_bg);  
	})
	for(var i=1;i<11;i++){
	jQuery("#dbt_section"+i+"_bgpattern").parent().parent().append("<div class='patchange' style='border:1px solid #ddd;width:60%;height:50px;float:right;'></div>");
	var new_bg2="url('"+window.theme_url+'css/images/patterns/'+jQuery("#dbt_section"+i+"_bgpattern").find("option:selected").text()+".png')";
    jQuery("#dbt_section"+i+"_bgpattern").parent().parent().parent().find(".patchange").css('background-image',new_bg2); 
	jQuery("#dbt_section"+i+"_bgpattern").change(function () {
	var new_bg="url('"+window.theme_url+'css/images/patterns/';	
	new_bg+=jQuery(this).find("option:selected").text();
    new_bg+=".png')";
    jQuery(this).parent().parent().parent().find(".patchange").css('background-image',new_bg);  
	})
	}
	
	jQuery("#dbt_overlay_pattern").parent().parent().append("<div class='patchange' style='background-color:#000;border:1px solid #ddd;width:60%;height:50px;float:right;'></div>");
	var new_bg2="url('"+window.theme_url+'img/textures/'+jQuery("#dbt_overlay_pattern").find("option:selected").text()+".png')";
    jQuery("#dbt_overlay_pattern").parent().parent().parent().find(".patchange").css('background-image',new_bg2); 
	jQuery("#dbt_overlay_pattern").change(function () {
	var new_bg="url('"+window.theme_url+'img/textures/';	
	new_bg+=jQuery(this).find("option:selected").text();
    new_bg+=".png')";
    jQuery(this).parent().parent().parent().find(".patchange").css('background-image',new_bg);  
	})
	for(var i=1;i<11;i++){
	jQuery("#dbt_section"+i+"_overlay_pattern").parent().parent().append("<div class='patchange' style='background-color:#000;border:1px solid #ddd;width:60%;height:50px;float:right;'></div>");
	var new_bg2="url('"+window.theme_url+'img/textures/'+jQuery("#dbt_section"+i+"_overlay_pattern").find("option:selected").text()+".png')";
    jQuery("#dbt_section"+i+"_overlay_pattern").parent().parent().parent().find(".patchange").css('background-image',new_bg2); 
	jQuery("#dbt_section"+i+"_overlay_pattern").change(function () {
	var new_bg="url('"+window.theme_url+'img/textures/';	
	new_bg+=jQuery(this).find("option:selected").text();
    new_bg+=".png')";
    jQuery(this).parent().parent().parent().find(".patchange").css('background-image',new_bg);  
	})
	}
	
	for(var i=1;i<11;i++){
	jQuery("#port_related_section"+i).parent().append("<div class='patchange' style='border:1px solid #ddd;width:60%;height:50px;float:right;'></div>");
	var new_bg2="url('"+window.theme_url+'css/images/patterns/'+jQuery("#port_related_section"+i).find("option:selected").text()+".png')";
    jQuery("#port_related_section"+i).parent().parent().find(".patchange").css('background-image',new_bg2); 
	jQuery("#port_related_section"+i).change(function () {
	var new_bg="url('"+window.theme_url+'css/images/patterns/';	
	new_bg+=jQuery(this).find("option:selected").text();
    new_bg+=".png')";
    jQuery(this).parent().parent().find(".patchange").css('background-image',new_bg);  
	})
	}
	
//homepage sections
jQuery('#dbt_home_sections1').change(function () { 
var nr_section_new=jQuery("#dbt_home_sections1").val();
if(nr_section>nr_section_new){
for(j=nr_section;j>nr_section_new;j--)	{	jQuery("#gentleman-homepage"+j+"-settings").hide("slow");}}
else{
for(j=nr_section;j<=nr_section_new;j++)	{	jQuery("#gentleman-homepage"+j+"-settings").show("slow");}}
window.nr_section=nr_section_new;
})

/* gallery button upload*/
	  jQuery('.flv_upload_slide9').click(function(e) {
	  	window.upl_target3 = jQuery(this).prev().prev();
	    var send_attachment_bkp = wp.media.editor.send.attachment;  var button = jQuery(this);
		wp.media.editor.send.attachment = function(props, attachment){ 
	    ceva=window.upl_target3.val();ceva+= '"'+attachment.url+'", '; window.upl_target3.val(ceva);
		var sp_div=button.prev();var url=attachment.url;sp_div.append("<span><img class='special_img' src='"+url.trim()+"'/><span class='xicon'></span></span>");sp_div.find(".xicon").click(function(){
		var txt2='"'+jQuery(this).prev().attr('src')+'", ';var textarea = jQuery(this).parent().parent().parent().find("#dbt_post_gallery");var txt = textarea.val();
		textarea.val(txt.replace(txt2, ''));jQuery(this).parent().hide("slow").remove();
		})  }
      wp.media.editor.open(button);
      return false;
 	 });
 	 
    jQuery('.add_media').on('click', function(){   _custom_media = false;  });

	jQuery("#my_special_div9 span,#my_special_div2 span").each(function(){var valr=jQuery(this).text();jQuery(this).text("");	jQuery(this).prepend("<img class='special_img' src='"+valr.trim()+"'/><span class='xicon'></span>");})
	if(!jQuery("#my_special_div9")){jQuery("#my_special_div9").empty();}
	if(!jQuery("#my_special_div2")){jQuery("#my_special_div2").empty();}
	
	
	
/* x button from gallery*/
	jQuery(".xicon").click(function(){
	var txt2='"'+jQuery(this).prev().attr('src')+'", ';var textarea = jQuery(this).parents("td").find("textarea");
	var txt = textarea.val();textarea.val(txt.replace(txt2, ''));	jQuery(this).parent().hide("slow").remove();
	})
	

/*  post type changes */
	var videoOptions = jQuery('#gentleman-meta-box-video');	var videoTrigger = jQuery('#post-format-video');	videoOptions.css('display', 'none');
	var galleryOptions = jQuery('#gentleman-meta-box-gallery');var galleryTrigger = jQuery('#post-format-gallery');	galleryOptions.css('display', 'none');
	
	if(videoTrigger.is(':checked'))videoOptions.css('display', 'block');
	if(galleryTrigger.is(':checked'))galleryOptions.css('display', 'block');
		
	function torque_hide_all(notThisOne) {videoOptions.css('display', 'none');	galleryOptions.css('display', 'none');	notThisOne.css('display', 'block');	}
	
	var group = jQuery('#post-formats-select input');
	group.change( function() {
		if(jQuery(this).val() == 'video') {	videoOptions.css('display', 'block');	torque_hide_all(videoOptions);
		}else if(jQuery(this).val() == 'gallery') 	{galleryOptions.css('display', 'block');	torque_hide_all(galleryOptions);
		}else {	videoOptions.css('display', 'none');	galleryOptions.css('display', 'none');
		}	
	});

//portfolio settings
	jQuery('#meta_post_lightbox_type').change(function () {
	jQuery('#options div.opt3').css('display','none');  
	jQuery('#options div.opt4').css('display','none');  
	jQuery('#options table.opt30').css('display','none'); 
	jQuery('#options div.opt40').css('display','none'); 
	 
          var str = "";
          jQuery("#meta_post_lightbox_type option:selected").each(function () {
                str = jQuery(this).text();
                if(str=="None"){
                	jQuery('#options div.opt3').css('display','inline');  
                }
                else if(str=="Single Image"){
                	 jQuery('#options div.opt4').css('display','inline');  
                }
                else if(str=="Image Gallery"){
                	 jQuery('#options div.opt40').css('display','inline');  
                }
                else if(str=="Video"){
                	 jQuery('#options table.opt30').css('display','inline');  
                }
              });

        })
        .change();
 //portfolio settings       
    jQuery('#meta_post_lightbox_video_type').change(function () { 
	jQuery('#options table tr.opt6').css('display','none');  
	jQuery('#options table tr.opt7').css('display','none');  
          var str = "";
          jQuery("#meta_post_lightbox_video_type option:selected").each(function () {
                str = jQuery(this).text();
                if(str=="Vimeo"){ 
                	jQuery('#options table tr.opt6').css('display','table-row'); 
                }
                else if(str=="Youtube"){
                	 jQuery('#options table tr.opt7').css('display','table-row');  
                }
              });

        })
        .change();



});

window.onload = function(e){	

jQuery("#rs-validation-wrapper").parent().hide();
jQuery("#rs-validation-wrapper").parent().prev().hide();
jQuery("#rs-validation-wrapper").parent().prev().prev().hide();
jQuery(".rs-update-notice-wrap").hide();

jQuery('#dbt_overlay_color,#dbt_section1_overlay_color,#dbt_section2_overlay_color,#dbt_section3_overlay_color,#dbt_section4_overlay_color,#dbt_section5_overlay_color,#dbt_section6_overlay_color,#dbt_section7_overlay_color,#dbt_section8_overlay_color,#dbt_section9_overlay_color,#dbt_section10_overlay_color,#dbt_section1_bgcolor,#dbt_section1_txtcolor,#dbt_section2_bgcolor,#dbt_section2_txtcolor,#dbt_section3_bgcolor,#dbt_section3_txtcolor,#dbt_section4_bgcolor,#dbt_section4_txtcolor,#dbt_section5_bgcolor,#dbt_section5_txtcolor,#dbt_section6_bgcolor,#dbt_section6_txtcolor,#dbt_section7_bgcolor,#dbt_section7_txtcolor,#dbt_section8_bgcolor,#dbt_section8_txtcolor,#dbt_section9_bgcolor,#dbt_section9_txtcolor,#dbt_section10_bgcolor,#dbt_section10_txtcolor,#dbt_bgcolor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});

if(jQuery('#theme_flat_0').attr("checked")=="checked"){
	jQuery("#row_style1_color").parents(".option").show("slow");jQuery("#row_style2_color").parents(".option").show("slow");
	jQuery("#row_style1_pattern").parents(".option").hide();jQuery("#row_style2_pattern").parents(".option").hide();
	jQuery("#row_style1_pattern_up").parents(".option").hide();jQuery("#row_style2_pattern_up").parents(".option").hide();
}else{	
	jQuery("#row_style1_color").parents(".option").hide();jQuery("#row_style2_color").parents(".option").hide();
	jQuery("#row_style1_pattern").parents(".option").show("slow");jQuery("#row_style2_pattern").parents(".option").show("slow");
	jQuery("#row_style1_pattern_up").parents(".option").show("slow");	jQuery("#row_style2_pattern_up").parents(".option").show("slow");
}
jQuery(this).change(function(){
if(jQuery('#theme_flat_0').attr("checked")=="checked"){
	jQuery("#row_style1_color").parents(".option").show("slow");jQuery("#row_style2_color").parents(".option").show("slow");
	jQuery("#row_style1_pattern").parents(".option").hide();jQuery("#row_style2_pattern").parents(".option").hide();
	jQuery("#row_style1_pattern_up").parents(".option").hide();jQuery("#row_style2_pattern_up").parents(".option").hide();
}else{	
	jQuery("#row_style1_color").parents(".option").hide();jQuery("#row_style2_color").parents(".option").hide();
	jQuery("#row_style1_pattern").parents(".option").show("slow");jQuery("#row_style2_pattern").parents(".option").show("slow");
	jQuery("#row_style1_pattern_up").parents(".option").show("slow");	jQuery("#row_style2_pattern_up").parents(".option").show("slow");
}
})

jQuery('.get_thumb_url').parent().removeClass("text_block");
jQuery('.get_thumb_url').parent().parent().prepend("<h3>Blog Thumbnail Image Sizes</h3>");
jQuery('.get_thumb_url').attr('href',window.site_url+'/wp-admin/options-general.php?page=flv_thimb_size');	


	jQuery(".flv-custom-table .form-table").addClass("widefat flvtable").append('<thead><tr><th style="width:15%;">Name</th><th>Value</th></tr></thead>');
   jQuery(".flv-custom-port-table .form-table").addClass("wp-list-table widefat fixed posts");
   jQuery(".flv-custom-port-table .form-table tr[valign=top]").remove();

	if(jQuery("#menu-posts-flv_members").hasClass("wp-menu-open")) 
	{
	
	jQuery(document).find("#postdivrich").css('visibility','hidden');
	jQuery(document).find("#postdivrich").css('height','0');
	jQuery(document).find("#postdivrich").css('display','none','important');
	
	}
	jQuery("#option_font div.option-select .description:even").each(function(){
	jQuery(this).append("<div style='width:200px;height:30px;border:1px solid #ddd;text-align:center;font-size:20px;padding-top:20px;' class='test_p'>Test Paragraph</div>");
	var value=jQuery(this).prev().find("select option:selected").text();var textarea = window.theme_url;var txt = textarea;textarea=txt.replace('wp-content/themes/swag/', '');var new_url=textarea;
	if(value!="-- Choose One --"){
	jQuery.ajax({
  url: new_url,
  context: document.body 
}).done(function() { 
  jQuery(this).append('<link href="http://fonts.googleapis.com/css?family='+value+'" rel="stylesheet" type="text/css" />');
});
	jQuery(this).parent().parent().find(".test_p").css({'font-family':'"'+value+'", Arial, Helvetica, sans-serif'});
	}
	
	jQuery(this).prev().find("select").change(function(){
var value=jQuery(this).find("option:selected").text();var textarea = window.theme_url;var txt = textarea;textarea=txt.replace('wp-content/themes/swag/', '');var new_url=textarea;

if(value!="-- Choose One --"){
jQuery.ajax({
  url: new_url,
  context: document.body 
}).done(function() { 
  jQuery(this).append('<link href="http://fonts.googleapis.com/css?family='+value+'" rel="stylesheet" type="text/css" />');
});
}
jQuery(this).parent().parent().parent().find(".test_p").css({'font-family':'"'+value+'", Arial, Helvetica, sans-serif'})
})	
});	
	
	jQuery("#dbt_blog_style").parent().parent().parent().addClass("flv-important2");
	jQuery("#dbt_blog_pagi").parent().parent().parent().addClass("flv-important2");
	jQuery("#dbt_blog_masonry_col").parent().parent().parent().addClass("flv-important2");

		if(jQuery("#page_template").val()=="portfolio-template.php" )
		{
jQuery(document).find("#postdivrich").css('display','none');
jQuery(document).find("#gentleman-box").css("display","none");
jQuery(document).find("#gentleman-box-port").css("display","block");	
jQuery(document).find("#gentleman-page-settings").show("slow");
jQuery(document).find("#gentleman-homepage-settings").css("display","none");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").css("display","none");}
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","none");

		}
		else if(jQuery("#page_template").val()=="homepage-template.php" )
		{
jQuery(document).find("#postdivrich").css('display','none');
jQuery(document).find("#gentleman-box").css("display","none");
jQuery(document).find("#gentleman-box-port").css("display","none");	
jQuery(document).find("#gentleman-page-settings").css("display","none");
jQuery(document).find("#gentleman-homepage-settings").show("slow");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").show("slow");}
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","none");
		}
		else if(jQuery("#page_template").val()=="blog-page-sidebar-right.php" || jQuery("#page_template").val()=="blog-page-sidebar-left.php" )
		{
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","table-row");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","table-row");
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","table-row");
			
if(!jQuery(document).find("#postdivrich").prev().hasClass("composer-switch")){jQuery(document).find("#postdivrich").show("slow");}else{jQuery(document).find("#postdivrich").css('display','none');}
jQuery(document).find("#gentleman-box").show("slow");
jQuery(document).find("#gentleman-box-port").css("display","none");	
jQuery(document).find("#gentleman-page-settings").show("slow");
jQuery(document).find("#gentleman-homepage-settings").css("display","none");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").css("display","none");}
		}
		else{
		
if(!jQuery(document).find("#postdivrich").prev().hasClass("composer-switch")){jQuery(document).find("#postdivrich").show("slow");}else{jQuery(document).find("#postdivrich").css('display','none');}
jQuery(document).find("#gentleman-box").show("slow");
jQuery(document).find("#gentleman-box-port").css("display","none");	
jQuery(document).find("#gentleman-page-settings").show("slow");
jQuery(document).find("#gentleman-homepage-settings").css("display","none");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").css("display","none");}
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","none");	
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","none");		
		}

	jQuery("#page_template").change(function(){
	
	if(jQuery(this).val()=="portfolio-template.php" )
		{
jQuery(document).find("#postdivrich").css('display','none');
jQuery(document).find("#gentleman-box").css("display","none");
jQuery(document).find("#gentleman-box-port").css("display","block");	
jQuery(document).find("#gentleman-page-settings").show("slow");
jQuery(document).find("#gentleman-homepage-settings").css("display","none");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").css("display","none");}
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","none");
		}
		else if(jQuery(this).val()=="homepage-template.php" )
		{
jQuery(document).find("#postdivrich").css('display','none');
jQuery(document).find("#gentleman-box").css("display","none");
jQuery(document).find("#gentleman-box-port").css("display","none");	
jQuery(document).find("#gentleman-page-settings").css("display","none");
jQuery(document).find("#gentleman-homepage-settings").show("slow");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").show("slow");}
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","none");
		}
		else if(jQuery(this).val()=="blog-page-sidebar-right.php" || jQuery(this).val()=="blog-page-sidebar-left.php" )
		{
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","table-row");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","table-row");
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","table-row");
			
if(!jQuery(document).find("#postdivrich").prev().hasClass("composer-switch")){jQuery(document).find("#postdivrich").show("slow");}else{jQuery(document).find("#postdivrich").css('display','none');}
jQuery(document).find("#gentleman-box").show("slow");
jQuery(document).find("#gentleman-box-port").css("display","none");	
jQuery(document).find("#gentleman-page-settings").show("slow");
jQuery(document).find("#gentleman-homepage-settings").css("display","none");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").css("display","none");}
		}
		else{
if(!jQuery(document).find("#postdivrich").prev().hasClass("composer-switch")){jQuery(document).find("#postdivrich").show("slow");}else{jQuery(document).find("#postdivrich").css('display','none');}
jQuery(document).find("#gentleman-box").show("slow");
jQuery(document).find("#gentleman-box-port").css("display","none");	
jQuery(document).find("#gentleman-page-settings").show("slow");
jQuery(document).find("#gentleman-homepage-settings").css("display","none");
window.nr_section=jQuery("#dbt_home_sections1").val();for(j=1;j<=nr_section;j++)	{	jQuery(document).find("#gentleman-homepage"+j+"-settings").css("display","none");}
jQuery(document).find("#dbt_blog_style").parent().parent().parent().css("display","none");
jQuery(document).find("#dbt_blog_pagi").parent().parent().parent().css("display","none");	
jQuery(document).find("#dbt_blog_masonry_col").parent().parent().parent().css("display","none");	
		}
	});
}	
