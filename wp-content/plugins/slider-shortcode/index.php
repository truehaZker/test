<?php
/*
Plugin Name: Simple Shortcode Slider
Description: Make a slider using this structure [wp_sl][img][img][img][/wp_sl]
Version: 1.0.0
Author: truehazker
Author URI: https://github.com/truehaZker
*/

// Register resources with init
function shortcode_resource() {
	wp_register_script("simple-shortcode-slider-script", plugins_url("script.js", __FILE__), array('jquery'), "1.0", false);
	wp_register_style("simple-shortcode-slider-style", plugins_url("style.css", __FILE__), array(), "1.0", "all");
}

add_action( 'init', 'shortcode_resource' );

// [wp_sl] Shortcode
function carousel_shortcode($attrs, $content) {

    // Apply shortcode styles and scripts
    wp_enqueue_script( 'jquery' );
  	wp_enqueue_script("simple-shortcode-slider-script", array('jquery') , '1.0', true);
  	wp_enqueue_style("simple-shortcode-slider-style");

    return '<div class="carousel_slider_outer">' .
              '<img src="https://img.icons8.com/flat_round/64/000000/arrow-left.png" class="prev" alt="Previous">' .
              '<div class="carousel_slider_inner">' .
                do_shortcode($content) .
              '</div>' .
							'<img src="https://img.icons8.com/flat_round/64/000000/arrow-right.png" class="next" alt="Next">' .
           '</div>';
}

add_shortcode('wp_sl', 'carousel_shortcode');

// [img] Shortcode
function img_shortcode($attrs) {
    // Attributes
    $attrs = shortcode_atts(
        [
        'src' => '',
        ],

        $attrs,

        'img'
    );

    return '<img class="carousel_item" src="' . $attrs['src'] . '"/>';
}

add_shortcode('img', 'img_shortcode');
