<?php
/**
 * @package LgaddPlugin
 */
namespace Lgadd;

final class Init{

    /**
     * Store all the classes inside an array
     * @return array full of list of classes, is an reducer way to do it
     */

    public static function get_services(){
        return
        [
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }

    /**
     * If and only if the class exist
     * and loop through the classes to initialize
     * and call the register() method if this exist 
     * @return
     */

    public static function register_services(){

        foreach ( self::get_services() as $class  ){
            //var_dump( $class ) ; die();
            $service = self::instantiate ( $class );
            if ( method_exists ( $service , 'register' ) ){
                $service -> register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class from the services array
     * @return class instance new instance of the class
     */

    private static function instantiate ( $class ){
        //$serive = new Pages\Admin::class or
        $service = new $class();

        return $service;
    }

}

// use Lgadd\Activate;
// use Lgadd\Deactivate;
// use Lgadd\Admin\AdminPages;

// if(!class_exists('LgaddPlugin')){
//     class LgaddPlugin 
//     {
//         public $tittle;

//         function __construct(){
//             $this->tittle = plugin_basename(__FILE__);
//         }

//         //methods:
//         //function register(){
//         //if we dont want to 'see' the scripts inside the backend, we use wp_enqueue_scripts

//         //send to Base/Enqueue
//         //      add_action( 'admin_enqueue_scripts' , array( $this, 'enqueue' ));

//         //send to SampleAdmin/AdminPages.
//         //      add_action( 'admin_menu' , array($this,'add_admin_pages'));
//         //      add_filter( "plugin_action_links_$this->tittle" , array( $this,'settings_link' ));
//         //}
//         public function settings_link( $links ){
//             //add custom settings link
//             $settings_link = '<a href="options-general.php?page=lgadd_plugin>Settings</a>"';
//             array_push( $links , $settings_link );
//             return $links;
//         }
//         protected function create_post_type(){
//             add_action('init' , array( $this , 'custom_post_type' ));
//         }

//         //send to SampleAdmin/AdminPages.
//         //public function add_admin_pages(){
//         //    add_menu_page( 'Lgadd Plugin','Lgadd','manage_options' , 'lgadd_plugin' , array( $this, 'admin_index' ) , 'dashicons-database-add' , 110 );
//         //}

//         //send to SampleAdmin/AdminPages.
//         //public function admin_index(){
//         //    require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//         //}

//         function custom_post_type(){
//             register_post_type( 'book' , [ 'public' => true , 'label' => 'Books' ]);
//         }

//         //send to Base/Enqueue
//         //function enqueue(){
//             //enqueue all the scripts:
//             //wp_enqueue_style( 'mypluginstyle' , plugins_url( '/assets/style.css' ,__FILE__));
//             //wp_enqueue_script( 'mypluginscript' , plugins_url( '/assets/script.js' ,__FILE__));
//         //}

//         function activate(){
//             //generated  CPT
//             //$this->custom_post_type();
//             //require the file directory path & flush rewrite rules
//             //require_once plugin_dir_path(__FILE__) . 'Lgadd/LgaddPlugin-activate.php';
//             Activate::activate();
//         }

//         function deactive(){
//             //flush rewrite rules
//             Deactivate::deactivate();
//         }

//         function uninstall(){
//             //delete CPT
//         }
//     }

//     //$lgaddPlugin = new LgaddPlugin();
//     //$lgaddPlugin->register();
//     //static method:
//     //LgaddPlugin::register();

//     //activation
//     //We do not need the dir path, because we are using the Static Method
//     //require_once plugin_dir_path(__FILE__) . 'config/Activate.php';
//     register_activation_hook  (__FILE__ , array( $lgaddPlugin , 'activate' ));
//     //deactivation
//     //require_once plugin_dir_path(__FILE__) . 'config/LgaddPlugin-deactivate.php';
//     register_deactivation_hook  (__FILE__ , array( 'Deactivate' , 'deactivate' ));
//     //uninstall
//     register_uninstall_hook (__FILE__ , array( $lgaddPlugin , 'uninstall' )); 
// }