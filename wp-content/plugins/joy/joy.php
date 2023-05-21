<?php

/**
 * @package Joy
 */

/*
Plugin Name: Joy Plugin
Plugin URI: http://.........
Description: This is a plugin for assessment 6
Version: 1.0.0
Author: Joy
Author URI: http://.........
License: GPLv2 or later
Text Domain: joy-plugin
*/

//security check
if (!defined('ABSPATH')) {
    die;
}

//check composer autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// function admin_add_members_cb()
// {
//     require_once plugin_dir_path(__FILE__) . 'templates/register-member.php';
// }

function activate_joyplugin()
{
    Inc\Base\Activate::activate();
}

function deactivate_joyplugin()
{
    Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_joyplugin');

register_deactivation_hook(__FILE__, 'deactivate_joyplugin');


 //register all services
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
?>