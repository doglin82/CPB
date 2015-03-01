<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>

<?php 

      $our_id=woocommerce_get_page_id( 'shop' );
	
$sidebar = get_post_meta( $our_id, 'dbt_sidebar', TRUE ); 
$template = get_post_meta($our_id, '_wp_page_template', true );

if($template=='')$template ="default";

$side='sidebar_blog';
if($sidebar=="Blog Sidebar"){$side='sidebar_blog';}
elseif($sidebar=="Sidebar 1"){$side='sidebar1';}
elseif($sidebar=="Sidebar 2"){$side='sidebar2';}
elseif($sidebar=="Sidebar 3"){$side='sidebar3';}
elseif($sidebar=="Sidebar 4"){$side='sidebar4';}
elseif($sidebar=="Sidebar 5"){$side='sidebar5';}
	 ?>
	
   
  
	<div class="woo_shop">
		
<?php if($template=="page-sidebar-left.php"){?>
		<section class="col main_content right">
<?php  } else if($template=="page-sidebar-right.php"){ ?>
	<section class="col main_content ">	
<?php } else {?>
  <section class="content ">
    	<?php } ?>
    	

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<!--h1 class="page-title"><?php woocommerce_page_title(); ?></h1 -->

		<?php endif; ?>

		<?php //do_action( 'woocommerce_archive_description' ); ?>
		<?php 
		$cols=4;	if(ot_get_option('woo_shop_columns')!='')	$cols=ot_get_option('woo_shop_columns'); 
		$class='';		if($template=="page-sidebar-left.php" || $template=="page-sidebar-right.php") $class="sidebar";else  $class="no-sidebar";
		?>
		<div class="woo-<?php echo  esc_attr($class); ?>-<?php echo  esc_attr($cols); ?>-col">

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
</div>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>


		</section>
	       	
<?php  if($template=="page-sidebar-left.php"  || $template=="page-sidebar-right.php" ){ ?>
			<aside class="col sidebar">
<?php  $side1=torque_get_dynamic_sidebar($side); echo(do_shortcode($side1)); ?>         
		</aside>
<?php  } ?>
	
		</div>
<?php get_footer('shop'); ?>