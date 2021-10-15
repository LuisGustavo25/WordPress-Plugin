<?php
/**
 * @package LgaddPlugin
 */

namespace Lgadd\Pages;

class Admin{ 

    public function register(){
        add_action( 'admin_menu' ,  array ($this , 'add_admin_pages' ));
    }
    
    public function add_admin_pages(){
        add_menu_page( 'Lgadd Plugin' , 'Lgadd','manage_options' , 'lgadd_plugin' , array ( $this , 'admin_index' ) , 'dashicons-database-add' , 110 );
    }

    public function admin_index(){
        require_once PLUGIN_PATH . 'templates/Admin.php';
    }
}