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
        wp_enqueue_style( 'mypluginstyle' , plugins_url( '/assets/style.css' ,__FILE__));
        wp_enqueue_script( 'mypluginscript' , plugins_url( '/assets/script.js' ,__FILE__));
    }
}