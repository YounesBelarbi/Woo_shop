<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        ['storefront-style'],
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

add_action('woocommerce_after_order_notes', 'comment_checkout_field');

/**
 * Create new field
 *
 * @param [type] $checkout
 * @return void
 */
function comment_checkout_field($checkout)
{
    echo '<div id="my_custom_checkout_field"><h2>' . __('Votre avis nous interesse') . '</h2>';

    woocommerce_form_field('comments', [
        'type'          => 'text',
        'class'         => ['my-field-class form-row-wide'],
        'label'         => __('Dites nous ce que nous pouvons améliorer'),
        'placeholder'   => __("à vous"),
    ], $checkout->get_value('comments'));

    echo '</div>';
}



add_action('woocommerce_checkout_update_order_meta', 'comments_checkout_field_update_order_meta');

/**
 * Update the order meta with field value
 *
 * @param [type] $order_id
 * @return void
 */
function comments_checkout_field_update_order_meta($order_id)
{
    if (!empty($_POST['comments'])) {
        update_post_meta($order_id, 'comment', sanitize_text_field($_POST['comments']));
    }
}
