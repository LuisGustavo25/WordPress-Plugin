<?php
/**
* @package LgaddPlugin
*/
namespace Lgadd\Base;
class Enqueue{
   //methods:
    public function register(){
        //if we dont want to 'see' the scripts inside the backend, we use wp_enqueue_scripts       
        add_action( 'admin_enqueue_scripts' , array( $this, 'enqueue' ));
    }
    function enqueue(){
        //enqueue all the scripts:
        //The PLUGIN_URL is the URL of the Plugin from the constant in Lgadd-plugin.php
        //IMPORTANT THE PLUGIN_URL CONTAINS THE / AT THE END OF THE URL
        wp_enqueue_style( 'mypluginstyle' ,   PLUGIN_URL . 'assets/style.css ' );
        wp_enqueue_script( 'mypluginscript' , PLUGIN_URL . 'assets/script.js ' );
    }
}