<?php

function magazazz_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'magazazz-free');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'magazazz-free');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'magazazz-free');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'magazazz-free');
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage'; 

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'magazazz-free');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'magazazz-free');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'magazazz-free');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'magazazz-free');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'magazazz-free');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

  $wp_customize->remove_control('header_image');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'magazazz-free' ),
      'description' => __( 'Controls the basic settings for the theme.', 'magazazz-free' ),
  ) );

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';

  // Remove some panels and sections

  $wp_customize->remove_control('background_color');
  $wp_customize->remove_control('header_image');
  $wp_customize->remove_section('colors');

// GENERAL SETTINGS PANEL ........................................ //

  // Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','magazazz-free'), 
    'panel'      => 'general_settings',
    'priority'   => 10    
  ) );  
  $wp_customize->add_setting(
      'magazazz_logo',
      array(
          'default'         => get_template_directory_uri() . '/images/magazazz-free-logo.png',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'magazazz-free' ),
               'section'    => 'custom_logo',
               'settings'   => 'magazazz_logo',
               'context'    => 'magazazz-free-custom-logo' 
           )
       )
   ); 

  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','magazazz-free'), 
    'panel'      => 'general_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'magazazz_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'magazazz-free' ),
                'section'        => 'custom_css_field',
                'settings'       => 'magazazz_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'magazazz_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'magazazz_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function magazazz_style_header() {

   ?>

<style type="text/css">

  <?php if( get_theme_mod('magazazz_custom_css') != '' ) {
    echo get_theme_mod('magazazz_custom_css');
  } ?>

  </style>

<?php 

}

// Add theme support for Custom Backgrounds

$defaults = array(
  'default-color' => '#ffffff',
);
add_theme_support( 'custom-background', $defaults );


// Sanitize text 

function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 

function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}

// Custom js for theme customizer

function magazazz_customizer_js() {
  wp_enqueue_script(
    'magazazz_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'magazazz_customizer_js' );

?>