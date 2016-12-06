<?php

function magazazz_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'magazazz');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'magazazz');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'magazazz');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'magazazz');
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage'; 

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'magazazz');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'magazazz');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'magazazz');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'magazazz');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'magazazz');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

  $wp_customize->remove_control('header_image');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'magazazz' ),
      'description' => __( 'Controls the basic settings for the theme.', 'magazazz' ),
  ) );
  $wp_customize->add_panel( 'color_choices', array(
      'priority' => 30,
      'theme_supports' => '',
      'title' => __( 'Color Choices', 'magazazz' ),
      'description' => __( 'Controls the color settings for the theme.', 'magazazz' ),
  ) ); 
  $wp_customize->add_panel( 'typography_settings', array(
      'priority' => 40,
      'theme_supports' => '',
      'title' => __( 'Typography', 'magazazz' ),
      'description' => __( 'Controls the fonts for the theme.', 'magazazz' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// GENERAL SETTINGS PANEL ........................................ //

  // Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','magazazz'), 
    'panel'      => 'general_settings',
    'priority'   => 10    
  ) );  
  $wp_customize->add_setting(
      'magazazz_logo',
      array(
          'default'         => get_template_directory_uri() . '/images/magazazz-logo.png',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'magazazz' ),
               'section'    => 'custom_logo',
               'settings'   => 'magazazz_logo',
               'context'    => 'magazazz-custom-logo' 
           )
       )
   ); 

