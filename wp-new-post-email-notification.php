<?php

/**

 * Plugin Name: WP New Post Email Notification

 * Description: Send email notifications to site administrator when a new post is published

 * Version: 1.0

 * Author: Shailesh Parmar.

 * Author URI: http://www.munshaip.com/

 */

register_deactivation_hook(FILE, 'wp_new_post_email_notification_deactivate');

add_action('publish_post', 'send_new_post_email_notification', 10, 2);

function get_new_post_notification_emails()

{

    return array(

        'het@elsner.in'

    );

}

function send_new_post_email_notification($post_id, $post)

{

    $sent_admin_notification = get_post_meta($post_id, 'sent_admin_notification', true);

    if (!$sent_admin_notification)

    {

        $author = $post->post_author;

        $name = get_the_author_meta('display_name', $author);

        $title = $post->post_title;

        $permalink = get_permalink($post_id);

        $to[] = sprintf('%s <%s>', $name, $email);

        $subject = sprintf('New Article Published: %s', $title);

        $message = sprintf('Congratulations, New article "%s" has been published by %s.' . "\n\n", $title, $name);

        $message .= sprintf('View: %s', $permalink);

        wp_mail(get_new_post_notification_emails() , $subject, $message);

        update_post_meta($post_id, 'sent_admin_notification', 1);

    }

}

function wp_new_post_email_notification_deactivate()

{

    $subject = 'Plugin Deactivated: WP New Post Email Notification';

    $message = sprintf('WP New Post Email Notification is deactivated from %s' . "\n", get_bloginfo());

    wp_mail(get_new_post_notification_emails() , $subject, $message);

}

function elsnernpe_sender_email($original_email_address)

{

    return 'noreply@' . $_SERVER['SERVER_NAME'];

}

// Function to change sender name

function elsnernpe_sender_name($original_email_from)

{

    return get_bloginfo();

}

// Hooking up our functions to WordPress filters

add_filter('wp_mail_from', 'elsnernpe_sender_email');

add_filter('wp_mail_from_name', 'elsnernpe_sender_name');

