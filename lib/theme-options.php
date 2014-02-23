<?php

/**
 * Add theme customization
 */
function bootstrap_sass_customize_register( $wp_customize ) {
  //All our sections, settings, and controls will be added here
  $wp_customize->add_section( 'customize_bootstrap_sass' , array(
      'title'      => __( 'Customize Theme', 'bootstrap-sass' ),
      'priority'   => 999,
  ));
   
  $wp_customize->add_setting( 'primary_color' , array(
  'default'     => '#428bca',
  'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
  	'label'        => __( 'Primary Color', 'bootstrap-sass' ),
  	'section'    => 'customize_bootstrap_sass',
  	'settings'   => 'primary_color',
  	'priority'   => 1
  )));
  
  $wp_customize->add_setting( 'header_bg_color' , array(
    'default'     => '#F8F8F9',
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
  	'label'        => __( 'Header Background Color', 'bootstrap-sass' ),
  	'section'    => 'customize_bootstrap_sass',
  	'settings'   => 'header_bg_color',
  	'priority'   => 2
  )));
  
  $wp_customize->add_setting( 'footer_bg_color' , array(
    'default'     => '#F8F8F9',
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
  	'label'        => __( 'Footer Background Color', 'bootstrap-sass' ),
  	'section'    => 'customize_bootstrap_sass',
  	'settings'   => 'footer_bg_color',
  	'priority'   => 3
  )));
  
  $wp_customize->add_setting('navbar_inverse', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control('navbar_inverse', array(
      'label'    => __('Inverse Navbar'),
      'section'  => 'customize_bootstrap_sass',
      'settings' => 'navbar_inverse',
      'type'     => 'checkbox',
      'priority'   => 4
  ));
  
  $wp_customize->add_setting('footer_inverse', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control('footer_inverse', array(
      'label'    => __('Inverse Footer'),
      'section'  => 'customize_bootstrap_sass',
      'settings' => 'footer_inverse',
      'type'     => 'checkbox',
      'priority'   => 4
  ));
  
  $wp_customize->add_setting('show_tagline', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control('show_tagline', array(
      'label'    => __('Show Tagline'),
      'section'  => 'customize_bootstrap_sass',
      'settings' => 'show_tagline',
      'type'     => 'checkbox',
      'priority'   => 5
  ));
  
  $wp_customize->add_setting('header_image' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image', array(
  	'label'        => __( 'Custom Header Image', 'bootstrap-sass' ),
  	'section'    => 'customize_bootstrap_sass',
  	'settings'   => 'header_image',
  )));
  
  $wp_customize->add_setting( 'background_image' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
  	'label'        => __( 'Custom Background Image', 'bootstrap-sass' ),
  	'section'    => 'customize_bootstrap_sass',
  	'settings'   => 'background_image',
  )));
  
  $wp_customize->add_setting( 'footer_background_image' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background_image', array(
  	'label'        => __( 'Footer Background Image', 'bootstrap-sass' ),
  	'section'    => 'customize_bootstrap_sass',
  	'settings'   => 'footer_background_image',
  )));
  
  $wp_customize->add_setting( 'homepage_carousel' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'homepage_carousel', array(
  	'label'        => __( 'Homepage Carousel ID', 'bootstrap-sass' ),
  	'section'    => 'customize_bootstrap_sass',
  	'settings'   => 'homepage_carousel',
  )));
}
add_action( 'customize_register', 'bootstrap_sass_customize_register' );

/**
* Add Customize Styles
*/
function bootstrap_sass_customize_css()
{
  // Primary Color
  $primary_color = esc_attr(get_theme_mod('primary_color'));
  if ($primary_color && $primary_color !== '') {
    ?>
       <style type="text/css">
           a, a:link { color: <?php echo $primary_color ?>; }
           a:hover, a:active { color: <?php echo adjustBrightness($primary_color, -15) ?>; }
           a.btn {
             color: #ffffff;
           }
           
           .btn-primary {
             background: <?php echo $primary_color ?>;
             border-color: <?php echo adjustBrightness($primary_color, 15) ?>;
           }
           .btn-primary:hover {
             background: <?php echo adjustBrightness($primary_color, -15) ?>;
             border-color: <?php echo adjustBrightness($primary_color, -25) ?>;
           }
           
           .carousel .carousel-indicators li.active {
             background-color: <?php echo $primary_color ?>;
           }
       </style>
    <?php
  }
  
  // Header Background Color
  $header_bg_color = esc_attr(get_theme_mod('header_bg_color'));
  if ($header_bg_color && $header_bg_color !== '') {
    ?>
       <style type="text/css">
           .navbar-default, .navbar-inverse { 
             background-color: <?php echo $header_bg_color ?>;
             border-color: <?php echo adjustBrightness($header_bg_color, -15) ?>;
           }
           
           .navbar-inverse { 
             color: #fefefe;
           }
       </style>
    <?php
  }
  
  // Footer Background Color
  $footer_bg_color = esc_attr(get_theme_mod('footer_bg_color'));
  if ($footer_bg_color && $footer_bg_color !== '') {
    ?>
       <style type="text/css">
           #footer { 
             background-color: <?php echo $footer_bg_color ?>;
           }
       </style>
    <?php
  }
  

  // Background Image
  $background_image = esc_attr(get_theme_mod('background_image'));
  if ($background_image && $background_image !== '') {
    ?>
       <style type="text/css">
           body { background-image: url(<?php echo $background_image ?>); }
       </style>
    <?php
  }
  
  // Footer Background
  $footer_background = esc_attr(get_theme_mod('footer_background_image'));
  if ($footer_background && $footer_background !== '') {
    ?>
       <style type="text/css">
           #footer { background-image: url(<?php echo $footer_background ?>); }
       </style>
    <?php
  }
}
add_action( 'wp_head', 'bootstrap_sass_customize_css' );

/**
 * Adjust brightness of hex colours
 */
function adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}