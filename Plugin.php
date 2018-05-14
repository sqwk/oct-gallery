<?php namespace PolloZen\SimpleGallery;

use Backend;
use System\Classes\PluginBase;
use RainLab\Blog\Controllers\Posts as PostsController;
use RainLab\Blog\Models\Post as PostModel;

/**
 * SimpleGallery Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [];

    public function registerSettings(){
    }

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails(){
        return [
            'name'        => 'pollozen.simplegallery::lang.plugin.name',
            'description' => 'pollozen.simplegallery::lang.plugin.description',
            'author'      => 'PolloZen',
            'icon'        => 'icon-picture-o'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents(){
        return [
            'PolloZen\SimpleGallery\Components\Gallery' => 'Gallery',
            'PolloZen\SimpleGallery\Components\Galleries' => 'Galleries',
        ];
    }

    public function boot(){
        if (PluginManager::instance()->hasPlugin('RainLab.Blog')) {
            $this->require[] = 'RainLab.Blog';

            PostModel::extend(function($model){
                $model->belongsToMany['gallery'] = [
                    'PolloZen\SimpleGallery\Models\Gallery',
                    'table'    => 'pollozen_simplegallery_galleries_posts',
                    'key'      => 'post_id',
                    'otherKey' => 'gallery_id'
                ];
            });

            PostsController::extendFormFields(function($form, $model){

                if(!$model instanceof PostModel) return;
                if (!$model->exists) return;

                $form->addSecondaryTabFields([
                    'gallery' => [
                        'label' => 'pollozen.simplegallery::lang.form.label',
                        'tab' => 'pollozen.simplegallery::lang.form.tab',
                        'type' => 'relation'
                    ]
                ]);
            });
        }
    }
}
