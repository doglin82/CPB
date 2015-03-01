<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>
<div class="flv_page_top_padding"></div>
<?php
$template="No Sidebar";
$sidebar='';
if(ot_get_option("woo_ps_sidebar",'')) $sidebar = ot_get_option("woo_ps_sidebar",'');
if(ot_get_option("woo_ps_template",'')) $template = ot_get_option("woo_ps_template",'');

$side='sidebar_blog';
if($sidebar=="Blog Sidebar"){$side='sidebar_blog';}
elseif($sidebar=="Sidebar 1"){$side='sidebar1';}
elseif($sidebar=="Sidebar 2"){$side='sidebar2';}
elseif($sidebar=="Sidebar 3"){$side='sidebar3';}
elseif($sidebar=="Sidebar 4"){$side='sidebar4';}
elseif($sidebar=="Sidebar 5"){$side='sidebar5';}

	global $post;  $postid = $post->ID;
?>   
	
		 <div class="woo_single_page">	

	  <?php if($template=="Left Sidebar"){?>
		<section class="col main_content right">
<?php  } else if($template=="Right Sidebar"){ ?>
	<section class="col main_content ">	
<?php } else {?>
  <section class="content ">
    	<?php } ?>


		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
	//	do_action('woocommerce_sidebar');
	?>
</div>
</section>
<?php if($template=="Right Sidebar" || $template=="Left Sidebar"){?>
			<aside class="col sidebar">
<?php  $side1=torque_get_dynamic_sidebar($side); echo(do_shortcode($side1)); ?>         
		</aside>
<?php  } ?>
</div>
		
		
<?php get_footer('shop'); ?>