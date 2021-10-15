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

    //Public
    //can be accesed everywhere
    //Protected
    //can be accesed only within the Class or Exntends of that Class
    //Private
    //can be accesed only within the Class itself

    defined( 'ABSPATH' ) or die('You cant acces this file');

    //if ( !defined('ABSPATH') ){
    //    die;
    //    exit;
    //}

if( file_exists(dirname ( __FILE__ ) . '/vendor/autoload.php') ){
    require_once(dirname( __FILE__ ) . '/vendor/autoload.php');
}

define ( 'PLUGIN_PATH' , plugin_dir_path( __FILE__ ) );
define ( 'PLUGIN_URL'  , plugin_dir_url ( __FILE__ ) );

if(class_exists( 'Lgadd\\Init' )){
    Lgadd\Init::register_services();
}