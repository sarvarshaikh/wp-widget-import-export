<?php
/**
 * Generate widget File.
 *
 * PHP version 5
 *
 */

/** 
 * To generate exporting data
 *
 * @return widget_export_import
 */
function Generate_Export_data1()
{
    //call available_widget() and take all available widgets site .
    $available_widgets = Available_widget();
    // Take all widget instances for each widget.
    $widget_instances = array();
    // Loop widgets.
    foreach ( $available_widgets as $widget_data ) {
        // Take all instances for this ID base.
        $instances = get_option('widget_' . $widget_data['id_base']);
        if (! empty($instances) ) {
            // Loop instances.
            foreach ( $instances as $instance_id => $instance_data ) {
                // Key is ID (not _multiwidget).
                if (is_numeric($instance_id) ) {
                    $unique_instance_id = $widget_data['id_base'] . '-' . $instance_id;
                    $widget_instances[ $unique_instance_id ] = $instance_data;
                    //print_r( $widget_instances[ $unique_instance_id ]);
                }
            }
        }
    }
    //Get the  name Of sidebar 
    $sidebars_widgets = get_option('sidebars_widgets');
    $sidebars_widget_instances = array();
    foreach ( $sidebars_widgets as $sidebar_id => $widget_ids ) { 
        // Skip inactive widgets.
        if ('wp_inactive_widgets' === $sidebar_id ) {
            continue;
        }
        // Skip if no data or not an array 
        if (! is_array($widget_ids) || empty($widget_ids) ) {
            continue;
        }
        // Loop widget IDs for this sidebar.
        foreach ( $widget_ids as $widget_id ) {
            // Is there an instance for this widget ID?
            if (isset($widget_instances[ $widget_id ]) ) {
                // Add to array.
                $sidebars_widget_instances[ $sidebar_id ][ $widget_id ] = $widget_instances[ $widget_id ];
            }
        }
    }
    // Filter pre-encoded data.
    $data = apply_filters('unencoded_export_data', $sidebars_widget_instances);
    // Return contents.
    return apply_filters('Generate_Export_data1', $data);
} 
