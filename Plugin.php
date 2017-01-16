<?php namespace PolloZen\SimpleGallery;

use Backend;
use System\Classes\PluginBase;

/**
 * SimpleGallery Plugin Information File
 */
class Plugin extends PluginBase
{
    public function registerSettings()
    {
    }

    // /**
    //  * Returns information about this plugin.
    //  *
    //  * @return array
    //  */
    // public function pluginDetails()
    // {
    //     return [
    //         'name'        => 'SimpleGallery',
    //         'description' => 'Manage galleries in simple way. This plugin storage and manage the gallery. The display is your call',
    //         'author'      => 'PolloZen',
    //         'icon'        => 'icon-picture-o'
    //     ];
    // }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'PolloZen\SimpleGallery\Components\Gallery' => 'Gallery',
        ];
    }

}
