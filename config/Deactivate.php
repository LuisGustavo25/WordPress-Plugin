<?php
/**
* @package LgaddPlugin
*/
namespace Lgadd;
class Deactivate{
    public static function deactivate(){
        //create an static function to Deactivate
        flush_rewrite_rules();
    }
}