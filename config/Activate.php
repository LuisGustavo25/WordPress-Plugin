<?php
/**
* @package LgaddPlugin
*/
namespace Lgadd;
class Activate{
    public static function activate(){
        //create an static function to Activate
        flush_rewrite_rules();
    }
}