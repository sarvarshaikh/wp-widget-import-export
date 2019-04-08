<?php
/**
 * Parses and verifies the doc comments for files!
 *
 * PHP version 5
 *
 * @package Widget_Import_Export
 */

/**
 * Return avaliable widget
 * 
 * @return Available
 */
function Available_widget()
{
    //Get the all widget data.
    global $wp_registered_widget_controls;

    $widget_controls = $wp_registered_widget_controls;
    //Declare the array.
    $available_widgets = array();

    foreach ( $widget_controls as $widget ) {
        // No duplicates.
        if (! empty($widget['id_base']) && ! isset($available_widgets[ $widget['id_base'] ]) ) {
            $available_widgets[ $widget['id_base'] ]['id_base'] = $widget['id_base'];
            $available_widgets[ $widget['id_base'] ]['name']    = $widget['name'];
        }
    }
    return apply_filters('Available_widget', $available_widgets);
}