/*
 * jQuery Simple Instagram Fancybox
 * Version: 2.0
 *
 * Author: Chris Rivers
 * xxcriversxx@gmail.com
 *
 * Changelog: 
 * Version: 2.0
 *
 */
jQuery.easing.jswing=jQuery.easing.swing;
jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,a,c,b,d){return jQuery.easing[jQuery.easing.def](e,a,c,b,d)},easeInQuad:function(e,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(e,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a+c;return-b/2*(--a*(a-2)-1)+c},easeInCubic:function(e,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(e,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(e,a,c,b,d){if((a/=d/2)<1)return b/
2*a*a*a+c;return b/2*((a-=2)*a*a+2)+c},easeInQuart:function(e,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(e,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a+c;return-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(e,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(e,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a*a+c;return b/2*((a-=2)*a*a*a*a+2)+c},easeInSine:function(e,
a,c,b,d){return-b*Math.cos(a/d*(Math.PI/2))+b+c},easeOutSine:function(e,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(e,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(e,a,c,b,d){return a==0?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(e,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(e,a,c,b,d){if(a==0)return c;if(a==d)return c+b;if((a/=d/2)<1)return b/2*Math.pow(2,10*(a-1))+c;return b/2*(-Math.pow(2,-10*--a)+2)+c},
easeInCirc:function(e,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*a)-1)+c},easeOutCirc:function(e,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(e,a,c,b,d){if((a/=d/2)<1)return-b/2*(Math.sqrt(1-a*a)-1)+c;return b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(e,a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d)==1)return c+b;f||(f=d*0.3);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f))+c},easeOutElastic:function(e,
a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d)==1)return c+b;f||(f=d*0.3);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInOutElastic:function(e,a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d/2)==2)return c+b;f||(f=d*0.3*1.5);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);if(a<1)return-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+c;return g*Math.pow(2,-10*(a-=1))*Math.sin((a*
d-e)*2*Math.PI/f)*0.5+b+c},easeInBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;return b*(a/=d)*a*((f+1)*a-f)+c},easeOutBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;return b*((a=a/d-1)*a*((f+1)*a+f)+1)+c},easeInOutBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;if((a/=d/2)<1)return b/2*a*a*(((f*=1.525)+1)*a-f)+c;return b/2*((a-=2)*a*(((f*=1.525)+1)*a+f)+2)+c},easeInBounce:function(e,a,c,b,d){return b-jQuery.easing.easeOutBounce(e,d-a,0,b,d)+c},easeOutBounce:function(e,a,c,b,d){return(a/=
d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(e,a,c,b,d){if(a<d/2)return jQuery.easing.easeInBounce(e,a*2,0,b,d)*0.5+c;return jQuery.easing.easeOutBounce(e,a*2-d,0,b,d)*0.5+b*0.5+c}});


	var $j = jQuery.noConflict();
//function cmd(e,t,n){var r="";if(t.mode=="user"){r="https://api.instagram.com/v1/users/"+n+"/media/recent/?callback=?"}else{r="https://api.instagram.com/v1/media/popular?callback=?"}jQuery.getJSON(r,e,function(e){onPhotoLoaded(e,t)})}function onPhotoLoaded(e,t){if(e.meta.code==200){var n=e.data;if(n.length>0){for(var r in n){var i=true;if(t.numberOfImages!=0){var s=parseInt(r)+1;if(s>t.numberOfImages){i=false}}var o=n[r];var u="";var a=t.tags;a=a.split(",");var f=false;if(a[0]){jQuery.each(a,function(e){jQuery.each(o["tags"],function(t){if(a[e]==o["tags"][t]){f=true}})})}else{f=true}if(f==true&&i==true){if(t.captionOn){var l="";if(o.caption){l=o.caption.text}else{l="Instagram Photo"}u='<a rel="group" class="instagram-photo" id="p'+o.id+'" href="'+o.images.standard_resolution.url+'" title="'+l+" ("+o.likes.count+' Likes)" >'}else{u='<a rel="group" class="instagram-photo" id="p'+o.id+'" href="'+o.images.standard_resolution.url+'">'}var c="None";if(o.tags[0]){c=o.tags[0]}u+='<img src="'+o.images.thumbnail.url+'" width="100%" rel="'+c+'">';u+="</a>";jQuery(u).appendTo(".instagramFeed")}}jQuery(".instagram-photo").hide().each(function(e){currentPhoto=jQuery(this);if(t.appearEffect=="slide"){currentPhoto.delay(t.delayInterval*e).slideDown(t.speed)}else if(t.appearEffect=="motion"){currentPhoto.delay(t.delayInterval*e).animate({width:["toggle","swing"],height:["toggle","swing"]},t.speed,function(){})}else{currentPhoto.delay(t.delayInterval*e).fadeIn(t.speed)}})}else{alert("empty")}}else{alert(e.meta.error_message)}}function instagramFetch(e){var t=e.accessToken;var n={access_token:t};if(e.mode=="user"){var r=e.userID;var i=r.split(",");for(var s=0;s<i.length;s++){cmd(n,e,i[s])}}else{cmd(n,e,"No User")}}function startFancybox(){jQuery("body").find("a.instagram-photo").fancybox({openEffect:"elastic",closeEffect:"elastic",helpers:{title:{type:"inside"},overlay:{locked:false}}})}
//jQuery.fn.simpleInstagramFancybox=function(e){var t={mode:"popular",accessToken:"3794301.f59def8.e08bcd8b10614074882b2d1b787e2b6f",userID:"1138644",speed:700,delayInterval:80,appearEffect:"fade",captionOn:false,tags:"",numberOfImages:0};jQuery.extend(t,e);return this.each(function(){jQuery(document).ready(function(){instagramFetch(t);startFancybox()});jQuery(document).on({mouseenter:function(){var e=jQuery(this);var t=e.height();var n=e.width();e.append('<div class="instagram-hover-cover"></div>');e.find(".instagram-hover-cover").hide().css({height:t,width:n});jQuery(".instagram-hover-cover").hide().fadeTo("fast",.6)},mouseleave:function(){var e=jQuery(this);e.find(".instagram-hover-cover").remove();e.find(".instagram-hover-icon").remove()}},".instagram-photo")})}

