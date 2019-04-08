<?php

/**
 * File Loader.php
 **/


/**
 * No Access.
 **/
if (! defined('ABSPATH')) {
    exit;
}
class Widget_Import_export
{

    function __construct()
    {
        add_action('init', array( $this, 'Addmethod' ));
        add_action('init', array( $this, 'Addstyle' ));
        add_action('init', array( $this, 'Addscript' ));
    }

     /**
      * import all file
      *
      * @return void
      **/
    function Addmethod()
    {
        require plugin_dir_path(__FILE__) . 'wie-page.php';
        require plugin_dir_path(__FILE__) . 'wie-export.php';
        require plugin_dir_path(__FILE__) . 'wie-widget.php';
        require plugin_dir_path(__FILE__) . 'wie-import.php';
        require plugin_dir_path(__FILE__) . 'wie-generatedata.php';
    }

    /**
     * import a style
     *
     * @return void
     **/
    function Addstyle()
    {
        wp_enqueue_style('customstyle', plugins_url('../css/style.css', __FILE__));
    }

    /**
     * import a script
     *
     * @return void
     **/
    function Addscript()
    {
         wp_enqueue_script('customjs', plugins_url('../js/script.js', __FILE__));
    }
}
new Widget_Import_export();
