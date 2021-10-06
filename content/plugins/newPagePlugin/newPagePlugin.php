<?php

/*
Plugin Name: newPagePlugin
Description: Plugin to create new page.
*/

if (!defined('WPINC')) {
    die();
}


require plugin_dir_path(__FILE__) . 'includes/class-ananas-page.php';

$newPost = new newPagePlugin\AnanasPage();

register_activation_hook(__FILE__, [$newPost, 'activation']);
register_deactivation_hook(__FILE__, [$newPost, 'deactivation']);

// new page style
function my_theme_enqueue_styles()
{
    wp_enqueue_style('yourplugin-front', plugins_url('/public/css/style.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('template_redirect', [$newPost, 'traitement_formulaire_ananas']);
