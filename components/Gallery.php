<?php namespace Sqwk\Gallery\Components;

use Cms\Classes\ComponentBase;
use Sqwk\Gallery\Models\Gallery as GalleryModel;

class Gallery extends ComponentBase
{
    public $gallery;
    public $galleryMarkup;

    public function componentDetails()
    {
        return [
            'name'        => 'sqwk.gallery::lang.gallerycomponent.name',
            'description' => 'sqwk.gallery::lang.gallerycomponent.description'
        ];
    }

    public function defineProperties()
    {
        return [
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
    }

    public function getidGalleryOptions()
    {
        return array(0 => 'Using gallery slug') + GalleryModel::select('slug', 'name')->orderBy('name')->get()->lists('name', 'slug');
    }

    public function onRun()
    {
        $this->prepareMarkup();
        $this->gallery = $this->page['gallery'] = $this->getGallery();
    }

    private function prepareMarkup()
    {
        $this->galleryMarkup = $this->property('markup');
    }

    protected function getGallery()
    {
        $slug  = ($this->property('idGallery') == '0') ? $this->property('slug') : $this->property('idGallery');
        $query = GalleryModel::where('slug', $slug);
        $gallery = $query->first();
        return $gallery;
    }
}
