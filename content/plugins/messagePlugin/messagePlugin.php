<?php

/*
Plugin Name: messagePlugin
Description: Plugin to display message in my account page.
*/

add_action('add_meta_boxes', 'init_metabox');

/**
 * create metabox for message
 *
 * @return void
 */
function init_metabox()
{
    add_meta_box('box_message', 'box message', 'htmlContent', 'page', 'side');
}

/**
 * defines what is to be displayed in the metababox
 *
 * @param [type] $post
 * @return void
 */
function htmlContent($post)
{
    $message = get_post_meta($post->ID, 'box_message', true);
    $check   = get_post_meta($post->ID, 'my_meta_box_message_check', true);
?>
    <p>
        <label for="my_meta_box_message">Message</label>
        <input type="text" name="my_meta_box_message" id="my_meta_box_message" value="<?= $message ?>" />
    </p>

    <p>
        <input type="checkbox" id="my_meta_box_message_check" name="my_meta_box_message_check" <?php checked($check, 'on'); ?> />
        <label for="my_meta_box_message_check">Publier le message</label>
    </p>
<?php
}
