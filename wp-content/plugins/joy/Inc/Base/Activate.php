<?php

/**
 * @package Joy
 */

namespace Inc\Base;

class Activate{
    function __construct()
    {
        echo "Action triggered";
    }

    static function activate(){
        flush_rewrite_rules();
    }
}
?>