// Add Site Headline Text

  $wp_customize->add_section( 'custom_headline_text' , array(
    'title'      => __('Site Headline Text','magazazz'), 
    'panel'      => 'general_settings',
    'priority'   => 11    
  ) );  
  $wp_customize->add_setting(
      'magazazz_headline_text',
      array(
          'default'           => __( 'Site Headline Text', 'magazazz' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_headline_text',
            array(
                'label'          => __( 'Site Headline', 'magazazz' ),
                'section'        => 'custom_headline_text',
                'settings'       => 'magazazz_headline_text',
                'type'           => 'text'
            )
        )
   );  


// COLOR CHOICES PANEL ........................................ //


// Text Colors

  $wp_customize->add_section( 'text_colors' , array(
    'title'      => __('Text Colors','magazazz'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'magazazz_h1_color',
      array(
          'default'         => '#333333',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_h1_color',
           array(
               'label'      => __( 'Headings Color', 'magazazz' ),
               'section'    => 'text_colors',
               'settings'   => 'magazazz_h1_color' 
           )
       )
   );

  $wp_customize->add_section( 'p_styles' , array(
    'title'      => __('Paragraph Text Styles','magazazz'), 
    'panel'      => 'color_choices',
    'priority'   => 130    
  ) );  
  $wp_customize->add_setting(
      'magazazz_p_color',
      array(
          'default'         => '#333333',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_p_color',
           array(
               'label'      => __( 'Paragraph Color', 'magazazz' ),
               'section'    => 'text_colors',
               'settings'   => 'magazazz_p_color' 
           )
       )
   );


// Accent Color

  $wp_customize->add_section( 'theme_colors' , array(
    'title'      => __('Accent Color','magazazz'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'magazazz_accent_color',
      array(
          'default'         => '#1da3b7',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_accent_color',
           array(
               'label'      => __( 'Accent color for links and hover effects', 'magazazz' ),
               'section'    => 'theme_colors',
               'settings'   => 'magazazz_accent_color' 
           )
       )
   ); 


// TYPOGRAPHY PANEL ........................................ //

// Headings Font

$wp_customize->add_section( 'custom_h_fonts' , array(
    'title'      => __('Headings Font','magazazz'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) ); 

$wp_customize->add_setting(
      'magazazz_h1_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_h1_font_type',
            array(
                'label'          => __( 'Font', 'magazazz' ),
                'section'        => 'custom_h_fonts',
                'settings'       => 'magazazz_h1_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans' =>  'Open Sans',
                  'Roboto'  =>  'Roboto',
                  'Trirong' =>  'Trirong',
                  'Source Sans Pro' =>  'Source Sans Pro',
                  'Raleway' =>  'Raleway',
                  'Prompt'  =>  'Prompt',
                  'Taviraj' =>  'Taviraj',
                  'Titillium Web' =>  'Titillium Web',
                  'Libre Franklin'  =>  'Libre Franklin',
                  'Cormorant Garamond'  =>  'Cormorant Garamond',
                  'Proza Libre' =>  'Proza Libre',
                  'Josefin Sans'  =>  'Josefin Sans',
                  'Josefin Slab'  =>  'Josefin Slab',
                  'Kanit' =>  'Kanit'
                )
            )
        )       
   );


 // Paragraph Font

   $wp_customize->add_section( 'custom_p_fonts' , array(
    'title'      => __('Paragraph Font','magazazz'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  

   $wp_customize->add_setting(
      'magazazz_p_font_size',
      array(
          'default'         => '14px',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_size',
            array(
                'label'          => __( 'Font Size', 'magazazz' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'magazazz_p_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '12'   => '12px',
                  '14'   => '14px',
                  '16'   => '16px',
                  '18'   => '18px',
                  '20'   => '20px',
                  '22'   => '22px'
                )
            )
        )       
   ); 


   $wp_customize->add_setting(
      'magazazz_p_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_type',
            array(
                'label'          => __( 'Font', 'magazazz' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'magazazz_p_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans' =>  'Open Sans',
                  'Roboto'  =>  'Roboto',
                  'Trirong' =>  'Trirong',
                  'Source Sans Pro' =>  'Source Sans Pro',
                  'Raleway' =>  'Raleway',
                  'Prompt'  =>  'Prompt',
                  'Taviraj' =>  'Taviraj',
                  'Titillium Web' =>  'Titillium Web',
                  'Libre Franklin'  =>  'Libre Franklin',
                  'Cormorant Garamond'  =>  'Cormorant Garamond',
                  'Proza Libre' =>  'Proza Libre',
                  'Josefin Sans'  =>  'Josefin Sans',
                  'Josefin Slab'  =>  'Josefin Slab',
                  'Kanit' =>  'Kanit'
                )
            )
        )       
   );

  
  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','magazazz'), 
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
                'label'          => __( 'Add custom CSS here', 'magazazz' ),
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

h1,
h1 a,
h2,
h2 a,
h3,
h3 a,
h4,
h4 a,
h5,
h5 a,
h6,
h6 a {
	font-family: <?php echo get_theme_mod('magazazz_h1_font_type'); ?>;
  color: <?php echo get_theme_mod('magazazz_h1_color'); ?>;
}

p {
	font-size: <?php echo get_theme_mod('magazazz_p_font_size') . 'px'; ?>;
	color: <?php echo get_theme_mod('magazazz_p_color'); ?>;
	font-family: <?php echo get_theme_mod('magazazz_p_font_type'); ?>;
}

li {
  font-size: <?php echo get_theme_mod('magazazz_p_font_size') . 'px'; ?>;
  color: <?php echo get_theme_mod('magazazz_p_color'); ?>;
  font-family: <?php echo get_theme_mod('magazazz_p_font_type'); ?>;
}

a {
	font-family: <?php echo get_theme_mod('magazazz_p_font_type'); ?>;
}

.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
  background-color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

a,
a:visited {
  color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

a:hover,
a:focus,
a:active {
  color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover {
  background: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

.small-icons-bar .fa:hover {
  color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;

}

.footer-cta button {
  background-color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

.footer-social .fa:hover,
.footer-social a:hover {
  color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

footer a:hover {
  color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

h1 a,
h2 a,
h3 a,
h4 a,
h5 a,
h6 a {
  color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

h1 a:visited,
h2 a:visited,
h3 a:visited,
h4 a:visited,
h5 a:visited,
h6 a:visited {
  color: <?php echo get_theme_mod('magazazz_accent_color'); ?>;
}

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