function cmd(a,b,c){var d="";if(b.mode=="user"){d="https://api.instagram.com/v1/users/"+c+"/media/recent/?callback=?"}else{d="https://api.instagram.com/v1/media/popular?callback=?"}
jQuery.getJSON(d,a,function(a){onPhotoLoaded(a,b)})}function onPhotoLoaded(a,b){if(a.meta.code==200){var c=a.data;if(c.length>0){for(var d in c){var e=true;if(b.numberOfImages!=0){var f=parseInt(d)+1;if(f>b.numberOfImages){e=false}}var g=c[d];
if(jQuery.type(g)!="function"){var h="";var i=b.tags;i=i.split(",");var j=false;if(i[0]){jQuery.each(i,function(a){jQuery.each(g["tags"],function(b){if(i[a]==g["tags"][b]){j=true}})})}else{j=true}if(j==true&&e==true){
if(b.captionOn){var k="";if(g.caption){k=g.caption.text}else{k="Instagram Photo"}h='<a class="instagram-photo" id="p'+g.id+'" href="'+g.images.standard_resolution.url+'" title="'+k+" ("+g.likes.count+' Likes)" rel="group">'}
else{h='<a class="instagram-photo" id="p'+g.id+'" href="'+g.images.standard_resolution.url+'" rel="group">'}var l="None";if(g.tags[0]){l=g.tags[0]}h+='<img src="'+g.images.thumbnail.url+'" width="100%" rel="'+l+'">';h+="</a>";
jQuery(h).appendTo($this)}}}$this.find(".instagram-photo").hide().each(function(a){currentPhoto=jQuery(this);if(b.appearEffect=="slide"){currentPhoto.delay(b.delayInterval*a).slideDown(b.speed)}else if(b.appearEffect=="motion"){currentPhoto.delay(b.delayInterval*a).animate({width:["toggle","swing"],height:["toggle","swing"]},b.speed,function(){})}else{currentPhoto.delay(b.delayInterval*a).fadeIn(b.speed)}})}else{alert("empty")}
}else{alert(a.meta.error_message)}}
function instagramFetch(a){var b=a.accessToken;var c={access_token:b};if(a.mode=="user"){var d=a.userID;var e=d.split(",");for(var f=0;f<e.length;f++){cmd(c,a,e[f])}}else{cmd(c,a,"No User")}}
(function( $ ){$.fn.simpleInstagramFancybox=function(a){$this=jQuery(this);
var b={mode:"popular",accessToken:"3794301.f59def8.e08bcd8b10614074882b2d1b787e2b6f",userID:"1138644",speed:700,delayInterval:80,appearEffect:"fade",captionOn:false,tags:"",numberOfImages:0};
$.extend(b,a);return this.each(function(){jQuery(document).ready(function(){instagramFetch(b);});$this.find(".instagram-photo").live({mouseenter:function(){var a=jQuery(this);var b=a.height();var c=a.width();a.append('<div class="instagram-hover-cover"></div>');$this.find(a).find(".instagram-hover-cover").hide().css({height:b,width:c});$this.find(".instagram-hover-cover").hide().fadeTo("fast",.6)},mouseleave:function(){var a=jQuery(this);$this.find(a).find(".instagram-hover-cover").remove();$this.find(a).find(".instagram-hover-icon").remove()}})})}
})( jQuery );




/* ---------------------------------------- */
/*               STOP # JUMP                */
/* ---------------------------------------- */

(function () {
    jQuery('a[href="#"]').click(function (e) {
        e.preventDefault();
    });
})();


/* ---------------------------------------- */
/*              SCROLL TO TOP               */
/* ---------------------------------------- */

jQuery(function() {
	var offset =1000;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery("#totop").fadeIn(duration);
        } else {
            jQuery("#totop").fadeOut(duration);
        }
    });
    
    jQuery("#totop").click(function(event) {
        event.preventDefault();
        jQuery("html, body").animate({scrollTop: 0}, duration);
        return false;
    })
    
    jQuery("a[href=#top]").click(function(){
        jQuery("html, body").animate({scrollTop:0}, "slow");
        return false;
    });
});

/* ---------------------------------------- */
/*                   TABS                   */
/* ---------------------------------------- */

jQuery(function() {  
	 jQuery('.to_tabs_vert_content').appendTo('.flv_vertical_tabs_content');  
	jQuery('.tabs > ul li a:not(:first)').addClass('inactive');
	//jQuery('#tab1C').siblings().hide();
	
	jQuery('.tabs > ul li a').click(function(){
		var t = jQuery(this).attr('id');
		if(jQuery(this).hasClass('inactive')){ 
			jQuery('.tabs > ul li a').addClass('inactive');           
			jQuery(this).removeClass('inactive');
			
			jQuery('#'+ t + 'C').siblings().slideUp();
			jQuery('#'+ t + 'C').slideDown();
		}
	});
});


/* ---------------------------------------- */
/*              VERTICAL TABS               */
/* ---------------------------------------- */

jQuery(function() {    
	jQuery('.to_tabs_content').appendTo('.flv_tabs_content');  
	jQuery('.vertical_tabs > ul li:first-child').addClass('active');
	jQuery('#tab1C').siblings().hide();
	
	jQuery('.vertical_tabs > ul li').click(function(){
		var t = jQuery(this).attr('id');
			jQuery('.vertical_tabs > ul li').removeClass('active');           
			jQuery(this).addClass('active');
			
			jQuery('#'+ t + 'C').siblings().slideUp(500);
			jQuery('#'+ t + 'C').slideDown(500);
	});
});

/* ---------------------------------------- */
/*                ACCORDIAN                 */
/* ---------------------------------------- */

