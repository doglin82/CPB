<?php
/**
 * WPBakery Visual Composer Here includes useful files for plugin
 *
 * @package WPBakeryVisualComposer
 *
 */

$lib_dir = $composer_settings['COMPOSER_LIB'];
$shortcodes_dir = $composer_settings['SHORTCODES_LIB'];

require_once( $lib_dir . 'wpb_autoupdate.php' );
require_once( $lib_dir . 'abstract.php' );
require_once( $lib_dir . 'helpers.php' );
require_once( $lib_dir . 'helpers_api.php' );
require_once( $lib_dir . 'filters.php' );
require_once( $lib_dir . 'params.php' );

require_once( $lib_dir . 'mapper.php' );
require_once( $lib_dir . 'shortcodes.php' );
require_once( $lib_dir . 'composer.php' );

require_once( $lib_dir . 'automapper.php');
require_once( $lib_dir . 'settings.php');

/* Add shortcodes classes */
require_once( $shortcodes_dir . 'row.php' );
require_once( $shortcodes_dir . 'column.php' );

require_once( $shortcodes_dir . 'tabs.php' );
require_once( $shortcodes_dir . 'accordion.php' );
require_once( $shortcodes_dir . 'button.php' );
require_once( $shortcodes_dir . 'cta_button.php' );
require_once( $shortcodes_dir . 'facebook.php' );
require_once( $shortcodes_dir . 'flickr.php' );
require_once( $shortcodes_dir . 'google_maps.php' );
require_once( $shortcodes_dir . 'google_plus.php' );
require_once( $shortcodes_dir . 'image_gallery.php' );
require_once( $shortcodes_dir . 'layerslider.php' );
require_once( $shortcodes_dir . 'message_box.php' );
require_once( $shortcodes_dir . 'pinterest.php' );
require_once( $shortcodes_dir . 'posts_slider.php' );
require_once( $shortcodes_dir . 'posts_grid.php' );
require_once( $shortcodes_dir . 'progress_bar.php' );
require_once( $shortcodes_dir . 'raw_content.php' );
require_once( $shortcodes_dir . 'rev_slider.php' );
require_once( $shortcodes_dir . 'separator.php' );
require_once( $shortcodes_dir . 'single_image.php' );
require_once( $shortcodes_dir . 'teaser_grid.php' );
require_once( $shortcodes_dir . 'text.php' );
require_once( $shortcodes_dir . 'toggle_faq.php' );
require_once( $shortcodes_dir . 'tour.php' );
require_once( $shortcodes_dir . 'tweetmeme.php' );
require_once( $shortcodes_dir . 'twitter.php' );
require_once( $shortcodes_dir . 'video_player.php' );
require_once( $shortcodes_dir . 'widgetised_sidebar.php' );
require_once( $shortcodes_dir . 'wordpress_widgets.php' );
require_once( $shortcodes_dir . 'pie.php' );
require_once( $shortcodes_dir . 'carousel.php' );
require_once( $shortcodes_dir . 'images_carousel.php' );

/* Visual Composer 4.0 content elements */
require_once( $shortcodes_dir . 'button2.php' );
require_once( $shortcodes_dir . 'cta_button2.php' );


//require_once( $shortcodes_dir . 'example.php' );
require_once( $shortcodes_dir . 'flv/sections.php' );/* - */
require_once( $shortcodes_dir . 'flv/lists.php' );/* - */
require_once( $shortcodes_dir . 'flv/list.php' );/* - */
require_once( $shortcodes_dir . 'flv/testimonial_slider.php' );/* - */
require_once( $shortcodes_dir . 'flv/testimonial_slide.php' );/* - */
require_once( $shortcodes_dir . 'flv/pricing_tables.php' );/* - */
require_once( $shortcodes_dir . 'flv/pricing_table.php' );/* - */
require_once( $shortcodes_dir . 'flv/pricing_table_primary.php' );/* - */
require_once( $shortcodes_dir . 'flv/toggle_group.php' );/* - */
require_once( $shortcodes_dir . 'flv/toggle.php' );/* - */
require_once( $shortcodes_dir . 'flv/tab_group.php' );/* - */
require_once( $shortcodes_dir . 'flv/tab.php' );/* - */
require_once( $shortcodes_dir . 'flv/vertical_tab_group.php' );/* - */
require_once( $shortcodes_dir . 'flv/vertical_tab.php' );/* - */
require_once( $shortcodes_dir . 'flv/sudo_slider.php' );
require_once( $shortcodes_dir . 'flv/sudo_slide.php' );

require_once( $shortcodes_dir . 'flv/bx_slider.php' );
require_once( $shortcodes_dir . 'flv/bx_slide.php' );




require_once( $lib_dir . 'layouts.php' );

require_once( $lib_dir . 'params/load.php');
