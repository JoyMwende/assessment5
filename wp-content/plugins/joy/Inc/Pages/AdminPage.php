<?php

/**
 * @package Cohort13Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class AdminPage extends BaseController
{

    public $settings;

    public $pages;

    public function __construct()
    {
        // $this->settings = new SettingsApi();

        $this->pages = [
            [
                'page_title' => 'Member Registration',
                'menu_title' => 'Register Member',
                'capability' => 'manage_options',
                'menu_slug' => 'member_registration',
                'callback' => function () {
                    echo '<h2> Member Registration Admin Page </h2>';
                },
                'icon_url' => 'dashicons-admin-users',
                'position' => 200
            ]
        ];
    }

    function register()
    {
        $this->settings->AddPages($this->pages)->register();
    }
}

?>