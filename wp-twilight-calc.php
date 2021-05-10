<?php

/*
Plugin Name: Wp Twilight Calc
Plugin URI: https://github.com/matrixxnet6/wp_twilight_calc
Description: После активации плагина - добавить шорткод [wp_twilight_calc] на страницу где должен быть калькулятор
Version: 1.0
Author: Lichtgestalt
Author URI: https://github.com/matrixxnet6/
License: GPL2
*/

function func_load_vue_styles() {
    wp_register_style( 'vue', plugin_dir_url( __FILE__ ).'dist/css/app.css');
}

add_action('wp_enqueue_scripts', 'func_load_vue_styles');

function func_load_vuescripts() {
    wp_register_script('wp_twilight_calc_vuejs', plugin_dir_url( __FILE__ ).'dist/js/app.js', true);
    wp_register_script('wp_twilight_calc_vuejs_vendor', plugin_dir_url( __FILE__ ).'dist/js/chunk-vendors.js', true);
}

add_action('wp_enqueue_scripts', 'func_load_vuescripts');

//Add shortscode
function func_wp_twilight_calc(){
    wp_enqueue_style( 'vue');
    wp_enqueue_script('wp_twilight_calc_vuejs');
    wp_enqueue_script('wp_twilight_calc_vuejs_vendor');

    $str = "<div id='app'></div>";
    return $str;
}

add_shortcode( 'wp_twilight_calc', 'func_wp_twilight_calc' );