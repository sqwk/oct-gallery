<?php namespace PolloZen\SimpleGallery\Components;

use Cms\Classes\ComponentBase;
use PolloZen\SimpleGallery\Models\Gallery as GalleryModel;

class Gallery extends ComponentBase
{
    public $simpleGallery;
    public $pollo;

    public function componentDetails()
    {
        return [
            'name'        => 'Gallery Component',
            'description' => 'List all the images from the selected gallery'
        ];
    }

    public function defineProperties()
    {
        return [
            'idGallery' => [
                'title' => 'Gallery Name',
                'type' => 'dropdown'
            ],
        ];
    }

    public function getidGalleryOptions(){
        return GalleryModel::select('id','name')->orderBy('name')->get()->lists('name','id');
    }

    public function onRun(){
        $simpleGallery = new GalleryModel;
        $this->simpleGallery = $simpleGallery->where('id',$this->property('idGallery'))->first();
    }

}