<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => 'General'
      ),
      array(
        'id'          => 'appearance',
        'title'       => 'Appearances'
      ),
      array(
        'id'          => 'blog',
        'title'       => 'Blog'
      ),
      array(
        'id'          => 'font',
        'title'       => 'Choose Fonts'
      ),
      array(
        'id'          => 'contact',
        'title'       => 'Contact Form'
      ),
      array(
        'id'          => 'woocommerce',
        'title'       => 'WooCommerce'
      ),
      array(
        'id'          => 'code',
        'title'       => 'Extra Code'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'logo_url',
        'label'       => 'Logo URL',
        'desc'        => 'Url when you click on logo',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'logo',
        'label'       => 'Logo image',
        'desc'        => 'Your logo image',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'logo_w',
        'label'       => 'Logo Image Width',
        'desc'        => 'in pixels',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'logo_h',
        'label'       => 'Logo Image Height',
        'desc'        => 'in pixels',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'favico',
        'label'       => 'Fav Icon',
        'desc'        => 'A favicon is a graphic image (icon) associated with a particular Web page and/or Web site.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'general_mobile',
        'label'       => 'Mobile Menu Settings',
        'desc'        => 'Mobile Menu Settings',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'mobi_menu',
        'label'       => 'Mobile Menu',
        'desc'        => 'Name of menu to display on mobile devices',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'mobi_menu_color',
        'label'       => 'Select mobile menu skin',
        'desc'        => '',
        'std'         => 'light',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'light',
            'label'       => 'light',
            'src'         => ''
          ),
          array(
            'value'       => 'black',
            'label'       => 'black',
            'src'         => ''
          ),
          array(
            'value'       => 'white',
            'label'       => 'white',
            'src'         => ''
          ),
          array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          )
        )
      ),
        array(
        'id'          => 'mobile_menu_sliding',
        'label'       => 'Enable sliding submenus',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'general_layout_mode',
        'label'       => 'General Settings',
        'desc'        => 'General Settings',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'theme_color_schema',
        'label'       => 'Select Primary Theme Color',
        'desc'        => '',
        'std'         => 'orange',
        'type'        => 'select',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'custom',
            'label'       => 'custom',
            'src'         => ''
          ),
          array(
            'value'       => 'orange',
            'label'       => 'orange',
            'src'         => ''
          ),
          array(
            'value'       => 'red',
            'label'       => 'red',
            'src'         => ''
          ),
          array(
            'value'       => 'yellow',
            'label'       => 'yellow',
            'src'         => ''
          ),
          array(
            'value'       => 'lime',
            'label'       => 'lime',
            'src'         => ''
          ),
          array(
            'value'       => 'green',
            'label'       => 'green',
            'src'         => ''
          ),
          array(
            'value'       => 'teal',
            'label'       => 'teal',
            'src'         => ''
          ),
          array(
            'value'       => 'blue',
            'label'       => 'blue',
            'src'         => ''
          ),
          array(
            'value'       => 'purple',
            'label'       => 'purple',
            'src'         => ''
          ),
          array(
            'value'       => 'pink',
            'label'       => 'pink',
            'src'         => ''
          ),
          array(
            'value'       => 'black',
            'label'       => 'black',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'theme_color',
        'label'       => 'Select custom color:',
        'desc'        => 'default color: #e6624d',
        'std'         => '#e6624d',
        'type'        => 'colorpicker',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'header',
        'label'       => 'Header Settings',
        'desc'        => 'Header Settings',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
        array(
        'id'          => 'header_rainbow',
        'label'       => 'Disable header rainbow line',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
            array(
        'id'          => 'sticky_menu',
        'label'       => 'Disable Sticky Header',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
       array(
        'label'       => 'Header Social icons',
        'id'          => 'social_icons',
        'type'        => 'list-item',
        'desc'        => '',
        'settings'    => array(
          array(
            'label'       => 'Select icon type',
            'id'          => 'social_icon_type',
            'type'        => 'select',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array(
          array(
            'label'       => 'Twitter',
            'value'       => 'twitter'
          ),
          array(
            'label'       => 'Facebook',
            'value'       => 'facebook'
          ),
          array(
            'label'       => 'Google plus',
            'value'       => 'google-plus'
          ),
          array(
            'label'       => 'Dribbble',
            'value'       => 'dribbble'
          ),
          array(
            'label'       => 'Flickr',
            'value'       => 'flickr'
          ),
          array(
            'label'       => 'Html5',
            'value'       => 'html5'
          ),
          array(
            'label'       => 'Tumblr',
            'value'       => 'tumblr'
          ),
          array(
            'label'       => 'Dropbox',
            'value'       => 'dropbox'
          ),
          array(
            'label'       => 'Instagram',
            'value'       => 'instagram'
          ),
          array(
            'label'       => 'Skype',
            'value'       => 'skype'
          ),
          array(
            'label'       => 'Youtube',
            'value'       => 'youtube'
          ),
          array(
            'label'       => 'Linkedin',
            'value'       => 'linkedin'
          ),
          array(
            'label'       => 'Pinterest',
            'value'       => 'pinterest'
          ),
          array(
            'label'       => 'Windows',
            'value'       => 'windows'
          ),
          array(
            'label'       => 'Android',
            'value'       => 'android'
          ),
          array(
            'label'       => 'Apple',
            'value'       => 'apple'
          ),
          array(
            'label'       => 'Linux',
            'value'       => 'linux'
          ),
          array(
            'label'       => 'Css3',
            'value'       => 'css3'
          ),
          array(
            'label'       => 'Github',
            'value'       => 'github-alt'
          ),
          array(
            'label'       => 'Stackexchange',
            'value'       => 'stackexchange'
          )
        ),
          ),
          array(
            'label'       => 'Url',
            'id'          => 'social_icon_url',
            'type'        => 'text',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
            array(
            'label'       => 'Target',
            'id'          => 'social_icon_target',
            'type'        => 'select',
            'desc'        => '',
            'std'         => 'Blank',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array(
          array(
            'label'       => 'Blank',
            'value'       => '_blank'
          ),
          array(
            'label'       => 'Self',
            'value'       => '_self'
          )
        ),
          ),
        ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'appearance'
      ),
      
	  
	  array(
        'id'          => 'breadcrumb',
        'label'       => 'Breadcrumb Settings',
        'desc'        => 'Breadcrumb Settings',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
	    array(
        'id'          => 'disable_header_bg',
        'label'       => 'Disable Breadcrumb Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'header_bg',
        'label'       => 'Breadcrumb Background Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'disable_header_overlay',
        'label'       => 'Disable Breadcrumb Overlay',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'header_overlay',
        'label'       => 'Breadcrumb Overlay',
        'desc'        => 'default is: #434952',
        'std'         => '#434952',
        'type'        => 'colorpicker',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'header_overlay_opacity',
        'label'       => 'Breadcrumb Overlay Opacity',
        'desc'        => '',
        'std'         => '0.95',
        'type'        => 'upload',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
 
      array(
        'id'          => 'footer',
        'label'       => 'Footer Settings',
        'desc'        => 'Footer Settings',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'footer_rainbow',
        'label'       => 'Disable footer rainbow line',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'footer_1_show',
        'label'       => 'Hide first row from footer',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'hide',
            'label'       => 'hide',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'footer_2_show',
        'label'       => 'Hide second row from footer',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'hide',
            'label'       => 'hide',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'footer_3_show',
        'label'       => 'Hide third row from footer',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'appearance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'hide',
            'label'       => 'hide',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'posts_fields',
        'label'       => 'Hide meta fields from post info',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'date',
            'label'       => 'date',
            'src'         => ''
          ),
          array(
            'value'       => 'categories',
            'label'       => 'categories',
            'src'         => ''
          ),
          array(
            'value'       => 'author',
            'label'       => 'author',
            'src'         => ''
          ),
          array(
            'value'       => 'comments_number',
            'label'       => 'comments_number',
            'src'         => ''
          ),
          array(
            'value'       => 'likes',
            'label'       => 'likes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'blogg4',
        'label'       => 'blogg4',
        'desc'        => 'Blog - single page',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'featured_image_disp',
        'label'       => 'Hide featured image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'blog_single_navi',
        'label'       => 'Show navigation',
        'desc'        => 'next and previous links',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),

       array(
        'id'          => 'blog_single_tags',
        'label'       => 'Hide tags',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),

       array(
        'id'          => 'blog_single_share',
        'label'       => 'Hide "Share" section',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'blog_single_template',
        'label'       => 'Single post pages template:',
        'desc'        => '',
        'std'         => 'Right Sidebar',
        'type'        => 'select',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'Left Sidebar',
            'label'       => 'Left Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'Right Sidebar',
            'label'       => 'Right Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'Full Width',
            'label'       => 'Full Width',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'blog_single_sidebar',
        'label'       => 'Single post pages sidebar:',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'Blog Sidebar',
            'label'       => 'Blog Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 1',
            'label'       => 'Sidebar 1',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 2',
            'label'       => 'Sidebar 2',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 3',
            'label'       => 'Sidebar 3',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 4',
            'label'       => 'Sidebar 4',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 5',
            'label'       => 'Sidebar 5',
            'src'         => ''
          )
        )
      ),
            array(
        'label'       => 'Social icons',
        'id'          => 'social_icons_single',
        'type'        => 'list-item',
        'desc'        => '',
        'settings'    => array(
          array(
            'label'       => 'Select icon type',
            'id'          => 'social_icon_type',
            'type'        => 'select',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array(
          array(
            'label'       => 'Twitter',
            'value'       => 'twitter'
          ),
          array(
            'label'       => 'Facebook',
            'value'       => 'facebook'
          ),
          array(
            'label'       => 'Google plus',
            'value'       => 'google-plus'
          ),
          array(
            'label'       => 'Dribbble',
            'value'       => 'dribbble'
          ),
          array(
            'label'       => 'Flickr',
            'value'       => 'flickr'
          ),
          array(
            'label'       => 'Html5',
            'value'       => 'html5'
          ),
          array(
            'label'       => 'Tumblr',
            'value'       => 'tumblr'
          ),
          array(
            'label'       => 'Dropbox',
            'value'       => 'dropbox'
          ),
          array(
            'label'       => 'Instagram',
            'value'       => 'instagram'
          ),
          array(
            'label'       => 'Skype',
            'value'       => 'skype'
          ),
          array(
            'label'       => 'Youtube',
            'value'       => 'youtube'
          ),
          array(
            'label'       => 'Linkedin',
            'value'       => 'linkedin'
          ),
          array(
            'label'       => 'Pinterest',
            'value'       => 'pinterest'
          ),
          array(
            'label'       => 'Windows',
            'value'       => 'windows'
          ),
          array(
            'label'       => 'Android',
            'value'       => 'android'
          ),
          array(
            'label'       => 'Apple',
            'value'       => 'apple'
          ),
          array(
            'label'       => 'Linux',
            'value'       => 'linux'
          ),
          array(
            'label'       => 'Css3',
            'value'       => 'css3'
          ),
          array(
            'label'       => 'Github',
            'value'       => 'github-alt'
          ),
          array(
            'label'       => 'Stackexchange',
            'value'       => 'stackexchange'
          )
        ),
          ),
          array(
            'label'       => 'Url',
            'id'          => 'social_icon_url',
            'type'        => 'text',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
            array(
            'label'       => 'Target',
            'id'          => 'social_icon_target',
            'type'        => 'select',
            'desc'        => '',
            'std'         => 'Blank',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array(
          array(
            'label'       => 'Blank',
            'value'       => '_blank'
          ),
          array(
            'label'       => 'Self',
            'value'       => '_self'
          )
        ),
          ),
        ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'blog'
      ), 
      array(
        'id'          => 'blogg3',
        'label'       => 'blogg',
        'desc'        => 'Blog - main page',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'blog_default_style',
        'label'       => 'Blog style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'masonry',
            'label'       => 'masonry',
            'src'         => ''
          )
        )
      ),
       array(
        'id'          => 'blog_masonry_columns',
        'label'       => 'Blog masonry columns',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          )
        )
      ),
      
      array(
        'id'          => 'blog_excerpt',
        'label'       => 'Blog page post\'s content:',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'Excerpt',
            'label'       => 'Excerpt',
            'src'         => ''
          ),
          array(
            'value'       => 'Total post content',
            'label'       => 'Total post content',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'blog_excerpt_len',
        'label'       => 'Blog page post excerpt number of words:',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'blog_excerpt_andmore',
        'label'       => 'Blog excerpt and more text',
        'desc'        => '',
        'std'         => '...',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
        
      array(
        'id'          => 'bloggg4',
        'label'       => 'bloggg',
        'desc'        => 'Blog - featured image sizes',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'blog_default_height',
        'label'       => 'Featured image height (on default blog posts)',
        'desc'        => '',
        'std'         => '340',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'blog_default_width',
        'label'       => 'Featured image width (on default blog posts)',
        'desc'        => '',
        'std'         => '665',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'blog_full_width',
        'label'       => 'Featured image width (on fullscreen blog posts)',
        'desc'        => '',
        'std'         => '1045',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
	   array(
        'id'          => 'blog_masonry_width',
        'label'       => 'Featured image width ( on masonry layout )',
        'desc'        => '',
        'std'         => '270',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'blog_masonry_height',
        'label'       => 'Featured image height ( on masonry layout )',
        'desc'        => '',
        'std'         => '171',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      
    /*   array(
        'id'          => 'blog_recent_height',
        'label'       => 'Featured image height (on recent blog posts shortcode)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),*/
      array(
        'id'          => 'body',
        'label'       => 'Body',
        'desc'        => 'Paragraph Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'body_font_select',
        'label'       => 'Paragraph',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'body_font_custom',
        'label'       => 'Paragraph custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'body_font_weight_select',
        'label'       => 'Paragraph font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'body_font_style_select',
        'label'       => 'Paragraph font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'body_font_size_select',
        'label'       => 'Paragraph font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'menu',
        'label'       => 'Menu',
        'desc'        => 'Menu Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'menu_font_select',
        'label'       => 'Menu',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'menu_font_custom',
        'label'       => 'Menu custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'menu_font_weight_select',
        'label'       => 'Menu font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'menu_font_style_select',
        'label'       => 'Menu font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'menu_font_size_select',
        'label'       => 'Menu font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h1',
        'label'       => 'h1',
        'desc'        => 'Heading 1 Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h1_font_select',
        'label'       => 'Heading 1',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h1_font_custom',
        'label'       => 'Heading 1 custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h1_font_weight_select',
        'label'       => 'Heading 1 font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h1_font_style_select',
        'label'       => 'Heading 1 font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h1_font_size_select',
        'label'       => 'Heading 1 font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h2',
        'label'       => 'h2',
        'desc'        => 'Heading 2 Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h2_font_select',
        'label'       => 'Heading 2',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h2_font_custom',
        'label'       => 'Heading 2 custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h2_font_weight_select',
        'label'       => 'Heading 2 font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h2_font_style_select',
        'label'       => 'Heading 2 font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h2_font_size_select',
        'label'       => 'Heading 2 font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h3',
        'label'       => 'h3',
        'desc'        => 'Heading 3 Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h3_font_select',
        'label'       => 'Heading 3',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h3_font_custom',
        'label'       => 'Heading 3 custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h3_font_weight_select',
        'label'       => 'Heading 3 font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h3_font_style_select',
        'label'       => 'Heading 3 font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h3_font_size_select',
        'label'       => 'Heading 3 font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h4',
        'label'       => 'Heading 4',
        'desc'        => 'Heading 4 Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h4_font_select',
        'label'       => 'Heading 4',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h4_font_custom',
        'label'       => 'Heading 4 custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h4_font_weight_select',
        'label'       => 'Heading 4 font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h4_font_style_select',
        'label'       => 'Heading 4 font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h4_font_size_select',
        'label'       => 'Heading 4 font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h5',
        'label'       => 'Heading 5',
        'desc'        => 'Heading 5 Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h5_font_select',
        'label'       => 'Heading 5',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h5_font_custom',
        'label'       => 'Heading 5 custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h5_font_weight_select',
        'label'       => 'Heading 5 font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h5_font_style_select',
        'label'       => 'Heading 5 font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h5_font_size_select',
        'label'       => 'Heading 5 font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'Heading 6',
        'label'       => 'Heading 6',
        'desc'        => 'Heading 6 Google Fonts',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h6_font_select',
        'label'       => 'Heading 6',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'Aclonica',
            'label'       => 'Aclonica',
            'src'         => ''
          ),
          array(
            'value'       => 'Allan',
            'label'       => 'Allan',
            'src'         => ''
          ),
          array(
            'value'       => 'Annie Use Your Telescope',
            'label'       => 'Annie Use Your Telescope',
            'src'         => ''
          ),
          array(
            'value'       => 'Anonymous Pro',
            'label'       => 'Anonymous Pro',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta Stencil',
            'label'       => 'Allerta Stencil',
            'src'         => ''
          ),
          array(
            'value'       => 'Allerta',
            'label'       => 'Allerta',
            'src'         => ''
          ),
          array(
            'value'       => 'Amaranth',
            'label'       => 'Amaranth',
            'src'         => ''
          ),
          array(
            'value'       => 'Anton',
            'label'       => 'Anton',
            'src'         => ''
          ),
          array(
            'value'       => 'Architects Daughter',
            'label'       => 'Architects Daughter',
            'src'         => ''
          ),
          array(
            'value'       => 'Arimo',
            'label'       => 'Arimo',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => 'Arvo',
            'src'         => ''
          ),
          array(
            'value'       => 'Astloch',
            'label'       => 'Astloch',
            'src'         => ''
          ),
          array(
            'value'       => 'Bangers',
            'label'       => 'Bangers',
            'src'         => ''
          ),
          array(
            'value'       => 'Bentham',
            'label'       => 'Bentham',
            'src'         => ''
          ),
          array(
            'value'       => 'Bevan',
            'label'       => 'Bevan',
            'src'         => ''
          ),
          array(
            'value'       => 'Bigshot One',
            'label'       => 'Bigshot One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => 'Cabin',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin Sketch',
            'label'       => 'Cabin Sketch',
            'src'         => ''
          ),
          array(
            'value'       => 'Calligraffitti',
            'label'       => 'Calligraffitti',
            'src'         => ''
          ),
          array(
            'value'       => 'Candal',
            'label'       => 'Candal',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantarell',
            'label'       => 'Cantarell',
            'src'         => ''
          ),
          array(
            'value'       => 'Cardo',
            'label'       => 'Cardo',
            'src'         => ''
          ),
          array(
            'value'       => 'Carter One',
            'label'       => 'Carter One',
            'src'         => ''
          ),
          array(
            'value'       => 'Cherry Cream Soda',
            'label'       => 'Cherry Cream Soda',
            'src'         => ''
          ),
          array(
            'value'       => 'Chewy',
            'label'       => 'Chewy',
            'src'         => ''
          ),
          array(
            'value'       => 'Coda',
            'label'       => 'Coda',
            'src'         => ''
          ),
          array(
            'value'       => 'Coming Soon',
            'label'       => 'Coming Soon',
            'src'         => ''
          ),
          array(
            'value'       => 'Copse',
            'label'       => 'Copse',
            'src'         => ''
          ),
          array(
            'value'       => 'Corben',
            'label'       => 'Corben',
            'src'         => ''
          ),
          array(
            'value'       => 'Cousine',
            'label'       => 'Cousine',
            'src'         => ''
          ),
          array(
            'value'       => 'Covered By Your Grace',
            'label'       => 'Covered By Your Grace',
            'src'         => ''
          ),
          array(
            'value'       => 'Crafty Girls',
            'label'       => 'Crafty Girls',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson Text',
            'label'       => 'Crimson Text',
            'src'         => ''
          ),
          array(
            'value'       => 'Crushed',
            'label'       => 'Crushed',
            'src'         => ''
          ),
          array(
            'value'       => 'Cuprum',
            'label'       => 'Cuprum',
            'src'         => ''
          ),
          array(
            'value'       => 'Damion',
            'label'       => 'Damion',
            'src'         => ''
          ),
          array(
            'value'       => 'Dancing Script',
            'label'       => 'Dancing Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Dawning of a New Day',
            'label'       => 'Dawning of a New Day',
            'src'         => ''
          ),
          array(
            'value'       => 'Didact Gothic',
            'label'       => 'Didact Gothic',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Sans Mono',
            'label'       => 'Droid Sans Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid Serif',
            'label'       => 'Droid Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB Garamond',
            'label'       => 'EB Garamond',
            'src'         => ''
          ),
          array(
            'value'       => 'Expletus Sans',
            'label'       => 'Expletus Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Fontdiner Swanky',
            'label'       => 'Fontdiner Swanky',
            'src'         => ''
          ),
          array(
            'value'       => 'Francois One',
            'label'       => 'Francois One',
            'src'         => ''
          ),
          array(
            'value'       => 'Geo',
            'label'       => 'Geo',
            'src'         => ''
          ),
          array(
            'value'       => 'Goudy Bookletter 1911',
            'label'       => 'Goudy Bookletter 1911',
            'src'         => ''
          ),
          array(
            'value'       => 'Gruppo',
            'label'       => 'Gruppo',
            'src'         => ''
          ),
          array(
            'value'       => 'Holtwood One SC',
            'label'       => 'Holtwood One SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Homemade Apple',
            'label'       => 'Homemade Apple',
            'src'         => ''
          ),
          array(
            'value'       => 'Inconsolata',
            'label'       => 'Inconsolata',
            'src'         => ''
          ),
          array(
            'value'       => 'Indie Flower',
            'label'       => 'Indie Flower',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica',
            'label'       => 'IM Fell DW Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell DW Pica SC',
            'label'       => 'IM Fell DW Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica',
            'label'       => 'IM Fell Double Pica',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Double Pica SC',
            'label'       => 'IM Fell Double Pica SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English',
            'label'       => 'IM Fell English',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell English SC',
            'label'       => 'IM Fell English SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon',
            'label'       => 'IM Fell French Canon',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell French Canon SC',
            'label'       => 'IM Fell French Canon SC',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer',
            'label'       => 'IM Fell Great Primer',
            'src'         => ''
          ),
          array(
            'value'       => 'IM Fell Great Primer SC',
            'label'       => 'IM Fell Great Primer SC',
            'src'         => ''
          ),
          array(
            'value'       => 'Irish Grover',
            'label'       => 'Irish Grover',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Sans',
            'label'       => 'Josefin Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin Slab',
            'label'       => 'Josefin Slab',
            'src'         => ''
          ),
          array(
            'value'       => 'Judson',
            'label'       => 'Judson',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Another Hand',
            'label'       => 'Just Another Hand',
            'src'         => ''
          ),
          array(
            'value'       => 'Just Me Again Down Here',
            'label'       => 'Just Me Again Down Here',
            'src'         => ''
          ),
          array(
            'value'       => 'Kenia',
            'label'       => 'Kenia',
            'src'         => ''
          ),
          array(
            'value'       => 'Kranky',
            'label'       => 'Kranky',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => 'Kreon',
            'src'         => ''
          ),
          array(
            'value'       => 'Kristi',
            'label'       => 'Kristi',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato',
            'src'         => ''
          ),
          array(
            'value'       => 'League Script',
            'label'       => 'League Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Lekton',
            'label'       => 'Lekton',
            'src'         => ''
          ),
          array(
            'value'       => 'Lobster',
            'label'       => 'Lobster',
            'src'         => ''
          ),
          array(
            'value'       => 'Luckiest Guy',
            'label'       => 'Luckiest Guy',
            'src'         => ''
          ),
          array(
            'value'       => 'Maiden Orange',
            'label'       => 'Maiden Orange',
            'src'         => ''
          ),
          array(
            'value'       => 'Mako',
            'label'       => 'Mako',
            'src'         => ''
          ),
          array(
            'value'       => 'Meddon',
            'label'       => 'Meddon',
            'src'         => ''
          ),
          array(
            'value'       => 'MedievalSharp',
            'label'       => 'MedievalSharp',
            'src'         => ''
          ),
          array(
            'value'       => 'Megrim',
            'label'       => 'Megrim',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => 'Merriweather',
            'src'         => ''
          ),
          array(
            'value'       => 'Metrophobic',
            'label'       => 'Metrophobic',
            'src'         => ''
          ),
          array(
            'value'       => 'Michroma',
            'label'       => 'Michroma',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian Tattoo',
            'label'       => 'Miltonian Tattoo',
            'src'         => ''
          ),
          array(
            'value'       => 'Miltonian',
            'label'       => 'Miltonian',
            'src'         => ''
          ),
          array(
            'value'       => 'Monofett',
            'label'       => 'Monofett',
            'src'         => ''
          ),
          array(
            'value'       => 'Molengo',
            'label'       => 'Molengo',
            'src'         => ''
          ),
          array(
            'value'       => 'Mountains of Christmas',
            'label'       => 'Mountains of Christmas',
            'src'         => ''
          ),
          array(
            'value'       => 'News Cycle',
            'label'       => 'News Cycle',
            'src'         => ''
          ),
          array(
            'value'       => 'Nobile',
            'label'       => 'Nobile',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Cut',
            'label'       => 'Nova Cut',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Flat',
            'label'       => 'Nova Flat',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Mono',
            'label'       => 'Nova Mono',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Oval',
            'label'       => 'Nova Oval',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Round',
            'label'       => 'Nova Round',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Script',
            'label'       => 'Nova Script',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Slim',
            'label'       => 'Nova Slim',
            'src'         => ''
          ),
          array(
            'value'       => 'Nova Square',
            'label'       => 'Nova Square',
            'src'         => ''
          ),
          array(
            'value'       => 'Neucha',
            'label'       => 'Neucha',
            'src'         => ''
          ),
          array(
            'value'       => 'Neuton',
            'label'       => 'Neuton',
            'src'         => ''
          ),
          array(
            'value'       => 'OFL Sorts Mill Goudy TT',
            'label'       => 'OFL Sorts Mill Goudy TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Old Standard TT',
            'label'       => 'Old Standard TT',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Open Sans Condensed',
            'label'       => 'Open Sans Condensed',
            'src'         => ''
          ),
          array(
            'value'       => 'Orbitron',
            'label'       => 'Orbitron',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => 'Oswald',
            'src'         => ''
          ),
          array(
            'value'       => 'Over the Rainbow',
            'label'       => 'Over the Rainbow',
            'src'         => ''
          ),
          array(
            'value'       => 'Reenie Beanie',
            'label'       => 'Reenie Beanie',
            'src'         => ''
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico',
            'src'         => ''
          ),
          array(
            'value'       => 'Paytone One',
            'label'       => 'Paytone One',
            'src'         => ''
          ),
          array(
            'value'       => 'Permanent Marker',
            'label'       => 'Permanent Marker',
            'src'         => ''
          ),
          array(
            'value'       => 'Philosopher',
            'label'       => 'Philosopher',
            'src'         => ''
          ),
          array(
            'value'       => 'Play',
            'label'       => 'Play',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans',
            'label'       => 'PT Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Caption',
            'label'       => 'PT Sans Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Sans Narrow',
            'label'       => 'PT Sans Narrow',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif',
            'label'       => 'PT Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT Serif Caption',
            'label'       => 'PT Serif Caption',
            'src'         => ''
          ),
          array(
            'value'       => 'Puritan',
            'label'       => 'Puritan',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento',
            'label'       => 'Quattrocento',
            'src'         => ''
          ),
          array(
            'value'       => 'Quattrocento Sans',
            'label'       => 'Quattrocento Sans',
            'src'         => ''
          ),
          array(
            'value'       => 'Radley',
            'label'       => 'Radley',
            'src'         => ''
          ),
          array(
            'value'       => 'Rock Salt',
            'label'       => 'Rock Salt',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => 'Rokkitt',
            'src'         => ''
          ),
          array(
            'value'       => 'Schoolbell',
            'label'       => 'Schoolbell',
            'src'         => ''
          ),
          array(
            'value'       => 'Shanti',
            'label'       => 'Shanti',
            'src'         => ''
          ),
          array(
            'value'       => 'Sigmar One',
            'label'       => 'Sigmar One',
            'src'         => ''
          ),
          array(
            'value'       => 'Six Caps',
            'label'       => 'Six Caps',
            'src'         => ''
          ),
          array(
            'value'       => 'Slackey',
            'label'       => 'Slackey',
            'src'         => ''
          ),
          array(
            'value'       => 'Smythe',
            'label'       => 'Smythe',
            'src'         => ''
          ),
          array(
            'value'       => 'Sniglet',
            'label'       => 'Sniglet',
            'src'         => ''
          ),
          array(
            'value'       => 'Special Elite',
            'label'       => 'Special Elite',
            'src'         => ''
          ),
          array(
            'value'       => 'Sue Ellen Francisco',
            'label'       => 'Sue Ellen Francisco',
            'src'         => ''
          ),
          array(
            'value'       => 'Sunshiney',
            'label'       => 'Sunshiney',
            'src'         => ''
          ),
          array(
            'value'       => 'Swanky and Moo Moo',
            'label'       => 'Swanky and Moo Moo',
            'src'         => ''
          ),
          array(
            'value'       => 'Syncopate',
            'label'       => 'Syncopate',
            'src'         => ''
          ),
          array(
            'value'       => 'Tangerine',
            'label'       => 'Tangerine',
            'src'         => ''
          ),
          array(
            'value'       => 'Terminal Dosis Light',
            'label'       => 'Terminal Dosis Light',
            'src'         => ''
          ),
          array(
            'value'       => 'The Girl Next Door',
            'label'       => 'The Girl Next Door',
            'src'         => ''
          ),
          array(
            'value'       => 'Tinos',
            'label'       => 'Tinos',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => 'Ubuntu',
            'src'         => ''
          ),
          array(
            'value'       => 'Ultra',
            'label'       => 'Ultra',
            'src'         => ''
          ),
          array(
            'value'       => 'Unkempt',
            'label'       => 'Unkempt',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturCook',
            'label'       => 'UnifrakturCook',
            'src'         => ''
          ),
          array(
            'value'       => 'UnifrakturMaguntia',
            'label'       => 'UnifrakturMaguntia',
            'src'         => ''
          ),
          array(
            'value'       => 'Vibur',
            'label'       => 'Vibur',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => 'Vollkorn',
            'src'         => ''
          ),
          array(
            'value'       => 'VT323',
            'label'       => 'VT323',
            'src'         => ''
          ),
          array(
            'value'       => 'Waiting for the Sunrise',
            'label'       => 'Waiting for the Sunrise',
            'src'         => ''
          ),
          array(
            'value'       => 'Wallpoet',
            'label'       => 'Wallpoet',
            'src'         => ''
          ),
          array(
            'value'       => 'Walter Turncoat',
            'label'       => 'Walter Turncoat',
            'src'         => ''
          ),
          array(
            'value'       => 'Yanone Kaffeesatz',
            'label'       => 'Yanone Kaffeesatz',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h6_font_custom',
        'label'       => 'Heading 6 custom font',
        'desc'        => 'enter the NAME of the Custom Google Font',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'h6_font_weight_select',
        'label'       => 'Heading 6 font - weight',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          ),
          array(
            'value'       => 'bolder',
            'label'       => 'bolder',
            'src'         => ''
          ),
          array(
            'value'       => 'lighter',
            'label'       => 'lighter',
            'src'         => ''
          ),
          array(
            'value'       => '100',
            'label'       => '100',
            'src'         => ''
          ),
          array(
            'value'       => '200',
            'label'       => '200',
            'src'         => ''
          ),
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '600',
            'label'       => '600',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '800',
            'label'       => '800',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h6_font_style_select',
        'label'       => 'Heading 6 font - style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'italic',
            'label'       => 'italic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'h6_font_size_select',
        'label'       => 'Heading 6 font - size',
        'desc'        => 'px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'font',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
     
      array(
        'id'          => 'c_email',
        'label'       => 'Contact email',
        'desc'        => 'Address where the emails will be sent.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'contact_fields',
        'label'       => 'Select fields to display in contact form',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'contact',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'organization and phone',
            'label'       => 'organization and phone',
            'src'         => ''
          ),
          array(
            'value'       => 'captcha',
            'label'       => 'captcha',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'success_msg',
        'label'       => 'Success message',
        'desc'        => '',
        'std'         => 'Your message has been sent sucessfully!',
        'type'        => 'textarea_simple',
        'section'     => 'contact',
        'rows'        => '15',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'error_msg',
        'label'       => 'Error message',
        'desc'        => '',
        'std'         => 'Please check if you\'ve filled all the fields with valid information and try again. Thank you.',
        'type'        => 'textarea_simple',
        'section'     => 'contact',
        'rows'        => '15',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'shop',
        'label'       => 'Shop page',
        'desc'        => 'Shop page',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      
       array(
        'id'          => 'woo_shop_columns',
        'label'       => 'Number of products per row',
        'desc'        => '',
        'std'         => '4',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          ),
          array(
            'value'       => '5',
            'label'       => '5',
            'src'         => ''
          )
        )
      ),
       array(
        'id'          => 'woo_shop_rows',
        'label'       => 'Number of rows',
        'desc'        => 'default is 2 ',
        'std'         => '2',
        'type'        => 'text',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'woo_single',
        'label'       => 'Product page',
        'desc'        => 'Product page',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
       array(
        'id'          => 'woo_ps_template',
        'label'       => 'Product pages template:',
        'desc'        => '',
        'std'         => 'No Sidebar',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'No Sidebar',
            'label'       => 'No Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'Left Sidebar',
            'label'       => 'Left Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'Right Sidebar',
            'label'       => 'Right Sidebar',
            'src'         => ''
          )
        )
      ),
       array(
        'id'          => 'woo_ps_sidebar',
        'label'       => 'Product pages sidebar:',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'Blog Sidebar',
            'label'       => 'Blog Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 1',
            'label'       => 'Sidebar 1',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 2',
            'label'       => 'Sidebar 2',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 3',
            'label'       => 'Sidebar 3',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 4',
            'label'       => 'Sidebar 4',
            'src'         => ''
          ),
          array(
            'value'       => 'Sidebar 5',
            'label'       => 'Sidebar 5',
            'src'         => ''
          )
        )
      ),
             array(
        'id'          => 'woo_btn_color',
        'label'       => 'Add to cart button color:',
        'desc'        => '',
        'std'         => 'orange',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'lime',
            'label'       => 'lime',
            'src'         => ''
          ),
          array(
            'value'       => 'white',
            'label'       => 'white',
            'src'         => ''
          ),
           array(
            'value'       => 'red',
            'label'       => 'red',
            'src'         => ''
          ),
           array(
            'value'       => 'orange',
            'label'       => 'orange',
            'src'         => ''
          ),
           array(
            'value'       => 'yellow',
            'label'       => 'yellow',
            'src'         => ''
          ),
           array(
            'value'       => 'green',
            'label'       => 'green',
            'src'         => ''
          ),
           array(
            'value'       => 'teal',
            'label'       => 'teal',
            'src'         => ''
          ),
           array(
            'value'       => 'blue',
            'label'       => 'blue',
            'src'         => ''
          ),
           array(
            'value'       => 'purple',
            'label'       => 'purple',
            'src'         => ''
          ),
           array(
            'value'       => 'pink',
            'label'       => 'pink',
            'src'         => ''
          ),
           array(
            'value'       => 'black',
            'label'       => 'black',
            'src'         => ''
          ),
           array(
            'value'       => 'grey',
            'label'       => 'grey',
            'src'         => ''
          )
        )
      ),
        array(
        'id'          => 'woo_btn_general_color',
        'label'       => 'General button color:',
        'desc'        => '',
        'std'         => 'orange',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'lime',
            'label'       => 'lime',
            'src'         => ''
          ),
          array(
            'value'       => 'white',
            'label'       => 'white',
            'src'         => ''
          ),
           array(
            'value'       => 'red',
            'label'       => 'red',
            'src'         => ''
          ),
           array(
            'value'       => 'orange',
            'label'       => 'orange',
            'src'         => ''
          ),
           array(
            'value'       => 'yellow',
            'label'       => 'yellow',
            'src'         => ''
          ),
           array(
            'value'       => 'green',
            'label'       => 'green',
            'src'         => ''
          ),
           array(
            'value'       => 'teal',
            'label'       => 'teal',
            'src'         => ''
          ),
           array(
            'value'       => 'blue',
            'label'       => 'blue',
            'src'         => ''
          ),
           array(
            'value'       => 'purple',
            'label'       => 'purple',
            'src'         => ''
          ),
           array(
            'value'       => 'pink',
            'label'       => 'pink',
            'src'         => ''
          ),
           array(
            'value'       => 'black',
            'label'       => 'black',
            'src'         => ''
          ),
           array(
            'value'       => 'grey',
            'label'       => 'grey',
            'src'         => ''
          )
        )
      ),
        array(
        'id'          => 'woo_btn_general_size',
        'label'       => 'Button size:',
        'desc'        => '',
        'std'         => 'medium',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
          array(
            'value'       => 'medium',
            'label'       => 'medium',
            'src'         => ''
          ),
           array(
            'value'       => 'small',
            'label'       => 'small',
            'src'         => ''
          ),
           array(
            'value'       => 'large',
            'label'       => 'large',
            'src'         => ''
          ),

        )
      ),
       array(
        'id'          => 'woo_btn_sidebar_size',
        'label'       => 'Sidebar Button size:',
        'desc'        => '',
        'std'         => 'small',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => '',
        'choices'     => array( 
        array(
            'value'       => 'small',
            'label'       => 'small',
            'src'         => ''
          ),
          array(
            'value'       => 'medium',
            'label'       => 'medium',
            'src'         => ''
          ),
           
           array(
            'value'       => 'large',
            'label'       => 'large',
            'src'         => ''
          ),

        )
      ),
      array(
        'id'          => 'css',
        'label'       => 'Extra CSS',
        'desc'        => 'Extra CSS',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'code',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'extra_css',
        'label'       => 'Add Extra CSS',
        'desc'        => '',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'code',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      ),
      array(
        'id'          => 'google_analitics',
        'label'       => 'Add Google Analytics Code',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'code',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}