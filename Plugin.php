<?php namespace Sqwk\Gallery;

use Backend;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use RainLab\Blog\Controllers\Posts as PostsController;
use RainLab\Blog\Models\Post as PostModel;

/**
 * Gallery Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [];

    public function registerSettings()
    {
    }

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'sqwk.gallery::lang.plugin.name',
            'description' => 'sqwk.gallery::lang.plugin.description',
            'author'      => 'sqwk',
            'icon'        => 'icon-picture-o'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Sqwk\Gallery\Components\Gallery' => 'Gallery',
            'Sqwk\Gallery\Components\Galleries' => 'Galleries',
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin as snippets for the static pages plugin.
     *
     * @return array
     */
    public function registerPageSnippets()
    {
        return [
            'Sqwk\Gallery\Components\Gallery' => 'Gallery',
            'Sqwk\Gallery\Components\Galleries' => 'Galleries',
        ];
    }

    /**
     * Registers any form widgets for use in backend
     *
     * @return array
     */
    public function registerFormWidgets()
    {
        return [
            'Sqwk\Gallery\FormWidgets\Gallery' => 'gallery',
        ];
    }

    public function boot()
    {
        if (PluginManager::instance()->hasPlugin('RainLab.Blog')) {
            $this->require[] = 'RainLab.Blog';

            PostModel::extend(function ($model) {
                $model->belongsToMany['gallery'] = [
                    'Sqwk\Gallery\Models\Gallery',
                    'table'    => 'sqwk_gallery_galleries_posts',
                    'key'      => 'post_id',
                    'otherKey' => 'gallery_id'
                ];
            });

            PostsController::extendFormFields(function ($form, $model) {
                if (!$model instanceof PostModel) {
                    return;
                }
                if (!$model->exists) {
                    return;
                }

                $form->addSecondaryTabFields([
                    'gallery' => [
                        'label' => 'sqwk.gallery::lang.form.label',
                        'tab' => 'sqwk.gallery::lang.form.tab',
                        'type' => 'relation'
                    ]
                ]);
            });
        }
    }
}
