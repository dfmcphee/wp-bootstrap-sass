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
   
  $wp_customize->add_setting( 'header_image' , array(
      'default'     => '',
      'transport'   => 'refresh',
   ));
   
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image', array(
    	'label'        => __( 'Custom Header Image', 'bootstrap-sass' ),
    	'section'    => 'customize_bootstrap_sass',
    	'settings'   => 'header_image',
   )));
   
   $wp_customize->add_setting( 'background_image' , array(
      'default'     => '',
      'transport'   => 'refresh',
   ));
   
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
    	'label'        => __( 'Custom Background Image', 'bootstrap-sass' ),
    	'section'    => 'customize_bootstrap_sass',
    	'settings'   => 'background_image',
   )));
   
   $wp_customize->add_setting( 'footer_background_image' , array(
      'default'     => '',
      'transport'   => 'refresh',
   ));
   
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background_image', array(
    	'label'        => __( 'Custom Background Image', 'bootstrap-sass' ),
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
    $background_image = esc_attr(get_theme_mod( 'background_image'));
    if ($background_image && $background_image !== '') {
      ?>
         <style type="text/css">
             body { background-image: url(<?php echo $background_image ?>); }
         </style>
      <?php
    }
    
    $footer_background = esc_attr(get_theme_mod( 'footer_background_image'));
    if ($footer_background && $footer_background !== '') {
      ?>
         <style type="text/css">
             #footer { background-image: url(<?php echo $footer_background ?>); }
         </style>
      <?php
    }
}
add_action( 'wp_head', 'bootstrap_sass_customize_css' );