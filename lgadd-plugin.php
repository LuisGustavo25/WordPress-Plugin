<?php
/**
 * @package LgaddPlugin
 */
/*
 Plugin Name: Lgadd Plugin
 Plugin URI: https://github.com/LuisGustavo25
 Description: First attemp to code a plugin.
 Version: 1.0.0
 Author: Luis Gustavo
 Author URI: https://github.com/LuisGustavo25
 License: GPLv2 or later
 Text Domain: lgadd-plugin
 */

//if ( !defined('ABSPATH') ){
//    die;
//    exit;
//}

defined( 'ABSPATH' ) or die('You cant acces this file');

//if(!function_exists('add_action')){
//    echo 'You cant acces this file';
//    exit;
//}

//class secondClass extends LgaddPlugin {
//    function register_post_type(){
//       $this->custom_post_type();
//    }
//}

//Public
//can be accesed everywhere
//Protected
//can be accesed only within the Class or Exntends of that Class
//Private
//can be accesed only within the Class itself

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once(dirname(__FILE__). '/vendor/autoload.php');
}

use Lgadd\Activate;

if(!class_exists('LgaddPlugin')){
    class LgaddPlugin 
    {
        public $tittle;    
        function __construct(){
            $this->tittle = plugin_basename(__FILE__);
        }
        //methods:
        function register(){
            //if we dont want to 'see' the scripts inside the backend, we use wp_enqueue_scripts
            add_action( 'admin_enqueue_scripts' , array($this, 'enqueue'));
            add_action('admin_menu',array($this,'add_admin_pages'));
            //echo $this->tittle;
            add_filter("plugin_action_links_$this->tittle" ,array($this,'settings_link'));
        }
        public function settings_link($links){
            //add custom settings link
            $settings_link = '<a href="options-general.php?page=lgadd_plugin>Settings</a>"';
            array_push($links , $settings_link);
            return $links;
        }
        protected function create_post_type(){
            add_action('init' , array($this,'custom_post_type'));
        }

        public function add_admin_pages(){
            add_menu_page('Lgadd Plugin','Lgadd','manage_options','lgadd_plugin',array($this, 'admin_index'),'dashicons-database-add',110);
        }

        public function admin_index(){
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        function custom_post_type(){
            register_post_type( 'book' , [ 'public' => true , 'label' => 'Books'] );
        }

        function activate(){
            //generated  CPT
            $this->custom_post_type();
            //require the file directory path & flush rewrite rules
            //require_once plugin_dir_path(__FILE__) . 'Lgadd/LgaddPlugin-activate.php';
            Activate::activate();
        }
        function deactive(){
            //flush rewrite rules
            Deactivate::deactivate();
        }
        function uninstall(){
            //delete CPT
        }
        
        function enqueue(){
            //enqueue all scripts:
            wp_enqueue_style('mypluginstyle',plugins_url('/assets/style.css',__FILE__));
            wp_enqueue_script('mypluginscript',plugins_url('/assets/script.js',__FILE__));
        }
    }

    $lgaddPlugin = new LgaddPlugin();
    $lgaddPlugin->register();
    //static method:
    //LgaddPlugin::register();

    //activation
    //We do not need the dir path, because we are using the Static Method
    //require_once plugin_dir_path(__FILE__) . 'config/Activate.php';
    register_activation_hook  (__FILE__ , array( $lgaddPlugin , 'activate'));
    //deactivation
    //require_once plugin_dir_path(__FILE__) . 'config/LgaddPlugin-deactivate.php';
    register_deactivation_hook  (__FILE__ , array( 'Deactivate' , 'deactivate'));
    //uninstall
    register_uninstall_hook (__FILE__ , array($lgaddPlugin , 'uninstall')); 
}