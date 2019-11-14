<?php namespace Sqwk\Gallery\Components;

use Cms\Classes\ComponentBase;
use System\Classes\PluginManager;

use Sqwk\Gallery\Models\Gallery as GalleryModel;

class Gallery extends ComponentBase
{
    public $gallery;

    public $imageResizerInstalled = false;

    public function componentDetails()
    {
        return [
            'name'        => 'sqwk.gallery::lang.gallerycomponent.name',
            'description' => 'sqwk.gallery::lang.gallerycomponent.description'
        ];
    }

    public function defineProperties()
    {
        $properties = [
            'idGallery' => [
                'title'         => 'sqwk.gallery::lang.gallerycomponent.property.gallery',
                'description'   => 'sqwk.gallery::lang.gallerycomponent.property.galleryDescription',
                'type'          => 'dropdown',
                'showExternalParam' => false
            ],
            'slug'  =>[
                'title' => 'sqwk.gallery::lang.gallerycomponent.property.slug',
                'description' => 'sqwk.gallery::lang.gallerycomponent.property.slugDescription',
                'type' => 'string',
                'default' => '{{ :slug }}'
            ]
        ];

        if (PluginManager::instance()->hasPlugin('ToughDeveloper.ImageResizer')) {
            $this->imageResizerInstalled = true;
            $properties['maxDimension'] = [
                'title'         => 'sqwk.gallery::lang.gallerycomponent.property.maxDimension',
                'description'   => 'sqwk.gallery::lang.gallerycomponent.property.maxDimensionDescription',
                'type'          => 'string',
                'default'       => '640',
                'showExternalParam' => false
            ];
        }

        return $properties;
    }

    public function getidGalleryOptions()
    {
        return array(0 => 'Using gallery slug') + GalleryModel::select('slug', 'name')->orderBy('name')->get()->lists('name', 'slug');
    }

    public function onRun()
    {
        $this->gallery = $this->page['gallery'] = $this->getGallery();
    }

    protected function getGallery()
    {
        $slug  = ($this->property('idGallery') == '0') ? $this->property('slug') : $this->property('idGallery');
        $query = GalleryModel::where('slug', $slug);
        $gallery = $query->first();
        return $gallery;
    }
}
