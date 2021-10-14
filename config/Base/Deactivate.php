<?php
/**
* @package LgaddPlugin
*/
namespace Lgadd\Base;
class Deactivate{
    public static function deactivate(){
        //create an static function to Deactivate
        flush_rewrite_rules();
    }
}