<?php
/**
* @package LgaddPlugin
*/

class LgaddPluginActivate{
    public static function activate(){
        //create an static function to Activate
        flush_rewrite_rules();
    }
}