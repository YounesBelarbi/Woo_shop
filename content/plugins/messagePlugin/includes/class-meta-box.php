<?php

namespace messagePlugin;

abstract class MetaBox
{
    /**
     * create metabox for message
     *
     * @return void
     */
    public static function init_metabox()
    {
        global $post;
        $slug = $post->post_name;

        if ($slug == 'my-account' || $slug == 'mon-compte') {
            add_meta_box('box_message', 'box message', [self::class, 'htmlContent'], 'page', 'side');
        }
    }

    /**
     * defines what is to be displayed in the metababox
     *
     * @param [type] $post
     * @return void
     */
    public static function htmlContent($post)
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

    /**
     * save message in wp_postmeta
     *
     * @param [type] $post_id
     * @return void
     */
    public static function save_metabox($post_id)
    {
        if (isset($_POST['my_meta_box_message'])) {
            update_post_meta($post_id, 'box_message', $_POST['my_meta_box_message']);
        }

        $check = isset($_POST['my_meta_box_message_check']) ? 'on' : 'off';
        update_post_meta($post_id, 'my_meta_box_message_check', $check);
    }

    /**
     * display metabox in template 
     *
     * @return void
     */
    public static function my_account_text()
    {
    ?>
        <p class="custom_box_message"><?= get_post_meta(9, 'box_message', true) ?></p>
<?php
    }
}
