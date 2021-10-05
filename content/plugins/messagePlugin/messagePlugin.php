<?php

/*
Plugin Name: messagePlugin
Description: Plugin to display message in my account page.
*/

if (!defined('WPINC')) {
    die();
}


require plugin_dir_path(__FILE__) . 'includes/class-meta-box.php';


add_action('add_meta_boxes', ['messagePlugin\MetaBox', 'init_metabox']);
add_action('save_post', ['messagePlugin\MetaBox', 'save_metabox']);

if (get_post_meta(9, 'my_meta_box_message_check', true) == 'on') {

    add_action('woocommerce_before_account_navigation', ['messagePlugin\MetaBox', 'my_account_text']);
}
