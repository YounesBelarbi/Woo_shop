<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

require plugin_dir_path(__FILE__) . 'includes/class-meta-box.php';

messagePlugin\MetaBox::deleteDatabox();
