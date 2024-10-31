<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    // Charger le style du thème parent
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Charger SwiperJS et le fichier JavaScript pour l'animation au scroll et le carousel
add_action( 'wp_enqueue_scripts', 'foce_child_enqueue_scripts' );
function foce_child_enqueue_scripts() {
    // Charger le CSS de SwiperJS
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), '1.0');
    
    // Charger le script JavaScript de SwiperJS
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '1.0', true);
    
    // Charger votre fichier JavaScript pour initialiser l'animation au scroll et le carousel
    wp_enqueue_script('scroll-animation', get_stylesheet_directory_uri() . '/script.js', array('swiper-js'), null, true);
}

// Get customizer options from parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );

    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
}
