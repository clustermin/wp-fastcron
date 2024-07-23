<?php
/*
Plugin Name: FastCron
Plugin URI: https://wordpress.org/plugins/fastcron/
Description: This plugin will <strong>set up a cronjob at FastCron</strong> to run your <strong>wp-cron.php</strong> file automatically. Completely free, no registration required.
Author: FastCron
Version: 1.0.0
Author URI: https://www.fastcron.com/?ref=wp
License: GPLv2 or later
Text Domain: fastcron
*/

defined('ABSPATH') or die("Hello, is it me you're looking for?");

register_activation_hook(__FILE__, 'fastcron_activate');
register_deactivation_hook(__FILE__,'fastcron_deactivate');

add_filter( 'plugin_action_links', 'fastcron_action_links', 10, 5 );

function fastcron_activate() {
    $url = 'https://app.fastcron.com/free?site='. site_url();
    $response = wp_remote_get($url, ['timeout' => 30]);
    $responseBody = wp_remote_retrieve_body($response);
    $response = @json_decode($responseBody);
    if(!$response || isset($response->message)) {
        return false;
    }
    
    update_option('fastcron_id', $response->id);
    update_option('fastcron_secret', $response->secret);
}

function fastcron_deactivate() {
    $url = 'https://app.fastcron.com/free?site='. site_url() 
        . '&remove=' . get_option('fastcron_secret');

    $response = wp_remote_get($url, ['timeout' => 30]);
    wp_remote_retrieve_body($response);

    delete_option('fastcron_id');
    delete_option('fastcron_secret');
}

function fastcron_action_links($actions, $plugin_file) {
    static $plugin;

    if (!isset($plugin)) {
        $plugin = plugin_basename(__FILE__);
    }

    if ($plugin === $plugin_file) {
        $settings = '<a href="https://app.fastcron.com/free/'
        . get_option('fastcron_id') . '/' . get_option('fastcron_secret') 
        . '" target="_blank">Cron logs</a>';

        $actions = array_merge(['settings' => $settings], $actions);
    }

    return $actions;
}