jQuery(function() {
	jQuery('.accordion_content').hide();
	
	jQuery('.accordion > div a').click(function() {
		if (jQuery(this).parent().hasClass('accordion_selected')) {
			jQuery(this).parent().removeClass('accordion_selected');
			jQuery(this).prev().removeClass('fa fa-minus active');
			jQuery(this).prev().addClass('fa fa-plus');
			jQuery(this).next().slideUp();
        } else {
        	jQuery('.accordion_content').slideUp();
        	jQuery('.accordion > div i').removeClass('fa fa-minus active');
        	jQuery('.accordion > div i').addClass('fa fa-plus');
        	jQuery('.accordion > div').removeClass('accordion_selected');
        	jQuery(this).next().slideDown();
			jQuery(this).parent().addClass('accordion_selected');
			jQuery(this).prev().addClass('fa fa-minus active');
			jQuery(this).parent().next().slideDown();
		}
		return false;
	});
});


/* ---------------------------------------- */
/*                CLOSE/HIDE                */
/* ---------------------------------------- */

jQuery(function() {
	jQuery('.close').click(function() {
		jQuery(this).parent().fadeTo(500, 0.1, function() {
            jQuery(this).slideUp(200);
        });
	});
});


/* ---------------------------------------- */
/*          PROGRESS BAR ANIMATION          */
/* ---------------------------------------- */

jQuery('document').ready(function() {

    jQuery('.meter > span').each(function () {
        jQuery(this).animate({
            width: this.title
        }, {
            duration: 1000,
            step: function (current) {
                jQuery(this).prev('h4').html(parseInt(current, 10) + '%')
            }
        });
    });
});


/* ---------------------------------------- */
/*             TESTIMONIALS SLIDER          */
/* ---------------------------------------- */

jQuery(function() {  
	  jQuery('.to_testimonial_slider_container').appendTo('.testimonial_slider_container');
	jQuery('.testimonial_slider ul li:not(:first)').addClass('inactive');
	jQuery('#testimonial_1C').siblings().hide();
	
	jQuery('.testimonial_slider li').click(function(){
		var t = jQuery(this).attr('id');
		if(jQuery(this).hasClass('inactive')){ 
			jQuery('.testimonial_slider ul li').addClass('inactive');           
			jQuery(this).removeClass('inactive');
			
			jQuery('#'+ t + 'C').siblings().slideUp();
			jQuery('#'+ t + 'C').slideDown();
		}
	});
	
});


jQuery(window).load(function () {
	
$j(".bx-controls").each(function(){
	$j(this).appendTo($j(this).prev());
})
//woo sortable
var $container1 = $j('ul.woo_sortable');
	$container1.isotope({
		itemSelector : '.item'
	});
		var $optionSets = $j('.folio-filter'),$optionLinks = $optionSets.find('a');
	$optionLinks.click(function(){		var $this = $j(this);
		if ( $this.hasClass('btn_color') ) {			return false;		}
		var $optionSet = $this.parents('.folio-filter');
		$optionSet.find('.btn_color').removeClass('btn_color');
		$this.addClass('btn_color');
	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},	key = $optionSet.attr('data-option-key'),	value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;	options[ key ] = value;
		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {	changeLayoutMode( $this, options );
	} else {			$container1.isotope( options );	}    
		return false;});
		
//portfolio
var $container = $j('#container');
	$container.isotope({
		itemSelector : '.item'
	});
	var $optionSets = $j('#filter'),
		$optionLinks = $optionSets.find('a');
	$optionLinks.click(function(){
		var $this = $j(this);
		// don't proceed if already selected
		if ( $this.hasClass('btn_color') ) {
			return false;
		}
		var $optionSet = $this.parents('#filter');
		$optionSet.find('.btn_color').removeClass('btn_color');
		$this.addClass('btn_color');
	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
		
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		changeLayoutMode( $this, options );
	} else {
		// otherwise, apply new options
		$container.isotope( options );
	}    
	return false;
	});	
	
jQuery('.related.products ul.products,.upsells.products ul.products').isotope();		
jQuery('.woo_shop ul.products').isotope();	
	
jQuery(window).trigger('resize');
	
});	

jQuery(window).bind('resize', function(e){ 
if (window.RT) clearTimeout(window.RT);  window.RT = setTimeout(function()  {
	var flv_container = jQuery('.woo_sortable.isotope,#container.isotope,.woo_shop ul.products.isotope,.related.products ul.products.isotope,.upsells.products ul.products.isotope');
	flv_container.isotope('reLayout'); }, 800); 
});


