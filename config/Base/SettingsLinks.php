<?php
/**
* @package LgaddPlugin 
*/

namespace Lgadd\Base;

class SettingsLinks {
    public function register(){
        add_filter('plugin_action_links_' . PLUGIN , array( $this , 'settings_links' ) );
    }

    public function settings_links( $links ){
        $settings_link = '<a href="admin.php?page=lgadd_plugin">Settings</a>';
            array_push( $links , $settings_link );
        return $links;
    }
}