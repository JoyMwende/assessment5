<?php

/**
 * @package Joy
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
// use \Inc\Api\SettingsApi;

class AdminPage extends BaseController{
    //alternative method
    // public $settings;

    // public function __construct(){
    //     $this->settings = new SettingsApi();
    // }

    // function register(){
    //     $pages = [
    //         [
    //             'page_title' => 'Member Registration',
    //             'menu_title' => 'Register Member',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'member_regisstration',
    //             'callback' => '',
    //             'icon_url' => 'dashicons-admin-users',
    //             'position' => 200
    //         ]
    //     ];
    //     $this->settings->AddPages( $pages )->register();
    // }

    // Method 1
    function register()
    {
        add_action('admin_menu', [$this, 'add_admin_page']);
    }

    function add_admin_page(){
        add_menu_page('Member Registration', 'Register Member', 'manage_options', 'member_registration', [$this, 'admin_index_cb'], 'dashicons-admin-users', 200);
    }

    function admin_index_cb(){
        require_once $this->plugin_path . 'templates/register-member.php';
        
    }
}

?>