<?php
/**
* @package LgaddPlugin
*/

class LgaddPluginDeactivate{
    public static function deactivate(){
        //create an static function to Deactivate
        flush_rewrite_rules();
    }
}