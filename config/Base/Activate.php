<?php
/**
* @package LgaddPlugin
*/
namespace Lgadd\Base;
class Activate{
    public static function activate(){
        //create an static function to Activate
        flush_rewrite_rules();
    }
}