jQuery(document).ready(function(){

var cookieValue5 = jQuery.cookie("color");if(cookieValue5!=undefined){
var color=cookieValue5;jQuery('head style.old_style').remove();
jQuery('head').append('<style class="old_style">.widget_archive a:hover,.widget_recent_comments a:hover,.blog-single-tags a:hover,p a,h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,blockquote,ul.list li i.text_color,ul.list_2 li i,.list_2 ul li i,.avatar_title h5 span a,#header nav ul li.dropdown ul li a:hover,#page_header ul li a,.feature_icon,.features_pushed:before,.pagination_menu i:hover,.meta li a:hover,.meta-categories a:hover,.widget_categories li h6 a,.mini_post header h6:hover, .mini_post li:hover,#main_footer .col ul li a:hover,.pricing_column h2,.tabs > ul li a.inactive:hover,.accordion h2:hover, .accordion h3:hover, .accordion h4:hover, .accordion h5:hover, .accordion h6:hover,.text_color,.footer-contact i, .tweet_list li i{color:'+color+' ;} .dropcap_alt,blockquote.alt2,.img_overlay,.coloured_wrapper.defaultcolor_wrap:before,.meta-button:hover,.tagcloud a:hover,#totop:hover,.pricing_column.active,.highlight{background:'+color+' ;}::selection{background:'+color+';color:#fff;}::-moz-selection{background:'+color+' ;color:#fff;} blockquote{border-left: 2px solid '+color+';}.features:hover .feature_icon{	background: '+color+';	border: 1px solid '+color+';	background-image: -o-linear-gradient(top, '+color+', '+color+');	background-image: -ms-linear-gradient(top, '+color+', '+color+');	background-image: -moz-linear-gradient(top, '+color+', '+color+');	background-image: -webkit-linear-gradient(top, '+color+', '+color+');}.notification{	border: 1px solid '+color+';	background: '+color+';	background-image: -o-linear-gradient(top, '+color+', '+color+');	background-image: -ms-linear-gradient(top, '+color+', '+color+');	background-image: -moz-linear-gradient(top, '+color+', '+color+');	background-image: -webkit-linear-gradient(top, '+color+', '+color+');}</style>');

//jQuery(".add_to_cart_button,.single_add_to_cart_button").removeClass("lime white red orange yellow green teal blue purple black grey")


if(color=="#e55151"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_red.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #e55151;	border: 1px solid #bb2424;background-image: -o-linear-gradient(top, #f25e5e, #e55151);	background-image: -ms-linear-gradient(top, #f25e5e, #e55151);	background-image: -moz-linear-gradient(top, #f25e5e, #e55151);	background-image: -webkit-linear-gradient(top, #f25e5e, #e55151);}.btn_color:hover{color: #fff;background: #f25151;background-image: -o-linear-gradient(top, #ff5e5e, #f25151);	background-image: -ms-linear-gradient(top, #ff5e5e, #f25151);	background-image: -moz-linear-gradient(top, #ff5e5e, #f25151);	background-image: -webkit-linear-gradient(top, #ff5e5e, #f25151);}.btn_color:active{	background: #e55151;background-image: -o-linear-gradient(bottom, #f25e5e, #e55151);	background-image: -ms-linear-gradient(bottom, #f25e5e, #e55151);background-image: -moz-linear-gradient(bottom, #f25e5e, #e55151);background-image: -webkit-linear-gradient(bottom, #f25e5e, #e55151);}</style>');}
else if(color=="#e6624d"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_orange.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{text-shadow: 0 1px 1px rgba(0,0,0,0.2);color: #fff;border: 1px solid #c94e3a;border-right: 0;background: #e6624d;background-image: -o-linear-gradient(top, #f36f5a, #e6624d);background-image: -ms-linear-gradient(top, #f36f5a, #e6624d);background-image: -moz-linear-gradient(top, #f36f5a, #e6624d);background-image: -webkit-linear-gradient(top, #f36f5a, #e6624d);box-shadow: 0 1px 1px 0 rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.15);-moz-box-shadow: 0 1px 1px 0 rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.15);-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.15);}.btn_color:hover{color: #fff;text-shadow: 0 1px 1px rgba(0,0,0,0.2);	color: #fff;background: #f36f5a;background-image: -o-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -ms-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -moz-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -webkit-linear-gradient(top, #ff7c67, #f36f5a);}.btn_color:active{	text-shadow: 0 1px 1px rgba(0,0,0,0.2);color: #fff;background: #e6624d;background-image: -o-linear-gradient(bottom, #f36f5a, #e6624d);	background-image: -ms-linear-gradient(bottom, #f36f5a, #e6624d);background-image: -moz-linear-gradient(bottom, #f36f5a, #e6624d);background-image: -webkit-linear-gradient(bottom, #f36f5a, #e6624d);}</style>');}
else if(color=="#bb9113"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_yellow.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;text-shadow: 0 1px 1px rgba(255,255,255,0.2);	color: #bb9113;	background: #f7d15e;border: 1px solid #d4ae39;background-image: -o-linear-gradient(top, #ffde6b, #f7d15e);background-image: -ms-linear-gradient(top, #ffde6b, #f7d15e);background-image: -moz-linear-gradient(top, #ffde6b, #f7d15e);background-image: -webkit-linear-gradient(top, #ffde6b, #f7d15e);}.btn_color:hover{color: #bb9113;background: #ffde6b;background-image: -o-linear-gradient(top, #ffeb78, #ffde6b);background-image: -ms-linear-gradient(top, #ffeb78, #ffde6b);background-image: -moz-linear-gradient(top, #ffeb78, #ffde6b);background-image: -webkit-linear-gradient(top, #ffeb78, #ffde6b);}.btn_color:active{	background: #ffde6b;background-image: -o-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -ms-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -moz-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -webkit-linear-gradient(bottom, #ffeb78, #ffde6b);}</style>');}
else if(color=="#72d23e"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_lime.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #72d23e;border: 1px solid #4aac14;background-image: -o-linear-gradient(top, #7ddd49, #72d23e);background-image: -ms-linear-gradient(top, #7ddd49, #72d23e);background-image: -moz-linear-gradient(top, #7ddd49, #72d23e);background-image: -webkit-linear-gradient(top, #7ddd49, #72d23e);}.btn_color:hover{color: #fff;background: #7cdc48;background-image: -o-linear-gradient(top, #87e753, #7cdc48);background-image: -ms-linear-gradient(top, #87e753, #7cdc48);background-image: -moz-linear-gradient(top, #87e753, #7cdc48);	background-image: -webkit-linear-gradient(top, #87e753, #7cdc48);}.btn_color:active{background: #72d23e;background-image: -o-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -ms-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -moz-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -webkit-linear-gradient(bottom, #7ddd49, #72d23e);}</style>');}
else if(color=="#22d07c"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_green.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #22d07c;border: 1px solid #1ba964;background-image: -o-linear-gradient(top, #2fdd89, #22d07c);background-image: -ms-linear-gradient(top, #2fdd89, #22d07c);background-image: -moz-linear-gradient(top, #2fdd89, #22d07c);background-image: -webkit-linear-gradient(top, #2fdd89, #22d07c);}.btn_color:hover{color: #fff;background: #2fdd89;background-image: -o-linear-gradient(top, #3cea96, #2fdd89);background-image: -ms-linear-gradient(top, #3cea96, #2fdd89);background-image: -moz-linear-gradient(top, #3cea96, #2fdd89);	background-image: -webkit-linear-gradient(top, #3cea96, #2fdd89);}.btn_color:active{background: #22d07c;	background-image: -o-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -ms-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -moz-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -webkit-linear-gradient(bottom, #2fdd89, #22d07c);}</style>');}
else if(color=="#2bcdb8"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_teal.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #2bcdb8;border: 1px solid #1bae8d;background-image: -o-linear-gradient(top, #38dac5, #2bcdb8);background-image: -ms-linear-gradient(top, #38dac5, #2bcdb8);background-image: -moz-linear-gradient(top, #38dac5, #2bcdb8);background-image: -webkit-linear-gradient(top, #38dac5, #2bcdb8);}.btn_color:hover{color: #fff;background: #38dac5;background-image: -o-linear-gradient(top, #45e7d2, #38dac5);background-image: -ms-linear-gradient(top, #45e7d2, #38dac5);background-image: -moz-linear-gradient(top, #45e7d2, #38dac5);	background-image: -webkit-linear-gradient(top, #45e7d2, #38dac5);}.btn_color:active{background: #22d07c;background-image: -o-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -ms-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -moz-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -webkit-linear-gradient(bottom, #38dac5, #2bcdb8);}</style>');}
else if(color=="#46ace7"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_blue.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #46ace7;border: 1px solid #2787be;background-image: -o-linear-gradient(top, #53b9f4, #46ace7);background-image: -ms-linear-gradient(top, #53b9f4, #46ace7);background-image: -moz-linear-gradient(top, #53b9f4, #46ace7);background-image: -webkit-linear-gradient(top, #53b9f4, #46ace7);}.btn_color:hover{color: #fff;background: #53b9f4;	background-image: -o-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -ms-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -moz-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -webkit-linear-gradient(top, #60c6ff, #53b9f4);}.btn_color:active{	background: #46ace7;background-image: -o-linear-gradient(bottom, #53b9f4, #46ace7);	background-image: -ms-linear-gradient(bottom, #53b9f4, #46ace7);background-image: -moz-linear-gradient(bottom, #53b9f4, #46ace7);background-image: -webkit-linear-gradient(bottom, #53b9f4, #46ace7);}</style>');}
else if(color=="#9770c6"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_purple.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #9770c6;	border: 1px solid #8254b8;	background-image: -o-linear-gradient(top, #a47dd3, #9770c6);background-image: -ms-linear-gradient(top, #a47dd3, #9770c6);background-image: -moz-linear-gradient(top, #a47dd3, #9770c6);background-image: -webkit-linear-gradient(top, #a47dd3, #9770c6);}.btn_color:hover{color: #fff;background: #a47dd3;background-image: -o-linear-gradient(top, #b18ae0, #a47dd3);background-image: -ms-linear-gradient(top, #b18ae0, #a47dd3);background-image: -moz-linear-gradient(top, #b18ae0, #a47dd3);background-image: -webkit-linear-gradient(top, #b18ae0, #a47dd3);}.btn_color:active{	background: #9770c6;	background-image: -o-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -ms-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -moz-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -webkit-linear-gradient(bottom, #a47dd3, #9770c6);}</style>');}
else if(color=="#e656a0"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_pink.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #e656a0;	border: 1px solid #b94882;	background-image: -o-linear-gradient(top, #f363ad, #e656a0);background-image: -ms-linear-gradient(top, #f363ad, #e656a0);background-image: -moz-linear-gradient(top, #f363ad, #e656a0);background-image: -webkit-linear-gradient(top, #f363ad, #e656a0);}.btn_color:hover{color: #fff;background: #f363ad;background-image: -o-linear-gradient(top, #ff70ba, #f363ad);background-image: -ms-linear-gradient(top, #ff70ba, #f363ad);background-image: -moz-linear-gradient(top, #ff70ba, #f363ad);background-image: -webkit-linear-gradient(top, #ff70ba, #f363ad);}.btn_color:active{background: #e656a0;background-image: -o-linear-gradient(bottom, #f363ad, #e656a0);background-image: -ms-linear-gradient(bottom, #f363ad, #e656a0);background-image: -moz-linear-gradient(bottom, #f363ad, #e656a0);	background-image: -webkit-linear-gradient(bottom, #f363ad, #e656a0);}</style>');}
else if(color=="#333333"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_black.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #444;	border: 1px solid #333;	background-image: -o-linear-gradient(top, #505050, #444);	background-image: -ms-linear-gradient(top, #505050, #444);	background-image: -moz-linear-gradient(top, #505050, #444);	background-image: -webkit-linear-gradient(top, #505050, #444);}.btn_color:hover{color: #fff;background: #4e4e4e;background-image: -o-linear-gradient(top, #595959, #4e4e4e);background-image: -ms-linear-gradient(top, #595959, #4e4e4e);background-image: -moz-linear-gradient(top, #595959, #4e4e4e);background-image: -webkit-linear-gradient(top, #595959, #4e4e4e);}.btn_color:active{	background: #444;	background-image: -o-linear-gradient(bottom, #505050, #444);background-image: -ms-linear-gradient(bottom, #505050, #444);background-image: -moz-linear-gradient(bottom, #505050, #444);background-image: -webkit-linear-gradient(bottom, #505050, #444);}</style>');}


}

jQuery("#stylechange li a").click(function(event) { 
	
event.preventDefault();	
var color=jQuery(this).attr("alt");

jQuery('#stylechange li a').css({'cursor':'pointer'});
jQuery(this).css({'cursor':'default'});

jQuery('head style.old_style').remove();
jQuery('head').append('<style class="old_style">.widget_archive a:hover,.widget_recent_comments a:hover,.blog-single-tags a:hover,p a,h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,blockquote,ul.list li i.text_color,ul.list_2 li i,.list_2 ul li i,.avatar_title h5 span a,#header nav ul li.dropdown ul li a:hover,#page_header ul li a,.feature_icon,.features_pushed:before,.pagination_menu i:hover,.meta li a:hover,.meta-categories a:hover,.widget_categories li h6 a,.mini_post header h6:hover, .mini_post li:hover,#main_footer .col ul li a:hover,.pricing_column h2,.tabs > ul li a.inactive:hover,.accordion h2:hover, .accordion h3:hover, .accordion h4:hover, .accordion h5:hover, .accordion h6:hover,.text_color,.footer-contact i, .tweet_list li i{color:'+color+' ;} .dropcap_alt,blockquote.alt2,.img_overlay,.coloured_wrapper.defaultcolor_wrap:before,.meta-button:hover,.tagcloud a:hover,#totop:hover,.pricing_column.active,.highlight{background:'+color+' ;}::selection{background:'+color+';color:#fff;}::-moz-selection{background:'+color+' ;color:#fff;} blockquote{border-left: 2px solid '+color+';}.features:hover .feature_icon{	background: '+color+';	border: 1px solid '+color+';	background-image: -o-linear-gradient(top, '+color+', '+color+');	background-image: -ms-linear-gradient(top, '+color+', '+color+');	background-image: -moz-linear-gradient(top, '+color+', '+color+');	background-image: -webkit-linear-gradient(top, '+color+', '+color+');}.notification{	border: 1px solid '+color+';	background: '+color+';	background-image: -o-linear-gradient(top, '+color+', '+color+');	background-image: -ms-linear-gradient(top, '+color+', '+color+');	background-image: -moz-linear-gradient(top, '+color+', '+color+');	background-image: -webkit-linear-gradient(top, '+color+', '+color+');}</style>');

if(color=="#e55151"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_red.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #e55151;	border: 1px solid #bb2424;background-image: -o-linear-gradient(top, #f25e5e, #e55151);	background-image: -ms-linear-gradient(top, #f25e5e, #e55151);	background-image: -moz-linear-gradient(top, #f25e5e, #e55151);	background-image: -webkit-linear-gradient(top, #f25e5e, #e55151);}.btn_color:hover{color: #fff;background: #f25151;background-image: -o-linear-gradient(top, #ff5e5e, #f25151);	background-image: -ms-linear-gradient(top, #ff5e5e, #f25151);	background-image: -moz-linear-gradient(top, #ff5e5e, #f25151);	background-image: -webkit-linear-gradient(top, #ff5e5e, #f25151);}.btn_color:active{	background: #e55151;background-image: -o-linear-gradient(bottom, #f25e5e, #e55151);	background-image: -ms-linear-gradient(bottom, #f25e5e, #e55151);background-image: -moz-linear-gradient(bottom, #f25e5e, #e55151);background-image: -webkit-linear-gradient(bottom, #f25e5e, #e55151);}</style>');}
else if(color=="#e6624d"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_orange.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{text-shadow: 0 1px 1px rgba(0,0,0,0.2);color: #fff;border: 1px solid #c94e3a;border-right: 0;background: #e6624d;background-image: -o-linear-gradient(top, #f36f5a, #e6624d);background-image: -ms-linear-gradient(top, #f36f5a, #e6624d);background-image: -moz-linear-gradient(top, #f36f5a, #e6624d);background-image: -webkit-linear-gradient(top, #f36f5a, #e6624d);box-shadow: 0 1px 1px 0 rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.15);-moz-box-shadow: 0 1px 1px 0 rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.15);-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.15);}.btn_color:hover{color: #fff;text-shadow: 0 1px 1px rgba(0,0,0,0.2);	color: #fff;background: #f36f5a;background-image: -o-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -ms-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -moz-linear-gradient(top, #ff7c67, #f36f5a);	background-image: -webkit-linear-gradient(top, #ff7c67, #f36f5a);}.btn_color:active{	text-shadow: 0 1px 1px rgba(0,0,0,0.2);color: #fff;background: #e6624d;background-image: -o-linear-gradient(bottom, #f36f5a, #e6624d);	background-image: -ms-linear-gradient(bottom, #f36f5a, #e6624d);background-image: -moz-linear-gradient(bottom, #f36f5a, #e6624d);background-image: -webkit-linear-gradient(bottom, #f36f5a, #e6624d);}</style>');}
else if(color=="#bb9113"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_yellow.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;text-shadow: 0 1px 1px rgba(255,255,255,0.2);	color: #bb9113;	background: #f7d15e;border: 1px solid #d4ae39;background-image: -o-linear-gradient(top, #ffde6b, #f7d15e);background-image: -ms-linear-gradient(top, #ffde6b, #f7d15e);background-image: -moz-linear-gradient(top, #ffde6b, #f7d15e);background-image: -webkit-linear-gradient(top, #ffde6b, #f7d15e);}.btn_color:hover{color: #bb9113;background: #ffde6b;background-image: -o-linear-gradient(top, #ffeb78, #ffde6b);background-image: -ms-linear-gradient(top, #ffeb78, #ffde6b);background-image: -moz-linear-gradient(top, #ffeb78, #ffde6b);background-image: -webkit-linear-gradient(top, #ffeb78, #ffde6b);}.btn_color:active{	background: #ffde6b;background-image: -o-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -ms-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -moz-linear-gradient(bottom, #ffeb78, #ffde6b);background-image: -webkit-linear-gradient(bottom, #ffeb78, #ffde6b);}</style>');}
else if(color=="#72d23e"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_lime.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #72d23e;border: 1px solid #4aac14;background-image: -o-linear-gradient(top, #7ddd49, #72d23e);background-image: -ms-linear-gradient(top, #7ddd49, #72d23e);background-image: -moz-linear-gradient(top, #7ddd49, #72d23e);background-image: -webkit-linear-gradient(top, #7ddd49, #72d23e);}.btn_color:hover{color: #fff;background: #7cdc48;background-image: -o-linear-gradient(top, #87e753, #7cdc48);background-image: -ms-linear-gradient(top, #87e753, #7cdc48);background-image: -moz-linear-gradient(top, #87e753, #7cdc48);	background-image: -webkit-linear-gradient(top, #87e753, #7cdc48);}.btn_color:active{background: #72d23e;background-image: -o-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -ms-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -moz-linear-gradient(bottom, #7ddd49, #72d23e);background-image: -webkit-linear-gradient(bottom, #7ddd49, #72d23e);}</style>');}
else if(color=="#22d07c"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_green.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #22d07c;border: 1px solid #1ba964;background-image: -o-linear-gradient(top, #2fdd89, #22d07c);background-image: -ms-linear-gradient(top, #2fdd89, #22d07c);background-image: -moz-linear-gradient(top, #2fdd89, #22d07c);background-image: -webkit-linear-gradient(top, #2fdd89, #22d07c);}.btn_color:hover{color: #fff;background: #2fdd89;background-image: -o-linear-gradient(top, #3cea96, #2fdd89);background-image: -ms-linear-gradient(top, #3cea96, #2fdd89);background-image: -moz-linear-gradient(top, #3cea96, #2fdd89);	background-image: -webkit-linear-gradient(top, #3cea96, #2fdd89);}.btn_color:active{background: #22d07c;	background-image: -o-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -ms-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -moz-linear-gradient(bottom, #2fdd89, #22d07c);background-image: -webkit-linear-gradient(bottom, #2fdd89, #22d07c);}</style>');}
else if(color=="#2bcdb8"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_teal.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #2bcdb8;border: 1px solid #1bae8d;background-image: -o-linear-gradient(top, #38dac5, #2bcdb8);background-image: -ms-linear-gradient(top, #38dac5, #2bcdb8);background-image: -moz-linear-gradient(top, #38dac5, #2bcdb8);background-image: -webkit-linear-gradient(top, #38dac5, #2bcdb8);}.btn_color:hover{color: #fff;background: #38dac5;background-image: -o-linear-gradient(top, #45e7d2, #38dac5);background-image: -ms-linear-gradient(top, #45e7d2, #38dac5);background-image: -moz-linear-gradient(top, #45e7d2, #38dac5);	background-image: -webkit-linear-gradient(top, #45e7d2, #38dac5);}.btn_color:active{background: #22d07c;background-image: -o-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -ms-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -moz-linear-gradient(bottom, #38dac5, #2bcdb8);background-image: -webkit-linear-gradient(bottom, #38dac5, #2bcdb8);}</style>');}
else if(color=="#46ace7"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_blue.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #46ace7;border: 1px solid #2787be;background-image: -o-linear-gradient(top, #53b9f4, #46ace7);background-image: -ms-linear-gradient(top, #53b9f4, #46ace7);background-image: -moz-linear-gradient(top, #53b9f4, #46ace7);background-image: -webkit-linear-gradient(top, #53b9f4, #46ace7);}.btn_color:hover{color: #fff;background: #53b9f4;	background-image: -o-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -ms-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -moz-linear-gradient(top, #60c6ff, #53b9f4);	background-image: -webkit-linear-gradient(top, #60c6ff, #53b9f4);}.btn_color:active{	background: #46ace7;background-image: -o-linear-gradient(bottom, #53b9f4, #46ace7);	background-image: -ms-linear-gradient(bottom, #53b9f4, #46ace7);background-image: -moz-linear-gradient(bottom, #53b9f4, #46ace7);background-image: -webkit-linear-gradient(bottom, #53b9f4, #46ace7);}</style>');}
else if(color=="#9770c6"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_purple.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #9770c6;	border: 1px solid #8254b8;	background-image: -o-linear-gradient(top, #a47dd3, #9770c6);background-image: -ms-linear-gradient(top, #a47dd3, #9770c6);background-image: -moz-linear-gradient(top, #a47dd3, #9770c6);background-image: -webkit-linear-gradient(top, #a47dd3, #9770c6);}.btn_color:hover{color: #fff;background: #a47dd3;background-image: -o-linear-gradient(top, #b18ae0, #a47dd3);background-image: -ms-linear-gradient(top, #b18ae0, #a47dd3);background-image: -moz-linear-gradient(top, #b18ae0, #a47dd3);background-image: -webkit-linear-gradient(top, #b18ae0, #a47dd3);}.btn_color:active{	background: #9770c6;	background-image: -o-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -ms-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -moz-linear-gradient(bottom, #a47dd3, #9770c6);background-image: -webkit-linear-gradient(bottom, #a47dd3, #9770c6);}</style>');}
else if(color=="#e656a0"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_pink.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #e656a0;	border: 1px solid #b94882;	background-image: -o-linear-gradient(top, #f363ad, #e656a0);background-image: -ms-linear-gradient(top, #f363ad, #e656a0);background-image: -moz-linear-gradient(top, #f363ad, #e656a0);background-image: -webkit-linear-gradient(top, #f363ad, #e656a0);}.btn_color:hover{color: #fff;background: #f363ad;background-image: -o-linear-gradient(top, #ff70ba, #f363ad);background-image: -ms-linear-gradient(top, #ff70ba, #f363ad);background-image: -moz-linear-gradient(top, #ff70ba, #f363ad);background-image: -webkit-linear-gradient(top, #ff70ba, #f363ad);}.btn_color:active{background: #e656a0;background-image: -o-linear-gradient(bottom, #f363ad, #e656a0);background-image: -ms-linear-gradient(bottom, #f363ad, #e656a0);background-image: -moz-linear-gradient(bottom, #f363ad, #e656a0);	background-image: -webkit-linear-gradient(bottom, #f363ad, #e656a0);}</style>');}
else if(color=="#333333"){jQuery('head').append('<style class="old_style">.vertical_tabs ul li.active:after{background:url('+window.theme_url+'img/buttontip_black.png)}.features:hover .feature_icon, .notification,.page-id-1845 .meter span,.page-id-1970 .meter span, .vertical_tabs ul li.active, .btn_color{color: #fff;background: #444;	border: 1px solid #333;	background-image: -o-linear-gradient(top, #505050, #444);	background-image: -ms-linear-gradient(top, #505050, #444);	background-image: -moz-linear-gradient(top, #505050, #444);	background-image: -webkit-linear-gradient(top, #505050, #444);}.btn_color:hover{color: #fff;background: #4e4e4e;background-image: -o-linear-gradient(top, #595959, #4e4e4e);background-image: -ms-linear-gradient(top, #595959, #4e4e4e);background-image: -moz-linear-gradient(top, #595959, #4e4e4e);background-image: -webkit-linear-gradient(top, #595959, #4e4e4e);}.btn_color:active{	background: #444;	background-image: -o-linear-gradient(bottom, #505050, #444);background-image: -ms-linear-gradient(bottom, #505050, #444);background-image: -moz-linear-gradient(bottom, #505050, #444);background-image: -webkit-linear-gradient(bottom, #505050, #444);}</style>');}

jQuery.cookie("color", color, { path: '/' });
});
	
	

jQuery('#container').isotope();
jQuery(window).trigger('resize');
	
	jQuery(".woo_single_page div.images>a").each(function(){	jQuery(this).addClass("fancybox");		});
	jQuery(".woo_single_page div.thumbnails a").each(function(){	jQuery(this).addClass("fancybox").attr("rel","product_gallery");		});
	
	
    
     jQuery('.tagcloud a').wrapInner("<span></span>").prepend('<i class="fa fa-tag"></i>');
      jQuery('.widget_categories li').wrapInner("<h6></h6>")
      jQuery('.widget_categories ul').addClass("list right text_lightestGrey arrow");
      jQuery('.flv_tabs > ul').prev().remove();
      jQuery('.flv_tabs > ul').next().remove();
      jQuery('.flv_tabs .tab_content .tab hr:last-child').remove();
      jQuery('aside.col.sidebar hr,.flv_widgets_container hr').first().remove();
      jQuery('aside.col.sidebar .gap_35,.flv_widgets_container .gap_35').first().remove();
      
     jQuery('#chemistry_submit').addClass("btn medium orange");
     

  jQuery(".fancybox").fancybox();
   jQuery(".instagram-photo").fancybox();
  jQuery(".various").fancybox({
					autoSize	: true,
					padding: 0
				});
							
		});
		
	
function validate_email(address) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   if(reg.test(address) == false) {
      return false;
   }
   else
   return true;
}
$j(document).ready(function(){

	/* contact form*/
$j("form#commentform.contact-form").submit(function(e){ 
	e.preventDefault();
	var errors=0;
     if($j('.flvcontactform .flvname').val()!=undefined)
	 if($j('.flvcontactform .flvname').val()=='') {
	 	var hasClass=$j('.flvcontactform .flvname').next().hasClass("error");
	 	if(!hasClass)
	 	    $j('<label for="contactname" generated="true" class="error">Please enter your name</label>').insertAfter( $j('.flvcontactform .flvname'));	
			$j('.flvcontactform .flvname').focus();
			errors++;
		}
		else
		if($j('.flvcontactform .flvname').next().hasClass("error"))$j('.flvcontactform .flvname').next().remove();

		
		if($j('.flvcontactform .flvemail').val()!=undefined)
		if(validate_email($j('.flvcontactform .flvemail').val())==false ) {
		var hasClass=$j('.flvcontactform .flvemail').next().hasClass("error");
	 	if(!hasClass)
	 	  $j('<label for="contactname" generated="true" class="error">Please enter a valid email address</label>').insertAfter( $j('.flvcontactform .flvemail'));	
			$j('.flvcontactform .flvemail').focus();
			errors++;
		}
		else
		if($j('.flvcontactform .flvemail').next().hasClass("error"))$j('.flvcontactform .flvemail').next().remove();
		
				
		if($j('.flvcontactform .flvorg').val()!=undefined)
		if($j('.flvcontactform .flvorg').val()==''){
		var hasClass=$j('.flvcontactform .flvorg').next().hasClass("error");
	 	if(!hasClass)
	 	    $j('<label for="contactname" generated="true" class="error">Please enter a subject</label>').insertAfter( $j('.flvcontactform .flvorg'));	
			$j('.flvcontactform .flvorg').focus();
			errors++;
		}
		else
		if($j('.flvcontactform .flvorg').next().hasClass("error"))$j('.flvcontactform .flvorg').next().remove();
		
		if($j('.flvcontactform .flvmessage').val()!=undefined)
		if($j('.flvcontactform .flvmessage').val()==''){
		var hasClass=$j('.flvcontactform .flvmessage').next().hasClass("error");
	 	if(!hasClass)
	 	    $j('<label for="contactname" generated="true" class="error">Please enter a message</label>').insertAfter( $j('.flvcontactform .flvmessage'));
			$j('.flvcontactform .flvmessage').focus();
			errors++;
		}
		else
		if($j('.flvcontactform .flvmessage').next().hasClass("error"))$j('.flvcontactform .flvmessage').next().remove();
		
		if(errors==0) {
			
				var formInput = $j(this).serialize();
				$j.post($j(this).attr('action'),formInput, function(data){
					$j('form#commentform.contact-form').slideUp("fast", function() {			   
						$j(this).before('<div class="alert_box alert_success"><p>'+window.message+'</p></div>');
					});
				});
			}
		return false;
});

	$j("form#commentform.newsletter").submit(function(e){ 
		e.preventDefault();
		var valid = '';
		var errors=0;
		var email = document.getElementById("news_email").value;
			if($j('.newsletter #news_email').val()!=undefined)
			if(validate_email($j('.newsletter #news_email').val())==false ) {
			var hasClass=$j('.newsletter #news_email').parent().find(".error").hasClass("error");
		 	if(!hasClass)
		 	{ $j('.newsletter #news_email').parent().find(".error").remove();	
		 	   $j('.newsletter #news_email').parent().append('<label for="contactname" generated="true" class="error">Please enter a valid email address</label>');	
		 	   }
				$j('.newsletter #news_email').focus();
				errors++;
			}
			else
			$j('.newsletter #news_email').parent().find(".error").remove();
	
		if(errors==0) {
				document.getElementById("submit_mail").disabled=true;
				document.getElementById("submit_mail").value='...';
				
				
				
				var formInput = $j(this).serialize();
				$j.post($j(this).attr('action'),formInput, function(data){
					$j('#commentform.newsletter').slideUp("fast", function() {			   
						$j(this).before('<div class="alert_box alert_success"><p>Thank you for using our newsletter! Your email has been registered.</p></div>');
					});
				});
				

		}
		return false;	
	});

});
		

