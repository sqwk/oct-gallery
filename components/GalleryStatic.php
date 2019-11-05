<?php namespace Sqwk\Gallery\Components;

use Sqwk\Gallery\Models\Gallery as GalleryModel;

class GalleryStatic extends Gallery
{
    public function defineProperties()
    {
        return [
            'idGallery' => [
                'title'         => 'sqwk.gallery::lang.gallerycomponent.property.gallery',
                'description'   => 'sqwk.gallery::lang.gallerycomponent.property.galleryDescription',
                'type'          => 'dropdown',
                'showExternalParam' => false
            ],
        ];
    }

    public function getidGalleryOptions()
    {
        return GalleryModel::select('slug', 'name')->orderBy('name')->get()->lists('name', 'slug');
    }

    protected function getGallery()
    {
        $slug  = $this->property('idGallery');
        $query = GalleryModel::where('slug', $slug);
        $gallery = $query->first();
        return $gallery;
    }
}
